<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SpesialisKejiwaan */

$this->title = $model->id_spesialis_kejiwaan;
$this->params['breadcrumbs'][] = ['label' => 'Spesialis Kejiwaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="spesialis-kejiwaan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_spesialis_kejiwaan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_spesialis_kejiwaan], [
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
            'id_spesialis_kejiwaan',
            'no_rekam_medik',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'rs_pendukung',
            'dokter',
            'skala_l',
            'skala_p',
            'skala_k',
            'skala_1_hs',
            'skala_2_d',
            'skala_3_hy',
            'skala_4_pd',
            'skala_5_mf',
            'skala_6_pa',
            'skala_7_pt',
            'skala_8_sc',
            'skala_9_ma',
            'skala_0_si',
            'validitas',
            'interpretasi_subtantif',
            'saran',
            'kesimpulan',
        ],
    ]) ?>

</div>
