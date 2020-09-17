<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Hasil MCU</title>
    <style type="text/css">
        table {
            border-collapse: collapse;
			width: 100%;
        }

        table tr th td {
            font-size: 8px;
        }

		th, td {
		padding: 5px;
		text-align: left;
		}

        .table-with-border {
            border-collapse: collapse;
            padding: 10px 5px;
        }

        .table-with-border-header {
            border: 2px solid black;
        }

        .table-with-border-body {
            border-top: none;
            border-bottom: none;
            border-right: 2px solid black;
            border-left: 2px solid black;
        }

        .table-with-border-footer {
            border: 2px solid black;
        }

        .font-label {
            max-width: 10%;
            vertical-align: text-top;
        }

        .font-isi {
            max-width: 38%;
            vertical-align: text-top;
        }

        .font-colon {
            max-width: 2%;
            text-align: left;
            vertical-align: text-top;
        }

        .table-header {
            padding: 0px;
            min-height: 100px;
            border: none;
            line-height: 1;
            margin-top: -10px;
        }

        .table-header td {
            word-wrap: break-word;
            vertical-align: text-top;
        }
    </style>
    <script type="text/javascript">
        window.print();
        //window.close();
    </script>
</head>

<?php
use app\components\Helper;
?>

<?php
    if(isset($laporan['test']['no_test'])) {
        if($laporan['test']['no_test'] == 'on') {
            $name_test ="style='display:block'";
        } 
    } else {
            $name_test ="style='display:none'";
    }
?>




<body>
	<h3 align="center">REKAPITULASI HASIL PEMERIKSAAN CPNS BENGKALIS</h3>
	<h3 align="center">TAHUN <?= date('Y')?></h3>

	<table width="100%" border='1'>
		<thead></thead>
			<tr>
				<th align="center">NO</th>
                <th align="center">Nama</th>
                <div <?= $name_test ?>>
                <th align="center">No. Test</th>
                </div>
				<th align="center">Umur</th>
				<th align="center">Jenis Pekerjaan</th>
				<th align="center">Tensi (Mm/Hg)</th>
				<th align="center">Tinggi (cm)</th>
				<th align="center">Berat (kg)</th>
			</tr>
		</thead>
		<tbody>

<?php

$no=1;
		foreach ($datamcu as $data) {	
			// echo "<pre>";
			// print_r($data);
			// die();

			?>
			<tr>
				<td ><?= $no ?></td>
                <td ><?= $data['nama_peserta'] ?></td>
                <div <?= $name_test ?> >
                <td><?= $data['no_ujian'] ?></td>
                </div>
				<td ><?= $data['umur'] ?></td>
				<td ><?= "Kosong" ?></td>
				<td ><?= $data['tensi']?></td>
				<td ><?= $data['tinggi_badan']?></td> <!-- ini Sehausnya Seminar / Pelatihan -->
				<td ><?= $data['berat_badan']?></td>
			</tr>
			<?php 
				$no++;
				} 
			?>
		</tbody>
	</table>
</body>
</html>