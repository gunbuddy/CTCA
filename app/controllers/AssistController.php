<?php

class AssistController extends BaseController {
	
	public function showFirstSetup()
	{
		return View::make('assist.first');
	}

	public function magicChoose()
	{
		// Get the API instance
		$aller = Aller\Product\Earth::getProvider("cellplan");

		// Messages
		$messages = array(
			1 => array(
				'from' => 1,
				'to' => 4
			),
			2 => array(
				'from' => 5,
				'to' => 10
			),
			3 => array(
				'from' => 11,
				'to' => 20
			),
			4 => array(
				'from' => 20,
				'to' => 0
			)
		);	

		$messages_ = $messages[Input::get('messages')];

		$compare = $aller->getRecomended($messages_, Input::get('fee'));

		$link = '';

		$normalize = function($string) {
		    $table = array(
		        'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
		        'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
		        'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
		        'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
		        'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
		        'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
		        'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
		        'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r',
		    );

		    return strtr($string, $table);
		};

		foreach($compare as $product)
		{
			$name = str_replace(' ', '-',  $normalize($product->name));

			if ($link == '')
			{
				$link = $product->id . '-' . $name;
			}
			else
			{
				$link .= '-vs-' . $product->id . '-' . $name;
			}
		}

		$link = action('HomeController@showComparison', array('category' => 'cellplan', 'slug' => $link));

		return $link;
	}
}