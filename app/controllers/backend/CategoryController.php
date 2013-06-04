<?php
namespace Backend;

use \CategoriesRepository;
use \App;

class CategoryController extends \BaseController {

	public function __construct(CategoriesRepository $categories)
	{
		$this->categories = $categories;
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

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$category = $this->categories->getCategory($id);

		return (!$category) ? array() : $category;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}