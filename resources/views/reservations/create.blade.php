@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1>Reservations</h1>
    <hr>
    
    <div class="container">
    {{ Form::open(array('action' => 'ReservationsController@store','method'=>'POST')) }}
    <div class="form-group">
            {{ Form::text('bookingDate', '', array('id' => 'datepicker','placeholder'=>'Pick a date')) }}
            {{Form::selectRange('number', 10, 20)}} 
    </div>
        <div class="">
            {{Form::submit('Reserve', ['class'=>'btn btn-primary'])}}
            {{Form::close()}}
            <a href="/reservations" type="button" class="btn btn-dark">Back</a>
        </div>
    </div>
    
</div>
    

@endsection