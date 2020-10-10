<?php

/* @var $this yii\web\View */

use app\models\spesialis\BaseModel;
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

$this->title = 'Menu Tidak Melanjutkan Pemeriksaan';
$this->params['breadcrumbs'][] = $this->title;

$itemPemeriksaan = [
    "Anamenesi",
    "Anamensis Okupasi",
    "Pemeriksaan Fisik",
    "Pemeriksaan Mata",
    "Pemeriksaan Gigi",
    "Pemeriksaan Test Berbisik",
    "Pemeriksaan Audio Metri"
];
?>
<?php $form = ActiveForm::begin(); ?>

<div class="row">
    <div class="col-lg-12">
        <label for="">Nama Pasien</label>
        <?php
        echo $form->field($model, 'no_rekam_medik')->widget(Select2::classname(), [
            'data' => BaseModel::getListPasien(),
            'theme' => 'bootstrap',
            'options' => ['placeholder' => 'Cari Pasien ...'],
            'pluginOptions' => [
                'allowClear' => false
            ],
            'pluginEvents' => [
                "select2:select" => "function(e) { 
                window.location = baseUrl + 'site/item-mcu?id=' + e.params.data.id
            }",
            ],
        ])->label(false);
        ?>'
        <?php ActiveForm::end(); ?>
    </div>
    <div class="col-lg-12">
        <?php foreach ($itemPemeriksaan as $item) { ?>
            <button type="button" class="btn btn-warning waves-effect w-md waves-warning m-b-5"><?= $item ?></button>
        <?php } ?>
    </div>
</div>