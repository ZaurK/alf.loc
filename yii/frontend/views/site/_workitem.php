<?php
use yii\helpers\Html;
use yii\helpers\Url;
use backend\models\Image;
use backend\models\Production;

?>
<?php
                $data = Production::find()
				        ->where(['id' => $model->id])
                        ->one();
				$imgs = Image::find()
				        ->where(['id_production' => $data->id])
                        ->one();
						
				$text = Html::img('@frontendWebroot/uploads/images/thumbs/' .$imgs->imagePath, [
                    'alt'=>'',
					'title'=>$model->ptitle,
                    'style' => 'width:100%;'
                ]);
				$noimg = Html::img('@frontendWebroot/skins/images/noimage.png', [
                    'alt'=>'',
					'title'=>'Нет фото',
                    'style' => 'width:100%;'
                ]);
				$text =($imgs)? $text : $noimg;
?> 


<div class="col-xs-12 col-sm-6 col-md-3 isotope-item <?= Html::encode($model->id_category) ?>">
								<div class="image-box">
									<div class="overlay-container">
									<a href="<?= Url::toRoute(['production/view', 'id' => $model->id ]); ?>">

                                        <?= $text ?>							
										
								    </a>
									</div>
									<div style="float:left"><?= Html::encode($model->ptitle) ?></div>
									<div style="float:right"><?= Html::encode($model->pprice) ?></div>
								</div>
								
							</div>