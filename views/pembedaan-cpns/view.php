<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\DataLayanan;
use app\models\AkunAknUser;
/* @var $this yii\web\View */
/* @var $model app\models\PembedaanCpns */

$user_data = DataLayanan::findOne(['no_rekam_medik'=>$model->no_rekam_medik]);
// var_dump($user_data);
// exit();
$this->title = $model->no_rekam_medik . " / " . $user_data->nama;
$this->params['breadcrumbs'][] = ['label' => 'Pembedaan Cpns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pembedaan-cpns-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_pembedaan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_pembedaan], [
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
            // 'id_pembedaan',
            [
                'attribute'=> 'pilhan_terima_jabatan',
                'value'=> function($model){
                    $hasil = "";
                    if($model->pilhan_terima_jabatan == 'A'){
                        $hasil = "Baik untuk semua jabatan";
                    }

                    if($model->pilhan_terima_jabatan == 'B'){
                        $hasil = "Hanya baik untuk jabatantata usaha";
                    }

                    if($model->pilhan_terima_jabatan == 'C'){
                        $hasil = "Hanya baik untuk jabatan tertentu";
                    }

                    if($model->pilhan_terima_jabatan == 'D'){
                        $hasil = "Tidak baik untuk semua jabatan";
                    }
                    return $hasil;

                }
            ],
            'status',
            'no_rekam_medik',
            [
                'attribute'=>'created_by',
                'value'=> function($model)
                {
                    $dokter = AkunAknUser::findOne(['userid'=>$model->created_by]);

                    return $dokter->nama ." / ".$dokter->username;
                }
            ],
            'tanggal:date',
        ],
    ]) ?>

</div>
