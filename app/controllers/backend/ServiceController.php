<?php

namespace Backend;

use \View;
use \Auth;
use \Redirect;
use \App;

class ServiceController extends \BaseController {

	public function showInterface()
	{
		if (! Auth::check()) {

			return Redirect::route('backend.login');
		}

		// Get the current user
		$user = Auth::user();


		return View::make('backend.service');
	}
}