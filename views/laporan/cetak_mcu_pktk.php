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
<div class="row" style="height:800px;margin:30px">
    <div class="col-md-12">
        <!-- kop surat -->
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
        <br>
    </div>
    <div class="col-md-12">
        <!-- data pribadi -->
        <!-- tinggal isinya -->

        <table width="100%" border="1" cellpadding="1" cellspacing="0" style="border-collapse:collapse;text-align:left;font-size:20px">
            <tr>
                <td>
                    <table width="100%">
                        <tr>
                            <td style="width:39%">No. Rekam Medis</td>
                            <td style="width:1%">:</td>
                            <td style="width:60%"><?= $data_pelayanan['no_rekam_medik'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="height:10px"></td>
                        </tr><!-- seperated -->
                        <tr>
                            <td style="width:39%">No. MCU</td>
                            <td style="width:1%">:</td>
                            <td style="width:60%"><?= $data_pelayanan['no_mcu'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="height:10px"></td>
                        </tr><!-- seperated -->
                        <tr>
                            <td style="width:39%">Nama</td>
                            <td style="width:1%">:</td>
                            <td style="width:60%"><?= $data_pelayanan['nama'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="height:10px"></td>
                        </tr><!-- seperated -->
                        <tr>
                            <td style="width:39%">Tempat & Tgl Lahir</td>
                            <td style="width:1%">:</td>
                            <td style="width:60%"><?php echo ($data_pelayanan['tempat'] . ',' . tgl_indo($data_pelayanan['tgl_lahir'])) ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="height:10px"></td>
                        </tr><!-- seperated -->
                        <tr>
                            <td style="width:39%">Jenis Kelamin</td>
                            <td style="width:1%">:</td>
                            <td> <?php
                                    if ($data_pelayanan['jenis_kelamin'] == 'L') {
                                        echo 'Laki-Laki';
                                    } else if ($data_pelayanan['jenis_kelamin'] == 'P') {
                                        echo 'Perempuan';
                                    } else {
                                        echo 'Kosong';
                                    }
                                    ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="height:10px"></td>
                        </tr><!-- seperated -->
                        <tr>
                            <td style="width:39%">Agama</td>
                            <td style="width:1%">:</td>
                            <td style="width:60%"><?= $data_pelayanan['agama'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="height:10px"></td>
                        </tr><!-- seperated -->
                        <tr>
                            <td style="width:39%">Kedudukan Dalam Keluarga</td>
                            <td style="width:1%">:</td>
                            <td style="width:60%"><?= $data_pelayanan['kedudukan_dalam_keluarga'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="height:10px"></td>
                        </tr><!-- seperated -->
                        <tr>
                            <td style="width:39%">Status Perkawinan</td>
                            <td style="width:1%">:</td>
                            <td style="width:60%"><?= $data_pelayanan['status_perkawinan'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="height:10px"></td>
                        </tr><!-- seperated -->
                        <tr>
                            <td style="width:39%">Pendidikan</td>
                            <td style="width:1%">:</td>
                            <td style="width:60%"><?= $data_pelayanan['pendidikan'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="height:10px"></td>
                        </tr><!-- seperated -->
                        <tr>
                            <td style="width:39%">Pekerjaan</td>
                            <td style="width:1%">:</td>
                            <td style="width:60%"><?= $dataBiodataUser[0]['u_jabatan'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="height:10px"></td>
                        </tr><!-- seperated -->
                        <tr>
                            <td style="width:39%">Alamat</td>
                            <td style="width:1%">:</td>
                            <td style="width:60%"><?= $data_pelayanan['alamat'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="height:10px"></td>
                        </tr><!-- seperated -->
                        <tr>
                            <td style="width:39%">Warga Negara</td>
                            <td style="width:1%">:</td>
                            <td style="width:60%"><?= $data_pelayanan['wni'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="height:10px"></td>
                        </tr><!-- seperated -->
                        <tr>
                            <td style="width:39%">Tanggal Pemeriksaan</td>
                            <td style="width:1%">:</td>
                            <td style="width:60%"><?= tgl_indo(date('Y-m-d', strtotime($data_pelayanan['tanggal_pemeriksaan']))) ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="height:10px"></td>
                        </tr><!-- seperated -->
                    </table>
                </td>
            </tr>
        </table>
        <!-- ANAMNESIS -->

        <?php
        // $anamesis = McuTAnamnesis::findOne(['nomor_rekam_medik'=>1]);
        // $pertanyaan_jawaban = json_decode($anamesis->pertanyaan_jawaban);
        ?>

        <table width="100%" border="1" cellpadding="1" cellspacing="0" style="border-collapse:collapse;text-align:left;font-size:20px">
            <tr>
                <td><b>Data Pelayanan</b></td>
            </tr>
            <tr>
                <td>
                    <table width="100%">
                        <?php
                        $pertanyaananam = Anamnesis::find()->where(['nomor_rekam_medik' => $_GET['id']])->one();
                        ?>
                        <tr>
                            <td style="width:39%">I. ANAMNESIS</td>
                            <td style="width:1%">:</td>
                            <td style="width:60%;height:150px"><?= $pertanyaananam['jawaban1'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="width:39%">A. Alasan kedatangan/keluhan utama</td>
                            <td style="width:1%">:</td>
                            <td style="width:60%;height:125px"><?= $pertanyaananam['jawaban2'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="height:10px"></td>
                        </tr><!-- seperated -->
                        <tr>
                            <td style="width:39%">B. Keluhan lain/tambahan</td>
                            <td style="width:1%">:</td>
                            <td style="width:60%;height:125px"><?= $pertanyaananam['jawaban4'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="height:10px"></td>
                        </tr><!-- seperated -->
                        <tr>
                            <td style="width:39%">C. Riwayat perjalanan penyakit sekarang</td>
                            <td style="width:1%">:</td>
                            <td style="width:60%;height:125px"><?= $pertanyaananam['jawaban5'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="height:10px"></td>
                        </tr><!-- seperated -->
                        <tr>
                            <td style="width:39%">D. Riwayat penyakit keluarga</td>
                            <td style="width:1%">:</td>
                            <td style="width:60%;height:125px"><?= $pertanyaananam['jawaban6'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="height:10px"></td>
                        </tr><!-- seperated -->
                        <tr>
                            <td style="width:39%">E. Riwayat penyakit dahulu</td>
                            <td style="width:1%">:</td>
                            <td style="width:60%;height:125px"><?= $pertanyaananam['jawaban3'] ?? '-' ?></td>
                        </tr>
                        <tr>
                            <td style="height:10px"></td>
                        </tr><!-- seperated -->
                        <tr>

                            <?php
                            if ($data_pelayanan['jenis_kelamin'] == 'P') :
                            ?>
                                <td style="width:39%">E1. Riwayat reproduksi</td>
                                <td style="width:1%">:</td>
                                <td style="width:60%">
                                    <?= 'G' . $pertanyaananam['g'] . 'P' . $pertanyaananam['p'] . 'A' . $pertanyaananam['a'] . 'H' . $pertanyaananam['h'] ?>
                                <?php elseif ($data_pelayanan['jenis_kelamin'] == 'L') : ?>
                                    -
                                <?php endif; ?>
                                </td>
                        </tr>
                        <tr>
                            <td style="height:10px"></td>
                        </tr><!-- seperated -->
                    </table>
                </td>
            </tr>
        </table>
        <!-- tinggal isinya -->


    </div>
</div>


<!-- page 2 -->
<div class="row" style="height:800px">

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
    <!-- ANAMNESIS -->
    <div class="col-md-12" style="margin:0px 30px 0px 30px">
        <table width="100%" border="1" cellpadding="1" cellspacing="0" style="border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td colspan="4" style="text-align:left;"><b> II. ANAMNESIS OKUPASI</b></td>
            </tr>
            <tr>
                <td colspan="4" style="text-align:left;"><b> 1. Jenis Pekerjaan</b></td>
            </tr>
            <tr>
                <td style="text-align:center;width:30%">Jenis pekerjaan </td>
                <td style="text-align:center;width:20%">Bahan/material yang digunakan </td>
                <td style="text-align:center;width:20%">Tempat kerja</td>
                <td style="text-align:center;width:20%">Masa Kerja <br> (dalaam bulan/tahun) </td>
            </tr>
            <?php
            foreach ($jenis_pekerjaan as $jenis_p) : ?>

                <tr>
                    <td><?= $jenis_p['jenis_pekerjaan'] ?></td>
                    <td><?= $jenis_p['bahan_material'] ?></td>
                    <td><?= $jenis_p['tempat_kerja'] ?></td>
                    <td><?= $jenis_p['masa_kerja'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <!-- no 2 page 2 -->
    <br>

    <div class="col-md-12" style="margin:0px 30px 0px 30px">
        <table width="100%" border="1" cellpadding="1" cellspacing="0" style="border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-collapse:collapse;text-align:left;font-size:12px">

                        <tr>
                            <td style="width:100%"><b>2. Uraian Tugas</b></td>
                        </tr>
                        <tr>
                            <td>
                                <table class="table" border="1" width="100%" cellpadding="1" cellspacing="0" style="border-collapse:collapse;text-align:left;font-size:12px">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Pekerjaan/Perusahaan Sebelum</th>
                                            <th>Pekejeraan/Perusahaan Sekarang</th>
                                            <th>Pekerjaan/Perusahan Dituju</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($dataBiodataUser as $itemPekerjaan) : ?>
                                            <tr>
                                                <td><?= $itemPekerjaan['ukb_krj_sebelum'] . " / " . $itemPekerjaan['ukb_krj_sebelum_perusahaan'] ?></td>
                                                <td><?= $itemPekerjaan['ukb_krj_skrg'] . " / " . $itemPekerjaan['ukb_krj_skrg_perusahaan'] ?></td>
                                                <td><?= $itemPekerjaan['u_jabatan'] . " / " . $itemPekerjaan['ukb_krj_dituju_perusahaan'] ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                        <tr>
                                            <td colspan="6">
                                                <table class="table">
                                                    <tr>
                                                        <td>Uraian Tugas</td>
                                                        <td>:</td>
                                                        <td>Uraian fungsi dan tanggungjawab dalam kegiatan pekerjaan</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Target Kerja</td>
                                                        <td>:</td>
                                                        <td>Sasaran yang telah ditetapkan untuk dicapai dalam suatu pekerjaan</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Cara Kerja</td>
                                                        <td>:</td>
                                                        <td>Tahapan yang dilakukan sehingga tercapai tujuan pekerjaan</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alat Kerja</td>
                                                        <td>:</td>
                                                        <td>Benda yang digunakan untuk mengerjakan sesuatu untuk mempermudah pekerjaan</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table class="table" border="1" cellpadding="1" cellspacing="0" style="border-collapse:collapse;text-align:left;font-size:12px" width="100%">
                                    <thead class="thead-light">
                                        <tr>
                                            <th style="text-align: center;">URAIAN</th>
                                            <th style="text-align: center;">PEKERJAAN UTAMA</th>
                                            <th style="text-align: center;">PEKERJAAN TAMBAHAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($dataBiodataUser as $u) : ?>
                                            <tr>
                                                <td colspan="3" align="center">RIWAYAT PEKERJAAN SEBELUMNYA</td>
                                            </tr>
                                            <tr>
                                                <td align="left">Uraian Tugas</td>
                                                <td><?php echo $u['ukb_sblm_utama_uraian'] ?></td>
                                                <td><?php echo $u['ukb_sblm_tambah_uraian'] ?></td>
                                            </tr>
                                            <tr>
                                                <td align="left">Target Kerja</td>
                                                <td><?php echo $u['ukb_sblm_utama_target'] ?></td>
                                                <td><?php echo $u['ukb_sblm_tambah_target'] ?></td>
                                            </tr>
                                            <tr>
                                                <td align="left">Cara Kerja</td>
                                                <td><?php echo $u['ukb_sblm_utama_cara'] ?></td>
                                                <td><?php echo $u['ukb_sblm_tambah_cara'] ?></td>
                                            </tr>
                                            <tr>
                                                <td align="left">Alat Kerja</td>
                                                <td><?php echo $u['ukb_sblm_utama_alat'] ?></td>
                                                <td><?php echo $u['ukb_sblm_tambah_alat'] ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" align="center">PEKERJAAN SEKARANG</td>
                                            </tr>
                                            <tr>
                                                <td align="left">Uraian Tugas</td>
                                                <td><?php echo $u['ukb_skrg_utama_uraian'] ?></td>
                                                <td><?php echo $u['ukb_skrg_tambah_uraian'] ?></td>
                                            </tr>
                                            <tr>
                                                <td align="left">Target Kerja</td>
                                                <td><?php echo $u['ukb_skrg_utama_target'] ?></td>
                                                <td><?php echo $u['ukb_skrg_tambah_target'] ?></td>
                                            </tr>
                                            <tr>
                                                <td align="left">Cara Kerja</td>
                                                <td><?php echo $u['ukb_skrg_utama_cara'] ?></td>
                                                <td><?php echo $u['ukb_skrg_tambah_cara'] ?></td>
                                            </tr>
                                            <tr>
                                                <td align="left">Alat Kerja</td>
                                                <td><?php echo $u['ukb_skrg_utama_alat'] ?></td>
                                                <td><?php echo $u['ukb_skrg_tambah_alat'] ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" align="center">PEKERJAAN YANG DITUJU/DILAMAR</td>
                                            </tr>
                                            <tr>
                                                <td align="left">Uraian Tugas</td>
                                                <td><?php echo $u['ukb_dituju_utama_uraian'] ?></td>
                                                <td><?php echo $u['ukb_dituju_tambah_uraian'] ?></td>
                                            </tr>
                                            <tr>
                                                <td align="left">Target Kerja</td>
                                                <td><?php echo $u['ukb_dituju_utama_target'] ?></td>
                                                <td><?php echo $u['ukb_dituju_tambah_target'] ?></td>
                                            </tr>
                                            <tr>
                                                <td align="left">Cara Kerja</td>
                                                <td><?php echo $u['ukb_dituju_utama_cara'] ?></td>
                                                <td><?php echo $u['ukb_dituju_tambah_cara'] ?></td>
                                            </tr>
                                            <tr>
                                                <td align="left">Alat Kerja</td>
                                                <td><?php echo $u['ukb_dituju_utama_alat'] ?></td>
                                                <td><?php echo $u['ukb_dituju_tambah_alat'] ?></td>
                                            </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <!-- no 3 page 2 -->
    <br>

    <div class="col-md-12" style="margin:0px 30px 0px 30px">
        <table width="100%" border="1" cellpadding="1" cellspacing="0" style="border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td colspan="4" style="text-align:left;"><b>3.Bahaya Potensial</b></td>
            </tr>
            <tr>
                <td colspan="4" style="text-align:center;">Bahaya Potensial</td>
            </tr>
            <tr>
                <td style="text-align:center;width:30%">Fisika </td>
                <td style="text-align:center;width:20%">Kimia </td>
                <td style="text-align:center;width:20%">Biologi</td>
                <td style="text-align:center;width:20%">Ergonomi<br> (sesuai briefing survey) </td>
            </tr>
            <?php
            foreach ($bahaya_potensial as $bahaya_potensial) : ?>

                <tr>
                    <td><?= $bahaya_potensial['fisik'] ?></td>
                    <td><?= $bahaya_potensial['kimia'] ?></td>
                    <td><?= $bahaya_potensial['biologi'] ?></td>
                    <td><?= $bahaya_potensial['ergonomi'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <!-- no 4 page 2 -->
    <div class="col-md-12" style="margin:0px 30px 0px 30px">
        <table width="100%" border="1" cellpadding="1" cellspacing="0" style="border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-collapse:collapse;text-align:left;font-size:12px">
                        <?php
                        $soal4 = Anamnesis::find()->where(['nomor_rekam_medik' => $_GET['id']])->one();

                        // foreach($anamnesis_okupasi as $ao):
                        ?>
                        <tr>
                            <td style="width:100%"><b>4. Hubungan pekerjaan dengan penyakit yang dialami (gejala / keluhan yang ada)</b></td>
                        </tr>
                        <tr>
                            <td>Jawaban:</td>
                        </tr>
                        <tr>
                            <td>
                                <?= ($soal4['jawaban8']) ? $soal4['jawaban8'] : '' ?>
                            </td>

                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <!-- no 5 page 2 -->

</div>










<div class="row" style="height: 800px;margin:30px 30px 0px 30px">
    <div class="col-md-12" >
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
    <h5>5. Body Discomfort Map : </h5>
    <?php
    $modelupdate = BodyDiscomfort::find()->where(['no_rekam_medik' => $data_pelayanan['no_rekam_medik'], 'no_daftar' => $data_pelayanan['no_registrasi']])->one();

    $warna['no_0_depan'] = $modelupdate->no_0_depan;
    $warna['no_1_depan'] = $modelupdate->no_1_depan;
    $warna['no_2_depan'] = $modelupdate->no_2_depan;
    $warna['no_3_depan'] = $modelupdate->no_3_depan;
    $warna['no_4_depan'] = $modelupdate->no_4_depan;
    $warna['no_5_depan'] = $modelupdate->no_5_depan;
    $warna['no_6_depan'] = $modelupdate->no_6_depan;
    $warna['no_7_depan'] = $modelupdate->no_7_depan;
    $warna['no_8_depan'] = $modelupdate->no_8_depan;
    $warna['no_9_depan'] = $modelupdate->no_9_depan;
    $warna['no_10_depan'] = $modelupdate->no_10_depan;
    $warna['no_11_depan'] = $modelupdate->no_11_depan;
    $warna['no_12_depan'] = $modelupdate->no_12_depan;
    $warna['no_13_depan'] = $modelupdate->no_13_depan;
    $warna['no_14_depan'] = $modelupdate->no_14_depan;
    $warna['no_15_depan'] = $modelupdate->no_15_depan;
    $warna['no_16_depan'] = $modelupdate->no_16_depan;
    $warna['no_17_depan'] = $modelupdate->no_17_depan;

    $warna['no_0_belakang'] = $modelupdate->no_0_belakang;
    $warna['no_1_belakang'] = $modelupdate->no_1_belakang;
    $warna['no_2_belakang'] = $modelupdate->no_2_belakang;
    $warna['no_3_belakang'] = $modelupdate->no_3_belakang;
    $warna['no_4_belakang'] = $modelupdate->no_4_belakang;
    $warna['no_5_belakang'] = $modelupdate->no_5_belakang;
    $warna['no_6_belakang'] = $modelupdate->no_6_belakang;
    $warna['no_7_belakang'] = $modelupdate->no_7_belakang;
    $warna['no_8_belakang'] = $modelupdate->no_8_belakang;
    $warna['no_9_belakang'] = $modelupdate->no_9_belakang;
    $warna['no_10_belakang'] = $modelupdate->no_10_belakang;
    $warna['no_11_belakang'] = $modelupdate->no_11_belakang;
    $warna['no_12_belakang'] = $modelupdate->no_12_belakang;
    $warna['no_13_belakang'] = $modelupdate->no_13_belakang;
    $warna['no_14_belakang'] = $modelupdate->no_14_belakang;
    $warna['no_15_belakang'] = $modelupdate->no_15_belakang;
    $warna['no_16_belakang'] = $modelupdate->no_16_belakang;
    $warna['no_17_belakang'] = $modelupdate->no_17_belakang;

    $styleAngka = 'fill: green;
    font-style: normal;
    font-weight: 600;
    font-size: 57.5px;
    line-height: 1.25;
    font-family: arial;
    letter-spacing: 0px;
    word-spacing: 0px;
    fill-opacity: 1;
    stroke: none;
    stroke-width: 0.9375;';

    $isiWarna = [];
    foreach ($warna as $key => $noWar) {
        switch ($warna[$key]) {
            case "Nyeri-nyeri":
                $isiWarna[$key] = 'fill:red;
    stroke: green!important;
    stroke-width: 6.9375!important;';
                break;

            case "Baal":
                $isiWarna[$key] = 'fill:grey;
    stroke: green!important;
    stroke-width: 6.9375!important;';
                break;

            case "Pegal":
                $isiWarna[$key] = 'fill:gold;
    stroke: green!important;
    stroke-width: 6.9375!important;';
                break;

            case "Kesemutan":
                $isiWarna[$key] = 'fill:pink;
    stroke: green!important;
    stroke-width: 6.9375!important;';
                break;

            default:
                $isiWarna[$key] = 'fill:white;
    stroke: green!important;
    stroke-width: 6.9375!important;';
        }
    }

    $gabung = '';
    $gabung .= '
			<!-- DEPAN -->
		<svg width="250px" height="550px" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" viewBox="0 0 1328.7402 2363.3858" id="svg2" version="1.1" inkscape:version="0.91 r13725" sodipodi:docname="body-boxes.svg" ontouchstart="" onmouseover="">
			<defs id="defs4" />
			<sodipodi:namedview id="base" pagecolor="#ffffff" bordercolor="#666666" borderopacity="1.0" inkscape:pageopacity="0.0" inkscape:pageshadow="2" inkscape:zoom="0.96166522" inkscape:cx="770.87972" inkscape:cy="1686.0342" inkscape:document-units="px" inkscape:current-layer="layer1" showgrid="false" borderlayer="true" inkscape:window-width="1011" inkscape:window-height="756" inkscape:window-x="66" inkscape:window-y="0" inkscape:window-maximized="0" />
			<metadata id="metadata7">
				<rdf:RDF>
					<cc:Work rdf:about="">
						<dc:format>image/svg+xml</dc:format>
						<dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
						<dc:title />
					</cc:Work>
				</rdf:RDF>
			</metadata>
			<style id="style4213">
				.body-part {
					fill: rgba(0, 0, 0, 0);
				}

				/*Phone*/
				@media only screen and (min-width : 300px) {
					.body-part:active {
						opacity: 0.9;
						fill: rgb(40, 80, 200);
						fill-opacity: 0.95;
						fill-rule: evenodd;
						stroke: #000000;
						stroke-width: 0;
						stroke-linecap: butt;
						stroke-linejoin: miter;
						stroke-opacity: 1 stroke-miterlimit:4;
						stroke-dasharray: none
					}
				}

				/*Desktops */
				@media only screen and (min-width : 1200px) {
					.body-part:hover {
						opacity: 0.9;
						fill: rgb(40, 80, 200);
						fill-opacity: 0.95;
						fill-rule: evenodd;
						stroke: #000000;
						stroke-width: 0;
						stroke-linecap: butt;
						stroke-linejoin: miter;
						stroke-opacity: 1 stroke-miterlimit:4;
						stroke-dasharray: none
					}
				}
			</style>

			<g inkscape:label="Layer 1" inkscape:groupmode="layer" id="layer1" transform="translate(0,1311.0238)">
				d=&quot;m 143.07265,931.56798 c -0.27146,-0.0383 -0.49962,0.009 -0.84571,0.0801 -0.49441,0.10169 -1.30443,0.22125 -1.72851,0.25586 l -0.002,0 c -0.50596,0.0413 -1.03427,0.12403 -1.40626,0.27539 -0.91989,0.37423 -1.85057,0.32233 -2.30078,0.0273 -0.27869,-0.18261 -0.47586,-0.31453 -0.77343,-0.35547 -0.14879,-0.0205 -0.35261,0.006 -0.50977,0.11719 -0.13957,0.0988 -0.1998,0.2284 -0.24414,0.34375 -0.0221,0.009 -0.12546,0.0349 -0.29688,0.0254 -0.34282,-0.0189 -0.93642,-0.15951 -1.7246,-0.43945 -0.47268,-0.16788 -0.85583,-0.27622 -1.1836,-0.31836 -0.16388,-0.0211 -0.31298,-0.0292 -0.47461,0 -0.16163,0.0292 -0.36358,0.11037 -0.49609,0.30078 0.0932,-0.13385 0.0959,-0.0853 0.043,-0.0645 -0.0529,0.0209 -0.15202,0.0504 -0.27344,0.0762 -0.24283,0.0516 -0.57993,0.0908 -0.92187,0.10156 -0.40191,0.0126 -0.80433,0.0632 -1.15235,0.13672 -0.34802,0.0735 -0.61033,0.11471 -0.88867,0.3457 -0.0433,0.0359 -0.11132,0.0673 -0.15039,0.0762 -0.0391,0.009 -0.0324,-0.0223 0.0606,0.0352 -0.18248,-0.11282 -0.31133,-0.10974 -0.4375,-0.11133 -0.12618,-0.002 -0.25115,0.0137 -0.38282,0.0371 -0.26332,0.0468 -0.55333,0.13338 -0.84179,0.25391 -0.42616,0.17806 -1.46463,0.45233 -2.16016,0.55664 -0.58071,0.0871 -0.93139,0.13005 -1.25977,0.32617 -0.16419,0.0981 -0.33035,0.28485 -0.38476,0.49219 -0.0538,0.20504 -0.0207,0.37417 0.0176,0.52148 -0.0187,0.006 -0.10301,0.061 -0.37305,0.125 -0.22081,0.0523 -0.46639,0.0956 -0.66797,0.11914 -0.20158,0.0235 -0.39694,0.0118 -0.35547,0.0195 -0.19323,-0.0359 -0.39522,-0.0202 -0.58398,0.0859 -0.18876,0.10615 -0.35742,0.3473 -0.35742,0.60156 0,-0.25596 0.0891,-0.21787 0.0352,-0.18164 -0.054,0.0362 -0.1674,0.0901 -0.28906,0.1211 -0.64537,0.1647 -1.40145,0.69409 -2.27539,1.36523 -0.87394,0.67114 -1.78055,1.47686 -2.41211,2.19531 -2.45898,2.79733 -4.87664,5.90825 -5.75781,7.45508 -0.49127,0.86244 -1.29874,2.22028 -1.78125,2.99805 -0.2609,0.42052 -0.49169,0.88067 -0.66406,1.30273 -0.17238,0.42206 -0.29883,0.76748 -0.29883,1.13477 0,0.31109 -0.14107,0.87666 -0.20313,0.99023 -0.13032,0.23849 -0.20149,0.50641 -0.28515,0.85352 -0.0837,0.34711 -0.15946,0.74644 -0.20899,1.13086 -0.0438,0.3396 -0.11241,0.6693 -0.18164,0.90625 -0.0346,0.11847 -0.0699,0.21602 -0.0937,0.26758 -0.0239,0.0516 -0.0833,0.0504 0.0742,-0.0469 -0.22974,0.14209 -0.33605,0.34522 -0.40234,0.53516 -0.0663,0.18994 -0.093,0.38368 -0.0918,0.57617 0.001,0.19249 0.0279,0.38285 0.10351,0.57226 0.0756,0.18942 0.21645,0.41298 0.49805,0.50977 -0.18684,-0.0642 -0.22873,-0.18202 -0.24023,-0.20898 -0.0115,-0.027 -0.002,-0.008 0.004,0.0332 0.0124,0.082 0.0228,0.25243 0.0195,0.47851 -0.007,0.45216 -0.0594,1.13655 -0.1582,2.00391 -0.22357,1.96211 -0.30513,2.93213 0.0332,3.63477 -0.0144,-0.03 0.0514,0.16201 0.0996,0.40429 0.0483,0.24228 0.10062,0.56608 0.1543,0.94141 0.10735,0.75065 0.21591,1.70923 0.29883,2.6875 0.0844,0.99527 0.18967,1.95218 0.29101,2.69922 0.0507,0.37352 0.10095,0.69514 0.14844,0.94726 0.0475,0.25212 0.0505,0.38166 0.16797,0.60547 0.024,0.0457 0.11464,0.29065 0.18945,0.56836 0.0748,0.27771 0.14787,0.60577 0.19727,0.9043 0.0799,0.48261 0.0825,0.72984 0.0547,0.83203 -0.0278,0.10219 -0.0787,0.17354 -0.33399,0.38086 -1.08651,0.88244 -1.50067,1.57994 -1.94531,3.28711 -0.59538,2.28579 -0.52763,3.82483 0.31445,7.46289 0.49398,2.134 1.12363,4.03093 1.82227,5.53516 0.69864,1.50422 1.44109,2.62214 2.30469,3.20898 0.3131,0.21277 0.63528,0.40465 0.91406,0.54883 0.13939,0.0721 0.26714,0.13295 0.38672,0.17969 0.11958,0.0467 0.20425,0.0918 0.39843,0.0918 0.0784,0 0.0326,3.5e-4 0.01,-0.0176 -0.0228,-0.0179 0.021,0.0113 0.0801,0.17383 0.11815,0.32517 0.2714,1.07597 0.50391,2.41602 0.91313,5.26264 1.84973,8.57814 3.55664,12.56634 0.3816,0.8917 0.55235,1.3235 0.63086,1.959 0.0785,0.6356 0.0587,1.5209 -0.004,3.2207 -0.0707,1.9206 -0.26301,3.9974 -0.51172,5.7656 -0.24871,1.7683 -0.57305,3.2579 -0.83008,3.8731 -0.55154,1.32 -2.21639,3.0117 -4.8789,4.7676 -3.80943,2.5125 -19.277292,9.9585 -25.710945,12.3515 -1.541924,0.5736 -3.45823,1.4363 -4.375,1.9844 -2.74028,1.6382 -3.639311,2.096 -5.785156,2.9473 -4.040947,1.6029 -6.880551,3.7736 -8.94336,6.8652 -0.583872,0.8751 -1.188272,2.3481 -1.835937,4.3359 -0.647665,1.9879 -1.323377,4.4767 -1.976563,7.3086 -2.265522,9.8222 -2.750408,15.5047 -2.640624,30.92 0.07566,10.6238 0.04146,11.1014 -1.873047,26.6796 -0.379137,3.0851 -0.955061,8.126 -1.28125,11.211 -0.876921,8.2937 -1.814739,12.1551 -4.205079,17.3457 -0.479145,1.0405 -1.332983,3.2356 -1.925781,4.9453 -0.58675,1.6923 -1.319554,3.774 -1.625,4.6133 -1.293956,3.5556 -2.872296,9.7431 -3.705078,14.5078 -0.483352,2.7655 -1.181382,6.4234 -1.546875,8.0996 -0.753453,3.4555 -1.563964,8.1205 -3.072266,17.6719 -2.18224,13.8191 -2.971302,17.6433 -4.480468,21.8125 -0.538961,1.4888 -1.157598,3.7686 -1.400391,5.1679 -0.229781,1.3245 -0.677435,3.3687 -0.982422,4.4864 -0.312774,1.146 -0.810939,2.9669 -1.105469,4.0449 -1.553088,5.6846 -1.974423,7.2958 -1.980468,8.1934 -0.0042,0.6287 -0.449645,1.7644 -1.728516,3.9375 -0.134804,0.229 -0.540747,0.7197 -1.09375,1.291 -0.553002,0.5713 -1.25992,1.2467 -2.039062,1.9492 -1.558286,1.4051 -3.407577,2.9237 -4.896485,3.9746 -0.710582,0.5015 -1.512135,1.2004 -1.912109,1.709 -0.137565,0.1748 -0.303968,0.34 -0.439453,0.4473 -0.135485,0.1072 -0.30483,0.1113 -0.117188,0.1113 -0.148422,0 -0.378847,0.053 -0.554687,0.1699 -0.175841,0.1169 -0.323026,0.2714 -0.521485,0.5039 -0.396917,0.465 -0.990821,1.2688 -2.078125,2.7559 -0.627306,0.858 -2.541352,2.9904 -4.1718752,4.6289 -0.826993,0.831 -1.5775533,1.6199 -2.1269528,2.2246 -0.2746997,0.3023 -0.4999867,0.5564 -0.6621093,0.7558 -0.081061,0.1 -0.1451689,0.1843 -0.1992188,0.2637 -0.027025,0.04 -0.050872,0.078 -0.076172,0.127 -0.0253,0.049 -0.072266,0.086 -0.072266,0.2734 0,-0.1255 0.08565,-0.1996 0.039063,-0.1601 -0.046588,0.039 -0.188658,0.1326 -0.4257812,0.2558 -0.4742464,0.2465 -1.3293296,0.6263 -2.7382813,1.2266 -0.4390605,0.187 -0.7655743,0.3547 -1.0136718,0.6328 -0.2480976,0.2781 -0.3417969,0.6539 -0.3417969,1.0058 0,0.7538 0.3734313,1.4342 1.0371093,1.7969 0.6636781,0.3627 1.5495441,0.487 2.7382813,0.4922 3.5014935,0.016 6.0806357,-0.8625 8.1757817,-2.834 0.988624,-0.9303 2.187218,-2.0004 3.158203,-2.834 0.44001,-0.3777 0.809939,-0.6838 1.113281,-0.9277 1.24e-4,0.016 0.0019,0.02 0.002,0.037 0.002,0.5714 -0.03028,1.4081 -0.0918,2.4141 -0.123029,2.0118 -0.363872,4.7023 -0.679687,7.3769 -0.327355,2.7725 -0.707122,5.9856 -0.84375,7.1407 -0.150391,1.2711 -0.175356,4.9727 -0.08008,8.4257 l 0.179687,6.4707 1.074219,0.961 c 1.095204,0.9787 2.551166,1.2278 3.757813,0.582 0.344444,-0.1844 0.666433,-0.4507 0.896484,-0.832 0.230051,-0.3813 0.37377,-0.8541 0.476562,-1.4864 0.15512,-0.954 0.168003,-2.8815 0.189454,-4.8867 0.03237,1.9282 -0.101935,2.5499 0.01172,5.1289 0.107362,2.4362 0.180631,3.8181 0.296875,4.7012 0.116244,0.8831 0.326213,1.352 0.632813,1.6895 0.667217,0.7345 1.67338,1.0487 2.632812,1.0351 0.959432,-0.014 1.928491,-0.3574 2.453125,-1.1582 0.278564,-0.4251 0.367674,-0.9885 0.449219,-2.1973 0.08154,-1.2087 0.130369,-3.0841 0.175781,-6.0976 0.04608,-3.0577 0.185836,-5.4961 0.310547,-7.5469 0.05347,0.7095 -0.07619,0.9092 0.04297,1.9551 0.37591,3.2996 0.414514,4.6387 0.193359,6.8457 -0.218733,2.183 -0.328156,3.3854 -0.267578,4.1973 0.03029,0.4059 0.10977,0.7318 0.271484,1.0058 0.161715,0.2741 0.390363,0.4589 0.617188,0.6074 1.268343,0.8312 3.031686,0.7241 4.066406,-0.3105 0.280174,-0.2801 0.507299,-0.6622 0.669922,-1.1953 0.162623,-0.5332 0.277577,-1.2289 0.373047,-2.2285 0.19094,-1.9993 0.298157,-5.2218 0.419922,-10.6953 0.04792,-2.154 0.107049,-4.209 0.166015,-5.7832 0.02948,-0.7872 0.0592,-1.4543 0.08594,-1.9512 0.02674,-0.4969 0.06148,-0.8665 0.06641,-0.8945 0.05677,-0.3235 0.407967,-1.0895 0.69336,-1.4473 0.184302,-0.2312 0.307007,-0.3104 0.353515,-0.3399 0.138756,0.1796 0.447254,1.0253 0.712891,2.4707 0.251638,1.3693 0.695895,3.3213 1.003906,4.3985 0.280394,0.9804 0.809122,3.6155 1.142578,5.748 0.341589,2.1845 0.609762,3.5211 1.029297,4.4082 0.209768,0.4436 0.474416,0.7883 0.820313,1.0078 0.345896,0.2196 0.743634,0.293 1.144531,0.293 0.671281,0 1.377035,-0.3342 1.916015,-0.7988 0.196397,-0.1692 0.370687,-0.3142 0.525391,-0.5195 0.154704,-0.2054 0.262188,-0.4646 0.316406,-0.7598 0.108438,-0.5905 0.07833,-1.3775 0.03906,-2.9629 -0.04422,-1.7851 -0.317838,-4.4662 -0.619141,-6.0547 -0.959748,-5.0601 -1.426701,-7.4246 -1.509765,-9.2422 -0.08306,-1.8176 0.205438,-3.1542 0.792968,-6.2539 0.969153,-5.113 1.43722,-7.4767 1.607422,-9.2285 0.170203,-1.7518 0.0316,-2.8542 -0.199218,-5.332 -0.11089,-1.1903 -0.05904,-2.8866 0.125,-4.0782 0.17935,-1.1613 0.39043,-2.6685 0.472656,-3.3789 0.0761,-0.6576 0.275979,-1.5223 0.34375,-1.6855 0.426096,-1.0263 2.12798,-5.8591 4.511718,-12.7715 3.722977,-10.7957 5.548726,-15.3698 9.421876,-23.6133 2.952759,-6.2846 6.606731,-15.5126 10.5,-26.5097 0.866734,-2.4482 2.660412,-6.8731 3.55664,-8.7754 0.713708,-1.515 3.263731,-8.9582 3.740234,-10.8731 0.116609,-0.4687 0.182866,-1.329 0.25,-2.5058 0.06713,-1.1769 0.115958,-2.6182 0.13086,-4.0508 0.04845,-4.6573 0.114623,-5.3343 0.78125,-7.711 1.906002,-6.7956 4.389781,-17.0406 4.833984,-20.0078 0.123582,-0.8255 0.213551,-1.2971 0.308594,-1.8203 0.134977,0.6904 0.281419,1.5185 0.474609,2.7285 0.937671,5.8727 1.280219,10.6942 1.267579,17.8418 -0.01821,10.259 -0.372846,14.0069 -2.035157,21.4551 -2.326424,10.4233 -2.376766,10.8011 -2.43164,17.6074 -0.08203,10.1695 -0.623926,14.6092 -2.326172,19.2735 -2.140685,5.8657 -3.030766,14.1831 -3.298828,30.291 -0.04227,2.5397 -0.09471,4.8892 -0.144532,6.6289 -0.02491,0.8699 -0.05012,1.5882 -0.07227,2.0976 -0.01107,0.2548 -0.01983,0.4569 -0.0293,0.5977 -0.0047,0.07 -0.01014,0.1263 -0.01367,0.1602 -0.0035,0.034 -0.0244,0.081 0.0078,-0.018 -0.07113,0.2185 -0.06583,0.3813 -0.07227,0.6465 -0.0064,0.2651 -0.0018,0.5984 0.01172,1.0019 0.02713,0.8071 0.09104,1.8885 0.185547,3.1817 0.189007,2.5864 0.49774,6.0212 0.875,9.7695 0.754519,7.4966 1.777831,16.2417 2.636718,21.9414 0.231294,1.535 0.681394,4.6862 0.998047,6.9941 0.318621,2.3222 0.885872,5.8444 1.265625,7.8575 0.187205,0.9923 0.357418,2.0032 0.480469,2.8261 0.12305,0.823 0.195312,1.501 0.195312,1.6641 0,0.3603 0.08126,1.0218 0.207032,1.9434 0.125774,0.9215 0.297895,2.0572 0.488281,3.1894 0.377179,2.2433 0.944676,6.0719 1.255859,8.4863 1.178583,9.1441 2.332128,15.6277 3.355469,18.6524 2.014148,5.9535 1.833984,4.6582 1.833984,13.7031 0,4.5517 0.108993,10.3395 0.244141,12.9063 0.237316,4.5074 0.230461,4.6099 -0.611328,8.9804 -1.072084,5.5665 -1.606699,8.8154 -1.986328,12.0801 -1.21629,10.4601 -1.286329,11.4621 -1.257813,17.8418 0.02662,5.954 0.130116,7.3295 1.041016,13.7891 0.553284,3.9234 1.144692,8.4701 1.308594,10.0625 0.166889,1.6216 0.54306,5.087 0.83789,7.707 0.294117,2.6135 0.802068,7.4652 1.126953,10.7734 0.32655,3.3253 1.088758,9.688 1.697266,14.1621 0.602617,4.4306 0.931045,7.1725 1.029297,9.0704 0.09825,1.8978 -0.02461,2.9285 -0.326172,4.041 -0.886321,3.2695 -1.358696,5.0464 -1.585938,6.2734 -0.227241,1.227 -0.197061,1.9287 -0.08594,2.8691 0.405958,3.4348 0.271722,4.0399 -1.695313,7.9278 -1.227768,2.4269 -1.941877,4.1941 -2.15625,5.4629 -0.187585,1.1102 -0.60966,2.166 -1.359374,3.3691 -1.777733,2.8527 -2.292259,3.5692 -4.384766,6.1055 -1.111484,1.3471 -2.499222,3.4161 -3.152344,4.7148 -0.303391,0.6033 -0.652695,1.2331 -0.966797,1.7539 -0.314102,0.5208 -0.615858,0.9524 -0.726562,1.0723 -0.385586,0.4175 -0.86936,1.0396 -1.140625,1.4746 -0.243359,0.3903 -0.417674,0.9798 -0.652344,1.8106 -0.23467,0.8307 -0.485906,1.854 -0.71875,2.9023 -0.465689,2.0967 -0.861328,4.2262 -0.861328,5.2598 0,0.887 0.249995,1.9492 0.605469,2.914 0.355473,0.9649 0.771782,1.8103 1.351562,2.2891 0.06472,0.053 0.283203,0.5041 0.283203,1.0722 0,0.8301 0.134597,1.5351 0.439453,2.0958 0.304857,0.5606 0.813536,0.967 1.427735,1.0898 0.422325,0.085 0.586151,0.2211 0.814453,0.7676 0.521082,1.247 1.634846,2.1269 2.865234,2.1269 0.229179,0 0.25643,0.023 0.289063,0.053 0.03263,0.03 0.121999,0.1676 0.21875,0.4941 0.207381,0.6998 0.733953,1.2963 1.361328,1.7539 0.627374,0.4576 1.364406,0.7793 2.101562,0.7793 0.563653,0 1.197292,-0.1969 1.792969,-0.457 0.595677,-0.2601 1.119932,-0.525 1.435547,-0.9922 0.133505,-0.1976 0.195879,-0.3845 0.294922,-0.6582 0.09904,-0.2737 0.202649,-0.5983 0.291016,-0.9199 0.194261,-0.7072 0.731874,-1.8594 1.267578,-2.7891 0.0077,-0.013 0.01382,-0.02 0.02148,-0.033 -0.244974,0.7453 -0.512652,1.4978 -0.570312,2.3047 -0.0819,1.146 -0.03558,2.1914 0.43164,2.9043 0.650056,0.9922 1.67416,1.6371 2.896484,1.8984 1.222325,0.2613 2.646529,0.1577 4.183594,-0.2988 1.248494,-0.3708 1.820134,-0.8144 2.683598,-2.0899 0.58666,-0.8665 1.21682,-2.1557 1.47069,-3.0371 0.21378,-0.7421 0.66068,-1.8952 0.94727,-2.457 0.38036,-0.7455 0.9372,-2.513 1.34766,-4.1406 0.40316,-1.5987 0.86397,-3.3353 1.00196,-3.7852 0.0636,-0.2073 0.0909,-0.4366 0.12304,-0.7597 0.0322,-0.3232 0.0602,-0.7199 0.082,-1.17 0.0436,-0.9001 0.065,-2.0098 0.0547,-3.1211 -0.0427,-4.5921 0.38926,-7.5951 1.21875,-9.2363 0.38483,-0.7613 1.00065,-2.3824 1.42579,-3.7148 0.67377,-2.1118 0.81032,-3.1818 1.00976,-7.9727 0.26575,-6.3847 0.62716,-8.3917 2.77344,-15.416 0.74936,-2.4526 0.6424,-4.5478 -0.4082,-8.6895 -0.5688,-2.2424 -0.6875,-3.3333 -0.6875,-6.3476 0,-4.4535 0.66689,-11.9866 1.42382,-16.1035 0.31263,-1.7006 0.67251,-3.8357 0.80469,-4.7813 0.12503,-0.8944 0.48341,-2.8547 0.78906,-4.3066 0.30938,-1.4696 0.77054,-3.8001 1.02735,-5.1934 0.25059,-1.3597 0.94715,-4.5183 1.54101,-6.9746 3.46613,-14.3368 3.95408,-17.1834 3.95508,-23.0605 4.7e-4,-2.3189 -0.13149,-5.9718 -0.29492,-8.1602 -0.72568,-9.7182 -1.0903,-14.7807 -1.13086,-17.8887 -0.0406,-3.108 0.22697,-4.2246 0.79687,-6.248 0.43586,-1.5475 1.33049,-4.1053 1.96485,-5.6152 0.65838,-1.567 1.74213,-4.5238 2.42773,-6.6192 1.42463,-4.3541 1.80268,-7.1174 1.80469,-13.1777 10e-4,-3.4026 0.14644,-8.4138 0.3457,-12.9317 0.19927,-4.5178 0.45956,-8.5814 0.66211,-9.9589 0.2302,-1.5655 0.53926,-4.4913 0.69336,-6.5469 0.32919,-4.3921 1.88207,-14.2051 3.19531,-20.1621 0.53265,-2.4161 1.29616,-6.884 1.70704,-9.9824 0.20405,-1.539 0.39992,-2.9769 0.55273,-4.0528 0.0764,-0.5379 0.14197,-0.9858 0.19141,-1.3086 0.0198,-0.1294 0.0346,-0.2224 0.0488,-0.3086 0.0719,0.016 0.0928,0.013 0.25782,0.076 0.66514,0.255 1.67173,0.2603 2.75,0.1465 1.44651,-0.1529 2.30173,-0.4846 3.85937,-1.4922 0.77598,-0.5019 1.2651,-0.7826 1.50196,-0.873 0.0332,-0.013 0.0124,-0.01 0.0332,-0.012 0.0204,0.071 0.043,0.1558 0.0703,0.2735 0.0647,0.2791 0.1426,0.6707 0.22656,1.1406 0.16793,0.9398 0.36178,2.1922 0.53711,3.5195 0.39796,3.0126 1.27446,7.4791 2.2793,11.625 2.10556,8.6875 5.18726,23.6212 5.86133,28.375 0.29093,2.0519 0.67018,5.964 0.83593,8.6426 0.16719,2.7016 0.42239,6.0341 0.57227,7.4434 0.14274,1.3423 0.26656,4.255 0.26953,6.3984 0.004,2.7736 0.18248,4.9447 0.5957,7.207 0.65395,3.5801 2.70397,9.7354 4.29493,12.8926 0.52223,1.0363 1.63492,3.6326 2.4375,5.6973 l 1.4375,3.6992 0.24023,6.916 c 0.49538,14.2567 0.78099,21.7971 1.25586,26.7871 0.47487,4.9901 1.14848,7.4411 2.38672,11.3867 2.90553,9.2588 3.24513,10.4921 4.41016,16.0977 0.82391,3.9644 3.02432,16.1869 3.80273,21.1191 1.54285,9.776 1.61723,15.9504 0.32813,20.0762 -0.95018,3.0412 -0.80458,4.9249 0.62304,8.0938 0.59959,1.3308 1.03413,2.8177 1.14844,3.8711 0.11992,1.105 0.65858,3.0975 1.2207,4.6015 0.74611,1.996 1.01452,3.193 1.16211,5.1836 0.10992,1.4826 0.30807,3.1447 0.48242,3.8613 0.14892,0.6121 0.44787,1.8726 0.66211,2.795 0.22558,0.971 0.84584,3.0366 1.39844,4.6679 0.89741,2.6492 0.99857,3.2653 1.25195,7.5703 0.19002,3.2281 0.50607,6.2123 0.90039,8.6485 0.39433,2.4362 0.84854,4.3048 1.39454,5.4062 0.3947,0.7962 0.96858,2.3158 1.23242,3.2715 0.28937,1.0481 0.77105,2.2873 1.18164,2.9356 0.8473,1.3377 2.3249,2.7099 3.60351,3.414 l -0.0254,0.086 0.40039,0.1796 c 1.23352,0.5532 2.88101,0.4595 4.32032,0.057 0.71965,-0.2014 1.38509,-0.4861 1.91992,-0.8516 0.52313,-0.3574 0.93235,-0.8083 1.0625,-1.3867 0.9212,0.8397 2.35561,0.8774 3.60742,0.5391 0.63207,-0.1709 1.2271,-0.4457 1.70313,-0.8262 0.47602,-0.3805 0.84656,-0.8867 0.91796,-1.5 0.0173,-0.149 0.0382,-0.2387 0.0508,-0.2773 -0.0122,0.013 0.17098,-0.041 0.62696,-0.041 0.77061,0 1.4514,-0.2408 1.8789,-0.7754 0.4275,-0.5345 0.57813,-1.2645 0.57813,-2.1718 0,-0.2509 0.005,-0.4252 0.0137,-0.5567 0.022,0 0.016,0 0.041,0.01 0.69576,0.1747 1.40011,-0.093 1.83008,-0.6269 0.42996,-0.5334 0.64773,-1.2858 0.66992,-2.1758 0.0251,-1.0096 0.10889,-1.6879 0.24804,-2.1016 0.13915,-0.4136 0.27956,-0.5571 0.55664,-0.6914 0.35197,-0.1706 0.6101,-0.4603 0.89454,-0.8261 0.28443,-0.3659 0.56355,-0.8091 0.79687,-1.2813 0.69364,-1.4036 0.81334,-2.0645 0.81836,-4.7031 0.008,-4.0291 -0.72163,-6.6551 -2.51563,-8.8047 -0.29703,-0.356 -0.84333,-1.2588 -1.11328,-1.8691 -0.37008,-0.8367 -1.36546,-2.4238 -2.51172,-4.1289 -1.14625,-1.7052 -2.42363,-3.481 -3.32226,-4.5586 -0.3455,-0.4143 -0.66035,-0.821 -0.88281,-1.1328 -0.11123,-0.156 -0.19846,-0.2893 -0.25196,-0.379 -0.0267,-0.045 -0.0457,-0.079 -0.0508,-0.09 -0.005,-0.011 0.0195,-0.027 0.0195,0.123 0,-0.2683 -0.0836,-0.3872 -0.16992,-0.5488 -0.0863,-0.1616 -0.19547,-0.3248 -0.32422,-0.4765 -0.0141,-0.017 -0.20998,-0.3304 -0.39062,-0.7012 -0.18064,-0.3709 -0.38264,-0.8305 -0.5586,-1.2793 -1.13965,-2.9071 -3.44304,-7.2247 -4.87109,-9.084 l -1.19336,-1.5527 -0.15234,-4.1817 c -0.16551,-4.5171 -0.683,-7.4067 -1.78711,-9.0918 -0.11546,-0.1762 -0.20625,-0.354 -0.25,-0.4668 -0.0139,-0.036 -0.0154,-0.041 -0.0195,-0.057 0.002,-0.014 0.0235,-0.039 0.0254,-0.051 0.012,-0.076 0.0124,-0.1348 0.01,-0.1933 -0.005,-0.1172 -0.0242,-0.2322 -0.0508,-0.3633 -0.0531,-0.2622 -0.14331,-0.5762 -0.25976,-0.9063 -0.26117,-0.7402 -0.42028,-2.6512 -0.35157,-5.959 0.0687,-3.3077 0.33689,-8.0498 0.8125,-14.6425 0.15663,-2.1711 0.34626,-6.1369 0.42383,-8.8418 0.23866,-8.3155 0.69958,-17.0324 1.1211,-21.2481 1.09829,-10.9848 1.31554,-21.9473 0.55273,-28.6699 -0.54688,-4.8196 -2.40853,-14.2508 -3.69336,-18.7051 -2.07183,-7.1827 -2.30733,-8.5055 -2.61914,-14.7285 -0.55101,-10.9975 0.14379,-21.4199 1.70117,-26.4316 0.29643,-0.9539 0.72653,-2.6406 0.9707,-3.8067 0.1696,-0.81 0.42188,-2.7014 0.73047,-5.2929 0.3086,-2.5916 0.6664,-5.8585 1.02539,-9.3184 0.71799,-6.9198 1.43847,-14.6102 1.75782,-19.2207 0.29792,-4.3013 0.85888,-10.2909 1.24218,-13.2715 0.8093,-6.2932 2.21042,-21.0344 2.70704,-28.4648 0.29681,-4.4411 0.27748,-5.675 -0.1504,-9.6094 -0.26814,-2.466 -0.65341,-5.5404 -0.86132,-6.8731 -0.53168,-3.4082 -0.91198,-6.6157 -1.26172,-10.6093 -0.27131,-3.0981 -0.66711,-5.2713 -1.97266,-10.8516 -0.17136,-0.7324 -0.30437,-1.7644 -0.29687,-2.0957 0.006,-0.2779 -0.0292,-0.5583 -0.0918,-0.8164 -0.0626,-0.2581 -0.13059,-0.484 -0.3125,-0.7031 -0.0197,-0.024 -0.0167,-0.022 -0.0312,-0.043 0.005,-0.05 0.0119,-0.1028 0.01,-0.1406 -0.006,-0.1145 -0.0253,-0.2257 -0.0527,-0.3594 -0.0548,-0.2674 -0.14612,-0.6094 -0.26562,-0.9883 -0.22077,-0.7 -0.44767,-1.7001 -0.48633,-2.0722 -0.0794,-0.7632 -0.33073,-2.1442 -0.60352,-3.4668 -0.27278,-1.3227 -0.53976,-2.5108 -0.74414,-3.043 -0.21014,-0.5472 -0.54338,-1.0478 -1.05273,-1.3203 -0.0942,-0.051 -0.11912,-0.072 -0.16992,-0.2129 -0.0508,-0.1404 -0.0914,-0.4058 -0.0937,-0.8086 -0.004,-0.7111 -0.12864,-1.7389 -0.29493,-2.418 -0.0161,-0.066 -0.0696,-0.4464 -0.11523,-0.957 -0.0457,-0.5107 -0.0937,-1.183 -0.14258,-1.9668 -0.0977,-1.5675 -0.19634,-3.5792 -0.26953,-5.6543 -0.34502,-9.7811 -0.74341,-12.8506 -3.33789,-25.7051 -1.94246,-9.6241 -1.71055,-17.543 0.94922,-31.875 0.51558,-2.7784 1.14724,-6.4608 1.4082,-8.209 0.0542,-0.3629 0.11056,-0.6038 0.16797,-0.9277 0.10125,1.1105 0.17169,2.0607 0.39648,3.7793 0.33853,2.588 0.76017,5.4501 1.10352,7.3262 0.7958,4.3485 2.53071,11.6567 4.09375,17.2578 0.65984,2.3644 0.72947,3.0767 0.7832,7.7109 0.0186,1.5958 0.0697,3.0345 0.14453,4.1875 0.0748,1.1531 0.16318,1.9981 0.29883,2.5156 0.59472,2.2691 3.26544,9.5782 4.27735,11.709 1.64666,3.4674 2.42126,5.4591 5.10351,13.1133 3.34464,9.5448 4.09262,11.4853 8.00586,20.752 1.72162,4.0768 3.82441,9.2314 4.66211,11.4277 0.84978,2.228 2.48559,6.1954 3.64453,8.8437 2.13597,4.8815 3.69856,8.503 4.72656,10.9512 0.51401,1.2241 0.89505,2.1559 1.14454,2.8008 0.12474,0.3224 0.21718,0.5736 0.27539,0.748 0.0582,0.1745 0.0664,0.349 0.0664,0.1993 0,0.3196 0.0982,0.5167 0.22071,0.8281 0.12252,0.3113 0.2859,0.6657 0.46875,1.0078 0.29098,0.5444 0.40395,0.7792 0.47461,1.5977 0.0707,0.8184 0.064,2.1871 0.0352,4.7578 -0.0598,5.3402 0.35837,9.4201 1.35547,13.123 0.13752,0.5107 0.29767,1.6167 0.32812,2.3242 0.017,0.3961 0.0524,0.7407 0.10352,1.0079 0.0256,0.1335 0.0486,0.2424 0.10352,0.3671 0.0275,0.062 0.0522,0.1348 0.16601,0.2344 0.0166,0.014 0.0576,0.022 0.0801,0.037 0.0173,0.032 0.034,0.061 0.0644,0.1348 0.0874,0.2123 0.19794,0.5511 0.29688,0.9375 0.2145,0.8375 0.34998,2.7168 0.34961,4.8926 -3.7e-4,2.1757 -0.12151,4.6798 -0.36328,6.9004 -0.25025,2.2981 -0.33679,4.2857 -0.26172,5.8496 0.0751,1.5638 0.25649,2.689 0.7832,3.3945 0.67089,0.8986 1.66593,1.3115 2.58203,1.2012 0.9161,-0.1103 1.74755,-0.7783 2.00977,-1.8242 0.30681,-1.2239 0.6529,-4.6291 0.74609,-7.0079 0.0272,-0.6939 0.25579,-2.1041 0.4961,-2.998 0.23615,-0.8786 0.37771,-2.3646 0.44531,-3.6367 0.0602,1.7846 0.0581,4.3677 -0.0117,9.582 -0.0753,5.6277 -0.10798,8.6045 -0.0606,10.2754 0.0237,0.8354 0.0643,1.3448 0.14453,1.7246 0.0803,0.3798 0.23651,0.6542 0.38672,0.8359 0.50684,0.6132 1.31768,0.9086 2.13477,0.9981 0.81709,0.089 1.6695,-0.023 2.28515,-0.5215 0.34474,-0.2791 0.66226,-0.6671 0.77539,-1.3223 0.11314,-0.6551 0.13416,-1.6282 0.17579,-3.4941 0.048,-2.1509 0.17468,-4.2482 0.3457,-5.9824 0.17102,-1.7342 0.39898,-3.1264 0.60742,-3.7715 0.12677,-0.3926 0.16675,-0.9641 0.19141,-1.6856 0.22522,2.8815 0.34026,5.6483 0.28125,9.7715 -0.0475,3.3171 -0.0611,5.0888 0.13086,6.2285 0.096,0.5699 0.25422,1.0007 0.50976,1.3418 0.25554,0.3412 0.58024,0.5609 0.9336,0.7715 0.62989,0.3757 1.40373,0.4372 2.14257,0.293 0.73885,-0.1442 1.45946,-0.4999 1.98438,-1.0664 0.33295,-0.3592 0.59956,-0.7594 0.69922,-1.4043 0.0996,-0.6449 0.10351,-1.5562 0.10351,-3.2676 0,-1.9595 0.15904,-4.8174 0.34571,-6.2676 0.40966,-3.1823 0.33542,-7.3289 -0.0664,-9.9843 0.59275,1.848 0.85423,3.4861 1.24805,9.1582 0.18947,2.7292 0.33771,4.3147 0.64453,5.3847 0.30682,1.0701 0.88322,1.6434 1.63672,2.0117 l 0.002,0 c 0.48013,0.2343 0.82089,0.3907 1.22461,0.4063 0.40372,0.016 0.75291,-0.1166 1.22656,-0.3145 0.44145,-0.1844 0.84054,-0.4004 1.16016,-0.7539 0.31962,-0.3534 0.53259,-0.8191 0.66992,-1.4257 0.27465,-1.2134 0.30574,-3.0596 0.30273,-6.3477 -0.006,-5.9211 -0.0625,-6.5397 -1.24218,-13.1875 -1.15936,-6.5336 -1.27149,-7.3287 -1.27149,-9.1191 l 0,-0.5313 1.74024,1.707 c 3.20381,3.1407 5.7684,4.5772 8.74804,4.8164 1.19742,0.096 2.08716,0.043 2.76563,-0.3105 0.67847,-0.3535 1.02734,-1.0745 1.02734,-1.8828 0,-0.4412 -0.0776,-0.8817 -0.375,-1.2383 -0.29742,-0.3566 -0.71809,-0.6208 -1.4082,-1.0391 -1.69206,-1.0255 -2.80193,-2.1951 -3.62109,-3.8007 -0.37627,-0.7375 -1.23084,-1.8773 -1.99024,-2.6953 -1.78328,-1.9212 -3.62549,-4.2941 -4.47656,-5.7422 -0.29121,-0.4956 -0.87967,-1.142 -1.73828,-2 -0.85861,-0.8581 -1.9768,-1.893 -3.26563,-3.0196 -2.27817,-1.9912 -4.92909,-4.4648 -5.82422,-5.4218 -0.92302,-0.987 -1.50752,-1.7751 -2.08789,-3.0528 -0.58036,-1.2777 -1.14815,-3.0532 -1.96875,-5.9258 -0.50992,-1.785 -1.36536,-4.4914 -1.91211,-6.0488 -1.464,-4.1702 -4.31233,-13.1754 -4.91797,-15.5332 -0.53042,-2.0648 -1.12067,-5.4961 -1.68945,-9.8496 -0.54832,-4.1968 -1.43367,-10.0776 -2.5332,-16.8184 -0.60235,-3.6931 -1.47811,-9.3005 -1.94336,-12.4531 -0.46746,-3.1678 -1.10075,-6.7997 -1.43164,-8.166 -0.96779,-3.9959 -4.40041,-14.1802 -6.16016,-18.2832 -1.96628,-4.5847 -2.06376,-4.8454 -2.7539,-7.4902 -0.96712,-3.7063 -1.82209,-9.7513 -3.41016,-24.2227 -0.88965,-8.107 -1.16364,-14.5376 -1.22852,-29 -0.0629,-14.0306 -0.11503,-15.4747 -0.69531,-19.2559 -1.49855,-9.7647 -3.28894,-15.771 -5.86133,-19.2753 -1.38597,-1.8882 -4.58512,-4.5032 -8.66211,-7.1758 -3.52855,-2.3132 -4.47555,-2.7902 -9.47265,-4.7539 -6.24648,-2.4547 -16.53263,-7.5042 -27.36914,-13.4453 -2.52534,-1.3844 -4.81641,-3.4097 -5.73242,-4.9727 -0.32967,-0.5625 -0.77341,-1.9182 -1.12305,-3.4941 -0.34964,-1.576 -0.63106,-3.3987 -0.7461,-5.0118 -0.15199,-2.1312 -0.2355,-4.1424 -0.24804,-5.7148 -0.006,-0.7862 0.006,-1.4637 0.0351,-1.9863 0.0287,-0.5226 0.0877,-0.9134 0.11915,-1.0117 0.29672,-0.9271 0.37709,-1.2849 1.55078,-7.0547 l 0.71875,-3.53126 0.43164,-0.0117 c 0.77508,-0.0216 1.26095,-0.0422 1.72461,-0.22851 0.46366,-0.18635 0.80276,-0.50551 1.28906,-0.99219 0.70451,-0.70497 1.39158,-1.9587 1.97656,-3.46289 0.49098,-1.26235 1.06792,-3.26583 1.53125,-5.1543 0.46333,-1.88847 0.81445,-3.5826 0.81445,-4.45508 0,-0.80679 -0.28532,-1.91544 -0.66601,-3.00585 -0.38069,-1.09042 -0.83021,-2.10678 -1.33203,-2.70313 l -0.5625,-0.66797 0.38281,-1.07617 c 0.6453,-1.8169 1.0236,-4.75011 1.35352,-10.06445 0.3234,-5.21005 0.31564,-4.90214 0.18164,-7.75586 -0.13513,-2.87795 -0.53295,-5.34078 -1.19727,-6.58594 -0.20376,-0.38188 -0.55206,-1.17423 -0.73828,-1.68359 -0.23595,-0.64523 -0.80912,-1.62941 -1.3457,-2.36328 -4.17023,-5.70362 -6.36444,-8.05736 -8.8086,-9.3086 -0.7284,-0.37288 -1.66592,-1.01165 -1.91015,-1.2539 -0.48693,-0.48297 -1.33263,-0.88829 -2.11524,-1.10743 -0.59979,-0.16791 -1.45104,-0.66661 -1.65429,-0.88672 -1.10177,-1.19302 -2.39248,-1.69586 -4.25,-1.6875 -0.49408,0.002 -0.80798,-0.0232 -0.99805,-0.0527 -0.009,-0.0341 0.0249,-0.0462 0.008,-0.082 -0.12572,-0.26322 -0.36036,-0.31873 -0.49609,-0.33789 z m 0.4707,0.63476 c 0.006,0.0196 0.0204,0.0235 0.0234,0.0449 0.0169,0.11992 -0.025,0.22006 -0.0508,0.26171 0.0364,-0.0589 0.008,-0.20128 0.0273,-0.30664 z m -11.63672,0.24805 c -0.0668,0.096 -0.15116,0.11413 -0.14648,0.11328 0.005,-8.4e-4 0.0693,-0.005 0.16992,0.008 0.20132,0.0259 0.54137,0.11302 0.97656,0.26758 0.83217,0.29557 1.47591,0.46692 2.00391,0.4961 0.264,0.0146 0.50524,-0.003 0.73828,-0.10157 0.14149,-0.0596 0.21966,-0.21454 0.32226,-0.34179 0.0398,0.0193 0.0911,0.0335 0.26954,0.15039 0.86367,0.5659 2.07975,0.52904 3.22656,0.0625 0.0901,-0.0367 0.69314,-0.1709 1.11133,-0.20508 0.50003,-0.0408 1.29908,-0.15824 1.84961,-0.27149 0.15914,-0.0327 0.17131,-0.0283 0.26171,-0.0371 0.0365,0.0561 0.0558,0.13612 0.0957,0.16992 0.17488,0.1482 0.31573,0.16929 0.47461,0.20117 0.31775,0.0638 0.73015,0.0809 1.30468,0.0781 1.6971,-0.008 2.5586,0.33528 3.50977,1.36524 0.48132,0.52121 1.32698,0.95011 2.11914,1.17187 0.60929,0.17061 1.47271,0.64629 1.68164,0.85352 0.4516,0.44793 1.34442,1.01995 2.15625,1.43555 2.2056,1.12911 4.30854,3.33391 8.45703,9.00781 0.47694,0.6523 1.05653,1.68427 1.21485,2.11719 0.20794,0.56879 0.55022,1.34828 0.79687,1.81054 0.46038,0.86291 0.94854,3.3606 1.08008,6.16211 0.13428,2.85972 0.14187,2.43464 -0.18164,7.64649 -0.3283,5.28827 -0.72632,8.18456 -1.29688,9.79101 l -0.57422,1.61719 0.92969,1.10547 c 0.30194,0.35882 0.7934,1.36248 1.15235,2.39062 0.35895,1.02815 0.61132,2.13562 0.61132,2.67578 0,0.55319 -0.32881,2.35683 -0.78515,4.2168 -0.45634,1.85998 -1.03565,3.85548 -1.49219,5.0293 -0.55376,1.42393 -1.25558,2.62245 -1.75195,3.11914 -0.47324,0.47361 -0.70414,0.67142 -0.95313,0.77148 -0.24898,0.10007 -0.62015,0.13505 -1.38086,0.15625 l -1.22656,0.0352 -0.87695,4.30859 c -1.17358,5.76935 -1.23113,6.04205 -1.52149,6.94925 -0.10081,0.315 -0.13553,0.7068 -0.16601,1.2617 -0.0305,0.5548 -0.0435,1.2483 -0.0371,2.0488 0.0128,1.6009 0.0986,3.6276 0.25195,5.7774 0.11944,1.6747 0.4073,3.5342 0.76758,5.1582 0.36028,1.6239 0.76763,2.9868 1.23437,3.7832 1.08399,1.8496 3.45931,3.8877 6.11524,5.3437 10.86081,5.9545 21.15147,11.0114 27.48437,13.5 4.98696,1.9597 5.77532,2.3548 9.28907,4.6582 4.02445,2.6382 7.20041,5.2916 8.40429,6.9317 2.37738,3.2386 4.19016,9.1279 5.67969,18.8339 0.57601,3.7533 0.62068,5.0809 0.68359,19.1094 0.0649,14.4736 0.34087,20.9633 1.23438,29.1055 1.58901,14.48 2.43997,20.5444 3.4375,24.3672 0.69221,2.6527 0.83352,3.0439 2.80078,7.6308 1.70808,3.9826 5.17633,14.2787 6.10742,18.1231 0.30323,1.2521 0.95162,4.929 1.41602,8.0761 0.46667,3.1622 1.33987,8.7707 1.94336,12.4708 1.09839,6.7338 1.98336,12.6065 2.52929,16.7851 0.57153,4.3745 1.16281,7.8198 1.71485,9.9688 0.63994,2.4913 3.46289,11.4056 4.9414,15.6171 0.53466,1.523 1.39249,4.2347 1.89454,5.9922 0.82408,2.8848 1.39728,4.6926 2.01953,6.0625 0.62224,1.37 1.30378,2.2937 2.26758,3.3243 0.97794,1.0455 3.5997,3.4827 5.89648,5.4902 1.27577,1.1151 2.38054,2.1389 3.2168,2.9746 0.83625,0.8357 1.4159,1.5181 1.58203,1.8008 0.92648,1.5764 2.7799,3.9452 4.60742,5.914 0.69118,0.7446 1.55628,1.9302 1.83203,2.4707 0.89826,1.7608 2.17596,3.0992 3.99414,4.2012 0.67397,0.4085 1.02548,0.6651 1.1582,0.8242 0.13273,0.1592 0.14258,0.23 0.14258,0.5977 0,0.5832 -0.12037,0.8033 -0.49023,0.9961 -0.36987,0.1927 -1.10586,0.2908 -2.22266,0.2012 -2.71286,-0.2178 -5.00448,-1.4705 -8.1289,-4.5333 l -3.43946,-3.373 0,2.9102 c 0,1.8343 0.12719,2.7581 1.28711,9.2949 1.17888,6.6435 1.22072,7.0982 1.22656,13.0137 0.003,3.2787 -0.0517,5.1198 -0.27929,6.125 -0.11377,0.5025 -0.2572,0.7793 -0.43555,0.9765 -0.17835,0.1973 -0.41945,0.3399 -0.80273,0.5 -0.45091,0.1884 -0.65239,0.2461 -0.80274,0.2403 -0.15034,-0.01 -0.36637,-0.082 -0.82617,-0.3067 -0.62329,-0.3047 -0.8577,-0.4973 -1.11328,-1.3887 -0.25558,-0.8913 -0.42069,-2.4618 -0.60938,-5.1796 -0.46915,-6.7571 -0.66732,-8.0485 -1.60937,-10.5665 -0.35036,-0.9365 -0.63672,-2.226 -0.63672,-2.5546 0,-0.3007 -0.0313,-0.573 -0.10156,-0.8106 -0.0351,-0.1188 -0.0761,-0.2298 -0.15821,-0.3476 -0.0821,-0.1179 -0.25048,-0.2891 -0.51953,-0.2891 -0.23125,0 -0.44577,0.1555 -0.54297,0.2949 -0.0972,0.1395 -0.13589,0.271 -0.16601,0.4082 -0.0602,0.2745 -0.0707,0.5872 -0.0547,0.957 0.0321,0.7397 0.18328,1.6934 0.44141,2.6895 0.51311,1.9802 0.63003,7.4596 0.17578,10.9883 -0.19838,1.5411 -0.35352,4.3821 -0.35352,6.3945 0,1.7079 -0.0152,2.6194 -0.0918,3.1152 -0.0766,0.4959 -0.14397,0.5519 -0.44532,0.877 -0.35048,0.3783 -0.89185,0.6564 -1.4414,0.7637 -0.54955,0.1072 -1.0917,0.037 -1.43946,-0.1699 -0.32001,-0.1908 -0.50933,-0.3313 -0.64453,-0.5118 -0.13519,-0.1805 -0.24381,-0.4308 -0.32422,-0.9082 -0.16081,-0.9548 -0.16459,-2.736 -0.11718,-6.0488 0.0863,-6.0325 -0.049,-8.9634 -0.64844,-14.0547 -0.12261,-1.0413 -0.23933,-1.7913 -0.34961,-2.2871 -0.0551,-0.2479 -0.10152,-0.4251 -0.17969,-0.5918 -0.0391,-0.083 -0.0606,-0.1787 -0.24414,-0.2969 -0.0917,-0.059 -0.26053,-0.1087 -0.41406,-0.072 -0.15353,0.036 -0.24796,0.1273 -0.30078,0.1933 -0.10564,0.1321 -0.1183,0.2161 -0.14063,0.3028 -0.0223,0.087 -0.0381,0.174 -0.0508,0.2754 -0.0253,0.2027 -0.0408,0.4556 -0.0488,0.7714 -0.0161,0.6317 9.7e-4,1.5113 0.0547,2.6368 0.0622,1.3036 0.0809,2.3551 0.0606,3.1503 -0.0203,0.7953 -0.0926,1.3492 -0.16211,1.5645 -0.26654,0.825 -0.47827,2.2173 -0.65234,3.9824 -0.17408,1.7652 -0.29908,3.8817 -0.34766,6.0567 -0.0416,1.8634 -0.0777,2.8473 -0.16406,3.3476 -0.0864,0.5004 -0.11089,0.4662 -0.41797,0.7149 -0.28646,0.2319 -0.91752,0.3735 -1.54688,0.3046 -0.62936,-0.069 -1.22761,-0.3437 -1.47461,-0.6425 -0.0932,-0.1128 -0.12224,-0.1418 -0.17773,-0.4043 -0.0555,-0.2626 -0.1,-0.7352 -0.12305,-1.5469 -0.0461,-1.6234 -0.0147,-4.6055 0.0606,-10.2324 0.0774,-5.7807 0.10354,-8.9353 0.0117,-10.6856 -0.0459,-0.8751 -0.10692,-1.3928 -0.26172,-1.789 -0.0774,-0.1982 -0.19471,-0.3828 -0.37305,-0.5078 -0.17833,-0.1251 -0.38512,-0.1582 -0.53906,-0.1583 -0.20984,0 -0.34554,0.1215 -0.4043,0.1915 -0.0588,0.07 -0.0793,0.1189 -0.0977,0.1621 -0.0368,0.086 -0.0534,0.1522 -0.0703,0.2304 -0.0339,0.1565 -0.0584,0.3463 -0.082,0.5762 -0.0472,0.4597 -0.0811,1.0748 -0.0937,1.752 -0.0239,1.2835 -0.25891,3.1564 -0.48828,4.0097 -0.26515,0.9863 -0.49813,2.3723 -0.53125,3.2188 -0.0906,2.313 -0.48091,5.8637 -0.7168,6.8047 -0.17154,0.6842 -0.61798,1.0091 -1.1582,1.0742 -0.54022,0.065 -1.18151,-0.1656 -1.66016,-0.8067 -0.23771,-0.3184 -0.51656,-1.3597 -0.58789,-2.8457 -0.0713,-1.4859 0.0116,-3.4305 0.25782,-5.6914 0.2466,-2.2648 0.36876,-4.797 0.36914,-7.0097 3.7e-4,-2.2128 -0.10801,-4.0753 -0.38086,-5.1407 -0.10805,-0.4219 -0.2267,-0.7906 -0.3418,-1.0703 -0.0575,-0.1398 -0.10957,-0.2535 -0.18555,-0.3672 -0.0348,-0.052 -0.077,-0.1101 -0.16015,-0.1757 -0.005,-0.019 -0.005,-0.014 -0.01,-0.037 -0.0363,-0.1896 -0.0725,-0.5043 -0.0879,-0.8632 -0.0345,-0.8025 -0.18307,-1.8863 -0.35937,-2.541 -0.96742,-3.5927 -1.38147,-7.5691 -1.32227,-12.8516 0.0289,-2.5728 0.0398,-3.9415 -0.0391,-4.8555 -0.0789,-0.9139 -0.2806,-1.4074 -0.58789,-1.9824 -0.16372,-0.3064 -0.31599,-0.6352 -0.42188,-0.9043 -0.10588,-0.2691 -0.15039,-0.5484 -0.15039,-0.4609 0,-0.2525 -0.0522,-0.315 -0.11914,-0.5157 -0.0669,-0.2006 -0.16306,-0.4622 -0.29101,-0.7929 -0.25592,-0.6615 -0.63837,-1.5995 -1.1543,-2.8282 -1.03187,-2.4573 -2.5955,-6.0792 -4.73242,-10.9628 -1.15028,-2.6287 -2.78658,-6.6007 -3.625,-8.7989 -0.8505,-2.2299 -2.95018,-7.3746 -4.67578,-11.4609 -3.91158,-9.2627 -4.64114,-11.1545 -7.98438,-20.6953 -2.68427,-7.66 -3.48624,-9.7191 -5.14453,-13.211 -0.91836,-1.9338 -3.67224,-9.4778 -4.21094,-11.5332 -0.0894,-0.3411 -0.19628,-1.1977 -0.26953,-2.3261 -0.0733,-1.1285 -0.1242,-2.5533 -0.14258,-4.1348 -0.0539,-4.6449 -0.15037,-5.5682 -0.82031,-7.9687 -1.55392,-5.5685 -3.28711,-12.8776 -4.07227,-17.168 -0.33704,-1.8417 -0.75877,-4.7015 -1.0957,-7.2774 -0.33692,-2.5758 -0.58789,-4.9321 -0.58789,-5.5605 0,-0.1932 -0.0435,-0.3747 -0.15039,-0.541 -0.10688,-0.1664 -0.31569,-0.3438 -0.5957,-0.3438 -0.22617,0 -0.33959,0.1175 -0.39649,0.1797 -0.0569,0.062 -0.0806,0.1071 -0.10351,0.1504 -0.0459,0.087 -0.076,0.1675 -0.10742,0.2617 -0.0629,0.1885 -0.12434,0.428 -0.19141,0.7227 -0.13414,0.5893 -0.28123,1.387 -0.41211,2.2636 -0.25638,1.7175 -0.88894,5.4072 -1.40234,8.1739 -2.67002,14.3872 -2.91401,22.5094 -0.94727,32.2539 2.59236,12.8439 2.97402,15.7812 3.31836,25.543 0.0735,2.0835 0.17307,4.1022 0.27148,5.6816 0.0492,0.7897 0.0976,1.4691 0.14454,1.9941 0.047,0.5251 0.0813,0.8631 0.14062,1.1055 0.13543,0.5531 0.26228,1.5982 0.26563,2.1856 0.003,0.4573 0.0372,0.8191 0.15429,1.1425 0.11708,0.3235 0.3527,0.6009 0.63867,0.7539 0.0644,0.034 0.47015,0.4872 0.58985,0.7989 0.11139,0.2901 0.43003,1.5795 0.69922,2.8847 0.26919,1.3053 0.51861,2.7029 0.58789,3.3692 0.0573,0.552 0.28667,1.5063 0.52734,2.2695 0.11126,0.3527 0.19426,0.6738 0.23828,0.8887 0.0178,0.087 0.0253,0.1364 0.0293,0.1718 -0.009,0.032 -0.0461,0.07 -0.0488,0.096 -0.0197,0.1856 0.0253,0.2576 0.0566,0.33 0.0626,0.1449 0.14291,0.2563 0.24805,0.3828 -0.0131,-0.016 0.0693,0.1275 0.11133,0.3008 0.0421,0.1734 0.0663,0.3854 0.0625,0.5586 -0.0129,0.5707 0.13326,1.5379 0.32226,2.3457 1.30269,5.5681 1.68364,7.656 1.95117,10.711 0.35121,4.0103 0.73633,7.2452 1.27149,10.6757 0.20062,1.286 0.58684,4.3757 0.85351,6.8282 0.42591,3.9163 0.44235,5.0068 0.14649,9.4336 -0.49412,7.3931 -1.89847,22.1603 -2.70117,28.4023 -0.38914,3.026 -0.94857,9.0083 -1.24805,13.332 -0.31749,4.5838 -1.0367,12.2733 -1.75391,19.1856 -0.3586,3.4561 -0.71575,6.7188 -1.02343,9.3027 -0.30769,2.5839 -0.57203,4.5156 -0.7168,5.207 -0.23542,1.1243 -0.66939,2.8207 -0.94727,3.7149 -1.647,5.3001 -2.3007,15.7078 -1.74609,26.7773 0.31277,6.2424 0.58264,7.7614 2.6582,14.9571 1.25143,4.3385 3.12566,13.8284 3.66016,18.539 0.74657,6.5796 0.54027,17.5271 -0.55273,28.459 -0.42787,4.2793 -0.88782,12.9861 -1.12696,21.3184 -0.077,2.6859 -0.26736,6.6571 -0.42187,8.7988 -0.47616,6.6002 -0.74503,11.3536 -0.81446,14.6953 -0.0694,3.3417 0.0313,5.2367 0.41016,6.3106 0.10283,0.2914 0.18044,0.5728 0.2207,0.7714 0.0201,0.099 0.0298,0.1797 0.0312,0.211 7.2e-4,0.016 -0.002,0.02 0.002,-0.01 0.004,-0.028 2e-4,-0.1037 0.12109,-0.2246 l 0.002,0 c -0.22897,0.2272 -0.17642,0.4185 -0.16015,0.5351 0.0163,0.1167 0.0482,0.2123 0.0879,0.3145 0.0793,0.2043 0.19687,0.4251 0.3457,0.6523 0.88311,1.3478 1.45995,4.1307 1.62305,8.582 l 0.16406,4.5 1.38867,1.8067 c 1.28183,1.6689 3.6391,6.0509 4.73242,8.8398 0.18632,0.4753 0.39769,0.955 0.5918,1.3535 0.19411,0.3985 0.33515,0.6837 0.52734,0.9102 0.0776,0.091 0.15542,0.2078 0.20508,0.3008 0.0497,0.093 0.0508,0.2016 0.0508,0.076 0,0.186 0.043,0.2292 0.0723,0.293 0.0292,0.064 0.0612,0.1212 0.0996,0.1856 0.0768,0.1287 0.1756,0.2792 0.29687,0.4492 0.24255,0.34 0.56968,0.7597 0.92969,1.1914 0.85013,1.0195 2.12632,2.7905 3.25977,4.4766 1.13344,1.686 2.14549,3.3365 2.42773,3.9746 0.31695,0.7166 0.83838,1.6004 1.25977,2.1054 1.62702,1.9496 2.29074,4.2509 2.2832,8.1621 -0.005,2.6182 -0.0477,2.9118 -0.71484,4.2618 -0.20272,0.4102 -0.45256,0.8066 -0.68946,1.1113 -0.23689,0.3047 -0.49191,0.5152 -0.54101,0.539 -0.48939,0.2372 -0.86844,0.6792 -1.06836,1.2735 -0.19993,0.5943 -0.27463,1.3446 -0.30078,2.3945 -0.0183,0.7348 -0.21246,1.281 -0.44727,1.5723 -0.23481,0.2913 -0.44865,0.3755 -0.80859,0.2851 -0.16752,-0.042 -0.31081,-0.082 -0.50196,-0.08 -0.19114,0 -0.48415,0.1237 -0.61523,0.3242 -0.13108,0.2005 -0.14574,0.376 -0.16211,0.5703 -0.0164,0.1943 -0.0195,0.4193 -0.0195,0.7051 0,0.7892 -0.14724,1.2816 -0.35938,1.5468 -0.21214,0.2653 -0.5117,0.4004 -1.09765,0.4004 -0.49977,0 -0.83943,-0.024 -1.19336,0.2051 -0.17697,0.1146 -0.30582,0.3035 -0.36914,0.4766 -0.0633,0.1731 -0.086,0.3372 -0.10742,0.5215 -0.0321,0.2759 -0.21295,0.5639 -0.55078,0.8339 -0.33784,0.2701 -0.81988,0.5021 -1.33985,0.6426 -1.03994,0.2811 -2.19126,0.1571 -2.69531,-0.3164 l -1.26563,-1.1914 -0.34179,1.7051 c -0.0422,0.2112 -0.25853,0.5099 -0.66992,0.791 -0.4114,0.2811 -0.98919,0.5349 -1.625,0.7129 -1.2702,0.3555 -2.7752,0.3798 -3.63868,-0.01 -4.9e-4,-2e-4 -0.001,3e-4 -0.002,0 -3.4e-4,-10e-5 -0.002,2e-4 -0.002,0 -0.98774,-0.4436 -2.74629,-2.048 -3.54102,-3.3027 -0.27233,-0.43 -0.80102,-1.7119 -1.06445,-2.666 -0.28891,-1.0465 -0.85559,-2.5512 -1.30078,-3.4492 -0.43692,-0.8815 -0.91553,-2.7308 -1.30274,-5.1231 -0.3872,-2.3922 -0.70036,-5.3477 -0.88867,-8.5469 -0.25409,-4.3169 -0.39626,-5.156 -1.30273,-7.832 -0.54306,-1.6031 -1.16929,-3.6971 -1.37305,-4.5742 -0.21511,-0.9261 -0.51315,-2.1844 -0.66406,-2.8047 -0.12545,-0.5156 -0.34997,-2.2552 -0.45703,-3.6992 -0.15223,-2.0532 -0.45522,-3.4112 -1.22071,-5.459 -0.53172,-1.4226 -1.06668,-3.4621 -1.16406,-4.3594 -0.13207,-1.217 -0.59206,-2.7588 -1.23047,-4.1758 -1.38302,-3.0698 -1.49328,-4.4661 -0.58203,-7.3828 1.37587,-4.4035 1.25907,-10.697 -0.29297,-20.5312 -0.78399,-4.9676 -2.97758,-17.1486 -3.8125,-21.166 -1.16697,-5.615 -1.52706,-6.9333 -4.43359,-16.1953 -1.23408,-3.9325 -1.87627,-6.2468 -2.34571,-11.1797 -0.46943,-4.933 -0.75661,-12.473 -1.25195,-26.7285 l -0.24609,-7.086 -1.5,-3.8574 c -0.81284,-2.0911 -1.91088,-4.6626 -2.47657,-5.7852 -1.50872,-2.994 -3.58002,-9.2099 -4.20312,-12.6211 -0.40213,-2.2016 -0.5766,-4.2976 -0.58008,-7.0292 -0.003,-2.18 -0.12329,-5.0717 -0.27539,-6.502 -0.14494,-1.3629 -0.40194,-4.7112 -0.56836,-7.4004 -0.16782,-2.712 -0.54504,-6.614 -0.84375,-8.7207 -0.69243,-4.8834 -3.7662,-19.7457 -5.88086,-28.4707 -0.99744,-4.1154 -1.87002,-8.5691 -2.25976,-11.5195 -0.1771,-1.3408 -0.37133,-2.6038 -0.54297,-3.5645 -0.0858,-0.4803 -0.16516,-0.8842 -0.23633,-1.1914 -0.0356,-0.1536 -0.068,-0.2816 -0.10156,-0.3906 -0.0335,-0.109 -0.031,-0.1715 -0.15235,-0.332 -0.11092,-0.1468 -0.31618,-0.3028 -0.54492,-0.3399 -0.22874,-0.037 -0.43127,0.015 -0.63672,0.094 -0.41089,0.1568 -0.89844,0.4564 -1.6875,0.9668 -1.51069,0.9772 -2.06901,1.1949 -3.42187,1.3378 -0.97884,0.1034 -2.02634,0.013 -2.28516,-0.086 -0.31681,-0.1216 -0.54648,-0.209 -0.83984,-0.1934 -0.14668,0.01 -0.32424,0.062 -0.45899,0.1778 -0.13474,0.1154 -0.20542,0.264 -0.24218,0.3887 -0.0302,0.1024 -0.0315,0.138 -0.0488,0.2402 -0.0174,0.1021 -0.0393,0.2378 -0.0645,0.4023 -0.0504,0.3291 -0.11664,0.7783 -0.19335,1.3184 -0.15343,1.0802 -0.35028,2.5209 -0.55469,4.0625 -0.40608,3.0623 -1.17146,7.5399 -1.69141,9.8984 -1.32713,6.02 -2.87852,15.7894 -3.21679,20.3028 -0.1519,2.0262 -0.46277,4.9616 -0.68555,6.4765 -0.22479,1.5287 -0.47018,5.5298 -0.66992,10.0586 -0.19975,4.5289 -0.34655,9.5458 -0.34766,12.9766 -0.002,6.0203 -0.35126,8.5803 -1.75391,12.8672 -0.67505,2.0632 -1.76455,5.0297 -2.40039,6.5429 -0.65987,1.5707 -1.55151,4.1174 -2.00586,5.7305 -0.5748,2.0409 -0.87537,3.3617 -0.83398,6.5332 0.0414,3.1716 0.40902,8.2321 1.13477,17.9512 0.16022,2.1454 0.29148,5.8036 0.29101,8.084 -9.9e-4,5.8231 -0.46165,8.4976 -3.92578,22.8261 -0.59778,2.4725 -1.29432,5.6147 -1.55469,7.0274 -0.25416,1.3789 -0.71478,3.7111 -1.02148,5.168 -0.31045,1.4747 -0.66745,3.4212 -0.80078,4.375 -0.1262,0.9027 -0.4885,3.0521 -0.79883,4.7402 -0.77699,4.226 -1.43945,11.7313 -1.43945,16.2832 0,3.0424 0.13639,4.3056 0.71679,6.5937 1.03576,4.0832 1.12139,5.8674 0.42383,8.1504 -2.15298,7.0463 -2.5494,9.2531 -2.81641,15.668 -0.19896,4.7795 -0.30759,5.649 -0.96484,7.709 -0.41029,1.2859 -1.04946,2.9436 -1.36523,3.5683 -0.98093,1.9408 -1.36945,5.0419 -1.32618,9.6973 0.0102,1.092 -0.0122,2.1861 -0.0547,3.0625 -0.0212,0.4382 -0.0465,0.8215 -0.0762,1.1191 -0.0296,0.2977 -0.074,0.5277 -0.0859,0.5665 -0.16395,0.5345 -0.61037,2.227 -1.01563,3.8339 -0.39802,1.5784 -1.0192,3.4429 -1.26758,3.9297 -0.34215,0.6708 -0.77947,1.8083 -1.01757,2.6348 -0.19801,0.6874 -0.8304,2.0043 -1.337893,2.7539 -0.82877,1.2242 -0.97751,1.346 -2.14063,1.6914 -1.414136,0.42 -2.67743,0.4956 -3.689453,0.2793 -1.012023,-0.2163 -1.771144,-0.7061 -2.269531,-1.4668 -0.179306,-0.2736 -0.345623,-1.2497 -0.271485,-2.2871 0.07414,-1.0374 0.337659,-2.1691 0.705078,-2.8887 0.244924,-0.4796 0.39377,-0.7696 0.449219,-1.0898 0.02773,-0.1601 0.03276,-0.3979 -0.140625,-0.5996 -0.173388,-0.2017 -0.40132,-0.2285 -0.546875,-0.2285 -0.3241,0 -0.441972,0.1449 -0.572266,0.2636 -0.130293,0.1188 -0.250933,0.2609 -0.380859,0.4297 -0.259852,0.3377 -0.544659,0.7815 -0.828125,1.2735 -0.566931,0.9839 -1.121684,2.142 -1.363281,3.0214 -0.08089,0.2945 -0.178911,0.6007 -0.267578,0.8457 -0.08867,0.2451 -0.201551,0.4641 -0.183594,0.4375 -0.04174,0.062 -0.49874,0.4125 -1.007813,0.6348 -0.509072,0.2223 -1.102284,0.375 -1.392578,0.375 -0.420951,0 -1.016634,-0.2268 -1.511718,-0.5879 -0.495084,-0.3611 -0.880187,-0.8525 -0.992188,-1.2305 -0.115101,-0.3884 -0.235932,-0.7037 -0.501953,-0.9472 -0.266021,-0.2435 -0.62481,-0.3145 -0.964844,-0.3145 -0.734204,0 -1.553032,-0.5823 -1.941406,-1.5117 -0.303326,-0.7261 -0.841443,-1.2253 -1.541016,-1.3652 -0.330291,-0.066 -0.554559,-0.2337 -0.746093,-0.586 -0.191535,-0.3522 -0.31836,-0.8991 -0.31836,-1.6172 0,-0.7496 -0.13942,-1.423 -0.646484,-1.8417 -0.254152,-0.2099 -0.725296,-0.9871 -1.048828,-1.8653 -0.323533,-0.8781 -0.544922,-1.8805 -0.544922,-2.5683 0,-0.7442 0.378733,-2.9757 0.83789,-5.043 0.229579,-1.0336 0.47794,-2.0436 0.705079,-2.8477 0.227138,-0.804 0.475777,-1.4512 0.539062,-1.5527 0.208892,-0.335 0.699675,-0.9735 1.025391,-1.3262 0.244973,-0.2653 0.520893,-0.6873 0.849609,-1.2324 0.328716,-0.545 0.687654,-1.1934 1.003906,-1.8223 0.586169,-1.1656 1.980443,-3.2561 3.029297,-4.5273 2.100593,-2.5461 2.678727,-3.3518 4.462891,-6.2148 0.800484,-1.2846 1.28262,-2.4766 1.494141,-3.7286 0.177175,-1.0486 0.853826,-2.7905 2.0625,-5.1797 1.982321,-3.9181 2.209091,-5.0084 1.796874,-8.496 -0.107552,-0.9102 -0.135268,-1.4181 0.07813,-2.5704 0.213393,-1.1522 0.680688,-2.926 1.566406,-6.1933 0.325699,-1.2015 0.460953,-2.3914 0.359375,-4.3535 -0.101578,-1.9622 -0.431647,-4.7172 -1.035157,-9.1543 -0.606486,-4.4593 -1.369502,-10.8271 -1.693359,-14.125 -0.325484,-3.3144 -0.833698,-8.1639 -1.128906,-10.7871 -0.294474,-2.6169 -0.671864,-6.0841 -0.837891,-7.6973 -0.169014,-1.642 -0.758044,-6.1679 -1.3125,-10.0996 -0.90968,-6.4509 -1.004674,-7.7108 -1.03125,-13.6543 -0.02848,-6.3723 0.03598,-7.2653 1.251953,-17.7227 0.375991,-3.2334 0.904515,-6.4497 1.97461,-12.0058 0.842549,-4.3745 0.864474,-4.7094 0.626953,-9.2207 -0.132456,-2.5157 -0.242188,-8.3198 -0.242188,-12.8555 0,-9.0339 0.120055,-8.0917 -1.886718,-14.0234 -0.955769,-2.825 -2.136949,-9.3385 -3.3125,-18.459 -0.313687,-2.4338 -0.878875,-6.2601 -1.259766,-8.5254 -0.18867,-1.1221 -0.360327,-2.2493 -0.484375,-3.1582 -0.124048,-0.9089 -0.197266,-1.646 -0.197266,-1.8086 0,-0.3597 -0.08171,-0.9744 -0.207031,-1.8125 -0.125319,-0.8382 -0.296714,-1.8562 -0.486328,-2.8613 -0.373947,-1.9823 -0.942429,-5.51 -1.257812,-7.8086 -0.317309,-2.3127 -0.767102,-5.4622 -1,-7.0078 -0.853838,-5.6662 -1.875642,-14.4084 -2.628907,-21.8926 -0.376632,-3.7421 -0.687099,-7.1709 -0.875,-9.7422 -0.09395,-1.2856 -0.157238,-2.3586 -0.183593,-3.1426 -0.01318,-0.392 -0.01542,-0.7124 -0.0098,-0.9453 0.0057,-0.2329 0.04026,-0.411 0.02344,-0.3594 0.04057,-0.1247 0.02948,-0.1349 0.03516,-0.1894 0.0057,-0.055 0.01041,-0.1178 0.01563,-0.1953 0.01043,-0.1551 0.02194,-0.3639 0.0332,-0.6231 0.02253,-0.5183 0.04727,-1.2385 0.07227,-2.1113 0.04999,-1.7456 0.102203,-4.0995 0.144532,-6.6426 0.267539,-16.0765 1.171814,-24.3006 3.238281,-29.9629 1.749294,-4.7931 2.304417,-9.4064 2.386719,-19.6094 0.05485,-6.8028 0.08014,-6.9745 2.40625,-17.3964 1.671389,-7.4889 2.042293,-11.3898 2.060547,-21.6719 0.0127,-7.1806 -0.33414,-12.0824 -1.279297,-18.002 -0.224687,-1.4073 -0.40446,-2.4687 -0.560547,-3.2109 -0.07804,-0.3711 -0.14732,-0.661 -0.22461,-0.8906 -0.03865,-0.1148 -0.07817,-0.2139 -0.132812,-0.3125 -0.05464,-0.099 -0.114684,-0.2148 -0.302734,-0.3106 -0.188051,-0.096 -0.508298,-0.032 -0.638672,0.078 -0.130374,0.1105 -0.175107,0.2111 -0.220704,0.3106 -0.09119,0.1989 -0.152555,0.4259 -0.220703,0.7305 -0.136295,0.6092 -0.279001,1.5067 -0.458984,2.7089 -0.412212,2.7535 -2.91244,13.1223 -4.808594,19.8829 -0.676389,2.4115 -0.769803,3.3031 -0.818359,7.9707 -0.01474,1.4168 -0.06285,2.8479 -0.128906,4.0058 -0.06606,1.158 -0.166789,2.0958 -0.222657,2.3203 -0.41503,1.6679 -3.129986,9.5351 -3.673828,10.6895 -0.93092,1.976 -2.710844,6.3678 -3.595703,8.8672 -3.886296,10.9774 -7.535372,20.187 -10.46289,26.4179 -3.882337,8.2631 -5.733477,12.9042 -9.460938,23.7129 -2.382578,6.9091 -4.134195,11.8554 -4.490234,12.7129 -0.18804,0.4528 -0.329722,1.2263 -0.414063,1.9551 -0.07823,0.6759 -0.289332,2.1927 -0.466797,3.3418 -0.200902,1.3008 -0.254107,3.0203 -0.132812,4.3223 0.231728,2.4875 0.360579,3.4817 0.199218,5.1425 -0.16136,1.6609 -0.62418,4.0255 -1.59375,9.1407 -0.586102,3.0921 -0.899487,4.5381 -0.810546,6.4843 0.08894,1.9463 0.56813,4.3275 1.527343,9.3848 0.282968,1.4919 0.559312,4.1868 0.601563,5.8926 0.03927,1.5854 0.047,2.3849 -0.02148,2.7578 -0.03424,0.1865 -0.06906,0.2533 -0.132813,0.3379 -0.06376,0.085 -0.184704,0.1943 -0.380859,0.3633 -0.33498,0.2887 -1.038518,0.5566 -1.261719,0.5566 -0.287086,0 -0.463718,-0.044 -0.609375,-0.1367 -0.145658,-0.092 -0.292881,-0.2551 -0.451172,-0.5899 -0.316582,-0.6694 -0.609117,-1.9762 -0.947266,-4.1386 -0.338641,-2.1657 -0.848661,-4.7576 -1.166015,-5.8672 -0.289741,-1.0133 -0.740291,-2.9765 -0.984375,-4.3047 -0.276074,-1.5022 -0.466482,-2.3931 -0.933594,-2.957 -0.116778,-0.141 -0.26862,-0.2691 -0.462891,-0.334 -0.19427,-0.065 -0.413804,-0.05 -0.589843,0.014 -0.352079,0.127 -0.584695,0.3801 -0.84375,0.705 -0.423592,0.5312 -0.788438,1.2698 -0.898438,1.8965 -0.03676,0.2094 -0.0509,0.5077 -0.07813,1.0137 -0.02722,0.5059 -0.05633,1.1762 -0.08594,1.9668 -0.05923,1.5812 -0.119948,3.6402 -0.167969,5.7988 -0.121668,5.4692 -0.231479,8.6928 -0.416016,10.625 -0.09227,0.9661 -0.204838,1.6079 -0.333984,2.0313 -0.129146,0.4234 -0.256949,0.6163 -0.419922,0.7793 -0.627992,0.6279 -1.954724,0.7424 -2.810547,0.1816 -0.17386,-0.1139 -0.250223,-0.1837 -0.30664,-0.2793 -0.05642,-0.096 -0.109007,-0.2532 -0.132813,-0.5723 -0.04761,-0.638 0.04554,-1.8465 0.263672,-4.0234 0.226457,-2.26 0.185281,-3.735 -0.193359,-7.0586 -0.389856,-3.4219 -0.41345,-4.4267 -0.148438,-6.168 0.195177,-1.2823 0.303311,-2.3576 0.318359,-3.1406 0.0075,-0.3915 -0.0061,-0.7063 -0.05664,-0.9707 -0.02529,-0.1322 -0.0543,-0.2525 -0.134766,-0.3887 -0.08047,-0.1361 -0.285191,-0.3242 -0.539062,-0.3242 -0.263478,0 -0.387724,0.152 -0.449219,0.2324 -0.0615,0.081 -0.09083,0.1434 -0.119141,0.211 -0.05661,0.1351 -0.09814,0.2823 -0.138672,0.457 -0.08107,0.3495 -0.150351,0.8028 -0.197265,1.3028 -0.08957,0.9543 -0.300421,2.9407 -0.466797,4.4003 -0.175133,1.5365 -0.354785,6.017 -0.416016,10.0801 -0.04535,3.0092 -0.0933,4.8782 -0.171875,6.043 -0.07858,1.1647 -0.215868,1.6051 -0.289062,1.7168 -0.272987,0.4166 -0.910726,0.6968 -1.63086,0.707 -0.720133,0.01 -1.464415,-0.2527 -1.878906,-0.709 -0.191976,-0.2112 -0.275442,-0.3456 -0.380859,-1.1465 -0.105417,-0.8008 -0.181875,-2.183 -0.289063,-4.6152 -0.300979,-6.8298 -0.305604,-11.4356 -0.04102,-13.4433 0.07324,-0.5558 0.108646,-0.9583 0.09375,-1.2676 -0.0074,-0.1547 -0.0011,-0.2794 -0.115235,-0.4766 -0.05707,-0.099 -0.185481,-0.2374 -0.371094,-0.2793 -0.185612,-0.042 -0.344224,0.022 -0.435546,0.078 l -0.002,0 c -0.315563,0.1955 -0.350916,0.417 -0.417968,0.6485 -0.06705,0.2314 -0.103516,0.4897 -0.103516,0.7597 0,0.1747 -0.02686,0.3597 -0.0625,0.4844 -0.03564,0.1248 -0.145626,0.1723 0.01953,0.07 -0.185137,0.1146 -0.200531,0.2126 -0.228515,0.2793 -0.02799,0.067 -0.04302,0.1211 -0.05664,0.1797 -0.02724,0.1172 -0.04606,0.2489 -0.06445,0.4102 -0.03678,0.3225 -0.06732,0.7595 -0.0918,1.3125 -0.04896,1.106 -0.07422,2.6655 -0.07422,4.5703 0,3.2642 -0.05396,5.1928 -0.236328,6.3144 -0.09118,0.5609 -0.213909,0.9112 -0.347656,1.1329 -0.133747,0.2216 -0.273987,0.3376 -0.511719,0.4648 -0.832655,0.4456 -1.771965,0.31 -2.617187,-0.4453 l -0.002,0 -0.751953,-0.6738 -0.167969,-6.0391 c -0.09454,-3.4264 -0.05066,-7.2422 0.07227,-8.2813 0.136659,-1.1553 0.516389,-4.3681 0.84375,-7.1406 0.318029,-2.6934 0.560988,-5.3947 0.685547,-7.4316 0.06228,-1.0185 0.09585,-1.8691 0.09375,-2.4805 -0.0011,-0.3057 -0.0098,-0.5483 -0.0332,-0.7441 -0.01171,-0.098 -0.02426,-0.1806 -0.06055,-0.2852 -0.01815,-0.052 -0.03976,-0.1131 -0.105469,-0.1953 -0.06571,-0.082 -0.221931,-0.2031 -0.416015,-0.2031 -0.274891,0 -0.261968,0.062 -0.316406,0.094 -0.05444,0.031 -0.103277,0.063 -0.160157,0.1035 -0.113759,0.08 -0.25261,0.187 -0.417968,0.3184 -0.330717,0.2628 -0.76424,0.6248 -1.25586,1.0469 -0.98324,0.8441 -2.189708,1.9207 -3.193359,2.8652 -1.910453,1.7977 -4.1488562,2.5779 -7.4863284,2.5625 -1.1119871,0 -1.8641291,-0.1508 -2.2636719,-0.3691 -0.3995429,-0.2184 -0.515625,-0.4273 -0.515625,-0.92 0,-0.225 0.018507,-0.262 0.087891,-0.3398 0.069384,-0.078 0.2668891,-0.2102 0.6582031,-0.377 1.4141863,-0.6025 2.2733804,-0.9816 2.8085938,-1.2597 0.2676067,-0.1391 0.4558147,-0.2492 0.6113281,-0.3809 0.1555134,-0.1316 0.3144531,-0.3459 0.3144531,-0.6035 0,0.1682 -0.034279,0.1763 -0.039063,0.1856 -0.00478,0.01 6.869e-4,0 0.013672,-0.024 0.02597,-0.038 0.079589,-0.1082 0.1503906,-0.1953 0.1416026,-0.1742 0.3576648,-0.4206 0.625,-0.7148 0.5346704,-0.5885 1.2778814,-1.3677 2.0957036,-2.1895 1.659106,-1.6672 3.543299,-3.7527 4.269531,-4.7461 1.08598,-1.4852 1.686806,-2.2938 2.03125,-2.6973 0.172222,-0.2017 0.281807,-0.2973 0.316406,-0.3203 0,0 0,0 0,0 0.38446,0 0.528034,-0.1633 0.736328,-0.3281 0.208295,-0.1649 0.418255,-0.3754 0.605469,-0.6133 0.24959,-0.3174 1.074135,-1.0659 1.703125,-1.5098 1.540603,-1.0873 3.406164,-2.6205 4.990235,-4.0488 0.792035,-0.7142 1.512317,-1.4015 2.08789,-1.9961 0.575573,-0.5947 0.999035,-1.0754 1.236328,-1.4785 1.300263,-2.2094 1.860309,-3.4126 1.867188,-4.4395 0.0036,-0.5278 0.393653,-2.2561 1.945312,-7.9355 0.294585,-1.0782 0.792668,-2.8988 1.105469,-4.045 0.320583,-1.1748 0.766467,-3.2095 1.003906,-4.5781 0.224431,-1.2935 0.845266,-3.5886 1.355469,-4.998 1.538044,-4.249 2.341796,-8.1704 4.525391,-21.9981 1.507514,-9.5464 2.317168,-14.1969 3.0625,-17.6152 0.373347,-1.7122 1.070878,-5.3613 1.55664,-8.1406 0.821062,-4.6977 2.402908,-10.8885 3.658203,-14.3379 0.311114,-0.8549 1.042736,-2.9307 1.63086,-4.627 0.582074,-1.6787 1.445753,-3.8936 1.888672,-4.8554 2.428222,-5.2729 3.409576,-9.3237 4.291015,-17.6602 0.325216,-3.0758 0.901285,-8.1174 1.279297,-11.1934 1.914653,-15.5794 1.956538,-16.1802 1.88086,-26.8066 -0.109625,-15.3929 0.36154,-20.9186 2.615234,-30.6895 0.648067,-2.8097 1.31819,-5.2738 1.953125,-7.2226 0.634934,-1.9488 1.251491,-3.3944 1.716797,-4.0918 1.949077,-2.9212 4.575732,-4.9414 8.480468,-6.4902 2.172427,-0.8618 3.17648,-1.3736 5.929688,-3.0196 0.777471,-0.4648 2.723793,-1.3518 4.208984,-1.9043 6.574415,-2.4453 21.834204,-9.7642 25.914064,-12.455 2.74373,-1.8095 4.54938,-3.5401 5.25,-5.2168 0.35043,-0.8388 0.64458,-2.3145 0.89843,-4.1192 0.25385,-1.8047 0.44735,-3.9067 0.51954,-5.8672 0.0627,-1.7029 0.0922,-2.6181 -0.002,-3.3808 -0.0942,-0.7627 -0.31777,-1.3281 -0.70312,-2.2285 -1.68046,-3.9264 -2.58658,-7.1245 -3.49219,-12.34378 -0.23368,-1.34683 -0.36827,-2.09099 -0.54883,-2.58789 -0.0903,-0.24846 -0.19906,-0.46087 -0.40039,-0.61914 -0.20133,-0.15828 -0.45225,-0.19532 -0.62891,-0.19532 0.10111,0 0.0358,0.004 -0.0352,-0.0234 -0.0709,-0.0277 -0.17352,-0.076 -0.29102,-0.13671 -0.23498,-0.12154 -0.53036,-0.29593 -0.81054,-0.48633 -0.57047,-0.38765 -1.30106,-1.3839 -1.96094,-2.80469 -0.65989,-1.42079 -1.27278,-3.25939 -1.75391,-5.33789 -0.83186,-3.59392 -0.88603,-4.81444 -0.32031,-6.98633 0.42948,-1.64897 0.59789,-1.9418 1.60742,-2.76172 0.30499,-0.24773 0.56577,-0.51882 0.66797,-0.89453 0.1022,-0.3757 0.052,-0.74296 -0.0332,-1.25781 -0.0557,-0.33682 -0.13489,-0.69064 -0.21875,-1.00195 -0.0839,-0.31132 -0.15795,-0.56069 -0.26953,-0.77344 0.0497,0.0946 -0.028,-0.10132 -0.0703,-0.32617 -0.0423,-0.22486 -0.0914,-0.53404 -0.14062,-0.89649 -0.0983,-0.72489 -0.20211,-1.6687 -0.28516,-2.64844 -0.0845,-0.99669 -0.19385,-1.97105 -0.30468,-2.74609 -0.0554,-0.38752 -0.11027,-0.724 -0.16407,-0.99414 -0.0538,-0.27014 -0.0834,-0.44263 -0.17969,-0.64258 -0.0835,-0.17342 -0.15891,-1.16183 0.0606,-3.08789 0.10095,-0.88633 0.15669,-1.58912 0.16406,-2.10156 0.004,-0.25622 -0.004,-0.46325 -0.0312,-0.64453 -0.0137,-0.0906 -0.0291,-0.17423 -0.0723,-0.27539 -0.0432,-0.10116 -0.12327,-0.26462 -0.35352,-0.34375 0.10749,0.0369 0.11806,0.096 0.10547,0.0644 -0.0126,-0.0315 -0.0327,-0.11701 -0.0332,-0.20703 -5.5e-4,-0.09 0.0161,-0.18566 0.0352,-0.24023 0.0191,-0.0546 0.0411,-0.0507 -0.0156,-0.0156 0.23004,-0.14218 0.25014,-0.26095 0.30664,-0.38281 0.0565,-0.12187 0.10237,-0.25526 0.14648,-0.40625 0.0882,-0.30199 0.16479,-0.67019 0.21485,-1.0586 0.0443,-0.3436 0.11498,-0.7164 0.18945,-1.02539 0.0745,-0.30898 0.17363,-0.58041 0.18946,-0.60937 0.2302,-0.42132 0.32617,-0.96262 0.32617,-1.46875 0,-0.0413 0.0751,-0.38981 0.22461,-0.75586 0.1495,-0.36606 0.36238,-0.78768 0.58984,-1.1543 0.49416,-0.79653 1.2982,-2.15237 1.79883,-3.03125 0.77147,-1.35427 3.20945,-4.52559 5.63867,-7.28906 0.56066,-0.6378 1.44053,-1.42437 2.27148,-2.0625 0.83096,-0.63813 1.69801,-1.13481 1.91211,-1.18945 0.22488,-0.0574 0.42715,-0.14274 0.60157,-0.25977 0.0952,-0.0639 0.1402,-0.23994 0.22265,-0.35351 0.20462,0.0289 0.37332,0.0162 0.59571,-0.01 0.24425,-0.0285 0.5201,-0.0763 0.7832,-0.13867 0.36777,-0.0871 0.65242,-0.1601 0.90039,-0.4043 0.12398,-0.1221 0.21714,-0.3027 0.24414,-0.47461 0.0229,-0.14588 -1e-4,-0.27168 -0.0273,-0.39453 0.0766,-0.028 0.30226,-0.10132 0.79882,-0.17578 0.79238,-0.11883 1.80479,-0.37499 2.39844,-0.62305 0.22146,-0.0925 0.45857,-0.16047 0.63281,-0.1914 0.0871,-0.0155 0.15845,-0.0219 0.19336,-0.0215 0.0349,4.4e-4 0.0313,0.0281 -0.0742,-0.0371 0.2469,0.15263 0.48122,0.1341 0.68555,0.0879 0.20434,-0.0462 0.39634,-0.13843 0.56836,-0.28125 -0.063,0.0523 0.17503,-0.0772 0.45703,-0.13672 0.282,-0.0595 0.63788,-0.10463 0.97656,-0.11523 0.39862,-0.0125 0.78203,-0.0575 1.09961,-0.125 0.1588,-0.0338 0.30009,-0.0711 0.43165,-0.12305 0.13155,-0.0519 0.26214,-0.0822 0.41015,-0.29492 z m 4.27344,0.2207 c 0.001,-0.003 -0.0177,0.058 -0.0957,0.11329 -0.006,0.004 -0.009,2.4e-4 -0.0156,0.004 0.0278,-0.0483 0.094,-0.0652 0.11133,-0.11719 z m -15.16406,2.94336 c 0,0.11019 -0.0905,0.2367 -0.15235,0.27149 -0.0148,0.008 -0.0106,0.002 -0.0215,0.006 0.0623,-0.0925 0.17383,-0.10623 0.17383,-0.27735 z m 72.44336,280.69925 c -0.0125,0.015 -0.006,0.029 -0.0215,0.043 -0.10417,0.095 -0.23874,0.1231 -0.31445,0.1231 0.13051,0 0.24848,-0.087 0.33594,-0.166 z m 37.48828,57.2578 c 0.003,4e-4 0.003,0 0.006,0 -0.10562,-0.01 -0.23265,0.01 -0.32422,0.062 0.0748,-0.046 0.20454,-0.081 0.31836,-0.064 z&quot;
				id=&quot;no_spesial_depan&quot;
				inkscape:connector-curvature=&quot;0&quot; /&gt; --&gt;
				<path d="m 586.76471,-929.57829 32.00827,25.89259 44.53125,10.35705 37.9136,-12.25908 34.07629,-31.75623 c -1.223,24.00817 -0.54562,44.17881 13.4137,64.17836 -11.50449,14.76066 -32.76064,24.70317 -49.7804,32.2169 -29.50291,13.02468 -37.65429,12.01282 -55.43219,6.50492 -24.77415,-7.67546 -51.01547,-20.93722 -62.36056,-34.5757 10.0921,-21.22464 11.13898,-39.33174 5.63004,-60.55881 z" data-id="24" class="body-part clickable ears-nose-throat" inkscape:connector-curvature="0" sodipodi:nodetypes="ccccccsscc" data-target="body-part" data-body-part="Leher" id="no_0_depan" style="' . $isiWarna['no_0_depan'] . '" />
				<path d="m 484.51213,-597.07666 1.35207,59.64143 -2.28064,25.41662 -3.9973,15.75912 -20.76274,76.56259 v 45.58824 l -11.69846,36.07025 -106.3615,-35.32725 13.6482,-41.9194 14.70588,-30.88242 14.70588,-127.94118 2.09962,-54.04761 z" data-id="48" class="body-part clickable arm" inkscape:connector-curvature="0" sodipodi:nodetypes="ccccccccccccc" data-target="body-part" data-body-part="Lengan Pangkal kiri" id="no_3_depan"  style="' . $isiWarna['no_3_depan'] . '"  />
				<path d="m 288.23529,-119.6969 -7.35294,33.8235 -8.82353,14.7059 -36.7647,27.9412 -38.2353,42.6471 -10.29411,7.3529 -2.94118,2.9412 19.11765,4.4117 16.17647,-5.8823 25,-19.1177 -7.35294,64.7059 2.94117,51.4706 5.88236,8.8235 11.7647,-7.3529 0,-48.5294 1.47059,-7.353 4.41176,70.5883 1.47059,5.8823 5.88236,0 8.82352,-1.4706 1.47059,-7.3529 1.47059,-45.5882 1.47059,-33.8236 2.94118,58.8236 0,20.5882 7.35294,2.9412 7.35294,-5.8824 4.41176,-36.7647 -1.47059,-35.2941 7.35295,-11.7647 11.7647,38.2353 4.41177,22.0588 5.88235,2.9412 5.88235,-4.4118 -1.47059,-27.9412 -5.88235,-38.2352 10.29412,-51.4706 -2.94118,-30.8824 8.82353,-33.8235 z" data-id="29" class="body-part clickable hand-wrist" inkscape:connector-curvature="0" data-target="body-part" data-body-part="Telapak Tangan kiri" id="no_5_depan"  style="' . $isiWarna['no_5_depan'] . '" />
				<path d="m 992.64706,-69.6969 0,39.7059 10.29414,50 -2.9412,38.2353 1.4706,32.3529 10.2941,1.4706 7.3529,-14.7059 0,-17.647 4.4118,-32.353 1.4706,88.2353 10.2941,5.8824 5.8824,-2.9412 4.4117,-45.5882 0,-30.8824 5.8824,33.8235 0,41.1765 5.8823,8.8235 5.8824,1.4706 8.8235,-7.3529 -1.4706,-29.4118 1.4706,-25 -4.4117,-35.2941 10.2941,26.4706 2.9412,42.6471 7.3529,8.8235 8.8235,-4.4118 2.9412,-16.1765 1.4706,-33.8235 -11.7647,-61.7647 30.8823,26.4706 19.1177,1.4706 4.4117,-7.353 -5.8823,-7.3529 -14.2752,-13.5920782 -29.8425,-39.3491218 -36.7647,-35.2941 m 0,0 -64.70584,13.2353" data-id="29" class="body-part clickable hand-wrist" inkscape:connector-curvature="0" sodipodi:nodetypes="cccccccccccccccccccccccccccccccccccccc" data-target="body-part" data-body-part="Telapak Tangan Kanan" id="no_9_depan"  style="' . $isiWarna['no_9_depan'] . '" />
				<path d="m 832.35294,-421.16748 2.94118,42.64705 12.33922,55.5951 1.51446,54.97662 -375.68867,-0.71225 2.05832,-55.94776 14.18843,-67.147 c -0.4075,-10.39834 -5.2839,-10.82625 -0.40017,-22.61661 0.71129,-1.71718 -2.3631,-5.97361 0.59983,-7.17355 4.87376,-1.9738 16.67627,-0.3809 19.00871,-0.37546 z" data-id="36" class="body-part clickable abdomen" inkscape:connector-curvature="0" sodipodi:nodetypes="cccccccsssc" data-target="body-part" data-body-part="Abdomen Atas" id="no_11_depan"  style="' . $isiWarna['no_11_depan'] . '" />
				<path  d="m 849.1478,-267.94871 2.3228,29.1342 5.88236,7.3529 c 7.92809,37.2549 23.6511,81.7888 19.11764,119.0437 l -422.05884,-1.3966 1.72291,-72.5635 11.88004,-44.11857 5.44442,-38.16438 c 375.68867,0.71225 0,0 375.68867,0.71225 z" data-id="36" class="body-part clickable abdomen" inkscape:connector-curvature="0" sodipodi:nodetypes="ccccccccc" data-target="body-part" data-body-part="Abdomen Tengah" id="no_12_depan"  style="' . $isiWarna['no_12_depan'] . '" />
				<path d="m 452.94118,-113.8145 423.52941,-5.8824 7.35294,48.5294 L 875,43.5384 682.10063,39.914215 666.17647,45.009 650,42.0678 463.23529,45.796515 452.94118,-74.1087 Z" data-id="38" class="body-part clickable groin" inkscape:connector-curvature="0" sodipodi:nodetypes="cccccccccc" data-target="body-part" data-body-part="Abdomen Bawah" id="no_13_depan"  style="' . $isiWarna['no_13_depan'] . '" />
				<path d="m 449.72428,915.36742 c -1.49699,4.10861 -11.87185,-23.2629 -2.73787,-47.61875 3.35913,-8.95717 15.82328,-22.23703 19.55956,-32.26948 4.78671,-12.853 16.81184,-18.38672 21.16622,-28.77817 7.67716,-18.32109 15.55613,-35.70979 16.02837,-38.35666 1.2669,-7.10093 1.87305,-22.52213 8.58338,-61.82952 l -18.20629,-173.27054 -7.35294,-41.1765 2.94117,-54.4118 8.82353,-67.647 4.41177,-14.7059 -0.55282,-37.03876 c 110.5725,16.22702 0.51496,-1.70337 111.08746,14.52365 L 600,377.3619 l 5.88235,129.4118 -22.05882,85.2941 -13.23529,92.6471 c -1.13449,37.73436 15.92485,48.31894 -5.75137,96.70936 l 3.58559,14.40698 c -13.56819,52.99151 -12.41842,119.90541 -41.48956,158.23197 -16.30622,0.43921 -31.73028,-0.18016 -23.28316,-29.44496 -11.45037,26.50583 -21.30636,25.68404 -29.03066,20.36885 -5.79985,-3.99095 -15.04342,-14.85187 -20.50097,-19.84218 -4.00847,-3.66528 1.80566,-9.30085 -4.39383,-9.7775 z" data-id="49" class="body-part clickable leg" inkscape:connector-curvature="0" sodipodi:nodetypes="cssssccccccccccccccccssc" data-target="body-part" data-body-part="Kaki Betis Kiri" id="no_15_depan"  style="' . $isiWarna['no_15_depan'] . '" />
				<path d="m 846.60608,321.24173 0.45274,20.82607 19.11765,73.5294 5.88235,75 -8.82353,116.1765 -2.43596,86.47677 -0.50521,17.93503 -0.5878,20.5157 6.87057,17.5229 3.98401,33.10523 19.8173,35.03594 25.25199,43.49204 15.54888,25.54905 1.86908,25.29946 -2.43625,11.14035 v 0 l -7.79675,9.40633 -1.35077,11.03074 -3.40705,4.05796 -4.41592,-0.9252 -1.23035,6.73572 -3.49488,5.9384 -6.72625,1.70555 c 0,0 -4.50124,7.08797 -10.48524,9.10069 -2.11919,0.71279 -6.16578,-0.25546 -9.02502,-2.50747 -2.4996,-1.96875 -3.11516,-2.37673 -3.11516,-2.37673 l -1.27463,5.81202 -11.51751,4.97533 -13.1925,0.067 -14.25086,-19.83408 c 0,0 -10.49638,-25.87335 -10.96968,-39.65882 -0.46188,-13.45253 -1.98909,-40.33234 -1.98909,-40.33234 l -10.85097,-29.25973 -3.55097,-30.77018 -9.4271,-30.55214 -6.89445,-24.52147 4.52006,-22.60238 -1.01234,-30.29001 -12.38976,-89.50693 -10.29412,-51.4706 -16.17647,-55.8823 -5.88236,-126.4706 -20.95587,-50.50557 z" data-id="49" class="body-part clickable leg" inkscape:connector-curvature="0" sodipodi:nodetypes="cccccccccccccccccccccccsscccccsccccccccccccc" data-target="body-part" data-body-part="Kaki Betis Kanan" id="no_17_depan"  style="' . $isiWarna['no_17_depan'] . '" />
				<path d="m 998.78824,-337.90555 -9.65074,-33.08824 -23.01991,-69.05982 -15.9601,-110.26973 -2.36055,-77.89905 -104.52485,29.20507 4.0524,62.49918 7.01466,43.4731 14.56694,71.85336 4.3528,26.11652 -0.76731,29.76561 23.92161,58.72652 c 102.37505,-31.32252 0,0 102.37505,-31.32252 z" data-id="48" class="body-part clickable arm" inkscape:connector-curvature="0" sodipodi:nodetypes="ccccccccccccc" data-body-part="Tangan Pangkal Kanan" data-target="body-part" id="no_7_depan" style="' . $isiWarna['no_7_depan'] . '" />
				<g transform="matrix(3.5574198,0,0,3.5574198,177.86214,-4523.5744)" id="layer1-9" inkscape:label="Layer 1" >
					<path inkscape:connector-curvature="0" id="no_spesial_depan" d="m 143.07265,931.56798 c -0.27146,-0.0383 -0.49962,0.009 -0.84571,0.0801 -0.49441,0.10169 -1.30443,0.22125 -1.72851,0.25586 h -0.002 c -0.50596,0.0413 -1.03427,0.12403 -1.40626,0.27539 -0.91989,0.37423 -1.85057,0.32233 -2.30078,0.0273 -0.27869,-0.18261 -0.47586,-0.31453 -0.77343,-0.35547 -0.14879,-0.0205 -0.35261,0.006 -0.50977,0.11719 -0.13957,0.0988 -0.1998,0.2284 -0.24414,0.34375 -0.0221,0.009 -0.12546,0.0349 -0.29688,0.0254 -0.34282,-0.0189 -0.93642,-0.15951 -1.7246,-0.43945 -0.47268,-0.16788 -0.85583,-0.27622 -1.1836,-0.31836 -0.16388,-0.0211 -0.31298,-0.0292 -0.47461,0 -0.16163,0.0292 -0.36358,0.11037 -0.49609,0.30078 0.0932,-0.13385 0.0959,-0.0853 0.043,-0.0645 -0.0529,0.0209 -0.15202,0.0504 -0.27344,0.0762 -0.24283,0.0516 -0.57993,0.0908 -0.92187,0.10156 -0.40191,0.0126 -0.80433,0.0632 -1.15235,0.13672 -0.34802,0.0735 -0.61033,0.11471 -0.88867,0.3457 -0.0433,0.0359 -0.11132,0.0673 -0.15039,0.0762 -0.0391,0.009 -0.0324,-0.0223 0.0606,0.0352 -0.18248,-0.11282 -0.31133,-0.10974 -0.4375,-0.11133 -0.12618,-0.002 -0.25115,0.0137 -0.38282,0.0371 -0.26332,0.0468 -0.55333,0.13338 -0.84179,0.25391 -0.42616,0.17806 -1.46463,0.45233 -2.16016,0.55664 -0.58071,0.0871 -0.93139,0.13005 -1.25977,0.32617 -0.16419,0.0981 -0.33035,0.28485 -0.38476,0.49219 -0.0538,0.20504 -0.0207,0.37417 0.0176,0.52148 -0.0187,0.006 -0.10301,0.061 -0.37305,0.125 -0.22081,0.0523 -0.46639,0.0956 -0.66797,0.11914 -0.20158,0.0235 -0.39694,0.0118 -0.35547,0.0195 -0.19323,-0.0359 -0.39522,-0.0202 -0.58398,0.0859 -0.18876,0.10615 -0.35742,0.3473 -0.35742,0.60156 0,-0.25596 0.0891,-0.21787 0.0352,-0.18164 -0.054,0.0362 -0.1674,0.0901 -0.28906,0.1211 -0.64537,0.1647 -1.40145,0.69409 -2.27539,1.36523 -0.87394,0.67114 -1.78055,1.47686 -2.41211,2.19531 -2.45898,2.79733 -4.87664,5.90825 -5.75781,7.45508 -0.49127,0.86244 -1.29874,2.22028 -1.78125,2.99805 -0.2609,0.42052 -0.49169,0.88067 -0.66406,1.30273 -0.17238,0.42206 -0.29883,0.76748 -0.29883,1.13477 0,0.31109 -0.14107,0.87666 -0.20313,0.99023 -0.13032,0.23849 -0.20149,0.50641 -0.28515,0.85352 -0.0837,0.34711 -0.15946,0.74644 -0.20899,1.13086 -0.0438,0.3396 -0.11241,0.6693 -0.18164,0.90625 -0.0346,0.11847 -0.0699,0.21602 -0.0937,0.26758 -0.0239,0.0516 -0.0833,0.0504 0.0742,-0.0469 -0.22974,0.14209 -0.33605,0.34522 -0.40234,0.53516 -0.0663,0.18994 -0.093,0.38368 -0.0918,0.57617 0.001,0.19249 0.0279,0.38285 0.10351,0.57226 0.0756,0.18942 0.21645,0.41298 0.49805,0.50977 -0.18684,-0.0642 -0.22873,-0.18202 -0.24023,-0.20898 -0.0115,-0.027 -0.002,-0.008 0.004,0.0332 0.0124,0.082 0.0228,0.25243 0.0195,0.47851 -0.007,0.45216 -0.0594,1.13655 -0.1582,2.00391 -0.22357,1.96211 -0.30513,2.93213 0.0332,3.63477 -0.0144,-0.03 0.0514,0.16201 0.0996,0.40429 0.0483,0.24228 0.10062,0.56608 0.1543,0.94141 0.10735,0.75065 0.21591,1.70923 0.29883,2.6875 0.0844,0.99527 0.18967,1.95218 0.29101,2.69922 0.0507,0.37352 0.10095,0.69514 0.14844,0.94726 0.0475,0.25212 0.0505,0.38166 0.16797,0.60547 0.024,0.0457 0.11464,0.29065 0.18945,0.56836 0.0748,0.27771 0.14787,0.60577 0.19727,0.9043 0.0799,0.48261 0.0825,0.72984 0.0547,0.83203 -0.0278,0.10219 -0.0787,0.17354 -0.33399,0.38086 -1.08651,0.88244 -1.50067,1.57994 -1.94531,3.28711 -0.59538,2.28579 -0.52763,3.82483 0.31445,7.46289 0.49398,2.134 1.12363,4.03093 1.82227,5.53516 0.69864,1.50422 1.44109,2.62214 2.30469,3.20898 0.3131,0.21277 0.63528,0.40465 0.91406,0.54883 0.13939,0.0721 0.26714,0.13295 0.38672,0.17969 0.11958,0.0467 0.20425,0.0918 0.39843,0.0918 0.0784,0 0.0326,3.5e-4 0.01,-0.0176 -0.0228,-0.0179 0.021,0.0113 0.0801,0.17383 0.11815,0.32517 0.2714,1.07597 0.50391,2.41602 0.91313,5.26264 1.84973,8.57814 3.55664,12.56634 0.3816,0.8917 0.55235,1.3235 0.63086,1.959 0.0785,0.6356 0.0587,1.5209 -0.004,3.2207 -0.0707,1.9206 -0.26301,3.9974 -0.51172,5.7656 -0.24871,1.7683 -0.57305,3.2579 -0.83008,3.8731 -0.55154,1.32 -2.21639,3.0117 -4.8789,4.7676 -3.80943,2.5125 -19.277292,9.9585 -25.710945,12.3515 -1.541924,0.5736 -3.45823,1.4363 -4.375,1.9844 -2.74028,1.6382 -3.639311,2.096 -5.785156,2.9473 -4.040947,1.6029 -6.880551,3.7736 -8.94336,6.8652 -0.583872,0.8751 -1.188272,2.3481 -1.835937,4.3359 -0.647665,1.9879 -1.323377,4.4767 -1.976563,7.3086 -2.265522,9.8222 -2.750408,15.5047 -2.640624,30.92 0.07566,10.6238 0.04146,11.1014 -1.873047,26.6796 -0.379137,3.0851 -0.955061,8.126 -1.28125,11.211 -0.876921,8.2937 -1.814739,12.1551 -4.205079,17.3457 -0.479145,1.0405 -1.332983,3.2356 -1.925781,4.9453 -0.58675,1.6923 -1.319554,3.774 -1.625,4.6133 -1.293956,3.5556 -2.872296,9.7431 -3.705078,14.5078 -0.483352,2.7655 -1.181382,6.4234 -1.546875,8.0996 -0.753453,3.4555 -1.563964,8.1205 -3.072266,17.6719 -2.18224,13.8191 -2.971302,17.6433 -4.480468,21.8125 -0.538961,1.4888 -1.157598,3.7686 -1.400391,5.1679 -0.229781,1.3245 -0.677435,3.3687 -0.982422,4.4864 -0.312774,1.146 -0.810939,2.9669 -1.105469,4.0449 -1.553088,5.6846 -1.974423,7.2958 -1.980468,8.1934 -0.0042,0.6287 -0.449645,1.7644 -1.728516,3.9375 -0.134804,0.229 -0.540747,0.7197 -1.09375,1.291 -0.553002,0.5713 -1.25992,1.2467 -2.039062,1.9492 -1.558286,1.4051 -3.407577,2.9237 -4.896485,3.9746 -0.710582,0.5015 -1.512135,1.2004 -1.912109,1.709 -0.137565,0.1748 -0.303968,0.34 -0.439453,0.4473 -0.135485,0.1072 -0.30483,0.1113 -0.117188,0.1113 -0.148422,0 -0.378847,0.053 -0.554687,0.1699 -0.175841,0.1169 -0.323026,0.2714 -0.521485,0.5039 -0.396917,0.465 -0.990821,1.2688 -2.078125,2.7559 -0.627306,0.858 -2.541352,2.9904 -4.1718752,4.6289 -0.826993,0.831 -1.5775533,1.6199 -2.1269528,2.2246 -0.2746997,0.3023 -0.4999867,0.5564 -0.6621093,0.7558 -0.081061,0.1 -0.1451689,0.1843 -0.1992188,0.2637 -0.027025,0.04 -0.050872,0.078 -0.076172,0.127 -0.0253,0.049 -0.072266,0.086 -0.072266,0.2734 0,-0.1255 0.08565,-0.1996 0.039063,-0.1601 -0.046588,0.039 -0.188658,0.1326 -0.4257812,0.2558 -0.4742464,0.2465 -1.3293296,0.6263 -2.7382813,1.2266 -0.4390605,0.187 -0.7655743,0.3547 -1.0136718,0.6328 -0.2480976,0.2781 -0.3417969,0.6539 -0.3417969,1.0058 0,0.7538 0.3734313,1.4342 1.0371093,1.7969 0.6636781,0.3627 1.5495441,0.487 2.7382813,0.4922 3.5014935,0.016 6.0806357,-0.8625 8.1757817,-2.834 0.988624,-0.9303 2.187218,-2.0004 3.158203,-2.834 0.44001,-0.3777 0.809939,-0.6838 1.113281,-0.9277 1.24e-4,0.016 0.0019,0.02 0.002,0.037 0.002,0.5714 -0.03028,1.4081 -0.0918,2.4141 -0.123029,2.0118 -0.363872,4.7023 -0.679687,7.3769 -0.327355,2.7725 -0.707122,5.9856 -0.84375,7.1407 -0.150391,1.2711 -0.175356,4.9727 -0.08008,8.4257 l 0.179687,6.4707 1.074219,0.961 c 1.095204,0.9787 2.551166,1.2278 3.757813,0.582 0.344444,-0.1844 0.666433,-0.4507 0.896484,-0.832 0.230051,-0.3813 0.37377,-0.8541 0.476562,-1.4864 0.15512,-0.954 0.168003,-2.8815 0.189454,-4.8867 0.03237,1.9282 -0.101935,2.5499 0.01172,5.1289 0.107362,2.4362 0.180631,3.8181 0.296875,4.7012 0.116244,0.8831 0.326213,1.352 0.632813,1.6895 0.667217,0.7345 1.67338,1.0487 2.632812,1.0351 0.959432,-0.014 1.928491,-0.3574 2.453125,-1.1582 0.278564,-0.4251 0.367674,-0.9885 0.449219,-2.1973 0.08154,-1.2087 0.130369,-3.0841 0.175781,-6.0976 0.04608,-3.0577 0.185836,-5.4961 0.310547,-7.5469 0.05347,0.7095 -0.07619,0.9092 0.04297,1.9551 0.37591,3.2996 0.414514,4.6387 0.193359,6.8457 -0.218733,2.183 -0.328156,3.3854 -0.267578,4.1973 0.03029,0.4059 0.10977,0.7318 0.271484,1.0058 0.161715,0.2741 0.390363,0.4589 0.617188,0.6074 1.268343,0.8312 3.031686,0.7241 4.066406,-0.3105 0.280174,-0.2801 0.507299,-0.6622 0.669922,-1.1953 0.162623,-0.5332 0.277577,-1.2289 0.373047,-2.2285 0.19094,-1.9993 0.298157,-5.2218 0.419922,-10.6953 0.04792,-2.154 0.107049,-4.209 0.166015,-5.7832 0.02948,-0.7872 0.0592,-1.4543 0.08594,-1.9512 0.02674,-0.4969 0.06148,-0.8665 0.06641,-0.8945 0.05677,-0.3235 0.407967,-1.0895 0.69336,-1.4473 0.184302,-0.2312 0.307007,-0.3104 0.353515,-0.3399 0.138756,0.1796 0.447254,1.0253 0.712891,2.4707 0.251638,1.3693 0.695895,3.3213 1.003906,4.3985 0.280394,0.9804 0.809122,3.6155 1.142578,5.748 0.341589,2.1845 0.609762,3.5211 1.029297,4.4082 0.209768,0.4436 0.474416,0.7883 0.820313,1.0078 0.345896,0.2196 0.743634,0.293 1.144531,0.293 0.671281,0 1.377035,-0.3342 1.916015,-0.7988 0.196397,-0.1692 0.370687,-0.3142 0.525391,-0.5195 0.154704,-0.2054 0.262188,-0.4646 0.316406,-0.7598 0.108438,-0.5905 0.07833,-1.3775 0.03906,-2.9629 -0.04422,-1.7851 -0.317838,-4.4662 -0.619141,-6.0547 -0.959748,-5.0601 -1.426701,-7.4246 -1.509765,-9.2422 -0.08306,-1.8176 0.205438,-3.1542 0.792968,-6.2539 0.969153,-5.113 1.43722,-7.4767 1.607422,-9.2285 0.170203,-1.7518 0.0316,-2.8542 -0.199218,-5.332 -0.11089,-1.1903 -0.05904,-2.8866 0.125,-4.0782 0.17935,-1.1613 0.39043,-2.6685 0.472656,-3.3789 0.0761,-0.6576 0.275979,-1.5223 0.34375,-1.6855 0.426096,-1.0263 2.12798,-5.8591 4.511718,-12.7715 3.722977,-10.7957 5.548726,-15.3698 9.421876,-23.6133 2.952759,-6.2846 6.606731,-15.5126 10.5,-26.5097 0.866734,-2.4482 2.660412,-6.8731 3.55664,-8.7754 0.713708,-1.515 3.263731,-8.9582 3.740234,-10.8731 0.116609,-0.4687 0.182866,-1.329 0.25,-2.5058 0.06713,-1.1769 0.115958,-2.6182 0.13086,-4.0508 0.04845,-4.6573 0.114623,-5.3343 0.78125,-7.711 1.906002,-6.7956 4.389781,-17.0406 4.833984,-20.0078 0.123582,-0.8255 0.213551,-1.2971 0.308594,-1.8203 0.134977,0.6904 0.281419,1.5185 0.474609,2.7285 0.937671,5.8727 1.280219,10.6942 1.267579,17.8418 -0.01821,10.259 -0.372846,14.0069 -2.035157,21.4551 -2.326424,10.4233 -2.376766,10.8011 -2.43164,17.6074 -0.08203,10.1695 -0.623926,14.6092 -2.326172,19.2735 -2.140685,5.8657 -3.030766,14.1831 -3.298828,30.291 -0.04227,2.5397 -0.09471,4.8892 -0.144532,6.6289 -0.02491,0.8699 -0.05012,1.5882 -0.07227,2.0976 -0.01107,0.2548 -0.01983,0.4569 -0.0293,0.5977 -0.0047,0.07 -0.01014,0.1263 -0.01367,0.1602 -0.0035,0.034 -0.0244,0.081 0.0078,-0.018 -0.07113,0.2185 -0.06583,0.3813 -0.07227,0.6465 -0.0064,0.2651 -0.0018,0.5984 0.01172,1.0019 0.02713,0.8071 0.09104,1.8885 0.185547,3.1817 0.189007,2.5864 0.49774,6.0212 0.875,9.7695 0.754519,7.4966 1.777831,16.2417 2.636718,21.9414 0.231294,1.535 0.681394,4.6862 0.998047,6.9941 0.318621,2.3222 0.885872,5.8444 1.265625,7.8575 0.187205,0.9923 0.357418,2.0032 0.480469,2.8261 0.12305,0.823 0.195312,1.501 0.195312,1.6641 0,0.3603 0.08126,1.0218 0.207032,1.9434 0.125774,0.9215 0.297895,2.0572 0.488281,3.1894 0.377179,2.2433 0.944676,6.0719 1.255859,8.4863 1.178583,9.1441 2.332128,15.6277 3.355469,18.6524 2.014148,5.9535 1.833984,4.6582 1.833984,13.7031 0,4.5517 0.108993,10.3395 0.244141,12.9063 0.237316,4.5074 0.230461,4.6099 -0.611328,8.9804 -1.072084,5.5665 -1.606699,8.8154 -1.986328,12.0801 -1.21629,10.4601 -1.286329,11.4621 -1.257813,17.8418 0.02662,5.954 0.130116,7.3295 1.041016,13.7891 0.553284,3.9234 1.144692,8.4701 1.308594,10.0625 0.166889,1.6216 0.54306,5.087 0.83789,7.707 0.294117,2.6135 0.802068,7.4652 1.126953,10.7734 0.32655,3.3253 1.088758,9.688 1.697266,14.1621 0.602617,4.4306 0.931045,7.1725 1.029297,9.0704 0.09825,1.8978 -0.02461,2.9285 -0.326172,4.041 -0.886321,3.2695 -1.358696,5.0464 -1.585938,6.2734 -0.227241,1.227 -0.197061,1.9287 -0.08594,2.8691 0.405958,3.4348 0.271722,4.0399 -1.695313,7.9278 -1.227768,2.4269 -1.941877,4.1941 -2.15625,5.4629 -0.187585,1.1102 -0.60966,2.166 -1.359374,3.3691 -1.777733,2.8527 -2.292259,3.5692 -4.384766,6.1055 -1.111484,1.3471 -2.499222,3.4161 -3.152344,4.7148 -0.303391,0.6033 -0.652695,1.2331 -0.966797,1.7539 -0.314102,0.5208 -0.615858,0.9524 -0.726562,1.0723 -0.385586,0.4175 -0.86936,1.0396 -1.140625,1.4746 -0.243359,0.3903 -0.417674,0.9798 -0.652344,1.8106 -0.23467,0.8307 -0.485906,1.854 -0.71875,2.9023 -0.465689,2.0967 -0.861328,4.2262 -0.861328,5.2598 0,0.887 0.249995,1.9492 0.605469,2.914 0.355473,0.9649 0.771782,1.8103 1.351562,2.2891 0.06472,0.053 0.283203,0.5041 0.283203,1.0722 0,0.8301 0.134597,1.5351 0.439453,2.0958 0.304857,0.5606 0.813536,0.967 1.427735,1.0898 0.422325,0.085 0.586151,0.2211 0.814453,0.7676 0.521082,1.247 1.634846,2.1269 2.865234,2.1269 0.229179,0 0.25643,0.023 0.289063,0.053 0.03263,0.03 0.121999,0.1676 0.21875,0.4941 0.207381,0.6998 0.733953,1.2963 1.361328,1.7539 0.627374,0.4576 1.364406,0.7793 2.101562,0.7793 0.563653,0 1.197292,-0.1969 1.792969,-0.457 0.595677,-0.2601 1.119932,-0.525 1.435547,-0.9922 0.133505,-0.1976 0.195879,-0.3845 0.294922,-0.6582 0.09904,-0.2737 0.202649,-0.5983 0.291016,-0.9199 0.194261,-0.7072 0.731874,-1.8594 1.267578,-2.7891 0.0077,-0.013 0.01382,-0.02 0.02148,-0.033 -0.244974,0.7453 -0.512652,1.4978 -0.570312,2.3047 -0.0819,1.146 -0.03558,2.1914 0.43164,2.9043 0.650056,0.9922 1.67416,1.6371 2.896484,1.8984 1.222325,0.2613 2.646529,0.1577 4.183594,-0.2988 1.248494,-0.3708 1.820134,-0.8144 2.683598,-2.0899 0.58666,-0.8665 1.21682,-2.1557 1.47069,-3.0371 0.21378,-0.7421 0.66068,-1.8952 0.94727,-2.457 0.38036,-0.7455 0.9372,-2.513 1.34766,-4.1406 0.40316,-1.5987 0.86397,-3.3353 1.00196,-3.7852 0.0636,-0.2073 0.0909,-0.4366 0.12304,-0.7597 0.0322,-0.3232 0.0602,-0.7199 0.082,-1.17 0.0436,-0.9001 0.065,-2.0098 0.0547,-3.1211 -0.0427,-4.5921 0.38926,-7.5951 1.21875,-9.2363 0.38483,-0.7613 1.00065,-2.3824 1.42579,-3.7148 0.67377,-2.1118 0.81032,-3.1818 1.00976,-7.9727 0.26575,-6.3847 0.62716,-8.3917 2.77344,-15.416 0.74936,-2.4526 0.6424,-4.5478 -0.4082,-8.6895 -0.5688,-2.2424 -0.6875,-3.3333 -0.6875,-6.3476 0,-4.4535 0.66689,-11.9866 1.42382,-16.1035 0.31263,-1.7006 0.67251,-3.8357 0.80469,-4.7813 0.12503,-0.8944 0.48341,-2.8547 0.78906,-4.3066 0.30938,-1.4696 0.77054,-3.8001 1.02735,-5.1934 0.25059,-1.3597 0.94715,-4.5183 1.54101,-6.9746 3.46613,-14.3368 3.95408,-17.1834 3.95508,-23.0605 4.7e-4,-2.3189 -0.13149,-5.9718 -0.29492,-8.1602 -0.72568,-9.7182 -1.0903,-14.7807 -1.13086,-17.8887 -0.0406,-3.108 0.22697,-4.2246 0.79687,-6.248 0.43586,-1.5475 1.33049,-4.1053 1.96485,-5.6152 0.65838,-1.567 1.74213,-4.5238 2.42773,-6.6192 1.42463,-4.3541 1.80268,-7.1174 1.80469,-13.1777 10e-4,-3.4026 0.14644,-8.4138 0.3457,-12.9317 0.19927,-4.5178 0.45956,-8.5814 0.66211,-9.9589 0.2302,-1.5655 0.53926,-4.4913 0.69336,-6.5469 0.32919,-4.3921 1.88207,-14.2051 3.19531,-20.1621 0.53265,-2.4161 1.29616,-6.884 1.70704,-9.9824 0.20405,-1.539 0.39992,-2.9769 0.55273,-4.0528 0.0764,-0.5379 0.14197,-0.9858 0.19141,-1.3086 0.0198,-0.1294 0.0346,-0.2224 0.0488,-0.3086 0.0719,0.016 0.0928,0.013 0.25782,0.076 0.66514,0.255 1.67173,0.2603 2.75,0.1465 1.44651,-0.1529 2.30173,-0.4846 3.85937,-1.4922 0.77598,-0.5019 1.2651,-0.7826 1.50196,-0.873 0.0332,-0.013 0.0124,-0.01 0.0332,-0.012 0.0204,0.071 0.043,0.1558 0.0703,0.2735 0.0647,0.2791 0.1426,0.6707 0.22656,1.1406 0.16793,0.9398 0.36178,2.1922 0.53711,3.5195 0.39796,3.0126 1.27446,7.4791 2.2793,11.625 2.10556,8.6875 5.18726,23.6212 5.86133,28.375 0.29093,2.0519 0.67018,5.964 0.83593,8.6426 0.16719,2.7016 0.42239,6.0341 0.57227,7.4434 0.14274,1.3423 0.26656,4.255 0.26953,6.3984 0.004,2.7736 0.18248,4.9447 0.5957,7.207 0.65395,3.5801 2.70397,9.7354 4.29493,12.8926 0.52223,1.0363 1.63492,3.6326 2.4375,5.6973 l 1.4375,3.6992 0.24023,6.916 c 0.49538,14.2567 0.78099,21.7971 1.25586,26.7871 0.47487,4.9901 1.14848,7.4411 2.38672,11.3867 2.90553,9.2588 3.24513,10.4921 4.41016,16.0977 0.82391,3.9644 3.02432,16.1869 3.80273,21.1191 1.54285,9.776 1.61723,15.9504 0.32813,20.0762 -0.95018,3.0412 -0.80458,4.9249 0.62304,8.0938 0.59959,1.3308 1.03413,2.8177 1.14844,3.8711 0.11992,1.105 0.65858,3.0975 1.2207,4.6015 0.74611,1.996 1.01452,3.193 1.16211,5.1836 0.10992,1.4826 0.30807,3.1447 0.48242,3.8613 0.14892,0.6121 0.44787,1.8726 0.66211,2.795 0.22558,0.971 0.84584,3.0366 1.39844,4.6679 0.89741,2.6492 0.99857,3.2653 1.25195,7.5703 0.19002,3.2281 0.50607,6.2123 0.90039,8.6485 0.39433,2.4362 0.84854,4.3048 1.39454,5.4062 0.3947,0.7962 0.96858,2.3158 1.23242,3.2715 0.28937,1.0481 0.77105,2.2873 1.18164,2.9356 0.8473,1.3377 2.3249,2.7099 3.60351,3.414 l -0.0254,0.086 0.40039,0.1796 c 1.23352,0.5532 2.88101,0.4595 4.32032,0.057 0.71965,-0.2014 1.38509,-0.4861 1.91992,-0.8516 0.52313,-0.3574 0.93235,-0.8083 1.0625,-1.3867 0.9212,0.8397 2.35561,0.8774 3.60742,0.5391 0.63207,-0.1709 1.2271,-0.4457 1.70313,-0.8262 0.47602,-0.3805 0.84656,-0.8867 0.91796,-1.5 0.0173,-0.149 0.0382,-0.2387 0.0508,-0.2773 -0.0122,0.013 0.17098,-0.041 0.62696,-0.041 0.77061,0 1.4514,-0.2408 1.8789,-0.7754 0.4275,-0.5345 0.57813,-1.2645 0.57813,-2.1718 0,-0.2509 0.005,-0.4252 0.0137,-0.5567 0.022,0 0.016,0 0.041,0.01 0.69576,0.1747 1.40011,-0.093 1.83008,-0.6269 0.42996,-0.5334 0.64773,-1.2858 0.66992,-2.1758 0.0251,-1.0096 0.10889,-1.6879 0.24804,-2.1016 0.13915,-0.4136 0.27956,-0.5571 0.55664,-0.6914 0.35197,-0.1706 0.6101,-0.4603 0.89454,-0.8261 0.28443,-0.3659 0.56355,-0.8091 0.79687,-1.2813 0.69364,-1.4036 0.81334,-2.0645 0.81836,-4.7031 0.008,-4.0291 -0.72163,-6.6551 -2.51563,-8.8047 -0.29703,-0.356 -0.84333,-1.2588 -1.11328,-1.8691 -0.37008,-0.8367 -1.36546,-2.4238 -2.51172,-4.1289 -1.14625,-1.7052 -2.42363,-3.481 -3.32226,-4.5586 -0.3455,-0.4143 -0.66035,-0.821 -0.88281,-1.1328 -0.11123,-0.156 -0.19846,-0.2893 -0.25196,-0.379 -0.0267,-0.045 -0.0457,-0.079 -0.0508,-0.09 -0.005,-0.011 0.0195,-0.027 0.0195,0.123 0,-0.2683 -0.0836,-0.3872 -0.16992,-0.5488 -0.0863,-0.1616 -0.19547,-0.3248 -0.32422,-0.4765 -0.0141,-0.017 -0.20998,-0.3304 -0.39062,-0.7012 -0.18064,-0.3709 -0.38264,-0.8305 -0.5586,-1.2793 -1.13965,-2.9071 -3.44304,-7.2247 -4.87109,-9.084 l -1.19336,-1.5527 -0.15234,-4.1817 c -0.16551,-4.5171 -0.683,-7.4067 -1.78711,-9.0918 -0.11546,-0.1762 -0.20625,-0.354 -0.25,-0.4668 -0.0139,-0.036 -0.0154,-0.041 -0.0195,-0.057 0.002,-0.014 0.0235,-0.039 0.0254,-0.051 0.012,-0.076 0.0124,-0.1348 0.01,-0.1933 -0.005,-0.1172 -0.0242,-0.2322 -0.0508,-0.3633 -0.0531,-0.2622 -0.14331,-0.5762 -0.25976,-0.9063 -0.26117,-0.7402 -0.42028,-2.6512 -0.35157,-5.959 0.0687,-3.3077 0.33689,-8.0498 0.8125,-14.6425 0.15663,-2.1711 0.34626,-6.1369 0.42383,-8.8418 0.23866,-8.3155 0.69958,-17.0324 1.1211,-21.2481 1.09829,-10.9848 1.31554,-21.9473 0.55273,-28.6699 -0.54688,-4.8196 -2.40853,-14.2508 -3.69336,-18.7051 -2.07183,-7.1827 -2.30733,-8.5055 -2.61914,-14.7285 -0.55101,-10.9975 0.14379,-21.4199 1.70117,-26.4316 0.29643,-0.9539 0.72653,-2.6406 0.9707,-3.8067 0.1696,-0.81 0.42188,-2.7014 0.73047,-5.2929 0.3086,-2.5916 0.6664,-5.8585 1.02539,-9.3184 0.71799,-6.9198 1.43847,-14.6102 1.75782,-19.2207 0.29792,-4.3013 0.85888,-10.2909 1.24218,-13.2715 0.8093,-6.2932 2.21042,-21.0344 2.70704,-28.4648 0.29681,-4.4411 0.27748,-5.675 -0.1504,-9.6094 -0.26814,-2.466 -0.65341,-5.5404 -0.86132,-6.8731 -0.53168,-3.4082 -0.91198,-6.6157 -1.26172,-10.6093 -0.27131,-3.0981 -0.66711,-5.2713 -1.97266,-10.8516 -0.17136,-0.7324 -0.30437,-1.7644 -0.29687,-2.0957 0.006,-0.2779 -0.0292,-0.5583 -0.0918,-0.8164 -0.0626,-0.2581 -0.13059,-0.484 -0.3125,-0.7031 -0.0197,-0.024 -0.0167,-0.022 -0.0312,-0.043 0.005,-0.05 0.0119,-0.1028 0.01,-0.1406 -0.006,-0.1145 -0.0253,-0.2257 -0.0527,-0.3594 -0.0548,-0.2674 -0.14612,-0.6094 -0.26562,-0.9883 -0.22077,-0.7 -0.44767,-1.7001 -0.48633,-2.0722 -0.0794,-0.7632 -0.33073,-2.1442 -0.60352,-3.4668 -0.27278,-1.3227 -0.53976,-2.5108 -0.74414,-3.043 -0.21014,-0.5472 -0.54338,-1.0478 -1.05273,-1.3203 -0.0942,-0.051 -0.11912,-0.072 -0.16992,-0.2129 -0.0508,-0.1404 -0.0914,-0.4058 -0.0937,-0.8086 -0.004,-0.7111 -0.12864,-1.7389 -0.29493,-2.418 -0.0161,-0.066 -0.0696,-0.4464 -0.11523,-0.957 -0.0457,-0.5107 -0.0937,-1.183 -0.14258,-1.9668 -0.0977,-1.5675 -0.19634,-3.5792 -0.26953,-5.6543 -0.34502,-9.7811 -0.74341,-12.8506 -3.33789,-25.7051 -1.94246,-9.6241 -1.71055,-17.543 0.94922,-31.875 0.51558,-2.7784 1.14724,-6.4608 1.4082,-8.209 0.0542,-0.3629 0.11056,-0.6038 0.16797,-0.9277 0.10125,1.1105 0.17169,2.0607 0.39648,3.7793 0.33853,2.588 0.76017,5.4501 1.10352,7.3262 0.7958,4.3485 2.53071,11.6567 4.09375,17.2578 0.65984,2.3644 0.72947,3.0767 0.7832,7.7109 0.0186,1.5958 0.0697,3.0345 0.14453,4.1875 0.0748,1.1531 0.16318,1.9981 0.29883,2.5156 0.59472,2.2691 3.26544,9.5782 4.27735,11.709 1.64666,3.4674 2.42126,5.4591 5.10351,13.1133 3.34464,9.5448 4.09262,11.4853 8.00586,20.752 1.72162,4.0768 3.82441,9.2314 4.66211,11.4277 0.84978,2.228 2.48559,6.1954 3.64453,8.8437 2.13597,4.8815 3.69856,8.503 4.72656,10.9512 0.51401,1.2241 0.89505,2.1559 1.14454,2.8008 0.12474,0.3224 0.21718,0.5736 0.27539,0.748 0.0582,0.1745 0.0664,0.349 0.0664,0.1993 0,0.3196 0.0982,0.5167 0.22071,0.8281 0.12252,0.3113 0.2859,0.6657 0.46875,1.0078 0.29098,0.5444 0.40395,0.7792 0.47461,1.5977 0.0707,0.8184 0.064,2.1871 0.0352,4.7578 -0.0598,5.3402 0.35837,9.4201 1.35547,13.123 0.13752,0.5107 0.29767,1.6167 0.32812,2.3242 0.017,0.3961 0.0524,0.7407 0.10352,1.0079 0.0256,0.1335 0.0486,0.2424 0.10352,0.3671 0.0275,0.062 0.0522,0.1348 0.16601,0.2344 0.0166,0.014 0.0576,0.022 0.0801,0.037 0.0173,0.032 0.034,0.061 0.0644,0.1348 0.0874,0.2123 0.19794,0.5511 0.29688,0.9375 0.2145,0.8375 0.34998,2.7168 0.34961,4.8926 -3.7e-4,2.1757 -0.12151,4.6798 -0.36328,6.9004 -0.25025,2.2981 -0.33679,4.2857 -0.26172,5.8496 0.0751,1.5638 0.25649,2.689 0.7832,3.3945 0.67089,0.8986 1.66593,1.3115 2.58203,1.2012 0.9161,-0.1103 1.74755,-0.7783 2.00977,-1.8242 0.30681,-1.2239 0.6529,-4.6291 0.74609,-7.0079 0.0272,-0.6939 0.25579,-2.1041 0.4961,-2.998 0.23615,-0.8786 0.37771,-2.3646 0.44531,-3.6367 0.0602,1.7846 0.0581,4.3677 -0.0117,9.582 -0.0753,5.6277 -0.10798,8.6045 -0.0606,10.2754 0.0237,0.8354 0.0643,1.3448 0.14453,1.7246 0.0803,0.3798 0.23651,0.6542 0.38672,0.8359 0.50684,0.6132 1.31768,0.9086 2.13477,0.9981 0.81709,0.089 1.6695,-0.023 2.28515,-0.5215 0.34474,-0.2791 0.66226,-0.6671 0.77539,-1.3223 0.11314,-0.6551 0.13416,-1.6282 0.17579,-3.4941 0.048,-2.1509 0.17468,-4.2482 0.3457,-5.9824 0.17102,-1.7342 0.39898,-3.1264 0.60742,-3.7715 0.12677,-0.3926 0.16675,-0.9641 0.19141,-1.6856 0.22522,2.8815 0.34026,5.6483 0.28125,9.7715 -0.0475,3.3171 -0.0611,5.0888 0.13086,6.2285 0.096,0.5699 0.25422,1.0007 0.50976,1.3418 0.25554,0.3412 0.58024,0.5609 0.9336,0.7715 0.62989,0.3757 1.40373,0.4372 2.14257,0.293 0.73885,-0.1442 1.45946,-0.4999 1.98438,-1.0664 0.33295,-0.3592 0.59956,-0.7594 0.69922,-1.4043 0.0996,-0.6449 0.10351,-1.5562 0.10351,-3.2676 0,-1.9595 0.15904,-4.8174 0.34571,-6.2676 0.40966,-3.1823 0.33542,-7.3289 -0.0664,-9.9843 0.59275,1.848 0.85423,3.4861 1.24805,9.1582 0.18947,2.7292 0.33771,4.3147 0.64453,5.3847 0.30682,1.0701 0.88322,1.6434 1.63672,2.0117 h 0.002 c 0.48013,0.2343 0.82089,0.3907 1.22461,0.4063 0.40372,0.016 0.75291,-0.1166 1.22656,-0.3145 0.44145,-0.1844 0.84054,-0.4004 1.16016,-0.7539 0.31962,-0.3534 0.53259,-0.8191 0.66992,-1.4257 0.27465,-1.2134 0.30574,-3.0596 0.30273,-6.3477 -0.006,-5.9211 -0.0625,-6.5397 -1.24218,-13.1875 -1.15936,-6.5336 -1.27149,-7.3287 -1.27149,-9.1191 v -0.5313 l 1.74024,1.707 c 3.20381,3.1407 5.7684,4.5772 8.74804,4.8164 1.19742,0.096 2.08716,0.043 2.76563,-0.3105 0.67847,-0.3535 1.02734,-1.0745 1.02734,-1.8828 0,-0.4412 -0.0776,-0.8817 -0.375,-1.2383 -0.29742,-0.3566 -0.71809,-0.6208 -1.4082,-1.0391 -1.69206,-1.0255 -2.80193,-2.1951 -3.62109,-3.8007 -0.37627,-0.7375 -1.23084,-1.8773 -1.99024,-2.6953 -1.78328,-1.9212 -3.62549,-4.2941 -4.47656,-5.7422 -0.29121,-0.4956 -0.87967,-1.142 -1.73828,-2 -0.85861,-0.8581 -1.9768,-1.893 -3.26563,-3.0196 -2.27817,-1.9912 -4.92909,-4.4648 -5.82422,-5.4218 -0.92302,-0.987 -1.50752,-1.7751 -2.08789,-3.0528 -0.58036,-1.2777 -1.14815,-3.0532 -1.96875,-5.9258 -0.50992,-1.785 -1.36536,-4.4914 -1.91211,-6.0488 -1.464,-4.1702 -4.31233,-13.1754 -4.91797,-15.5332 -0.53042,-2.0648 -1.12067,-5.4961 -1.68945,-9.8496 -0.54832,-4.1968 -1.43367,-10.0776 -2.5332,-16.8184 -0.60235,-3.6931 -1.47811,-9.3005 -1.94336,-12.4531 -0.46746,-3.1678 -1.10075,-6.7997 -1.43164,-8.166 -0.96779,-3.9959 -4.40041,-14.1802 -6.16016,-18.2832 -1.96628,-4.5847 -2.06376,-4.8454 -2.7539,-7.4902 -0.96712,-3.7063 -1.82209,-9.7513 -3.41016,-24.2227 -0.88965,-8.107 -1.16364,-14.5376 -1.22852,-29 -0.0629,-14.0306 -0.11503,-15.4747 -0.69531,-19.2559 -1.49855,-9.7647 -3.28894,-15.771 -5.86133,-19.2753 -1.38597,-1.8882 -4.58512,-4.5032 -8.66211,-7.1758 -3.52855,-2.3132 -4.47555,-2.7902 -9.47265,-4.7539 -6.24648,-2.4547 -16.53263,-7.5042 -27.36914,-13.4453 -2.52534,-1.3844 -4.81641,-3.4097 -5.73242,-4.9727 -0.32967,-0.5625 -0.77341,-1.9182 -1.12305,-3.4941 -0.34964,-1.576 -0.63106,-3.3987 -0.7461,-5.0118 -0.15199,-2.1312 -0.2355,-4.1424 -0.24804,-5.7148 -0.006,-0.7862 0.006,-1.4637 0.0351,-1.9863 0.0287,-0.5226 0.0877,-0.9134 0.11915,-1.0117 0.29672,-0.9271 0.37709,-1.2849 1.55078,-7.0547 l 0.71875,-3.53126 0.43164,-0.0117 c 0.77508,-0.0216 1.26095,-0.0422 1.72461,-0.22851 0.46366,-0.18635 0.80276,-0.50551 1.28906,-0.99219 0.70451,-0.70497 1.39158,-1.9587 1.97656,-3.46289 0.49098,-1.26235 1.06792,-3.26583 1.53125,-5.1543 0.46333,-1.88847 0.81445,-3.5826 0.81445,-4.45508 0,-0.80679 -0.28532,-1.91544 -0.66601,-3.00585 -0.38069,-1.09042 -0.83021,-2.10678 -1.33203,-2.70313 l -0.5625,-0.66797 0.38281,-1.07617 c 0.6453,-1.8169 1.0236,-4.75011 1.35352,-10.06445 0.3234,-5.21005 0.31564,-4.90214 0.18164,-7.75586 -0.13513,-2.87795 -0.53295,-5.34078 -1.19727,-6.58594 -0.20376,-0.38188 -0.55206,-1.17423 -0.73828,-1.68359 -0.23595,-0.64523 -0.80912,-1.62941 -1.3457,-2.36328 -4.17023,-5.70362 -6.36444,-8.05736 -8.8086,-9.3086 -0.7284,-0.37288 -1.66592,-1.01165 -1.91015,-1.2539 -0.48693,-0.48297 -1.33263,-0.88829 -2.11524,-1.10743 -0.59979,-0.16791 -1.45104,-0.66661 -1.65429,-0.88672 -1.10177,-1.19302 -2.39248,-1.69586 -4.25,-1.6875 -0.49408,0.002 -0.80798,-0.0232 -0.99805,-0.0527 -0.009,-0.0341 0.0249,-0.0462 0.008,-0.082 -0.12572,-0.26322 -0.36036,-0.31873 -0.49609,-0.33789 z m 0.4707,0.63476 c 0.006,0.0196 0.0204,0.0235 0.0234,0.0449 0.0169,0.11992 -0.025,0.22006 -0.0508,0.26171 0.0364,-0.0589 0.008,-0.20128 0.0273,-0.30664 z m -11.63672,0.24805 c -0.0668,0.096 -0.15116,0.11413 -0.14648,0.11328 0.005,-8.4e-4 0.0693,-0.005 0.16992,0.008 0.20132,0.0259 0.54137,0.11302 0.97656,0.26758 0.83217,0.29557 1.47591,0.46692 2.00391,0.4961 0.264,0.0146 0.50524,-0.003 0.73828,-0.10157 0.14149,-0.0596 0.21966,-0.21454 0.32226,-0.34179 0.0398,0.0193 0.0911,0.0335 0.26954,0.15039 0.86367,0.5659 2.07975,0.52904 3.22656,0.0625 0.0901,-0.0367 0.69314,-0.1709 1.11133,-0.20508 0.50003,-0.0408 1.29908,-0.15824 1.84961,-0.27149 0.15914,-0.0327 0.17131,-0.0283 0.26171,-0.0371 0.0365,0.0561 0.0558,0.13612 0.0957,0.16992 0.17488,0.1482 0.31573,0.16929 0.47461,0.20117 0.31775,0.0638 0.73015,0.0809 1.30468,0.0781 1.6971,-0.008 2.5586,0.33528 3.50977,1.36524 0.48132,0.52121 1.32698,0.95011 2.11914,1.17187 0.60929,0.17061 1.47271,0.64629 1.68164,0.85352 0.4516,0.44793 1.34442,1.01995 2.15625,1.43555 2.2056,1.12911 4.30854,3.33391 8.45703,9.00781 0.47694,0.6523 1.05653,1.68427 1.21485,2.11719 0.20794,0.56879 0.55022,1.34828 0.79687,1.81054 0.46038,0.86291 0.94854,3.3606 1.08008,6.16211 0.13428,2.85972 0.14187,2.43464 -0.18164,7.64649 -0.3283,5.28827 -0.72632,8.18456 -1.29688,9.79101 l -0.57422,1.61719 0.92969,1.10547 c 0.30194,0.35882 0.7934,1.36248 1.15235,2.39062 0.35895,1.02815 0.61132,2.13562 0.61132,2.67578 0,0.55319 -0.32881,2.35683 -0.78515,4.2168 -0.45634,1.85998 -1.03565,3.85548 -1.49219,5.0293 -0.55376,1.42393 -1.25558,2.62245 -1.75195,3.11914 -0.47324,0.47361 -0.70414,0.67142 -0.95313,0.77148 -0.24898,0.10007 -0.62015,0.13505 -1.38086,0.15625 l -1.22656,0.0352 -0.87695,4.30859 c -1.17358,5.76935 -1.23113,6.04205 -1.52149,6.94925 -0.10081,0.315 -0.13553,0.7068 -0.16601,1.2617 -0.0305,0.5548 -0.0435,1.2483 -0.0371,2.0488 0.0128,1.6009 0.0986,3.6276 0.25195,5.7774 0.11944,1.6747 0.4073,3.5342 0.76758,5.1582 0.36028,1.6239 0.76763,2.9868 1.23437,3.7832 1.08399,1.8496 3.45931,3.8877 6.11524,5.3437 10.86081,5.9545 21.15147,11.0114 27.48437,13.5 4.98696,1.9597 5.77532,2.3548 9.28907,4.6582 4.02445,2.6382 7.20041,5.2916 8.40429,6.9317 2.37738,3.2386 4.19016,9.1279 5.67969,18.8339 0.57601,3.7533 0.62068,5.0809 0.68359,19.1094 0.0649,14.4736 0.34087,20.9633 1.23438,29.1055 1.58901,14.48 2.43997,20.5444 3.4375,24.3672 0.69221,2.6527 0.83352,3.0439 2.80078,7.6308 1.70808,3.9826 5.17633,14.2787 6.10742,18.1231 0.30323,1.2521 0.95162,4.929 1.41602,8.0761 0.46667,3.1622 1.33987,8.7707 1.94336,12.4708 1.09839,6.7338 1.98336,12.6065 2.52929,16.7851 0.57153,4.3745 1.16281,7.8198 1.71485,9.9688 0.63994,2.4913 3.46289,11.4056 4.9414,15.6171 0.53466,1.523 1.39249,4.2347 1.89454,5.9922 0.82408,2.8848 1.39728,4.6926 2.01953,6.0625 0.62224,1.37 1.30378,2.2937 2.26758,3.3243 0.97794,1.0455 3.5997,3.4827 5.89648,5.4902 1.27577,1.1151 2.38054,2.1389 3.2168,2.9746 0.83625,0.8357 1.4159,1.5181 1.58203,1.8008 0.92648,1.5764 2.7799,3.9452 4.60742,5.914 0.69118,0.7446 1.55628,1.9302 1.83203,2.4707 0.89826,1.7608 2.17596,3.0992 3.99414,4.2012 0.67397,0.4085 1.02548,0.6651 1.1582,0.8242 0.13273,0.1592 0.14258,0.23 0.14258,0.5977 0,0.5832 -0.12037,0.8033 -0.49023,0.9961 -0.36987,0.1927 -1.10586,0.2908 -2.22266,0.2012 -2.71286,-0.2178 -5.00448,-1.4705 -8.1289,-4.5333 l -3.43946,-3.373 v 2.9102 c 0,1.8343 0.12719,2.7581 1.28711,9.2949 1.17888,6.6435 1.22072,7.0982 1.22656,13.0137 0.003,3.2787 -0.0517,5.1198 -0.27929,6.125 -0.11377,0.5025 -0.2572,0.7793 -0.43555,0.9765 -0.17835,0.1973 -0.41945,0.3399 -0.80273,0.5 -0.45091,0.1884 -0.65239,0.2461 -0.80274,0.2403 -0.15034,-0.01 -0.36637,-0.082 -0.82617,-0.3067 -0.62329,-0.3047 -0.8577,-0.4973 -1.11328,-1.3887 -0.25558,-0.8913 -0.42069,-2.4618 -0.60938,-5.1796 -0.46915,-6.7571 -0.66732,-8.0485 -1.60937,-10.5665 -0.35036,-0.9365 -0.63672,-2.226 -0.63672,-2.5546 0,-0.3007 -0.0313,-0.573 -0.10156,-0.8106 -0.0351,-0.1188 -0.0761,-0.2298 -0.15821,-0.3476 -0.0821,-0.1179 -0.25048,-0.2891 -0.51953,-0.2891 -0.23125,0 -0.44577,0.1555 -0.54297,0.2949 -0.0972,0.1395 -0.13589,0.271 -0.16601,0.4082 -0.0602,0.2745 -0.0707,0.5872 -0.0547,0.957 0.0321,0.7397 0.18328,1.6934 0.44141,2.6895 0.51311,1.9802 0.63003,7.4596 0.17578,10.9883 -0.19838,1.5411 -0.35352,4.3821 -0.35352,6.3945 0,1.7079 -0.0152,2.6194 -0.0918,3.1152 -0.0766,0.4959 -0.14397,0.5519 -0.44532,0.877 -0.35048,0.3783 -0.89185,0.6564 -1.4414,0.7637 -0.54955,0.1072 -1.0917,0.037 -1.43946,-0.1699 -0.32001,-0.1908 -0.50933,-0.3313 -0.64453,-0.5118 -0.13519,-0.1805 -0.24381,-0.4308 -0.32422,-0.9082 -0.16081,-0.9548 -0.16459,-2.736 -0.11718,-6.0488 0.0863,-6.0325 -0.049,-8.9634 -0.64844,-14.0547 -0.12261,-1.0413 -0.23933,-1.7913 -0.34961,-2.2871 -0.0551,-0.2479 -0.10152,-0.4251 -0.17969,-0.5918 -0.0391,-0.083 -0.0606,-0.1787 -0.24414,-0.2969 -0.0917,-0.059 -0.26053,-0.1087 -0.41406,-0.072 -0.15353,0.036 -0.24796,0.1273 -0.30078,0.1933 -0.10564,0.1321 -0.1183,0.2161 -0.14063,0.3028 -0.0223,0.087 -0.0381,0.174 -0.0508,0.2754 -0.0253,0.2027 -0.0408,0.4556 -0.0488,0.7714 -0.0161,0.6317 9.7e-4,1.5113 0.0547,2.6368 0.0622,1.3036 0.0809,2.3551 0.0606,3.1503 -0.0203,0.7953 -0.0926,1.3492 -0.16211,1.5645 -0.26654,0.825 -0.47827,2.2173 -0.65234,3.9824 -0.17408,1.7652 -0.29908,3.8817 -0.34766,6.0567 -0.0416,1.8634 -0.0777,2.8473 -0.16406,3.3476 -0.0864,0.5004 -0.11089,0.4662 -0.41797,0.7149 -0.28646,0.2319 -0.91752,0.3735 -1.54688,0.3046 -0.62936,-0.069 -1.22761,-0.3437 -1.47461,-0.6425 -0.0932,-0.1128 -0.12224,-0.1418 -0.17773,-0.4043 -0.0555,-0.2626 -0.1,-0.7352 -0.12305,-1.5469 -0.0461,-1.6234 -0.0147,-4.6055 0.0606,-10.2324 0.0774,-5.7807 0.10354,-8.9353 0.0117,-10.6856 -0.0459,-0.8751 -0.10692,-1.3928 -0.26172,-1.789 -0.0774,-0.1982 -0.19471,-0.3828 -0.37305,-0.5078 -0.17833,-0.1251 -0.38512,-0.1582 -0.53906,-0.1583 -0.20984,0 -0.34554,0.1215 -0.4043,0.1915 -0.0588,0.07 -0.0793,0.1189 -0.0977,0.1621 -0.0368,0.086 -0.0534,0.1522 -0.0703,0.2304 -0.0339,0.1565 -0.0584,0.3463 -0.082,0.5762 -0.0472,0.4597 -0.0811,1.0748 -0.0937,1.752 -0.0239,1.2835 -0.25891,3.1564 -0.48828,4.0097 -0.26515,0.9863 -0.49813,2.3723 -0.53125,3.2188 -0.0906,2.313 -0.48091,5.8637 -0.7168,6.8047 -0.17154,0.6842 -0.61798,1.0091 -1.1582,1.0742 -0.54022,0.065 -1.18151,-0.1656 -1.66016,-0.8067 -0.23771,-0.3184 -0.51656,-1.3597 -0.58789,-2.8457 -0.0713,-1.4859 0.0116,-3.4305 0.25782,-5.6914 0.2466,-2.2648 0.36876,-4.797 0.36914,-7.0097 3.7e-4,-2.2128 -0.10801,-4.0753 -0.38086,-5.1407 -0.10805,-0.4219 -0.2267,-0.7906 -0.3418,-1.0703 -0.0575,-0.1398 -0.10957,-0.2535 -0.18555,-0.3672 -0.0348,-0.052 -0.077,-0.1101 -0.16015,-0.1757 -0.005,-0.019 -0.005,-0.014 -0.01,-0.037 -0.0363,-0.1896 -0.0725,-0.5043 -0.0879,-0.8632 -0.0345,-0.8025 -0.18307,-1.8863 -0.35937,-2.541 -0.96742,-3.5927 -1.38147,-7.5691 -1.32227,-12.8516 0.0289,-2.5728 0.0398,-3.9415 -0.0391,-4.8555 -0.0789,-0.9139 -0.2806,-1.4074 -0.58789,-1.9824 -0.16372,-0.3064 -0.31599,-0.6352 -0.42188,-0.9043 -0.10588,-0.2691 -0.15039,-0.5484 -0.15039,-0.4609 0,-0.2525 -0.0522,-0.315 -0.11914,-0.5157 -0.0669,-0.2006 -0.16306,-0.4622 -0.29101,-0.7929 -0.25592,-0.6615 -0.63837,-1.5995 -1.1543,-2.8282 -1.03187,-2.4573 -2.5955,-6.0792 -4.73242,-10.9628 -1.15028,-2.6287 -2.78658,-6.6007 -3.625,-8.7989 -0.8505,-2.2299 -2.95018,-7.3746 -4.67578,-11.4609 -3.91158,-9.2627 -4.64114,-11.1545 -7.98438,-20.6953 -2.68427,-7.66 -3.48624,-9.7191 -5.14453,-13.211 -0.91836,-1.9338 -3.67224,-9.4778 -4.21094,-11.5332 -0.0894,-0.3411 -0.19628,-1.1977 -0.26953,-2.3261 -0.0733,-1.1285 -0.1242,-2.5533 -0.14258,-4.1348 -0.0539,-4.6449 -0.15037,-5.5682 -0.82031,-7.9687 -1.55392,-5.5685 -3.28711,-12.8776 -4.07227,-17.168 -0.33704,-1.8417 -0.75877,-4.7015 -1.0957,-7.2774 -0.33692,-2.5758 -0.58789,-4.9321 -0.58789,-5.5605 0,-0.1932 -0.0435,-0.3747 -0.15039,-0.541 -0.10688,-0.1664 -0.31569,-0.3438 -0.5957,-0.3438 -0.22617,0 -0.33959,0.1175 -0.39649,0.1797 -0.0569,0.062 -0.0806,0.1071 -0.10351,0.1504 -0.0459,0.087 -0.076,0.1675 -0.10742,0.2617 -0.0629,0.1885 -0.12434,0.428 -0.19141,0.7227 -0.13414,0.5893 -0.28123,1.387 -0.41211,2.2636 -0.25638,1.7175 -0.88894,5.4072 -1.40234,8.1739 -2.67002,14.3872 -2.91401,22.5094 -0.94727,32.2539 2.59236,12.8439 2.97402,15.7812 3.31836,25.543 0.0735,2.0835 0.17307,4.1022 0.27148,5.6816 0.0492,0.7897 0.0976,1.4691 0.14454,1.9941 0.047,0.5251 0.0813,0.8631 0.14062,1.1055 0.13543,0.5531 0.26228,1.5982 0.26563,2.1856 0.003,0.4573 0.0372,0.8191 0.15429,1.1425 0.11708,0.3235 0.3527,0.6009 0.63867,0.7539 0.0644,0.034 0.47015,0.4872 0.58985,0.7989 0.11139,0.2901 0.43003,1.5795 0.69922,2.8847 0.26919,1.3053 0.51861,2.7029 0.58789,3.3692 0.0573,0.552 0.28667,1.5063 0.52734,2.2695 0.11126,0.3527 0.19426,0.6738 0.23828,0.8887 0.0178,0.087 0.0253,0.1364 0.0293,0.1718 -0.009,0.032 -0.0461,0.07 -0.0488,0.096 -0.0197,0.1856 0.0253,0.2576 0.0566,0.33 0.0626,0.1449 0.14291,0.2563 0.24805,0.3828 -0.0131,-0.016 0.0693,0.1275 0.11133,0.3008 0.0421,0.1734 0.0663,0.3854 0.0625,0.5586 -0.0129,0.5707 0.13326,1.5379 0.32226,2.3457 1.30269,5.5681 1.68364,7.656 1.95117,10.711 0.35121,4.0103 0.73633,7.2452 1.27149,10.6757 0.20062,1.286 0.58684,4.3757 0.85351,6.8282 0.42591,3.9163 0.44235,5.0068 0.14649,9.4336 -0.49412,7.3931 -1.89847,22.1603 -2.70117,28.4023 -0.38914,3.026 -0.94857,9.0083 -1.24805,13.332 -0.31749,4.5838 -1.0367,12.2733 -1.75391,19.1856 -0.3586,3.4561 -0.71575,6.7188 -1.02343,9.3027 -0.30769,2.5839 -0.57203,4.5156 -0.7168,5.207 -0.23542,1.1243 -0.66939,2.8207 -0.94727,3.7149 -1.647,5.3001 -2.3007,15.7078 -1.74609,26.7773 0.31277,6.2424 0.58264,7.7614 2.6582,14.9571 1.25143,4.3385 3.12566,13.8284 3.66016,18.539 0.74657,6.5796 0.54027,17.5271 -0.55273,28.459 -0.42787,4.2793 -0.88782,12.9861 -1.12696,21.3184 -0.077,2.6859 -0.26736,6.6571 -0.42187,8.7988 -0.47616,6.6002 -0.74503,11.3536 -0.81446,14.6953 -0.0694,3.3417 0.0313,5.2367 0.41016,6.3106 0.10283,0.2914 0.18044,0.5728 0.2207,0.7714 0.0201,0.099 0.0298,0.1797 0.0312,0.211 7.2e-4,0.016 -0.002,0.02 0.002,-0.01 0.004,-0.028 2e-4,-0.1037 0.12109,-0.2246 h 0.002 c -0.22897,0.2272 -0.17642,0.4185 -0.16015,0.5351 0.0163,0.1167 0.0482,0.2123 0.0879,0.3145 0.0793,0.2043 0.19687,0.4251 0.3457,0.6523 0.88311,1.3478 1.45995,4.1307 1.62305,8.582 l 0.16406,4.5 1.38867,1.8067 c 1.28183,1.6689 3.6391,6.0509 4.73242,8.8398 0.18632,0.4753 0.39769,0.955 0.5918,1.3535 0.19411,0.3985 0.33515,0.6837 0.52734,0.9102 0.0776,0.091 0.15542,0.2078 0.20508,0.3008 0.0497,0.093 0.0508,0.2016 0.0508,0.076 0,0.186 0.043,0.2292 0.0723,0.293 0.0292,0.064 0.0612,0.1212 0.0996,0.1856 0.0768,0.1287 0.1756,0.2792 0.29687,0.4492 0.24255,0.34 0.56968,0.7597 0.92969,1.1914 0.85013,1.0195 2.12632,2.7905 3.25977,4.4766 1.13344,1.686 2.14549,3.3365 2.42773,3.9746 0.31695,0.7166 0.83838,1.6004 1.25977,2.1054 1.62702,1.9496 2.29074,4.2509 2.2832,8.1621 -0.005,2.6182 -0.0477,2.9118 -0.71484,4.2618 -0.20272,0.4102 -0.45256,0.8066 -0.68946,1.1113 -0.23689,0.3047 -0.49191,0.5152 -0.54101,0.539 -0.48939,0.2372 -0.86844,0.6792 -1.06836,1.2735 -0.19993,0.5943 -0.27463,1.3446 -0.30078,2.3945 -0.0183,0.7348 -0.21246,1.281 -0.44727,1.5723 -0.23481,0.2913 -0.44865,0.3755 -0.80859,0.2851 -0.16752,-0.042 -0.31081,-0.082 -0.50196,-0.08 -0.19114,0 -0.48415,0.1237 -0.61523,0.3242 -0.13108,0.2005 -0.14574,0.376 -0.16211,0.5703 -0.0164,0.1943 -0.0195,0.4193 -0.0195,0.7051 0,0.7892 -0.14724,1.2816 -0.35938,1.5468 -0.21214,0.2653 -0.5117,0.4004 -1.09765,0.4004 -0.49977,0 -0.83943,-0.024 -1.19336,0.2051 -0.17697,0.1146 -0.30582,0.3035 -0.36914,0.4766 -0.0633,0.1731 -0.086,0.3372 -0.10742,0.5215 -0.0321,0.2759 -0.21295,0.5639 -0.55078,0.8339 -0.33784,0.2701 -0.81988,0.5021 -1.33985,0.6426 -1.03994,0.2811 -2.19126,0.1571 -2.69531,-0.3164 l -1.26563,-1.1914 -0.34179,1.7051 c -0.0422,0.2112 -0.25853,0.5099 -0.66992,0.791 -0.4114,0.2811 -0.98919,0.5349 -1.625,0.7129 -1.2702,0.3555 -2.7752,0.3798 -3.63868,-0.01 -4.9e-4,-2e-4 -0.001,3e-4 -0.002,0 -3.4e-4,-10e-5 -0.002,2e-4 -0.002,0 -0.98774,-0.4436 -2.74629,-2.048 -3.54102,-3.3027 -0.27233,-0.43 -0.80102,-1.7119 -1.06445,-2.666 -0.28891,-1.0465 -0.85559,-2.5512 -1.30078,-3.4492 -0.43692,-0.8815 -0.91553,-2.7308 -1.30274,-5.1231 -0.3872,-2.3922 -0.70036,-5.3477 -0.88867,-8.5469 -0.25409,-4.3169 -0.39626,-5.156 -1.30273,-7.832 -0.54306,-1.6031 -1.16929,-3.6971 -1.37305,-4.5742 -0.21511,-0.9261 -0.51315,-2.1844 -0.66406,-2.8047 -0.12545,-0.5156 -0.34997,-2.2552 -0.45703,-3.6992 -0.15223,-2.0532 -0.45522,-3.4112 -1.22071,-5.459 -0.53172,-1.4226 -1.06668,-3.4621 -1.16406,-4.3594 -0.13207,-1.217 -0.59206,-2.7588 -1.23047,-4.1758 -1.38302,-3.0698 -1.49328,-4.4661 -0.58203,-7.3828 1.37587,-4.4035 1.25907,-10.697 -0.29297,-20.5312 -0.78399,-4.9676 -2.97758,-17.1486 -3.8125,-21.166 -1.16697,-5.615 -1.52706,-6.9333 -4.43359,-16.1953 -1.23408,-3.9325 -1.87627,-6.2468 -2.34571,-11.1797 -0.46943,-4.933 -0.75661,-12.473 -1.25195,-26.7285 l -0.24609,-7.086 -1.5,-3.8574 c -0.81284,-2.0911 -1.91088,-4.6626 -2.47657,-5.7852 -1.50872,-2.994 -3.58002,-9.2099 -4.20312,-12.6211 -0.40213,-2.2016 -0.5766,-4.2976 -0.58008,-7.0292 -0.003,-2.18 -0.12329,-5.0717 -0.27539,-6.502 -0.14494,-1.3629 -0.40194,-4.7112 -0.56836,-7.4004 -0.16782,-2.712 -0.54504,-6.614 -0.84375,-8.7207 -0.69243,-4.8834 -3.7662,-19.7457 -5.88086,-28.4707 -0.99744,-4.1154 -1.87002,-8.5691 -2.25976,-11.5195 -0.1771,-1.3408 -0.37133,-2.6038 -0.54297,-3.5645 -0.0858,-0.4803 -0.16516,-0.8842 -0.23633,-1.1914 -0.0356,-0.1536 -0.068,-0.2816 -0.10156,-0.3906 -0.0335,-0.109 -0.031,-0.1715 -0.15235,-0.332 -0.11092,-0.1468 -0.31618,-0.3028 -0.54492,-0.3399 -0.22874,-0.037 -0.43127,0.015 -0.63672,0.094 -0.41089,0.1568 -0.89844,0.4564 -1.6875,0.9668 -1.51069,0.9772 -2.06901,1.1949 -3.42187,1.3378 -0.97884,0.1034 -2.02634,0.013 -2.28516,-0.086 -0.31681,-0.1216 -0.54648,-0.209 -0.83984,-0.1934 -0.14668,0.01 -0.32424,0.062 -0.45899,0.1778 -0.13474,0.1154 -0.20542,0.264 -0.24218,0.3887 -0.0302,0.1024 -0.0315,0.138 -0.0488,0.2402 -0.0174,0.1021 -0.0393,0.2378 -0.0645,0.4023 -0.0504,0.3291 -0.11664,0.7783 -0.19335,1.3184 -0.15343,1.0802 -0.35028,2.5209 -0.55469,4.0625 -0.40608,3.0623 -1.17146,7.5399 -1.69141,9.8984 -1.32713,6.02 -2.87852,15.7894 -3.21679,20.3028 -0.1519,2.0262 -0.46277,4.9616 -0.68555,6.4765 -0.22479,1.5287 -0.47018,5.5298 -0.66992,10.0586 -0.19975,4.5289 -0.34655,9.5458 -0.34766,12.9766 -0.002,6.0203 -0.35126,8.5803 -1.75391,12.8672 -0.67505,2.0632 -1.76455,5.0297 -2.40039,6.5429 -0.65987,1.5707 -1.55151,4.1174 -2.00586,5.7305 -0.5748,2.0409 -0.87537,3.3617 -0.83398,6.5332 0.0414,3.1716 0.40902,8.2321 1.13477,17.9512 0.16022,2.1454 0.29148,5.8036 0.29101,8.084 -9.9e-4,5.8231 -0.46165,8.4976 -3.92578,22.8261 -0.59778,2.4725 -1.29432,5.6147 -1.55469,7.0274 -0.25416,1.3789 -0.71478,3.7111 -1.02148,5.168 -0.31045,1.4747 -0.66745,3.4212 -0.80078,4.375 -0.1262,0.9027 -0.4885,3.0521 -0.79883,4.7402 -0.77699,4.226 -1.43945,11.7313 -1.43945,16.2832 0,3.0424 0.13639,4.3056 0.71679,6.5937 1.03576,4.0832 1.12139,5.8674 0.42383,8.1504 -2.15298,7.0463 -2.5494,9.2531 -2.81641,15.668 -0.19896,4.7795 -0.30759,5.649 -0.96484,7.709 -0.41029,1.2859 -1.04946,2.9436 -1.36523,3.5683 -0.98093,1.9408 -1.36945,5.0419 -1.32618,9.6973 0.0102,1.092 -0.0122,2.1861 -0.0547,3.0625 -0.0212,0.4382 -0.0465,0.8215 -0.0762,1.1191 -0.0296,0.2977 -0.074,0.5277 -0.0859,0.5665 -0.16395,0.5345 -0.61037,2.227 -1.01563,3.8339 -0.39802,1.5784 -1.0192,3.4429 -1.26758,3.9297 -0.34215,0.6708 -0.77947,1.8083 -1.01757,2.6348 -0.19801,0.6874 -0.8304,2.0043 -1.337893,2.7539 -0.82877,1.2242 -0.97751,1.346 -2.14063,1.6914 -1.414136,0.42 -2.67743,0.4956 -3.689453,0.2793 -1.012023,-0.2163 -1.771144,-0.7061 -2.269531,-1.4668 -0.179306,-0.2736 -0.345623,-1.2497 -0.271485,-2.2871 0.07414,-1.0374 0.337659,-2.1691 0.705078,-2.8887 0.244924,-0.4796 0.39377,-0.7696 0.449219,-1.0898 0.02773,-0.1601 0.03276,-0.3979 -0.140625,-0.5996 -0.173388,-0.2017 -0.40132,-0.2285 -0.546875,-0.2285 -0.3241,0 -0.441972,0.1449 -0.572266,0.2636 -0.130293,0.1188 -0.250933,0.2609 -0.380859,0.4297 -0.259852,0.3377 -0.544659,0.7815 -0.828125,1.2735 -0.566931,0.9839 -1.121684,2.142 -1.363281,3.0214 -0.08089,0.2945 -0.178911,0.6007 -0.267578,0.8457 -0.08867,0.2451 -0.201551,0.4641 -0.183594,0.4375 -0.04174,0.062 -0.49874,0.4125 -1.007813,0.6348 -0.509072,0.2223 -1.102284,0.375 -1.392578,0.375 -0.420951,0 -1.016634,-0.2268 -1.511718,-0.5879 -0.495084,-0.3611 -0.880187,-0.8525 -0.992188,-1.2305 -0.115101,-0.3884 -0.235932,-0.7037 -0.501953,-0.9472 -0.266021,-0.2435 -0.673254,-0.3629 -1.013288,-0.3629 -0.734204,0 -1.504588,-0.5339 -1.892962,-1.4633 -0.303326,-0.7261 -0.841443,-1.2253 -1.541016,-1.3652 -0.330291,-0.066 -0.554559,-0.2337 -0.746093,-0.586 -0.191535,-0.3522 -0.31836,-0.8991 -0.31836,-1.6172 0,-0.7496 -0.13942,-1.423 -0.646484,-1.8417 -0.254152,-0.2099 -0.725296,-0.9871 -1.048828,-1.8653 -0.323533,-0.8781 -0.544922,-1.8805 -0.544922,-2.5683 0,-0.7442 0.378733,-2.9757 0.83789,-5.043 0.229579,-1.0336 0.47794,-2.0436 0.705079,-2.8477 0.227138,-0.804 0.475777,-1.4512 0.539062,-1.5527 0.208892,-0.335 0.699675,-0.9735 1.025391,-1.3262 0.244973,-0.2653 0.520893,-0.6873 0.849609,-1.2324 0.328716,-0.545 0.687654,-1.1934 1.003906,-1.8223 0.586169,-1.1656 1.980443,-3.2561 3.029297,-4.5273 2.100593,-2.5461 2.678727,-3.3518 4.462891,-6.2148 0.800484,-1.2846 1.28262,-2.4766 1.494141,-3.7286 0.177175,-1.0486 0.853826,-2.7905 2.0625,-5.1797 1.982321,-3.9181 2.209091,-5.0084 1.796874,-8.496 -0.107552,-0.9102 -0.135268,-1.4181 0.07813,-2.5704 0.213393,-1.1522 0.680695,-2.926 1.566406,-6.1933 0.325706,-1.2015 0.460953,-2.3914 0.359375,-4.3535 -0.101578,-1.9622 -0.431647,-4.7172 -1.035157,-9.1543 -0.606486,-4.4593 -1.369502,-10.8271 -1.693359,-14.125 -0.325484,-3.3144 -0.833698,-8.1639 -1.128906,-10.7871 -0.294474,-2.6169 -0.671864,-6.0841 -0.837891,-7.6973 -0.169014,-1.642 -0.758044,-6.1679 -1.3125,-10.0996 -0.90968,-6.4509 -1.004674,-7.7108 -1.03125,-13.6543 -0.02848,-6.3723 0.03598,-7.2653 1.251953,-17.7227 0.375991,-3.2334 0.904515,-6.4497 1.97461,-12.0058 0.842549,-4.3745 0.864474,-4.7094 0.626953,-9.2207 -0.132456,-2.5157 -0.242188,-8.3198 -0.242188,-12.8555 0,-9.0339 0.120055,-8.0917 -1.886718,-14.0234 -0.955769,-2.825 -2.136949,-9.3385 -3.3125,-18.459 -0.313687,-2.4338 -0.878875,-6.2601 -1.259766,-8.5254 -0.18867,-1.1221 -0.360327,-2.2493 -0.484375,-3.1582 -0.124048,-0.9089 -0.197266,-1.646 -0.197266,-1.8086 0,-0.3597 -0.08171,-0.9744 -0.207031,-1.8125 -0.125319,-0.8382 -0.296714,-1.8562 -0.486328,-2.8613 -0.373947,-1.9823 -0.942429,-5.51 -1.257812,-7.8086 -0.317309,-2.3127 -0.767102,-5.4622 -1,-7.0078 -0.853838,-5.6662 -1.875642,-14.4084 -2.628907,-21.8926 -0.376632,-3.7421 -0.687099,-7.1709 -0.875,-9.7422 -0.09395,-1.2856 -0.157238,-2.3586 -0.183593,-3.1426 -0.01318,-0.392 -0.01542,-0.7124 -0.0098,-0.9453 0.0057,-0.2329 0.04026,-0.411 0.02344,-0.3594 0.04057,-0.1247 0.02948,-0.1349 0.03516,-0.1894 0.0057,-0.055 0.01041,-0.1178 0.01563,-0.1953 0.01043,-0.1551 0.02194,-0.3639 0.0332,-0.6231 0.02253,-0.5183 0.04727,-1.2385 0.07227,-2.1113 0.04999,-1.7456 0.102203,-4.0995 0.144532,-6.6426 0.267539,-16.0765 1.171814,-24.3006 3.238281,-29.9629 1.749294,-4.7931 2.304417,-9.4064 2.386719,-19.6094 0.05485,-6.8028 0.08014,-6.9745 2.40625,-17.3964 1.671389,-7.4889 2.042293,-11.3898 2.060547,-21.6719 0.0127,-7.1806 -0.33414,-12.0824 -1.279297,-18.002 -0.224687,-1.4073 -0.40446,-2.4687 -0.560547,-3.2109 -0.07804,-0.3711 -0.14732,-0.661 -0.22461,-0.8906 -0.03865,-0.1148 -0.07817,-0.2139 -0.132812,-0.3125 -0.05464,-0.099 -0.114684,-0.2148 -0.302734,-0.3106 -0.188051,-0.096 -0.508298,-0.032 -0.638672,0.078 -0.130374,0.1105 -0.175107,0.2111 -0.220704,0.3106 -0.09119,0.1989 -0.152555,0.4259 -0.220703,0.7305 -0.136295,0.6092 -0.279001,1.5067 -0.458984,2.7089 -0.412212,2.7535 -2.91244,13.1223 -4.808594,19.8829 -0.676389,2.4115 -0.769803,3.3031 -0.818359,7.9707 -0.01474,1.4168 -0.06285,2.8479 -0.128906,4.0058 -0.06606,1.158 -0.166789,2.0958 -0.222657,2.3203 -0.41503,1.6679 -3.129986,9.5351 -3.673828,10.6895 -0.93092,1.976 -2.710844,6.3678 -3.595703,8.8672 -3.886296,10.9774 -7.535372,20.187 -10.46289,26.4179 -3.882337,8.2631 -5.733477,12.9042 -9.460938,23.7129 -2.382578,6.9091 -4.134195,11.8554 -4.490234,12.7129 -0.18804,0.4528 -0.329722,1.2263 -0.414063,1.9551 -0.07823,0.6759 -0.289332,2.1927 -0.466797,3.3418 -0.200902,1.3008 -0.254107,3.0203 -0.132812,4.3223 0.231728,2.4875 0.360579,3.4817 0.199218,5.1425 -0.16136,1.6609 -0.62418,4.0255 -1.59375,9.1407 -0.586102,3.0921 -0.899487,4.5381 -0.810546,6.4843 0.08894,1.9463 0.56813,4.3275 1.527343,9.3848 0.282968,1.4919 0.559312,4.1868 0.601563,5.8926 0.03927,1.5854 0.047,2.3849 -0.02148,2.7578 -0.03424,0.1865 -0.06906,0.2533 -0.132813,0.3379 -0.06376,0.085 -0.184704,0.1943 -0.380859,0.3633 -0.33498,0.2887 -1.038518,0.5566 -1.261719,0.5566 -0.287086,0 -0.463718,-0.044 -0.609375,-0.1367 -0.145658,-0.092 -0.292881,-0.2551 -0.451172,-0.5899 -0.316582,-0.6694 -0.609117,-1.9762 -0.947266,-4.1386 -0.338641,-2.1657 -0.848661,-4.7576 -1.166015,-5.8672 -0.289741,-1.0133 -0.740291,-2.9765 -0.984375,-4.3047 -0.276074,-1.5022 -0.466482,-2.3931 -0.933594,-2.957 -0.116778,-0.141 -0.26862,-0.2691 -0.462891,-0.334 -0.19427,-0.065 -0.413804,-0.05 -0.589843,0.014 -0.352079,0.127 -0.584695,0.3801 -0.84375,0.705 -0.423592,0.5312 -0.788438,1.2698 -0.898438,1.8965 -0.03676,0.2094 -0.0509,0.5077 -0.07813,1.0137 -0.02722,0.5059 -0.05633,1.1762 -0.08594,1.9668 -0.05923,1.5812 -0.119948,3.6402 -0.167969,5.7988 -0.121668,5.4692 -0.231479,8.6928 -0.416016,10.625 -0.09227,0.9661 -0.204838,1.6079 -0.333984,2.0313 -0.129146,0.4234 -0.256949,0.6163 -0.419922,0.7793 -0.627992,0.6279 -1.954724,0.7424 -2.810547,0.1816 -0.17386,-0.1139 -0.250223,-0.1837 -0.30664,-0.2793 -0.05642,-0.096 -0.109007,-0.2532 -0.132813,-0.5723 -0.04761,-0.638 0.04554,-1.8465 0.263672,-4.0234 0.226457,-2.26 0.185281,-3.735 -0.193359,-7.0586 -0.389856,-3.4219 -0.41345,-4.4267 -0.148438,-6.168 0.195177,-1.2823 0.303311,-2.3576 0.318359,-3.1406 0.0075,-0.3915 -0.0061,-0.7063 -0.05664,-0.9707 -0.02529,-0.1322 -0.0543,-0.2525 -0.134766,-0.3887 -0.08047,-0.1361 -0.285191,-0.3242 -0.539062,-0.3242 -0.263478,0 -0.387724,0.152 -0.449219,0.2324 -0.0615,0.081 -0.09083,0.1434 -0.119141,0.211 -0.05661,0.1351 -0.09814,0.2823 -0.138672,0.457 -0.08107,0.3495 -0.150351,0.8028 -0.197265,1.3028 -0.08957,0.9543 -0.300421,2.9407 -0.466797,4.4003 -0.175133,1.5365 -0.354785,6.017 -0.416016,10.0801 -0.04535,3.0092 -0.0933,4.8782 -0.171875,6.043 -0.07858,1.1647 -0.215868,1.6051 -0.289062,1.7168 -0.272987,0.4166 -0.910726,0.6968 -1.63086,0.707 -0.720133,0.01 -1.464415,-0.2527 -1.878906,-0.709 -0.191976,-0.2112 -0.275442,-0.3456 -0.380859,-1.1465 -0.105417,-0.8008 -0.181875,-2.183 -0.289063,-4.6152 -0.300979,-6.8298 -0.305604,-11.4356 -0.04102,-13.4433 0.07324,-0.5558 0.108646,-0.9583 0.09375,-1.2676 -0.0074,-0.1547 -0.0011,-0.2794 -0.115235,-0.4766 -0.05707,-0.099 -0.185481,-0.2374 -0.371094,-0.2793 -0.185612,-0.042 -0.344224,0.022 -0.435546,0.078 h -0.002 c -0.315563,0.1955 -0.350916,0.417 -0.417968,0.6485 -0.06705,0.2314 -0.103516,0.4897 -0.103516,0.7597 0,0.1747 -0.02686,0.3597 -0.0625,0.4844 -0.03564,0.1248 -0.145626,0.1723 0.01953,0.07 -0.185137,0.1146 -0.200531,0.2126 -0.228515,0.2793 -0.02799,0.067 -0.04302,0.1211 -0.05664,0.1797 -0.02724,0.1172 -0.04606,0.2489 -0.06445,0.4102 -0.03678,0.3225 -0.06732,0.7595 -0.0918,1.3125 -0.04896,1.106 -0.07422,2.6655 -0.07422,4.5703 0,3.2642 -0.05396,5.1928 -0.236328,6.3144 -0.09118,0.5609 -0.213909,0.9112 -0.347656,1.1329 -0.133747,0.2216 -0.273987,0.3376 -0.511719,0.4648 -0.832655,0.4456 -1.771965,0.31 -2.617187,-0.4453 h -0.002 l -0.751953,-0.6738 -0.167969,-6.0391 c -0.09454,-3.4264 -0.05066,-7.2422 0.07227,-8.2813 0.136659,-1.1553 0.516389,-4.3681 0.84375,-7.1406 0.318029,-2.6934 0.560988,-5.3947 0.685547,-7.4316 0.06228,-1.0185 0.09585,-1.8691 0.09375,-2.4805 -0.0011,-0.3057 -0.0098,-0.5483 -0.0332,-0.7441 -0.01171,-0.098 -0.02426,-0.1806 -0.06055,-0.2852 -0.01815,-0.052 -0.03976,-0.1131 -0.105469,-0.1953 -0.06571,-0.082 -0.221931,-0.2031 -0.416015,-0.2031 -0.274891,0 -0.261968,0.062 -0.316406,0.094 -0.05444,0.031 -0.103277,0.063 -0.160157,0.1035 -0.113759,0.08 -0.25261,0.187 -0.417968,0.3184 -0.330717,0.2628 -0.76424,0.6248 -1.25586,1.0469 -0.98324,0.8441 -2.189708,1.9207 -3.193359,2.8652 -1.910453,1.7977 -4.1488562,2.5779 -7.4863284,2.5625 -1.1119871,0 -1.8641291,-0.1508 -2.2636719,-0.3691 -0.3995429,-0.2184 -0.515625,-0.4273 -0.515625,-0.92 0,-0.225 0.018507,-0.262 0.087891,-0.3398 0.069384,-0.078 0.2668891,-0.2102 0.6582031,-0.377 1.4141863,-0.6025 2.2733804,-0.9816 2.8085938,-1.2597 0.2676067,-0.1391 0.4558147,-0.2492 0.6113281,-0.3809 0.1555134,-0.1316 0.3144531,-0.3459 0.3144531,-0.6035 0,0.1682 -0.034279,0.1763 -0.039063,0.1856 -0.00478,0.01 6.869e-4,0 0.013672,-0.024 0.02597,-0.038 0.079589,-0.1082 0.1503906,-0.1953 0.1416026,-0.1742 0.3576648,-0.4206 0.625,-0.7148 0.5346704,-0.5885 1.2778814,-1.3677 2.0957036,-2.1895 1.659106,-1.6672 3.543299,-3.7527 4.269531,-4.7461 1.08598,-1.4852 1.686806,-2.2938 2.03125,-2.6973 0.172222,-0.2017 0.281807,-0.2973 0.316406,-0.3203 v 0 c 0.38446,0 0.528034,-0.1633 0.736328,-0.3281 0.208295,-0.1649 0.418255,-0.3754 0.605469,-0.6133 0.24959,-0.3174 1.074135,-1.0659 1.703125,-1.5098 1.540603,-1.0873 3.406164,-2.6205 4.990235,-4.0488 0.792035,-0.7142 1.512317,-1.4015 2.08789,-1.9961 0.575573,-0.5947 0.999035,-1.0754 1.236328,-1.4785 1.300263,-2.2094 1.860309,-3.4126 1.867188,-4.4395 0.0036,-0.5278 0.393653,-2.2561 1.945312,-7.9355 0.294585,-1.0782 0.792668,-2.8988 1.105469,-4.045 0.320583,-1.1748 0.766467,-3.2095 1.003906,-4.5781 0.224431,-1.2935 0.845266,-3.5886 1.355469,-4.998 1.538044,-4.249 2.341796,-8.1704 4.525391,-21.9981 1.507514,-9.5464 2.317168,-14.1969 3.0625,-17.6152 0.373347,-1.7122 1.070878,-5.3613 1.55664,-8.1406 0.821062,-4.6977 2.402908,-10.8885 3.658203,-14.3379 0.311114,-0.8549 1.042736,-2.9307 1.63086,-4.627 0.582074,-1.6787 1.445753,-3.8936 1.888672,-4.8554 2.428222,-5.2729 3.409576,-9.3237 4.291015,-17.6602 0.325216,-3.0758 0.901285,-8.1174 1.279297,-11.1934 1.914653,-15.5794 1.956538,-16.1802 1.88086,-26.8066 -0.109625,-15.3929 0.36154,-20.9186 2.615234,-30.6895 0.648067,-2.8097 1.31819,-5.2738 1.953125,-7.2226 0.634934,-1.9488 1.251491,-3.3944 1.716797,-4.0918 1.949077,-2.9212 4.575732,-4.9414 8.480468,-6.4902 2.172427,-0.8618 3.17648,-1.3736 5.929688,-3.0196 0.777471,-0.4648 2.723793,-1.3518 4.208984,-1.9043 6.574415,-2.4453 21.834204,-9.7642 25.914064,-12.455 2.74373,-1.8095 4.54938,-3.5401 5.25,-5.2168 0.35043,-0.8388 0.64458,-2.3145 0.89843,-4.1192 0.25385,-1.8047 0.44735,-3.9067 0.51954,-5.8672 0.0627,-1.7029 0.0922,-2.6181 -0.002,-3.3808 -0.0942,-0.7627 -0.31777,-1.3281 -0.70312,-2.2285 -1.68046,-3.9264 -2.58658,-7.1245 -3.49219,-12.34378 -0.23368,-1.34683 -0.36827,-2.09099 -0.54883,-2.58789 -0.0903,-0.24846 -0.19906,-0.46087 -0.40039,-0.61914 -0.20133,-0.15828 -0.45225,-0.19532 -0.62891,-0.19532 0.10111,0 0.0358,0.004 -0.0352,-0.0234 -0.0709,-0.0277 -0.17352,-0.076 -0.29102,-0.13671 -0.23498,-0.12154 -0.53036,-0.29593 -0.81054,-0.48633 -0.57047,-0.38765 -1.30106,-1.3839 -1.96094,-2.80469 -0.65989,-1.42079 -1.27278,-3.25939 -1.75391,-5.33789 -0.83186,-3.59392 -0.88603,-4.81444 -0.32031,-6.98633 0.42948,-1.64897 0.59789,-1.9418 1.60742,-2.76172 0.30499,-0.24773 0.56577,-0.51882 0.66797,-0.89453 0.1022,-0.3757 0.052,-0.74296 -0.0332,-1.25781 -0.0557,-0.33682 -0.13489,-0.69064 -0.21875,-1.00195 -0.0839,-0.31132 -0.15795,-0.56069 -0.26953,-0.77344 0.0497,0.0946 -0.028,-0.10132 -0.0703,-0.32617 -0.0423,-0.22486 -0.0914,-0.53404 -0.14062,-0.89649 -0.0983,-0.72489 -0.20211,-1.6687 -0.28516,-2.64844 -0.0845,-0.99669 -0.19385,-1.97105 -0.30468,-2.74609 -0.0554,-0.38752 -0.11027,-0.724 -0.16407,-0.99414 -0.0538,-0.27014 -0.0834,-0.44263 -0.17969,-0.64258 -0.0835,-0.17342 -0.15891,-1.16183 0.0606,-3.08789 0.10095,-0.88633 0.15669,-1.58912 0.16406,-2.10156 0.004,-0.25622 -0.004,-0.46325 -0.0312,-0.64453 -0.0137,-0.0906 -0.0291,-0.17423 -0.0723,-0.27539 -0.0432,-0.10116 -0.12327,-0.26462 -0.35352,-0.34375 0.10749,0.0369 0.11806,0.096 0.10547,0.0644 -0.0126,-0.0315 -0.0327,-0.11701 -0.0332,-0.20703 -5.5e-4,-0.09 0.0161,-0.18566 0.0352,-0.24023 0.0191,-0.0546 0.0411,-0.0507 -0.0156,-0.0156 0.23004,-0.14218 0.25014,-0.26095 0.30664,-0.38281 0.0565,-0.12187 0.10237,-0.25526 0.14648,-0.40625 0.0882,-0.30199 0.16479,-0.67019 0.21485,-1.0586 0.0443,-0.3436 0.11498,-0.7164 0.18945,-1.02539 0.0745,-0.30898 0.17363,-0.58041 0.18946,-0.60937 0.2302,-0.42132 0.32617,-0.96262 0.32617,-1.46875 0,-0.0413 0.0751,-0.38981 0.22461,-0.75586 0.1495,-0.36606 0.36238,-0.78768 0.58984,-1.1543 0.49416,-0.79653 1.2982,-2.15237 1.79883,-3.03125 0.77147,-1.35427 3.20945,-4.52559 5.63867,-7.28906 0.56066,-0.6378 1.44053,-1.42437 2.27148,-2.0625 0.83096,-0.63813 1.69801,-1.13481 1.91211,-1.18945 0.22488,-0.0574 0.42715,-0.14274 0.60157,-0.25977 0.0952,-0.0639 0.1402,-0.23994 0.22265,-0.35351 0.20462,0.0289 0.37332,0.0162 0.59571,-0.01 0.24425,-0.0285 0.5201,-0.0763 0.7832,-0.13867 0.36777,-0.0871 0.65242,-0.1601 0.90039,-0.4043 0.12398,-0.1221 0.21714,-0.3027 0.24414,-0.47461 0.0229,-0.14588 -1e-4,-0.27168 -0.0273,-0.39453 0.0766,-0.028 0.30226,-0.10132 0.79882,-0.17578 0.79238,-0.11883 1.80479,-0.37499 2.39844,-0.62305 0.22146,-0.0925 0.45857,-0.16047 0.63281,-0.1914 0.0871,-0.0155 0.15845,-0.0219 0.19336,-0.0215 0.0349,4.4e-4 0.0313,0.0281 -0.0742,-0.0371 0.2469,0.15263 0.48122,0.1341 0.68555,0.0879 0.20434,-0.0462 0.39634,-0.13843 0.56836,-0.28125 -0.063,0.0523 0.17503,-0.0772 0.45703,-0.13672 0.282,-0.0595 0.63788,-0.10463 0.97656,-0.11523 0.39862,-0.0125 0.78203,-0.0575 1.09961,-0.125 0.1588,-0.0338 0.30009,-0.0711 0.43165,-0.12305 0.13155,-0.0519 0.26214,-0.0822 0.41015,-0.29492 z m 4.27344,0.2207 c 0.001,-0.003 -0.0177,0.058 -0.0957,0.11329 -0.006,0.004 -0.009,2.4e-4 -0.0156,0.004 0.0278,-0.0483 0.094,-0.0652 0.11133,-0.11719 z m -15.16406,2.94336 c 0,0.11019 -0.0905,0.2367 -0.15235,0.27149 -0.0148,0.008 -0.0106,0.002 -0.0215,0.006 0.0623,-0.0925 0.17383,-0.10623 0.17383,-0.27735 z m 72.44336,280.69925 c -0.0125,0.015 -0.006,0.029 -0.0215,0.043 -0.10417,0.095 -0.23874,0.1231 -0.31445,0.1231 0.13051,0 0.24848,-0.087 0.33594,-0.166 z m 37.48828,57.2578 c 0.003,4e-4 0.003,0 0.006,0 -0.10562,-0.01 -0.23265,0.01 -0.32422,0.062 0.0748,-0.046 0.20454,-0.081 0.31836,-0.064 z" style="color:#000000;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:medium;line-height:normal;font-family:sans-serif;text-indent:0;text-align:start;text-decoration:none;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000000;letter-spacing:normal;word-spacing:normal;text-transform:none;writing-mode:lr-tb;direction:ltr;baseline-shift:baseline;text-anchor:start;white-space:normal;clip-rule:nonzero;display:inline;overflow:visible;visibility:visible;opacity:1;isolation:auto;mix-blend-mode:normal;color-interpolation:sRGB;color-interpolation-filters:linearRGB;solid-color:#000000;solid-opacity:1;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:1;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1;color-rendering:auto;image-rendering:auto;shape-rendering:auto;text-rendering:auto;enable-background:accumulate" sodipodi:nodetypes="ccccccccccccsccccccccccccccccccccccsccccscccccccccccccccccccccccscccccccsccccccccccccccsscscccccsccccccsccccccccccccsccccssscccccsccccccsccssccccscccccccccscscccccsccscccccccsccccccccccscccccccccccccccccsccccsccccscccccccccccsccccccsccccsccscccsccssscccccccsccccccccccccccsccccccccscsccccccccccccccccccccccccccccccccccccccscccccccccccccccscscccccccccccccccccccccccccccccccccccsscccsccsccccccscccssccscccccccccccccccccsccccccccccccccccccccscccsccccccccccccscccccccccsccccccccccccscccssccccccccccccccccccsccccccccscccccccccsscccccccccccccccccccccccccccccccccccccccccscccccccccscccccccccsccccscccsscsccccccccccccccccsccccsccccccccccsccscccccscccccccccccccccccccsccccccsccccccccccccccccccccccccccccccccccccccccccscscsccccccccccccccccccccccccccccccccscccccsccsccccccccccccccsccccccccccccccccsccscscsccccccccccccccccccccccccccsccccccccccccscccccccccccccccccccccccccccccccccsccccccccccccccscccccsccccccssscsscccsccsccccccccccccsccccccccccscccssccccscccccccccccccccccccccccscccccccccccccsscccsccccccccccccscsccccscccccscccccscscccccccccccscccscssccccccccccccccscccccccscccccccccccccccccccccccccsccccsccsssccccccscsccccccccccccccccccccsccccsccccccccccscccccccccccccccccccccccccccccccccccccccccccccc" />
				</g>
				<path  d="m 685.29415,36.185497 c 189.70589,7.3529 0,0 189.70589,7.3529 l -17.6471,170.588203 -11.7647,60.2942 1.4706,48.63697 -113.60295,11.15156 -11.39704,-34.78853 -5.88235,-100 z" data-id="49" class="body-part clickable leg" inkscape:connector-curvature="0" sodipodi:nodetypes="ccccccccc" data-target="body-part" data-body-part="Paha Kanan" id="no_16_depan"  style="' . $isiWarna['no_16_depan'] . '" />
				<path  d="M 502.41745,320.21365 501.47058,256.7737 491.17646,224.4208 463.23528,42.0678 h 189.7059 L 625,206.7737 v 85.2941 l -5.88236,22.0588 -5.64182,18.66139 c -111.05837,-12.57434 0,0 -111.05837,-12.57434 z" data-id="49" class="body-part clickable leg" inkscape:connector-curvature="0" sodipodi:nodetypes="cccccccccc" data-target="body-part" data-body-part="Paha Kiri" id="no_14_depan"  style="' . $isiWarna['no_14_depan'] . '" />
				<path  d="m 746.46763,-727.40678 c 32.32545,109.29682 101.58119,121.74115 101.82019,132.58159 0,0 -0.42888,19.25066 -0.25935,29.64973 0.50016,30.67897 3.18581,30.87233 1.71923,60.18446 l -0.9609,-15.44176 -16.4339,99.26527 -341.99681,0.23424 -8.00316,-85.52835 1.20856,-58.75487 0.95064,-31.86019 c 38.87737,-27.52804 84.59495,-64.94776 96.69355,-130.94191 0,0 13.51463,4.19342 31.60355,7.50424 6.49948,1.1896 13.58952,3.11427 20.85538,3.49836 19.75727,1.04441 39.53354,1.8062 65.17753,-3.16367 5.45369,-1.05694 10.21441,-0.4681 18.66343,-1.7234 12.7726,-1.89767 28.96206,-5.50374 28.96206,-5.50374 z" data-id="31" class="body-part clickable chest" inkscape:connector-curvature="0" sodipodi:nodetypes="cssccccccccssssc" data-target="body-part" data-body-part="Dada" id="no_10_depan"  style="' . $isiWarna['no_10_depan'] . '" />
				<path  d="m 581.13467,-869.01948 c 76.19797,48.94309 94.54289,51.58448 164.70583,-5.8824 0,0 56.70627,34.99993 86.50193,49.61488 6.77202,3.32171 13.60995,6.5116 20.52487,9.54752 -36.78054,45.48359 -61.584,77.54404 -106.39967,88.3327 -60.12135,14.47326 -105.60521,17.69056 -165.26195,-0.61179 -43.37961,-13.30862 -56.28107,-38.46565 -97.12983,-88.05971 l 18.91024,-10.31468 z" data-id="31" class="body-part clickable chest" inkscape:connector-curvature="0" sodipodi:nodetypes="csscssccc" data-target="body-part" data-body-part="Lingkaran Rantai" id="no_1_depan"  style="' . $isiWarna['no_1_depan'] . '" />
				<path  d="m 484.07585,-816.07828 c 40.77973,48.7476 63.05606,74.51046 97.12983,88.05971 0,0 -6.8407,48.56412 -40.26574,89.72658 -7.74062,9.53247 -39.00561,39.57688 -54.13535,40.70702 -12.07612,0.90204 -47.53076,-5.01422 -69.27723,-13.78938 -18.2751,-7.37439 -24.58754,-10.85118 -31.60422,-16.78192 -0.35203,-76.6329 20.16225,-141.31463 27.56355,-147.98156 13.67412,-12.31735 38.22116,-26.93891 70.58916,-39.94045 z" data-id="31" class="body-part clickable chest" inkscape:connector-curvature="0" sodipodi:nodetypes="ccssscsc" data-target="body-part" data-body-part="Pundak Kiri" id="no_2_depan"  style="' . $isiWarna['no_2_depan'] . '" />
				<path  d="m 843.59743,-815.46648 c -40.7797,48.7476 -63.0561,74.5105 -97.1298,88.0597 0,0 6.8407,48.5641 40.2657,89.7266 7.7406,9.5325 39.0056,39.5769 54.1354,40.707 12.0761,0.9021 47.5307,-5.0142 69.2772,-13.7894 18.2751,-7.3744 37.62121,-11.86492 39.18692,-20.91793 2.06322,-11.92968 -1.01452,-19.53264 -0.72927,-25.44621 0.55322,-11.46843 1.64572,-16.58298 -0.54568,-34.5802 -1.79837,-14.76936 -10.54909,-53.84472 -16.11158,-64.73467 -6.42986,-12.58803 -15.5856,-23.42906 -17.75969,-25.28843 -16.38292,-14.01128 -76.40543,-44.61211 -70.5892,-33.73646 z" data-id="31" class="body-part clickable chest" inkscape:connector-curvature="0" sodipodi:nodetypes="ccssssssssc" data-target="body-part" data-body-part="Pundak Kanan" id="no_6_depan"  style="' . $isiWarna['no_6_depan'] . '" />
				<path  d="m 447.12506,-338.03841 -36.83094,85.98864 -63.84444,165.06267 -56.74379,-31.23917 16.17646,-73.5294 26.47058,-145.58829 8.41063,-36.0217 c 106.3615,35.32725 0,0 106.3615,35.32725 z" data-id="48" class="body-part clickable arm" inkscape:connector-curvature="0" sodipodi:nodetypes="cccccccc" data-target="body-part" data-body-part="Tangan Hasta Kiri" id="no_4_depan"  style="' . $isiWarna['no_4_depan'] . '" />
				<path  d="m 992.23409,-68.61869 68.00001,-6.81913 -41.8833,-116.50887 -19.56256,-145.95886 c -102.37505,31.32252 0,0 -102.37505,31.32252 z" data-id="48" class="body-part clickable arm" inkscape:connector-curvature="0" sodipodi:nodetypes="cccccc" data-body-part="Tangan Hasta Kanan" data-target="body-part" id="no_8_depan"  style="' . $isiWarna['no_8_depan'] . '" />
				
				<!-- text -->
				<text x="645.62134" y="-845.9132"  style="' . $styleAngka . '" >0</text>
				<text x="645.62134" y="-755.9132"  style="' . $styleAngka . '" >1</text>
				<text x="635.62134" y="-555.9132"  style="' . $styleAngka . '" >10</text>
				<text x="635.62134" y="-335.9132"  style="' . $styleAngka . '" >11</text>
				<text x="635.62134" y="-175.9132"  style="' . $styleAngka . '" >12</text>
				<text x="635.62134" y="-20.9132"  style="' . $styleAngka . '" >13</text>
				<text x="535.62134" y="200.9132"  style="' . $styleAngka . '" >14</text>
				<text x="755.62134" y="200.9132"  style="' . $styleAngka . '" >16</text>
				<text x="785.62134" y="550.9132"  style="' . $styleAngka . '" >17</text>
				<text x="515.62134" y="550.9132"  style="' . $styleAngka . '" >15</text>
				<text x="455.62134" y="-685.9132"  style="' . $styleAngka . '" >2</text>
				<text x="845.62134" y="-685.9132"  style="' . $styleAngka . '" >6</text>
				<text x="405.62134" y="-435.9132"  style="' . $styleAngka . '" >3</text>
				<text x="895.62134" y="-435.9132"  style="' . $styleAngka . '" >7</text>
				<text x="965.62134" y="-175.9132"  style="' . $styleAngka . '" >8</text>
				<text x="335.62134" y="-175.9132"  style="' . $styleAngka . '" >4</text>
				<text x="275.62134" y="0.9132"  style="' . $styleAngka . '" >5</text>
				<text x="1025.62134" y="0.9132"  style="' . $styleAngka . '" >9</text>
				<text x="575.62134" y="1040.9132"  style="' . $styleAngka . '"  style="font-size:60px">DEPAN</text>
				<!-- text END -->

				<!-- arrow -->
				<path id="ngabahDepan" d="m 50.00893,-474.67641 -6.94271,-2.07929 -6.7665,-2.43173 -6.62553,-2.7136 -6.48456,-3.0661 -6.27311,-3.3832 -6.09689,-3.6652 -5.85021,-3.9472 -5.63874,-4.229 -5.35681,-4.511 -5.11012,-4.7577 -4.89866,-5.0396 -4.54625,-5.2159 -4.29954,-5.4273 -3.98237,-5.674 -3.62994,-5.8854 -3.31276,-6.0264 -2.99559,-6.2026 -2.64316,-6.3436 -2.32599,-6.4846 -1.93832,-6.5903 -1.58589,-6.6608 -1.23348,-6.7665 -0.88105,-6.8369 -0.49339,-6.837 -0.10573,-6.9075 0.28194,-6.9074 0.56387,-6.9428 1.02203,-6.8722 1.3392,-6.837 1.72686,-6.8017 2.04405,-6.696 2.43171,-6.5903 2.74889,-6.5198 3.10131,-6.3788 3.45374,-6.2379 3.73567,-6.0617 4.08809,-5.9206 4.37003,-5.7093 4.68721,-5.533 4.9339,-5.2863 5.21585,-5.0749 5.49778,-4.8634 5.70923,-4.5463 c 32.327151,-22.20444 1.1638879,-68.67353 -27.66511,-49.3742 l -4.19382,2.8898 -4.12333,3.0308 -4.01761,3.1718 -3.94713,3.2071 -3.87664,3.3127 -3.77091,3.4185 -3.70043,3.4538 -3.62994,3.5594 -3.52422,3.63 -3.38324,3.7004 -3.34801,3.8062 -3.24228,3.8766 -3.10131,3.9119 -3.06607,4.0176 -2.85462,4.0881 -2.85462,4.1233 -2.71364,4.1586 -2.60792,4.2643 -2.46696,4.3348 -2.36122,4.3348 -2.29074,4.4405 -2.14977,4.4405 -2.0088,4.4757 -1.90309,4.5463 -1.79735,4.5815 -1.65637,4.6167 -1.55066,4.652 -1.44493,4.6872 -1.30396,4.6872 -1.16299,4.7224 -1.09251,4.7577 -0.91629,4.793 -0.81057,4.7577 -0.6696,4.7929 -0.56389,4.7929 -0.42291,4.8282 -0.31716,4.8282 -0.17622,4.8282 -0.0352,4.7929 0.10573,4.8282 0.17622,4.7577 0.38766,4.8281 0.4229,4.7577 0.63436,4.7577 0.70484,4.7577 0.84582,4.7225 0.95154,4.6519 1.12774,4.6873 1.19824,4.6519 1.3392,4.5815 1.48017,4.5463 1.58591,4.5109 1.72686,4.4406 1.79736,4.4757 1.93831,4.37 2.07929,4.3348 2.22025,4.2643 2.29075,4.2291 2.39646,4.1586 2.5022,4.0881 2.64316,4.0528 2.74889,3.9471 2.85462,3.8767 2.96034,3.8414 3.03083,3.7356 3.17179,3.6652 3.24229,3.59474 3.38324,3.55946 3.41849,3.41849 3.55946,3.34801 3.62994,3.27751 3.73567,3.13656 3.80616,3.10132 3.87664,2.96034 4.01761,2.88985 4.05285,2.81938 4.12333,2.6784 4.19382,2.57268 4.29954,2.5022 4.33479,2.39647 4.40527,2.29074 4.511,2.18501 4.511,2.07929 4.61673,1.93832 4.65196,1.86784 4.68721,1.72686 4.79294,1.62114 4.7577,1.55066 4.86341,1.40968 -16.38761,46.48443 129.57215,-37.03093 -77.83664,-109.85845 z" style="fill:none;fill-opacity:1;fill-rule:evenodd;stroke:green;stroke-width:10.1;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:1.23749995;" inkscape:connector-curvature="0" transform="matrix(0.40353656,0.22025794,-0.20138788,0.34985218,317.68137,913.83579)" sodipodi:nodetypes="cccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc" inkscape:label="#path5075" />
				<!-- arrow END -->
			</g>
		</svg>
		<!-- DEPAN END -->
		';
    $gabung .=  '<svg width="250px" height="550px" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" viewBox="0 0 1328.7402 2363.3858" id="svg2" version="1.1" inkscape:version="0.91 r13725" sodipodi:docname="body-boxes.svg" ontouchstart="" onmouseover="">
			<defs id="defs4" />
			<sodipodi:namedview id="base" pagecolor="#ffffff" bordercolor="#666666" borderopacity="1.0" inkscape:pageopacity="0.0" inkscape:pageshadow="2" inkscape:zoom="0.96166522" inkscape:cx="770.87972" inkscape:cy="1686.0342" inkscape:document-units="px" inkscape:current-layer="layer1" showgrid="false" borderlayer="true" inkscape:window-width="1011" inkscape:window-height="756" inkscape:window-x="66" inkscape:window-y="0" inkscape:window-maximized="0" />
			<metadata id="metadata7">
				<rdf:RDF>
					<cc:Work rdf:about="">
						<dc:format>image/svg+xml</dc:format>
						<dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
						<dc:title />
					</cc:Work>
				</rdf:RDF>
			</metadata>
			<style id="style4213">
				.body-part {
					fill: rgba(0, 0, 0, 0);
				}

				/*Phone*/
				@media only screen and (min-width : 300px) {
					.body-part:active {
						opacity: 0.9;
						fill: rgb(40, 80, 200);
						fill-opacity: 0.95;
						fill-rule: evenodd;
						stroke: #000000;
						stroke-width: 0;
						stroke-linecap: butt;
						stroke-linejoin: miter;
						stroke-opacity: 1 stroke-miterlimit:4;
						stroke-dasharray: none
					}
				}

				/*Desktops */
				@media only screen and (min-width : 1200px) {
					.body-part:hover {
						opacity: 0.9;
						fill: rgb(40, 80, 200);
						fill-opacity: 0.95;
						fill-rule: evenodd;
						stroke: #000000;
						stroke-width: 0;
						stroke-linecap: butt;
						stroke-linejoin: miter;
						stroke-opacity: 1 stroke-miterlimit:4;
						stroke-dasharray: none
					}
				}
			</style>

			<g inkscape:label="Layer 1" inkscape:groupmode="layer" id="layer1" transform="translate(0,1311.0238)">
				d=&quot;m 143.07265,931.56798 c -0.27146,-0.0383 -0.49962,0.009 -0.84571,0.0801 -0.49441,0.10169 -1.30443,0.22125 -1.72851,0.25586 l -0.002,0 c -0.50596,0.0413 -1.03427,0.12403 -1.40626,0.27539 -0.91989,0.37423 -1.85057,0.32233 -2.30078,0.0273 -0.27869,-0.18261 -0.47586,-0.31453 -0.77343,-0.35547 -0.14879,-0.0205 -0.35261,0.006 -0.50977,0.11719 -0.13957,0.0988 -0.1998,0.2284 -0.24414,0.34375 -0.0221,0.009 -0.12546,0.0349 -0.29688,0.0254 -0.34282,-0.0189 -0.93642,-0.15951 -1.7246,-0.43945 -0.47268,-0.16788 -0.85583,-0.27622 -1.1836,-0.31836 -0.16388,-0.0211 -0.31298,-0.0292 -0.47461,0 -0.16163,0.0292 -0.36358,0.11037 -0.49609,0.30078 0.0932,-0.13385 0.0959,-0.0853 0.043,-0.0645 -0.0529,0.0209 -0.15202,0.0504 -0.27344,0.0762 -0.24283,0.0516 -0.57993,0.0908 -0.92187,0.10156 -0.40191,0.0126 -0.80433,0.0632 -1.15235,0.13672 -0.34802,0.0735 -0.61033,0.11471 -0.88867,0.3457 -0.0433,0.0359 -0.11132,0.0673 -0.15039,0.0762 -0.0391,0.009 -0.0324,-0.0223 0.0606,0.0352 -0.18248,-0.11282 -0.31133,-0.10974 -0.4375,-0.11133 -0.12618,-0.002 -0.25115,0.0137 -0.38282,0.0371 -0.26332,0.0468 -0.55333,0.13338 -0.84179,0.25391 -0.42616,0.17806 -1.46463,0.45233 -2.16016,0.55664 -0.58071,0.0871 -0.93139,0.13005 -1.25977,0.32617 -0.16419,0.0981 -0.33035,0.28485 -0.38476,0.49219 -0.0538,0.20504 -0.0207,0.37417 0.0176,0.52148 -0.0187,0.006 -0.10301,0.061 -0.37305,0.125 -0.22081,0.0523 -0.46639,0.0956 -0.66797,0.11914 -0.20158,0.0235 -0.39694,0.0118 -0.35547,0.0195 -0.19323,-0.0359 -0.39522,-0.0202 -0.58398,0.0859 -0.18876,0.10615 -0.35742,0.3473 -0.35742,0.60156 0,-0.25596 0.0891,-0.21787 0.0352,-0.18164 -0.054,0.0362 -0.1674,0.0901 -0.28906,0.1211 -0.64537,0.1647 -1.40145,0.69409 -2.27539,1.36523 -0.87394,0.67114 -1.78055,1.47686 -2.41211,2.19531 -2.45898,2.79733 -4.87664,5.90825 -5.75781,7.45508 -0.49127,0.86244 -1.29874,2.22028 -1.78125,2.99805 -0.2609,0.42052 -0.49169,0.88067 -0.66406,1.30273 -0.17238,0.42206 -0.29883,0.76748 -0.29883,1.13477 0,0.31109 -0.14107,0.87666 -0.20313,0.99023 -0.13032,0.23849 -0.20149,0.50641 -0.28515,0.85352 -0.0837,0.34711 -0.15946,0.74644 -0.20899,1.13086 -0.0438,0.3396 -0.11241,0.6693 -0.18164,0.90625 -0.0346,0.11847 -0.0699,0.21602 -0.0937,0.26758 -0.0239,0.0516 -0.0833,0.0504 0.0742,-0.0469 -0.22974,0.14209 -0.33605,0.34522 -0.40234,0.53516 -0.0663,0.18994 -0.093,0.38368 -0.0918,0.57617 0.001,0.19249 0.0279,0.38285 0.10351,0.57226 0.0756,0.18942 0.21645,0.41298 0.49805,0.50977 -0.18684,-0.0642 -0.22873,-0.18202 -0.24023,-0.20898 -0.0115,-0.027 -0.002,-0.008 0.004,0.0332 0.0124,0.082 0.0228,0.25243 0.0195,0.47851 -0.007,0.45216 -0.0594,1.13655 -0.1582,2.00391 -0.22357,1.96211 -0.30513,2.93213 0.0332,3.63477 -0.0144,-0.03 0.0514,0.16201 0.0996,0.40429 0.0483,0.24228 0.10062,0.56608 0.1543,0.94141 0.10735,0.75065 0.21591,1.70923 0.29883,2.6875 0.0844,0.99527 0.18967,1.95218 0.29101,2.69922 0.0507,0.37352 0.10095,0.69514 0.14844,0.94726 0.0475,0.25212 0.0505,0.38166 0.16797,0.60547 0.024,0.0457 0.11464,0.29065 0.18945,0.56836 0.0748,0.27771 0.14787,0.60577 0.19727,0.9043 0.0799,0.48261 0.0825,0.72984 0.0547,0.83203 -0.0278,0.10219 -0.0787,0.17354 -0.33399,0.38086 -1.08651,0.88244 -1.50067,1.57994 -1.94531,3.28711 -0.59538,2.28579 -0.52763,3.82483 0.31445,7.46289 0.49398,2.134 1.12363,4.03093 1.82227,5.53516 0.69864,1.50422 1.44109,2.62214 2.30469,3.20898 0.3131,0.21277 0.63528,0.40465 0.91406,0.54883 0.13939,0.0721 0.26714,0.13295 0.38672,0.17969 0.11958,0.0467 0.20425,0.0918 0.39843,0.0918 0.0784,0 0.0326,3.5e-4 0.01,-0.0176 -0.0228,-0.0179 0.021,0.0113 0.0801,0.17383 0.11815,0.32517 0.2714,1.07597 0.50391,2.41602 0.91313,5.26264 1.84973,8.57814 3.55664,12.56634 0.3816,0.8917 0.55235,1.3235 0.63086,1.959 0.0785,0.6356 0.0587,1.5209 -0.004,3.2207 -0.0707,1.9206 -0.26301,3.9974 -0.51172,5.7656 -0.24871,1.7683 -0.57305,3.2579 -0.83008,3.8731 -0.55154,1.32 -2.21639,3.0117 -4.8789,4.7676 -3.80943,2.5125 -19.277292,9.9585 -25.710945,12.3515 -1.541924,0.5736 -3.45823,1.4363 -4.375,1.9844 -2.74028,1.6382 -3.639311,2.096 -5.785156,2.9473 -4.040947,1.6029 -6.880551,3.7736 -8.94336,6.8652 -0.583872,0.8751 -1.188272,2.3481 -1.835937,4.3359 -0.647665,1.9879 -1.323377,4.4767 -1.976563,7.3086 -2.265522,9.8222 -2.750408,15.5047 -2.640624,30.92 0.07566,10.6238 0.04146,11.1014 -1.873047,26.6796 -0.379137,3.0851 -0.955061,8.126 -1.28125,11.211 -0.876921,8.2937 -1.814739,12.1551 -4.205079,17.3457 -0.479145,1.0405 -1.332983,3.2356 -1.925781,4.9453 -0.58675,1.6923 -1.319554,3.774 -1.625,4.6133 -1.293956,3.5556 -2.872296,9.7431 -3.705078,14.5078 -0.483352,2.7655 -1.181382,6.4234 -1.546875,8.0996 -0.753453,3.4555 -1.563964,8.1205 -3.072266,17.6719 -2.18224,13.8191 -2.971302,17.6433 -4.480468,21.8125 -0.538961,1.4888 -1.157598,3.7686 -1.400391,5.1679 -0.229781,1.3245 -0.677435,3.3687 -0.982422,4.4864 -0.312774,1.146 -0.810939,2.9669 -1.105469,4.0449 -1.553088,5.6846 -1.974423,7.2958 -1.980468,8.1934 -0.0042,0.6287 -0.449645,1.7644 -1.728516,3.9375 -0.134804,0.229 -0.540747,0.7197 -1.09375,1.291 -0.553002,0.5713 -1.25992,1.2467 -2.039062,1.9492 -1.558286,1.4051 -3.407577,2.9237 -4.896485,3.9746 -0.710582,0.5015 -1.512135,1.2004 -1.912109,1.709 -0.137565,0.1748 -0.303968,0.34 -0.439453,0.4473 -0.135485,0.1072 -0.30483,0.1113 -0.117188,0.1113 -0.148422,0 -0.378847,0.053 -0.554687,0.1699 -0.175841,0.1169 -0.323026,0.2714 -0.521485,0.5039 -0.396917,0.465 -0.990821,1.2688 -2.078125,2.7559 -0.627306,0.858 -2.541352,2.9904 -4.1718752,4.6289 -0.826993,0.831 -1.5775533,1.6199 -2.1269528,2.2246 -0.2746997,0.3023 -0.4999867,0.5564 -0.6621093,0.7558 -0.081061,0.1 -0.1451689,0.1843 -0.1992188,0.2637 -0.027025,0.04 -0.050872,0.078 -0.076172,0.127 -0.0253,0.049 -0.072266,0.086 -0.072266,0.2734 0,-0.1255 0.08565,-0.1996 0.039063,-0.1601 -0.046588,0.039 -0.188658,0.1326 -0.4257812,0.2558 -0.4742464,0.2465 -1.3293296,0.6263 -2.7382813,1.2266 -0.4390605,0.187 -0.7655743,0.3547 -1.0136718,0.6328 -0.2480976,0.2781 -0.3417969,0.6539 -0.3417969,1.0058 0,0.7538 0.3734313,1.4342 1.0371093,1.7969 0.6636781,0.3627 1.5495441,0.487 2.7382813,0.4922 3.5014935,0.016 6.0806357,-0.8625 8.1757817,-2.834 0.988624,-0.9303 2.187218,-2.0004 3.158203,-2.834 0.44001,-0.3777 0.809939,-0.6838 1.113281,-0.9277 1.24e-4,0.016 0.0019,0.02 0.002,0.037 0.002,0.5714 -0.03028,1.4081 -0.0918,2.4141 -0.123029,2.0118 -0.363872,4.7023 -0.679687,7.3769 -0.327355,2.7725 -0.707122,5.9856 -0.84375,7.1407 -0.150391,1.2711 -0.175356,4.9727 -0.08008,8.4257 l 0.179687,6.4707 1.074219,0.961 c 1.095204,0.9787 2.551166,1.2278 3.757813,0.582 0.344444,-0.1844 0.666433,-0.4507 0.896484,-0.832 0.230051,-0.3813 0.37377,-0.8541 0.476562,-1.4864 0.15512,-0.954 0.168003,-2.8815 0.189454,-4.8867 0.03237,1.9282 -0.101935,2.5499 0.01172,5.1289 0.107362,2.4362 0.180631,3.8181 0.296875,4.7012 0.116244,0.8831 0.326213,1.352 0.632813,1.6895 0.667217,0.7345 1.67338,1.0487 2.632812,1.0351 0.959432,-0.014 1.928491,-0.3574 2.453125,-1.1582 0.278564,-0.4251 0.367674,-0.9885 0.449219,-2.1973 0.08154,-1.2087 0.130369,-3.0841 0.175781,-6.0976 0.04608,-3.0577 0.185836,-5.4961 0.310547,-7.5469 0.05347,0.7095 -0.07619,0.9092 0.04297,1.9551 0.37591,3.2996 0.414514,4.6387 0.193359,6.8457 -0.218733,2.183 -0.328156,3.3854 -0.267578,4.1973 0.03029,0.4059 0.10977,0.7318 0.271484,1.0058 0.161715,0.2741 0.390363,0.4589 0.617188,0.6074 1.268343,0.8312 3.031686,0.7241 4.066406,-0.3105 0.280174,-0.2801 0.507299,-0.6622 0.669922,-1.1953 0.162623,-0.5332 0.277577,-1.2289 0.373047,-2.2285 0.19094,-1.9993 0.298157,-5.2218 0.419922,-10.6953 0.04792,-2.154 0.107049,-4.209 0.166015,-5.7832 0.02948,-0.7872 0.0592,-1.4543 0.08594,-1.9512 0.02674,-0.4969 0.06148,-0.8665 0.06641,-0.8945 0.05677,-0.3235 0.407967,-1.0895 0.69336,-1.4473 0.184302,-0.2312 0.307007,-0.3104 0.353515,-0.3399 0.138756,0.1796 0.447254,1.0253 0.712891,2.4707 0.251638,1.3693 0.695895,3.3213 1.003906,4.3985 0.280394,0.9804 0.809122,3.6155 1.142578,5.748 0.341589,2.1845 0.609762,3.5211 1.029297,4.4082 0.209768,0.4436 0.474416,0.7883 0.820313,1.0078 0.345896,0.2196 0.743634,0.293 1.144531,0.293 0.671281,0 1.377035,-0.3342 1.916015,-0.7988 0.196397,-0.1692 0.370687,-0.3142 0.525391,-0.5195 0.154704,-0.2054 0.262188,-0.4646 0.316406,-0.7598 0.108438,-0.5905 0.07833,-1.3775 0.03906,-2.9629 -0.04422,-1.7851 -0.317838,-4.4662 -0.619141,-6.0547 -0.959748,-5.0601 -1.426701,-7.4246 -1.509765,-9.2422 -0.08306,-1.8176 0.205438,-3.1542 0.792968,-6.2539 0.969153,-5.113 1.43722,-7.4767 1.607422,-9.2285 0.170203,-1.7518 0.0316,-2.8542 -0.199218,-5.332 -0.11089,-1.1903 -0.05904,-2.8866 0.125,-4.0782 0.17935,-1.1613 0.39043,-2.6685 0.472656,-3.3789 0.0761,-0.6576 0.275979,-1.5223 0.34375,-1.6855 0.426096,-1.0263 2.12798,-5.8591 4.511718,-12.7715 3.722977,-10.7957 5.548726,-15.3698 9.421876,-23.6133 2.952759,-6.2846 6.606731,-15.5126 10.5,-26.5097 0.866734,-2.4482 2.660412,-6.8731 3.55664,-8.7754 0.713708,-1.515 3.263731,-8.9582 3.740234,-10.8731 0.116609,-0.4687 0.182866,-1.329 0.25,-2.5058 0.06713,-1.1769 0.115958,-2.6182 0.13086,-4.0508 0.04845,-4.6573 0.114623,-5.3343 0.78125,-7.711 1.906002,-6.7956 4.389781,-17.0406 4.833984,-20.0078 0.123582,-0.8255 0.213551,-1.2971 0.308594,-1.8203 0.134977,0.6904 0.281419,1.5185 0.474609,2.7285 0.937671,5.8727 1.280219,10.6942 1.267579,17.8418 -0.01821,10.259 -0.372846,14.0069 -2.035157,21.4551 -2.326424,10.4233 -2.376766,10.8011 -2.43164,17.6074 -0.08203,10.1695 -0.623926,14.6092 -2.326172,19.2735 -2.140685,5.8657 -3.030766,14.1831 -3.298828,30.291 -0.04227,2.5397 -0.09471,4.8892 -0.144532,6.6289 -0.02491,0.8699 -0.05012,1.5882 -0.07227,2.0976 -0.01107,0.2548 -0.01983,0.4569 -0.0293,0.5977 -0.0047,0.07 -0.01014,0.1263 -0.01367,0.1602 -0.0035,0.034 -0.0244,0.081 0.0078,-0.018 -0.07113,0.2185 -0.06583,0.3813 -0.07227,0.6465 -0.0064,0.2651 -0.0018,0.5984 0.01172,1.0019 0.02713,0.8071 0.09104,1.8885 0.185547,3.1817 0.189007,2.5864 0.49774,6.0212 0.875,9.7695 0.754519,7.4966 1.777831,16.2417 2.636718,21.9414 0.231294,1.535 0.681394,4.6862 0.998047,6.9941 0.318621,2.3222 0.885872,5.8444 1.265625,7.8575 0.187205,0.9923 0.357418,2.0032 0.480469,2.8261 0.12305,0.823 0.195312,1.501 0.195312,1.6641 0,0.3603 0.08126,1.0218 0.207032,1.9434 0.125774,0.9215 0.297895,2.0572 0.488281,3.1894 0.377179,2.2433 0.944676,6.0719 1.255859,8.4863 1.178583,9.1441 2.332128,15.6277 3.355469,18.6524 2.014148,5.9535 1.833984,4.6582 1.833984,13.7031 0,4.5517 0.108993,10.3395 0.244141,12.9063 0.237316,4.5074 0.230461,4.6099 -0.611328,8.9804 -1.072084,5.5665 -1.606699,8.8154 -1.986328,12.0801 -1.21629,10.4601 -1.286329,11.4621 -1.257813,17.8418 0.02662,5.954 0.130116,7.3295 1.041016,13.7891 0.553284,3.9234 1.144692,8.4701 1.308594,10.0625 0.166889,1.6216 0.54306,5.087 0.83789,7.707 0.294117,2.6135 0.802068,7.4652 1.126953,10.7734 0.32655,3.3253 1.088758,9.688 1.697266,14.1621 0.602617,4.4306 0.931045,7.1725 1.029297,9.0704 0.09825,1.8978 -0.02461,2.9285 -0.326172,4.041 -0.886321,3.2695 -1.358696,5.0464 -1.585938,6.2734 -0.227241,1.227 -0.197061,1.9287 -0.08594,2.8691 0.405958,3.4348 0.271722,4.0399 -1.695313,7.9278 -1.227768,2.4269 -1.941877,4.1941 -2.15625,5.4629 -0.187585,1.1102 -0.60966,2.166 -1.359374,3.3691 -1.777733,2.8527 -2.292259,3.5692 -4.384766,6.1055 -1.111484,1.3471 -2.499222,3.4161 -3.152344,4.7148 -0.303391,0.6033 -0.652695,1.2331 -0.966797,1.7539 -0.314102,0.5208 -0.615858,0.9524 -0.726562,1.0723 -0.385586,0.4175 -0.86936,1.0396 -1.140625,1.4746 -0.243359,0.3903 -0.417674,0.9798 -0.652344,1.8106 -0.23467,0.8307 -0.485906,1.854 -0.71875,2.9023 -0.465689,2.0967 -0.861328,4.2262 -0.861328,5.2598 0,0.887 0.249995,1.9492 0.605469,2.914 0.355473,0.9649 0.771782,1.8103 1.351562,2.2891 0.06472,0.053 0.283203,0.5041 0.283203,1.0722 0,0.8301 0.134597,1.5351 0.439453,2.0958 0.304857,0.5606 0.813536,0.967 1.427735,1.0898 0.422325,0.085 0.586151,0.2211 0.814453,0.7676 0.521082,1.247 1.634846,2.1269 2.865234,2.1269 0.229179,0 0.25643,0.023 0.289063,0.053 0.03263,0.03 0.121999,0.1676 0.21875,0.4941 0.207381,0.6998 0.733953,1.2963 1.361328,1.7539 0.627374,0.4576 1.364406,0.7793 2.101562,0.7793 0.563653,0 1.197292,-0.1969 1.792969,-0.457 0.595677,-0.2601 1.119932,-0.525 1.435547,-0.9922 0.133505,-0.1976 0.195879,-0.3845 0.294922,-0.6582 0.09904,-0.2737 0.202649,-0.5983 0.291016,-0.9199 0.194261,-0.7072 0.731874,-1.8594 1.267578,-2.7891 0.0077,-0.013 0.01382,-0.02 0.02148,-0.033 -0.244974,0.7453 -0.512652,1.4978 -0.570312,2.3047 -0.0819,1.146 -0.03558,2.1914 0.43164,2.9043 0.650056,0.9922 1.67416,1.6371 2.896484,1.8984 1.222325,0.2613 2.646529,0.1577 4.183594,-0.2988 1.248494,-0.3708 1.820134,-0.8144 2.683598,-2.0899 0.58666,-0.8665 1.21682,-2.1557 1.47069,-3.0371 0.21378,-0.7421 0.66068,-1.8952 0.94727,-2.457 0.38036,-0.7455 0.9372,-2.513 1.34766,-4.1406 0.40316,-1.5987 0.86397,-3.3353 1.00196,-3.7852 0.0636,-0.2073 0.0909,-0.4366 0.12304,-0.7597 0.0322,-0.3232 0.0602,-0.7199 0.082,-1.17 0.0436,-0.9001 0.065,-2.0098 0.0547,-3.1211 -0.0427,-4.5921 0.38926,-7.5951 1.21875,-9.2363 0.38483,-0.7613 1.00065,-2.3824 1.42579,-3.7148 0.67377,-2.1118 0.81032,-3.1818 1.00976,-7.9727 0.26575,-6.3847 0.62716,-8.3917 2.77344,-15.416 0.74936,-2.4526 0.6424,-4.5478 -0.4082,-8.6895 -0.5688,-2.2424 -0.6875,-3.3333 -0.6875,-6.3476 0,-4.4535 0.66689,-11.9866 1.42382,-16.1035 0.31263,-1.7006 0.67251,-3.8357 0.80469,-4.7813 0.12503,-0.8944 0.48341,-2.8547 0.78906,-4.3066 0.30938,-1.4696 0.77054,-3.8001 1.02735,-5.1934 0.25059,-1.3597 0.94715,-4.5183 1.54101,-6.9746 3.46613,-14.3368 3.95408,-17.1834 3.95508,-23.0605 4.7e-4,-2.3189 -0.13149,-5.9718 -0.29492,-8.1602 -0.72568,-9.7182 -1.0903,-14.7807 -1.13086,-17.8887 -0.0406,-3.108 0.22697,-4.2246 0.79687,-6.248 0.43586,-1.5475 1.33049,-4.1053 1.96485,-5.6152 0.65838,-1.567 1.74213,-4.5238 2.42773,-6.6192 1.42463,-4.3541 1.80268,-7.1174 1.80469,-13.1777 10e-4,-3.4026 0.14644,-8.4138 0.3457,-12.9317 0.19927,-4.5178 0.45956,-8.5814 0.66211,-9.9589 0.2302,-1.5655 0.53926,-4.4913 0.69336,-6.5469 0.32919,-4.3921 1.88207,-14.2051 3.19531,-20.1621 0.53265,-2.4161 1.29616,-6.884 1.70704,-9.9824 0.20405,-1.539 0.39992,-2.9769 0.55273,-4.0528 0.0764,-0.5379 0.14197,-0.9858 0.19141,-1.3086 0.0198,-0.1294 0.0346,-0.2224 0.0488,-0.3086 0.0719,0.016 0.0928,0.013 0.25782,0.076 0.66514,0.255 1.67173,0.2603 2.75,0.1465 1.44651,-0.1529 2.30173,-0.4846 3.85937,-1.4922 0.77598,-0.5019 1.2651,-0.7826 1.50196,-0.873 0.0332,-0.013 0.0124,-0.01 0.0332,-0.012 0.0204,0.071 0.043,0.1558 0.0703,0.2735 0.0647,0.2791 0.1426,0.6707 0.22656,1.1406 0.16793,0.9398 0.36178,2.1922 0.53711,3.5195 0.39796,3.0126 1.27446,7.4791 2.2793,11.625 2.10556,8.6875 5.18726,23.6212 5.86133,28.375 0.29093,2.0519 0.67018,5.964 0.83593,8.6426 0.16719,2.7016 0.42239,6.0341 0.57227,7.4434 0.14274,1.3423 0.26656,4.255 0.26953,6.3984 0.004,2.7736 0.18248,4.9447 0.5957,7.207 0.65395,3.5801 2.70397,9.7354 4.29493,12.8926 0.52223,1.0363 1.63492,3.6326 2.4375,5.6973 l 1.4375,3.6992 0.24023,6.916 c 0.49538,14.2567 0.78099,21.7971 1.25586,26.7871 0.47487,4.9901 1.14848,7.4411 2.38672,11.3867 2.90553,9.2588 3.24513,10.4921 4.41016,16.0977 0.82391,3.9644 3.02432,16.1869 3.80273,21.1191 1.54285,9.776 1.61723,15.9504 0.32813,20.0762 -0.95018,3.0412 -0.80458,4.9249 0.62304,8.0938 0.59959,1.3308 1.03413,2.8177 1.14844,3.8711 0.11992,1.105 0.65858,3.0975 1.2207,4.6015 0.74611,1.996 1.01452,3.193 1.16211,5.1836 0.10992,1.4826 0.30807,3.1447 0.48242,3.8613 0.14892,0.6121 0.44787,1.8726 0.66211,2.795 0.22558,0.971 0.84584,3.0366 1.39844,4.6679 0.89741,2.6492 0.99857,3.2653 1.25195,7.5703 0.19002,3.2281 0.50607,6.2123 0.90039,8.6485 0.39433,2.4362 0.84854,4.3048 1.39454,5.4062 0.3947,0.7962 0.96858,2.3158 1.23242,3.2715 0.28937,1.0481 0.77105,2.2873 1.18164,2.9356 0.8473,1.3377 2.3249,2.7099 3.60351,3.414 l -0.0254,0.086 0.40039,0.1796 c 1.23352,0.5532 2.88101,0.4595 4.32032,0.057 0.71965,-0.2014 1.38509,-0.4861 1.91992,-0.8516 0.52313,-0.3574 0.93235,-0.8083 1.0625,-1.3867 0.9212,0.8397 2.35561,0.8774 3.60742,0.5391 0.63207,-0.1709 1.2271,-0.4457 1.70313,-0.8262 0.47602,-0.3805 0.84656,-0.8867 0.91796,-1.5 0.0173,-0.149 0.0382,-0.2387 0.0508,-0.2773 -0.0122,0.013 0.17098,-0.041 0.62696,-0.041 0.77061,0 1.4514,-0.2408 1.8789,-0.7754 0.4275,-0.5345 0.57813,-1.2645 0.57813,-2.1718 0,-0.2509 0.005,-0.4252 0.0137,-0.5567 0.022,0 0.016,0 0.041,0.01 0.69576,0.1747 1.40011,-0.093 1.83008,-0.6269 0.42996,-0.5334 0.64773,-1.2858 0.66992,-2.1758 0.0251,-1.0096 0.10889,-1.6879 0.24804,-2.1016 0.13915,-0.4136 0.27956,-0.5571 0.55664,-0.6914 0.35197,-0.1706 0.6101,-0.4603 0.89454,-0.8261 0.28443,-0.3659 0.56355,-0.8091 0.79687,-1.2813 0.69364,-1.4036 0.81334,-2.0645 0.81836,-4.7031 0.008,-4.0291 -0.72163,-6.6551 -2.51563,-8.8047 -0.29703,-0.356 -0.84333,-1.2588 -1.11328,-1.8691 -0.37008,-0.8367 -1.36546,-2.4238 -2.51172,-4.1289 -1.14625,-1.7052 -2.42363,-3.481 -3.32226,-4.5586 -0.3455,-0.4143 -0.66035,-0.821 -0.88281,-1.1328 -0.11123,-0.156 -0.19846,-0.2893 -0.25196,-0.379 -0.0267,-0.045 -0.0457,-0.079 -0.0508,-0.09 -0.005,-0.011 0.0195,-0.027 0.0195,0.123 0,-0.2683 -0.0836,-0.3872 -0.16992,-0.5488 -0.0863,-0.1616 -0.19547,-0.3248 -0.32422,-0.4765 -0.0141,-0.017 -0.20998,-0.3304 -0.39062,-0.7012 -0.18064,-0.3709 -0.38264,-0.8305 -0.5586,-1.2793 -1.13965,-2.9071 -3.44304,-7.2247 -4.87109,-9.084 l -1.19336,-1.5527 -0.15234,-4.1817 c -0.16551,-4.5171 -0.683,-7.4067 -1.78711,-9.0918 -0.11546,-0.1762 -0.20625,-0.354 -0.25,-0.4668 -0.0139,-0.036 -0.0154,-0.041 -0.0195,-0.057 0.002,-0.014 0.0235,-0.039 0.0254,-0.051 0.012,-0.076 0.0124,-0.1348 0.01,-0.1933 -0.005,-0.1172 -0.0242,-0.2322 -0.0508,-0.3633 -0.0531,-0.2622 -0.14331,-0.5762 -0.25976,-0.9063 -0.26117,-0.7402 -0.42028,-2.6512 -0.35157,-5.959 0.0687,-3.3077 0.33689,-8.0498 0.8125,-14.6425 0.15663,-2.1711 0.34626,-6.1369 0.42383,-8.8418 0.23866,-8.3155 0.69958,-17.0324 1.1211,-21.2481 1.09829,-10.9848 1.31554,-21.9473 0.55273,-28.6699 -0.54688,-4.8196 -2.40853,-14.2508 -3.69336,-18.7051 -2.07183,-7.1827 -2.30733,-8.5055 -2.61914,-14.7285 -0.55101,-10.9975 0.14379,-21.4199 1.70117,-26.4316 0.29643,-0.9539 0.72653,-2.6406 0.9707,-3.8067 0.1696,-0.81 0.42188,-2.7014 0.73047,-5.2929 0.3086,-2.5916 0.6664,-5.8585 1.02539,-9.3184 0.71799,-6.9198 1.43847,-14.6102 1.75782,-19.2207 0.29792,-4.3013 0.85888,-10.2909 1.24218,-13.2715 0.8093,-6.2932 2.21042,-21.0344 2.70704,-28.4648 0.29681,-4.4411 0.27748,-5.675 -0.1504,-9.6094 -0.26814,-2.466 -0.65341,-5.5404 -0.86132,-6.8731 -0.53168,-3.4082 -0.91198,-6.6157 -1.26172,-10.6093 -0.27131,-3.0981 -0.66711,-5.2713 -1.97266,-10.8516 -0.17136,-0.7324 -0.30437,-1.7644 -0.29687,-2.0957 0.006,-0.2779 -0.0292,-0.5583 -0.0918,-0.8164 -0.0626,-0.2581 -0.13059,-0.484 -0.3125,-0.7031 -0.0197,-0.024 -0.0167,-0.022 -0.0312,-0.043 0.005,-0.05 0.0119,-0.1028 0.01,-0.1406 -0.006,-0.1145 -0.0253,-0.2257 -0.0527,-0.3594 -0.0548,-0.2674 -0.14612,-0.6094 -0.26562,-0.9883 -0.22077,-0.7 -0.44767,-1.7001 -0.48633,-2.0722 -0.0794,-0.7632 -0.33073,-2.1442 -0.60352,-3.4668 -0.27278,-1.3227 -0.53976,-2.5108 -0.74414,-3.043 -0.21014,-0.5472 -0.54338,-1.0478 -1.05273,-1.3203 -0.0942,-0.051 -0.11912,-0.072 -0.16992,-0.2129 -0.0508,-0.1404 -0.0914,-0.4058 -0.0937,-0.8086 -0.004,-0.7111 -0.12864,-1.7389 -0.29493,-2.418 -0.0161,-0.066 -0.0696,-0.4464 -0.11523,-0.957 -0.0457,-0.5107 -0.0937,-1.183 -0.14258,-1.9668 -0.0977,-1.5675 -0.19634,-3.5792 -0.26953,-5.6543 -0.34502,-9.7811 -0.74341,-12.8506 -3.33789,-25.7051 -1.94246,-9.6241 -1.71055,-17.543 0.94922,-31.875 0.51558,-2.7784 1.14724,-6.4608 1.4082,-8.209 0.0542,-0.3629 0.11056,-0.6038 0.16797,-0.9277 0.10125,1.1105 0.17169,2.0607 0.39648,3.7793 0.33853,2.588 0.76017,5.4501 1.10352,7.3262 0.7958,4.3485 2.53071,11.6567 4.09375,17.2578 0.65984,2.3644 0.72947,3.0767 0.7832,7.7109 0.0186,1.5958 0.0697,3.0345 0.14453,4.1875 0.0748,1.1531 0.16318,1.9981 0.29883,2.5156 0.59472,2.2691 3.26544,9.5782 4.27735,11.709 1.64666,3.4674 2.42126,5.4591 5.10351,13.1133 3.34464,9.5448 4.09262,11.4853 8.00586,20.752 1.72162,4.0768 3.82441,9.2314 4.66211,11.4277 0.84978,2.228 2.48559,6.1954 3.64453,8.8437 2.13597,4.8815 3.69856,8.503 4.72656,10.9512 0.51401,1.2241 0.89505,2.1559 1.14454,2.8008 0.12474,0.3224 0.21718,0.5736 0.27539,0.748 0.0582,0.1745 0.0664,0.349 0.0664,0.1993 0,0.3196 0.0982,0.5167 0.22071,0.8281 0.12252,0.3113 0.2859,0.6657 0.46875,1.0078 0.29098,0.5444 0.40395,0.7792 0.47461,1.5977 0.0707,0.8184 0.064,2.1871 0.0352,4.7578 -0.0598,5.3402 0.35837,9.4201 1.35547,13.123 0.13752,0.5107 0.29767,1.6167 0.32812,2.3242 0.017,0.3961 0.0524,0.7407 0.10352,1.0079 0.0256,0.1335 0.0486,0.2424 0.10352,0.3671 0.0275,0.062 0.0522,0.1348 0.16601,0.2344 0.0166,0.014 0.0576,0.022 0.0801,0.037 0.0173,0.032 0.034,0.061 0.0644,0.1348 0.0874,0.2123 0.19794,0.5511 0.29688,0.9375 0.2145,0.8375 0.34998,2.7168 0.34961,4.8926 -3.7e-4,2.1757 -0.12151,4.6798 -0.36328,6.9004 -0.25025,2.2981 -0.33679,4.2857 -0.26172,5.8496 0.0751,1.5638 0.25649,2.689 0.7832,3.3945 0.67089,0.8986 1.66593,1.3115 2.58203,1.2012 0.9161,-0.1103 1.74755,-0.7783 2.00977,-1.8242 0.30681,-1.2239 0.6529,-4.6291 0.74609,-7.0079 0.0272,-0.6939 0.25579,-2.1041 0.4961,-2.998 0.23615,-0.8786 0.37771,-2.3646 0.44531,-3.6367 0.0602,1.7846 0.0581,4.3677 -0.0117,9.582 -0.0753,5.6277 -0.10798,8.6045 -0.0606,10.2754 0.0237,0.8354 0.0643,1.3448 0.14453,1.7246 0.0803,0.3798 0.23651,0.6542 0.38672,0.8359 0.50684,0.6132 1.31768,0.9086 2.13477,0.9981 0.81709,0.089 1.6695,-0.023 2.28515,-0.5215 0.34474,-0.2791 0.66226,-0.6671 0.77539,-1.3223 0.11314,-0.6551 0.13416,-1.6282 0.17579,-3.4941 0.048,-2.1509 0.17468,-4.2482 0.3457,-5.9824 0.17102,-1.7342 0.39898,-3.1264 0.60742,-3.7715 0.12677,-0.3926 0.16675,-0.9641 0.19141,-1.6856 0.22522,2.8815 0.34026,5.6483 0.28125,9.7715 -0.0475,3.3171 -0.0611,5.0888 0.13086,6.2285 0.096,0.5699 0.25422,1.0007 0.50976,1.3418 0.25554,0.3412 0.58024,0.5609 0.9336,0.7715 0.62989,0.3757 1.40373,0.4372 2.14257,0.293 0.73885,-0.1442 1.45946,-0.4999 1.98438,-1.0664 0.33295,-0.3592 0.59956,-0.7594 0.69922,-1.4043 0.0996,-0.6449 0.10351,-1.5562 0.10351,-3.2676 0,-1.9595 0.15904,-4.8174 0.34571,-6.2676 0.40966,-3.1823 0.33542,-7.3289 -0.0664,-9.9843 0.59275,1.848 0.85423,3.4861 1.24805,9.1582 0.18947,2.7292 0.33771,4.3147 0.64453,5.3847 0.30682,1.0701 0.88322,1.6434 1.63672,2.0117 l 0.002,0 c 0.48013,0.2343 0.82089,0.3907 1.22461,0.4063 0.40372,0.016 0.75291,-0.1166 1.22656,-0.3145 0.44145,-0.1844 0.84054,-0.4004 1.16016,-0.7539 0.31962,-0.3534 0.53259,-0.8191 0.66992,-1.4257 0.27465,-1.2134 0.30574,-3.0596 0.30273,-6.3477 -0.006,-5.9211 -0.0625,-6.5397 -1.24218,-13.1875 -1.15936,-6.5336 -1.27149,-7.3287 -1.27149,-9.1191 l 0,-0.5313 1.74024,1.707 c 3.20381,3.1407 5.7684,4.5772 8.74804,4.8164 1.19742,0.096 2.08716,0.043 2.76563,-0.3105 0.67847,-0.3535 1.02734,-1.0745 1.02734,-1.8828 0,-0.4412 -0.0776,-0.8817 -0.375,-1.2383 -0.29742,-0.3566 -0.71809,-0.6208 -1.4082,-1.0391 -1.69206,-1.0255 -2.80193,-2.1951 -3.62109,-3.8007 -0.37627,-0.7375 -1.23084,-1.8773 -1.99024,-2.6953 -1.78328,-1.9212 -3.62549,-4.2941 -4.47656,-5.7422 -0.29121,-0.4956 -0.87967,-1.142 -1.73828,-2 -0.85861,-0.8581 -1.9768,-1.893 -3.26563,-3.0196 -2.27817,-1.9912 -4.92909,-4.4648 -5.82422,-5.4218 -0.92302,-0.987 -1.50752,-1.7751 -2.08789,-3.0528 -0.58036,-1.2777 -1.14815,-3.0532 -1.96875,-5.9258 -0.50992,-1.785 -1.36536,-4.4914 -1.91211,-6.0488 -1.464,-4.1702 -4.31233,-13.1754 -4.91797,-15.5332 -0.53042,-2.0648 -1.12067,-5.4961 -1.68945,-9.8496 -0.54832,-4.1968 -1.43367,-10.0776 -2.5332,-16.8184 -0.60235,-3.6931 -1.47811,-9.3005 -1.94336,-12.4531 -0.46746,-3.1678 -1.10075,-6.7997 -1.43164,-8.166 -0.96779,-3.9959 -4.40041,-14.1802 -6.16016,-18.2832 -1.96628,-4.5847 -2.06376,-4.8454 -2.7539,-7.4902 -0.96712,-3.7063 -1.82209,-9.7513 -3.41016,-24.2227 -0.88965,-8.107 -1.16364,-14.5376 -1.22852,-29 -0.0629,-14.0306 -0.11503,-15.4747 -0.69531,-19.2559 -1.49855,-9.7647 -3.28894,-15.771 -5.86133,-19.2753 -1.38597,-1.8882 -4.58512,-4.5032 -8.66211,-7.1758 -3.52855,-2.3132 -4.47555,-2.7902 -9.47265,-4.7539 -6.24648,-2.4547 -16.53263,-7.5042 -27.36914,-13.4453 -2.52534,-1.3844 -4.81641,-3.4097 -5.73242,-4.9727 -0.32967,-0.5625 -0.77341,-1.9182 -1.12305,-3.4941 -0.34964,-1.576 -0.63106,-3.3987 -0.7461,-5.0118 -0.15199,-2.1312 -0.2355,-4.1424 -0.24804,-5.7148 -0.006,-0.7862 0.006,-1.4637 0.0351,-1.9863 0.0287,-0.5226 0.0877,-0.9134 0.11915,-1.0117 0.29672,-0.9271 0.37709,-1.2849 1.55078,-7.0547 l 0.71875,-3.53126 0.43164,-0.0117 c 0.77508,-0.0216 1.26095,-0.0422 1.72461,-0.22851 0.46366,-0.18635 0.80276,-0.50551 1.28906,-0.99219 0.70451,-0.70497 1.39158,-1.9587 1.97656,-3.46289 0.49098,-1.26235 1.06792,-3.26583 1.53125,-5.1543 0.46333,-1.88847 0.81445,-3.5826 0.81445,-4.45508 0,-0.80679 -0.28532,-1.91544 -0.66601,-3.00585 -0.38069,-1.09042 -0.83021,-2.10678 -1.33203,-2.70313 l -0.5625,-0.66797 0.38281,-1.07617 c 0.6453,-1.8169 1.0236,-4.75011 1.35352,-10.06445 0.3234,-5.21005 0.31564,-4.90214 0.18164,-7.75586 -0.13513,-2.87795 -0.53295,-5.34078 -1.19727,-6.58594 -0.20376,-0.38188 -0.55206,-1.17423 -0.73828,-1.68359 -0.23595,-0.64523 -0.80912,-1.62941 -1.3457,-2.36328 -4.17023,-5.70362 -6.36444,-8.05736 -8.8086,-9.3086 -0.7284,-0.37288 -1.66592,-1.01165 -1.91015,-1.2539 -0.48693,-0.48297 -1.33263,-0.88829 -2.11524,-1.10743 -0.59979,-0.16791 -1.45104,-0.66661 -1.65429,-0.88672 -1.10177,-1.19302 -2.39248,-1.69586 -4.25,-1.6875 -0.49408,0.002 -0.80798,-0.0232 -0.99805,-0.0527 -0.009,-0.0341 0.0249,-0.0462 0.008,-0.082 -0.12572,-0.26322 -0.36036,-0.31873 -0.49609,-0.33789 z m 0.4707,0.63476 c 0.006,0.0196 0.0204,0.0235 0.0234,0.0449 0.0169,0.11992 -0.025,0.22006 -0.0508,0.26171 0.0364,-0.0589 0.008,-0.20128 0.0273,-0.30664 z m -11.63672,0.24805 c -0.0668,0.096 -0.15116,0.11413 -0.14648,0.11328 0.005,-8.4e-4 0.0693,-0.005 0.16992,0.008 0.20132,0.0259 0.54137,0.11302 0.97656,0.26758 0.83217,0.29557 1.47591,0.46692 2.00391,0.4961 0.264,0.0146 0.50524,-0.003 0.73828,-0.10157 0.14149,-0.0596 0.21966,-0.21454 0.32226,-0.34179 0.0398,0.0193 0.0911,0.0335 0.26954,0.15039 0.86367,0.5659 2.07975,0.52904 3.22656,0.0625 0.0901,-0.0367 0.69314,-0.1709 1.11133,-0.20508 0.50003,-0.0408 1.29908,-0.15824 1.84961,-0.27149 0.15914,-0.0327 0.17131,-0.0283 0.26171,-0.0371 0.0365,0.0561 0.0558,0.13612 0.0957,0.16992 0.17488,0.1482 0.31573,0.16929 0.47461,0.20117 0.31775,0.0638 0.73015,0.0809 1.30468,0.0781 1.6971,-0.008 2.5586,0.33528 3.50977,1.36524 0.48132,0.52121 1.32698,0.95011 2.11914,1.17187 0.60929,0.17061 1.47271,0.64629 1.68164,0.85352 0.4516,0.44793 1.34442,1.01995 2.15625,1.43555 2.2056,1.12911 4.30854,3.33391 8.45703,9.00781 0.47694,0.6523 1.05653,1.68427 1.21485,2.11719 0.20794,0.56879 0.55022,1.34828 0.79687,1.81054 0.46038,0.86291 0.94854,3.3606 1.08008,6.16211 0.13428,2.85972 0.14187,2.43464 -0.18164,7.64649 -0.3283,5.28827 -0.72632,8.18456 -1.29688,9.79101 l -0.57422,1.61719 0.92969,1.10547 c 0.30194,0.35882 0.7934,1.36248 1.15235,2.39062 0.35895,1.02815 0.61132,2.13562 0.61132,2.67578 0,0.55319 -0.32881,2.35683 -0.78515,4.2168 -0.45634,1.85998 -1.03565,3.85548 -1.49219,5.0293 -0.55376,1.42393 -1.25558,2.62245 -1.75195,3.11914 -0.47324,0.47361 -0.70414,0.67142 -0.95313,0.77148 -0.24898,0.10007 -0.62015,0.13505 -1.38086,0.15625 l -1.22656,0.0352 -0.87695,4.30859 c -1.17358,5.76935 -1.23113,6.04205 -1.52149,6.94925 -0.10081,0.315 -0.13553,0.7068 -0.16601,1.2617 -0.0305,0.5548 -0.0435,1.2483 -0.0371,2.0488 0.0128,1.6009 0.0986,3.6276 0.25195,5.7774 0.11944,1.6747 0.4073,3.5342 0.76758,5.1582 0.36028,1.6239 0.76763,2.9868 1.23437,3.7832 1.08399,1.8496 3.45931,3.8877 6.11524,5.3437 10.86081,5.9545 21.15147,11.0114 27.48437,13.5 4.98696,1.9597 5.77532,2.3548 9.28907,4.6582 4.02445,2.6382 7.20041,5.2916 8.40429,6.9317 2.37738,3.2386 4.19016,9.1279 5.67969,18.8339 0.57601,3.7533 0.62068,5.0809 0.68359,19.1094 0.0649,14.4736 0.34087,20.9633 1.23438,29.1055 1.58901,14.48 2.43997,20.5444 3.4375,24.3672 0.69221,2.6527 0.83352,3.0439 2.80078,7.6308 1.70808,3.9826 5.17633,14.2787 6.10742,18.1231 0.30323,1.2521 0.95162,4.929 1.41602,8.0761 0.46667,3.1622 1.33987,8.7707 1.94336,12.4708 1.09839,6.7338 1.98336,12.6065 2.52929,16.7851 0.57153,4.3745 1.16281,7.8198 1.71485,9.9688 0.63994,2.4913 3.46289,11.4056 4.9414,15.6171 0.53466,1.523 1.39249,4.2347 1.89454,5.9922 0.82408,2.8848 1.39728,4.6926 2.01953,6.0625 0.62224,1.37 1.30378,2.2937 2.26758,3.3243 0.97794,1.0455 3.5997,3.4827 5.89648,5.4902 1.27577,1.1151 2.38054,2.1389 3.2168,2.9746 0.83625,0.8357 1.4159,1.5181 1.58203,1.8008 0.92648,1.5764 2.7799,3.9452 4.60742,5.914 0.69118,0.7446 1.55628,1.9302 1.83203,2.4707 0.89826,1.7608 2.17596,3.0992 3.99414,4.2012 0.67397,0.4085 1.02548,0.6651 1.1582,0.8242 0.13273,0.1592 0.14258,0.23 0.14258,0.5977 0,0.5832 -0.12037,0.8033 -0.49023,0.9961 -0.36987,0.1927 -1.10586,0.2908 -2.22266,0.2012 -2.71286,-0.2178 -5.00448,-1.4705 -8.1289,-4.5333 l -3.43946,-3.373 0,2.9102 c 0,1.8343 0.12719,2.7581 1.28711,9.2949 1.17888,6.6435 1.22072,7.0982 1.22656,13.0137 0.003,3.2787 -0.0517,5.1198 -0.27929,6.125 -0.11377,0.5025 -0.2572,0.7793 -0.43555,0.9765 -0.17835,0.1973 -0.41945,0.3399 -0.80273,0.5 -0.45091,0.1884 -0.65239,0.2461 -0.80274,0.2403 -0.15034,-0.01 -0.36637,-0.082 -0.82617,-0.3067 -0.62329,-0.3047 -0.8577,-0.4973 -1.11328,-1.3887 -0.25558,-0.8913 -0.42069,-2.4618 -0.60938,-5.1796 -0.46915,-6.7571 -0.66732,-8.0485 -1.60937,-10.5665 -0.35036,-0.9365 -0.63672,-2.226 -0.63672,-2.5546 0,-0.3007 -0.0313,-0.573 -0.10156,-0.8106 -0.0351,-0.1188 -0.0761,-0.2298 -0.15821,-0.3476 -0.0821,-0.1179 -0.25048,-0.2891 -0.51953,-0.2891 -0.23125,0 -0.44577,0.1555 -0.54297,0.2949 -0.0972,0.1395 -0.13589,0.271 -0.16601,0.4082 -0.0602,0.2745 -0.0707,0.5872 -0.0547,0.957 0.0321,0.7397 0.18328,1.6934 0.44141,2.6895 0.51311,1.9802 0.63003,7.4596 0.17578,10.9883 -0.19838,1.5411 -0.35352,4.3821 -0.35352,6.3945 0,1.7079 -0.0152,2.6194 -0.0918,3.1152 -0.0766,0.4959 -0.14397,0.5519 -0.44532,0.877 -0.35048,0.3783 -0.89185,0.6564 -1.4414,0.7637 -0.54955,0.1072 -1.0917,0.037 -1.43946,-0.1699 -0.32001,-0.1908 -0.50933,-0.3313 -0.64453,-0.5118 -0.13519,-0.1805 -0.24381,-0.4308 -0.32422,-0.9082 -0.16081,-0.9548 -0.16459,-2.736 -0.11718,-6.0488 0.0863,-6.0325 -0.049,-8.9634 -0.64844,-14.0547 -0.12261,-1.0413 -0.23933,-1.7913 -0.34961,-2.2871 -0.0551,-0.2479 -0.10152,-0.4251 -0.17969,-0.5918 -0.0391,-0.083 -0.0606,-0.1787 -0.24414,-0.2969 -0.0917,-0.059 -0.26053,-0.1087 -0.41406,-0.072 -0.15353,0.036 -0.24796,0.1273 -0.30078,0.1933 -0.10564,0.1321 -0.1183,0.2161 -0.14063,0.3028 -0.0223,0.087 -0.0381,0.174 -0.0508,0.2754 -0.0253,0.2027 -0.0408,0.4556 -0.0488,0.7714 -0.0161,0.6317 9.7e-4,1.5113 0.0547,2.6368 0.0622,1.3036 0.0809,2.3551 0.0606,3.1503 -0.0203,0.7953 -0.0926,1.3492 -0.16211,1.5645 -0.26654,0.825 -0.47827,2.2173 -0.65234,3.9824 -0.17408,1.7652 -0.29908,3.8817 -0.34766,6.0567 -0.0416,1.8634 -0.0777,2.8473 -0.16406,3.3476 -0.0864,0.5004 -0.11089,0.4662 -0.41797,0.7149 -0.28646,0.2319 -0.91752,0.3735 -1.54688,0.3046 -0.62936,-0.069 -1.22761,-0.3437 -1.47461,-0.6425 -0.0932,-0.1128 -0.12224,-0.1418 -0.17773,-0.4043 -0.0555,-0.2626 -0.1,-0.7352 -0.12305,-1.5469 -0.0461,-1.6234 -0.0147,-4.6055 0.0606,-10.2324 0.0774,-5.7807 0.10354,-8.9353 0.0117,-10.6856 -0.0459,-0.8751 -0.10692,-1.3928 -0.26172,-1.789 -0.0774,-0.1982 -0.19471,-0.3828 -0.37305,-0.5078 -0.17833,-0.1251 -0.38512,-0.1582 -0.53906,-0.1583 -0.20984,0 -0.34554,0.1215 -0.4043,0.1915 -0.0588,0.07 -0.0793,0.1189 -0.0977,0.1621 -0.0368,0.086 -0.0534,0.1522 -0.0703,0.2304 -0.0339,0.1565 -0.0584,0.3463 -0.082,0.5762 -0.0472,0.4597 -0.0811,1.0748 -0.0937,1.752 -0.0239,1.2835 -0.25891,3.1564 -0.48828,4.0097 -0.26515,0.9863 -0.49813,2.3723 -0.53125,3.2188 -0.0906,2.313 -0.48091,5.8637 -0.7168,6.8047 -0.17154,0.6842 -0.61798,1.0091 -1.1582,1.0742 -0.54022,0.065 -1.18151,-0.1656 -1.66016,-0.8067 -0.23771,-0.3184 -0.51656,-1.3597 -0.58789,-2.8457 -0.0713,-1.4859 0.0116,-3.4305 0.25782,-5.6914 0.2466,-2.2648 0.36876,-4.797 0.36914,-7.0097 3.7e-4,-2.2128 -0.10801,-4.0753 -0.38086,-5.1407 -0.10805,-0.4219 -0.2267,-0.7906 -0.3418,-1.0703 -0.0575,-0.1398 -0.10957,-0.2535 -0.18555,-0.3672 -0.0348,-0.052 -0.077,-0.1101 -0.16015,-0.1757 -0.005,-0.019 -0.005,-0.014 -0.01,-0.037 -0.0363,-0.1896 -0.0725,-0.5043 -0.0879,-0.8632 -0.0345,-0.8025 -0.18307,-1.8863 -0.35937,-2.541 -0.96742,-3.5927 -1.38147,-7.5691 -1.32227,-12.8516 0.0289,-2.5728 0.0398,-3.9415 -0.0391,-4.8555 -0.0789,-0.9139 -0.2806,-1.4074 -0.58789,-1.9824 -0.16372,-0.3064 -0.31599,-0.6352 -0.42188,-0.9043 -0.10588,-0.2691 -0.15039,-0.5484 -0.15039,-0.4609 0,-0.2525 -0.0522,-0.315 -0.11914,-0.5157 -0.0669,-0.2006 -0.16306,-0.4622 -0.29101,-0.7929 -0.25592,-0.6615 -0.63837,-1.5995 -1.1543,-2.8282 -1.03187,-2.4573 -2.5955,-6.0792 -4.73242,-10.9628 -1.15028,-2.6287 -2.78658,-6.6007 -3.625,-8.7989 -0.8505,-2.2299 -2.95018,-7.3746 -4.67578,-11.4609 -3.91158,-9.2627 -4.64114,-11.1545 -7.98438,-20.6953 -2.68427,-7.66 -3.48624,-9.7191 -5.14453,-13.211 -0.91836,-1.9338 -3.67224,-9.4778 -4.21094,-11.5332 -0.0894,-0.3411 -0.19628,-1.1977 -0.26953,-2.3261 -0.0733,-1.1285 -0.1242,-2.5533 -0.14258,-4.1348 -0.0539,-4.6449 -0.15037,-5.5682 -0.82031,-7.9687 -1.55392,-5.5685 -3.28711,-12.8776 -4.07227,-17.168 -0.33704,-1.8417 -0.75877,-4.7015 -1.0957,-7.2774 -0.33692,-2.5758 -0.58789,-4.9321 -0.58789,-5.5605 0,-0.1932 -0.0435,-0.3747 -0.15039,-0.541 -0.10688,-0.1664 -0.31569,-0.3438 -0.5957,-0.3438 -0.22617,0 -0.33959,0.1175 -0.39649,0.1797 -0.0569,0.062 -0.0806,0.1071 -0.10351,0.1504 -0.0459,0.087 -0.076,0.1675 -0.10742,0.2617 -0.0629,0.1885 -0.12434,0.428 -0.19141,0.7227 -0.13414,0.5893 -0.28123,1.387 -0.41211,2.2636 -0.25638,1.7175 -0.88894,5.4072 -1.40234,8.1739 -2.67002,14.3872 -2.91401,22.5094 -0.94727,32.2539 2.59236,12.8439 2.97402,15.7812 3.31836,25.543 0.0735,2.0835 0.17307,4.1022 0.27148,5.6816 0.0492,0.7897 0.0976,1.4691 0.14454,1.9941 0.047,0.5251 0.0813,0.8631 0.14062,1.1055 0.13543,0.5531 0.26228,1.5982 0.26563,2.1856 0.003,0.4573 0.0372,0.8191 0.15429,1.1425 0.11708,0.3235 0.3527,0.6009 0.63867,0.7539 0.0644,0.034 0.47015,0.4872 0.58985,0.7989 0.11139,0.2901 0.43003,1.5795 0.69922,2.8847 0.26919,1.3053 0.51861,2.7029 0.58789,3.3692 0.0573,0.552 0.28667,1.5063 0.52734,2.2695 0.11126,0.3527 0.19426,0.6738 0.23828,0.8887 0.0178,0.087 0.0253,0.1364 0.0293,0.1718 -0.009,0.032 -0.0461,0.07 -0.0488,0.096 -0.0197,0.1856 0.0253,0.2576 0.0566,0.33 0.0626,0.1449 0.14291,0.2563 0.24805,0.3828 -0.0131,-0.016 0.0693,0.1275 0.11133,0.3008 0.0421,0.1734 0.0663,0.3854 0.0625,0.5586 -0.0129,0.5707 0.13326,1.5379 0.32226,2.3457 1.30269,5.5681 1.68364,7.656 1.95117,10.711 0.35121,4.0103 0.73633,7.2452 1.27149,10.6757 0.20062,1.286 0.58684,4.3757 0.85351,6.8282 0.42591,3.9163 0.44235,5.0068 0.14649,9.4336 -0.49412,7.3931 -1.89847,22.1603 -2.70117,28.4023 -0.38914,3.026 -0.94857,9.0083 -1.24805,13.332 -0.31749,4.5838 -1.0367,12.2733 -1.75391,19.1856 -0.3586,3.4561 -0.71575,6.7188 -1.02343,9.3027 -0.30769,2.5839 -0.57203,4.5156 -0.7168,5.207 -0.23542,1.1243 -0.66939,2.8207 -0.94727,3.7149 -1.647,5.3001 -2.3007,15.7078 -1.74609,26.7773 0.31277,6.2424 0.58264,7.7614 2.6582,14.9571 1.25143,4.3385 3.12566,13.8284 3.66016,18.539 0.74657,6.5796 0.54027,17.5271 -0.55273,28.459 -0.42787,4.2793 -0.88782,12.9861 -1.12696,21.3184 -0.077,2.6859 -0.26736,6.6571 -0.42187,8.7988 -0.47616,6.6002 -0.74503,11.3536 -0.81446,14.6953 -0.0694,3.3417 0.0313,5.2367 0.41016,6.3106 0.10283,0.2914 0.18044,0.5728 0.2207,0.7714 0.0201,0.099 0.0298,0.1797 0.0312,0.211 7.2e-4,0.016 -0.002,0.02 0.002,-0.01 0.004,-0.028 2e-4,-0.1037 0.12109,-0.2246 l 0.002,0 c -0.22897,0.2272 -0.17642,0.4185 -0.16015,0.5351 0.0163,0.1167 0.0482,0.2123 0.0879,0.3145 0.0793,0.2043 0.19687,0.4251 0.3457,0.6523 0.88311,1.3478 1.45995,4.1307 1.62305,8.582 l 0.16406,4.5 1.38867,1.8067 c 1.28183,1.6689 3.6391,6.0509 4.73242,8.8398 0.18632,0.4753 0.39769,0.955 0.5918,1.3535 0.19411,0.3985 0.33515,0.6837 0.52734,0.9102 0.0776,0.091 0.15542,0.2078 0.20508,0.3008 0.0497,0.093 0.0508,0.2016 0.0508,0.076 0,0.186 0.043,0.2292 0.0723,0.293 0.0292,0.064 0.0612,0.1212 0.0996,0.1856 0.0768,0.1287 0.1756,0.2792 0.29687,0.4492 0.24255,0.34 0.56968,0.7597 0.92969,1.1914 0.85013,1.0195 2.12632,2.7905 3.25977,4.4766 1.13344,1.686 2.14549,3.3365 2.42773,3.9746 0.31695,0.7166 0.83838,1.6004 1.25977,2.1054 1.62702,1.9496 2.29074,4.2509 2.2832,8.1621 -0.005,2.6182 -0.0477,2.9118 -0.71484,4.2618 -0.20272,0.4102 -0.45256,0.8066 -0.68946,1.1113 -0.23689,0.3047 -0.49191,0.5152 -0.54101,0.539 -0.48939,0.2372 -0.86844,0.6792 -1.06836,1.2735 -0.19993,0.5943 -0.27463,1.3446 -0.30078,2.3945 -0.0183,0.7348 -0.21246,1.281 -0.44727,1.5723 -0.23481,0.2913 -0.44865,0.3755 -0.80859,0.2851 -0.16752,-0.042 -0.31081,-0.082 -0.50196,-0.08 -0.19114,0 -0.48415,0.1237 -0.61523,0.3242 -0.13108,0.2005 -0.14574,0.376 -0.16211,0.5703 -0.0164,0.1943 -0.0195,0.4193 -0.0195,0.7051 0,0.7892 -0.14724,1.2816 -0.35938,1.5468 -0.21214,0.2653 -0.5117,0.4004 -1.09765,0.4004 -0.49977,0 -0.83943,-0.024 -1.19336,0.2051 -0.17697,0.1146 -0.30582,0.3035 -0.36914,0.4766 -0.0633,0.1731 -0.086,0.3372 -0.10742,0.5215 -0.0321,0.2759 -0.21295,0.5639 -0.55078,0.8339 -0.33784,0.2701 -0.81988,0.5021 -1.33985,0.6426 -1.03994,0.2811 -2.19126,0.1571 -2.69531,-0.3164 l -1.26563,-1.1914 -0.34179,1.7051 c -0.0422,0.2112 -0.25853,0.5099 -0.66992,0.791 -0.4114,0.2811 -0.98919,0.5349 -1.625,0.7129 -1.2702,0.3555 -2.7752,0.3798 -3.63868,-0.01 -4.9e-4,-2e-4 -0.001,3e-4 -0.002,0 -3.4e-4,-10e-5 -0.002,2e-4 -0.002,0 -0.98774,-0.4436 -2.74629,-2.048 -3.54102,-3.3027 -0.27233,-0.43 -0.80102,-1.7119 -1.06445,-2.666 -0.28891,-1.0465 -0.85559,-2.5512 -1.30078,-3.4492 -0.43692,-0.8815 -0.91553,-2.7308 -1.30274,-5.1231 -0.3872,-2.3922 -0.70036,-5.3477 -0.88867,-8.5469 -0.25409,-4.3169 -0.39626,-5.156 -1.30273,-7.832 -0.54306,-1.6031 -1.16929,-3.6971 -1.37305,-4.5742 -0.21511,-0.9261 -0.51315,-2.1844 -0.66406,-2.8047 -0.12545,-0.5156 -0.34997,-2.2552 -0.45703,-3.6992 -0.15223,-2.0532 -0.45522,-3.4112 -1.22071,-5.459 -0.53172,-1.4226 -1.06668,-3.4621 -1.16406,-4.3594 -0.13207,-1.217 -0.59206,-2.7588 -1.23047,-4.1758 -1.38302,-3.0698 -1.49328,-4.4661 -0.58203,-7.3828 1.37587,-4.4035 1.25907,-10.697 -0.29297,-20.5312 -0.78399,-4.9676 -2.97758,-17.1486 -3.8125,-21.166 -1.16697,-5.615 -1.52706,-6.9333 -4.43359,-16.1953 -1.23408,-3.9325 -1.87627,-6.2468 -2.34571,-11.1797 -0.46943,-4.933 -0.75661,-12.473 -1.25195,-26.7285 l -0.24609,-7.086 -1.5,-3.8574 c -0.81284,-2.0911 -1.91088,-4.6626 -2.47657,-5.7852 -1.50872,-2.994 -3.58002,-9.2099 -4.20312,-12.6211 -0.40213,-2.2016 -0.5766,-4.2976 -0.58008,-7.0292 -0.003,-2.18 -0.12329,-5.0717 -0.27539,-6.502 -0.14494,-1.3629 -0.40194,-4.7112 -0.56836,-7.4004 -0.16782,-2.712 -0.54504,-6.614 -0.84375,-8.7207 -0.69243,-4.8834 -3.7662,-19.7457 -5.88086,-28.4707 -0.99744,-4.1154 -1.87002,-8.5691 -2.25976,-11.5195 -0.1771,-1.3408 -0.37133,-2.6038 -0.54297,-3.5645 -0.0858,-0.4803 -0.16516,-0.8842 -0.23633,-1.1914 -0.0356,-0.1536 -0.068,-0.2816 -0.10156,-0.3906 -0.0335,-0.109 -0.031,-0.1715 -0.15235,-0.332 -0.11092,-0.1468 -0.31618,-0.3028 -0.54492,-0.3399 -0.22874,-0.037 -0.43127,0.015 -0.63672,0.094 -0.41089,0.1568 -0.89844,0.4564 -1.6875,0.9668 -1.51069,0.9772 -2.06901,1.1949 -3.42187,1.3378 -0.97884,0.1034 -2.02634,0.013 -2.28516,-0.086 -0.31681,-0.1216 -0.54648,-0.209 -0.83984,-0.1934 -0.14668,0.01 -0.32424,0.062 -0.45899,0.1778 -0.13474,0.1154 -0.20542,0.264 -0.24218,0.3887 -0.0302,0.1024 -0.0315,0.138 -0.0488,0.2402 -0.0174,0.1021 -0.0393,0.2378 -0.0645,0.4023 -0.0504,0.3291 -0.11664,0.7783 -0.19335,1.3184 -0.15343,1.0802 -0.35028,2.5209 -0.55469,4.0625 -0.40608,3.0623 -1.17146,7.5399 -1.69141,9.8984 -1.32713,6.02 -2.87852,15.7894 -3.21679,20.3028 -0.1519,2.0262 -0.46277,4.9616 -0.68555,6.4765 -0.22479,1.5287 -0.47018,5.5298 -0.66992,10.0586 -0.19975,4.5289 -0.34655,9.5458 -0.34766,12.9766 -0.002,6.0203 -0.35126,8.5803 -1.75391,12.8672 -0.67505,2.0632 -1.76455,5.0297 -2.40039,6.5429 -0.65987,1.5707 -1.55151,4.1174 -2.00586,5.7305 -0.5748,2.0409 -0.87537,3.3617 -0.83398,6.5332 0.0414,3.1716 0.40902,8.2321 1.13477,17.9512 0.16022,2.1454 0.29148,5.8036 0.29101,8.084 -9.9e-4,5.8231 -0.46165,8.4976 -3.92578,22.8261 -0.59778,2.4725 -1.29432,5.6147 -1.55469,7.0274 -0.25416,1.3789 -0.71478,3.7111 -1.02148,5.168 -0.31045,1.4747 -0.66745,3.4212 -0.80078,4.375 -0.1262,0.9027 -0.4885,3.0521 -0.79883,4.7402 -0.77699,4.226 -1.43945,11.7313 -1.43945,16.2832 0,3.0424 0.13639,4.3056 0.71679,6.5937 1.03576,4.0832 1.12139,5.8674 0.42383,8.1504 -2.15298,7.0463 -2.5494,9.2531 -2.81641,15.668 -0.19896,4.7795 -0.30759,5.649 -0.96484,7.709 -0.41029,1.2859 -1.04946,2.9436 -1.36523,3.5683 -0.98093,1.9408 -1.36945,5.0419 -1.32618,9.6973 0.0102,1.092 -0.0122,2.1861 -0.0547,3.0625 -0.0212,0.4382 -0.0465,0.8215 -0.0762,1.1191 -0.0296,0.2977 -0.074,0.5277 -0.0859,0.5665 -0.16395,0.5345 -0.61037,2.227 -1.01563,3.8339 -0.39802,1.5784 -1.0192,3.4429 -1.26758,3.9297 -0.34215,0.6708 -0.77947,1.8083 -1.01757,2.6348 -0.19801,0.6874 -0.8304,2.0043 -1.337893,2.7539 -0.82877,1.2242 -0.97751,1.346 -2.14063,1.6914 -1.414136,0.42 -2.67743,0.4956 -3.689453,0.2793 -1.012023,-0.2163 -1.771144,-0.7061 -2.269531,-1.4668 -0.179306,-0.2736 -0.345623,-1.2497 -0.271485,-2.2871 0.07414,-1.0374 0.337659,-2.1691 0.705078,-2.8887 0.244924,-0.4796 0.39377,-0.7696 0.449219,-1.0898 0.02773,-0.1601 0.03276,-0.3979 -0.140625,-0.5996 -0.173388,-0.2017 -0.40132,-0.2285 -0.546875,-0.2285 -0.3241,0 -0.441972,0.1449 -0.572266,0.2636 -0.130293,0.1188 -0.250933,0.2609 -0.380859,0.4297 -0.259852,0.3377 -0.544659,0.7815 -0.828125,1.2735 -0.566931,0.9839 -1.121684,2.142 -1.363281,3.0214 -0.08089,0.2945 -0.178911,0.6007 -0.267578,0.8457 -0.08867,0.2451 -0.201551,0.4641 -0.183594,0.4375 -0.04174,0.062 -0.49874,0.4125 -1.007813,0.6348 -0.509072,0.2223 -1.102284,0.375 -1.392578,0.375 -0.420951,0 -1.016634,-0.2268 -1.511718,-0.5879 -0.495084,-0.3611 -0.880187,-0.8525 -0.992188,-1.2305 -0.115101,-0.3884 -0.235932,-0.7037 -0.501953,-0.9472 -0.266021,-0.2435 -0.62481,-0.3145 -0.964844,-0.3145 -0.734204,0 -1.553032,-0.5823 -1.941406,-1.5117 -0.303326,-0.7261 -0.841443,-1.2253 -1.541016,-1.3652 -0.330291,-0.066 -0.554559,-0.2337 -0.746093,-0.586 -0.191535,-0.3522 -0.31836,-0.8991 -0.31836,-1.6172 0,-0.7496 -0.13942,-1.423 -0.646484,-1.8417 -0.254152,-0.2099 -0.725296,-0.9871 -1.048828,-1.8653 -0.323533,-0.8781 -0.544922,-1.8805 -0.544922,-2.5683 0,-0.7442 0.378733,-2.9757 0.83789,-5.043 0.229579,-1.0336 0.47794,-2.0436 0.705079,-2.8477 0.227138,-0.804 0.475777,-1.4512 0.539062,-1.5527 0.208892,-0.335 0.699675,-0.9735 1.025391,-1.3262 0.244973,-0.2653 0.520893,-0.6873 0.849609,-1.2324 0.328716,-0.545 0.687654,-1.1934 1.003906,-1.8223 0.586169,-1.1656 1.980443,-3.2561 3.029297,-4.5273 2.100593,-2.5461 2.678727,-3.3518 4.462891,-6.2148 0.800484,-1.2846 1.28262,-2.4766 1.494141,-3.7286 0.177175,-1.0486 0.853826,-2.7905 2.0625,-5.1797 1.982321,-3.9181 2.209091,-5.0084 1.796874,-8.496 -0.107552,-0.9102 -0.135268,-1.4181 0.07813,-2.5704 0.213393,-1.1522 0.680688,-2.926 1.566406,-6.1933 0.325699,-1.2015 0.460953,-2.3914 0.359375,-4.3535 -0.101578,-1.9622 -0.431647,-4.7172 -1.035157,-9.1543 -0.606486,-4.4593 -1.369502,-10.8271 -1.693359,-14.125 -0.325484,-3.3144 -0.833698,-8.1639 -1.128906,-10.7871 -0.294474,-2.6169 -0.671864,-6.0841 -0.837891,-7.6973 -0.169014,-1.642 -0.758044,-6.1679 -1.3125,-10.0996 -0.90968,-6.4509 -1.004674,-7.7108 -1.03125,-13.6543 -0.02848,-6.3723 0.03598,-7.2653 1.251953,-17.7227 0.375991,-3.2334 0.904515,-6.4497 1.97461,-12.0058 0.842549,-4.3745 0.864474,-4.7094 0.626953,-9.2207 -0.132456,-2.5157 -0.242188,-8.3198 -0.242188,-12.8555 0,-9.0339 0.120055,-8.0917 -1.886718,-14.0234 -0.955769,-2.825 -2.136949,-9.3385 -3.3125,-18.459 -0.313687,-2.4338 -0.878875,-6.2601 -1.259766,-8.5254 -0.18867,-1.1221 -0.360327,-2.2493 -0.484375,-3.1582 -0.124048,-0.9089 -0.197266,-1.646 -0.197266,-1.8086 0,-0.3597 -0.08171,-0.9744 -0.207031,-1.8125 -0.125319,-0.8382 -0.296714,-1.8562 -0.486328,-2.8613 -0.373947,-1.9823 -0.942429,-5.51 -1.257812,-7.8086 -0.317309,-2.3127 -0.767102,-5.4622 -1,-7.0078 -0.853838,-5.6662 -1.875642,-14.4084 -2.628907,-21.8926 -0.376632,-3.7421 -0.687099,-7.1709 -0.875,-9.7422 -0.09395,-1.2856 -0.157238,-2.3586 -0.183593,-3.1426 -0.01318,-0.392 -0.01542,-0.7124 -0.0098,-0.9453 0.0057,-0.2329 0.04026,-0.411 0.02344,-0.3594 0.04057,-0.1247 0.02948,-0.1349 0.03516,-0.1894 0.0057,-0.055 0.01041,-0.1178 0.01563,-0.1953 0.01043,-0.1551 0.02194,-0.3639 0.0332,-0.6231 0.02253,-0.5183 0.04727,-1.2385 0.07227,-2.1113 0.04999,-1.7456 0.102203,-4.0995 0.144532,-6.6426 0.267539,-16.0765 1.171814,-24.3006 3.238281,-29.9629 1.749294,-4.7931 2.304417,-9.4064 2.386719,-19.6094 0.05485,-6.8028 0.08014,-6.9745 2.40625,-17.3964 1.671389,-7.4889 2.042293,-11.3898 2.060547,-21.6719 0.0127,-7.1806 -0.33414,-12.0824 -1.279297,-18.002 -0.224687,-1.4073 -0.40446,-2.4687 -0.560547,-3.2109 -0.07804,-0.3711 -0.14732,-0.661 -0.22461,-0.8906 -0.03865,-0.1148 -0.07817,-0.2139 -0.132812,-0.3125 -0.05464,-0.099 -0.114684,-0.2148 -0.302734,-0.3106 -0.188051,-0.096 -0.508298,-0.032 -0.638672,0.078 -0.130374,0.1105 -0.175107,0.2111 -0.220704,0.3106 -0.09119,0.1989 -0.152555,0.4259 -0.220703,0.7305 -0.136295,0.6092 -0.279001,1.5067 -0.458984,2.7089 -0.412212,2.7535 -2.91244,13.1223 -4.808594,19.8829 -0.676389,2.4115 -0.769803,3.3031 -0.818359,7.9707 -0.01474,1.4168 -0.06285,2.8479 -0.128906,4.0058 -0.06606,1.158 -0.166789,2.0958 -0.222657,2.3203 -0.41503,1.6679 -3.129986,9.5351 -3.673828,10.6895 -0.93092,1.976 -2.710844,6.3678 -3.595703,8.8672 -3.886296,10.9774 -7.535372,20.187 -10.46289,26.4179 -3.882337,8.2631 -5.733477,12.9042 -9.460938,23.7129 -2.382578,6.9091 -4.134195,11.8554 -4.490234,12.7129 -0.18804,0.4528 -0.329722,1.2263 -0.414063,1.9551 -0.07823,0.6759 -0.289332,2.1927 -0.466797,3.3418 -0.200902,1.3008 -0.254107,3.0203 -0.132812,4.3223 0.231728,2.4875 0.360579,3.4817 0.199218,5.1425 -0.16136,1.6609 -0.62418,4.0255 -1.59375,9.1407 -0.586102,3.0921 -0.899487,4.5381 -0.810546,6.4843 0.08894,1.9463 0.56813,4.3275 1.527343,9.3848 0.282968,1.4919 0.559312,4.1868 0.601563,5.8926 0.03927,1.5854 0.047,2.3849 -0.02148,2.7578 -0.03424,0.1865 -0.06906,0.2533 -0.132813,0.3379 -0.06376,0.085 -0.184704,0.1943 -0.380859,0.3633 -0.33498,0.2887 -1.038518,0.5566 -1.261719,0.5566 -0.287086,0 -0.463718,-0.044 -0.609375,-0.1367 -0.145658,-0.092 -0.292881,-0.2551 -0.451172,-0.5899 -0.316582,-0.6694 -0.609117,-1.9762 -0.947266,-4.1386 -0.338641,-2.1657 -0.848661,-4.7576 -1.166015,-5.8672 -0.289741,-1.0133 -0.740291,-2.9765 -0.984375,-4.3047 -0.276074,-1.5022 -0.466482,-2.3931 -0.933594,-2.957 -0.116778,-0.141 -0.26862,-0.2691 -0.462891,-0.334 -0.19427,-0.065 -0.413804,-0.05 -0.589843,0.014 -0.352079,0.127 -0.584695,0.3801 -0.84375,0.705 -0.423592,0.5312 -0.788438,1.2698 -0.898438,1.8965 -0.03676,0.2094 -0.0509,0.5077 -0.07813,1.0137 -0.02722,0.5059 -0.05633,1.1762 -0.08594,1.9668 -0.05923,1.5812 -0.119948,3.6402 -0.167969,5.7988 -0.121668,5.4692 -0.231479,8.6928 -0.416016,10.625 -0.09227,0.9661 -0.204838,1.6079 -0.333984,2.0313 -0.129146,0.4234 -0.256949,0.6163 -0.419922,0.7793 -0.627992,0.6279 -1.954724,0.7424 -2.810547,0.1816 -0.17386,-0.1139 -0.250223,-0.1837 -0.30664,-0.2793 -0.05642,-0.096 -0.109007,-0.2532 -0.132813,-0.5723 -0.04761,-0.638 0.04554,-1.8465 0.263672,-4.0234 0.226457,-2.26 0.185281,-3.735 -0.193359,-7.0586 -0.389856,-3.4219 -0.41345,-4.4267 -0.148438,-6.168 0.195177,-1.2823 0.303311,-2.3576 0.318359,-3.1406 0.0075,-0.3915 -0.0061,-0.7063 -0.05664,-0.9707 -0.02529,-0.1322 -0.0543,-0.2525 -0.134766,-0.3887 -0.08047,-0.1361 -0.285191,-0.3242 -0.539062,-0.3242 -0.263478,0 -0.387724,0.152 -0.449219,0.2324 -0.0615,0.081 -0.09083,0.1434 -0.119141,0.211 -0.05661,0.1351 -0.09814,0.2823 -0.138672,0.457 -0.08107,0.3495 -0.150351,0.8028 -0.197265,1.3028 -0.08957,0.9543 -0.300421,2.9407 -0.466797,4.4003 -0.175133,1.5365 -0.354785,6.017 -0.416016,10.0801 -0.04535,3.0092 -0.0933,4.8782 -0.171875,6.043 -0.07858,1.1647 -0.215868,1.6051 -0.289062,1.7168 -0.272987,0.4166 -0.910726,0.6968 -1.63086,0.707 -0.720133,0.01 -1.464415,-0.2527 -1.878906,-0.709 -0.191976,-0.2112 -0.275442,-0.3456 -0.380859,-1.1465 -0.105417,-0.8008 -0.181875,-2.183 -0.289063,-4.6152 -0.300979,-6.8298 -0.305604,-11.4356 -0.04102,-13.4433 0.07324,-0.5558 0.108646,-0.9583 0.09375,-1.2676 -0.0074,-0.1547 -0.0011,-0.2794 -0.115235,-0.4766 -0.05707,-0.099 -0.185481,-0.2374 -0.371094,-0.2793 -0.185612,-0.042 -0.344224,0.022 -0.435546,0.078 l -0.002,0 c -0.315563,0.1955 -0.350916,0.417 -0.417968,0.6485 -0.06705,0.2314 -0.103516,0.4897 -0.103516,0.7597 0,0.1747 -0.02686,0.3597 -0.0625,0.4844 -0.03564,0.1248 -0.145626,0.1723 0.01953,0.07 -0.185137,0.1146 -0.200531,0.2126 -0.228515,0.2793 -0.02799,0.067 -0.04302,0.1211 -0.05664,0.1797 -0.02724,0.1172 -0.04606,0.2489 -0.06445,0.4102 -0.03678,0.3225 -0.06732,0.7595 -0.0918,1.3125 -0.04896,1.106 -0.07422,2.6655 -0.07422,4.5703 0,3.2642 -0.05396,5.1928 -0.236328,6.3144 -0.09118,0.5609 -0.213909,0.9112 -0.347656,1.1329 -0.133747,0.2216 -0.273987,0.3376 -0.511719,0.4648 -0.832655,0.4456 -1.771965,0.31 -2.617187,-0.4453 l -0.002,0 -0.751953,-0.6738 -0.167969,-6.0391 c -0.09454,-3.4264 -0.05066,-7.2422 0.07227,-8.2813 0.136659,-1.1553 0.516389,-4.3681 0.84375,-7.1406 0.318029,-2.6934 0.560988,-5.3947 0.685547,-7.4316 0.06228,-1.0185 0.09585,-1.8691 0.09375,-2.4805 -0.0011,-0.3057 -0.0098,-0.5483 -0.0332,-0.7441 -0.01171,-0.098 -0.02426,-0.1806 -0.06055,-0.2852 -0.01815,-0.052 -0.03976,-0.1131 -0.105469,-0.1953 -0.06571,-0.082 -0.221931,-0.2031 -0.416015,-0.2031 -0.274891,0 -0.261968,0.062 -0.316406,0.094 -0.05444,0.031 -0.103277,0.063 -0.160157,0.1035 -0.113759,0.08 -0.25261,0.187 -0.417968,0.3184 -0.330717,0.2628 -0.76424,0.6248 -1.25586,1.0469 -0.98324,0.8441 -2.189708,1.9207 -3.193359,2.8652 -1.910453,1.7977 -4.1488562,2.5779 -7.4863284,2.5625 -1.1119871,0 -1.8641291,-0.1508 -2.2636719,-0.3691 -0.3995429,-0.2184 -0.515625,-0.4273 -0.515625,-0.92 0,-0.225 0.018507,-0.262 0.087891,-0.3398 0.069384,-0.078 0.2668891,-0.2102 0.6582031,-0.377 1.4141863,-0.6025 2.2733804,-0.9816 2.8085938,-1.2597 0.2676067,-0.1391 0.4558147,-0.2492 0.6113281,-0.3809 0.1555134,-0.1316 0.3144531,-0.3459 0.3144531,-0.6035 0,0.1682 -0.034279,0.1763 -0.039063,0.1856 -0.00478,0.01 6.869e-4,0 0.013672,-0.024 0.02597,-0.038 0.079589,-0.1082 0.1503906,-0.1953 0.1416026,-0.1742 0.3576648,-0.4206 0.625,-0.7148 0.5346704,-0.5885 1.2778814,-1.3677 2.0957036,-2.1895 1.659106,-1.6672 3.543299,-3.7527 4.269531,-4.7461 1.08598,-1.4852 1.686806,-2.2938 2.03125,-2.6973 0.172222,-0.2017 0.281807,-0.2973 0.316406,-0.3203 0,0 0,0 0,0 0.38446,0 0.528034,-0.1633 0.736328,-0.3281 0.208295,-0.1649 0.418255,-0.3754 0.605469,-0.6133 0.24959,-0.3174 1.074135,-1.0659 1.703125,-1.5098 1.540603,-1.0873 3.406164,-2.6205 4.990235,-4.0488 0.792035,-0.7142 1.512317,-1.4015 2.08789,-1.9961 0.575573,-0.5947 0.999035,-1.0754 1.236328,-1.4785 1.300263,-2.2094 1.860309,-3.4126 1.867188,-4.4395 0.0036,-0.5278 0.393653,-2.2561 1.945312,-7.9355 0.294585,-1.0782 0.792668,-2.8988 1.105469,-4.045 0.320583,-1.1748 0.766467,-3.2095 1.003906,-4.5781 0.224431,-1.2935 0.845266,-3.5886 1.355469,-4.998 1.538044,-4.249 2.341796,-8.1704 4.525391,-21.9981 1.507514,-9.5464 2.317168,-14.1969 3.0625,-17.6152 0.373347,-1.7122 1.070878,-5.3613 1.55664,-8.1406 0.821062,-4.6977 2.402908,-10.8885 3.658203,-14.3379 0.311114,-0.8549 1.042736,-2.9307 1.63086,-4.627 0.582074,-1.6787 1.445753,-3.8936 1.888672,-4.8554 2.428222,-5.2729 3.409576,-9.3237 4.291015,-17.6602 0.325216,-3.0758 0.901285,-8.1174 1.279297,-11.1934 1.914653,-15.5794 1.956538,-16.1802 1.88086,-26.8066 -0.109625,-15.3929 0.36154,-20.9186 2.615234,-30.6895 0.648067,-2.8097 1.31819,-5.2738 1.953125,-7.2226 0.634934,-1.9488 1.251491,-3.3944 1.716797,-4.0918 1.949077,-2.9212 4.575732,-4.9414 8.480468,-6.4902 2.172427,-0.8618 3.17648,-1.3736 5.929688,-3.0196 0.777471,-0.4648 2.723793,-1.3518 4.208984,-1.9043 6.574415,-2.4453 21.834204,-9.7642 25.914064,-12.455 2.74373,-1.8095 4.54938,-3.5401 5.25,-5.2168 0.35043,-0.8388 0.64458,-2.3145 0.89843,-4.1192 0.25385,-1.8047 0.44735,-3.9067 0.51954,-5.8672 0.0627,-1.7029 0.0922,-2.6181 -0.002,-3.3808 -0.0942,-0.7627 -0.31777,-1.3281 -0.70312,-2.2285 -1.68046,-3.9264 -2.58658,-7.1245 -3.49219,-12.34378 -0.23368,-1.34683 -0.36827,-2.09099 -0.54883,-2.58789 -0.0903,-0.24846 -0.19906,-0.46087 -0.40039,-0.61914 -0.20133,-0.15828 -0.45225,-0.19532 -0.62891,-0.19532 0.10111,0 0.0358,0.004 -0.0352,-0.0234 -0.0709,-0.0277 -0.17352,-0.076 -0.29102,-0.13671 -0.23498,-0.12154 -0.53036,-0.29593 -0.81054,-0.48633 -0.57047,-0.38765 -1.30106,-1.3839 -1.96094,-2.80469 -0.65989,-1.42079 -1.27278,-3.25939 -1.75391,-5.33789 -0.83186,-3.59392 -0.88603,-4.81444 -0.32031,-6.98633 0.42948,-1.64897 0.59789,-1.9418 1.60742,-2.76172 0.30499,-0.24773 0.56577,-0.51882 0.66797,-0.89453 0.1022,-0.3757 0.052,-0.74296 -0.0332,-1.25781 -0.0557,-0.33682 -0.13489,-0.69064 -0.21875,-1.00195 -0.0839,-0.31132 -0.15795,-0.56069 -0.26953,-0.77344 0.0497,0.0946 -0.028,-0.10132 -0.0703,-0.32617 -0.0423,-0.22486 -0.0914,-0.53404 -0.14062,-0.89649 -0.0983,-0.72489 -0.20211,-1.6687 -0.28516,-2.64844 -0.0845,-0.99669 -0.19385,-1.97105 -0.30468,-2.74609 -0.0554,-0.38752 -0.11027,-0.724 -0.16407,-0.99414 -0.0538,-0.27014 -0.0834,-0.44263 -0.17969,-0.64258 -0.0835,-0.17342 -0.15891,-1.16183 0.0606,-3.08789 0.10095,-0.88633 0.15669,-1.58912 0.16406,-2.10156 0.004,-0.25622 -0.004,-0.46325 -0.0312,-0.64453 -0.0137,-0.0906 -0.0291,-0.17423 -0.0723,-0.27539 -0.0432,-0.10116 -0.12327,-0.26462 -0.35352,-0.34375 0.10749,0.0369 0.11806,0.096 0.10547,0.0644 -0.0126,-0.0315 -0.0327,-0.11701 -0.0332,-0.20703 -5.5e-4,-0.09 0.0161,-0.18566 0.0352,-0.24023 0.0191,-0.0546 0.0411,-0.0507 -0.0156,-0.0156 0.23004,-0.14218 0.25014,-0.26095 0.30664,-0.38281 0.0565,-0.12187 0.10237,-0.25526 0.14648,-0.40625 0.0882,-0.30199 0.16479,-0.67019 0.21485,-1.0586 0.0443,-0.3436 0.11498,-0.7164 0.18945,-1.02539 0.0745,-0.30898 0.17363,-0.58041 0.18946,-0.60937 0.2302,-0.42132 0.32617,-0.96262 0.32617,-1.46875 0,-0.0413 0.0751,-0.38981 0.22461,-0.75586 0.1495,-0.36606 0.36238,-0.78768 0.58984,-1.1543 0.49416,-0.79653 1.2982,-2.15237 1.79883,-3.03125 0.77147,-1.35427 3.20945,-4.52559 5.63867,-7.28906 0.56066,-0.6378 1.44053,-1.42437 2.27148,-2.0625 0.83096,-0.63813 1.69801,-1.13481 1.91211,-1.18945 0.22488,-0.0574 0.42715,-0.14274 0.60157,-0.25977 0.0952,-0.0639 0.1402,-0.23994 0.22265,-0.35351 0.20462,0.0289 0.37332,0.0162 0.59571,-0.01 0.24425,-0.0285 0.5201,-0.0763 0.7832,-0.13867 0.36777,-0.0871 0.65242,-0.1601 0.90039,-0.4043 0.12398,-0.1221 0.21714,-0.3027 0.24414,-0.47461 0.0229,-0.14588 -1e-4,-0.27168 -0.0273,-0.39453 0.0766,-0.028 0.30226,-0.10132 0.79882,-0.17578 0.79238,-0.11883 1.80479,-0.37499 2.39844,-0.62305 0.22146,-0.0925 0.45857,-0.16047 0.63281,-0.1914 0.0871,-0.0155 0.15845,-0.0219 0.19336,-0.0215 0.0349,4.4e-4 0.0313,0.0281 -0.0742,-0.0371 0.2469,0.15263 0.48122,0.1341 0.68555,0.0879 0.20434,-0.0462 0.39634,-0.13843 0.56836,-0.28125 -0.063,0.0523 0.17503,-0.0772 0.45703,-0.13672 0.282,-0.0595 0.63788,-0.10463 0.97656,-0.11523 0.39862,-0.0125 0.78203,-0.0575 1.09961,-0.125 0.1588,-0.0338 0.30009,-0.0711 0.43165,-0.12305 0.13155,-0.0519 0.26214,-0.0822 0.41015,-0.29492 z m 4.27344,0.2207 c 0.001,-0.003 -0.0177,0.058 -0.0957,0.11329 -0.006,0.004 -0.009,2.4e-4 -0.0156,0.004 0.0278,-0.0483 0.094,-0.0652 0.11133,-0.11719 z m -15.16406,2.94336 c 0,0.11019 -0.0905,0.2367 -0.15235,0.27149 -0.0148,0.008 -0.0106,0.002 -0.0215,0.006 0.0623,-0.0925 0.17383,-0.10623 0.17383,-0.27735 z m 72.44336,280.69925 c -0.0125,0.015 -0.006,0.029 -0.0215,0.043 -0.10417,0.095 -0.23874,0.1231 -0.31445,0.1231 0.13051,0 0.24848,-0.087 0.33594,-0.166 z m 37.48828,57.2578 c 0.003,4e-4 0.003,0 0.006,0 -0.10562,-0.01 -0.23265,0.01 -0.32422,0.062 0.0748,-0.046 0.20454,-0.081 0.31836,-0.064 z&quot;
				id=&quot;no_spesial_belakang&quot;
				inkscape:connector-curvature=&quot;0&quot; /&gt; --&gt;
				<path d="m 586.76471,-929.57829 32.00827,25.89259 44.53125,10.35705 37.9136,-12.25908 34.07629,-31.75623 c -1.223,24.00817 -0.54562,44.17881 13.4137,64.17836 -11.50449,14.76066 -32.76064,24.70317 -49.7804,32.2169 -29.50291,13.02468 -37.65429,12.01282 -55.43219,6.50492 -24.77415,-7.67546 -51.01547,-20.93722 -62.36056,-34.5757 10.0921,-21.22464 11.13898,-39.33174 5.63004,-60.55881 z" data-id="24" class="body-part clickable ears-nose-throat" inkscape:connector-curvature="0" sodipodi:nodetypes="ccccccsscc" data-target="body-part" data-body-part="Leher" id="no_0_belakang" style="' . $isiWarna['no_0_belakang'] . '" />
				<path d="m 484.51213,-597.07666 1.35207,59.64143 -2.28064,25.41662 -3.9973,15.75912 -20.76274,76.56259 v 45.58824 l -11.69846,36.07025 -106.3615,-35.32725 13.6482,-41.9194 14.70588,-30.88242 14.70588,-127.94118 2.09962,-54.04761 z" data-id="48" class="body-part clickable arm" inkscape:connector-curvature="0" sodipodi:nodetypes="ccccccccccccc" data-target="body-part" data-body-part="Lengan Pangkal kiri" id="no_7_belakang" style="' . $isiWarna['no_7_belakang'] . '" />
				<path d="m 288.23529,-119.6969 -7.35294,33.8235 -8.82353,14.7059 -36.7647,27.9412 -38.2353,42.6471 -10.29411,7.3529 -2.94118,2.9412 19.11765,4.4117 16.17647,-5.8823 25,-19.1177 -7.35294,64.7059 2.94117,51.4706 5.88236,8.8235 11.7647,-7.3529 0,-48.5294 1.47059,-7.353 4.41176,70.5883 1.47059,5.8823 5.88236,0 8.82352,-1.4706 1.47059,-7.3529 1.47059,-45.5882 1.47059,-33.8236 2.94118,58.8236 0,20.5882 7.35294,2.9412 7.35294,-5.8824 4.41176,-36.7647 -1.47059,-35.2941 7.35295,-11.7647 11.7647,38.2353 4.41177,22.0588 5.88235,2.9412 5.88235,-4.4118 -1.47059,-27.9412 -5.88235,-38.2352 10.29412,-51.4706 -2.94118,-30.8824 8.82353,-33.8235 z" data-id="29" class="body-part clickable hand-wrist" inkscape:connector-curvature="0" data-target="body-part" data-body-part="Telapak Tangan kiri" id="no_9_belakang" style="' . $isiWarna['no_9_belakang'] . '" />
				<path d="m 992.64706,-69.6969 0,39.7059 10.29414,50 -2.9412,38.2353 1.4706,32.3529 10.2941,1.4706 7.3529,-14.7059 0,-17.647 4.4118,-32.353 1.4706,88.2353 10.2941,5.8824 5.8824,-2.9412 4.4117,-45.5882 0,-30.8824 5.8824,33.8235 0,41.1765 5.8823,8.8235 5.8824,1.4706 8.8235,-7.3529 -1.4706,-29.4118 1.4706,-25 -4.4117,-35.2941 10.2941,26.4706 2.9412,42.6471 7.3529,8.8235 8.8235,-4.4118 2.9412,-16.1765 1.4706,-33.8235 -11.7647,-61.7647 30.8823,26.4706 19.1177,1.4706 4.4117,-7.353 -5.8823,-7.3529 -14.2752,-13.5920782 -29.8425,-39.3491218 -36.7647,-35.2941 m 0,0 -64.70584,13.2353" data-id="29" class="body-part clickable hand-wrist" inkscape:connector-curvature="0" sodipodi:nodetypes="cccccccccccccccccccccccccccccccccccccc" data-target="body-part" data-body-part="Telapak Tangan Kanan" id="no_5_belakang" style="' . $isiWarna['no_5_belakang'] . '" />
				<path d="m 832.35294,-421.16748 2.94118,42.64705 12.33922,55.5951 1.51446,54.97662 -375.68867,-0.71225 2.05832,-55.94776 14.18843,-67.147 c -0.4075,-10.39834 -5.2839,-10.82625 -0.40017,-22.61661 0.71129,-1.71718 -2.3631,-5.97361 0.59983,-7.17355 4.87376,-1.9738 16.67627,-0.3809 19.00871,-0.37546 z" data-id="36" class="body-part clickable abdomen" inkscape:connector-curvature="0" sodipodi:nodetypes="cccccccsssc" data-target="body-part" data-body-part="Abdomen Atas" id="no_11_belakang" style="' . $isiWarna['no_11_belakang'] . '" />
				<path  d="m 849.1478,-267.94871 2.3228,29.1342 5.88236,7.3529 c 7.92809,37.2549 23.6511,81.7888 19.11764,119.0437 l -422.05884,-1.3966 1.72291,-72.5635 11.88004,-44.11857 5.44442,-38.16438 c 375.68867,0.71225 0,0 375.68867,0.71225 z" data-id="36" class="body-part clickable abdomen" inkscape:connector-curvature="0" sodipodi:nodetypes="ccccccccc" data-target="body-part" data-body-part="Abdomen Tengah" id="no_12_belakang" style="' . $isiWarna['no_12_belakang'] . '" />
				<path d="m 452.94118,-113.8145 423.52941,-5.8824 7.35294,48.5294 L 875,43.5384 682.10063,39.914215 666.17647,45.009 650,42.0678 463.23529,45.796515 452.94118,-74.1087 Z" data-id="38" class="body-part clickable groin" inkscape:connector-curvature="0" sodipodi:nodetypes="cccccccccc" data-target="body-part" data-body-part="Abdomen Bawah" id="no_13_belakang"  style="' . $isiWarna['no_13_belakang'] . '" />
				<path d="m 449.72428,915.36742 c -1.49699,4.10861 -11.87185,-23.2629 -2.73787,-47.61875 3.35913,-8.95717 15.82328,-22.23703 19.55956,-32.26948 4.78671,-12.853 16.81184,-18.38672 21.16622,-28.77817 7.67716,-18.32109 15.55613,-35.70979 16.02837,-38.35666 1.2669,-7.10093 1.87305,-22.52213 8.58338,-61.82952 l -18.20629,-173.27054 -7.35294,-41.1765 2.94117,-54.4118 8.82353,-67.647 4.41177,-14.7059 -0.55282,-37.03876 c 110.5725,16.22702 0.51496,-1.70337 111.08746,14.52365 L 600,377.3619 l 5.88235,129.4118 -22.05882,85.2941 -13.23529,92.6471 c -1.13449,37.73436 15.92485,48.31894 -5.75137,96.70936 l 3.58559,14.40698 c -13.56819,52.99151 -12.41842,119.90541 -41.48956,158.23197 -16.30622,0.43921 -31.73028,-0.18016 -23.28316,-29.44496 -11.45037,26.50583 -21.30636,25.68404 -29.03066,20.36885 -5.79985,-3.99095 -15.04342,-14.85187 -20.50097,-19.84218 -4.00847,-3.66528 1.80566,-9.30085 -4.39383,-9.7775 z" data-id="49" class="body-part clickable leg" inkscape:connector-curvature="0" sodipodi:nodetypes="cssssccccccccccccccccssc" data-target="body-part" data-body-part="Kaki Betis Kiri" id="no_17_belakang" style="' . $isiWarna['no_17_belakang'] . '" />
				<path d="m 846.60608,321.24173 0.45274,20.82607 19.11765,73.5294 5.88235,75 -8.82353,116.1765 -2.43596,86.47677 -0.50521,17.93503 -0.5878,20.5157 6.87057,17.5229 3.98401,33.10523 19.8173,35.03594 25.25199,43.49204 15.54888,25.54905 1.86908,25.29946 -2.43625,11.14035 v 0 l -7.79675,9.40633 -1.35077,11.03074 -3.40705,4.05796 -4.41592,-0.9252 -1.23035,6.73572 -3.49488,5.9384 -6.72625,1.70555 c 0,0 -4.50124,7.08797 -10.48524,9.10069 -2.11919,0.71279 -6.16578,-0.25546 -9.02502,-2.50747 -2.4996,-1.96875 -3.11516,-2.37673 -3.11516,-2.37673 l -1.27463,5.81202 -11.51751,4.97533 -13.1925,0.067 -14.25086,-19.83408 c 0,0 -10.49638,-25.87335 -10.96968,-39.65882 -0.46188,-13.45253 -1.98909,-40.33234 -1.98909,-40.33234 l -10.85097,-29.25973 -3.55097,-30.77018 -9.4271,-30.55214 -6.89445,-24.52147 4.52006,-22.60238 -1.01234,-30.29001 -12.38976,-89.50693 -10.29412,-51.4706 -16.17647,-55.8823 -5.88236,-126.4706 -20.95587,-50.50557 z" data-id="49" class="body-part clickable leg" inkscape:connector-curvature="0" sodipodi:nodetypes="cccccccccccccccccccccccsscccccsccccccccccccc" data-target="body-part" data-body-part="Kaki Betis Kanan" id="no_15_belakang" style="' . $isiWarna['no_15_belakang'] . '" />
				<path d="m 998.78824,-337.90555 -9.65074,-33.08824 -23.01991,-69.05982 -15.9601,-110.26973 -2.36055,-77.89905 -104.52485,29.20507 4.0524,62.49918 7.01466,43.4731 14.56694,71.85336 4.3528,26.11652 -0.76731,29.76561 23.92161,58.72652 c 102.37505,-31.32252 0,0 102.37505,-31.32252 z" data-id="48" class="body-part clickable arm" inkscape:connector-curvature="0" sodipodi:nodetypes="ccccccccccccc" data-body-part="Tangan Pangkal Kanan" data-target="body-part" id="no_3_belakang" style="' . $isiWarna['no_3_belakang'] . '" />
				<g transform="matrix(3.5574198,0,0,3.5574198,177.86214,-4523.5744)" id="layer1-9" inkscape:label="Layer 1" >
					<path inkscape:connector-curvature="0" id="no_spesial_belakang" d="m 143.07265,931.56798 c -0.27146,-0.0383 -0.49962,0.009 -0.84571,0.0801 -0.49441,0.10169 -1.30443,0.22125 -1.72851,0.25586 h -0.002 c -0.50596,0.0413 -1.03427,0.12403 -1.40626,0.27539 -0.91989,0.37423 -1.85057,0.32233 -2.30078,0.0273 -0.27869,-0.18261 -0.47586,-0.31453 -0.77343,-0.35547 -0.14879,-0.0205 -0.35261,0.006 -0.50977,0.11719 -0.13957,0.0988 -0.1998,0.2284 -0.24414,0.34375 -0.0221,0.009 -0.12546,0.0349 -0.29688,0.0254 -0.34282,-0.0189 -0.93642,-0.15951 -1.7246,-0.43945 -0.47268,-0.16788 -0.85583,-0.27622 -1.1836,-0.31836 -0.16388,-0.0211 -0.31298,-0.0292 -0.47461,0 -0.16163,0.0292 -0.36358,0.11037 -0.49609,0.30078 0.0932,-0.13385 0.0959,-0.0853 0.043,-0.0645 -0.0529,0.0209 -0.15202,0.0504 -0.27344,0.0762 -0.24283,0.0516 -0.57993,0.0908 -0.92187,0.10156 -0.40191,0.0126 -0.80433,0.0632 -1.15235,0.13672 -0.34802,0.0735 -0.61033,0.11471 -0.88867,0.3457 -0.0433,0.0359 -0.11132,0.0673 -0.15039,0.0762 -0.0391,0.009 -0.0324,-0.0223 0.0606,0.0352 -0.18248,-0.11282 -0.31133,-0.10974 -0.4375,-0.11133 -0.12618,-0.002 -0.25115,0.0137 -0.38282,0.0371 -0.26332,0.0468 -0.55333,0.13338 -0.84179,0.25391 -0.42616,0.17806 -1.46463,0.45233 -2.16016,0.55664 -0.58071,0.0871 -0.93139,0.13005 -1.25977,0.32617 -0.16419,0.0981 -0.33035,0.28485 -0.38476,0.49219 -0.0538,0.20504 -0.0207,0.37417 0.0176,0.52148 -0.0187,0.006 -0.10301,0.061 -0.37305,0.125 -0.22081,0.0523 -0.46639,0.0956 -0.66797,0.11914 -0.20158,0.0235 -0.39694,0.0118 -0.35547,0.0195 -0.19323,-0.0359 -0.39522,-0.0202 -0.58398,0.0859 -0.18876,0.10615 -0.35742,0.3473 -0.35742,0.60156 0,-0.25596 0.0891,-0.21787 0.0352,-0.18164 -0.054,0.0362 -0.1674,0.0901 -0.28906,0.1211 -0.64537,0.1647 -1.40145,0.69409 -2.27539,1.36523 -0.87394,0.67114 -1.78055,1.47686 -2.41211,2.19531 -2.45898,2.79733 -4.87664,5.90825 -5.75781,7.45508 -0.49127,0.86244 -1.29874,2.22028 -1.78125,2.99805 -0.2609,0.42052 -0.49169,0.88067 -0.66406,1.30273 -0.17238,0.42206 -0.29883,0.76748 -0.29883,1.13477 0,0.31109 -0.14107,0.87666 -0.20313,0.99023 -0.13032,0.23849 -0.20149,0.50641 -0.28515,0.85352 -0.0837,0.34711 -0.15946,0.74644 -0.20899,1.13086 -0.0438,0.3396 -0.11241,0.6693 -0.18164,0.90625 -0.0346,0.11847 -0.0699,0.21602 -0.0937,0.26758 -0.0239,0.0516 -0.0833,0.0504 0.0742,-0.0469 -0.22974,0.14209 -0.33605,0.34522 -0.40234,0.53516 -0.0663,0.18994 -0.093,0.38368 -0.0918,0.57617 0.001,0.19249 0.0279,0.38285 0.10351,0.57226 0.0756,0.18942 0.21645,0.41298 0.49805,0.50977 -0.18684,-0.0642 -0.22873,-0.18202 -0.24023,-0.20898 -0.0115,-0.027 -0.002,-0.008 0.004,0.0332 0.0124,0.082 0.0228,0.25243 0.0195,0.47851 -0.007,0.45216 -0.0594,1.13655 -0.1582,2.00391 -0.22357,1.96211 -0.30513,2.93213 0.0332,3.63477 -0.0144,-0.03 0.0514,0.16201 0.0996,0.40429 0.0483,0.24228 0.10062,0.56608 0.1543,0.94141 0.10735,0.75065 0.21591,1.70923 0.29883,2.6875 0.0844,0.99527 0.18967,1.95218 0.29101,2.69922 0.0507,0.37352 0.10095,0.69514 0.14844,0.94726 0.0475,0.25212 0.0505,0.38166 0.16797,0.60547 0.024,0.0457 0.11464,0.29065 0.18945,0.56836 0.0748,0.27771 0.14787,0.60577 0.19727,0.9043 0.0799,0.48261 0.0825,0.72984 0.0547,0.83203 -0.0278,0.10219 -0.0787,0.17354 -0.33399,0.38086 -1.08651,0.88244 -1.50067,1.57994 -1.94531,3.28711 -0.59538,2.28579 -0.52763,3.82483 0.31445,7.46289 0.49398,2.134 1.12363,4.03093 1.82227,5.53516 0.69864,1.50422 1.44109,2.62214 2.30469,3.20898 0.3131,0.21277 0.63528,0.40465 0.91406,0.54883 0.13939,0.0721 0.26714,0.13295 0.38672,0.17969 0.11958,0.0467 0.20425,0.0918 0.39843,0.0918 0.0784,0 0.0326,3.5e-4 0.01,-0.0176 -0.0228,-0.0179 0.021,0.0113 0.0801,0.17383 0.11815,0.32517 0.2714,1.07597 0.50391,2.41602 0.91313,5.26264 1.84973,8.57814 3.55664,12.56634 0.3816,0.8917 0.55235,1.3235 0.63086,1.959 0.0785,0.6356 0.0587,1.5209 -0.004,3.2207 -0.0707,1.9206 -0.26301,3.9974 -0.51172,5.7656 -0.24871,1.7683 -0.57305,3.2579 -0.83008,3.8731 -0.55154,1.32 -2.21639,3.0117 -4.8789,4.7676 -3.80943,2.5125 -19.277292,9.9585 -25.710945,12.3515 -1.541924,0.5736 -3.45823,1.4363 -4.375,1.9844 -2.74028,1.6382 -3.639311,2.096 -5.785156,2.9473 -4.040947,1.6029 -6.880551,3.7736 -8.94336,6.8652 -0.583872,0.8751 -1.188272,2.3481 -1.835937,4.3359 -0.647665,1.9879 -1.323377,4.4767 -1.976563,7.3086 -2.265522,9.8222 -2.750408,15.5047 -2.640624,30.92 0.07566,10.6238 0.04146,11.1014 -1.873047,26.6796 -0.379137,3.0851 -0.955061,8.126 -1.28125,11.211 -0.876921,8.2937 -1.814739,12.1551 -4.205079,17.3457 -0.479145,1.0405 -1.332983,3.2356 -1.925781,4.9453 -0.58675,1.6923 -1.319554,3.774 -1.625,4.6133 -1.293956,3.5556 -2.872296,9.7431 -3.705078,14.5078 -0.483352,2.7655 -1.181382,6.4234 -1.546875,8.0996 -0.753453,3.4555 -1.563964,8.1205 -3.072266,17.6719 -2.18224,13.8191 -2.971302,17.6433 -4.480468,21.8125 -0.538961,1.4888 -1.157598,3.7686 -1.400391,5.1679 -0.229781,1.3245 -0.677435,3.3687 -0.982422,4.4864 -0.312774,1.146 -0.810939,2.9669 -1.105469,4.0449 -1.553088,5.6846 -1.974423,7.2958 -1.980468,8.1934 -0.0042,0.6287 -0.449645,1.7644 -1.728516,3.9375 -0.134804,0.229 -0.540747,0.7197 -1.09375,1.291 -0.553002,0.5713 -1.25992,1.2467 -2.039062,1.9492 -1.558286,1.4051 -3.407577,2.9237 -4.896485,3.9746 -0.710582,0.5015 -1.512135,1.2004 -1.912109,1.709 -0.137565,0.1748 -0.303968,0.34 -0.439453,0.4473 -0.135485,0.1072 -0.30483,0.1113 -0.117188,0.1113 -0.148422,0 -0.378847,0.053 -0.554687,0.1699 -0.175841,0.1169 -0.323026,0.2714 -0.521485,0.5039 -0.396917,0.465 -0.990821,1.2688 -2.078125,2.7559 -0.627306,0.858 -2.541352,2.9904 -4.1718752,4.6289 -0.826993,0.831 -1.5775533,1.6199 -2.1269528,2.2246 -0.2746997,0.3023 -0.4999867,0.5564 -0.6621093,0.7558 -0.081061,0.1 -0.1451689,0.1843 -0.1992188,0.2637 -0.027025,0.04 -0.050872,0.078 -0.076172,0.127 -0.0253,0.049 -0.072266,0.086 -0.072266,0.2734 0,-0.1255 0.08565,-0.1996 0.039063,-0.1601 -0.046588,0.039 -0.188658,0.1326 -0.4257812,0.2558 -0.4742464,0.2465 -1.3293296,0.6263 -2.7382813,1.2266 -0.4390605,0.187 -0.7655743,0.3547 -1.0136718,0.6328 -0.2480976,0.2781 -0.3417969,0.6539 -0.3417969,1.0058 0,0.7538 0.3734313,1.4342 1.0371093,1.7969 0.6636781,0.3627 1.5495441,0.487 2.7382813,0.4922 3.5014935,0.016 6.0806357,-0.8625 8.1757817,-2.834 0.988624,-0.9303 2.187218,-2.0004 3.158203,-2.834 0.44001,-0.3777 0.809939,-0.6838 1.113281,-0.9277 1.24e-4,0.016 0.0019,0.02 0.002,0.037 0.002,0.5714 -0.03028,1.4081 -0.0918,2.4141 -0.123029,2.0118 -0.363872,4.7023 -0.679687,7.3769 -0.327355,2.7725 -0.707122,5.9856 -0.84375,7.1407 -0.150391,1.2711 -0.175356,4.9727 -0.08008,8.4257 l 0.179687,6.4707 1.074219,0.961 c 1.095204,0.9787 2.551166,1.2278 3.757813,0.582 0.344444,-0.1844 0.666433,-0.4507 0.896484,-0.832 0.230051,-0.3813 0.37377,-0.8541 0.476562,-1.4864 0.15512,-0.954 0.168003,-2.8815 0.189454,-4.8867 0.03237,1.9282 -0.101935,2.5499 0.01172,5.1289 0.107362,2.4362 0.180631,3.8181 0.296875,4.7012 0.116244,0.8831 0.326213,1.352 0.632813,1.6895 0.667217,0.7345 1.67338,1.0487 2.632812,1.0351 0.959432,-0.014 1.928491,-0.3574 2.453125,-1.1582 0.278564,-0.4251 0.367674,-0.9885 0.449219,-2.1973 0.08154,-1.2087 0.130369,-3.0841 0.175781,-6.0976 0.04608,-3.0577 0.185836,-5.4961 0.310547,-7.5469 0.05347,0.7095 -0.07619,0.9092 0.04297,1.9551 0.37591,3.2996 0.414514,4.6387 0.193359,6.8457 -0.218733,2.183 -0.328156,3.3854 -0.267578,4.1973 0.03029,0.4059 0.10977,0.7318 0.271484,1.0058 0.161715,0.2741 0.390363,0.4589 0.617188,0.6074 1.268343,0.8312 3.031686,0.7241 4.066406,-0.3105 0.280174,-0.2801 0.507299,-0.6622 0.669922,-1.1953 0.162623,-0.5332 0.277577,-1.2289 0.373047,-2.2285 0.19094,-1.9993 0.298157,-5.2218 0.419922,-10.6953 0.04792,-2.154 0.107049,-4.209 0.166015,-5.7832 0.02948,-0.7872 0.0592,-1.4543 0.08594,-1.9512 0.02674,-0.4969 0.06148,-0.8665 0.06641,-0.8945 0.05677,-0.3235 0.407967,-1.0895 0.69336,-1.4473 0.184302,-0.2312 0.307007,-0.3104 0.353515,-0.3399 0.138756,0.1796 0.447254,1.0253 0.712891,2.4707 0.251638,1.3693 0.695895,3.3213 1.003906,4.3985 0.280394,0.9804 0.809122,3.6155 1.142578,5.748 0.341589,2.1845 0.609762,3.5211 1.029297,4.4082 0.209768,0.4436 0.474416,0.7883 0.820313,1.0078 0.345896,0.2196 0.743634,0.293 1.144531,0.293 0.671281,0 1.377035,-0.3342 1.916015,-0.7988 0.196397,-0.1692 0.370687,-0.3142 0.525391,-0.5195 0.154704,-0.2054 0.262188,-0.4646 0.316406,-0.7598 0.108438,-0.5905 0.07833,-1.3775 0.03906,-2.9629 -0.04422,-1.7851 -0.317838,-4.4662 -0.619141,-6.0547 -0.959748,-5.0601 -1.426701,-7.4246 -1.509765,-9.2422 -0.08306,-1.8176 0.205438,-3.1542 0.792968,-6.2539 0.969153,-5.113 1.43722,-7.4767 1.607422,-9.2285 0.170203,-1.7518 0.0316,-2.8542 -0.199218,-5.332 -0.11089,-1.1903 -0.05904,-2.8866 0.125,-4.0782 0.17935,-1.1613 0.39043,-2.6685 0.472656,-3.3789 0.0761,-0.6576 0.275979,-1.5223 0.34375,-1.6855 0.426096,-1.0263 2.12798,-5.8591 4.511718,-12.7715 3.722977,-10.7957 5.548726,-15.3698 9.421876,-23.6133 2.952759,-6.2846 6.606731,-15.5126 10.5,-26.5097 0.866734,-2.4482 2.660412,-6.8731 3.55664,-8.7754 0.713708,-1.515 3.263731,-8.9582 3.740234,-10.8731 0.116609,-0.4687 0.182866,-1.329 0.25,-2.5058 0.06713,-1.1769 0.115958,-2.6182 0.13086,-4.0508 0.04845,-4.6573 0.114623,-5.3343 0.78125,-7.711 1.906002,-6.7956 4.389781,-17.0406 4.833984,-20.0078 0.123582,-0.8255 0.213551,-1.2971 0.308594,-1.8203 0.134977,0.6904 0.281419,1.5185 0.474609,2.7285 0.937671,5.8727 1.280219,10.6942 1.267579,17.8418 -0.01821,10.259 -0.372846,14.0069 -2.035157,21.4551 -2.326424,10.4233 -2.376766,10.8011 -2.43164,17.6074 -0.08203,10.1695 -0.623926,14.6092 -2.326172,19.2735 -2.140685,5.8657 -3.030766,14.1831 -3.298828,30.291 -0.04227,2.5397 -0.09471,4.8892 -0.144532,6.6289 -0.02491,0.8699 -0.05012,1.5882 -0.07227,2.0976 -0.01107,0.2548 -0.01983,0.4569 -0.0293,0.5977 -0.0047,0.07 -0.01014,0.1263 -0.01367,0.1602 -0.0035,0.034 -0.0244,0.081 0.0078,-0.018 -0.07113,0.2185 -0.06583,0.3813 -0.07227,0.6465 -0.0064,0.2651 -0.0018,0.5984 0.01172,1.0019 0.02713,0.8071 0.09104,1.8885 0.185547,3.1817 0.189007,2.5864 0.49774,6.0212 0.875,9.7695 0.754519,7.4966 1.777831,16.2417 2.636718,21.9414 0.231294,1.535 0.681394,4.6862 0.998047,6.9941 0.318621,2.3222 0.885872,5.8444 1.265625,7.8575 0.187205,0.9923 0.357418,2.0032 0.480469,2.8261 0.12305,0.823 0.195312,1.501 0.195312,1.6641 0,0.3603 0.08126,1.0218 0.207032,1.9434 0.125774,0.9215 0.297895,2.0572 0.488281,3.1894 0.377179,2.2433 0.944676,6.0719 1.255859,8.4863 1.178583,9.1441 2.332128,15.6277 3.355469,18.6524 2.014148,5.9535 1.833984,4.6582 1.833984,13.7031 0,4.5517 0.108993,10.3395 0.244141,12.9063 0.237316,4.5074 0.230461,4.6099 -0.611328,8.9804 -1.072084,5.5665 -1.606699,8.8154 -1.986328,12.0801 -1.21629,10.4601 -1.286329,11.4621 -1.257813,17.8418 0.02662,5.954 0.130116,7.3295 1.041016,13.7891 0.553284,3.9234 1.144692,8.4701 1.308594,10.0625 0.166889,1.6216 0.54306,5.087 0.83789,7.707 0.294117,2.6135 0.802068,7.4652 1.126953,10.7734 0.32655,3.3253 1.088758,9.688 1.697266,14.1621 0.602617,4.4306 0.931045,7.1725 1.029297,9.0704 0.09825,1.8978 -0.02461,2.9285 -0.326172,4.041 -0.886321,3.2695 -1.358696,5.0464 -1.585938,6.2734 -0.227241,1.227 -0.197061,1.9287 -0.08594,2.8691 0.405958,3.4348 0.271722,4.0399 -1.695313,7.9278 -1.227768,2.4269 -1.941877,4.1941 -2.15625,5.4629 -0.187585,1.1102 -0.60966,2.166 -1.359374,3.3691 -1.777733,2.8527 -2.292259,3.5692 -4.384766,6.1055 -1.111484,1.3471 -2.499222,3.4161 -3.152344,4.7148 -0.303391,0.6033 -0.652695,1.2331 -0.966797,1.7539 -0.314102,0.5208 -0.615858,0.9524 -0.726562,1.0723 -0.385586,0.4175 -0.86936,1.0396 -1.140625,1.4746 -0.243359,0.3903 -0.417674,0.9798 -0.652344,1.8106 -0.23467,0.8307 -0.485906,1.854 -0.71875,2.9023 -0.465689,2.0967 -0.861328,4.2262 -0.861328,5.2598 0,0.887 0.249995,1.9492 0.605469,2.914 0.355473,0.9649 0.771782,1.8103 1.351562,2.2891 0.06472,0.053 0.283203,0.5041 0.283203,1.0722 0,0.8301 0.134597,1.5351 0.439453,2.0958 0.304857,0.5606 0.813536,0.967 1.427735,1.0898 0.422325,0.085 0.586151,0.2211 0.814453,0.7676 0.521082,1.247 1.634846,2.1269 2.865234,2.1269 0.229179,0 0.25643,0.023 0.289063,0.053 0.03263,0.03 0.121999,0.1676 0.21875,0.4941 0.207381,0.6998 0.733953,1.2963 1.361328,1.7539 0.627374,0.4576 1.364406,0.7793 2.101562,0.7793 0.563653,0 1.197292,-0.1969 1.792969,-0.457 0.595677,-0.2601 1.119932,-0.525 1.435547,-0.9922 0.133505,-0.1976 0.195879,-0.3845 0.294922,-0.6582 0.09904,-0.2737 0.202649,-0.5983 0.291016,-0.9199 0.194261,-0.7072 0.731874,-1.8594 1.267578,-2.7891 0.0077,-0.013 0.01382,-0.02 0.02148,-0.033 -0.244974,0.7453 -0.512652,1.4978 -0.570312,2.3047 -0.0819,1.146 -0.03558,2.1914 0.43164,2.9043 0.650056,0.9922 1.67416,1.6371 2.896484,1.8984 1.222325,0.2613 2.646529,0.1577 4.183594,-0.2988 1.248494,-0.3708 1.820134,-0.8144 2.683598,-2.0899 0.58666,-0.8665 1.21682,-2.1557 1.47069,-3.0371 0.21378,-0.7421 0.66068,-1.8952 0.94727,-2.457 0.38036,-0.7455 0.9372,-2.513 1.34766,-4.1406 0.40316,-1.5987 0.86397,-3.3353 1.00196,-3.7852 0.0636,-0.2073 0.0909,-0.4366 0.12304,-0.7597 0.0322,-0.3232 0.0602,-0.7199 0.082,-1.17 0.0436,-0.9001 0.065,-2.0098 0.0547,-3.1211 -0.0427,-4.5921 0.38926,-7.5951 1.21875,-9.2363 0.38483,-0.7613 1.00065,-2.3824 1.42579,-3.7148 0.67377,-2.1118 0.81032,-3.1818 1.00976,-7.9727 0.26575,-6.3847 0.62716,-8.3917 2.77344,-15.416 0.74936,-2.4526 0.6424,-4.5478 -0.4082,-8.6895 -0.5688,-2.2424 -0.6875,-3.3333 -0.6875,-6.3476 0,-4.4535 0.66689,-11.9866 1.42382,-16.1035 0.31263,-1.7006 0.67251,-3.8357 0.80469,-4.7813 0.12503,-0.8944 0.48341,-2.8547 0.78906,-4.3066 0.30938,-1.4696 0.77054,-3.8001 1.02735,-5.1934 0.25059,-1.3597 0.94715,-4.5183 1.54101,-6.9746 3.46613,-14.3368 3.95408,-17.1834 3.95508,-23.0605 4.7e-4,-2.3189 -0.13149,-5.9718 -0.29492,-8.1602 -0.72568,-9.7182 -1.0903,-14.7807 -1.13086,-17.8887 -0.0406,-3.108 0.22697,-4.2246 0.79687,-6.248 0.43586,-1.5475 1.33049,-4.1053 1.96485,-5.6152 0.65838,-1.567 1.74213,-4.5238 2.42773,-6.6192 1.42463,-4.3541 1.80268,-7.1174 1.80469,-13.1777 10e-4,-3.4026 0.14644,-8.4138 0.3457,-12.9317 0.19927,-4.5178 0.45956,-8.5814 0.66211,-9.9589 0.2302,-1.5655 0.53926,-4.4913 0.69336,-6.5469 0.32919,-4.3921 1.88207,-14.2051 3.19531,-20.1621 0.53265,-2.4161 1.29616,-6.884 1.70704,-9.9824 0.20405,-1.539 0.39992,-2.9769 0.55273,-4.0528 0.0764,-0.5379 0.14197,-0.9858 0.19141,-1.3086 0.0198,-0.1294 0.0346,-0.2224 0.0488,-0.3086 0.0719,0.016 0.0928,0.013 0.25782,0.076 0.66514,0.255 1.67173,0.2603 2.75,0.1465 1.44651,-0.1529 2.30173,-0.4846 3.85937,-1.4922 0.77598,-0.5019 1.2651,-0.7826 1.50196,-0.873 0.0332,-0.013 0.0124,-0.01 0.0332,-0.012 0.0204,0.071 0.043,0.1558 0.0703,0.2735 0.0647,0.2791 0.1426,0.6707 0.22656,1.1406 0.16793,0.9398 0.36178,2.1922 0.53711,3.5195 0.39796,3.0126 1.27446,7.4791 2.2793,11.625 2.10556,8.6875 5.18726,23.6212 5.86133,28.375 0.29093,2.0519 0.67018,5.964 0.83593,8.6426 0.16719,2.7016 0.42239,6.0341 0.57227,7.4434 0.14274,1.3423 0.26656,4.255 0.26953,6.3984 0.004,2.7736 0.18248,4.9447 0.5957,7.207 0.65395,3.5801 2.70397,9.7354 4.29493,12.8926 0.52223,1.0363 1.63492,3.6326 2.4375,5.6973 l 1.4375,3.6992 0.24023,6.916 c 0.49538,14.2567 0.78099,21.7971 1.25586,26.7871 0.47487,4.9901 1.14848,7.4411 2.38672,11.3867 2.90553,9.2588 3.24513,10.4921 4.41016,16.0977 0.82391,3.9644 3.02432,16.1869 3.80273,21.1191 1.54285,9.776 1.61723,15.9504 0.32813,20.0762 -0.95018,3.0412 -0.80458,4.9249 0.62304,8.0938 0.59959,1.3308 1.03413,2.8177 1.14844,3.8711 0.11992,1.105 0.65858,3.0975 1.2207,4.6015 0.74611,1.996 1.01452,3.193 1.16211,5.1836 0.10992,1.4826 0.30807,3.1447 0.48242,3.8613 0.14892,0.6121 0.44787,1.8726 0.66211,2.795 0.22558,0.971 0.84584,3.0366 1.39844,4.6679 0.89741,2.6492 0.99857,3.2653 1.25195,7.5703 0.19002,3.2281 0.50607,6.2123 0.90039,8.6485 0.39433,2.4362 0.84854,4.3048 1.39454,5.4062 0.3947,0.7962 0.96858,2.3158 1.23242,3.2715 0.28937,1.0481 0.77105,2.2873 1.18164,2.9356 0.8473,1.3377 2.3249,2.7099 3.60351,3.414 l -0.0254,0.086 0.40039,0.1796 c 1.23352,0.5532 2.88101,0.4595 4.32032,0.057 0.71965,-0.2014 1.38509,-0.4861 1.91992,-0.8516 0.52313,-0.3574 0.93235,-0.8083 1.0625,-1.3867 0.9212,0.8397 2.35561,0.8774 3.60742,0.5391 0.63207,-0.1709 1.2271,-0.4457 1.70313,-0.8262 0.47602,-0.3805 0.84656,-0.8867 0.91796,-1.5 0.0173,-0.149 0.0382,-0.2387 0.0508,-0.2773 -0.0122,0.013 0.17098,-0.041 0.62696,-0.041 0.77061,0 1.4514,-0.2408 1.8789,-0.7754 0.4275,-0.5345 0.57813,-1.2645 0.57813,-2.1718 0,-0.2509 0.005,-0.4252 0.0137,-0.5567 0.022,0 0.016,0 0.041,0.01 0.69576,0.1747 1.40011,-0.093 1.83008,-0.6269 0.42996,-0.5334 0.64773,-1.2858 0.66992,-2.1758 0.0251,-1.0096 0.10889,-1.6879 0.24804,-2.1016 0.13915,-0.4136 0.27956,-0.5571 0.55664,-0.6914 0.35197,-0.1706 0.6101,-0.4603 0.89454,-0.8261 0.28443,-0.3659 0.56355,-0.8091 0.79687,-1.2813 0.69364,-1.4036 0.81334,-2.0645 0.81836,-4.7031 0.008,-4.0291 -0.72163,-6.6551 -2.51563,-8.8047 -0.29703,-0.356 -0.84333,-1.2588 -1.11328,-1.8691 -0.37008,-0.8367 -1.36546,-2.4238 -2.51172,-4.1289 -1.14625,-1.7052 -2.42363,-3.481 -3.32226,-4.5586 -0.3455,-0.4143 -0.66035,-0.821 -0.88281,-1.1328 -0.11123,-0.156 -0.19846,-0.2893 -0.25196,-0.379 -0.0267,-0.045 -0.0457,-0.079 -0.0508,-0.09 -0.005,-0.011 0.0195,-0.027 0.0195,0.123 0,-0.2683 -0.0836,-0.3872 -0.16992,-0.5488 -0.0863,-0.1616 -0.19547,-0.3248 -0.32422,-0.4765 -0.0141,-0.017 -0.20998,-0.3304 -0.39062,-0.7012 -0.18064,-0.3709 -0.38264,-0.8305 -0.5586,-1.2793 -1.13965,-2.9071 -3.44304,-7.2247 -4.87109,-9.084 l -1.19336,-1.5527 -0.15234,-4.1817 c -0.16551,-4.5171 -0.683,-7.4067 -1.78711,-9.0918 -0.11546,-0.1762 -0.20625,-0.354 -0.25,-0.4668 -0.0139,-0.036 -0.0154,-0.041 -0.0195,-0.057 0.002,-0.014 0.0235,-0.039 0.0254,-0.051 0.012,-0.076 0.0124,-0.1348 0.01,-0.1933 -0.005,-0.1172 -0.0242,-0.2322 -0.0508,-0.3633 -0.0531,-0.2622 -0.14331,-0.5762 -0.25976,-0.9063 -0.26117,-0.7402 -0.42028,-2.6512 -0.35157,-5.959 0.0687,-3.3077 0.33689,-8.0498 0.8125,-14.6425 0.15663,-2.1711 0.34626,-6.1369 0.42383,-8.8418 0.23866,-8.3155 0.69958,-17.0324 1.1211,-21.2481 1.09829,-10.9848 1.31554,-21.9473 0.55273,-28.6699 -0.54688,-4.8196 -2.40853,-14.2508 -3.69336,-18.7051 -2.07183,-7.1827 -2.30733,-8.5055 -2.61914,-14.7285 -0.55101,-10.9975 0.14379,-21.4199 1.70117,-26.4316 0.29643,-0.9539 0.72653,-2.6406 0.9707,-3.8067 0.1696,-0.81 0.42188,-2.7014 0.73047,-5.2929 0.3086,-2.5916 0.6664,-5.8585 1.02539,-9.3184 0.71799,-6.9198 1.43847,-14.6102 1.75782,-19.2207 0.29792,-4.3013 0.85888,-10.2909 1.24218,-13.2715 0.8093,-6.2932 2.21042,-21.0344 2.70704,-28.4648 0.29681,-4.4411 0.27748,-5.675 -0.1504,-9.6094 -0.26814,-2.466 -0.65341,-5.5404 -0.86132,-6.8731 -0.53168,-3.4082 -0.91198,-6.6157 -1.26172,-10.6093 -0.27131,-3.0981 -0.66711,-5.2713 -1.97266,-10.8516 -0.17136,-0.7324 -0.30437,-1.7644 -0.29687,-2.0957 0.006,-0.2779 -0.0292,-0.5583 -0.0918,-0.8164 -0.0626,-0.2581 -0.13059,-0.484 -0.3125,-0.7031 -0.0197,-0.024 -0.0167,-0.022 -0.0312,-0.043 0.005,-0.05 0.0119,-0.1028 0.01,-0.1406 -0.006,-0.1145 -0.0253,-0.2257 -0.0527,-0.3594 -0.0548,-0.2674 -0.14612,-0.6094 -0.26562,-0.9883 -0.22077,-0.7 -0.44767,-1.7001 -0.48633,-2.0722 -0.0794,-0.7632 -0.33073,-2.1442 -0.60352,-3.4668 -0.27278,-1.3227 -0.53976,-2.5108 -0.74414,-3.043 -0.21014,-0.5472 -0.54338,-1.0478 -1.05273,-1.3203 -0.0942,-0.051 -0.11912,-0.072 -0.16992,-0.2129 -0.0508,-0.1404 -0.0914,-0.4058 -0.0937,-0.8086 -0.004,-0.7111 -0.12864,-1.7389 -0.29493,-2.418 -0.0161,-0.066 -0.0696,-0.4464 -0.11523,-0.957 -0.0457,-0.5107 -0.0937,-1.183 -0.14258,-1.9668 -0.0977,-1.5675 -0.19634,-3.5792 -0.26953,-5.6543 -0.34502,-9.7811 -0.74341,-12.8506 -3.33789,-25.7051 -1.94246,-9.6241 -1.71055,-17.543 0.94922,-31.875 0.51558,-2.7784 1.14724,-6.4608 1.4082,-8.209 0.0542,-0.3629 0.11056,-0.6038 0.16797,-0.9277 0.10125,1.1105 0.17169,2.0607 0.39648,3.7793 0.33853,2.588 0.76017,5.4501 1.10352,7.3262 0.7958,4.3485 2.53071,11.6567 4.09375,17.2578 0.65984,2.3644 0.72947,3.0767 0.7832,7.7109 0.0186,1.5958 0.0697,3.0345 0.14453,4.1875 0.0748,1.1531 0.16318,1.9981 0.29883,2.5156 0.59472,2.2691 3.26544,9.5782 4.27735,11.709 1.64666,3.4674 2.42126,5.4591 5.10351,13.1133 3.34464,9.5448 4.09262,11.4853 8.00586,20.752 1.72162,4.0768 3.82441,9.2314 4.66211,11.4277 0.84978,2.228 2.48559,6.1954 3.64453,8.8437 2.13597,4.8815 3.69856,8.503 4.72656,10.9512 0.51401,1.2241 0.89505,2.1559 1.14454,2.8008 0.12474,0.3224 0.21718,0.5736 0.27539,0.748 0.0582,0.1745 0.0664,0.349 0.0664,0.1993 0,0.3196 0.0982,0.5167 0.22071,0.8281 0.12252,0.3113 0.2859,0.6657 0.46875,1.0078 0.29098,0.5444 0.40395,0.7792 0.47461,1.5977 0.0707,0.8184 0.064,2.1871 0.0352,4.7578 -0.0598,5.3402 0.35837,9.4201 1.35547,13.123 0.13752,0.5107 0.29767,1.6167 0.32812,2.3242 0.017,0.3961 0.0524,0.7407 0.10352,1.0079 0.0256,0.1335 0.0486,0.2424 0.10352,0.3671 0.0275,0.062 0.0522,0.1348 0.16601,0.2344 0.0166,0.014 0.0576,0.022 0.0801,0.037 0.0173,0.032 0.034,0.061 0.0644,0.1348 0.0874,0.2123 0.19794,0.5511 0.29688,0.9375 0.2145,0.8375 0.34998,2.7168 0.34961,4.8926 -3.7e-4,2.1757 -0.12151,4.6798 -0.36328,6.9004 -0.25025,2.2981 -0.33679,4.2857 -0.26172,5.8496 0.0751,1.5638 0.25649,2.689 0.7832,3.3945 0.67089,0.8986 1.66593,1.3115 2.58203,1.2012 0.9161,-0.1103 1.74755,-0.7783 2.00977,-1.8242 0.30681,-1.2239 0.6529,-4.6291 0.74609,-7.0079 0.0272,-0.6939 0.25579,-2.1041 0.4961,-2.998 0.23615,-0.8786 0.37771,-2.3646 0.44531,-3.6367 0.0602,1.7846 0.0581,4.3677 -0.0117,9.582 -0.0753,5.6277 -0.10798,8.6045 -0.0606,10.2754 0.0237,0.8354 0.0643,1.3448 0.14453,1.7246 0.0803,0.3798 0.23651,0.6542 0.38672,0.8359 0.50684,0.6132 1.31768,0.9086 2.13477,0.9981 0.81709,0.089 1.6695,-0.023 2.28515,-0.5215 0.34474,-0.2791 0.66226,-0.6671 0.77539,-1.3223 0.11314,-0.6551 0.13416,-1.6282 0.17579,-3.4941 0.048,-2.1509 0.17468,-4.2482 0.3457,-5.9824 0.17102,-1.7342 0.39898,-3.1264 0.60742,-3.7715 0.12677,-0.3926 0.16675,-0.9641 0.19141,-1.6856 0.22522,2.8815 0.34026,5.6483 0.28125,9.7715 -0.0475,3.3171 -0.0611,5.0888 0.13086,6.2285 0.096,0.5699 0.25422,1.0007 0.50976,1.3418 0.25554,0.3412 0.58024,0.5609 0.9336,0.7715 0.62989,0.3757 1.40373,0.4372 2.14257,0.293 0.73885,-0.1442 1.45946,-0.4999 1.98438,-1.0664 0.33295,-0.3592 0.59956,-0.7594 0.69922,-1.4043 0.0996,-0.6449 0.10351,-1.5562 0.10351,-3.2676 0,-1.9595 0.15904,-4.8174 0.34571,-6.2676 0.40966,-3.1823 0.33542,-7.3289 -0.0664,-9.9843 0.59275,1.848 0.85423,3.4861 1.24805,9.1582 0.18947,2.7292 0.33771,4.3147 0.64453,5.3847 0.30682,1.0701 0.88322,1.6434 1.63672,2.0117 h 0.002 c 0.48013,0.2343 0.82089,0.3907 1.22461,0.4063 0.40372,0.016 0.75291,-0.1166 1.22656,-0.3145 0.44145,-0.1844 0.84054,-0.4004 1.16016,-0.7539 0.31962,-0.3534 0.53259,-0.8191 0.66992,-1.4257 0.27465,-1.2134 0.30574,-3.0596 0.30273,-6.3477 -0.006,-5.9211 -0.0625,-6.5397 -1.24218,-13.1875 -1.15936,-6.5336 -1.27149,-7.3287 -1.27149,-9.1191 v -0.5313 l 1.74024,1.707 c 3.20381,3.1407 5.7684,4.5772 8.74804,4.8164 1.19742,0.096 2.08716,0.043 2.76563,-0.3105 0.67847,-0.3535 1.02734,-1.0745 1.02734,-1.8828 0,-0.4412 -0.0776,-0.8817 -0.375,-1.2383 -0.29742,-0.3566 -0.71809,-0.6208 -1.4082,-1.0391 -1.69206,-1.0255 -2.80193,-2.1951 -3.62109,-3.8007 -0.37627,-0.7375 -1.23084,-1.8773 -1.99024,-2.6953 -1.78328,-1.9212 -3.62549,-4.2941 -4.47656,-5.7422 -0.29121,-0.4956 -0.87967,-1.142 -1.73828,-2 -0.85861,-0.8581 -1.9768,-1.893 -3.26563,-3.0196 -2.27817,-1.9912 -4.92909,-4.4648 -5.82422,-5.4218 -0.92302,-0.987 -1.50752,-1.7751 -2.08789,-3.0528 -0.58036,-1.2777 -1.14815,-3.0532 -1.96875,-5.9258 -0.50992,-1.785 -1.36536,-4.4914 -1.91211,-6.0488 -1.464,-4.1702 -4.31233,-13.1754 -4.91797,-15.5332 -0.53042,-2.0648 -1.12067,-5.4961 -1.68945,-9.8496 -0.54832,-4.1968 -1.43367,-10.0776 -2.5332,-16.8184 -0.60235,-3.6931 -1.47811,-9.3005 -1.94336,-12.4531 -0.46746,-3.1678 -1.10075,-6.7997 -1.43164,-8.166 -0.96779,-3.9959 -4.40041,-14.1802 -6.16016,-18.2832 -1.96628,-4.5847 -2.06376,-4.8454 -2.7539,-7.4902 -0.96712,-3.7063 -1.82209,-9.7513 -3.41016,-24.2227 -0.88965,-8.107 -1.16364,-14.5376 -1.22852,-29 -0.0629,-14.0306 -0.11503,-15.4747 -0.69531,-19.2559 -1.49855,-9.7647 -3.28894,-15.771 -5.86133,-19.2753 -1.38597,-1.8882 -4.58512,-4.5032 -8.66211,-7.1758 -3.52855,-2.3132 -4.47555,-2.7902 -9.47265,-4.7539 -6.24648,-2.4547 -16.53263,-7.5042 -27.36914,-13.4453 -2.52534,-1.3844 -4.81641,-3.4097 -5.73242,-4.9727 -0.32967,-0.5625 -0.77341,-1.9182 -1.12305,-3.4941 -0.34964,-1.576 -0.63106,-3.3987 -0.7461,-5.0118 -0.15199,-2.1312 -0.2355,-4.1424 -0.24804,-5.7148 -0.006,-0.7862 0.006,-1.4637 0.0351,-1.9863 0.0287,-0.5226 0.0877,-0.9134 0.11915,-1.0117 0.29672,-0.9271 0.37709,-1.2849 1.55078,-7.0547 l 0.71875,-3.53126 0.43164,-0.0117 c 0.77508,-0.0216 1.26095,-0.0422 1.72461,-0.22851 0.46366,-0.18635 0.80276,-0.50551 1.28906,-0.99219 0.70451,-0.70497 1.39158,-1.9587 1.97656,-3.46289 0.49098,-1.26235 1.06792,-3.26583 1.53125,-5.1543 0.46333,-1.88847 0.81445,-3.5826 0.81445,-4.45508 0,-0.80679 -0.28532,-1.91544 -0.66601,-3.00585 -0.38069,-1.09042 -0.83021,-2.10678 -1.33203,-2.70313 l -0.5625,-0.66797 0.38281,-1.07617 c 0.6453,-1.8169 1.0236,-4.75011 1.35352,-10.06445 0.3234,-5.21005 0.31564,-4.90214 0.18164,-7.75586 -0.13513,-2.87795 -0.53295,-5.34078 -1.19727,-6.58594 -0.20376,-0.38188 -0.55206,-1.17423 -0.73828,-1.68359 -0.23595,-0.64523 -0.80912,-1.62941 -1.3457,-2.36328 -4.17023,-5.70362 -6.36444,-8.05736 -8.8086,-9.3086 -0.7284,-0.37288 -1.66592,-1.01165 -1.91015,-1.2539 -0.48693,-0.48297 -1.33263,-0.88829 -2.11524,-1.10743 -0.59979,-0.16791 -1.45104,-0.66661 -1.65429,-0.88672 -1.10177,-1.19302 -2.39248,-1.69586 -4.25,-1.6875 -0.49408,0.002 -0.80798,-0.0232 -0.99805,-0.0527 -0.009,-0.0341 0.0249,-0.0462 0.008,-0.082 -0.12572,-0.26322 -0.36036,-0.31873 -0.49609,-0.33789 z m 0.4707,0.63476 c 0.006,0.0196 0.0204,0.0235 0.0234,0.0449 0.0169,0.11992 -0.025,0.22006 -0.0508,0.26171 0.0364,-0.0589 0.008,-0.20128 0.0273,-0.30664 z m -11.63672,0.24805 c -0.0668,0.096 -0.15116,0.11413 -0.14648,0.11328 0.005,-8.4e-4 0.0693,-0.005 0.16992,0.008 0.20132,0.0259 0.54137,0.11302 0.97656,0.26758 0.83217,0.29557 1.47591,0.46692 2.00391,0.4961 0.264,0.0146 0.50524,-0.003 0.73828,-0.10157 0.14149,-0.0596 0.21966,-0.21454 0.32226,-0.34179 0.0398,0.0193 0.0911,0.0335 0.26954,0.15039 0.86367,0.5659 2.07975,0.52904 3.22656,0.0625 0.0901,-0.0367 0.69314,-0.1709 1.11133,-0.20508 0.50003,-0.0408 1.29908,-0.15824 1.84961,-0.27149 0.15914,-0.0327 0.17131,-0.0283 0.26171,-0.0371 0.0365,0.0561 0.0558,0.13612 0.0957,0.16992 0.17488,0.1482 0.31573,0.16929 0.47461,0.20117 0.31775,0.0638 0.73015,0.0809 1.30468,0.0781 1.6971,-0.008 2.5586,0.33528 3.50977,1.36524 0.48132,0.52121 1.32698,0.95011 2.11914,1.17187 0.60929,0.17061 1.47271,0.64629 1.68164,0.85352 0.4516,0.44793 1.34442,1.01995 2.15625,1.43555 2.2056,1.12911 4.30854,3.33391 8.45703,9.00781 0.47694,0.6523 1.05653,1.68427 1.21485,2.11719 0.20794,0.56879 0.55022,1.34828 0.79687,1.81054 0.46038,0.86291 0.94854,3.3606 1.08008,6.16211 0.13428,2.85972 0.14187,2.43464 -0.18164,7.64649 -0.3283,5.28827 -0.72632,8.18456 -1.29688,9.79101 l -0.57422,1.61719 0.92969,1.10547 c 0.30194,0.35882 0.7934,1.36248 1.15235,2.39062 0.35895,1.02815 0.61132,2.13562 0.61132,2.67578 0,0.55319 -0.32881,2.35683 -0.78515,4.2168 -0.45634,1.85998 -1.03565,3.85548 -1.49219,5.0293 -0.55376,1.42393 -1.25558,2.62245 -1.75195,3.11914 -0.47324,0.47361 -0.70414,0.67142 -0.95313,0.77148 -0.24898,0.10007 -0.62015,0.13505 -1.38086,0.15625 l -1.22656,0.0352 -0.87695,4.30859 c -1.17358,5.76935 -1.23113,6.04205 -1.52149,6.94925 -0.10081,0.315 -0.13553,0.7068 -0.16601,1.2617 -0.0305,0.5548 -0.0435,1.2483 -0.0371,2.0488 0.0128,1.6009 0.0986,3.6276 0.25195,5.7774 0.11944,1.6747 0.4073,3.5342 0.76758,5.1582 0.36028,1.6239 0.76763,2.9868 1.23437,3.7832 1.08399,1.8496 3.45931,3.8877 6.11524,5.3437 10.86081,5.9545 21.15147,11.0114 27.48437,13.5 4.98696,1.9597 5.77532,2.3548 9.28907,4.6582 4.02445,2.6382 7.20041,5.2916 8.40429,6.9317 2.37738,3.2386 4.19016,9.1279 5.67969,18.8339 0.57601,3.7533 0.62068,5.0809 0.68359,19.1094 0.0649,14.4736 0.34087,20.9633 1.23438,29.1055 1.58901,14.48 2.43997,20.5444 3.4375,24.3672 0.69221,2.6527 0.83352,3.0439 2.80078,7.6308 1.70808,3.9826 5.17633,14.2787 6.10742,18.1231 0.30323,1.2521 0.95162,4.929 1.41602,8.0761 0.46667,3.1622 1.33987,8.7707 1.94336,12.4708 1.09839,6.7338 1.98336,12.6065 2.52929,16.7851 0.57153,4.3745 1.16281,7.8198 1.71485,9.9688 0.63994,2.4913 3.46289,11.4056 4.9414,15.6171 0.53466,1.523 1.39249,4.2347 1.89454,5.9922 0.82408,2.8848 1.39728,4.6926 2.01953,6.0625 0.62224,1.37 1.30378,2.2937 2.26758,3.3243 0.97794,1.0455 3.5997,3.4827 5.89648,5.4902 1.27577,1.1151 2.38054,2.1389 3.2168,2.9746 0.83625,0.8357 1.4159,1.5181 1.58203,1.8008 0.92648,1.5764 2.7799,3.9452 4.60742,5.914 0.69118,0.7446 1.55628,1.9302 1.83203,2.4707 0.89826,1.7608 2.17596,3.0992 3.99414,4.2012 0.67397,0.4085 1.02548,0.6651 1.1582,0.8242 0.13273,0.1592 0.14258,0.23 0.14258,0.5977 0,0.5832 -0.12037,0.8033 -0.49023,0.9961 -0.36987,0.1927 -1.10586,0.2908 -2.22266,0.2012 -2.71286,-0.2178 -5.00448,-1.4705 -8.1289,-4.5333 l -3.43946,-3.373 v 2.9102 c 0,1.8343 0.12719,2.7581 1.28711,9.2949 1.17888,6.6435 1.22072,7.0982 1.22656,13.0137 0.003,3.2787 -0.0517,5.1198 -0.27929,6.125 -0.11377,0.5025 -0.2572,0.7793 -0.43555,0.9765 -0.17835,0.1973 -0.41945,0.3399 -0.80273,0.5 -0.45091,0.1884 -0.65239,0.2461 -0.80274,0.2403 -0.15034,-0.01 -0.36637,-0.082 -0.82617,-0.3067 -0.62329,-0.3047 -0.8577,-0.4973 -1.11328,-1.3887 -0.25558,-0.8913 -0.42069,-2.4618 -0.60938,-5.1796 -0.46915,-6.7571 -0.66732,-8.0485 -1.60937,-10.5665 -0.35036,-0.9365 -0.63672,-2.226 -0.63672,-2.5546 0,-0.3007 -0.0313,-0.573 -0.10156,-0.8106 -0.0351,-0.1188 -0.0761,-0.2298 -0.15821,-0.3476 -0.0821,-0.1179 -0.25048,-0.2891 -0.51953,-0.2891 -0.23125,0 -0.44577,0.1555 -0.54297,0.2949 -0.0972,0.1395 -0.13589,0.271 -0.16601,0.4082 -0.0602,0.2745 -0.0707,0.5872 -0.0547,0.957 0.0321,0.7397 0.18328,1.6934 0.44141,2.6895 0.51311,1.9802 0.63003,7.4596 0.17578,10.9883 -0.19838,1.5411 -0.35352,4.3821 -0.35352,6.3945 0,1.7079 -0.0152,2.6194 -0.0918,3.1152 -0.0766,0.4959 -0.14397,0.5519 -0.44532,0.877 -0.35048,0.3783 -0.89185,0.6564 -1.4414,0.7637 -0.54955,0.1072 -1.0917,0.037 -1.43946,-0.1699 -0.32001,-0.1908 -0.50933,-0.3313 -0.64453,-0.5118 -0.13519,-0.1805 -0.24381,-0.4308 -0.32422,-0.9082 -0.16081,-0.9548 -0.16459,-2.736 -0.11718,-6.0488 0.0863,-6.0325 -0.049,-8.9634 -0.64844,-14.0547 -0.12261,-1.0413 -0.23933,-1.7913 -0.34961,-2.2871 -0.0551,-0.2479 -0.10152,-0.4251 -0.17969,-0.5918 -0.0391,-0.083 -0.0606,-0.1787 -0.24414,-0.2969 -0.0917,-0.059 -0.26053,-0.1087 -0.41406,-0.072 -0.15353,0.036 -0.24796,0.1273 -0.30078,0.1933 -0.10564,0.1321 -0.1183,0.2161 -0.14063,0.3028 -0.0223,0.087 -0.0381,0.174 -0.0508,0.2754 -0.0253,0.2027 -0.0408,0.4556 -0.0488,0.7714 -0.0161,0.6317 9.7e-4,1.5113 0.0547,2.6368 0.0622,1.3036 0.0809,2.3551 0.0606,3.1503 -0.0203,0.7953 -0.0926,1.3492 -0.16211,1.5645 -0.26654,0.825 -0.47827,2.2173 -0.65234,3.9824 -0.17408,1.7652 -0.29908,3.8817 -0.34766,6.0567 -0.0416,1.8634 -0.0777,2.8473 -0.16406,3.3476 -0.0864,0.5004 -0.11089,0.4662 -0.41797,0.7149 -0.28646,0.2319 -0.91752,0.3735 -1.54688,0.3046 -0.62936,-0.069 -1.22761,-0.3437 -1.47461,-0.6425 -0.0932,-0.1128 -0.12224,-0.1418 -0.17773,-0.4043 -0.0555,-0.2626 -0.1,-0.7352 -0.12305,-1.5469 -0.0461,-1.6234 -0.0147,-4.6055 0.0606,-10.2324 0.0774,-5.7807 0.10354,-8.9353 0.0117,-10.6856 -0.0459,-0.8751 -0.10692,-1.3928 -0.26172,-1.789 -0.0774,-0.1982 -0.19471,-0.3828 -0.37305,-0.5078 -0.17833,-0.1251 -0.38512,-0.1582 -0.53906,-0.1583 -0.20984,0 -0.34554,0.1215 -0.4043,0.1915 -0.0588,0.07 -0.0793,0.1189 -0.0977,0.1621 -0.0368,0.086 -0.0534,0.1522 -0.0703,0.2304 -0.0339,0.1565 -0.0584,0.3463 -0.082,0.5762 -0.0472,0.4597 -0.0811,1.0748 -0.0937,1.752 -0.0239,1.2835 -0.25891,3.1564 -0.48828,4.0097 -0.26515,0.9863 -0.49813,2.3723 -0.53125,3.2188 -0.0906,2.313 -0.48091,5.8637 -0.7168,6.8047 -0.17154,0.6842 -0.61798,1.0091 -1.1582,1.0742 -0.54022,0.065 -1.18151,-0.1656 -1.66016,-0.8067 -0.23771,-0.3184 -0.51656,-1.3597 -0.58789,-2.8457 -0.0713,-1.4859 0.0116,-3.4305 0.25782,-5.6914 0.2466,-2.2648 0.36876,-4.797 0.36914,-7.0097 3.7e-4,-2.2128 -0.10801,-4.0753 -0.38086,-5.1407 -0.10805,-0.4219 -0.2267,-0.7906 -0.3418,-1.0703 -0.0575,-0.1398 -0.10957,-0.2535 -0.18555,-0.3672 -0.0348,-0.052 -0.077,-0.1101 -0.16015,-0.1757 -0.005,-0.019 -0.005,-0.014 -0.01,-0.037 -0.0363,-0.1896 -0.0725,-0.5043 -0.0879,-0.8632 -0.0345,-0.8025 -0.18307,-1.8863 -0.35937,-2.541 -0.96742,-3.5927 -1.38147,-7.5691 -1.32227,-12.8516 0.0289,-2.5728 0.0398,-3.9415 -0.0391,-4.8555 -0.0789,-0.9139 -0.2806,-1.4074 -0.58789,-1.9824 -0.16372,-0.3064 -0.31599,-0.6352 -0.42188,-0.9043 -0.10588,-0.2691 -0.15039,-0.5484 -0.15039,-0.4609 0,-0.2525 -0.0522,-0.315 -0.11914,-0.5157 -0.0669,-0.2006 -0.16306,-0.4622 -0.29101,-0.7929 -0.25592,-0.6615 -0.63837,-1.5995 -1.1543,-2.8282 -1.03187,-2.4573 -2.5955,-6.0792 -4.73242,-10.9628 -1.15028,-2.6287 -2.78658,-6.6007 -3.625,-8.7989 -0.8505,-2.2299 -2.95018,-7.3746 -4.67578,-11.4609 -3.91158,-9.2627 -4.64114,-11.1545 -7.98438,-20.6953 -2.68427,-7.66 -3.48624,-9.7191 -5.14453,-13.211 -0.91836,-1.9338 -3.67224,-9.4778 -4.21094,-11.5332 -0.0894,-0.3411 -0.19628,-1.1977 -0.26953,-2.3261 -0.0733,-1.1285 -0.1242,-2.5533 -0.14258,-4.1348 -0.0539,-4.6449 -0.15037,-5.5682 -0.82031,-7.9687 -1.55392,-5.5685 -3.28711,-12.8776 -4.07227,-17.168 -0.33704,-1.8417 -0.75877,-4.7015 -1.0957,-7.2774 -0.33692,-2.5758 -0.58789,-4.9321 -0.58789,-5.5605 0,-0.1932 -0.0435,-0.3747 -0.15039,-0.541 -0.10688,-0.1664 -0.31569,-0.3438 -0.5957,-0.3438 -0.22617,0 -0.33959,0.1175 -0.39649,0.1797 -0.0569,0.062 -0.0806,0.1071 -0.10351,0.1504 -0.0459,0.087 -0.076,0.1675 -0.10742,0.2617 -0.0629,0.1885 -0.12434,0.428 -0.19141,0.7227 -0.13414,0.5893 -0.28123,1.387 -0.41211,2.2636 -0.25638,1.7175 -0.88894,5.4072 -1.40234,8.1739 -2.67002,14.3872 -2.91401,22.5094 -0.94727,32.2539 2.59236,12.8439 2.97402,15.7812 3.31836,25.543 0.0735,2.0835 0.17307,4.1022 0.27148,5.6816 0.0492,0.7897 0.0976,1.4691 0.14454,1.9941 0.047,0.5251 0.0813,0.8631 0.14062,1.1055 0.13543,0.5531 0.26228,1.5982 0.26563,2.1856 0.003,0.4573 0.0372,0.8191 0.15429,1.1425 0.11708,0.3235 0.3527,0.6009 0.63867,0.7539 0.0644,0.034 0.47015,0.4872 0.58985,0.7989 0.11139,0.2901 0.43003,1.5795 0.69922,2.8847 0.26919,1.3053 0.51861,2.7029 0.58789,3.3692 0.0573,0.552 0.28667,1.5063 0.52734,2.2695 0.11126,0.3527 0.19426,0.6738 0.23828,0.8887 0.0178,0.087 0.0253,0.1364 0.0293,0.1718 -0.009,0.032 -0.0461,0.07 -0.0488,0.096 -0.0197,0.1856 0.0253,0.2576 0.0566,0.33 0.0626,0.1449 0.14291,0.2563 0.24805,0.3828 -0.0131,-0.016 0.0693,0.1275 0.11133,0.3008 0.0421,0.1734 0.0663,0.3854 0.0625,0.5586 -0.0129,0.5707 0.13326,1.5379 0.32226,2.3457 1.30269,5.5681 1.68364,7.656 1.95117,10.711 0.35121,4.0103 0.73633,7.2452 1.27149,10.6757 0.20062,1.286 0.58684,4.3757 0.85351,6.8282 0.42591,3.9163 0.44235,5.0068 0.14649,9.4336 -0.49412,7.3931 -1.89847,22.1603 -2.70117,28.4023 -0.38914,3.026 -0.94857,9.0083 -1.24805,13.332 -0.31749,4.5838 -1.0367,12.2733 -1.75391,19.1856 -0.3586,3.4561 -0.71575,6.7188 -1.02343,9.3027 -0.30769,2.5839 -0.57203,4.5156 -0.7168,5.207 -0.23542,1.1243 -0.66939,2.8207 -0.94727,3.7149 -1.647,5.3001 -2.3007,15.7078 -1.74609,26.7773 0.31277,6.2424 0.58264,7.7614 2.6582,14.9571 1.25143,4.3385 3.12566,13.8284 3.66016,18.539 0.74657,6.5796 0.54027,17.5271 -0.55273,28.459 -0.42787,4.2793 -0.88782,12.9861 -1.12696,21.3184 -0.077,2.6859 -0.26736,6.6571 -0.42187,8.7988 -0.47616,6.6002 -0.74503,11.3536 -0.81446,14.6953 -0.0694,3.3417 0.0313,5.2367 0.41016,6.3106 0.10283,0.2914 0.18044,0.5728 0.2207,0.7714 0.0201,0.099 0.0298,0.1797 0.0312,0.211 7.2e-4,0.016 -0.002,0.02 0.002,-0.01 0.004,-0.028 2e-4,-0.1037 0.12109,-0.2246 h 0.002 c -0.22897,0.2272 -0.17642,0.4185 -0.16015,0.5351 0.0163,0.1167 0.0482,0.2123 0.0879,0.3145 0.0793,0.2043 0.19687,0.4251 0.3457,0.6523 0.88311,1.3478 1.45995,4.1307 1.62305,8.582 l 0.16406,4.5 1.38867,1.8067 c 1.28183,1.6689 3.6391,6.0509 4.73242,8.8398 0.18632,0.4753 0.39769,0.955 0.5918,1.3535 0.19411,0.3985 0.33515,0.6837 0.52734,0.9102 0.0776,0.091 0.15542,0.2078 0.20508,0.3008 0.0497,0.093 0.0508,0.2016 0.0508,0.076 0,0.186 0.043,0.2292 0.0723,0.293 0.0292,0.064 0.0612,0.1212 0.0996,0.1856 0.0768,0.1287 0.1756,0.2792 0.29687,0.4492 0.24255,0.34 0.56968,0.7597 0.92969,1.1914 0.85013,1.0195 2.12632,2.7905 3.25977,4.4766 1.13344,1.686 2.14549,3.3365 2.42773,3.9746 0.31695,0.7166 0.83838,1.6004 1.25977,2.1054 1.62702,1.9496 2.29074,4.2509 2.2832,8.1621 -0.005,2.6182 -0.0477,2.9118 -0.71484,4.2618 -0.20272,0.4102 -0.45256,0.8066 -0.68946,1.1113 -0.23689,0.3047 -0.49191,0.5152 -0.54101,0.539 -0.48939,0.2372 -0.86844,0.6792 -1.06836,1.2735 -0.19993,0.5943 -0.27463,1.3446 -0.30078,2.3945 -0.0183,0.7348 -0.21246,1.281 -0.44727,1.5723 -0.23481,0.2913 -0.44865,0.3755 -0.80859,0.2851 -0.16752,-0.042 -0.31081,-0.082 -0.50196,-0.08 -0.19114,0 -0.48415,0.1237 -0.61523,0.3242 -0.13108,0.2005 -0.14574,0.376 -0.16211,0.5703 -0.0164,0.1943 -0.0195,0.4193 -0.0195,0.7051 0,0.7892 -0.14724,1.2816 -0.35938,1.5468 -0.21214,0.2653 -0.5117,0.4004 -1.09765,0.4004 -0.49977,0 -0.83943,-0.024 -1.19336,0.2051 -0.17697,0.1146 -0.30582,0.3035 -0.36914,0.4766 -0.0633,0.1731 -0.086,0.3372 -0.10742,0.5215 -0.0321,0.2759 -0.21295,0.5639 -0.55078,0.8339 -0.33784,0.2701 -0.81988,0.5021 -1.33985,0.6426 -1.03994,0.2811 -2.19126,0.1571 -2.69531,-0.3164 l -1.26563,-1.1914 -0.34179,1.7051 c -0.0422,0.2112 -0.25853,0.5099 -0.66992,0.791 -0.4114,0.2811 -0.98919,0.5349 -1.625,0.7129 -1.2702,0.3555 -2.7752,0.3798 -3.63868,-0.01 -4.9e-4,-2e-4 -0.001,3e-4 -0.002,0 -3.4e-4,-10e-5 -0.002,2e-4 -0.002,0 -0.98774,-0.4436 -2.74629,-2.048 -3.54102,-3.3027 -0.27233,-0.43 -0.80102,-1.7119 -1.06445,-2.666 -0.28891,-1.0465 -0.85559,-2.5512 -1.30078,-3.4492 -0.43692,-0.8815 -0.91553,-2.7308 -1.30274,-5.1231 -0.3872,-2.3922 -0.70036,-5.3477 -0.88867,-8.5469 -0.25409,-4.3169 -0.39626,-5.156 -1.30273,-7.832 -0.54306,-1.6031 -1.16929,-3.6971 -1.37305,-4.5742 -0.21511,-0.9261 -0.51315,-2.1844 -0.66406,-2.8047 -0.12545,-0.5156 -0.34997,-2.2552 -0.45703,-3.6992 -0.15223,-2.0532 -0.45522,-3.4112 -1.22071,-5.459 -0.53172,-1.4226 -1.06668,-3.4621 -1.16406,-4.3594 -0.13207,-1.217 -0.59206,-2.7588 -1.23047,-4.1758 -1.38302,-3.0698 -1.49328,-4.4661 -0.58203,-7.3828 1.37587,-4.4035 1.25907,-10.697 -0.29297,-20.5312 -0.78399,-4.9676 -2.97758,-17.1486 -3.8125,-21.166 -1.16697,-5.615 -1.52706,-6.9333 -4.43359,-16.1953 -1.23408,-3.9325 -1.87627,-6.2468 -2.34571,-11.1797 -0.46943,-4.933 -0.75661,-12.473 -1.25195,-26.7285 l -0.24609,-7.086 -1.5,-3.8574 c -0.81284,-2.0911 -1.91088,-4.6626 -2.47657,-5.7852 -1.50872,-2.994 -3.58002,-9.2099 -4.20312,-12.6211 -0.40213,-2.2016 -0.5766,-4.2976 -0.58008,-7.0292 -0.003,-2.18 -0.12329,-5.0717 -0.27539,-6.502 -0.14494,-1.3629 -0.40194,-4.7112 -0.56836,-7.4004 -0.16782,-2.712 -0.54504,-6.614 -0.84375,-8.7207 -0.69243,-4.8834 -3.7662,-19.7457 -5.88086,-28.4707 -0.99744,-4.1154 -1.87002,-8.5691 -2.25976,-11.5195 -0.1771,-1.3408 -0.37133,-2.6038 -0.54297,-3.5645 -0.0858,-0.4803 -0.16516,-0.8842 -0.23633,-1.1914 -0.0356,-0.1536 -0.068,-0.2816 -0.10156,-0.3906 -0.0335,-0.109 -0.031,-0.1715 -0.15235,-0.332 -0.11092,-0.1468 -0.31618,-0.3028 -0.54492,-0.3399 -0.22874,-0.037 -0.43127,0.015 -0.63672,0.094 -0.41089,0.1568 -0.89844,0.4564 -1.6875,0.9668 -1.51069,0.9772 -2.06901,1.1949 -3.42187,1.3378 -0.97884,0.1034 -2.02634,0.013 -2.28516,-0.086 -0.31681,-0.1216 -0.54648,-0.209 -0.83984,-0.1934 -0.14668,0.01 -0.32424,0.062 -0.45899,0.1778 -0.13474,0.1154 -0.20542,0.264 -0.24218,0.3887 -0.0302,0.1024 -0.0315,0.138 -0.0488,0.2402 -0.0174,0.1021 -0.0393,0.2378 -0.0645,0.4023 -0.0504,0.3291 -0.11664,0.7783 -0.19335,1.3184 -0.15343,1.0802 -0.35028,2.5209 -0.55469,4.0625 -0.40608,3.0623 -1.17146,7.5399 -1.69141,9.8984 -1.32713,6.02 -2.87852,15.7894 -3.21679,20.3028 -0.1519,2.0262 -0.46277,4.9616 -0.68555,6.4765 -0.22479,1.5287 -0.47018,5.5298 -0.66992,10.0586 -0.19975,4.5289 -0.34655,9.5458 -0.34766,12.9766 -0.002,6.0203 -0.35126,8.5803 -1.75391,12.8672 -0.67505,2.0632 -1.76455,5.0297 -2.40039,6.5429 -0.65987,1.5707 -1.55151,4.1174 -2.00586,5.7305 -0.5748,2.0409 -0.87537,3.3617 -0.83398,6.5332 0.0414,3.1716 0.40902,8.2321 1.13477,17.9512 0.16022,2.1454 0.29148,5.8036 0.29101,8.084 -9.9e-4,5.8231 -0.46165,8.4976 -3.92578,22.8261 -0.59778,2.4725 -1.29432,5.6147 -1.55469,7.0274 -0.25416,1.3789 -0.71478,3.7111 -1.02148,5.168 -0.31045,1.4747 -0.66745,3.4212 -0.80078,4.375 -0.1262,0.9027 -0.4885,3.0521 -0.79883,4.7402 -0.77699,4.226 -1.43945,11.7313 -1.43945,16.2832 0,3.0424 0.13639,4.3056 0.71679,6.5937 1.03576,4.0832 1.12139,5.8674 0.42383,8.1504 -2.15298,7.0463 -2.5494,9.2531 -2.81641,15.668 -0.19896,4.7795 -0.30759,5.649 -0.96484,7.709 -0.41029,1.2859 -1.04946,2.9436 -1.36523,3.5683 -0.98093,1.9408 -1.36945,5.0419 -1.32618,9.6973 0.0102,1.092 -0.0122,2.1861 -0.0547,3.0625 -0.0212,0.4382 -0.0465,0.8215 -0.0762,1.1191 -0.0296,0.2977 -0.074,0.5277 -0.0859,0.5665 -0.16395,0.5345 -0.61037,2.227 -1.01563,3.8339 -0.39802,1.5784 -1.0192,3.4429 -1.26758,3.9297 -0.34215,0.6708 -0.77947,1.8083 -1.01757,2.6348 -0.19801,0.6874 -0.8304,2.0043 -1.337893,2.7539 -0.82877,1.2242 -0.97751,1.346 -2.14063,1.6914 -1.414136,0.42 -2.67743,0.4956 -3.689453,0.2793 -1.012023,-0.2163 -1.771144,-0.7061 -2.269531,-1.4668 -0.179306,-0.2736 -0.345623,-1.2497 -0.271485,-2.2871 0.07414,-1.0374 0.337659,-2.1691 0.705078,-2.8887 0.244924,-0.4796 0.39377,-0.7696 0.449219,-1.0898 0.02773,-0.1601 0.03276,-0.3979 -0.140625,-0.5996 -0.173388,-0.2017 -0.40132,-0.2285 -0.546875,-0.2285 -0.3241,0 -0.441972,0.1449 -0.572266,0.2636 -0.130293,0.1188 -0.250933,0.2609 -0.380859,0.4297 -0.259852,0.3377 -0.544659,0.7815 -0.828125,1.2735 -0.566931,0.9839 -1.121684,2.142 -1.363281,3.0214 -0.08089,0.2945 -0.178911,0.6007 -0.267578,0.8457 -0.08867,0.2451 -0.201551,0.4641 -0.183594,0.4375 -0.04174,0.062 -0.49874,0.4125 -1.007813,0.6348 -0.509072,0.2223 -1.102284,0.375 -1.392578,0.375 -0.420951,0 -1.016634,-0.2268 -1.511718,-0.5879 -0.495084,-0.3611 -0.880187,-0.8525 -0.992188,-1.2305 -0.115101,-0.3884 -0.235932,-0.7037 -0.501953,-0.9472 -0.266021,-0.2435 -0.673254,-0.3629 -1.013288,-0.3629 -0.734204,0 -1.504588,-0.5339 -1.892962,-1.4633 -0.303326,-0.7261 -0.841443,-1.2253 -1.541016,-1.3652 -0.330291,-0.066 -0.554559,-0.2337 -0.746093,-0.586 -0.191535,-0.3522 -0.31836,-0.8991 -0.31836,-1.6172 0,-0.7496 -0.13942,-1.423 -0.646484,-1.8417 -0.254152,-0.2099 -0.725296,-0.9871 -1.048828,-1.8653 -0.323533,-0.8781 -0.544922,-1.8805 -0.544922,-2.5683 0,-0.7442 0.378733,-2.9757 0.83789,-5.043 0.229579,-1.0336 0.47794,-2.0436 0.705079,-2.8477 0.227138,-0.804 0.475777,-1.4512 0.539062,-1.5527 0.208892,-0.335 0.699675,-0.9735 1.025391,-1.3262 0.244973,-0.2653 0.520893,-0.6873 0.849609,-1.2324 0.328716,-0.545 0.687654,-1.1934 1.003906,-1.8223 0.586169,-1.1656 1.980443,-3.2561 3.029297,-4.5273 2.100593,-2.5461 2.678727,-3.3518 4.462891,-6.2148 0.800484,-1.2846 1.28262,-2.4766 1.494141,-3.7286 0.177175,-1.0486 0.853826,-2.7905 2.0625,-5.1797 1.982321,-3.9181 2.209091,-5.0084 1.796874,-8.496 -0.107552,-0.9102 -0.135268,-1.4181 0.07813,-2.5704 0.213393,-1.1522 0.680695,-2.926 1.566406,-6.1933 0.325706,-1.2015 0.460953,-2.3914 0.359375,-4.3535 -0.101578,-1.9622 -0.431647,-4.7172 -1.035157,-9.1543 -0.606486,-4.4593 -1.369502,-10.8271 -1.693359,-14.125 -0.325484,-3.3144 -0.833698,-8.1639 -1.128906,-10.7871 -0.294474,-2.6169 -0.671864,-6.0841 -0.837891,-7.6973 -0.169014,-1.642 -0.758044,-6.1679 -1.3125,-10.0996 -0.90968,-6.4509 -1.004674,-7.7108 -1.03125,-13.6543 -0.02848,-6.3723 0.03598,-7.2653 1.251953,-17.7227 0.375991,-3.2334 0.904515,-6.4497 1.97461,-12.0058 0.842549,-4.3745 0.864474,-4.7094 0.626953,-9.2207 -0.132456,-2.5157 -0.242188,-8.3198 -0.242188,-12.8555 0,-9.0339 0.120055,-8.0917 -1.886718,-14.0234 -0.955769,-2.825 -2.136949,-9.3385 -3.3125,-18.459 -0.313687,-2.4338 -0.878875,-6.2601 -1.259766,-8.5254 -0.18867,-1.1221 -0.360327,-2.2493 -0.484375,-3.1582 -0.124048,-0.9089 -0.197266,-1.646 -0.197266,-1.8086 0,-0.3597 -0.08171,-0.9744 -0.207031,-1.8125 -0.125319,-0.8382 -0.296714,-1.8562 -0.486328,-2.8613 -0.373947,-1.9823 -0.942429,-5.51 -1.257812,-7.8086 -0.317309,-2.3127 -0.767102,-5.4622 -1,-7.0078 -0.853838,-5.6662 -1.875642,-14.4084 -2.628907,-21.8926 -0.376632,-3.7421 -0.687099,-7.1709 -0.875,-9.7422 -0.09395,-1.2856 -0.157238,-2.3586 -0.183593,-3.1426 -0.01318,-0.392 -0.01542,-0.7124 -0.0098,-0.9453 0.0057,-0.2329 0.04026,-0.411 0.02344,-0.3594 0.04057,-0.1247 0.02948,-0.1349 0.03516,-0.1894 0.0057,-0.055 0.01041,-0.1178 0.01563,-0.1953 0.01043,-0.1551 0.02194,-0.3639 0.0332,-0.6231 0.02253,-0.5183 0.04727,-1.2385 0.07227,-2.1113 0.04999,-1.7456 0.102203,-4.0995 0.144532,-6.6426 0.267539,-16.0765 1.171814,-24.3006 3.238281,-29.9629 1.749294,-4.7931 2.304417,-9.4064 2.386719,-19.6094 0.05485,-6.8028 0.08014,-6.9745 2.40625,-17.3964 1.671389,-7.4889 2.042293,-11.3898 2.060547,-21.6719 0.0127,-7.1806 -0.33414,-12.0824 -1.279297,-18.002 -0.224687,-1.4073 -0.40446,-2.4687 -0.560547,-3.2109 -0.07804,-0.3711 -0.14732,-0.661 -0.22461,-0.8906 -0.03865,-0.1148 -0.07817,-0.2139 -0.132812,-0.3125 -0.05464,-0.099 -0.114684,-0.2148 -0.302734,-0.3106 -0.188051,-0.096 -0.508298,-0.032 -0.638672,0.078 -0.130374,0.1105 -0.175107,0.2111 -0.220704,0.3106 -0.09119,0.1989 -0.152555,0.4259 -0.220703,0.7305 -0.136295,0.6092 -0.279001,1.5067 -0.458984,2.7089 -0.412212,2.7535 -2.91244,13.1223 -4.808594,19.8829 -0.676389,2.4115 -0.769803,3.3031 -0.818359,7.9707 -0.01474,1.4168 -0.06285,2.8479 -0.128906,4.0058 -0.06606,1.158 -0.166789,2.0958 -0.222657,2.3203 -0.41503,1.6679 -3.129986,9.5351 -3.673828,10.6895 -0.93092,1.976 -2.710844,6.3678 -3.595703,8.8672 -3.886296,10.9774 -7.535372,20.187 -10.46289,26.4179 -3.882337,8.2631 -5.733477,12.9042 -9.460938,23.7129 -2.382578,6.9091 -4.134195,11.8554 -4.490234,12.7129 -0.18804,0.4528 -0.329722,1.2263 -0.414063,1.9551 -0.07823,0.6759 -0.289332,2.1927 -0.466797,3.3418 -0.200902,1.3008 -0.254107,3.0203 -0.132812,4.3223 0.231728,2.4875 0.360579,3.4817 0.199218,5.1425 -0.16136,1.6609 -0.62418,4.0255 -1.59375,9.1407 -0.586102,3.0921 -0.899487,4.5381 -0.810546,6.4843 0.08894,1.9463 0.56813,4.3275 1.527343,9.3848 0.282968,1.4919 0.559312,4.1868 0.601563,5.8926 0.03927,1.5854 0.047,2.3849 -0.02148,2.7578 -0.03424,0.1865 -0.06906,0.2533 -0.132813,0.3379 -0.06376,0.085 -0.184704,0.1943 -0.380859,0.3633 -0.33498,0.2887 -1.038518,0.5566 -1.261719,0.5566 -0.287086,0 -0.463718,-0.044 -0.609375,-0.1367 -0.145658,-0.092 -0.292881,-0.2551 -0.451172,-0.5899 -0.316582,-0.6694 -0.609117,-1.9762 -0.947266,-4.1386 -0.338641,-2.1657 -0.848661,-4.7576 -1.166015,-5.8672 -0.289741,-1.0133 -0.740291,-2.9765 -0.984375,-4.3047 -0.276074,-1.5022 -0.466482,-2.3931 -0.933594,-2.957 -0.116778,-0.141 -0.26862,-0.2691 -0.462891,-0.334 -0.19427,-0.065 -0.413804,-0.05 -0.589843,0.014 -0.352079,0.127 -0.584695,0.3801 -0.84375,0.705 -0.423592,0.5312 -0.788438,1.2698 -0.898438,1.8965 -0.03676,0.2094 -0.0509,0.5077 -0.07813,1.0137 -0.02722,0.5059 -0.05633,1.1762 -0.08594,1.9668 -0.05923,1.5812 -0.119948,3.6402 -0.167969,5.7988 -0.121668,5.4692 -0.231479,8.6928 -0.416016,10.625 -0.09227,0.9661 -0.204838,1.6079 -0.333984,2.0313 -0.129146,0.4234 -0.256949,0.6163 -0.419922,0.7793 -0.627992,0.6279 -1.954724,0.7424 -2.810547,0.1816 -0.17386,-0.1139 -0.250223,-0.1837 -0.30664,-0.2793 -0.05642,-0.096 -0.109007,-0.2532 -0.132813,-0.5723 -0.04761,-0.638 0.04554,-1.8465 0.263672,-4.0234 0.226457,-2.26 0.185281,-3.735 -0.193359,-7.0586 -0.389856,-3.4219 -0.41345,-4.4267 -0.148438,-6.168 0.195177,-1.2823 0.303311,-2.3576 0.318359,-3.1406 0.0075,-0.3915 -0.0061,-0.7063 -0.05664,-0.9707 -0.02529,-0.1322 -0.0543,-0.2525 -0.134766,-0.3887 -0.08047,-0.1361 -0.285191,-0.3242 -0.539062,-0.3242 -0.263478,0 -0.387724,0.152 -0.449219,0.2324 -0.0615,0.081 -0.09083,0.1434 -0.119141,0.211 -0.05661,0.1351 -0.09814,0.2823 -0.138672,0.457 -0.08107,0.3495 -0.150351,0.8028 -0.197265,1.3028 -0.08957,0.9543 -0.300421,2.9407 -0.466797,4.4003 -0.175133,1.5365 -0.354785,6.017 -0.416016,10.0801 -0.04535,3.0092 -0.0933,4.8782 -0.171875,6.043 -0.07858,1.1647 -0.215868,1.6051 -0.289062,1.7168 -0.272987,0.4166 -0.910726,0.6968 -1.63086,0.707 -0.720133,0.01 -1.464415,-0.2527 -1.878906,-0.709 -0.191976,-0.2112 -0.275442,-0.3456 -0.380859,-1.1465 -0.105417,-0.8008 -0.181875,-2.183 -0.289063,-4.6152 -0.300979,-6.8298 -0.305604,-11.4356 -0.04102,-13.4433 0.07324,-0.5558 0.108646,-0.9583 0.09375,-1.2676 -0.0074,-0.1547 -0.0011,-0.2794 -0.115235,-0.4766 -0.05707,-0.099 -0.185481,-0.2374 -0.371094,-0.2793 -0.185612,-0.042 -0.344224,0.022 -0.435546,0.078 h -0.002 c -0.315563,0.1955 -0.350916,0.417 -0.417968,0.6485 -0.06705,0.2314 -0.103516,0.4897 -0.103516,0.7597 0,0.1747 -0.02686,0.3597 -0.0625,0.4844 -0.03564,0.1248 -0.145626,0.1723 0.01953,0.07 -0.185137,0.1146 -0.200531,0.2126 -0.228515,0.2793 -0.02799,0.067 -0.04302,0.1211 -0.05664,0.1797 -0.02724,0.1172 -0.04606,0.2489 -0.06445,0.4102 -0.03678,0.3225 -0.06732,0.7595 -0.0918,1.3125 -0.04896,1.106 -0.07422,2.6655 -0.07422,4.5703 0,3.2642 -0.05396,5.1928 -0.236328,6.3144 -0.09118,0.5609 -0.213909,0.9112 -0.347656,1.1329 -0.133747,0.2216 -0.273987,0.3376 -0.511719,0.4648 -0.832655,0.4456 -1.771965,0.31 -2.617187,-0.4453 h -0.002 l -0.751953,-0.6738 -0.167969,-6.0391 c -0.09454,-3.4264 -0.05066,-7.2422 0.07227,-8.2813 0.136659,-1.1553 0.516389,-4.3681 0.84375,-7.1406 0.318029,-2.6934 0.560988,-5.3947 0.685547,-7.4316 0.06228,-1.0185 0.09585,-1.8691 0.09375,-2.4805 -0.0011,-0.3057 -0.0098,-0.5483 -0.0332,-0.7441 -0.01171,-0.098 -0.02426,-0.1806 -0.06055,-0.2852 -0.01815,-0.052 -0.03976,-0.1131 -0.105469,-0.1953 -0.06571,-0.082 -0.221931,-0.2031 -0.416015,-0.2031 -0.274891,0 -0.261968,0.062 -0.316406,0.094 -0.05444,0.031 -0.103277,0.063 -0.160157,0.1035 -0.113759,0.08 -0.25261,0.187 -0.417968,0.3184 -0.330717,0.2628 -0.76424,0.6248 -1.25586,1.0469 -0.98324,0.8441 -2.189708,1.9207 -3.193359,2.8652 -1.910453,1.7977 -4.1488562,2.5779 -7.4863284,2.5625 -1.1119871,0 -1.8641291,-0.1508 -2.2636719,-0.3691 -0.3995429,-0.2184 -0.515625,-0.4273 -0.515625,-0.92 0,-0.225 0.018507,-0.262 0.087891,-0.3398 0.069384,-0.078 0.2668891,-0.2102 0.6582031,-0.377 1.4141863,-0.6025 2.2733804,-0.9816 2.8085938,-1.2597 0.2676067,-0.1391 0.4558147,-0.2492 0.6113281,-0.3809 0.1555134,-0.1316 0.3144531,-0.3459 0.3144531,-0.6035 0,0.1682 -0.034279,0.1763 -0.039063,0.1856 -0.00478,0.01 6.869e-4,0 0.013672,-0.024 0.02597,-0.038 0.079589,-0.1082 0.1503906,-0.1953 0.1416026,-0.1742 0.3576648,-0.4206 0.625,-0.7148 0.5346704,-0.5885 1.2778814,-1.3677 2.0957036,-2.1895 1.659106,-1.6672 3.543299,-3.7527 4.269531,-4.7461 1.08598,-1.4852 1.686806,-2.2938 2.03125,-2.6973 0.172222,-0.2017 0.281807,-0.2973 0.316406,-0.3203 v 0 c 0.38446,0 0.528034,-0.1633 0.736328,-0.3281 0.208295,-0.1649 0.418255,-0.3754 0.605469,-0.6133 0.24959,-0.3174 1.074135,-1.0659 1.703125,-1.5098 1.540603,-1.0873 3.406164,-2.6205 4.990235,-4.0488 0.792035,-0.7142 1.512317,-1.4015 2.08789,-1.9961 0.575573,-0.5947 0.999035,-1.0754 1.236328,-1.4785 1.300263,-2.2094 1.860309,-3.4126 1.867188,-4.4395 0.0036,-0.5278 0.393653,-2.2561 1.945312,-7.9355 0.294585,-1.0782 0.792668,-2.8988 1.105469,-4.045 0.320583,-1.1748 0.766467,-3.2095 1.003906,-4.5781 0.224431,-1.2935 0.845266,-3.5886 1.355469,-4.998 1.538044,-4.249 2.341796,-8.1704 4.525391,-21.9981 1.507514,-9.5464 2.317168,-14.1969 3.0625,-17.6152 0.373347,-1.7122 1.070878,-5.3613 1.55664,-8.1406 0.821062,-4.6977 2.402908,-10.8885 3.658203,-14.3379 0.311114,-0.8549 1.042736,-2.9307 1.63086,-4.627 0.582074,-1.6787 1.445753,-3.8936 1.888672,-4.8554 2.428222,-5.2729 3.409576,-9.3237 4.291015,-17.6602 0.325216,-3.0758 0.901285,-8.1174 1.279297,-11.1934 1.914653,-15.5794 1.956538,-16.1802 1.88086,-26.8066 -0.109625,-15.3929 0.36154,-20.9186 2.615234,-30.6895 0.648067,-2.8097 1.31819,-5.2738 1.953125,-7.2226 0.634934,-1.9488 1.251491,-3.3944 1.716797,-4.0918 1.949077,-2.9212 4.575732,-4.9414 8.480468,-6.4902 2.172427,-0.8618 3.17648,-1.3736 5.929688,-3.0196 0.777471,-0.4648 2.723793,-1.3518 4.208984,-1.9043 6.574415,-2.4453 21.834204,-9.7642 25.914064,-12.455 2.74373,-1.8095 4.54938,-3.5401 5.25,-5.2168 0.35043,-0.8388 0.64458,-2.3145 0.89843,-4.1192 0.25385,-1.8047 0.44735,-3.9067 0.51954,-5.8672 0.0627,-1.7029 0.0922,-2.6181 -0.002,-3.3808 -0.0942,-0.7627 -0.31777,-1.3281 -0.70312,-2.2285 -1.68046,-3.9264 -2.58658,-7.1245 -3.49219,-12.34378 -0.23368,-1.34683 -0.36827,-2.09099 -0.54883,-2.58789 -0.0903,-0.24846 -0.19906,-0.46087 -0.40039,-0.61914 -0.20133,-0.15828 -0.45225,-0.19532 -0.62891,-0.19532 0.10111,0 0.0358,0.004 -0.0352,-0.0234 -0.0709,-0.0277 -0.17352,-0.076 -0.29102,-0.13671 -0.23498,-0.12154 -0.53036,-0.29593 -0.81054,-0.48633 -0.57047,-0.38765 -1.30106,-1.3839 -1.96094,-2.80469 -0.65989,-1.42079 -1.27278,-3.25939 -1.75391,-5.33789 -0.83186,-3.59392 -0.88603,-4.81444 -0.32031,-6.98633 0.42948,-1.64897 0.59789,-1.9418 1.60742,-2.76172 0.30499,-0.24773 0.56577,-0.51882 0.66797,-0.89453 0.1022,-0.3757 0.052,-0.74296 -0.0332,-1.25781 -0.0557,-0.33682 -0.13489,-0.69064 -0.21875,-1.00195 -0.0839,-0.31132 -0.15795,-0.56069 -0.26953,-0.77344 0.0497,0.0946 -0.028,-0.10132 -0.0703,-0.32617 -0.0423,-0.22486 -0.0914,-0.53404 -0.14062,-0.89649 -0.0983,-0.72489 -0.20211,-1.6687 -0.28516,-2.64844 -0.0845,-0.99669 -0.19385,-1.97105 -0.30468,-2.74609 -0.0554,-0.38752 -0.11027,-0.724 -0.16407,-0.99414 -0.0538,-0.27014 -0.0834,-0.44263 -0.17969,-0.64258 -0.0835,-0.17342 -0.15891,-1.16183 0.0606,-3.08789 0.10095,-0.88633 0.15669,-1.58912 0.16406,-2.10156 0.004,-0.25622 -0.004,-0.46325 -0.0312,-0.64453 -0.0137,-0.0906 -0.0291,-0.17423 -0.0723,-0.27539 -0.0432,-0.10116 -0.12327,-0.26462 -0.35352,-0.34375 0.10749,0.0369 0.11806,0.096 0.10547,0.0644 -0.0126,-0.0315 -0.0327,-0.11701 -0.0332,-0.20703 -5.5e-4,-0.09 0.0161,-0.18566 0.0352,-0.24023 0.0191,-0.0546 0.0411,-0.0507 -0.0156,-0.0156 0.23004,-0.14218 0.25014,-0.26095 0.30664,-0.38281 0.0565,-0.12187 0.10237,-0.25526 0.14648,-0.40625 0.0882,-0.30199 0.16479,-0.67019 0.21485,-1.0586 0.0443,-0.3436 0.11498,-0.7164 0.18945,-1.02539 0.0745,-0.30898 0.17363,-0.58041 0.18946,-0.60937 0.2302,-0.42132 0.32617,-0.96262 0.32617,-1.46875 0,-0.0413 0.0751,-0.38981 0.22461,-0.75586 0.1495,-0.36606 0.36238,-0.78768 0.58984,-1.1543 0.49416,-0.79653 1.2982,-2.15237 1.79883,-3.03125 0.77147,-1.35427 3.20945,-4.52559 5.63867,-7.28906 0.56066,-0.6378 1.44053,-1.42437 2.27148,-2.0625 0.83096,-0.63813 1.69801,-1.13481 1.91211,-1.18945 0.22488,-0.0574 0.42715,-0.14274 0.60157,-0.25977 0.0952,-0.0639 0.1402,-0.23994 0.22265,-0.35351 0.20462,0.0289 0.37332,0.0162 0.59571,-0.01 0.24425,-0.0285 0.5201,-0.0763 0.7832,-0.13867 0.36777,-0.0871 0.65242,-0.1601 0.90039,-0.4043 0.12398,-0.1221 0.21714,-0.3027 0.24414,-0.47461 0.0229,-0.14588 -1e-4,-0.27168 -0.0273,-0.39453 0.0766,-0.028 0.30226,-0.10132 0.79882,-0.17578 0.79238,-0.11883 1.80479,-0.37499 2.39844,-0.62305 0.22146,-0.0925 0.45857,-0.16047 0.63281,-0.1914 0.0871,-0.0155 0.15845,-0.0219 0.19336,-0.0215 0.0349,4.4e-4 0.0313,0.0281 -0.0742,-0.0371 0.2469,0.15263 0.48122,0.1341 0.68555,0.0879 0.20434,-0.0462 0.39634,-0.13843 0.56836,-0.28125 -0.063,0.0523 0.17503,-0.0772 0.45703,-0.13672 0.282,-0.0595 0.63788,-0.10463 0.97656,-0.11523 0.39862,-0.0125 0.78203,-0.0575 1.09961,-0.125 0.1588,-0.0338 0.30009,-0.0711 0.43165,-0.12305 0.13155,-0.0519 0.26214,-0.0822 0.41015,-0.29492 z m 4.27344,0.2207 c 0.001,-0.003 -0.0177,0.058 -0.0957,0.11329 -0.006,0.004 -0.009,2.4e-4 -0.0156,0.004 0.0278,-0.0483 0.094,-0.0652 0.11133,-0.11719 z m -15.16406,2.94336 c 0,0.11019 -0.0905,0.2367 -0.15235,0.27149 -0.0148,0.008 -0.0106,0.002 -0.0215,0.006 0.0623,-0.0925 0.17383,-0.10623 0.17383,-0.27735 z m 72.44336,280.69925 c -0.0125,0.015 -0.006,0.029 -0.0215,0.043 -0.10417,0.095 -0.23874,0.1231 -0.31445,0.1231 0.13051,0 0.24848,-0.087 0.33594,-0.166 z m 37.48828,57.2578 c 0.003,4e-4 0.003,0 0.006,0 -0.10562,-0.01 -0.23265,0.01 -0.32422,0.062 0.0748,-0.046 0.20454,-0.081 0.31836,-0.064 z" style="color:#000000;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:medium;line-height:normal;font-family:sans-serif;text-indent:0;text-align:start;text-decoration:none;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000000;letter-spacing:normal;word-spacing:normal;text-transform:none;writing-mode:lr-tb;direction:ltr;baseline-shift:baseline;text-anchor:start;white-space:normal;clip-rule:nonzero;display:inline;overflow:visible;visibility:visible;opacity:1;isolation:auto;mix-blend-mode:normal;color-interpolation:sRGB;color-interpolation-filters:linearRGB;solid-color:#000000;solid-opacity:1;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:1;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1;color-rendering:auto;image-rendering:auto;shape-rendering:auto;text-rendering:auto;enable-background:accumulate" sodipodi:nodetypes="ccccccccccccsccccccccccccccccccccccsccccscccccccccccccccccccccccscccccccsccccccccccccccsscscccccsccccccsccccccccccccsccccssscccccsccccccsccssccccscccccccccscscccccsccscccccccsccccccccccscccccccccccccccccsccccsccccscccccccccccsccccccsccccsccscccsccssscccccccsccccccccccccccsccccccccscsccccccccccccccccccccccccccccccccccccccscccccccccccccccscscccccccccccccccccccccccccccccccccccsscccsccsccccccscccssccscccccccccccccccccsccccccccccccccccccccscccsccccccccccccscccccccccsccccccccccccscccssccccccccccccccccccsccccccccscccccccccsscccccccccccccccccccccccccccccccccccccccccscccccccccscccccccccsccccscccsscsccccccccccccccccsccccsccccccccccsccscccccscccccccccccccccccccsccccccsccccccccccccccccccccccccccccccccccccccccccscscsccccccccccccccccccccccccccccccccscccccsccsccccccccccccccsccccccccccccccccsccscscsccccccccccccccccccccccccccsccccccccccccscccccccccccccccccccccccccccccccccsccccccccccccccscccccsccccccssscsscccsccsccccccccccccsccccccccccscccssccccscccccccccccccccccccccccscccccccccccccsscccsccccccccccccscsccccscccccscccccscscccccccccccscccscssccccccccccccccscccccccscccccccccccccccccccccccccsccccsccsssccccccscsccccccccccccccccccccsccccsccccccccccscccccccccccccccccccccccccccccccccccccccccccccc" />
				</g>
				<path  d="m 685.29415,36.185497 c 189.70589,7.3529 0,0 189.70589,7.3529 l -17.6471,170.588203 -11.7647,60.2942 1.4706,48.63697 -113.60295,11.15156 -11.39704,-34.78853 -5.88235,-100 z" data-id="49" class="body-part clickable leg" inkscape:connector-curvature="0" sodipodi:nodetypes="ccccccccc" data-target="body-part" data-body-part="Paha Kanan" id="no_14_belakang" style="' . $isiWarna['no_14_belakang'] . '" />
				<path  d="M 502.41745,320.21365 501.47058,256.7737 491.17646,224.4208 463.23528,42.0678 h 189.7059 L 625,206.7737 v 85.2941 l -5.88236,22.0588 -5.64182,18.66139 c -111.05837,-12.57434 0,0 -111.05837,-12.57434 z" data-id="49" class="body-part clickable leg" inkscape:connector-curvature="0" sodipodi:nodetypes="cccccccccc" data-target="body-part" data-body-part="Paha Kiri" id="no_16_belakang" style="' . $isiWarna['no_16_belakang'] . '" />
				<path  d="m 746.46763,-727.40678 c 32.32545,109.29682 101.58119,121.74115 101.82019,132.58159 0,0 -0.42888,19.25066 -0.25935,29.64973 0.50016,30.67897 3.18581,30.87233 1.71923,60.18446 l -0.9609,-15.44176 -16.4339,99.26527 -341.99681,0.23424 -8.00316,-85.52835 1.20856,-58.75487 0.95064,-31.86019 c 38.87737,-27.52804 84.59495,-64.94776 96.69355,-130.94191 0,0 13.51463,4.19342 31.60355,7.50424 6.49948,1.1896 13.58952,3.11427 20.85538,3.49836 19.75727,1.04441 39.53354,1.8062 65.17753,-3.16367 5.45369,-1.05694 10.21441,-0.4681 18.66343,-1.7234 12.7726,-1.89767 28.96206,-5.50374 28.96206,-5.50374 z" data-id="31" class="body-part clickable chest" inkscape:connector-curvature="0" sodipodi:nodetypes="cssccccccccssssc" data-target="body-part" data-body-part="Dada" id="no_10_belakang" style="' . $isiWarna['no_10_belakang'] . '" />
				<path  d="m 581.13467,-869.01948 c 76.19797,48.94309 94.54289,51.58448 164.70583,-5.8824 0,0 56.70627,34.99993 86.50193,49.61488 6.77202,3.32171 13.60995,6.5116 20.52487,9.54752 -36.78054,45.48359 -61.584,77.54404 -106.39967,88.3327 -60.12135,14.47326 -105.60521,17.69056 -165.26195,-0.61179 -43.37961,-13.30862 -56.28107,-38.46565 -97.12983,-88.05971 l 18.91024,-10.31468 z" data-id="31" class="body-part clickable chest" inkscape:connector-curvature="0" sodipodi:nodetypes="csscssccc" data-target="body-part" data-body-part="Lingkaran Rantai" id="no_1_belakang" style="' . $isiWarna['no_1_belakang'] . '" />
				<path  d="m 484.07585,-816.07828 c 40.77973,48.7476 63.05606,74.51046 97.12983,88.05971 0,0 -6.8407,48.56412 -40.26574,89.72658 -7.74062,9.53247 -39.00561,39.57688 -54.13535,40.70702 -12.07612,0.90204 -47.53076,-5.01422 -69.27723,-13.78938 -18.2751,-7.37439 -24.58754,-10.85118 -31.60422,-16.78192 -0.35203,-76.6329 20.16225,-141.31463 27.56355,-147.98156 13.67412,-12.31735 38.22116,-26.93891 70.58916,-39.94045 z" data-id="31" class="body-part clickable chest" inkscape:connector-curvature="0" sodipodi:nodetypes="ccssscsc" data-target="body-part" data-body-part="Pundak Kiri" id="no_6_belakang" style="' . $isiWarna['no_6_belakang'] . '" />
				<path  d="m 843.59743,-815.46648 c -40.7797,48.7476 -63.0561,74.5105 -97.1298,88.0597 0,0 6.8407,48.5641 40.2657,89.7266 7.7406,9.5325 39.0056,39.5769 54.1354,40.707 12.0761,0.9021 47.5307,-5.0142 69.2772,-13.7894 18.2751,-7.3744 37.62121,-11.86492 39.18692,-20.91793 2.06322,-11.92968 -1.01452,-19.53264 -0.72927,-25.44621 0.55322,-11.46843 1.64572,-16.58298 -0.54568,-34.5802 -1.79837,-14.76936 -10.54909,-53.84472 -16.11158,-64.73467 -6.42986,-12.58803 -15.5856,-23.42906 -17.75969,-25.28843 -16.38292,-14.01128 -76.40543,-44.61211 -70.5892,-33.73646 z" data-id="31" class="body-part clickable chest" inkscape:connector-curvature="0" sodipodi:nodetypes="ccssssssssc" data-target="body-part" data-body-part="Pundak Kanan" id="no_2_belakang" style="' . $isiWarna['no_2_belakang'] . '" />
				<path  d="m 447.12506,-338.03841 -36.83094,85.98864 -63.84444,165.06267 -56.74379,-31.23917 16.17646,-73.5294 26.47058,-145.58829 8.41063,-36.0217 c 106.3615,35.32725 0,0 106.3615,35.32725 z" data-id="48" class="body-part clickable arm" inkscape:connector-curvature="0" sodipodi:nodetypes="cccccccc" data-target="body-part" data-body-part="Tangan Hasta Kiri" id="no_8_belakang"  style="' . $isiWarna['no_8_belakang'] . '" />
				<path  d="m 992.23409,-68.61869 68.00001,-6.81913 -41.8833,-116.50887 -19.56256,-145.95886 c -102.37505,31.32252 0,0 -102.37505,31.32252 z" data-id="48" class="body-part clickable arm" inkscape:connector-curvature="0" sodipodi:nodetypes="cccccc" data-body-part="Tangan Hasta Kanan" data-target="body-part" id="no_4_belakang" style="' . $isiWarna['no_4_belakang'] . '" />

				<!-- text -->
				<text x="645.62134" y="-845.9132"  style="' . $styleAngka . '" >0</text>
				<text x="645.62134" y="-755.9132"  style="' . $styleAngka . '" >1</text>
				<text x="635.62134" y="-555.9132"  style="' . $styleAngka . '" >10</text>
				<text x="635.62134" y="-335.9132"  style="' . $styleAngka . '" >11</text>
				<text x="635.62134" y="-175.9132"  style="' . $styleAngka . '" >12</text>
				<text x="635.62134" y="-20.9132"  style="' . $styleAngka . '" >13</text>
				<text x="535.62134" y="200.9132"  style="' . $styleAngka . '" >16</text>
				<text x="755.62134" y="200.9132"  style="' . $styleAngka . '" >14</text>
				<text x="785.62134" y="550.9132"  style="' . $styleAngka . '" >15</text>
				<text x="515.62134" y="550.9132"  style="' . $styleAngka . '" >17</text>
				<text x="455.62134" y="-685.9132"  style="' . $styleAngka . '" >6</text>
				<text x="845.62134" y="-685.9132"  style="' . $styleAngka . '" >2</text>
				<text x="405.62134" y="-435.9132"  style="' . $styleAngka . '" >7</text>
				<text x="895.62134" y="-435.9132"  style="' . $styleAngka . '" >3</text>
				<text x="965.62134" y="-175.9132"  style="' . $styleAngka . '" >4</text>
				<text x="335.62134" y="-175.9132"  style="' . $styleAngka . '" >8</text>
				<text x="275.62134" y="0.9132"  style="' . $styleAngka . '" >9</text>
				<text x="1025.62134" y="0.9132"  style="' . $styleAngka . '" >5</text>
				<text x="525.62134" y="1040.9132"  style="' . $styleAngka . '"  style="font-size:60px">BELAKANG</text>
				<!-- text END -->

				<!-- arrow -->
				<path id="ngabahBlakang" d="m 418.36317,698.60006 -2.21139,2.39196 -2.06554,2.46783 -1.94889,2.5285 -1.8166,2.61299 -1.66501,2.66837 -1.53476,2.72051 -1.37739,2.75547 -1.23362,2.79894 -1.06268,2.82535 -0.91314,2.8484 -0.76933,2.89192 -0.59469,2.8655 -0.45297,2.87668 -0.27626,2.88256 -0.0938,2.86798 0.0594,2.83826 0.22052,2.8204 0.38736,2.78207 0.54063,2.75235 0.71324,2.69355 0.86445,2.63148 1.02349,2.58126 1.17469,2.51915 1.32391,2.42477 1.48868,2.35409 1.63787,2.25963 1.75419,2.2029 1.91487,2.06751 2.02913,1.97837 2.17051,1.87207 2.26917,1.75916 2.39495,1.62913 2.50139,1.5281 2.6058,1.39472 2.71024,1.26139 2.7797,1.13333 2.88409,0.99992 2.94581,0.86003 3.02883,0.72334 3.06915,0.58013 3.13083,0.44018 3.19252,0.30021 3.20367,0.1418 c 17.35672,-0.38955 15.65282,22.86463 0.28552,23.38136 l -2.25373,0.0474 -2.25783,-0.0172 -2.24836,-0.0905 -2.22906,-0.11961 -2.22531,-0.17238 -2.20805,-0.23378 -2.18874,-0.26286 -2.18499,-0.31557 -2.15997,-0.36502 -2.12127,-0.42325 -2.13113,-0.46747 -2.10605,-0.51697 -2.05961,-0.56319 -2.06944,-0.60741 -2.00369,-0.68268 -2.01148,-0.69455 -1.96504,-0.74078 -1.94776,-0.80216 -1.90911,-0.86026 -1.86845,-0.88601 -1.86471,-0.93881 -1.81046,-0.97315 -1.764,-1.01935 -1.73896,-1.0689 -1.70606,-1.10652 -1.65961,-1.15272 -1.62672,-1.19037 -1.59384,-1.22798 -1.5396,-1.26233 -1.49312,-1.30852 -1.47383,-1.3376 -1.41384,-1.3924 -1.36532,-1.40627 -1.31888,-1.45246 -1.27819,-1.47822 -1.23175,-1.52446 -1.19106,-1.55021 -1.13682,-1.58455 -1.07474,-1.60698 -1.02833,-1.6532 -0.98563,-1.64661 -0.91976,-1.72188 -0.8906,-1.70673 -0.80928,-1.75822 -0.78215,-1.77537 -0.72011,-1.79787 -0.66379,-1.7998 -0.60382,-1.85467 -0.56885,-1.85991 -0.49902,-1.87049 -0.43698,-1.89298 -0.38845,-1.9068 -0.31864,-1.91744 -0.29928,-1.94645 -0.22164,-1.94513 -0.15958,-1.96762 -0.0897,-1.97819 -0.0548,-1.98349 0.001,-1.98548 0.0578,-1.98748 0.11984,-2.0099 0.18393,-2.00003 0.24019,-2.00206 0.28873,-2.0159 0.33888,-1.99747 0.40908,-2.00803 0.45182,-2.00144 0.51387,-2.02388 0.55866,-1.98494 0.62851,-1.99555 0.67125,-1.98892 0.74312,-1.96718 0.77807,-1.97246 0.8364,-1.94212 0.90626,-1.95268 0.93543,-1.93752 0.99376,-1.90717 1.04429,-1.8887 1.10059,-1.89068 1.13754,-1.86365 1.1881,-1.84517 1.2522,-1.83528 1.27558,-1.79965 1.3475,-1.77789 1.37666,-1.7627 1.42144,-1.72377 1.48553,-1.7139 1.48757,-1.68154 1.55948,-1.65978 -16.59851,-11.6771 58.06224,-19.07848 -5.63025,55.98966 z" style="fill:none;fill-opacity:1;fill-rule:evenodd;stroke:#008000;stroke-width:4.32825279;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:1.23749995" inkscape:connector-curvature="0" sodipodi:nodetypes="cccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc" inkscape:label="#path5075" />
				<!-- arrow END -->
			</g>
		</svg>
		<!-- BELAKANG END -->';
    $gabung .=  '
						
			<style>
				.angkanya {
					fill: green;
					font-style: normal;
					font-weight: 600;
					font-size: 57.5px;
					line-height: 1.25;
					font-family: arial;
					letter-spacing: 0px;
					word-spacing: 0px;
					fill-opacity: 1;
					stroke: none;
					stroke-width: 0.9375;
				}

				.body-part:hover {
					cursor: pointer;
				}
				.clickable{					
					stroke: green!important;
					stroke-width: 4.9375!important;
				}
			</style>
		';

    $gabung__ = '
		<svg height="210" width="500">
		  <polygon points="100,10 40,198 190,78 10,78 160,198" style="fill:lime;"/>
		  Sorry, your browser does not support inline SVG.
		</svg>
		';
    echo $gabung; ?>
    <hr>
    <h5>Keterangan :</h5>
    <img src="<?= Url::to('@web/img/ket_body_discomfort.jpg') ?>" style="width:320px">

</div>












<!-- page 3 -->
<div class="row" style="height:800px">

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


                                <?php if ($data_pelayanan->kode_debitur == "0129") { ?>
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
                            <td style="width:37%">-</td>
                            <td style="width:37%">-</td>
                        </tr>
                        <tr>
                            <td style="width:25%">b. Kelopak Mata</td>
                            <td style="width:1%">:</td>
                            <td style="width:37%">-</td>
                            <td style="width:37%">-</td>
                        </tr>
                        <tr>
                            <td style="width:25%">c. Konjungtiva</td>
                            <td style="width:1%">:</td>
                            <td style="width:37%">-</td>
                            <td style="width:37%">-</td>
                        </tr>
                        <tr>
                            <td style="width:25%">d. Kesegarisan</td>
                            <td style="width:1%">:</td>
                            <td style="width:37%">-</td>
                            <td style="width:37%">-</td>
                        </tr>
                        <tr>
                            <td style="width:25%">e. Sklera</td>
                            <td style="width:1%">:</td>
                            <td style="width:37%">-</td>
                            <td style="width:37%">-</td>
                        </tr>
                        <tr>
                            <td style="width:25%">f. Lensa Mata</td>
                            <td style="width:1%">:</td>
                            <td style="width:37%">-</td>
                            <td style="width:37%">-</td>
                        </tr>
                        <tr>
                            <td style="width:25%">g. Kornea</td>
                            <td style="width:1%">:</td>
                            <td style="width:37%">-</td>
                            <td style="width:37%">-</td>
                        </tr>
                        <tr>
                            <td style="width:25%">h. Bulu Mata</td>
                            <td style="width:1%">:</td>
                            <td style="width:37%">-</td>
                            <td style="width:37%">-</td>
                        </tr>
                        <tr>
                            <td style="width:25%">i. Tekanan Bola Mata</td>
                            <td style="width:1%">:</td>
                            <td style="width:37%">-</td>
                            <td style="width:37%">-</td>
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
                            <td style="width:37%">-</td>
                            <td style="width:37%">-</td>
                        </tr>
                        <tr>
                            <td style="width:25%"> - Dengan Koreksi</td>
                            <td style="width:1%">:</td>
                            <td style="width:37%">-</td>
                            <td style="width:37%"></td>
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
                            <td style="width:65%"><?= $data_pelayanan['tanggal_pemeriksaan'] ?? '-' ?></td>
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
                        <tr>
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
                <td style="width:32%">
                    <p>10. Gigi geligi</p>
                </td>
                <td style="width:1%">:</td>
                <td style="width:67%;">
                    <?= $pemeriksaan_fisik['gigi'] ?>
                </td>
            </tr>
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
                <td style="width:72%"><?= $data_pelayanan['tanggal_pemeriksaan'] ?? '-' ?></td>
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
                <td style="width:26%">a. Palpasi Paru</td>
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
                <td style="width:26%">b. Perkusi Paru</td>
                <td style="width:1%">:</td>
                <td style="width:36.5%"><?= $pemeriksaan_fisik['paru_jantung_perkusi_kiri'] ?? '-' ?></td>
                <td style="width:36.5%"><?= $pemeriksaan_fisik['paru_jantung_perkusi_kiri'] ?? '-' ?></td>
            </tr>
            
           	<tr>
                <td style="width:26%">c . Auskultasi</td>
                <td style="width:1%"></td>
                <td style="width:36.5%"></td>
                <td style="width:36.5%"></td>
            </tr>
            <tr>
                <td style="width:26%">- Bunyi nafas tambahan</td>
                <td style="width:1%">:</td>
                <td style="width:36.5%"><?= $pemeriksaan_fisik['paru_jantung_auskultasi_bunyi_nafas_tambah_kanan'] ?? '-' ?></td>
                <td style="width:36.5%"><?= $pemeriksaan_fisik['paru_jantung_auskultasi_bunyi_nafas_tambah_kiri'] ?? '-' ?></td>

            </tr>
       
            <tr>
                <td style="width:26%">- Bunyi Nafas</td>
                <td style="width:1%">:</td>
                <td style="width:36.5%"><?= $pemeriksaan_fisik['paru_jantung_auskultasi_bunyi_nafas_kanan'] ?? '-' ?></td>
                <td style="width:36.5%"><?= $pemeriksaan_fisik['paru_jantung_auskultasi_bunyi_nafas_kiri'] ?? '-' ?></td>
            </tr>
       
          
         
            <tr>
                <td style="width:26%">d. Jantung</td>
                <td style="width:1%">:</td>
                <td style="width:36.5%"></td>
                <td style="width:36.5%"></td>
            </tr>
            <tr>
                <td style="width:26%">- Iktus Kordis</td>
                <td style="width:1%">:</td>
                <td style="width:36.5%"><?= $pemeriksaan_fisik['paru_jantung_perkusi_iktus_kanan'] ?? '-' ?></td>
            </tr>
            <tr>
                <td style="width:26%">- Batas Jantung</td>
                <td style="width:1%">:</td>
                <td style="width:36.5%"><?= $pemeriksaan_fisik['paru_jantung_perkusi_batas_jantung_kanan'] ?? '-' ?></td>
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
                            <td style="width:75.5%">Tidak Dilakukan Pemeriksaan</td>
                        </tr>
                        <tr>
                            <td style="width:23.5%">b. Anus/Rektum/Perianal</td>
                            <td style="width:1%">:</td>
                            <td style="width:75.5%">Tidak Dilakukan Pemeriksaan </td>
                        </tr>
                        <tr>
                            <td style="width:23.5%">c. Genetalia Eksternal</td>
                            <td style="width:1%">:</td>
                            <td style="width:75.5%">Tidak Dilakukan Pemeriksaan</td>
                        </tr>
                        <?php if($data_pelayanan->jenis_kelamin == 'L'){ ?>
                        <tr>
                            <td style="width:23.5%">d. Prostat (Khusus pria)</td>
                            <td style="width:1%">:</td>
                            <td style="width:75.5%">Tidak Dilakukan Pemeriksaan</td>
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
                           
                        </tr>
                        <tr>
                            <td style="width:32%;height:10px;">a. Simetris</td>
                            <td style="width:1%">:</td>
                            <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_atas_simetris'] ?? '-' ?></td>
                            <td style="width:33.5%"></td>
                        </tr>
                        <tr>
                            <td style="width:32%;height:10px;">b. Gerakan</td>
                            <td style="width:1%"></td>
                            <td style="width:33.5%;font-weight:bold">Kanan</td>
                            <td style="width:33.5%;font-weight:bold">Kiri</td>
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
                        
                    </tr>
                    <tr>
                        <td style="width:32%">a. Simetri</td>
                        <td style="width:1%">:</td>
                        <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_bawah_simetris'] ?? '-' ?></td>
                    </tr>
                    <tr>
                        <td style="width:32%">b. Gerakan</td>
                        <td style="width:1%"></td>
                     <td style="width:33.5%;font-weight:bold">Kanan</td>
                        <td style="width:33.5%;font-weight:bold ">Kiri</td>
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
                        <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_atas_varises_kanan']   ?></td>
                        <td style="width:33.5%"><?= $pemeriksaan_fisik['tulang_atas_varises_kiri']   ?></td>
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
    <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-top-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
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

   
</div>
<!-- page 7-->
<div class="row" style="height:800px">

    <div class="col-md-12" style="margin:30px 30px 0px 30px">
        <!-- data pribadi -->
        <!-- tinggal isinya -->
        <table width="100%" border="1" cellpadding="1" cellspacing="0" style="border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td>
                    <table width="100%" style="border-bottom-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
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
                            <td style="width:72%"><?= $data_pelayanan['tanggal_pemeriksaan'] ?? '-' ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>

    <!--  page 7 -->
    <div class="col-md-12" style="margin:0px 30px 0px 30px;border: 1px solid;">
        <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-bottom-color:#fff;border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td>
                    <?php ?>

                </td>
            </tr>
        </table>
    </div>
     <?php
            
    $resume_kelainan = '';
    $pemeriksaan_fis["tingkat_kesadaran_kesadaran"] == "Compos Mentis" ? $resume_kelainan.=  "Kesadaran = Kesadaran Menurun" . PHP_EOL : null;
    $pemeriksaan_fisik["tingkat_kesadaran_kualitas_kontak"] == "Tidak" ? $resume_kelainan .=  'Kualitas Kontak = Tidak'. PHP_EOL : null;
    $pemeriksaan_fisik["tingkat_kesadaran_tampak_kesakitan"] == "Ya, Tampak Kesakitan" ? $resume_kelainan.= 'Tampak Kesakitan = Ya, Tampak Kesakitan'. PHP_EOL : null;

    $pemeriksaan_fisik["tingkat_kesadaran_gangguan_saat_berjalan"] != "Tidak" ? $resume_kelainan.= 'Gangguan Saat Berjalan = Tidak'. PHP_EOL : null;
    $pemeriksaan_fisik["kelenjar_getah_bening_leher"] ==  "Tidak Normal" ? $resume_kelainan.= 'Getah Bening = Tidak Normal'. PHP_EOL : null;
    $pemeriksaan_fisik["kelenjar_getah_bening_sub_mandibula"] == "Tidak Normal" ? $resume_kelainan.= 'Sub Mandibula = Tidak Normal'. PHP_EOL : null;
    $pemeriksaan_fisik["kelenjar_getah_bening_ketiak"] == "Tidak Normal" ? $resume_kelainan.= 'Ketiak = Tidak Normal'. PHP_EOL : null;
    $pemeriksaan_fisik["kelenjar_getah_bening_inguinal"] == "Tidak Normal" ? $resume_kelainan .= 'Inguinal =Tidak Normal'. PHP_EOL : null;
    $pemeriksaan_fisik["kepala_tulang"] == "Tidak Baik" ? $resume_kelainan .= 'Tulang = Tidak Baik'. PHP_EOL : null;
    $pemeriksaan_fisik["kepala_kulit_kepala"] == "Tidak Baik" ? $resume_kelainan .='Kulit Kepala = Tidak Baik'. PHP_EOL : null;
    $pemeriksaan_fisik["kepala_rambut"] == "Tidak Baik" ? $resume_kelainan .= 'Rambut = Tidak Baik'. PHP_EOL : null;
    $pemeriksaan_fisik["kepala_bentuk_wajah"] == "Tidak Baik" ? $resume_kelainan .= 'Bentuk Wajah = Tidak Baik'. PHP_EOL : null;
    $pemeriksaan_fisik["mata_persepsi_warna_kanan"] != "Normal" ? $resume_kelainan .= "Persepsi Warna Kanan = ". $pemeriksaan_fisik["mata_persepsi_warna_kanan"]. PHP_EOL: null;
    $pemeriksaan_fisik["mata_persepsi_warna_kiri"] != "Normal" ? $resume_kelainan .= "Persepsi Warna Kiri = ". $pemeriksaan_fisik["mata_persepsi_warna_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["mata_kelopak_mata_kanan"] != "Normal" ? $resume_kelainan .= "Kelopak Mata Kanan = ". $pemeriksaan_fisik["mata_kelopak_mata_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["mata_kelopak_mata_kiri"] != "Normal" ? $resume_kelainan .= "Kelopak Mata Kiri = ". $pemeriksaan_fisik["mata_kelopak_mata_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["mata_konjungtiva_kanan"] != "Normal" ? $resume_kelainan .= "Konjungtiva Kanan = ".$pemeriksaan_fisik["mata_konjungtiva_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["mata_konjungtiva_kiri"] != "Normal" ? $resume_kelainan .= " Konjungtiva Kiri = ". $pemeriksaan_fisik["mata_konjungtiva_kiri"] . PHP_EOL : null ;
    $pemeriksaan_fisik["mata_gerak_bola_mata_kanan"] != "Normal" ? $resume_kelainan .= "Gerak Bola Mata Kanan =".$pemeriksaan_fisik["mata_gerak_bola_mata_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["mata_gerak_bola_mata_kiri"] != "Normal" ? $resume_kelainan .=" Gerak Bola Mata Kiri = ". $pemeriksaan_fisik["mata_gerak_bola_mata_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["mata_sklera_kanan"] != "Normal" ? $resume_kelainan .="Sklera Kanan = ". $pemeriksaan_fisik["mata_sklera_kanan"] . PHP_EOL : null ;
    $pemeriksaan_fisik["mata_sklera_kiri"] != "Normal" ? $resume_kelainan .= " Sklera Kiri = " .$pemeriksaan_fisik["mata_sklera_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["mata_kornea_kanan"] != "Normal" ? $resume_kelainan .=" Kornea Kanan = ". $pemeriksaan_fisik["mata_kornea_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["mata_kornea_kiri"] != "Normal" ? $resume_kelainan .= " Kornea Kiri  = " .$pemeriksaan_fisik["mata_kornea_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["mata_bulu_mata_kanan"] != "Normal" ? $resume_kelainan .= " Bulu Mata Kanan = " .$pemeriksaan_fisik["mata_bulu_mata_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["mata_bulu_mata_kiri"] != "Normal"? $resume_kelainan .= " Bulu Mata Kiri  = ".$pemeriksaan_fisik["mata_bulu_mata_kiri"] . PHP_EOL : null ;
    $pemeriksaan_fisik["mata_tekanan_bola_mata_kanan"] != "Normal" ? $resume_kelainan .=" Tekanan Bola Mata Kanan  = ". $pemeriksaan_fisik["mata_tekanan_bola_mata_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["mata_tekanan_bola_mata_kiri"] != "Normal" ? $resume_kelainan .= " Tekanan Bola Mata Kiri = ". $pemeriksaan_fisik["mata_tekanan_bola_mata_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["mata_penglihatan_3dimensi_kanan"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["mata_penglihatan_3dimensi_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["mata_penglihatan_3dimensi_kiri"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["mata_penglihatan_3dimensi_kiri"] . PHP_EOL : null;

    $pemeriksaan_fisik["telinga_daun_telinga_kanan"] != "Normal" ? $resume_kelainan .= "Daun Telinga Kanan = ". $pemeriksaan_fisik["telinga_daun_telinga_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["telinga_daun_telinga_kiri"] != "Normal" ?  $resume_kelainan .= "Daun Telinga Kiri = " .$pemeriksaan_fisik["telinga_daun_telinga_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["telinga_liang_telinga_kanan"] != "Normal" ? $resume_kelainan .= " Liang Telinga Kanan = ". $pemeriksaan_fisik["telinga_liang_telinga_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["telinga_liang_telinga_kiri"] != "Normal" ?  $resume_kelainan .= " Liang Telinga Kiri = " . $pemeriksaan_fisik["telinga_liang_telinga_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["telinga_serumen_kanan"] != "Tidak Ada" ? $resume_kelainan .= " Serumen Kanan = " .$pemeriksaan_fisik["telinga_serumen_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["telinga_serumen_kiri"] != "Tidak Ada" ? $resume_kelainan .= " Serumen Kiri =" .$pemeriksaan_fisik["telinga_serumen_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["telinga_timpani_kanan"] != "Intak" ? $resume_kelainan .= " Telinga Timpani Kanan = " .$pemeriksaan_fisik["telinga_timpani_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["telinga_timpani_kiri"] != "Intak" ? $resume_kelainan .= " Telinga Timpani Kiri = " .$pemeriksaan_fisik["telinga_timpani_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["hidung_meatus_nasi"] != "Normal" ? $resume_kelainan .= "Meatus Nasi = " .$pemeriksaan_fisik["hidung_meatus_nasi"] . PHP_EOL : null;
    $pemeriksaan_fisik["hidung_septum_nasi"] != "Normal" ? $resume_kelainan .= "Septum Nasi = " .$pemeriksaan_fisik["hidung_septum_nasi"] . PHP_EOL : null;
    $pemeriksaan_fisik["hidung_konka_nasal"] != "Normal" ? $resume_kelainan .= "Konka Nasal = " . $pemeriksaan_fisik["hidung_konka_nasal"] . PHP_EOL : null;
    $pemeriksaan_fisik["hidung_nyeri_ketok_sinus"] != "Normal" ? $resume_kelainan .= "Ketok Sinus = ". $pemeriksaan_fisik["hidung_nyeri_ketok_sinus"] . PHP_EOL : null;
    $pemeriksaan_fisik["hidung_penciuman"] != "Normal" ? $resume_kelainan .= "Penciuman = ". $pemeriksaan_fisik["hidung_penciuman"] . PHP_EOL : null;
    $pemeriksaan_fisik["mulut_bibir"] != "Normal" ? $resume_kelainan .= "Bibir =" .$pemeriksaan_fisik["mulut_bibir"] . PHP_EOL : null;
    $pemeriksaan_fisik["mulut_lidah"] != "Normal" ? $resume_kelainan .= "Lidah = " . $pemeriksaan_fisik["mulut_lidah"] . PHP_EOL : null;
    $pemeriksaan_fisik["mulut_gusi"] != "Normal" ? $resume_kelainan .= "Gusi = " .$pemeriksaan_fisik["mulut_gusi"] . PHP_EOL : null;
    $pemeriksaan_fisik["mulut_lainnya"] != "Normal" ? $resume_kelainan .= "Lainnya = ". $pemeriksaan_fisik["mulut_lainnya"] . PHP_EOL : null;
    $pemeriksaan_fisik["tenggorokan"] != "Normal" ? $resume_kelainan .= "Tenggorokan = ". $pemeriksaan_fisik["tenggorokan"] . PHP_EOL : null;
    $pemeriksaan_fisik["tenggorokan_pharynx"] != "Normal" ? $resume_kelainan .= "Pharynx = " .$pemeriksaan_fisik["tenggorokan_pharynx"] . PHP_EOL : null;
    $pemeriksaan_fisik["tenggorokan_tonsil_kanan"] != "TO" ? $resume_kelainan .= " Tonsil Kanan  = " .$pemeriksaan_fisik["tenggorokan_tonsil_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["tenggorokan_tonsil_kiri"] != "TO" ? $resume_kelainan .= " Tonsil Kiri  = " .$pemeriksaan_fisik["tenggorokan_tonsil_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["tenggorokan_tonsil_ukuran_kanan"] != "Normal" ? $resume_kelainan .= " Tonsil Ukuran Kanan  = " .$pemeriksaan_fisik["tenggorokan_tonsil_ukuran_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["tenggorokan_tonsil_ukuran_kiri"] != "Normal" ? $resume_kelainan .= " Tonsil Ukuran Kiri  = " .$pemeriksaan_fisik["tenggorokan_tonsil_ukuran_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["tenggorokan_palatum"] != "Normal" ? $resume_kelainan .= "Palatum = " . $pemeriksaan_fisik["tenggorokan_palatum"] . PHP_EOL : null;
    $pemeriksaan_fisik["leher_gerakan_leher"] != "Normal" ? $resume_kelainan .= "Gerakan Leher = " . $pemeriksaan_fisik["leher_gerakan_leher"] . PHP_EOL : null;
    $pemeriksaan_fisik["leher_otot_leher"] != "Normal" ? $resume_kelainan .= "Otot Leher = " .$pemeriksaan_fisik["leher_otot_leher"] . PHP_EOL : null;
    $pemeriksaan_fisik["leher_kelenjar_thyroid"] != "Normal" ? $resume_kelainan .= "Kelenjer Thyroid = " .$pemeriksaan_fisik["leher_kelenjar_thyroid"] . PHP_EOL : null;
    $pemeriksaan_fisik["leher_pulsasi_carotis"] != "Normal" ? $resume_kelainan .= "Pulsasi Carotis = ". $pemeriksaan_fisik["leher_pulsasi_carotis"] . PHP_EOL : null;
    $pemeriksaan_fisik["leher_tekanan_vena_jugularis"] != "Normal" ? $resume_kelainan .= "Vena Jugularis = " .$pemeriksaan_fisik["leher_tekanan_vena_jugularis"] . PHP_EOL : null;
    $pemeriksaan_fisik["leher_trachea"] != "Normal" ? $resume_kelainan .= "Trachea = ". $pemeriksaan_fisik["leher_trachea"] . PHP_EOL : null;
    $pemeriksaan_fisik["dada_bentuk"] != "Simetris" ? $resume_kelainan .= "Bentuk  = " .$pemeriksaan_fisik["dada_bentuk"] . PHP_EOL : null;
    $pemeriksaan_fisik["dada"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["dada"] . PHP_EOL : null;
    $pemeriksaan_fisik["dada_mamae"] != "Normal" ? $resume_kelainan .= "Mamae = " .$pemeriksaan_fisik["dada_mamae"] . PHP_EOL : null;
    $pemeriksaan_fisik["paru_jantung_palpasi"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["paru_jantung_palpasi"] . PHP_EOL : null;
    $pemeriksaan_fisik["paru_jantung_perkusi_iktus_kanan"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["paru_jantung_perkusi_iktus_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["paru_jantung_perkusi_kiri"] != "Sonor" ? $resume_kelainan .= $pemeriksaan_fisik["paru_jantung_perkusi_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["paru_jantung_perkusi_iktus_kanan"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["paru_jantung_perkusi_iktus_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["paru_jantung_perkusi_batas_jantung_kanan"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["paru_jantung_perkusi_batas_jantung_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["paru_jantung_auskultasi_bunyi_nafas_kanan"] != "Vesikuler" ? $resume_kelainan .= $pemeriksaan_fisik["paru_jantung_auskultasi_bunyi_nafas_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["paru_jantung_auskultasi_bunyi_nafas_kiri"] != "Vesikuler" ? $resume_kelainan .= $pemeriksaan_fisik["paru_jantung_auskultasi_bunyi_nafas_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["paru_jantung_auskultasi_bunyi_nafas_tambah_kanan"] != "Tak Ada" ? $resume_kelainan .= $pemeriksaan_fisik["paru_jantung_auskultasi_bunyi_nafas_tambah_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["paru_jantung_auskultasi_bunyi_nafas_tambah_kiri"] != "Tak Ada" ? $resume_kelainan .= $pemeriksaan_fisik["paru_jantung_auskultasi_bunyi_nafas_tambah_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["paru_jantung_bunyi_jantung"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["paru_jantung_bunyi_jantung"] . PHP_EOL : null;
    $pemeriksaan_fisik["abdomen"] != "Supel" ? $resume_kelainan .= "Palpasi =" .$pemeriksaan_fisik["abdomen"] . PHP_EOL : null;
    $pemeriksaan_fisik["abdomen_perkusi"] != "Timpani" ? $resume_kelainan .= $pemeriksaan_fisik["abdomen_perkusi"] . PHP_EOL : null;
    $pemeriksaan_fisik["abdomen_auskultasi_bising_usus"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["abdomen_auskultasi_bising_usus"] . PHP_EOL : null;
    $pemeriksaan_fisik["abdomen_hati"] != "Tidak Teraba" ? $resume_kelainan .= $pemeriksaan_fisik["abdomen_hati"] . PHP_EOL : null;
    $pemeriksaan_fisik["abdomen_limpa"] != "Tidak Teraba Schuffner" ? $resume_kelainan .= $pemeriksaan_fisik["abdomen_limpa"] . PHP_EOL : null;
    $pemeriksaan_fisik["abdomen_ginjal_kanan"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["abdomen_ginjal_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["abdomen_ginjal_kiri"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["abdomen_ginjal_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["abdomen_ballotement_kanan"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["abdomen_ballotement_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["abdomen_ballotement_kiri"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["abdomen_ballotement_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["abdomen_nyeri_costo_vertebrae_kanan"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["abdomen_nyeri_costo_vertebrae_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["abdomen_nyeri_costo_vertebrae_kiri"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["abdomen_nyeri_costo_vertebrae_kiri"] . PHP_EOL : null;
    // $pemeriksaan_fisik["genitourinaria_kandung_kemih"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["mulut_bibir"] . PHP_EOL : null;
    // $pemeriksaan_fisik["genitourinaria_anus"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["mulut_bibir"] . PHP_EOL : null;
    // $pemeriksaan_fisik["genitourinaria_genitalia_eksternal"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["mulut_bibir"] . PHP_EOL : null;
    // $pemeriksaan_fisik["genitourinaria_prostat"] != "Teraba" ? $resume_kelainan .= $pemeriksaan_fisik["mulut_bibir"] . PHP_EOL : null;
    $pemeriksaan_fisik["vertebra"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["vertebra"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_atas_gerakan_abduksi_neer_kanan"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_gerakan_abduksi_neer_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_atas_gerakan_abduksi_hawkin_kanan"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_gerakan_abduksi_hawkin_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_atas_gerakan_drop_arm_kanan"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_gerakan_drop_arm_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_atas_gerakan_yergason_kanan"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_gerakan_yergason_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_atas_gerakan_speed_kanan"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_gerakan_speed_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_atas_tulang_kanan"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_tulang_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_atas_sensibilitas_kanan"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_sensibilitas_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_atas_oedem_kanan"] != "Tidak Ada" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_oedem_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_atas_varises_kanan"] != "Tidak Ada" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_varises_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_atas_kekuatan_otot_pin_prick_kanan"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_kekuatan_otot_pin_prick_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_atas_kekuatan_otot_phallent_kanan"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_kekuatan_otot_phallent_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_atas_kekuatan_otot_tinnel_kanan"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_kekuatan_otot_tinnel_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_atas_kekuatan_otot_finskelstein_kanan"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_kekuatan_otot_finskelstein_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_atas_kelaianan_kukujari_kanan"] != "Tidak Ada" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_kelaianan_kukujari_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_atas_sensibilitas_kanan"] != "Baik" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_sensibilitas_kanan"] . PHP_EOL : null;

    $pemeriksaan_fisik["tulang_atas_sensibilitas_kiri"] != "Baik" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_sensibilitas_kiri"] . PHP_EOL : null;

    $pemeriksaan_fisik["tulang_atas_gerakan_abduksi_neer_kiri"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_gerakan_abduksi_neer_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_atas_gerakan_abduksi_hawkin_kiri"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_gerakan_abduksi_hawkin_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_atas_gerakan_drop_arm_kiri"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_gerakan_drop_arm_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_atas_gerakan_yergason_kiri"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_gerakan_yergason_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_atas_gerakan_speed_kiri"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_gerakan_speed_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_atas_tulang_kiri"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_tulang_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_atas_oedem_kiri"] != "Tidak Ada" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_oedem_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_atas_varises_kiri"] != "Tidak Ada" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_varises_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_atas_kekuatan_otot_pin_prick_kiri"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_kekuatan_otot_pin_prick_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_atas_kekuatan_otot_phallent_kiri"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_kekuatan_otot_phallent_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_atas_kekuatan_otot_tinnel_kiri"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_kekuatan_otot_tinnel_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_atas_kekuatan_otot_finskelstein_kiri"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_kekuatan_otot_finskelstein_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_atas_kelaianan_kukujari_kiri"] != "Tidak Ada" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_kelaianan_kukujari_kiri"] . PHP_EOL : null;

    $pemeriksaan_fisik["tulang_bawah_laseque_kanan"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_bawah_laseque_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_bawah_kernique_kanan"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_bawah_kernique_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_bawah_patrick_kanan"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_bawah_patrick_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_bawah_contrapatrick_kanan"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_bawah_contrapatrick_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_bawah_nyeri_tekanan_kanan"] != "Tidak Ada" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_bawah_nyeri_tekanan_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_bawah_kekuatan_otot_kanan"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_bawah_kekuatan_otot_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_bawah_sensibilitas_kanan"] != "Baik" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_bawah_sensibilitas_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_bawah_oedema_kanan"] != "Tidak Ada" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_bawah_oedema_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_bawah_kelainan_kuku_kanan"] != "Tidak Ada" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_bawah_kelainan_kuku_kanan"] . PHP_EOL : null;

    $pemeriksaan_fisik["tulang_bawah_laseque_kiri"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_bawah_laseque_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_bawah_kernique_kiri"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_bawah_kernique_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_bawah_patrick_kiri"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["mulut_bibir"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_bawah_contrapatrick_kiri"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_bawah_patrick_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_bawah_nyeri_tekanan_kiri"] != "Tidak Ada" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_bawah_nyeri_tekanan_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_bawah_kekuatan_otot_kiri"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_bawah_kekuatan_otot_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_bawah_sensibilitas_kiri"] != "Baik" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_bawah_sensibilitas_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_bawah_oedema_kiri"] != "Tidak Ada" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_bawah_oedema_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_bawah_vaskularisasi_kiri"] != "Baik" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_bawah_vaskularisasi_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_bawah_kelainan_kuku_kiri"] != "Tidak Ada" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_bawah_kelainan_kuku_kiri"] . PHP_EOL : null;

    $pemeriksaan_fisik["otot_motorik_trofi_kanan"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["otot_motorik_trofi_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["otot_motorik_tonus_kanan"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["otot_motorik_tonus_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["otot_motorik_gerakan_abnormal_kanan"] != "Tidak Ada" ? $resume_kelainan .= $pemeriksaan_fisik["otot_motorik_gerakan_abnormal_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["otot_motorik_trofi_kiri"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["otot_motorik_trofi_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["otot_motorik_tonus_kiri"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["otot_motorik_tonus_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["otot_motorik_gerakan_abnormal_kiri"] != "Tidak Ada" ? $resume_kelainan .= $pemeriksaan_fisik["otot_motorik_gerakan_abnormal_kiri"] . PHP_EOL : null;

    $pemeriksaan_fisik["fungsi_sensorik_kanan"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["fungsi_sensorik_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["fungsi_autonom_kanan"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["fungsi_autonom_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["fungsi_sensorik_kiri"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["fungsi_sensorik_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["fungsi_autonom_kiri"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["fungsi_autonom_kiri"] . PHP_EOL : null;

    $pemeriksaan_fisik["saraf_daya_ingat_segera"] != "Baik" ? $resume_kelainan .= $pemeriksaan_fisik["saraf_daya_ingat_segera"] . PHP_EOL : null;
    $pemeriksaan_fisik["saraf_daya_ingat_jangka_menengah"] != "Baik" ? $resume_kelainan .= $pemeriksaan_fisik["saraf_daya_ingat_jangka_menengah"] . PHP_EOL : null;
    $pemeriksaan_fisik["saraf_daya_ingat_jangka_pendek"] != "Baik" ? $resume_kelainan .= $pemeriksaan_fisik["saraf_daya_ingat_jangka_pendek"] . PHP_EOL : null;
    $pemeriksaan_fisik["saraf_daya_ingat_jangka_panjang"] != "Baik" ? $resume_kelainan .= $pemeriksaan_fisik["saraf_daya_ingat_jangka_panjang"] . PHP_EOL : null;
    $pemeriksaan_fisik["saraf_orientasi_waktu"] != "Baik" ? $resume_kelainan .= $pemeriksaan_fisik["saraf_orientasi_waktu"] . PHP_EOL : null;
    $pemeriksaan_fisik["saraf_orientasi_orang"] != "Baik" ? $resume_kelainan .= $pemeriksaan_fisik["saraf_orientasi_orang"] . PHP_EOL : null;
    $pemeriksaan_fisik["saraf_orientasi_tempat"] != "Baik" ? $resume_kelainan .= $pemeriksaan_fisik["saraf_orientasi_tempat"] . PHP_EOL : null;
    $pemeriksaan_fisik["saraf_kesan"] != "Baik" ? $resume_kelainan .= $pemeriksaan_fisik["saraf_kesan"] . PHP_EOL : null;
    $pemeriksaan_fisik["saraf_kesan_n_i"] != "Baik" ? $resume_kelainan .= $pemeriksaan_fisik["saraf_kesan_n_i"] . PHP_EOL : null;
    $pemeriksaan_fisik["saraf_kesan_n_ii"] != "Baik" ? $resume_kelainan .= $pemeriksaan_fisik["saraf_kesan_n_ii"] . PHP_EOL : null;
    $pemeriksaan_fisik["saraf_kesan_n_iii"] != "Baik" ? $resume_kelainan .= $pemeriksaan_fisik["saraf_kesan_n_iii"] . PHP_EOL : null;
    $pemeriksaan_fisik["saraf_kesan_n_iv"] != "Baik" ? $resume_kelainan .= $pemeriksaan_fisik["saraf_kesan_n_iv"] . PHP_EOL : null;
    $pemeriksaan_fisik["saraf_kesan_n_v"] != "Baik" ? $resume_kelainan .= $pemeriksaan_fisik["saraf_kesan_n_v"] . PHP_EOL : null;
    $pemeriksaan_fisik["saraf_kesan_n_vi"] != "Baik" ? $resume_kelainan .= $pemeriksaan_fisik["saraf_kesan_n_vi"] . PHP_EOL : null;
    $pemeriksaan_fisik["saraf_kesan_n_vii"] != "Baik" ? $resume_kelainan .= $pemeriksaan_fisik["saraf_kesan_n_vii"] . PHP_EOL : null;
    $pemeriksaan_fisik["saraf_kesan_n_viii"] != "Baik" ? $resume_kelainan .= $pemeriksaan_fisik["saraf_kesan_n_viii"] . PHP_EOL : null;
    $pemeriksaan_fisik["saraf_kesan_n_viii"] != "Baik" ? $resume_kelainan .= $pemeriksaan_fisik["saraf_kesan_n_viii"] . PHP_EOL : null;
    $pemeriksaan_fisik["saraf_kesan_n_ix"] != "Baik" ? $resume_kelainan .= $pemeriksaan_fisik["saraf_kesan_n_ix"] . PHP_EOL : null;
    $pemeriksaan_fisik["saraf_kesan_n_x"] != "Baik" ? $resume_kelainan .= $pemeriksaan_fisik["saraf_kesan_n_x"] . PHP_EOL : null;
    $pemeriksaan_fisik["saraf_kesan_n_xi"] != "Baik" ? $resume_kelainan .= $pemeriksaan_fisik["saraf_kesan_n_xi"] . PHP_EOL : null;
    $pemeriksaan_fisik["saraf_kesan_n_xii"] != "Baik" ? $resume_kelainan .= $pemeriksaan_fisik["saraf_kesan_n_xii"] . PHP_EOL : null;
    $pemeriksaan_fisik["reflek_fisiologis_patella_kanan"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["reflek_fisiologis_patella_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["reflek_patologis_kanan"] != "Negative" ? $resume_kelainan .= $pemeriksaan_fisik["reflek_patologis_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["reflek_fisiologis_patella_kiri"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["reflek_fisiologis_patella_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["reflek_patologis_kiri"] != "Negative" ? $resume_kelainan .= $pemeriksaan_fisik["reflek_patologis_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["kulit_kulit"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["kulit_kulit"] . PHP_EOL : null;
    $pemeriksaan_fisik["kulit_selaput_lendir"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["kulit_selaput_lendir"] . PHP_EOL : null;
    $pemeriksaan_fisik["kulit_kuku"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["kulit_kuku"] . PHP_EOL : null;
    $pemeriksaan_fisik["kulit_tato"] != "Tidak Ada" ? $resume_kelainan .= $pemeriksaan_fisik["kulit_tato"] . PHP_EOL : null;
    $pemeriksaan_fisik["kategori_kesehatan"] != "FIT" ? $resume_kelainan .= $pemeriksaan_fisik["kategori_kesehatan"] . PHP_EOL : null;
    $pemeriksaan_fisik["abdomen_ballotement_kanan"] != "Tidak Ada" ? $resume_kelainan .= $pemeriksaan_fisik["abdomen_ballotement_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["abdomen_ballotement_kiri"] != "Tidak Ada" ? $resume_kelainan .= $pemeriksaan_fisik["abdomen_ballotement_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["abdomen_nyeri_costo_vertebrae_kanan"] != "Tidak Ada" ? $resume_kelainan .= $pemeriksaan_fisik["abdomen_nyeri_costo_vertebrae_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["abdomen_nyeri_costo_vertebrae_kiri"] != "Tidak Ada" ? $resume_kelainan .= $pemeriksaan_fisik["abdomen_nyeri_costo_vertebrae_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_atas_vaskularisasi_kanan"] != "Baik" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_vaskularisasi_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_atas_vaskularisasi_kiri"] != "Baik" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_vaskularisasi_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["mata_lensa_mata_kanan"] != "Tidak Keruh" ? $resume_kelainan .= $pemeriksaan_fisik["mata_lensa_mata_kanan"] . PHP_EOL : null;
    $pemeriksaan_fisik["mata_lensa_mata_kiri"] != "Tidak Keruh" ? $resume_kelainan .= $pemeriksaan_fisik["mata_lensa_mata_kiri"] . PHP_EOL : null;
    $pemeriksaan_fisik["paru_jantung_perkusi_iktus_kiri"] != "Normal" ? $resume_kelainan .= $pemeriksaan_fisik["paru_jantung_perkusi_iktus_kiri"] . PHP_EOL : null;
    
    $pemeriksaan_fisik["tulang_atas_simetris"] != "Tidak Ada" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_atas_simetris"] . PHP_EOL : null;
    $pemeriksaan_fisik["tulang_bawah_simetris"] != "Tidak Ada" ? $resume_kelainan .= $pemeriksaan_fisik["tulang_bawah_simetris"] . PHP_EOL : null; 
                if ($pemeriksaan_fisik["resume_kelainan"] == null || $pemeriksaan_fisik["resume_kelainan"] == ''){
                        $pemeriksaan_fisik["resume_kelainan"] = $resume_kelainan;
                }?>
    <div class="col-md-12" style="margin:0px 30px 0px 30px">
        <table width="100%" border="1" cellpadding="1" cellspacing="0" style="border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-collapse:collapse;text-align:left;font-size:12px">
                        <tr>
                            <td style="width:30.5%"><b>III. Resume Kelainan Yang Didapat </b></td>
                            <td style="width:1%">:</td>
                            <td style="width:68.5%"><?= $pemeriksaan_fisik['resume_kelainan'] ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <div class="col-md-12" style="margin:0px 30px 0px 30px">
        <table width="100%" border="1" cellpadding="1" cellspacing="0" style="border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-collapse:collapse;text-align:left;font-size:12px">
                        <tr>
                            <td style="width:23%"><b>Hasil Body Map</b> </td>
                            <td style="width:1%">:</td>
                            <td style="width:76%"><?= $pemeriksaan_fisik['hasil_body_map'] ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <div class="col-md-12" style="margin:0px 30px 0px 30px">
        <table width="100%" border="1" cellpadding="1" cellspacing="0" style="border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-collapse:collapse;text-align:left;font-size:12px">
                        <tr>
                            <td style="width:23%"><b>Hasil Brief Survey</b> </td>
                            <td style="width:1%">:</td>
                            <td style="width:76%"><?= $pemeriksaan_fisik['hasil_brief_survey'] ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <div class="col-md-12" style="margin:0px 30px 0px 30px">
        <table width="100%" border="1" cellpadding="1" cellspacing="0" style="border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-collapse:collapse;text-align:left;font-size:12px">
                        <tr>
                            <td style="width:23%"><b>IV. Diagnosis Kerja </b></td>
                            <td style="width:1%">:</td>
                            <td style="width:76%"><?= $pemeriksaan_fisik['diagnosis_kerja'] ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
   
    <div class="col-md-12" style="margin:0px 30px 0px 30px">
        <table width="100%" border="1" cellpadding="1" cellspacing="0" style="border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td colspan="5" style="text-align:left;"><b> X. Permasalahan Pasien & Rencana Penatalaksanaan</b></td>
            </tr>
            <tr>
                <td style="text-align:center;width:30%">Jenis permasalahan Medis & Non Medis <br>(Okupasi dll) </td>
                <td style="text-align:center;width:20%">Rencana Tindakan <br>(materi & metode) <br>Tatalaksana Medikamentosa, non medika mentosa (nutrisi,olahraga,dll)</td>
                <td style="text-align:center;width:15%">Target Waktu</td>
                <td style="text-align:center;width:20%">Hasil yang diharapkan </td>
                <td style="text-align:center;width:15%">Keterangan</td>

            </tr>
            <?php
            foreach ($penata_pelaksana as $penata) :
            ?>
                <tr>
                    <td style="height:100px;vertical-align:top"><?= $penata['jenis_permasalahan'] ?? '' ?></td>
                    <td style="height:100px;vertical-align:top"><?= $penata['rencana'] ?? '' ?></td>
                    <td style="height:100px;vertical-align:top"><?= $penata['target_waktu'] ?? '' ?></td>
                    <td style="height:100px;vertical-align:top"><?= $penata['hasil_yang_diharapkan'] ?? '' ?></td>
                    <td style="height:100px;vertical-align:top"><?= $penata['keterangan'] ?? '' ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<!-- ttd -->
<div class="row" style="">
    <div class="col-md-12" style="margin:30px 30px 0px 30px">

        <table width="100%" border="0" style="font-size: 12px">

            <tr>

                <td style="width:66.3%"></td>
                <td style="width:33.3%">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:none;text-align:center;font-size: 12px">
                        <tr>
                            <td>Pekanbaru ,<?php echo $tgl_disahkan = $tgl_diterbitkan . ' ' . $daftar_bulan[$bulan_diterbitkan] . ' ' . $tahun_diterbitkan ?></td>
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
                                // if (isset($model['is_pptk']) == 'false') :
                                ?>
                                <?php echo 'dr.Mardiansyah Kusuma, Sp. Ok' ?>
                                <br>
                                <?php echo 'NIP. 19750309 200604 1 008' ?>
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