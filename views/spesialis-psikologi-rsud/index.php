<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\spesialis\McuSpesialisPsikologiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mcu Spesialis Psikologis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mcu-spesialis-psikologi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Mcu Spesialis Psikologi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_spesialis_psikologi',
            'no_rekam_medik',
            'no_daftar',
            'created_at',
            'updated_at',
            //'created_by',
            //'updated_by',
            //'pendidikan',
            //'alamat',
            //'jenis_kelamin',
            //'urutan_kelahiran',
            //'agama',
            //'status',
            //'pekerjaan',
            //'tgl_pemeriksaan',
            //'diagnosa_dokter',
            //'keluhan_fisik:ntext',
            //'keluhan_psikologis:ntext',
            //'penampilan_umum',
            //'sikap_terhadap_pemeriksa',
            //'afek',
            //'roman_muka',
            //'proses_pikir',
            //'gangguan_persepsi',
            //'kognitif_memori',
            //'kognitif_konsentrasi',
            //'kognitif_orientasi',
            //'kognitif_kemampuan_verbal',
            //'emosi',
            //'perilaku',
            //'simptom',
            //'pendukung_1',
            //'pendukung_2',
            //'pendukung_3',
            //'pendukung_4',
            //'pendukung_5',
            //'pendukung_hasil_tes:ntext',
            //'dinamika_psikologi:ntext',
            //'kesimpulan:ntext',
            //'riwayat:ntext',
            //'kesan:ntext',
            //'status_pemeriksaan:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
