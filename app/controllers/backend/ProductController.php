<?php
namespace Backend;

use View;
use Aller\Backend\CategoriesRepository;
use Aller\Backend\SubcategoriesRepository;
use App;

class ProductController extends \BaseController {
	
	public function __construct(CategoriesRepository $categories, SubcategoriesRepository $subcategories) {

		// Dependent objects injected
		$this->categories    = $categories;
		$this->subcategories = $subcategories;
	}

	public function index($category = null) {

		// Get the whole set of categories
		$categories = $this->categories->getAll();

		// Get the first set of products
		foreach($categories as $category)
		{	
			foreach ($category->subcategories as $subcategory)
			{
				$current = ucfirst(strtolower($subcategory->aller));

				// Initialize the API
				$api = App::make('Aller\Product\\'.$current.'\\'.$current.'Interface');
				
				// Get the products & the count
				$count    = $api->getCount();
				$products = $api->getAll();

				break;
			}

			break;
		}

		return View::make("backend.product.index")->with("current", $subcategory->aller)->with("categories", $categories)->with('count', $count)->with('products', $products);
	}
	public function create() {}
	public function store() {}
	public function show($id) {}
	public function edit($id) {}
	public function update($id) {}
	public function destroy($id) {}
}