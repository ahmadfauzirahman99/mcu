/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-05 20:45:35 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2020-11-13 11:52:20
 */


$(document).ready(function () {

    $('#McuSpesialisEkg_irama_jantung_3_teks').on('input change focus', function (e) {
        let teks = $('#McuSpesialisEkg_irama_jantung_3_teks').val()
        $('#McuSpesialisEkg_irama_jantung_3').val(teks)
        $('#McuSpesialisEkg_irama_jantung_3').prop('checked', true)
        // console.log(teks);
    });
    $('#McuSpesialisEkg_gelombang_p_3_teks').on('input change focus', function (e) {
        let teks = $('#McuSpesialisEkg_gelombang_p_3_teks').val()
        $('#McuSpesialisEkg_gelombang_p_3').val(teks)
        $('#McuSpesialisEkg_gelombang_p_3').prop('checked', true)
    });
    $('#McuSpesialisEkg_kompleks_qrs_2_teks').on('input change focus', function (e) {
        let teks = $('#McuSpesialisEkg_kompleks_qrs_2_teks').val()
        $('#McuSpesialisEkg_kompleks_qrs_2').val(teks)
        $('#McuSpesialisEkg_kompleks_qrs_2').prop('checked', true)
    });
    $('#McuSpesialisEkg_segmen_st_2_teks').on('input change focus', function (e) {
        let teks = $('#McuSpesialisEkg_segmen_st_2_teks').val()
        $('#McuSpesialisEkg_segmen_st_2').val(teks)
        $('#McuSpesialisEkg_segmen_st_2').prop('checked', true)
    });
    $('#McuSpesialisEkg_gelombang_t_1_teks').on('input change focus', function (e) {
        let teks = $('#McuSpesialisEkg_gelombang_t_1_teks').val()
        $('#McuSpesialisEkg_gelombang_t_1').val(teks)
        $('#McuSpesialisEkg_gelombang_t_1').prop('checked', true)
    });

    $('#mcuspesialisekg-kesan').on('change', function (e) {
        let kesan = $('#McuSpesialisEkg_kesan_0').prop('checked')
        console.log(kesan);
        if (kesan)
            $('.div-penata').hide('slow')
        else {
            $('.div-penata').show('slow')
            $("#form-spesialis-ekg").submit()
        }
    });

    $("#form-spesialis-ekg").on('submit', function (e) {
        e.preventDefault()
        e.stopImmediatePropagation()
        var kepalaform = $("#form-spesialis-ekg").serialize()
        // $.post(baseUrl + 'spesialis-ekg/periksa?no_rm=' + $('#mcuspesialisekg-no_rekam_medik').val(), kepalaform, function (r) {
        $.post(baseUrl + 'spesialis-ekg/periksa?id=' + $('#mcuspesialisekg-cari_pasien').val(), kepalaform, function (r) {
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

    $("#form-spesialis-ekg-penata").on('submit', function (e) {
        e.preventDefault()
        e.stopImmediatePropagation()
        var kepalaform = $("#form-spesialis-ekg-penata").serialize()
        $.post(baseUrl + 'spesialis-ekg/simpan-penata?id=' + $('#mcuspesialisekg-id_spesialis_ekg').val(), kepalaform, function (r) {
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

})