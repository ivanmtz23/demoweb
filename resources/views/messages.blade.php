@extends('layout.app')

@section('content')
	<h1>Tutorials</h1>

	@if(count($messages)>0)
	 @foreach($messages as $message)
	 	<ul class = "list-group">
	 		<li class="list-group-item">Title: {{$message->title}}</li>
	        <li class="list-group-item">Autor: {{$message->name}}</li>
	        <li class="list-group-item"><a class="btn btn-secondary float-right" href="{{route('showarticle.show',['id'=>$message->id])}}">Edit</a>
	        	    {!! Form::open(['action' => ['PostController@destroy', $message->id], 'method' => 'POST'])!!}
			        {{Form::hidden('_method', 'DELETE')}}
			        {{Form::submit('Delete', ['class'=> 'btn btn-danger float-left'])}}
			        {!! Form::close() !!}</li>

	        <p></p>
	 	</ul>
	 @endforeach
	@endif
@endsection

@section('sidebar')
	@parent
@endsection