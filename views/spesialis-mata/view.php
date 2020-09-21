<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisMata */

$this->title = $model->id_spesialis_mata;
$this->params['breadcrumbs'][] = ['label' => 'Mcu Spesialis Matas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mcu-spesialis-mata-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_spesialis_mata], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_spesialis_mata], [
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
            'id_spesialis_mata',
            'no_rekam_medik',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'persepsi_warna_mata_kanan',
            'persepsi_warna_mata_kiri',
            'kelopak_mata_kanan',
            'kelopak_mata_kiri',
            'konjungtiva_mata_kanan',
            'konjungtiva_mata_kiri',
            'kesegarisan_gerak_bola_mata_kanan',
            'kesegarisan_gerak_bola_mata_kiri',
            'skiera_mata_kanan',
            'skiera_mata_kiri',
            'lensa_mata_kanan',
            'lensa_mata_kiri',
            'kornea_mata_kanan',
            'kornea_mata_kiri',
            'bulu_mata_kanan',
            'bulu_mata_kiri',
            'tekanan_bola_mata_kanan',
            'tekanan_bola_mata_kiri',
            'penglihatan_3_dimensi_mata_kanan',
            'penglihatan_3_dimensi_mata_kiri',
            'virus_mata_tanpa_koreksi_mata_kanan',
            'virus_mata_tanpa_koreksi_mata_kiri',
            'virus_mata_dengan_koreksi_mata_kanan',
            'virus_mata_dengan_koreksi_mata_kiri',
            'lain_lain:ntext',
            'kesimpulan:ntext',
            'riwayat:ntext',
        ],
    ]) ?>

</div>
