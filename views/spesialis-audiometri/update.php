<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-13 18:14:13 
 * @Last Modified by:   Dicky Ermawan S., S.T., MTA 
 * @Last Modified time: 2020-09-13 18:14:13 
 */


use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisAudiometri */

$this->title = 'Update Mcu Spesialis Audiometri: ' . $model->id_spesialis_audiometri;
$this->params['breadcrumbs'][] = ['label' => 'Mcu Spesialis Audiometris', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_spesialis_audiometri, 'url' => ['view', 'id' => $model->id_spesialis_audiometri]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mcu-spesialis-audiometri-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
