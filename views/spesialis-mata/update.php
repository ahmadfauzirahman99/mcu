<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisMata */

$this->title = 'Update Mcu Spesialis Mata: ' . $model->id_spesialis_mata;
$this->params['breadcrumbs'][] = ['label' => 'Mcu Spesialis Matas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_spesialis_mata, 'url' => ['view', 'id' => $model->id_spesialis_mata]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mcu-spesialis-mata-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
