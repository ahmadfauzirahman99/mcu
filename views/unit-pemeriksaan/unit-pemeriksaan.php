<?php

use app\components\Helper;
use app\models\spesialis\BaseModel;
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;
use app\assets\ItemFisikAsset;

ItemFisikAsset::register($this);

?>
<?php $form = ActiveForm::begin(); ?>

<div class="row">
    <div class="col-lg-12">
        <label for="">Nama Pasien</label>
        <?php
        echo $form->field($dataLayanan, 'nama')->widget(Select2::classname(), [
            'data' => BaseModel::getListPasien(),
            'theme' => 'bootstrap',
            'options' => ['placeholder' => 'Cari Pasien ...'],
            'pluginOptions' => [
                'allowClear' => false
            ],
            'pluginEvents' => [
                "select2:select" => "function(e) { 
                window.location = baseUrl + 'unit-pemeriksaan/unit-pemeriksaan?id=' + e.params.data.id
            }",
            ],
        ])->label(false);
        ?>'
        <?php ActiveForm::end(); ?>
    </div>
</div>

<h2 class="text-center">UNIT MEDICAL CHEK UP RSUD ARIFIN ACHMAD PROVINSI RIAU
    PEMERIKSAAN KESEHATAN TENAGA KERJA
</h2>
<?= $this->render('data-layanan', ['model' => $dataLayanan,]) ?>
<?= $this->render('anamnesis.php', ['model' => $anamnesis, 'dataLayanan' => $dataLayanan,]) ?>

<?php $identitas_dokter = Helper::getRumpun()  ?>
<?php if ($identitas_dokter['kodejenis'] == 36 || $identitas_dokter['kodejenis'] == 37 || $identitas_dokter['kodejenis'] == 20) { ?>
    <?= $this->render(
        'anamnesis-okupasi.php',
        [
            'jenisPekerjaan' => $jenis_pekerjaan,
            'dataLayanan' => $dataLayanan,
            'anamnesis' => $anamnesis,
            'modelBahayaPotensial' => $modelBahayaPotensial,
            'modelBrief' => $modelBrief
            // 'dataBiodataUser' => $dataBiodataUser
        ]
    ) ?>
<?php } ?>

<?php if ($dataLayanan->kode_debitur == '0129') { ?>
    <?= $this->render('anamnesa-bengkalis', [
        'modelAnamnesaBengkalis' => $modelAnamnesaBengkalis, 
        'dataLayanan' => $dataLayanan,
        'modelPemeriksaanBengkalis' => $modelPemeriksaanBengkalis
        ]) ?>
<?php } ?>

<?= $this->render('item-fisik.php', [
    'master_pemeriksaan_fisik' => $master_pemeriksaan_fisik,
    'dataLayanan' => $dataLayanan,

]) ?>