<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JenisPekerjaan */

$this->title = 'Update Jenis Pekerjaan: ' . $model->id_jenis_pekerjaan;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Pekerjaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_jenis_pekerjaan, 'url' => ['view', 'id' => $model->id_jenis_pekerjaan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jenis-pekerjaan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
