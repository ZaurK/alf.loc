<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TopsliderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Слайдер';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="topslider-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	 <div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
           
           
			//'image:image',
			[
            'label' => 'Картинка',
            'format' => 'raw',
            'value' => function($data){
                return Html::img('@frontendWebroot/uploads/slider/thumb/' .$data->image, [
                    'alt'=>'',
                    'style' => 'width:100%;'
                ]);
            },
			 'contentOptions'=>['style'=>'max-width: 200px;'] 
            ],
		    'stitle',
			//'status',
			[
			    'label' => 'Статус',
				'value' => 'status',
				'contentOptions'=>['style'=>'max-width: 100px;'] 
			
			],
            

            //['class' => 'yii\grid\ActionColumn'],
			[
            'class' => 'yii\grid\ActionColumn',
            'header'=>'Действия', 
            'headerOptions' => ['width' => '10'],
            'template' => '{view} {update} {delete}{link}',
            ],
        ],
    ]); ?>
	</div>
</div>
