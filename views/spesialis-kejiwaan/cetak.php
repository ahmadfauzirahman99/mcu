<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pemeriksaan Kejiwaan</title>
	
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
			<td colspan="2" width="70%" align="center"><h3>PEMERIKSAAN KEJIWAAN</h3></td>
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
	<table class="table">
        <tr>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top><b>
                <font color="#000000">ASPEK KEJIWAAN</font>
            </b></td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=top><b>
                <font color="#000000">NILAI</font>
            </b></td>
		</tr>
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
                <font color="#000000"><b>Skala L (Lie Scale) </b></font> (Kebohongan Ketidak Jujuran Jawaban)
            </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala F </b></font> (Salah mengerti terhadap makna pertanyaan atau tidak menangkap arti pertanyaan / sengaja tidak mau membaca tetapi dijawab dengan asal mengisi)
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala K </b></font> (Sikap defensive, mengelak atau menghindar)
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala 1 - Hs : Hipocondriasis </b></font> (Keluhan fisik, gangguan fisik dan fungsi tubuh)
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala 2 - D : Depresi </b></font> (Sedih, tidak bahagia dan tertekan)
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala 3 - Hy : Histeria </b></font> (Bereaksi terhadap stress dengan menolak masalah)
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
           
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala 4 - Pd : Psikopati Devien </b></font> (Kurang patuh terhadap norma sosial)
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
           
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala 5 - Mf : Maskulin Feminim </b></font> (Orientasi feminim pada laki-laki dan orientasi maskulin pada wanita)
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala 6 - Pa : Paranoia </b></font> (Curiga, Bermusuhan)
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala 7 - Pt : Psikastenia </b></font> (Cemas, Khawatir, Fobia, Obsesi Kompulsif)
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
           
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala 8 - Sc : Schizophrenia </b></font> (Menarik diri, Pikiran aneh, Kacau)
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala 9 - Ma : Hipomania </b></font> (Impulsif pikiran dan aktivitas yang berlebihan)
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            
            </td>
        </tr>   
        <tr class="tr-ac-bc">
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="23" align="left" valign=middle>
            <font color="#000000"><b>Skala 0 - D : Intervensi Sosial </b></font> (Intovert, pemalu, tertutup, minat sosial)
                </td>
            <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>
            
            </td>
        </tr>   
    </table>
	<br/>
	<b>B. VALIDITAS</b>
	<table width="100%" border='0'>
		<tbody>
			<tr>
				<td align="left" width="100%" style="border-bottom: 1px solid #000000;"><?= $model->saran ?></td>
			</tr>
		</tbody>
	</table>
	<br/>
	<b>C. INTERPRETASI SUBTANTIF</b>
	<table width="100%" border='0'>
		<tbody>
			<tr>
				<td align="left" width="100%" style="border-bottom: 1px solid #000000;"><?= $model->kesimpulan ?></td>
			</tr>
		</tbody>
	</table>
	<br/>
	<b>D. SARAN</b>
	<table width="100%" border='0'>
		<tbody>
			<tr>
				<td align="left" width="100%" style="border-bottom: 1px solid #000000;"><?= $model->saran ?></td>
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