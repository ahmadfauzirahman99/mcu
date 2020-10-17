<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\McuHasilRadiologi */

$this->title = 'Update Mcu Hasil Radiologi: ' . $model->id_hasil_radiologi;
$this->params['breadcrumbs'][] = ['label' => 'Mcu Hasil Radiologis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_hasil_radiologi, 'url' => ['view', 'id' => $model->id_hasil_radiologi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mcu-hasil-radiologi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
