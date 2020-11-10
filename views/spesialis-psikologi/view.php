<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SpesialisPsikologi */

$this->title = $model->id_spesialis_psikologi;
$this->params['breadcrumbs'][] = ['label' => 'Spesialis Psikologis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="spesialis-psikologi-view">

    <p>
        <?= Html::a('<i class="fa fa-backward"></i> Kembali', ['index'], ['class' => 'btn btn-warning']) ?>    
        <?= Html::a('Update', ['update', 'id' => $model->id_spesialis_psikologi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_spesialis_psikologi], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_spesialis_psikologi',
            'no_rekam_medik',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',
            'rs_pendukung',
            'dokter',
            'rp_diagnosa_dokter',
            'rp_keluhan_fisik',
            'rp_keluhan_psikologis',
            'asesmen_observasi_du_penampilan_umum',
            'asesmen_observasi_du_sikap_terhadap_pemeriksa',
            'asesmen_observasi_du_afek',
            'asesmen_observasi_du_roman_muka',
            'asesmen_observasi_du_proses_pikir',
            'asesmen_observasi_du_gangguan_persepsi',
            'asesmen_observasi_fp_kognitif_memori',
            'asesmen_observasi_fp_kognitif_konsentrasi',
            'asesmen_observasi_fp_kognitif_orientasi',
            'asesmen_observasi_fp_kognitif_kemampuan_verbal',
            'asesmen_observasi_fp_kognitif_emosi',
            'asesmen_observasi_fp_kognitif_perilaku',
            'simptom_sakit_kepala',
            'simptom_kurang_nafsu_makan',
            'simptom_sulit_tidur',
            'simptom_mudah_takut',
            'simptom_tegang',
            'simptom_cemas',
            'simptom_gemetar',
            'simptom_gangguan_perut',
            'simptom_sulit_konsentrasi',
            'simptom_sedih',
            'simptom_sulit_mengambil_keputusan',
            'simptom_kehilangan_minat',
            'simptom_merasa_tidak_berguna',
            'simptom_mudah_lupa',
            'simptom_merasa_bersalah',
            'simptom_mudah_lelah',
            'simptom_putus_asa',
            'simptom_mudah_marah',
            'simptom_mudah_tersinggung',
            'simptom_mimpi_buruk',
            'simptom_tidak_percaya_diri',
            'psikotes_pendukung_1',
            'psikotes_pendukung_2',
            'psikotes_pendukung_3',
            'psikotes_pendukung_4',
            'psikotes_pendukung_5',
            'hasil_tes',
            'dinamika_psikologi',
            'kesimpulan',
        ],
    ]) ?>

</div>
