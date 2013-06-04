<?php

class Cellplan extends Eloquent { 

	public function company()
	{
		return $this->belongsTo('Company');
	}
}