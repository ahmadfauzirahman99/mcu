<?php

use app\components\Helper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataLayanan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-layanan-form">
    <h3 class="text-center">Data Pelayanan</h3>
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="bg-picture">
                <div class="profile-info-name">
                    <img src="<?= $model->pas_foto_offline == null ? Yii::$app->request->baseUrl . "/img/user.png" : $model->pas_foto_offline ?>" class="img-thumbnail" alt="profile-image">

                    <div class="profile-info-detail">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 class="m-0"><?= $form->field($model, 'no_rekam_medik')->textInput(['maxlength' => true,'readonly'=>true]) ?></h4>
                            </div>
                            <div class="col-lg-4">
                                <h4 class="m-0"><?= $form->field($model, 'nama')->textInput(['maxlength' => true,'readonly'=>true]) ?></h4>
                            </div>
                            <div class="col-lg-4">
                                <?= $form->field($model, 'tempat')->textInput(['maxlength' => true,'readonly'=>true]) ?>
                            </div>
                            <div class="col-lg-4">
                                <?php $model->tgl_lahir = Helper::tgl_indo(date('Y-m-d', strtotime($model->tgl_lahir))) ?>
                                <?= $form->field($model, 'tgl_lahir')->textInput(['readonly'=>true]) ?>
                            </div>
                            <div class="col-lg-5">
                                <?= $form->field($model, 'agama')->textInput(['maxlength' => true,'readonly'=>true]) ?>
                            </div>
                            <div class="col-lg-7">
                                <?= $form->field($model, 'kedudukan_dalam_keluarga')->textInput(['maxlength' => true,'readonly'=>true]) ?>
                            </div>
                            <div class="col-lg-7">
                                <?= $form->field($model, 'status_perkawinan')->textInput(['maxlength' => true,'readonly'=>true]) ?>
                            </div>
                            <div class="col-lg-5">
                                <?= $form->field($model, 'pendidikan')->textInput(['maxlength' => true,'readonly'=>true]) ?>
                            </div>
                            <div class="col-lg-5">
                                <?= $form->field($model, 'pekerjaan')->textInput(['maxlength' => true,'readonly'=>true]) ?>
                            </div>
                            <div class="col-lg-7">
                                <?= $form->field($model, 'alamat')->textInput(['readonly'=>true]) ?>
                            </div>
                            <div class="col-lg-6">
                                <?= $form->field($model, 'no_mcu')->textInput(['maxlength' => true,'readonly'=>true]) ?>
                            </div>
                            <div class="col-lg-6">
                                <?= $form->field($model, 'wni')->textInput(['maxlength' => true,'readonly'=>true]) ?>
                            </div>
                            <div class="col-lg-6">
                                <?php $model->tanggal_pemeriksaan = Helper::tgl_indo(date('Y-m-d', strtotime($model->tanggal_pemeriksaan))) ?>
                                <?= $form->field($model, 'tanggal_pemeriksaan')->textInput(['readonly'=>true]) ?>
                            </div>
                            <div class="col-lg-6">
                                <?= $form->field($model, 'jenis_kelamin')->textInput(['readonly'=>true  ]) ?>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
            <!--/ meta -->
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<hr>