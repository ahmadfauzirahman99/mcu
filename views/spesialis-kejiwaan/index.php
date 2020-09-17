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
            //'dokter',
            //'skala_l',
            //'skala_p',
            //'skala_k',
            //'skala_1_hs',
            //'skala_2_d',
            //'skala_3_hy',
            //'skala_4_pd',
            //'skala_5_mf',
            //'skala_6_pa',
            //'skala_7_pt',
            //'skala_8_sc',
            //'skala_9_ma',
            //'skala_0_si',
            //'kesimpulan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
