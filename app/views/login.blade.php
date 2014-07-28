@extends('layout')

@section('content')
	<div class="form-box">
	<h1>Login</h1>
	@if (Session::has('error'))
			<p class="error">{{ Session::get('error') }}</p>
	@endif
	{{ Form::open(array('controller' => 'UserController@postLogin')) }}
    	{{ Form::text('email', Input::old('email'), array('placeholder' => 'Email'))}}
    	@if ($errors->first('email'))
			<p class="error">{{ $errors->first('email') }}</p>
		@endif
    	{{ Form::password('password' , array('placeholder' => 'Password'))}}
    	@if ($errors->first('password'))
			<p class="error">{{ $errors->first('password') }}</p>
		@endif
    	{{ Form::submit('Login', array('class' => 'btn'))}}
	{{ Form::close() }}
	</div>
@stop