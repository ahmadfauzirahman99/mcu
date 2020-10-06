<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SpesialisKejiwaan */

$this->title = 'Tambah Pemeriksaan Kejiwaan';
$this->params['breadcrumbs'][] = ['label' => 'Spesialis Kejiwaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spesialis-kejiwaan-create">

    <?= $this->render('_form', [
        'model' => $model,
        'no_rm' => $no_rm,
        'pasien' => $pasien,
    ]) ?>

</div>
