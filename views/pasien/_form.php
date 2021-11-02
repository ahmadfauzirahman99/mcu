<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataLayanan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-layanan-form">


    <?= $form->field($model, 'id_data_pelayanan')->hiddenInput(['maxlength' => true])->label(false) ?>
    <?= $form->field($model, 'tanggal_pemeriksaan')->textInput(['readonly' => true, 'value' => Yii::$app->formatter->asDate($model->tanggal_pemeriksaan)]) ?>
    <?= $form->field($model, 'no_ujian')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_rekam_medik')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <?= $form->field($model, 'no_mcu')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_lahir')->textInput() ?>

    <?= $form->field($model, 'agama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kedudukan_dalam_keluarga')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_perkawinan')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'no_registrasi')->hiddenInput(['maxlength' => true])->label(false) ?>

    <?= $form->field($model, 'jenis_kelamin')->dropDownList(['L' => 'Laki-Laki', 'P' => 'Perempuan']) ?>
    <?= $form->field($model, 'pendidikan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pekerjaan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'wni')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'pas_foto_online_valid')->hiddenInput(['maxlength' => true])->label(false) ?>

    <?= $form->field($model, 'kode_debitur')->hiddenInput(['maxlength' => true])->label(false) ?>

    <?php $form->field($model, 'kode_paket')->textInput() ?>





</div>