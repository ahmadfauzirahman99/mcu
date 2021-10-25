<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\KategoriSetting */

$this->title = $model->nama_kategori;
$this->params['breadcrumbs'][] = ['label' => 'Kategori Setting', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="kategori-setting-view">

    <p>
       <?= Html::a('<i class="fa fa-backward"></i> Kembali', ['index'], ['class' => 'btn btn-warning']) ?>   
        <?= Html::a('<i class="mdi mdi-pencil"></i> Perbaharui', ['update', 'id' => $model->id_kategori_setting], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-trash"></i> Hapus', ['delete', 'id' => $model->id_kategori_setting], [
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
            'id_kategori_setting',
            'nama_kategori',
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
