<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\spesialis\McuSpesialisTreadmillSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mcu Spesialis Treadmills';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mcu-spesialis-treadmill-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Mcu Spesialis Treadmill', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_spesialis_treadmill',
            'no_rekam_medik',
            'no_daftar',
            'created_at',
            'updated_at',
            //'created_by',
            //'updated_by',
            //'permintaan',
            //'metode',
            //'lama_latihan',
            //'test_dihentikan_karena',
            //'dj_maksimal',
            //'td_maksimal',
            //'ekg_istirahat',
            //'ekg_latihan',
            //'ekg_pemulihan',
            //'tingkat_kesegaran_jasmani',
            //'kelas_fungsional',
            //'kapasitas_aerobik',
            //'respon_hemodinamik',
            //'respon_iskemik:ntext',
            //'anjuran:ntext',
            //'riwayat:ntext',
            //'kesan:ntext',
            //'status_pemeriksaan:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
