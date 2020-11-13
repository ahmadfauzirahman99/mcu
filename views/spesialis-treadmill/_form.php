<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisTreadmill */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mcu-spesialis-treadmill-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_rekam_medik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_daftar')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'permintaan')->textInput() ?>

    <?= $form->field($model, 'metode')->textInput() ?>

    <?= $form->field($model, 'lama_latihan')->textInput() ?>

    <?= $form->field($model, 'test_dihentikan_karena')->textInput() ?>

    <?= $form->field($model, 'dj_maksimal')->textInput() ?>

    <?= $form->field($model, 'td_maksimal')->textInput() ?>

    <?= $form->field($model, 'ekg_istirahat')->textInput() ?>

    <?= $form->field($model, 'ekg_latihan')->textInput() ?>

    <?= $form->field($model, 'ekg_pemulihan')->textInput() ?>

    <?= $form->field($model, 'tingkat_kesegaran_jasmani')->textInput() ?>

    <?= $form->field($model, 'kelas_fungsional')->textInput() ?>

    <?= $form->field($model, 'kapasitas_aerobik')->textInput() ?>

    <?= $form->field($model, 'respon_hemodinamik')->textInput() ?>

    <?= $form->field($model, 'respon_iskemik')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'anjuran')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'riwayat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kesan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status_pemeriksaan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
