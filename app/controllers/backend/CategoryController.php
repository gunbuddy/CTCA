<?php
namespace Backend;

use \Aller\Backend\CategoriesRepository;
use \Aller\Backend\SubcategoriesRepository;
use \App;

class CategoryController extends \BaseController {

	public function __construct(CategoriesRepository $categories, SubcategoriesRepository $subcategories)
	{
		// Dependent objects injected
		$this->categories    = $categories;
		$this->subcategories = $subcategories;
	}

	public function showCategory($id) {

		$category = $this->categories->findById($id);

		return View::make();
	}

	public function showStats($id) {

		return View::make();
	}

	public function showSubcategories($id) { 

		// Use DI for the model methods
		$categories = $this->categories->findById($id);

		return 'subcategories from ' . $id;
	}
	public function showReports($id) {

		return View::make();
	}

	public function updateProduct() { 

		return View::make();
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = $this->categories->getCategories();

		foreach ($categories as $category)
		{
			foreach ($category->subcategories as $subcategory)
			{
				// Count the products inside the subcategory
				$class   = ucfirst($subcategory->aller);
				$product = App::make('Aller\Product\\'.$class.'\\'.$class.'Interface');

				$subcategory->count = $product->getCount();
			}
		}

		return $categories;
	}
}