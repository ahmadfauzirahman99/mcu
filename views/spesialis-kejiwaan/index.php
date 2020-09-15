<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SpesialisKejiwaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Spesialis Kejiwaan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spesialis-kejiwaan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Pemeriksaan Kejiwaan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php 
    // echo $this->render('_search', ['model' => $searchModel]); 
    $ket_kejiwaan = array("Tidak Ditemukan Gangguan Jiwa", "DItemukan Gangguan Jiwa");
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        //'model' => $model,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_spesialis_kejiwaan',
            'no_rekam_medik',
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',
            'rs_pendukung',
            'status',
            // [
            //     'value' => function ($model) {
            //         $v = $ket_kejiwaan[$model->status];
            //         return $v;
            //     },
            // ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
