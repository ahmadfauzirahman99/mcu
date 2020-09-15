<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\JenisPekerjaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jenis Pekerjaans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-pekerjaan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Jenis Pekerjaan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_jenis_pekerjaan',
            'jenis_pekerjaan:ntext',
            'bahan_material:ntext',
            'tempat_kerja',
            'masa_kerja',
            //'no_rekam_medik',
            //'tanggal_created',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
