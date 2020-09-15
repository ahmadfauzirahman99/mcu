<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SpesialisKejiwaanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="spesialis-kejiwaan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_spesialis_kejiwaan') ?>

    <?= $form->field($model, 'no_rekam_medik') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <?= $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'rs_pendukung') ?>

    <?php // echo $form->field($model, 'dokter') ?>

    <?php // echo $form->field($model, 'skala_l') ?>

    <?php // echo $form->field($model, 'skala_p') ?>

    <?php // echo $form->field($model, 'skala_k') ?>

    <?php // echo $form->field($model, 'skala_1_hs') ?>

    <?php // echo $form->field($model, 'skala_2_d') ?>

    <?php // echo $form->field($model, 'skala_3_hy') ?>

    <?php // echo $form->field($model, 'skala_4_pd') ?>

    <?php // echo $form->field($model, 'skala_5_mf') ?>

    <?php // echo $form->field($model, 'skala_6_pa') ?>

    <?php // echo $form->field($model, 'skala_7_pt') ?>

    <?php // echo $form->field($model, 'skala_8_sc') ?>

    <?php // echo $form->field($model, 'skala_9_ma') ?>

    <?php // echo $form->field($model, 'skala_0_si') ?>

    <?php // echo $form->field($model, 'kesimpulan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
