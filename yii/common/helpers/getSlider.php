<?php
namespace common\helpers;

use backend\models\Topslider;
use yii\helpers\Html;

class getSlider
{

public static function getSlider()
	{
			$rows = Topslider::find()
            ->where(['topslider.status' => 1])
            ->all();
			
		
	echo '
		     <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
             <!-- Indicators -->
             <ol class="carousel-indicators">
			 ';
			 foreach($rows as $rw){
		         echo "<li data-target='#carousel-example-generic' data-slide-to=".$rw['id']."></li>";
		     }
             echo '</ol>
             <!-- Wrapper for slides -->
             <div class="carousel-inner">		
		     ';
		
	    foreach($rows as $rw){
			echo "<div class='item'>"
			. Html::img('@frontendWebroot/uploads/slider/thumb/' . $rw['image'], ['class'=>''])
            . "</div>";
	
	    }
		
	echo '
		      <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>             
              <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a> 	
		 ';
	
	}



}

	
	
?>
