<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-13 18:14:13 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2020-09-15 00:00:57
 */

use app\components\Helper;
use app\models\DataLayanan;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\di\Container;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisAudiometri */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Pemeriksaan Kesehatan Audiometri Tenaga Kerja';
$this->params['breadcrumbs'][] = ['label' => 'Unit Medical Check Up', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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

<div class="mcu-spesialis-audiometri-form">

    <div style="text-align: center;">
        <h3 style="font-weight: bold; margin-bottom: 0px;">Unit Medical Check Up</h3>
        <h3 style="font-weight: bold; margin-top: 0px;"><?= Html::encode($this->title) ?></h3>
    </div>

    <hr>

    <?php $form = ActiveForm::begin([
        'id' => 'form-spesialis-audiometri',
        'validateOnSubmit' => false, // agar submit ajax tidak 2 kali saat pertama kali reload
    ]); ?>

    <?php
    echo $form->field($model, 'cari_pasien')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(DataLayanan::find()->select(['no_rekam_medik', 'nama'])->all(), 'no_rekam_medik', 'nama'),
        'theme' => 'bootstrap',
        'options' => ['placeholder' => 'Cari Pasien ...'],
        'pluginOptions' => [
            'allowClear' => false
        ],
        'pluginEvents' => [
            "select2:select" => "function(e) { 
                window.location = baseUrl + '/spesialis-audiometri/periksa?no_rm=' + e.params.data.id
            }",
        ],
    ]);
    ?>
    <br>

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

    <br>

    <table class="table">
        <colgroup span="19" width="53"></colgroup>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 height="19" align="center" valign=top><b>
                    <font color="#000000">Right/Kanan</font>
                </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=9 align="center" valign=top><b>
                    <font color="#000000">Left/Kiri</font>
                </b></td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="center" valign=middle><b>
                    <font color="#000000"><br></font>
                </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="125" sdnum="1033;"><b>
                    <font color="#000000">125</font>
                </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="250" sdnum="1033;"><b>
                    <font color="#000000">250</font>
                </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="500" sdnum="1033;"><b>
                    <font color="#000000">500</font>
                </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="1000" sdnum="1033;"><b>
                    <font color="#000000">1000</font>
                </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="2000" sdnum="1033;"><b>
                    <font color="#000000">2000</font>
                </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="3000" sdnum="1033;"><b>
                    <font color="#000000">3000</font>
                </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="4000" sdnum="1033;"><b>
                    <font color="#000000">4000</font>
                </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="6000" sdnum="1033;"><b>
                    <font color="#000000">6000</font>
                </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="8000" sdnum="1033;"><b>
                    <font color="#000000">8000</font>
                </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="125" sdnum="1033;"><b>
                    <font color="#000000">125</font>
                </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="250" sdnum="1033;"><b>
                    <font color="#000000">250</font>
                </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="500" sdnum="1033;"><b>
                    <font color="#000000">500</font>
                </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="1000" sdnum="1033;"><b>
                    <font color="#000000">1000</font>
                </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="2000" sdnum="1033;"><b>
                    <font color="#000000">2000</font>
                </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="3000" sdnum="1033;"><b>
                    <font color="#000000">3000</font>
                </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="4000" sdnum="1033;"><b>
                    <font color="#000000">4000</font>
                </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="6000" sdnum="1033;"><b>
                    <font color="#000000">6000</font>
                </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="8000" sdnum="1033;"><b>
                    <font color="#000000">8000</font>
                </b></td>
        </tr>
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="center" valign=middle><b>
                    <font color="#000000">AC</font>
                </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'ac_125_kanan')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'ac_250_kanan')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'ac_500_kanan')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'ac_1000_kanan')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'ac_2000_kanan')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'ac_3000_kanan')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'ac_4000_kanan')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'ac_6000_kanan')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'ac_8000_kanan')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'ac_125_kiri')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'ac_250_kiri')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'ac_500_kiri')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'ac_1000_kiri')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'ac_2000_kiri')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'ac_3000_kiri')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'ac_4000_kiri')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'ac_6000_kiri')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'ac_8000_kiri')->textInput(['maxlength' => true])->label(false) ?>
            </td>
        </tr>
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="center" valign=middle><b>
                    <font color="#000000">BC</font>
                </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'bc_125_kanan')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'bc_250_kanan')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'bc_500_kanan')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'bc_1000_kanan')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'bc_2000_kanan')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'bc_3000_kanan')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'bc_4000_kanan')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'bc_6000_kanan')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'bc_8000_kanan')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'bc_125_kiri')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'bc_250_kiri')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'bc_500_kiri')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'bc_1000_kiri')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'bc_2000_kiri')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'bc_3000_kiri')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'bc_4000_kiri')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'bc_6000_kiri')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'bc_8000_kiri')->textInput(['maxlength' => true])->label(false) ?>
            </td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; font-weight: bold;" colspan=2 height="19" align="left" valign=top>
                <font color="#000000">Kesimpulan:</font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td style="border-right: 1px solid #000000" align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000" height="19" align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="center" valign=bottom>
                AC
            </td>
            <td colspan=8 valign=bottom>
                <?= $form->field($model, 'rata_kanan_ac')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td valign=bottom>
                AC
            </td>
            <td style="border-right: 1px solid #000000" colspan=8 valign=bottom>
                <?= $form->field($model, 'rata_kiri_ac')->textInput(['maxlength' => true])->label(false) ?>
            </td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000" height="19" align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="center" valign=bottom>
                BC
            </td>
            <td colspan=8 valign=bottom>
                <?= $form->field($model, 'rata_kanan_bc')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td valign=bottom>
                BC
            </td>
            <td style="border-right: 1px solid #000000" colspan=8 valign=bottom>
                <?= $form->field($model, 'rata_kiri_bc')->textInput(['maxlength' => true])->label(false) ?>
            </td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000" height="19" align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="center" valign=bottom>
                <font color="#000000">Kanan</font>
            </td>
            <td colspan=8 valign=bottom>
                <?= $form->field($model, 'kesimpulan_kanan')->inline()->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal',], [
                    'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                        return Helper::radioList($index, $label, $name, $checked, $value, $model);
                    }
                ])->label(false) ?>
            </td>
            <td valign=bottom>
                <font color="#000000">Kiri</font>
            </td>
            <td style="border-right: 1px solid #000000" colspan=8 valign=bottom>
                <?= $form->field($model, 'kesimpulan_kiri')->inline()->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal',], [
                    'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                        return Helper::radioList($index, $label, $name, $checked, $value, $model);
                    }
                ])->label(false) ?>
            </td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000" height="19" align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td style="border-right: 1px solid #000000" align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000; font-weight: bold;" colspan=2 height="19" align="left" valign=top>
                <font color="#000000">Catatan</font>
            </td>
            <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=17 rowspan=3 align="left" valign=top>
                <?= $form->field($model, 'kesimpulan')->textarea(['rows' => 6])->label(false) ?>
            </td>
        </tr>
        <tr>
            <td style="border-left: 1px solid #000000" height="19" align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
        </tr>
        <tr>
            <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" height="19" align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=bottom>
                <font color="#000000"><br></font>
            </td>
        </tr>
    </table>

    <div class="form-group">
        <?php
        if (array_key_exists('no_rm', $_GET))
            echo Html::submitButton('Simpan', ['class' => 'btn btn-success']);
        ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

$this->registerJs($this->render('periksa.js'));
