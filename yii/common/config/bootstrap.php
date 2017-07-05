<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');

Yii::setAlias('@uploads', dirname(dirname(dirname(__DIR__))) . '/public_html/uploads');
Yii::setAlias('@upload', dirname(dirname(dirname(__DIR__))) . '/public_html/upload');

Yii::setAlias('@frontendWebroot', 'http://alf.loc/');
Yii::setAlias('@backendWebroot', 'http://backend.alf.loc/');
