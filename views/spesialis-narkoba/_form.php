<?php

use app\models\spesialis\BaseModel;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SpesialisNarkoba */
/* @var $form yii\widgets\ActiveForm */
?>

<style type="text/css">
    .table {
        border: 0.5px solid #000000;
    }

    .table-bordered>thead>tr>th,
    .table-bordered>tbody>tr>th,
    .table-bordered>tfoot>tr>th,
    .table-bordered>thead>tr>td,
    .table-bordered>tbody>tr>td,
    .table-bordered>tfoot>tr>td {
        border: 0.5px solid #000000;
    }

    .form-group {
        margin-bottom: 0px !important;
    }

    .tr-ac-bc td {
        padding: 3px !important;
    }

    .tr-ac-bc .was-validated .form-control:valid,
    .tr-ac-bc .form-control.is-valid {
        padding: 0.75rem !important;
        background-image: none;
    }
</style>

<div class="spesialis-narkoba-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    echo $form->field($model, 'cari_pasien')->widget(Select2::classname(), [
        'data' => BaseModel::getListPasien(),
        'theme' => 'bootstrap',
        'options' => ['placeholder' => 'Cari Pasien ...'],
        'pluginOptions' => [
            'allowClear' => false
        ],
        'pluginEvents' => [
            "select2:select" => "function(e) { 
                window.location = baseUrl + 'spesialis-narkoba/create?no_rm=' + e.params.data.id
            }",
        ],
    ]);
    ?>
    
    <div class="row">
        <div class="col-sm-3">
            <label for="">No. Rekam Medik</label>
            <?php
            $model->no_rekam_medik = $no_rm;
            echo $form->field($model, 'no_rekam_medik')->textInput(['maxlength' => true, 'readonly' => true,])->label(false)
            ?>
        </div>
        <div class="col-sm-9">
            <div class="form-group">
                <label for="">Nama</label>
                <input readonly type="text" class="form-control" value="<?= $pasien->nama ?? null ?>" id="nama_pasien">
            </div>
        </div>
    </div>

    <br/>
    <table class="table">
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" colspan="2" valign=top><b>
                <font color="#000000">Hasil Pemeriksaan Screening Tes</font>
            </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top><b>
                <font color="#000000">Keterangan</font>
            </b></td>
        </tr>
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            Benzodiazepin Hasil
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
                <?= $form->field($model, 'benzodiazepin_hasil')->label(false)->textInput(['maxlength' => true, 'placeholder' => "Positif / Negatif"]) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'benzodiazepin_keterangan')->label(false)->textInput(['maxlength' => true]) ?>
            </td>
        </tr>
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            THC Hasil
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
                <?= $form->field($model, 'thc_hasil')->label(false)->textInput(['maxlength' => true, 'placeholder' => "Positif / Negatif"]) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'thc_keterangan')->label(false)->textInput(['maxlength' => true]) ?>
            </td>
        </tr>
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            Opiat Hasil
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
                <?= $form->field($model, 'opiat_hasil')->label(false)->textInput(['maxlength' => true, 'placeholder' => "Positif / Negatif"]) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'opiat_keterangan')->label(false)->textInput(['maxlength' => true]) ?>
            </td>
        </tr>
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            Amphetammin Hasil
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
                <?= $form->field($model, 'amphetammin_hasil')->label(false)->textInput(['maxlength' => true, 'placeholder' => "Positif / Negatif"]) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'amphetammin_keterangan')->label(false)->textInput(['maxlength' => true]) ?>
            </td>
        </tr>
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            Kokain Hasil
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
                <?= $form->field($model, 'kokain_hasil')->label(false)->textInput(['maxlength' => true, 'placeholder' => "Positif / Negatif"]) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'kokain_keterangan')->label(false)->textInput(['maxlength' => true]) ?>
            </td>
        </tr>
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            Methamphetamin Hasil
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
                <?= $form->field($model, 'methamphetamin_hasil')->label(false)->textInput(['maxlength' => true, 'placeholder' => "Positif / Negatif"]) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'methamphetamin_keterangan')->label(false)->textInput(['maxlength' => true]) ?>
            </td>
        </tr>
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            Carisoprodol Hasil
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
                <?= $form->field($model, 'carisoprodol_hasil')->label(false)->textInput(['maxlength' => true, 'placeholder' => "Positif / Negatif"]) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'carisoprodol_keterangan')->label(false)->textInput(['maxlength' => true]) ?>
            </td>
        </tr>
    </table>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
