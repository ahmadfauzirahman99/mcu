<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-13 18:14:13 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2020-09-14 23:43:54
 */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\spesialis\McuSpesialisAudiometriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pemeriksaan Kesehatan Audiometri Tenaga Kerja';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mcu-spesialis-audiometri-index">

    <p>
        <?= Html::a('Tambah Pemeriksaan', ['periksa'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_spesialis_audiometri',
            'nama_no_rm',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
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

            [
                'class' => 'app\components\ActionColumnSpesialis',
            ],
        ],
        'pager' => [
            'class' => 'app\components\GridPager',
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>