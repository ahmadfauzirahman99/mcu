<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pemeriksaan Psikologi</title>
	
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
</head>

<?php
$check=["", "V"];

?>

<body>
	<table class="tbl-kop" style="width: 100%;">
        <tbody>
            <tr>
                <td class="td-kop" style="width: 50%;">
                    <img src="<?= Yii::$app->request->baseUrl ?>/img/photo_2020.jpg" alt="" width="20px;">
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

	<br/>
	<table width="100%" border='0'>	
		<tr>
			<td colspan="2" width="70%" align="center"><h3>PEMERIKSAAN PSIKOLOGI</h3></td>
		</tr>
		<!-- <tr>
			<td width="60%" align="center">&nbsp;</td>
			<td width="10%" align="left" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><h3>RM : </h3></td>
		</tr> -->
	</table>

	<b>A. DATA</b>
	<table width="100%" border='0'>
		<tbody>
			<tr>
				<td align="left" width="20%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000;">Pendidikan</td>
				<td align="left" width="2%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000;">:</td>
				<td align="left" width="28%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000"><?= $pasien->pendidikan; ?></td>
				<td align="left" width="20%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000;">Agama</td>
				<td align="left" width="2%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000;">:</td>
				<td align="left" width="28%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000"><?= $pasien->agama; ?></td>
			</tr>
			<tr>
				<td align="left" width="20%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000;">Alamat</td>
				<td align="left" width="2%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000;">:</td>
				<td align="left" width="28%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000"><?= $pasien->alamat ?></td>
				<td align="left" width="20%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000;">Status</td>
				<td align="left" width="2%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000;">:</td>
				<td align="left" width="28%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000"><?= $pasien->status_perkawinan ?></td>
			</tr>
			<tr>
				<td align="left" width="20%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000;">Jenis Kelamin</td>
				<td align="left" width="2%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000;">:</td>
				<td align="left" width="28%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000"><?= $pasien->jenis_kelamin ?></td>
				<td align="left" width="20%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000;">Pekerjaan</td>
				<td align="left" width="2%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000;">:</td>
				<td align="left" width="28%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000"><?= $pasien->pekerjaan ?></td>
			</tr>
			<tr>
				<td align="left" width="20%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000;">Urutan Kelahiran</td>
				<td align="left" width="2%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000;">:</td>
				<td align="left" width="28%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000"><?= $pasien->kedudukan_dalam_keluarga ?></td>
				<td align="left" width="20%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000;">Tgl Pemeriksaan</td>
				<td align="left" width="2%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000;">:</td>
				<td align="left" width="28%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000"><?= $pasien->tanggal_pemeriksaan ?></td>
			</tr>
		</tbody>
	</table>
	<br/>
	<b>B. RIWAYAT PENYAKIT</b>
	<table width="100%" border='0'>
		<tbody>
			<tr>
				<td align="left" width="20%">Diagnosa Dokter</td>
				<td align="left" width="2%">:</td>
				<td align="left" width="78%" style="border-bottom: 1px solid #000000;"><?= $model->rp_diagnosa_dokter ?></td>
			</tr>
			<tr>
				<td align="left" width="20%">Keluhan Fisik</td>
				<td align="left" width="2%">:</td>
				<td align="left" width="28%" style="border-bottom: 1px solid #000000;"><?= $model->rp_keluhan_fisik ?></td>
			</tr>
			<tr>
				<td align="left" width="20%">Keluhan Psikologi</td>
				<td align="left" width="2%">:</td>
				<td align="left" width="28%" style="border-bottom: 1px solid #000000;"><?= $model->rp_keluhan_psikologis ?></td>
			</tr>
		</tbody>
	</table>
	<br/>
	<b>C. ASESMEN</b><br/>
	1. Observasi
	<table width="100%" border='0'>
		<tbody>
			<tr>
				<td width="50%" align="left" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b>Deskripsi Umum</b></td>
				<td width="50%" align="left" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><b>Fungsi Psikologi</b></td>
			</tr>
			<tr>
				<td align="left" style="border-left: 1px solid #000000;"></td>
				<td align="left" style="border-left: 1px solid #000000; border-right: 1px solid #000000;">o Kognitif</td>
			</tr>
			<tr>
				<td align="left" style="border-left: 1px solid #000000;">o Penampilan Umum : <?= $model->asesmen_observasi_du_penampilan_umum ?></td>
				<td align="left" style="border-left: 1px solid #000000; border-right: 1px solid #000000;">&nbsp; - Memori : <?= $model->asesmen_observasi_fp_kognitif_memori ?></td>
			</tr>
			<tr>
				<td align="left" style="border-left: 1px solid #000000;">o Sikap terhadap pemeriksa : <?= $model->asesmen_observasi_du_sikap_terhadap_pemeriksa ?></td>
				<td align="left" style="border-left: 1px solid #000000; border-right: 1px solid #000000;">&nbsp; - Konsentrasi : <?= $model->asesmen_observasi_fp_kognitif_konsentrasi ?></td>
			</tr>
			<tr>
				<td align="left" style="border-left: 1px solid #000000;">o Afek : <?= $model->asesmen_observasi_du_afek ?></td>
				<td align="left" style="border-left: 1px solid #000000; border-right: 1px solid #000000;">&nbsp; - Orientasi : <?= $model->asesmen_observasi_fp_kognitif_orientasi ?></td>
			</tr>
			<tr>
				<td align="left" style="border-left: 1px solid #000000;">o Roman Muka : <?= $model->asesmen_observasi_du_roman_muka ?></td>
				<td align="left" style="border-left: 1px solid #000000; border-right: 1px solid #000000;">&nbsp; - Kemampuan Verbal : <?= $model->asesmen_observasi_fp_kognitif_kemampuan_verbal ?></td>
			</tr>
			<tr>
				<td align="left" style="border-left: 1px solid #000000;">o Proses Pikir : <?= $model->asesmen_observasi_du_proses_pikir ?></td>
				<td align="left" style="border-left: 1px solid #000000; border-right: 1px solid #000000;">o Emosi : <?= $model->asesmen_observasi_fp_kognitif_emosi ?></td>
			</tr>
			<tr>
				<td align="left" style="border-bottom: 1px solid #000000; border-left: 1px solid #000000;">o Gangguan Persepsi : <?= $model->asesmen_observasi_du_gangguan_persepsi ?></td>
				<td align="left" style="border-left: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000;">o Perilaku : <?= $model->asesmen_observasi_fp_kognitif_perilaku ?></td>
			</tr>
		</tbody>
	</table>
	<br/>
	2. Simptom
	<table width="100%" border='0'>
		<tbody>
			<tr>
				<td align="left" width="3%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><?= $check[$model->simptom_sakit_kepala] ?></td>
				<td align="left" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">Sakit Kepala</td>
				<td align="left" width="3%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><?= $check[$model->simptom_gangguan_perut] ?></td>
				<td align="left" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">Gangguan Perut</td>
				<td align="left" width="3%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><?= $check[$model->simptom_merasa_bersalah] ?></td>
				<td align="left" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">Merasa Bersalah</td>
			</tr>
			<tr>
				<td align="left" width="3%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><?= $check[$model->simptom_kurang_nafsu_makan] ?></td>
				<td align="left" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">Kurang Nafsu Makan</td>
				<td align="left" width="3%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><?= $check[$model->simptom_sulit_konsentrasi] ?></td>
				<td align="left" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">Sulit Konsentrasi</td>
				<td align="left" width="3%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><?= $check[$model->simptom_mudah_lelah] ?></td>
				<td align="left" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">Mudah Lelah</td>
			</tr>
			<tr>
				<td align="left" width="3%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><?= $check[$model->simptom_sulit_tidur] ?></td>
				<td align="left" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">Sulit Tidur</td>
				<td align="left" width="3%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><?= $check[$model->simptom_sedih] ?></td>
				<td align="left" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">Sedih</td>
				<td align="left" width="3%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><?= $check[$model->simptom_putus_asa] ?></td>
				<td align="left" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">Putus Asa</td>
			</tr>
			<tr>
				<td align="left" width="3%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><?= $check[$model->simptom_mudah_takut] ?></td>
				<td align="left" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">Mudah Takut</td>
				<td align="left" width="3%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><?= $check[$model->simptom_sulit_mengambil_keputusan] ?></td>
				<td align="left" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">Sulit Mengambil Keputusan</td>
				<td align="left" width="3%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><?= $check[$model->simptom_mudah_marah] ?></td>
				<td align="left" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">Mudah Marah</td>
			</tr>
			<tr>
				<td align="left" width="3%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><?= $check[$model->simptom_tegang] ?></td>
				<td align="left" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">Tegang</td>
				<td align="left" width="3%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><?= $check[$model->simptom_kehilangan_minat] ?></td>
				<td align="left" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">Kehilangan Minat</td>
				<td align="left" width="3%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><?= $check[$model->simptom_mudah_tersinggung] ?></td>
				<td align="left" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">Mudah Tersinggung</td>
			</tr>
			<tr>
				<td align="left" width="3%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><?= $check[$model->simptom_cemas] ?></td>
				<td align="left" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">Cemas</td>
				<td align="left" width="3%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><?= $check[$model->simptom_merasa_tidak_berguna] ?></td>
				<td align="left" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">Merasa Tidak Berguna</td>
				<td align="left" width="3%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><?= $check[$model->simptom_mimpi_buruk] ?></td>
				<td align="left" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">Mimpi Buruk</td>
			</tr>
			<tr>
				<td align="left" width="3%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><?= $check[$model->simptom_gemetar] ?></td>
				<td align="left" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">Gemetar</td>
				<td align="left" width="3%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><?= $check[$model->simptom_mudah_lupa] ?></td>
				<td align="left" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">Mudah Lupa</td>
				<td align="left" width="3%" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><?= $check[$model->simptom_tidak_percaya_diri] ?></td>
				<td align="left" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000">Tidak Percaya Diri</td>
			</tr>
		</tbody>
	</table>
	<br/>
	3. Psikotes Pendukung
	<table width="100%" border='0'>
		<tbody>
			<tr>
				<td align="left" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><?= $model->psikotes_pendukung_1 ?></td>
				<td align="left" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><?= $model->psikotes_pendukung_2 ?></td>
				<td align="left" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><?= $model->psikotes_pendukung_3 ?></td>
				<td align="left" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><?= $model->psikotes_pendukung_4 ?></td>
				<td align="left" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><?= $model->psikotes_pendukung_5 ?></td>
			</tr>
			<tr>
				<td colspan="5" align="left" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000"><?= $model->hasil_tes ?></td>
			</tr>
		</tbody>
	</table>
	<br/>
	<b>D. DINAMIKA PSIKOLOGI</b>
	<table width="100%" border='0'>
		<tbody>
			<tr>
				<td align="left" width="100%" style="border-bottom: 1px solid #000000;"><?= $model->dinamika_psikologi ?></td>
			</tr>
		</tbody>
	</table>
	<br/>
	<b>E. KESIMPULAN</b>
	<table width="100%" border='0'>
		<tbody>
			<tr>
				<td align="left" width="100%" style="border-bottom: 1px solid #000000;"><?= $model->kesimpulan ?></td>
			</tr>
		</tbody>
	</table>

</body>
</html>