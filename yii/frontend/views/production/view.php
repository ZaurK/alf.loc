<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\Category;
use frontend\models\Production;
use frontend\models\Image;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\models\Good */

$datas = Category::find()
    ->where(['id' => $model->id_category])
    ->one();
		
$this->title = 'Альфа | ' . Html::encode($datas->ctitle). ' - ' . Html::encode($model->ptitle) ;
//$this->params['breadcrumbs'][] = ['label' => 'Услуги', 'url' => ['category/index']];
$this->params['breadcrumbs'][] = ['label' => $datas->ctitle, 'url' =>['category/view', 'id' => $datas->id]];
$this->params['breadcrumbs'][] = ['label' => $model->ptitle, ];
?>
<?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [], ])?>
<div class="good-view">
<div class="row">
<div class="col-sm-12 col-md-6">
<br>
 <?php
 $images = Image::find()
      ->where(['id_production' => $model->id])
	  ->all();
	  foreach($images as $image){
	      if(isset($image['imagePath']) && file_exists(Yii::getAlias('@webroot', $image['imagePath']))) { 	
		     echo "<div class='imgs'>";
             echo Html::a(Html::img("@frontendWebroot/uploads/images/thumbs/$image->imagePath"), 
			 "@frontendWebroot/uploads/images/$image->imagePath", 
			 ['rel' => 'fancybox',  'style'=>'max-width:100%']);
			 echo "</div>";
	      }
	  }
    
 ?>			

<div class="sharebutns">
<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="//yastatic.net/share2/share.js"></script>
<div class="ya-share2" data-services="collections,vkontakte,facebook,odnoklassniki,moimir,gplus,twitter,viber,whatsapp,skype,telegram"></div>
 </div>

 
</div>
<div class="col-sm-12 col-md-6">
    <h2><?= Html::encode($model->ptitle) ?></h2>
	<p><?= Yii::$app->formatter->asNtext($model->pdescription) ?></p> 
</div>    	
</div>	

</div>
<div class="clearfix"></div>
<br><br>