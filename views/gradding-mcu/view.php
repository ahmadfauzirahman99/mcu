<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GraddingMcu */

$this->title = $model->id_gradding;
$this->params['breadcrumbs'][] = ['label' => 'Gradding MCU', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="gradding-mcu-view">

    <p>
       <?= Html::a('<i class="fa fa-backward"></i> Kembali', ['index'], ['class' => 'btn btn-warning']) ?>   
        <?= Html::a('<i class="mdi mdi-pencil"></i> Perbaharui', ['update', 'id' => $model->id_gradding], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-trash"></i> Hapus', ['delete', 'id' => $model->id_gradding], [
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
            'id_gradding',
            'id_data_pelayanan',
            'no_rekam_medik',
            'no_registrasi',
            'no_mcu',
            'kode_debitur',
            'hasil:ntext',
            'status',
            'is_reset',
            'poin',
        ],
    ]) ?>

</div>
