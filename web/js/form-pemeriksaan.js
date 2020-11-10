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


})

