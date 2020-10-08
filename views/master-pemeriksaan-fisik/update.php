<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MasterPemeriksaanFisik */

$this->title = 'Update Master Pemeriksaan Fisik: ' . $model->id_m_pemeriksaan_fisik;
$this->params['breadcrumbs'][] = ['label' => 'Master Pemeriksaan Fisiks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_m_pemeriksaan_fisik, 'url' => ['view', 'id' => $model->id_m_pemeriksaan_fisik]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="master-pemeriksaan-fisik-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
