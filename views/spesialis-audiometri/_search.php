<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-13 18:14:13 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2020-09-13 18:14:40
 */


use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisAudiometriSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mcu-spesialis-audiometri-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_spesialis_audiometri') ?>

    <?= $form->field($model, 'no_rekam_medik') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <?= $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'ac_125_kanan') ?>

    <?php // echo $form->field($model, 'ac_250_kanan') ?>

    <?php // echo $form->field($model, 'ac_500_kanan') ?>

    <?php // echo $form->field($model, 'ac_1000_kanan') ?>

    <?php // echo $form->field($model, 'ac_2000_kanan') ?>

    <?php // echo $form->field($model, 'ac_3000_kanan') ?>

    <?php // echo $form->field($model, 'ac_4000_kanan') ?>

    <?php // echo $form->field($model, 'ac_5000_kanan') ?>

    <?php // echo $form->field($model, 'ac_6000_kanan') ?>

    <?php // echo $form->field($model, 'ac_7000_kanan') ?>

    <?php // echo $form->field($model, 'ac_8000_kanan') ?>

    <?php // echo $form->field($model, 'bc_125_kanan') ?>

    <?php // echo $form->field($model, 'bc_250_kanan') ?>

    <?php // echo $form->field($model, 'bc_500_kanan') ?>

    <?php // echo $form->field($model, 'bc_1000_kanan') ?>

    <?php // echo $form->field($model, 'bc_2000_kanan') ?>

    <?php // echo $form->field($model, 'bc_3000_kanan') ?>

    <?php // echo $form->field($model, 'bc_4000_kanan') ?>

    <?php // echo $form->field($model, 'bc_5000_kanan') ?>

    <?php // echo $form->field($model, 'bc_6000_kanan') ?>

    <?php // echo $form->field($model, 'bc_7000_kanan') ?>

    <?php // echo $form->field($model, 'bc_8000_kanan') ?>

    <?php // echo $form->field($model, 'ac_125_kiri') ?>

    <?php // echo $form->field($model, 'ac_250_kiri') ?>

    <?php // echo $form->field($model, 'ac_500_kiri') ?>

    <?php // echo $form->field($model, 'ac_1000_kiri') ?>

    <?php // echo $form->field($model, 'ac_2000_kiri') ?>

    <?php // echo $form->field($model, 'ac_3000_kiri') ?>

    <?php // echo $form->field($model, 'ac_4000_kiri') ?>

    <?php // echo $form->field($model, 'ac_5000_kiri') ?>

    <?php // echo $form->field($model, 'ac_6000_kiri') ?>

    <?php // echo $form->field($model, 'ac_7000_kiri') ?>

    <?php // echo $form->field($model, 'ac_8000_kiri') ?>

    <?php // echo $form->field($model, 'bc_125_kiri') ?>

    <?php // echo $form->field($model, 'bc_250_kiri') ?>

    <?php // echo $form->field($model, 'bc_500_kiri') ?>

    <?php // echo $form->field($model, 'bc_1000_kiri') ?>

    <?php // echo $form->field($model, 'bc_2000_kiri') ?>

    <?php // echo $form->field($model, 'bc_3000_kiri') ?>

    <?php // echo $form->field($model, 'bc_4000_kiri') ?>

    <?php // echo $form->field($model, 'bc_5000_kiri') ?>

    <?php // echo $form->field($model, 'bc_6000_kiri') ?>

    <?php // echo $form->field($model, 'bc_7000_kiri') ?>

    <?php // echo $form->field($model, 'bc_8000_kiri') ?>

    <?php // echo $form->field($model, 'kesimpulan_kanan') ?>

    <?php // echo $form->field($model, 'kesimpulan_kiri') ?>

    <?php // echo $form->field($model, 'kesimpulan') ?>

    <?php // echo $form->field($model, 'rata_kanan_ac') ?>

    <?php // echo $form->field($model, 'rata_kanan_bc') ?>

    <?php // echo $form->field($model, 'rata_kiri_ac') ?>

    <?php // echo $form->field($model, 'rata_kiri_bc') ?>

    <?php // echo $form->field($model, 'gambar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
