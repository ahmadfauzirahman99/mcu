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

    $("#form-spesialis-narkoba").on('submit', function (e) {
        e.preventDefault()
        e.stopImmediatePropagation()
        var kepalaform = $("#form-spesialis-narkoba").serialize()
        $.post(baseUrl + 'spesialis-narkoba/periksa?id=' + $('#spesialisnarkoba-cari_pasien').val(), kepalaform, function (r) {
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

})