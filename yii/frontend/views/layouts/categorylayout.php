<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;
use frontend\assets\MainAsset;
use common\widgets\Alert;
use common\helpers\getCategoryLinksSidebar;
use yii\helpers\Url;
use frontend\components\FBFWidget;
use frontend\models\SearchForm;

MainAsset::register($this);
$model = new SearchForm();
?>
<?php
echo newerton\fancybox\FancyBox::widget([
    'target' => 'a[rel=fancybox]',
    'helpers' => true,
    'mouse' => true,
    'config' => [
        'maxWidth' => '90%',
        'maxHeight' => '90%',
        'playSpeed' => 7000,
        'padding' => 10,
        'fitToView' => false,
        'width' => '70%',
        'height' => '70%',
        'autoSize' => false,
        'closeClick' => false,
        'openEffect' => 'elastic',
        'closeEffect' => 'elastic',
        'prevEffect' => 'elastic',
        'nextEffect' => 'elastic',
        'closeBtn' => false,
        'openOpacity' => true,
        'helpers' => [
            'title' => ['type' => 'inner'],
            'buttons' => [],
            'thumbs' => [],
            'overlay' => [
                'css' => [
                    'background' => 'rgba(0, 0, 0, 0.8)'
                ]
            ]
        ],
    ]
]);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if IE 9]> <html lang="ru" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="no-trans">
<?php $this->beginBody() ?>

<!-- scrollToTop -->
		<!-- ================ -->
		<div class="scrollToTop"><i class="icon-up-open-big"></i></div>

		<!-- header start -->
		<!-- ================ --> 
		<header class="header fixed clearfix navbar navbar-fixed-top">
			<div class="container">
				<div class="row">
					<div class="col-md-3">

						<!-- header-left start -->
						<!-- ================ -->
						<div class="header-left clearfix">

							<!-- logo -->
							<div class="logo smooth-scroll">
								<a href="<?= Url::toRoute(['site/index', '#' => 'banner']); ?>"><img id="logo" src="/skins/images/alpha.jpg" alt="Logo"></a>
							</div>

							<!-- name-and-slogan -->
							<div class="site-name-and-slogan smooth-scroll">
								<div class="site-name" >Альфа</div>
								<div class="site-slogan">Рекламное агентство</div>
							</div>

						</div>
						<!-- header-left end -->

					</div>
					<div class="col-md-9">
                    <div class="row">
					     <div class="col-xs-12 col-sm-12 col-md-3 col-md-push-9 text-right">
					        <span class="phone">+7(967)4257979</span> 						
						    <a class="btn btn-success" data-toggle="modal"  data-target="#myModal">Связаться</a>
							
							
						</div>
		                 <div class="col-xs-12 col-sm-12 col-md-9 col-md-pull-3">
						<!-- header-right start -->
						<!-- ================ -->
						<div class="header-right clearfix">

							<!-- main-navigation start -->
							<!-- ================ -->
							<div class="main-navigation animated">

								<!-- navbar start -->
								<!-- ================ -->
								<nav class="navbar navbar-default" role="navigation">
									<div class="container-fluid">

										<!-- Toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
												<span class="sr-only">Toggle navigation</span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
											</button>
										</div>

										<!-- Collect the nav links, forms, and other content for toggling -->
										<div class="collapse navbar-collapse scrollspy smooth-scroll" id="navbar-collapse-1">
											<ul class="nav navbar-nav navbar-right">
												<li class="active"><a href="<?= Url::toRoute(['site/index', '#' => 'banner']); ?>">Альфа</a></li>
												<li><a href="<?= Url::toRoute(['site/index', '#' => 'services']); ?>">Услуги</a></li>
												<li><a href="<?= Url::toRoute(['site/delivery']); ?>">Доставка</a></li>
												<li><a href="<?= Url::toRoute(['site/index', '#' => 'clients']); ?>">Клиенты</a></li>
												<li><a href="<?= Url::toRoute(['site/index', '#' => 'contact']); ?>">Контакты</a></li>
											</ul>
										</div>

									</div>
								</nav>
								<!-- navbar end -->

							</div>
							<!-- main-navigation end -->

						</div>
						<!-- header-right end -->

					</div>
					
					</div>
					
					</div>
				</div>
			</div>
		</header>
		<!-- header end -->

   





		

		<!-- section start -->
		<!-- ================ -->
		<div class="section">
			<div class="container">
        <h1 class="text-center title catalog-title" id="portfolio">Наши услуги</h1>
				<div class="separator"></div>
				<br>			
				<div class="col-lg-9 col-lg-push-3">    
						<?= $content ?>	

				</div>
				<div class="col-lg-3 col-lg-pull-9">
				
				          <div id="form_search" class="input-group stylish-input-group">
						<?php $form = ActiveForm::begin(); ?>
						<?= $form->field($model, 'q')->textInput(['class'=>'form-control searchformheight', 'placeholder'=>'Поиск'])->label(''); ?>
						<input type="hidden" name="funk" value="search" />
						<?php ActiveForm::end(); ?>
                        </div> 
						
						
						<h3 id="portfolio">Услуги</h3>                       							       
						    <?= getCategoryLinksSidebar::getLinks() ?>
						<div class="space"></div>
				</div>		
		    </div>
		</div>
		<!-- section end -->

		

		<!-- footer start -->
		<!-- ================ -->
		<footer id="footer">



			<!-- .subfooter start -->
			<!-- ================ -->
			<div class="subfooter">
				<div class="container">
        <p class="pull-left">&copy; Альфапринт 2009-<?= date('Y') ?></p>
        <!--<p class="pull-right"><?= Yii::powered() ?></p>-->
    </div>
			</div>
			<!-- .subfooter end -->

		</footer>
		<!-- footer end -->

		
<?= FBFWidget::widget([]) ?>

<?php $this->endBody() ?>
	</body>

</html>
<?php $this->endPage() ?>
