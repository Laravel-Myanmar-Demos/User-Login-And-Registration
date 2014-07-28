@extends('layout')

@section('content')
	<div class="form-box">
	<h1>Register</h1>
	{{ Form::open(array('controller' => 'UserController@postRegister')) }}
    	{{ Form::text('email', Input::old('email'), array('placeholder' => 'Email'))}}
    	@if ($errors->first('email'))
			<p class="error">{{ $errors->first('email') }}</p>
		@endif
    	{{ Form::password('password' , array('placeholder' => 'Password'))}}
    	@if ($errors->first('password'))
			<p class="error">{{ $errors->first('password') }}</p>
		@endif
    	{{ Form::password('confirm-password' , array('placeholder' => 'Confirm Password'))}}
    	@if ($errors->first('confirm-password'))
			<p class="error">{{ $errors->first('confirm-password') }}</p>
		@endif
    	{{ Form::submit('Register', array('class' => 'btn'))}}
	{{ Form::close() }}
	</div>
@stop