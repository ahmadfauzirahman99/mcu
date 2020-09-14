<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Anamnesis */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anamnesis-form">

    <?php $form = ActiveForm::begin(); ?>

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

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <hr>
</div>