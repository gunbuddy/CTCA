<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ImportCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'import';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Import cell plans from excell';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		$this->info("Import module from " . $this->option('from'));

		// Path to the file
		$path = base_path() . '/' . $this->option('from');

		// Start the reader
		$reader = PHPExcel_IOFactory::createReader('Excel2007');
		$excel  = $reader->load($path);

		// Get some information about the sheet
		$module       = $this->ask('What module belongs to these data?');
		$sheetNumber  = (int)$this->ask('What is the data sheet?');
		$columnStart  = $this->ask('Where does the data starts? (column coordinate)');

		// Get the sheet
		$sheet = $excel->getSheet(($sheetNumber > 0 ? $sheetNumber-1 : $sheetNumber)); 

		// Get the entity
		$module = ucfirst(strtolower($module));
		$entity = App::make('Aller\Product\\' . $module . '\\' . $module . 'Entity');

		$entityReflection  = new ReflectionClass($entity);
		$entityProperties  = $entityReflection->getProperties();
		$entityCoordinates = array();

		foreach ($entityProperties as $entityProperty)
		{	
			// Ask for the coordinate
			$entityCoordinates[$entityProperty->getName()] = $this->ask('Coordinate for "' . $entityProperty->getName() . '" (row)');
		}

		
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('from', null, InputOption::VALUE_REQUIRED, 'File to import from.', null),
		);
	}

}