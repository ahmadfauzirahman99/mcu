<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\McuItemLab */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mcu-item-lab-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_item_lab')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_tes_lab')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nilai_normal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ket')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
