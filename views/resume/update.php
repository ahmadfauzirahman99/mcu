<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\resume\McuResume */

$this->title = 'Update Mcu Resume: ' . $model->id_resume;
$this->params['breadcrumbs'][] = ['label' => 'Mcu Resumes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_resume, 'url' => ['view', 'id' => $model->id_resume]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mcu-resume-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
