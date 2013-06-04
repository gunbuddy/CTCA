<?php

class Category extends Eloquent { 

	public function subcategories()
	{
		return $this->hasMany('Subcategory');
	}
}