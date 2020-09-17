<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisGigiKondisi */

$this->title = 'Update Mcu Spesialis Gigi Kondisi: ' . $model->id_spesialis_gigi_kondisi;
$this->params['breadcrumbs'][] = ['label' => 'Mcu Spesialis Gigi Kondisis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_spesialis_gigi_kondisi, 'url' => ['view', 'id' => $model->id_spesialis_gigi_kondisi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mcu-spesialis-gigi-kondisi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
