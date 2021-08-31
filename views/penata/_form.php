<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuPenatalaksanaanMcu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mcu-penatalaksanaan-mcu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jenis_permasalahan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rencana')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'target_waktu')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'hasil_yang_diharapkan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'no_rekam_medik')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'jenis')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_fk')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
