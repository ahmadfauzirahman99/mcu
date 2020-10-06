<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Anamnesis */

$this->title = 'Update Anamnesis: ' . $model->id_anamnesis;
$this->params['breadcrumbs'][] = ['label' => 'Anamneses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_anamnesis, 'url' => ['view', 'id' => $model->id_anamnesis]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="anamnesis-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
