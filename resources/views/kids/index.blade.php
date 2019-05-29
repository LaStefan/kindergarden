@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <h1>Children</h1>
    <hr>
    <ul class=list-group>
        @if(count($kids) > 0)
              @foreach($kids as $kid)
              <li class="list-group-item">
                  <ul class="list-group">
                <h3><a class="text-secondary" href="/kids/{{$kid->id}}">{{$kid->name}} </a></h3>
                <h6>School: {{$kid->school}}</h6>
                <h6>Date of birth: {{$kid->dob}}</h6>
                  </ul>
                
              
              </li> 
               @endforeach
          
          
          @else
          <p>No children registered!</p>

          @endif
            </ul>
        </div>
        <div class="container">
                <a href="/kids/create" class="btn btn-primary" role="button">Register a child</a>
                
        </div>
@endsection