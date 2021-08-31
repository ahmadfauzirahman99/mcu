<?php

use app\components\Helper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
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
            // 'no_mcu',
            'nama',
            // 'tempat',
            // 'tgl_lahir',
            //'agama',
            //'kedudukan_dalam_keluarga',
            //'status_perkawinan',
            //'pendidikan',
            // 'pekerjaan',
            //'alamat:ntext',
            //'wni',
            'tanggal_pemeriksaan:date',
            //'pas_foto_offline:ntext',
            //'pas_foto_online_valid',
            [
                'attribute' => 'kode_debitur',
                'filter' => array('0127' => 'Kejaksaan', '0128' => 'Pilkada', '0129' => 'CPNS Bengkalis')
            ],
            //'kode_paket',
            //'no_registrasi',
            //'jenis_kelamin',
            //'no_ujian',

            Helper::getRumpun()['kodejenis'] == "20" ?
                ([
                    'class' => 'app\components\ActionColumn',
                ])
                : 'pekerjaan',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'PKTK/Sertifikat/CPNS ',
                'headerOptions' => ['style' => 'color:#337ab7;text-align: center'],
                'contentOptions' => ['style' => 'text-align: center'],
                'template' => '{pktk}  {sertifikat} {cpns}',
                'buttons' => [
                    'pktk' => function ($url, $model) {
                        return Html::a('P', $url, [
                            'class' => 'btn btn-danger btn-trans',
                            'target'=>'_blank',

                            'data' => [
                                // 'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]);
                    },
                    'sertifikat' => function ($url, $model) {
                        return Html::a('C', $url, [
                            'class' => 'btn btn-warning btn-trans',
                            'target'=>'_blank',
                            'data' => [
                                // 'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]);
                    },
                    'cpns' => function ($url, $model) {
                        return
                            
                         Html::a('N', ['laporan-bengkalis/cetak','no_rm'=>$model->no_rekam_medik,'no_daftar'=>$model->no_registrasi], [
                            'class' => 'btn btn-success btn-trans',
                            'target'=>'_blank',
                            'data' => [
                                // 'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]);
                    },
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'pktk') {
                        $url = \yii\helpers\Url::to(['/laporan/cetak-pktk', 'id' => $model->no_rekam_medik,'no_daftar'=> $model->no_registrasi]);
                        return $url;
                    }

                    if ($action === 'sertifikat') {
                        $url = \yii\helpers\Url::to(['/laporan/cetak-sertifikat', 'id' => $model->no_rekam_medik,'no_daftar'=> $model->no_registrasi]);
                        return $url;
                    }


                    if ($action === 'cpns') {
                        $url = \yii\helpers\Url::to(['/laporan-bengkalis/cetak', 
                            'no_rm' => $model->no_rekam_medik,'no_daftar'=>$model->no_registrasi]);
                        return $url;
                    }
                }
            ],
        ],
        'pager' => [
            'class' => 'app\components\GridPager',
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>