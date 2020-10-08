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

$this->title = 'Pemeriksaan Kesehatan Psikologi Tenaga Kerja';
$this->params['breadcrumbs'][] = ['label' => 'Unit Medical Check Up', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<style type="text/css">
    .form-group {
        margin-bottom: 0px !important;
    }

    .tabel-psikologi label {
        margin-bottom: 0px !important;
    }
</style>

<div class="mcu-spesialis-psikologi-form">

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
                window.location = baseUrl + 'spesialis-psikologi/periksa?id=' + e.params.data.id
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
        'id' => 'form-spesialis-psikologi',
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
    <b>RIWAYAT PENYAKIT</b>
    <table class="table">
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left">
                Diagnosa Dokter
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left">
                <?= $form->field($model, 'rp_diagnosa_dokter')->label(false)->textInput(['maxlength' => true]) ?>
            </td>
        </tr>
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left">
                Keluhan Fisik
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left">
                <?= $form->field($model, 'rp_keluhan_fisik')->label(false)->textInput(['maxlength' => true]) ?>
            </td>
        </tr>
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left">
                Keluhan Psikologis
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left">
                <?= $form->field($model, 'rp_keluhan_psikologis')->label(false)->textInput(['maxlength' => true]) ?>
            </td>
        </tr>
    </table>

    <br/>
    <b>ASESMEN</b><br/>
    1. Observasi
    <table class="table">
        <tr class="tr-ac-bc">
            <td colspan="2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top><b>
                <font color="#000000">Deskripsi Umum</font>
            </b></td>
            <td colspan="2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top><b>
                <font color="#000000">Fungsi Psikologi</font>
            </b></td>
        </tr>
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle>
            Penampilan Umum
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle>
            <?= $form->field($model, 'asesmen_observasi_du_penampilan_umum')->inline()->radioList(['Terawat' => 'Terawat', 'Kurang Terawat' => 'Kurang Terawat'], [
                'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                    return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle>
            Kognitif Memori
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle>
            <?= $form->field($model, 'asesmen_observasi_fp_kognitif_memori')->inline()->radioList(['Positif' => 'Positif', 'Negatif' => 'Negatif'], [
                'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                    return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>
            </td>
        </tr>    
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle>
            Sikap Terhadap Pemeriksa
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle>
            <?= $form->field($model, 'asesmen_observasi_du_sikap_terhadap_pemeriksa')->inline()->radioList(['Kooperatif' => 'Kooperatif', 'Kurang Kooperatif' => 'Kurang Kooperatif'], [
                'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                    return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle>
            Kognitif Konsentrasi
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle>
            <?= $form->field($model, 'asesmen_observasi_fp_kognitif_konsentrasi')->inline()->radioList(['Positif' => 'Positif', 'Negatif' => 'Negatif'], [
                'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                    return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>
            </td>
        </tr> 
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle>
            Afek
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle>
            <?= $form->field($model, 'asesmen_observasi_du_afek')->inline()->radioList(['Normal' => 'Normal', 'Datar' => 'Datar', 'Depresif' => 'Depresif'], [
                'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                    return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle>
            Kognitif Orientasi
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle>
            <?= $form->field($model, 'asesmen_observasi_fp_kognitif_orientasi')->inline()->radioList(['Positif' => 'Positif', 'Negatif' => 'Negatif'], [
                'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                    return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle>
            Roman Muka
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle>
            <?= $form->field($model, 'asesmen_observasi_du_roman_muka')->inline()->radioList(['Murung' => 'Murung', 'Wajar' => 'Wajar', 'Euphoria' => 'Euphoria'], [
                'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                    return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle>
            Kognitif Kemampuan Verbal
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle>
            <?= $form->field($model, 'asesmen_observasi_fp_kognitif_kemampuan_verbal')->inline()->radioList(['Positif' => 'Positif', 'Negatif' => 'Negatif'], [
                'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                    return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle>
            Proses Pikir
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle>
            <?= $form->field($model, 'asesmen_observasi_du_proses_pikir')->inline()->radioList(['Realistik' => 'Realistik', 'Tidak Realistik' => 'Tidak Realistik'], [
                'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                    return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle>
            Emosi
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle>
            <?= $form->field($model, 'asesmen_observasi_fp_kognitif_emosi')->inline()->radioList(['Stabil' => 'Stabil', 'Tidak Stabil' => 'Tidak Stabil'], [
                'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                    return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle>
            Gangguan Persepsi
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle>
            <?= $form->field($model, 'asesmen_observasi_du_gangguan_persepsi')->inline()->radioList(['Halusinasi' => 'Halusinasi', 'Delusi' => 'Delusi', 'Tidak Ada' => 'Tidak Ada'], [
                'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                    return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>
            </td> 
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle>
            Perilaku
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle>
            <?= $form->field($model, 'asesmen_observasi_fp_kognitif_perilaku')->inline()->radioList(['Ada Hambatan' => 'Ada Hambatan', 'Normal' => 'Normal', 'Agresif' => 'Agresif', 'Menarik Diri' => 'Menarik Diri'], [
                'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                    return Helper::radioList($index, $label, $name, $checked, $value, $model);
                }
            ])->label(false) ?>
            </td>
        </tr>
    </table>

    2. Observasi
    <table class="table">
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle>
                <?= $form->field($model, 'simptom_sakit_kepala')->checkbox() ?>
                <?= $form->field($model, 'simptom_kurang_nafsu_makan')->checkbox() ?>
                <?= $form->field($model, 'simptom_sulit_tidur')->checkbox() ?>
                <?= $form->field($model, 'simptom_mudah_takut')->checkbox() ?>
                <?= $form->field($model, 'simptom_tegang')->checkbox() ?>
                <?= $form->field($model, 'simptom_cemas')->checkbox() ?>
                <?= $form->field($model, 'simptom_gemetar')->checkbox() ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle>
                <?= $form->field($model, 'simptom_gangguan_perut')->checkbox() ?>
                <?= $form->field($model, 'simptom_sulit_konsentrasi')->checkbox() ?>
                <?= $form->field($model, 'simptom_sedih')->checkbox() ?>
                <?= $form->field($model, 'simptom_sulit_mengambil_keputusan')->checkbox() ?>
                <?= $form->field($model, 'simptom_kehilangan_minat')->checkbox() ?>
                <?= $form->field($model, 'simptom_merasa_tidak_berguna')->checkbox() ?>
                <?= $form->field($model, 'simptom_mudah_lupa')->checkbox() ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle>
                <?= $form->field($model, 'simptom_merasa_bersalah')->checkbox() ?>
                <?= $form->field($model, 'simptom_mudah_lelah')->checkbox() ?>
                <?= $form->field($model, 'simptom_putus_asa')->checkbox() ?>
                <?= $form->field($model, 'simptom_mudah_marah')->checkbox() ?>
                <?= $form->field($model, 'simptom_mudah_tersinggung')->checkbox() ?>
                <?= $form->field($model, 'simptom_mimpi_buruk')->checkbox() ?>
                <?= $form->field($model, 'simptom_tidak_percaya_diri')->checkbox() ?>
            </td>
        </tr>   
    </table>

    3. Psikologi Pendukung
    <table class="table">
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left">
                <?= $form->field($model, 'psikotes_pendukung_1')->label(false)->textInput(['maxlength' => true, 'placeholder' => '1.']) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left">
                <?= $form->field($model, 'psikotes_pendukung_2')->label(false)->textInput(['maxlength' => true, 'placeholder' => '2.']) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left">
                <?= $form->field($model, 'psikotes_pendukung_3')->label(false)->textInput(['maxlength' => true, 'placeholder' => '3.']) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left">
                <?= $form->field($model, 'psikotes_pendukung_4')->label(false)->textInput(['maxlength' => true, 'placeholder' => '4.']) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left">
                <?= $form->field($model, 'psikotes_pendukung_5')->label(false)->textInput(['maxlength' => true, 'placeholder' => '5.']) ?>
            </td>
        </tr>
        <tr class="tr-ac-bc">
        <td colspan="5" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle>
                <?= $form->field($model, 'hasil_tes')->label(false)->textarea(['maxlength' => true, 'placeholder' => 'Hasil Tes :']) ?>
            </td>
        </tr>
    </table>    

    <?= $form->field($model, 'dinamika_psikologi')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'kesimpulan')->textarea(['maxlength' => true]) ?>

    <br/>
    <?php
    Pjax::begin(['id' => 'btn-cetak']);
    if (!$model->isNewRecord) {
        echo $form->field($model, 'id_spesialis_psikologi')->hiddenInput()->label(false);
    }
    ?>

    <div class="form-group">
        <?php
        if (array_key_exists('id', $_GET))
            echo Html::submitButton('Simpan', ['class' => 'btn btn-success']);
        if (!$model->isNewRecord)
            echo Html::a('<i class="far fa-file-excel"></i> Cetak Hard Copy', ['/spesialis-psikologi/cetak', 'no_rm' => $no_rm, 'no_daftar' => $no_daftar], ['target' => 'blank', 'data-pjax' => 0, 'class' => 'btn btn-info', 'style' => 'margin-left: 10px;']);
        ?>
    </div>
    <?php
    Pjax::end();
    ?>

    <?php ActiveForm::end(); ?>

</div>

<?php

$this->registerJs($this->render('periksa.js'));
