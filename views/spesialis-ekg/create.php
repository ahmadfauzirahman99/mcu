<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisEkg */

$this->title = 'Create Mcu Spesialis Ekg';
$this->params['breadcrumbs'][] = ['label' => 'Mcu Spesialis Ekgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mcu-spesialis-ekg-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
