<?php

use yii\helpers\Url;

?>
<li>
    <a href="<?= Url::to(['/site/dokter']) ?>" class="waves-effect"><i class="mdi mdi-account-heart"></i> <span> Data Dokter </span> </a>
</li>
<li>
    <a href="<?= Url::to(['/data-layanan/index']) ?>" class="waves-effect"><i class="mdi mdi-account-heart"></i> <span> Data Pelayanan </span> </a>
</li>

<li class=" text-muted menu-title">Darurat</li>
<li>
    <a href="<?= Url::to(['/site/item-mcu']) ?>" class="waves-effect"><i class="mdi mdi-account-heart"></i> <span> Item MCU </span> </a>
</li>