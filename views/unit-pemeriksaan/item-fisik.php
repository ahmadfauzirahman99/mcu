<?php

use app\assets\ItemFisikAsset;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $master_pemeriksaan_fisik app\models\MasterPemeriksaanFisik */
/* @var $form yii\bootstrap4\ActiveForm */

ItemFisikAsset::register($this);

$helper = [
    'Normal' => 'Normal',
    'Kekurangan Berat Badan Tingkat Berat' => 'Kekurangan Berat Badan Tingkat Berat',
    'Kekurangan Berat Badan Tingkat Ringan' => 'Kekurangan Berat Badan Tingkat Ringan',
    'Kelebihan Berat Badan Tingkat Ringan' => 'Kelebihan Berat Badan Tingkat Ringan',
    'Kelebihan Berat Badan Tingkat Berat' => 'Kelebihan Berat Badan Tingkat Berat'
];
?>
<?php $form = ActiveForm::begin(); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <div class="form-group">
                <h4 class="header-title m-t-0 m-b-30">1. Tanda Vital</h4>
                <hr>
                <?= $form->field($master_pemeriksaan_fisik, 'no_rekam_medik')->hiddenInput(['maxlength' => true])->label(false) ?>

                <div class="row">
                    <div class="col-lg-6">
                        <?= $form->field($master_pemeriksaan_fisik, 'tanda_vital_nadi')->textInput(['maxlength' => true, 'placeholder' => 'Vital Nadi']) ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($master_pemeriksaan_fisik, 'tanda_vital_pernapasan')->textInput(['maxlength' => true, 'placeholder' => 'Pernapasan']) ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($master_pemeriksaan_fisik, 'tanda_vital_tekanan_darah')->textInput(['maxlength' => true, 'placeholder' => 'Tekanan Darah']) ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($master_pemeriksaan_fisik, 'tanda_vital_suhu_badan')->textInput(['maxlength' => true, 'placeholder' => 'Suhu Badan']) ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card-box">
            <div class="form-group">
                <h4 class="header-title m-t-0 m-0 30">2. Status Gizi</h4>
                <hr>
                <div class="row">
                    <div class="col-lg-4">
                        <?= $form->field($master_pemeriksaan_fisik, 'status_gizi_tinggi_badan')->textInput(['placeholder' => 'Tinggi Badan']) ?>
                    </div>
                    <div class="col-lg-4">
                        <?= $form->field($master_pemeriksaan_fisik, 'status_gizi_berat_badan')->textInput(['placeholder' => 'Tinggi Badan']) ?>
                    </div>
                    <div class="col-lg-4">
                        <?= $form->field($master_pemeriksaan_fisik, 'status_gizi_lingkaran_perut')->textInput(['placeholder' => 'Lingkaran Perut']) ?>
                    </div>
                    <div class="col-lg-12">
                        <?= $form->field($master_pemeriksaan_fisik, 'status_gizi_lingkaran_pinggang')->textInput(['placeholder' => 'Lingkaran Pinggang']) ?>
                    </div>
                    <div class="col-lg-12">
                        <?= $form->field($master_pemeriksaan_fisik, 'status_gizi_bentuk_badan')->radioList($helper, []) ?>
                    </div>
                    <div class="col-lg-12">
                        <?= $form->field($master_pemeriksaan_fisik, 'status_gizi_imt')->textInput(['readonly' => true]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
    <hr>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <div class="form-group">
                <h4 class="header-title m-t-0 m-b-30">3. Tingkat Kesadaran dan Keadaan Umum</h4>
            </div>
        </div>
    </div>
</div>