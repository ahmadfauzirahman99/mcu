<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-13 18:14:13 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2020-10-13 12:56:20
 */

use app\components\Helper;
use app\models\DataLayanan;
use app\models\spesialis\BaseModel;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\debug\models\timeline\DataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;

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

    <?php $form = ActiveForm::begin([]); ?>

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
                window.location = baseUrl + 'spesialis-gigi/periksa?id=' + e.params.data.id
            }",
        ],
    ]);
    ?>
    <br>
    <div class="form-group" style="margin-top: 5px; display: none;">
        <?php
        echo Html::submitButton('Simpan', ['class' => 'btn btn-success', 'id' => 'btn-form-cari']);
        ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php $form = ActiveForm::begin([
        'id' => 'form-spesialis-gigi',
        'validateOnSubmit' => false, // agar submit ajax tidak 2 kali saat pertama kali reload
    ]); ?>

    <?= $form->field($model, 'cari_pasien')->hiddenInput()->label(false) ?>

    <div class="row">
        <div class="col-sm-3">
            <label for="">No. Rekam Medik</label>
            <?php
            $model->no_rekam_medik = $no_rm;
            echo $form->field($model, 'no_rekam_medik')->textInput(['maxlength' => true, 'readonly' => true,])->label(false)
            ?>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="">Nama</label>
                <input readonly type="text" class="form-control" value="<?= $pasien->nama ?? null ?>" id="nama_pasien">
            </div>
        </div>
        <div class="col-sm-3">
            <label for="">No. Daftar</label>
            <?php
            $model->no_daftar = $no_daftar;
            echo $form->field($model, 'no_daftar')->textInput(['maxlength' => true, 'readonly' => true,])->label(false)
            ?>
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
            <td style="border-right: 0px solid #000000;" colspan=3 valign=middle>
                <table style="width: 100%; white-space: nowrap;">
                    <tbody>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; vertical-align: bottom;">
                                <?php
                                echo $form->field($model, 'oklusi')->radioList(
                                    $oklusi_option = ['Normal Bite' => 'Normal Bite', 'Cross Bite' => 'Cross Bite', 'Steep Bite' => 'Steep Bite',],
                                    [
                                        'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                            return Helper::radioList($index, $label, $name, $checked, $value, $model);
                                        }
                                    ]
                                )->label(false);
                                ?>
                            </td>
                            <td style="border-top: 1px solid #ffffff; width: 100%; padding-left: 3% !important;">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input <?= (!in_array($model->oklusi, $oklusi_option)) ? 'checked' : null ?> type="radio" id="McuSpesialisGigi_oklusi_3" name="McuSpesialisGigi[oklusi]">
                                        </div>
                                    </div>
                                    <input value="<?= (!in_array($model->oklusi, $oklusi_option)) ? $model->oklusi : null ?>" type="text" id="McuSpesialisGigi_oklusi_3_teks" style="width: 50px;" class="form-control form-control-sm">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan=2 height="19" align="left" valign=middle>Torus Palatinus</td>
            <td align="left" valign=middle>:</td>
            <td style="border-right: 1px solid #000000" colspan=3 valign=middle>
                <table style="width: 100%; white-space: nowrap;">
                    <tbody>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; vertical-align: bottom;">
                                <?php
                                echo $form->field($model, 'torus_palatinus')->radioList(
                                    $torus_palatinus_option = ['Tidak Ada' => 'Tidak Ada', 'Kecil' => 'Kecil', 'Sedang' => 'Sedang', 'Besar' => 'Besar', 'Multiple' => 'Multiple',],
                                    [
                                        'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                            return Helper::radioList($index, $label, $name, $checked, $value, $model);
                                        }
                                    ]
                                )->label(false);
                                ?>
                            </td>
                            <td style="border-top: 1px solid #ffffff; width: 100%; padding-left: 3% !important;">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input <?= (!in_array($model->torus_palatinus, $torus_palatinus_option)) ? 'checked' : null ?> type="radio" id="McuSpesialisGigi_torus_palatinus_5" name="McuSpesialisGigi[torus_palatinus]">
                                        </div>
                                    </div>
                                    <input value="<?= (!in_array($model->torus_palatinus, $torus_palatinus_option)) ? $model->torus_palatinus : null ?>" type="text" id="McuSpesialisGigi_torus_palatinus_5_teks" style="width: 50px;" class="form-control form-control-sm">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan=2 height="19" align="left" valign=middle>Torus Mandibularis</td>
            <td align="left" valign=middle>:</td>
            <td style="border-right: 1px solid #000000" colspan=3 valign=middle>
                <table style="width: 100%; white-space: nowrap;">
                    <tbody>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; vertical-align: bottom;">
                                <?php
                                echo $form->field($model, 'torus_mandibularis')->radioList(
                                    $torus_mandibularis_option = ['Tidak Ada' => 'Tidak Ada', 'Sisi Kiri' => 'Sisi Kiri', 'Sisi Kanan' => 'Sisi Kanan', 'Kedua Sisi' => 'Kedua Sisi',],
                                    [
                                        'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                            return Helper::radioList($index, $label, $name, $checked, $value, $model);
                                        }
                                    ]
                                )->label(false);
                                ?>
                            </td>
                            <td style="border-top: 1px solid #ffffff; width: 100%; padding-left: 3% !important;">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input <?= (!in_array($model->torus_mandibularis, $torus_mandibularis_option)) ? 'checked' : null ?> type="radio" id="McuSpesialisGigi_torus_mandibularis_4" name="McuSpesialisGigi[torus_mandibularis]">
                                        </div>
                                    </div>
                                    <input value="<?= (!in_array($model->torus_mandibularis, $torus_mandibularis_option)) ? $model->torus_mandibularis : null ?>" type="text" id="McuSpesialisGigi_torus_mandibularis_4_teks" style="width: 50px;" class="form-control form-control-sm">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan=2 height="19" align="left" valign=middle>Palatum</td>
            <td align="left" valign=middle>:</td>
            <td style="border-right: 1px solid #000000" colspan=3 valign=middle>
                <table style="width: 100%; white-space: nowrap;">
                    <tbody>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; vertical-align: bottom;">
                                <?php
                                echo $form->field($model, 'palatum')->radioList(
                                    $palatum_option = ['Tinggi' => 'Tinggi', 'Sedang' => 'Sedang', 'Rendah' => 'Rendah',],
                                    [
                                        'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                            return Helper::radioList($index, $label, $name, $checked, $value, $model);
                                        }
                                    ]
                                )->label(false);
                                ?>
                            </td>
                            <td style="border-top: 1px solid #ffffff; width: 100%; padding-left: 3% !important;">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input <?= (!in_array($model->palatum, $palatum_option)) ? 'checked' : null ?> type="radio" id="McuSpesialisGigi_palatum_3" name="McuSpesialisGigi[palatum]">
                                        </div>
                                    </div>
                                    <input value="<?= (!in_array($model->palatum, $palatum_option)) ? $model->palatum : null ?>" type="text" id="McuSpesialisGigi_palatum_3_teks" style="width: 50px;" class="form-control form-control-sm">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan=2 height="19" align="left" valign=middle>Supernumerary Teeth</td>
            <td align="left" valign=middle>:</td>
            <td style="border-right: 1px solid #000000" colspan=3 valign=middle>
                <table style="width: 100%; white-space: nowrap;">
                    <tbody>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; vertical-align: bottom;">
                                <?php
                                echo $form->field($model, 'supernumerary_teeth')->radioList(
                                    $supernumerary_teeth_option = ['Tidak Ada' => 'Tidak Ada', 'Ada' => 'Ada',],
                                    [
                                        'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                            return Helper::radioList($index, $label, $name, $checked, $value, $model);
                                        }
                                    ]
                                )->label(false);
                                ?>
                            </td>
                            <td style="border-top: 1px solid #ffffff; width: 100%; padding-left: 3% !important;">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input <?= (!in_array($model->supernumerary_teeth, $supernumerary_teeth_option)) ? 'checked' : null ?> type="radio" id="McuSpesialisGigi_supernumerary_teeth_2" name="McuSpesialisGigi[supernumerary_teeth]">
                                        </div>
                                    </div>
                                    <input value="<?= (!in_array($model->supernumerary_teeth, $supernumerary_teeth_option)) ? $model->supernumerary_teeth : null ?>" type="text" id="McuSpesialisGigi_supernumerary_teeth_2_teks" style="width: 50px;" class="form-control form-control-sm">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan=2 height="19" align="left" valign=middle>Diastema</td>
            <td align="left" valign=middle>:</td>
            <td style="border-right: 1px solid #000000" colspan=3 valign=middle>
                <table style="width: 100%; white-space: nowrap;">
                    <tbody>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; vertical-align: bottom;">
                                <?php
                                echo $form->field($model, 'diastema')->radioList(
                                    $diastema_option = ['Tidak Ada' => 'Tidak Ada', 'Ada' => 'Ada',],
                                    [
                                        'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                            return Helper::radioList($index, $label, $name, $checked, $value, $model);
                                        }
                                    ]
                                )->label(false);
                                ?>
                            </td>
                            <td style="border-top: 1px solid #ffffff; width: 100%; padding-left: 3% !important;">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input <?= (!in_array($model->diastema, $diastema_option)) ? 'checked' : null ?> type="radio" id="McuSpesialisGigi_diastema_2" name="McuSpesialisGigi[diastema]">
                                        </div>
                                    </div>
                                    <input value="<?= (!in_array($model->diastema, $diastema_option)) ? $model->diastema : null ?>" type="text" id="McuSpesialisGigi_diastema_2_teks" style="width: 50px;" class="form-control form-control-sm">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan=2 height="19" align="left" valign=middle>Spacing</td>
            <td align="left" valign=middle>:</td>
            <td style="border-right: 1px solid #000000" colspan=3 valign=middle>
                <table style="width: 100%; white-space: nowrap;">
                    <tbody>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; vertical-align: bottom;">
                                <?php
                                echo $form->field($model, 'spacing')->radioList(
                                    $spacing_option = ['Tidak Ada' => 'Tidak Ada', 'Ada' => 'Ada',],
                                    [
                                        'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                            return Helper::radioList($index, $label, $name, $checked, $value, $model);
                                        }
                                    ]
                                )->label(false);
                                ?>
                            </td>
                            <td style="border-top: 1px solid #ffffff; width: 100%; padding-left: 3% !important;">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input <?= (!in_array($model->spacing, $spacing_option)) ? 'checked' : null ?> type="radio" id="McuSpesialisGigi_spacing_2" name="McuSpesialisGigi[spacing]">
                                        </div>
                                    </div>
                                    <input value="<?= (!in_array($model->spacing, $spacing_option)) ? $model->spacing : null ?>" type="text" id="McuSpesialisGigi_spacing_2_teks" style="width: 50px;" class="form-control form-control-sm">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan=2 height="19" align="left" valign=middle>Oral Hygiene</td>
            <td align="left" valign=middle>:</td>
            <td style="border-right: 1px solid #000000" colspan=3 valign=middle>
                <table style="width: 100%; white-space: nowrap;">
                    <tbody>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; vertical-align: bottom;">
                                <?php
                                echo $form->field($model, 'oral_hygiene')->radioList(
                                    $oral_hygiene_option = ['Baik' => 'Baik', 'Sedang' => 'Sedang', 'Kurang' => 'Kurang',],
                                    [
                                        'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                            return Helper::radioList($index, $label, $name, $checked, $value, $model);
                                        }
                                    ]
                                )->label(false);
                                ?>
                            </td>
                            <td style="border-top: 1px solid #ffffff; width: 100%; padding-left: 3% !important;">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input <?= (!in_array($model->oral_hygiene, $oral_hygiene_option)) ? 'checked' : null ?> type="radio" id="McuSpesialisGigi_oral_hygiene_3" name="McuSpesialisGigi[oral_hygiene]">
                                        </div>
                                    </div>
                                    <input value="<?= (!in_array($model->oral_hygiene, $oral_hygiene_option)) ? $model->oral_hygiene : null ?>" type="text" id="McuSpesialisGigi_oral_hygiene_3_teks" style="width: 50px;" class="form-control form-control-sm">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan=2 height="19" align="left" valign=middle>Gingiva & Periodontal</td>
            <td align="left" valign=middle>:</td>
            <td style="border-right: 1px solid #000000" colspan=3 valign=middle>
                <table style="width: 100%; white-space: nowrap;">
                    <tbody>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; vertical-align: bottom;">
                                <?php
                                echo $form->field($model, 'gingiva_periodontal')->radioList(
                                    $gingiva_periodontal_option = ['Normal' => 'Normal', 'Gingivitis' => 'Gingivitis', 'Periodontitis' => 'Periodontitis',],
                                    [
                                        'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                            return Helper::radioList($index, $label, $name, $checked, $value, $model);
                                        }
                                    ]
                                )->label(false);
                                ?>
                            </td>
                            <td style="border-top: 1px solid #ffffff; width: 100%; padding-left: 3% !important;">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input <?= (!in_array($model->gingiva_periodontal, $gingiva_periodontal_option)) ? 'checked' : null ?> type="radio" id="McuSpesialisGigi_gingiva_periodontal_3" name="McuSpesialisGigi[gingiva_periodontal]">
                                        </div>
                                    </div>
                                    <input value="<?= (!in_array($model->gingiva_periodontal, $gingiva_periodontal_option)) ? $model->gingiva_periodontal : null ?>" type="text" id="McuSpesialisGigi_gingiva_periodontal_3_teks" style="width: 50px;" class="form-control form-control-sm">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan=2 height="19" align="left" valign=middle>Oral Mucosa</td>
            <td align="left" valign=middle>:</td>
            <td style="border-right: 1px solid #000000" colspan=3 valign=middle>
                <table style="width: 100%; white-space: nowrap;">
                    <tbody>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; vertical-align: bottom;">
                                <?php
                                echo $form->field($model, 'oral_mucosa')->radioList(
                                    $oral_mucosa_option = ['Normal' => 'Normal', 'Disease' => 'Disease',],
                                    [
                                        'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                            return Helper::radioList($index, $label, $name, $checked, $value, $model);
                                        }
                                    ]
                                )->label(false);
                                ?>
                            </td>
                            <td style="border-top: 1px solid #ffffff; width: 100%; padding-left: 3% !important;">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input <?= (!in_array($model->oral_mucosa, $oral_mucosa_option)) ? 'checked' : null ?> type="radio" id="McuSpesialisGigi_oral_mucosa_2" name="McuSpesialisGigi[oral_mucosa]">
                                        </div>
                                    </div>
                                    <input value="<?= (!in_array($model->oral_mucosa, $oral_mucosa_option)) ? $model->oral_mucosa : null ?>" type="text" id="McuSpesialisGigi_oral_mucosa_2_teks" style="width: 50px;" class="form-control form-control-sm">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan=2 height="19" align="left" valign=middle>Tongue</td>
            <td align="left" valign=middle>:</td>
            <td style="border-right: 1px solid #000000" colspan=3 valign=middle>
                <table style="width: 100%; white-space: nowrap;">
                    <tbody>
                        <tr>
                            <td style="border-top: 1px solid #ffffff; vertical-align: bottom;">
                                <?php
                                echo $form->field($model, 'tongue')->radioList(
                                    $tongue_option = ['Normal' => 'Normal', 'Disease' => 'Disease',],
                                    [
                                        'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                            return Helper::radioList($index, $label, $name, $checked, $value, $model);
                                        }
                                    ]
                                )->label(false);
                                ?>
                            </td>
                            <td style="border-top: 1px solid #ffffff; width: 100%; padding-left: 3% !important;">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input <?= (!in_array($model->tongue, $tongue_option)) ? 'checked' : null ?> type="radio" id="McuSpesialisGigi_tongue_2" name="McuSpesialisGigi[tongue]">
                                        </div>
                                    </div>
                                    <input value="<?= (!in_array($model->tongue, $tongue_option)) ? $model->tongue : null ?>" type="text" id="McuSpesialisGigi_tongue_2_teks" style="width: 50px;" class="form-control form-control-sm">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
            <td colspan=2 height="19" align="left" valign=middle><b>Kesan</b></td>
            <td align="left" valign=middle>:</td>
            <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=3 valign=middle>
                <?php // $form->field($model, 'kesimpulan')->textArea(['rows' => 4])->label(false) 
                ?>
                <?php
                echo $form->field($model, 'kesan')->radioList(
                    ['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal',],
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

    <?php
    Pjax::begin(['id' => 'btn-cetak']);
    if (!$model->isNewRecord) {
        echo $form->field($model, 'id_spesialis_gigi')->hiddenInput()->label(false);
    }
    ?>

    <div class="form-group">
        <?php
        if (array_key_exists('id', $_GET))
            echo Html::submitButton('Simpan', ['class' => 'btn btn-success']);
        if (!$model->isNewRecord)
            echo Html::a('<i class="far fa-file-excel"></i> Cetak Hard Copy', ['/spesialis-gigi/cetak', 'no_rm' => $no_rm, 'no_daftar' => $no_daftar], ['target' => 'blank', 'data-pjax' => 0, 'class' => 'btn btn-info', 'style' => 'margin-left: 10px;']);
        ?>
    </div>
    <?php
    Pjax::end();
    ?>

    <?php ActiveForm::end(); ?>
    <br>
    

    <hr>

    <hr>

    <?php
    $displayPenata = 'none';
    if ($model->kesan == 'Tidak Normal')
        $displayPenata = 'block';
    ?>
    <div class="div-penata" style="display: <?= $displayPenata ?>;">
        <h3>
            PERMASALAHAN PASIEN & RENCANAN PENATALAKSANAAN
        </h3>

        <?php $form = ActiveForm::begin([
            'id' => 'form-spesialis-gigi-penata',
            'validateOnSubmit' => false, // agar submit ajax tidak 2 kali saat pertama kali reload
            'action' => ['/spesialis-gigi/simpan-penata'],
        ]); ?>

        <div class="row">
            <?php echo $form->field($modelPenata, 'no_rekam_medik')->hiddenInput()->label(false); ?>
            <div class="col-sm-3">
                <?php echo $form->field($modelPenata, 'jenis_permasalahan')->textArea(['rows' => 2]); ?>
            </div>
            <div class="col-sm-3">
                <?php echo $form->field($modelPenata, 'rencana')->textArea(['rows' => 2]); ?>
            </div>
            <div class="col-sm-2">
                <?php echo $form->field($modelPenata, 'target_waktu')->textArea(['rows' => 2]); ?>
            </div>
            <div class="col-sm-2">
                <?php echo $form->field($modelPenata, 'hasil_yang_diharapkan')->textArea(['rows' => 2]); ?>
            </div>
            <div class="col-sm-2">
                <?php echo $form->field($modelPenata, 'keterangan')->textArea(['rows' => 2]); ?>
            </div>
        </div>

        <div class="form-group" style="margin-top: 5px;">
            <?php
            Pjax::begin(['id' => 'btn-cetak-penata']);
            if (!$model->isNewRecord)
                echo Html::submitButton('Simpan', ['class' => 'btn btn-success']);
            // if (!$model->isNewRecord && count($modelPenataList->all())) {
            //     echo Html::a('<i class="far fa-file-excel"></i> Cetak Hard Copy', ['/spesialis-gigi/cetak-penata', 'no_rm' => $no_rm], ['target' => 'blank', 'data-pjax' => 0, 'class' => 'btn btn-info', 'style' => 'margin-left: 10px;']);
            // }
            Pjax::end();
            ?>
        </div>

        <?php ActiveForm::end(); ?>
        <br>
        <?php Pjax::begin(['id' => 'tbl-penata']); ?>

        <?= GridView::widget([
            'dataProvider' => new ActiveDataProvider([
                'query' => $modelPenataList,
            ]),
            'tableOptions' => ['class' => 'table table-sm table-hover table-bordered'],
            'columns' => [
                [
                    'class' => 'yii\grid\SerialColumn',
                    'headerOptions' => ['style' => 'background-color: #e7ebee;',],
                ],
                [
                    'headerOptions' => ['style' => 'width: 30%; background-color: #e7ebee;',],
                    'attribute' => 'jenis_permasalahan',
                    'label' => 'Jenis Permasalahan Medis & No Medis (Okupasi Dll)',
                ],
                [
                    'headerOptions' => ['style' => 'width: 30%; background-color: #e7ebee;',],
                    'attribute' => 'rencana',
                    'label' => 'Rencana Tindakan (materi & metode) Tatalaksana Medikamentoasa non media mentosa (nutrisi,olahraga,dll)',
                ],
                [
                    'headerOptions' => ['style' => 'width: 10%; background-color: #e7ebee;',],
                    'attribute' => 'target_waktu',
                ],
                [
                    'headerOptions' => ['style' => 'width: 15%; background-color: #e7ebee;',],
                    'attribute' => 'hasil_yang_diharapkan',
                ],
                [
                    'headerOptions' => ['style' => 'width: 15%; background-color: #e7ebee;',],
                    'attribute' => 'keterangan',
                ],
            ],
            'pager' => [
                'class' => 'app\components\GridPager',
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>

<?php

$this->registerJs($this->render('periksa.js'));
