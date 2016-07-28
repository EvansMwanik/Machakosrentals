@extends('layouts.main')
@section('content')

@include('errors._error')
@section('promo')

	<section id="promo">
        <div id="promo-details">
            <h1>Welcome to Machakos</h1>
           
         </div><!-- end promo-details -->
        
     </section><!-- promo -->

@stop

    <section id="rental">

		<h2>Machakos Rentals</h2><hr>

			@foreach($rentals as $rental)
			     <div class="rental">
					
                     @if($rental->payment==1)

                    <strong><a href="rentals/view/{{$rental->id}}">{{ Html::image('img/rentals/'.$rental->image, $rental->title ,array('class'=>'feature', 'width'=>'380', 'height'=>'180')) }}<br>
                   {{ $rental->title }}</a></strong>
				
                    <h4>{{ $rental->rentaltype->title }} Rental</h4>
                     <h5>Located in {{$rental->estate->title }}</h5>

                    {{ $rental->description }}<br>
                                                  
                      <button type="submit" class="cart-btn">
                        <span class="price">Ksh.{{ $rental->price }} per Month</span></button>
                
                <br>
                <div class="available">
                    <strong>   
                        <span class="{{vacantrentals\Availability\Availability::displayClass($rental->available) }}">
                    @if($rental->available ==0)
                        Rental Available !!
                    @else
                        Rental Not available !!
                    @endif
                
                </span></strong>

                
               
                </div>
               </p>
            @else
                No rentals here yet
            @endif
              </div>
			@endforeach	
		
		<br>
		<!--if the user is not logged in, link to login-->
		<hr>
        @if(!Auth::check()) 
        <div class="button cart-btn" style="text-align:centre">
        <strong> You are not logged in, if you own or manage rentals, register to place your rentals with us</strong>
         
	   </div>
       @endif	
</section><!-- end rental -->

<div id="pagination">
	{{$rentals->render()}}</div>
@stop
