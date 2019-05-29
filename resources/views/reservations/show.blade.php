@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <div>
    <h1>Booking Date: {{$reservation->bookingDate}}</h1>
    <small>Reservation placed at {{$reservation->created_at}}</small>
    <small>Placed by: {{$reservation->user->name}}</small>
    </div>
        <hr>
        <ul class="list-group">
            <li class="list-group-item">
            <h3>Start Time: {{$reservation->startTime}}
            </li>
            <li class="list-group-item">
                <h3>End Time: {{$reservation->endTime}}
             </li>
             <li class="list-group-item">
                <h3>Status: {{$reservation->status}}
            </li>
        </ul>
    <hr>
    <div class="">
    
    <a href="/reservations/{{$reservation->id}}/edit" class="btn btn-primary pull-right">Edit</a>
    <a href="/reservations" type="button" class="btn btn-dark">Back</a>
    <hr>
    {!!Form::open(['action' => ['ReservationsController@destroy',$reservation->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
    {!!Form::close()!!}
  
    </div>

</div>

@endsection