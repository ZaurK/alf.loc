<?php
/* @var $this yii\web\View */

use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use common\models\Good;

$this->title = 'Альфа | ' . Html::encode($model->ctitle) ;
?>

<h2><?= Html::encode($model->ctitle) ?></h2>

<p>
    <?= $model->cdescription ?>
</p>
<br>
<?php

$dataProvider = new ActiveDataProvider([
    'query' => Good::find()->where(['catalog_id' => $model->id])->orderBy('id DESC'),
    'pagination' => [
        'pageSize' => 12,
    ],
]);


$widget = ListView::begin([
    'dataProvider' => $dataProvider,
	 'itemView' => '_workitem',
    'summary' => false,
	'emptyText' => '',

]); ?>

<ul class="cam-list row clearfix">
    <?php echo $widget->renderItems();  ?>
</ul>
<?php echo $widget->renderPager(); ?>