<?php
/**
 * Created by PhpStorm.
 * User: SalmanSyuhada
 * Date: 28-Jun-20
 * Time: 4:09 PM
 */

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use \kartik\select2\Select2;
use yii\helpers\ArrayHelper;

?>

    <div class="modal-dialog modal-lg" role="document" style="margin-top: 0px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel"> Input Data Manual </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>

            <?php $form = ActiveForm::begin(['id'=>'SettingManual','action'=>'javascript::void(0)','options'=>['class'=>'form form-input-manual','role'=>'form']]); ?>

            <div class="form-group">
                <div class="col-sm-4">
                    <label class="control-label">Nomor Rekam Medis</label>
                </div>
                <div class="col-sm-8">
                    <?= $form->field($model,'no_pasien')->label(false)->textInput(['id'=>'DataNoPasien' ,'class'=>'form-control', 'readonly'=>true]) ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-4">
                    <label class="control-label">Nomor Registrasi</label>
                </div>
                <div class="col-sm-8">
                    <?= $form->field($model,'no_registrasi')->label(false)->textInput(['id'=>'DataNoRegistrasi' ,'class'=>'form-control', 'readonly'=>true]) ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-4">
                    <label class="control-label">Nama Pasien </label>
                </div>
                <div class="col-sm-8">
                    <input  class="form-control" type="text" value="<?= $namapasien?>" readonly>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-4">
                    <label class="control-label">Nama Item </label>
                </div>
                <div class="col-sm-8">
                    <?=
                    $form->field($model, 'id_item_setting')->label(false)->widget(\kartik\select2\Select2::classname(), [
                        'options'=>['id'=>'DataItemLabs'],
                        'data' => ArrayHelper::map(\app\models\ItemSetting::getListItem(),'id_item_setting','nama_item_setting'),
                        'pluginOptions'=>[
                            'placeholder'=>'Pilih Item....',
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-4">
                    <label class="control-label">Kondisi</label>
                </div>
                <div class="col-sm-8">
                    <?= $form->field($model,'kondisi')->label(false)->textInput(['id'=>'DataKondisi' ,'class'=>'form-control']) ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-4">
                    <label class="control-label">Nilai Manual</label>
                </div>
                <div class="col-sm-8">
                    <?= $form->field($model,'nilai_manual')->label(false)->textInput(['id'=>'DataNilaiManual' ,'class'=>'form-control']) ?>
                </div>
            </div>

            <div class="modal-footer">
                <div class="row" align="right">
                    <button type="button" class="btn btn-success btn-save"><i class="fa fa-save"></i> SIMPAN </button>
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
            var Data = $('#SettingManual').serialize();
            btn.html('<i class=\'fa fa-refresh fa-spin fa-fw\'></i> Menyimpan ...').attr('disabled',true);
             $.ajax({
                url:'".Url::to(['save-input'])."',
                type:'post',
                data: Data,
                dataType:'json',
                success:function(result){
                    if(result.status=='true'){
                        toastr.success(result.msg);
                        $('#mymodal').modal('hide');
                    }else{
                        toastr['warning'](result.msg);
                    }
                    btn.html('<i class=\'md md-save\'></i> Tersimpan').removeAttr('disabled');
                }
		    });
        });
        
");


