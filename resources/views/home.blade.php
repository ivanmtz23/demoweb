@extends('layout.app')

@section('content')
	<h1>Home</h1>
	<p>This is a demo for our web class</p>
@endsection

@section('sidebar')
	@parent
	<p>Added info to the sidebar</p>
@endsection