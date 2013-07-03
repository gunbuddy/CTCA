<?php

namespace Aller\Backend\Repository;

use Aller\Backend\CompaniesRepository;
use Company;

class CompaniesPostgresRepository implements CompaniesRepository {
	
	public function getAll() {
		
		return Company::all();
	}

	public function getById($id) {

		return Company::find($id);
	}
}