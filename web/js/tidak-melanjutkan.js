function tidakMelanjutkanPemeriksaan(e, d) {
    // alert(e)

    swal({
        title: 'Apakah Anda Yakin?',
        text: "Merubah Data Ini Menjadi Tidak Melanjutkan Pemeriksaan",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Yakin',
        cancelButtonText: 'No, cancel!',
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger m-l-10',
        buttonsStyling: false
    }).then(function () {
        var data = {
            dt: $(e).data("value"),
            ty: d
        };
        $.post(baseUrl + "site/ubah-semua-pemeriksaan", data, function (r) {
            console.log(r);

            if (r.con) {
                toastr["success"]("Mantap, Sukses menyimpan boooyyyy...")
            } else {
                toastr["warning"]("Huuft, Gagal menyimpan boooyyyy...<br>" + JSON.stringify(r.e))
            }
        }, 'JSON')
    }, function (dismiss) {
        // dismiss can be 'cancel', 'overlay',
        // 'close', and 'timer'
        if (dismiss === 'cancel') {
            swal(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
            )
        }
    })
}