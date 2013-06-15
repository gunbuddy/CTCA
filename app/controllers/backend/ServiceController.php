<?php

namespace Backend;

use \View;
use \Auth;
use \Redirect;
use \App;
use \Sentry;

class ServiceController extends \BaseController {

	public function showInterface()
	{
		if (! Sentry::check()) {

			return Redirect::route('backend.login');
		}

		// Get the current user
		$user = Sentry::getUser();


		return View::make('backend.service');
	}
}