<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PemeriksaanEkg */

$this->title = 'Create Pemeriksaan Ekg';
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan Ekgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemeriksaan-ekg-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
