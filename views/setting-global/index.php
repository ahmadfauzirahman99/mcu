<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SettingGlobalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Setting Global';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-global-index">

    <p>
        <?= Html::a('<i class="fa fa-plus-square"></i> Input Setting Global', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(['enablePushState' => false]); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_global',
            'id_item_setting',
            [
                'class' => \yii\grid\DataColumn::className(), // this line is optional
                'attribute' => 'id_item_setting',
                'label' => 'Item',
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center'],
                'value' => function ($model) {
                    return isset( $model['item']['nama_item_setting']) ? $model['item']['nama_item_setting'] : '';
                },
            ],
            'tampil',
            'status',

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
