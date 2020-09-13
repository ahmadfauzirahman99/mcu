<?php

/* @var $this yii\web\View */

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

/* @var $dataLayanan app\models\MasterPemeriksaanFisik */
/* @var $form ActiveForm */

$this->title = 'Pemeriksaan Fisik';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <hr>
    <?php $form = ActiveForm::begin(); ?>
    <?php
    $url = \yii\helpers\Url::to(['/unit-pemeriksaan/get-data-pelayanan']);
    // $model->icdt10 = "";
    echo $form->field($dataLayanan, 'nama')->widget(Select2::classname(), [
        'options' => ['multiple' => true, 'placeholder' => 'Mencari Diagnosis ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'minimumInputLength' => 3,
            'language' => [
                'errorLoading' => new JsExpression("function () { return 'Menunggu hasil cari bro...'; }"),
            ],
            'ajax' => [
                'url' => $url,
                'dataType' => 'json',
                'data' => new JsExpression('function(params) { return {q:params.term}; }')
            ],
            'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
            'templateResult' => new JsExpression('function(data) { return data.text; }'),
            'templateSelection' => new JsExpression('function (data) { return data.text; }'),
        ],
        // 'pluginEvents' => [
        //     "select2:select" => "function(e) { 
        //         let data = e.params.data
        //         let diagnosis_kerja = $('#masterpemeriksaanfisik-diagnosis_kerja').val()
        //         if(diagnosis_kerja==null || diagnosis_kerja=='')
        //             diagnosis_kerja += data.id
        //         else
        //             diagnosis_kerja += ','+data.id
        //         $('#masterpemeriksaanfisik-diagnosis_kerja').val(diagnosis_kerja)
        //     }",
        // ]
    ]);

    ?>
    <?php ActiveForm::end(); ?>

</div>