<?php

use app\assets\ItemFisikAsset;
use app\components\Helper;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $modelAnamnesaBengkalis app\models\AnamnesaBengkalis */
/* @var $modelPemeriksaanBengkalis app\models\PemeriksaanDokterBengkalis */
/* @var $form yii\widgets\ActiveForm */

ItemFisikAsset::register($this);

?>

<h2 class="text-center">ANAMNESIS KHUSUS BENGKALIS </h2>
<?php \yii\widgets\Pjax::begin(['id' => 'id-pjax-' . $modelAnamnesaBengkalis->formName()]); ?>

<?php $form = ActiveForm::begin(['id' => 'id-' . $modelAnamnesaBengkalis->formName(), 'action' => 'save-anamnesis-bengkalis']); ?>
<?= $form->field($modelAnamnesaBengkalis, 'no_rekam_medik')->hiddenInput(['maxlength' => true, 'value' => $dataLayanan->no_rekam_medik, 'readonly' => true])->label(false) ?>

<div class="form-group">
    <label for="">1. Apakah Sdr. merasa sehat betul pada saat itu ?</label>
    <?= $form->field($modelAnamnesaBengkalis, 'jawaban1')->textarea(['rows' => 2]) ?>
</div>
<div class="form-group">
    <label for="">2. Kuatkah Sdr. mengerjakan pekerjaan berat ?</label>
    <?= $form->field($modelAnamnesaBengkalis, 'jawaban2')->textarea(['rows' => 2]) ?>
</div>
<div class="form-group">
    <label for="">3. Pernahkah Sdr. menderita penyakit batuk kering (t.b.c), penyakit paru-paru, penyakit bengek (asthma), penyakit kotor, penyakit ginjal, penyakit jantung, penyakit pertukaran zat, buluh mekar, encok, penyakit cacar, sawan, penyakit •jiwa atau penyakit-penyakit lain yang berat ?</label>
    <?= $form->field($modelAnamnesaBengkalis, 'jawaban3')->textarea(['rows' => 2]) ?>
</div>
<div class="form-group">
    <label for="">4. Pernahkah Sdr. menderita penyakit parah umpamanya : malaria, mejen (amuba atau basiler), penyakit cacar, tipus, kolera, penyakit kuning, beri-beri, filariasis dan sebagainya ?</label>
    <?= $form->field($modelAnamnesaBengkalis, 'jawaban4')->textarea(['rows' => 2]) ?>
</div>
<div class="form-group">
    <label for="">5. Adakah terdapat penyakit turun menurun keluarga Sdr. ?</label>
    <?= $form->field($modelAnamnesaBengkalis, 'jawaban5')->textarea(['rows' => 2]) ?>
</div>
<div class="form-group">
    <label for="">6. Untuk penyakit apakah Sdr. telah disuntik tankai dan bila ? (misalnya tipus, kolera, pes)</label>
    <?= $form->field($modelAnamnesaBengkalis, 'jawaban6')->textarea(['rows' => 2]) ?>
</div>
<div class="form-group">
    <label for="">7. Kecelakaan apa yang Sdr. alami ? Untuk kecelakaan itu Sdr. telah mendapat tunjangan dan<br>berapa larnanya ?</label>
    <?= $form->field($modelAnamnesaBengkalis, 'jawaban7')->textarea(['rows' => 2]) ?>
</div>
<div class="form-group">
    <label for="">8. Bagian manakah dari badan Sdr telah pernah dibedah ? apabila ?</label>
    <?= $form->field($modelAnamnesaBengkalis, 'jawaban8')->textarea(['rows' => 2]) ?>
</div>
<div class="form-group">
    <label for="">9. Adakah Sdr. selama 5 tahun yang terakhir ini dalam pengobatan dokter, jika demikian untuk penyakit apa ?</label>
    <?= $form->field($modelAnamnesaBengkalis, 'jawaban9')->textarea(['rows' => 2]) ?>
</div>
<div class="form-group">
    <label for="">10. Adakah Sdr.pernah diperiksa untuk dinas tentara ? Bila dan bagaimana hasilnya ?</label>
    <?= $form->field($modelAnamnesaBengkalis, 'jawaban10')->textarea(['rows' => 2]) ?>
</div>
<div class="form-group">
    <label for="">11. Adakah Sdr.pernah diperiksa untuk asuransi jiwa atau untuk sesuatu pekerjaan ? Jika demikian bila dan bagaimana hasilnya ?</label>
    <?= $form->field($modelAnamnesaBengkalis, 'jawaban11')->textarea(['rows' => 2]) ?>
</div>
<div class="form-group">
    <?= Html::submitButton('Save Anamnesis Bengkalis', ['class' => 'btn btn-success btn-block', 'id' => 'btn-save-jenis-pekerjaan']) ?>
</div>
<?php ActiveForm::end(); ?>

<?php \yii\widgets\Pjax::end(); ?>


<hr>
<h2 class="text-center">PEMERIKSAAN DOKTER KHUSUS BENGKALIS</h2>
<?php $form = ActiveForm::begin(['id' => 'id-' . $modelPemeriksaanBengkalis->formName(), 'action' => 'save-pemeriksaan-khusus-bengkalis']); ?>
<?= $form->field($modelPemeriksaanBengkalis, 'no_rekam_medik')->hiddenInput(['maxlength' => true, 'value' => $dataLayanan->no_rekam_medik, 'readonly' => true])->label(false) ?>

<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label for="">KECERDASAN</label>
            <?= $form->field($modelPemeriksaanBengkalis, 'kecerdasan')->radioList(['Cukup' => 'Cukup', 'Kurang' => 'Kurang'])->label(false) ?>
        </div>
        <div class="form-group">
            <label for="">Yang Bersangkutan Keliatannya ?</label>
            <?= $form->field($modelPemeriksaanBengkalis, 'sehat')->radioList(['SEHAT' => 'SEHAT', 'KURANG SEHAT' => 'KURANG SEHAT'])->label(false) ?>
        </div>
        <div class="form-group">
            <label for="">Muda, Biasa, Tua kah dia keliatannya untuk umurnya?</label>
            <?= $form->field($modelPemeriksaanBengkalis, 'keliatan_muda')->radioList(['MUDA' => 'MUDA', 'BIASA' => 'BIASA', 'TUA' => 'TUA'])->label(false) ?>
        </div>
        <div class="form-group">
            <label for="">Bagaimana Bentuk Badannya?</label>
            <?= $form->field($modelPemeriksaanBengkalis, 'tegap')->radioList(['TEGAP' => 'TEGAP', 'BIASA' => 'BIASA', 'KURUS' => 'KURUS'])->label(false) ?>
        </div>
        <div class="form-group">
    <?= Html::submitButton('Save Form Khusus Dokter', ['class' => 'btn btn-success btn-block', 'id' => 'btn-save-jenis-pekerjaan']) ?>
</div>
    </div>
</div>
<?php ActiveForm::end(); ?>

<hr>