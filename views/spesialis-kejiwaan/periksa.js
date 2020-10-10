/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-05 20:45:35 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2020-10-07 15:10:36
 */


$(document).ready(function () {

    $('#spesialiskejiwaan-status').on('change', function (e) {
        let kesimpulan = $('#SpesialisKejiwaan_status_0').prop('checked')
        console.log(kesimpulan);
        if (kesimpulan)
            $('.div-penata').hide('slow')
        else
            $('.div-penata').show('slow')
    });

    $("#form-spesialis-kejiwaan").on('submit', function (e) {
        e.preventDefault()
        e.stopImmediatePropagation()
        var kepalaform = $("#form-spesialis-kejiwaan").serialize()
        $.post(baseUrl + 'spesialis-kejiwaan/periksa?id=' + $('#spesialiskejiwaan-cari_pasien').val(), kepalaform, function (r) {
            console.log(r)
            if (r.s) {
                $.pjax.reload({container: '#btn-cetak', async: false})
                toastr["success"]("Mantap, Sukses menyimpan boooyyyy...")
            } else {
                toastr["warning"]("Huuft, Gagal menyimpan boooyyyy...<br>" + JSON.stringify(r.e))
            }
        }, 'JSON')
        return false
    })

    $("#form-spesialis-kejiwaan-penata").on('submit', function (e) {
        e.preventDefault()
        e.stopImmediatePropagation()
        var kepalaform = $("#form-spesialis-kejiwaan-penata").serialize()
        $.post(baseUrl + 'spesialis-kejiwaan/simpan-penata?id=' + $('#spesialiskejiwaan-id_spesialis_kejiwaan').val(), kepalaform, function (r) {
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