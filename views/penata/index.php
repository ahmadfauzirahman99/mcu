<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\McuPenatalaksanaanMcuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mcu Penatalaksanaan Mcus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mcu-penatalaksanaan-mcu-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Mcu Penatalaksanaan Mcu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_penata',
            'jenis_permasalahan:ntext',
            'rencana:ntext',
            'target_waktu:ntext',
            'hasil_yang_diharapkan:ntext',
            //'keterangan:ntext',
            //'no_rekam_medik:ntext',
            //'jenis:ntext',
            //'id_fk',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
