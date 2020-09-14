<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\spesialis\McuSpesialisAudiometriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mcu Spesialis Audiometris';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mcu-spesialis-audiometri-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Mcu Spesialis Audiometri', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_spesialis_audiometri',
            'no_rekam_medik',
            'created_at',
            'updated_at',
            'created_by',
            //'updated_by',
            //'ac_125_kanan',
            //'ac_250_kanan',
            //'ac_500_kanan',
            //'ac_1000_kanan',
            //'ac_2000_kanan',
            //'ac_3000_kanan',
            //'ac_4000_kanan',
            //'ac_5000_kanan',
            //'ac_6000_kanan',
            //'ac_7000_kanan',
            //'ac_8000_kanan',
            //'bc_125_kanan',
            //'bc_250_kanan',
            //'bc_500_kanan',
            //'bc_1000_kanan',
            //'bc_2000_kanan',
            //'bc_3000_kanan',
            //'bc_4000_kanan',
            //'bc_5000_kanan',
            //'bc_6000_kanan',
            //'bc_7000_kanan',
            //'bc_8000_kanan',
            //'ac_125_kiri',
            //'ac_250_kiri',
            //'ac_500_kiri',
            //'ac_1000_kiri',
            //'ac_2000_kiri',
            //'ac_3000_kiri',
            //'ac_4000_kiri',
            //'ac_5000_kiri',
            //'ac_6000_kiri',
            //'ac_7000_kiri',
            //'ac_8000_kiri',
            //'bc_125_kiri',
            //'bc_250_kiri',
            //'bc_500_kiri',
            //'bc_1000_kiri',
            //'bc_2000_kiri',
            //'bc_3000_kiri',
            //'bc_4000_kiri',
            //'bc_5000_kiri',
            //'bc_6000_kiri',
            //'bc_7000_kiri',
            //'bc_8000_kiri',
            //'kesimpulan_kanan',
            //'kesimpulan_kiri',
            //'kesimpulan:ntext',
            //'rata_kanan_ac',
            //'rata_kanan_bc',
            //'rata_kiri_ac',
            //'rata_kiri_bc',
            //'gambar:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
