<?php

/* @var $this yii\web\View */

use app\components\Helper;
use \yii\web\User;

$this->title = 'Dashboard';
?>
<div class="site-index placeholder-paragraph">
    <div class="row">
        <?php
        $identitas_dokter = Helper::getRumpun();
        if (!$identitas_dokter) {
        ?>
            <div class="col-md-12">
                <div class="card m-b-20 text-white bg-danger text-xs-center">
                    <div class="card-body">
                        <blockquote class="card-bodyquote">
                            <h1>Penempatan / Unit Kerja Belum Ada Di Data SDM</h1>
                            <footer>Hubungi Admin / Operartor <cite title="Source Title">Terima Kasih! :)</cite>
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="card card-body" style="text-align: center">
        <div class="text-center">
            <img style="position: center" src="<?= \yii\helpers\Url::base() ?>/img/rsud.png" height="100px" alt="">
        </div>
        <h4>Selamat Datang !</h4>
        <p class="lead text-capitalize">MCU <br> RSUD ARIFIN ACHMAD<br></p>
    </div>


</div>