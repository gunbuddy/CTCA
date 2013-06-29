<?php

namespace Aller\Backend;

interface CategoriesRepository {
	
	public function getAll();
	public function update($model, $fields);
	public function findById($id);
	public function create($fields);
}