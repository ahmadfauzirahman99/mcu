<?php

use yii\bootstrap4\ActiveForm;

$helper = [
    'Normal' => 'Normal',
    'Kekurangan Berat Badan Tingkat Berat' => 'Kekurangan Berat Badan Tingkat Berat',
    'Kekurangan Berat Badan Tingkat Ringan' => 'Kekurangan Berat Badan Tingkat Ringan',
    'Kelebihan Berat Badan Tingkat Ringan' => 'Kelebihan Berat Badan Tingkat Ringan',
    'Kelebihan Berat Badan Tingkat Berat' => 'Kelebihan Berat Badan Tingkat Berat'
];
$this->title = "Anamnesa dan Pemeriksaan Fisik - " . $dataUser->nama;
?>
<style>
    #form-isian .col-form-label {
        font-size: smaller;
    }

    #form-isian .form-group {
        margin-bottom: 0.6rem;
    }
</style>
<?php $form = ActiveForm::begin(['id' => 'form-isian']); ?>
<div>
    <h3 class="text-center">Anamnesis</h3>

    <?= $form->field($anamnesis, 'nomor_rekam_medik')->hiddenInput(['maxlength' => true, 'value' => $no_rm, 'readonly' => true])->label(false) ?>
    <?= $form->field($anamnesis, 'no_daftar')->hiddenInput(['maxlength' => true, 'value' => $no_daftar, 'readonly' => true])->label(false) ?>

    <div class="form-group">
        <?= $form->field($anamnesis, 'jawaban1')->textarea(['rows' => 3, 'placeholder' => 'Masukkan Isian'])->label('Dilakukan Secara Alloanamnesis / Autoanamnesis Dengan') ?>
    </div>
    <div class="form-group">
        <?= $form->field($anamnesis, 'jawaban2')->textarea(['rows' => 3, 'placeholder' => 'Masukkan Isian'])->label('A. Alasan Kedatangan / Keluhan Utama</b> (Termasuk keluhan yang masih dirasakan pada kunjungan ulangan, harapan kekhawatiran,presepsi pasien mengenai keluhan /Penyakit)') ?>
    </div>
    <div class="form-group">
        <?= $form->field($anamnesis, 'jawaban4')->textarea(['rows' => 3, 'placeholder' => 'Masukkan Isian'])->label('B. Keluhan Lain / tambahan') ?>
    </div>
    <div class="form-group">
        <?= $form->field($anamnesis, 'jawaban5')->textarea(['rows' => 3, 'placeholder' => 'Masukkan Isian'])->label('C. Riwayat Perjalanan Penyakit Sekarang </b>: harus ditulis secara kronologis!!! (uraikan sejak timbul hingga berkembangnya penyakit, obatan-obatan yang telah diminum, pelayanan kesahatan yang telah diperolah termasuk sikap dan perilaku pasien, keluarga, lingkungan terhadap masalah yang ada)') ?>
    </div>
    <div class="form-group">
        <?= $form->field($anamnesis, 'jawaban6')->textarea(['rows' => 3, 'placeholder' => 'Masukkan Isian'])->label('D. Riwayat Penyakit Keluarga</b> : (uraian penyakit yang ada pada keluarga baik yang sama, berbeda, maupun yang tidak berhubungan dengan masalahn yang ada saat ini, termasuk bagaiman cara anggota keluarga tersebut menghadapinya)') ?>
    </div>
    <div class="form-group">
        <?= $form->field($anamnesis, 'jawaban3')->textarea(['rows' => 3, 'placeholder' => 'Masukkan Isian'])->label('E. Riwayat penyakit dahulu:</b> (baik yang sama maupun yang berbeda dengan penyakit sekarang, riwayat pengobatan dan pelayanan kesehatan yang pernah diperoleh termasuk pencegahan spesifik yang pernah diterima)') ?>
    </div>
    <?php if ($dataUser->jenis_kelamin  == 'P') : ?>
        <div class="form-group">
            <p><code>Isian Khusus Perempuan!</code></p>
            <div class="row">
                <div class="col-lg-3">
                    <?= $form->field($anamnesis, 'g')->textInput(['placeholder' => 'Jumlah Kehamilan'])->label('Gravida (G)') ?>
                </div>
                <div class="col-lg-3">
                    <?= $form->field($anamnesis, 'p')->textInput(['placeholder' => 'Jumlah Kelahiran'])->label('Paritas (P)') ?>
                </div>
                <div class="col-lg-3">
                    <?= $form->field($anamnesis, 'a')->textInput(['placeholder' => 'Jumlah Keguguran'])->label('Abortus (A)') ?>
                </div>
                <div class="col-lg-3">
                    <?= $form->field($anamnesis, 'h')->textInput(['placeholder' => 'Jumlah Hamil'])->label('Hamil (H)') ?>

                </div>
            </div>
        </div>
    <?php endif ?>
    <hr>
    <h3 class="text-center">Pemeriksaan Fisik</h3>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <h4 class="header-title m-t-0 m-b-10">1. Tanda Vital</h4>
                <table class="table table-sm table-bordered tabel-garis-hitam parent-no-margin">
                    <tbody>
                        <tr>
                            <th style="width: 20%;">Nadi</th>
                            <td style="width: 30%;">
                                <?= $form->field($model, 'tanda_vital_nadi')->textInput(['maxlength' => true, 'placeholder' => 'Vital Nadi', 'class' => 'form-control form-control-sm'])->label(false) ?>
                            </td>
                            <th style="width: 20%;">Pernapasan</th>
                            <td style="width: 30%;">
                                <div class="form-group field-masterpemeriksaanfisik-kepala_bentuk_wajah">
                                    <?= $form->field($model, 'tanda_vital_pernapasan')->textInput(['maxlength' => true, 'placeholder' => 'Pernapasan', 'class' => 'form-control form-control-sm'])->label(false) ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Sistolik</th>
                            <td>
                                <?= $form->field($model, 'sistolik')->textInput(['maxlength' => true, 'placeholder' => 'Sistolik', 'class' => 'form-control form-control-sm'])->label(false) ?>

                            </td>
                            <th>Diastolik</th>
                            <td>
                                <?= $form->field($model, 'diastolik')->textInput(['maxlength' => true, 'placeholder' => 'Diastolik', 'class' => 'form-control form-control-sm'])->label(false) ?>

                            </td>
                        </tr>
                        <tr>
                            <th>Suhu Badan</th>
                            <td>
                                <?= $form->field($model, 'tanda_vital_suhu_badan')->textInput(['maxlength' => true, 'placeholder' => 'Suhu Badan', 'class' => 'form-control form-control-sm'])->label(false) ?>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>