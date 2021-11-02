<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanTreadmill */

$this->title = 'Update Pemeriksaan Treadmill: ' . $model->id_tread;
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Treadmills', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tread, 'url' => ['view', 'id' => $model->id_tread]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pemeriksaan-treadmill-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
