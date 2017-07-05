<?php
namespace common\helpers;

use backend\models\Production;
use backend\models\Category;

class getLinks
{

public static function getLinks()
	{
			$rows = Category::find()
			->joinWith('productions')
            ->where(['production.promo' => 1])
            ->all();

		
	    foreach($rows as $rw){

			echo "<li><a href='#' data-filter='.".$rw['id']."'>".$rw['ctitle']."</a></li>";
	
	    }
	
	
	}



}

	
	
?>
