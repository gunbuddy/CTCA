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
	protected $description = 'Import products from excell';

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
		$columnStart  = strtoupper($this->ask('Where does the data starts? (column coordinate)'));
		$columnEnd    = strtoupper($this->ask('Where does the data ends? (column coordinate)'));

		// Get the sheet
		$sheet = $excel->getSheet(($sheetNumber > 0 ? $sheetNumber-1 : $sheetNumber)); 

		// Get the entity
		$module = ucfirst(strtolower($module));
		$entity = App::make('Aller\Product\\' . $module . '\\' . $module . 'Entity');
		$interface = App::make('Aller\Product\\' . $module . '\\' . $module . 'Interface');
		$clousures = $entity->import_clousures();

		$entityReflection  = new ReflectionClass($entity);
		$entityProperties  = $entityReflection->getProperties();
		$entityCoordinates = array();
		$entityCoordinatesSets = array();
		$lastCoordinate = null;
		$automatic = false;
		$automaticCounter = 0;

		foreach ($entityProperties as $entityProperty)
		{	
			$property_name = $entityProperty->getName();

			// Automatic ordered module
			if ($automatic == true)
			{
				$automaticCounter++;
				$entityCoordinates[$property_name] = $automaticCounter;

				continue;
			}

			// Ask for the coordinate
			$entityCoordinates[$property_name] = $this->ask('Coordinate for "' . $property_name . '" (row)');

			if ($entityCoordinates[$property_name] == 'setdefault')
			{
				$entityCoordinatesSets[$property_name] = $this->ask('Default value for "' . $property_name . '"');

				unset($entityCoordinates[$property_name]);

				continue;
			}
			else if($entityCoordinates[$property_name] == 'auto')
			{
				$entityCoordinates[$property_name] = (int)$lastCoordinate + 1;

				$automatic = true;
				$automaticCounter = (int)$lastCoordinate + 1;

				continue;
			}

			$lastCoordinate = $entityCoordinates[$property_name];
		}

		$tree = array();

		// Lets create a tree of column coordinates
		$tree    = array($columnStart);
		$current = $columnStart;

		while ($current != $columnEnd) 
		{
		    $tree[] = ++$current;
		}

		foreach ($tree as $item)
		{
			$this->info('Importing column ' . $item . '. wait....');

			// Make a new entity
			$item_entity = App::make('Aller\Product\\' . $module . '\\' . $module . 'Entity');

			foreach ($entityProperties as $entityProperty)
			{
				$property_name = $entityProperty->getName();

				// Look for default values
				if (isset($entityCoordinatesSets[$property_name]))
				{
					$item_entity->$property_name = $entityCoordinatesSets[$property_name];
				}
				else
				{
					// Get the value from the sheet
					$property_coordinate = $item . $entityCoordinates[$property_name];
					$property_value = $sheet->getCell($property_coordinate)->getValue();

					// Use the string callback if exists
					if (isset($clousures[$property_name]) == true)
					{
						$property_value = $clousures[$property_name]($property_value);
					}

					$item_entity->$property_name = $property_value;
				}
			}

			// Use the repo to save it or whatever it does
			$interface->createOne($item_entity);

			sleep(2);
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