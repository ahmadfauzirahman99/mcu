<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SpesialisNarkoba */

$this->title = 'Create Spesialis Narkoba';
$this->params['breadcrumbs'][] = ['label' => 'Spesialis Narkobas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spesialis-narkoba-create">

    <?= $this->render('_form', [
        'model' => $model,
        'no_rm' => $no_rm,
        'pasien' => $pasien,
    ]) ?>

</div>
