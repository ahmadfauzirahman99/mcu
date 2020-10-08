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


        //imt variabel
        if (imt < 17.0) {
            // Kekurangan Berat Badan Tingkat Berat
            $(`#i1`).prop('checked', true);
        } else if (imt > 18.0 && imt < 18.5) {
            // Kekurangan Berat Badan Tingkat Ringan
            $(`#i2`).prop('checked', true);
        } else if (imt > 18.5 && imt < 25.0) {
            // Normal
            $(`#i0`).prop('checked', true);
        } else if (imt > 25.1 && imt < 27.0) {
            // Kelebihan Berat Badan Tingkat Ringan
            $(`#i3`).prop('checked', true);
        } else if (imt > 27.0) {
            // Kelebihan Berat Badan Tingkat Berat
            $(`#i4`).prop('checked', true);
        }

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