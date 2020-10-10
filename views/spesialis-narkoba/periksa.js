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

    $('#spesialisnarkoba-benzodiazepin_hasil').on('change', function (e) {
        let kesimpulan = $('#SpesialisNarkoba_benzodiazepin_hasil_1').prop('checked')
        console.log(kesimpulan);
        if (kesimpulan)
            $('.div-penata').hide('slow')
        else
            $('.div-penata').show('slow')
    });

    $('#spesialisnarkoba-thc_hasil').on('change', function (e) {
        let kesimpulan = $('#SpesialisNarkoba_thc_hasil_1').prop('checked')
        console.log(kesimpulan);
        if (kesimpulan)
            $('.div-penata').hide('slow')
        else
            $('.div-penata').show('slow')
    });

    $('#spesialisnarkoba-opiat_hasil').on('change', function (e) {
        let kesimpulan = $('#SpesialisNarkoba_opiat_hasil_1').prop('checked')
        console.log(kesimpulan);
        if (kesimpulan)
            $('.div-penata').hide('slow')
        else
            $('.div-penata').show('slow')
    });

    $('#spesialisnarkoba-amphetammin_hasil').on('change', function (e) {
        let kesimpulan = $('#SpesialisNarkoba_amphetammin_hasil_1').prop('checked')
        console.log(kesimpulan);
        if (kesimpulan)
            $('.div-penata').hide('slow')
        else
            $('.div-penata').show('slow')
    });
    
    $('#spesialisnarkoba-kokain_hasil').on('change', function (e) {
        let kesimpulan = $('#SpesialisNarkoba_kokain_hasil_1').prop('checked')
        console.log(kesimpulan);
        if (kesimpulan)
            $('.div-penata').hide('slow')
        else
            $('.div-penata').show('slow')
    });
    
    $('#spesialisnarkoba-methamphetamin_hasil').on('change', function (e) {
        let kesimpulan = $('#SpesialisNarkoba_methamphetamin_hasil_1').prop('checked')
        console.log(kesimpulan);
        if (kesimpulan)
            $('.div-penata').hide('slow')
        else
            $('.div-penata').show('slow')
    });
    
    $('#spesialisnarkoba-carisoprodol_hasil').on('change', function (e) {
        let kesimpulan = $('#SpesialisNarkoba_carisoprodol_hasil_1').prop('checked')
        console.log(kesimpulan);
        if (kesimpulan)
            $('.div-penata').hide('slow')
        else
            $('.div-penata').show('slow')
    });
    
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

    $("#form-spesialis-narkoba-penata").on('submit', function (e) {
        e.preventDefault()
        e.stopImmediatePropagation()
        var kepalaform = $("#form-spesialis-narkoba-penata").serialize()
        $.post(baseUrl + 'spesialis-narkoba/simpan-penata?id=' + $('#spesialisnarkoba-id_spesialis_narkoba').val(), kepalaform, function (r) {
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