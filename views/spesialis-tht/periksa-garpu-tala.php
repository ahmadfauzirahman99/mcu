<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-13 18:14:13 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2020-10-08 21:27:33
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
/* @var $model app\models\spesialis\McuSpesialisTht */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Pemeriksaan Kesehatan THT Tenaga Kerja (Tes Garpu Tala)';
$this->params['breadcrumbs'][] = ['label' => 'Unit Medical Check Up', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<style type="text/css">
    .form-group {
        margin-bottom: 0px !important;
    }

    .tabel-tht label {
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
                window.location = baseUrl + 'spesialis-tht/periksa-garpu-tala?id=' + e.params.data.id
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
        'id' => 'form-spesialis-tht-garpu-tala',
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

    <table class="table table-sm tabel-tht">
        <colgroup width="35"></colgroup>
        <colgroup width="207"></colgroup>
        <colgroup width="29"></colgroup>
        <colgroup span="4" width="160"></colgroup>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=7 height="19" align="left" valign=top><b>
                    <font color="#000000">I. THT</font>
                </b></td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 height="19" align="center" valign=bottom>
                <font color="#000000"><br></font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle><b>
                    <font color="#000000">TELINGA KANAN</font>
                </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle><b>
                    <font color="#000000">TELINGA KIRI</font>
                </b></td>
        </tr>
        <tr>
            <td rowspan="6" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="19" align="center" valign=top sdval="5" sdnum="1033;">
                <font color="#000000">1</font>
            </td>
            <td colspan="6" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                <font color="#000000" style="font-weight: bold;">Tes Garpu Tala</font>
            </td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                <font color="#000000">Rinne</font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top>
                <font color="#000000">:</font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                <?= Html::activeRadio($model, 'tl_test_garpu_tala_rinne_telinga_kanan',  ['id' => 'mcuspesialistht_tl_test_garpu_tala_rinne_telinga_kanan_0', 'value' => 'Negatif (AC < BC)', 'label' => 'Negatif (AC < BC)']) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                <label>
                    <input <?= ($model->tl_test_garpu_tala_rinne_telinga_kanan == 'Positif (AC > BC)') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_test_garpu_tala_rinne_telinga_kanan_1" name="McuSpesialisThtGarpuTala[tl_test_garpu_tala_rinne_telinga_kanan]" value="Positif (AC > BC)">
                    Positif (AC > BC)
                </label>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                <?= Html::activeRadio($model, 'tl_test_garpu_tala_rinne_telinga_kiri',  ['id' => 'mcuspesialistht_tl_test_garpu_tala_rinne_telinga_kiri_0', 'value' => 'Negatif (AC < BC)', 'label' => 'Negatif (AC < BC)']) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                <label>
                    <input <?= ($model->tl_test_garpu_tala_rinne_telinga_kiri == 'Positif (AC > BC)') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_test_garpu_tala_rinne_telinga_kiri_1" name="McuSpesialisThtGarpuTala[tl_test_garpu_tala_rinne_telinga_kiri]" value="Positif (AC > BC)">
                    Positif (AC > BC)
                </label>
            </td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                <font color="#000000">Weber</font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top>
                <font color="#000000">:</font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                <?= Html::activeRadio($model, 'tl_weber_telinga_kanan',  ['id' => 'mcuspesialistht_tl_weber_telinga_kanan_0', 'value' => 'Tidak Ada Lateralisasi', 'label' => 'Tidak Ada Lateralisasi']) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                <label>
                    <input <?= ($model->tl_weber_telinga_kanan == 'Lateralisasi Kanan') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_weber_telinga_kanan_1" name="McuSpesialisThtGarpuTala[tl_weber_telinga_kanan]" value="Lateralisasi Kanan">
                    Lateralisasi Kanan
                </label>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                <?= Html::activeRadio($model, 'tl_weber_telinga_kiri',  ['id' => 'mcuspesialistht_tl_weber_telinga_kiri_0', 'value' => 'Tidak Ada Lateralisasi', 'label' => 'Tidak Ada Lateralisasi']) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                <label>
                    <input <?= ($model->tl_weber_telinga_kiri == 'Lateralisasi Kiri') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_weber_telinga_kiri_1" name="McuSpesialisThtGarpuTala[tl_weber_telinga_kiri]" value="Lateralisasi Kiri">
                    Lateralisasi Kiri
                </label>
            </td>
        </tr>
        <tr>
            <td rowspan="2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                <font color="#000000">Swabach</font>
            </td>
            <td rowspan="2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top>
                <font color="#000000">:</font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                <?= Html::activeRadio($model, 'tl_swabach_telinga_kanan',  ['id' => 'mcuspesialistht_tl_swabach_telinga_kanan_0', 'value' => 'Normal', 'label' => 'Normal']) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                <label>
                    <input <?= ($model->tl_swabach_telinga_kanan == 'Tidak Normal') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_swabach_telinga_kanan_1" name="McuSpesialisThtGarpuTala[tl_swabach_telinga_kanan]" value="Tidak Normal">
                    Tidak Normal
                </label>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                <?= Html::activeRadio($model, 'tl_swabach_telinga_kiri',  ['id' => 'mcuspesialistht_tl_swabach_telinga_kiri_0', 'value' => 'Normal', 'label' => 'Normal']) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                <label>
                    <input <?= ($model->tl_swabach_telinga_kiri == 'Tidak Normal') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_swabach_telinga_kiri_1" name="McuSpesialisThtGarpuTala[tl_swabach_telinga_kiri]" value="Tidak Normal">
                    Tidak Normal
                </label>
            </td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                <label>
                    <input <?= ($model->tl_swabach_telinga_kanan == 'Memendek') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_swabach_telinga_kanan_2" name="McuSpesialisThtGarpuTala[tl_swabach_telinga_kanan]" value="Memendek">
                    Memendek
                </label>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                <label>
                    <input <?= ($model->tl_swabach_telinga_kanan == 'Memanjang') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_swabach_telinga_kanan_3" name="McuSpesialisThtGarpuTala[tl_swabach_telinga_kanan]" value="Memanjang">
                    Memanjang
                </label>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                <label>
                    <input <?= ($model->tl_swabach_telinga_kiri == 'Memendek') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_swabach_telinga_kiri" name="McuSpesialisThtGarpuTala[tl_swabach_telinga_kiri]" value="Memendek">
                    Memendek
                </label>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                <label>
                    <input <?= ($model->tl_swabach_telinga_kiri == 'Memanjang') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_swabach_telinga_kiri" name="McuSpesialisThtGarpuTala[tl_swabach_telinga_kiri]" value="Memanjang">
                    Memanjang
                </label>
            </td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                <font color="#000000">Bing</font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top>
                <font color="#000000">:</font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                <?= Html::activeRadio($model, 'tl_bing_telinga_kanan',  ['id' => 'mcuspesialistht_tl_bing_telinga_kanan_0', 'value' => 'Bertambah Keras', 'label' => 'Bertambah Keras']) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                <label>
                    <input <?= ($model->tl_bing_telinga_kanan == 'Tidak Bertambah Keras') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_bing_telinga_kanan_1" name="McuSpesialisThtGarpuTala[tl_bing_telinga_kanan]" value="Tidak Bertambah Keras">
                    Tidak Bertambah Keras
                </label>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                <?= Html::activeRadio($model, 'tl_bing_telinga_kiri',  ['id' => 'mcuspesialistht_tl_bing_telinga_kiri_0', 'value' => 'Bertambah Keras', 'label' => 'Bertambah Keras']) ?>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=top>
                <label>
                    <input <?= ($model->tl_bing_telinga_kiri == 'Tidak Bertambah Keras') ? 'checked' : null ?> type="radio" id="mcuspesialistht_tl_bing_telinga_kiri_1" name="McuSpesialisThtGarpuTala[tl_bing_telinga_kiri]" value="Tidak Bertambah Keras">
                    Tidak Bertambah Keras
                </label>
            </td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=3 height="58" align="left" valign=middle><b>
                    <font color="#000000">II. KESAN</font>
                </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=3 align="center" valign=middle>
                <font color="#000000">:</font>
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 rowspan=3 valign=bottom>
                <?php // $form->field($model, 'kesimpulan')->textArea(['rows' => 4])->label(false) ?>
                <?php
                echo $form->field($model, 'kesimpulan')->radioList(
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
        </tr>
        <tr>
        </tr>
    </table>

    <?php
    Pjax::begin(['id' => 'btn-cetak']);
    if (!$model->isNewRecord) {
        echo $form->field($model, 'id_spesialis_tht_garpu_tala')->hiddenInput()->label(false);
    }
    ?>

    <div class="form-group">
        <?php
        if (array_key_exists('id', $_GET))
            echo Html::submitButton('Simpan', ['class' => 'btn btn-success']);
        if (!$model->isNewRecord)
            echo Html::a('<i class="far fa-file-excel"></i> Cetak Hard Copy', ['/spesialis-tht/cetak', 'no_rm' => $no_rm, 'no_daftar' => $no_daftar], ['target' => 'blank', 'data-pjax' => 0, 'class' => 'btn btn-info', 'style' => 'margin-left: 10px;']);
        ?>
    </div>
    <?php
    Pjax::end();
    ?>

    <?php ActiveForm::end(); ?>

    <hr>

    <?php
    $displayPenata = 'none';
    if ($model->kesimpulan == 'Tidak Normal')
        $displayPenata = 'block';
    ?>
    <div class="div-penata" style="display: <?= $displayPenata ?>;">
        <h3>
            PERMASALAHAN PASIEN & RENCANAN PENATALAKSANAAN
        </h3>

        <?php $form = ActiveForm::begin([
            'id' => 'form-spesialis-tht-garpu-tala-penata',
            'validateOnSubmit' => false, // agar submit ajax tidak 2 kali saat pertama kali reload
            'action' => ['/spesialis-tht/simpan-penata'],
        ]); ?>

        <div class="row">
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
            //     echo Html::a('<i class="far fa-file-excel"></i> Cetak Hard Copy', ['/spesialis-tht/cetak-penata', 'no_rm' => $no_rm], ['target' => 'blank', 'data-pjax' => 0, 'class' => 'btn btn-info', 'style' => 'margin-left: 10px;']);
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

$this->registerJs($this->render('periksa-garpu-tala.js'));
