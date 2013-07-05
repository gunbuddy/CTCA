<?php
namespace Aller\API\Provider;

use Aller\API\Resource\ComparisonInterface;
use Comparison as Model;

class ComparisonPostgresProvider implements ComparisonInterface {
	
	public function send($level, $meta, $from, $user_id = null)
	{	
		$model = new Model();

		// Save the model
		$model->meta  = $meta;
		$model->level = $level;
		$model->from  = $from;
		$model->user_id = 0;

		$model->save();

		return true;
	}
}