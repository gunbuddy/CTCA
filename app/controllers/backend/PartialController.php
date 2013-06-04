<?php

namespace Backend;

use \View;
use \App;

class PartialController extends \BaseController {
	
	public function showTemplate($partial)
	{
		return View::make('backend.partials.' . $partial);
	}
}