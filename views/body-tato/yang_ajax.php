<?php

use app\models\DataPelayanan;
use app\models\McuTAnamnesis;
use app\models\AnamnesisOkupasi;
use app\models\DokterBertugas;
use yii\helpers\Url;

$logo = Url::to('@web/img/logo-rsud-basic.png');
$logo2 = Url::to('@web/img/logo-kars1.png');
$logo3 = Url::to('@web/img/riau.png');
$body = Url::to('@web/img/body.png');
// $mpdf = new \Mpdf\Mpdf();
// tambah lagi
?>
<?php 

$JS =<<< JS
	// $(window).load(function() {
	   // $('.preloader').fadeOut('slow');
	   // $('.content').fadeIn('slow');
	// });
	jQuery(document).ready(function($) {
		$('.preloader').hide();
	});
JS;
$this->registerJS($JS);
?>
<style>
	.preloader {
	   position: absolute;
	   top: 0;
	   left: 0;
	   width: 100%;
	   height: 100%;
	   z-index: 9999;
	   background-image: url('../img/loading.gif');
	   background-repeat: no-repeat;
	   background-color: #FFF;
	   background-position: center;
	}
</style>

<style>
    hr.line1 {
        border: 10px solid black;
        border-radius: 5px;
    }

    #datapribadi {
        border-collapse: collapse;
    }
    #datapribadi tr th {
    border: 1px solid black;	
    }
    #datapribadi tr td {
    border: 1px solid black;	
    }
	
	tr>th{
		text-align:center;
		background-color:#f2f2f2;
	}


	tr:nth-child(even) {
		background-color:#f2f2f2;
	}
</style>

<div class="preloader"></div>

<div class="row" style="height:800px;margin:30px;margin-left:-50px">
    <div class="col-md-12" >
        <br>
        <table width="100%" border="0" style="font-size: 14px">
            <tr>
                <td style="text-align:center;font-weight: bold;"><span>VALIDASI REKAPITULASI HASIL PEMERIKSAAN KESEHATAN CPNS KEJAKSAAN TINGGI RIAU<br>TAHUN 2020</td>
            </tr>
        </table>
        <br>
        <div style="line-height: 1 !important; margin-top: 10px;">


            <table border="1" width="100%" style="border-collapse:collapse;font-size: 11px; text-align: center">
                <thead>
                    <tr> 
                        <th rowspan="3">No</th>
                        <th rowspan="2">Nama</th>
                        <th rowspan="3">Umur</th>
                        <th rowspan="3">Jenis Kelamin</th>
                        <th rowspan="3">Pekerjaan</th>
                        <th rowspan="3">Tensi <br>(Mm/Hg)</th>
                        <th rowspan="2">Tinggi (cm)</th>
                        <th rowspan="3">Mata</th>
                        <!--<th rowspan="3" style="width:80px">Gigi</th> -->
                        <th rowspan="3">THT</th>
                        <th rowspan="3">Kulit</th>
                        <th rowspan="3">Urine Rutin</th>
                        <th rowspan="3">Darah Rutin</th>
                        <th rowspan="3">Kimia Klinik</th>
                        <th rowspan="3">HBsAg</th>
                        <th rowspan="3">Rontgen</th>
                        <th rowspan="3">EKG</th>
                        <th rowspan="3">Wawancara Psikiatri</th>
                        <th rowspan="3">Narkoba</th>
                        <th rowspan="3">Laik Kerja</th>
                        <!--<th rowspan="2">Keterangan</th>-->
                        <th colspan="2">Score Total</th>
                        
                    </tr>
                    <tr>
                        <th rowspan="2">Score Sistim</th>
                        <th>Score Dokter</th>
                    </tr>
                    <tr>
                        <th>No. Test</th>
                        <th>Berat (Kg)</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;foreach($data_peserta as $data):?>
                        <tr>
                            <td><?= $no?></td>
                            <td><?= ($data['nama_peserta']) ? $data['nama_peserta'] : ''?><br><?= ($data['nama_peserta']) ? $data['nama_peserta'] : ''.'<br>'.($data['no_ujian']) ? $data['no_ujian'] : ''?></td>
                            <td><?= ($data['umur']) ? $data['umur'] : ''?></td>
                            <td><?= ($data['jenis_kelamin']) ? $data['jenis_kelamin'] : ''?></td>
                            <td>
								 <?php //pekerjaan yang dituju
								$no_mr = $data['no_rekam_medik'];
								$dataUser = Yii::$app->dbP->createCommand("SELECT
									u.u_id ,
									u.u_jabatan,
									 ukb.*
									FROM
									 `user` u
									 LEFT JOIN user_kusioner_biodata ukb  on u.u_id  = ukb.ukb_user_id 
									WHERE
									 u.u_rm = '$no_mr'")->queryAll();
								?>
								<?= $dataUser[0]['u_jabatan'] == null ? "-" : $dataUser[0]['u_jabatan'] ?>
							</td>
                            <td><?= ($data['tensi']) ? $data['tensi'] : ''?></td>
                            <td><?= ($data['tinggi_badan']) ? $data['tinggi_badan'] : ''?><br><?=($data['berat_badan']) ? $data['berat_badan'] : ''?></td>
                            <td><?= ($data['Datanya']['mata']['text']) ? $data['Datanya']['mata']['text'] : 'Normal'?></td>
                            <!--<td><?= ($data['Datanya']['gigi']['text']) ? $data['Datanya']['gigi']['text'] : 'Dalam Batas Normal'?></td> -->
                            <td><?= ($data['Datanya']['THT']['text']) ? $data['Datanya']['THT']['text'] : 'Normal'?></td>
                            <td><?= ($data['Datanya']['kulit_tato']['text']) ? $data['Datanya']['kulit_tato']['text'] : 'Tidak Ada'?></td>
                            <td><?= ($data['Datanya']['urine_rutin']['text']) ? $data['Datanya']['urine_rutin']['text'] : 'Normal'?></td>
                            <td><?=str_replace("�","µ", ($data['Datanya']['darah']['text']) ? $data['Datanya']['darah']['text'] : 'Normal')?></td>
                            <td><?= ($data['Datanya']['kimia_klinik']['text']) ? $data['Datanya']['kimia_klinik']['text'] : 'Normal'?></td>
                            <td><?= ($data['Datanya']['HBSAGK']['text']) ? $data['Datanya']['HBSAGK']['text'] : 'Normal'?></td>
                            <td><?= ($data['Datanya']['Rontgen']['text']) ? $data['Datanya']['Rontgen']['text'] : 'Dalam Batas Normal.'?></td>
                            <td><?= ($data['Datanya']['EKG']['text']) ? $data['Datanya']['EKG']['text'] : 'Dalam Batas Normal.'?></td>
                            <td><?= ($data['Datanya']['psikiatri']['text']) ? $data['Datanya']['psikiatri']['text'] : 'Tidak Ditemukan Gangguan Jiwa'?></td>
                            <td><?= ($data['Datanya']['hasil_pemeriksaan_fisik']['text']) ? $data['Datanya']['hasil_pemeriksaan_fisik']['text'] : 'Negatif'?></td>
                            <td><i><?= ($data['Datanya']['kategori_kesehatan']) ? $data['Datanya']['kategori_kesehatan'] : '- Kosong -'?></i></td>
                            <!--<td></td> -->
                            <td style="font-size:15px;" bgcolor="#93ff80"><?= ($data['Datanya']['total_semua']) ? $data['Datanya']['total_semua'] : 'Normal'?></td>							
                            <td style="padding:9px;" bgcolor="#93ff80">
								<form method="post" action="#" id="<?= ($data['id_m_pemeriksaan_fisik']) ? $data['id_m_pemeriksaan_fisik'] : ''?>">
									<label >Score Dokter: </label><input style="font-size:18px;width:60px" name="score_dokter[<?= ($data['id_m_pemeriksaan_fisik']) ? $data['id_m_pemeriksaan_fisik'] : ''?>]" type="number" value="<?= ($data['score']) ? $data['score'] : ''?>">   
									<br>   
									<label >Keterangan: </label><textarea name="ket[<?= ($data['id_m_pemeriksaan_fisik']) ? $data['id_m_pemeriksaan_fisik'] : ''?>]" style="width:90px;height:100px;"><?= ($data['ket']) ? $data['ket'] : ''?></textarea>
									<input type="hidden" style="width:60px;height:100px;" name="id_m_pemeriksaan_fisik[<?= ($data['id_m_pemeriksaan_fisik']) ? $data['id_m_pemeriksaan_fisik'] : ''?>]" value="<?= ($data['id_m_pemeriksaan_fisik']) ? $data['id_m_pemeriksaan_fisik'] : ''?>">
									<input type="hidden" style="width:60px;height:100px;" name="no_rekam_medik[<?= ($data['id_m_pemeriksaan_fisik']) ? $data['id_m_pemeriksaan_fisik'] : ''?>]" value="<?= ($data['no_rekam_medik']) ? $data['no_rekam_medik'] : ''?>">
									<button type="submit" class="btn btn-default" style="font-size:1.0em"><i class="fa fa-save"></i> Simpan</button>
								</form>
									<?php
									$score=$ket='';
									// $score='score_dokter['+$data['id_m_pemeriksaan_fisik']+']';
									// $ket='ket['+$data['id_m_pemeriksaan_fisik']+']';
									$id_m_pemeriksaan_fisik__=$data['id_m_pemeriksaan_fisik'];
									$this->registerJs("	
									$('#'+$id_m_pemeriksaan_fisik__).on('submit', function(e){
										e.preventDefault();
										// alert('$id_m_pemeriksaan_fisik__');
										// alert('$score'+'~'+'$ket');
										// var form=$(this);
										var anu= $(this).serializeArray();//.attr('action');
										// console.log(anu);
										score(anu,'$id_m_pemeriksaan_fisik__');
									});
									");
									?>
							</td>
						</tr>
                    <?php $no++;endforeach;?>
                </tbody>
            </table>
			<?php $this->registerJs("						
									function score(anu,nomor){
									// console.log(anu[0].value);return; //score nya
									// console.log(anu[1].value);return; //ket nya
									// console.log(anu[2].value);return; //id_m_pemeriksaan_fisik score nya
									// console.log(anu[3].value);return; //no_rekam_medik nya
									// console.log(anu);return;
										//nomor
										$.ajax(
										{
											type:'post',
											url:'".Url::to(['lampjaksa/simpan-validasi'])."',
											// data:anu,
											data:{
												scorenya:anu[0].value, //scorenya
												ketnya:anu[1].value,//ket nya
												id_m_pemeriksaan_fisik:anu[2].value, //id_m_pemeriksaan_fisik score nya
												no_rekam_medik:anu[3].value, //no_rekam_medik nya
												},
											beforeSend:function(){
												// setLoading(btn);
											},
											complete:function(){
												// resetLoading(btn,'<i class=\"glyphicon glyphicon-floppy-save\"></i> Cari Pasien');
											},
											success:function(result){
												console.log(result);
												if(result.metadata.code=='200'){
													typeSucces(result.metadata.message);
												}else{
													typeWarning(result.metadata.message);
												}
													
											},
											error:function(){
												toastr.error('Gagal Koneksi Server');
											},
										});
										}
										
										function setLoading(btn){
											btn.html('<i class=\"fa fa-spin fa-refresh\"></i> Loading......');
										}
										function resetLoading(btn,textnya){
											btn.html(textnya);
										}
										function typeWarning(textnya){
											toastr.warning(textnya);
										}
										function typeSucces(textnya){
											toastr.success(textnya);
										}
										
				");
			?>
            <br>
        </div>
    </div>
</div>

