<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Category;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Услуги';
$this->params['breadcrumbs'][] = $this->title;
?>
<ul class="nav nav-tabs">
  <li class="active"><a href="<?=Url::toRoute(['category/index']) ?>">Услуги</a></li>
  <li><a href="<?=Url::toRoute(['production/index']) ?>">Работы</a></li>
</ul>
<div class="category-index">

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
            //'id_parent',
            'ctitle',
			[
                'attribute'=>'category.ctitle',
                'label'=>'Чему принадлежит',                                
            ],
            //'cdescription:ntext',
            [
			    'attribute' => 'status', 
				'filter' =>Category::getStatusList(),
				'value' => 'statusName'
			],
            // 'ccolor',

            [
            'class' => 'yii\grid\ActionColumn',
            'header'=>'Действия', 
            'headerOptions' => ['width' => '10'],
            'template' => '{view} {update} {delete}{link}',
        ],
        ],
    ]); ?>
</div>
