<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SpesialisNarkobaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Spesialis Narkobas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spesialis-narkoba-index">

    <p>
        <?= Html::a('Create Spesialis Narkoba', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_spesialis_narkoba',
            'nama_no_rm',
            'created_at',
            'updated_at',
            'created_by',
            //'updated_by',
            //'benzodiazepin_hasil',
            //'benzodiazepin_keterangan',
            //'thc_hasil',
            //'thc_keterangan',
            //'piat_hasil',
            //'piat_keterangan',
            //'amphetammin_hasil',
            //'amphetammin_keterangan',
            //'kokain_hasil',
            //'kokain_keterangan',
            //'methamphetamin_hasil',
            //'methamphetamin_keterangan',
            //'carisoprodol_hasil',
            //'carisoprodol_keterangan',

            ['class' => 'app\components\ActionColumnPemeriksaan'],
        ],
    ]); ?>


</div>
