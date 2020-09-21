<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ItemSetting */

$this->title = 'Input Item Setting';
$this->params['breadcrumbs'][] = ['label' => 'Item Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-setting-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
