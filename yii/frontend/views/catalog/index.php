<?php
/* @var $this yii\web\View */
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use common\models\Good;
use yii\helpers\Html;

$this->title = 'Альфа | Наши работы';
?>

<?php

$dataProvider = new ActiveDataProvider([
    'query' => Good::find()->orderBy('id DESC')->limit(4),
    
]);


echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_workitem',
    'summary' => false,
]);