<?php

use app\components\Helper;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SpesialisKejiwaan */
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

<div class="spesialis-kejiwaan-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-3">
            <label for="">No. Rekam Medik</label>
            <?php
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

    <!-- <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?> -->

    <?= $form->field($model, 'rs_pendukung')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dokter')->textInput(['maxlength' => true]) ?>

    <br/>
    <table class="table">
        <colgroup span="19" width="53"></colgroup>
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
                <font color="#000000"><b>Skala L (Lie Scale) </b></font> <br/> Kebohongan Ketidak Jujuran Jawaban
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'skala_l')->label(false)->textInput(['maxlength' => true]) ?>
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala F </b></font> <br/> Salah mengerti terhadap makna pertanyaan atau tidak menangkap arti pertanyaan / sengaja tidak mau membaca tetapi dijawab dengan asal mengisi
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            <?= $form->field($model, 'skala_p')->label(false)->textInput(['maxlength' => true]) ?>
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala K </b></font> <br/> Sikap defensive, mengelak atau menghindar
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            <?= $form->field($model, 'skala_k')->label(false)->textInput(['maxlength' => true]) ?>
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala 1 - Hs : Hipocondriasis </b></font> <br/> Keluhan fisik, gangguan fisik dan fungsi tubuh
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            <?= $form->field($model, 'skala_1_hs')->label(false)->textInput(['maxlength' => true]) ?>
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala 2 - D : Depresi </b></font> <br/> Sedih, tidak bahagia dan tertekan
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            <?= $form->field($model, 'skala_2_d')->label(false)->textInput(['maxlength' => true]) ?>
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala 3 - Hy : Histeria </b></font> <br/> Bereaksi terhadap stress dengan menolak masalah
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            <?= $form->field($model, 'skala_3_hy')->label(false)->textInput(['maxlength' => true]) ?>
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala 4 - Pd : Psikopati Devien </b></font> <br/> Kurang patuh terhadap norma sosial
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            <?= $form->field($model, 'skala_4_pd')->label(false)->textInput(['maxlength' => true]) ?>
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala 5 - Mf : Maskulin Feminim </b></font> <br/> Orientasi feminim pada laki-laki dan orientasi maskulin pada wanita
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            <?= $form->field($model, 'skala_5_mf')->label(false)->textInput(['maxlength' => true]) ?>
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala 6 - Pa : Paranoia </b></font> <br/> Curiga, Bermusuhan 
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            <?= $form->field($model, 'skala_6_pa')->label(false)->textInput(['maxlength' => true]) ?>
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala 7 - Pt : Psikastenia </b></font> <br/> Cemas, Khawatir, Fobia, Obsesi Kompulsif
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            <?= $form->field($model, 'skala_7_pt')->label(false)->textInput(['maxlength' => true]) ?>
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala 8 - Sc : Schizophrenia </b></font> <br/> Menarik diri, Pikiran aneh, Kacau
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            <?= $form->field($model, 'skala_8_sc')->label(false)->textInput(['maxlength' => true]) ?>
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala 9 - Ma : Hipomania </b></font> <br/> Impulsif pikiran dan aktivitas yang berlebihan
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            <?= $form->field($model, 'skala_9_ma')->label(false)->textInput(['maxlength' => true]) ?>
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala 0 - D : Intervensi Sosial </b></font> <br/> Intovert, pemalu, tertutup, minat sosial
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            <?= $form->field($model, 'skala_0_si')->label(false)->textInput(['maxlength' => true]) ?>
            </td>
        </tr>   
    </table>

    <div class="form-group row col-sm-12">
        <label for="inputEmail3" class="col-sm-3 col-form-label"><b></b></label>
        <div class="col-sm-9">
        <?= $form->field($model, 'kesimpulan')->inline()->radioList(['0' => 'Tidak Ditemukan Gangguan Jiwa', '1' => 'DItemukan Gangguan Jiwa',], [
            'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                return Helper::radioList($index, $label, $name, $checked, $value, $model);
            }
        ])->label(false) ?>
        </div>
    </div>
    
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
