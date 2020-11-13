<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanEkg */

$this->title = $model->id_ekg;
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Ekgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pemeriksaan-ekg-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_ekg], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_ekg], [
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
            'id_ekg',
            'hasil_ekg',
            'kesimpulan:ntext',
            'kesan',
            'create_at',
            'created_by',
            'update_at',
            'update_by',
            'no_rekam_medik',
            'no_daftar',
        ],
    ]) ?>

</div>
