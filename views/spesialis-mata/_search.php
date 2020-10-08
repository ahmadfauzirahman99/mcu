<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisMataSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mcu-spesialis-mata-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_spesialis_mata') ?>

    <?= $form->field($model, 'no_rekam_medik') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <?= $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'persepsi_warna_mata_kanan') ?>

    <?php // echo $form->field($model, 'persepsi_warna_mata_kiri') ?>

    <?php // echo $form->field($model, 'kelopak_mata_kanan') ?>

    <?php // echo $form->field($model, 'kelopak_mata_kiri') ?>

    <?php // echo $form->field($model, 'konjungtiva_mata_kanan') ?>

    <?php // echo $form->field($model, 'konjungtiva_mata_kiri') ?>

    <?php // echo $form->field($model, 'kesegarisan_gerak_bola_mata_kanan') ?>

    <?php // echo $form->field($model, 'kesegarisan_gerak_bola_mata_kiri') ?>

    <?php // echo $form->field($model, 'skiera_mata_kanan') ?>

    <?php // echo $form->field($model, 'skiera_mata_kiri') ?>

    <?php // echo $form->field($model, 'lensa_mata_kanan') ?>

    <?php // echo $form->field($model, 'lensa_mata_kiri') ?>

    <?php // echo $form->field($model, 'kornea_mata_kanan') ?>

    <?php // echo $form->field($model, 'kornea_mata_kiri') ?>

    <?php // echo $form->field($model, 'bulu_mata_kanan') ?>

    <?php // echo $form->field($model, 'bulu_mata_kiri') ?>

    <?php // echo $form->field($model, 'tekanan_bola_mata_kanan') ?>

    <?php // echo $form->field($model, 'tekanan_bola_mata_kiri') ?>

    <?php // echo $form->field($model, 'penglihatan_3_dimensi_mata_kanan') ?>

    <?php // echo $form->field($model, 'penglihatan_3_dimensi_mata_kiri') ?>

    <?php // echo $form->field($model, 'virus_mata_tanpa_koreksi_mata_kanan') ?>

    <?php // echo $form->field($model, 'virus_mata_tanpa_koreksi_mata_kiri') ?>

    <?php // echo $form->field($model, 'virus_mata_dengan_koreksi_mata_kanan') ?>

    <?php // echo $form->field($model, 'virus_mata_dengan_koreksi_mata_kiri') ?>

    <?php // echo $form->field($model, 'lain_lain') ?>

    <?php // echo $form->field($model, 'kesimpulan') ?>

    <?php // echo $form->field($model, 'riwayat') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
