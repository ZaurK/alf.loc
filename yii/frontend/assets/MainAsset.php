<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Mainlayout frontend application asset bundle.
 */
class MainAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext',
        'http://fonts.googleapis.com/css?family=Raleway:700,400,300',
        'skins/bootstrap-3.3.2-dist/bootstrap-3.3.2-dist/css/bootstrap.css',
        'skins/fonts/font-awesome/css/font-awesome.css',
        'skins/css/animations.css',
        'skins/css/style.css',
        'skins/css/custom.css',
    ];
    
    public $js = [
	     'skins/js/topslider.js',
		 'skins/plugins/jquery.min.js',
		'skins/bootstrap-3.3.2-dist/bootstrap-3.3.2-dist/js/bootstrap.min.js',
		'skins/plugins/modernizr.js',
		'skins/plugins/isotope/isotope.pkgd.min.js',
		'skins/plugins/jquery.backstretch.min.js',
		'skins/plugins/jquery.appear.js',
		'skins/js/template.js',
		'skins/js/custom.js',
	   
    ];
    public $depends = [
	     'yii\web\YiiAsset',
         //'yii\bootstrap\BootstrapAsset',
      
    ];
}
