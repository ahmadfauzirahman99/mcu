<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SettingManual */

$this->title = 'Create Setting Manual';
$this->params['breadcrumbs'][] = ['label' => 'Setting Manuals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-manual-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
