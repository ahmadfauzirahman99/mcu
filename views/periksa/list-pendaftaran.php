<?php

use kartik\date\DatePicker;
use yii\grid\GridView;

$this->title = "List Pendaftaran Pasien"
?>
<div class="card-box">
    <h5 class="header-title m-t-0 m-b-30">Biodata Pasien</h5>
    <ul class="nav nav-tabs">
        <?= $this->render('timeline', [
            'id_pelayanan' => $id_pelayanan,
            'no_daftar' => $no_daftar,
            'no_rm' => $no_rm
        ]) ?>
    </ul>
    <div class="tab-content">
        <style>
            #form .col-form-label {
                font-size: small;
            }

            #form .form-group {
                margin-bottom: 0.1rem;
            }
        </style>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'tableOptions' => [
                'class' => 'table table-sm table-bordered table-hover table-list-item'
            ],
            'columns' => [
                [
                    'contentOptions' => ['style' => 'text-align:center'],
                    'headerOptions' => ['style' => 'text-align:center'],
                    'class' => 'yii\grid\SerialColumn'
                ],

                // 'id_data_pelayanan',
                [

                    'attribute' => 'no_registrasi',
                    'contentOptions' => ['style' => 'text-align:center'],
                    'headerOptions' => ['style' => 'text-align:center'],
                ],
                [
                    'attribute' => 'no_rekam_medik',
                    'contentOptions' => ['style' => 'text-align:center'],
                    'headerOptions' => ['style' => 'text-align:center'],
                ],
                [
                    'attribute' => 'nama',
                    'contentOptions' => ['style' => 'text-align:center'],
                    'headerOptions' => ['style' => 'text-align:center'],
                ],
                // 'no_mcu',
                // 'nama',
                // 'tempat',
                // 'tgl_lahir',
                // 'agama',
                // 'kedudukan_dalam_keluarga',
                //'status_perkawinan',
                //'pendidikan',
                // 'pekerjaan',
                //'alamat:ntext',
                //'wni',
                [
                    'label' => 'Tanggal Pemeriksaan',
                    'contentOptions' => ['style' => 'padding:10px'],

                    // 'headerOptions' => ['class' => $bgTableHeader],
                    'attribute' => 'tanggal_pemeriksaan',
                    // 'format' => ['date', 'php:l, d M Y H:i:s'],
                    'filter' => DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'tanggal_pemeriksaan',
                        'options' => ['class' => 'form-control form-control-sm'],
                        'pluginOptions' => [
                            'todayHighlight' => true,
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ]),
                    'value' => function ($model) {
                        return Yii::$app->formatter->asDatetime($model->tanggal_pemeriksaan);
                    }
                    // 'value' => function ($model) {
                    // }
                ],

                // [
                //     'class' => 'yii\grid\ActionColumn',
                //     // 'header' => 'PKTK/Sertifikat/CPNS ',
                //     'headerOptions' => ['style' => 'color:#337ab7;text-align: center'],
                //     'contentOptions' => ['style' => 'text-align: center'],
                //     'template' => '{periksa} {pktk} {sertifikat} {cpns}',
                //     'buttons' => [
                //         'pktk' => function ($url, $model) {
                //             return Html::a('P', $url, [
                //                 'class' => 'btn btn-danger btn-trans',
                //                 'target' => '_blank',

                //                 'data' => [
                //                     // 'confirm' => 'Are you sure you want to delete this item?',
                //                     'method' => 'post',
                //                 ],
                //             ]);
                //         },
                //         'sertifikat' => function ($url, $model) {
                //             return Html::a('C', $url, [
                //                 'class' => 'btn btn-warning btn-trans',
                //                 'target' => '_blank',
                //                 'data' => [
                //                     // 'confirm' => 'Are you sure you want to delete this item?',
                //                     'method' => 'post',
                //                 ],
                //             ]);
                //         },
                //         'periksa' => function ($url, $model) {
                //             return

                //                 Html::a('<span class="fas fa-pen-square"></span>', ['periksa/index', 'no_rm' => $model->no_rekam_medik, 'id_pelayanan' => $model->id_data_pelayanan, 'no_daftar' => $model->no_registrasi], [
                //                     'class' => 'btn btn-info btn-trans',
                //                     'target' => '_blank',
                //                     'data' => [
                //                         // 'confirm' => 'Are you sure you want to delete this item?',
                //                         'method' => 'post',
                //                     ],
                //                 ]);
                //         },
                //         'cpns' => function ($url, $model) {
                //             return
                //                 Html::a('N', ['laporan-bengkalis/cetak', 'no_rm' => $model->no_rekam_medik, 'no_daftar' => $model->id_data_pelayanan, 'd' => $model->no_registrasi], [
                //                     'class' => 'btn btn-success btn-trans',
                //                     'target' => '_blank',
                //                     'data' => [
                //                         // 'confirm' => 'Are you sure you want to delete this item?',
                //                         'method' => 'post',
                //                     ],
                //                 ]);
                //         },
                //     ],
                //     'urlCreator' => function ($action, $model, $key, $index) {
                //         if ($action === 'pktk') {
                //             $url = \yii\helpers\Url::to(['/laporan/cetak-pktk', 'id' => $model->no_rekam_medik, 'no_daftar' => $model->no_registrasi]);
                //             return $url;
                //         }

                //         if ($action === 'sertifikat') {
                //             $url = \yii\helpers\Url::to(['/laporan/cetak-sertifikat', 'id' => $model->no_rekam_medik, 'no_daftar' => $model->no_registrasi]);
                //             return $url;
                //         }


                //         if ($action === 'cpns') {
                //             $url = \yii\helpers\Url::to(['/laporan-bengkalis/cetak', 'no_rm' => $model->no_rekam_medik, 'no_daftar' => $model->id_data_pelayanan]);
                //             return $url;
                //         }
                //     }
                // ],
            ],
            'pager' => [
                'class' => 'app\components\GridPager',
            ],
        ]); ?>
    </div>
</div>