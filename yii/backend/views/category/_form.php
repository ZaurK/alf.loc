<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Category;
use kartik\color\ColorInput;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<?php
    $categories = ArrayHelper::map(Category::find()->all(), 'id', 'ctitle');
    echo $form->field($model, 'id_parent')->dropDownList($categories, ['prompt' => 'Верхний уровень']);
    ?>

    <?= $form->field($model, 'ctitle')->textInput(['maxlength' => true]) ?>
	 <?= $form->field($model, 'ccolor')->widget(ColorInput::classname(), [
    'options' => ['placeholder' => 'Выберите цвет фона заголовка'],
    ]);
    ?>

    <?= $form->field($model, 'cdescription')->widget(TinyMce::className(), [
    'options' => ['rows' => 20],
    'language' => 'ru',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor image",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    ]
]);?>
    
	<?= $form->field($model, 'status')->checkbox(['label'=>'Видно']) ?>

   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
