<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SpesialisNarkobaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="spesialis-narkoba-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_spesialis_narkoba') ?>

    <?= $form->field($model, 'no_rekam_medik') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <?= $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'golongan_psikotropika') ?>

    <?php // echo $form->field($model, 'hasil_psikotropika') ?>

    <?php // echo $form->field($model, 'golongan_narkotika') ?>

    <?php // echo $form->field($model, 'hasil_narkotika') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
