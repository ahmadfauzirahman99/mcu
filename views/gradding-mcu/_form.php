<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GraddingMcu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gradding-mcu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_gradding')->textInput(['maxlength' => true, 'readonly' =>true]) ?>

    <?= $form->field($model, 'id_data_pelayanan')->textInput(['maxlength' => true, 'readonly' =>true]) ?>

    <?= $form->field($model, 'no_rekam_medik')->textInput(['maxlength' => true, 'readonly' =>true]) ?>

    <?= $form->field($model, 'no_registrasi')->textInput(['maxlength' => true, 'readonly' =>true]) ?>

    <?= $form->field($model, 'no_mcu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_debitur')->textInput(['maxlength' => true, 'readonly' =>true]) ?>

    <?= $form->field($model, 'hasil')->textarea(['rows' => 6, 'readonly' =>true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_reset')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'poin')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
