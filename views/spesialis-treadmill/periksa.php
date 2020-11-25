<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-13 18:14:13 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2020-11-25 12:47:47
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
/* @var $model app\models\spesialis\McuSpesialisTreadmill */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Pemeriksaan Kesehatan Tread Mill Tenaga Kerja';
$this->params['breadcrumbs'][] = ['label' => 'Unit Medical Check Up', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$dataG = [
    'Normal' => 'Normal',
    'Tidak Normal' => 'Tidak Normal',
];
// var_dump($model);
// exit();
?>

<style type="text/css">
    .tabel-treadmill.table-sm th,
    .tabel-treadmill.table-sm td {
        padding: 0.1rem;
    }

    /* .table {
        border: 0.5px solid #000000;
    } */

    .table-bordered>thead>tr>th,
    .table-bordered>tbody>tr>th,
    .table-bordered>tfoot>tr>th,
    .table-bordered>thead>tr>td,
    .table-bordered>tbody>tr>td,
    .table-bordered>tfoot>tr>td {
        border: 0.5px solid #000000;
    }

    .tabel-treadmill td {
        padding: 3px !important;
    }

    .form-group {
        margin-bottom: 0px !important;
    }

    .custom-control.custom-radio {
        padding-left: 5px;
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
                window.location = baseUrl + 'spesialis-treadmill/periksa?id=' + e.params.data.id
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
        'id' => 'form-spesialis-treadmill',
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

    <table class="table table-sm" style="width: 100%;">
        <tbody>
            <tr>
                <td style="font-weight: bold; width: 5%;">PERMINTAAN</td>
                <td style="width: 1%;">:</td>
                <td>
                    <?= $form->field($model, 'permintaan')->textInput()->label(false) ?>
                </td>
            </tr>
        </tbody>
    </table>

    <div style="text-align: center; font-weight: bold;">
        HASIL UJI LATIH JANTUNG DENGAN BEBAN <i>(TREADMILL TEST)</i>
    </div>
    <br><br>

    <table class="table table-sm tabel-treadmill" style="width: 100%;">
        <tbody>
            <tr>
                <td style="width: 19%;">Metode</td>
                <td style="width: 1%;">:</td>
                <td style="width: 80%;">
                    <?= $form->field($model, 'metode')->textInput()->label(false) ?>
                </td>
            </tr>
            <tr>
                <td>Lama Latihan</td>
                <td>:</td>
                <td>
                    <?= $form->field($model, 'lama_latihan')->textInput()->label(false) ?>
                </td>
            </tr>
            <tr>
                <td>Test dihentikan karena</td>
                <td>:</td>
                <td>
                    <?= $form->field($model, 'test_dihentikan_karena')->textInput()->label(false) ?>
                </td>
            </tr>
            <tr>
                <td>DJ Maksimal</td>
                <td>:</td>
                <td>
                    <?= $form->field($model, 'dj_maksimal')->textInput()->label(false) ?>
                </td>
            </tr>
            <tr>
                <td>TD Awal</td>
                <td>:</td>
                <td>
                    <?= $form->field($model, 'td_minimal')->textInput()->label(false) ?>
                </td>
            </tr>
            <tr>
                <td>TD Maksimal</td>
                <td>:</td>
                <td>
                    <?= $form->field($model, 'td_maksimal')->textInput()->label(false) ?>
                </td>
            </tr>
            <tr>
                <td>EKG</td>
                <td></td>
                <td>
                </td>
            </tr>
            <tr>
                <td style="padding-left: 33px !important;">- Istirahat</td>
                <td>:</td>
                <td>
                    <?= $form->field($model, 'ekg_istirahat')->textInput()->label(false) ?>
                </td>
            </tr>
            <tr>
                <td style="padding-left: 33px !important;">- Latihan</td>
                <td>:</td>
                <td>
                    <?= $form->field($model, 'ekg_latihan')->textInput()->label(false) ?>
                </td>
            </tr>
            <tr>
                <td style="padding-left: 33px !important;">- Pemulihan</td>
                <td>:</td>
                <td>
                    <?= $form->field($model, 'ekg_pemulihan')->textInput()->label(false) ?>
                </td>
            </tr>
            <tr>
                <td style="padding-top: 45px !important;">Tingkat Kesegaran Jasmani</td>
                <td style="padding-top: 45px !important;">:</td>
                <td style="font-style: italic; padding-top: 45px !important;">
                    <?php
                    echo $form->field($model, 'tingkat_kesegaran_jasmani')->radioList(
                        $irama_jantung_option = ['Low' => 'Low', 'Fair' => 'Fair', 'Average' => 'Average', 'Good' => 'Good', 'High' => 'High',],
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
                <td>Kelas Fungsional</td>
                <td>:</td>
                <td>
                    <?php
                    echo $form->field($model, 'kelas_fungsional')->radioList(
                        $irama_jantung_option = ['III' => 'III', 'II - III' => 'II - III', 'II' => 'II', 'I - II' => 'I - II', 'NI' => 'NI',],
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
                <td>Kapasitas Aerobik</td>
                <td>:</td>
                <td>
                    <?= $form->field($model, 'kapasitas_aerobik')->textInput()->label(false) ?>
                </td>
            </tr>
            <tr>
                <td>Respon Hemodinamik</td>
                <td>:</td>
                <td>
                    <?php
                    echo $form->field($model, 'respon_hemodinamik')->radioList(
                        $respon_hemodinamik_option = [
                            'Normal' => 'Normal',
                            'Hipotensif' => 'Hipotensif',
                            'Hipertensif' => 'Hipertensif',
                        ],
                    )->label(false);
                    ?>
                </td>
            </tr>
            <tr>
                <td style="font-weight: bold; padding-top: 45px !important;"><i>KESIMPULAN</i></td>
                <td></td>
                <td>
                </td>
            </tr>
            <tr>
                <td>Respon Iskemik</td>
                <td>:</td>
                <td>
                    <?php
                    echo $form->field($model, 'respon_iskemik')->radioList(
                        $respon_iskemik_option = [
                            'Negatif / tidak menunjukkan tanda-tanda iskemia miokard reversibel' => 'Negatif / tidak menunjukkan tanda-tanda iskemia miokard reversibel',
                            'Positif / menunjukkan tanda-tanda iskemia miokard reversibel, Ringan / Sedang / Berat' => 'Positif / menunjukkan tanda-tanda iskemia miokard reversibel, Ringan / Sedang / Berat',
                        ],
                    )->label(false);
                    ?>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input value="<?= (!in_array($model->respon_iskemik, $respon_iskemik_option)) ? $model->respon_iskemik : null ?>" <?= (!in_array($model->respon_iskemik, $respon_iskemik_option)) ? 'checked' : null ?> type="radio" id="McuSpesialisTreadmill_respon_iskemik_2" name="McuSpesialisTreadmill[respon_iskemik]">
                                <span style="font-size: smaller; font-weight: bold;">&nbsp;&nbsp;<i>Uninterpratable</i> / tidak dapat diinterprestasi karena</span>
                            </div>
                        </div>
                        <input value="<?= (!in_array($model->respon_iskemik, $respon_iskemik_option)) ? $model->respon_iskemik : null ?>" type="text" id="McuSpesialisTreadmill_respon_iskemik_2_teks" style="width: 50px;" class="form-control form-control-md">
                    </div>
                </td>
            </tr>
            <tr>
                <td>Anjuran</td>
                <td>:</td>
                <td>
                    <table style="width: 100%; white-space: nowrap;">
                        <tbody>
                            <tr>
                                <td style="border-top: 1px solid #ffffff; vertical-align: bottom;">
                                    <?php
                                    echo $form->field($model, 'anjuran')->radioList(
                                        $anjuran_option = [
                                            'Jalan' => 'Jalan',
                                            'Jogging' => 'Jogging',
                                            'Sepeda' => 'Sepeda',
                                        ],
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
                                                <input value="<?= (!in_array($model->anjuran, $anjuran_option)) ? $model->anjuran : null ?>" <?= (!in_array($model->anjuran, $anjuran_option)) ? 'checked' : null ?> type="radio" id="McuSpesialisTreadmill_anjuran_3" name="McuSpesialisTreadmill[anjuran]">
                                                <span style="font-size: smaller; font-weight: bold;">&nbsp;&nbsp;Lainnya</span>
                                            </div>
                                        </div>
                                        <input value="<?= (!in_array($model->anjuran, $anjuran_option)) ? $model->anjuran : null ?>" type="text" id="McuSpesialisTreadmill_anjuran_3_teks" style="width: 50px;" class="form-control form-control-md">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <!-- <td>
                    <?php
                    echo $form->field($model, 'anjuran')->radioList(
                        $anjuran_option = [
                            'Jalan' => 'Jalan',
                            'Jogging' => 'Jogging',
                            'Sepeda' => 'Sepeda',
                        ],
                        [
                            'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                return Helper::radioList($index, $label, $name, $checked, $value, $model);
                            }
                        ]
                    )->label(false);
                    ?>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input value="<?= (!in_array($model->anjuran, $anjuran_option)) ? $model->anjuran : null ?>" <?= (!in_array($model->anjuran, $anjuran_option)) ? 'checked' : null ?> type="radio" id="McuSpesialisTreadmill_anjuran_3" name="McuSpesialisTreadmill[anjuran]">
                                <span style="font-size: smaller; font-weight: bold;">&nbsp;&nbsp;Lainnya</span>
                            </div>
                        </div>
                        <input value="<?= (!in_array($model->anjuran, $anjuran_option)) ? $model->anjuran : null ?>" type="text" id="McuSpesialisTreadmill_anjuran_3_teks" style="width: 100%;" class="form-control form-control-md">
                    </div>
                </td> -->
            </tr>
            <tr>
                <td>Kesan</td>
                <td>:</td>
                <td>
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
                <!-- <td>
                    <?php
                    echo $form->field($model, 'anjuran')->radioList(
                        $anjuran_option = [
                            'Jalan' => 'Jalan',
                            'Jogging' => 'Jogging',
                            'Sepeda' => 'Sepeda',
                        ],
                        [
                            'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                return Helper::radioList($index, $label, $name, $checked, $value, $model);
                            }
                        ]
                    )->label(false);
                    ?>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input value="<?= (!in_array($model->anjuran, $anjuran_option)) ? $model->anjuran : null ?>" <?= (!in_array($model->anjuran, $anjuran_option)) ? 'checked' : null ?> type="radio" id="McuSpesialisTreadmill_anjuran_3" name="McuSpesialisTreadmill[anjuran]">
                                <span style="font-size: smaller; font-weight: bold;">&nbsp;&nbsp;Lainnya</span>
                            </div>
                        </div>
                        <input value="<?= (!in_array($model->anjuran, $anjuran_option)) ? $model->anjuran : null ?>" type="text" id="McuSpesialisTreadmill_anjuran_3_teks" style="width: 100%;" class="form-control form-control-md">
                    </div>
                </td> -->
            </tr>
        </tbody>
    </table>

    <?php
    Pjax::begin(['id' => 'btn-cetak']);
    if (!$model->isNewRecord) {
        echo $form->field($model, 'id_spesialis_treadmill')->hiddenInput()->label(false);
    }
    ?>

    <div class="form-group">
        <?php
        if (array_key_exists('id', $_GET))
            echo Html::submitButton('Simpan', ['class' => 'btn btn-success']);
        if (!$model->isNewRecord)
            echo Html::a('<i class="far fa-file-excel"></i> Cetak Hard Copy', ['/spesialis-treadmill/cetak', 'no_rm' => $no_rm, 'no_daftar' => $no_daftar], ['target' => 'blank', 'data-pjax' => 0, 'class' => 'btn btn-info', 'style' => 'margin-left: 10px;']);
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
            'id' => 'form-spesialis-treadmill-penata',
            'validateOnSubmit' => false, // agar submit ajax tidak 2 kali saat pertama kali reload
            'action' => ['/spesialis-treadmill/simpan-penata'],
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
            //     echo Html::a('<i class="far fa-file-excel"></i> Cetak Hard Copy', ['/spesialis-treadmill/cetak-penata', 'no_rm' => $no_rm], ['target' => 'blank', 'data-pjax' => 0, 'class' => 'btn btn-info', 'style' => 'margin-left: 10px;']);
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
