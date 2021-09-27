<?php

use yii\helpers\Url;

error_reporting(0);
$logo = Url::to('@web/img/logo-rsud-basic.png');
$logo2 = Url::to('@web/img/logo-kars1.png');
$logo3 = Url::to('@web/img/riau.png');
$body = Url::to('@web/img/body.png');
$coret = 'line-through';
$ceklis = Url::to('@web/img/checklist.png');
$uncheck = Url::to('@web/img/blank.png');
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
$date = $data_pelayanan['tanggal_pemeriksaan'];
$namahari = date('l', strtotime($date));
$namabulan = date('m', strtotime($date));
$tgl = date('d', strtotime($date));
$tgl_lahir = date('d', strtotime($data_pelayanan['tgl_lahir']));
$bulan_lahir = date('m', strtotime($data_pelayanan['tgl_lahir']));
$tahun = date('Y', strtotime($date));
$tahun_lahir = date('Y', strtotime($data_pelayanan['tgl_lahir']));

$tanggal_lahir = $tgl_lahir . ' ' . $daftar_bulan[$bulan_lahir] . ' ' . $tahun_lahir;
$result = strtolower($pemeriksaan_fisik['kategori_kesehatan']); //diganti sesuai inputan

function tgl_indo($tanggal)
{
    $bulan = array(
        1 => 'Januari',
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
<div class="row" style="height:800px;margin:20px">
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

        </table>
    </div>
    <div class="col-md-12" style="margin:10px 10px 0px 10px;border: 1px solid;">
        <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td style="width:100%;text-align:right;padding-right:80px;padding-top:10px">
                    NO: <?= $data_pelayanan['no_mcu'] ?>/Peg/MCU/RSUDAA/VIII/<?= $tahun ?></td>
            </tr>
            <tr>
                <td style="height:50px"></td>
            </tr><!-- seperated -->

            <tr>
                <td style="width:100%;text-align:center">
                    <h2><u> SERTIFIKAT MEDIS UNTUK KELAIKAN BEKERJA</u></h2>
                </td>
            </tr>
            <tr>
                <td style="width:100%;text-align:center">
                    <h2><i> MEDICAL CERTIFICATE FIT FOR DUTY</i></h2>
                </td>
            </tr>
            <tr>
                <td style="height:50px"></td>
            </tr><!-- seperated -->

        </table>
        <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td style="width:50%;text-align:center">
                    <b> Nama Lengkap </b><br><small><i>Full Name</i></small><br><b><?= $data_pelayanan['nama'] ?></b>
                </td>
                <td style="width:50%;text-align:center">
                    <b>Tempat Tanggal Lahir/Umur </b><br><small><i>Place Of Birth /
                            Age</i></small><br><b><?= ($data_pelayanan['tempat'] . ',' . $tanggal_lahir) ?? '' ?></b>
                </td>
            </tr>
            <tr>
                <td style="height:50px"></td>
            </tr><!-- seperated -->

        </table>
        <table width="100%" border="0" cellpadding="1" cellspacing="0" style="padding:10px;border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td colspan="2" width="100%" style="text-align:justify">
                    Berdasarkan pemeriksaan pada hari <?= $daftar_hari[$namahari] ?> tanggal <?= $tgl ?>
                    bulan <?= $daftar_bulan[$namabulan] ?> tahun <?= $tahun ?> berupa anamnesis, pemeriksaan fisik dan
                    pemeriksaan penunjang, menyatakan bahwa yang bersangkutan :
                    <br><br><small><i>Based on the examination on the day <?= strtolower($namahari) ?> date <?= $tgl ?>
                            month <?= $daftar_bulan2[$namabulan] ?> year <?= $tahun ?> in anamnesis, physical
                            examination and supporting investigation, we state that the person concerned :</i></small>
                </td>
            </tr>
            <tr>
                <td style="height:30px"></td>
            </tr><!-- seperated -->

            <tr>
                <td width="4%">
                    <img src="<?= ($result == 'fit') ? $ceklis : $uncheck ?>" alt="logo" style="height: 15px; width: auto;">
                </td>
                <td style="text-decoration: <?= ($result == 'fit') ? '' : $coret ?>;">Laik Kerja </span><br><small><i>Fit
                            to work</i></small></td>
            </tr>
            <tr>
                <td style="height:20px"></td>
            </tr><!-- seperated -->

            <tr>
                <td width="4%">
                    <img src="<?= ($result == 'fit with note') ? $ceklis : $uncheck ?>" alt="logo" style="height: 15px; width: auto;">
                </td>
                <td style="text-decoration: <?= ($result == 'fit with note') ? '' : $coret ?>;">Laik Kerja dengan
                    Catatan. </span><br><small><i>Fit to work with notes</i></small></td>
            </tr>
            <tr>
                <td style="height:20px"></td>
            </tr><!-- seperated -->

            <tr>
                <td width="4%">
                    <img src="<?= ($result == 'temporary unfit') ? $ceklis : $uncheck ?>" alt="logo" style="height: 15px; width: auto;">
                </td>
                <td style="text-decoration: <?= ($result == 'temporary unfit') ? '' : $coret ?>;">Tidak Laik Kerja
                    sementara sampai dilakukan penilaian ulang pada. </span><br><small><i>Temporary Unfit</i></small>
                </td>
            </tr>
            <tr>
                <td style="height:20px"></td>
            </tr><!-- seperated -->

            <tr>
                <td width="4%">
                    <img src="<?= ($result == 'unfit') ? $ceklis : $uncheck ?>" alt="logo" style="height: 15px; width: auto;">
                </td>
                <td style="text-decoration: <?= ($result == 'unfit') ? '' : $coret ?>;">TIdak Laik Kerja </span>
                    <br><small><i>Unfit to work</i></small>
                </td>
            </tr>
        </table>
        <br><br>
        <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td colspan="2" width="100%" style="text-align:left">
                    <b>Untuk Bekerja sebagai</b> <br><small><i>For work as</i></small>
                </td>
            </tr>
            <tr>
                <td style="height:10px"></td>
            </tr><!-- seperated -->

            <tr>
                <td width="30%" style="text-align:left">
                    <b> Pekerjaan </b> <br><small><i>Occupation</i></small>
                </td>
                <td width="70%" style="text-align:left">:

                    <?php
                    if($data_pelayanan->kode_debitur == '0135'){
                        echo $dataUser[0]['jabatan_pekerjaan'];
                        
                    }else{
                        if (is_null($dataUser[0]['u_jabatan'])) {
                            echo $dataUser[0]['ukb_krj_dituju'];
                       
                        } else {
                            echo $dataUser[0]['u_jabatan'];
                        }
                    }
                    ?>

            </tr>
            <tr>
                <td style="height:10px"></td>
            </tr><!-- seperated -->
            <?php if ($data_pelayanan->kode_debitur == '0129' || $data_pelayanan->kode_debitur == '9999') { ?>

                <tr>
                    <td width="30%" style="text-align:left">
                        <b> Pada Instansi/Perusahaan </b> <br><small><i>In institution/Company Name</i></small>
                    </td>
                    <td width="70%" style="text-align:left">: <?= $dataUser[0]['u_tempat_tugas'] ?></td>

                </tr>
                <tr>
                    <td style="height:10px"></td>
                </tr><!-- seperated -->

                <tr>
                    <td width="30%" style="text-align:left">
                        <b> Untuk Penempatan Di </b> <br><small><i>For Placement At</i></small>
                    </td>
                    <?php if ($data_pelayanan->kode_debitur == '0130'  || $data_pelayanan->kode_debitur == '9999') { ?>
                        <?php if ($data_pelayanan['no_mcu'] == '01041641') { ?>
                            <td width="70%" style="text-align:left">: PROVINSI RIAU</td>
                        <?php } else { ?>
                            <td width="70%" style="text-align:left">: <?= $dataUser[0]['u_tempat_tugas'] ?></td>

                        <?php  } ?>
                    <?php } ?>
                </tr>

            <?php } else if ($data_pelayanan->kode_debitur == '0135') { ?>
                <tr>
                    <td width="30%" style="text-align:left">
                        <b> Pada Instansi/Perusahaan </b> <br><small><i>In institution/Company Name</i></small>
                    </td>
                    <td width="70%" style="text-align:left">: </td>

                </tr>
                <tr>
                    <td style="height:10px"></td>
                </tr><!-- seperated -->

                <tr>
                    <td width="30%" style="text-align:left">
                        <b> Untuk Penempatan Di </b> <br><small><i>For Placement At</i></small>
                    </td>
                    <td width="70%" style="text-align:left">: BANK BNI</td>
                </tr>
            <?php } else { ?>
                <tr>
                    <td width="30%" style="text-align:left">
                        <b> Pada Instansi/Perusahaan </b> <br><small><i>In institution/Company Name</i></small>
                    </td>
                    <td width="70%" style="text-align:left">: RSUD ARIFIN ACHMAD</td>

                </tr>
                <tr>
                    <td style="height:10px"></td>
                </tr><!-- seperated -->

                <tr>
                    <td width="30%" style="text-align:left">
                        <b> Untuk Penempatan Di </b> <br><small><i>For Placement At</i></small>
                    </td>
                    <td width="70%" style="text-align:left">: <?= $dataUser[0]['u_tempat_tugas']  ?></td>
                </tr>
            <?php } ?>

        </table>
        <p style="font-size:12px">Sertifikat ini tidak dapat digunakan untuk kepentingan hukum lainnya <br><small><i>The
                    certificate cannot be used for other legal purposes.</i></small></p>
        <table width="100%" border="0" cellpadding="1" cellspacing="0" style="border-collapse:collapse;text-align:left;font-size:12px">
            <tr>
                <td style="width:33.3%;text-align:center">
                    <b>Dokter Pemeriksa</b> <br>
                    <small>
                        <i>Full Name Of examination physician </i>
                    </small>
                    <br>
                    <b><?php echo 'dr. Mardiansyah Kusuma Sp.Ok' ?></b>
                    <br>
                    <?php echo 'NIP. 19750309 200604 1 008' ?>
                    <br>
                    <br>
                    <br>
                    <br><b>Dikeluarkan Tanggal</b>
                    <br><small><i>Date Of examination</i></small>
                    <br>
                    <?php
                    $tgl12 = $data_pelayanan['tanggal_pemeriksaan'];
                    $tgl22 = date('Y-m-d'); //operasi penjumlahan tanggal sebanyak 6 hari
                    ?>
                    <b><?php echo tgl_indo($tgl22) ?></b>
                </td>
                <td style="width:33.3%;text-align:center">
                    <img src="http://192.168.254.71/reg-mcu/web/index.php/site/photo?rm=<?= $data_pelayanan['no_rekam_medik'] ?>" alt="" style="height: 110px; width: auto;">
                </td>
                <td style="width:33.3%;text-align:center">
                    <b> Tanda Tangan Pemeriksa</b>
                    <br><small><i>Signed By Physician</i></small>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br><b>Masa Berlaku</b>
                    <br><small><i>Date Of Expiry</i></small>
                    <br>
                    <?php
                    $tgl1 = date('Y-m-d', strtotime('-1 days'));

                    $tgl2 = date('Y-m-d', strtotime('+1 years', strtotime($tgl1))); //operasi penjumlahan tanggal sebanyak 6 hari
                    ?>
                    <b><?php echo tgl_indo($tgl2) ?></b>
                </td>
            </tr>
        </table>
    </div>
</div>