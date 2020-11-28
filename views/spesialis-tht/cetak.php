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
        padding: 3.800;
    }

    .tbl-kop tr td.td-kop {
        border: 1px solid #000000;
    }

    .tabel-tht tr th,
    .tabel-tht tr td {
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

    .tabel-kesimpulan tr th,
    .tabel-kesimpulan tr td {
        border: 1px solid #000000;
    }

    .tbl-hasil td.kotakin {
        border: 1px solid #000000;
    }

    tr.tr-tengah td {
        height: 18;
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
        <h3 style="font-weight: bold; margin-top: 0px;">PEMERIKSAAN THT KESEHATAN TENAGA KERJA</h3>
    </div>

    <table class="tabel-tht" style="width: 100%; font-size: 11.5px;">
        <tbody>
            <tr>
                <th colspan="7" style="text-align: left;">I. TELINGA</th>
            </tr>
            <tr>
                <th colspan="3"></th>
                <th colspan="2">TELINGA KANAN</th>
                <th colspan="2">TELINGA KIRI</th>
            </tr>
            <tr>
                <td style="width: 2%;">1</td>
                <td style="width: 28%;">Daun Telinga</td>
                <td style="width: 2%;"> : </td>
                <td style="width: 17%;"> <?= $model->tl_daun_telinga_kanan == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal </td>
                <td style="width: 17%;"> <?= $model->tl_daun_telinga_kanan == 'Tidak Normal' ? '&#9632;' : '&#9633;' ?> Tidak Normal </td>
                <td style="width: 17%;"> <?= $model->tl_daun_telinga_kiri == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal </td>
                <td style="width: 17%;"> <?= $model->tl_daun_telinga_kiri == 'Tidak Normal' ? '&#9632;' : '&#9633;' ?> Tidak Normal </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Liang Telinga</td>
                <td> : </td>
                <td> <?= $model->tl_liang_telinga_kanan == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal </td>
                <td> <?= $model->tl_liang_telinga_kanan == 'Tidak Normal' ? '&#9632;' : '&#9633;' ?> Tidak Normal </td>
                <td> <?= $model->tl_liang_telinga_kiri == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal </td>
                <td> <?= $model->tl_liang_telinga_kiri == 'Tidak Normal' ? '&#9632;' : '&#9633;' ?> Tidak Normal </td>
            </tr>
            <tr>
                <td rowspan="2">3</td>
                <td rowspan="2">Serumen</td>
                <td rowspan="2"> : </td>
                <td> <?= $model->tl_serumen_telinga_kanan == 'Tidak Ada' ? '&#9632;' : '&#9633;' ?> Tidak Ada </td>
                <td> <?= $model->tl_serumen_telinga_kanan == 'Ada Serumen' ? '&#9632;' : '&#9633;' ?> Ada Serumen </td>
                <td> <?= $model->tl_serumen_telinga_kiri == 'Tidak Ada' ? '&#9632;' : '&#9633;' ?> Tidak Ada </td>
                <td> <?= $model->tl_serumen_telinga_kiri == 'Ada Serumen' ? '&#9632;' : '&#9633;' ?> Ada Serumen </td>
            </tr>
            <tr>
                <td></td>
                <td> <?= $model->tl_serumen_telinga_kanan == 'Menyumbat (Prop)' ? '&#9632;' : '&#9633;' ?> Menyumbat (Prop) </td>
                <td></td>
                <td> <?= $model->tl_serumen_telinga_kiri == 'Menyumbat (Prop)' ? '&#9632;' : '&#9633;' ?> Menyumbat (Prop) </td>
            </tr>
            <tr>
                <td rowspan="2">4</td>
                <td rowspan="2">Membrana Timpani</td>
                <td rowspan="2"> : </td>
                <td> <?= $model->tl_membrana_timpani_telinga_kanan == 'Intak' ? '&#9632;' : '&#9633;' ?> Intak </td>
                <td> <?= $model->tl_membrana_timpani_telinga_kanan == 'Tidak Intak' ? '&#9632;' : '&#9633;' ?> Tidak Intak </td>
                <td> <?= $model->tl_membrana_timpani_telinga_kiri == 'Intak' ? '&#9632;' : '&#9633;' ?> Intak </td>
                <td> <?= $model->tl_membrana_timpani_telinga_kiri == 'Tidak Intak' ? '&#9632;' : '&#9633;' ?> Tidak Intak </td>
            </tr>
            <tr>
                <td></td>
                <td> <?= $model->tl_membrana_timpani_telinga_kanan == 'Lainnya' ? '&#9632;' : '&#9633;' ?> Lainnya </td>
                <td></td>
                <td> <?= $model->tl_membrana_timpani_telinga_kiri == 'Lainnya' ? '&#9632;' : '&#9633;' ?> Lainnya </td>
            </tr>
            <?php
            if ($model->tl_test_garpu_tala_periksa == 'Tidak') {
                echo '
                    <tr>
                        <td rowspan="1">5</td>
                        <th style="text-align: left;">Tes Garpu Tala</th>
                        <td> : </td>
                        <th colspan="4" style="text-align: left;">Tidak Melakukan Pemeriksaan</th>
                    </tr>
                ';
            } else {
            ?>

                <tr>
                    <td rowspan="6">5</td>
                    <th colspan="6" style="text-align: left;">Tes Garpu Tala</th>
                </tr>
                <tr>
                    <td>Rinne</td>
                    <td> : </td>
                    <td> <?= $model->tl_test_garpu_tala_rinne_telinga_kanan == 'Negatif (AC < BC)' ? '&#9632;' : '&#9633;' ?> Negatif (AC < BC) </td> <td> <?= $model->tl_test_garpu_tala_rinne_telinga_kanan == 'Positif (AC > BC)' ? '&#9632;' : '&#9633;' ?> Positif (AC > BC) </td>
                    <td> <?= $model->tl_test_garpu_tala_rinne_telinga_kiri == 'Negatif (AC < BC)' ? '&#9632;' : '&#9633;' ?> Negatif (AC < BC) </td> <td> <?= $model->tl_test_garpu_tala_rinne_telinga_kiri == 'Positif (AC > BC)' ? '&#9632;' : '&#9633;' ?> Positif (AC > BC) </td>
                </tr>
                <tr>
                    <td>Weber</td>
                    <td> : </td>
                    <td> <?= $model->tl_weber_telinga_kanan == 'Tidak Ada Lateralisasi' ? '&#9632;' : '&#9633;' ?> Tidak Ada Lateralisasi </td>
                    <td> <?= $model->tl_weber_telinga_kanan == 'Lateralisasi Kanan' ? '&#9632;' : '&#9633;' ?> Lateralisasi Kanan </td>
                    <td> <?= $model->tl_weber_telinga_kiri == 'Tidak Ada Lateralisasi' ? '&#9632;' : '&#9633;' ?> Tidak Ada Lateralisasi </td>
                    <td> <?= $model->tl_weber_telinga_kiri == 'Lateralisasi Kanan' ? '&#9632;' : '&#9633;' ?> Lateralisasi Kanan </td>
                </tr>
                <tr>
                    <td rowspan="2">Swabach</td>
                    <td rowspan="2"> : </td>
                    <td> <?= $model->tl_swabach_telinga_kanan == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal </td>
                    <td> <?= $model->tl_swabach_telinga_kanan == 'Tidak Normal' ? '&#9632;' : '&#9633;' ?> Tidak Normal </td>
                    <td> <?= $model->tl_swabach_telinga_kiri == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal </td>
                    <td> <?= $model->tl_swabach_telinga_kiri == 'Tidak Normal' ? '&#9632;' : '&#9633;' ?> Tidak Normal </td>
                </tr>
                <tr>
                    <td> <?= $model->tl_swabach_telinga_kanan == 'Memendek' ? '&#9632;' : '&#9633;' ?> Memendek </td>
                    <td> <?= $model->tl_swabach_telinga_kanan == 'Memanjang' ? '&#9632;' : '&#9633;' ?> Memanjang </td>
                    <td> <?= $model->tl_swabach_telinga_kiri == 'Memendek' ? '&#9632;' : '&#9633;' ?> Memendek </td>
                    <td> <?= $model->tl_swabach_telinga_kiri == 'Memanjang' ? '&#9632;' : '&#9633;' ?> Memanjang </td>
                </tr>
                <tr>
                    <td>Bing</td>
                    <td> : </td>
                    <td> <?= $model->tl_bing_telinga_kanan == 'Bertambah Keras' ? '&#9632;' : '&#9633;' ?> Bertambah Keras </td>
                    <td> <?= $model->tl_bing_telinga_kanan == 'Tidak Bertambah Keras' ? '&#9632;' : '&#9633;' ?> Tidak Bertambah Keras </td>
                    <td> <?= $model->tl_bing_telinga_kiri == 'Bertambah Keras' ? '&#9632;' : '&#9633;' ?> Bertambah Keras </td>
                    <td> <?= $model->tl_bing_telinga_kiri == 'Tidak Bertambah Keras' ? '&#9632;' : '&#9633;' ?> Tidak Bertambah Keras </td>
                </tr>
            <?php
            }
            ?>

            <?php
            if ($model->tl_test_berbisik_periksa == 'Tidak') {
                echo '
                    <tr>
                        <td rowspan="1">6</td>
                        <th style="text-align: left;">Tes Berbisik</th>
                        <td> : </td>
                        <th colspan="4" style="text-align: left;">Tidak Melakukan Pemeriksaan</th>
                    </tr>
                ';
            } else {
            ?>

                <tr>
                    <td rowspan="2">6</td>
                    <td rowspan="2" style="font-weight: bold;">Test Berbisik</td>
                    <td style="text-align: center;">:</td>
                    <td><?= $model->tl_test_berbisik_telinga_kanan == 'Dalam Batas Normal' ? '&#9632;' : '&#9633;' ?> Dalam Batas Normal</td>
                    <td><?= $model->tl_test_berbisik_telinga_kanan == 'Tuli Ringan' ? '&#9632;' : '&#9633;' ?> Tuli Ringan</td>
                    <td><?= $model->tl_test_berbisik_telinga_kiri == 'Dalam Batas Normal' ? '&#9632;' : '&#9633;' ?> Dalam Batas Normal</td>
                    <td><?= $model->tl_test_berbisik_telinga_kiri == 'Tuli Ringan' ? '&#9632;' : '&#9633;' ?> Tuli Ringan</td>
                </tr>
                <tr>
                    <td></td>
                    <td><?= $model->tl_test_berbisik_telinga_kanan == 'Tuli Sedang' ? '&#9632;' : '&#9633;' ?> Tuli Sedang</td>
                    <td><?= $model->tl_test_berbisik_telinga_kanan == 'Tuli Berat' ? '&#9632;' : '&#9633;' ?> Tuli Berat</td>
                    <td><?= $model->tl_test_berbisik_telinga_kiri == 'Tuli Sedang' ? '&#9632;' : '&#9633;' ?> Tuli Sedang</td>
                    <td><?= $model->tl_test_berbisik_telinga_kiri == 'Tuli Berat' ? '&#9632;' : '&#9633;' ?> Tuli Berat</td>
                </tr>

            <?php
            }
            ?>

        </tbody>
    </table>

    <?php
    if ($model->tl_audiometri_periksa == 'Tidak') {
        echo '
        <table class="tabel-tht" style="width: 100%; font-size: 11.5px;">
            <tbody>
                    <tr>
                        <td style="width: 2%;"  rowspan="1">7</td>
                        <th style="width: 28%; text-align: left;">Audiometri</th>
                        <td style="width: 2%;" > : </td>
                        <th  colspan="4" style="text-align: left;">Tidak Melakukan Pemeriksaan</th>
                    </tr>
            </tbody>
        </table>
                ';
    } else {
    ?>

        <table class="tbl-hasil" style="width: 100%;">
            <tbody>

                <tr>
                    <td class="kotakin" style="background-color: #ccced0; text-align: left;" colspan="19"><b>7. Audiometri</b></td>
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
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->ac_125_kanan ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->ac_250_kanan ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->ac_500_kanan ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->ac_1000_kanan ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->ac_2000_kanan ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->ac_3000_kanan ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->ac_4000_kanan ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->ac_6000_kanan ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->ac_8000_kanan ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->ac_125_kiri ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->ac_250_kiri ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->ac_500_kiri ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->ac_1000_kiri ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->ac_2000_kiri ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->ac_3000_kiri ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->ac_4000_kiri ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->ac_6000_kiri ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->ac_8000_kiri ?></td>
                </tr>
                <tr>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;">BC</td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->bc_125_kanan ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->bc_250_kanan ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->bc_500_kanan ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->bc_1000_kanan ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->bc_2000_kanan ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->bc_3000_kanan ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->bc_4000_kanan ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->bc_6000_kanan ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->bc_8000_kanan ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->bc_125_kiri ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->bc_250_kiri ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->bc_500_kiri ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->bc_1000_kiri ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->bc_2000_kiri ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->bc_3000_kiri ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->bc_4000_kiri ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->bc_6000_kiri ?></td>
                    <td class="kotakin" style="padding: 2px; font-size: 8px; width: 12px;"><?= $modelAudiometri->bc_8000_kiri ?></td>
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
                    <td style="width: 27.5%;"><?= $modelAudiometri->rata_kanan_ac ?></td>
                    <td style="width: 22.5%; text-align: center;">AC</td>
                    <td style="width: 25%;"><?= $modelAudiometri->rata_kiri_ac ?></td>
                </tr>
                <tr>
                    <td style="text-align: center;">BC</td>
                    <td><?= $modelAudiometri->rata_kanan_bc ?></td>
                    <td style="text-align: center;">BC</td>
                    <td><?= $modelAudiometri->rata_kiri_bc ?></td>
                </tr>
                <tr>
                    <td style="text-align: center;">Kanan</td>
                    <td><?= $modelAudiometri->kesimpulan_kanan ?></td>
                    <td style="text-align: center;">Kiri</td>
                    <td><?= $modelAudiometri->kesimpulan_kiri ?></td>
                </tr>
                <tr>
                    <th style="text-align: left; vertical-align: top;">Catatan</th>
                    <td colspan="3"><?= $modelAudiometri->kesimpulan ?></td>
                </tr>
                <tr>
                    <th style="text-align: left;">Kesan</th>
                    <td colspan="3"><?= $modelAudiometri->kesan ?></td>
                </tr>
            </tbody>
        </table>

    <?php
    }
    ?>

    <table class="tabel-tht" style="width: 100%; font-size: 11.5px;">
        <tbody>
            <tr>
                <td style="width: 2%;">8</td>
                <td style="width: 28%;">Lain-lain</td>
                <td style="width: 2%;"> : </td>
                <td rowspan="0" colspan="4"><?= $model->tl_lain_lain ?></td>
            </tr>
            <tr>
                <th colspan="7" style="text-align: left;">II. HIDUNG</th>
            </tr>
            <tr>
                <td style="width: 2%;">1</td>
                <td style="width: 28%;">Meatus Nasi</td>
                <td style="width: 2%;"> : </td>
                <td style="width: 17%;"> <?= $model->hd_meatus_nasi == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal </td>
                <td style="width: 17%;"> <?= $model->hd_meatus_nasi == 'Tidak Normal' ? '&#9632;' : '&#9633;' ?> Tidak Normal </td>
                <td style="width: 17%;"> &nbsp; </td>
                <td style="width: 17%;"> &nbsp; </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Septum Nasi</td>
                <td> : </td>
                <td> <?= $model->hd_septum_nasi == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal </td>
                <td> <?= $model->hd_septum_nasi == 'Deviasi ke' ? '&#9632; Deviasi ke ' . $model->hd_septum_nasi_lainnya : '&#9633; Deviasi ke ...' ?></td>
                <td> &nbsp; </td>
                <td> &nbsp; </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Konka Nasal</td>
                <td> : </td>
                <td> <?= $model->hd_konka_nasal == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal </td>
                <td> <?= $model->hd_konka_nasal == 'Oedema Lubang Hidung' ? '&#9632; Oedema Lubang Hidung ' . $model->hd_konka_nasal_lainnya : '&#9633; Oedema Lubang Hidung ...' ?></td>
                <td> &nbsp; </td>
                <td> &nbsp; </td>
            </tr>
            <tr>
                <td>4</td>
                <td>Nyeri Ketok Sinus maksilar</td>
                <td> : </td>
                <td> <?= $model->hd_nyeri_ketok_sinus_maksilar == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal </td>
                <td> <?= $model->hd_nyeri_ketok_sinus_maksilar == 'Nyeri Tekan Positif di' ? '&#9632; Nyeri Tekan Positif di ' . $model->hd_nyeri_ketok_sinus_maksilar_lainnya : '&#9633; Nyeri Tekan Positif di ...' ?></td>
                <td> &nbsp; </td>
                <td> &nbsp; </td>
            </tr>
            <tr>
                <td>5</td>
                <td>Penciuman</td>
                <td> : </td>
                <td> <?= $model->hd_penciuman == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal </td>
                <td> <?= $model->hd_penciuman == 'Tidak Normal' ? '&#9632;' : '&#9633;' ?> Tidak Normal </td>
                <td> &nbsp; </td>
                <td> &nbsp; </td>
            </tr>
            <tr>
                <td>6</td>
                <td>Lain-lain</td>
                <td> : </td>
                <td rowspan="1" colspan="4"><?= $model->hd_lain_lain ?></td>
            </tr>
            <tr>
                <th colspan="7" style="text-align: left;">III. TENGGOROKAN</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Pharynx</td>
                <td> : </td>
                <td> <?= $model->tg_pharynx == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal </td>
                <td> <?= $model->tg_pharynx == 'Hiperemis' ? '&#9632;' : '&#9633;' ?> Hiperemis </td>
                <td> <?= $model->tg_pharynx == 'Granulasi' ? '&#9632;' : '&#9633;' ?> Granulasi </td>
                <td> &nbsp; </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Tonsil</td>
                <td> : </td>
                <td colspan="2" style="text-align: center;">
                    <?php
                    switch ($model->tg_tonsil_kanan) {
                        case 'T0':
                            $t0 = '&#9632;';
                            $t1 = '&#9633;';
                            $t2 = '&#9633;';
                            $t3 = '&#9633;';
                            break;
                        case 'T1':
                            $t0 = '&#9633;';
                            $t1 = '&#9632;';
                            $t2 = '&#9633;';
                            $t3 = '&#9633;';
                            break;
                        case 'T2':
                            $t0 = '&#9633;';
                            $t1 = '&#9633;';
                            $t2 = '&#9632;';
                            $t3 = '&#9633;';
                            break;
                        case 'T3':
                            $t0 = '&#9633;';
                            $t1 = '&#9633;';
                            $t2 = '&#9633;';
                            $t3 = '&#9632;';
                            break;

                        default:
                            $t0 = '&#9633;';
                            $t1 = '&#9633;';
                            $t2 = '&#9633;';
                            $t3 = '&#9633;';
                            break;
                    }
                    echo 'Kanan : ' . $t0 . ' T0 ' . $t1 . ' T1 ' . $t2 . ' T2 ' . $t3 . ' T3 ';
                    ?>
                </td>
                <td colspan="2" style="text-align: center;">
                    <?php
                    switch ($model->tg_tonsil_kiri) {
                        case 'T0':
                            $t0 = '&#9632;';
                            $t1 = '&#9633;';
                            $t2 = '&#9633;';
                            $t3 = '&#9633;';
                            break;
                        case 'T1':
                            $t0 = '&#9633;';
                            $t1 = '&#9632;';
                            $t2 = '&#9633;';
                            $t3 = '&#9633;';
                            break;
                        case 'T2':
                            $t0 = '&#9633;';
                            $t1 = '&#9633;';
                            $t2 = '&#9632;';
                            $t3 = '&#9633;';
                            break;
                        case 'T3':
                            $t0 = '&#9633;';
                            $t1 = '&#9633;';
                            $t2 = '&#9633;';
                            $t3 = '&#9632;';
                            break;

                        default:
                            $t0 = '&#9633;';
                            $t1 = '&#9633;';
                            $t2 = '&#9633;';
                            $t3 = '&#9633;';
                            break;
                    }
                    echo 'Kanan : ' . $t0 . ' T0 ' . $t1 . ' T1 ' . $t2 . ' T2 ' . $t3 . ' T3 ';
                    ?>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Ukuran</td>
                <td> : </td>
                <td> <?= $model->tg_ukuran_kanan == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal </td>
                <td> <?= $model->tg_ukuran_kanan == 'Hiperemis' ? '&#9632;' : '&#9633;' ?> Hiperemis </td>
                <td> <?= $model->tg_ukuran_kiri == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal </td>
                <td> <?= $model->tg_ukuran_kiri == 'Hiperemis' ? '&#9632;' : '&#9633;' ?> Hiperemis </td>
            </tr>
            <tr>
                <td>4</td>
                <td>Palatum</td>
                <td> : </td>
                <td> <?= $model->tg_palatum == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal </td>
                <td> <?= $model->tg_palatum == 'Tidak Normal' ? '&#9632;' : '&#9633;' ?> Tidak Normal </td>
                <td> &nbsp; </td>
                <td> &nbsp; </td>
            </tr>
            <tr>
                <td>5</td>
                <td>Lain-lain</td>
                <td> : </td>
                <td rowspan="1" colspan="4"><?= $model->tg_lain_lain ?></td>
            </tr>
            <!-- <tr>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
            </tr> -->
            <tr>
                <th colspan="2" rowspan="2" style="text-align: left;">VI. KESAN<br>&nbsp;<br>&nbsp;</th>
                <td rowspan="2"> : </td>
                <td rowspan="2" colspan="4"><?= $model->kesan ?></td>
            </tr>
        </tbody>
    </table>

    <table class="tbl-ttd" style="width: 100%;">
        <tbody>
            <tr>
                <td style="width: 60%;border-left: 1px solid #000000;"></td>
                <td style="border-right: 1px solid #000000; padding-top: 0px;">
                    <!-- <br><br><br><br><br><br><br> -->
                    <!-- PEKANBARU, <?= Yii::$app->formatter->asDate(date('Y-m-d'), 'php:d F Y') ?> -->
                </td>
            </tr>
            <tr>
                <td style="border-left: 1px solid #000000;"></td>
                <td style="text-align: center;border-right: 1px solid #000000;">
                    PEKANBARU, <?= Yii::$app->formatter->asDate($model->created_at, 'php:d F Y') ?>
                    <br>
                    DOKTER PEMERIKSA
                </td>
            </tr>
            <tr>
                <td class="col-1" style="border-left: 1px solid #000000;"></td>
                <td class="col-2" style="text-align: center;border-right: 1px solid #000000;">
                    <br><br>
                    <b>
                        <?= $model->createdByTeks->pegawai->nama ?>
                    </b>
                    <br>
                    <?= $model->createdByTeks->pegawai->no ?>
                </td>
            </tr>
        </tbody>
    </table>

</div>