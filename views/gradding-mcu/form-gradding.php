<?php

/**
 * Created by PhpStorm.
 * User: SalmanSyuhada
 * Date: 14-Oct-20
 * Time: 10:09 PM
 */

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use \kartik\select2\Select2;
use yii\helpers\ArrayHelper;

?>

<div class="modal-dialog modal-lg" role="document" style="margin-top: 0px;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myLargeModalLabel"> Form Gradding </h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        </div>

        <?php $form = ActiveForm::begin(['id' => 'GraddingMcu', 'action' => 'javascript::void(0)', 'options' => ['class' => 'form form-gradding', 'role' => 'form']]); ?>

        <div class="form-group">
            <div class="col-sm-4">
                <label class="control-label">Kode Debitur</label>
            </div>
            <div class="col-sm-8">
                <?= $form->field($model, 'kode_debitur')->label(false)->textInput(['id' => 'DataKodeDebitur', 'class' => 'form-control', 'readonly' => true]) ?>
            </div>
        </div>
        <button class="btn btn-primary waves-effect waves-light" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            <i class="fa  fa-cogs"></i> Settings
        </button>
        <div class="collapse" id="collapseExample">
            <div class="col-sm-12">
                <div class="well">
                    <?php
                    if ($setting != Null) {
                        $hasil_akhir = array();
                        $index = array();

                        foreach ($setting as $i => $d) {
                            $hasil_akhir[$d['id_kategori_setting'] . '_' . $d['nama_kategori']][] = $d;
                            $index[] = $d['id_kategori_setting'] . '_' . $d['nama_kategori'];
                        }
                        $index = array_unique($index);

                        foreach ($index as $idx) {
                            $name = explode("_", $idx);

                    ?>

                            <button class="btn btn-primary waves-effect waves-light" type="button" data-toggle="collapse" data-target="#Setting_<?= $name[0] ?>" aria-expanded="false"> <?= $name[1] ?>
                            </button>
                            <div class="collapse" id="Setting_<?= $name[0] ?>">
                                <div>
                                    <?php
                                    foreach ($hasil_akhir[$idx] as $data) {
                                        $cek = Null;
                                        if ($data['tampil'] == 1) {
                                            $cek = 'checked';
                                        }
                                    ?>
                                        <div class="custom-control custom-checkbox">
                                            <input id="<?= $data['id_global'] ?>" onclick="UpdateCheck(this.id)" value="<?= $data['tampil'] ?>" type="checkbox" <?= $cek ?>>
                                            <?= $data['nama_item_setting'] ?>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <div class="row" align="right">
                <button type="button" class="btn btn-success btn-save"><i class="fa fa-save"></i> Gradding </button>
                <button type="button" data-dismiss="modal" class="btn btn-danger right"> Batal </button>
            </div>
        </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>
<script>
    function UpdateCheck(id) {
        var checkedValue = $('#' + id).val();
        var id = id;

        $.ajax({
            url: '<?= Yii::$app->urlManager->createUrl('gradding-mcu/update-check') ?>',
            data: {
                checkedValue: checkedValue,
                id: id
            },
            dataType: 'json',
            type: 'POST',
            success: function(output) {

                if (output.code == "200") {

                    toastr.success(output.msg);

                } else {
                    toastr.warning(output.msg);
                }

            }
        });
    }
</script>


<?php
$this->registerJs(" 
 
     $('.btn-save').click(function(e){
            e.preventDefault();
            var btn=$('.btn-save');
            var Data = $('#GraddingMcu').serialize();
            btn.html('<i class=\'fa fa-refresh fa-spin fa-fw\'></i> Proses Gradding ...').attr('disabled',true);
             $.ajax({
                url:'" . Url::to(['process-gradding']) . "',
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
