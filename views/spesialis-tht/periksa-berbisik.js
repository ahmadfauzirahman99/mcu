/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-05 20:45:35 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2020-10-06 17:31:40
 */


$(document).ready(function () {

    $("#form-spesialis-tht-berbisik").on('submit', function (e) {
        e.preventDefault()
        e.stopImmediatePropagation()
        var kepalaform = $("#form-spesialis-tht-berbisik").serialize()
        $.post(baseUrl + 'spesialis-tht/periksa-berbisik?no_rm=' + $('#mcuspesialisthtberbisik-no_rekam_medik').val(), kepalaform, function (r) {
            console.log(r)
            if (r.s) {
                toastr["success"]("Mantap, Sukses menyimpan boooyyyy...")
            } else {
                toastr["warning"]("Huuft, Gagal menyimpan boooyyyy...<br>" + JSON.stringify(r.e))
            }
        }, 'JSON')
        return false
    })

})