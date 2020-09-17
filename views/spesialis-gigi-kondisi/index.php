<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\spesialis\McuSpesialisGigiKondisiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Spesialis Gigi - Kondisi Gigi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mcu-spesialis-gigi-kondisi-index">

    <p>
        <?= Html::a('Tambah Kondisi Gigi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_spesialis_gigi_kondisi',
            'nama',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            //'riwayat:ntext',

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
