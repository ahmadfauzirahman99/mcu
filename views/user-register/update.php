<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserRegister */

$this->title = 'Update User Register: ' . $model->u_id;
$this->params['breadcrumbs'][] = ['label' => 'User Registers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->u_id, 'url' => ['view', 'id' => $model->u_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-register-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
