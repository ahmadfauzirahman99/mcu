<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\McuHasilRadiologi */

$this->title = $model->id_hasil_radiologi;
$this->params['breadcrumbs'][] = ['label' => 'Mcu Hasil Radiologis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mcu-hasil-radiologi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_hasil_radiologi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_hasil_radiologi], [
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
            'id_hasil_radiologi',
            'id_data_pelayanan',
            'no_rekam_medik',
            'no_registrasi',
            'no_mcu',
            'kode_debitur',
            'kode_pemeriksa',
            'result_pemeriksaan',
            'hasil:ntext',
            'status',
        ],
    ]) ?>

</div>
