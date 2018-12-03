@extends('layout.app')

@section('content')

<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script></head>
	<h1>Edit Tutorials</h1>

	<ul class = "list-group">
			 {!! Form::open(['action' => ['PostController@update', $message->id], 'method' => 'POST']) !!}

      <div class="form-group">
        {{ Form::label('title', 'Title')}}
        {{Form::text('title', $message->title, ['class' => 'form-control', 'placeholder' => 'Enter Title'])}}
      </div>

        <div class="form-group">
            {{ Form::label('name', 'Autor')}}
            {{Form::text('name', $message->name, ['class' => 'form-control', 'placeholder' => 'Enter Name'])}}
        </div>
       <div class="form-group">
        {{ Form::label('email', 'E-Mail Address')}}
        {{Form::text('email', $message->email, ['class' => 'form-control', 'placeholder' => 'example@gmail.com'])}}
      </div>

      <div class="form-group">
          {{ Form::label('language', 'Language')}}
          {{Form::text('language', $message->language, ['class' => 'form-control', 'placeholder' => 'EN/ES'])}}
      </div>

      <div class="form-group">
          {{ Form::label('category', 'Category')}}
          {{Form::text('category', $message->category, ['class' => 'form-control', 'placeholder' => 'Enter category'])}}
      </div>

      <div class="form-group">
        {{ Form::label('message', 'Tutorial')}}
        <textarea name="summernoteInput" class="summernote">{{($message->message)}}</textarea>
            <script>
                $(document).ready(function() {
                    $('.summernote').summernote()
                });
                 $('#message').summernote({
                    tabsize: 2,
                    height: 100
                  });
            </script>
      </div>
	  <?php echo QrCode::size(250)->generate(url()->current()); ?>
	  <p></p>

	  <div>   
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class'=> 'btn btn-primary float-right'])}}
    </div>
    {!! Form::close() !!}
@endsection
@section('sidebar')
	@parent
@endsection