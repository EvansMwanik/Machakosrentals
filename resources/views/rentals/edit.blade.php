@extends('layouts.main1')

@section('content')

	<div id="admin">

		<h1>Rentals Admin Panel</h1><hr>

		<p>Here you can edit selected Rental.</p>

		<h2>Edit Rental</h2><hr>

		@include('errors._error')

		{{ Form::model($rental, array('method' => 'put', 'url' => 'Admin/rentals/update', 'class' => 'form','files'=>true)) }}
		
		<p>
			{{ Form::label('title') }}
			{{ Form::text('title', $rental->title) }}
		</p>
		<p>
            {{ Form::label('rentaltype_id', 'Select a Rental type') }}
            {{ Form::select('rentaltype_id', $rentaltype) }}
        </p>
        <p>
            {{ Form::label('rentaltype_id', 'Select payment') }}
            {{ Form::select('rentaltype_id', $payment) }}
        </p>
		<p>
            {{ Form::label('price') }}
            {{ Form::text('price', null, array('class'=>'form-price')) }}
        </p>
        <p>
            {{ Form::label('description') }}
            {{ Form::text('description', $rental->description) }}
        </p>
        <p>
            {{ Form::label('available', 'Available ') }}
            {{ Form::checkbox('available',0, true) }}
        </p>
        <p>
            {{ Form::label('Payment', 'Payment ') }}
            {{ Form::checkbox('Payment',0, true) }}
        </p>
		<p>
			{{ Form::label('Image') }}
			{{ Form::text('image', $rental->image) }}
		</p>
		
		{{ Form::hidden('id', $rental->id) }}
		{{ Form::submit('Edit Rental', array('class'=>'secondary-cart-btn')) }}
		{{ Form::close() }}
	</div><!-- end admin -->

@stop