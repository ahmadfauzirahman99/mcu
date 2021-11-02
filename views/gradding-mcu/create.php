<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GraddingMcu */

$this->title = 'Input Gradding MCU';
$this->params['breadcrumbs'][] = ['label' => 'Gradding MCU', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gradding-mcu-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
