<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ItemSettingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-setting-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_item_setting') ?>

    <?= $form->field($model, 'id_kategori_setting') ?>

    <?= $form->field($model, 'nama_item_setting') ?>

    <?= $form->field($model, 'kode_tes') ?>

    <?= $form->field($model, 'nilai_normal') ?>

    <?php // echo $form->field($model, 'ket') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_id') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'modified_id') ?>

    <?php // echo $form->field($model, 'modified_date') ?>

    <?php // echo $form->field($model, 'deleted_id') ?>

    <?php // echo $form->field($model, 'deleted_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
