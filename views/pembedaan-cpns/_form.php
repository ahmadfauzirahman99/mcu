<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\spesialis\BaseModel;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\PembedaanCpns */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembedaan-cpns-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if ($model->isNewRecord) { ?>
        <label for="">Nama Pasien</label>
        <?php
        echo $form->field($model, 'no_rekam_medik')->widget(Select2::classname(), [
            'data' => BaseModel::getListPasien(),
            'theme' => 'bootstrap',
            'options' => ['placeholder' => 'Cari Pasien ...'],
            'pluginOptions' => [
                'allowClear' => false
            ],
            // 'pluginEvents' => [
            //     "select2:select" => "function(e) { 
            //     window.location = baseUrl + 'unit-pemeriksaan/unit-pemeriksaan?id=' + e.params.data.id
            // }",
            // ],
        ])->label(false);
        ?>
    <?php } else { ?>
        <?= $form->field($model, 'no_rekam_medik')->textInput(['readonly' => true]) ?>
    <?php } ?>
    <?= $form->field($model, 'pilhan_terima_jabatan')->dropDownList([
        'A' => 'Baik untuk semua jabatan',
        'B' => 'Hanya baik untuk jabatantata usaha',
        'C' => 'Hanya baik untuk jabatan tertentu',
        'D' => 'Tidak baik untuk semua jabatan'
    ],['prompt'=>'Pilih Terima Jabatan']) ?>

    <div id="status">

        <?= $form->field($model, 'status')->dropDownList([
            'tidak dengan kelonggaran' => 'tidak dengan kelonggaran',
            'dengan kelonggaran' => 'dengan kelonggaran',
            // 'tidak dengan kelonggaran' => 'tidak dengan kelonggaran'
        ]) ?>
        </div>
    <?= $form->field($model, 'noted_sp')->textarea(['maxlength' => true, 'rows' => '6']) ?>

    <?= $form->field($model, 'noted')->textarea(['maxlength' => true, 'rows' => '6']) ?>




    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php $this->registerJs($this->render('_form.js')) ?>