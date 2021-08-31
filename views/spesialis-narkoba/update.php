<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SpesialisNarkoba */

$this->title = 'Update Spesialis Narkoba: ' . $model->id_spesialis_narkoba;
$this->params['breadcrumbs'][] = ['label' => 'Spesialis Narkobas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_spesialis_narkoba, 'url' => ['view', 'id' => $model->id_spesialis_narkoba]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="spesialis-narkoba-update">

    <?= $this->render('_form', [
        'model' => $model,
        'no_rm' => $no_rm,
        'pasien' => $pasien,
    ]) ?>

</div>
