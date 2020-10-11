<?php

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
                                <td style="padding: 1px;"><?= $pasien->jenis_kelamin ?></td>
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
        <h3 style="font-weight: bold; margin-top: 0px;">PEMERIKSAAN KESEHATAN THT TENAGA KERJA</h3>
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
                <td>1</td>
                <td>Daun Telinga</td>
                <td>:</td>
                <td><?= $model->updated_by == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td><?= $model->updated_by == 'Tidak Normal' ? '&#9632;' : '&#9633;' ?> Tidak Normal</td>
                <td><?= $model->updated_by == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td><?= $model->updated_by == 'Tidak Normal' ? '&#9632;' : '&#9633;' ?> Tidak Normal</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Liang Telinga</td>
                <td>:</td>
                <td><?= $model->updated_by == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td><?= $model->updated_by == 'Tidak Normal' ? '&#9632;' : '&#9633;' ?> Tidak Normal</td>
                <td><?= $model->updated_by == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td><?= $model->updated_by == 'Tidak Normal' ? '&#9632;' : '&#9633;' ?> Tidak Normal</td>
            </tr>
            <tr>
                <td rowspan="2">3</td>
                <td rowspan="2">Serumen</td>
                <td>:</td>
                <td><?= $model->updated_by == 'Tidak Ada' ? '&#9632;' : '&#9633;' ?> Tidak Ada</td>
                <td><?= $model->updated_by == 'Ada Serumen' ? '&#9632;' : '&#9633;' ?> Ada Serumen</td>
                <td><?= $model->updated_by == 'Tidak Ada' ? '&#9632;' : '&#9633;' ?> Tidak Ada</td>
                <td><?= $model->updated_by == 'Ada Serumen' ? '&#9632;' : '&#9633;' ?> Ada Serumen</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><?= $model->updated_by == 'Menyumbat (Prop)' ? '&#9632;' : '&#9633;' ?> Menyumbat (Prop)</td>
                <td></td>
                <td><?= $model->updated_by == 'Menyumbat (Prop)' ? '&#9632;' : '&#9633;' ?> Menyumbat (Prop)</td>
            </tr>
            <tr>
                <td rowspan="2">4</td>
                <td rowspan="2">Membrana Timpani</td>
                <td>:</td>
                <td><?= $model->updated_by == 'Intak' ? '&#9632;' : '&#9633;' ?> Intak</td>
                <td><?= $model->updated_by == 'Tidak Intak' ? '&#9632;' : '&#9633;' ?> Tidak Intak</td>
                <td><?= $model->updated_by == 'Intak' ? '&#9632;' : '&#9633;' ?> Intak</td>
                <td><?= $model->updated_by == 'Tidak Intak' ? '&#9632;' : '&#9633;' ?> Tidak Intak</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><?= $model->updated_by == 'Lainnya' ? '&#9632;' : '&#9633;' ?> Lainnya</td>
                <td></td>
                <td><?= $model->updated_by == 'Lainnya' ? '&#9632;' : '&#9633;' ?> Lainnya</td>
            </tr>
            <tr>
                <td rowspan="3">5</td>
                <td rowspan="2">Test Berbisik</td>
                <td>:</td>
                <td><?= $modelBerbisik->tl_test_berbisik_telinga_kanan == 'Dalam Batas Normal' ? '&#9632;' : '&#9633;' ?> Dalam Batas Normal</td>
                <td><?= $modelBerbisik->tl_test_berbisik_telinga_kanan == 'Tuli Ringan' ? '&#9632;' : '&#9633;' ?> Tuli Ringan</td>
                <td><?= $modelBerbisik->tl_test_berbisik_telinga_kiri == 'Dalam Batas Normal' ? '&#9632;' : '&#9633;' ?> Dalam Batas Normal</td>
                <td><?= $modelBerbisik->tl_test_berbisik_telinga_kiri == 'Tuli Ringan' ? '&#9632;' : '&#9633;' ?> Tuli Ringan</td>
            </tr>
            <tr>
                <td></td>
                <td><?= $modelBerbisik->tl_test_berbisik_telinga_kanan == 'Tuli Sedang' ? '&#9632;' : '&#9633;' ?> Tuli Sedang</td>
                <td><?= $modelBerbisik->tl_test_berbisik_telinga_kanan == 'Tuli Berat' ? '&#9632;' : '&#9633;' ?> Tuli Berat</td>
                <td><?= $modelBerbisik->tl_test_berbisik_telinga_kiri == 'Tuli Sedang' ? '&#9632;' : '&#9633;' ?> Tuli Sedang</td>
                <td><?= $modelBerbisik->tl_test_berbisik_telinga_kiri == 'Tuli Berat' ? '&#9632;' : '&#9633;' ?> Tuli Berat</td>
            </tr>
            <tr>
                <td><b>Kesan</b></td>
                <td>:</td>
                <td colspan="4" style="font-weight: bold;"><?= $modelBerbisik->kesan ?></td>
            </tr>
            <tr>
                <td rowspan="7">6</td>
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
                <th colspan="7" style="text-align: left;">II. HIDUNG</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Meatus Nasi</td>
                <td>:</td>
                <td><?= $model->updated_by == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td><?= $model->updated_by == 'Tidak Normal' ? '&#9632;' : '&#9633;' ?> Tidak Normal</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Septum Nasi</td>
                <td>:</td>
                <td><?= $model->updated_by == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td><?= $model->updated_by == 'Deviasi Ke' ? '&#9632;' : '&#9633;' ?> Deviasi Ke</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Konka Nasal</td>
                <td>:</td>
                <td><?= $model->updated_by == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td><?= $model->updated_by == 'Oedema Lubang Hidung...' ? '&#9632;' : '&#9633;' ?> Oedema Lubang Hidung...</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Nyeri Ketok Sinus Maksilar</td>
                <td>:</td>
                <td><?= $model->updated_by == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td><?= $model->updated_by == 'Nyeri Tekan Positif di...' ? '&#9632;' : '&#9633;' ?> Nyeri Tekan Positif di...</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>5</td>
                <td>Penciuman</td>
                <td>:</td>
                <td><?= $model->updated_by == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td><?= $model->updated_by == 'Tidak Normal' ? '&#9632;' : '&#9633;' ?> Tidak Normal</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>6</td>
                <td>Lain-lain</td>
                <td>:</td>
                <td colspan="4" rowspan="2"><?= $model->updated_by ?></td>
            </tr>
            <tr>
                <td colspan="3" style="height: 20;"></td>
            </tr>
            <tr>
                <th colspan="7" style="text-align: left;">III. TENGGOROKAN</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Pharynx</td>
                <td>:</td>
                <td><?= $model->updated_by == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td><?= $model->updated_by == 'Hiperemis' ? '&#9632;' : '&#9633;' ?> Hiperemis</td>
                <td><?= $model->updated_by == 'Granulasi' ? '&#9632;' : '&#9633;' ?> Granulasi</td>
                <td></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Tonsil</td>
                <td>:</td>
                <td colspan="2" style="text-align: center;"><b>Kanan</b> : T0 T1 T2 T3</td>
                <td colspan="2" style="text-align: center;"><b>Kiri</b> : T0 T1 T2 T3</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Ukuran</td>
                <td>:</td>
                <td><?= $model->updated_by == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td><?= $model->updated_by == 'Hiperemis' ? '&#9632;' : '&#9633;' ?> Hiperemis</td>
                <td><?= $model->updated_by == 'Normal' ? '&#9632;' : '&#9633;' ?> Normal</td>
                <td><?= $model->updated_by == 'Hiperemis' ? '&#9632;' : '&#9633;' ?> Hiperemis</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Lain-lain</td>
                <td>:</td>
                <td colspan="4" rowspan="2"><?= $model->updated_by ?></td>
            </tr>
            <tr>
                <td colspan="3" style="height: 20;"></td>
            </tr>
            <tr>
                <th colspan="2" style="text-align: left;">IV. AUDIOMETRI</th>
                <td>:</td>
                <td colspan="4" style="font-weight: bold;">
                    <?php
                    if ($modelAudiometri->kesan == 'Normal') {
                        echo $modelAudiometri->kesan;
                    } else {
                        $penata = McuPenatalaksanaanMcu::find()
                            ->where(['jenis' => 'spesialis_audiometri'])
                            ->andWhere(['id_fk' => $modelAudiometri->id_spesialis_audiometri])
                            ->all();
                        if ($penata) {
                            echo '
                                    <b>'.$modelAudiometri->kesan.'</b>
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
                    } ?>
                </td>
            </tr>
            <tr>
                <th colspan="2" style="text-align: left;">V. KESIMPULAN</th>
                <td>:</td>
                <td colspan="4">
                    <?php
                    if ($modelBerbisik->kesan == 'Normal') {
                        echo '<b>Berbisik</b>: '. $modelBerbisik->kesan;
                        echo '<br>';
                    } else {
                        $penata = McuPenatalaksanaanMcu::find()
                            ->where(['jenis' => 'spesialis_tht_berbisik'])
                            ->andWhere(['id_fk' => $model->id_spesialis_tht_berbisik])
                            ->all();
                        if ($penata) {
                            echo '
                                    <b>Berbisik</b>
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
                    // echo '<span></span>';
                    if ($modelGarpuTala->kesan == 'Normal') {
                        echo '<b>Garpu Tala</b>: '. $modelGarpuTala->kesan;
                        echo '<br>';
                    } else {
                        $penata = McuPenatalaksanaanMcu::find()
                            ->where(['jenis' => 'spesialis_tht_garpu_tala'])
                            ->andWhere(['id_fk' => $modelGarpuTala->id_spesialis_tht_garpu_tala])
                            ->all();
                        if ($penata) {
                            echo '
                                    <b>Garpu Tala</b>
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
                    PEKANBARU, <?= Yii::$app->formatter->asDate(date('Y-m-d'), 'php:d F Y') ?>
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
                <td class="col-2" style="text-align: center;border-right: 1px solid #000000; padding-bottom: 15px;">
                    <br><br><br><br>
                    drg. Nama Dokter
                    <br>
                    nip
                </td>
            </tr>
        </tbody>
    </table>

</div>