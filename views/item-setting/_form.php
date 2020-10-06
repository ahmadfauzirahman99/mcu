<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\ItemSetting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-setting-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_kategori_setting')->label(false)->widget(\kartik\select2\Select2::classname(), [
                        'options'=>['id'=>'DataKategoriSetting'],
                        'data' => ArrayHelper::map(\app\models\KategoriSetting::getListKategori(),'id_kategori_setting','nama_kategori'),
                        'pluginOptions'=>[
                            'placeholder'=>'Pilih Kategori ....',
                            'allowClear' => true
                        ],
                    ]);
                    ?>

    <?= $form->field($model, 'nama_item_setting')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_tes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nilai_normal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ket')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
