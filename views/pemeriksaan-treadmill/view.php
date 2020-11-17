<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanTreadmill */

$this->title = $model->id_tread;
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Treadmills', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pemeriksaan-treadmill-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_tread], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_tread], [
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
            'id_tread',
            'no_daftar',
            'no_rekam_medik',
            'hasil_treadmill',
            'kesan',
            'kesimpulan',
            'created_at',
            'created_by',
            'update_at',
            'update_by',
        ],
    ]) ?>

</div>
