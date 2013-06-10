<?php

namespace Aller\Product\Cellplan;

class CellplanEntity {
		
	public $name;
	public $fee;
	public $payment;
	public $billing;
	public $company;
	public $networks;

	public $minutes_tolocal;
	public $minutes_toany;
	public $minutes_tosame;
	public $minutes_toother;

	public $seconds_tolocal;
	public $seconds_toany;
	public $seconds_tosame;
	public $seconds_toother;

	public $balance_tonational;
	public $balance_tolocal;
	public $balance_tosame;
	public $balance_toother;

	public $free_numbers_same;
	public $free_numbers_other;

	public $messages;
	public $internet;
	public $radio;

	public $additional_minute_any_national;
	public $additional_minute_any_local;
	public $additional_minute_tosame;
	public $additional_minute_toother;
	public $additional_minute_tolocal;

	public $additional_second_any_national;
	public $additional_second_any_local;
	public $additional_second_tosame;
	public $additional_second_toother;
	public $additional_second_tolocal;

	public $additional_message;
	public $additional_internet_kb;
	public $additional_internet_mb;
	public $additional_mms;
	public $additional_information;
	public $promotions;

	public function import_clousures()
	{
		return array(
			'payment' => function($string) {

				// Set the value
				return ($string == 'Minuto') ? 'minute' : 'second';
			},
			'fee' => function($string) { return ($string == 'N/A') ? 0 : $string; },
			'networks' => function($string) { return serialize(array('network4g' => true, 'network3g' => true, 'network2g' => true)); },
			'messages' => function($string) { return ($string == 'N/A') ? 0 : $string; },
			'minutes_tolocal' => function($string) { return ($string == 'N/A') ? 0 : $string; },
			'minutes_toany'   => function($string) {   return ($string == 'N/A') ? 0 : $string; },
			'minutes_tosame'  => function($string) {  return ($string == 'N/A') ? 0 : ($string == 'Ilimitados' ? -1 : (int)$string); },
			'minutes_toother' => function($string) { return ($string == 'N/A') ? 0 : $string; },
			'seconds_tolocal' => function($string) { return ($string == 'N/A') ? 0 : $string; },
			'seconds_toany'   => function($string) { return ($string == 'N/A') ? 0 : $string; },
			'seconds_tosame'  => function($string) { return ($string == 'N/A') ? 0 : $string; },
			'seconds_toother' => function($string) { return ($string == 'N/A') ? 0 : $string; },
			'balance_tonational' => function($string) { return ($string == 'N/A') ? 0 : $string; },
			'balance_tolocal' => function($string) { return ($string == 'N/A') ? 0 : $string; },
			'balance_tosame'  => function($string) { return ($string == 'N/A') ? 0 : $string; },
			'balance_toother' => function($string) { return ($string == 'N/A') ? 0 : $string; },
			'free_numbers_same'  => function($string) { return ($string == 'N/A') ? 0 : $string; },
			'free_numbers_other' => function($string) { return ($string == 'N/A') ? 0 : $string; },

			'internet' => function($string) { 

				if ($string == 'Ilimitado') {
					return -1;
				}

				$e = explode(' ', $string);
				$n = (int)$e[0];
				if ($e[1] == 'GB') $n = $n * 1024;
				return (int)$n; 
			},
			'radio' => function($string) { return ($string == 'Si') ? true : false; },
			'additional_minute_any_national'  => function($string) { return ($string == 'N/A') ? 0 : $string; },
			'additional_minute_any_local' => function($string) { return ($string == 'N/A') ? 0 : $string; },
			'additional_minute_tosame' => function($string) { return ($string == 'N/A') ? 0 : $string; },
			'additional_minute_toother' => function($string) { return ($string == 'N/A') ? 0 : $string; },
			'additional_minute_tolocal'  => function($string) { return ($string == 'N/A') ? 0 : $string; },
			'additional_second_any_national' => function($string) { return ($string == 'N/A') ? 0 : $string; },
			'additional_second_any_local'  => function($string) { return ($string == 'N/A') ? 0 : $string; },
			'additional_second_tosame' => function($string) { return ($string == 'N/A') ? 0 : $string; },
			'additional_second_toother' => function($string) { return ($string == 'N/A') ? 0 : $string; },
			'additional_second_tolocal' => function($string) { return ($string == 'N/A') ? 0 : $string; },
			'additional_message' => function($string) { return ($string == 'N/A') ? 0 : $string; },
			'additional_internet_kb'  => function($string) { return ($string == 'N/A') ? 0 : $string; },
			'additional_internet_mb'  => function($string) { return ($string == 'N/A') ? 0 : $string; },
			'additional_mms'  => function($string) { return ($string == 'N/A') ? 0 : $string; },
		);
	}
}