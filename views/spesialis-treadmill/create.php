<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisTreadmill */
/* @var $dataLayanan app\models\DataLayanan */

$this->title = "HASIL UJI LATIH JANTUNG DENGAN BEBAN";
$this->params['breadcrumbs'][] = Html::decode($this->title);
?>
<div class="mcu-spesialis-treadmill-create">


    <?= $this->render('_form', [
        'model' => $model,
        'dataLayanan' => $modelDataLayanan

    ]) ?>

</div>