<?php

namespace Aller\Backend;

interface SubcategoriesRepository {
	
	public function getByAlias($alias);
}