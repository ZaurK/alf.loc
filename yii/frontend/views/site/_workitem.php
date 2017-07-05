<?php
use yii\helpers\Html;

?>
 

<div class="col-xs-12 col-sm-6 col-md-3 isotope-item <?= Html::encode($model->id_category) ?>">
								<div class="image-box">
									
									 
									<?php echo Html::a(Html::img("@frontendWebroot/uploads/images/thumbs/$model->image"), "@frontendWebroot/uploads/images/$model->image", ['rel' => 'fancybox', 'title'=>$model->ptitle]); ?>
								<div class="overlay-container">
                                       
										<a class="overlay" src="">								
											<i class="fa fa-search-plus"></i>
											<span><?= Html::encode($model->ptitle) ?></span>		
										</a>
										
									</div>
									
								</div>
								
							</div>