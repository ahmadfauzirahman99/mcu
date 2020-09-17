<div class="setting-lab-form">
    <div class="row">
        <button type="button" class="btn ink-reaction btn-success"
        data-toggle="tooltip" onclick="FormInputManual()" data-placement="bottom" data-original-title="Input Data Hasil Lab. Manual" style="cursor: pointer">
        <i class="fa fa-plus-square"></i> Input Data Manual
        </button>
        <button type="button" class="btn ink-reaction btn-info"
        data-toggle="tooltip" onclick="RefreshManual()" data-placement="bottom" data-original-title="Refresh Data Manual" style="cursor: pointer">
        <i class="fa fa-refresh"></i> Refresh
        </button>
    </div>
    <div class="table-rep-plugin">
        <div class="table-responsive" data-pattern="priority-columns">
            <table id="tech-companies-1" class="table  table-striped">
                <thead>
                    <tr>
                        <th width="35%">Nama Pemeriksaan</th>
                        <th width="15%" data-priority="1">Kondisi</th>
                        <th width="15%" data-priority="2">Nilai Manual</th>
                        <th width="25%" data-priority="3">Status</th>
                        <th width="10%" data-priority="4">Aksi</th>
                    </tr>
                </thead>
                <tbody id="TabelSettingManual">
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
function FormInputManual() {

    var NoPasien = $('#DataNoPasien').val();
    var NoRegistrasi = $('#DataNoRegistrasi').val();
    var NamaPasien = $('#DataNamaPasien').val();

    if (typeof NoRegistrasi != 'undefined' && NoRegistrasi != '') {
        $.ajax({
            url: '<?= Yii::$app->urlManager->createUrl('setting-manual-lab/form-input') ?>',
            data: {NoPasien: NoPasien, NoRegistrasi: NoRegistrasi, NamaPasien: NamaPasien},
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

function RefreshManual() {

    var NoPasien = $('#DataNoPasien').val();
    var NoRegistrasi = $('#DataNoRegistrasi').val();

    if (typeof NoRegistrasi != 'undefined' && NoRegistrasi != '') {
        $.ajax({
            url: '<?= Yii::$app->urlManager->createUrl('setting-manual-lab/refresh-manual') ?>',
            data: {NoPasien: NoPasien, NoRegistrasi: NoRegistrasi},
            dataType: 'json',
            type: 'POST',
            success: function (output) {

                if (output.code == "200") {

                    $('#TabelSettingManual').html(output.datamanual);
                    toastr.success(output.msg);
                    $('#mymodal').modal('hide');

                } else {
                    toastr.warning(output.msg);
                    $('#mymodal').modal('hide');

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

<div class="modal fade" id="mymodal" tabindex="false" data-keyboard='false' role="dialog"
     aria-labelledby="myModalLabel"></div>

<!-- END MY MODAL -->