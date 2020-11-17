<?php

use yii\helpers\Url;

?>
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