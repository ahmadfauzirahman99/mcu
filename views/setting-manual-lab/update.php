<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\McuSettingManualLab */

$this->title = 'Update Mcu Setting Manual Lab: ' . $model->id_manual;
$this->params['breadcrumbs'][] = ['label' => 'Mcu Setting Manual Labs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_manual, 'url' => ['view', 'id' => $model->id_manual]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mcu-setting-manual-lab-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
