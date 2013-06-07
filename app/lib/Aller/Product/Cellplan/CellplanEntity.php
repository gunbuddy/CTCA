<?php

namespace Aller\Product\Cellplan;

class CellplanEntity {
		
	public $name;
	public $fee;
	public $payment_period;

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

}