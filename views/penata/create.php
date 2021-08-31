<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuPenatalaksanaanMcu */

$this->title = 'Create Mcu Penatalaksanaan Mcu';
$this->params['breadcrumbs'][] = ['label' => 'Mcu Penatalaksanaan Mcus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mcu-penatalaksanaan-mcu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
