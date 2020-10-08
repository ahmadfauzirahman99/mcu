<?php
$hasil  = 'Belum Ada Data Hasil';
if($dataRad != Null) {
    $hasil = $dataRad['HasilPemeriksaan'];
}
?>
<div class="col-12">
    <div style="height: 500px; overflow-y: scroll;">
        <pre>
        <?= $hasil ?> 
        </pre>
    </div>
</div>
