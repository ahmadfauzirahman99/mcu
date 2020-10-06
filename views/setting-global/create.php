<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SettingGlobal */

$this->title = 'Input Setting Global';
$this->params['breadcrumbs'][] = ['label' => 'Setting Global', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-global-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
