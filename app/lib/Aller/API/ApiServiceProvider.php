<?php

namespace Aller\API;

use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider {
	
	public function register()
	{
		$app = $this->app;

		//...-
		$app->bind('Aller\API\Resource\ComparisonInterface', 'Aller\API\Provider\ComparisonPostgresProvider');
	}
}