<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

?>
<div class="mailformat">
    <p>Письмо с сайта alfaprint07.ru </p>
	<p>Отправитель: <?= $namefrom ?></p>
    <p>email: <?= $emailfrom ?></p>

    <p><?= $body ?></p>

   
</div>
