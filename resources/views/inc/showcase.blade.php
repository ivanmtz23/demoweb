<div class="jumbotron text-center">
	<div class = "container">
	@if(isset(Auth::user()->email))
     	<h1>Welcome {{ Auth::user()->name }}</h1>
    @else
    	<script>window.location = "/login";</script>
   	@endif
		<p class = "lead"> This demo uses laravel </p>
	</div>
</div>