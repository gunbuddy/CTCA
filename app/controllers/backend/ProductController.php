<?php

namespace Backend;

use \App;
use \InvalidUserException;
use \Input;

class ProductController extends \BaseController {
	
	public function __construct(\SubcategoriesRepository $subcategories)
	{
		$this->subcategories = $subcategories;
	}

	public function getTest()
	{
		$company = new \Company;
		$company->name = 'Telcel';
		$company->description = 'Dummy description';
		$company->label = 'blue';
		$company->save();

		$company = new \Company;
		$company->name = 'Telmex';
		$company->description = 'Dummy description';
		$company->label = 'blue';
		$company->save();

		return 'right';
	}


	public function postShow($category)
	{
		if (preg_match("/^[a-z]+$/u", $category))
		{
			$class   = ucfirst($category);
			$product = App::make('Aller\Product\\'.$class.'\\'.$class.'Interface');

			// Get the products from the data storage
			$products = $product->getAll();

			return array('list' => $products, 'header' => $product->headers, 'template' => $product->template);
		}
		
		App::abort(500, 'Invalid request.');
	}

	public function postOne()
	{
		$category = Input::get('category');
		$product_id = (int)Input::get('id');

		if (preg_match("/^[a-z]+$/u", $category))
		{
			$class   = ucfirst($category);
			$interface = App::make('Aller\Product\\'.$class.'\\'.$class.'Interface');

			// Get the products from the data storage
			$product = $interface->getOne($product_id);

			return $product;
		}
	}

	public function postUpdate()
	{
		$product_id = (int)Input::get('id');
		$category   = Input::get('category');

		// Check the category before checking products slug
		$category_treatment = strtolower($category);
		$get_subcategory    = $this->subcategories->getByAller($category_treatment);


		if (!$get_subcategory)
		{
			// Subcategory with that aller not found
			App::abort(404, 'Page not found');
		}

		// Get the set of Aller
		$aller = App::make('Aller\Product\\' . ucfirst($category_treatment) .'\\' . ucfirst($category_treatment) . 'Interface');

		$filters = Input::get('fields');
	}
}