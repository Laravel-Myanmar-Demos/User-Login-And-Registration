	@extends('layout')

	@section('content')
		<div class="container">
			@if (Session::has('success'))
				<p class="success">{{ Session::get('success') }}</p>
			@endif
			<h1>User Dashboard</h1>
			<p>this is only accessable by logged in user</p>
			<p>Your Email is <strong> {{ Auth::user()->email }}</strong></p>
			<a href="{{ action('UserController@getLogout') }}" class="btn">Logout</a>
		</div>
	@stop