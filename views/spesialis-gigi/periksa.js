/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-05 20:45:35 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2020-10-11 12:51:45
 */


$(document).ready(function () {

    $('#McuSpesialisGigi_oklusi_3_teks').on('input change focus', function (e) {
        let teks = $('#McuSpesialisGigi_oklusi_3_teks').val()
        $('#McuSpesialisGigi_oklusi_3').val(teks)
        $('#McuSpesialisGigi_oklusi_3').prop('checked', true)
        // console.log(teks);
    });
    $('#McuSpesialisGigi_torus_palatinus_5_teks').on('input change focus', function (e) {
        let teks = $('#McuSpesialisGigi_torus_palatinus_5_teks').val()
        $('#McuSpesialisGigi_torus_palatinus_5').val(teks)
        $('#McuSpesialisGigi_torus_palatinus_5').prop('checked', true)
    });
    $('#McuSpesialisGigi_torus_mandibularis_4_teks').on('input change focus', function (e) {
        let teks = $('#McuSpesialisGigi_torus_mandibularis_4_teks').val()
        $('#McuSpesialisGigi_torus_mandibularis_4').val(teks)
        $('#McuSpesialisGigi_torus_mandibularis_4').prop('checked', true)
    });
    $('#McuSpesialisGigi_palatum_3_teks').on('input change focus', function (e) {
        let teks = $('#McuSpesialisGigi_palatum_3_teks').val()
        $('#McuSpesialisGigi_palatum_3').val(teks)
        $('#McuSpesialisGigi_palatum_3').prop('checked', true)
    });
    $('#McuSpesialisGigi_supernumerary_teeth_2_teks').on('input change focus', function (e) {
        let teks = $('#McuSpesialisGigi_supernumerary_teeth_2_teks').val()
        $('#McuSpesialisGigi_supernumerary_teeth_2').val(teks)
        $('#McuSpesialisGigi_supernumerary_teeth_2').prop('checked', true)
    });
    $('#McuSpesialisGigi_diastema_2_teks').on('input change focus', function (e) {
        let teks = $('#McuSpesialisGigi_diastema_2_teks').val()
        $('#McuSpesialisGigi_diastema_2').val(teks)
        $('#McuSpesialisGigi_diastema_2').prop('checked', true)
    });
    $('#McuSpesialisGigi_spacing_2_teks').on('input change focus', function (e) {
        let teks = $('#McuSpesialisGigi_spacing_2_teks').val()
        $('#McuSpesialisGigi_spacing_2').val(teks)
        $('#McuSpesialisGigi_spacing_2').prop('checked', true)
    });
    $('#McuSpesialisGigi_oral_hygiene_3_teks').on('input change focus', function (e) {
        let teks = $('#McuSpesialisGigi_oral_hygiene_3_teks').val()
        $('#McuSpesialisGigi_oral_hygiene_3').val(teks)
        $('#McuSpesialisGigi_oral_hygiene_3').prop('checked', true)
    });
    $('#McuSpesialisGigi_gingiva_periodontal_3_teks').on('input change focus', function (e) {
        let teks = $('#McuSpesialisGigi_gingiva_periodontal_3_teks').val()
        $('#McuSpesialisGigi_gingiva_periodontal_3').val(teks)
        $('#McuSpesialisGigi_gingiva_periodontal_3').prop('checked', true)
    });
    $('#McuSpesialisGigi_oral_mucosa_2_teks').on('input change focus', function (e) {
        let teks = $('#McuSpesialisGigi_oral_mucosa_2_teks').val()
        $('#McuSpesialisGigi_oral_mucosa_2').val(teks)
        $('#McuSpesialisGigi_oral_mucosa_2').prop('checked', true)
    });
    $('#McuSpesialisGigi_tongue_2_teks').on('input change focus', function (e) {
        let teks = $('#McuSpesialisGigi_tongue_2_teks').val()
        $('#McuSpesialisGigi_tongue_2').val(teks)
        $('#McuSpesialisGigi_tongue_2').prop('checked', true)
    });

    $('#mcuspesialisgigi-kesan').on('change', function (e) {
        let kesan = $('#McuSpesialisGigi_kesan_0').prop('checked')
        console.log(kesan);
        if (kesan)
            $('.div-penata').hide('slow')
        else {
            $('.div-penata').show('slow')
            $("#form-spesialis-gigi").submit()
        }
    });

    $("#form-spesialis-gigi").on('submit', function (e) {
        e.preventDefault()
        e.stopImmediatePropagation()
        var kepalaform = $("#form-spesialis-gigi").serialize()
        // $.post(baseUrl + 'spesialis-gigi/periksa?no_rm=' + $('#mcuspesialisgigi-no_rekam_medik').val(), kepalaform, function (r) {
        $.post(baseUrl + 'spesialis-gigi/periksa?id=' + $('#mcuspesialisgigi-cari_pasien').val(), kepalaform, function (r) {
            console.log(r)
            if (r.s) {
                $.pjax.reload({
                    container: '#btn-cetak',
                    async: false
                })
                $.pjax.reload({
                    container: '#btn-cetak-penata',
                    async: false
                })
                toastr["success"]("Mantap, Sukses menyimpan boooyyyy...")
            } else {
                toastr["warning"]("Huuft, Gagal menyimpan boooyyyy...<br>" + JSON.stringify(r.e))
            }
        }, 'JSON')
        return false
    })

    $("#form-spesialis-gigi-penata").on('submit', function (e) {
        e.preventDefault()
        e.stopImmediatePropagation()
        var kepalaform = $("#form-spesialis-gigi-penata").serialize()
        $.post(baseUrl + 'spesialis-gigi/simpan-penata?id=' + $('#mcuspesialisgigi-id_spesialis_gigi').val(), kepalaform, function (r) {
            console.log(r)
            if (r.s) {
                $.pjax.reload({
                    container: '#btn-cetak-penata',
                    async: false
                })
                $.pjax.reload({
                    container: '#tbl-penata',
                    async: false
                })
                toastr["success"]("Mantap, Sukses menyimpan boooyyyy...")
            } else {
                toastr["warning"]("Huuft, Gagal menyimpan boooyyyy...<br>" + JSON.stringify(r.e))
            }
        }, 'JSON')
        return false
    })

    $("#mcuspesialisgigi-g18, #mcuspesialisgigi-g38, #mcuspesialisgigi-g17, #mcuspesialisgigi-g37, #mcuspesialisgigi-g16, #mcuspesialisgigi-g36, #mcuspesialisgigi-g15, #mcuspesialisgigi-g35, #mcuspesialisgigi-g14, #mcuspesialisgigi-g34, #mcuspesialisgigi-g13, #mcuspesialisgigi-g33, #mcuspesialisgigi-g12, #mcuspesialisgigi-g32, #mcuspesialisgigi-g11, #mcuspesialisgigi-g31, #mcuspesialisgigi-g21, #mcuspesialisgigi-g41, #mcuspesialisgigi-g22, #mcuspesialisgigi-g42, #mcuspesialisgigi-g23, #mcuspesialisgigi-g43, #mcuspesialisgigi-g24, #mcuspesialisgigi-g44, #mcuspesialisgigi-g25, #mcuspesialisgigi-g45, #mcuspesialisgigi-g26, #mcuspesialisgigi-g46, #mcuspesialisgigi-g27, #mcuspesialisgigi-g47, #mcuspesialisgigi-g28, #mcuspesialisgigi-g48").on("click", function () {
        $(this).select();
    });

})