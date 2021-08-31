<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanEkgSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pemeriksaan-ekg-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_ekg') ?>

    <?= $form->field($model, 'hasil_ekg') ?>

    <?= $form->field($model, 'kesimpulan') ?>

    <?= $form->field($model, 'kesan') ?>

    <?= $form->field($model, 'create_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'update_at') ?>

    <?php // echo $form->field($model, 'update_by') ?>

    <?php // echo $form->field($model, 'no_rekam_medik') ?>

    <?php // echo $form->field($model, 'no_daftar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
