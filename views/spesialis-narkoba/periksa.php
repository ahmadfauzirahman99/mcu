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

$this->title = 'Pemeriksaan Kesehatan Narkoba Tenaga Kerja';
$this->params['breadcrumbs'][] = ['label' => 'Unit Medical Check Up', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<style type="text/css">
    .form-group {
        margin-bottom: 0px !important;
    }

    .tabel-narkoba label {
        margin-bottom: 0px !important;
    }
</style>

<div class="mcu-spesialis-narkoba-form">

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
                window.location = baseUrl + 'spesialis-narkoba/periksa?id=' + e.params.data.id
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
        'id' => 'form-spesialis-narkoba',
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
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="20" align="left" valign=middle>
            Benzodiazepin Hasil
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="15" align="left" valign=middle>
            <?= $form->field($model, 'benzodiazepin_hasil')->inline()->radioList(['Positif' => 'Positif', 'Negatif' => 'Negatif',], [
                'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                    return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>    
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'benzodiazepin_keterangan')->label(false)->textInput(['maxlength' => true, 'placeholder' => "Text..."]) ?>
            </td>
        </tr>
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="20" align="left" valign=middle>
            THC Hasil
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="15" align="left" valign=middle>
            <?= $form->field($model, 'thc_hasil')->inline()->radioList(['Positif' => 'Positif', 'Negatif' => 'Negatif',], [
                'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                    return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>    
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'thc_keterangan')->label(false)->textInput(['maxlength' => true, 'placeholder' => "Text..."]) ?>
            </td>
        </tr>
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="20" align="left" valign=middle>
            Opiat Hasil
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="15" align="left" valign=middle>
            <?= $form->field($model, 'opiat_hasil')->inline()->radioList(['Positif' => 'Positif', 'Negatif' => 'Negatif',], [
                'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                    return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>    
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'opiat_keterangan')->label(false)->textInput(['maxlength' => true, 'placeholder' => "Text..."]) ?>
            </td>
        </tr>
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="20" align="left" valign=middle>
            Amphetammin Hasil
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="15" align="left" valign=middle>
            <?= $form->field($model, 'amphetammin_hasil')->inline()->radioList(['Positif' => 'Positif', 'Negatif' => 'Negatif',], [
                'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                    return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>    
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'amphetammin_keterangan')->label(false)->textInput(['maxlength' => true, 'placeholder' => "Text..."]) ?>
            </td>
        </tr>
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="20" align="left" valign=middle>
            Kokain Hasil
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="15" align="left" valign=middle>
            <?= $form->field($model, 'kokain_hasil')->inline()->radioList(['Positif' => 'Positif', 'Negatif' => 'Negatif',], [
                'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                    return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>    
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'kokain_keterangan')->label(false)->textInput(['maxlength' => true, 'placeholder' => "Text..."]) ?>
            </td>
        </tr>
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="20" align="left" valign=middle>
            Methamphetamin Hasil
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="15" align="left" valign=middle>
            <?= $form->field($model, 'methamphetamin_hasil')->inline()->radioList(['Positif' => 'Positif', 'Negatif' => 'Negatif',], [
                'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                    return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>    
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'methamphetamin_keterangan')->label(false)->textInput(['maxlength' => true, 'placeholder' => "Text..."]) ?>
            </td>
        </tr>
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="20" align="left" valign=middle>
            Carisoprodol Hasil
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="15" align="left" valign=middle>
            <?= $form->field($model, 'carisoprodol_hasil')->inline()->radioList(['Positif' => 'Positif', 'Negatif' => 'Negatif',], [
                'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                    return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>    
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
                <?= $form->field($model, 'carisoprodol_keterangan')->label(false)->textInput(['maxlength' => true, 'placeholder' => "Text..."]) ?>
            </td>
        </tr>
    </table>

    <br/>
    <?php
    Pjax::begin(['id' => 'btn-cetak']);
    if (!$model->isNewRecord) {
        echo $form->field($model, 'id_spesialis_narkoba')->hiddenInput()->label(false);
    }
    ?>

    <div class="form-group">
        <?php
        if (array_key_exists('id', $_GET))
            echo Html::submitButton('Simpan', ['class' => 'btn btn-success']);
        if (!$model->isNewRecord)
            echo Html::a('<i class="far fa-file-excel"></i> Cetak Hard Copy', ['/spesialis-narkoba/cetak', 'no_rm' => $no_rm, 'no_daftar' => $no_daftar], ['target' => 'blank', 'data-pjax' => 0, 'class' => 'btn btn-info', 'style' => 'margin-left: 10px;']);
        ?>
    </div>
    <?php
    Pjax::end();
    ?>

    <?php ActiveForm::end(); ?>

</div>

<?php

$this->registerJs($this->render('periksa.js'));