/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-05 20:45:35 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2020-10-07 14:11:33
 */


$(document).ready(function () {

    $("#form-spesialis-gigi").on('submit', function (e) {
        e.preventDefault()
        e.stopImmediatePropagation()
        var kepalaform = $("#form-spesialis-gigi").serialize()
        // $.post(baseUrl + 'spesialis-gigi/periksa?no_rm=' + $('#mcuspesialisgigi-no_rekam_medik').val(), kepalaform, function (r) {
        $.post(baseUrl + 'spesialis-gigi/periksa?id=' + $('#mcuspesialisgigi-cari_pasien').val(), kepalaform, function (r) {
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

    $("#form-spesialis-gigi-penata").on('submit', function (e) {
        e.preventDefault()
        e.stopImmediatePropagation()
        var kepalaform = $("#form-spesialis-gigi-penata").serialize()
        $.post(baseUrl + 'spesialis-gigi/simpan-penata?id=' + $('#mcuspesialisgigi-id_spesialis_gigi').val(), kepalaform, function (r) {
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

    $("#mcuspesialisgigi-g18, #mcuspesialisgigi-g38, #mcuspesialisgigi-g17, #mcuspesialisgigi-g37, #mcuspesialisgigi-g16, #mcuspesialisgigi-g36, #mcuspesialisgigi-g15, #mcuspesialisgigi-g35, #mcuspesialisgigi-g14, #mcuspesialisgigi-g34, #mcuspesialisgigi-g13, #mcuspesialisgigi-g33, #mcuspesialisgigi-g12, #mcuspesialisgigi-g32, #mcuspesialisgigi-g11, #mcuspesialisgigi-g31, #mcuspesialisgigi-g21, #mcuspesialisgigi-g41, #mcuspesialisgigi-g22, #mcuspesialisgigi-g42, #mcuspesialisgigi-g23, #mcuspesialisgigi-g43, #mcuspesialisgigi-g24, #mcuspesialisgigi-g44, #mcuspesialisgigi-g25, #mcuspesialisgigi-g45, #mcuspesialisgigi-g26, #mcuspesialisgigi-g46, #mcuspesialisgigi-g27, #mcuspesialisgigi-g47, #mcuspesialisgigi-g28, #mcuspesialisgigi-g48").on("click", function () {
        $(this).select();
    });

})