@extends('layout.app')
@section('content')

	<h1>Edit User</h1>
	{!! Form::open(['action' => ['UserController@update', $data->id], 'method' => 'POST']) !!}

    	<div class="form-group">
    		{{ Form::label('name', 'Name')}}
    		{{Form::text('name', $data->name, ['class' => 'form-control', 'placeholder' => 'Enter Name'])}}
    	</div>

    	<div class="form-group">
    		{{ Form::label('email', 'Email')}}
    		{{Form::text('email', $data->email, ['class' => 'form-control', 'placeholder' => 'Enter Email'])}}
    	</div>
      <div>
      	{{Form::hidden('_method', 'PUT')}}
	  	  {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
	    </div>
	{!! Form::close() !!}
@endsection