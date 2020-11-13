<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisTreadmill */

$this->title = 'Update Mcu Spesialis Treadmill: ' . $model->id_spesialis_treadmill;
$this->params['breadcrumbs'][] = ['label' => 'Mcu Spesialis Treadmills', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_spesialis_treadmill, 'url' => ['view', 'id' => $model->id_spesialis_treadmill]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mcu-spesialis-treadmill-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
