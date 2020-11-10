<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SpesialisPsikologiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="spesialis-psikologi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_spesialis_psikologi') ?>

    <?= $form->field($model, 'no_rekam_medik') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <?= $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'rs_pendukung') ?>

    <?php // echo $form->field($model, 'dokter') ?>

    <?php // echo $form->field($model, 'rp_diagnosa_dokter') ?>

    <?php // echo $form->field($model, 'rp_keluhan_fisik') ?>

    <?php // echo $form->field($model, 'rp_keluhan_psikologis') ?>

    <?php // echo $form->field($model, 'asesmen_observasi_du_penampilan_umum') ?>

    <?php // echo $form->field($model, 'asesmen_observasi_du_sikap_terhadap_pemeriksa') ?>

    <?php // echo $form->field($model, 'asesmen_observasi_du_afek') ?>

    <?php // echo $form->field($model, 'asesmen_observasi_du_roman_muka') ?>

    <?php // echo $form->field($model, 'asesmen_observasi_du_proses_pikir') ?>

    <?php // echo $form->field($model, 'asesmen_observasi_du_gangguan_persepsi') ?>

    <?php // echo $form->field($model, 'asesmen_observasi_fp_kognitif_memori') ?>

    <?php // echo $form->field($model, 'asesmen_observasi_fp_kognitif_konsentrasi') ?>

    <?php // echo $form->field($model, 'asesmen_observasi_fp_kognitif_orientasi') ?>

    <?php // echo $form->field($model, 'asesmen_observasi_fp_kognitif_kemampuan_verbal') ?>

    <?php // echo $form->field($model, 'asesmen_observasi_fp_kognitif_emosi') ?>

    <?php // echo $form->field($model, 'asesmen_observasi_fp_kognitif_perilaku') ?>

    <?php // echo $form->field($model, 'simptom_sakit_kepala') ?>

    <?php // echo $form->field($model, 'simptom_kurang_nafsu_makan') ?>

    <?php // echo $form->field($model, 'simptom_sulit_tidur') ?>

    <?php // echo $form->field($model, 'simptom_mudah_takut') ?>

    <?php // echo $form->field($model, 'simptom_tegang') ?>

    <?php // echo $form->field($model, 'simptom_cemas') ?>

    <?php // echo $form->field($model, 'simptom_gemetar') ?>

    <?php // echo $form->field($model, 'simptom_gangguan_perut') ?>

    <?php // echo $form->field($model, 'simptom_sulit_konsentrasi') ?>

    <?php // echo $form->field($model, 'simptom_sedih') ?>

    <?php // echo $form->field($model, 'simptom_sulit_mengambil_keputusan') ?>

    <?php // echo $form->field($model, 'simptom_kehilangan_minat') ?>

    <?php // echo $form->field($model, 'simptom_merasa_tidak_berguna') ?>

    <?php // echo $form->field($model, 'simptom_mudah_lupa') ?>

    <?php // echo $form->field($model, 'simptom_merasa_bersalah') ?>

    <?php // echo $form->field($model, 'simptom_mudah_lelah') ?>

    <?php // echo $form->field($model, 'simptom_putus_asa') ?>

    <?php // echo $form->field($model, 'simptom_mudah_marah') ?>

    <?php // echo $form->field($model, 'simptom_mudah_tersinggung') ?>

    <?php // echo $form->field($model, 'simptom_mimpi_buruk') ?>

    <?php // echo $form->field($model, 'simptom_tidak_percaya_diri') ?>

    <?php // echo $form->field($model, 'psikotes_pendukung_1') ?>

    <?php // echo $form->field($model, 'psikotes_pendukung_2') ?>

    <?php // echo $form->field($model, 'psikotes_pendukung_3') ?>

    <?php // echo $form->field($model, 'psikotes_pendukung_4') ?>

    <?php // echo $form->field($model, 'psikotes_pendukung_5') ?>

    <?php // echo $form->field($model, 'hasil_tes') ?>

    <?php // echo $form->field($model, 'dinamika_psikologi') ?>

    <?php // echo $form->field($model, 'kesimpulan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
