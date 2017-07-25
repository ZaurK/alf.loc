<?php
use yii\widgets\ActiveForm;
use backend\models\Production;
use backend\models\Image;
use yii\helpers\Html;


$ptitle = Production::find()
            ->where(['production.id' => $_GET['id']])
            ->one();
			
$this->title = 'Загрузка изображений';
$this->params['breadcrumbs'][] = ['label' => 'Работы', 'url' => ['production/index']];
$this->params['breadcrumbs'][] = ['label' => $ptitle->ptitle, 'url' => ['production/view', 'id'=>$_GET['id']]];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'imageFile')->fileInput()->label('Загрузка изображения ( допустимые форматы; .jpg, .jpeg, .png )') ?>

    <button>Загрузить</button>

<?php ActiveForm::end() ?>

<?php
$pimages = Image::find()
        ->where(['image.id_production'=>$_GET['id']])   
		->all();
		
echo "<br><br>";		
echo "<div class='row'>";
    foreach($pimages as $pimage){
	    		
		echo "<div class='col-md-2'>";
		echo "<div class='imgblock'>";
		
		echo Html::img('@frontendWebroot/uploads/images/thumbs/' . $pimage['imagePath'], ['class'=>'']);
		
		echo "<div class='imgblockdel'>";
		echo Html::a("<span class='glyphicon glyphicon-trash '></span>",	['image/delete', 'id' => $pimage['id'] ]); 
		echo "</div>";
		
		echo "</div>";		
		echo "</div>";
		
	}
echo "</div>";

?>		   