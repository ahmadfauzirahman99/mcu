<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MasterPemeriksaanFisik */

$this->title = 'Create Master Pemeriksaan Fisik';
$this->params['breadcrumbs'][] = ['label' => 'Master Pemeriksaan Fisiks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-pemeriksaan-fisik-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
