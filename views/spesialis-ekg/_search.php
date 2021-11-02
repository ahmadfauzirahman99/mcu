<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisEkgSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mcu-spesialis-ekg-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_spesialis_ekg') ?>

    <?= $form->field($model, 'no_rekam_medik') ?>

    <?= $form->field($model, 'no_daftar') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'irama_jantung') ?>

    <?php // echo $form->field($model, 'frekuensi_denyut_jantung') ?>

    <?php // echo $form->field($model, 'gelombang_p') ?>

    <?php // echo $form->field($model, 'interval_pr') ?>

    <?php // echo $form->field($model, 'kompleks_qrs') ?>

    <?php // echo $form->field($model, 'segmen_st') ?>

    <?php // echo $form->field($model, 'gelombang_t') ?>

    <?php // echo $form->field($model, 'lain_lain') ?>

    <?php // echo $form->field($model, 'kesan_ekg_istirahat') ?>

    <?php // echo $form->field($model, 'anjuran') ?>

    <?php // echo $form->field($model, 'riwayat') ?>

    <?php // echo $form->field($model, 'kesan') ?>

    <?php // echo $form->field($model, 'status_pemeriksaan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
