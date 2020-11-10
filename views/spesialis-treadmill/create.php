<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisTreadmill */

$this->title = 'Create Mcu Spesialis Treadmill';
$this->params['breadcrumbs'][] = ['label' => 'Mcu Spesialis Treadmills', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mcu-spesialis-treadmill-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
