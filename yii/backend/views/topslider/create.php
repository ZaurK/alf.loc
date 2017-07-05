<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Topslider */

$this->title = 'Добавить слайд';
$this->params['breadcrumbs'][] = ['label' => 'Слайдер', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="topslider-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
