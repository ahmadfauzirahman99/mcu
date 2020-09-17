$(document).ready(function () {
    $(`#masterpemeriksaanfisik-status_gizi_tinggi_badan, #masterpemeriksaanfisik-status_gizi_berat_badan`).on('input change', function (e) {
        // alert("asdsadas")

        var tinggi = $(`#masterpemeriksaanfisik-status_gizi_tinggi_badan`).val();
        var berat = $(`#masterpemeriksaanfisik-status_gizi_berat_badan`).val();
        var tb = parseFloat(tinggi / 100);
        var bb = berat;
        console.log(tb)
        console.log(bb)
        var imt = bb / (tb * tb);
        console.log(imt)
        $(`#masterpemeriksaanfisik-status_gizi_imt`).val(imt);

    })

})