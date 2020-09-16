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

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
