<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Catalog;

/* @var $this yii\web\View */
/* @var $model common\models\Good */

$ctitle = $catalogdata->ctitle;	
$this->title = 'Альфа | ' . Html::encode($model->gtitle) ;

?>
<div class="good-view">
<div class="col-md-12">

    <h2><?= Html::encode($model->gtitle) ?></h2>
	<p><?= Yii::$app->formatter->asNtext($model->gdescription) ?></p> 
    <?php
    if(isset($model->image) && file_exists(Yii::getAlias('@webroot', $model->image))) { 
        echo Html::img('@frontendWebroot/uploads/images/' . $model->image, ['style'=>'width:100%']);
    }
        ?>	

<div class="sharebutns">
<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="//yastatic.net/share2/share.js"></script>
<div class="ya-share2" data-services="collections,vkontakte,facebook,odnoklassniki,moimir,gplus,twitter,viber,whatsapp,skype,telegram"></div>
 </div>

 
</div>
    	
	

</div>
