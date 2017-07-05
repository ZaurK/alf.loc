<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'dt',
            'title',
            //'text:ntext',
            //'public',
            // 'm_title',
            // 'm_keywords',
            // 'm_description',

            //['class' => 'yii\grid\ActionColumn'],
			[
            'class' => 'yii\grid\ActionColumn',
            'header'=>'Действия', 
            'headerOptions' => ['width' => '10'],
            'template' => '{view} {update} {delete}{link}',
        ],
        ],
        'tableOptions' => [
            'class' => 'table table-striped table-bordered'
        ],
    ]); ?>
    </div>
</div>
