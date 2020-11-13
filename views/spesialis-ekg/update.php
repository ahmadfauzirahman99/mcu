<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisEkg */

$this->title = 'Update Mcu Spesialis Ekg: ' . $model->id_spesialis_ekg;
$this->params['breadcrumbs'][] = ['label' => 'Mcu Spesialis Ekgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_spesialis_ekg, 'url' => ['view', 'id' => $model->id_spesialis_ekg]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mcu-spesialis-ekg-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
