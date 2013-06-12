<?php

class ProductsController extends BaseController {
	
	public function showProducts($category)
	{
		$aller = App::make('Aller\Product\\' . ucfirst($category) .'\\' . ucfirst($category) . 'Interface');

		if ($aller)
		{
			$products = $aller->getPaged(10, 0, false);

			return $products;
		}
	}
}