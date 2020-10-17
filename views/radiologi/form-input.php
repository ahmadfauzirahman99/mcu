<?php

/**
 * Created by PhpStorm.
 * User: SalmanSyuhada
 * Date: 14-Oct-20
 * Time: 10:09 PM
 */

use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<div class="modal-dialog modal-lg" role="document" style="margin-top: 0px;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myLargeModalLabel"> Form Input Radiologi </h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        </div>

        <?php $form = ActiveForm::begin(['id' => 'McuHasilRadiologi', 'action' => 'javascript::void(0)', 'options' => ['class' => 'form form-mcu-hasil-radiologi', 'role' => 'form']]); ?>

        <?php
        echo $form->field($model, 'id_hasil_radiologi', ['template' => '{input}', 'options' => ['tag' => false]])->hiddenInput()->label(false);
        echo $form->field($model, 'no_mcu', ['template' => '{input}', 'options' => ['tag' => false]])->hiddenInput()->label(false);
        echo $form->field($model, 'kode_debitur', ['template' => '{input}', 'options' => ['tag' => false]])->hiddenInput()->label(false);
        echo $form->field($model, 'kode_pemeriksa', ['template' => '{input}', 'options' => ['tag' => false]])->hiddenInput()->label(false);
        ?>

        <div class="row">
            <div class="col-lg-6">
                <div class="col-sm-12">
                    <label class="control-label">Nomor Rekam Medik</label>
                </div>
                <div class="col-sm-12">
                    <?= $form->field($model, 'no_rekam_medik')->label(false)->textInput(['id' => 'DataNoRekamMedik', 'class' => 'form-control', 'readonly' => true]) ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="col-sm-12">
                    <label class="control-label">Nomor Registrasi</label>
                </div>
                <div class="col-sm-12">
                    <?= $form->field($model, 'no_registrasi')->label(false)->textInput(['id' => 'DataNoRegistrasi', 'class' => 'form-control', 'readonly' => true]) ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="col-sm-12">
                    <label class="control-label">Id Layanan</label>
                </div>
                <div class="col-sm-12">
                    <?= $form->field($model, 'id_data_pelayanan')->label(false)->textInput(['id' => 'DataIdPelayanan', 'class' => 'form-control', 'readonly' => true]) ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="col-sm-12">
                    <label class="control-label">Nama Pasien</label>
                </div>
                <div class="col-sm-12">
                    <input type="text" id="DataNamaPasien" value="<?= $namapasien ?>" class="form-control" readonly>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-12">
                <label class="control-label">Hasil</label>
            </div>
            <div class="col-sm-12">
                <?= $form->field($model, 'hasil')->label(false)->textarea(['rows' => '6', 'readonly' => true]) ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-4">
                <label class="control-label">Result</label>
            </div>
            <div class="col-sm-8">
                <?php
                $a = [1 => 'Tidak Normal', 0 => 'Normal'];
                ?>
                <?= $form->field($model, 'result_pemeriksaan')->label(false)->dropDownList($a, ['prompt' => 'Pilih hasil pemeriksaan...']); ?>
            </div>
        </div>

        <div class="modal-footer">
            <div class="row" align="right">
                <button type="button" class="btn btn-success btn-save"><i class="fa fa-save"></i> Input </button>
                <button type="button" data-dismiss="modal" class="btn btn-danger right"> Batal </button>
            </div>
        </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>

<?php
$this->registerJs(" 
 
     $('.btn-save').click(function(e){
            e.preventDefault();
            var btn=$('.btn-save');
            var Data = $('#McuHasilRadiologi').serialize();
            btn.html('<i class=\'fa fa-refresh fa-spin fa-fw\'></i> Proses Input...').attr('disabled',true);
             $.ajax({
                url:'" . Url::to(['radiologi/save-input']) . "',
                type:'post',
                data: Data,
                dataType:'json',
                success:function(result){
                    if(result.status=='true'){
                        $('#mymodal').modal('hide');
                        document.getElementById('IdRefreshData').click();
                        toastr['success'](result.msg);
                    }else{
                        toastr['warning'](result.msg);
                    }
                    btn.html('<i class=\'md md-save\'></i> Simpan').removeAttr('disabled');
                }
		    });
        });
        
");
