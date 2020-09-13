<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DataLayanan */

$this->title = $model->no_rekam_medik . " ( " . $model->nama . ")";
$this->params['breadcrumbs'][] = ['label' => 'Data Layanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="data-layanan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_data_pelayanan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_data_pelayanan], [
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
            'id_data_pelayanan',
            'no_rekam_medik',
            'no_mcu',
            'nama',
            'tempat',
            'tgl_lahir',
            'agama',
            'kedudukan_dalam_keluarga',
            'status_perkawinan',
            'pendidikan',
            'pekerjaan',
            'alamat:ntext',
            'wni',
            'tanggal_pemeriksaan',
            [
                'attribute' => 'pas_foto_offline:ntext',
                'format' => 'raw',
                'value' => function ($model) {
                    return "<img src='{$model->pas_foto_offline}' width='30%'/>";
                }
            ],

            'pas_foto_online_valid',
            'kode_debitur',
            'kode_paket',
            'no_registrasi',
            'jenis_kelamin',
            'no_ujian',
        ],
    ]) ?>

</div>