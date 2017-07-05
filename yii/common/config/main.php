<?php
return [
    'name' => 'Альфапринт',
    'language' => 'ru',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'class' =>'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
			//'enableStrictParsing' => true,

			
        ],
    ],
];
