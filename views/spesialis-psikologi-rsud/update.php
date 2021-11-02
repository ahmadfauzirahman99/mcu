<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisPsikologi */

$this->title = 'Update Mcu Spesialis Psikologi: ' . $model->id_spesialis_psikologi;
$this->params['breadcrumbs'][] = ['label' => 'Mcu Spesialis Psikologis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_spesialis_psikologi, 'url' => ['view', 'id' => $model->id_spesialis_psikologi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mcu-spesialis-psikologi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
