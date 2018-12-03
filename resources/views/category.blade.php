@extends('layout.app')

@section('content')
  <h1>Categories</h1>

  @if(count($messages)>0)
   @foreach($messages as $message)
    <ul class = "list-group">
      <li class="list-group-item">Title: {{$message->title}}</li>
      <li class="list-group-item">Category: {{$message->category}}</li>
    </ul>
    <p><p>
   @endforeach
  @endif
@endsection

@section('sidebar')
  @parent
@endsection