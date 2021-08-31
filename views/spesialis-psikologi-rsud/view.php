<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisPsikologi */

$this->title = $model->id_spesialis_psikologi;
$this->params['breadcrumbs'][] = ['label' => 'Mcu Spesialis Psikologis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mcu-spesialis-psikologi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_spesialis_psikologi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_spesialis_psikologi], [
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
            'id_spesialis_psikologi',
            'no_rekam_medik',
            'no_daftar',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'pendidikan',
            'alamat',
            'jenis_kelamin',
            'urutan_kelahiran',
            'agama',
            'status',
            'pekerjaan',
            'tgl_pemeriksaan',
            'diagnosa_dokter',
            'keluhan_fisik:ntext',
            'keluhan_psikologis:ntext',
            'penampilan_umum',
            'sikap_terhadap_pemeriksa',
            'afek',
            'roman_muka',
            'proses_pikir',
            'gangguan_persepsi',
            'kognitif_memori',
            'kognitif_konsentrasi',
            'kognitif_orientasi',
            'kognitif_kemampuan_verbal',
            'emosi',
            'perilaku',
            'simptom',
            'pendukung_1',
            'pendukung_2',
            'pendukung_3',
            'pendukung_4',
            'pendukung_5',
            'pendukung_hasil_tes:ntext',
            'dinamika_psikologi:ntext',
            'kesimpulan:ntext',
            'riwayat:ntext',
            'kesan:ntext',
            'status_pemeriksaan:ntext',
        ],
    ]) ?>

</div>
