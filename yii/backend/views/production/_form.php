<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Category;

/* @var $this yii\web\View */
/* @var $model backend\models\Production */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="production-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
  
	<?php
    $categories = ArrayHelper::map(Category::find()->all(), 'id', 'ctitle');
    echo $form->field($model, 'id_category')->dropDownList($categories, ['prompt' => 'Выберите категорию']);
    ?>

    <?= $form->field($model, 'ptitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pdescription')->textarea(['rows' => 6]) ?>
	
	<?= $form->field($model, 'pprice')->textInput(['maxlength' => true, 'style' => 'width:120px']) ?>

	<?= $form->field($model, 'promo')->checkbox(['label'=>'В блок лучших работ']) ?>

	 <?php
    if(isset($model->image) && file_exists(Yii::getAlias('@webroot', $model->image)))
    { 
        echo Html::img('@frontendWebroot/uploads/images/' . $model->image, ['class'=>'']);
    } 
    ?>
    <?= $form->field($model, 'file')->fileInput(['readonly' => true]) ?>
	
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
