<?php
namespace common\helpers;
use yii\helpers\Url;
use common\models\Good;
use common\models\Catalog;

class getCatalogLinksSidebar
{

public static function getLinks()
	{
			$rows = Catalog::find()
            ->all();
			

		
	    foreach($rows as $rw){			
			echo '<li><a href="';			
			echo Url::toRoute(['catalog/view', 'id' => $rw['id']]);                      			
			echo '">'.$rw['ctitle'].'</a></li>';
             	
	    } 
	
	
	}



}

	
	
?>
