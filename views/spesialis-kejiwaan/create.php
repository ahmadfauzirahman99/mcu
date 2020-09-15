<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SpesialisKejiwaan */

$this->title = 'Create Spesialis Kejiwaan';
$this->params['breadcrumbs'][] = ['label' => 'Spesialis Kejiwaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spesialis-kejiwaan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
