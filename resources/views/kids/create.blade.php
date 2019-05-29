@extends('layouts.app')

@section('content')
<div class="jumbotron text-center ">
    <h1>Child registration</h1>
    <hr>
    <div class="well">  
    {{ Form::open(array('action' => 'KidsController@store','method'=>'POST')) }}
    
    <div class="form-group">

            <div class="form-group-item">
            {{Form::text('name','',['class'=>'form-control','placeholder'=>'Full Name'])}}
            </div>
            
            <div class="form-group-item">
            {{Form::text('school','',['class'=>'form-control','placeholder'=>'School'])}}
            </div>
            <hr>
            <div class="form-group-item">
            {{Form::text('allergies','',['class'=>'form-control','placeholder'=>'Any allergies?'])}}
            </div>

            <div class="form-group-item">
                    {{Form::text('legalGuardian','',['class'=>'form-control','placeholder'=>'Who can come to pick up the child?'])}}
            </div>
            <hr>
            <div class="form-group-item">
                    {{ Form::text('dob', '', ['id' => 'datepicker','placeholder'=>'Date of birth']) }}
            </div>
            <hr>
            <div class="form-group-item">
            {{Form::textarea('extraInfo','',['class'=>'form-control','placeholder'=>'Any extra information about the child?'])}}
            </div>
    </div>
    <div class="">
        {{Form::submit('Register', ['class'=>'btn btn-primary'])}}
    {{Form::close()}}
       
    <a href="/kids" type="button" class="btn btn-dark">Back</a>
    </div>
    </div>
</div>
    

@endsection