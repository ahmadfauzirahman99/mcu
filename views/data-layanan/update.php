<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DataLayanan */

$this->title = 'Update Data Layanan: ' . $model->id_data_pelayanan;
$this->params['breadcrumbs'][] = ['label' => 'Data Layanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_data_pelayanan, 'url' => ['view', 'id' => $model->id_data_pelayanan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="data-layanan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
