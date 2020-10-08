<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $jenisPekerjaan app\models\JenisPekerjaan */
/* @var $form yii\widgets\ActiveForm */

$jenisPekerjaan->jenis_pekerjaan = null;
$jenisPekerjaan->bahan_material = null;
$jenisPekerjaan->tempat_kerja = null;
$jenisPekerjaan->masa_kerja = null;
?>
<h2 class="text-center">ANAMNESIS OKUPASI (khusus untuk pasien yang bekerja) </h2>
<div class="form-group">
    <?php $form = ActiveForm::begin(); ?>

    1. Tuliskan Jenis Pekerjaan yang dilakukan sejak pertama kali, serta lama kerja di tiap perkerjaan tersebut
    <hr>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($jenisPekerjaan, 'jenis_pekerjaan')->textarea(['rows' => 2]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($jenisPekerjaan, 'bahan_material')->textarea(['rows' => 2]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($jenisPekerjaan, 'tempat_kerja')->textarea(['maxlength' => true, 'rows' => 2]) ?>
        </div>
        <div class="col-lg-12">
            <?= $form->field($jenisPekerjaan, 'masa_kerja')->textarea(['maxlength' => true, 'rows' => 2]) ?>
        </div>
        <div class="col-lg-12">
            <?= $form->field($jenisPekerjaan, 'no_rekam_medik')->hiddenInput(['maxlength' => true, 'readonly' => true])->label(false) ?>
        </div>
    </div>
    <?php $form->field($jenisPekerjaan, 'tanggal_created')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <hr>
</div>
<div class="form-group">
    <p><b>2. Uraian Tugas / Pekerjaan</b> (Yang sekarang atau yang
        dianggap dapat berhubungan dengan penyakit tersebut) Tuliskan cara melakukan perkerjaan,
        deskripsikan setiap Kegiatan yang dilakukan secara mendetail,
        sejak mulai bekerja, misalnya pada pagi hari hingga selesai bekera di sore hari,
        termasuk bahan-bahan yang digunakan. Buatlah bagan alur dari tiap kegiatan yang dilakukan pekerja)
        Buat bagan alur untuk tiap kegiatan tersebut.</p>

    <hr>
</div>

<div class="form-group">
    <p> <b>3. Bahaya Potensial (Potential Hazard)</b>
        dan risiko kecelakan kerja pada pekerja serta pada lingkungan kerja
        (tuliskan perkiraan bahaya faktor yang mungkin ada /
        dapat terjadi pada perkerja ini dalam melukan perkerjaan yang mungkin ada di lingkungan perkerjaannya.
        Nama-Nama Kegiatan pada kolom urutan kegiatan harus sama dengan pada bagan alur pada no 2)
        Tuliskan di halaman kosong bila table dibawah ini tidak cukup besar </p>
    <hr>
</div>
<div class="form-group">
    <p> <b>4. Hubungan Pekerjaan dengan penyakit yang dialami</b>
        (gejala / keluhan yang ada) (misalnya keluhan berkurang saat libur
        atau keluhan bertambah setelah bekerja beberapa saat) </p>
    <?= $form->field($anamnesis, 'jawaban7')->textarea(['rows' => 6]) ?>

    <hr>
</div>
<div class="form-group">
    <iframe src="http://mcu.rsud-arifin.localhost/body-discomfort/form?id=<?= $dataLayanan->no_rekam_medik ?>"
        style="display: block;width: 1200px;height: 650px;border: none;"></iframe>
</div>
<hr>