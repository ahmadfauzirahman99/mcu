<?php

/* @var $this yii\web\View */

use app\assets\FormTidakMelanjutkanAsset;
use app\assets\ItemFisikAsset;
use app\components\Helper;
use app\models\spesialis\BaseModel;
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

FormTidakMelanjutkanAsset::register($this);

$this->title = 'Menu Tidak Melanjutkan Pemeriksaan';
$this->params['breadcrumbs'][] = $this->title;

$itemPemeriksaan = [
    // "Tidak Melanjutkan Anamenesi",
    // "Tidak Melanjutkan Anamensis Okupasi",
    "Tidak Melanjutkan Pemeriksaan Fisik",
    "Tidak Melanjutkan Pemeriksaan Mata",
    "Tidak Melanjutkan Pemeriksaan Gigi",
    "Tidak Melanjutkan Pemeriksaan Tes Berbisik",
    "Tidak Melanjutkan Pemeriksaan AudioMetri",
    "Tidak Melanjutkan Pemeriksaan Tes Garpu Tala",
    // "Tidak Melanjutkan Pemeriksaan Psikiatri",
    // "Tidak Melanjutkan Pemeriksaan Psikologi",
    // "Tidak Melanjutkan Pemeriksaan Narkoba",
];
?>
<?php $form = ActiveForm::begin(); ?>

<div class="row">
    <div class="col-lg-12">
        <label for="">Nama Pasien</label>
        <?php
        echo $form->field($model, 'no_rekam_medik')->widget(Select2::classname(), [
            'data' => BaseModel::getListPasien(),
            'theme' => 'bootstrap',
            'options' => ['placeholder' => 'Cari Pasien ...'],
            'pluginOptions' => [
                'allowClear' => false
            ],
            'pluginEvents' => [
                "select2:select" => "function(e) { 
                window.location = baseUrl + 'site/item-mcu?id=' + e.params.data.id
            }",
            ],
        ])->label(false);
        ?>'
        <?php ActiveForm::end(); ?>
    </div>
    <div class="col-lg-12">

        <?php if (!$model->isNewRecord) { ?>

            <div class="row">
                <div class="col-sm-12">
                    <div class="bg-picture">
                        <div class="profile-info-name">
                            <img src="<?= $model->pas_foto_offline == null ? Yii::$app->request->baseUrl . "/img/user.png" : $model->pas_foto_offline ?>" class="img-thumbnail" alt="profile-image">

                            <div class="profile-info-detail">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4 class="m-0"><?= $form->field($model, 'no_rekam_medik')->textInput(['maxlength' => true, 'readonly' => true]) ?></h4>
                                    </div>
                                    <div class="col-lg-4">
                                        <h4 class="m-0"><?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'readonly' => true]) ?></h4>
                                    </div>
                                    <div class="col-lg-4">
                                        <?= $form->field($model, 'tempat')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                                    </div>
                                    <div class="col-lg-4">
                                        <?php $model->tgl_lahir = Helper::tgl_indo(date('Y-m-d', strtotime($model->tgl_lahir))) ?>
                                        <?= $form->field($model, 'tgl_lahir')->textInput(['readonly' => true]) ?>
                                    </div>
                                    <div class="col-lg-5">
                                        <?= $form->field($model, 'agama')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                                    </div>
                                    <div class="col-lg-7">
                                        <?= $form->field($model, 'kedudukan_dalam_keluarga')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                                    </div>
                                    <div class="col-lg-7">
                                        <?= $form->field($model, 'status_perkawinan')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                                    </div>
                                    <div class="col-lg-5">
                                        <?= $form->field($model, 'pendidikan')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                                    </div>
                                    <div class="col-lg-5">
                                        <?= $form->field($model, 'pekerjaan')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                                    </div>
                                    <div class="col-lg-7">
                                        <?= $form->field($model, 'alamat')->textInput(['readonly' => true]) ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?= $form->field($model, 'no_mcu')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?= $form->field($model, 'wni')->textInput(['maxlength' => true, 'readonly' => true]) ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?php $model->tanggal_pemeriksaan = Helper::tgl_indo(date('Y-m-d', strtotime($model->tanggal_pemeriksaan))) ?>
                                        <?= $form->field($model, 'tanggal_pemeriksaan')->textInput(['readonly' => true]) ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?= $form->field($model, 'jenis_kelamin')->textInput(['readonly' => true]) ?>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!--/ meta -->
                </div>
            </div>
            <a onclick="tidakMelanjutkanPemeriksaan(this,'fisik')" id="fisik" data-value='<?= $model->no_rekam_medik ?>' class="btn btn-warning waves-effect w-md waves-warning m-b-5">
            <?= $itemPemeriksaan[0] ?> <span class="fa fa-info-circle"></span></a>
            <a onclick="tidakMelanjutkanPemeriksaan(this,'mata')" id="fisik" data-value='<?= $model->no_rekam_medik ?>' class="btn btn-warning waves-effect w-md waves-warning m-b-5"><?= $itemPemeriksaan[1] ?> <span class="fa fa-info-circle"></a>
            <a onclick="tidakMelanjutkanPemeriksaan(this,'gigi')" id="fisik" data-value='<?= $model->no_rekam_medik ?>' class="btn btn-warning waves-effect w-md waves-warning m-b-5"><?= $itemPemeriksaan[2] ?> <span class="fa fa-info-circle"></a>
            <a onclick="tidakMelanjutkanPemeriksaan(this,'thtberbisik')" id="fisik" data-value='<?= $model->no_rekam_medik ?>' class="btn btn-warning waves-effect w-md waves-warning m-b-5"><?= $itemPemeriksaan[3] ?> <span class="fa fa-info-circle"></a>
            <a onclick="tidakMelanjutkanPemeriksaan(this,'thtaudio')" id="fisik" data-value='<?= $model->no_rekam_medik ?>' class="btn btn-warning waves-effect w-md waves-warning m-b-5"><?= $itemPemeriksaan[4] ?> <span class="fa fa-info-circle"></a>
            <a onclick="tidakMelanjutkanPemeriksaan(this,'thtgarputala')" id="fisik" data-value='<?= $model->no_rekam_medik ?>' class="btn btn-warning waves-effect w-md waves-warning m-b-5"><?= $itemPemeriksaan[5] ?> <span class="fa fa-info-circle"></a>
        <?php } ?>
    </div>
</div>