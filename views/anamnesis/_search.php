<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AnamnesisSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anamnesis-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_anamnesis') ?>

    <?= $form->field($model, 'jawaban1') ?>

    <?= $form->field($model, 'jawaban2') ?>

    <?= $form->field($model, 'jawaban3') ?>

    <?= $form->field($model, 'jawaban4') ?>

    <?php // echo $form->field($model, 'jawaban5') ?>

    <?php // echo $form->field($model, 'jawaban6') ?>

    <?php // echo $form->field($model, 'jawaban7') ?>

    <?php // echo $form->field($model, 'nomor_rekam_medik') ?>

    <?php // echo $form->field($model, 'g') ?>

    <?php // echo $form->field($model, 'p') ?>

    <?php // echo $form->field($model, 'a') ?>

    <?php // echo $form->field($model, 'h') ?>

    <?php // echo $form->field($model, 'jawaban8') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
