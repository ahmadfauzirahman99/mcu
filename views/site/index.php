<?php

/* @var $this yii\web\View */

use app\components\Helper;
use \yii\web\User;

$this->title = 'Dashboard';
?>
<div class="site-index placeholder-paragraph">
    <div class="card card-body" style="text-align: center">
        <div class="text-center">
            <img style="position: center" src="<?= \yii\helpers\Url::base() ?>/img/rsud.png" height="100px" alt="">
        </div>
        <h4>Selamat Datang !</h4>
        <p class="lead text-capitalize">MCU <br> RSUD ARIFIN ACHMAD<br></p>
    </div>
    <?php
    // var_dump($identitas_dokter = Helper::getRumpun());
    ?>
</div>