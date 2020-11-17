<?php
/**
 * Created by PhpStorm.
 * User: SalmanSyuhada
 * Date: 26/04/2018
 * Time: 10.29
 */

use yii\helpers\Url;

$logo = Url::base() . "/img/logo-rsud-basic.png";
$logo2 = Url::base()."/img/logo-kars1.png";
$logo3 = Url::base()."/img/riau.png";
?>
<table width="100%" border="0" style="border-bottom: 1px solid;">
    <tr>
        <td width="60px">
            <img src="<?= $logo3 ?>" width="60px">
        </td>
        <td style="font-size:15px">
            <b>BLUD RSUD ARIFIN ACHMAD PROVINSI RIAU</b><br/>
            Jl. Diponegoro No.2 Pekanbaru <br/>
            Telp.(0761) 21618, 23418, 21657 FAX.(0761) 20253
        </td>
        <td width="60px">
            <img src="<?= $logo ?>" width="50px">
        </td>
        <td width="60px">
            <img src="<?= $logo2 ?>" width="50px">
        </td>
    </tr>
</table>
<br/>
<h5 style="margin: 0; padding: 0;" align="center"><b>LAPORAN REKAP PAKET MCU </b></h5>
<h5 style="margin: 0; padding: 0;" align="center"><b>RSUD ARIFIN ACHMAD PEKANBARU</b></h5>
<br/>


<table border="1" cellspacing="0" width="100%">
    <!--    <thead>-->
    <thead>
    <tr align="center">
        <td align="center"><b> NO </b></td>
        <td align="center"><b> PAKET </b></td>
        <td align="center"><b> JML PASIEN </b></td>
        <td align="center"><b> SATUAN HARGA </b></td>
        <td align="center"><b> JUMLAH </b></td>
    </tr>
    </thead>
    <tbody>

    <?php
    if(!empty($data != Null)){
        echo '<pre>';
        print_r($data);
        die();
    ?>



    <?php
    }else{
    ?>
        <tr>
            <td colspan="5" align="center">
                Tidak ada data
            </td>
        </tr>
    <?php
    }
    ?>
    </tbody>

</table>