<?php
namespace common\helpers;
use yii\helpers\Url;
use backend\models\Category;

class getCategoryLinksSidebar
{

public static function getLinks()
	{
			$rows = Category::find()
            ->where(['category.status' => 1])
			->andWhere (['id_parent' => NULL])
            ->all();
			
?>
 <ul class="nav topul">
<?php 
	    foreach($rows as $rw){
			
			
			echo '<li class="topli"><a href="';			
			echo Url::toRoute(['category/view', 'id' => $rw['id']]);                      			
			echo '" style="background-color:'.$rw['ccolor'].'">'.$rw['ctitle'].'</a></li>';
             
                echo '<ul class="innerul">';			 
			
			         $rowsin = Category::find()
                               ->where(['category.status' => 1])
                                          ->andWhere (['id_parent' => $rw['id']])
                               ->all();
                                                              
                                                               foreach($rowsin as $rwin){
                                                                   echo '<li><a href="';
																   echo Url::toRoute(['category/view', 'id' => $rwin['id']]);    
																   echo '">'.$rwin['ctitle'].'</a></li>';
                                                             } 
			
			    echo '</ul>';							
	
	    } 
?>
</ul>	
<?php	
	}



}

	
	
?>
