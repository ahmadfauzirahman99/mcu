<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SpesialisNarkobaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="spesialis-narkoba-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_spesialis_narkoba') ?>

    <?= $form->field($model, 'no_rekam_medik') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <?= $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'benzodiazepin_hasil') ?>

    <?php // echo $form->field($model, 'benzodiazepin_keterangan') ?>

    <?php // echo $form->field($model, 'thc_hasil') ?>

    <?php // echo $form->field($model, 'thc_keterangan') ?>

    <?php // echo $form->field($model, 'piat_hasil') ?>

    <?php // echo $form->field($model, 'piat_keterangan') ?>

    <?php // echo $form->field($model, 'amphetammin_hasil') ?>

    <?php // echo $form->field($model, 'amphetammin_keterangan') ?>

    <?php // echo $form->field($model, 'kokain_hasil') ?>

    <?php // echo $form->field($model, 'kokain_keterangan') ?>

    <?php // echo $form->field($model, 'methamphetamin_hasil') ?>

    <?php // echo $form->field($model, 'methamphetamin_keterangan') ?>

    <?php // echo $form->field($model, 'carisoprodol_hasil') ?>

    <?php // echo $form->field($model, 'carisoprodol_keterangan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
