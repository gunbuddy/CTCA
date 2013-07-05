<?php
namespace Aller\API;

use App as Application;

class Comparison {
	
	public static function getProvider() {

		$provider = Application::make('Aller\API\Resource\ComparisonInterface');

		return $provider;
	}
}