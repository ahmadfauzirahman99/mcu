<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SpesialisPsikologiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Spesialis Psikologis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spesialis-psikologi-index">

    <p>
        <?= Html::a('Create Spesialis Psikologi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_spesialis_psikologi',
            'nama_no_rm',
            'created_at',
            'updated_at',
            'created_by',
            //'updated_by',
            //'rs_pendukung',
            //'dokter',
            //'rp_diagnosa_dokter',
            //'rp_keluhan_fisik',
            //'rp_keluhan_psikologis',
            //'asesmen_observasi_du_penampilan_umum',
            //'asesmen_observasi_du_sikap_terhadap_pemeriksa',
            //'asesmen_observasi_du_afek',
            //'asesmen_observasi_du_roman_muka',
            //'asesmen_observasi_du_proses_pikir',
            //'asesmen_observasi_du_gangguan_persepsi',
            //'asesmen_observasi_fp_kognitif_memori',
            //'asesmen_observasi_fp_kognitif_konsentrasi',
            //'asesmen_observasi_fp_kognitif_orientasi',
            //'asesmen_observasi_fp_kognitif_kemampuan_verbal',
            //'asesmen_observasi_fp_kognitif_emosi',
            //'asesmen_observasi_fp_kognitif_perilaku',
            //'simptom_sakit_kepala',
            //'simptom_kurang_nafsu_makan',
            //'simptom_sulit_tidur',
            //'simptom_mudah_takut',
            //'simptom_tegang',
            //'simptom_cemas',
            //'simptom_gemetar',
            //'simptom_gangguan_perut',
            //'simptom_sulit_konsentrasi',
            //'simptom_sedih',
            //'simptom_sulit_mengambil_keputusan',
            //'simptom_kehilangan_minat',
            //'simptom_merasa_tidak_berguna',
            //'simptom_mudah_lupa',
            //'simptom_merasa_bersalah',
            //'simptom_mudah_lelah',
            //'simptom_putus_asa',
            //'simptom_mudah_marah',
            //'simptom_mudah_tersinggung',
            //'simptom_mimpi_buruk',
            //'simptom_tidak_percaya_diri',
            //'psikotes_pendukung_1',
            //'psikotes_pendukung_2',
            //'psikotes_pendukung_3',
            //'psikotes_pendukung_4',
            //'psikotes_pendukung_5',
            //'hasil_tes',
            //'dinamika_psikologi',
            //'kesimpulan',

            ['class' => 'app\components\ActionColumnPemeriksaan'],
        ],
    ]); ?>


</div>
