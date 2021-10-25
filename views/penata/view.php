<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuPenatalaksanaanMcu */

$this->title = $model->id_penata;
$this->params['breadcrumbs'][] = ['label' => 'Mcu Penatalaksanaan Mcus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mcu-penatalaksanaan-mcu-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_penata], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_penata], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_penata',
            'jenis_permasalahan:ntext',
            'rencana:ntext',
            'target_waktu:ntext',
            'hasil_yang_diharapkan:ntext',
            'keterangan:ntext',
            'no_rekam_medik:ntext',
            'jenis:ntext',
            'id_fk',
        ],
    ]) ?>

</div>
