<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisGigi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mcu-spesialis-gigi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_rekam_medik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'g18')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g17')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g16')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g15')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g14')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g13')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g12')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g11')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g21')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g22')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g23')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g24')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g25')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g26')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g27')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g28')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g38')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g37')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g36')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g35')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g34')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g33')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g32')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g31')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g41')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g42')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g43')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g44')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g45')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g46')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g47')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g48')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'oklusi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'torus_palatinus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'torus_mandibularis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'palatum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'supernumerary_teeth')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diastema')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'spacing')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'oral_hygiene')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gingiva_periodontal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'oral_mucosa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tongue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lain_lain')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kesimpulan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'saran')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'riwayat')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
