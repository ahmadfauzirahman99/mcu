<?php

use app\models\spesialis\McuSpesialisGigi;
use app\models\spesialis\McuSpesialisMata;
use app\models\spesialis\McuSpesialisThtBerbisik;
use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\UserRegister;

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
            // 'id_gradding',
            // 'id_data_pelayanan',
            [
                'label'=>'Nama',
                'attribute' => 'no_rekam_medik',
                'value' => $model->data->nama
            ],
            [
                'label'=>'No Rekam Medik',
                'attribute' => 'no_rekam_medik',
                'value' => $model->data->no_rekam_medik
            ],
            [
                'label'=>'Pekerjaan',
                'attribute' => 'no_rekam_medik',
                'value' => function($model)
                {
                    $user = UserRegister::findOne(['u_rm'=>$model->no_rekam_medik]);
                    return $user->u_jabatan;
                }
            ],

            // 'no_registrasi',
            // 'no_mcu',
            // 'kode_debitur',
            // 'status',
            // 'is_reset',
            // 'poin',
			//'hasil'
        ],
    ]) ?>

</div>
<?php
$hasil_mcu_mata = json_decode($model->hasil);
$hasil_mcu_gigi = json_decode($model->hasil);
$hasil_mcu_tht_berbisik = json_decode($model->hasil);
// echo '<pre>';
// var_dump($hasil_mcu->mata);
// $ms = $model->attributeLabels('persepsi_warna_mata_kanan');
// print_r($hasil_mcu_tht_berbisik->tht_berbisik);
$modelMata = McuSpesialisMata::findOne(['no_rekam_medik'=> $model->no_rekam_medik]);
$modelGigi = McuSpesialisGigi::findOne(['no_rekam_medik'=> $model->no_rekam_medik]);
$modelThtBerbisik = McuSpesialisThtBerbisik::findOne(['no_rekam_medik'=>$model->no_rekam_medik]);
?>
<?php if($modelMata->kesan != 'Normal'){ ?>
<h4 class="text-center">Mata Tidak Normal</h4>
<hr>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Item</th>
            <th>Value</th>
        </tr>
    </thead>
    <?php foreach ($hasil_mcu_mata->mata as $items) { ?>

        <?php if ($items->result == 1) { ?>
            <tbody>
                <tr>
                    <td width='50%'><?= $modelMata->getAttributeLabel($items->item) ?></td>
                    <td><?= $items->value ?></td>
                </tr>
            </tbody>
        <?php } ?>

    <?php } ?>
</table>
<?php } ?>

<?php if($modelGigi->kesan != 'Normal'){ ?>

<h4 class="text-center">Gigi Tidak Normal</h4>
<hr>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Item</th>
            <th>Value</th>
        </tr>
    </thead>
    <?php foreach ($hasil_mcu_gigi->gigi as $items) { ?>

        <?php if ($items->result == 1) { ?>
            <tbody>
                <tr>
                    <td width='50%'><?= $modelGigi->getAttributeLabel($items->item) ?></td>
                    <td><?= $items->value ?></td>
                </tr>
            </tbody>
        <?php } ?>

    <?php } ?>
</table>
<?php } ?>
<?php if($modelThtBerbisik->kesan != 'Normal'){ ?>

<h4 class="text-center">THT Berbisik Tidak Normal</h4>
<hr>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Item</th>
            <th>Value</th>
        </tr>
    </thead>
    <?php foreach ($hasil_mcu_tht_berbisik->tht_berbisik as $items) { ?>

        <?php if ($items->result == 1) { ?>
            <tbody>
                <tr>
                    <td width='50%'><?= $modelThtBerbisik->getAttributeLabel($items->item) ?></td>
                    <td><?= $items->value ?></td>
                </tr>
            </tbody>
        <?php } ?>

    <?php } ?>
</table>
<?php } ?>