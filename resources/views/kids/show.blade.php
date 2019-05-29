@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <div>
        <h1>Kid Details</h1>
        <hr>
    <h2>{{$kid->name}}</h2>
    </div>
        <hr>
        <ul class="list-group">
            <li class="list-group-item">
                <h4>Allergies: {{$kid->allergies}}</h4>
            </li>
            <li class="list-group-item">
                <h4>Who can pick him up: {{$kid->legalGuardian}}</h4>
            </li>
            <li class="list-group-item">
                <h4>Extra information: {{$kid->extraInfo}}</h4>
            </li>
                
        </ul>
    <hr>
    <div class="">
        <a href="/kids/{{$kid->id}}/edit" class="btn btn-primary pull-right">Edit</a>
        <a href="/kids" class="btn btn-dark">Back</a>
        <hr>
        {!!Form::open(['action' => ['KidsController@destroy',$kid->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
        {!!Form::close()!!}
    </div>
    

</div>

@endsection

