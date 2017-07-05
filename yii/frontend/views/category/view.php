<?php
/* @var $this yii\web\View */

use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use backend\models\Production;
use yii\widgets\Breadcrumbs;

$this->title = 'Альфа | ' . Html::encode($model->ctitle) ;
//$this->params['breadcrumbs'][] = ['label' => 'Услуги', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ctitle, 'url' =>['category/view', 'id' => $model->id]];
?>
<?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [], ])?>
<h2><?= Html::encode($model->ctitle) ?></h2>

<p>
    <?= $model->cdescription ?>
</p>

<?php
$dataProvider = new ActiveDataProvider([
    'query' => Production::find()->where(['id_category' => $model->id])->orderBy('id DESC'),
    'pagination' => [
        'pageSize' => 12,
    ],
]);


$widget = ListView::begin([
    'dataProvider' => $dataProvider,
	 'itemView' => '_workitem',
    'summary' => false,
	'emptyText' => '',
	'viewParams'=>array(
        'categorytitle' => $model->id,
    ),

]); ?>

<ul class="cam-list row clearfix">
    <?php echo $widget->renderItems();  ?>
</ul>
<?php echo $widget->renderPager(); ?>