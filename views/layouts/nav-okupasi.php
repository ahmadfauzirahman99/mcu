<?php

use yii\helpers\Url;

?>
<li>
    <a href="<?= Url::to(['/site/dokter']) ?>" class="waves-effect"><i class="mdi mdi-account-heart"></i> <span> Data Dokter </span> </a>
</li>
<li>
    <a href="<?= Url::to(['/user-register/index']) ?>" class="waves-effect"><i class="mdi mdi-account-heart"></i> <span> Revisi Pasien </span> </a>
</li>
<li>
    <a href="<?= Url::to(['/site/perawat']) ?>" class="waves-effect"><i class="mdi mdi-account-heart"></i> <span> Data Perawat </span> </a>
</li>
<li>
    <a href="<?= Url::to(['/data-layanan/index']) ?>" class="waves-effect"><i class="mdi mdi-account-heart"></i> <span> Data Pelayanan </span> </a>
</li>
<li class="text-muted menu-title">Pemeriksaan Khusus</li>
<li>
    <a href="<?= Url::to(['/spesialis-tht/periksa']) ?>" class="waves-effect"><i class="fas fa-assistive-listening-systems"></i> <span> Spesialis THT </span> </a>
</li>
<li>
    <a href="<?= Url::to(['/spesialis-gigi/periksa']) ?>" class="waves-effect"><i class="fas fa-tooth"></i> <span> Gigi </span> </a>
</li>
<li>
    <a href="<?= Url::to(['/spesialis-mata/periksa']) ?>" class="waves-effect"><i class="fas fa-eye"></i> <span> Mata </span> </a>
</li>

<li>
    <a href="<?= Url::to(['/spesialis-treadmill/periksa']) ?>" class="waves-effect"><i class="fas fa-running"></i> <span> Pemeriksaan Treadmill </span> </a>
</li>
<li>
    <a href="<?= Url::to(['/spesialis-ekg/periksa']) ?>" class="waves-effect"><i class="fas fa-heartbeat"></i> <span> Pemeriksaan EKG </span> </a>
</li>

<li>
    <a href="<?= Url::to(['/spesialis-psikologi-rsud/periksa']) ?>" class="waves-effect"><i class="fas fa-sun"></i> <span> Psikologi </span> </a>
</li>


<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-folder-search"></i> <span> THT </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li>
            <a href="<?= Url::to(['/spesialis-audiometri/periksa']) ?>">Audiometri</a>
        </li>
        <li>
            <a href=" <?= Url::to(['/spesialis-tht/periksa-berbisik']) ?>">Tes Berbisik</a>
        </li>
        <li>
            <a href="<?= Url::to(['/spesialis-tht/periksa-garpu-tala']) ?>">Tes Garpu Tala</a>
        </li>
    </ul>
</li>

<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-folder-search"></i> <span> Kejiwaan </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li><a href="<?= Url::to(['/spesialis-kejiwaan/periksa']) ?>">Psikiatri</a></li>
        <li><a href="<?= Url::to(['/spesialis-psikologi/periksa']) ?>">Psikologi</a></li>
    </ul>
</li>
<li>
    <a href="<?= Url::to(['/spesialis-narkoba/periksa']) ?>" class="waves-effect"><i class="fas fa-eyedropper"></i> <span> Narkoba </span> </a>
</li>

<li class="text-muted menu-title">Hasil Lab & Radiologi</li>

<li>
    <a href="<?= Url::to(['/unit-lab-pk/index']) ?>" class="waves-effect"><i class="fa fa-list"></i> <span> Hasil Lab </span> </a>
</li>
<li>
    <a href="<?= Url::to(['/radiologi/index']) ?>" class="waves-effect"><i class="fa fa-list"></i> <span> Hasil Radiologi </span> </a>
</li>
<li>
    <a href="<?= Url::to(['/gradding-mcu/index']) ?>" class="waves-effect"><i class="fa fa-list"></i> <span>Hasil Gradding Mcu </span> </a>
</li>
<li>
    <a href="<?= Url::to(['/setting-global/index']) ?>" class="waves-effect"><i class="mdi mdi-texture"></i> <span> Setting Global </span> </a>
</li>
<li class="text-muted menu-title">Form Majelis</li>
<li>
    <a href="<?= Url::to(['/pembedaan-cpns/index']) ?>" class="waves-effect"><i class="fa fa-list"></i> <span> Form Mejelis </span> </a>
</li>
<li class=" text-muted menu-title">Darurat</li>
<li>
    <a href="<?= Url::to(['/site/item-mcu']) ?>" class="waves-effect"><i class="mdi mdi-account-heart"></i> <span> Item MCU </span> </a>
</li>
<div class="clearfix"></div>