<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\McuItemLab */

$this->title = $model->nama_item_lab;
$this->params['breadcrumbs'][] = ['label' => 'Mcu Item Labs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mcu-item-lab-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fa fa-backward"></i> Kembali', ['index'], ['class' => 'btn btn-warning']) ?>        
        <?= Html::a('<i class="fa fa-pencil"></i> Perbaharui', ['update', 'id' => $model->id_item_lab], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-trash"></i> Hapus', ['delete', 'id' => $model->id_item_lab], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah kamu yakin akan menghapus data ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_item_lab',
            'nama_item_lab',
            'kode_tes_lab',
            'nilai_normal',
            'ket',
            'status',
            'created_id',
            'created_date',
            'modified_id',
            'modified_date',
            'deleted_id',
            'deleted_date',
        ],
    ]) ?>

</div>
