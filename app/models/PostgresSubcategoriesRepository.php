<?php

class PostgresSubcategoriesRepository implements SubcategoriesRepository {
	
	public function getByAller($aller)
	{
		return Subcategory::where('aller', $aller)->first();
	}
}