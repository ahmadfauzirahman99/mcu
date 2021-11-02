<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SettingManualLabSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mcu-setting-manual-lab-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_manual') ?>

    <?= $form->field($model, 'no_pasien') ?>

    <?= $form->field($model, 'no_registrasi') ?>

    <?= $form->field($model, 'id_item_lab') ?>

    <?= $form->field($model, 'kondisi') ?>

    <?php // echo $form->field($model, 'nilai_manual') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
