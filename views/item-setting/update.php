<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ItemSetting */

$this->title = 'Ubah Item Setting: ' . $model->nama_item_setting;
$this->params['breadcrumbs'][] = ['label' => 'Item Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_item_setting, 'url' => ['view', 'id' => $model->id_item_setting]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="item-setting-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
