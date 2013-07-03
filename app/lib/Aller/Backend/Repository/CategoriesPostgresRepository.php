<?php

namespace Aller\Backend\Repository;

use Aller\Backend\CategoriesRepository;
use Category;

class CategoriesPostgresRepository implements CategoriesRepository {
	
	public function getAll(){ 

		return Category::with('subcategories')->get();;
	}

	public function update($model, $fields){ 

	}

	public function findById($id){ 

	}

	public function create($fields){ 

	}
}