<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-13 18:14:13 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2020-09-16 09:52:57
 */

use app\components\Helper;
use app\models\DataLayanan;
use app\models\spesialis\BaseModel;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisGigi */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Pemeriksaan Kesehatan Gigi Tenaga Kerja';
$this->params['breadcrumbs'][] = ['label' => 'Unit Medical Check Up', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$dataG = [
    'Normal' => 'Normal',
    'Tidak Normal' => 'Tidak Normal',
];

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

    .tabel-gigi td {
        padding: 3px !important;
    }

    .form-group {
        margin-bottom: 0px !important;
    }
</style>

<div class="mcu-spesialis-audiometri-form">

    <div style="text-align: center;">
        <h3 style="font-weight: bold; margin-bottom: 0px;">Unit Medical Check Up</h3>
        <h3 style="font-weight: bold; margin-top: 0px;"><?= Html::encode($this->title) ?></h3>
    </div>

    <hr>

    <?php $form = ActiveForm::begin([
        'id' => 'form-spesialis-gigi',
        'validateOnSubmit' => false, // agar submit ajax tidak 2 kali saat pertama kali reload
    ]); ?>

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
                window.location = baseUrl + 'spesialis-gigi/periksa?no_rm=' + e.params.data.id
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

    <table class="table table-sm tabel-gigi">
        <colgroup width="41"></colgroup>
        <colgroup width="158"></colgroup>
        <colgroup width="30"></colgroup>
        <colgroup width="170"></colgroup>
        <colgroup width="41"></colgroup>
        <colgroup width="362"></colgroup>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 height="36" align="center" valign=middle>KETERANGAN</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle>KETERANGAN</td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle sdval="18" sdnum="1033;">18</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=bottom>
                <?= $form->field($model, 'g18')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="38" sdnum="1033;">38</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
                <?= $form->field($model, 'g38')->textInput(['maxlength' => true])->label(false) ?>
            </td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle sdval="17" sdnum="1033;">17</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=bottom>
                <?= $form->field($model, 'g17')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="37" sdnum="1033;">37</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
                <?= $form->field($model, 'g37')->textInput(['maxlength' => true])->label(false) ?>
            </td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle sdval="16" sdnum="1033;">16</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=bottom>
                <?= $form->field($model, 'g16')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="36" sdnum="1033;">36</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
                <?= $form->field($model, 'g36')->textInput(['maxlength' => true])->label(false) ?>
            </td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle sdval="15" sdnum="1033;">15</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=bottom>
                <?= $form->field($model, 'g15')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="35" sdnum="1033;">35</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
                <?= $form->field($model, 'g35')->textInput(['maxlength' => true])->label(false) ?>
            </td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle sdval="14" sdnum="1033;">14</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=bottom>
                <?= $form->field($model, 'g14')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="34" sdnum="1033;">34</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
                <?= $form->field($model, 'g34')->textInput(['maxlength' => true])->label(false) ?>
            </td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle sdval="13" sdnum="1033;">13</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=bottom>
                <?= $form->field($model, 'g13')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="33" sdnum="1033;">33</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
                <?= $form->field($model, 'g33')->textInput(['maxlength' => true])->label(false) ?>
            </td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle sdval="12" sdnum="1033;">12</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=bottom>
                <?= $form->field($model, 'g12')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="32" sdnum="1033;">32</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
                <?= $form->field($model, 'g32')->textInput(['maxlength' => true])->label(false) ?>
            </td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle sdval="11" sdnum="1033;">11</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=bottom>
                <?= $form->field($model, 'g11')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="31" sdnum="1033;">31</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
                <?= $form->field($model, 'g31')->textInput(['maxlength' => true])->label(false) ?>
            </td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle sdval="21" sdnum="1033;">21</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=bottom>
                <?= $form->field($model, 'g21')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="41" sdnum="1033;">41</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
                <?= $form->field($model, 'g41')->textInput(['maxlength' => true])->label(false) ?>
            </td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle sdval="22" sdnum="1033;">22</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=bottom>
                <?= $form->field($model, 'g22')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="42" sdnum="1033;">42</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
                <?= $form->field($model, 'g42')->textInput(['maxlength' => true])->label(false) ?>
            </td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle sdval="23" sdnum="1033;">23</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=bottom>
                <?= $form->field($model, 'g23')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="43" sdnum="1033;">43</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
                <?= $form->field($model, 'g43')->textInput(['maxlength' => true])->label(false) ?>
            </td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle sdval="24" sdnum="1033;">24</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=bottom>
                <?= $form->field($model, 'g24')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="44" sdnum="1033;">44</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
                <?= $form->field($model, 'g44')->textInput(['maxlength' => true])->label(false) ?>
            </td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle sdval="25" sdnum="1033;">25</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=bottom>
                <?= $form->field($model, 'g25')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="45" sdnum="1033;">45</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
                <?= $form->field($model, 'g45')->textInput(['maxlength' => true])->label(false) ?>
            </td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle sdval="26" sdnum="1033;">26</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=bottom>
                <?= $form->field($model, 'g26')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="46" sdnum="1033;">46</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
                <?= $form->field($model, 'g46')->textInput(['maxlength' => true])->label(false) ?>
            </td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle sdval="27" sdnum="1033;">27</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=bottom>
                <?= $form->field($model, 'g27')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="47" sdnum="1033;">47</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
                <?= $form->field($model, 'g47')->textInput(['maxlength' => true])->label(false) ?>
            </td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=middle sdval="28" sdnum="1033;">28</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left" valign=bottom>
                <?= $form->field($model, 'g28')->textInput(['maxlength' => true])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="48" sdnum="1033;">48</td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
                <?= $form->field($model, 'g48')->textInput(['maxlength' => true])->label(false) ?>
            </td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-left: 1px solid #000000" height="19" align="center" valign=middle><br></td>
            <td style="border-top: 1px solid #000000" align="center" valign=bottom><br></td>
            <td style="border-top: 1px solid #000000" align="center" valign=bottom><br></td>
            <td style="border-top: 1px solid #000000" align="center" valign=bottom><br></td>
            <td style="border-top: 1px solid #000000" align="center" valign=middle><br></td>
            <td style="border-top: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><br></td>
        </tr>
        <tr>
            <td colspan=2 height="19" align="left" valign=middle>Oklusi</td>
            <td align="left" valign=top>:</td>
            <td style="border-right: 1px solid #000000" colspan=3 valign=middle>
                <?php
                echo $form->field($model, 'oklusi')->radioList(
                    ['Normal Bite' => 'Normal Bite', 'Cross Bite' => 'Cross Bite', 'Steep Bite' => 'Steep Bite',],
                    [
                        'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                            return Helper::radioList($index, $label, $name, $checked, $value, $model);
                        }
                    ]
                )->label(false);
                ?>
            </td>
        </tr>
        <tr>
            <td colspan=2 height="19" align="left" valign=middle>Torus Palatinus</td>
            <td align="left" valign=middle>:</td>
            <td style="border-right: 1px solid #000000" colspan=3 valign=middle>
                <?php
                echo $form->field($model, 'torus_palatinus')->radioList(
                    ['Tidak Ada' => 'Tidak Ada', 'Kecil' => 'Kecil', 'Sedang' => 'Sedang', 'Besar' => 'Besar', 'Multiple' => 'Multiple',],
                    [
                        'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                            return Helper::radioList($index, $label, $name, $checked, $value, $model);
                        }
                    ]
                )->label(false);
                ?>
            </td>
        </tr>
        <tr>
            <td colspan=2 height="19" align="left" valign=middle>Torus Mandibularis</td>
            <td align="left" valign=middle>:</td>
            <td style="border-right: 1px solid #000000" colspan=3 valign=middle>
                <?php
                echo $form->field($model, 'torus_mandibularis')->radioList(
                    ['Tidak Ada' => 'Tidak Ada', 'Sisi Kiri' => 'Sisi Kiri', 'Sisi Kanan' => 'Sisi Kanan', 'Kedua Sisi' => 'Kedua Sisi',],
                    [
                        'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                            return Helper::radioList($index, $label, $name, $checked, $value, $model);
                        }
                    ]
                )->label(false);
                ?>
            </td>
        </tr>
        <tr>
            <td colspan=2 height="19" align="left" valign=middle>Palatum</td>
            <td align="left" valign=middle>:</td>
            <td style="border-right: 1px solid #000000" colspan=3 valign=middle>
                <?php
                echo $form->field($model, 'palatum')->radioList(
                    ['Tinggi' => 'Tinggi', 'Sedang' => 'Sedang', 'Rendah' => 'Rendah',],
                    [
                        'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                            return Helper::radioList($index, $label, $name, $checked, $value, $model);
                        }
                    ]
                )->label(false);
                ?>
            </td>
        </tr>
        <tr>
            <td colspan=2 height="19" align="left" valign=middle>Supernumerary Teeth</td>
            <td align="left" valign=middle>:</td>
            <td style="border-right: 1px solid #000000" colspan=3 valign=middle>
                <?php
                echo $form->field($model, 'supernumerary_teeth')->radioList(
                    ['Tidak Ada' => 'Tidak Ada', 'Ada' => 'Ada',],
                    [
                        'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                            return Helper::radioList($index, $label, $name, $checked, $value, $model);
                        }
                    ]
                )->label(false);
                ?>
            </td>
        </tr>
        <tr>
            <td colspan=2 height="19" align="left" valign=middle>Diastema</td>
            <td align="left" valign=middle>:</td>
            <td style="border-right: 1px solid #000000" colspan=3 valign=middle>
                <?php
                echo $form->field($model, 'diastema')->radioList(
                    ['Tidak Ada' => 'Tidak Ada', 'Ada' => 'Ada',],
                    [
                        'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                            return Helper::radioList($index, $label, $name, $checked, $value, $model);
                        }
                    ]
                )->label(false);
                ?>
            </td>
        </tr>
        <tr>
            <td colspan=2 height="19" align="left" valign=middle>Spacing</td>
            <td align="left" valign=middle>:</td>
            <td style="border-right: 1px solid #000000" colspan=3 valign=middle>
                <?php
                echo $form->field($model, 'spacing')->radioList(
                    ['Tidak Ada' => 'Tidak Ada', 'Ada' => 'Ada',],
                    [
                        'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                            return Helper::radioList($index, $label, $name, $checked, $value, $model);
                        }
                    ]
                )->label(false);
                ?>
            </td>
        </tr>
        <tr>
            <td colspan=2 height="19" align="left" valign=middle>Oral Hygiene</td>
            <td align="left" valign=middle>:</td>
            <td style="border-right: 1px solid #000000" colspan=3 valign=middle>
                <?php
                echo $form->field($model, 'oral_hygiene')->radioList(
                    ['Baik' => 'Baik', 'Sedang' => 'Sedang', 'Kurang' => 'Kurang',],
                    [
                        'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                            return Helper::radioList($index, $label, $name, $checked, $value, $model);
                        }
                    ]
                )->label(false);
                ?>
            </td>
        </tr>
        <tr>
            <td colspan=2 height="19" align="left" valign=middle>Gingiva & Periodontal</td>
            <td align="left" valign=middle>:</td>
            <td style="border-right: 1px solid #000000" colspan=3 valign=middle>
                <?php
                echo $form->field($model, 'gingiva_periodontal')->radioList(
                    ['Normal' => 'Normal', 'Gingivitis' => 'Gingivitis', 'Periodontitis' => 'Periodontitis',],
                    [
                        'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                            return Helper::radioList($index, $label, $name, $checked, $value, $model);
                        }
                    ]
                )->label(false);
                ?>
            </td>
        </tr>
        <tr>
            <td colspan=2 height="19" align="left" valign=middle>Oral Mucosa</td>
            <td align="left" valign=middle>:</td>
            <td style="border-right: 1px solid #000000" colspan=3 valign=middle>
                <?php
                echo $form->field($model, 'oral_mucosa')->radioList(
                    ['Normal' => 'Normal', 'Disease' => 'Disease',],
                    [
                        'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                            return Helper::radioList($index, $label, $name, $checked, $value, $model);
                        }
                    ]
                )->label(false);
                ?>
            </td>
        </tr>
        <tr>
            <td colspan=2 height="19" align="left" valign=middle>Tongue</td>
            <td align="left" valign=middle>:</td>
            <td style="border-right: 1px solid #000000" colspan=3 valign=middle>
                <?php
                echo $form->field($model, 'tongue')->radioList(
                    ['Normal' => 'Normal', 'Disease' => 'Disease',],
                    [
                        'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                            return Helper::radioList($index, $label, $name, $checked, $value, $model);
                        }
                    ]
                )->label(false);
                ?>
            </td>
        </tr>
        <tr>
            <td colspan=2 height="19" align="left" valign=middle>Lain - Lain</td>
            <td align="left" valign=middle>:</td>
            <td style="border-right: 1px solid #000000" colspan=3 valign=middle>
                <?= $form->field($model, 'lain_lain')->textInput(['maxlength' => true])->label(false) ?>
            </td>
        </tr>
        <tr>
            <td colspan=2 height="19" align="left" valign=middle>Kesimpulan</td>
            <td align="left" valign=middle>:</td>
            <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=3 align="center" valign=middle>
                <?= $form->field($model, 'kesimpulan')->textArea(['rows' => 4])->label(false) ?>
            </td>
        </tr>
        <tr>
            <td height="19" align="center" valign=middle><br></td>
            <td align="left" valign=bottom><br></td>
            <td align="left" valign=bottom><br></td>
        </tr>
        <tr>
            <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" height="19" align="center" valign=middle><br></td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=bottom><br></td>
            <td style="border-bottom: 1px solid #000000" align="left" valign=bottom><br></td>
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
