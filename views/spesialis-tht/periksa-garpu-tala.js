/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-05 20:45:35 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2020-10-07 17:47:20
 */


$(document).ready(function () {

    $("#form-spesialis-tht-garpu-tala").on('submit', function (e) {
        e.preventDefault()
        e.stopImmediatePropagation()
        var kepalaform = $("#form-spesialis-tht-garpu-tala").serialize()
        $.post(baseUrl + 'spesialis-tht/periksa-garpu-tala?id=' + $('#mcuspesialisthtgarputala-cari_pasien').val(), kepalaform, function (r) {
            console.log(r)
            if (r.s) {
                $.pjax.reload({container: '#btn-cetak', async: false})
                $.pjax.reload({container: '#btn-cetak-penata', async: false})
                toastr["success"]("Mantap, Sukses menyimpan boooyyyy...")
            } else {
                toastr["warning"]("Huuft, Gagal menyimpan boooyyyy...<br>" + JSON.stringify(r.e))
            }
        }, 'JSON')
        return false
    })

    $("#form-spesialis-tht-garpu-tala-penata").on('submit', function (e) {
        e.preventDefault()
        e.stopImmediatePropagation()
        var kepalaform = $("#form-spesialis-tht-garpu-tala-penata").serialize()
        $.post(baseUrl + 'spesialis-tht/simpan-penata-garpu-tala?id=' + $('#mcuspesialisthtgarputala-id_spesialis_tht_garpu_tala').val(), kepalaform, function (r) {
            console.log(r)
            if (r.s) {
                $.pjax.reload({container: '#btn-cetak-penata', async: false})
                $.pjax.reload({container: '#tbl-penata', async: false})
                toastr["success"]("Mantap, Sukses menyimpan boooyyyy...")
            } else {
                toastr["warning"]("Huuft, Gagal menyimpan boooyyyy...<br>" + JSON.stringify(r.e))
            }
        }, 'JSON')
        return false
    })

})