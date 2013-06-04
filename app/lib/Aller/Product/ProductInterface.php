<?php
namespace Aller\Product;

interface ProductInterface {
	
	public function getAll();
	public function getPaged($take, $skip, $order);
	public function getOne($id);
	public function findOne($id);
	public function getCount();
}