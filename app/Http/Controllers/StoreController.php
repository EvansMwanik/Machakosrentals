<?php

namespace vacantrentals\Http\Controllers;

use Illuminate\Http\Request;

use vacantrentals\Http\Requests;
use vacantrentals\Http\Requests\contactRequest;
use vacantrentals\Http\Controllers\Controller;
use vacantrentals\Repositories\RentalRepo;
use vacantrentals\Estate;
use vacantrentals\Rental;
use vacantrentals\Rentaltype;
use Illuminate\Support\Facades\Input;
use Paginate;

class StoreController extends Controller
{
    
  public function __construct(RentalRepo $rentals){
        $this->middleware('auth',['except'=>['show','view']]);
        $this->rentals = $rentals;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request, Rental $id, Estate $estate, Rentaltype $rentaltype_id)
    {
        if (\Auth::user()->admin==0) {
        $rental=Rental::OrderBy('available')->Paginate(6);
        $estate=Estate::with('rental')->get();
        return view('user.index',['rentals'=>$this->rentals->forUser($request->user()),])
        ->with('estates', $estate);
        } else {
        $rental=Rental::OrderBy('available')->Paginate(6);
        $rentaltype=Rentaltype::with('rental.rentaltype')->get();
        $estate=Estate::with('rental')->get();
        return view('store.index')
        ->with('rentals', $rental)
        ->with('estates', $estate)
        ->withRentaltypes($rentaltype); 
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function search()
    {
        $keyword = Input::get('keyword');

        return View('store.search')
          ->with('rentals', Rental::where('title', 'LIKE', '%'.$keyword.'%')->get())
            ->with('keyword', $keyword);
            
             
            }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function view()
    {
        $rental=Rental::paginate(6);
        $estate=Estate::with('rental')->get();
        $rentaltype=Rentaltype::with('rental')->get();
        return view('store.index')
        ->with('rentals', $rental)
        ->with('estates', $estate)
        ->with('rentaltypes', $rentaltype);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
       $estate=Estate::get();
        $rental = Rental::where('id', '=', $id)->paginate(6);
        return view('store.show') 
        ->withRentals($rental)
        ->withEstates($estate);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function contact()
    {
        return view('store.contact');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function email(contactRequest $request)
    {
        \Mail::send('store.contact',array(
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'user_message'=>$request->get('message')),
        function($message){
            $message->from('compsolutionscentre@gmail.com');
            $message->to('compsolutionscentre@gmail.com','Admin')->subject('vacantrentals feedback');
        });
        return reidrect('store/contact')->with('message','Thanks for contact us!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
     public function about()
    {
        return view('store.about');
    }
}
