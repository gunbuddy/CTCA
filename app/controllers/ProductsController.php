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
			$take   = Input::get('take', 10);
			$skip   = Input::get('skip', 0);
			$filter = Input::get('filter', '');
			$filters= array();

			if (preg_match("/([a-zA-z_]+@(([0-9]+:[0-9]+;?)))/u", $filter))
			{
				// Lets divide the filters
				$split = explode(';', $filter);

				foreach ($split as $filter_item)
				{
					$split_name_and_type = explode('@', $filter_item);

					$filters[$split_name_and_type[0]] = array();

					// Range matching
					if (preg_match("/([0-9]+:[0-9]+)/u", $split_name_and_type[1]))
					{
						$temp_split = explode(':', $split_name_and_type[1]);

						$filters[$split_name_and_type[0]] = array('range', array('from' => (float)$temp_split[0], 'to' => (float)$temp_split[1]));
					}
				}
			}

			$products = $aller->getAll();

			return $products;
		}
	}

	public function showProduct($category, $id, $slug)
	{	

		// Get the provider for the category
		$aller = Aller\Product\Earth::getProvider($category);

		// Get the product
		$product = $aller->getOne($id);

		return View::make('product.summary')->with('product', $product);
	}
}