@extends('layouts.main1')
@section('content')

@include('errors._error')

<div id="singlerental">
	
			
		@foreach($rentals as $rental)

			<h2>{{$rental->title}}</h2>
			<div class="rental">
				
				{!! Html::image('img/rentals/'.$rental->image, $rental->title, array('class'=>'feature', 'width'=>'350', 'height'=>'220')) !!}
					<br>
						
						<br>
						<h3>{!!$rental->rentaltype->title!!} Rental</h3>
								<div id='rental-details'>				
								{{$rental->description}}
							
									</div>
                    
				<p>
					@if(Auth::check())
						@if(!$rental->available==1)
                			{!! Form::open(array('url'=>'#')) !!}
                			{!! Form::hidden('id', $rental->id) !!}

                			<button class="cart-btn">
                    			<span class="price">Ksh.{!! $rental->price !!}/Month</span>
                			</button>
                			
						@endif
                	@endif

                @if($rental->available==0)
				<p><strong>This Rental is Available!!</p></strong>
        		@else
        			<p><strong>This Rental is already booked, try others please!</p></strong>
        		@endif
            	</p>
            </div>
		@endforeach

			@if(!Auth::check())
				<div class="button cart-btn" style="text-align:centre">
			<i>
				You are not logged in, click here to <a href="/auth/login">  Login</a>
			</i>
				</div>
			@endif
		<br>{!!Html::link("/","Go back")!!}

	</div><!-- end rental -->
	
@stop