<?php

namespace Aller\Product\Cellplan;

class CellplanEntity {
	
	public $minutes;
	public $messages;
	public $rating;
	public $internet;
	public $fee;

	public $name;
	public $company;

	public function __construct($entity, $cellplan)
	{
		$this->companies = $cellplan->getCompanies();

		// Month fee
		$this->fee       = $entity->fee;
	}

	public function priority()
	{

	}

	public function matchCalls($day, $outbound)
	{
		$calls = 0;

		// Use random calls for the days
		for ($i=0; $i < 25; $i++) { 
			
			$calls += mt_rand($day['from'], $day['to']);
		}

		// Lets say every call has a duration of 5 minutes
		$minutes_usage = $calls * 5;

		$undirectional = false;

		foreach ($this->companies as $company)
		{
			if ($outbound[$company->id] == true)
			{
				$undirectional = true;

				break;
			}
		}

		if ($undirectional == false)
		{
			if ($this->minutes['tosame'] == -1 OR $this->minutes['toothers'] == -1 OR $this->minutes['toany'] == -1 OR $this->minutes['tolocal'] == -1)
			{
				return true;
			}

			$minutes = $this->minutes['tosame'] + $this->minutes['toothers'] + $this->minutes['toany'] + $this->minutes['tolocal'];

			if ($minutes-100 > $minutes_usage AND $minutes+100 <= $minutes_usage)
			{
				return true;
			}

			return false;
		}
		else
		{
			$same = false;
			$other = 0;

			foreach ($this->companies as $company)
			{
				if ($outbound[$company->id] == true && $this->company->id == $company->id)
				{
					$same = true;
				}
				else if ($outbound[$company->id] == true && $this->company->id != $company->id)
				{
					$other++;
				}
			}

			if ($same == true AND $other == 0 AND ($this->minutes['tolocal'] == -1 OR $this->minutes['tosame'] >= $minutes_usage OR $this->minutes['toany'] >= $minutes_usage)) return true;

			return false;
		}
	}

	public function matchInternet($internet)
	{

	}

	public function matchFee($fee)
	{

		if ($this->fee > $fee['from'] && $this->fee <= $fee['to'])
		{
			return true;
		}

		return false;
	}
}