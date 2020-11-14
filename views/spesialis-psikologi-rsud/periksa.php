<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-13 18:14:13 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2020-11-14 14:49:20
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
/* @var $model app\models\spesialis\McuSpesialisEkg */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Pemeriksaan Kesehatan Psikologi Tenaga Kerja';
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
    .tabel-psikologi.table-sm th,
    .tabel-psikologi.table-sm td {
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

    .tabel-psikologi td {
        padding: 3px !important;
    }

    .form-group {
        margin-bottom: 0px !important;
    }

    .tabel-psikologi-a tr td {
        vertical-align: middle;
    }

    li .form-group {
        margin-left: 20px !important;
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
                window.location = baseUrl + 'spesialis-psikologi-rsud/periksa?id=' + e.params.data.id
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

    <br>

    <div style="text-align: center; font-weight: bold;">
        PEMERIKSAAN PSIKOLOGI
    </div>

    <b>
        A. DATA
    </b>
    <div style="margin-left: 18px;">
        <table class="tabel-psikologi-a table table-sm table-bordered">
            <tbody>
                <tr>
                    <td>Pendidikan</td>
                    <td>
                        <?= $form->field($model, 'pendidikan')->textInput(['readonly' => true])->label(false) ?>
                    </td>
                    <td>Agama</td>
                    <td>
                        <?= $form->field($model, 'agama')->textInput(['readonly' => true])->label(false) ?>
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>
                        <?= $form->field($model, 'alamat')->textInput(['readonly' => true])->label(false) ?>
                    </td>
                    <td>Status</td>
                    <td>
                        <?= $form->field($model, 'status')->textInput(['readonly' => false])->label(false) ?>
                    </td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>
                        <?= $form->field($model, 'jenis_kelamin')->textInput(['readonly' => true])->label(false) ?>
                    </td>
                    <td>Pekerjaan</td>
                    <td>
                        <?= $form->field($model, 'pekerjaan')->textInput(['readonly' => true])->label(false) ?>
                    </td>
                </tr>
                <tr>
                    <td>Urutan Kelahiran</td>
                    <td>
                        <?= $form->field($model, 'urutan_kelahiran')->textInput(['readonly' => false])->label(false) ?>
                    </td>
                    <td>Tgl Pemeriksaan</td>
                    <td>
                        <?= $form->field($model, 'tgl_pemeriksaan')->textInput(['readonly' => true])->label(false) ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <br>
    <b>
        B. RIWAYAT PENYAKIT
    </b>
    <div style="margin-left: 18px;">
        <table class="tabel-psikologi-b table table-sm">
            <tbody>
                <tr>
                    <td style="width: 19%;">Diagnosa Dokter</td>
                    <td style="width: 1%;">:</td>
                    <td style="width: 80%;">
                        <?= $form->field($model, 'diagnosa_dokter')->textInput(['readonly' => false])->label(false) ?>
                    </td>
                </tr>
                <tr>
                    <td>Keluhan Fisik</td>
                    <td>:</td>
                    <td>
                        <?= $form->field($model, 'keluhan_fisik')->textArea(['rows' => 2])->label(false) ?>
                    </td>
                </tr>
                <tr>
                    <td>Keluhan Psikologis</td>
                    <td>:</td>
                    <td>
                        <?= $form->field($model, 'keluhan_psikologis')->textArea(['rows' => 2])->label(false) ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <br>
    <b>
        C. ASESMEN
    </b>
    <div style="margin-left: 18px;">
        1. Observasi
        <table class="tabel-psikologi-c1 table table-sm table-bordered" style="width: 100%;">
            <tbody>
                <tr>
                    <td style="width: 50%;">
                        <b>Deskripsi Umum</b>
                        <ul>
                            <li>
                                <div style="display: -webkit-inline-box;">
                                    Penampilan Umum :
                                    <?php
                                    echo $form->field($model, 'penampilan_umum')->radioList(
                                        ['Terawat' => 'Terawat', 'Kurang Terawat' => 'Kurang Terawat',],
                                        [
                                            'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                                return Helper::radioList($index, $label, $name, $checked, $value, $model);
                                            }
                                        ]
                                    )->label(false);
                                    ?>

                                </div>
                            </li>
                            <li>
                                <div style="display: -webkit-inline-box;">
                                    Sikap terhadap pemeriksa :
                                    <?php
                                    echo $form->field($model, 'sikap_terhadap_pemeriksa')->radioList(
                                        ['Kooperatif' => 'Kooperatif', 'Tidak Kooperatif' => 'Tidak Kooperatif',],
                                        [
                                            'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                                return Helper::radioList($index, $label, $name, $checked, $value, $model);
                                            }
                                        ]
                                    )->label(false);
                                    ?>

                                </div>
                            </li>
                            <li>
                                <div style="display: -webkit-inline-box;">
                                    Afek :
                                    <?php
                                    echo $form->field($model, 'afek')->radioList(
                                        ['Normal' => 'Normal', 'Datar' => 'Datar', 'Depresif' => 'Depresif',],
                                        [
                                            'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                                return Helper::radioList($index, $label, $name, $checked, $value, $model);
                                            }
                                        ]
                                    )->label(false);
                                    ?>

                                </div>
                            </li>
                            <li>
                                <div style="display: -webkit-inline-box;">
                                    Roman Muka :
                                    <?php
                                    echo $form->field($model, 'roman_muka')->radioList(
                                        ['Murung' => 'Murung', 'Wajar' => 'Wajar', 'Euphoria' => 'Euphoria',],
                                        [
                                            'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                                return Helper::radioList($index, $label, $name, $checked, $value, $model);
                                            }
                                        ]
                                    )->label(false);
                                    ?>

                                </div>
                            </li>
                            <li>
                                <div style="display: -webkit-inline-box;">
                                    Proses Pikir :
                                    <?php
                                    echo $form->field($model, 'proses_pikir')->radioList(
                                        ['Realistik' => 'Realistik', 'Tidak Realistik' => 'Tidak Realistik',],
                                        [
                                            'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                                return Helper::radioList($index, $label, $name, $checked, $value, $model);
                                            }
                                        ]
                                    )->label(false);
                                    ?>

                                </div>
                            </li>
                            <li>
                                <div style="display: -webkit-inline-box;">
                                    Gangguan Persepsi :
                                    <?php
                                    echo $form->field($model, 'gangguan_persepsi')->radioList(
                                        ['Halusinasi' => 'Halusinasi', 'Delusi' => 'Delusi', 'Tidak Ada' => 'Tidak Ada',],
                                        [
                                            'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                                return Helper::radioList($index, $label, $name, $checked, $value, $model);
                                            }
                                        ]
                                    )->label(false);
                                    ?>

                                </div>
                            </li>
                        </ul>
                    </td>
                    <td style="width: 50%;">
                        <b>Fungsi Psikologi</b>
                        <ul>
                            <li>
                                Kognitif
                                <ul>
                                    <li>
                                        <div style="display: -webkit-inline-box;">
                                            Memori :
                                            <?php
                                            echo $form->field($model, 'kognitif_memori')->radioList(
                                                ['+' => '+', '_' => '_',],
                                                [
                                                    'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                                        return Helper::radioList($index, $label, $name, $checked, $value, $model);
                                                    }
                                                ]
                                            )->label(false);
                                            ?>

                                        </div>
                                    </li>
                                    <li>
                                        <div style="display: -webkit-inline-box;">
                                            Konsentrasi :
                                            <?php
                                            echo $form->field($model, 'kognitif_konsentrasi')->radioList(
                                                ['+' => '+', '_' => '_',],
                                                [
                                                    'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                                        return Helper::radioList($index, $label, $name, $checked, $value, $model);
                                                    }
                                                ]
                                            )->label(false);
                                            ?>

                                        </div>
                                    </li>
                                    <li>
                                        <div style="display: -webkit-inline-box;">
                                            Orientasi :
                                            <?php
                                            echo $form->field($model, 'kognitif_orientasi')->radioList(
                                                ['+' => '+', '_' => '_',],
                                                [
                                                    'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                                        return Helper::radioList($index, $label, $name, $checked, $value, $model);
                                                    }
                                                ]
                                            )->label(false);
                                            ?>

                                        </div>
                                    </li>
                                    <li>
                                        <div style="display: -webkit-inline-box;">
                                            Kemampuan Verbal :
                                            <?php
                                            echo $form->field($model, 'kognitif_kemampuan_verbal')->radioList(
                                                ['+' => '+', '_' => '_',],
                                                [
                                                    'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                                        return Helper::radioList($index, $label, $name, $checked, $value, $model);
                                                    }
                                                ]
                                            )->label(false);
                                            ?>

                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div style="display: -webkit-inline-box;">
                                    Emosi :
                                    <?php
                                    echo $form->field($model, 'emosi')->radioList(
                                        ['Stabil' => 'Stabil', 'Tidak Stabil' => 'Tidak Stabil',],
                                        [
                                            'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                                return Helper::radioList($index, $label, $name, $checked, $value, $model);
                                            }
                                        ]
                                    )->label(false);
                                    ?>

                                </div>
                            </li>
                            <li>
                                <div style="display: -webkit-inline-box;">
                                    Perilaku :
                                    <?php
                                    echo $form->field($model, 'perilaku')->radioList(
                                        ['Ada Hambatan' => 'Ada Hambatan', 'Normal' => 'Normal', 'Agresif' => 'Agresif', 'Menarik Diri' => 'Menarik Diri',],
                                        [
                                            'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
                                                return Helper::radioList($index, $label, $name, $checked, $value, $model);
                                            }
                                        ]
                                    )->label(false);
                                    ?>

                                </div>
                            </li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
        2. Simptom
        <table class="tabel-psikologi-c1 table table-sm table-bordered" style="width: 100%;">
            <tbody>
                <tr>
                    <td>
                        <?php
                        $simptom1 = [
                            'Sakit Kepala' => 'Sakit Kepala',
                            'Kurang Nafsu Makan' => 'Kurang Nafsu Makan',
                            'Sulit Tidur' => 'Sulit Tidur',
                            'Mudah Takut' => 'Mudah Takut',
                            'Tegang' => 'Tegang',
                            'Cemas' => 'Cemas',
                            'Gemetar' => 'Gemetar',
                        ];
                        ?>
                        <?= $form->field($model, 'simptom1')->checkboxList($simptom1, [])->label(false) ?>
                    </td>
                    <td>
                        <?php
                        $simptom2 = [
                            'Gangguan Perut' => 'Gangguan Perut',
                            'Sulit Konsentrasi' => 'Sulit Konsentrasi',
                            'Sedih' => 'Sedih',
                            'Sulit Mengambil Keputusan' => 'Sulit Mengambil Keputusan',
                            'Kehilangan Minat' => 'Kehilangan Minat',
                            'Merasa Tidak Berguna' => 'Merasa Tidak Berguna',
                            'Mudah Lupa' => 'Mudah Lupa',
                        ];
                        ?>
                        <?= $form->field($model, 'simptom2')->checkboxList($simptom2, [])->label(false) ?>
                    </td>
                    <td>
                        <?php
                        $simptom3 = [
                            'Merasa Bersalah' => 'Merasa Bersalah',
                            'Mudah Lelah' => 'Mudah Lelah',
                            'Putus Asa' => 'Putus Asa',
                            'Mudah Marah' => 'Mudah Marah',
                            'Mudah Tersinggung' => 'Mudah Tersinggung',
                            'Mimpi Buruk' => 'Mimpi Buruk',
                            'Tidak Percaya Diri' => 'Tidak Percaya Diri',
                        ];
                        ?>
                        <?= $form->field($model, 'simptom3')->checkboxList($simptom3, [])->label(false) ?>
                    </td>
                </tr>
            </tbody>
        </table>
        3. Psikotes Pendukung
        <table class="tabel-psikologi-c1 table table-sm table-bordered" style="width: 100%;">
            <tbody>
                <tr>
                    <td style="vertical-align: middle;">1.</td>
                    <td><?= $form->field($model, 'pendukung_1')->textInput()->label(false) ?></td>
                    <td style="vertical-align: middle;">2.</td>
                    <td><?= $form->field($model, 'pendukung_2')->textInput()->label(false) ?></td>
                    <td style="vertical-align: middle;">3.</td>
                    <td><?= $form->field($model, 'pendukung_3')->textInput()->label(false) ?></td>
                    <td style="vertical-align: middle;">4.</td>
                    <td><?= $form->field($model, 'pendukung_4')->textInput()->label(false) ?></td>
                    <td style="vertical-align: middle;">5.</td>
                    <td><?= $form->field($model, 'pendukung_5')->textInput()->label(false) ?></td>
                </tr>
                <tr>
                    <td colspan="10">
                        <?= $form->field($model, 'pendukung_hasil_tes')->textarea(['rows' => 6])->label('Hasil Tes :') ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <br>
    <b>
        D. Dinamika Psikologi
    </b>
    <div style="margin-left: 18px;">
        <?= $form->field($model, 'dinamika_psikologi')->textarea(['rows' => 6])->label(false) ?>
    </div>
    <br>
    <b>
        E. Kesimpulan
    </b>
    <div style="margin-left: 18px;">
        <?= $form->field($model, 'kesimpulan')->textarea(['rows' => 6])->label(false) ?>
    </div>
    <br>
    <b>
        D. Kesan
    </b>
    <div style="margin-left: 18px;">
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
    </div>
<br>
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
            echo Html::a('<i class="far fa-file-excel"></i> Cetak Hard Copy', ['/spesialis-psikologi-rsud/cetak', 'no_rm' => $no_rm, 'no_daftar' => $no_daftar], ['target' => 'blank', 'data-pjax' => 0, 'class' => 'btn btn-info', 'style' => 'margin-left: 10px;']);
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
            'id' => 'form-spesialis-psikologi-penata',
            'validateOnSubmit' => false, // agar submit ajax tidak 2 kali saat pertama kali reload
            'action' => ['/spesialis-psikologi-rsud/simpan-penata'],
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
            //     echo Html::a('<i class="far fa-file-excel"></i> Cetak Hard Copy', ['/spesialis-psikologi-rsud/cetak-penata', 'no_rm' => $no_rm], ['target' => 'blank', 'data-pjax' => 0, 'class' => 'btn btn-info', 'style' => 'margin-left: 10px;']);
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
