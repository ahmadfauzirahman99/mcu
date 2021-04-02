<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\resume\McuResume */

$this->title = 'Create Mcu Resume';
$this->params['breadcrumbs'][] = ['label' => 'Mcu Resumes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mcu-resume-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
