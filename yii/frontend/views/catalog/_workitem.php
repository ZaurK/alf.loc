<?php
use yii\helpers\Html;

?>
 

<div class="col-xs-12 col-sm-6 col-md-3 isotope-item <?= Html::encode($model->catalog_id) ?>">
								<div class="image-box">
									<div class="overlay-container">
                                        <?= Html::img('@frontendWebroot/uploads/thumbnails/' . $model->image, ['style'=>'width:100%']) ?>
										<a class="overlay" data-toggle="modal" data-target="#<?= Html::encode($model->id) ?>">
											<i class="fa fa-search-plus"></i>
											<span><?= Html::encode($model->gtitle) ?></span>
											<span><a href="<?= yii\helpers\Url::toRoute(['service/viewgood', 'id' => $servicetitle, 'idg' => $model->id, ]); ?>" class="refer" title="Перейти на страницу"><i class="fa fa-arrow-circle-right fa-2x"></i></a></span>
										</a>
									</div>
								</div>
								<!-- Modal -->
								<div class="modal fade" id="<?= Html::encode($model->id) ?>" tabindex="-1" role="dialog" aria-labelledby="project-1-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Закрыть</span></button>
												<h4 class="modal-title" id="project-1-label"><?= Html::encode($model->gtitle) ?></h4>
											</div>
											<div class="modal-body">
												<h3><?= Html::encode($model->gtitle) ?></h3>
												<div class="row">												    
													<div class="col-md-3">
														<p><?= Yii::$app->formatter->asNtext($model->gdescription) ?></p>
													</div>
													<div class="col-md-9">
													    <?= Html::img('@frontendWebroot/uploads/images/' . $model->image, ['class'=>'imgfloatright']) ?>	
													</div>
												</div>
											</div>
											<div class="modal-footer">
											    <a href="<?= Url::toRoute(['service/viewgood', 'id' => $servicetitle, 'idg' => $model->id, ]); ?>" class="btn btn-sm btn-default">Перейти на страницу</a>
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Закрыть</button>
											</div>
										</div>
									</div>
								</div>
								<!-- Modal end -->
							</div>