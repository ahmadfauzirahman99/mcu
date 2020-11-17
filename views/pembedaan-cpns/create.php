<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PembedaanCpns */

$this->title = 'Create Pembedaan Cpns';
$this->params['breadcrumbs'][] = ['label' => 'Pembedaan Cpns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembedaan-cpns-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
