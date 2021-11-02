<?php
$hasil  = 'Belum Ada Data Hasil';
$tanggal = 'Belum Ada Tanggal Pemeriksaan';
if($dataRad != Null) {
    $hasil = $dataRad['HasilPemeriksaan'];
	$tanggal = $dataRad['TanggalPem'];

}
?>
<div class="col-12">
<div class='form-group'>
		<div>
			Tanggal Pemeriksaan
		</div>
		<input type='text' class='form-control' value='<?=  date('d/m/y H:i:s',strtotime($tanggal))?>' readonly>
	</div>
    <div style="height: 500px; overflow-y: scroll;">
        <pre>
        <?= $hasil ?> 
        </pre>
    </div>
	
</div>
