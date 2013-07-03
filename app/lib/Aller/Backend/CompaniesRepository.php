<?php

namespace Aller\Backend;

interface CompaniesRepository {
	public function getAll();
	public function getById($id);
}