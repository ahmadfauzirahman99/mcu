<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserRegisterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-register-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'u_id') ?>

    <?= $form->field($model, 'u_nik') ?>

    <?= $form->field($model, 'u_rm') ?>

    <?= $form->field($model, 'u_no_mcu') ?>

    <?= $form->field($model, 'u_no_peserta') ?>

    <?php // echo $form->field($model, 'u_nama_depan') ?>

    <?php // echo $form->field($model, 'u_nama_belakang') ?>

    <?php // echo $form->field($model, 'u_nama_petugas') ?>

    <?php // echo $form->field($model, 'u_email') ?>

    <?php // echo $form->field($model, 'u_alamat') ?>

    <?php // echo $form->field($model, 'u_kab') ?>

    <?php // echo $form->field($model, 'u_provinsi') ?>

    <?php // echo $form->field($model, 'u_jkel') ?>

    <?php // echo $form->field($model, 'u_tgl_lahir') ?>

    <?php // echo $form->field($model, 'u_tmpt_lahir') ?>

    <?php // echo $form->field($model, 'u_no_hp') ?>

    <?php // echo $form->field($model, 'u_status') ?>

    <?php // echo $form->field($model, 'u_level') ?>

    <?php // echo $form->field($model, 'u_auth_key') ?>

    <?php // echo $form->field($model, 'u_last_login') ?>

    <?php // echo $form->field($model, 'u_updated_at') ?>

    <?php // echo $form->field($model, 'u_created_at') ?>

    <?php // echo $form->field($model, 'u_agama') ?>

    <?php // echo $form->field($model, 'u_kedudukan_keluarga') ?>

    <?php // echo $form->field($model, 'u_status_nikah') ?>

    <?php // echo $form->field($model, 'u_pekerjaan') ?>

    <?php // echo $form->field($model, 'u_pekerjaan_nama') ?>

    <?php // echo $form->field($model, 'u_jabatan_pekerjaan') ?>

    <?php // echo $form->field($model, 'u_pendidikan') ?>

    <?php // echo $form->field($model, 'u_nama_ayah') ?>

    <?php // echo $form->field($model, 'u_nama_ibu') ?>

    <?php // echo $form->field($model, 'u_nama_pasangan') ?>

    <?php // echo $form->field($model, 'u_anggota_darurat') ?>

    <?php // echo $form->field($model, 'u_anggota_darurat_ket') ?>

    <?php // echo $form->field($model, 'u_tgl_terakhir_mcu') ?>

    <?php // echo $form->field($model, 'u_dokter') ?>

    <?php // echo $form->field($model, 'u_alamat_dokter') ?>

    <?php // echo $form->field($model, 'u_jabatan') ?>

    <?php // echo $form->field($model, 'u_formasi') ?>

    <?php // echo $form->field($model, 'u_tempat_tugas') ?>

    <?php // echo $form->field($model, 'u_jadwal_id') ?>

    <?php // echo $form->field($model, 'u_biodata_finish_at') ?>

    <?php // echo $form->field($model, 'u_berkas_finish_at') ?>

    <?php // echo $form->field($model, 'u_kuisioner1_finish_at') ?>

    <?php // echo $form->field($model, 'u_kuisioner2_finish_at') ?>

    <?php // echo $form->field($model, 'u_finish_at') ?>

    <?php // echo $form->field($model, 'u_jadwal_asli_id') ?>

    <?php // echo $form->field($model, 'u_debitur_id') ?>

    <?php // echo $form->field($model, 'u_disclaimer_at') ?>

    <?php // echo $form->field($model, 'u_read_doc_at') ?>

    <?php // echo $form->field($model, 'u_istri_ke') ?>

    <?php // echo $form->field($model, 'u_password') ?>

    <?php // echo $form->field($model, 'u_upj_id') ?>

    <?php // echo $form->field($model, 'u_finish_mcu_at') ?>

    <?php // echo $form->field($model, 'u_no_registrasi') ?>

    <?php // echo $form->field($model, 'u_data_pelayanan_id') ?>

    <?php // echo $form->field($model, 'u_kuisioner3_finish_at') ?>

    <?php // echo $form->field($model, 'u_jenis_mcu_id') ?>

    <?php // echo $form->field($model, 'u_tgl_periksa') ?>

    <?php // echo $form->field($model, 'u_alamat_pekerjaan') ?>

    <?php // echo $form->field($model, 'u_instansi_id') ?>

    <?php // echo $form->field($model, 'u_paket_id') ?>

    <?php // echo $form->field($model, 'u_approve_ket') ?>

    <?php // echo $form->field($model, 'u_approve_by') ?>

    <?php // echo $form->field($model, 'u_approve_at') ?>

    <?php // echo $form->field($model, 'u_is_pasien_baru') ?>

    <?php // echo $form->field($model, 'u_ktp') ?>

    <?php // echo $form->field($model, 'u_approve_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
