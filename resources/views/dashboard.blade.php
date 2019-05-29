@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        <a href="/reservations/create" class="btn btn-primary">Make a Reservation</a>
                            <h3>Your reservations</h3>
                            @if(count($reservations) > 0)
                            <table class="table table-striped">
                                <tr>
                                    <th>Booking Date:</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach($reservations as $reservation)
                                <tr>
                                     <td>{{$reservation->bookingDate}}</td>
                                     <td><a href="/reservations/{{$reservation->id}}/edit" class="btn btn-primary">Edit</a></td>
                                     <td>{!!Form::open(['action' => ['ReservationsController@destroy',$reservation->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                             {{Form::hidden('_method','DELETE')}}
                                             {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                     {!!Form::close()!!}</td>
                                 </tr>
                                @endforeach
                            </table>
                            @else
                            <p>You have no reservations!</p>
                            @endif
                   
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
