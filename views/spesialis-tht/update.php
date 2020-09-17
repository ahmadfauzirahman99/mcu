<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisTht */

$this->title = 'Update Mcu Spesialis Tht: ' . $model->id_spesialis_tht;
$this->params['breadcrumbs'][] = ['label' => 'Mcu Spesialis Thts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_spesialis_tht, 'url' => ['view', 'id' => $model->id_spesialis_tht]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mcu-spesialis-tht-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
