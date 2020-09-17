<?php
$pdf  = Null;

if($dataApi != Null) {
    $DataApi = json_decode($dataApi, TRUE);
    $pdf = base64_decode($DataApi['pdf']);
    
// echo '<pre>';
// print_r($DataApi);
// die();

}

?>
<div class="col-12">
    <div style="height: 500px; overflow-y: scroll;">
        <?= $pdf ?> 
    </div>
</div>
