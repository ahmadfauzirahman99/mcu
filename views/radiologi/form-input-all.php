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
            <h4 class="modal-title" id="myLargeModalLabel"> Form Input Radiologi Otomatis </h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        </div>

        <?php $form = ActiveForm::begin(['id' => 'McuHasilRadiologi', 'action' => 'javascript::void(0)', 'options' => ['class' => 'form form-mcu-hasil-radiologi', 'role' => 'form']]); ?>

        <div class="form-group">
            <div class="col-sm-4">
                <label class="control-label">Kode Debitur</label>
            </div>
            <div class="col-sm-8">
                <?= $form->field($model, 'kode_debitur')->label(false)->textInput(['id' => 'DataKodeDebitur', 'class' => 'form-control', 'readonly' => true]) ?>
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
            btn.html('<i class=\'fa fa-refresh fa-spin fa-fw\'></i> Proses Input Otomatis ...').attr('disabled',true);
             $.ajax({
                url:'" . Url::to(['radiologi/process-input-all']) . "',
                type:'post',
                data: Data,
                dataType:'json',
                success:function(result){
                    if(result.status=='true'){
                        toastr['success'](result.msg);
                        $('#mymodal').modal('hide');
                    }else{
                        toastr['warning'](result.msg);
                    }
                    btn.html('<i class=\'md md-save\'></i> Simpan').removeAttr('disabled');
                }
		    });
        });
        
");
