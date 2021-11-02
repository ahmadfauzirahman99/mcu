<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\McuItemLabSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'MCU Item Labs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mcu-item-lab-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Input Item', ['create'], ['class' => 'btn btn-success', 'data-pjax'=>0]) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_item_lab',
            'nama_item_lab',
            'kode_tes_lab',
            'nilai_normal',
            'ket',
            //'status',
            //'created_id',
            //'created_date',
            //'modified_id',
            //'modified_date',
            //'deleted_id',
            //'deleted_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
