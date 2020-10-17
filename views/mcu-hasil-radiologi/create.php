<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\McuHasilRadiologi */

$this->title = 'Create Mcu Hasil Radiologi';
$this->params['breadcrumbs'][] = ['label' => 'Mcu Hasil Radiologis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mcu-hasil-radiologi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
