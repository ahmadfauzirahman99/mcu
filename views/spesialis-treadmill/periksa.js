/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-05 20:45:35 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2020-11-13 17:42:52
 */


$(document).ready(function () {

    $('#McuSpesialisTreadmill_respon_iskemik_2_teks').on('input change focus', function (e) {
        let teks = $('#McuSpesialisTreadmill_respon_iskemik_2_teks').val()
        $('#McuSpesialisTreadmill_respon_iskemik_2').val(teks)
        $('#McuSpesialisTreadmill_respon_iskemik_2').prop('checked', true)
        // console.log(teks);
    });
    $('#McuSpesialisTreadmill_anjuran_3_teks').on('input change focus', function (e) {
        let teks = $('#McuSpesialisTreadmill_anjuran_3_teks').val()
        $('#McuSpesialisTreadmill_anjuran_3').val(teks)
        $('#McuSpesialisTreadmill_anjuran_3').prop('checked', true)
    });

    $('#mcuspesialistreadmill-kesan').on('change', function (e) {
        let kesan = $('#McuSpesialisTreadmill_kesan_0').prop('checked')
        console.log(kesan);
        if (kesan)
            $('.div-penata').hide('slow')
        else {
            $('.div-penata').show('slow')
            $("#form-spesialis-treadmill").submit()
        }
    });

    $("#form-spesialis-treadmill").on('submit', function (e) {
        e.preventDefault()
        e.stopImmediatePropagation()
        var kepalaform = $("#form-spesialis-treadmill").serialize()
        // $.post(baseUrl + 'spesialis-treadmill/periksa?no_rm=' + $('#mcuspesialistreadmill-no_rekam_medik').val(), kepalaform, function (r) {
        $.post(baseUrl + 'spesialis-treadmill/periksa?id=' + $('#mcuspesialistreadmill-cari_pasien').val(), kepalaform, function (r) {
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

    $("#form-spesialis-treadmill-penata").on('submit', function (e) {
        e.preventDefault()
        e.stopImmediatePropagation()
        var kepalaform = $("#form-spesialis-treadmill-penata").serialize()
        $.post(baseUrl + 'spesialis-treadmill/simpan-penata?id=' + $('#mcuspesialistreadmill-id_spesialis_treadmill').val(), kepalaform, function (r) {
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