<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisMata */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mcu-spesialis-mata-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_rekam_medik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'persepsi_warna_mata_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'persepsi_warna_mata_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kelopak_mata_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kelopak_mata_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'konjungtiva_mata_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'konjungtiva_mata_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kesegarisan_gerak_bola_mata_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kesegarisan_gerak_bola_mata_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'skiera_mata_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'skiera_mata_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lensa_mata_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lensa_mata_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kornea_mata_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kornea_mata_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bulu_mata_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bulu_mata_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tekanan_bola_mata_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tekanan_bola_mata_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'penglihatan_3_dimensi_mata_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'penglihatan_3_dimensi_mata_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'virus_mata_tanpa_koreksi_mata_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'virus_mata_tanpa_koreksi_mata_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'virus_mata_dengan_koreksi_mata_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'virus_mata_dengan_koreksi_mata_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lain_lain')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kesimpulan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'riwayat')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
