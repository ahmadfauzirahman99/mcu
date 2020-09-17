<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\McuItemLab */

$this->title = 'Ubah Item Laboratorium ' . $model->id_item_lab;
$this->params['breadcrumbs'][] = ['label' => 'Mcu Item Labs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_item_lab, 'url' => ['view', 'id' => $model->id_item_lab]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mcu-item-lab-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
