/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-05 20:45:35 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2020-09-17 12:07:47
 */


$(document).ready(function () {

    $("#form-spesialis-tht").on('submit', function (e) {
        e.preventDefault()
        e.stopImmediatePropagation()
        var kepalaform = $("#form-spesialis-tht").serialize()
        $.post(baseUrl + 'spesialis-tht/periksa?no_rm=' + $('#mcuspesialistht-no_rekam_medik').val(), kepalaform, function (r) {
            console.log(r)
            if (r.s) {
                toastr["success"]("Mantap, Sukses menyimpan boooyyyy...")
            } else {
                toastr["warning"]("Huuft, Gagal menyimpan boooyyyy...<br>" + JSON.stringify(r.e))
            }
        }, 'JSON')
        return false
    })

    // event lainnya di II. HIDUNG 
    $('#mcuspesialistht-hd_septum_nasi_lainnya').on('input change', function (e) {
        let hd_septum_nasi_lainnya = $('#mcuspesialistht-hd_septum_nasi_lainnya').val()
        if (hd_septum_nasi_lainnya == null || hd_septum_nasi_lainnya == "")
            $('#hd_septum_nasi').prop('checked', true)
        else
            $('#hd_septum_nasi_1').prop('checked', true)
    })
    $('#mcuspesialistht-hd_konka_nasal_lainnya').on('input change', function (e) {
        let hd_konka_nasal_lainnya = $('#mcuspesialistht-hd_konka_nasal_lainnya').val()
        if (hd_konka_nasal_lainnya == null || hd_konka_nasal_lainnya == "")
            $('#hd_konka_nasal').prop('checked', true)
        else
            $('#hd_konka_nasal_1').prop('checked', true)
    })
    $('#mcuspesialistht-hd_nyeri_ketok_sinus_maksilar_lainnya').on('input change', function (e) {
        let hd_nyeri_ketok_sinus_maksilar_lainnya = $('#mcuspesialistht-hd_nyeri_ketok_sinus_maksilar_lainnya').val()
        if (hd_nyeri_ketok_sinus_maksilar_lainnya == null || hd_nyeri_ketok_sinus_maksilar_lainnya == "")
            $('#hd_nyeri_ketok_sinus_maksilar').prop('checked', true)
        else
            $('#hd_nyeri_ketok_sinus_maksilar_1').prop('checked', true)
    })

})