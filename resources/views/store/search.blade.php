@extends('layouts.main1')

@section('search-keyword')

	<hr>
	<section id="search-keyword">
        <h1>Search Results for <span>{{ $keyword }}</span></h1>
    </section><!-- end search-keyword -->

@stop

@section('content')

	<div id="search-results">

     

		@foreach($rentals as $rental)
        <div class="rental">
            
            {!! Html::image('img/rentals/'.$rental->image, $rental->title, array('class'=>'feature', 'width'=>'220', 'height'=>'128')) !!}

            <h3>{!!Html::link('rentals/view/'.$rental->id, $rental->title)!!}</h3>
            <br>
            <p>{!!$rental->description!!}
               
              
        </div>
        @endforeach

        
	</div><!-- end search-results -->

@stop
