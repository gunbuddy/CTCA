<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function __construct(CategoriesRepository $categories, SubcategoriesRepository $subcategories)
	{
		$this->categories = $categories;
		$this->subcategories = $subcategories;
	}

	public function showCategories()
	{
		$categories = $this->categories->getCategories();

		return View::make('categories')->with('categories', $categories);
	}

	public function showCategory($category)
	{
		$categories = $this->categories->getCategories();

		foreach ($categories as $cat)
		{
			foreach ($cat->subcategories as $subcat)
			{
				if (Str::slug($subcat->name) == $category)
				{
					$subcategory = $subcat;
					return View::make('subcategory')->with('subcategory', $subcategory);
				}
			}
		}

		App::abort(404, 'Page not found');
	}

	public function showComparison($category, $slug)
	{

		// Check the category before checking products slug
		$category_treatment = strtolower($category);
		$get_subcategory    = $this->subcategories->getByAller($category_treatment);

		if (!$get_subcategory)
		{
			// Subcategory with that aller not found
			App::abort(404, 'Page not found');
		}

		// Get the aller class
		$className = ucfirst($category_treatment);
		$aller = App::make("Aller\Product\\{$className}\\{$className}Interface");

		$split = explode('-vs-', $slug);

		if (isset($split[1]) == false)
		{
			// Incorrect slug typing
			App::abort(404, 'Page not found');
		}

		$products = count($split);
		$list = array();
		$product = array();

		// Lets get the product's id
		foreach ($split as $product_slug)
		{
			if (!preg_match("/^[0-9]+\\-([a-zA-Z0-9\\-]+)$/u", $product_slug))
			{
				// Incorrect slug typing
				App::abort(404, 'Page not found');
			}

			$product_slug_split = explode('-', $product_slug);
			$list[] = (int)$product_slug_split[0];
		}


		// Get the products from the list of ids
		$product = $aller->getList($list);

		if ($product->count() < $products)
		{
			// There's a wrong product id
			App::abort(404, 'Page not found');
		}

		return View::make('compare')->with('products', $product)->with('subcategory', $get_subcategory);
	}

	public function showHome()
	{
		
	}
}