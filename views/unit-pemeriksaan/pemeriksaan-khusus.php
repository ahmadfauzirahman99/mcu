<?php

use app\assets\ItemFisikAsset;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $master_pemeriksaan_fisik app\models\MasterPemeriksaanFisik */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($master_pemeriksaan_fisik, 'resume_kelainan')->textarea(['maxlength' => true, 'rows' => 9, 'placeholder' => 'Resemu Kelainan']) ?>
    <?= $form->field($master_pemeriksaan_fisik, 'hasil_body_map')->textarea(['maxlength' => true, 'rows' => 9, 'placeholder' => 'Hasil Body Map']) ?>
    <?= $form->field($master_pemeriksaan_fisik, 'hasil_brief_survey')->textarea(['maxlength' => true, 'placeholder' => 'Hasil Brief Survey']) ?>
    <?php ActiveForm::end(); ?>

</div>
<hr>