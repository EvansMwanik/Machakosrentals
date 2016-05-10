@extends('layouts.main1')
@section('content')

@include('errors._error')

<div id="rental">

		@foreach($estates->rental as $rental)

			<h2>Rentals under {{$estates->title}} </h2>	
			<hr>

			{!! Html::image('img/rentals/'.$rental->image, $rental->title, array('class'=>'feature', 'width'=>'350', 'height'=>'220')) !!}
					<br>
						<h3>{{$rental->title}}</h3>
						<br>
						<h4>{!!$rental->rentaltype->title!!} Rental</h4>
						<br>
							{{$rental->description}}
									
                    
				<p>
						@if(!$rental->available==1)
                			

                			<button class="cart-btn">
                    			<span class="price">Ksh.{!! $rental->price !!}/Month</span>
                			</button>
                		
						@endif
						</p>

                @if($rental->available==0)
				<p><strong>This Rental is Available!!</p></strong>
        		@else
        			<p><strong>This Rental is already booked, try others please!</p></strong>
        		@endif
            
       
         

		@endforeach

			{!!Html::link("/","Go back")!!}
	</div><!-- end rental -->

@stop