<?php
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use frontend\models\Category;
use frontend\models\Production;
use frontend\models\Image;

/* @var $this yii\web\View */

$this->title = 'Альфа | Рекламное агентство, Нальчик';
?>

<?php

$dataProvider = new ActiveDataProvider([
    'query' => Production::find()
	          ->joinWith('image')
			  ->where(['image.id_production' => 'id'])
	          ->where(['promo' => 1])
			  ->orderBy('id DESC')->limit(40),
    'pagination' => false,
]);


echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_workitem',
    'summary' => false,
	'emptyText' => '',
	
]);
