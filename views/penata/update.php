<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuPenatalaksanaanMcu */

$this->title = 'Update Mcu Penatalaksanaan Mcu: ' . $model->id_penata;
$this->params['breadcrumbs'][] = ['label' => 'Mcu Penatalaksanaan Mcus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_penata, 'url' => ['view', 'id' => $model->id_penata]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mcu-penatalaksanaan-mcu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
