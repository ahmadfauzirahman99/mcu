<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\SettingGlobal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setting-global-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_item_setting')->label(false)->widget(\kartik\select2\Select2::classname(), [
                        'options'=>['id'=>'DataItemSetting'],
                        'data' => ArrayHelper::map(\app\models\ItemSetting::getListItem(),'id_item_setting','nama_item_setting'),
                        'pluginOptions'=>[
                            'placeholder'=>'Pilih Item Setting ....',
                            'allowClear' => true
                        ],
                    ]);
                    ?>

    <?= $form->field($model, 'tampil')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
