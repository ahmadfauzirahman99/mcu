<?php

use app\components\Helper;
use app\models\DataLayanan;
use app\models\spesialis\BaseModel;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\web\View;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataLayanan app\models\DataLayanan */
/* @var $model app\models\PemeriksaanEkg */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Pemeriksaan Kesehatan EKG';
$this->params['breadcrumbs'][] = ['label' => 'Unit Medical Check Up', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div>


    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-12">
            <label for="">Nama Pasien / No Daftar / Nomor Rekam Medik</label>
            <?php
            echo $form->field($dataLayanan, 'nama')->widget(Select2::classname(), [
                'data' => BaseModel::getListPasien(),
                'theme' => 'bootstrap',
                'options' => ['placeholder' => 'Cari Pasien ...'],
                'pluginOptions' => [
                    'allowClear' => false
                ],
                'pluginEvents' => [
                    "select2:select" => "function(e) { 
                window.location = baseUrl + 'pemeriksaan-ekg/periksa?id=' + e.params.data.id
            }",
                ],
            ])->label(false);
            ?>'
            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(); ?>


            <div class="row">
                <div class="col-lg-4">
                    <?= $form->field($dataLayanan, 'nama')->textInput(['readonly' => true]) ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($model, 'no_daftar')->textInput(['value' => $dataLayanan->no_registrasi, 'readonly' => true]) ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($model, 'no_rekam_medik')->textInput(['value' => $dataLayanan->no_rekam_medik, 'readonly' => true]) ?>
                </div>
                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <tr>
                            <th style="text-align: center;">Hasil EKG</th>
                            <td width='50%'>
                                <?= $form->field($model, 'hasil_ekg')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'])->label(false) ?>
                            </td>
                        </tr>
                    </table>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th  style="text-align: center;" >Kesan</th>
                            <td width='50%'>
                                <?= $form->field($model, 'kesan')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'])->label(false) ?>
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <?= $form->field($model, 'kesimpulan')->textarea(['maxlength' => true, 'rows' => 2, 'placeholder' => 'Kesimpulan Hasil']) ?>

                </div>
            </div>
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<?php $this->registerJs($this->render('periksa.js'), View::POS_END) ?>