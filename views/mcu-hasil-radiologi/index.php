<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\McuHasilRadiologiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mcu Hasil Radiologi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mcu-hasil-radiologi-index">
    <p>
        <?= Html::a('Create Mcu Hasil Radiologi', ['create'], ['class' => 'btn btn-success']) ?>

        
    <?= Html::a('<i class="fa fa-trash"></i> Hapus', ['delete-all', 'id' => '0129'], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah kamu yakin akan menghapus semua data ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


    <?php Pjax::begin(['enablePushState' => false]); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_hasil_radiologi',
            'id_data_pelayanan',
            'no_rekam_medik',
            'no_registrasi',
            //'no_mcu',
            //'kode_debitur',
            'kode_pemeriksa',
            'result_pemeriksaan',
            //'hasil:ntext',
            'status',

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
