<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisGigiKondisi */

$this->title = $model->id_spesialis_gigi_kondisi;
$this->params['breadcrumbs'][] = ['label' => 'Mcu Spesialis Gigi Kondisis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mcu-spesialis-gigi-kondisi-view">

    <h1><?= Html::encode($this->title) ?></h1>
  
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_spesialis_gigi_kondisi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_spesialis_gigi_kondisi], [
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
            'id_spesialis_gigi_kondisi',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'nama',
            'riwayat:ntext',
        ],
    ]) ?>

</div>
