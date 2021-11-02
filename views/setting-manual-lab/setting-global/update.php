<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SettingGlobal */

$this->title = 'Ubah Setting Global: ' . $model->id_global;
$this->params['breadcrumbs'][] = ['label' => 'Setting Global', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_global, 'url' => ['view', 'id' => $model->id_global]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="setting-global-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
