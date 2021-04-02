<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\resume\McuResume */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mcu-resume-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_rekam_medik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_daftar')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'jenis_pemeriksaan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tidak_normal')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'riwayat')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
