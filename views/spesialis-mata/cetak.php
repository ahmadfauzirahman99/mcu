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

    .tbl-mata tr th,
    .tbl-mata tr.td-garis td {
        border: 1px solid #000000;
        vertical-align: top;
    }

    .tbl-mata tr td {
        vertical-align: top;
    }

    .tabel-penata tr th,
    .tabel-penata tr td {
        border: 1px solid #000000;
        vertical-align: top;
    }

    /* .tbl-gigi .angka-gigi {
        text-align: center;
    } */

    /* .tbl-oklusi tr td.col-1 {
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
        <h3 style="font-weight: bold; margin-top: 0px;">PEMERIKSAAN KESEHATAN MATA TENAGA KERJA</h3>
    </div>

    <table class="tbl-mata" style="width: 100%;">
        <thead>
            <tr>
                <th colspan="3"></th>
                <th colspan="3">MATA KANAN</th>
                <th colspan="3">MATA KIRI</th>
            </tr>
        </thead>
        <tbody>
            <tr class="td-garis">
                <td rowspan="2">1</td>
                <td rowspan="2">Persepsi Warna</td>
                <td>:</td>
                <td style="width: 98px;"><?= $model->persepsi_warna_mata_kanan == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td colspan="2"><?= $model->persepsi_warna_mata_kanan == 'Buta Warna Parsial' ? '&#9632;' : '&#9633;' ?> Buta Warna Parsial</td>
                <td style="width: 98px;"><?= $model->persepsi_warna_mata_kiri == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td colspan="2"><?= $model->persepsi_warna_mata_kiri == 'Buta Warna Parsial' ? '&#9632;' : '&#9633;' ?> Buta Warna Parsial</td>
            </tr>
            <tr class="td-garis">
                <td></td>
                <td></td>
                <td colspan="2"><?= $model->persepsi_warna_mata_kanan == 'Buta Warna Total' ? '&#9632;' : '&#9633;' ?> Buta Warna Total</td>
                <td></td>
                <td colspan="2"><?= $model->persepsi_warna_mata_kiri == 'Buta Warna Total' ? '&#9632;' : '&#9633;' ?> Buta Warna Total</td>
            </tr>
            <tr class="td-garis">
                <td>2</td>
                <td>Kelopak Mata</td>
                <td>:</td>
                <td><?= $model->kelopak_mata_kanan == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td colspan="2"><?= $model->kelopak_mata_kanan == 'Tidak Normal (Oedema)' ? '&#9632;' : '&#9633;' ?> Tidak Normal (Oedema)</td>
                <td><?= $model->kelopak_mata_kiri == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td colspan="2"><?= $model->kelopak_mata_kiri == 'Tidak Normal (Oedema)' ? '&#9632;' : '&#9633;' ?> Tidak Normal (Oedema)</td>
            </tr>
            <tr class="td-garis">
                <td rowspan="2">3</td>
                <td rowspan="2">Konjungtiva</td>
                <td>:</td>
                <td><?= $model->konjungtiva_mata_kanan == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td><?= $model->konjungtiva_mata_kanan == 'Hiperemesis' ? '&#9632;' : '&#9633;' ?> Hiperemesis</td>
                <td><?= $model->konjungtiva_mata_kanan == 'Sekret (-)' ? '&#9632;' : '&#9633;' ?> Sekret (-)</td>
                <td><?= $model->konjungtiva_mata_kiri == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td><?= $model->konjungtiva_mata_kiri == 'Hiperemesis' ? '&#9632;' : '&#9633;' ?> Hiperemesis</td>
                <td><?= $model->konjungtiva_mata_kiri == 'Sekret (-)' ? '&#9632;' : '&#9633;' ?> Sekret (-)</td>
            </tr>
            <tr class="td-garis">
                <td></td>
                <td></td>
                <td><?= $model->konjungtiva_mata_kanan == 'Pucat' ? '&#9632;' : '&#9633;' ?> Pucat</td>
                <td><?= $model->konjungtiva_mata_kanan == 'Pterigium' ? '&#9632;' : '&#9633;' ?> Pterigium</td>
                <td></td>
                <td><?= $model->konjungtiva_mata_kiri == 'Pucat' ? '&#9632;' : '&#9633;' ?> Pucat</td>
                <td><?= $model->konjungtiva_mata_kiri == 'Pterigium' ? '&#9632;' : '&#9633;' ?> Pterigium</td>
            </tr>
            <tr class="td-garis">
                <td>4</td>
                <td>Kesegarisan/Gerak Bola Mata</td>
                <td>:</td>
                <td><?= $model->kesegarisan_gerak_bola_mata_kanan == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td colspan="2"><?= $model->kesegarisan_gerak_bola_mata_kanan == 'Strabismus' ? '&#9632;' : '&#9633;' ?> Strabismus</td>
                <td><?= $model->kesegarisan_gerak_bola_mata_kiri == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td colspan="2"><?= $model->kesegarisan_gerak_bola_mata_kiri == 'Strabismus' ? '&#9632;' : '&#9633;' ?> Strabismus</td>
            </tr>
            <tr class="td-garis">
                <td>5</td>
                <td>Skiera</td>
                <td>:</td>
                <td><?= $model->skiera_mata_kanan == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td colspan="2"><?= $model->skiera_mata_kanan == 'Iketerik' ? '&#9632;' : '&#9633;' ?> Iketerik</td>
                <td><?= $model->skiera_mata_kiri == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td colspan="2"><?= $model->skiera_mata_kiri == 'Iketerik' ? '&#9632;' : '&#9633;' ?> Iketerik</td>
            </tr>
            <tr class="td-garis">
                <td>6</td>
                <td>Lensamata</td>
                <td>:</td>
                <td><?= $model->lensa_mata_kanan == 'Tidak Keruh' ? '&#9632;' : '&#9633;' ?> Tidak Keruh</td>
                <td colspan="2"><?= $model->lensa_mata_kanan == 'Keruh' ? '&#9632;' : '&#9633;' ?> Keruh</td>
                <td><?= $model->lensa_mata_kiri == 'Tidak Keruh' ? '&#9632;' : '&#9633;' ?> Tidak Keruh</td>
                <td colspan="2"><?= $model->lensa_mata_kiri == 'Keruh' ? '&#9632;' : '&#9633;' ?> Keruh</td>
            </tr>
            <tr class="td-garis">
                <td>7</td>
                <td>Kornea</td>
                <td>:</td>
                <td><?= $model->kornea_mata_kanan == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td colspan="2"><?= $model->kornea_mata_kanan == 'Tidak Normal' ? '&#9632;' : '&#9633;' ?> Tidak Normal</td>
                <td><?= $model->kornea_mata_kiri == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td colspan="2"><?= $model->kornea_mata_kiri == 'Tidak Normal' ? '&#9632;' : '&#9633;' ?> Tidak Normal</td>
            </tr>
            <tr class="td-garis">
                <td>8</td>
                <td>Bulu Mata</td>
                <td>:</td>
                <td><?= $model->bulu_mata_kanan == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td colspan="2"><?= $model->bulu_mata_kanan == 'Tidak Normal' ? '&#9632;' : '&#9633;' ?> Tidak Normal</td>
                <td><?= $model->bulu_mata_kiri == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td colspan="2"><?= $model->bulu_mata_kiri == 'Tidak Normal' ? '&#9632;' : '&#9633;' ?> Tidak Normal</td>
            </tr>
            <tr class="td-garis">
                <td>9</td>
                <td>Tekanan Bola Mata</td>
                <td>:</td>
                <td><?= $model->tekanan_bola_mata_kanan == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td colspan="2"><?= $model->tekanan_bola_mata_kanan == 'Tidak Normal' ? '&#9632;' : '&#9633;' ?> Tidak Normal</td>
                <td><?= $model->tekanan_bola_mata_kiri == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td colspan="2"><?= $model->tekanan_bola_mata_kiri == 'Tidak Normal' ? '&#9632;' : '&#9633;' ?> Tidak Normal</td>
            </tr>
            <tr class="td-garis">
                <td>10</td>
                <td>Penglihatan 3 Dimensi</td>
                <td>:</td>
                <td><?= $model->penglihatan_3_dimensi_mata_kanan == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td colspan="2"><?= $model->penglihatan_3_dimensi_mata_kanan == 'Tidak Normal' ? '&#9632;' : '&#9633;' ?> Tidak Normal</td>
                <td><?= $model->penglihatan_3_dimensi_mata_kiri == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td colspan="2"><?= $model->penglihatan_3_dimensi_mata_kiri == 'Tidak Normal' ? '&#9632;' : '&#9633;' ?> Tidak Normal</td>
            </tr>
            <tr class="td-garis">
                <td rowspan="3">11</td>
                <td>Visus Mata</td>
                <td></td>
                <td colspan="3" style="text-align: center; font-weight: bold;">MATA KANAN</td>
                <td colspan="3" style="text-align: center; font-weight: bold;">MATA KIRI</td>
            </tr>
            <tr class="td-garis">
                <td>a. Tanpa Koreksi</td>
                <td>:</td>
                <td colspan="3"><?= $model->virus_mata_tanpa_koreksi_mata_kanan ?></td>
                <td colspan="3"><?= $model->virus_mata_tanpa_koreksi_mata_kiri ?></td>
            </tr>
            <tr class="td-garis">
                <td>b. Dengan Koreksi</td>
                <td>:</td>
                <td colspan="3"><?= $model->virus_mata_dengan_koreksi_mata_kanan ?></td>
                <td colspan="3"><?= $model->virus_mata_dengan_koreksi_mata_kiri ?></td>
            </tr>
            <tr>
                <td style="border-left: 1px solid #000000;">12</td>
                <td>Lain-lain</td>
                <td>:</td>
                <td colspan="6" style="height: 90px; border-right: 1px solid #000000;"><?= $model->lain_lain ?></td>
            </tr>
            <tr>
                <td style="border-left: 1px solid #000000;">13</td>
                <td><b>KESAN</b></td>
                <td>:</td>
                <td colspan="6" style="height: 30px; border-right: 1px solid #000000;"><?= $model->kesan ?></td>
            </tr>
            <tr>
                <td style="border-left: 1px solid #000000;">14</td>
                <td><b>KESIMPULAN</b></td>
                <td>:</td>
                <td colspan="6" style="height: 90px; border-right: 1px solid #000000;">
                    <?php
                    if ($model->kesan == 'Normal') {
                        $model->kesimpulan == 'Normal';
                        echo $model->kesimpulan;
                    } else {
                        $penata = McuPenatalaksanaanMcu::find()
                            ->where(['jenis' => 'spesialis_mata'])
                            ->andWhere(['id_fk' => $model->id_spesialis_mata])
                            ->all();
                        if ($penata) {
                            echo '
                                    <table class="tabel-penata" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <td>Jenis Permasalahan</td>
                                                <td>Rencana</td>
                                                <td>Target Waktu</td>
                                                <td>Hasil yang Diharapkan</td>
                                                <td>Keterangan</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        ';
                            foreach ($penata as $key => $value) {
                                echo '
                                            <tr>
                                                <td>' . $value->jenis_permasalahan . '</td>
                                                <td>' . $value->rencana . '</td>
                                                <td>' . $value->target_waktu . '</td>
                                                <td>' . $value->hasil_yang_diharapkan . '</td>
                                                <td>' . $value->keterangan . '</td>
                                            </tr>
                                            ';
                            }
                            echo '
                                        </tbody>
                                    </table>
                                ';
                        }
                    }
                    ?>
                </td>
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