@extends('layout.app')
@section('content')
	<h1>Users</h1>

	@if(count($data)>0)
	 @foreach($data as $data)
	 	<ul class = "list-group">
	 		<li class="list-group-item">Name: {{$data->name}}</li>
	        <li class="list-group-item">Email: {{$data->email}}</li>
	        <li class="list-group-item">
	        	<a class="btn btn-secondary float-left" href="/showusers/{{$data->id}}/edit">Edit</a>
	        	@if($data->id >1)
		        	{!! Form::open(['action' => ['UserController@destroy', $data->id], 'method' => 'POST'])!!}
		        	{{Form::hidden('_method', 'DELETE')}}
		  			{{Form::submit('Delete', ['class'=> 'btn btn-danger float-right'])}}
		  		@endif
	        </li>

	        <p></p>
	 	</ul>
	 @endforeach
	@endif
@endsection

@section('sidebar')
	@parent
@endsection