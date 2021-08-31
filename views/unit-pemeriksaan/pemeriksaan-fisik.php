<?php

/* @var $this yii\web\View */

use app\assets\FormWizard;
use app\models\spesialis\BaseModel;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\web\JsExpression;
use yii\bootstrap4\ActiveForm;

FormWizard::register($this);


/* @var $dataLayanan app\models\MasterPemeriksaanFisik */
/* @var $anamnesis app\models\Anamnesis */
/* @var $jenis_pekerjaan app\models\JenisPekerjaan */
/* @var $master_pemeriksaan_fisik app\models\MasterPemeriksaanFisik */
/* @var $modelRegister app\models\UserRegister */
/* @var $form ActiveForm */

$this->title = 'UNIT MEDICAL CHEK UP RSUD ARIFIN ACHMAD PROVINSI RIAU';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <?php $form = ActiveForm::begin(); ?>
    <label for="">No.Rekam Medik / Nama</label>
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
                window.location = baseUrl + 'unit-pemeriksaan/pemeriksaan-fisik?id=' + e.params.data.id
            }",
        ],
    ]);
    ?>
    <?= Html::submitButton('Cari <span class="mdi mdi-file-search"></span>', ['class' => 'btn btn-success']) ?>

    <?php ActiveForm::end(); ?>

    <br>
</div>
<!-- PROGRESSBAR WIZARD -->
<div class="card-box pb-0">
    <div class="dropdown pull-right">
        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
            <i class="mdi mdi-dots-vertical"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item">Action</a>
            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
        </div>
    </div>

    <h4 class="header-title m-t-0 m-b-30">Progress Pemeriksaan Fisik</h4>

    <div id="progressbarwizard" class="pull-in">
        <ul class="nav nav-tabs nav-justified">
            <li class="nav-item"><a href="#account-2" data-toggle="tab" class="nav-link">Data Pelayanan</a></li>
            <li class="nav-item"><a href="#profile-tab-2" data-toggle="tab" class="nav-link">I. ANAMNESIS</a></li>
            <li class="nav-item"><a href="#finish-2" data-toggle="tab" class="nav-link">II. ANAMNESIS OKUPASI</a></li>
            <li class="nav-item"><a href="#finish-4" data-toggle="tab" class="nav-link">Body Discomfort Map</a></li>
            <li class="nav-item"><a href="#finish-3" data-toggle="tab" class="nav-link">III. PEMERIKSAAN FISIK</a></li>
            <li class="nav-item"><a href="#finish-5" data-toggle="tab" class="nav-link">Pemeriksaan Fisik Khusus</a>
            </li>
        </ul>

        <div class="tab-content b-0 mb-0">

            <div id="bar" class="progress progress-striped progress-bar-primary-alt">
                <div class="bar progress-bar progress-bar-primary"></div>
            </div>

            <div class="tab-pane p-t-10 fade" id="account-2">
                <?= $this->render('data-layanan', ['model' => $dataLayanan,]) ?>
            </div>
            <div class="tab-pane p-t-10 fade" id="profile-tab-2">
                <?= $this->render('anamnesis.php', ['model' => $anamnesis, 'dataLayanan' => $dataLayanan]) ?>
            </div>
            <div class="tab-pane p-t-10 fade" id="finish-2">
                <?= $this->render(
                    'anamnesis-okupasi.php',
                    [
                        'jenisPekerjaan' => $jenis_pekerjaan,
                        'dataLayanan' => $dataLayanan,
                        'anamnesis' => $anamnesis,
                        'dataBiodataUser' => $dataBiodataUser
                    ]
                ) ?>
            </div>
            <div class="tab-pane p-t-10 fade" id="finish-4">
                <?= $this->render(
                    'body-discomfort-map.php',
                    [
                        'dataLayanan' => $dataLayanan,
                    ]
                ) ?>
            </div>
            <div class="tab-pane p-t-10 fade" id="finish-3">
                <?= $this->render('item-fisik.php', [
                    'master_pemeriksaan_fisik' => $master_pemeriksaan_fisik,
                    'dataLayanan' => $dataLayanan,

                ]) ?>
            </div>
            <div class="tab-pane p-t-10 fade" id="finish-5">
                <?= $this->render('pemeriksaan-khusus.php', [
                    'master_pemeriksaan_fisik' => $master_pemeriksaan_fisik,
                    'dataLayanan' => $dataLayanan,

                ]) ?>
            </div>
            <ul class="list-inline mb-0 wizard">
                <li class="previous list-inline-item first" style="display:none;"><a href="#">First</a>
                </li>
                <li class="previous list-inline-item"><a href="#" class="btn btn-primary waves-effect waves-light">Previous</a>
                </li>
                <li class="next last list-inline-item" style="display:none;"><a href="#">Last</a></li>
                <li class="next list-inline-item float-right"><a href="#" class="btn btn-primary waves-effect waves-light">Next</a>
                </li>
            </ul>
        </div>
    </div>
</div>