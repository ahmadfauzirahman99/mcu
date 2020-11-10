<?php

use app\models\spesialis\BaseAR;
use app\models\spesialis\McuPenatalaksanaanMcu;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<style type="text/css">
    /* .mcu-spesialis-audiometri-form {
        font-size: 10px;
    } */

    table {
        border-collapse: collapse;
        font-size: 12px;
    }

    table td {
        padding: 4.800;
    }

    /* 
    .form-group {
        margin-bottom: 0px !important;
    }

    .tabel-tht label {
        margin-bottom: 0px !important;
    } */

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

    .tabel-data .td-tebal {
        font-weight: bold;
    }

    /* .tbl-ttd tr td.col-1 {
        border-left: 1px solid #000000;
        border-bottom: 1px solid #000000;
    }

    .tbl-ttd tr td.col-2 {
        border-bottom: 1px solid #000000;
    }

    .tbl-ttd tr td.col-3 {
        border-bottom: 1px solid #000000;
        border-right: 1px solid #000000;
    } */
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

    <div style="margin-top: 1rem; margin-bottom: 2rem; font-size: x-small;">
        <b>PERMINTAAN</b> : <?= $model->permintaan ?>
    </div>

    <div style="text-align: center; font-size: small;">
        <h3 style="font-weight: bold; margin-top: 0px;">HASIL UJI LATIH JANTUNG DENGAN BEBAN <i>(TREADMILL TEST)</i></h3>
    </div>

    <table class="tabel-data" style="width: 100%; margin-top: 1rem;">
        <tr>
            <td class="td-tebal" style="width: 30%;">Metode</td>
            <td style="width: 1%;">:</td>
            <td style="width: 69%;"><?= $model->metode ?></td>
        </tr>
        <tr>
            <td class="td-tebal">Lama Latihan</td>
            <td>:</td>
            <td><?= $model->lama_latihan ?> Menit</td>
        </tr>
        <tr>
            <td class="td-tebal">Test dihentikan karena</td>
            <td>:</td>
            <td><?= $model->test_dihentikan_karena ?></td>
        </tr>
        <tr>
            <td class="td-tebal">DJ Maksimal</td>
            <td>:</td>
            <td><?= $model->dj_maksimal ?></td>
        </tr>
        <tr>
            <td class="td-tebal">TD Maksimal</td>
            <td>:</td>
            <td><?= $model->td_maksimal ?></td>
        </tr>
        <tr>
            <td class="td-tebal" colspan="3">EKG</td>
        </tr>
        <tr>
            <td class="td-tebal" style="padding-left: 40px;">- Istirahat</td>
            <td>:</td>
            <td><?= $model->ekg_istirahat ?></td>
        </tr>
        <tr>
            <td class="td-tebal" style="padding-left: 40px;">- Latihan</td>
            <td>:</td>
            <td><?= $model->ekg_latihan ?></td>
        </tr>
        <tr>
            <td class="td-tebal" style="padding-left: 40px;">- Latihan</td>
            <td>:</td>
            <td><?= $model->ekg_latihan ?></td>
        </tr>
        <tr>
            <td colspan="3">
                <br><br>
            </td>
        </tr>
        <tr>
            <td class="td-tebal">Tingkat Kesegaran Jasmani</td>
            <td>:</td>
            <td><?= $model->tingkat_kesegaran_jasmani ?></td>
        </tr>
        <tr>
            <td class="td-tebal">Kelas Fungsional</td>
            <td>:</td>
            <td><?= $model->kelas_fungsional ?></td>
        </tr>
        <tr>
            <td class="td-tebal">Kapasitas Aerobik</td>
            <td>:</td>
            <td><?= $model->kapasitas_aerobik ?></td>
        </tr>
        <tr>
            <td class="td-tebal">Respon Hemodinamik</td>
            <td>:</td>
            <td><?= $model->respon_hemodinamik ?></td>
        </tr>
        <tr>
            <td colspan="3">
                <br><br>
            </td>
        </tr>
        <tr>
            <td class="td-tebal" colspan="3"><u>KESIMPULAN</u></td>
        </tr>
        <tr>
            <td class="td-tebal">Respon Iskemik</td>
            <td>:</td>
            <td><?= $model->respon_iskemik ?></td>
        </tr>
        <tr>
            <td class="td-tebal">Anjuran</td>
            <td>:</td>
            <td><?= $model->anjuran ?></td>
        </tr>
    </table>

    <table class="tbl-ttd" style="width: 100%;">
        <tbody>
            <tr>
                <td style="width: 60%;border-left: 1px solid #ffffff;"></td>
                <td style="border-right: 1px solid #ffffff;">
                    <br><br><br>
                    PEKANBARU, <?= Yii::$app->formatter->asDate($model->created_at, 'php:d F Y') ?>
                </td>
            </tr>
            <tr>
                <td style="border-left: 1px solid #ffffff;"></td>
                <td style="text-align: center;border-right: 1px solid #ffffff;">
                    DOKTER PEMERIKSA
                </td>
            </tr>
            <tr>
                <td class="col-1" style="border-left: 1px solid #ffffff;"></td>
                <td class="col-2" style="text-align: center;border-right: 1px solid #ffffff;">
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