<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisGigiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mcu-spesialis-gigi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_spesialis_gigi') ?>

    <?= $form->field($model, 'no_rekam_medik') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <?= $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'g18') ?>

    <?php // echo $form->field($model, 'g17') ?>

    <?php // echo $form->field($model, 'g16') ?>

    <?php // echo $form->field($model, 'g15') ?>

    <?php // echo $form->field($model, 'g14') ?>

    <?php // echo $form->field($model, 'g13') ?>

    <?php // echo $form->field($model, 'g12') ?>

    <?php // echo $form->field($model, 'g11') ?>

    <?php // echo $form->field($model, 'g21') ?>

    <?php // echo $form->field($model, 'g22') ?>

    <?php // echo $form->field($model, 'g23') ?>

    <?php // echo $form->field($model, 'g24') ?>

    <?php // echo $form->field($model, 'g25') ?>

    <?php // echo $form->field($model, 'g26') ?>

    <?php // echo $form->field($model, 'g27') ?>

    <?php // echo $form->field($model, 'g28') ?>

    <?php // echo $form->field($model, 'g38') ?>

    <?php // echo $form->field($model, 'g37') ?>

    <?php // echo $form->field($model, 'g36') ?>

    <?php // echo $form->field($model, 'g35') ?>

    <?php // echo $form->field($model, 'g34') ?>

    <?php // echo $form->field($model, 'g33') ?>

    <?php // echo $form->field($model, 'g32') ?>

    <?php // echo $form->field($model, 'g31') ?>

    <?php // echo $form->field($model, 'g41') ?>

    <?php // echo $form->field($model, 'g42') ?>

    <?php // echo $form->field($model, 'g43') ?>

    <?php // echo $form->field($model, 'g44') ?>

    <?php // echo $form->field($model, 'g45') ?>

    <?php // echo $form->field($model, 'g46') ?>

    <?php // echo $form->field($model, 'g47') ?>

    <?php // echo $form->field($model, 'g48') ?>

    <?php // echo $form->field($model, 'oklusi') ?>

    <?php // echo $form->field($model, 'torus_palatinus') ?>

    <?php // echo $form->field($model, 'torus_mandibularis') ?>

    <?php // echo $form->field($model, 'palatum') ?>

    <?php // echo $form->field($model, 'supernumerary_teeth') ?>

    <?php // echo $form->field($model, 'diastema') ?>

    <?php // echo $form->field($model, 'spacing') ?>

    <?php // echo $form->field($model, 'oral_hygiene') ?>

    <?php // echo $form->field($model, 'gingiva_periodontal') ?>

    <?php // echo $form->field($model, 'oral_mucosa') ?>

    <?php // echo $form->field($model, 'tongue') ?>

    <?php // echo $form->field($model, 'lain_lain') ?>

    <?php // echo $form->field($model, 'kesimpulan') ?>

    <?php // echo $form->field($model, 'saran') ?>

    <?php // echo $form->field($model, 'riwayat') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
