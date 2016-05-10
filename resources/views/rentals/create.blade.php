@extends('layouts.main1')

@section('content')

    <div id="admin">

    <h2>Create New Rental</h2><hr>

        @include('errors._error')

        {!!Form::open(array('url'=>'Admin/rentals/store', 'files'=>true)) !!}
             
        <p>
            
            {!! Form::hidden('user_id', $user_id) !!}
        </p>
        <p>
            {!! Form::label('estate_id', 'Select an Estate') !!}
            {!! Form::select('estate_id', $estate) !!}
        </p>
       
        <p>
            {!! Form::label('rentaltype_id', 'Select a Rental type') !!}
            {!! Form::select('rentaltype_id', $rentaltype) !!}
        </p>
        <p>
            {!! Form::label('title') !!}
            {!! Form::text('title') !!}
        </p>
        <p>
            {!! Form::label('description') !!}
            {!! Form::textarea('description') !!}
        </p>
        <p>
            {!! Form::label('price') !!}
            {!! Form::text('price', null, array('class'=>'form-price')) !!}
        </p>
        <p>
            {!! Form::label('available', 'Available ') !!}
            {!! Form::checkbox('available',0, true) !!}
        </p>
       
        <p>
            {!! Form::label('image', 'Choose an image') !!}
            {!! Form::file('image') !!}
        </p>
        {!! Form::submit('Save Rental', array('class'=>'secondary-cart-btn')) !!}
        {!! Form::close() !!}
    </div><!-- end admin -->

@stop
