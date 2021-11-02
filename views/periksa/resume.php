<?php
/* @var $this yii\web\View */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\web\View;

$this->title = "Pemeriksaan Pasien - " . $modelDataLayanan->nama;
?>
<div class="card-box">
    <h5 class="header-title m-t-0 m-b-30">Resume Pasien</h5>
    <ul class="nav nav-tabs">
        <?= $this->render('timeline', [
            'id_pelayanan' => $id_pelayanan,
            'no_daftar' => $no_daftar,
            'no_rm' => $no_rm
        ]) ?>
    </ul>
    <div class="tab-content">
        <table class="table table-bordered table-sm">
            <tr>
                <th style="text-align: center;">Kesadaran</th>
                <td style="text-align: center;">Kesadaran Menurun</td>
            </tr>
            <tr>
                <th style="text-align: center;">Mata Kanan</th>
                <td style="text-align: center;">Tidak Normal</td>
            </tr>
            <tr>
                <th style="text-align: center;">Mata Kiri</th>
                <td style="text-align: center;">Tidak Normal</td>
            </tr>
        </table>
    </div>
</div>