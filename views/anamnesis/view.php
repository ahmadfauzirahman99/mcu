<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Anamnesis */

$this->title = $model->id_anamnesis;
$this->params['breadcrumbs'][] = ['label' => 'Anamneses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="anamnesis-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_anamnesis], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_anamnesis], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_anamnesis',
            'jawaban1:ntext',
            'jawaban2:ntext',
            'jawaban3:ntext',
            'jawaban4:ntext',
            'jawaban5:ntext',
            'jawaban6:ntext',
            'jawaban7:ntext',
            'nomor_rekam_medik',
            'g',
            'p',
            'a',
            'h',
            'jawaban8:ntext',
        ],
    ]) ?>

</div>
