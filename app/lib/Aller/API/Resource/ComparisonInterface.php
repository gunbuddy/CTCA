<?php

namespace Aller\API\Resource;

interface ComparisonInterface {
	
	public function send($level, $meta, $from, $user_id = null);
}