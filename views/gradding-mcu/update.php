<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GraddingMcu */

$this->title = 'Ubah Gradding MCU: ' . $model->id_gradding;
$this->params['breadcrumbs'][] = ['label' => 'Gradding MCU', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_gradding, 'url' => ['view', 'id' => $model->id_gradding]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gradding-mcu-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
