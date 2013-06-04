<?php

class Internet extends Eloquent { 
	
	protected $table = 'internet';

	public function company()
	{
		return $this->belongsTo('Company');
	}
}