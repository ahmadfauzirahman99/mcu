<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PembedaanCpns */

$this->title = 'Update Pembedaan Cpns: ' . $model->id_pembedaan;
$this->params['breadcrumbs'][] = ['label' => 'Pembedaan Cpns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pembedaan, 'url' => ['view', 'id' => $model->id_pembedaan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pembedaan-cpns-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
