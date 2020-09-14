<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SpesialisKejiwaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Spesialis Kejiwaans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spesialis-kejiwaan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Spesialis Kejiwaan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_spesialis_kejiwaan',
            'no_rekam_medik',
            'created_at',
            'updated_at',
            'created_by',
            //'updated_by',
            //'rs_pendukung',
            //'status',
            //'tanggal_created',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
