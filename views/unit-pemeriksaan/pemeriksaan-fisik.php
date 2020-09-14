<?php

/* @var $this yii\web\View */

use app\assets\FormWizard;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\web\JsExpression;
use yii\bootstrap4\ActiveForm;

FormWizard::register($this);


/* @var $dataLayanan app\models\MasterPemeriksaanFisik */
/* @var $anamnesis app\models\Anamnesis */
/* @var $jenis_pekerjaan app\models\JenisPekerjaan */
/* @var $form ActiveForm */

$this->title = 'UNIT MEDICAL CHEK UP RSUD ARIFIN ACHMAD PROVINSI RIAU';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <?php $form = ActiveForm::begin(); ?>
    <label for="">No.Rekam Medik / Nama</label>
    <?php
    $url = \yii\helpers\Url::to(['/unit-pemeriksaan/get-data-pelayanan']);
    // $model->icdt10 = "";
    echo $form->field($dataLayanan, 'nama')->widget(Select2::classname(), [
        'options' => ['placeholder' => 'Mencari Data Pelayanan ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'minimumInputLength' => 3,
            'language' => [
                'errorLoading' => new JsExpression("function () { return 'Menunggu hasil cari bro...'; }"),
            ],
            'ajax' => [
                'url' => $url,
                'dataType' => 'json',
                'data' => new JsExpression('function(params) { return {q:params.term}; }')
            ],
            'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
            'templateResult' => new JsExpression('function(data) { return data.text; }'),
            'templateSelection' => new JsExpression('function (data) { return data.text; }'),
        ],
        // 'pluginEvents' => [
        //     "select2:select" => "function(e) { 
        //         let data = e.params.data
        //         let diagnosis_kerja = $('#masterpemeriksaanfisik-diagnosis_kerja').val()
        //         if(diagnosis_kerja==null || diagnosis_kerja=='')
        //             diagnosis_kerja += data.id
        //         else
        //             diagnosis_kerja += ','+data.id
        //         $('#masterpemeriksaanfisik-diagnosis_kerja').val(diagnosis_kerja)
        //     }",
        // ]
    ])->label(false);
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
        </ul>

        <div class="tab-content b-0 mb-0">

            <div id="bar" class="progress progress-striped progress-bar-primary-alt">
                <div class="bar progress-bar progress-bar-primary"></div>
            </div>

            <div class="tab-pane p-t-10 fade" id="account-2">
                <?= $this->render('data-layanan', ['model' => $dataLayanan]) ?>
            </div>
            <div class="tab-pane p-t-10 fade" id="profile-tab-2">
                <?= $this->render('anamnesis.php', ['model' => $anamnesis, 'dataLayanan' => $dataLayanan]) ?>
            </div>
            <div class="tab-pane p-t-10 fade" id="finish-2">
                <?= $this->render('anamnesis-okupasi.php', ['jenisPekerjaan' => $jenis_pekerjaan, 'dataLayanan' => $dataLayanan]) ?>
            </div>
            <ul class="list-inline mb-0 wizard">
                <li class="previous list-inline-item first" style="display:none;"><a href="#">First</a>
                </li>
                <li class="previous list-inline-item"><a href="#" class="btn btn-primary waves-effect waves-light">Previous</a></li>
                <li class="next last list-inline-item" style="display:none;"><a href="#">Last</a></li>
                <li class="next list-inline-item float-right"><a href="#" class="btn btn-primary waves-effect waves-light">Next</a></li>
            </ul>
        </div>
    </div>
</div>