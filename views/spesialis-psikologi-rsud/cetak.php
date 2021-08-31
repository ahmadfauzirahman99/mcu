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

    .tabel-psikologi-a tr td {
        border-top: 1px solid #000000;
        border-bottom: 1px solid #000000;
        vertical-align: top;
    }

    .tabel-psikologi-b tr td {
        vertical-align: top;
    }

    .tabel-psikologi-c1 tr td {
        border: 1px solid #000000;
        vertical-align: top;
    }

    .tabel-psikologi-c2 tr td {
        border: 1px solid #000000;
        vertical-align: top;
    }

    .tabel-psikologi-c3 tr td {
        border: 1px solid #000000;
        vertical-align: top;
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
    <div style="text-align: center; font-size: small;">
        <h3 style="font-weight: bold; margin-bottom: 0px;">UNIT MEDICAL CHECK UP</h3>
        <h3 style="font-weight: bold; margin-top: 0px;">PEMERIKSAAN KESEHATAN PSIKOLOGI</h3>
    </div>

    <b>
        A. DATA
    </b>
    <div style="margin-left: 18px;">
        <table class="tabel-psikologi-a table table-sm table-bordered" style="width: 100%; font-size: 0.9rem;">
            <tbody>
                <tr>
                    <td style="width: 18%; border-left: 1px solid #000000;">Pendidikan</td>
                    <td style="width: 1%;">:</td>
                    <td style="width: 35%;">
                        <?= $model->pendidikan ?>
                    </td>
                    <td style="width: 15%; border-left: 1px solid #000000;">Agama</td>
                    <td style="width: 1%;">:</td>
                    <td style="width: 30%; border-right: 1px solid #000000;">
                        <?= $model->agama ?>
                    </td>
                </tr>
                <tr>
                    <td style="border-left: 1px solid #000000;">Alamat</td>
                    <td>:</td>
                    <td>
                        <?= $model->alamat ?>
                    </td>
                    <td style="border-left: 1px solid #000000;">Status</td>
                    <td>:</td>
                    <td style="border-right: 1px solid #000000;">
                        <?= $model->status ?>
                    </td>
                </tr>
                <tr>
                    <td style="border-left: 1px solid #000000;">Jenis Kelamin</td>
                    <td>:</td>
                    <td>
                        <?= $model->jenis_kelamin ?>
                    </td>
                    <td style="border-left: 1px solid #000000;">Pekerjaan</td>
                    <td>:</td>
                    <td style="border-right: 1px solid #000000;">
                        <?= $model->pekerjaan ?>
                    </td>
                </tr>
                <tr>
                    <td style="border-left: 1px solid #000000;">Urutan Kelahiran</td>
                    <td>:</td>
                    <td>
                        <?= $model->urutan_kelahiran ?>
                    </td>
                    <td style="border-left: 1px solid #000000;">Tgl Pemeriksaan</td>
                    <td>:</td>
                    <td style="border-right: 1px solid #000000;">
                        <?= Yii::$app->formatter->asDate($model->tgl_pemeriksaan, 'php:d F Y') ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <br>
    <b>
        B. RIWAYAT PENYAKIT
    </b>
    <div style="margin-left: 18px;">
        <table class="tabel-psikologi-b table table-sm" style="width: 100%;">
            <tbody>
                <tr>
                    <td style="width: 19%;">Diagnosa Dokter</td>
                    <td style="width: 1%;">:</td>
                    <td style="width: 80%;">
                        <?= $model->diagnosa_dokter ?>
                    </td>
                </tr>
                <tr>
                    <td>Keluhan Fisik</td>
                    <td>:</td>
                    <td>
                        <?= $model->keluhan_fisik ?>
                    </td>
                </tr>
                <tr>
                    <td>Keluhan Psikologis</td>
                    <td>:</td>
                    <td>
                        <?= $model->keluhan_psikologis ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <br>
    <b>
        C. ASESMEN
    </b>
    <div style="margin-left: 18px;">
        1. Observasi
        <table class="tabel-psikologi-c1 table table-sm table-bordered" style="width: 100%;">
            <tbody>
                <tr>
                    <td style="width: 50%;">
                        <b>Deskripsi Umum</b>
                        <ul>
                            <li>
                                Penampilan Umum :
                                <?php
                                echo ($model->penampilan_umum == 'Terawat') ? $model->penampilan_umum : '<span style="text-decoration: line-through;"> Terawat </span>';
                                echo ' / ';
                                echo ($model->penampilan_umum == 'Kurang Terawat') ? $model->penampilan_umum : '<span style="text-decoration: line-through;"> Kurang Terawat </span>';
                                ?>
                            </li>
                            <li>
                                Sikap terhadap pemeriksa :
                                <?php
                                echo ($model->sikap_terhadap_pemeriksa == 'Kooperatif') ? $model->sikap_terhadap_pemeriksa : '<span style="text-decoration: line-through;"> Kooperatif </span>';
                                echo ' / ';
                                echo ($model->sikap_terhadap_pemeriksa == 'Tidak Kooperatif') ? $model->sikap_terhadap_pemeriksa : '<span style="text-decoration: line-through;"> Tidak Kooperatif </span>';
                                ?>
                            </li>
                            <li>
                                Afek :
                                <?php
                                echo ($model->afek == 'Normal') ? $model->afek : '<span style="text-decoration: line-through;"> Normal </span>';
                                echo ' / ';
                                echo ($model->afek == 'Datar') ? $model->afek : '<span style="text-decoration: line-through;"> Datar </span>';
                                echo ' / ';
                                echo ($model->afek == 'Depresif') ? $model->afek : '<span style="text-decoration: line-through;"> Depresif </span>';
                                ?>

                            </li>
                            <li>
                                Roman Muka :
                                <?php
                                echo ($model->roman_muka == 'Murung') ? $model->roman_muka : '<span style="text-decoration: line-through;"> Murung </span>';
                                echo ' / ';
                                echo ($model->roman_muka == 'Wajar') ? $model->roman_muka : '<span style="text-decoration: line-through;"> Wajar </span>';
                                echo ' / ';
                                echo ($model->roman_muka == 'Euphoria') ? $model->roman_muka : '<span style="text-decoration: line-through;"> Euphoria </span>';
                                ?>

                            </li>
                            <li>
                                Proses Pikir :
                                <?php
                                echo ($model->proses_pikir == 'Realistik') ? $model->proses_pikir : '<span style="text-decoration: line-through;"> Realistik </span>';
                                echo ' / ';
                                echo ($model->proses_pikir == 'Tidak Realistik') ? $model->proses_pikir : '<span style="text-decoration: line-through;"> Tidak Realistik </span>';
                                ?>

                            </li>
                            <li>
                                Gangguan Persepsi :
                                <?php
                                echo ($model->gangguan_persepsi == 'Halusinasi') ? $model->gangguan_persepsi : '<span style="text-decoration: line-through;"> Halusinasi </span>';
                                echo ' / ';
                                echo ($model->gangguan_persepsi == 'Delusi') ? $model->gangguan_persepsi : '<span style="text-decoration: line-through;"> Delusi </span>';
                                echo ' / ';
                                echo ($model->gangguan_persepsi == 'Tidak Ada') ? $model->gangguan_persepsi : '<span style="text-decoration: line-through;"> Tidak Ada </span>';
                                ?>

                            </li>
                        </ul>
                    </td>
                    <td style="width: 50%;">
                        <b>Fungsi Psikologi</b>
                        <ul>
                            <li>
                                Kognitif
                                <ul>
                                    <li>
                                        Memori :
                                        <?php
                                        echo ($model->kognitif_memori == '+') ? $model->kognitif_memori : '<span style="text-decoration: line-through;"> + </span>';
                                        echo ' / ';
                                        echo ($model->kognitif_memori == '-') ? $model->kognitif_memori : '<span style="text-decoration: line-through;"> - </span>';
                                        ?>

                                    </li>
                                    <li>
                                        Konsentrasi :
                                        <?php
                                        echo ($model->kognitif_konsentrasi == '+') ? $model->kognitif_konsentrasi : '<span style="text-decoration: line-through;"> + </span>';
                                        echo ' / ';
                                        echo ($model->kognitif_konsentrasi == '-') ? $model->kognitif_konsentrasi : '<span style="text-decoration: line-through;"> - </span>';
                                        ?>

                                    </li>
                                    <li>
                                        Orientasi :
                                        <?php
                                        echo ($model->kognitif_orientasi == '+') ? $model->kognitif_orientasi : '<span style="text-decoration: line-through;"> + </span>';
                                        echo ' / ';
                                        echo ($model->kognitif_orientasi == '-') ? $model->kognitif_orientasi : '<span style="text-decoration: line-through;"> - </span>';
                                        ?>

                                    </li>
                                    <li>
                                        Kemampuan Verbal :
                                        <?php
                                        echo ($model->kognitif_kemampuan_verbal == '+') ? $model->kognitif_kemampuan_verbal : '<span style="text-decoration: line-through;"> + </span>';
                                        echo ' / ';
                                        echo ($model->kognitif_kemampuan_verbal == '-') ? $model->kognitif_kemampuan_verbal : '<span style="text-decoration: line-through;"> - </span>';
                                        ?>

                                    </li>
                                </ul>
                            </li>
                            <li>
                                Emosi :
                                <?php
                                echo ($model->emosi == 'Stabil') ? $model->emosi : '<span style="text-decoration: line-through;"> Stabil </span>';
                                echo ' / ';
                                echo ($model->emosi == 'Tidak Stabil') ? $model->emosi : '<span style="text-decoration: line-through;"> Tidak Stabil </span>';
                                ?>

                            </li>
                            <li>
                                Perilaku :
                                <?php
                                echo ($model->perilaku == 'Ada Hambatan') ? $model->perilaku : '<span style="text-decoration: line-through;"> Ada Hambatan </span>';
                                echo ' / ';
                                echo ($model->perilaku == 'Normal') ? $model->perilaku : '<span style="text-decoration: line-through;"> Normal </span>';
                                echo ' / ';
                                echo ($model->perilaku == 'Agresif') ? $model->perilaku : '<span style="text-decoration: line-through;"> Agresif </span>';
                                echo ' / ';
                                echo ($model->perilaku == 'Menarik Diri') ? $model->perilaku : '<span style="text-decoration: line-through;"> Menarik Diri </span>';
                                ?>

                            </li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
        2. Simptom
        <table class="tabel-psikologi-c2 table table-sm table-bordered" style="width: 100%;">
            <tbody>
                <tr>
                    <td>
                        <?php
                        $simptom1 = [
                            'Sakit Kepala' => 'Sakit Kepala',
                            'Kurang Nafsu Makan' => 'Kurang Nafsu Makan',
                            'Sulit Tidur' => 'Sulit Tidur',
                            'Mudah Takut' => 'Mudah Takut',
                            'Tegang' => 'Tegang',
                            'Cemas' => 'Cemas',
                            'Gemetar' => 'Gemetar',
                        ];
                        foreach ($simptom1 as $key => $value) {
                            if (in_array($value, $model->simptom->getValue())) {
                                $gambarCheck = Url::to('@web/img/checklist.png');
                            } else {
                                $gambarCheck = Url::to('@web/img/blank.png');
                            }
                            echo '<img src="' . $gambarCheck . '" alt="logo" style="height: 15px; width: auto;">&nbsp; &nbsp;' . $value;
                            echo '<br>';
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $simptom2 = [
                            'Gangguan Perut' => 'Gangguan Perut',
                            'Sulit Konsentrasi' => 'Sulit Konsentrasi',
                            'Sedih' => 'Sedih',
                            'Sulit Mengambil Keputusan' => 'Sulit Mengambil Keputusan',
                            'Kehilangan Minat' => 'Kehilangan Minat',
                            'Merasa Tidak Berguna' => 'Merasa Tidak Berguna',
                            'Mudah Lupa' => 'Mudah Lupa',
                        ];
                        foreach ($simptom2 as $key => $value) {
                            if (in_array($value, $model->simptom->getValue())) {
                                $gambarCheck = Url::to('@web/img/checklist.png');
                            } else {
                                $gambarCheck = Url::to('@web/img/blank.png');
                            }
                            echo '<img src="' . $gambarCheck . '" alt="logo" style="height: 15px; width: auto;">&nbsp; &nbsp;' . $value;
                            echo '<br>';
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $simptom3 = [
                            'Merasa Bersalah' => 'Merasa Bersalah',
                            'Mudah Lelah' => 'Mudah Lelah',
                            'Putus Asa' => 'Putus Asa',
                            'Mudah Marah' => 'Mudah Marah',
                            'Mudah Tersinggung' => 'Mudah Tersinggung',
                            'Mimpi Buruk' => 'Mimpi Buruk',
                            'Tidak Percaya Diri' => 'Tidak Percaya Diri',
                        ];
                        foreach ($simptom3 as $key => $value) {
                            if (in_array($value, $model->simptom->getValue())) {
                                $gambarCheck = Url::to('@web/img/checklist.png');
                            } else {
                                $gambarCheck = Url::to('@web/img/blank.png');
                            }
                            echo '<img src="' . $gambarCheck . '" alt="logo" style="height: 15px; width: auto;">&nbsp; &nbsp;' . $value;
                            echo '<br>';
                        }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
        3. Psikotes Pendukung
        <table class="tabel-psikologi-c3 table table-sm table-bordered" style="width: 100%;">
            <tbody>
                <tr>
                    <td>1. <?= $model->pendukung_1 ?></td>
                    <td>2. <?= $model->pendukung_2 ?></td>
                    <td>3. <?= $model->pendukung_3 ?></td>
                    <td>4. <?= $model->pendukung_4 ?></td>
                    <td>5. <?= $model->pendukung_5 ?></td>
                </tr>
                <tr>
                    <td colspan="5">
                        Hasil Tes :<br>
                        <?= $model->pendukung_hasil_tes ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <br>
    <b>
        D. Dinamika Psikologi
    </b>
    <div style="margin-left: 18px;">
        <?= $model->dinamika_psikologi ?>
    </div>

    <br>
    <b>
        E. Kesimpulan
    </b>
    <div style="margin-left: 18px;">
        <?= $model->kesimpulan ?>
    </div>


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