<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisGigiKondisi */

$this->title = 'Tambah Kondisi Gigi';
$this->params['breadcrumbs'][] = ['label' => 'MCU Spesialis Gigi - Kondisi Gigi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mcu-spesialis-gigi-kondisi-create">

    <div style="text-align: center;">
        <h3 style="font-weight: bold; margin-top: 0px;"><?= Html::encode($this->title) ?></h3>
    </div>

    <hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>