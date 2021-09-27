<?php

use yii\helpers\Url;
?>
<div class="card-box">
    <h4 class="header-title mt-0 mb-3">Jenis Pemeriksaan</h4>

    <ul class="list-group mb-0 user-list">
        <li class="list-group-item">
            <a href="<?= Url::to(['pasien/anam', 'no_rm' => $model->no_rekam_medik, 'no_daftar' => $model->no_registrasi]) ?>" target="_blank" class="user-list-item">
                <div class="user avatar-sm float-left mr-2">
                    <span class="fas fa-file fa-2x"></span>
                </div>
                <div class="user-desc">
                    <h5 class="name mt-1 mb-2">Anamnesa & Pemeriksaan Fisik</h5>
                </div>
            </a>
        </li>
        <li class="list-group-item">
            <a href="#" class="user-list-item">
                <div class="user avatar-sm float-left mr-2">
                    <span class="fas fa-tooth fa-2x"></span>
                </div>
                <div class="user-desc">
                    <h5 class="name mt-1 mb-2">Gigi</h5>
                </div>
            </a>
        </li>
        <li class="list-group-item">
            <a href="#" class="user-list-item">
                <div class="user avatar-sm float-left mr-2">
                    <span class="fas fa-eye fa-2x"></span>
                </div>
                <div class="user-desc">
                    <h5 class="name mt-1 mb-2">Mata</h5>
                </div>
            </a>
        </li>
        <li class="list-group-item">
            <a href="#" class="user-list-item">
                <div class="user avatar-sm float-left mr-2">
                    <span class="fas fa-assistive-listening-systems fa-2x"></span>
                </div>
                <div class="user-desc">
                    <h5 class="name mt-1 mb-2">THT</h5>
                </div>
            </a>
        </li>
        <li class="list-group-item">
            <a href="#" class="user-list-item">
                <div class="user avatar-sm float-left mr-2">
                    <span class="fas fas fa-running fa-2x"></span>
                </div>
                <div class="user-desc">
                    <h5 class="name mt-1 mb-2">Treadmill</h5>
                </div>
            </a>
        </li>
        <li class="list-group-item">
            <a href="#" class="user-list-item">
                <div class="user avatar-sm float-left mr-2">
                    <span class="fas fa-heartbeat fa-2x"></span>
                </div>
                <div class="user-desc">
                    <h5 class="name mt-1 mb-2">EKG</h5>
                </div>
            </a>
        </li>
    </ul>
</div>