<?php

namespace vacantrentals\Http\Controllers;

use Illuminate\Http\Request;

use vacantrentals\Http\Requests;
use vacantrentals\Http\Controllers\Controller;
use vacantrentals\Http\Requests\rentalRequest;
use vacantrentals\Estate;
use vacantrentals\Rental;
use vacantrentals\Repositories\RentalRepo;
use vacantrentals\Rentaltype;
use vacantrentals\Availability\Availability;
use Image;
use vacantrentals\User;
use File;
use paginate;
use Gate;
use Illuminate\Support\Facades\Input;

class RentalsController extends Controller
{
   /**
    *The rental repository instance
    *
    *@var RentalRepo
    */
    protected $rentals;
    /**
    *create Rental instance
    *@param RentalRepo $rentals
    *@return void
    */
      public function __construct(RentalRepo $rentals){
        $this->middleware('auth');
        $this->rentals = $rentals;
    }
    public function index(Request $request, Rental $id)
    {
        if (\Auth::user()->admin==0) {
           $estate=Estate::with('rental')->get();
        return view('user.index',['rentals'=>$this->rentals->forUser($request->user()),])
        ->with('estates', $estate);
        } else {
        $rental=Rental::paginate(6);
        $estate=Estate::with('rental')->get();
        return view('rentals.index')
        ->with('rentals', $rental)
        ->with('estates', $estate); 
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Estate $estate_id,User $user_id)
    {   
       
        $estate=Estate::all();
        $estate=\DB::table('estates')->lists('title','id');
        $rentaltype=Rentaltype::all();
        $rentaltype=\DB::table('rentaltypes')->lists('title','id');
        $user_id=\Auth::user()->id;
        return view('rentals.create')
         ->with('estate',$estate)
         ->with('user_id',$user_id)
        ->with('rentaltype', $rentaltype);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(rentalRequest $request)
    {
           $image=Input::file('image');       
            $filename = time()."-".$image->getClientOriginalName();
            $path= public_path('img\rentals/'.$filename);
            Image::make($image->getRealPath())->resize(468,249)->save($path);

            $rental=new Rental(array(
            'user_id'=>$request->get('user_id'),
            'estate_id'=>$request->get('estate_id'),
            'rentaltype_id'=>$request->get('rentaltype_id'),
            'title'=>$request->get('title'),
            'description'=>$request->get('description'),
            'price'=>$request->get('price'),
            'available'=>$request->get('available'),            
            ));

            
            $rental->image = $filename;
            $rental->save();
        return Redirect('Admin/rentals')->with('message', 'Rental  created Successfully!!');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
         if (\Auth::user()->admin==0) {
        $rental = Rental::findorFail($id);
        $rentaltype=\DB::table('rentaltypes')->lists('title','id');
        return view('user.edit')
        ->with('rental',$rental)
        ->with('rentaltype', $rentaltype);
        }
        else{
        $rental = Rental::findorFail($id);
        $rentaltype=\DB::table('rentaltypes')->lists('title','id');
        return view('rentals.edit')
        ->with('rental',$rental)
        ->with('rentaltype', $rentaltype);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,Rental $id)
    {
         $rental=Rental::find(input::get('id'));
         $user_id=\Auth::user()->id;
         $input=$request->all();
        $rental->fill($input)->save();
        return Redirect('Admin/rentals')->with('message', 'Rental  edited Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request)
    {
         $rental = Rental::find(Input::get('id'));
         if(Gate::denies('destroy-rental',$rental)){
            abort(403);
         } 
    
     if ($rental) {
            File::delete('public/'.$rental->image);
            $rental->delete();
            return Redirect('Admin/rentals')
                ->with('message', 'Rental  Deleted');
        }

        return Redirect('Admin/rentals')
            ->with('message', 'Something went wrong, please try again');
    }
    public function availability($id)
    {
        $rental = Rental::find(Input::get('id'));

        if ($rental) {
            $rental->available=Input::get('available');
            $rental->save();
            return Redirect('Admin/rentals')
                ->with('message', 'Rental  updated');
        }

        return Redirect('Admin/rentals')
            ->with('message', 'Something went wrong, please try again');
    }
}
