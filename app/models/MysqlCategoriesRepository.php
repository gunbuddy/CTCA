<?php

class MysqlCategoriesRepository implements CategoriesRepository {
	
	public function getCategories()
	{
		return Category::with('subcategories')->get();
	}

	public function getCategory($id)
	{
		return Category::find($id);
	}
}