<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AnamnesisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Anamneses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anamnesis-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Anamnesis', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_anamnesis',
            'jawaban1:ntext',
            'jawaban2:ntext',
            'jawaban3:ntext',
            'jawaban4:ntext',
            //'jawaban5:ntext',
            //'jawaban6:ntext',
            //'jawaban7:ntext',
            //'nomor_rekam_medik',
            //'g',
            //'p',
            //'a',
            //'h',
            //'jawaban8:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
