<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanEkg */

$this->title = 'Update Pemeriksaan Ekg: ' . $model->id_ekg;
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Ekgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ekg, 'url' => ['view', 'id' => $model->id_ekg]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pemeriksaan-ekg-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
