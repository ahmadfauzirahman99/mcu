/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-05 20:45:35 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2020-11-14 11:32:31
 */


$(document).ready(function () {

    $('#McuSpesialisPsikologi_irama_jantung_3_teks').on('input change focus', function (e) {
        let teks = $('#McuSpesialisPsikologi_irama_jantung_3_teks').val()
        $('#McuSpesialisPsikologi_irama_jantung_3').val(teks)
        $('#McuSpesialisPsikologi_irama_jantung_3').prop('checked', true)
        // console.log(teks);
    });

    $('#mcuspesialispsikologi-kesan').on('change', function (e) {
        let kesan = $('#McuSpesialisPsikologi_kesan_0').prop('checked')
        console.log(kesan);
        if (kesan)
            $('.div-penata').hide('slow')
        else {
            $('.div-penata').show('slow')
            $("#form-spesialis-psikologi").submit()
        }
    });

    $("#form-spesialis-psikologi").on('submit', function (e) {
        e.preventDefault()
        e.stopImmediatePropagation()
        var kepalaform = $("#form-spesialis-psikologi").serialize()
        // $.post(baseUrl + 'spesialis-psikologi-rsud/periksa?no_rm=' + $('#mcuspesialispsikologi-no_rekam_medik').val(), kepalaform, function (r) {
        $.post(baseUrl + 'spesialis-psikologi-rsud/periksa?id=' + $('#mcuspesialispsikologi-cari_pasien').val(), kepalaform, function (r) {
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

    $("#form-spesialis-psikologi-penata").on('submit', function (e) {
        e.preventDefault()
        e.stopImmediatePropagation()
        var kepalaform = $("#form-spesialis-psikologi-penata").serialize()
        $.post(baseUrl + 'spesialis-psikologi-rsud/simpan-penata?id=' + $('#mcuspesialispsikologi-id_spesialis_psikologi').val(), kepalaform, function (r) {
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