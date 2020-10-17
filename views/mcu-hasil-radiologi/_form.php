<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\McuHasilRadiologi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mcu-hasil-radiologi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_hasil_radiologi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_data_pelayanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_rekam_medik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_registrasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_mcu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_debitur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_pemeriksa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'result_pemeriksaan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hasil')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
