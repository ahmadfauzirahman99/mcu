<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DataLayanan */

$this->title = 'Create Data Layanan';
$this->params['breadcrumbs'][] = ['label' => 'Data Layanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-layanan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
