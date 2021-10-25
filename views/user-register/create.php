<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserRegister */

$this->title = 'Create User Register';
$this->params['breadcrumbs'][] = ['label' => 'User Registers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-register-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
