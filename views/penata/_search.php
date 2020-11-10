<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\McuPenatalaksanaanMcuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mcu-penatalaksanaan-mcu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_penata') ?>

    <?= $form->field($model, 'jenis_permasalahan') ?>

    <?= $form->field($model, 'rencana') ?>

    <?= $form->field($model, 'target_waktu') ?>

    <?= $form->field($model, 'hasil_yang_diharapkan') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <?php // echo $form->field($model, 'no_rekam_medik') ?>

    <?php // echo $form->field($model, 'jenis') ?>

    <?php // echo $form->field($model, 'id_fk') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
