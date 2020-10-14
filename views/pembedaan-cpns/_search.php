<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PembedaanCpnsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembedaan-cpns-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_pembedaan') ?>

    <?= $form->field($model, 'pilhan_terima_jabatan') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'no_rekam_medik') ?>

    <?= $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'tanggal') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
