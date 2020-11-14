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


    /*  */
    .tbl-kop tr td.td-kop {
        border: 1px solid #000000;
    }

    .tabel-penata tr th,
    .tabel-penata tr td {
        border: 1px solid #000000;
        vertical-align: top;
    }

    .tabel-data .td-tebal {
        font-weight: bold;
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
    <br>
    <br>
    <div style="text-align: center; font-size: small;">
        <h3 style="font-weight: bold; margin-bottom: 0px;">UNIT MEDICAL CHECK UP</h3>
        <h3 style="font-weight: bold; margin-top: 0px;">PEMERIKSAAN KESEHATAN JANTUNG TENAGA KERJA</h3>
    </div>

    <table class="tabel-data" style="width: 100%; margin-top: 1rem;">
        <tbody>
            <tr>
                <td class="td-tebal">Irama Jantung</td>
                <td>:</td>
                <td>
                    <?php
                    echo ($model->irama_jantung == 'Sinus Ritme') ? $model->irama_jantung : '<span style="text-decoration: line-through;"> Sinus Ritme </span>';
                    echo ' / ';
                    echo ($model->irama_jantung == 'Atrial Fibrilasi') ? $model->irama_jantung : '<span style="text-decoration: line-through;"> Atrial Fibrilasi </span>';
                    echo ' / ';
                    echo ($model->irama_jantung == 'Atrial FLutter') ? $model->irama_jantung : '<span style="text-decoration: line-through;"> Atrial FLutter </span>';
                    if ($model->irama_jantung != 'Sinus Ritme' && $model->irama_jantung != 'Atrial Fibrilasi' && $model->irama_jantung != 'Atrial FLutter') {
                        echo ' / ';
                        echo $model->irama_jantung;
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td class="td-tebal">Frekuensi Denyut Jantung</td>
                <td>:</td>
                <td>
                    <?php
                    echo $model->frekuensi_denyut_jantung;
                    ?>
                </td>
            </tr>
            <tr>
                <td class="td-tebal">Gelombang P</td>
                <td>:</td>
                <td>
                    <?php
                    echo ($model->gelombang_p == 'Normal') ? $model->gelombang_p : '<span style="text-decoration: line-through;"> Normal </span>';
                    echo ' / ';
                    echo ($model->gelombang_p == 'P Mitral') ? $model->gelombang_p : '<span style="text-decoration: line-through;"> P Mitral </span>';
                    echo ' / ';
                    echo ($model->gelombang_p == 'P Pulmonal') ? $model->gelombang_p : '<span style="text-decoration: line-through;"> P Pulmonal </span>';
                    if ($model->gelombang_p != 'Normal' && $model->gelombang_p != 'P Mitral' && $model->gelombang_p != 'P Pulmonal') {
                        echo ' / ';
                        echo $model->gelombang_p;
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td class="td-tebal">Interal PR</td>
                <td>:</td>
                <td>
                    <?php
                    echo $model->interval_pr;
                    ?>
                </td>
            </tr>
            <tr>
                <td class="td-tebal">Kompleks QRS</td>
                <td>:</td>
                <td>
                    <?php
                    echo ($model->kompleks_qrs == 'Normal') ? $model->kompleks_qrs : '<span style="text-decoration: line-through;"> Normal </span>';
                    echo ' / ';
                    echo ($model->kompleks_qrs == 'Lebar') ? $model->kompleks_qrs : '<span style="text-decoration: line-through;"> Lebar </span>';
                    if ($model->kompleks_qrs != 'Normal' && $model->kompleks_qrs != 'Lebar') {
                        echo ' / ';
                        echo $model->kompleks_qrs;
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td class="td-tebal">Segmen ST</td>
                <td>:</td>
                <td>
                    <?php
                    echo ($model->segmen_st == 'Normal') ? $model->segmen_st : '<span style="text-decoration: line-through;"> Normal </span>';
                    echo ' / ';
                    echo ($model->segmen_st == 'ST Elevasi') ? $model->segmen_st : '<span style="text-decoration: line-through;"> ST Elevasi </span>';
                    if ($model->segmen_st != 'Normal' && $model->segmen_st != 'ST Elevasi') {
                        echo ' / ';
                        echo 'ST Depresi di ' . $model->segmen_st;
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td class="td-tebal">Gelombang T</td>
                <td>:</td>
                <td>
                    <?php
                    echo ($model->gelombang_t == 'Normal') ? $model->gelombang_t : '<span style="text-decoration: line-through;"> Normal </span>';
                    if ($model->gelombang_t != 'Normal') {
                        echo ' / ';
                        echo 'Inverted  di ' . $model->gelombang_t;
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td class="td-tebal">Lain-lain</td>
                <td>:</td>
                <td>
                    <?php
                    echo $model->lain_lain;
                    ?>
                </td>
            </tr>
            <tr>
                <td class="td-tebal">Kesan EKG Istirahat</td>
                <td>:</td>
                <td>
                    <?php
                    echo $model->kesan_ekg_istirahat;
                    ?>
                </td>
            </tr>
            <tr>
                <td class="td-tebal">Anjuran</td>
                <td>:</td>
                <td>
                    <?php
                    echo $model->anjuran;
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
                            ->where(['jenis' => 'spesialis_ekg'])
                            ->andWhere(['id_fk' => $model->id_spesialis_ekg])
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