<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\McuSettingManualLab */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mcu-setting-manual-lab-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_manual')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_pasien')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_registrasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_item_lab')->textInput() ?>

    <?= $form->field($model, 'kondisi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nilai_manual')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
