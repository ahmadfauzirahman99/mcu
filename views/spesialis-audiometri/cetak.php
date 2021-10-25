<?php

use app\models\spesialis\BaseAR;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<style type="text/css">
    table {
        border-collapse: collapse;
        font-size: 12px;
    }

    table td {
        padding: 4.800;
    }

    .tbl-kop tr td.td-kop {
        border: 1px solid #000000;
    }

    .tabel-kesimpulan tr th,
    .tabel-kesimpulan tr td {
        border: 1px solid #000000;
    }

    /* .tbl-gigi tr th,
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
    } */

    .tbl-judul td {
        text-align: center;
        font-weight: bold;
    }

    .tbl-judul td.kotakin {
        border: 1px solid #000000;
    }

    .tbl-hasil td.kotakin {
        border: 1px solid #000000;
    }

    tr.tr-tengah td {
        height: 18;
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

<div class="mcu-spesialis-audiometri-form">

    <table class="tbl-kop" style="width: 100%;">
        <tbody>
            <tr>
                <td class="td-kop" style="width: 50%;">
                    <img src="<?= Url::to('@web/img/kop.png') ?>" alt="" width="20px;">
                </td>
                <td class="td-kop" style="width: 50%;">
                    <table style="width: 100%; font-size: 11px;">
                        <tbody>
                            <tr>
                                <td style="padding: 1px; width: 35%;">Nama Pasien</td>
                                <td style="padding: 1px; width: 10px;">: </td>
                                <td style="padding: 1px;"><?= $pasien->nama ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 1px;">Nomor Rekam Medis</td>
                                <td style="padding: 1px;">: </td>
                                <td style="padding: 1px;"><?= $pasien->no_rekam_medik ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 1px;">Tanggal Lahir/Umur</td>
                                <td style="padding: 1px;">: </td>
                                <td style="padding: 1px;"><?= Yii::$app->formatter->asDate($pasien->tgl_lahir, 'long') . ' / ' . date_diff(date_create($pasien->tgl_lahir), date_create('now'))->y . ' Tahun' ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 1px;">Jenis Kelamin</td>
                                <td style="padding: 1px;">: </td>
                                <td style="padding: 1px;"><?= BaseAR::getJk($pasien->jenis_kelamin) ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 1px;" colspan="3">
                                    <br>
                                    <i>
                                        (Mohon diisi atau ditempelkan stiker jika ada)
                                    </i>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

    <div style="text-align: center; font-size: small;">
        <h3 style="font-weight: bold; margin-bottom: 0px;">UNIT MEDICAL CHECK UP</h3>
        <h3 style="font-weight: bold; margin-top: 0px;">PEMERIKSAAN KESEHATAN AUDIOMETRI</h3>
    </div>

    <table class="tbl-judul" style="width: 100%;">
        <tr>
            <td colspan="12" class="kotakin" style="width: 40%; background-color: #ccced0;"></td>
            <td colspan="3" class="kotakin" style="width: 20%;">AUDIOGRAM</td>
            <td colspan="8" class="kotakin" style="width: 40%; background-color: #ccced0;"></td>
        </tr>
        <tr>
            <td colspan="12" class="kotakin" style="background-color: #e8ecef;">R</td>
            <td colspan="3"></td>
            <td colspan="8" class="kotakin" style="background-color: #e8ecef;">L</td>
        </tr>
        <tr>
            <td colspan="12" class="" style="border-left: 1px solid #000000;" rowspan="2"></td>
            <td colspan="3" class="kotakin">RINNE</td>
            <td colspan="8" class="" style="border-right: 1px solid #000000;" rowspan="2"></td>
        </tr>
        <tr>
            <td class="kotakin">R</td>
            <td class="kotakin" colspan="2">L</td>
        </tr>
        <tr class="tr-tengah">
            <td class="" style="border-left: 1px solid #000000;"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class=""></td>
            <td class="kotakin" colspan="3"></td>
            <td class=""></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="" style="border-right: 1px solid #000000;"></td>
        </tr>
        <tr class="tr-tengah">
            <td class="" style="border-left: 1px solid #000000;"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class=""></td>
            <td class="" colspan="3" style="border-left: 1px solid #000000; border-right: 1px solid #000000;">
                WEBER
            </td>
            <td class=""></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="" style="border-right: 1px solid #000000;"></td>
        </tr>
        <tr class="tr-tengah">
            <td class="" style="border-left: 1px solid #000000;"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class=""></td>
            <td class="" colspan="3" style="border-left: 1px solid #000000; border-right: 1px solid #000000;">
                R / MED /L
            </td>
            <td class=""></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="" style="border-right: 1px solid #000000;"></td>
        </tr>
        <tr class="tr-tengah">
            <td class="" style="border-left: 1px solid #000000;"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class=""></td>
            <td class="" colspan="3" style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000;"></td>
            <td class=""></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="" style="border-right: 1px solid #000000;"></td>
        </tr>
        <tr class="tr-tengah">
            <td class="" style="border-left: 1px solid #000000;"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class=""></td>
            <td class="" colspan="3" style="border-left: 1px solid #000000; border-right: 1px solid #000000;"></td>
            <td class=""></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="" style="border-right: 1px solid #000000;"></td>
        </tr>
        <tr class="tr-tengah">
            <td class="" style="border-left: 1px solid #000000;"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class=""></td>
            <td class="kotakin" colspan="3">SISI</td>
            <td class=""></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="" style="border-right: 1px solid #000000;"></td>
        </tr>
        <tr class="tr-tengah">
            <td class="" style="border-left: 1px solid #000000;"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class=""></td>
            <td class="kotakin">FREK</td>
            <td class="kotakin">R</td>
            <td class="kotakin">L</td>
            <td class=""></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="" style="border-right: 1px solid #000000;"></td>
        </tr>
        <tr class="tr-tengah">
            <td class="" style="border-left: 1px solid #000000;"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class=""></td>
            <td class="kotakin">dB</td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class=""></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="" style="border-right: 1px solid #000000;"></td>
        </tr>
        <tr class="tr-tengah">
            <td class="" style="border-left: 1px solid #000000;"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class=""></td>
            <td class="kotakin">%</td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class=""></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="" style="border-right: 1px solid #000000;"></td>
        </tr>
        <tr class="tr-tengah">
            <td class="" style="border-left: 1px solid #000000;"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class=""></td>
            <td class="kotakin" colspan="3"></td>
            <td class=""></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="" style="border-right: 1px solid #000000;"></td>
        </tr>
        <tr class="tr-tengah">
            <td class="" style="border-left: 1px solid #000000;"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class=""></td>
            <td class="" colspan="3" style="border-left: 1px solid #000000; border-right: 1px solid #000000; font-size: 0.6em;">AUDIOGRAM KEY</td>
            <td class=""></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="" style="border-right: 1px solid #000000;"></td>
        </tr>
        <tr class="tr-tengah">
            <td class="" style="border-left: 1px solid #000000;"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class=""></td>
            <td colspan="3" style="border-left: 1px solid #000000; border-right: 1px solid #000000; font-size: 0.6em;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Right Left
            </td>
            <td class=""></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="kotakin"></td>
            <td class="" style="border-right: 1px solid #000000;"></td>
        </tr>
        <tr class="tr-tengah">
            <td class="" style="border-right: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000;" colspan="12"></td>
            <!-- <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; font-size: 0.6em;" colspan="0">
            AC<br>Unmasked
            <br>
            AC<br>Masked
            <br>
            BC<br>Mastoid<br>Unmasked
            <br>
            BC<br>Mastoid<br>Mastoid
        </td> -->
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000;" class="" colspan="3">
                <img src="<?= Url::to('@web/img/diagram_key.PNG') ?>" alt="" height="130">

            </td>
            <td class="" style="border-right: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000;" colspan="8"></td>
        </tr>
        <!-- <tr>
            <td class="kotakin" style="background-color: #ccced0; text-align: left;" colspan="23"><b>Hasil</b></td>
        </tr>
        <tr>
            <td class="kotakin" style="background-color: #e8ecef; text-align: left;" colspan="13"><b>Right/Kanan</b></td>
            <td class="kotakin" style="background-color: #e8ecef; text-align: left;" colspan="10"><b>Left/Kiri</b></td>
        </tr> -->
        <!-- <tr>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">125</td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">250</td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">500</td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;" >1000</td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">2000</td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">3000</td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">4000</td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">6000</td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;" >8000</td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">125</td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">250</td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">500</td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">1000</td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">2000</td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">3000</td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">4000</td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">6000</td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;" colspan="2">8000</td>
        </tr>
        <tr>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">AC</td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;" ></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;" colspan="2"></td>
        </tr>
        <tr>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">BC</td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;" ></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
            <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;" colspan="2"></td>
        </tr> -->

    </table>
    <table class="tbl-hasil" style="width: 100%;">
        <tbody>
            <tr>
                <td class="kotakin" style="background-color: #ccced0; text-align: left;" colspan="19"><b>Hasil</b></td>
            </tr>
            <tr>
                <td class="kotakin" style="background-color: #e8ecef; text-align: left;" colspan="10"><b>Right/Kanan</b></td>
                <td class="kotakin" style="background-color: #e8ecef; text-align: left;" colspan="9"><b>Left/Kiri</b></td>
            </tr>
            <tr>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">125</td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">250</td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">500</td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">1000</td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">2000</td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">3000</td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">4000</td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">6000</td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">8000</td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">125</td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">250</td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">500</td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">1000</td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">2000</td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">3000</td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">4000</td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">6000</td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">8000</td>
            </tr>
            <tr>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">AC</td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->ac_125_kanan ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->ac_250_kanan ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->ac_500_kanan ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->ac_1000_kanan ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->ac_2000_kanan ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->ac_3000_kanan ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->ac_4000_kanan ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->ac_6000_kanan ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->ac_8000_kanan ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->ac_125_kiri ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->ac_250_kiri ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->ac_500_kiri ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->ac_1000_kiri ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->ac_2000_kiri ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->ac_3000_kiri ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->ac_4000_kiri ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->ac_6000_kiri ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->ac_8000_kiri ?></td>
            </tr>
            <tr>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">BC</td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->bc_125_kanan ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->bc_250_kanan ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->bc_500_kanan ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->bc_1000_kanan ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->bc_2000_kanan ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->bc_3000_kanan ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->bc_4000_kanan ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->bc_6000_kanan ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->bc_8000_kanan ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->bc_125_kiri ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->bc_250_kiri ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->bc_500_kiri ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->bc_1000_kiri ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->bc_2000_kiri ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->bc_3000_kiri ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->bc_4000_kiri ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->bc_6000_kiri ?></td>
                <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $model->bc_8000_kiri ?></td>
            </tr>
        </tbody>
    </table>

    <table class="tabel-kesimpulan" style="width: 100%;">
        <tbody>
            <tr>
                <td colspan="4">
                    <br>
                </td>
            </tr>
            <tr>
                <th colspan="4" style="text-align: left;">Kesimpulan</th>
            </tr>
            <tr>
                <td style="width: 25%; text-align: center;">AC</td>
                <td style="width: 27.5%;"><?= $model->rata_kanan_ac ?></td>
                <td style="width: 22.5%; text-align: center;">AC</td>
                <td style="width: 25%;"><?= $model->rata_kiri_ac ?></td>
            </tr>
            <tr>
                <td style="text-align: center;">BC</td>
                <td><?= $model->rata_kanan_bc ?></td>
                <td style="text-align: center;">BC</td>
                <td><?= $model->rata_kiri_bc ?></td>
            </tr>
            <tr>
                <td style="text-align: center;">Kanan</td>
                <td><?= $model->kesimpulan_kanan ?></td>
                <td style="text-align: center;">Kiri</td>
                <td><?= $model->kesimpulan_kiri ?></td>
            </tr>
            <tr>
                <th style="text-align: left; vertical-align: top;">Catatan</th>
                <td colspan="3"><?= $model->kesimpulan ?></td>
            </tr>
            <tr>
                <th style="text-align: left;">Kesan</th>
                <td colspan="3"><?= $model->kesan ?></td>
            </tr>
        </tbody>
    </table>

    <table class="tbl-ttd" style="width: 100%;">
        <tbody>
            <tr>
                <td style="width: 60%;border-left: 1px solid #000000;"></td>
                <td style="border-right: 1px solid #000000;">
                    <br><br><br><br><br><br><br>
                    PEKANBARU, <?= Yii::$app->formatter->asDate($model->created_at, 'php:d F Y') ?>
                </td>
            </tr>
            <tr>
                <td style="border-left: 1px solid #000000;"></td>
                <td style="text-align: center;border-right: 1px solid #000000;">
                    DOKTER PEMERIKSA
                </td>
            </tr>
            <tr>
                <td class="col-1" style="border-left: 1px solid #000000;"></td>
                <td class="col-2" style="text-align: center;border-right: 1px solid #000000;">
                    <br><br><br><br>
                    <b>
                        <?= $model->updatedByTeks->pegawai->nama ?>
                    </b>
                    <br>
                    <?= $model->updatedByTeks->pegawai->no ?>
                </td>
            </tr>
        </tbody>
    </table>

</div>