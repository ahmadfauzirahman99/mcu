<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserRegister */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-register-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'u_nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_rm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_no_mcu')->textInput() ?>

    <?= $form->field($model, 'u_nama_depan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_nama_belakang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'u_kab')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_provinsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_jkel')->dropDownList([ 'P' => 'P', 'L' => 'L', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'u_tgl_lahir')->textInput() ?>

    <?= $form->field($model, 'u_tmpt_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_no_hp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_status')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'u_level')->textInput() ?>

    <?= $form->field($model, 'u_auth_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_last_login')->textInput() ?>

    <?= $form->field($model, 'u_updated_at')->textInput() ?>

    <?= $form->field($model, 'u_created_at')->textInput() ?>

    <?= $form->field($model, 'u_agama')->textInput() ?>

    <?= $form->field($model, 'u_kedudukan_keluarga')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_status_nikah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_pekerjaan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_pekerjaan_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_jabatan_pekerjaan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_pendidikan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_nama_ayah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_nama_ibu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_nama_pasangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_anggota_darurat')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'u_anggota_darurat_ket')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_tgl_terakhir_mcu')->textInput() ?>

    <?= $form->field($model, 'u_dokter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_alamat_dokter')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'u_jabatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_formasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_jadwal_id')->textInput() ?>

    <?= $form->field($model, 'u_biodata_finish_at')->textInput() ?>

    <?= $form->field($model, 'u_berkas_finish_at')->textInput() ?>

    <?= $form->field($model, 'u_kuisioner1_finish_at')->textInput() ?>

    <?= $form->field($model, 'u_kuisioner2_finish_at')->textInput() ?>

    <?= $form->field($model, 'u_finish_at')->textInput() ?>

    <?= $form->field($model, 'u_jadwal_asli_id')->textInput() ?>

    <?= $form->field($model, 'u_debitur_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_password')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
