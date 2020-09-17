<?php

use app\components\Helper;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\SpesialisKejiwaan */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Laporan';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="laporan-form">

<form method="post" action="<?= Url::to(['laporan/cetak']) ?>" name="form-lapRekap" target="_blank" class="form">
    <fieldset>
    <legend>Silahkan pilih field yang akan ditampilkan?</legend> 
    <?= Html::input('hidden','laporan[type]','lapRekap') ?>
    <div class="row col-sm-12">
    <div class="col-sm-3">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="no_test">
            <label class="custom-control-label" for="no_test">Nomor Test</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="nama">
            <label class="custom-control-label" for="nama">Nama</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="umur">
            <label class="custom-control-label" for="umur">Umur</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="jenis_kelamin">
            <label class="custom-control-label" for="jenis_kelamin">Jenis Kelamin</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="pekerjaan">
            <label class="custom-control-label" for="pekerjaan">Pekerjaan</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="tensi">
            <label class="custom-control-label" for="tensi">Tensi (Mm/Hg)</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="tinggi">
            <label class="custom-control-label" for="tinggi">Tinggi (cm)</label>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="berat">
            <label class="custom-control-label" for="berat">Berat (Kg)</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="mata">
            <label class="custom-control-label" for="mata">Mata</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="tht">
            <label class="custom-control-label" for="tht">THT</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="gigi">
            <label class="custom-control-label" for="gigi">Gigi</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="kulit">
            <label class="custom-control-label" for="kulit">Kulit</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="urine_rutin">
            <label class="custom-control-label" for="urine_rutin">Urine Rutin</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="darah_rutin">
            <label class="custom-control-label" for="darah_rutin">Darah Rutin</label>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="kimia_klinik">
            <label class="custom-control-label" for="kimia_klinik">Kimia Klinik</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="hbsag">
            <label class="custom-control-label" for="hbsag">HBsAg</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="rontgen">
            <label class="custom-control-label" for="rontgen">Rontgen</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="ekg">
            <label class="custom-control-label" for="ekg">EKG</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="wawancara_psikiatri">
            <label class="custom-control-label" for="wawancara_psikiatri">Wawancara Psikiatri</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="narkoba">
            <label class="custom-control-label" for="narkoba">Narkoba</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="laik_kerja">
            <label class="custom-control-label" for="laik_kerja">Laik Kerja</label>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="keterangan">
            <label class="custom-control-label" for="keterangan">Keterangan</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="score">
            <label class="custom-control-label" for="score">Score</label>
        </div>
    </div>  
</div>  
    <br>
    </fieldset>  
    <?= Html::submitButton(Yii::t('app', '<i class="far fa-file-excel"></i> Export Excel'), ['id'=>'exportExcel','class' => 'btn btn-success','name'=>'submit','value'=>'excel']) ?> &nbsp; &nbsp; 
    <?= Html::submitButton('<i class="fa fa-print"></i> Cetak PDF',['class'=>'btn ink-reaction btn-warning']) ?>
    <?= Html::hiddenInput(Yii::$app->request->csrfParam,Yii::$app->request->csrfToken) ?>
</form>

</div>

<?php
$script = <<< JS

$(document).ready(function() {   
    // Iterate each checkbox
    $(':checkbox').each(function() {
        this.checked = true;                        
    });
});

JS;
$this->registerJs($script);
?>