<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SpesialisNarkoba */

$this->title = $model->id_spesialis_narkoba;
$this->params['breadcrumbs'][] = ['label' => 'Spesialis Narkobas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="spesialis-narkoba-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_spesialis_narkoba], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_spesialis_narkoba], [
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
            'id_spesialis_narkoba',
            'no_rekam_medik',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'benzodiazepin_hasil',
            'benzodiazepin_keterangan',
            'thc_hasil',
            'thc_keterangan',
            'piat_hasil',
            'piat_keterangan',
            'amphetammin_hasil',
            'amphetammin_keterangan',
            'kokain_hasil',
            'kokain_keterangan',
            'methamphetamin_hasil',
            'methamphetamin_keterangan',
            'carisoprodol_hasil',
            'carisoprodol_keterangan',
        ],
    ]) ?>

</div>
