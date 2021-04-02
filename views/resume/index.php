<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\BaseInflector;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\resume\McuResumeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mcu Resumes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mcu-resume-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_resume',
            // 'created_at',
            // 'updated_at',
            //'created_by',
            //'updated_by',
            //'jenis_pemeriksaan',
            //'tidak_normal:ntext',
            //'riwayat:ntext',
            'nama_no_rm',
            'no_daftar',
            [
                'attribute' => 'jenis_pemeriksaan',
                'value' => function ($model) {
                    return $model->jenis_pemeriksaan;
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['style' => 'color:#337ab7; min-width: 150px; text-align: center;'],
                'contentOptions' => ['style' => 'text-align: center;'],
                'template' => '{proses}',
                'visibleButtons' => [],
                'buttons' => [
                    'proses' => function ($url, $model) {
                        return Html::a(
                            '<span class="fas fa-search fa-md"></span>',
                            ['/resume/lihat', 'id' => $model->id_resume],
                            [
                                'data-pjax' => 0,
                                'data-toggle' => 'tooltip',
                                'data-placement' => 'top',
                                'title' => 'Lihat Resume',
                                'class' => 'btn btn-warning btn-sm btn-icon',
                            ]
                        );
                    },
                ],
            ],
        ],
        'pager' => [
            'class' => 'app\components\GridPager',
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>