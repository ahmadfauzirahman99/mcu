<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisTht */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mcu-spesialis-tht-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_rekam_medik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'tl_daun_telinga_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tl_daun_telinga_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tl_liang_telinga_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tl_liang_telinga_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tl_serumen_telinga_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tl_serumen_telinga_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tl_membrana_timpani_telinga_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tl_membrana_timpani_telinga_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tl_test_berbisik_telinga_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tl_test_berbisik_telinga_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tl_test_garpu_tata_rinne_telinga_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tl_test_garpu_tata_rinne_telinga_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tl_weber_telinga_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tl_weber_telinga_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tl_swabach_telinga_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tl_swabach_telinga_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tl_bing_telinga_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tl_bing_telinga_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tl_lain_lain')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hd_meatus_nasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hd_septum_nasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hd_konka_nasal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hd_nyeri_ketok_sinus_maksilar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hd_penoluman')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hd_lain_lain')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tg_pharynx')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tg_tonsil_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tg_tonsil_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tg_ukuran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tg_palatum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tg_lain_lain')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'audiometri')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kesimpulan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'riwayat')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
