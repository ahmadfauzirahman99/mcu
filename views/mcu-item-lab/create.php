<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\McuItemLab */

$this->title = 'Input Item Laboratorium';
$this->params['breadcrumbs'][] = ['label' => 'Mcu Item Labs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mcu-item-lab-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
