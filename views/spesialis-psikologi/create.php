<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SpesialisPsikologi */

$this->title = 'Create Spesialis Psikologi';
$this->params['breadcrumbs'][] = ['label' => 'Spesialis Psikologis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spesialis-psikologi-create">

    <?= $this->render('_form', [
        'model' => $model,
        'no_rm' => $no_rm,
        'pasien' => $pasien,
        'no_daftar' => $no_daftar,
    ]) ?>

</div>
