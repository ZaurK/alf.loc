<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Работы';
$this->params['breadcrumbs'][] = $this->title;
?>
<ul class="nav nav-tabs">
  <li><a href="<?=Url::toRoute(['category/index']) ?>">Услуги</a></li>
  <li class="active"><a href="<?=Url::toRoute(['production/index']) ?>">Работы</a></li>
</ul>
<div class="production-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,		
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
			[
            'label' => 'Картинка',
            'format' => 'raw',
            'value' => function($data){
                return Html::img('@frontendWebroot/uploads/images/' .$data->image, [
                    'alt'=>'',
                    'style' => 'width:100%;'
                ]);
            },
			 'contentOptions'=>['style'=>'max-width: 100px;'] 
            ],
            //'id_category',
            [
                'attribute'=>'ptitle',
                'label'=>'Заголовок',    
            ],
			[
                'attribute'=>'pprice',
                'label'=>'Цена',    
            ],
			 [
                'attribute'=>'category.ctitle',
                'label'=>'Услуга',                                
            ],
            //'pdescription:ntext',
            // 'promo',

            [
            'class' => 'yii\grid\ActionColumn',
            'header'=>'Действия', 
            'headerOptions' => ['width' => '10'],
            'template' => '{view} {update} {delete}{link}',
        ],
        ],
    ]); ?>
</div>
