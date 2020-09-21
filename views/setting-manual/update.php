<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SettingManual */

$this->title = 'Update Setting Manual: ' . $model->id_manual;
$this->params['breadcrumbs'][] = ['label' => 'Setting Manuals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_manual, 'url' => ['view', 'id' => $model->id_manual]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="setting-manual-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
