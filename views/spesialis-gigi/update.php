<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisGigi */

$this->title = 'Update Mcu Spesialis Gigi: ' . $model->id_spesialis_gigi;
$this->params['breadcrumbs'][] = ['label' => 'Mcu Spesialis Gigis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_spesialis_gigi, 'url' => ['view', 'id' => $model->id_spesialis_gigi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mcu-spesialis-gigi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
