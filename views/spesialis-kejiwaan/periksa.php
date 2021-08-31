<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-13 18:14:13 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2020-10-07 15:09:19
 */

use app\components\Helper;
use app\models\DataLayanan;
use app\models\spesialis\BaseModel;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisMata */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Pemeriksaan Kesehatan Kejiwaan Tenaga Kerja';
$this->params['breadcrumbs'][] = ['label' => 'Unit Medical Check Up', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<style type="text/css">
    .form-group {
        margin-bottom: 0px !important;
    }

    .tabel-kejiwaan label {
        margin-bottom: 0px !important;
    }
</style>

<div class="mcu-spesialis-kejiwaan-form">

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
                window.location = baseUrl + 'spesialis-kejiwaan/periksa?id=' + e.params.data.id
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
        'id' => 'form-spesialis-kejiwaan',
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
    <br/>

    <?= $form->field($model, 'rs_pendukung')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dokter')->textInput(['maxlength' => true]) ?>

    <br/>
    <table class="table">
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top><b>
                <font color="#000000">ASPEK KEJIWAAN</font>
            </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top><b>
                <font color="#000000">NILAI</font>
            </b></td>
        </tr>
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
                <font color="#000000"><b>Skala L (Lie Scale) </b></font> (Kebohongan Ketidak Jujuran Jawaban)
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            <?= $form->field($model, 'skala_l')->inline()->radioList(['0' => '0', '1' => '1', '2' => '2'], [
            'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala F </b></font> (Salah mengerti terhadap makna pertanyaan atau tidak menangkap arti pertanyaan / sengaja tidak mau membaca tetapi dijawab dengan asal mengisi)
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            <?= $form->field($model, 'skala_p')->inline()->radioList(['0' => '0', '1' => '1', '2' => '2'], [
            'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala K </b></font> (Sikap defensive, mengelak atau menghindar)
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            <?= $form->field($model, 'skala_k')->inline()->radioList(['0' => '0', '1' => '1', '2' => '2'], [
            'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala 1 - Hs : Hipocondriasis </b></font> (Keluhan fisik, gangguan fisik dan fungsi tubuh)
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            <?= $form->field($model, 'skala_1_hs')->inline()->radioList(['0' => '0', '1' => '1', '2' => '2'], [
            'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala 2 - D : Depresi </b></font> (Sedih, tidak bahagia dan tertekan)
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            <?= $form->field($model, 'skala_2_d')->inline()->radioList(['0' => '0', '1' => '1', '2' => '2'], [
            'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala 3 - Hy : Histeria </b></font> (Bereaksi terhadap stress dengan menolak masalah)
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            <?= $form->field($model, 'skala_3_hy')->inline()->radioList(['0' => '0', '1' => '1', '2' => '2'], [
            'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala 4 - Pd : Psikopati Devien </b></font> (Kurang patuh terhadap norma sosial)
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            <?= $form->field($model, 'skala_4_pd')->inline()->radioList(['0' => '0', '1' => '1', '2' => '2'], [
            'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala 5 - Mf : Maskulin Feminim </b></font> (Orientasi feminim pada laki-laki dan orientasi maskulin pada wanita)
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            <?= $form->field($model, 'skala_5_mf')->inline()->radioList(['0' => '0', '1' => '1', '2' => '2'], [
            'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala 6 - Pa : Paranoia </b></font> (Curiga, Bermusuhan)
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            <?= $form->field($model, 'skala_6_pa')->inline()->radioList(['0' => '0', '1' => '1', '2' => '2'], [
            'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala 7 - Pt : Psikastenia </b></font> (Cemas, Khawatir, Fobia, Obsesi Kompulsif)
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            <?= $form->field($model, 'skala_7_pt')->inline()->radioList(['0' => '0', '1' => '1', '2' => '2'], [
            'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala 8 - Sc : Schizophrenia </b></font> (Menarik diri, Pikiran aneh, Kacau)
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            <?= $form->field($model, 'skala_8_sc')->inline()->radioList(['0' => '0', '1' => '1', '2' => '2'], [
            'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala 9 - Ma : Hipomania </b></font> (Impulsif pikiran dan aktivitas yang berlebihan)
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            <?= $form->field($model, 'skala_9_ma')->inline()->radioList(['0' => '0', '1' => '1', '2' => '2'], [
            'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala 0 - D : Intervensi Sosial </b></font> (Intovert, pemalu, tertutup, minat sosial)
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            <?= $form->field($model, 'skala_0_si')->inline()->radioList(['0' => '0', '1' => '1', '2' => '2'], [
            'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>
            </td>
        </tr>   
    </table>

    <?= $form->field($model, 'validitas')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'interpretasi_subtantif')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'saran')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'kesimpulan')->textarea(['maxlength' => true]) ?>
    <br/>
    <div class="form-group row col-sm-12">
        <label for="inputEmail3" class="col-sm-3 col-form-label"><b></b></label>
        <div class="col-sm-9">
        <?= $form->field($model, 'status')->inline()->radioList(['0' => 'Tidak Ditemukan Gangguan Jiwa', '1' => 'DItemukan Gangguan Jiwa',], [
            'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                return Helper::radioList($index, $label, $name, $checked, $value, $model);
            }
        ])->label(false) ?>
        </div>
    </div>

    <br/>
    <?php
    Pjax::begin(['id' => 'btn-cetak']);
    if (!$model->isNewRecord) {
        echo $form->field($model, 'id_spesialis_kejiwaan')->hiddenInput()->label(false);
    }
    ?>

    <div class="form-group">
        <?php
        if (array_key_exists('id', $_GET))
            echo Html::submitButton('Simpan', ['class' => 'btn btn-success']);
        if (!$model->isNewRecord)
            echo Html::a('<i class="far fa-file-excel"></i> Cetak Hard Copy', ['/spesialis-kejiwaan/cetak', 'no_rm' => $no_rm, 'no_daftar' => $no_daftar], ['target' => 'blank', 'data-pjax' => 0, 'class' => 'btn btn-info', 'style' => 'margin-left: 10px;']);
        ?>
    </div>
    <?php
    Pjax::end();
    ?>

    <?php ActiveForm::end(); ?>

</div>

<?php

$this->registerJs($this->render('periksa.js'));
