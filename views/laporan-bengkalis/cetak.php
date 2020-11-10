<?php
// error_reporting(0);
use app\controllers\LaporanBengkalisController;
use yii\helpers\Url;

use app\models\GraddingMcu;
use app\models\spesialis\McuSpesialisGigi;
use app\models\spesialis\McuSpesialisMata;
use app\models\spesialis\McuSpesialisThtBerbisik;
use yii\helpers\Html;
use yii\widgets\DetailView;
?>

<?php //ojik grading
$GraddingMcu= GraddingMcu::findOne(['no_rekam_medik' => $no_rm, 'no_registrasi' => $no_daftar]);
$hasil_mcu_mata = json_decode($GraddingMcu->hasil);
$hasil_mcu_gigi = json_decode($GraddingMcu->hasil);
$hasil_mcu_tht_berbisik = json_decode($GraddingMcu->hasil);
// echo '<pre>';
// print_r($hasil_mcu_mata); exit;
// var_dump($hasil_mcu_mata->gigi[46]->item=="kesan"); exit;
// $ms = $GraddingMcu->attributeLabels('persepsi_warna_mata_kanan');
// print_r($ms);
$modelMata = new McuSpesialisMata();
$modelGigi = new McuSpesialisGigi();
$modelThtBerbisik = new McuSpesialisThtBerbisik();
?>


<style>
    /*.ukuran{
        font-size:140%;
    }*/
    table tbody tr td {
     /*   font-size:120%; */
       font-size:100%;
    }
	.underline{		
	  border-bottom: 1px solid black;
	  display: inline-block;
	}
	
	.numberCircle {
    border-radius: 50%;
    width: 36px;
    height: 36px;
    padding: 8px;

    background: #fff;
    border: 2px solid #666;
    color: #666;
    text-align: center;

    font: 32px Arial, sans-serif;
}
</style>
    
    
    <title></title>
    <meta name="generator" content="LibreOffice 5.4.7.2 (Linux)">
    <meta name="created" content="00:00:00">
    <meta name="changed" content="2020-10-07T14:03:55">
    
    <style type="text/css">
        body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Arial"; font-size:x-small }
        a.comment-indicator:hover + comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em;  } 
        a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em;  } 
        comment { display:none;  } 
    </style>
    
</head>

<body cz-shortcut-listen="true">
<table cellspacing="0" border="0">
    <tbody>
    <tr>
        <td height="36" align="center" valign="middle" width="35%"><b>RAHASIA</b></td>
        <td align="left" valign="top" width="20%"><br></td>
        <td colspan="2" align="center" valign="middle"><b>LAPORAN PENGUJIAN KESEHATAN<br>UNTUK JABATAN NEGARA</b></td>
        </tr>
    <tr>
        <td height="20" align="left" valign="top"><br></td>
        <td align="left" valign="top"><br></td>
        <td align="left" valign="bottom"><b><br></b></td>
        <td align="left" valign="top"><b><br></b></td>
    </tr>
    <tr>
        <td height="19" align="center" valign="top" style=""><b><i>               </i></b></td>
        <td align="left" valign="top"><br></td>
        <td colspan="2" align="center" valign="middle"><b>MAJELIS PENGUJI KESEHATAN PEGAWAI NEGERI</b></td>
        </tr>
    <tr>
        <td height="18" align="left" valign="top"><br></td>
        <td align="left" valign="top"><br></td>
        <td align="left" valign="top"><br></td>
        <td align="left" valign="top"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="20" align="left" valign="bottom"><br></td>
        <td align="left" valign="top"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="top"><br></td>
        <td rowspan="1" colspan="3" align="left" valign="top">Atas Permintaan &nbsp;&nbsp; : BKPP KABUPATEN BENGKALIS </td>
    </tr>
    <tr>
        <td height="20" align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="top"><br></td>
        <td rowspan="1" colspan="3" align="left" valign="top">Maksud Ujian &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : PEMERIKSAAN MCU CPNS MENJADI PNS KABUPATEN BENGKALIS</td>
    </tr>
    <tr>
        <td height="18" align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td style="border-bottom: 1px solid #000000" colspan="4" height="19" align="left" valign="middle"><b>UNTUK DIKIRIM KE ARSIP KEDOKTERAN PUSAT DEPT. KES. R.I.</b></td>
        </tr>
    <tr>
        <td height="18" align="left" valign="top">Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?=$modelDataLayanan->nama?></td>
        <td align="left" valign="top">Nama Kecil &nbsp; : </td>
        <td align="left" valign="top">NIP </td>
        <td align="left" valign="top" width="30%">:<br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="top">No. Karpeg : </td>
        <td align="left" valign="top"><br></td>
        <td align="left" valign="top">No. Daftar</td>
        <td align="left" valign="top"> : <?=$modelDataLayanan->no_registrasi?><br></td>
    </tr>
    <tr>
        <td height="18" align="left" colspan="2" valign="top">TTL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?=$modelDataLayanan->tempat?>, <?=LaporanBengkalisController::tglIndo( date('d-m-Y', strtotime($modelDataLayanan->tgl_lahir)))?></td>
        <td align="left" valign="top">Pekerjaan</td>
        <td align="left" valign="top"> : <?=$modelDataLayanan->pekerjaan?><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="top">Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?=$modelDataLayanan['alamat']?></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="top">Pekerjaan Sekarang </td> <!--u_jabatan_pekerjaan-->
        <td align="left" valign="top"> : <?=strtoupper($modelRegister['u_jabatan'])?><br></td> 
    </tr>
    <tr>
        <td height="18" align="left" valign="top">Agama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?=$modelDataLayanan->agama?></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="top">Bangsa</td>
        <td align="left" valign="top"> :  <?=$modelDataLayanan->wni?><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="top">Kawin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?=$modelDataLayanan->status_perkawinan=="Kawin"?"Ya":"-"?></td>
        <td align="left" valign="top">Belum Kawin : <?=$modelDataLayanan->status_perkawinan=="Belum Kawin"?"Ya":"-"?></td>
        <td align="left" valign="top">Janda Laki-laki </td>
        <td align="left" valign="top">:  <?=$modelDataLayanan->status_perkawinan=="Duda"?"Ya":"-"?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Anak : <?=$modelAnamnesis->h!=null?$modelAnamnesis->h:"0"?></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="top">Pendidikan : <?=$modelDataLayanan->pendidikan?></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="top">Pemeriksaan di : RSUD Arifin Achmad</td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="top">Tanggal</td>
        <td align="left" valign="bottom"> : <?=LaporanBengkalisController::tglIndo( date('d-m-Y', strtotime($modelDataLayanan->tanggal_pemeriksaan)) ); ?><br></td>
    </tr>
    <tr>
        <td style="border-top: 1px solid #000000" colspan="4" height="18" align="center" valign="middle"><b>ANAMNESA</b></td>
        </tr>
    <tr>
        <td style="border-bottom: 1px solid #000000" colspan="4" height="18" align="center" valign="middle"><b>(YANG HARUS DIJAWAB OLEH YANG BERSANGKUTAN).</b></td>
        </tr>
    <tr>
        <td style="padding-left:7px; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" height="20" align="left" valign="middle">1.Apakah Sdr. merasa sehat betul pada saat itu ?</td>
        <td style="padding-left:7px;border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" align="left" valign="middle"> <?=!isset($modelAnamnesaBengkalis->jawaban1)?"-":$modelAnamnesaBengkalis->jawaban1?></td>
        </tr>
    <tr>
        <td style="padding-left:7px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" height="20" align="left" valign="middle">2.Kuatkah Sdr. mengerjakan pekerjaan berat ?</td>
        <td style="padding-left:7px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" align="left" valign="middle"> <?=!isset($modelAnamnesaBengkalis->jawaban2)?"-":$modelAnamnesaBengkalis->jawaban2?></td>
        </tr>
    <tr>
        <td style="padding-left:7px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" height="104" align="left" valign="middle">3.Pernahkah Sdr. menderita penyakit batuk kering (t.b.c),  penyakit paru-paru, penyakit bengek (asthma), penyakit  kotor, penyakit ginjal, penyakit jantung, penyakit  pertukaran zat, buluh mekar, encok, penyakit cacar,  sawan, penyakit •jiwa atau penyakit-penyakit lain yang  berat ?</td>
        <td style="padding-left:7px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" align="left" valign="middle"> <?=!isset($modelAnamnesaBengkalis->jawaban3)?"-":$modelAnamnesaBengkalis->jawaban3?></td>
        </tr>
    <tr>
        <td style="padding-left:7px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" height="70" align="left" valign="middle">4.Pernahkah Sdr. menderita penyakit parah umpamanya :  malaria, mejen (amuba atau basiler), penyakit cacar,  tipus, kolera, penyakit kuning, beri-beri, filariasis dan  sebagainya ?</td>
        <td style="padding-left:7px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" align="left" valign="middle"> <?=!isset($modelAnamnesaBengkalis->jawaban4)?"-":$modelAnamnesaBengkalis->jawaban4?></td>
        </tr>
    <tr>
        <td style="padding-left:7px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" height="34" align="left" valign="middle">5.Adakah terdapat penyakit turun-menurun keluarga Sdr. ?</td>
        <td style="padding-left:7px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" align="left" valign="middle"> <?=!isset($modelAnamnesaBengkalis->jawaban5)?"-":$modelAnamnesaBengkalis->jawaban5?></td>
        </tr>
    <tr>
        <td style="padding-left:7px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" height="36" align="left" valign="middle">6. Untuk penyakit apakah Sdr. telah disuntik tankai dan bila ?  (misalnya tipus, kolera, pes)</td>
        <td style="padding-left:7px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" align="left" valign="middle"> <?=!isset($modelAnamnesaBengkalis->jawaban6)?"-":$modelAnamnesaBengkalis->jawaban6?></td>
        </tr>
    <tr>
        <td style="padding-left:7px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" height="53" align="left" valign="middle">7.Kecelakaan apa yang Sdr. alami ? Untuk kecelakaan itu Sdr. telah mendapat tunjangan dan<br>berapa lamanya ?</td>
        <td style="padding-left:7px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" align="left" valign="middle"> <?=!isset($modelAnamnesaBengkalis->jawaban7)?"-":$modelAnamnesaBengkalis->jawaban7?></td>
        </tr>
    <tr>
        <td style="padding-left:7px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" height="36" align="left" valign="middle">8.Bagian manakah dari badan Sdr telah pernah clibedah ? apabila ?</td>
        <td style="padding-left:7px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" align="left" valign="middle"> <?=!isset($modelAnamnesaBengkalis->jawaban8)?"-":$modelAnamnesaBengkalis->jawaban8?></td>
        </tr>
    <tr>
        <td style="padding-left:7px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" height="36" align="left" valign="middle">9.Adakah Sdr. selama 5 tahun yang terakhir ini dalam pengobatan dokter, jika demikian untuk penyakit apa ?</td>
        <td style="padding-left:7px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" align="left" valign="middle"> <?=!isset($modelAnamnesaBengkalis->jawaban9)?"-":$modelAnamnesaBengkalis->jawaban9?></td>
        </tr>
    <tr>
        <td style="padding-left:7px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" height="36" align="left" valign="middle">10.Adakah Sdr.pernah diperiksa untuk dinas tentara ? Bila dan bagaimana hasilnya ?</td>
        <td style="padding-left:7px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" align="left" valign="middle"> <?=!isset($modelAnamnesaBengkalis->jawaban10)?"-":$modelAnamnesaBengkalis->jawaban10?></td>
        </tr>
    <tr>
        <td style="padding-left:7px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" height="53" align="left" valign="middle">11, Adakah Sdr.pernah diperiksa untuk asuransi jiwa atau untuk sesuatu pekerjaan ? Jika demikian bila dan bagaimana hasilnya ?</td>
        <td style="padding-left:7px;border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" align="left" valign="middle"> <?=!isset($modelAnamnesaBengkalis->jawaban11)?"-":$modelAnamnesaBengkalis->jawaban11?></td>
        </tr>
    <tr>
        <td colspan="4" height="36" align="center" valign="middle">SAYA TELAH MEMBACA PERTANYAAN-PERTANYAAN INI DENGAN JAWABAN-JAWABANNYA DAN TELAH MENGISI DENGAN SEBENARNYA</td>
        </tr>
    <tr>
        <td height="18" align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"></td>
        <td align="center" valign="top">Tanda Tangan :</td>
    </tr>
    <tr>
        <td height="18" align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="top"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="top"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="top"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="center" valign="top">(&nbsp;  <?=$modelDataLayanan->nama?> &nbsp;)</td>
    </tr>
</tbody></table>
<!-- ************************************************************************** -->




    
    <title></title>
    <meta name="generator" content="LibreOffice 5.4.7.2 (Linux)">
    <meta name="created" content="00:00:00">
    <meta name="changed" content="2020-10-07T14:04:33">
    
    <style type="text/css">
        body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Arial"; font-size:x-small }
        a.comment-indicator:hover + comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em;  } 
        a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em;  } 
        comment { display:none;  } 
    </style>
    
</head>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<body cz-shortcut-listen="true">
<table cellspacing="0" border="0">
    <tbody><tr>
        <td style="border-bottom: 1px solid #000000" colspan="6" height="18" align="center" valign="middle">PEMERIKSAAN KEDOKTERAN</td>
        </tr>
    <tr>
        <td height="18" align="left" valign="top">Tinggi :  <?=$modelPemeriksaanFisik->status_gizi_tinggi_badan?> cm</td>
        <td align="left" valign="top">Berat : <?=$modelPemeriksaanFisik->status_gizi_berat_badan?> Kg</td>
        <td colspan="2" align="left" valign="middle">Lingkar dada dengan menarik napas : - </td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td colspan="2" height="18" align="left" valign="middle">Lingkar dada dengan mengembus napas : -</td>
        <td align="left" valign="top">Perut :  <?=$modelPemeriksaanFisik->status_gizi_lingkaran_perut?> cm</td>
        <td align="left" valign="bottom">Leher : -</td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
																																							<?php $kecerdasan="&nbsp;&nbsp;&nbsp;CUKUP&nbsp;&nbsp;&nbsp;</span><br><s>KURANG</s>"; ?>
																																							<?php $sehat="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sehat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br> <s>Kurang Sehat</s>"; ?>
																																							<?php 
																																							if(isset($modelPemeriksaanDokterBengkalis)){
																																								  if("Cukup"==$modelPemeriksaanDokterBengkalis->kecerdasan){$kecerdasan="&nbsp;&nbsp;&nbsp;CUKUP&nbsp;&nbsp;&nbsp;</span><br><s>KURANG</s>";} ?>
																																							<?php if("Kurang"==$modelPemeriksaanDokterBengkalis->kecerdasan){$kecerdasan="&nbsp;&nbsp;&nbsp;<s>CUKUP</s>&nbsp;&nbsp;&nbsp;</span><br>KURANG";} ?>
																																							<?php if("SEHAT"==$modelPemeriksaanDokterBengkalis->sehat){$sehat="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sehat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br> <s>Kurang Sehat</s>";} ?>
																																							<?php if("KURANG SEHAT"==$modelPemeriksaanDokterBengkalis->sehat){$sehat="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<s>Sehat</s>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br> Kurang Sehat";} 
																																							}?>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; " rowspan="2" height="56" align="center" valign="middle" width="20%">KECERDASAN :</td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000"  rowspan="2" align="center" valign="middle"><span class="underline">  <?=$kecerdasan?></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000;" rowspan="2" align="center" valign="middle">Yang bersangkutan</td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000;" rowspan="2" align="center" valign="top"><span class="underline">  <?=$sehat?></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000;" rowspan="2" align="center" valign="middle">kah kelihatannya ?</td>
        <td style="border-top: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="top"><br></td>
    </tr>
    <tr>
        <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="top"><br></td>
    </tr>
    <tr>
																																							<?php $keliatan_muda='&nbsp;&nbsp;&nbsp;<s>Muda</s>&nbsp;&nbsp;&nbsp;</span><br> <span class="underline">&nbsp;&nbsp;&nbsp;Biasa&nbsp;&nbsp;&nbsp;</span><br><s>Tua</s>'; ?>
																																							<?php 
																																							if(isset($modelPemeriksaanDokterBengkalis)){
																																								  if("BIASA"==$modelPemeriksaanDokterBengkalis->keliatan_muda){$keliatan_muda='&nbsp;&nbsp;&nbsp;<s>Muda</s>&nbsp;&nbsp;&nbsp;</span><br> <span class="underline">&nbsp;&nbsp;&nbsp;Biasa&nbsp;&nbsp;&nbsp;</span><br><s>Tua</s>';} ?>
																																							<?php if("MUDA"==$modelPemeriksaanDokterBengkalis->keliatan_muda){$keliatan_muda='&nbsp;&nbsp;&nbsp;Muda&nbsp;&nbsp;&nbsp;</span><br> <span class="underline">&nbsp;&nbsp;&nbsp;<s>Biasa</s>&nbsp;&nbsp;&nbsp;</span><br><s>Tua</s>';} ?>
																																							<?php if("TUA"==$modelPemeriksaanDokterBengkalis->keliatan_muda){$keliatan_muda='&nbsp;&nbsp;&nbsp;<s>Muda</s>&nbsp;&nbsp;&nbsp;</span><br> <span class="underline">&nbsp;&nbsp;&nbsp;<s>Biasa</s>&nbsp;&nbsp;&nbsp;</span><br>Tua';} 
																																							}?>
																																							
																																							<?php
																																								//imt variabel
																																								$tegapnya="";
																																								$imt=$modelPemeriksaanFisik->status_gizi_imt;
																																								if ($imt < 18.5) {
																																									// Kekurangan Berat Badan Tingkat Berat
																																									$tegapnya="KURUS";
																																								} else if ($imt > 18.5 && $imt < 25.0) {
																																									// Normal
																																									$tegapnya="BIASA";
																																								}else if ($imt > 25.0) {
																																									// Kelebihan Berat Badan Tingkat Berat
																																									$tegapnya="TEGAP";
																																								}
																																							?>
																																							
																																							<?php $tegap='<span class="underline">&nbsp;&nbsp;&nbsp;<s>Tegap</s>&nbsp;&nbsp;&nbsp;</span><br> <span class="underline">&nbsp;&nbsp;&nbsp;Biasa&nbsp;&nbsp;&nbsp;</span><br><s>Kurus</s>'; ?>
																																							<?php if("BIASA"==$tegapnya){$tegap='<span class="underline">&nbsp;&nbsp;&nbsp;<s>Tegap</s>&nbsp;&nbsp;&nbsp;</span><br> <span class="underline">&nbsp;&nbsp;&nbsp;Biasa&nbsp;&nbsp;&nbsp;</span><br><s>Kurus</s>';} ?>
																																							<?php if("TEGAP"==$tegapnya){$tegap='<span class="underline">&nbsp;&nbsp;&nbsp;Tegap&nbsp;&nbsp;&nbsp;</span><br> <span class="underline">&nbsp;&nbsp;&nbsp;<s>Biasa</s>&nbsp;&nbsp;&nbsp;</span><br><s>Kurus</s>';} ?>
																																							<?php if("KURUS"==$tegapnya){$tegap='<span class="underline">&nbsp;&nbsp;&nbsp;<s>Tegap</s>&nbsp;&nbsp;&nbsp;</span><br> <span class="underline">&nbsp;&nbsp;&nbsp;<s>Biasa</s>&nbsp;&nbsp;&nbsp;</span><br>Kurus';} ?>
		
																																							<?php $gemuk='<span class="underline">&nbsp;&nbsp;&nbsp;<s>Gemuk</s>&nbsp;&nbsp;&nbsp;</span><br> <span class="underline">&nbsp;&nbsp;&nbsp;Biasa&nbsp;&nbsp;&nbsp;</span><br><s>Kurus</s>'; ?>
																																							<?php if("BIASA"==$tegapnya){$gemuk='<span class="underline">&nbsp;&nbsp;&nbsp;<s>Gemuk</s>&nbsp;&nbsp;&nbsp;</span><br> <span class="underline">&nbsp;&nbsp;&nbsp;Biasa&nbsp;&nbsp;&nbsp;</span><br><s>Kurus</s>';} ?>
																																							<?php if("TEGAP"==$tegapnya){$gemuk='<span class="underline">&nbsp;&nbsp;&nbsp;Gemuk&nbsp;&nbsp;&nbsp;</span><br> <span class="underline">&nbsp;&nbsp;&nbsp;<s>Biasa</s>&nbsp;&nbsp;&nbsp;</span><br><s>Kurus</s>';} ?>
																																							<?php if("KURUS"==$tegapnya){$gemuk='<span class="underline">&nbsp;&nbsp;&nbsp;<s>Gemuk</s>&nbsp;&nbsp;&nbsp;</span><br> <span class="underline">&nbsp;&nbsp;&nbsp;<s>Biasa</s>&nbsp;&nbsp;&nbsp;</span><br>Kurus';} ?>
		
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000;" rowspan="3" height="20" align="center" valign="middle"><span class="underline"><?=$keliatan_muda?></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" rowspan="3" align="left" valign="middle">kah diakelihatannya untuk umurnya .</td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000;" rowspan="3" align="center" valign="middle"><?=$gemuk?></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" rowspan="3" align="left" valign="middle">kah dia ?</td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; " rowspan="3" align="center" valign="middle">Bagaimanakah bentuk badannya</td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" rowspan="3" align="center" valign="middle"><?=$tegap?></td>
    </tr>
    <tr>
	
    </tr>
    <tr>
	
    </tr>
    <tr>
        <td height="18" align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan="3" height="20" align="left" valign="middle">KULIT : Keadaan <?=$modelPemeriksaanFisik->kulit_kulit?> </td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000;" colspan="3" align="left" valign="middle">Perut : - </td>
        </tr>
    <tr>
        <td height="18" align="left">SELAPUT-SELAPUT LENDIR  </td>
        <td align="left" valign="bottom"> &nbsp;&nbsp;&nbsp;&nbsp; : <?=$modelPemeriksaanFisik->kulit_selaput_lendir?> </td>
        <td align="left" valign="bottom">KELENJAR GETAH BENING :</td>
        <td align="left" valign="bottom"> Leher</td>
        <td align="left" valign="bottom"> : <?=$modelPemeriksaanFisik->kelenjar_getah_bening_leher?></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="top">  (Glandulae lymphaticae)</td>
        <td align="left" valign="bottom">Sulc bicip</td>
        <td align="left" valign="bottom"> : -</td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="top"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom">Ketiak</td>
        <td align="left" valign="bottom"> : <?=$modelPemeriksaanFisik->kelenjar_getah_bening_ketiak?> </td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="top"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom">Lipat paha  </td>
        <td align="left" valign="bottom">: -</td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td style="border-top: 1px solid #000000" colspan="5" height="19" align="left" valign="middle">PANCA INDERA :</td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="top">MATA : </td>
        <td align="left" valign="top">Ketajaman Penglihatan</td>
        <td align="left" valign="top">: Kanan (<?=$modelMcuSpesialisMata->virus_mata_tanpa_koreksi_mata_kanan?>)</td>
        <td align="left" valign="top">Dengan kaca mata </td>
        <td align="left" colspan="2" valign="bottom">: Kanan (<?=$modelMcuSpesialisMata->virus_mata_dengan_koreksi_mata_kanan?>) </td>
    </tr>
    <tr>
        <td height="18" align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="top"> &nbsp; Kiri (<?=$modelMcuSpesialisMata->virus_mata_tanpa_koreksi_mata_kiri?>)</td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" colspan="2" valign="bottom"> &nbsp; Kiri (<?=$modelMcuSpesialisMata->virus_mata_dengan_koreksi_mata_kanan?>)</td>
    </tr>
    <tr>
        <td height="18" align="left" valign="bottom"><br></td>
        <td align="left" valign="top">Luasnya Penglihatan </td>
        <td align="left" valign="bottom">: -</td>
        <td align="left" valign="bottom"> Gerak mata </td>
        <td align="left" valign="bottom">: Kanan (<?=$modelMcuSpesialisMata->kesegarisan_gerak_bola_mata_kanan?>)</td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="bottom"><br></td>
        <td align="left" valign="top">Refleks-refleks manik mata </td>
        <td align="left" valign="bottom">: Kanan (-) </td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="top"> &nbsp; Kiri (<?=$modelMcuSpesialisMata->kesegarisan_gerak_bola_mata_kiri?>)</td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"> &nbsp; Kiri (-) </td>
        <td align="left" valign="top">Pembeda warna</td>
        <td align="left" colspan="2" valign="top">:  Kanan (<?=$modelMcuSpesialisMata->persepsi_warna_mata_kanan?>) <br> &nbsp; Kiri (<?=$modelMcuSpesialisMata->persepsi_warna_mata_kiri?>)</td>
    </tr>
    <tr>
        <td height="18" align="left" valign="top">TELINGA :</td>
        <td align="left" valign="top">Gendang Pendengaran ? </td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom">Percakapan berbisik </td>
        <td align="left" valign="bottom">: </td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="top"><br></td>
        <td align="left" valign="bottom">Telinga Kiri</td>
        <td align="left" valign="bottom">: <?=$modelPemeriksaanFisik->telinga_serumen_kanan?> kelainan</td>
        <td align="left" colspan="3" valign="bottom">Kanan (<?= isset($modelMcuSpesialisThtBerbisik)?$modelMcuSpesialisThtBerbisik->tl_test_berbisik_telinga_kanan:"-"?>)</td>
    </tr>
    <tr>
        <td height="18" align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom">Telinga Kanan</td>
        <td align="left" valign="bottom">: <?=$modelPemeriksaanFisik->telinga_serumen_kiri?> kelainan</td>
        <td align="left" colspan="3" valign="bottom">Kiri (<?= isset($modelMcuSpesialisThtBerbisik)?$modelMcuSpesialisThtBerbisik->tl_test_berbisik_telinga_kiri:"-"?>)</td>
    </tr>
    <tr>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" colspan="6" height="18" align="left" valign="middle"><b>HIDUNG :</b> <?=$modelPemeriksaanFisik->hidung_meatus_nasi?></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" colspan="3" valign="top"><b>RONGGA MULUT DAN HULU-KERONGKONGAN (PHARYNX)</b></td>
        <td align="left" valign="bottom"><b><br></b></td>
        <td align="left" valign="bottom"><b><br></b></td>
        <td align="left" valign="bottom"><b><br></b></td>
        <td align="left" valign="bottom"><b><br></b></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
		<?php 
			$listGigi=["g18","g17","g16","g15","g14","g13","g12","g11","g21","g22","g23","g24","g25","g26","g27","g28","g38","g37","g36","g35","g34","g33","g32","g31","g41","g42","g43","g44","g45","g46","g47","g48"];
			$missing=0;
			foreach ($listGigi as $key=>$lg){
				if($modelMcuSpesialisGigi[$lg] =="missing"){
					$missing++;
				}
			}
			?>
        <td style="border-bottom: 1px solid #000000" height="18" align="left" valign="top">Keadaan Gigi-geligi :  <?=$modelMcuSpesialisGigi->kesan?> </td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"><br></td>
        <td style="border-bottom: 1px solid #000000" colspan="2" align="left" valign="bottom">Berapa buah yang tidak ada : <?=$missing?></td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="top"> LEHER &nbsp;&nbsp;&nbsp; : gondok : <?=$modelPemeriksaanFisik->leher_kelenjar_thyroid?></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"> Hiliran : <?=$modelPemeriksaanFisik->leher_pulsasi_carotis?></td>
        <td align="left" colspan="2" valign="bottom">Batang tenggorokan : <?=$modelPemeriksaanFisik->leher_trachea?> </td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td style="border-bottom: 1px solid #000000" height="18" align="right" valign="top">(struma)</td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"><br></td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"> (fistel) </td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom">(trachea)</td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="top">DADA &nbsp;&nbsp;&nbsp;&nbsp; : setangkup : <?=$modelPemeriksaanFisik->dada_bentuk=="Simetris"?"Ya":"Tidak";?> </td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom">tidak setangkup : <?=$modelPemeriksaanFisik->dada_bentuk=="Asimetris"?"Ya":"Tidak";?></td>
        <td align="left" colspan="2" valign="bottom"> Jika bernafas : <?=$modelPemeriksaanFisik->dada_bentuk?></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td style="border-bottom: 1px solid #000000" height="18" align="right" valign="top">(symmetrisch)</td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"><br></td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"> (Asymmetrisch)</td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"><br></td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" colspan="2" valign="top">PARU-PARU : Periksa ketok :  kanan (<?=$modelPemeriksaanFisik->paru_jantung_perkusi_kanan?>) kiri (<?=$modelPemeriksaanFisik->paru_jantung_perkusi_kiri?>)</td>
        <td align="left" colspan="3" valign="bottom"> Periksa dengar : kanan (<?=$modelPemeriksaanFisik->paru_jantung_auskultasi_bunyi_nafas_kanan?>) kiri (<?=$modelPemeriksaanFisik->paru_jantung_auskultasi_bunyi_nafas_kiri?>) </td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td style="border-bottom: 1px solid #000000" height="18" align="right" valign="top">(percussio)</td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"><br></td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"> (auscultatio)</td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"><br></td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" colspan="3" valign="top">JANTUNG : Pukulan ujung jantung : <?=$modelPemeriksaanFisik->paru_jantung_perkusi_iktus_kanan?></td>
        <td align="left" colspan="2" valign="bottom">Desakan darah :              Diastolik : <?=$modelPemeriksaanFisik->diastolik?></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="right" valign="top"><br>  </td>
        <td align="left"  colspan="2" valign="bottom">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														Sistolik : <?=$modelPemeriksaanFisik->sistolik?><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" colspan="2" valign="top">   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Periksa ketok &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?=$modelPemeriksaanFisik->paru_jantung_perkusi_batas_jantung_kanan?></td>
        <td align="left" valign="bottom">  Periksa dengar : <?=$modelPemeriksaanFisik->paru_jantung_bunyi_jantung?> </td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Frekuensi denyut nadi </td>
        <td align="left" valign="top">: Waktu istirahat  : <?=$modelPemeriksaanFisik->tanda_vital_nadi?></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="bottom"><br></td>
        <td align="left" valign="top">&nbsp;&nbsp;Sesudah bergerak  : -</td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="bottom"><br></td>
        <td align="left" valign="top">&nbsp;&nbsp;setelah 1 menit  : -</td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td style="border-bottom: 1px solid #000000" height="18" align="left" colspan="2" valign="top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kwalitet denyut nadi &nbsp;&nbsp; : - </td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"><br></td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"><br></td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" colspan="2" valign="top">PERUT : Periksa-raba (palpatio) : <?=$modelPemeriksaanFisik->abdomen?></td>
        <td align="left" valign="bottom">  Hati &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?=$modelPemeriksaanFisik->abdomen_hati?></td>
        <td align="left" colspan="3" valign="bottom">&nbsp;&nbsp;&nbsp;&nbsp; Limpah : <?=$modelPemeriksaanFisik->abdomen_limpa?></td>
    </tr>
    <tr>
        <td height="18" align="left" colspan="2" valign="top">Ginjal : kanan (<?=$modelPemeriksaanFisik->abdomen_ginjal_kanan?>)  kiri (<?=$modelPemeriksaanFisik->abdomen_ginjal_kiri?>) &nbsp;&nbsp; Burutburut? -</td>
        <td align="left" colspan="3" valign="top">  Dubur (Anus) : <?=$modelPemeriksaanFisik->genitourinaria_anus?>  &nbsp;&nbsp; Haermorrhoides ? <?=$modelPemeriksaanFisik->hemoroid?> </td>
        <td align="left" valign="top"><br></td>
    </tr>
    <tr>
        <td height="18" align="center" colspan="2" valign="top">Setoum : Hydrocele? <?= $modelDataLayanan->jenis_kelamin=="L"? $modelPemeriksaanFisik->hydrocele:"-"?></td>
        <td align="left" valign="bottom"> Varicocele ?  <?= $modelDataLayanan->jenis_kelamin=="L"? $modelPemeriksaanFisik->genitourinaria_genitalia_eksternal=="Tidak Normal"?"Tidak Normal":$modelPemeriksaanFisik->varicocele:"-"?> </td>
        <td align="left" colspan="3" valign="bottom">Penis : Ulcera ? <?= $modelDataLayanan->jenis_kelamin=="L"? $modelPemeriksaanFisik->genitourinaria_genitalia_eksternal=="Tidak Normal"?"Tidak Normal":$modelPemeriksaanFisik->ulceral:"-"?></td>
    </tr>
    <tr>
        <td height="18" align="right" valign="top">Gonorchoea? <?= $modelDataLayanan->jenis_kelamin=="L"? $modelPemeriksaanFisik->genitourinaria_genitalia_eksternal=="Tidak Normal"?"Tidak Normal":$modelPemeriksaanFisik->gonorchoea:"-"?> </td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" colspan="4" valign="bottom"> Perempuan &nbsp;&nbsp;&nbsp;: Haid (menses) : <?=$bool_mens?> </td>
    </tr>
    <tr>
        <td style="border-bottom: 1px solid #000000" height="18" align="left" valign="top"><br></td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"><br></td>
        <td style="border-bottom: 1px solid #000000" align="center" valign="bottom">Genitalia</td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"><br></td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" colspan="3" valign="top">ANGGOTA GERAK, refleks urat lutut ? kanan (<?=$modelPemeriksaanFisik->reflek_fisiologis_patella_kanan?>) &nbsp;&nbsp; kiri (<?=$modelPemeriksaanFisik->reflek_fisiologis_patella_kiri?>)</td>
        <td align="left" valign="bottom">   Refleks urat tumit : -</td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(archillespees)</td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" colspan="5" valign="top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; refleks telapak kaki  ?  kanan (<?=$modelPemeriksaanFisik->reflek_patologis_kanan?>) kiri (<?=$modelPemeriksaanFisik->reflek_patologis_kiri?>) </td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Rombong ? -</td>
        <td align="left" colspan="2" valign="bottom">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Varices? kanan (<?=$modelPemeriksaanFisik->tulang_bawah_varises_kanan?>) kiri (<?=$modelPemeriksaanFisik->tulang_bawah_varises_kiri?>)</td>
        <td align="left" colspan="3" valign="bottom" style="padding-left:-40px"> Jari kaki palu ?  kanan (<?=$modelPemeriksaanFisik->tulang_atas_kelaianan_kukujari_kanan?>) &nbsp;&nbsp; kiri (<?=$modelPemeriksaanFisik->tulang_atas_kelaianan_kukujari_kiri?>)</td>
    </tr>
    <tr>
        <td height="18" align="left" valign="top"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom" style="padding-left:-40px">(hamertenen)</td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td style="border-bottom: 1px solid #000000" height="18" align="left" colspan="3" valign="top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; cacat lain : -</td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"><br></td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td style="border-bottom: 1px solid #000000" colspan="2" height="18" align="left" valign="top">PUNGGUNG : Tulang belakang : <?=$modelPemeriksaanFisik->vertebra?></td>
        <td style="border-bottom: 1px solid #000000" colspan="2" align="left" valign="bottom">  Gerak biasa ? <?=$modelPemeriksaanFisik->tingkat_kesadaran_gangguan_saat_berjalan?> ada gangguan</td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="right" valign="bottom"><br></td>
        <td align="left" valign="top" colspan="3">epit : <?=$dataLab["epi"]?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; leuco : <?=$dataLab["leu"]?>  </td>
    </tr>
    <tr>
        <td height="18" align="left" valign="top">URINE Zat-telur : - </td>
        <td align="left" valign="bottom"><br></td>
        <td style="padding-left:-70px;" align="left" valign="bottom">   Zat saker : - </td>
        <td style="padding-left:-70px;" align="left" valign="bottom">Endapan : </td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td style="border-bottom: 1px solid #000000" height="18" align="left" valign="top"><br></td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"><br></td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"><br></td>
        <td style="border-bottom: 1px solid #000000" align="left" colspan="2" valign="bottom">Ert : <?=$dataLab["eri"]?>  &nbsp;&nbsp;&nbsp;&nbsp; Cyl : <?=$dataLab["cyl"]?>  &nbsp;&nbsp;&nbsp;&nbsp;  Co : <?=$dataLab["co"]?> </td>
    </tr>
    <tr>
        <td colspan="6" height="18" align="left" valign="middle">REAKSI WASERMANN DALAM DARAH : VDRL (<?=$dataLab["VDRL"]?>) &nbsp;&nbsp;&nbsp;&nbsp; TPHA (<?=$dataLab["TPHA"]?>)</td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td style="border-bottom: 1px solid #000000" height="18" align="left" colspan="2" valign="top">Pemeriksaan darah : H B : <?=$dataLab["hb"]?>  </td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom">  B.B.S. : <?=$dataLab["LED"]?> </td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"><br></td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td style="border-bottom: 1px solid #000000" height="18" align="left" colspan="3" valign="top">GAMBAR RONTGEN : Terlampir</td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"><br></td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td style="border-bottom: 1px solid #000000" height="18" align="left" colspan="5" valign="top">PEMERIKSAAN TINJA (feses) : <?=$feses?></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td colspan="4" height="17" align="left" valign="middle">CATATAN-CATATAN ISTIMEWA ATAU PERATURAN ISTIMEWA</td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td colspan="4" height="36" align="left" valign="top">
		<?=$modelPembedaan->noted_sp;?>						
			
		<br><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
</tbody></table>
<!-- ************************************************************************** -->


    
    
    <title></title>
    <meta name="generator" content="LibreOffice 5.4.7.2 (Linux)">
    <meta name="created" content="00:00:00">
    <meta name="changed" content="2020-10-07T14:04:58">
    
    <style type="text/css">
        body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Arial"; font-size:x-small }
        a.comment-indicator:hover + comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em;  } 
        a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em;  } 
        comment { display:none;  } 
    </style>
    
</head>

<body cz-shortcut-listen="true">
<table style="page-break-inside: avoid" cellspacing="0" border="0">
    <tbody>
	<tr>
        <td colspan="4" height="17" align="left" valign="middle"><b>DAPATKAH KELAINAN-KELAINAN YANG MUNGKIN TERDAPAT DIPERBAIKI DAN  BAGAIMANA CARANYA ?</b></td>
    </tr>
    <tr>
        <td colspan="3" height="18" align="left" valign="top">
			<?php 
			if( !isset($modelMcuPenatalaksanaanMcu) ){?>
				Pertahankan status kesehatan saat ini<?php
			}else
			{
				if($modelMcuPenatalaksanaanMcu->jenis_permasalahan!=null || $modelMcuPenatalaksanaanMcu->jenis_permasalahan!=""){ ?>
				Jenis permasalahan (<?=$modelMcuPenatalaksanaanMcu->jenis_permasalahan?>), rencana (<?=$modelMcuPenatalaksanaanMcu->rencana?>)<br>
			<?php }else{ ?>
				Pertahankan status kesehatan saat ini
			<?php } 
			}?>
		</td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="top"><br><br><b>KESAN UMUM</b></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
	<?php
		$fitnya="";
		if($modelPemeriksaanFisik->kategori_kesehatan=="FIT"){
			$fitnya="FIT TO WORK";
		}
		if($modelPemeriksaanFisik->kategori_kesehatan=="FIT WITH NOTE"){
			$fitnya="FIT TO WORK WITH NOTE";
		}
		if($modelPemeriksaanFisik->kategori_kesehatan=="TEMPORARY UNFIT"){
			$fitnya="TEMPORARY UNFIT TO WORK";
		}
		if($modelPemeriksaanFisik->kategori_kesehatan=="UNFIT"){
			$fitnya="UNFIT TO WORK";
		}
	?>
    <tr>
        <td height="18" colspan="4" align="left" valign="top" style="font-size:14px;"><?=strtoupper($fitnya)?> SEBAGAI <?=strtoupper($modelRegister['u_jabatan']) ?> DI <?=strtoupper($modelRegister['u_tempat_tugas']) ?><br></td>
    </tr>
    <tr>
        <td style="border-top: 1px solid #000000; font-size:16px;" colspan="4" height="1" align="center" valign="middle"><br><b>PEMBEDAAN</b></td>
    </tr>
    <tr>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="3" height="19" align="center" valign="middle"><b>Diterima baik untuk Jabatan Negara</b></td>
        <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" align="center" valign="bottom"><b>Tidak Diterima</b></td>
    </tr>
	<?php 
	
		$kelonggaran_a='<span class="underline">&nbsp;&nbsp;&nbsp;dengan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> kelonggaran<br>tidak dengan';
		$kelonggaran_b='<span class="underline">&nbsp;&nbsp;&nbsp;dengan &nbsp;&nbsp;&nbsp;</span> kelonggaran<br>tidak dengan';
		$a="A.";
		$b="B.";
		$c="C.";
		$d="D.";
		$noted="";
		if(isset($modelPembedaan) ){
			if($modelPembedaan->pilhan_terima_jabatan=="A"){
				$a="<img width='40px' src='".url::to("@web/img/pilih_a.png")."'/>";
				if($modelPembedaan->status=="tidak dengan kelonggaran"){
					$kelonggaran_a='<span class="underline">&nbsp;&nbsp;&nbsp;<s>dengan</s>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> kelonggaran<br>tidak dengan';
				}
				if($modelPembedaan->status=="dengan kelonggaran"){
					$kelonggaran_a='<span class="underline">&nbsp;&nbsp;&nbsp;dengan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> kelonggaran<br><s>tidak dengan</s>';
				}
			}
			if($modelPembedaan->pilhan_terima_jabatan=="B"){
				$b="<img width='40px' src='".url::to("@web/img/pilih_b.png")."'/>";
				if($modelPembedaan->status=="tidak dengan kelonggaran"){
					$kelonggaran_b='<span class="underline">&nbsp;&nbsp;&nbsp;<s>dengan</s> &nbsp;&nbsp;&nbsp;</span> kelonggaran<br>tidak dengan';
				}
				if($modelPembedaan->status=="dengan kelonggaran"){
					$kelonggaran_b='<span class="underline">&nbsp;&nbsp;&nbsp;dengan &nbsp;&nbsp;&nbsp;</span> kelonggaran<br><s>tidak dengan</s>';
				}
			}
			if($modelPembedaan->pilhan_terima_jabatan=="C"){
				$c="<img width='40px' src='".url::to("@web/img/pilih_c.png")."'/>";
			}
			if($modelPembedaan->pilhan_terima_jabatan=="D"){
				$d="<img width='40px' src='".url::to("@web/img/pilih_d.png")."'/>";
			}
			
			$noted=$modelPembedaan->noted;
		}
	?>
    <tr>
        <td width="20%" style="border-left: 1px solid #000000; border-right: 1px solid #000000" height="18" align="center" valign="bottom"> <?=$a?></td>
        <td width="20%" align="center" valign="bottom"> <?=$b?></td>
        <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom"> <?=$c?></td>
        <td style="border-right: 1px solid #000000" align="center" valign="bottom"> <?=$d?></td>
    </tr>
    <tr>
        <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" height="18" align="center" valign="bottom">Baik untuk semua jabatan</td>
        <td align="center" valign="bottom">Hanya baik untuk jabatan tata usaha </td>
        <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom">Hanya baik untuk jabatan tertentu</td>
        <td style="border-right: 1px solid #000000" align="center" valign="bottom">Tidak baik untuk semua jabatan</td>
    </tr>
    <tr>
        <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" height="18" align="left" valign="bottom"><?=$kelonggaran_a?></td>
        <td align="left" valign="bottom"><?=$kelonggaran_b?></td>
        <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom"><br></td>
        <td style="border-right: 1px solid #000000" align="center" valign="bottom"><br></td>
    </tr>
    <tr>
        <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" height="18" align="left" valign="bottom">          </td>
        <td align="left" valign="bottom">                </td>
        <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="bottom"><br></td>
        <td style="border-right: 1px solid #000000" align="center" valign="bottom"><br></td>
    </tr>
    <tr>
        <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="18" align="left" valign="bottom"><br></td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"><br></td>
        <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><br></td>
        <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" colspan="4" valign="top"><b>CATATAN:</b> Terangkan sejelas-jelasnya apa pertimbangan yang menyebabkan perbedaan ini :</td>
    </tr>

</tbody></table>
	<!--PEMISAH-->
<table style="page-break-inside: avoid" cellspacing="0" border="0">
<tbody>
    <tr>
        <td height="18" colspan="5" align="left" valign="top"><?=$noted?><br></td>
    </tr>
    <tr>
        <td width="20%" height="18" align="left" valign="top"><br></td>
        <td width="30%" align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="top"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="top" colspan="2"><b>TANDA TANGAN : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TANGGAL</b></td>
    </tr>
    <tr>
        <td height="18" align="left" colspan="2" valign="top">1.Ketua &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: dr.MARDIANSYAH KUSUMA Sp.Ok</td>
        <td colspan="5" align="left" valign="bottom">.....................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=LaporanBengkalisController::tglIndo( date('d-m-Y', strtotime($modelDataLayanan->tanggal_pemeriksaan) ))?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br></td>
    </tr>
	<?php
	$no=2;
	foreach ($dataDokters as $key=>$dd){?>
    <tr>
        <td height="18" align="left" colspan="2" valign="top"><?=$no++?>.Anggota &nbsp;&nbsp;&nbsp;&nbsp; : <?=$dd['nama_full']?></td>
        <td colspan="5" align="left" valign="bottom">.....................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=LaporanBengkalisController::tglIndo( date('d-m-Y', strtotime($modelDataLayanan->tanggal_pemeriksaan) ))?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br></td>
    </tr>
	<?php }?>
    <tr>
        <td style="border-bottom: 1px solid #000000" height="18" align="left" valign="top"><br></td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"><br></td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"><br></td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"><br></td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"><br></td>
        <td style="border-bottom: 1px solid #000000" align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="top"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="top"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td style="padding-right:-100px" colspan="2" rowspan="2" align="center" valign="middle">Hasil pemeriksaan asli dikirimkan kepada : <br> &nbsp;&nbsp; Menteri Kesehatan, Untuk perhatiannya : <br> Kepala Biro Kepegawaian</td>
	</tr>
    <tr>
        <td height="18" align="left" valign="top"><br></td>
        <td align="left" valign="bottom"><br></td>
        </tr>
    <tr>
        <td height="18" align="left" valign="top"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="center" valign="middle"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td colspan="2" rowspan="2" height="37" align="left" valign="middle">Salinan laporan pengujian dikirim kepada :</td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <!-- <td align="left" valign="bottom"><br></td> -->
        <td style="padding-right:-110px" colspan="2" align="center" valign="top" >Pada tanggal <?=LaporanBengkalisController::tglIndo( date('d-m-Y') )?>  </td>
    </tr>
    <tr>
        <td colspan="2" rowspan="2" height="37" align="left" valign="middle">1.Direktorat Jenderal Pelayanan Kesehatan/ <br> &nbsp;&nbsp; Direktur Rumah Sakit</td>
        <!-- <td align="left" valign="bottom"><br></td> -->
        <td style="padding-right:-110px" align="center" colspan="2" valign="top">tanda tangan</td>
    </tr>
    <tr>
        <!-- <td align="left" valign="bottom"><br></td> -->
        <td style="padding-right:-110px" align="center" colspan="2"  valign="top">Ketua Majelis Penguji Kesehatan,</td>
    </tr>
    <tr>
        <td height="18" align="left" colspan="2" valign="top">2.Kantor Wilayah Dep. Kes. Provinsi</td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="top">3. </td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="top">4.</td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
    </tr>
    <tr>
        <td height="18" align="left" valign="top">5.Arsip</td>
        <td align="left" valign="bottom"><br><br><br></td>
        <!-- <td align="left" valign="bottom"><br></td> -->
        <td style="padding-right:-110px" align="left" colspan="2" align="center" valign="bottom">dr.MARDIANSYAH KUSUMA.Sp.Ok</td>
    </tr>
    <tr>
        <td height="18" align="left" valign="bottom"><br></td>
        <td align="left" valign="bottom"><br></td>
        <!-- <td align="left" valign="bottom"><br></td> -->
        <td style="padding-right:-110px" align="left" colspan="2" align="center" valign="bottom">NIP. 197503092006041008&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
</tbody></table>
<!-- *********


</body></html>