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
/* @var $model app\models\PemeriksaanTreadmill */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Pemeriksaan Kesehatan Treadmill';
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
                window.location = baseUrl + 'pemeriksaan-treadmill/periksa?id=' + e.params.data.id
            }",
                ],
            ])->label(false);
            ?>'
            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(); ?>

            <div class="form-group">
                <label for="">Metode</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Lama Latihan</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Test Dihentikan Karena</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">DJ maksimal (x/Menit)</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">TD maksimal (mmHG))</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">EKG</label>
                <input type="text" class="form-control" placeholder="Istirahat">
                <input type="text" class="form-control" placeholder="Latihan">
                <input type="text" class="form-control" placeholder="Pemulihan">
            </div>
            <div class="form-group">
                <label for="">Tingkat Kesegeran Jasmani</label>
                <select name="" id="" class="form-control">
                    <option value="">Low</option>
                    <option value="">Fair</option>
                    <option value="">Avarage</option>
                    <option value="">Good</option>
                    <option value="">High</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Tingkat Kesegeran Jasmani</label>
                <select name="" id="" class="form-control">
                    <option value="">III</option>
                    <option value="">II-III</option>
                    <option value="">II</option>
                    <option value="">I-II</option>
                    <option value="">NI</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Kapasitas Aerobik</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Respon Hemodinamik</label>
                <select name="" id="" class="form-control">
                    <option value="">Normal</option>
                    <option value="">Hipotensif</option>
                    <option value="">Hipertensif</option>
                 
                </select>
            </div>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<?php $this->registerJs($this->render('periksa.js'), View::POS_END) ?>