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
    $('.body-part').css({
        stroke: "green",
        strokeWidth: "4"
    });
    $('#bagian-spesial, #bagian-b-spesial').css({
        stroke: "green",
        strokeWidth: "1",
        fill: "green"
    });
    //tes mengubah warna bagian tubuh
    $('#bagian-b-' + '5, #bagian-b-' + '4, #bagian-b-' + '3').on("click", function () {
        $(this).css({
            fill: "yellow"
        });
        // alert("mardi")
    });
})