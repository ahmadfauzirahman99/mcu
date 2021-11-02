<?php

use yii\helpers\Url;

?>
<li>
    <a href="<?= Url::to(['/site/dokter']) ?>" class="waves-effect"><i class="mdi mdi-account-heart"></i> <span> Data Dokter </span> </a>
</li>

<li>
    <a href="<?= Url::to(['/site/perawat']) ?>" class="waves-effect"><i class="mdi mdi-account-heart"></i> <span> Data Perawat </span> </a>
</li>
<li class=" text-muted menu-title">Darurat</li>
<li>
    <a href="<?= Url::to(['/site/item-mcu']) ?>" class="waves-effect"><i class="mdi mdi-account-heart"></i> <span> Item MCU </span> </a>
</li>
<?php if(Yii::$app->user->identity->kodeAkun == 196705081988032004) { ?>
	<li style="">
    <a href="<?= Url::to(['/data-layanan/index']) ?>" class="waves-effect"><i class="mdi mdi-account-heart"></i> <span> Data Pelayanan </span> </a>
</li>
<li>
    <a href="<?= Url::to(['/spesialis-tht/periksa']) ?>" class="waves-effect"><i class="fas fa-assistive-listening-systems"></i> <span> Spesialis THT </span> </a>
</li>
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-folder-search"></i> <span> THT </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li>
            <a href="<?= Url::to(['/spesialis-audiometri/periksa']) ?>"">Audiometri</a>
        </li>
        <li>
            <a href=" <?= Url::to(['/spesialis-tht/periksa-berbisik']) ?>"">Tes Berbisik</a></li>
        <li>
            <a href="<?= Url::to(['/spesialis-tht/periksa-garpu-tala']) ?>"">Tes Garpu Tala</a>
        </li>
    </ul>
</li>
<?php } ?>