<?php

namespace Aller\Product\Cellplan;

use Aller\Product\ProductInterface;
use Aller\Product\Cellplan\CellplanInterface;
use \Cellplan;

class CellplanPostgres implements ProductInterface, CellplanInterface {
	
	public $template = 'list-cellplan.html';
	public $headers  = 'header-cellplan.html';

	public function getAll() 
	{

	}

	public function getPaged($take, $skip, $order)
	{
		// Some query mysql fancy stuff
		$query = Cellplan::with('company')->skip($skip)->take($take)->remember(60)->get()->toArray();

		return $query;
	}

	public function getOne($id)
	{
		$query = Cellplan::with('company')->find($id);

		$query->networks = unserialize($query->networks);

		return $query;
	}

	public function findOne($id)
	{

	}

	public function getCount()
	{
		return Cellplan::remember(30)->count();
	}
} 