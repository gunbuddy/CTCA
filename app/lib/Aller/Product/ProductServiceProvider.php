<?php

namespace Aller\Product;

use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider {

	public function register()
	{
		$app = $this->app;

		$app->bind('Aller\Product\Cellplan\CellplanInterface', 'Aller\Product\Cellplan\CellplanPostgres');
		$app->bind('Aller\Product\Internet\InternetInterface', 'Aller\Product\Internet\InternetPostgres');
		//-...
	}
}