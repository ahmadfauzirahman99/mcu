$(document).ready(function () {
    $('#btn-pemeriksaan-fisik').hide();

    setTimeout(function () {
        window.scrollTo(document.body, 0, 0);
    }, 1000);

    $.fn.isOnScreen = function () {
        var win = $(window);
        var viewport = {
            top: win.scrollTop(),
            left: win.scrollLeft()
        };
        viewport.right = viewport.left + win.width();
        viewport.bottom = viewport.top + win.height();
        var bounds = this.offset();
        bounds.right = bounds.left + this.outerWidth();
        bounds.bottom = bounds.top + this.outerHeight();
        return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
    };

    $(window).scroll(function () {
        if ($('#pemeriksaan-fisik-mulai').isOnScreen() == true || $('#MasterPemeriksaanFisik').isOnScreen() == true) {
            $('#btn-pemeriksaan-fisik').show();
        } else {
            $('#btn-pemeriksaan-fisik').hide();
        }
    });

    // document.getElementById("i217").disabled = true;
    // document.getElementById("masterpemeriksaanfisik-hydrocele").disabled = true;
    // document.getElementById("masterpemeriksaanfisik-varicocele").disabled = true;
    // document.getElementById("masterpemeriksaanfisik-ulceral").disabled = true;
    // document.getElementById("masterpemeriksaanfisik-gonorchoea").disabled = true;
    // document.getElementById("masterpemeriksaanfisik-genitalia_lainnya").disabled = true;
    // document.getElementById("masterpemeriksaanfisik-hemoroid_lainnya").disabled = true;

    $("#masterpemeriksaanfisik-genitourinaria_genitalia_eksternal").on('input change',function(e){

        var z = $("#masterpemeriksaanfisik-genitourinaria_genitalia_eksternal").val();
       if(z === 'Normal'){
    document.getElementById("masterpemeriksaanfisik-hydrocele").disabled = false;
    document.getElementById("masterpemeriksaanfisik-varicocele").disabled = false;
    document.getElementById("masterpemeriksaanfisik-ulceral").disabled = false;
    document.getElementById("masterpemeriksaanfisik-gonorchoea").disabled = false;
                     document.getElementById("masterpemeriksaanfisik-genitalia_lainnya").disabled = true;
       }else{
            document.getElementById("masterpemeriksaanfisik-hydrocele").disabled = false;
    document.getElementById("masterpemeriksaanfisik-varicocele").disabled = false;
    document.getElementById("masterpemeriksaanfisik-ulceral").disabled = false;
    document.getElementById("masterpemeriksaanfisik-gonorchoea").disabled = false;
            document.getElementById("i214").disabled = false;
            document.getElementById("masterpemeriksaanfisik-genitalia_lainnya").disabled = false;
       }
    })
    $("#masterpemeriksaanfisik-genitourinaria_anus").on('input change',function(e){
       

       var i = $("#masterpemeriksaanfisik-genitourinaria_anus").val();
       if(i === 'Normal'){
         document.getElementById("i217").disabled = true;
         document.getElementById("masterpemeriksaanfisik-hemoroid_lainnya").disabled = true;
       }else{
         document.getElementById("i217").disabled = false;
  
         document.getElementById("masterpemeriksaanfisik-hemoroid_lainnya").disabled = false;
       }
    });


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
            $(`#i20`).prop('checked', true);
        } else if (imt > 18.0 && imt < 18.5) {
            // Kekurangan Berat Badan Tingkat Ringan
            $(`#i21`).prop('checked', true);
        } else if (imt > 18.5 && imt < 25.0) {
            // Normal
            $(`#i19`).prop('checked', true);
        } else if (imt > 25.1 && imt < 27.0) {
            // Kelebihan Berat Badan Tingkat Ringan
            $(`#i22`).prop('checked', true);
        } else if (imt > 27.0) {
            // Kelebihan Berat Badan Tingkat Berat
            $(`#i23`).prop('checked', true);
        }
		
		 if (imt < 17.0) {
            // Kekurangan Berat Badan Tingkat Berat
            $(`#i13`).prop('checked', true);
        } else if (imt > 18.0 && imt < 18.5) {
            // Kekurangan Berat Badan Tingkat Ringan
            $(`#i14`).prop('checked', true);
        } else if (imt > 18.5 && imt < 25.0) {
            // Normal
            $(`#i12`).prop('checked', true);
        } else if (imt > 25.1 && imt < 27.0) {
            // Kelebihan Berat Badan Tingkat Ringan
            $(`#i15`).prop('checked', true);
        } else if (imt > 27.0) {
            // Kelebihan Berat Badan Tingkat Berat
            $(`#i16`).prop('checked', true);
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


    //save-anamnesis
    $("#Anamnesis").on('submit', function (e) {
        var formData = new FormData(this);
        var formURL = $("#Anamnesis").attr("action");
        e.preventDefault();
        e.stopImmediatePropagation()

        console.log(formData);
        console.log(formURL);
        $.ajax({
            url: formURL,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (r) {
                console.log(r)
                if (r.s) {
                    toastr["success"]("Mantap, Sukses menyimpan boooyyyy...")
                } else {
                    toastr["warning"]("Huuft, Gagal menyimpan boooyyyy...<br>" + JSON.stringify(r.e))
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("gagal");
            }
        })
    })

    $("#id-hubungan-Anamnesis").on('submit', function (e) {
        var formData = new FormData(this);
        var formURL = $("#id-hubungan-Anamnesis").attr("action");
        e.preventDefault();
        e.stopImmediatePropagation()

        console.log(formData);
        console.log(formURL);
        $.ajax({
            url: formURL,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (r) {
                console.log(r)
                if (r.s) {
                    toastr["success"]("Mantap, Sukses menyimpan boooyyyy...")
                } else {
                    toastr["warning"]("Huuft, Gagal menyimpan boooyyyy...<br>" + JSON.stringify(r.e))
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("gagal");
            }
        })
    })


    //ANAMNESIS OKUPASI JENIS PEKERJAAN
    $("#id-JenisPekerjaan").on('submit', function (e) {
        var formData = new FormData(this);
        var formURL = $("#id-JenisPekerjaan").attr("action");
        e.preventDefault()
        e.stopImmediatePropagation()

        $.ajax({
            url: formURL,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (r) {

                console.log(r)
                if (r.s) {
                    $.pjax.reload({
                        container: '#id-pjax-jenis-pekerjaan',
                        timeout: false
                    })
                    $("#id-JenisPekerjaan")[0].reset();

                    toastr["success"]("Mantap, Sukses menyimpan boooyyyy...")

                } else {
                    // $.pjax.reload({
                    //     container: '#btn-save-jenis-pekerjaan',
                    //     async: false,
                    //     timeout: false

                    // })
                    $.pjax.reload({
                        container: '#id-pjax-jenis-pekerjaan',
                        timeout: false
                    })

                    toastr["warning"]("Huuft, Gagal menyimpan boooyyyy...<br>" + JSON.stringify(r.e))

                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("gagal");
            }
        })

        return false;
    });

    //ANAMNESIS OKUPASI BAHAYA POTENSIAL
    $("#id-BahayaPotensial").on('submit', function (e) {
        var formData = new FormData(this);
        var formURL = $("#id-BahayaPotensial").attr("action");
        e.preventDefault()
        e.stopImmediatePropagation()

        $.ajax({
            url: formURL,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (r) {

                console.log(r)
                if (r.s) {
                    $.pjax.reload({
                        container: '#id-pjax-bahaya-potensial',
                        timeout: false
                    })
                    $("#id-BahayaPotensial")[0].reset();

                    toastr["success"]("Mantap, Sukses menyimpan boooyyyy...")

                } else {
                    // $.pjax.reload({
                    //     container: '#btn-save-jenis-pekerjaan',
                    //     async: false,
                    //     timeout: false

                    // })
                    $("#id-BahayaPotensial")[0].reset();

                    $.pjax.reload({
                        container: '#id-pjax-bahaya-potensial',
                        timeout: false
                    })

                    toastr["warning"]("Huuft, Gagal menyimpan boooyyyy...<br>" + JSON.stringify(r.e))

                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("gagal");
            }
        })

        return false;
    });

    //ANAMENSI OKUPASI BRIEF SURVEY
    $("#id_form_brief").on('submit', function (e) {
        var formData = new FormData(this);
        var formURL = $("#id_form_brief").attr("action");
        e.preventDefault()
        e.stopImmediatePropagation()

        $.ajax({
            url: formURL,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (r) {

                console.log(r)
                if (r.s) {
                    toastr["success"]("Mantap, Sukses menyimpan boooyyyy...")

                } else {
                    toastr["warning"]("Huuft, Gagal menyimpan boooyyyy...<br>" + JSON.stringify(r.e))

                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("gagal");
            }
        })

        return false;
    });

    $("#MasterPemeriksaanFisik").on('submit', function (e) {
        var formData = new FormData(this);
        var formURL = $("#MasterPemeriksaanFisik").attr("action");
        e.preventDefault()
        e.stopImmediatePropagation()

        $.ajax({
            url: formURL,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (r) {

                console.log(r)
                if (r.s) {
                    toastr["success"]("Mantap, Sukses menyimpan boooyyyy...")

                } else {
                    toastr["warning"]("Huuft, Gagal menyimpan boooyyyy...<br>" + JSON.stringify(r.e))

                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("gagal");
            }
        })

        return false;
    });


    // anamnesis khusu bengkalis
    $("#id-AnamnesaBengkalis").on('submit', function (e) {
        var formData = new FormData(this);
        var formURL = $("#id-AnamnesaBengkalis").attr("action");
        e.preventDefault()
        e.stopImmediatePropagation()

        $.ajax({
            url: formURL,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (r) {

                console.log(r)
                if (r.s) {
                    toastr["success"]("Mantap, Sukses menyimpan boooyyyy...")

                } else {
                    toastr["warning"]("Huuft, Gagal menyimpan boooyyyy...<br>" + JSON.stringify(r.e))

                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("gagal");
            }
        })

        return false;
    });

    $("#id-PemeriksaanDokterBengkalis").on('submit', function (e) {
        var formData = new FormData(this);
        var formURL = $("#id-PemeriksaanDokterBengkalis").attr("action");
        e.preventDefault()
        e.stopImmediatePropagation()

        $.ajax({
            url: formURL,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (r) {

                console.log(r)
                if (r.s) {
                    toastr["success"]("Mantap, Sukses menyimpan boooyyyy...")

                } else {
                    toastr["warning"]("Huuft, Gagal menyimpan boooyyyy...<br>" + JSON.stringify(r.e))

                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("gagal");
            }
        })

        return false;
    });

    $("#McuPenatalaksanaanMcu").on('submit', function (e) {
        var formData = new FormData(this);
        var formURL = $("#McuPenatalaksanaanMcu").attr("action");
        e.preventDefault()
        e.stopImmediatePropagation()

        $.ajax({
            url: formURL,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (r) {

                console.log(r)
                if (r.s) {

                    toastr["success"]("Mantap, Sukses menyimpan boooyyyy...")
                    $("#McuPenatalaksanaanMcu")[0].reset();


                } else {
                    toastr["warning"]("Huuft, Gagal menyimpan boooyyyy...<br>" + JSON.stringify(r.e))

                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("gagal");
            }
        })

        return false;
    });

})

function hapus(e)
{
    console.log($(e).data("value"));
    $.post(baseUrl + "unit-pemeriksaan/delete-penata",{id:$(e).data("value")},function(r){
    if (r.s) {
        toastr["success"]("Mantap, Sukses menghapus boooyyyy... Reload Halaman")
    } else {
        toastr["warning"]("Huuft, Gagal menghapus boooyyyy...<br>" + JSON.stringify(r.e))
    }
    },'JSON')
    return false

}

