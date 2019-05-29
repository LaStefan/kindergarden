@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <h1>Reservations</h1>
    <hr>
    <ul class=list-group>
        @if(count($reservations) > 0)
              @foreach($reservations as $reservation)
              <li class="list-group-item">
                <h3><a class="text-secondary" href="/reservations/{{$reservation->id}}">{{$reservation->bookingDate}} </a></h3>
                <small>Start time: {{$reservation->startTime}}</small>
                <small>End time: {{$reservation->endTime}}</small>
                <small>Placed by: {{$reservation->user->name}}</small>
              </li> 
               @endforeach
          
          {{$reservations->links()}}
          @else
          <p>No reservations found!</p>

          @endif
            </ul>
        </div>
        <div class="container">
                <a href="/reservations/create" class="btn btn-primary" role="button">Make a Reservation</a>
        </div>
@endsection