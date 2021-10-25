<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanEkg */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pemeriksaan-ekg-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hasil_ekg')->textInput() ?>

    <?= $form->field($model, 'kesimpulan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kesan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'create_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'update_at')->textInput() ?>

    <?= $form->field($model, 'update_by')->textInput() ?>

    <?= $form->field($model, 'no_rekam_medik')->textInput() ?>

    <?= $form->field($model, 'no_daftar')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
