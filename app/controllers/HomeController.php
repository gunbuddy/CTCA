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

	public function __construct(CategoriesRepository $categories)
	{
		$this->categories = $categories;
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

	public function showHome()
	{
		
	}
}