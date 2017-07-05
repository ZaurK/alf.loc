<?php
/* @var $this yii\web\View */

use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use frontend\models\Category;
use frontend\models\Production;
use yii\widgets\Breadcrumbs;

$datas = Category::find()
    ->where(['id' => $model->id])
    ->one();
$gdatas = Production::find()
    ->where(['id' => Yii::$app->request->get('idg')])
    ->one();
	
$this->title = 'Альфа | ' . Html::encode($datas->stitle). ' - ' . Html::encode($gdatas->gtitle) ;
$this->params['breadcrumbs'][] = ['label' => 'Услуги', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $datas->stitle, 'url' =>['service/view', 'id' => Yii::$app->request->get('id')]];
$this->params['breadcrumbs'][] = ['label' => $gdatas->gtitle, ];
?>
<?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [], ])?>




    <h2><?= Html::encode($gdatas->gtitle) ?></h2>
	<p><?= Yii::$app->formatter->asNtext($gdatas->gdescription) ?></p> 
    <?php
    if(isset($gdatas->image) && file_exists(Yii::getAlias('@webroot', $gdatas->image))) { 
    
		//echo Html::a(Html::img("@frontendWebroot/uploads/images/$gdatas->image"), "@frontendWebroot/uploads/images/$gdatas->image", ['data-fancybox' => true, 'data-fancybox'=>'gallery', 'data-caption'=>$gdatas->gtitle]);
        echo Html::a(Html::img("@frontendWebroot/uploads/images/$gdatas->image"), "@frontendWebroot/uploads/images/$gdatas->image", ['rel' => 'fancybox', 'title'=>$gdatas->gtitle]);
	
	}
        ?>	

<div class="sharebutns">
<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="//yastatic.net/share2/share.js"></script>
<div class="ya-share2" data-services="collections,vkontakte,facebook,odnoklassniki,moimir,gplus,twitter,viber,whatsapp,skype,telegram"></div>
 </div>

 

    	
	

