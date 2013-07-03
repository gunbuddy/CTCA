<?php

namespace Backend;

use View;
use App;
use Aller\Backend\CompaniesRepository;

class CompanyController extends \BaseController {
	
	public function __construct(CompaniesRepository $companies) {

		$this->companies = $companies;
	}

	public function index() { 

		// Get the full set of companies
		$companies = $this->companies->getAll();
		$count = $companies->count();

		return View::make('backend.company.index')->with("companies", $companies)->with("count", $count);
	}
	public function create() {}
	public function store() {}
	public function show($id) {

		// Get the full set of companies
		$companies = $this->companies->getAll();
		$count   = $companies->count();
		$company = $this->companies->getById($id);

		return View::make('backend.company.show')->with("company", $company)->with("companies", $companies)->with("count", $count);
	}
	public function edit($id) {}
	public function update($id) {}
	public function destroy($id) {}
}