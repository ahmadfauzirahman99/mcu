<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\KategoriSettingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Kategori Setting';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-setting-index">
    <p>
        <?= Html::a('<i class="fa fa-plus-square"></i> Input Kategori Setting', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(['enablePushState' => false]); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_kategori_setting',
            'nama_kategori',
            'ket',
            'status',
            'created_id',
            //'created_date',
            //'modified_id',
            //'modified_date',
            //'deleted_id',
            //'deleted_date',

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
