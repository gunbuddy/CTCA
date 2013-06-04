<?php

class ProductTest extends TestCase {

	public function getProducts()
	{
		$response = $this->call('GET', 'user/profile');
	}
}