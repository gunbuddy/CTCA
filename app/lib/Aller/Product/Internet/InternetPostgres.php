<?php

namespace Aller\Product\Internet;

use Aller\Product\ProductInterface;
use Aller\Product\Internet\InternetInterface;
use \Internet;

class InternetPostgres implements ProductInterface, InternetInterface {
	
	public $template = 'list-internet.html';
	public $headers  = 'header-internet.html';

	public function getAll() 
	{
		return Internet::all();
	}

	public function getList($list)
	{
		if (!is_array($list)) return false;

		return Internet::whereIn('id', $list)->get();
	}

	public function getPaged($take, $skip, $order)
	{
		// Some query mysql fancy stuff
		$query = Internet::with('company')->skip($skip)->take($take)->remember(60)->get()->toArray();

		return $query;
	}

	public function updateById($id, $fields)
	{

	}
	
	public function getOne($id)
	{
		$query = Internet::with('company')->find($id);

		return $query;
	}

	public function findOne($id)
	{

	}

	public function getCount()
	{
		return Internet::remember(30)->count();
	}

	public function createOne($repository)
	{
		
	}
} 