<?php

use yii\helpers\Url;

?>
<li>
    <a href="<?= Url::to(['/spesialis-treadmill/periksa']) ?>" class="waves-effect"><i class="fas fa-running"></i> <span> Pemeriksaan Treadmill </span> </a>
</li>
<li>
    <a href="<?= Url::to(['/spesialis-ekg/periksa']) ?>" class="waves-effect"><i class="fas fa-heartbeat"></i> <span> Pemeriksaan EKG </span> </a>
</li>