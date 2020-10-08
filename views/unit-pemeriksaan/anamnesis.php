<?php

use app\components\Helper;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Anamnesis */
/* @var $form yii\bootstrap4\ActiveForm */

$this->title = "MCU RSAA"
?>
<?php $identitas_dokter = Helper::getRumpun()  ?>
<?php \yii\widgets\Pjax::begin(['id' => 'id-' . $model->formName()]); ?>

<div class="anamnesis-form">
    <h3 class="text-center">Anamnesis</h3>

    <?php $form = ActiveForm::begin(['id' => $model->formName(), 'action' => 'save-anamnesis']); ?>
    <?= $form->field($model, 'nomor_rekam_medik')->hiddenInput(['maxlength' => true, 'value' => $dataLayanan->no_rekam_medik, 'readonly' => true])->label(false) ?>

    <div class="form-group">
        <p>Dilakukan Secara Allananmnesi / Autoananmnesis Dengan</p>
        <?= $form->field($model, 'jawaban1')->textarea(['rows' => 6]) ?>
    </div>
    <div class="form-group">
        <p><b>A. Alasan Kedatangan / Keluhan Utama</b> (Termasuk keluhan yang masih dirasakan pada kunjungan ulangan, harapan kekhawatiran,presepsi pasien mengenai keluhan /Penyakit)</p>
        <?= $form->field($model, 'jawaban2')->textarea(['rows' => 6]) ?>
    </div>
    <div class="form-group">
        <p><b>B. Keluhan Lain / tambahan</b> </p>
        <?= $form->field($model, 'jawaban4')->textarea(['rows' => 6]) ?>
    </div>
    <div class="form-group">
        <p> <b>C. Riwayat Perjalanan Penyakit Sekarang </b>: harus ditulis secara kronologis!!! (uraikan sejak timbul hingga berkembangnya penyakit, obatan-obatan yang telah diminum, pelayanan kesahatan yang telah diperolah termasuk sikap dan perilaku pasien, keluarga, lingkungan terhadap masalah yang ada)
        </p>
        <?= $form->field($model, 'jawaban5')->textarea(['rows' => 6]) ?>

    </div>
    <div class="form-group">
        <p> <b>D. Riwayat Penyakit Keluarga</b> : (uraian penyakit yang ada pada keluarga baik yang sama, berbeda, maupun yang tidak berhubungan dengan masalahn yang ada saat ini, termasuk bagaiman cara anggota keluarga tersebut menghadapinya) </p>
        <?= $form->field($model, 'jawaban6')->textarea(['rows' => 6]) ?>

    </div>
    <div class="form-group">
        <p> <b>E. Riwayat penyakit dahulu:</b> (baik yang sama maupun yang berbeda dengan penyakit sekarang, riwayat pengobatan dan pelayanan kesehatan yang pernah diperoleh termasuk pencegahan spesifik yang pernah diterima)
        </p>
        <?= $form->field($model, 'jawaban3')->textarea(['rows' => 6]) ?>
    </div>

    <?php if ($dataLayanan->jenis_kelamin  == 'P') : ?>
        <div class="form-group">
            <div class="row">
                <div class="col-lg-3">
                    <?= $form->field($model, 'g')->textInput() ?>
                </div>
                <div class="col-lg-3">
                    <?= $form->field($model, 'p')->textInput() ?>
                </div>
                <div class="col-lg-3">
                    <?= $form->field($model, 'a')->textInput() ?>
                </div>
                <div class="col-lg-3">
                    <?= $form->field($model, 'h')->textInput() ?>

                </div>
            </div>
        </div>
    <?php endif ?>
    <?php if ($identitas_dokter['kodejenis'] == 20 ||$identitas_dokter['kodejenis'] == 1 || $identitas_dokter['kodejenis'] == 36 || $identitas_dokter['kodejenis'] == 37) { ?>

        <div class="form-group">
            <?= Html::submitButton('Save Anamnesis', ['class' => 'btn btn-success btn-block']) ?>
        </div>
    <?php } ?>
    <?php ActiveForm::end(); ?>
    <hr>
</div>
<?php Pjax::end(); ?>