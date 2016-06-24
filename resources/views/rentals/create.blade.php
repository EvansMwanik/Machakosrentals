@extends('layouts.main1')

@section('content')

    <div id="admin">

    <h2>Create New Rental</h2><hr>
    <h3>Fill the Form below then click save to post your rental</h3>
        @include('errors._error')

        {{Form::open(array('url'=>'Admin/rentals/store', 'files'=>true)) }}
             
        <p>
            
            {{ Form::hidden('user_id', $user_id) }}
        </p>
        <p>
            {{ Form::label('estate_id', 'Select your Estate') }}
            {{ Form::select('estate_id', $estate) }}
        </p>
       
        <p>
            {{ Form::label('rentaltype_id', 'Select your Rental type') }}
            {{ Form::select('rentaltype_id', $rentaltype) }}
        </p>
        <p>
            {{ Form::label('title','Give the name of your rental') }}
            {{ Form::text('title') }}
        </p>
        <p>
            {{ Form::label('description','Give a description of the rental') }}
            {{ Form::textarea('description') }}
        </p>
        <p>
            {{ Form::label('price','Give the Rent per month') }}
            {{ Form::text('price', null, array('class'=>'form-price')) }}
        </p>
        <p>
            {{ Form::label('available', 'Available ') }}
            {{ Form::checkbox('available',0, true) }}
        </p>
       
        <p>
            {{ Form::label('image', 'Choose an image') }}
            {{ Form::file('image') }}
        </p>
        {{ Form::submit('Save Rental', array('class'=>'secondary-cart-btn')) }}
        {{ Form::close() }}
        <br>{{Html::link("/Admin/rentals","Go back")}}
    </div><!-- end admin -->

@stop
