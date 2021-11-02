<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataLayanan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-layanan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_data_pelayanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_rekam_medik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_mcu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_lahir')->textInput() ?>

    <?= $form->field($model, 'agama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kedudukan_dalam_keluarga')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_perkawinan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pendidikan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pekerjaan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'wni')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_pemeriksaan')->textInput() ?>

    <?= $form->field($model, 'pas_foto_offline')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pas_foto_online_valid')->textInput() ?>

    <?= $form->field($model, 'kode_debitur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_paket')->textInput() ?>

    <?= $form->field($model, 'no_registrasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_kelamin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_ujian')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
