<?php
use yii\widgets\ActiveForm;

?>
<div class="col-12">
    <div class="row">
        <button type="button" class="btn ink-reaction btn-success"
        data-toggle="tooltip" onclick="FormInput()" data-placement="bottom" data-original-title="Form Input Data" style="cursor: pointer">
        <i class="fa fa-plus-square"></i> Input / Update Data 
        </button>
        <button id="IdRefreshData" type="button" class="btn ink-reaction btn-info"
        data-toggle="tooltip" onclick="RefreshData()" data-placement="bottom" data-original-title="Refresh Data" style="cursor: pointer">
        <i class="fa fa-refresh"></i> Refresh
        </button>
    </div>
    <div class="table-rep-plugin">
        <div class="table-responsive" data-pattern="priority-columns">
            <table id="tech-companies-1" class="table  table-striped">
                <thead>
                    <tr>
                        <th width="35%"> Biodata </th>
                        <th width="65%">Hasil Pemeriksaan</th>
                    </tr>
                </thead>
                <tbody id="TabelHasilRad">
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
function FormInput() {

    var NoPasien = $('#DataNoPasien').val();
    var NoRegistrasi = $('#DataNoRegistrasi').val();
    var IdLayanan = $('#DataIdLayanan').val();
    var NamaPasien = $('#DataNamaPasien').val();

    if (typeof NoRegistrasi != 'undefined' && NoRegistrasi != '') {
        $.ajax({
            url: '<?= Yii::$app->urlManager->createUrl('radiologi/form-input') ?>',
            data: {NoPasien: NoPasien, NoRegistrasi: NoRegistrasi, IdLayanan : IdLayanan, NamaPasien: NamaPasien},
            // dataType: 'json',
            type: 'POST',
            success: function (output) {

                $('#mymodal').html(output);
                $('#mymodal').modal({backdrop: 'static', keyboard: false});

            }
        });

    } else {
        toastr.warning('Silahkan pilih pasien terlebih dahulu');
    }
}

function RefreshData() {

    var NoPasien = $('#DataNoPasien').val();
    var NoRegistrasi = $('#DataNoRegistrasi').val();
    var IdLayanan = $('#DataIdLayanan').val();

    if (typeof NoRegistrasi != 'undefined' && NoRegistrasi != '') {
        $.ajax({
            url: '<?= Yii::$app->urlManager->createUrl('radiologi/refresh-data') ?>',
            data: {NoPasien: NoPasien, NoRegistrasi: NoRegistrasi, IdLayanan: IdLayanan},
            dataType: 'json',
            type: 'POST',
            success: function (output) {

                if (output.code == "200") {

                    $('#TabelHasilRad').html(output.datahasil);
                    toastr.success(output.msg);

                } else {
                    toastr.warning(output.msg);
                }
            }
        });
    } else {
        toastr.warning('Silahkan pilih pasien terlebih dahulu');
    }


}
</script>
<!-- end row -->


<!-- BEGIN MY MODAL -->

<div class="modal fade bs-example-modal-lg" id="mymodal" tabindex="-1" data-keyboard='false' role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;"></div>

<!-- END MY MODAL -->

