<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
 

<div class="col-xs-12 col-sm-6 col-md-3 isotope-item <?= Html::encode($post->id) ?>">
								<div class="image-box">																		
								    <div class="overlay-container">                                      
										<a  href="<?= Url::toRoute(['production/view', 'id'=>$post->id ]); ?>">
									        <?= Html::img("@frontendWebroot/uploads/images/thumbs/" . $post->image[0]->imagePath, ['style'=>'width:100%', 'title'=>$post->ptitle]) ?>
												
										</a>
										
									</div>
								</div>
								
							</div>