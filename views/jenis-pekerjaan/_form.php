<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JenisPekerjaan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jenis-pekerjaan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jenis_pekerjaan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'bahan_material')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tempat_kerja')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'masa_kerja')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_rekam_medik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_created')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
