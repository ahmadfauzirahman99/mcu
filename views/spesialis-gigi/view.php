<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisGigi */

$this->title = $model->id_spesialis_gigi;
$this->params['breadcrumbs'][] = ['label' => 'Mcu Spesialis Gigis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mcu-spesialis-gigi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_spesialis_gigi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_spesialis_gigi], [
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
            'id_spesialis_gigi',
            'no_rekam_medik',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'g18',
            'g17',
            'g16',
            'g15',
            'g14',
            'g13',
            'g12',
            'g11',
            'g21',
            'g22',
            'g23',
            'g24',
            'g25',
            'g26',
            'g27',
            'g28',
            'g38',
            'g37',
            'g36',
            'g35',
            'g34',
            'g33',
            'g32',
            'g31',
            'g41',
            'g42',
            'g43',
            'g44',
            'g45',
            'g46',
            'g47',
            'g48',
            'oklusi',
            'torus_palatinus',
            'torus_mandibularis',
            'palatum',
            'supernumerary_teeth',
            'diastema',
            'spacing',
            'oral_hygiene',
            'gingiva_periodontal',
            'oral_mucosa',
            'tongue',
            'lain_lain:ntext',
            'kesimpulan:ntext',
            'saran:ntext',
            'riwayat:ntext',
        ],
    ]) ?>

</div>
