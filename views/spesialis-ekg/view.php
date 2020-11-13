<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisEkg */

$this->title = $model->id_spesialis_ekg;
$this->params['breadcrumbs'][] = ['label' => 'Mcu Spesialis Ekgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mcu-spesialis-ekg-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_spesialis_ekg], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_spesialis_ekg], [
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
            'id_spesialis_ekg',
            'no_rekam_medik',
            'no_daftar',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'irama_jantung',
            'frekuensi_denyut_jantung',
            'gelombang_p',
            'interval_pr',
            'kompleks_qrs',
            'segmen_st',
            'gelombang_t',
            'lain_lain',
            'kesan_ekg_istirahat',
            'anjuran:ntext',
            'riwayat:ntext',
            'kesan:ntext',
            'status_pemeriksaan:ntext',
        ],
    ]) ?>

</div>
