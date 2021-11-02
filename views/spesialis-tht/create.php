<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisTht */

$this->title = 'Create Mcu Spesialis Tht';
$this->params['breadcrumbs'][] = ['label' => 'Mcu Spesialis Thts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mcu-spesialis-tht-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
