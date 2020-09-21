<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KategoriSetting */

$this->title = 'Ubah Kategori Setting: ' . $model->id_kategori_setting;
$this->params['breadcrumbs'][] = ['label' => 'Kategori Setting', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kategori_setting, 'url' => ['view', 'id' => $model->id_kategori_setting]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kategori-setting-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
