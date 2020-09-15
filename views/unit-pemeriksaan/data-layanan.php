<?php

use app\components\Helper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataLayanan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-layanan-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'tempat')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?php $model->tgl_lahir =  Helper::tgl_indo(date('Y-m-d', strtotime($model->tgl_lahir))) ?>

            <?= $form->field($model, 'tgl_lahir')->textInput() ?>
        </div>
        <div class="col-lg-5">
            <?= $form->field($model, 'agama')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-7">
            <?= $form->field($model, 'kedudukan_dalam_keluarga')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-7">
            <?= $form->field($model, 'status_perkawinan')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-5">
            <?= $form->field($model, 'pendidikan')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'pekerjaan')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'alamat')->textInput() ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'no_mcu')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'wni')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6">
            <?php $model->tanggal_pemeriksaan =  Helper::tgl_indo(date('Y-m-d', strtotime($model->tanggal_pemeriksaan))) ?>
            <?= $form->field($model, 'tanggal_pemeriksaan')->textInput() ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'jenis_kelamin')->textInput() ?>
        </div>
        <div class="col-lg-6">
            <img src="<?= $model->pas_foto_offline ?>" width="50%" alt="">
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
<hr>