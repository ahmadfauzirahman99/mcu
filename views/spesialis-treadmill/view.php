<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisTreadmill */

$this->title = $model->id_spesialis_treadmill;
$this->params['breadcrumbs'][] = ['label' => 'Mcu Spesialis Treadmills', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mcu-spesialis-treadmill-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_spesialis_treadmill], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_spesialis_treadmill], [
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
            'id_spesialis_treadmill',
            'no_rekam_medik',
            'no_daftar',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'permintaan',
            'metode',
            'lama_latihan',
            'test_dihentikan_karena',
            'dj_maksimal',
            'td_maksimal',
            'ekg_istirahat',
            'ekg_latihan',
            'ekg_pemulihan',
            'tingkat_kesegaran_jasmani',
            'kelas_fungsional',
            'kapasitas_aerobik',
            'respon_hemodinamik',
            'respon_iskemik:ntext',
            'anjuran:ntext',
            'riwayat:ntext',
            'kesan:ntext',
            'status_pemeriksaan:ntext',
        ],
    ]) ?>

</div>
