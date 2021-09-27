<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DataLayanan */

$this->title = 'Update Data Layanan: ' . $model->no_rekam_medik;
$this->params['breadcrumbs'][] = ['label' => 'Data Pelayanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->no_rekam_medik, 'url' => ['view', 'id' => $model->id_data_pelayanan]];
$this->params['breadcrumbs'][] = 'Periksa - ' . $model->nama;
?>

<style>
    #form-isian .col-form-label {
        font-size: smaller;
    }

    #form-isian .form-group {
        margin-bottom: 0.1rem;
    }


    .float {
        position: fixed;
        bottom: 100px;
        right: 90px;
        background-color: #25d366;
        color: #FFF;
        text-align: center;
        box-shadow: 5px 6px 12px 2px #d26b14;
        z-index: 100;
    }

    .float span:hover {
        font-weight: bold;
    }
</style>
<?php $form = ActiveForm::begin(['layout' => 'horizontal', 'id' => 'form-isian']); ?>
<div class="row">

    <div class="col-lg-6">
        <div class="data-layanan-update">

            <div class="data-layanan-update">
                <div class="card border border-primary">
                    <div class="card-body">
                        <?= $this->render('_form', [
                            'model' => $model,
                            'form' => $form
                        ]) ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-lg-6">
        <div class="card border border-primary">
            <div class="card-body">
                <?= $this->render('aksi', [
                    'model' => $model,

                ]) ?>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="data-layanan-update">
            <br>
            <div class="card border border-primary">
                <div class="card-body">
                    <?= $this->render('_biodata-kuisioner', [
                        'model' => $model_biodata_tmp,
                        'form' => $form
                    ]) ?>
                </div>
            </div>

        </div>
    </div>
    <div class="col-lg-12">
        <div class="data-layanan-update">
            <br>
            <div class="card border border-primary">
                <div class="card-body">
                    <?= $this->render('_kuisioner-penyakit', [
                        'userRegister' => $userRegister,
                        'kategori_kuisioner' => $kuisionePenyakit,
                        'form' => $form
                    ]) ?>
                </div>
            </div>

        </div>
    </div>
    <div class="col-lg-12">
        <div class="data-layanan-update">
            <br>
            <div class="card border border-primary">
                <div class="card-body">
                    <?= $this->render('kategori_kuisioner_cpns', [
                        'userRegister' => $userRegister,
                        'kategori_kuisioner_cpns' => $kategori_kuisioner_cpns,
                        'form' => $form
                    ]) ?>
                </div>
            </div>

        </div>
    </div>

</div>
<br>
<div class="form-group">
    <?= Html::submitButton('Simpan Data Pasien', ['class' => 'btn btn-success  btn-rounded float']) ?>
</div>
<?php ActiveForm::end(); ?>