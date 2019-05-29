@extends('layouts.app')

@section('content')
<div class="jumbotron text-center ">
    <h1>Edit child profile</h1>
    <hr>
    <div class="well">  
            {{ Form::open(array('action' => ['KidsController@update',$kid->id],'method'=>'POST')) }}
    <fieldset>
    <div class="form-group">

            <div class="form-group-item">
            {{Form::text('name',$kid->name,['class'=>'form-control','placeholder'=>'Full Name'])}}
            </div>
            
            <div class="form-group-item">
            {{Form::text('school',$kid->school,['class'=>'form-control','placeholder'=>'School'])}}
            </div>
            <hr>
            <div class="form-group-item">
            {{Form::text('allergies',$kid->allergies,['class'=>'form-control','placeholder'=>'Any allergies?'])}}
            </div>

            <div class="form-group-item">
                    {{Form::text('legalGuardian',$kid->legalGuardian,['class'=>'form-control','placeholder'=>'Who can come to pick up the child?'])}}
            </div>
            <hr>
            <div class="form-group-item">
                    {{ Form::text('dob', $kid->dob, array('id' => 'datepicker','placeholder'=>'Date of birth')) }}
            </div>
            <hr>
            <div class="form-group-item">
            {{Form::textarea('extraInfo',$kid->extraInfo,['class'=>'form-control','placeholder'=>'Any extra information about the child?'])}}
            </div>
    </div>
    <div class="">
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {{Form::close()}}
    
    </div>
        </fieldset>
    </div>
</div>
    

@endsection