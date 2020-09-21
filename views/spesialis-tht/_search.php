<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisThtSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mcu-spesialis-tht-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_spesialis_tht') ?>

    <?= $form->field($model, 'no_rekam_medik') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <?= $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'tl_daun_telinga_kanan') ?>

    <?php // echo $form->field($model, 'tl_daun_telinga_kiri') ?>

    <?php // echo $form->field($model, 'tl_liang_telinga_kanan') ?>

    <?php // echo $form->field($model, 'tl_liang_telinga_kiri') ?>

    <?php // echo $form->field($model, 'tl_serumen_telinga_kanan') ?>

    <?php // echo $form->field($model, 'tl_serumen_telinga_kiri') ?>

    <?php // echo $form->field($model, 'tl_membrana_timpani_telinga_kanan') ?>

    <?php // echo $form->field($model, 'tl_membrana_timpani_telinga_kiri') ?>

    <?php // echo $form->field($model, 'tl_test_berbisik_telinga_kanan') ?>

    <?php // echo $form->field($model, 'tl_test_berbisik_telinga_kiri') ?>

    <?php // echo $form->field($model, 'tl_test_garpu_tata_rinne_telinga_kanan') ?>

    <?php // echo $form->field($model, 'tl_test_garpu_tata_rinne_telinga_kiri') ?>

    <?php // echo $form->field($model, 'tl_weber_telinga_kanan') ?>

    <?php // echo $form->field($model, 'tl_weber_telinga_kiri') ?>

    <?php // echo $form->field($model, 'tl_swabach_telinga_kanan') ?>

    <?php // echo $form->field($model, 'tl_swabach_telinga_kiri') ?>

    <?php // echo $form->field($model, 'tl_bing_telinga_kanan') ?>

    <?php // echo $form->field($model, 'tl_bing_telinga_kiri') ?>

    <?php // echo $form->field($model, 'tl_lain_lain') ?>

    <?php // echo $form->field($model, 'hd_meatus_nasi') ?>

    <?php // echo $form->field($model, 'hd_septum_nasi') ?>

    <?php // echo $form->field($model, 'hd_konka_nasal') ?>

    <?php // echo $form->field($model, 'hd_nyeri_ketok_sinus_maksilar') ?>

    <?php // echo $form->field($model, 'hd_penoluman') ?>

    <?php // echo $form->field($model, 'hd_lain_lain') ?>

    <?php // echo $form->field($model, 'tg_pharynx') ?>

    <?php // echo $form->field($model, 'tg_tonsil_kanan') ?>

    <?php // echo $form->field($model, 'tg_tonsil_kiri') ?>

    <?php // echo $form->field($model, 'tg_ukuran') ?>

    <?php // echo $form->field($model, 'tg_palatum') ?>

    <?php // echo $form->field($model, 'tg_lain_lain') ?>

    <?php // echo $form->field($model, 'audiometri') ?>

    <?php // echo $form->field($model, 'kesimpulan') ?>

    <?php // echo $form->field($model, 'riwayat') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
