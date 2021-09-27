<?php

use yii\helpers\Url;
?>
<li class="nav-item">
    <a class="nav-link <?= $this->context->action->id == "index" ? 'active' : null ?>" href="<?= Url::to(['periksa/index', 'no_rm' => $no_rm, 'id_pelayanan' => $id_pelayanan, 'no_daftar' => $no_daftar]) ?>"><i class="fa fa-user mr-2"></i>Biodata Pasien</a>
</li>
<li class="nav-item">
    <a class="nav-link <?= $this->context->action->id == "list-pendaftaran" ? 'active' : null ?>" href="<?= Url::to(['periksa/list-pendaftaran', 'no_rm' => $no_rm, 'id_pelayanan' => $id_pelayanan, 'no_daftar' => $no_daftar]) ?>"><i class="fa fa-plus mr-2"></i>Pendaftaran Pasien</a>
</li>
<li class="nav-item">
    <a class="nav-link " href="/klinik-pertamina/web/pasien/laporan-pasien"><i class="fa fa-file mr-2"></i>Pemeriksaan</a>
</li>
<li class="nav-item">
    <a class="nav-link " href="/klinik-pertamina/web/pasien/laporan-pasien"><i class="fa fa-file mr-2"></i>Laporan</a>
</li>
<li class="nav-item">
    <a class="nav-link " href="/klinik-pertamina/web/pasien/laporan-pasien"><i class="fa fa-file mr-2"></i>Resume</a>
</li>