<?php

use app\components\Helper;
use app\models\spesialis\BaseModel;
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;
use app\assets\ItemFisikAsset;

ItemFisikAsset::register($this);
/* @var $dataLayanan app\models\ */

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
<?php $identitas_dokter = Helper::getRumpun()  ?>

<h2 class="text-center">UNIT MEDICAL CHEK UP RSUD ARIFIN ACHMAD PROVINSI RIAU
    PEMERIKSAAN KESEHATAN TENAGA KERJA
</h2>

<?= $this->render('data-layanan', ['model' => $dataLayanan,]) ?>
<?= $this->render('anamnesis.php', ['model' => $anamnesis, 'dataLayanan' => $dataLayanan,]) ?>

<?php if ($identitas_dokter['kodejenis'] == 36 || $identitas_dokter['kodejenis'] == 37 || $identitas_dokter['kodejenis'] == 20 || $identitas_dokter['kodejenis'] == 1) { ?>
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

    <?= $this->render('anamnesa-bengkalis', [
        'modelAnamnesaBengkalis' => $modelAnamnesaBengkalis,
        'dataLayanan' => $dataLayanan,
        'modelPemeriksaanBengkalis' => $modelPemeriksaanBengkalis
    ]) ?>


<?= $this->render('item-fisik.php', [
    'master_pemeriksaan_fisik' => $master_pemeriksaan_fisik,
    'dataLayanan' => $dataLayanan,
    'hasil_mcu_mata' => $hasil_mcu_mata,
    'hasil_mcu_gigi' => $hasil_mcu_gigi,
    'modelMata' => $modelMata,
    'modelGigi' => $modelGigi,
    'hasil_lab' => $hasil_lab,

]) ?>

<?= $this->render('penata.php', [
    // 'master_pemeriksaan_fisik' => $master_pemeriksaan_fisik,
    'dataLayanan' => $dataLayanan,
    'penata' => $penata

]) ?>
<hr>
<?php
if ($identitas_dokter['kodejenis'] == 12) :
?>
<?php
elseif ($identitas_dokter['kodejenis'] == 1) :
?>
    <a href='<?= Url::to(['/laporan/cetak-perawat/', 'id' => $dataLayanan->no_rekam_medik]) ?>' target='_blank' class='btn btn-danger btn-block'>Print Data Pelayanan, Anamensis, Anamensis Okupasi</a>
    <a href='<?= Url::to(['/laporan/cetak-dokter-umum/', 'id' => $dataLayanan->no_rekam_medik]) ?>' target='_blank' class='btn btn-primary btn-block'>Print Pemeriksaan Fisik</a>
<?php
elseif ($identitas_dokter['kodejenis'] == 20) :
?>
<?php
elseif ($identitas_dokter['kodejenis'] == 16) :
?>
<?php
elseif ($identitas_dokter['kodejenis'] == 36) :
?>
    <a href='<?= Url::to(['/laporan/cetak-perawat/', 'id' => $dataLayanan->no_rekam_medik]) ?>' target='_blank' class='btn btn-primary'>Print Data Pelayanan, Anamensis, Anamensis Okupasi</a>
<?php
elseif ($identitas_dokter['kodejenis'] == 37) :
?>
    <a href='<?= Url::to(['/laporan/cetak-perawat/', 'id' => $dataLayanan->no_rekam_medik]) ?>' target='_blank' class='btn btn-primary'>Print Data Pelayanan, Anamensis, Anamensis Okupasi</a>
<?php
elseif ($identitas_dokter['kodejenis'] == 2) :
?>

<?php else : ?>
<?php endif ?>