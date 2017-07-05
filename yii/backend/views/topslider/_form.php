<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Topslider;

use dosamigos\fileupload\FileUploadUI;


/* @var $this yii\web\View */
/* @var $model backend\models\Topslider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="topslider-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'stitle')->textInput(['maxlength' => true]) ?> 

	<?= $form->field($model, 'status')->checkbox(['label'=>'Показывать в слайдере']) ?>

     <?php
    if(isset($model->image) && file_exists(Yii::getAlias('@webroot', $model->image)))
    { 
        echo Html::img('@frontendWebroot/uploads/slider/' . $model->image, ['class'=>'']);
    } 
    ?>
    <?= $form->field($model, 'file')->fileInput(['readonly' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
