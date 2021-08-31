<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisTreadmillSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mcu-spesialis-treadmill-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_spesialis_treadmill') ?>

    <?= $form->field($model, 'no_rekam_medik') ?>

    <?= $form->field($model, 'no_daftar') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'permintaan') ?>

    <?php // echo $form->field($model, 'metode') ?>

    <?php // echo $form->field($model, 'lama_latihan') ?>

    <?php // echo $form->field($model, 'test_dihentikan_karena') ?>

    <?php // echo $form->field($model, 'dj_maksimal') ?>

    <?php // echo $form->field($model, 'td_maksimal') ?>

    <?php // echo $form->field($model, 'ekg_istirahat') ?>

    <?php // echo $form->field($model, 'ekg_latihan') ?>

    <?php // echo $form->field($model, 'ekg_pemulihan') ?>

    <?php // echo $form->field($model, 'tingkat_kesegaran_jasmani') ?>

    <?php // echo $form->field($model, 'kelas_fungsional') ?>

    <?php // echo $form->field($model, 'kapasitas_aerobik') ?>

    <?php // echo $form->field($model, 'respon_hemodinamik') ?>

    <?php // echo $form->field($model, 'respon_iskemik') ?>

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
