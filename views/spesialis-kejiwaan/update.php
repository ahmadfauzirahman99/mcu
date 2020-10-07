<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SpesialisKejiwaan */

$this->title = 'Update Spesialis Kejiwaan: ' . $model->id_spesialis_kejiwaan;
$this->params['breadcrumbs'][] = ['label' => 'Spesialis Kejiwaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_spesialis_kejiwaan, 'url' => ['view', 'id' => $model->id_spesialis_kejiwaan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="spesialis-kejiwaan-update">

    <?= $this->render('_form', [
        'model' => $model,
        'no_rm' => $no_rm,
        'pasien' => $pasien,
    ]) ?>
    ]) ?>

</div>
