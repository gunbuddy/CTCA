<?php

class AssistController extends BaseController {
	
	public function showFirstSetup()
	{
		return View::make('assist.first');
	}
}