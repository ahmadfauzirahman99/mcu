<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SettingManualLabSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mcu Setting Manual Labs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mcu-setting-manual-lab-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Mcu Setting Manual Lab', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_manual',
            'no_pasien',
            'no_registrasi',
            'id_item_lab',
            'kondisi',
            //'nilai_manual',
            //'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
