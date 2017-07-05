<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>
 


<div class="col-xs-12 col-sm-6 col-md-3 isotope-item <?= Html::encode($model->id_category) ?>">
								<div class="image-box">
									<div class="overlay-container">
									<a href="<?= Url::toRoute(['production/view', 'id' => $model->id ]); ?>">
                                        <?= Html::img('@frontendWebroot/uploads/images/thumbs/' . $model->image, ['style'=>'width:100%', 'title'=>$model->ptitle]) ?>							
										
								    </a>
									</div>
									<div style="float:left"><?= Html::encode($model->ptitle) ?></div>
									<div style="float:right"><?= Html::encode($model->pprice) ?></div>
								</div>
								
							</div>