<?php
/* @var $this yii\web\View */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = "Pemeriksaan Pasien - " . $modelDataLayanan->nama;
?>
<div class="card-box">
    <h5 class="header-title m-t-0 m-b-30">Biodata Pasien</h5>
    <ul class="nav nav-tabs">
        <?= $this->render('timeline', [
            'id_pelayanan' => $id_pelayanan,
            'no_daftar' => $no_daftar,
            'no_rm' => $no_rm
        ]) ?>
    </ul>
    <div class="tab-content">
        <style>
            #form .col-form-label {
                font-size: small;
            }

            #form .form-group {
                margin-bottom: 0.1rem;
            }
        </style>

        <div class="user-register-form">

            <div class="row">
                <div class="col-lg-12">
                    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'id' => 'form']); ?>

                    <?= $form->field($model, 'u_nik')->textInput(['maxlength' => true, 'readonly' => true]) ?>

                    <?= $form->field($model, 'u_rm')->textInput(['maxlength' => true, 'readonly' => true]) ?>

                    <?= $form->field($model, 'u_no_mcu')->textInput(['readonly' => true]) ?>

                    <?= $form->field($model, 'u_nama_depan')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'u_nama_belakang')->textInput(['maxlength' => true, 'placeholder' => 'Nama Belakang']) ?>

                    <?= $form->field($model, 'u_email')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'u_alamat')->textarea(['rows' => 1]) ?>

                    <?= $form->field($model, 'u_kab')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'u_provinsi')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'u_jkel')->dropDownList(['P' => 'Perempuan', 'L' => 'Laki-Laki',], ['prompt' => 'Jenis Kelamin']) ?>

                    <?= $form->field($model, 'u_tgl_lahir')->textInput() ?>

                    <?= $form->field($model, 'u_tmpt_lahir')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'u_no_hp')->textInput(['maxlength' => true]) ?>

                    <?php $form->field($model, 'u_status')->dropDownList(['0', '1',], ['prompt' => '']) ?>

                    <?php $form->field($model, 'u_level')->textInput() ?>

                    <?php $form->field($model, 'u_auth_key')->textInput(['maxlength' => true]) ?>

                    <?php $form->field($model, 'u_last_login')->textInput() ?>

                    <?php $form->field($model, 'u_updated_at')->textInput() ?>

                    <?php $form->field($model, 'u_created_at')->textInput() ?>

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

                    <?php $form->field($model, 'u_anggota_darurat')->dropDownList(['0', '1',], ['prompt' => '']) ?>

                    <?php $form->field($model, 'u_anggota_darurat_ket')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'u_tgl_terakhir_mcu')->textInput(['placeholder' => 'Tanggal Terkakhir']) ?>

                    <?= $form->field($model, 'u_dokter')->textInput(['maxlength' => true, 'placeholder' => 'Nama Dokter']) ?>

                    <?= $form->field($model, 'u_alamat_dokter')->textarea(['rows' => 1, 'placeholder' => 'Alamat Dokter']) ?>

                    <?= $form->field($model, 'u_jabatan')->textInput(['maxlength' => true, 'placeholder' => 'Jabatan']) ?>

                    <?php $form->field($model, 'u_formasi')->textInput(['maxlength' => true]) ?>

                    <?php $form->field($model, 'u_jadwal_id')->textInput() ?>

                    <?= $form->field($model, 'u_biodata_finish_at')->textInput(['readonly' => true]) ?>

                    <?= $form->field($model, 'u_berkas_finish_at')->textInput(['readonly' => true]) ?>

                    <?= $form->field($model, 'u_kuisioner1_finish_at')->textInput(['readonly' => true]) ?>

                    <?= $form->field($model, 'u_kuisioner2_finish_at')->textInput(['readonly' => true]) ?>

                    <?php $form->field($model, 'u_finish_at')->textInput() ?>

                    <?php $form->field($model, 'u_jadwal_asli_id')->textInput() ?>

                    <?php $form->field($model, 'u_debitur_id')->textInput(['maxlength' => true]) ?>

                    <?php $form->field($model, 'u_password')->textInput(['maxlength' => true]) ?>

                    <div class="form-group">
                        <hr>
                        <?= Html::submitButton('Simpan Data Biodata', ['class' => 'btn btn-success btn-trans']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>

        </div>

    </div>
</div>