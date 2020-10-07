/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-05 20:45:35 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2020-10-07 16:46:51
 */

const rataBerubah = _ => {
    const ac_kanan_avg = parseFloat($('#mcuspesialisaudiometri-rata_kanan_ac').val())
    const ac_kiri_avg = parseFloat($('#mcuspesialisaudiometri-rata_kiri_ac').val())
    const bc_kanan_avg = parseFloat($('#mcuspesialisaudiometri-rata_kanan_bc').val())
    const bc_kiri_avg = parseFloat($('#mcuspesialisaudiometri-rata_kiri_bc').val())

    if (ac_kanan_avg >= 0 & ac_kanan_avg <= 25)
        $('#McuSpesialisAudiometri_kesimpulan_kanan_0').prop('checked', true)
    else
        $('#McuSpesialisAudiometri_kesimpulan_kanan_1').prop('checked', true)

    if (ac_kiri_avg >= 0 & ac_kiri_avg <= 25)
        $('#McuSpesialisAudiometri_kesimpulan_kiri_0').prop('checked', true)
    else
        $('#McuSpesialisAudiometri_kesimpulan_kiri_1').prop('checked', true)

    kesimpulanArray = {
        0: 'Tidak ada kesulitan mendengar, dapat mendengar bisikan',
        1: 'Bisa mendengar dan meniru kata-kata dengan suara normal pada jarak satu meter',
        2: 'Bisa mendengar suara keras pada jarak satu meter',
        3: 'Bisa mendengar suara yang diteriakkan dekat telinga',
        4: 'Tidak mendengar suara yang diteriakkan dekat telinga',
    }

    let kesimpulan = ''
    let kesimpulan_kanan, kesimpulan_kiri

    if (ac_kanan_avg >= 0 & ac_kanan_avg < 26)
        kesimpulan_kanan = 0
    else if (ac_kanan_avg >= 26 & ac_kanan_avg < 41)
        kesimpulan_kanan = 1
    else if (ac_kanan_avg >= 41 & ac_kanan_avg < 61)
        kesimpulan_kanan = 2
    else if (ac_kanan_avg >= 61 & ac_kanan_avg < 81)
        kesimpulan_kanan = 3
    else if (ac_kanan_avg >= 81)
        kesimpulan_kanan = 4

    if (ac_kiri_avg >= 0 & ac_kiri_avg < 26)
        kesimpulan_kiri = 0
    else if (ac_kiri_avg >= 26 & ac_kiri_avg < 41)
        kesimpulan_kiri = 1
    else if (ac_kiri_avg >= 41 & ac_kiri_avg < 61)
        kesimpulan_kiri = 2
    else if (ac_kiri_avg >= 61 & ac_kiri_avg < 81)
        kesimpulan_kiri = 3
    else if (ac_kiri_avg >= 81)
        kesimpulan_kiri = 4

    if (kesimpulan_kanan == kesimpulan_kiri)
        kesimpulan = 'Kanan & Kiri: ' + kesimpulanArray[kesimpulan_kanan]
    else
        kesimpulan += 'Kanan: ' + kesimpulanArray[kesimpulan_kanan] + '\nKiri: ' + kesimpulanArray[kesimpulan_kiri]

    $('#mcuspesialisaudiometri-kesimpulan').val(kesimpulan)
}

$(document).ready(function () {

    $("#form-spesialis-audiometri").on('submit', function (e) {
        e.preventDefault()
        e.stopImmediatePropagation()
        var kepalaform = $("#form-spesialis-audiometri").serialize()
        $.post(baseUrl + 'spesialis-audiometri/periksa?id=' + $('#mcuspesialisaudiometri-cari_pasien').val(), kepalaform, function (r) {
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

    $("#form-spesialis-audiometri-penata").on('submit', function (e) {
        e.preventDefault()
        e.stopImmediatePropagation()
        var kepalaform = $("#form-spesialis-audiometri-penata").serialize()
        $.post(baseUrl + 'spesialis-audiometri/simpan-penata?id=' + $('#mcuspesialisaudiometri-id_spesialis_audiometri').val(), kepalaform, function (r) {
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

    $('.tr-ac-bc input').on('input change', function (e) {
        let ac_kanan = {};
        let ac_kiri = {};
        let bc_kanan = {};
        let bc_kiri = {};
        let ac_125_kanan = parseFloat($('#mcuspesialisaudiometri-ac_125_kanan').val());
        let ac_250_kanan = parseFloat($('#mcuspesialisaudiometri-ac_250_kanan').val());
        let ac_500_kanan = parseFloat($('#mcuspesialisaudiometri-ac_500_kanan').val());
        let ac_1000_kanan = parseFloat($('#mcuspesialisaudiometri-ac_1000_kanan').val());
        let ac_2000_kanan = parseFloat($('#mcuspesialisaudiometri-ac_2000_kanan').val());
        let ac_3000_kanan = parseFloat($('#mcuspesialisaudiometri-ac_3000_kanan').val());
        let ac_4000_kanan = parseFloat($('#mcuspesialisaudiometri-ac_4000_kanan').val());
        let ac_6000_kanan = parseFloat($('#mcuspesialisaudiometri-ac_6000_kanan').val());
        let ac_8000_kanan = parseFloat($('#mcuspesialisaudiometri-ac_8000_kanan').val());
        let ac_125_kiri = parseFloat($('#mcuspesialisaudiometri-ac_125_kiri').val());
        let ac_250_kiri = parseFloat($('#mcuspesialisaudiometri-ac_250_kiri').val());
        let ac_500_kiri = parseFloat($('#mcuspesialisaudiometri-ac_500_kiri').val());
        let ac_1000_kiri = parseFloat($('#mcuspesialisaudiometri-ac_1000_kiri').val());
        let ac_2000_kiri = parseFloat($('#mcuspesialisaudiometri-ac_2000_kiri').val());
        let ac_3000_kiri = parseFloat($('#mcuspesialisaudiometri-ac_3000_kiri').val());
        let ac_4000_kiri = parseFloat($('#mcuspesialisaudiometri-ac_4000_kiri').val());
        let ac_6000_kiri = parseFloat($('#mcuspesialisaudiometri-ac_6000_kiri').val());
        let ac_8000_kiri = parseFloat($('#mcuspesialisaudiometri-ac_8000_kiri').val());
        let bc_125_kanan = parseFloat($('#mcuspesialisaudiometri-bc_125_kanan').val());
        let bc_250_kanan = parseFloat($('#mcuspesialisaudiometri-bc_250_kanan').val());
        let bc_500_kanan = parseFloat($('#mcuspesialisaudiometri-bc_500_kanan').val());
        let bc_1000_kanan = parseFloat($('#mcuspesialisaudiometri-bc_1000_kanan').val());
        let bc_2000_kanan = parseFloat($('#mcuspesialisaudiometri-bc_2000_kanan').val());
        let bc_3000_kanan = parseFloat($('#mcuspesialisaudiometri-bc_3000_kanan').val());
        let bc_4000_kanan = parseFloat($('#mcuspesialisaudiometri-bc_4000_kanan').val());
        let bc_6000_kanan = parseFloat($('#mcuspesialisaudiometri-bc_6000_kanan').val());
        let bc_8000_kanan = parseFloat($('#mcuspesialisaudiometri-bc_8000_kanan').val());
        let bc_125_kiri = parseFloat($('#mcuspesialisaudiometri-bc_125_kiri').val());
        let bc_250_kiri = parseFloat($('#mcuspesialisaudiometri-bc_250_kiri').val());
        let bc_500_kiri = parseFloat($('#mcuspesialisaudiometri-bc_500_kiri').val());
        let bc_1000_kiri = parseFloat($('#mcuspesialisaudiometri-bc_1000_kiri').val());
        let bc_2000_kiri = parseFloat($('#mcuspesialisaudiometri-bc_2000_kiri').val());
        let bc_3000_kiri = parseFloat($('#mcuspesialisaudiometri-bc_3000_kiri').val());
        let bc_4000_kiri = parseFloat($('#mcuspesialisaudiometri-bc_4000_kiri').val());
        let bc_6000_kiri = parseFloat($('#mcuspesialisaudiometri-bc_6000_kiri').val());
        let bc_8000_kiri = parseFloat($('#mcuspesialisaudiometri-bc_8000_kiri').val());

        if (ac_125_kanan > 0) ac_kanan["ac_125_kanan"] = ac_125_kanan;
        if (ac_250_kanan > 0) ac_kanan["ac_250_kanan"] = ac_250_kanan;
        if (ac_500_kanan > 0) ac_kanan["ac_500_kanan"] = ac_500_kanan;
        if (ac_1000_kanan > 0) ac_kanan["ac_1000_kanan"] = ac_1000_kanan;
        if (ac_2000_kanan > 0) ac_kanan["ac_2000_kanan"] = ac_2000_kanan;
        if (ac_3000_kanan > 0) ac_kanan["ac_3000_kanan"] = ac_3000_kanan;
        if (ac_4000_kanan > 0) ac_kanan["ac_4000_kanan"] = ac_4000_kanan;
        if (ac_6000_kanan > 0) ac_kanan["ac_6000_kanan"] = ac_6000_kanan;
        if (ac_8000_kanan > 0) ac_kanan["ac_8000_kanan"] = ac_8000_kanan;
        if (ac_125_kiri > 0) ac_kiri["ac_125_kiri"] = ac_125_kiri;
        if (ac_250_kiri > 0) ac_kiri["ac_250_kiri"] = ac_250_kiri;
        if (ac_500_kiri > 0) ac_kiri["ac_500_kiri"] = ac_500_kiri;
        if (ac_1000_kiri > 0) ac_kiri["ac_1000_kiri"] = ac_1000_kiri;
        if (ac_2000_kiri > 0) ac_kiri["ac_2000_kiri"] = ac_2000_kiri;
        if (ac_3000_kiri > 0) ac_kiri["ac_3000_kiri"] = ac_3000_kiri;
        if (ac_4000_kiri > 0) ac_kiri["ac_4000_kiri"] = ac_4000_kiri;
        if (ac_6000_kiri > 0) ac_kiri["ac_6000_kiri"] = ac_6000_kiri;
        if (ac_8000_kiri > 0) ac_kiri["ac_8000_kiri"] = ac_8000_kiri;
        if (bc_125_kanan > 0) bc_kanan["bc_125_kanan"] = bc_125_kanan;
        if (bc_250_kanan > 0) bc_kanan["bc_250_kanan"] = bc_250_kanan;
        if (bc_500_kanan > 0) bc_kanan["bc_500_kanan"] = bc_500_kanan;
        if (bc_1000_kanan > 0) bc_kanan["bc_1000_kanan"] = bc_1000_kanan;
        if (bc_2000_kanan > 0) bc_kanan["bc_2000_kanan"] = bc_2000_kanan;
        if (bc_3000_kanan > 0) bc_kanan["bc_3000_kanan"] = bc_3000_kanan;
        if (bc_4000_kanan > 0) bc_kanan["bc_4000_kanan"] = bc_4000_kanan;
        if (bc_6000_kanan > 0) bc_kanan["bc_6000_kanan"] = bc_6000_kanan;
        if (bc_8000_kanan > 0) bc_kanan["bc_8000_kanan"] = bc_8000_kanan;
        if (bc_125_kiri > 0) bc_kiri["bc_125_kiri"] = bc_125_kiri;
        if (bc_250_kiri > 0) bc_kiri["bc_250_kiri"] = bc_250_kiri;
        if (bc_500_kiri > 0) bc_kiri["bc_500_kiri"] = bc_500_kiri;
        if (bc_1000_kiri > 0) bc_kiri["bc_1000_kiri"] = bc_1000_kiri;
        if (bc_2000_kiri > 0) bc_kiri["bc_2000_kiri"] = bc_2000_kiri;
        if (bc_3000_kiri > 0) bc_kiri["bc_3000_kiri"] = bc_3000_kiri;
        if (bc_4000_kiri > 0) bc_kiri["bc_4000_kiri"] = bc_4000_kiri;
        if (bc_6000_kiri > 0) bc_kiri["bc_6000_kiri"] = bc_6000_kiri;
        if (bc_8000_kiri > 0) bc_kiri["bc_8000_kiri"] = bc_8000_kiri;

        const ac_kanan_avg = Object.keys(ac_kanan).length == 0 ? 0 : parseFloat((Object.values(ac_kanan).reduce((t, n) => t + n) / Object.keys(ac_kanan).length).toFixed(2))
        const ac_kiri_avg = Object.keys(ac_kiri).length == 0 ? 0 : parseFloat((Object.values(ac_kiri).reduce((t, n) => t + n) / Object.keys(ac_kiri).length).toFixed(2))
        const bc_kanan_avg = Object.keys(bc_kanan).length == 0 ? 0 : parseFloat((Object.values(bc_kanan).reduce((t, n) => t + n) / Object.keys(bc_kanan).length).toFixed(2))
        const bc_kiri_avg = Object.keys(bc_kiri).length == 0 ? 0 : parseFloat((Object.values(bc_kiri).reduce((t, n) => t + n) / Object.keys(bc_kiri).length).toFixed(2))

        $('#mcuspesialisaudiometri-rata_kanan_ac').val(ac_kanan_avg).trigger('change')
        $('#mcuspesialisaudiometri-rata_kiri_ac').val(ac_kiri_avg).trigger('change')
        $('#mcuspesialisaudiometri-rata_kanan_bc').val(bc_kanan_avg).trigger('change')
        $('#mcuspesialisaudiometri-rata_kiri_bc').val(bc_kiri_avg).trigger('change')
    })

    $('#mcuspesialisaudiometri-rata_kanan_ac, #mcuspesialisaudiometri-rata_kiri_ac, #mcuspesialisaudiometri-rata_kanan_bc, #mcuspesialisaudiometri-rata_kiri_bc').on('input change', function (e) {
        rataBerubah()
    })

})