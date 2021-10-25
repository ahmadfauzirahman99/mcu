/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-05 20:45:35 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2020-10-10 11:39:30
 */


$(document).ready(function () {

    $('#mcuspesialismata-kesan').on('change', function (e) {
        let kesan = $('#McuSpesialisMata_kesan_0').prop('checked')
        console.log(kesan);
        if (kesan)
            $('.div-penata').hide('slow')
        else {
            $('.div-penata').show('slow')
            $("#form-spesialis-mata").submit()
        }
    });

    $("#form-spesialis-mata").on('submit', function (e) {
        e.preventDefault()
        e.stopImmediatePropagation()
        var kepalaform = $("#form-spesialis-mata").serialize()
        $.post(baseUrl + 'spesialis-mata/periksa?id=' + $('#mcuspesialismata-cari_pasien').val(), kepalaform, function (r) {
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

    $("#form-spesialis-mata-penata").on('submit', function (e) {
        e.preventDefault()
        e.stopImmediatePropagation()
        var kepalaform = $("#form-spesialis-mata-penata").serialize()
        $.post(baseUrl + 'spesialis-mata/simpan-penata?id=' + $('#mcuspesialismata-id_spesialis_mata').val(), kepalaform, function (r) {
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