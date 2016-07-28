@extends('layouts.main1')

@section('content')

    <div id="admin">

        <h1>My Rentals Panel</h1><hr>

        <h2>Create, Edit and Delete Rentals</h2><hr>

        <ul>
            @foreach($rentals as $rental)
            {{ Html::image('img/rentals/'.$rental->image,'' ,array('class' =>'image','width'=>'150')) }}
                <li>
                    
                    {{ $rental->title }}
                    :{{$rental->rentaltype->title}}--

                    {!! Form::open(array('url'=>'/Admin/rentals/delete/{{ $rental->id }}','method' => 'Delete', 'class'=>'form-inline')) !!}
                    {{ Form::hidden('id', $rental->id) }}
                    {{ Form::submit('delete') }}
                    {{ Form::close() }} 
                   <a href="/Admin/rentals/edit/{{$rental->id}}"><input type="button" value="edit" class="edit" /></a><br>
                     {{ $rental->description }}
                </li>

            @endforeach
        </ul>
       <p>Add new Rental</p><a href="/Admin/rentals/create"><input type="button" value="Create Rental" class="create" /></a>
    </div>

    <div id="pagination">
    {{$rentals->render()}}
    </div>
    @stop






