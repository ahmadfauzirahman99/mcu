<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SpesialisPsikologi */

$this->title = 'Update Spesialis Psikologi: ' . $model->id_spesialis_psikologi;
$this->params['breadcrumbs'][] = ['label' => 'Spesialis Psikologis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_spesialis_psikologi, 'url' => ['view', 'id' => $model->id_spesialis_psikologi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="spesialis-psikologi-update">

    <?= $this->render('_form', [
        'model' => $model,
        'no_rm' => $no_rm,
        'pasien' => $pasien,
        'no_daftar' => $no_daftar,
    ]) ?>

</div>
