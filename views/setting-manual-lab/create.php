<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\McuSettingManualLab */

$this->title = 'Create Mcu Setting Manual Lab';
$this->params['breadcrumbs'][] = ['label' => 'Mcu Setting Manual Labs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mcu-setting-manual-lab-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
