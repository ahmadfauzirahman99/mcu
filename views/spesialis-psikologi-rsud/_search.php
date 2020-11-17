<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisPsikologiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mcu-spesialis-psikologi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_spesialis_psikologi') ?>

    <?= $form->field($model, 'no_rekam_medik') ?>

    <?= $form->field($model, 'no_daftar') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'pendidikan') ?>

    <?php // echo $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'jenis_kelamin') ?>

    <?php // echo $form->field($model, 'urutan_kelahiran') ?>

    <?php // echo $form->field($model, 'agama') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'pekerjaan') ?>

    <?php // echo $form->field($model, 'tgl_pemeriksaan') ?>

    <?php // echo $form->field($model, 'diagnosa_dokter') ?>

    <?php // echo $form->field($model, 'keluhan_fisik') ?>

    <?php // echo $form->field($model, 'keluhan_psikologis') ?>

    <?php // echo $form->field($model, 'penampilan_umum') ?>

    <?php // echo $form->field($model, 'sikap_terhadap_pemeriksa') ?>

    <?php // echo $form->field($model, 'afek') ?>

    <?php // echo $form->field($model, 'roman_muka') ?>

    <?php // echo $form->field($model, 'proses_pikir') ?>

    <?php // echo $form->field($model, 'gangguan_persepsi') ?>

    <?php // echo $form->field($model, 'kognitif_memori') ?>

    <?php // echo $form->field($model, 'kognitif_konsentrasi') ?>

    <?php // echo $form->field($model, 'kognitif_orientasi') ?>

    <?php // echo $form->field($model, 'kognitif_kemampuan_verbal') ?>

    <?php // echo $form->field($model, 'emosi') ?>

    <?php // echo $form->field($model, 'perilaku') ?>

    <?php // echo $form->field($model, 'simptom') ?>

    <?php // echo $form->field($model, 'pendukung_1') ?>

    <?php // echo $form->field($model, 'pendukung_2') ?>

    <?php // echo $form->field($model, 'pendukung_3') ?>

    <?php // echo $form->field($model, 'pendukung_4') ?>

    <?php // echo $form->field($model, 'pendukung_5') ?>

    <?php // echo $form->field($model, 'pendukung_hasil_tes') ?>

    <?php // echo $form->field($model, 'dinamika_psikologi') ?>

    <?php // echo $form->field($model, 'kesimpulan') ?>

    <?php // echo $form->field($model, 'riwayat') ?>

    <?php // echo $form->field($model, 'kesan') ?>

    <?php // echo $form->field($model, 'status_pemeriksaan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
