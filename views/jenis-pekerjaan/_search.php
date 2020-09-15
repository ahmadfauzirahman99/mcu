<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JenisPekerjaanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jenis-pekerjaan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_jenis_pekerjaan') ?>

    <?= $form->field($model, 'jenis_pekerjaan') ?>

    <?= $form->field($model, 'bahan_material') ?>

    <?= $form->field($model, 'tempat_kerja') ?>

    <?= $form->field($model, 'masa_kerja') ?>

    <?php // echo $form->field($model, 'no_rekam_medik') ?>

    <?php // echo $form->field($model, 'tanggal_created') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
