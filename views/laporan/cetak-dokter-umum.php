<?php

use app\models\Anamnesis;
use app\models\DataPelayanan;
use app\models\McuTAnamnesis;
use app\models\AnamnesisOkupasi;
use app\models\DokterBertugas;
use app\models\JenisPekerjaan;
use app\models\McuUraianTugasPekerjaan;
use app\models\McuPertanyaanAnmnesis;
use app\models\McuBrief;
use yii\helpers\Url;
use app\models\BodyDiscomfort;

error_reporting(0);
$logo = Url::to('@web/img/logo-rsud-basic.png');
$logo2 = Url::to('@web/img/logo-kars1.png');
$logo3 = Url::to('@web/img/riau.png');
$body = Url::to('@web/img/body.png');
// $mpdf = new \Mpdf\Mpdf();
// tambah lagi
?>
<style>
    hr.line1 {
        border: 10px solid black;
        border-radius: 5px;
    }

    #datapribadi {
        border-collapse: collapse;
    }

    #datapribadi tr th {
        border: 1px solid black;
    }

    #datapribadi tr td {
        border: 1px solid black;
    }
</style>
<style>
    hr.line1 {
        border: 10px solid black;
        border-radius: 5px;
    }

    .tbl-gigi {
        margin: 10px;
    }

    .tbl-oklusi tr th,
    .tbl-oklusi tr td {
        border: 1px solid #000000;
    }

    .tbl-gigi tr th,
    .tbl-gigi tr td {
        border: 1px solid #000000;
    }

    #datapribadi {
        border-collapse: collapse;
    }

    #datapribadi tr th {
        border: 1px solid black;
    }

    #datapribadi tr td {
        border: 1px solid black;
    }

    /*  */
    .tbl-kop tr td.td-kop {
        border: 1px solid #000000;
    }

    .tbl-gigi tr th,
    .tbl-gigi tr td {
        border: 1px solid #000000;
    }

    .tbl-gigi .angka-gigi {
        text-align: center;
    }

    .tbl-oklusi tr td.col-1 {
        width: 35%;
        border-left: 1px solid #000000;
        border-bottom: 1px solid #000000;
    }

    .tbl-oklusi tr td.col-2 {
        width: 1%;
        text-align: left;
        border-bottom: 1px solid #000000;
    }

    .tbl-oklusi tr td.col-3 {
        width: 64%;
        text-align: left !important;
        border-bottom: 1px solid #000000;
        border-right: 1px solid #000000;
    }

    .tabel-penata tr th,
    .tabel-penata tr td {
        border: 1px solid #000000;
        vertical-align: top;
    }

    .tbl-ttd tr td.col-1 {
        border-left: 1px solid #000000;
        border-bottom: 1px solid #000000;
    }

    .tbl-ttd tr td.col-2 {
        border-bottom: 1px solid #000000;
    }

    .tbl-ttd tr td.col-3 {
        border-bottom: 1px solid #000000;
        border-right: 1px solid #000000;
    }
</style>
<?php
$daftar_hari = array(
    'Sunday' => 'Minggu',
    'Monday' => 'Senin',
    'Tuesday' => 'Selasa',
    'Wednesday' => 'Rabu',
    'Thursday' => 'Kamis',
    'Friday' => 'Jumat',
    'Saturday' => 'Sabtu'
);
$daftar_bulan = array(
    '01' => 'Januari',
    '02' => 'Februari',
    '03' => 'Maret',
    '04' => 'April',
    '05' => 'Mei',
    '06' => 'Juni',
    '07' => 'Juli',
    '08' => 'Agustus',
    '09' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'Desember',
);
$daftar_bulan2 = array(
    '01' => 'January',
    '02' => 'February',
    '03' => 'March',
    '04' => 'April',
    '05' => 'May',
    '06' => 'Juny',
    '07' => 'July',
    '08' => 'August',
    '09' => 'September',
    '10' => 'October',
    '11' => 'November',
    '12' => 'December',
);
$tgl_diterbitkan = date('d', strtotime(date('Y-m-d')));
$bulan_diterbitkan = date('m', strtotime(date('Y-m-d')));
$tahun_diterbitkan = date('Y', strtotime(date('Y-m-d')));

function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
?>


<!-- page 3 -->
<div class="row" style="height:800px">
    <table width="100%" cellpadding="1" cellspacing="0">
        <tr>
            <td style="width: 10%; text-align: left;">
                <img src="<?= $logo3 ?>" alt="logo" style="height: 80px; width: auto;">
            </td>
            <td style="font-size:15px;text-align:center">
                <span style="font-weight: bold; line-height: 0 !important;">
                    <span style="font-size: 16px; line-height: 0 !important;">
                        PEMERINTAH PROVINSI RIAU
                    </span>
                    <br>
                    <span style="font-size: 22px; line-height: 0.8 !important;">
                        <?= Yii::$app->params['nama-rs'] ?>
                    </span>
                </span>
                <br>
                <div style="line-height: 1 !important; margin-top: 10px;">
                    <span style="font-size: small; line-height: 0 !important;">
                        <?= Yii::$app->params['alamat-rs'] ?>
                    </span>
                    <br>
                    <span style="font-size: small; line-height: 0.8 !important;">
                        <?= Yii::$app->params['kota-rs'] ?>
                    </span>
                </div>
            </td>
            <td width="60px">
                <img src="<?= $logo ?>" alt="logo" style="height: 80px; width: auto;">
            </td>
            <td width="60px">
                <img src="<?= $logo2 ?>" alt="logo" style="height: 80px; width: auto;">
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <table width="100%">
                    <tr>
                        <td style="background-color:black"></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br>
    <table width="100%" border="0" style="font-size: 14px">
        <tr>
            <td style="text-align:center;font-weight: bold;"><span>UNIT MEDICAL CHECK UP<br>PEMERIKSAAN KESEHATAN TENAGA KERJA</td>
        </tr>
    </table>
    <div class="col-md-12" style="margin:30px 30px 0px 30px">
        <!-- data pribadi -->
        <!-- tinggal isinya -->
        <table width="100%" border="1" cellpadding="1" cellspacing="0" style="border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-collapse:collapse;text-align:left;font-size:12px">
                        <tr>
                            <td style="width:27%">No. Rekam Medis</td>
                            <td style="width:1%">:</td>
                            <td style="width:72%"><?= $data_pelayanan['no_rekam_medik'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:27%">No. MCU</td>
                            <td style="width:1%">:</td>
                            <td style="width:72%"><?= $data_pelayanan['no_mcu'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:27%">Nama</td>
                            <td style="width:1%">:</td>
                            <td style="width:72%"><?= $data_pelayanan['nama'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:27%">Tanggal Pemeriksaan</td>
                            <td style="width:1%">:</td>
                            <td style="width:72%"><?= tgl_indo(date('Y-m-d', strtotime($data_pelayanan['tanggal_pemeriksaan']))) ?? '-' ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

    </div>
    <!-- brief survey -->

    <!--  page 3 -->
    <div class="col-md-12" style="margin:0px 30px 0px 30px;border: 1px solid; height:100%">
        <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-bottom-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-bottom-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
                        <tr>
                            <td colspan="3" style="font-weight:bold">III. PEMERIKSAAN FISIK</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="font-weight:bold">1. Tanda Vital</td>
                        </tr>
                        <tr>
                            <td style="width:27%;height:10px">a. Nadi</td>
                            <td style="width:1%;height:10px">:</td>
                            <td style="width:72%;height:10px"><?= $pemeriksaan_fisik['tanda_vital_nadi'] ?? '-' ?> x/menit</td>
                        </tr>
                        <tr>
                            <td>b. Pernapasan</td>
                            <td>:</td>
                            <td style="width:72%;height:10px"><?= $pemeriksaan_fisik['tanda_vital_pernapasan'] ?? '-' ?> x/menit</td>
                        </tr>
                        <tr>
                            <td>c. Tekanan Darah</td>
                            <td>:</td>
                            <td style="width:72%;height:10px">


                                <?php if ($data_pelayanan->kode_debitur == "0129" || $data_pelayanan->kode_debitur == "0130" || $data_pelayanan->kode_debitur == "9999") { ?>
                                    <?= $pemeriksaan_fisik['sistolik'] ?> / <?= $pemeriksaan_fisik['diastolik'] ?>
                                <?php } else { ?>
                                    <?= $pemeriksaan_fisik['tanda_vital_tekanan_darah'] ?? '-' ?>

                                <?php } ?>
                                mm Hg</td>
                        </tr>
                        <tr>
                            <td style="width:27%">d. Suhu Badan</td>
                            <td style="width:1%">:</td>
                            <td style="width:72%"><?= $pemeriksaan_fisik['tanda_vital_suhu_badan'] ?? '-' ?> &#8451;</td>
                        </tr>

                    </table>
                </td>
            </tr>
        </table>
        <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-top-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-top-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
                        <tr>
                            <td colspan="3" style="font-weight:bold">2. Status Gizi</td>
                        </tr>
                        <tr>
                            <td style="width:26%">a. Tinggi Badan</td>
                            <td style="width:1%">:</td>
                            <td style="width:75%"><?= $pemeriksaan_fisik['status_gizi_tinggi_badan'] ?? '-' ?> cm</td>
                        </tr>
                        <tr>
                            <td style="width:26%">b. Berat Badan</td>
                            <td style="width:1%">:</td>
                            <td style="width:75%"><?= $pemeriksaan_fisik['status_gizi_berat_badan'] ?? '-' ?> kg</td>
                        </tr>
                        <tr>
                            <td style="width:26%">c. Lingkar Perut</td>
                            <td style="width:1%">:</td>
                            <td style="width:75%"><?= $pemeriksaan_fisik['status_gizi_lingkaran_perut'] ?? '-' ?> cm</td>
                        </tr>
                        <tr>
                            <td style="width:26%">- Lingkar lengan</td>
                            <td style="width:1%">:</td>
                            <td style="width:75%"><?= $pemeriksaan_fisik['status_gizi_lingkaran_pinggang'] ?? '-' ?> </td>
                        </tr>
                        <tr>
                            <td style="width:26%">d. Bentuk Badan</td>
                            <td style="width:1%">:</td>
                            <td style="width:75%"><?= $pemeriksaan_fisik['status_gizi_bentuk_badan'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:26%">IMT</td>
                            <td style="width:1%">:</td>
                            <td style="width:75%"><?= number_format($pemeriksaan_fisik['status_gizi_imt'], 2) ?? '-' ?> kg / m2</td>
                        </tr>


                    </table>
                </td>
            </tr>

        </table>
        <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-top-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-top-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
                        <tr>
                            <td colspan="3" style="font-weight:bold">3. Tingkat Kesadaran dan Keadaan Umum</td>
                        </tr>
                        <tr>
                            <td style="width:30%">a. Kesadaran</td>
                            <td style="width:1%">:</td>
                            <td style="width:69%"><?= $pemeriksaan_fisik['tingkat_kesadaran_kesadaran'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:30%">b. Kualitas Kontak</td>
                            <td style="width:1%">:</td>
                            <td style="width:69%"><?= $pemeriksaan_fisik['tingkat_kesadaran_kualitas_kontak'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:30%">c. Tampak Kesehatan</td>
                            <td style="width:1%">:</td>
                            <td style="width:69%"><?= $pemeriksaan_fisik['tingkat_kesadaran_tampak_kesakitan'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:30%">d. Gangguan Saat Berjalan</td>
                            <td style="width:1%">:</td>
                            <td style="width:69%"><?= $pemeriksaan_fisik['tingkat_kesadaran_gangguan_saat_berjalan'] ?? '-' ?></td>
                        </tr>
                    </table>
                </td>
            </tr>

        </table>
        <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-top-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-top-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
                        <tr>
                            <td colspan="3" style="font-weight:bold">4. Kelenjar Getah Bening</td>
                        </tr>
                        <tr>
                            <td style="width:30%">a. Leher</td>
                            <td style="width:1%">:</td>
                            <td style="width:69%"><?= $pemeriksaan_fisik['kelenjar_getah_bening_leher'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:30%">b. Sub Mandibula</td>
                            <td style="width:1%">:</td>
                            <td style="width:69%"><?= $pemeriksaan_fisik['kelenjar_getah_bening_sub_mandibula'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:30%">c. Ketiak</td>
                            <td style="width:1%">:</td>
                            <td style="width:69%"><?= $pemeriksaan_fisik['kelenjar_getah_bening_ketiak'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:30%">d. Inguinal</td>
                            <td style="width:1%">:</td>
                            <td style="width:69%"><?= $pemeriksaan_fisik['kelenjar_getah_bening_inguinal'] ?? '-' ?></td>
                        </tr>
                    </table>
                </td>
            </tr>

        </table>
        <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-top-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-top-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
                        <tr>
                            <td colspan="3" style="font-weight:bold">5. Kepala</td>
                        </tr>
                        <tr>
                            <td style="width:22%">a. Tulang</td>
                            <td style="width:1%">:</td>
                            <td style="width:77%"><?= $pemeriksaan_fisik['kepala_tulang'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:22%">b. Kulit kepala</td>
                            <td style="width:1%">:</td>
                            <td style="width:77%"><?= $pemeriksaan_fisik['kepala_kulit_kepala'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:22%">c. Rambut</td>
                            <td style="width:1%">:</td>
                            <td style="width:77%"><?= $pemeriksaan_fisik['kepala_rambut'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:22%">d. Bentuk Wajah</td>
                            <td style="width:1%">:</td>
                            <td style="width:77%"><?= $pemeriksaan_fisik['kepala_bentuk_wajah'] ?? '-' ?></td>
                        </tr>
                    </table>
                </td>
            </tr>

        </table>
        <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-top-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-top-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
                        <tr>
                            <td style="width:25%;font-weight:bold">6. Mata</td>
                            <td style="width:1%;font-weight:bold"></td>
                            <td style="width:37%;font-weight:bold">kanan</td>
                            <td style="width:37%;font-weight:bold">kiri</td>
                        </tr>
                        <tr>
                            <td style="width:25%">a. Persepsi Warna</td>
                            <td style="width:1%">:</td>
                            <td style="width:37%"><?= $spesialis_mata->persepsi_warna_mata_kanan ?></td>
                            <td style="width:37%"><?= $spesialis_mata->persepsi_warna_mata_kiri ?></td>
                        </tr>
                        <tr>
                            <td style="width:25%">b. Kelopak Mata</td>
                            <td style="width:1%">:</td>
                            <td style="width:37%"><?= $spesialis_mata->kelopak_mata_kanan ?></td>
                            <td style="width:37%"><?= $spesialis_mata->kelopak_mata_kiri ?></td>
                        </tr>
                        <tr>
                            <td style="width:25%">c. Konjungtiva</td>
                            <td style="width:1%">:</td>
                            <td style="width:37%"><?= $spesialis_mata->konjungtiva_mata_kanan ?></td>
                            <td style="width:37%"><?= $spesialis_mata->konjungtiva_mata_kiri ?></td>
                        </tr>
                        <tr>
                            <td style="width:25%">d. Kesegarisan</td>
                            <td style="width:1%">:</td>
                            <td style="width:37%"><?= $spesialis_mata->kesegarisan_gerak_bola_mata_kanan ?></td>
                            <td style="width:37%"><?= $spesialis_mata->kesegarisan_gerak_bola_mata_kiri ?></td>
                        </tr>
                        <tr>
                            <td style="width:25%">e. Sklera</td>
                            <td style="width:1%">:</td>
                            <td style="width:37%"><?= $spesialis_mata->skiera_mata_kanan ?></td>
                            <td style="width:37%"><?= $spesialis_mata->skiera_mata_kiri ?></td>
                        </tr>
                        <tr>
                            <td style="width:25%">f. Lensa Mata</td>
                            <td style="width:1%">:</td>
                            <td style="width:37%"><?= $spesialis_mata->lensa_mata_kanan ?></td>
                            <td style="width:37%"><?= $spesialis_mata->lensa_mata_kiri ?></td>
                        </tr>
                        <tr>
                            <td style="width:25%">g. Kornea</td>
                            <td style="width:1%">:</td>
                            <td style="width:37%"><?= $spesialis_mata->kornea_mata_kanan ?></td>
                            <td style="width:37%"><?= $spesialis_mata->kornea_mata_kiri ?></td>
                        </tr>
                        <tr>
                            <td style="width:25%">h. Bulu Mata</td>
                            <td style="width:1%">:</td>
                            <td style="width:37%"><?= $spesialis_mata->bulu_mata_kanan ?></td>
                            <td style="width:37%"><?= $spesialis_mata->bulu_mata_kiri ?></td>
                        </tr>
                        <tr>
                            <td style="width:25%">i. Tekanan Bola Mata</td>
                            <td style="width:1%">:</td>
                            <td style="width:37%"><?= $spesialis_mata->tekanan_bola_mata_kanan ?></td>
                            <td style="width:37%"><?= $spesialis_mata->tekanan_bola_mata_kiri ?></td>
                        </tr>
                        <tr>
                            <td style="width:25%">k. Visus Mata</td>
                            <td style="width:1%">:</td>
                            <td style="width:37%">-</td>
                            <td style="width:37%">-</td>
                        </tr>
                        <tr>
                            <td style="width:25%"> - Tanpa Koreksi</td>
                            <td style="width:1%">:</td>
                            <td style="width:37%"><?= $spesialis_mata->virus_mata_tanpa_koreksi_mata_kanan ?></td>
                            <td style="width:37%"><?= $spesialis_mata->virus_mata_tanpa_koreksi_mata_kiri ?></td>
                        </tr>
                        <tr>
                            <td style="width:25%"> - Dengan Koreksi</td>
                            <td style="width:1%">:</td>
                            <td style="width:37%"><?= $spesialis_mata->virus_mata_dengan_koreksi_mata_kanan ?></td>
                            <td style="width:37%"><?= $spesialis_mata->virus_mata_dengan_koreksi_mata_kiri ?></td>
                        </tr>
                    </table>
                </td>
            </tr>

        </table>
    </div>
</div>
<!-- page 4-->
<div class="row" style="height:800px">

    <div class="col-md-12" style="margin:30px 30px 0px 30px">
        <!-- data pribadi -->
        <!-- tinggal isinya -->
        <table width="100%" border="1" cellpadding="1" cellspacing="0" style="border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-collapse:collapse;text-align:left;font-size:12px">
                        <tr>
                            <td style="width:34%">No. Rekam Medis</td>
                            <td style="width:1%">:</td>
                            <td style="width:65%"><?= $data_pelayanan['no_rekam_medik'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:34%">No. MCU</td>
                            <td style="width:1%">:</td>
                            <td style="width:65%"><?= $data_pelayanan['no_mcu'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:34%">Nama</td>
                            <td style="width:1%">:</td>
                            <td style="width:65%"><?= $data_pelayanan['nama'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:34%">Tanggal Pemeriksaan</td>
                            <td style="width:1%">:</td>
                            <td style="width:65%"><?= tgl_indo(date('Y-m-d', strtotime($data_pelayanan['tanggal_pemeriksaan']))) ?? '-' ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>

    <!--  page 4 -->
    <div class="col-md-12" style="margin:0px 30px 0px 30px;border: 1px solid;height:100%">

        <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-bottom-color:#fff;border-collapse:collapse;text-align:left;font-size:12px;height:100%">
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-top-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
                         <tr>
                            <td colspan="2" style="font-weight:bold">7. Telinga</td>
                            <td style="font-weight:bold"> Kanan</td>
                            <td style="font-weight:bold">Kiri</td>
                        </tr>
                        <tr>
                            <td style="width:30%">a. Daun Telinga</td>
                            <td style="width:1%">:</td>
                            <td style="width:34.5%"><?= $pemeriksaan_fisik['telinga_daun_telinga_kanan'] ?? '-' ?></td>
                            <td style="width:34.5%"><?= $pemeriksaan_fisik['telinga_daun_telinga_kiri'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:30%">b. Liang Telinga</td>
                            <td style="width:1%">:</td>
                            <td style="width:34.5%"><?= $pemeriksaan_fisik['telinga_liang_telinga_kanan'] ?? '-' ?></td>
                            <td style="width:34.5%"><?= $pemeriksaan_fisik['telinga_liang_telinga_kiri'] ?? '-' ?></td>
                        </tr>
                        <tr >
                            <td style="width:30%"> - Serumen</td>
                            <td style="width:1%">:</td>
                            <td style="width:34.5%"><?= $pemeriksaan_fisik['telinga_serumen_kanan'] ?? '-' ?></td>
                            <td style="width:34.5%"><?= $pemeriksaan_fisik['telinga_serumen_kiri'] ?? '-' ?></td>
                        </tr>
                      
                    </table>
                </td>
            </tr>
        </table>
        <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-bottom-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-top-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
                        <tr>
                            <td colspan="1" style="font-weight:bold">8. Hidung</td>
                        </tr>
                        <tr>
                            <td style="width:26%">a. Meatus Nasi</td>
                            <td style="width:1%">:</td>
                            <td style="width:69%"><?= $pemeriksaan_fisik['hidung_meatus_nasi'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td>b.Septum Nasi </td>
                            <td>:</td>
                            <td><?= $pemeriksaan_fisik['hidung_septum_nasi'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td>c.Konka Nasal</td>
                            <td>:</td>
                            <td><?= $pemeriksaan_fisik['hidung_konka_nasal'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td>d.Nyeri Ketok Sinus Maksilar</td>
                            <td>:</td>
                            <td><?= $pemeriksaan_fisik['hidung_nyeri_ketok_sinus'] ?? '-' ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-bottom-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-top-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
                        <tr>
                            <td colspan="1" style="font-weight:bold">9. Mulut dan Bibir</td>
                        </tr>
                        <tr>
                            <td style="width:19.5%">a. Bibir</td>
                            <td style="width:1%">:</td>
                            <td style="width:67%"><?= $pemeriksaan_fisik['mulut_bibir'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td>b. Lidah</td>
                            <td>:</td>
                            <td><?= $pemeriksaan_fisik['mulut_lidah'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td>c. Gusi</td>
                            <td>:</td>
                            <td><?= $pemeriksaan_fisik['mulut_gusi'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td>d. lain-lain</td>
                            <td>:</td>
                            <td><?= $pemeriksaan_fisik['mulut_lainnya'] ?? '-' ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-bottom-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">

        </table>
       <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-bottom-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td style="width:32%;font-weight:bold">
                    <p>10. Gigi geligi</p>
                </td>
            </tr>
        </table>
		<table class="tbl-gigi" width="100%" border="0" cellpadding="1" cellspacing="0" style="border-bottom-color:#fff;border-collapse:collapse;text-align:left;font-size:12px;">
            <thead>
                <tr>
                    <th style="font-size: 15px; padding: 2px;" colspan="2">KETERANGAN</th>
                    <th style="font-size: 15px; padding: 2px;" colspan="2">KETERANGAN</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="angka-gigi" style="width: 5%;">18</td>
                    <td><?= $spesialis_gigi->g18 ?></td>
                    <td class="angka-gigi" style="width: 5%;">38</td>
                    <td><?= $spesialis_gigi->g38 ?></td>
                </tr>
                <tr>
                    <td class="angka-gigi" style="width: 5%;">17</td>
                    <td><?= $spesialis_gigi->g17 ?></td>
                    <td class="angka-gigi" style="width: 5%;">37</td>
                    <td><?= $spesialis_gigi->g37 ?></td>
                </tr>
                <tr>
                    <td class="angka-gigi" style="width: 5%;">16</td>
                    <td><?= $spesialis_gigi->g16 ?></td>
                    <td class="angka-gigi" style="width: 5%;">36</td>
                    <td><?= $spesialis_gigi->g36 ?></td>
                </tr>
                <tr>
                    <td class="angka-gigi" style="width: 5%;">15</td>
                    <td><?= $spesialis_gigi->g15 ?></td>
                    <td class="angka-gigi" style="width: 5%;">35</td>
                    <td><?= $spesialis_gigi->g35 ?></td>
                </tr>
                <tr>
                    <td class="angka-gigi" style="width: 5%;">14</td>
                    <td><?= $spesialis_gigi->g14 ?></td>
                    <td class="angka-gigi" style="width: 5%;">34</td>
                    <td><?= $spesialis_gigi->g34 ?></td>
                </tr>
                <tr>
                    <td class="angka-gigi" style="width: 5%;">13</td>
                    <td><?= $spesialis_gigi->g13 ?></td>
                    <td class="angka-gigi" style="width: 5%;">33</td>
                    <td><?= $spesialis_gigi->g33 ?></td>
                </tr>
                <tr>
                    <td class="angka-gigi" style="width: 5%;">12</td>
                    <td><?= $spesialis_gigi->g12 ?></td>
                    <td class="angka-gigi" style="width: 5%;">32</td>
                    <td><?= $spesialis_gigi->g32 ?></td>
                </tr>
                <tr>
                    <td class="angka-gigi" style="width: 5%;">11</td>
                    <td><?= $spesialis_gigi->g11 ?></td>
                    <td class="angka-gigi" style="width: 5%;">31</td>
                    <td><?= $spesialis_gigi->g31 ?></td>
                </tr>
                <tr>
                    <td class="angka-gigi" style="width: 5%;">21</td>
                    <td><?= $spesialis_gigi->g21 ?></td>
                    <td class="angka-gigi" style="width: 5%;">41</td>
                    <td><?= $spesialis_gigi->g41 ?></td>
                </tr>
                <tr>
                    <td class="angka-gigi" style="width: 5%;">22</td>
                    <td><?= $spesialis_gigi->g22 ?></td>
                    <td class="angka-gigi" style="width: 5%;">42</td>
                    <td><?= $spesialis_gigi->g42 ?></td>
                </tr>
                <tr>
                    <td class="angka-gigi" style="width: 5%;">23</td>
                    <td><?= $spesialis_gigi->g23 ?></td>
                    <td class="angka-gigi" style="width: 5%;">43</td>
                    <td><?= $spesialis_gigi->g43 ?></td>
                </tr>
                <tr>
                    <td class="angka-gigi" style="width: 5%;">24</td>
                    <td><?= $spesialis_gigi->g24 ?></td>
                    <td class="angka-gigi" style="width: 5%;">44</td>
                    <td><?= $spesialis_gigi->g44 ?></td>
                </tr>
                <tr>
                    <td class="angka-gigi" style="width: 5%;">25</td>
                    <td><?= $spesialis_gigi->g25 ?></td>
                    <td class="angka-gigi" style="width: 5%;">45</td>
                    <td><?= $spesialis_gigi->g45 ?></td>
                </tr>
                <tr>
                    <td class="angka-gigi" style="width: 5%;">26</td>
                    <td><?= $spesialis_gigi->g26 ?></td>
                    <td class="angka-gigi" style="width: 5%;">46</td>
                    <td><?= $spesialis_gigi->g46 ?></td>
                </tr>
                <tr>
                    <td class="angka-gigi" style="width: 5%;">27</td>
                    <td><?= $spesialis_gigi->g27 ?></td>
                    <td class="angka-gigi" style="width: 5%;">47</td>
                    <td><?= $spesialis_gigi->g47 ?></td>
                </tr>
                <tr>
                    <td class="angka-gigi" style="width: 5%;">28</td>
                    <td><?= $spesialis_gigi->g28 ?></td>
                    <td class="angka-gigi" style="width: 5%;">48</td>
                    <td><?= $spesialis_gigi->g48 ?></td>
                </tr>
            </tbody>
        </table>
		<table class="tbl-oklusi" style="width: 100%;margin:10px">
            <tbody>
                <tr>
                    <td class="col-1">Oklusi</td>
                    <td class="col-2">: </td>
                    <td class="col-3">
                        <?php
                        echo ($spesialis_gigi->oklusi == 'Normal Bite') ? $spesialis_gigi->oklusi : '<span style="text-decoration: line-through;"> Normal Bite </span>';
                        echo ' / ';
                        echo ($spesialis_gigi->oklusi == 'Cross Bite') ? $spesialis_gigi->oklusi : '<span style="text-decoration: line-through;"> Cross Bite </span>';
                        echo ' / ';
                        echo ($spesialis_gigi->oklusi == 'Steep Bite') ? $spesialis_gigi->oklusi : '<span style="text-decoration: line-through;"> Steep Bite </span>';
                        if ($spesialis_gigi->oklusi != 'Normal Bite' && $spesialis_gigi->oklusi != 'Cross Bite' && $spesialis_gigi->oklusi != 'Steep Bite') {
                            echo ' / ';
                            echo $spesialis_gigi->oklusi;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="col-1">Torus Palatinus</td>
                    <td class="col-2">: </td>
                    <td class="col-3">
                        <?php
                        echo ($spesialis_gigi->torus_palatinus == 'Tidak Ada') ? $spesialis_gigi->torus_palatinus : '<span style="text-decoration: line-through;"> Tidak Ada </span>';
                        echo ' / ';
                        echo ($spesialis_gigi->torus_palatinus == 'Kecil') ? $spesialis_gigi->torus_palatinus : '<span style="text-decoration: line-through;"> Kecil </span>';
                        echo ' / ';
                        echo ($spesialis_gigi->torus_palatinus == 'Sedang') ? $spesialis_gigi->torus_palatinus : '<span style="text-decoration: line-through;"> Sedang </span>';
                        echo ' / ';
                        echo ($spesialis_gigi->torus_palatinus == 'Besar') ? $spesialis_gigi->torus_palatinus : '<span style="text-decoration: line-through;"> Besar </span>';
                        echo ' / ';
                        echo ($spesialis_gigi->torus_palatinus == 'Multiple') ? $spesialis_gigi->torus_palatinus : '<span style="text-decoration: line-through;"> Multiple </span>';
                        if ($spesialis_gigi->torus_palatinus != 'Tidak Ada' && $spesialis_gigi->torus_palatinus != 'Kecil' && $spesialis_gigi->torus_palatinus != 'Sedang' && $spesialis_gigi->torus_palatinus != 'Besar' && $spesialis_gigi->torus_palatinus != 'Multiple') {
                            echo ' / ';
                            echo $spesialis_gigi->torus_palatinus;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="col-1">Torus Mandibularis</td>
                    <td class="col-2">: </td>
                    <td class="col-3">
                        <?php
                        echo ($spesialis_gigi->torus_mandibularis == 'Tidak Ada') ? $spesialis_gigi->torus_mandibularis : '<span style="text-decoration: line-through;"> Tidak Ada </span>';
                        echo ' / ';
                        echo ($spesialis_gigi->torus_mandibularis == 'Sisi Kiri') ? $spesialis_gigi->torus_mandibularis : '<span style="text-decoration: line-through;"> Sisi Kiri </span>';
                        echo ' / ';
                        echo ($spesialis_gigi->torus_mandibularis == 'Sisi Kanan') ? $spesialis_gigi->torus_mandibularis : '<span style="text-decoration: line-through;"> Sisi Kanan </span>';
                        echo ' / ';
                        echo ($spesialis_gigi->torus_mandibularis == 'Kedua Sisi') ? $spesialis_gigi->torus_mandibularis : '<span style="text-decoration: line-through;"> Kedua Sisi </span>';
                        if ($spesialis_gigi->torus_mandibularis != 'Tidak Ada' && $spesialis_gigi->torus_mandibularis != 'Sisi Kiri' && $spesialis_gigi->torus_mandibularis != 'Sisi Kanan' && $spesialis_gigi->torus_mandibularis != 'Kedua Sisi') {
                            echo ' / ';
                            echo $spesialis_gigi->torus_mandibularis;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="col-1">Palatum</td>
                    <td class="col-2">: </td>
                    <td class="col-3">
                        <?php
                        echo ($spesialis_gigi->palatum == 'Tinggi') ? $spesialis_gigi->palatum : '<span style="text-decoration: line-through;"> Tinggi </span>';
                        echo ' / ';
                        echo ($spesialis_gigi->palatum == 'Sedang') ? $spesialis_gigi->palatum : '<span style="text-decoration: line-through;"> Sedang </span>';
                        echo ' / ';
                        echo ($spesialis_gigi->palatum == 'Rendah') ? $spesialis_gigi->palatum : '<span style="text-decoration: line-through;"> Rendah </span>';
                        if ($spesialis_gigi->palatum != 'Tinggi' & $spesialis_gigi->palatum != 'Sedang' & $spesialis_gigi->palatum != 'Rendah') {
                            echo ' / ';
                            echo $spesialis_gigi->palatum;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="col-1">Supernumerary Teeth</td>
                    <td class="col-2">: </td>
                    <td class="col-3">
                        <?php
                        echo ($spesialis_gigi->supernumerary_teeth == 'Tidak Ada') ? $spesialis_gigi->supernumerary_teeth : '<span style="text-decoration: line-through;"> Tidak Ada </span>';
                        echo ' / ';
                        echo ($spesialis_gigi->supernumerary_teeth == 'Ada') ? $spesialis_gigi->supernumerary_teeth : '<span style="text-decoration: line-through;"> Ada </span>';
                        if ($spesialis_gigi->supernumerary_teeth != 'Tidak Ada' && $spesialis_gigi->supernumerary_teeth != 'Ada') {
                            echo ' / ';
                            echo $spesialis_gigi->supernumerary_teeth;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="col-1">Diastema</td>
                    <td class="col-2">: </td>
                    <td class="col-3">
                        <?php
                        echo ($spesialis_gigi->diastema == 'Tidak Ada') ? $spesialis_gigi->diastema : '<span style="text-decoration: line-through;"> Tidak Ada </span>';
                        echo ' / ';
                        echo ($spesialis_gigi->diastema == 'Ada') ? $spesialis_gigi->diastema : '<span style="text-decoration: line-through;"> Ada </span>';
                        if ($spesialis_gigi->diastema != 'Tidak Ada' && $spesialis_gigi->diastema != 'Ada') {
                            echo ' / ';
                            echo $spesialis_gigi->diastema;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="col-1">Spacing</td>
                    <td class="col-2">: </td>
                    <td class="col-3">
                        <?php
                        echo ($spesialis_gigi->spacing == 'Tidak Ada') ? $spesialis_gigi->spacing : '<span style="text-decoration: line-through;"> Tidak Ada </span>';
                        echo ' / ';
                        echo ($spesialis_gigi->spacing == 'Ada') ? $spesialis_gigi->spacing : '<span style="text-decoration: line-through;"> Ada </span>';
                        if ($spesialis_gigi->spacing != 'Tidak Ada' && $spesialis_gigi->spacing != 'Ada') {
                            echo ' / ';
                            echo $spesialis_gigi->spacing;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="col-1">Oral Hygiene</td>
                    <td class="col-2">: </td>
                    <td class="col-3">
                        <?php
                        echo ($spesialis_gigi->oral_hygiene == 'Baik') ? $spesialis_gigi->oral_hygiene : '<span style="text-decoration: line-through;"> Baik </span>';
                        echo ' / ';
                        echo ($spesialis_gigi->oral_hygiene == 'Sedang') ? $spesialis_gigi->oral_hygiene : '<span style="text-decoration: line-through;"> Sedang </span>';
                        echo ' / ';
                        echo ($spesialis_gigi->oral_hygiene == 'Kurang') ? $spesialis_gigi->oral_hygiene : '<span style="text-decoration: line-through;"> Kurang </span>';
                        if ($spesialis_gigi->oral_hygiene != 'Baik' && $spesialis_gigi->oral_hygiene != 'Sedang' && $spesialis_gigi->oral_hygiene != 'Kurang') {
                            echo ' / ';
                            echo $spesialis_gigi->oral_hygiene;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="col-1">Gingiva & Periodontal</td>
                    <td class="col-2">: </td>
                    <td class="col-3">
                        <?php
                        echo ($spesialis_gigi->gingiva_periodontal == 'Normal') ? $spesialis_gigi->gingiva_periodontal : '<span style="text-decoration: line-through;"> Normal </span>';
                        echo ' / ';
                        echo ($spesialis_gigi->gingiva_periodontal == 'Gingivitis') ? $spesialis_gigi->gingiva_periodontal : '<span style="text-decoration: line-through;"> Gingivitis </span>';
                        echo ' / ';
                        echo ($spesialis_gigi->gingiva_periodontal == 'Periodontitis') ? $spesialis_gigi->gingiva_periodontal : '<span style="text-decoration: line-through;"> Periodontitis </span>';
                        if ($spesialis_gigi->gingiva_periodontal != 'Normal' && $spesialis_gigi->gingiva_periodontal != 'Gingivitis' && $spesialis_gigi->gingiva_periodontal != 'Periodontitis') {
                            echo ' / ';
                            echo $spesialis_gigi->gingiva_periodontal;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="col-1">Oral Mucosa</td>
                    <td class="col-2">: </td>
                    <td class="col-3">
                        <?php
                        echo ($spesialis_gigi->oral_mucosa == 'Normal') ? $spesialis_gigi->oral_mucosa : '<span style="text-decoration: line-through;"> Normal </span>';
                        echo ' / ';
                        echo ($spesialis_gigi->oral_mucosa == 'Disease') ? $spesialis_gigi->oral_mucosa : '<span style="text-decoration: line-through;"> Disease </span>';
                        if ($spesialis_gigi->oral_mucosa != 'Normal' && $spesialis_gigi->oral_mucosa != 'Disease') {
                            echo ' / ';
                            echo $spesialis_gigi->oral_mucosa;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="col-1">Tongue</td>
                    <td class="col-2">: </td>
                    <td class="col-3">
                        <?php
                        echo ($spesialis_gigi->tongue == 'Normal') ? $spesialis_gigi->tongue : '<span style="text-decoration: line-through;"> Normal </span>';
                        echo ' / ';
                        echo ($spesialis_gigi->tongue == 'Disease') ? $spesialis_gigi->tongue : '<span style="text-decoration: line-through;"> Disease </span>';
                        if ($spesialis_gigi->tongue != 'Normal' && $spesialis_gigi->tongue != 'Disease') {
                            echo ' / ';
                            echo $spesialis_gigi->tongue;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="col-1">Lain-lain</td>
                    <td class="col-2">: </td>
                    <td class="col-3">
                        <?php
                        echo $spesialis_gigi->lain_lain;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="col-1" style="font-weight: bold;">Kesan</td>
                    <td class="col-2">: </td>
                    <td class="col-3">
                        <?php
                        echo $spesialis_gigi->kesan;
                        ?>
                    </td>
                </tr>

            </tbody>
        </table>
        <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-bottom-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-top-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
                        <tr>
                            <td colspan="4" style="font-weight:bold">11. Tenggorokan</td>
                        </tr>
                        <tr>
                            <td style="width:17%">a. Pharynx</td>
                            <td style="width: 1%;">:</td>
                            <td style="width:29%"><?= $pemeriksaan_fisik['tenggorokan_pharynx'] ?? '-' ?></td>
                            <td style="width:29%"></td>

                        </tr>
                        <tr>
                            <td>b. Tonsil</td>
                            <td>:</td>
                            <td>Kanan</td>
                            <td>Kiri</td>
                        </tr>
                        <tr>
                            <td>-Ukuran</td>
                            <td>:</td>
                            <td><?= $pemeriksaan_fisik['tenggorokan_tonsil_ukuran_kanan'] ?? '-' ?></td>
                            <td><?= $pemeriksaan_fisik['tenggorokan_tonsil_ukuran_kiri'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td>-Keterangan</td>
                            <td>:</td>
                            <td><?= $pemeriksaan_fisik['tenggorokan_tonsil_kanan'] ?? '-' ?></td>
                            <td><?= $pemeriksaan_fisik['tenggorokan_tonsil_kiri'] ?? '-' ?></td>
                        </tr>

                        <tr>
                            <td>c. palatum</td>
                            <td>:</td>
                            <td><?= $pemeriksaan_fisik['tenggorokan_palatum'] ?? '-' ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>d. lainnya</td>
                            <td>:</td>
                            <td><?= $pemeriksaan_fisik['tenggorokan_lainn'] ?? '-' ?></td>
                            <td></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-bottom-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-top-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
                        <tr>
                            <td colspan="3" style="font-weight:bold">12. Leher</td>
                        </tr>
                        <tr>
                            <td style="width:24.5%">a. Gerakan Leher</td>
                            <td style="width:1%;">:</td>
                            <td style="width:70%;"><?= $pemeriksaan_fisik['leher_gerakan_leher'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td>b. Otot Leher</td>
                            <td>:</td>
                            <td><?= $pemeriksaan_fisik['leher_otot_leher'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td>c. Kelenjar Thyroid</td>
                            <td>:</td>
                            <td><?= $pemeriksaan_fisik['leher_kelenjar_thyroid'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td>d. Pulsasi Carotis</td>
                            <td>:</td>
                            <td><?= $pemeriksaan_fisik['leher_pulsasi_carotis'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td>e. Tekanan Vena Jugularis</td>
                            <td>:</td>
                            <td><?= $pemeriksaan_fisik['leher_tekanan_vena_jugularis'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td>f. Trachea</td>
                            <td>:</td>
                            <td><?= $pemeriksaan_fisik['leher_trachea'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td>g. Lainnya</td>
                            <td>:</td>
                            <td><?= $pemeriksaan_fisik['leher_lainnya'] ?? '-' ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table height="10px" width="100%" border="0" cellpadding="1" cellspacing="0" style="border-bottom-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-top-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
                        <tr>
                            <td colspan="3" style="font-weight:bold">13. Dada</td>
                        </tr>
                        <tr>
                            <td style="width:32%">a. Bentuk</td>
                            <td style="width:1%;">:</td>
                            <td style="widht:67%"><?= $pemeriksaan_fisik['dada_bentuk'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td>b. Mamae</td>
                            <td>:</td>
                            <td><?= $pemeriksaan_fisik['dada_mamae'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td>-Tumor</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td> -Ukuran</td>
                            <td>:</td>
                            <td><?= $pemeriksaan_fisik['dada_tumor_ukuran'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td> -Letak</td>
                            <td>:</td>
                            <td><?= $pemeriksaan_fisik['dada_tumor_letak'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td> -Konsistensi</td>
                            <td>:</td>
                            <td><?= $pemeriksaan_fisik['dada_tumor_konsisten'] ?? '-' ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</div>
<!-- page 5-->
<div class="row" style="height:800px">

    <div class="col-md-12" style="margin:30px 30px 0px 30px">
        <!-- data pribadi -->
        <!-- tinggal isinya -->
        <table width="100%" border="1" cellpadding="1" cellspacing="0" style="border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td style="width:27%">No. Rekam Medis</td>
                <td style="width:1%">:</td>
                <td style="width:72%"><?= $data_pelayanan['no_rekam_medik'] ?? '-' ?></td>
            </tr>
            <tr>
                <td style="width:27%">No. MCU</td>
                <td style="width:1%">:</td>
                <td style="width:72%"><?= $data_pelayanan['no_mcu'] ?? '-' ?></td>
            </tr>
            <tr>
                <td style="width:27%">Nama</td>
                <td style="width:1%">:</td>
                <td style="width:72%"><?= $data_pelayanan['nama'] ?? '-' ?></td>
            </tr>
            <tr>
                <td style="width:27%">Tanggal Pemeriksaan</td>
                <td style="width:1%">:</td>
                <td style="width:72%"><?= tgl_indo(date('Y-m-d', strtotime($data_pelayanan['tanggal_pemeriksaan']))) ?? '-' ?></td>
            </tr>
        </table>
    </div>

    <!--  page 5 -->
    <div class="col-md-12" style="margin:0px 30px 0px 30px;border: 1px solid;height:100%">

        <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-bottom-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
            <tr>
                <td colspan="4" style="font-weight:bold">14. Paru-paru dan Jantung</td>
            </tr>
            <tr>
                <td style="width:26%">a. Palpasi</td>
                <td style="width:1%">:</td>
                <td style="width:36.5%"><?= $pemeriksaan_fisik['paru_jantung_palpasi'] ?? '-' ?></td>
                <td style="width:36.5%"></td>
            </tr>
            <tr>
                <td style="width:26%"></td>
                <td style="width:1%"></td>
                <td style="width:36.5%;font-weight:bold">kanan</td>
                <td style="width:36.5%;font-weight:bold">kiri</td>
            </tr>
            <tr>
                <td style="width:26%">b. Perkusi</td>
                <td style="width:1%">:</td>
                <td style="width:36.5%"><?= $pemeriksaan_fisik['paru_jantung_perkusi_kanan'] ?? '-' ?></td>
                <td style="width:36.5%"><?= $pemeriksaan_fisik['paru_jantung_perkusi_kiri'] ?? '-' ?></td>
            </tr>
            <tr>
                <td style="width:26%">- Iktus Kordis</td>
                <td style="width:1%">:</td>
                <td style="width:36.5%"><?= $pemeriksaan_fisik['paru_jantung_perkusi_iktus_kanan'] ?? '-' ?></td>
                <td style="width:36.5%"><?= ($pemeriksaan_fisik['paru_jantung_perkusi_iktus_kiri']) ?? '-' ?></td>
            </tr>
            <tr>
                <td style="width:26%">- Batas Jantung</td>
                <td style="width:1%">:</td>
                <td style="width:36.5%"><?= $pemeriksaan_fisik['paru_jantung_perkusi_batas_jantung_kanan'] ?? '-' ?></td>
                <td style="width:36.5%"><?= $pemeriksaan_fisik['paru_jantung_perkusi_batas_jantung_kiri'] ?? '-' ?></td>

            </tr>
            <tr>
                <td style="width:26%">c. Auskultasi</td>
                <td style="width:1%">:</td>
                <td style="width:36.5%"></td>
                <td style="width:36.5%"></td>
            </tr>
            <tr>
                <td style="width:26%">- Bunyi Nafas</td>
                <td style="width:1%">:</td>
                <td style="width:36.5%"><?= $pemeriksaan_fisik['paru_jantung_auskultasi_bunyi_nafas_kanan'] ?? '-' ?></td>
                <td style="width:36.5%"><?= $pemeriksaan_fisik['paru_jantung_auskultasi_bunyi_nafas_kiri'] ?? '-' ?></td>
            </tr>
            <tr>
                <td style="width:26%">- Bunyi nafas tambahan</td>
                <td style="width:1%">:</td>
                <td style="width:36.5%"><?= $pemeriksaan_fisik['paru_jantung_auskultasi_bunyi_nafas_tambah_kanan'] ?? '-' ?></td>
                <td style="width:36.5%"><?= $pemeriksaan_fisik['paru_jantung_auskultasi_bunyi_nafas_tambah_kiri'] ?? '-' ?></td>
            </tr>
            <tr>
                <td style="width:26%">- Bunyi Jantung</td>
                <td style="width:1%">:</td>
                <td style="width:36.5%"><?= $pemeriksaan_fisik['paru_jantung_bunyi_jantung'] ?? '-' ?></td>
                <td style="width:36.5%"><?= $pemeriksaan_fisik['paru_jantung_bunyi_jantung_kiri'] ?? '-' ?></td>
            </tr>
        </table>
        </tr>
        </table>
        <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-bottom-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-top-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
                        <tr>
                            <td colspan="3" style="font-weight:bold">15. Abdomen</td>
                        </tr>
                        <tr>
                            <td style="width:25%">a. Inspeksi</td>
                            <td style="width:1%">:</td>
                            <td style="width:37%"><?= $pemeriksaan_fisik['abdomen'] ?? '-' ?></td>
                            <td style="width:37%"></td>
                        </tr>
                        <tr>
                            <td style="width:25%">b. Perkusi </td>
                            <td style="width:1%">:</td>
                            <td style="width:37%"><?= $pemeriksaan_fisik['abdomen_perkusi'] ?? '-' ?></td>
                            <td style="width:37%"></td>
                        </tr>
                        <tr>
                            <td style="width:25%">c. Auskultasi Bising Usus</td>
                            <td style="width:1%">:</td>
                            <td style="width:37%"><?= $pemeriksaan_fisik['abdomen_auskultasi_bising_usus'] ?? '-' ?></td>
                            <td style="width:37%"></td>
                        </tr>
                        <tr>
                            <td style="width:25%">d. Hati</td>
                            <td style="width:1%">:</td>
                            <td style="width:37%"><?= $pemeriksaan_fisik['abdomen_hati'] ?? '-' ?></td>
                            <td style="width:37%"></td>
                        </tr>
                        <tr>
                            <td style="width:25%">e. Limpa</td>
                            <td style="width:1%">:</td>
                            <td style="width:37%"><?= $pemeriksaan_fisik['abdomen_limpa'] ?? '-' ?></td>
                            <td style="width:37%"></td>
                        </tr>
                        <tr>
                            <td style="width:25%"></td>
                            <td style="width:1%"></td>
                            <td style="width:37%;font-weight:bold">Kanan</td>
                            <td style="width:37%;font-weight:bold">Kiri</td>
                        </tr>
                        <tr>
                            <td style="width:25%">f. Ginjal</td>
                            <td style="width:1%">:</td>
                            <td style="width:37%"><?= $pemeriksaan_fisik['abdomen_ginjal_kanan'] ?? '-' ?></td>
                            <td style="width:37%"><?= $pemeriksaan_fisik['abdomen_ginjal_kiri'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:25%">g. Ballotement</td>
                            <td style="width:1%">:</td>
                            <td style="width:37%"><?= $pemeriksaan_fisik['abdomen_ballotement_kanan'] ?? '-' ?></td>
                            <td style="width:37%"><?= $pemeriksaan_fisik['abdomen_ballotement_kiri'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:25%">h. Nyeri Costo Vertebrae</td>
                            <td style="width:1%">:</td>
                            <td style="width:37%"><?= $pemeriksaan_fisik['abdomen_nyeri_costo_vertebrae_kanan'] ?? '-' ?></td>
                            <td style="width:37%"><?= $pemeriksaan_fisik['abdomen_nyeri_costo_vertebrae_kiri'] ?? '-' ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-bottom-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-bottom-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
                         <tr>
                            <td colspan="3" style="font-weight:bold">16. Genitourinaria</td>
                        </tr>
                        <tr>
                            <td style="width:23.5%">a. Kandung Kemih</td>
                            <td style="width:1%">:</td>
                            <td style="width:75.5%"><?= $pemeriksaan_fisik['genitourinaria_kandung_kemih'] ?? 'Tidak Dilakukan Pemeriksaan' ?></td>
                        </tr>
                        <tr>
                            <td style="width:23.5%">b. Anus.Rektum/Perianal</td>
                            <td style="width:1%">:</td>
                            <td style="width:75.5%"><?= $pemeriksaan_fisik['genitourinaria_anus'] ?? 'Tidak Dilakukan Pemeriksaan' ?></td>
                        </tr>
                        <tr>
                            <td style="width:23.5%">c. Genetalia Eksternal</td>
                            <td style="width:1%">:</td>
                            <td style="width:75.5%"><?= $pemeriksaan_fisik['genitourinaria_genitalia_eksternal'] ?? 'Tidak Dilakukan Pemeriksaan' ?></td>
                        </tr>
                  <?php if($data_pelayanan->jenis_kelamin == 'L'){ ?>
                        <tr>
                            <td style="width:23.5%">d. Prostat (Khusus pria)</td>
                            <td style="width:1%">:</td>
                            <td style="width:75.5%"><?= $pemeriksaan_fisik['genitourinaria_prostat'] ?? 'Tidak Dilakukan Pemeriksaan' ?></td>
                        </tr>
                    <?php }?>
                    
                    </table>
                </td>
            </tr>
        </table>
        <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-bottom-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-top-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">

                        <tr>
                            <td style="width:22.5%;font-weight:bold;height:10px">17. Vertebra</td>
                            <td style="width:1%">:</td>
                            <td style="width:76.5%"><?= $pemeriksaan_fisik['vertebra'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:22.5%;height:10px">- Lain-lain</td>
                            <td style="width:1%">:</td>
                            <td style="width:76.5%"><?= $pemeriksaan_fisik['vertebra_lainnya'] ?? '-' ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-bottom-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-top-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">

                        <tr>
                            <td style="width:32%;height:10px;font-weight:bold">18. Tulang / sendi Ekstremitas Atas</td>
                            <td style="width:1%"></td>
                            <td style="width:33.5%;font-weight:bold">Kanan</td>
                            <td style="width:33.5%;font-weight:bold">Kiri</td>
                        </tr>
                        <tr>
                            <td style="width:32%;height:10px;">a. Simetris</td>
                            <td style="width:1%">:</td>
                            <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_atas_simetris'] ?? '-' ?></td>
                            <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_atas'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:32%;height:10px;">b. Gerakan</td>
                            <td style="width:1%"></td>
                            <td style="width:33.5%"></td>
                            <td style="width:33.5%"></td>
                        </tr>
                        <tr>
                            <td style="width:32%;height:10px;">1. Range of Motion</td>
                            <td style="width:1%"></td>
                            <td style="width:33.5%"></td>
                            <td style="width:33.5%"></td>
                        </tr>
                        <tr>
                            <td style="width:32%;height:10px;">- Abduksi-Neer's Test</td>
                            <td style="width:1%">:</td>
                            <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_atas_gerakan_abduksi_neer_kanan'] ?? '-' ?></td>
                            <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_atas_gerakan_abduksi_neer_kiri'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:32%;height:10px;">- Abduksi-Hawkin's Test</td>
                            <td style="width:1%">:</td>
                            <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_atas_gerakan_abduksi_hawkin_kanan'] ?? '-' ?></td>
                            <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_atas_gerakan_abduksi_hawkin_kiri'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:32%;height:10px;">2. Drop Arm Test</td>
                            <td style="width:1%">:</td>
                            <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_atas_gerakan_drop_arm_kanan'] ?? '-' ?></td>
                            <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_atas_gerakan_drop_arm_kiri'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:32%;height:10px;">3. Yergason Test</td>
                            <td style="width:1%">:</td>
                            <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_atas_gerakan_yergason_kanan'] ?? '-' ?></td>
                            <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_atas_gerakan_yergason_kiri'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:32%;height:10px;">4. Speed Test</td>
                            <td style="width:1%">:</td>
                            <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_atas_gerakan_speed_kanan'] ?? '-' ?></td>
                            <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_atas_gerakan_speed_kiri'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:32%;height:10px;">c. Tulang</td>
                            <td style="width:1%">:</td>
                            <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_atas_tulang_kanan'] ?? '-' ?></td>
                            <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_atas_tulang_kiri'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:32%;height:10px;">d. Sensibilitas</td>
                            <td style="width:1%">:</td>
                            <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_atas_sensibilitas_kanan'] ?? '-' ?></td>
                            <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_atas_sensibilitas_kiri'] ?? '-' ?></td>
                        </tr>


                        <tr>
                            <td style="width:32%;height:10px;">e. Kekuatan Otot</td>
                            <td style="width:1%"></td>
                            <td style="width:33.5%"></td>
                            <td style="width:33.5%"></td>
                        </tr>
                        <tr>
                            <td style="width:32%;height:10px;">- Pin Prick Test</td>
                            <td style="width:1%">:</td>
                            <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_atas_kekuatan_otot_pin_prick_kanan'] ?? '-' ?></td>
                            <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_atas_kekuatan_otot_pin_prick_kiri'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:32%;height:10px;">- Phallen Test</td>
                            <td style="width:1%">:</td>
                            <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_atas_kekuatan_otot_phallent_kanan'] ?? '-' ?></td>
                            <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_atas_kekuatan_otot_phallent_kiri'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:32%;height:10px;">- Tinnel Test</td>
                            <td style="width:1%">:</td>
                            <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_atas_kekuatan_otot_tinnel_kanan'] ?? '-' ?></td>
                            <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_atas_kekuatan_otot_tinnel_kiri'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:32%;height:10px;">- Finskelstein</td>
                            <td style="width:1%">:</td>
                            <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_atas_kekuatan_otot_finskelstein_kanan'] ?? '-' ?></td>
                            <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_atas_kekuatan_otot_finskelstein_kiri'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:32%;height:10px;">e. Vaskularisasi</td>
                            <td style="width:1%">:</td>
                            <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_atas_vaskularisasi_kanan'] ?? '-' ?></td>
                            <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_atas_vaskularisasi_kiri'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:32%;height:10px;">g. Kelainan Kuku/ Jari</td>
                            <td style="width:1%">:</td>
                            <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_atas_kelaianan_kukujari_kanan'] ?? '-' ?></td>
                            <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_atas_kelaianan_kukujari_kiri'] ?? '-' ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>


    </div>
</div>
<div class="col-md-12" style="margin:0px 30px 0px 30px;border: 1px solid; height:100%">
    <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-bottom-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
        <tr>
            <td>
                <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-top-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
                    <tr>
                        <td style="width:32%;font-weight:bold">19. Tulang/Sendi Ekstremitas bawah</td>
                        <td style="width:1%"></td>
                        <td style="width:33.5%;font-weight:bold">Kanan</td>
                        <td style="width:33.5%;font-weight:bold ">Kiri</td>
                    </tr>
                    <tr>
                        <td style="width:32%">a. Simetri</td>
                        <td style="width:1%">:</td>
                        <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_bawah_simetris'] ?? '-' ?></td>
                        <td style="width:33.5%"></td>
                    </tr>
                    <tr>
                        <td style="width:32%">b. Gerakan</td>
                        <td style="width:1%"></td>
                        <td style="width:33.5%"></td>
                        <td style="width:33.5%"></td>
                    </tr>
                    <tr>
                        <td style="width:32%">- Test Laseque</td>
                        <td style="width:1%">:</td>
                        <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_bawah_laseque_kanan'] ?? '-' ?></td>
                        <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_bawah_laseque_kiri'] ?? '-' ?></td>
                    </tr>
                    <tr>
                        <td style="width:32%">- Kernique</td>
                        <td style="width:1%">:</td>
                        <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_bawah_kernique_kanan'] ?? '-' ?></td>
                        <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_bawah_kernique_kiri'] ?? '-' ?></td>
                    </tr>
                    <tr>
                        <td style="width:32%">- Test Patrick</td>
                        <td style="width:1%">:</td>
                        <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_bawah_patrick_kanan'] ?? '-' ?></td>
                        <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_bawah_patrick_kiri'] ?? '-' ?></td>
                    </tr>
                    <tr>
                        <td style="width:32%">- Test Contra Patrick</td>
                        <td style="width:1%">:</td>
                        <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_bawah_contrapatrick_kanan'] ?? '-' ?></td>
                        <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_bawah_contrapatrick_kiri'] ?? '-' ?></td>
                    </tr>
                    <tr>
                        <td style="width:32%">- Nyeri Tekan</td>
                        <td style="width:1%">:</td>
                        <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_bawah_nyeri_tekanan_kanan'] ?? '-' ?></td>
                        <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_bawah_nyeri_tekanan_kiri'] ?? '-' ?></td>
                    </tr>
                    <tr>
                        <td style="width:32%">c. Kekuatan Otot</td>
                        <td style="width:1%">:</td>
                        <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_bawah_kekuatan_otot_kanan'] ?? '-' ?></td>
                        <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_bawah_kekuatan_otot_kiri'] ?? '-' ?></td>
                    </tr>
                    <tr>
                        <td style="width:32%">d. Sensibilitas</td>
                        <td style="width:1%">:</td>
                        <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_bawah_sensibilitas_kanan'] ?? '-' ?></td>
                        <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_bawah_sensibilitas_kiri'] ?? '-' ?></td>
                    </tr>
                    <tr>
                        <td style="width:32%">e.Oedem</td>
                        <td style="width:1%">:</td>
                        <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_bawah_oedema_kanan'] ?></td>
                        <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_bawah_oedema_kiri'] ?></td>
                    </tr>
                    <tr>
                        <td style="width:32%">f. Varises</td>
                        <td style="width:1%">:</td>
                        <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_bawah_varises_kanan']   ?></td>
                        <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_bawah_varises_kiri']   ?></td>
                    </tr>
                    <tr>
                        <td style="width:32%">g. Vaskularisasi</td>
                        <td style="width:1%">:</td>
                        <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_bawah_vaskularisasi_kanan'] ?? '-' ?></td>
                        <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_bawah_vaskularisasi_kiri'] ?? '-' ?></td>
                    </tr>
                    <tr>
                        <td style="width:32%">h. Kelainan Kuku/ Jari</td>
                        <td style="width:1%">:</td>
                        <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_bawah_kelainan_kuku_kanan'] ?? '-' ?></td>
                        <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_bawah_kelainan_kuku_kiri'] ?? '-' ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-bottom-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
        <tr>
            <td>
                <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-top-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
                    <tr>
                        <td style="width:30.5%;font-weight:bold">21. Fungsi Sensorik dan Autonom</td>
                        <td style="width:1%"></td>
                        <td style="width:34.5%;font-weight:bold">Kanan</td>
                        <td style="width:34.5%;font-weight:bold ">Kiri</td>
                    </tr>
                    <tr>
                        <td style="width:30.5%">a. Fungsi Sensorik</td>
                        <td style="width:1%">:</td>
                        <td style="width:34.5%"><?= $pemeriksaan_fisik['fungsi_sensorik_kanan'] ?? '' ?></td>
                        <td style="width:34.5%"><?= $pemeriksaan_fisik['fungsi_sensorik_kiri'] ?? '-' ?></td>
                    </tr>
                    <tr>
                        <td style="width:30.5%">b. Fungsi Autonom</td>
                        <td style="width:1%">:</td>
                        <td style="width:34.5%"><?= $pemeriksaan_fisik['fungsi_autonom_kanan'] ?? '' ?></td>
                        <td style="width:34.5%"><?= $pemeriksaan_fisik['fungsi_autonom_kiri'] ?? '-' ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-bottom-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
        <tr>
            <td>
                <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-top-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
                    <tr>
                        <td style="width:27%;font-weight:bold">22. Saraf dan Fungsi Luhur</td>
                        <td style="width:1%"></td>
                        <td style="width:72%;font-weight:bold"></td>
                    </tr>
                    <tr>
                        <td style="width:27%">a. Daya Ingat</td>
                        <td style="width:1%"></td>
                        <td style="width:72%"></td>
                    </tr>
                    <tr>
                        <td style="width:27%">- Segera</td>
                        <td style="width:1%">:</td>
                        <td style="width:72%"><?= $pemeriksaan_fisik['saraf_daya_ingat_segera'] ?? '-' ?></td>
                    </tr>
                    <tr>
                        <td style="width:27%">- Jangka Menengah</td>
                        <td style="width:1%">:</td>
                        <td style="width:72%"><?= $pemeriksaan_fisik['saraf_daya_ingat_jangka_menengah'] ?? '-' ?></td>
                    </tr>
                    <tr>
                        <td style="width:27%">- Jangka Pendek</td>
                        <td style="width:1%">:</td>
                        <td style="width:72%"><?= $pemeriksaan_fisik['saraf_daya_ingat_jangka_pendek'] ?? '-' ?></td>
                    </tr>
                    <tr>
                        <td style="width:27%">- Jangka Panjang</td>
                        <td style="width:1%">:</td>
                        <td style="width:72%"><?= $pemeriksaan_fisik['saraf_daya_ingat_jangka_panjang'] ?? '-' ?></td>
                    </tr>
                    <tr>
                        <td style="width:27%">b. Orientasi</td>
                        <td style="width:1%"></td>
                        <td style="width:72%"></td>
                    </tr>
                    <tr>
                        <td style="width:27%">- Waktu</td>
                        <td style="width:1%">:</td>
                        <td style="width:72%"><?= $pemeriksaan_fisik['saraf_orientasi_waktu'] ?? '-' ?></td>
                    </tr>
                    <tr>
                        <td style="width:27%">- Orang</td>
                        <td style="width:1%">:</td>
                        <td style="width:72%"><?= $pemeriksaan_fisik['saraf_orientasi_orang'] ?? '-' ?></td>
                    </tr>
                    <tr>
                        <td style="width:27%">- Tempat</td>
                        <td style="width:1%">:</td>
                        <td style="width:72%"><?= $pemeriksaan_fisik['saraf_orientasi_tempat'] ?? '-' ?></td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
    <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-top-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
        <tr>
            <td style="width:26.5%;font-weight:bold">23. Kesan Saraf Otak</td>
            <td style="width:1%"></td>
            <td style="width:73.5%;font-weight:bold"></td>
        </tr>
        <tr>
            <td style="width:26.5%">-N I (Penciuman)</td>
            <td style="width:1%">:</td>
            <td style="width:73.5%"><?= $pemeriksaan_fisik['saraf_kesan_n_i'] ?? '-' ?></td>
        </tr>
        <tr>
            <td style="width:26.5%">-N II (Penglihatan)</td>
            <td style="width:1%">:</td>
            <td style="width:73.5%"><?= $pemeriksaan_fisik['saraf_kesan_n_ii'] ?? '-' ?></td>
        </tr>
        <tr>
            <td style="width:26.5%">-N III</td>
            <td style="width:1%">:</td>
            <td style="width:73.5%"><?= $pemeriksaan_fisik['saraf_kesan_n_iii'] ?? '-' ?></td>
        </tr>
        <tr>
            <td style="width:26.5%">-N IV</td>
            <td style="width:1%">:</td>
            <td style="width:73.5%"><?= $pemeriksaan_fisik['saraf_kesan_n_iv'] ?? '-' ?></td>
        </tr>
        <tr>
            <td style="width:26.5%">-N V</td>
            <td style="width:1%">:</td>
            <td style="width:73.5%"><?= $pemeriksaan_fisik['saraf_kesan_n_v'] ?? '-' ?></td>
        </tr>
        <tr>
            <td style="width:26.5%">-N VI</td>
            <td style="width:1%">:</td>
            <td style="width:73.5%"><?= $pemeriksaan_fisik['saraf_kesan_n_vi'] ?? '-' ?></td>
        </tr>
        <tr>
            <td style="width:26.5%">-N VII</td>
            <td style="width:1%">:</td>
            <td style="width:73.5%"><?= $pemeriksaan_fisik['saraf_kesan_n_vii'] ?? '-' ?></td>
        </tr>
        <tr>
            <td style="width:26.5%">-N VIII</td>
            <td style="width:1%">:</td>
            <td style="width:73.5%"><?= $pemeriksaan_fisik['saraf_kesan_n_viii'] ?? '-' ?></td>
        </tr>
        <tr>
            <td style="width:26.5%">-N IX</td>
            <td style="width:1%">:</td>
            <td style="width:73.5%"><?= $pemeriksaan_fisik['saraf_kesan_n_ix'] ?? '-' ?></td>
        </tr>
        <tr>
            <td style="width:26.5%">-N X</td>
            <td style="width:1%">:</td>
            <td style="width:73.5%"><?= $pemeriksaan_fisik['saraf_kesan_n_x'] ?? '-' ?></td>
        </tr>
        <tr>
            <td style="width:26.5%">-N XI</td>
            <td style="width:1%">:</td>
            <td style="width:73.5%"><?= $pemeriksaan_fisik['saraf_kesan_n_xi'] ?? '-' ?></td>
        </tr>
        <tr>
            <td style="width:26.5%">-N XII</td>
            <td style="width:1%">:</td>
            <td style="width:73.5%"><?= $pemeriksaan_fisik['saraf_kesan_n_xii'] ?? '-' ?></td>
        </tr>
    </table>

</div>

<!-- ttd -->
<div class="row" style="">
    <div class="col-md-12" style="margin:30px 30px 0px 30px">
        <table width="100%" border="1" cellpadding="1" cellspacing="0" style="border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td style="width:27%">No. Rekam Medis</td>
                <td style="width:1%">:</td>
                <td style="width:72%"><?= $data_pelayanan['no_rekam_medik'] ?? '-' ?></td>
            </tr>
            <tr>
                <td style="width:27%">No. MCU</td>
                <td style="width:1%">:</td>
                <td style="width:72%"><?= $data_pelayanan['no_mcu'] ?? '-' ?></td>
            </tr>
            <tr>
                <td style="width:27%">Nama</td>
                <td style="width:1%">:</td>
                <td style="width:72%"><?= $data_pelayanan['nama'] ?? '-' ?></td>
            </tr>
            <tr>
                <td style="width:27%">Tanggal Pemeriksaan</td>
                <td style="width:1%">:</td>
                <td style="width:72%"><?= tgl_indo(date('Y-m-d', strtotime($data_pelayanan['tanggal_pemeriksaan']))) ?? '-' ?></td>
            </tr>
        </table>

    <table width="100%" border="1" cellpadding="1" cellspacing="0" style="border-bottom-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td>
                    <table width="100%" border="" cellpadding="1" cellspacing="0" style="border-top-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td style="width:27%;font-weight:bold">24. Refleks</td>
                <td style="width:1%">:</td>
                <td style="width:36%;font-weight:bold">Kanan</td>
                <td style="width:36%;font-weight:bold">Kiri</td>
            </tr>
            <tr>
                <td style="width:27%;">a. Refleks Fisiologis Patella</td>
                <td style="width:1%">:</td>
                <td style="width:36%;"><?= $pemeriksaan_fisik['reflek_fisiologis_patella_kanan'] ?? '-' ?></td>
                <td style="width:36%;"><?= $pemeriksaan_fisik['reflek_fisiologis_patella_kiri'] ?? '-' ?></td>
            </tr>
            <tr>
                <td style="width:27%;">Lainnya</td>
                <td style="width:1%">:</td>
                <td style="width:36%;"></td>
                <td style="width:36%;"></td>
            </tr>
            <tr>
                <td style="width:27%;">b. Refleks Patologis,Babinsky</td>
                <td style="width:1%">:</td>
                <td style="width:36%;"><?= $pemeriksaan_fisik['reflek_patologis_kanan'] ?? '-' ?></td>
                <td style="width:36%;"><?= $pemeriksaan_fisik['reflek_patologis_kiri'] ?? '-' ?></td>
            </tr>
            <tr>
                <td style="width:27%;">Lainnya</td>
                <td style="width:1%">:</td>
                <td style="width:36%;"></td>
                <td style="width:36%;"></td>
            </tr>


        </table>
        <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-top-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td style="width:26%;font-weight:bold">25. Kulit</td>
                <td style="width:1%"></td>
                <td style="width:73%;font-weight:bold"></td>
            </tr>
            <tr>
                <td style="width:26%;">a. Kulit</td>
                <td style="width:1%">:</td>
                <td style="width:73%;"><?= $pemeriksaan_fisik['kulit_kulit'] ?></td>
            </tr>
            <tr>
                <td style="width:26%;">b. Selaput Lendir</td>
                <td style="width:1%">:</td>
                <td style="width:73%;"><?= $pemeriksaan_fisik['kulit_selaput_lendir'] ?></td>
            </tr>
            <tr>
                <td style="width:26%;">c. Kuku</td>
                <td style="width:1%">:</td>
                <td style="width:73%;"><?= $pemeriksaan_fisik['kulit_kuku'] ?></td>
            </tr>
            <tr>
                <td style="width:26%;">d. Tato</td>
                <td style="width:1%">:</td>
                <td style="width:73%;"><?= $pemeriksaan_fisik['kulit_tato'] ?></td>
            </tr>
            <tr>
                <td style="width:26%;">e. lain-lain</td>
                <td style="width:1%">:</td>
                <td style="width:73%;"><?= $pemeriksaan_fisik['kulit_lain'] ?></td>
            </tr>

        </table>
                </td>
            </tr>
        </table>

        
    </div><br>
    <br>
    <br>
    <table width="100%" border="0" style="font-size: 12px">

        <tr>

            <td style="width:66.3%"></td>
            <td style="width:33.3%">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:none;text-align:center;font-size: 12px">
                    <tr>
                        <td>Pekanbaru, <?php echo $tgl_disahkan = $tgl_diterbitkan . ' ' . $daftar_bulan[$bulan_diterbitkan] . ' ' . $tahun_diterbitkan ?></td>
                    </tr>
                    <tr>
                        <td>Dokter Pemeriksa</td>
                    </tr>
                    <tr>
                        <td style="height:100px"></td>
                    </tr>
                    <tr>
                        <td>
                            <?php


                            ?>
                            <?php
                            // if (isset($model['is_pptk']) == 'false') :
                            ?>
                            <?php echo 'dr ' . $dataDokter->nama ?>
                            <br>
                            <?php echo $dataDokter->username ?>
                            <?php //else : 
                            ?>
                            <?php //echo $model['nama_pptk'] 
                            ?>
                            <br>
                            <?php //echo 'No. ' . $model['no_pptk'] 
                            ?>
                            <?php //endif; 
                            ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
</div>