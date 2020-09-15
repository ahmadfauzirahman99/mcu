<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Anamnesis */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anamnesis-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jawaban1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'jawaban2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'jawaban3')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'jawaban4')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'jawaban5')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'jawaban6')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'jawaban7')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'nomor_rekam_medik')->textInput() ?>

    <?= $form->field($model, 'g')->textInput() ?>

    <?= $form->field($model, 'p')->textInput() ?>

    <?= $form->field($model, 'a')->textInput() ?>

    <?= $form->field($model, 'h')->textInput() ?>

    <?= $form->field($model, 'jawaban8')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
