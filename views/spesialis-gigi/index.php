<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\spesialis\McuSpesialisGigiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pemeriksaan Kesehatan Gigi Tenaga Kerja';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mcu-spesialis-gigi-index">

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

            'id_spesialis_gigi',
            'nama_no_rm',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            //'g18',
            //'g17',
            //'g16',
            //'g15',
            //'g14',
            //'g13',
            //'g12',
            //'g11',
            //'g21',
            //'g22',
            //'g23',
            //'g24',
            //'g25',
            //'g26',
            //'g27',
            //'g28',
            //'g38',
            //'g37',
            //'g36',
            //'g35',
            //'g34',
            //'g33',
            //'g32',
            //'g31',
            //'g41',
            //'g42',
            //'g43',
            //'g44',
            //'g45',
            //'g46',
            //'g47',
            //'g48',
            //'oklusi',
            //'torus_palatinus',
            //'torus_mandibularis',
            //'palatum',
            //'supernumerary_teeth',
            //'diastema',
            //'spacing',
            //'oral_hygiene',
            //'gingiva_periodontal',
            //'oral_mucosa',
            //'tongue',
            //'lain_lain:ntext',
            //'kesimpulan:ntext',
            //'saran:ntext',
            //'riwayat:ntext',

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