<?php
/* @var $this yii\web\View */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\web\View;

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
            <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'id' => 'form']); ?>

            <div class="row">
                <div class="col-lg-6">

                    <?= $form->field($model, 'u_nik')->textInput(['maxlength' => true, 'readonly' => true]) ?>

                    <?= $form->field($model, 'u_rm')->textInput(['maxlength' => true, 'readonly' => true]) ?>

                    <?= $form->field($model, 'u_no_mcu')->textInput(['readonly' => true]) ?>

                    <?= $form->field($model, 'u_nama_depan')->textInput(['maxlength' => true]) ?>

                    <?php $form->field($model, 'u_nama_belakang')->textInput(['maxlength' => true, 'placeholder' => 'Nama Belakang']) ?>

                    <?= $form->field($model, 'u_email')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'u_alamat')->textInput(['placeholder' => 'Alamat']) ?>

                    <?= $form->field($model, 'u_kab')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'u_provinsi')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'u_jkel')->dropDownList(['P' => 'Perempuan', 'L' => 'Laki-Laki',], ['prompt' => 'Jenis Kelamin']) ?>

                    <?= $form->field($model, 'u_tgl_lahir')->textInput() ?>

                    <?= $form->field($model, 'u_tmpt_lahir')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'u_no_hp')->textInput(['maxlength' => true]) ?>



                    <?= $form->field($model, 'u_agama')->dropdownList(
                        [
                            '1' => 'Islam',
                            '2' => 'Katholik',
                            '3' => 'Protestan',
                            '4' => 'Hindu',
                            '5' => 'Budha',
                            '6' => 'Konghucu',
                            '9' => 'Lainnya',
                        ]
                    ) ?>

                    <?php
                    $pendidikan = [1 => 'Tidak Sekolah', 'TK' => 'TK', 'SD' => 'SD', 'SMP' => 'SMP', 'SMA' => 'SMA', 'D1' => 'D1', 'D2' => 'D2', 'D3' => 'D3', 'D4' => 'D4', 'S1' => 'S1', 'S2' => 'S2', 'S3' => 'S3'];

                    ?>

                    <?= $form->field($model, 'u_kedudukan_keluarga')->dropdownList(['kepala keluarga' => 'Kepala Keluarga', 'istri' => 'Istri']) ?>

                    <?= $form->field($model, 'u_status_nikah')->dropdownList(['T' => 'Belum Kawin', 'K' => 'Kawin', 'J' => 'Janda', 'D' => 'Duda']) ?>

                    <?= $form->field($model, 'u_pekerjaan')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'u_pekerjaan_nama')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'u_jabatan_pekerjaan')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'u_pendidikan')->dropdownList($pendidikan, ['prompt' => 'Pendidikan Belum Dipilih']) ?>

                    <?= $form->field($model, 'u_nama_ayah')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'u_nama_ibu')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'u_nama_pasangan')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'u_tgl_terakhir_mcu')->textInput(['placeholder' => 'Tanggal Terkakhir']) ?>

                    <?= $form->field($model, 'u_dokter')->textInput(['maxlength' => true, 'placeholder' => 'Nama Dokter']) ?>

                    <?= $form->field($model, 'u_alamat_dokter')->textarea(['rows' => 1, 'placeholder' => 'Alamat Dokter']) ?>

                    <?= $form->field($model, 'u_jabatan')->textInput(['maxlength' => true, 'placeholder' => 'Jabatan']) ?>


                    <div class="form-group">
                        <hr>
                        <?= Html::submitButton('Simpan Data Biodata', ['class' => 'btn btn-success btn-block btn-trans']) ?>
                    </div>
                </div>
            </div>
            <?php ActiveForm::end(); ?>

        </div>

    </div>
</div>
<?php $this->registerJs($this->render('index.js'), View::POS_END) ?>