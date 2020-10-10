<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Data Dokter';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nip / Nik</th>
                <th>Nama Lengkap</th>
                <th>Rumpun</th>
                <th>Sub Rumpun</th>
                <th>Kode Jenis</th>
                <th>Jenis</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($data as $item) : ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $item['id_nip_nrp'] ?></td>
                <td><?= $item['nama_lengkap'] ?></td>
                <td><?= $item['rumpun'] ?></td>
                <td><?= $item['subrumpun'] ?></td>
                <td><?= $item['kodejenis'] ?></td>
                <td><?= $item['jenis'] ?></td>
            </tr>
            <?php $no++;
            endforeach ?>
        </tbody>
    </table>
</div>