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
        /* font-size: 12px; */
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

    <div style="margin-top: 1rem; margin-bottom: 2rem; font-size: small;">
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
            <td><?= $model->dj_maksimal ?> x/Menit</td>
        </tr>
        <tr>
            <td class="td-tebal">TD Maksimal</td>
            <td>:</td>
            <td><?= $model->td_maksimal ?> mmHg</td>
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
            <td style="font-style: italic;">
                <?php
                echo ($model->tingkat_kesegaran_jasmani == 'Low') ? $model->tingkat_kesegaran_jasmani : '<span style="text-decoration: line-through;"> Low </span>';
                echo ' / ';
                echo ($model->tingkat_kesegaran_jasmani == 'Fair') ? $model->tingkat_kesegaran_jasmani : '<span style="text-decoration: line-through;"> Fair </span>';
                echo ' / ';
                echo ($model->tingkat_kesegaran_jasmani == 'Average') ? $model->tingkat_kesegaran_jasmani : '<span style="text-decoration: line-through;"> Average </span>';
                echo ' / ';
                echo ($model->tingkat_kesegaran_jasmani == 'Good') ? $model->tingkat_kesegaran_jasmani : '<span style="text-decoration: line-through;"> Good </span>';
                echo ' / ';
                echo ($model->tingkat_kesegaran_jasmani == 'High') ? $model->tingkat_kesegaran_jasmani : '<span style="text-decoration: line-through;"> High </span>';
                if ($model->tingkat_kesegaran_jasmani != 'Low' && $model->tingkat_kesegaran_jasmani != 'Fair' && $model->tingkat_kesegaran_jasmani != 'Average' && $model->tingkat_kesegaran_jasmani != 'Good' && $model->tingkat_kesegaran_jasmani != 'High') {
                    echo ' / ';
                    echo $model->tingkat_kesegaran_jasmani;
                }
                ?>
            </td>
        </tr>
        <tr>
            <td class="td-tebal">Kelas Fungsional</td>
            <td>:</td>
            <td>
                <?php
                echo ($model->kelas_fungsional == 'III') ? $model->kelas_fungsional : '<span style="text-decoration: line-through;"> III </span>';
                echo '&nbsp; / &nbsp;';
                echo ($model->kelas_fungsional == 'II - III') ? $model->kelas_fungsional : '<span style="text-decoration: line-through;"> II - III </span>';
                echo '&nbsp; / &nbsp;';
                echo ($model->kelas_fungsional == 'II') ? $model->kelas_fungsional : '<span style="text-decoration: line-through;"> II </span>';
                echo '&nbsp; / &nbsp;';
                echo ($model->kelas_fungsional == 'I - II') ? $model->kelas_fungsional : '<span style="text-decoration: line-through;"> I - II </span>';
                echo '&nbsp; / &nbsp;';
                echo ($model->kelas_fungsional == 'NI') ? $model->kelas_fungsional : '<span style="text-decoration: line-through;"> NI </span>';
                if ($model->kelas_fungsional != 'Low' && $model->kelas_fungsional != 'II - III' && $model->kelas_fungsional != 'II' && $model->kelas_fungsional != 'I - II' && $model->kelas_fungsional != 'NI') {
                    echo '&nbsp; / &nbsp;';
                    echo $model->kelas_fungsional;
                }
                ?>
            </td>
        </tr>
        <tr>
            <td class="td-tebal">Kapasitas Aerobik</td>
            <td>:</td>
            <td><?= $model->kapasitas_aerobik ?> Mets</td>
        </tr>
        <tr>
            <td style="vertical-align: top;" class="td-tebal">Respon Hemodinamik</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;">
                <?php
                echo ($model->respon_hemodinamik == 'Normal') ? '- ' . $model->respon_hemodinamik . '<br>' : '<span style="text-decoration: line-through;"> - Normal<br> </span>';
                echo ($model->respon_hemodinamik == 'Hipotensif') ? '- ' . $model->respon_hemodinamik . '<br>' : '<span style="text-decoration: line-through;"> - Hipotensif<br> </span>';
                echo ($model->respon_hemodinamik == 'Hipertensif') ? '- ' . $model->respon_hemodinamik . '<br>' : '<span style="text-decoration: line-through;"> - Hipertensif<br> </span>';
                if ($model->respon_hemodinamik != 'Normal' && $model->respon_hemodinamik != 'Hipotensif' && $model->respon_hemodinamik != 'Hipertensif') {
                    echo $model->respon_hemodinamik;
                }
                ?>
            </td>
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
            <td style="vertical-align: top;" class="td-tebal">Respon Iskemik</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;">
                <?php
                echo ($model->respon_iskemik == 'Negatif / tidak menunjukkan tanda-tanda iskemia miokard reversibel') ? '- ' . $model->respon_iskemik . '<br>' : '<span style="text-decoration: line-through;"> - Negatif / tidak menunjukkan tanda-tanda iskemia miokard reversibel<br> </span>';
                echo ($model->respon_iskemik == 'Positif / menunjukkan tanda-tanda iskemia miokard reversibel, Ringan / Sedang / Berat') ? '- ' . $model->respon_iskemik . '<br>' : '<span style="text-decoration: line-through;"> - Positif / menunjukkan tanda-tanda iskemia miokard reversibel, Ringan / Sedang / Berat<br> </span>';
                echo ($model->respon_iskemik == 'Negatif / tidak menunjukkan tanda-tanda iskemia miokard reversibel' || $model->respon_iskemik == 'Positif / menunjukkan tanda-tanda iskemia miokard reversibel, Ringan / Sedang / Berat') ? '<span style="text-decoration: line-through;">- <i>Uninterpratable</i> / tidak dapat diinterprestasi karena : </span><br>' : '- <i>Uninterpratable</i> / tidak dapat diinterprestasi karena : <br> ' . $model->respon_iskemik;
                ?>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top;" class="td-tebal">Anjuran</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;">
                <?php
                echo ($model->anjuran == 'Jalan') ? $model->anjuran : '<span style="text-decoration: line-through;"> Jalan </span>';
                echo ' / ';
                echo ($model->anjuran == 'Jogging') ? $model->anjuran : '<span style="text-decoration: line-through;"> Jogging </span>';
                echo ' / ';
                echo ($model->anjuran == 'Sepeda') ? $model->anjuran : '<span style="text-decoration: line-through;"> Sepeda </span>';
                if ($model->anjuran == 'Jalan' || $model->anjuran == 'Jogging' || $model->anjuran == 'Sepeda') {
                    echo '<span style="text-decoration: line-through;">';
                    echo ' / Lainnya';
                    echo '</span>';
                } else {
                    echo ' / Lainnya';
                    echo '<br>';
                    echo $model->anjuran;
                }
                ?>
            </td>
        </tr>
        <tr>
            <td style="font-weight: bold;">Kesan</td>
            <td>: </td>
            <td>
                <?php
                echo $model->kesan;
                ?>
            </td>
        </tr>
        <tr>
            <td class="col-1" style="font-weight: bold;vertical-align:top">KESIMPULAN</td>
            <td class="col-2" style="vertical-align:top">: </td>
            <td class="col-3" style="height: 80px;vertical-align:top">
                <?php
                if ($model->kesan == 'Normal') {
                    echo $model->kesan;
                } else {
                    $penata = McuPenatalaksanaanMcu::find()
                        ->where(['jenis' => 'spesialis_treadmill'])
                        ->andWhere(['id_fk' => $model->id_spesialis_treadmill])
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