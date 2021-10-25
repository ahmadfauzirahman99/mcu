<?php

use yii\helpers\Url;

?>

<li>
    <a href="<?= Url::to(['/unit-lab-pk/index']) ?>" class="waves-effect"><i class=" mdi mdi-microscope"></i> <span> Unit Lab. Patologi Klinik </span> </a>
</li>

<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-folder-search"></i> <span> Setting Labs. </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li><a href="<?= Url::to(['/mcu-item-lab/index']) ?>"">Item Pemeriksaan</a></li>
                                <li><a href=" #">Setting Global</a></li>
    </ul>
</li>

<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-folder-search"></i> <span> Setting </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li><a href="<?= Url::to(['/kategori-setting/index']) ?>"">Kategori Setting</a></li>
                                <li><a href=" <?= Url::to(['/item-setting/index']) ?>"">Item Setting</a></li>
        <li><a href="<?= Url::to(['/setting-manual/index']) ?>"">Setting Manual</a></li>
                                <li><a href=" <?= Url::to(['/setting-global/index']) ?>"">Setting Global</a></li>
    </ul>
</li>


<li class="text-muted menu-title">Pemeriksaan Spesialis</li>
<li>
    <a href="<?= Url::to(['/spesialis-gigi/periksa']) ?>" class="waves-effect"><i class="fas fa-tooth"></i> <span> Gigi </span> </a>
</li>
<li>
    <a href="<?= Url::to(['/spesialis-mata/periksa']) ?>" class="waves-effect"><i class="fas fa-eye"></i> <span> Mata </span> </a>
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
<li><a href=" <?= Url::to(['/spesialis-kejiwaan/create']) ?>" class="waves-effect"><i class="fas fa-heartbeat"></i> <span> Kejiwaan </span> </a></li>
        <li>
            <a href="<?= Url::to(['/spesialis-narkoba/create']) ?>" class="waves-effect"><i class="fas fa-eyedropper"></i> <span> Narkoba </span> </a>
        </li>

        <li class="text-muted menu-title">Data User</li>

        <li>
            <a href="<?= Url::to(['/data-layanan/index']) ?>" class="waves-effect"><i class="mdi mdi-account-heart"></i> <span> Data Pelayanan </span> </a>
        </li>
        <li>
            <a href="<?= Url::to(['/site/dokter']) ?>" class="waves-effect"><i class="mdi mdi-account-heart"></i> <span> Data Dokter </span> </a>
        </li>
        <li>
            <!-- <a href="<?php Url::to(['/spesialis-gigi-kondisi/index']) ?>" class="waves-effect"><i class="mdi mdi-account-heart"></i> <span> Data Kondisi Gigi </span> </a> -->
        </li>

        <li class="text-muted menu-title">Laporan</li>

        <li>
            <a href="<?= Url::to(['/laporan/index']) ?>" class="waves-effect"><i class="fas fa-file"></i> <span> Laporan </span> </a>
        </li>
        <div class="clearfix"></div>