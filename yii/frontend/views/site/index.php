<?php
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use frontend\models\Category;
use frontend\models\Production;

/* @var $this yii\web\View */

$this->title = 'Альфа | Рекламное агентство, Нальчик';
?>

<?php

$dataProvider = new ActiveDataProvider([
    'query' => Production::find()->where(['promo' => 1])->orderBy('id DESC')->limit(4),
    
]);

echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_workitem',
    'summary' => false,
	'emptyText' => '',
	
]);
