<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DataLayananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Layanan Unit Medical Check Up';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-layanan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php Html::a('Create Data Layanan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(['enablePushState' => false]); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_data_pelayanan',
            'no_rekam_medik',
            'no_mcu',
            'nama',
            'tempat',
            'tgl_lahir',
            //'agama',
            //'kedudukan_dalam_keluarga',
            //'status_perkawinan',
            //'pendidikan',
            'pekerjaan',
            //'alamat:ntext',
            //'wni',
            //'tanggal_pemeriksaan',
            //'pas_foto_offline:ntext',
            //'pas_foto_online_valid',
            //'kode_debitur',
            //'kode_paket',
            //'no_registrasi',
            //'jenis_kelamin',
            //'no_ujian',

            [
                'class' => 'app\components\ActionColumn',
            ],
        ],
        'pager' => [
            'class' => 'app\components\GridPager',
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>