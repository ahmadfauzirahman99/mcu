<?php

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\resume\McuResume */

$this->title = $model->nama_no_rm;
$this->params['breadcrumbs'][] = ['label' => 'Mcu Resumes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mcu-resume-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="float-right">
        <?=
        Html::a('<i class="fas fa-long-arrow-alt-left"></i> Kembali', ['/resume/index'], [
            'class' => 'btn btn-warning btn-sm btn-icon',

        ])
        ?>
    </div>
    <br>
    <hr>

    <table class="table table-sm table-bordered table-hover">
        <thead>
            <tr>
                <th class="text-center bg-info" colspan="3">
                    <?= $model->jenis_pemeriksaan ?>
                </th>
            </tr>
            <tr>
                <th class="bg-info text-center" style="width: 5%;">No.</th>
                <th class="bg-info text-center" style="width: 65%;">Nama Parameter</th>
                <th class="bg-info text-center" style="width: 30%;">Hasil</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $tidakNormal = Json::decode($model->tidak_normal);
            $no = 1;
            foreach ($tidakNormal as $key => $value) {
                echo '
                    <tr>
                        <td class="text-center">' . ($no) . '</td>
                        <td>' . (ucwords(str_replace('_', ' ', $key))) . '</td>
                        <td>' . (preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $value)) . '</td>
                    </tr>
                ';
                $no++;
            }
            if (!$tidakNormal) {
                echo '
                    <tr>
                        <td class="text-center" style="font-style: italic;" colspan="3">
                            Tidak ada Kelainan / Tidak Normal, Semua akan baik-baik saja, Semoga ^^
                        </td>
                    </tr>
                ';
            }
            ?>
        </tbody>
    </table>
</div>