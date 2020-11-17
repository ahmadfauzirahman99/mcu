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

        th,
        td {
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
use app\models\PemeriksaanFisik;
use app\models\spesialis\McuSpesialisGigi;
use app\models\spesialis\McuSpesialisMata;
use app\models\spesialis\McuSpesialisThtBerbisik;

?>

<?php
// if(isset($laporan['test']['no_test'])) {
//     if($laporan['test']['no_test'] == 'on') {
//         $name_test ="style='display:block'";
//     } 
// } else {
//         $name_test ="style='display:none'";
// }
?>




<body>
    <h3 align="center">REKAPITULASI HASIL PEMERIKSAAN CPNS BENGKALIS</h3>
    <h3 align="center">TAHUN <?= date('Y') ?></h3>

    <table width="100%" border='1'>
        <thead></thead>
        <tr>
            <th rowspan="2" align="center">NO</th>
            <th align="center">Nama</th>
            <th rowspan="2" align="center">Umur</th>
            <th rowspan="2" align="center">Jenis <br /> Kelamin</th>
            <th rowspan="2" align="center">Jabatan Pekerjaan</th>
            <th rowspan="2" align="center">Tanda Vital</th>
            <th rowspan="2" align="center">Status Gizi</th>
            <th rowspan="2" width="15%" align="center">Gigi</th>
            <th rowspan="2" align="center">Mata</th>
            <th rowspan="2" align="center">THT Berbisik</th>
            <th rowspan="2" align="center">Hasil Lab</th>
            <th rowspan="2" align="center">POIN</th>
        </tr>
        <tr>
            <th align="center">No Test</th>
        </tr>
        </thead>
        <tbody>

            <?php
            $modelMata = new McuSpesialisMata();
            $modelGigi = new McuSpesialisGigi();
            $modelThtBerbisik = new McuSpesialisThtBerbisik();
            $modelPemeriksaanFisik = new PemeriksaanFisik();

            $no = 1;
            foreach ($datamcu as $data) {
                $dtLayanan = Helper::getDataLayanan($data['id_data_pelayanan']);
                //$dtPemeriksaanFisik = Helper::getDataPemeriksaanFisik($data['no_rekam_medik']);
                $dtRegister = Helper::getDataRegistrasi($data['no_rekam_medik']);
                //return $dtPemeriksaanFisik['status_gizi_tinggi_badan'] ?? '';
                // var_dump($dtPemeriksaanFisik['status_gizi_tinggi_badan']);
                // var_dump($dtPemeriksaanFisik['status_gizi_berat_badan']);
                // exit;

                $hasil =  json_decode($data['hasil']);

                $gigi = '';
                foreach ($hasil->gigi as $g) {
                    if ($g->tampil == 1 && $g->result == 1) {
                        $gigi .= $modelGigi->getAttributeLabel($g->item) . ' = ' . $g->value . '<br/> ';
                    }
                }

                $mata = '';
                foreach ($hasil->mata as $h) {
                    if ($h->tampil == 1 && $h->result == 1) {
                        $mata .= $modelMata->getAttributeLabel($h->item) . ' = ' . $h->value . '<br/>';
                    }
                }
                
                $tht_berbisik = '';
                foreach ($hasil->tht_berbisik as $i) {
                    if ($i->tampil == 1 && $i->result == 1) {
                        $tht_berbisik .= $modelThtBerbisik->getAttributeLabel($i->item) . ' = ' . $i->value . '<br/>';
                    }
                }
                
                $tanda_vital = '';
                foreach ($hasil->tanda_vital as $j) {
                    if ($j->tampil == 1 && $j->result == 1) {
                        $tanda_vital .= $modelPemeriksaanFisik->getAttributeLabel($j->item) . ' = ' . $j->value . '<br/>';
                    }
                }
                
                $status_gizi = '';
                foreach ($hasil->status_gizi as $k) {
                    if ($k->tampil == 1 && $k->result == 1) {
                        $status_gizi .= $modelPemeriksaanFisik->getAttributeLabel($k->item) . ' = ' . $k->value . '<br/>';
                    }
                }
                
                $tingkat_kesadaran = '';
                foreach ($hasil->tingkat_kesadaran as $l) {
                    if ($l->tampil == 1 && $l->result == 1) {
                        $tingkat_kesadaran .= $modelPemeriksaanFisik->getAttributeLabel($l->item) . ' = ' . $l->value . '<br/>';
                    }
                }
                
                $lab = '';
                foreach ($hasil->lab as $m) {
                    if ($m->tampil == 1 && $m->result == 1) {
                        $lab .= $m->item . ' = ' . $m->value . '<br/>';
                    }
                }

                // echo '<pre>';
                // print_r($dtRegister);
                // die();

            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $dtLayanan['nama'] . "<br/>" . $dtLayanan['no_ujian'] ?></td>
                    <td><?= Helper::hitung_umur($dtLayanan['tgl_lahir']) ?></td>
                    <td><?= $dtLayanan['jenis_kelamin'] ?></td>
                    <td><?= $dtRegister['u_jabatan'] ?></td>
                    <td><?= $tanda_vital ?></td>
                    <td><?= $status_gizi ?></td>
                    <td><?= $gigi ?></td>
                    <td><?= $mata ?></td>
                    <td><?= $tht_berbisik ?></td>
                    <td><?= $lab ?></td>
                    <td><?= $data['poin'] ?></td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </tbody>
    </table>
</body>

</html>