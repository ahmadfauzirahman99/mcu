/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-05 20:45:35 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2020-10-10 12:44:17
 */


$(document).ready(function () {

    $('#mcuspesialisthtberbisik-kesan').on('change', function (e) {
        let kesan = $('#McuSpesialisThtBerbisik_kesan_0').prop('checked')
        console.log(kesan);
        if (kesan)
            $('.div-penata').hide('slow')
        else {
            $('.div-penata').show('slow')
            $("#form-spesialis-tht-berbisik").submit()
        }
    });

    $("#form-spesialis-tht-berbisik").on('submit', function (e) {
        e.preventDefault()
        e.stopImmediatePropagation()
        var kepalaform = $("#form-spesialis-tht-berbisik").serialize()
        $.post(baseUrl + 'spesialis-tht/periksa-berbisik?id=' + $('#mcuspesialisthtberbisik-cari_pasien').val(), kepalaform, function (r) {
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

    $("#form-spesialis-tht-berbisik-penata").on('submit', function (e) {
        e.preventDefault()
        e.stopImmediatePropagation()
        var kepalaform = $("#form-spesialis-tht-berbisik-penata").serialize()
        $.post(baseUrl + 'spesialis-tht/simpan-penata-berbisik?id=' + $('#mcuspesialisthtberbisik-id_spesialis_tht_berbisik').val(), kepalaform, function (r) {
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