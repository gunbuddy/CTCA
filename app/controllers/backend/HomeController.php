<?php
namespace Backend;

use \Input;
use \View;
use \Auth;
use \Redirect;
use \App;
use \logentries;
use \Sentry;

class HomeController extends \BaseController {

	public function getLogin()
	{ 
		return View::make('backend.login');
	}

	public function postLogin()
	{	
		try {
			
			$credentials = array(
				'email'    => Input::get('email'),
				'password' => Input::get('password')
			);

			$user = Sentry::authenticate($credentials, false);

			return Redirect::to('backend/v1/');

		} 
		catch (\Cartalyst\Sentry\Users\LoginRequiredException $e) 
		{
			return Redirect::route('backend.login')->with('error', 'El correo electronico es necesario para acceder.');
		}
		catch (\Cartalyst\Sentry\Users\PasswordRequiredException $e) 
		{
			return Redirect::route('backend.login')->with('error', 'La contraseña es necesaria para acceder');
		}
		catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		 	return Redirect::route('backend.login')->with('error', 'No se ha encontrado un usuario con ese correo.');   
		}
		catch (\Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
		    return Redirect::route('backend.login')->with('error', 'La contrasea proporcionada es incorrecta.');
		}
		catch (\Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
		    return Redirect::route('backend.login')->with('error', 'La cuenta de administrador esta desactivada.');
		}
		catch (\Cartalyst\Sentry\Throttling\UserSuspendedException $e)
		{
		    return Redirect::route('backend.login')->with('error', 'La cuenta de administrador ha sido suspendida.');
		}
		catch (\Cartalyst\Sentry\Throttling\UserBannedException $e)
		{
		    return Redirect::route('backend.login')->with('error', 'La cuenta de administrador ha sido baneada.');
		}
	}

	public function getTest()
	{
		try {
			Sentry::getGroupProvider()->create(array(
			    'name'        => 'Administrador',
			    'permissions' => array('system' => 1),
			));

			$user = Sentry::getUserProvider()->create(array(
		        'email'    => 'bruce.wayne@example.com',
		        'password' => 'test',
		    ));

			$adminGroup = Sentry::getGroupProvider()->findById(1);

			$user->addGroup($adminGroup);

		} catch (Exception $e) {
			
		}
	}
}