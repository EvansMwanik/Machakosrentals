@extends('layouts.main1')
@section('content')
<section id="rentals">
@include('errors._error')

<div class="rental">

		@foreach($rentaltypes->rental as $rental)

			<h2> {{$rentaltypes->title}} Rentals</h2>	
			<hr>

			{{ Html::image('img/rentals/'.$rental->image, $rental->title, array('class'=>'feature', 'width'=>'350', 'height'=>'220')) }}
					<br>
						<h3>{{$rental->title}}</h3>
						<br>
						<h4>This Rental is in {{$rental->estate->title}} </h4>
						<br>
							{{$rental->description}}
									
                    
				<p>
						@if(!$rental->available==1)
                			
						@if(Auth::check())
                			<button class="cart-btn">
                    			<span class="price">Ksh.{{ $rental->price }}/Month</span>
                			</button>
                			@if($rental->available==0)
				<p><strong>This Rental is Available!!</p></strong>
        		@else
        			<p><strong>This Rental is already booked, try others please!</p></strong>
        		@endif
                		@endif

                		
						@endif
						</p>

                
            
       
         

		@endforeach

			{{Html::link("/","Go back")}}
	</div><!-- end rental -->
</section>
@stop