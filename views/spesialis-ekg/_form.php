<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisEkg */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mcu-spesialis-ekg-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_rekam_medik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_daftar')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'irama_jantung')->textInput() ?>

    <?= $form->field($model, 'frekuensi_denyut_jantung')->textInput() ?>

    <?= $form->field($model, 'gelombang_p')->textInput() ?>

    <?= $form->field($model, 'interval_pr')->textInput() ?>

    <?= $form->field($model, 'kompleks_qrs')->textInput() ?>

    <?= $form->field($model, 'segmen_st')->textInput() ?>

    <?= $form->field($model, 'gelombang_t')->textInput() ?>

    <?= $form->field($model, 'lain_lain')->textInput() ?>

    <?= $form->field($model, 'kesan_ekg_istirahat')->textInput() ?>

    <?= $form->field($model, 'anjuran')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'riwayat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kesan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status_pemeriksaan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
