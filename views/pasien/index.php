<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PasienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Layanan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-layanan-index">
    <div class="card card-body">



        <?php Pjax::begin(); ?>
        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
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
                'no_rekam_medik',
                // 'no_mcu',
                'no_registrasi',
                'nama',
                // 'tempat',
                // 'tgl_lahir',
                // 'agama',
                //'kedudukan_dalam_keluarga',
                //'status_perkawinan',
                //'pendidikan',
                //'pekerjaan',
                //'alamat:ntext',
                //'wni',
                [
                    'attribute' => 'tanggal_pemeriksaan',
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
                        return Yii::$app->formatter->asDate($model->tanggal_pemeriksaan);
                    }
                ],


                //'pas_foto_offline:ntext',
                //'pas_foto_online_valid',
                //'kode_debitur',
                //'kode_paket',
                //'jenis_kelamin',
                //'no_ujian',

                [
                    'contentOptions' => ['style' => 'text-align:center;width:10px'],
                    'headerOptions' => ['style' => 'text-align:center;width:10px'],
                    'class' => 'app\components\ActionColumn',
                    'template' => '{update}',

                ],
            ],
            'pager' => [
                'class' => 'app\components\GridPager',
            ],
        ]); ?>

        <?php Pjax::end(); ?>

    </div>
</div>