<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-13 18:14:13 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2020-09-13 18:14:44
 */


use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisAudiometri */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mcu-spesialis-audiometri-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_rekam_medik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'ac_125_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ac_250_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ac_500_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ac_1000_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ac_2000_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ac_3000_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ac_4000_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ac_5000_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ac_6000_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ac_7000_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ac_8000_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bc_125_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bc_250_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bc_500_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bc_1000_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bc_2000_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bc_3000_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bc_4000_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bc_5000_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bc_6000_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bc_7000_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bc_8000_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ac_125_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ac_250_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ac_500_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ac_1000_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ac_2000_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ac_3000_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ac_4000_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ac_5000_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ac_6000_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ac_7000_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ac_8000_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bc_125_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bc_250_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bc_500_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bc_1000_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bc_2000_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bc_3000_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bc_4000_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bc_5000_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bc_6000_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bc_7000_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bc_8000_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kesimpulan_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kesimpulan_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kesimpulan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rata_kanan_ac')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rata_kanan_bc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rata_kiri_ac')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rata_kiri_bc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gambar')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
