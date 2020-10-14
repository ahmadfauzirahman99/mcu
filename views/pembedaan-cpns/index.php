<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\DataLayanan;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PembedaanCpnsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pembedaan Cpns';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembedaan-cpns-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Pilihan Jabatan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_pembedaan',
            [
                'attribute' =>'no_rekam_medik',
                'value'=> function($model){
                    $user_data = DataLayanan::findOne(['no_rekam_medik'=>$model->no_rekam_medik]);
                    return $user_data->no_rekam_medik . " / " . $user_data->nama;
                }
            ],
            'noted',
            [
                'attribute'=> 'pilhan_terima_jabatan',
                'value'=> function($model){
                    $hasil = "";
                    if($model->pilhan_terima_jabatan == 'A'){
                        $hasil = "Baik untuk semua jabatan";
                    }

                    if($model->pilhan_terima_jabatan == 'B'){
                        $hasil = "Hanya baik untuk jabatantata usaha";
                    }

                    if($model->pilhan_terima_jabatan == 'C'){
                        $hasil = "Hanya baik untuk jabatan tertentu";
                    }

                    if($model->pilhan_terima_jabatan == 'D'){
                        $hasil = "Tidak baik untuk semua jabatan";
                    }
                    return $hasil;

                }
            ],
            'status',
            // 'created_by',
            //'tanggal',

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
