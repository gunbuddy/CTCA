<?php

namespace Aller\Product\Cellplan;

use Aller\Product\ProductInterface;
use Aller\Product\Cellplan\CellplanInterface;
use Aller\Product\Cellplan\CellplanEntity;
use \Cellplan;

class CellplanPostgres implements ProductInterface, CellplanInterface {
	
	public $template = 'list-cellplan.html';
	public $headers  = 'header-cellplan.html';

	public function getAll() 
	{
		return Cellplan::with('company')->get()->toArray();
	}

	public function getList($list)
	{
		if (!is_array($list)) return false;

		return Cellplan::whereIn('id', $list)->get();
	}

	public function getPaged($take, $skip, $filters)
	{
		// Some query mysql fancy stuff
		$query = Cellplan::with('company')->skip($skip)->take($take);

		// Filters
		foreach ($filters as $filter_id => $filter)
		{
			if ($filter[0] == 'range')
			{
				$query->where($filter_id, '>=', $filter[1]['from']);
				$query->where($filter_id, '<=', $filter[1]['to']);
			}
		}

		return $query->remember(60)->get()->toArray();
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

	public function createOne($repository)
	{

		$make = new Cellplan;

		$make->name = $repository->name;
		$make->company_id = $repository->company;
		$make->fee = $repository->fee;

		$make->payment = $repository->payment;
		$make->billing = $repository->billing;
		$make->networks= $repository->networks;

		$make->minutes_tolocal = $repository->minutes_tolocal;
		$make->minutes_toany   = $repository->minutes_toany;
		$make->minutes_tosame  = $repository->minutes_tosame;
		$make->minutes_toother = $repository->minutes_toother;

		$make->seconds_tolocal = $repository->seconds_tolocal;
		$make->seconds_toany   = $repository->seconds_toany;
		$make->seconds_tosame  = $repository->seconds_tosame;
		$make->seconds_toother = $repository->seconds_toother;

		$make->balance_tonational = $repository->balance_tonational;
		$make->balance_tolocal    = $repository->balance_tolocal;
		$make->balance_tosame     = $repository->balance_tosame;
		$make->balance_toother    = $repository->balance_toother;

		$make->free_numbers_tosame = $repository->free_numbers_same;
		$make->free_numbers_toother= $repository->free_numbers_other;

		$make->messages = $repository->messages;
		$make->internet = $repository->internet;
		$make->radio = $repository->radio;
		$make->internet_speed = 0.0;

		$make->additional_minute_any_national = $repository->additional_minute_any_national;
		$make->additional_minute_any_local = $repository->additional_minute_any_local;
		$make->additional_minute_tosame = $repository->additional_minute_tosame;
		$make->additional_minute_toother = $repository->additional_minute_toother;
		$make->additional_minute_tolocal = $repository->additional_minute_tolocal;

		$make->additional_second_any_national = $repository->additional_second_any_national;
		$make->additional_second_any_local = $repository->additional_second_any_local;
		$make->additional_second_tosame = $repository->additional_second_tosame;
		$make->additional_second_toother = $repository->additional_second_toother;
		$make->additional_second_tolocal = $repository->additional_second_tolocal;

		$make->additional_message = $repository->additional_message;
		$make->additional_internet_kb = $repository->additional_internet_kb;
		$make->additional_internet_mb = $repository->additional_internet_mb;
		$make->additional_mms = $repository->additional_mms;

		$make->additional_information = $repository->additional_information;
		$make->promotions = $repository->promotions;

		$make->save();

		return true;
	}
} 