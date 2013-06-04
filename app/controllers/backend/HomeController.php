<?php
namespace Backend;

use \Input;
use \View;
use \Auth;
use \Redirect;
use \App;
use \logentries;

class HomeController extends \BaseController {

	public function showLogin()
	{ 
		return View::make('backend.login');
	}

	public function getLogin()
	{
		// Check if the user has sent the login form
		if (Input::has('email') AND Input::has('password'))
		{
			// Get both email and password
			$email = Input::get('email', '');
			$password = Input::get('password', '');

			// Check both emptiness
			if (empty($email) OR empty($password))
			{
				return Redirect::route('backend.login')->with('error', 'Ha habido un error comprobando sus credenciales, intente nuevamente.');
			}

			if (Auth::attempt(array('email' => $email, 'password' => $password)))
			{	
				return Redirect::to('backend/v1/');
			}

			return Redirect::route('backend.login')->with('error', 'Ha habido un error comprobando sus credenciales, intente nuevamente.');
		}

		return Redirect::route('backend.login')->with('error', 'Ha habido un error comprobando sus credenciales, intente nuevamente.');
	}
}