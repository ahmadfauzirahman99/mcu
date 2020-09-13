<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-13 18:14:13 
 * @Last Modified by:   Dicky Ermawan S., S.T., MTA 
 * @Last Modified time: 2020-09-13 18:14:13 
 */


use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisAudiometri */

$this->title = $model->id_spesialis_audiometri;
$this->params['breadcrumbs'][] = ['label' => 'Mcu Spesialis Audiometris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mcu-spesialis-audiometri-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_spesialis_audiometri], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_spesialis_audiometri], [
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
            'id_spesialis_audiometri',
            'no_rekam_medik',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'ac_125_kanan',
            'ac_250_kanan',
            'ac_500_kanan',
            'ac_1000_kanan',
            'ac_2000_kanan',
            'ac_3000_kanan',
            'ac_4000_kanan',
            'ac_5000_kanan',
            'ac_6000_kanan',
            'ac_7000_kanan',
            'ac_8000_kanan',
            'bc_125_kanan',
            'bc_250_kanan',
            'bc_500_kanan',
            'bc_1000_kanan',
            'bc_2000_kanan',
            'bc_3000_kanan',
            'bc_4000_kanan',
            'bc_5000_kanan',
            'bc_6000_kanan',
            'bc_7000_kanan',
            'bc_8000_kanan',
            'ac_125_kiri',
            'ac_250_kiri',
            'ac_500_kiri',
            'ac_1000_kiri',
            'ac_2000_kiri',
            'ac_3000_kiri',
            'ac_4000_kiri',
            'ac_5000_kiri',
            'ac_6000_kiri',
            'ac_7000_kiri',
            'ac_8000_kiri',
            'bc_125_kiri',
            'bc_250_kiri',
            'bc_500_kiri',
            'bc_1000_kiri',
            'bc_2000_kiri',
            'bc_3000_kiri',
            'bc_4000_kiri',
            'bc_5000_kiri',
            'bc_6000_kiri',
            'bc_7000_kiri',
            'bc_8000_kiri',
            'kesimpulan_kanan',
            'kesimpulan_kiri',
            'kesimpulan:ntext',
            'rata_kanan_ac',
            'rata_kanan_bc',
            'rata_kiri_ac',
            'rata_kiri_bc',
            'gambar:ntext',
        ],
    ]) ?>

</div>
