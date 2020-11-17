<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisPsikologi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mcu-spesialis-psikologi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_rekam_medik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_daftar')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'pendidikan')->textInput() ?>

    <?= $form->field($model, 'alamat')->textInput() ?>

    <?= $form->field($model, 'jenis_kelamin')->textInput() ?>

    <?= $form->field($model, 'urutan_kelahiran')->textInput() ?>

    <?= $form->field($model, 'agama')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'pekerjaan')->textInput() ?>

    <?= $form->field($model, 'tgl_pemeriksaan')->textInput() ?>

    <?= $form->field($model, 'diagnosa_dokter')->textInput() ?>

    <?= $form->field($model, 'keluhan_fisik')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'keluhan_psikologis')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'penampilan_umum')->textInput() ?>

    <?= $form->field($model, 'sikap_terhadap_pemeriksa')->textInput() ?>

    <?= $form->field($model, 'afek')->textInput() ?>

    <?= $form->field($model, 'roman_muka')->textInput() ?>

    <?= $form->field($model, 'proses_pikir')->textInput() ?>

    <?= $form->field($model, 'gangguan_persepsi')->textInput() ?>

    <?= $form->field($model, 'kognitif_memori')->textInput() ?>

    <?= $form->field($model, 'kognitif_konsentrasi')->textInput() ?>

    <?= $form->field($model, 'kognitif_orientasi')->textInput() ?>

    <?= $form->field($model, 'kognitif_kemampuan_verbal')->textInput() ?>

    <?= $form->field($model, 'emosi')->textInput() ?>

    <?= $form->field($model, 'perilaku')->textInput() ?>

    <?= $form->field($model, 'simptom')->textInput() ?>

    <?= $form->field($model, 'pendukung_1')->textInput() ?>

    <?= $form->field($model, 'pendukung_2')->textInput() ?>

    <?= $form->field($model, 'pendukung_3')->textInput() ?>

    <?= $form->field($model, 'pendukung_4')->textInput() ?>

    <?= $form->field($model, 'pendukung_5')->textInput() ?>

    <?= $form->field($model, 'pendukung_hasil_tes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'dinamika_psikologi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kesimpulan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'riwayat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kesan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status_pemeriksaan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
