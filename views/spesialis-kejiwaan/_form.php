<?php

use app\components\Helper;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SpesialisKejiwaan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="spesialis-kejiwaan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_rekam_medik')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?> -->

    <?= $form->field($model, 'rs_pendukung')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'status')->inline()->radioList(['0' => 'Tidak Ditemukan Gangguan Jiwa', '1' => 'DItemukan Gangguan Jiwa',], [
        'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
            return Helper::radioList($index, $label, $name, $checked, $value, $model);
        }
    ])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
