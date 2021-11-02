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

    .tbl-kop tr td.td-kop {
        border: 1px solid #000000;
    }

    .tbl-tht tr th,
    .tbl-tht tr td {
        border: 1px solid #000000;
        vertical-align: top;
        height: 2px !important;
        font-size: 0.9em;
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

    <table autosize="1" class="tbl-kop" style="width: 100%;">
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
        <h3 style="font-weight: bold; margin-top: 0px;">PEMERIKSAAN KESEHATAN TENAGA KERJA</h3>
    </div>

    <table class="tbl-tht" style="width: 100%;">
        <thead>
            <tr>
                <th colspan="7" style="text-align: left;">I. TELINGA</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="3"></td>
                <td colspan="2" style="text-align: center;">TELINGA KANAN</td>
                <td colspan="2" style="text-align: center;">TELINGA KIRI</td>
            </tr>
            <tr>
                <td rowspan="8">1</td>
                <td>Test Garpu Tala</td>
                <td></td>
                <td colspan="4"></td>
            </tr>
            <tr>
                <td>Rinne</td>
                <td>:</td>
                <td><?= $modelGarpuTala->tl_test_garpu_tala_rinne_telinga_kanan == 'Negatif (AC < BC)' ? '&#9632;' : '&#9633;' ?> Negatif (AC < BC)</td> <td><?= $modelGarpuTala->tl_test_garpu_tala_rinne_telinga_kanan == 'Positif (AC > BC)' ? '&#9632;' : '&#9633;' ?> Positif (AC > BC)</td>
                <td><?= $modelGarpuTala->tl_test_garpu_tala_rinne_telinga_kiri == 'Negatif (AC < BC)' ? '&#9632;' : '&#9633;' ?> Negatif (AC < BC)</td> <td><?= $modelGarpuTala->tl_test_garpu_tala_rinne_telinga_kiri == 'Positif (AC > BC)' ? '&#9632;' : '&#9633;' ?> Positif (AC > BC)</td>
            </tr>
            <tr>
                <td>Weber</td>
                <td>:</td>
                <td><?= $modelGarpuTala->tl_weber_telinga_kanan == 'Tidak Ada Lateralisasi' ? '&#9632;' : '&#9633;' ?> Tidak Ada Lateralisasi</td>
                <td><?= $modelGarpuTala->tl_weber_telinga_kanan == 'Lateralisasi Kanan' ? '&#9632;' : '&#9633;' ?> Lateralisasi Kanan</td>
                <td><?= $modelGarpuTala->tl_weber_telinga_kiri == 'Tidak Ada Lateralisasi' ? '&#9632;' : '&#9633;' ?> Tidak Ada Lateralisasi</td>
                <td><?= $modelGarpuTala->tl_weber_telinga_kiri == 'Lateralisasi Kanan' ? '&#9632;' : '&#9633;' ?> Lateralisasi Kanan</td>
            </tr>
            <tr>
                <td rowspan="2">Swabach</td>
                <td rowspan="2">:</td>
                <td><?= $modelGarpuTala->tl_swabach_telinga_kanan == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td><?= $modelGarpuTala->tl_swabach_telinga_kanan == 'Tidak Normal' ? '&#9632;' : '&#9633;' ?> Tidak Normal</td>
                <td><?= $modelGarpuTala->tl_swabach_telinga_kiri == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td><?= $modelGarpuTala->tl_swabach_telinga_kiri == 'Tidak Normal' ? '&#9632;' : '&#9633;' ?> Tidak Normal</td>
            </tr>
            <tr>
                <td><?= $modelGarpuTala->tl_swabach_telinga_kanan == 'Memendek' ? '&#9632;' : '&#9633;' ?> Memendek</td>
                <td><?= $modelGarpuTala->tl_swabach_telinga_kanan == 'Memanjang' ? '&#9632;' : '&#9633;' ?> Memanjang</td>
                <td><?= $modelGarpuTala->tl_swabach_telinga_kiri == 'Memendek' ? '&#9632;' : '&#9633;' ?> Memendek</td>
                <td><?= $modelGarpuTala->tl_swabach_telinga_kiri == 'Memanjang' ? '&#9632;' : '&#9633;' ?> Memanjang</td>
            </tr>
            <tr>
                <td>Bing</td>
                <td>:</td>
                <td><?= $modelGarpuTala->tl_bing_telinga_kanan == 'Bertambah Keras' ? '&#9632;' : '&#9633;' ?> Bertambah Keras</td>
                <td><?= $modelGarpuTala->tl_bing_telinga_kanan == 'Tidak Bertambah Keras' ? '&#9632;' : '&#9633;' ?> Tidak Bertambah Keras</td>
                <td><?= $modelGarpuTala->tl_bing_telinga_kiri == 'Bertambah Keras' ? '&#9632;' : '&#9633;' ?> Bertambah Keras</td>
                <td><?= $modelGarpuTala->tl_bing_telinga_kiri == 'Tidak Bertambah Keras' ? '&#9632;' : '&#9633;' ?> Tidak Bertambah Keras</td>
            </tr>
            <tr>
                <td><b>Kesan</b></td>
                <td>:</td>
                <td colspan="4" style="font-weight: bold;"><?= $modelGarpuTala->kesan ?></td>
            </tr>
            <tr>
                <td><b>Kesimpulan</b></td>
                <td style="text-align: center;">:</td>
                <td colspan="4" style="font-weight: bold;">
                    <?php
                    if ($modelGarpuTala->kesan == 'Normal') {
                        echo $modelGarpuTala->kesan;
                        echo '<br>';
                    } else {
                        $penata = McuPenatalaksanaanMcu::find()
                            ->where(['jenis' => 'spesialis_tht_garpu_tala'])
                            ->andWhere(['id_fk' => $modelGarpuTala->id_spesialis_tht_garpu_tala])
                            ->all();
                        if ($penata) {
                            echo '
                                    <table class="tabel-penata" style="width: 100%; font-size: 11px;">
                                        <thead>
                                            <tr>
                                                <td style="width: 15px;">Jenis Permasalahan</td>
                                                <td style="width: 15px;">Rencana</td>
                                                <td style="width: 15px;">Target Waktu</td>
                                                <td style="width: 10px;">Hasil yang Diharapkan</td>
                                                <td style="width: 15px;">Keterangan</td>
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
                <td style="border-right: 1px solid #000000; padding-top: 15px;">
                    <!-- <br><br><br><br><br><br><br> -->
                    <!-- PEKANBARU, <?= Yii::$app->formatter->asDate(date('Y-m-d'), 'php:d F Y') ?> -->
                </td>
            </tr>
            <tr>
                <td style="border-left: 1px solid #000000;"></td>
                <td style="text-align: center;border-right: 1px solid #000000;">
                    PEKANBARU, <?= Yii::$app->formatter->asDate(date('Y-m-d'), 'php:d F Y') ?>
                    <br>
                    DOKTER PEMERIKSA
                </td>
            </tr>
            <tr>
                <td class="col-1" style="border-left: 1px solid #000000;"></td>
                <td class="col-2" style="text-align: center;border-right: 1px solid #000000;">
                    <br><br><br><br>
                    <b>
                        <?= $modelGarpuTala->createdByTeks->pegawai->nama ?>
                    </b>
                    <br>
                    <?= $modelGarpuTala->createdByTeks->pegawai->no ?>
                </td>
            </tr>
        </tbody>
    </table>

</div>