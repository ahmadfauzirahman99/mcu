<div class="data-manual-form">
    <div class="row">
        <button type="button" class="btn ink-reaction btn-info"
        data-toggle="tooltip" onclick="RefreshDataManual()" data-placement="bottom" data-original-title="Refresh Data Manual" style="cursor: pointer">
        <i class="fa fa-refresh"></i> Refresh
        </button>
    </div>
    <div class="table-rep-plugin">
        <div class="table-responsive" data-pattern="priority-columns">
            <table id="tech-companies-1" class="table  table-striped">
                <thead>
                    <tr>
                        <th width="15%">Nomor Rekam Medis</th>
                        <th width="15%">Nomor Registrasi</th>
                        <th width="15%">Nama Pasien</th>
                        <th width="20%">Kategori Pemeriksaan</th>
                        <th width="20%">Nama Pemeriksaan</th>
                        <th width="5%" data-priority="1">Kondisi</th>
                        <th width="5%" data-priority="2">Nilai Manual</th>
                        <th width="5%" data-priority="3">Status</th>
                        <th width="5%" data-priority="4">Aksi</th>
                    </tr>
                </thead>
                <tbody id="TabelDataManual">
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>

function RefreshDataManual() {

    $.ajax({
            url: '<?= Yii::$app->urlManager->createUrl('setting-manual/refresh-data-manual') ?>',
            // data: {NoPasien: NoPasien, NoRegistrasi: NoRegistrasi},
            dataType: 'json',
            type: 'POST',
            success: function (output) {

                if (output.code == "200") {

                    $('#TabelDataManual').html(output.datamanual);
                    toastr.success(output.msg);

                } else {
                    toastr.warning(output.msg);
                }
            }
        });
}
</script>
<!-- end row -->
