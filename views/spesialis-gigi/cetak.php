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
        <h3 style="font-weight: bold; margin-top: 0px;">PEMERIKSAAN KESEHATAN GIGI TENAGA KERJA</h3>
    </div>

    <table class="tbl-gigi" style="width: 100%;">
        <thead>
            <tr>
                <th style="font-size: 15px; padding: 2px;" colspan="2">KETERANGAN</th>
                <th style="font-size: 15px; padding: 2px;" colspan="2">KETERANGAN</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="angka-gigi" style="width: 5%;">18</td>
                <td><?= $model->g18 ?></td>
                <td class="angka-gigi" style="width: 5%;">38</td>
                <td><?= $model->g38 ?></td>
            </tr>
            <tr>
                <td class="angka-gigi" style="width: 5%;">17</td>
                <td><?= $model->g17 ?></td>
                <td class="angka-gigi" style="width: 5%;">37</td>
                <td><?= $model->g37 ?></td>
            </tr>
            <tr>
                <td class="angka-gigi" style="width: 5%;">16</td>
                <td><?= $model->g16 ?></td>
                <td class="angka-gigi" style="width: 5%;">36</td>
                <td><?= $model->g36 ?></td>
            </tr>
            <tr>
                <td class="angka-gigi" style="width: 5%;">15</td>
                <td><?= $model->g15 ?></td>
                <td class="angka-gigi" style="width: 5%;">35</td>
                <td><?= $model->g35 ?></td>
            </tr>
            <tr>
                <td class="angka-gigi" style="width: 5%;">14</td>
                <td><?= $model->g14 ?></td>
                <td class="angka-gigi" style="width: 5%;">34</td>
                <td><?= $model->g34 ?></td>
            </tr>
            <tr>
                <td class="angka-gigi" style="width: 5%;">13</td>
                <td><?= $model->g13 ?></td>
                <td class="angka-gigi" style="width: 5%;">33</td>
                <td><?= $model->g33 ?></td>
            </tr>
            <tr>
                <td class="angka-gigi" style="width: 5%;">12</td>
                <td><?= $model->g12 ?></td>
                <td class="angka-gigi" style="width: 5%;">32</td>
                <td><?= $model->g32 ?></td>
            </tr>
            <tr>
                <td class="angka-gigi" style="width: 5%;">11</td>
                <td><?= $model->g11 ?></td>
                <td class="angka-gigi" style="width: 5%;">31</td>
                <td><?= $model->g31 ?></td>
            </tr>
            <tr>
                <td class="angka-gigi" style="width: 5%;">21</td>
                <td><?= $model->g21 ?></td>
                <td class="angka-gigi" style="width: 5%;">41</td>
                <td><?= $model->g41 ?></td>
            </tr>
            <tr>
                <td class="angka-gigi" style="width: 5%;">22</td>
                <td><?= $model->g22 ?></td>
                <td class="angka-gigi" style="width: 5%;">42</td>
                <td><?= $model->g42 ?></td>
            </tr>
            <tr>
                <td class="angka-gigi" style="width: 5%;">23</td>
                <td><?= $model->g23 ?></td>
                <td class="angka-gigi" style="width: 5%;">43</td>
                <td><?= $model->g43 ?></td>
            </tr>
            <tr>
                <td class="angka-gigi" style="width: 5%;">24</td>
                <td><?= $model->g24 ?></td>
                <td class="angka-gigi" style="width: 5%;">44</td>
                <td><?= $model->g44 ?></td>
            </tr>
            <tr>
                <td class="angka-gigi" style="width: 5%;">25</td>
                <td><?= $model->g25 ?></td>
                <td class="angka-gigi" style="width: 5%;">45</td>
                <td><?= $model->g45 ?></td>
            </tr>
            <tr>
                <td class="angka-gigi" style="width: 5%;">26</td>
                <td><?= $model->g26 ?></td>
                <td class="angka-gigi" style="width: 5%;">46</td>
                <td><?= $model->g46 ?></td>
            </tr>
            <tr>
                <td class="angka-gigi" style="width: 5%;">27</td>
                <td><?= $model->g27 ?></td>
                <td class="angka-gigi" style="width: 5%;">47</td>
                <td><?= $model->g47 ?></td>
            </tr>
            <tr>
                <td class="angka-gigi" style="width: 5%;">28</td>
                <td><?= $model->g28 ?></td>
                <td class="angka-gigi" style="width: 5%;">48</td>
                <td><?= $model->g48 ?></td>
            </tr>
        </tbody>
    </table>
    <table class="tbl-oklusi" style="width: 100%;">
        <tbody>
            <tr>
                <td class="col-1">Oklusi</td>
                <td class="col-2">: </td>
                <td class="col-3">
                    <?php
                    echo ($model->oklusi == 'Normal Bite') ? $model->oklusi : '<span style="text-decoration: line-through;">' . $model->oklusi . '</span>';
                    echo ' / ';
                    echo ($model->oklusi == 'Cross Bite') ? $model->oklusi : '<span style="text-decoration: line-through;">' . $model->oklusi . '</span>';
                    echo ' / ';
                    echo ($model->oklusi == 'Steep Bite') ? $model->oklusi : '<span style="text-decoration: line-through;">' . $model->oklusi . '</span>';
                    ?>
                </td>
            </tr>
            <tr>
                <td class="col-1">Torus Palatinus</td>
                <td class="col-2">: </td>
                <td class="col-3">
                    <?php
                    echo ($model->torus_palatinus == 'Tidak Ada') ? $model->torus_palatinus : '<span style="text-decoration: line-through;">' . $model->torus_palatinus . '</span>';
                    echo ' / ';
                    echo ($model->torus_palatinus == 'Kecil') ? $model->torus_palatinus : '<span style="text-decoration: line-through;">' . $model->torus_palatinus . '</span>';
                    echo ' / ';
                    echo ($model->torus_palatinus == 'Sedang') ? $model->torus_palatinus : '<span style="text-decoration: line-through;">' . $model->torus_palatinus . '</span>';
                    echo ' / ';
                    echo ($model->torus_palatinus == 'Besar') ? $model->torus_palatinus : '<span style="text-decoration: line-through;">' . $model->torus_palatinus . '</span>';
                    echo ' / ';
                    echo ($model->torus_palatinus == 'Multiple') ? $model->torus_palatinus : '<span style="text-decoration: line-through;">' . $model->torus_palatinus . '</span>';
                    ?>
                </td>
            </tr>
            <tr>
                <td class="col-1">Torus Mandibularis</td>
                <td class="col-2">: </td>
                <td class="col-3">
                    <?php
                    echo ($model->torus_mandibularis == 'Tidak Ada') ? $model->torus_mandibularis : '<span style="text-decoration: line-through;">' . $model->torus_mandibularis . '</span>';
                    echo ' / ';
                    echo ($model->torus_mandibularis == 'Sisi Kiri') ? $model->torus_mandibularis : '<span style="text-decoration: line-through;">' . $model->torus_mandibularis . '</span>';
                    echo ' / ';
                    echo ($model->torus_mandibularis == 'Sisi Kanan') ? $model->torus_mandibularis : '<span style="text-decoration: line-through;">' . $model->torus_mandibularis . '</span>';
                    echo ' / ';
                    echo ($model->torus_mandibularis == 'Kedua Sisi') ? $model->torus_mandibularis : '<span style="text-decoration: line-through;">' . $model->torus_mandibularis . '</span>';
                    ?>
                </td>
            </tr>
            <tr>
                <td class="col-1">Palatum</td>
                <td class="col-2">: </td>
                <td class="col-3">
                    <?php
                    echo ($model->palatum == 'Tinggi') ? $model->palatum : '<span style="text-decoration: line-through;">' . $model->palatum . '</span>';
                    echo ' / ';
                    echo ($model->palatum == 'Sedang') ? $model->palatum : '<span style="text-decoration: line-through;">' . $model->palatum . '</span>';
                    echo ' / ';
                    echo ($model->palatum == 'Rendah') ? $model->palatum : '<span style="text-decoration: line-through;">' . $model->palatum . '</span>';
                    ?>
                </td>
            </tr>
            <tr>
                <td class="col-1">Supernumerary Teeth</td>
                <td class="col-2">: </td>
                <td class="col-3">
                    <?php
                    echo ($model->supernumerary_teeth == 'Tidak Ada') ? $model->supernumerary_teeth : '<span style="text-decoration: line-through;">' . $model->supernumerary_teeth . '</span>';
                    echo ' / ';
                    echo ($model->supernumerary_teeth == 'Ada') ? $model->supernumerary_teeth : '<span style="text-decoration: line-through;">' . $model->supernumerary_teeth . '</span>';
                    ?>
                </td>
            </tr>
            <tr>
                <td class="col-1">Diastema</td>
                <td class="col-2">: </td>
                <td class="col-3">
                    <?php
                    echo ($model->diastema == 'Tidak Ada') ? $model->diastema : '<span style="text-decoration: line-through;">' . $model->diastema . '</span>';
                    echo ' / ';
                    echo ($model->diastema == 'Ada') ? $model->diastema : '<span style="text-decoration: line-through;">' . $model->diastema . '</span>';
                    ?>
                </td>
            </tr>
            <tr>
                <td class="col-1">Spacing</td>
                <td class="col-2">: </td>
                <td class="col-3">
                    <?php
                    echo ($model->spacing == 'Tidak Ada') ? $model->spacing : '<span style="text-decoration: line-through;">' . $model->spacing . '</span>';
                    echo ' / ';
                    echo ($model->spacing == 'Ada') ? $model->spacing : '<span style="text-decoration: line-through;">' . $model->spacing . '</span>';
                    ?>
                </td>
            </tr>
            <tr>
                <td class="col-1">Oral Hygiene</td>
                <td class="col-2">: </td>
                <td class="col-3">
                    <?php
                    echo ($model->oral_hygiene == 'Baik') ? $model->oral_hygiene : '<span style="text-decoration: line-through;">' . $model->oral_hygiene . '</span>';
                    echo ' / ';
                    echo ($model->oral_hygiene == 'Sedang') ? $model->oral_hygiene : '<span style="text-decoration: line-through;">' . $model->oral_hygiene . '</span>';
                    echo ' / ';
                    echo ($model->oral_hygiene == 'Kurang') ? $model->oral_hygiene : '<span style="text-decoration: line-through;">' . $model->oral_hygiene . '</span>';
                    ?>
                </td>
            </tr>
            <tr>
                <td class="col-1">Gingiva & Periodontal</td>
                <td class="col-2">: </td>
                <td class="col-3">
                    <?php
                    echo ($model->gingiva_periodontal == 'Normal') ? $model->gingiva_periodontal : '<span style="text-decoration: line-through;">' . $model->gingiva_periodontal . '</span>';
                    echo ' / ';
                    echo ($model->gingiva_periodontal == 'Gingivitis') ? $model->gingiva_periodontal : '<span style="text-decoration: line-through;">' . $model->gingiva_periodontal . '</span>';
                    echo ' / ';
                    echo ($model->gingiva_periodontal == 'Periodontitis') ? $model->gingiva_periodontal : '<span style="text-decoration: line-through;">' . $model->gingiva_periodontal . '</span>';
                    ?>
                </td>
            </tr>
            <tr>
                <td class="col-1">Oral Mucosa</td>
                <td class="col-2">: </td>
                <td class="col-3">
                    <?php
                    echo ($model->oral_mucosa == 'Normal') ? $model->oral_mucosa : '<span style="text-decoration: line-through;">' . $model->oral_mucosa . '</span>';
                    echo ' / ';
                    echo ($model->oral_mucosa == 'Disease') ? $model->oral_mucosa : '<span style="text-decoration: line-through;">' . $model->oral_mucosa . '</span>';
                    ?>
                </td>
            </tr>
            <tr>
                <td class="col-1">Tongue</td>
                <td class="col-2">: </td>
                <td class="col-3">
                    <?php
                    echo ($model->tongue == 'Normal') ? $model->tongue : '<span style="text-decoration: line-through;">' . $model->tongue . '</span>';
                    echo ' / ';
                    echo ($model->tongue == 'Disease') ? $model->tongue : '<span style="text-decoration: line-through;">' . $model->tongue . '</span>';
                    ?>
                </td>
            </tr>
            <tr>
                <td class="col-1">Lain-lain</td>
                <td class="col-2">: </td>
                <td class="col-3">
                    <?php
                    echo $model->lain_lain;
                    ?>
                </td>
            </tr>
            <tr>
                <td class="col-1" style="font-weight: bold;">Kesan</td>
                <td class="col-2">: </td>
                <td class="col-3">
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
                        $model->kesimpulan == 'Normal';
                        echo $model->kesimpulan;
                    } else {
                        $penata = McuPenatalaksanaanMcu::find()
                            ->where(['jenis' => 'spesialis_gigi'])
                            ->andWhere(['id_fk' => $model->id_spesialis_gigi])
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
                <td class="col-2" style="text-align: center;border-right: 1px solid #000000;">
                    <br><br><br><br>
                    drg. Nama Dokter
                    <br>
                    nip
                </td>
            </tr>
        </tbody>
    </table>

</div>