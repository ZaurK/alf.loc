<?php
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use backend\models\Service;

/* @var $this yii\web\View */

$this->title = 'Альфа | Наши услуги';
?>

<?php

$dataProvider = new ActiveDataProvider([
    'query' => Service::find()->orderBy('id DESC'),
    
]);



