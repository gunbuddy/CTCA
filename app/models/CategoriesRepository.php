<?php

interface CategoriesRepository {
	
	public function getCategories();
	public function getCategory($id);
}