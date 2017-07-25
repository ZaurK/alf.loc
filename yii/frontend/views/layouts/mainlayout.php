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
use common\helpers\getLinks;
use common\helpers\getSlider;
use common\helpers\getServiceLinkss;
use common\helpers\getCategoryLinksSidebar;
use frontend\components\FBFWidget;
use yii\helpers\Url;
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
            'buttons' => false,
            'thumbs' => false,
            'overlay' => [
                'css' => [
                    'background' => 'rgba(0, 0, 0, 0.8)',
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

        <div class="container" style="width:100%;" id="banner">
				<div class="row">
					<div class="">		 
                        <?= getSlider::getSlider() ?>
                    </div>

                </div>
        </div>
       
			        
         

        <!-- section start -->
		<!-- ================ -->
		<div class="section clearfix" data-animation-effect="fadeIn">
			<div class="container">
				<div class="row" id="services">				
				   
				    <div class=" col-xs-12 col-sm-9 col-md-9 col-lg-9 col-sm-push-3">    
				        <h1 id="about" class="title text-center">Рекламное агентство <span>"Альфа"</span></h1>
						<p class="lead text-center">Все виды наружной рекламы: изготовление вывесок, световых коробов, широкоформатная печать. Полиграфические услуги от визитки до плаката.</p>
						<div class="space"></div>
						<div class="row">							
							<div class="col-sm-9">
								<p>"Альфа" - все виды наружной рекламы в КБР: изготовление вывесок, световых букв, световых коробов, и многое другое, их монтаж, широкоформатная печать: на банерах, пленках и бумагах, полиграфические услуги: от визитки до плаката.</p>
								<p>Оперативная полиграфия "Альфа" готова принять ваш индивидуальный заказ и изготовить его качественно в ближайшее время.</p>
                                <p>Мы будем рады сотрудничеству с новыми заказчиками, ожидающими от нас предоставления максимальных возможностей реализации их рекламных проектов и высококачественный сервис.</p>
								
							</div>
							<div class="col-sm-3 text-center">
								<img src="/skins/images/section-image-1.jpg" alt="">
								<div class="space"></div>
							</div>
						</div>		
	
				    </div>
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-sm-pull-9">
					    <div id="form_search" class="input-group stylish-input-group">
						<?php $form = ActiveForm::begin(); ?>
						<?= $form->field($model, 'q')->textInput(['class'=>'form-control searchformheight', 'placeholder'=>'Поиск'])->label(''); ?>
						<input type="hidden" name="funk" value="search" />
						<?php ActiveForm::end(); ?>
                        </div> 
					    <h3 id="portfolio">Услуги</h3>                       							       
						    <?= getCategoryLinksSidebar::getLinks() ?>
						<div class="space"></div>
				<p class="lead text-center"><a href="<?= Url::toRoute('category/index'); ?>" class="btn btn-sm btn-default">Все услуги</a></p>	
				<div class="space"></div>
				    </div>		

                </div>				
            </div>				
        </div>				


		<!-- section start -->
		<!-- ================ -->		
		<div class="section translucent-bg parallax blue">
			<div class="container" data-animation-effect="fadeIn">
			
			</div>
		</div>
		<!-- section end -->
		

		<!-- section start -->
		<!-- ================ -->
		<div class="section">
			<div class="container">
				<h1 class="text-center title" id="portfolio">Лучшие работы</h1>
				<div class="separator"></div>
				<br>			
				<div class="row" data-animation-effect="fadeIn">
					<div class="col-md-12">

						<!-- isotope filters start -->
						<div class="filters text-center">
						    
							
							<ul class="nav nav-pills">
								<li class="active"><a href="#" data-filter="*">Все</a></li>
								<?= getLinks::getLinks() ?>
							</ul>
						</div>
						<!-- isotope filters end -->

						<!-- portfolio items start -->
						<div class="isotope-container row grid-space-20">
                            
						<?= $content ?>	

						</div>
						<!-- portfolio items end -->
					
					</div>
				</div>
			</div>
		</div>
		<!-- section end -->

		<!-- section start -->
		<!-- ================ -->
        <h1 id="clients" class="title text-center">Наши клиенты</h1>
		
		<!-- section end -->

		<!-- section start -->
		<!-- ================ -->
		<div class="default-bg space">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<h1 class="text-center">100+ Довольных клиентов!</h1>
					</div>
				</div>
			</div>
		</div>
		<!-- section end -->

		<!-- footer start -->
		<!-- ================ -->
		<footer id="footer">

			<!-- .footer start -->
			<!-- ================ -->
			<div class="footer section">
				<div class="container">
					<h1 class="title text-center" id="contact">Наши контакты</h1>
					<div class="space"></div>
					<div class="row">
						<div class="col-sm-6">
							<div class="footer-content">
								<p class="large">Рекламное агентство "Альфа". Все виды наружной рекламы: изготовление вывесок, световых коробов, широкоформатная печать. Полиграфические услуги от визитки до плаката.</p>
								<ul class="list-icons">
									<li><i class="fa fa-map-marker pr-10"></i> КБР, г.Нальчик, ул. Ногмова 53</li>
									<li><i class="fa fa-phone pr-10"></i> +7(909)4877979</li>
									<!--<li><i class="fa fa-fax pr-10"></i> +7(967)4257979</li>-->
									<li><i class="fa fa-envelope-o pr-10"></i> alfaprint07@mail.ru</li>
								</ul>
								<ul class="social-links">
									<li class="googleplus"><a target="_blank" href="https://www.instagram.com/alfaprint07/"><i class="fa fa-instagram"></i></a></li>
									<li class="twitter"><a target="_blank" href="https://vk.com/alfaprint07"><i class="fa fa-vk"></i></a></li>
                                   <!-- <li class="facebook"><a target="_blank" href="https://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
									<li class="twitter"><a target="_blank" href="https://twitter.com"><i class="fa fa-twitter"></i></a></li>
									<li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
									<li class="skype"><a target="_blank" href="http://www.skype.com"><i class="fa fa-skype"></i></a></li>-->
                				</ul>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="footer-content">
							<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ac473ea4fecef4ebcbd5fe64f81791711fbfb97381be78248366995927b6b1cf1&amp;width=100%25&amp;height=347&amp;lang=ru_RU&amp;scroll=true"></script>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- .footer end -->

			<!-- .subfooter start -->
			<!-- ================ -->
			<div class="subfooter">
				<div class="container">
        <p class="pull-left">&copy; Альфа 2009-<?= date('Y') ?></p>
        <!--<p class="pull-right"><?= Yii::powered() ?></p>-->
    
	    
		<div class="pull-right">
		<!--LiveInternet counter--><script type="text/javascript">
document.write("<a href='//www.liveinternet.ru/click' "+
"target=_blank><img src='//counter.yadro.ru/hit?t14.2;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet: показано число просмотров за 24"+
" часа, посетителей за 24 часа и за сегодня' "+
"border='0' width='88' height='31'><\/a>")
</script><!--/LiveInternet-->
		
		</div>
		
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
