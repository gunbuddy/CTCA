<?php

use \App;

namespace Aller\Product;

class Earth {
	
	public static function getProvider($category)
	{
		$category = ucfirst(strtolower($category));

		// Get the implementation
		$provider = \App::make('Aller\Product\\'.$category.'\\'.$category.'Interface');

		return $provider;
	}	
}