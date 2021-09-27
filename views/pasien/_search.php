<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PasienSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-layanan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_data_pelayanan') ?>

    <?= $form->field($model, 'no_rekam_medik') ?>

    <?= $form->field($model, 'no_mcu') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'tempat') ?>

    <?php // echo $form->field($model, 'tgl_lahir') ?>

    <?php // echo $form->field($model, 'agama') ?>

    <?php // echo $form->field($model, 'kedudukan_dalam_keluarga') ?>

    <?php // echo $form->field($model, 'status_perkawinan') ?>

    <?php // echo $form->field($model, 'pendidikan') ?>

    <?php // echo $form->field($model, 'pekerjaan') ?>

    <?php // echo $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'wni') ?>

    <?php // echo $form->field($model, 'tanggal_pemeriksaan') ?>

    <?php // echo $form->field($model, 'pas_foto_offline') ?>

    <?php // echo $form->field($model, 'pas_foto_online_valid') ?>

    <?php // echo $form->field($model, 'kode_debitur') ?>

    <?php // echo $form->field($model, 'kode_paket') ?>

    <?php // echo $form->field($model, 'no_registrasi') ?>

    <?php // echo $form->field($model, 'jenis_kelamin') ?>

    <?php // echo $form->field($model, 'no_ujian') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
