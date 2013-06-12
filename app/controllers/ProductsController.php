<?php

class ProductsController extends BaseController {
	
	public function __construct(SubcategoriesRepository $subcategories)
	{
		$this->subcategories = $subcategories;
	}
	
	public function showProducts($category)
	{
		// Check the category before checking products slug
		$category_treatment = strtolower($category);
		$get_subcategory    = $this->subcategories->getByAller($category_treatment);

		if (!$get_subcategory)
		{
			// Subcategory with that aller not found
			App::abort(404, 'Page not found');
		}

		$aller = App::make('Aller\Product\\' . ucfirst($category_treatment) .'\\' . ucfirst($category_treatment) . 'Interface');

		if ($aller)
		{
			$products = $aller->getPaged(10, 0, false);

			return $products;
		}
	}


}