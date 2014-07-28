<?php

class UserController extends BaseController {


	public function __construct()
    {
        $this->beforeFilter('auth', array(
        		'only' => array(
        			'getIndex',
        			'getLogout'
        		)
        	));	
    }

	/**
	 * User Dashboard
	 *
	 **/
	public function getIndex()
	{
		return View::make('index');
	}


	/**
	 * Display Registration Form
	 *
	 **/
	public function getRegister()
	{
		return View::make('register');
	}

	/**
	 * Register a user
	 *
	 **/
	public function postRegister()
	{
		// Set validation rules
		$validationRules = array(
			'email' => 'required|unique:users|email',
			'password' => 'required|min:6',
			'confirm-password' => 'required|same:password'
		);

		// Validate
		$validator = Validator::make(Input::all(),$validationRules);

		// If validation fails
		if ($validator->fails()) {

			// Redirect to UserController@getRegister
			return Redirect::action('UserController@getRegister')
							->withErrors($validator)
							->withInput();

		} 

		// If validation passes
		else {

			// Insert new user
			$user = new User;
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password')); // Hash the plain password
			$user->save();

			// Redirect to UserController@getLogin with message
			return Redirect::action('UserController@getLogin')
							->withSuccess('User created. Now, you can login');
		}
		
		
	}

	/**
	 * Login page
	 *
	 **/
	public function getLogin()
	{
		return View::make('login');
	}

	/**
	 * Login a user
	 *
	 **/
	public function postLogin()
	{
		// Set validation rules
		$validationRules = array(
			'email' => 'required|email',
			'password' => 'required|min:6'
		);

		// Validate
		$validator = Validator::make(Input::all(),$validationRules);

		if ($validator->fails()) {

			// Redirect to UserController@getLogin
			return Redirect::action('UserController@getLogin')
							->withErrors($validator)
							->withInput();

		} 

		// If validation passes
		else {

			// if login informations were correct
			if (Auth::attempt(array(
					'email' => Input::get('email'),
					'password' => Input::get('password'))
				))
			{
    			// Redirect to UserController@getLogin with message
				return Redirect::action('UserController@getIndex')
							->withSuccess('You are now logged in. Enjoy!');
			}


			// if login informations were incorrect
			return Redirect::action('UserController@getLogin')
							->withError('Email or Password incorrect');
		}
	}

	/**
	 * Logout
	 *
	 **/
	public function getLogout()
	{
		Auth::logout();
		return Redirect::action('UserController@getLogin');
	}


}