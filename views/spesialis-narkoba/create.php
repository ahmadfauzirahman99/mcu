<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SpesialisNarkoba */

$this->title = 'Create Spesialis Narkoba';
$this->params['breadcrumbs'][] = ['label' => 'Spesialis Narkobas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spesialis-narkoba-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
