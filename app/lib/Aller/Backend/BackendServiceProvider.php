<?php

namespace Aller\Backend;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider {

	public function register()
	{
		$app = $this->app;

		$app->bind('Aller\Backend\CategoriesRepository',    'Aller\Backend\Repository\CategoriesPostgresRepository');
		$app->bind('Aller\Backend\SubcategoriesRepository', 'Aller\Backend\Repository\SubcategoriesPostgresRepository');
		$app->bind('Aller\Backend\CompaniesRepository',     'Aller\Backend\Repository\CompaniesPostgresRepository');
	}
}