<?php

use app\models\spesialis\BaseModel;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisTreadmill */
/* @var $form yii\bootstrap4\ActiveForm */

$this->title = "HASIL UJI LATIH JANTUNG DENGAN BEBAN";
$this->params['breadcrumbs'][] = Html::decode($this->title);
?>

<div class="mcu-spesialis-treadmill-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-12">
            <label for="">Nama Pasien</label>
            <?php
            echo $form->field($dataLayanan, 'nama')->widget(Select2::classname(), [
                'data' => BaseModel::getListPasien(),
                'theme' => 'bootstrap',
                'options' => ['placeholder' => 'Cari Pasien ...'],
                'pluginOptions' => [
                    'allowClear' => false
                ],
                'pluginEvents' => [
                    "select2:select" => "function(e) { 
                window.location = baseUrl + 'spesialis-treadmill/create?id=' + e.params.data.id
            }",
                ],
            ])->label(false);
            ?>'
        </div>
    </div>
    <?php ActiveForm::end(); ?>

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model, 'permintaan')->textInput(['placeholder' => 'Permintaan']) ?>
            <h1 class="text-center"><?= Html::decode($this->title) ?> <i>TREADMILL TEST</i></h1>

        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="">Nama</label>
                <input readonly type="text" class="form-control" value="<?= $pasien->nama ?? null ?>" id="nama_pasien">
            </div>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'no_rekam_medik')->textInput(['maxlength' => true, 'readonly' => true, 'placeholder' => 'Nomor Rekam Medik']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'no_daftar')->textInput(['readonly' => true, 'placeholder' => 'No Daftar']) ?>
        </div>

    </div>


    <?php $form->field($model, 'created_at')->textInput() ?>

    <?php $form->field($model, 'updated_at')->textInput() ?>

    <?php $form->field($model, 'created_by')->textInput() ?>

    <?php $form->field($model, 'updated_by')->textInput() ?>


    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'metode')->textInput(['placeholder' => 'Metode']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'lama_latihan')->textInput(['placeholder' => 'Lama Latihan']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'test_dihentikan_karena')->textInput(['placeholder' => 'Test Dihentikan Karena']) ?>
        </div>
    </div>



    <?= $form->field($model, 'dj_maksimal')->textInput() ?>

    <?= $form->field($model, 'td_maksimal')->textInput() ?>

    <?= $form->field($model, 'ekg_istirahat')->textInput() ?>

    <?= $form->field($model, 'ekg_latihan')->textInput() ?>

    <?= $form->field($model, 'ekg_pemulihan')->textInput() ?>

    <?= $form->field($model, 'tingkat_kesegaran_jasmani')->textInput() ?>

    <?= $form->field($model, 'kelas_fungsional')->textInput() ?>

    <?= $form->field($model, 'kapasitas_aerobik')->textInput() ?>

    <?= $form->field($model, 'respon_hemodinamik')->textInput() ?>

    <?= $form->field($model, 'respon_iskemik')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'anjuran')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'riwayat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kesan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status_pemeriksaan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>