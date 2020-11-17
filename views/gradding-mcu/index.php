<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\UserRegister;
/* @var $this yii\web\View */
/* @var $searchModel app\models\GraddingMcuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gradding MCU';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gradding-mcu-index">

    <button type="button" class="btn ink-reaction btn-success"
        data-toggle="tooltip" onclick="FormGradding()" data-placement="bottom" data-original-title="Gradding" style="cursor: pointer">
        <i class="fa fa-plus-square"></i> Form Gradding
    </button>

    <?= Html::a('<i class="fa fa-trash"></i> Hapus', ['delete-all', 'id' => '0129'], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah kamu yakin akan menghapus data ini?',
                'method' => 'post',
            ],
        ]) ?>

    <?php Pjax::begin(['enablePushState' => false]); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_gradding',
            // 'id_data_pelayanan',
            'no_rekam_medik',
             [
                'label'=>'Nama',
                'value' => function($model){
                   return $model->data->nama;
                }
            ],
             [
                'label'=>'Pekerjaan',
                'value' => function($model)
                {
                    $user = UserRegister::findOne(['u_rm'=>$model->no_rekam_medik]);
                    return $user->u_jabatan;
                }
            ],
            // 'no_registrasi',
            // 'no_mcu',
            //'kode_debitur',
            //'hasil:ntext',
            // 'status',
            // 'is_reset',
            // 'poin',
            [
                'class' => 'app\components\ActionColumn',
            ],
        ],
        'pager' => [
            'class' => 'app\components\GridPager',
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
<script>
function FormGradding() {
    $.ajax({
            url: '<?= Yii::$app->urlManager->createUrl('gradding-mcu/form-gradding') ?>',
            // data: {NoPasien: NoPasien, NoRegistrasi: NoRegistrasi, NamaPasien: NamaPasien},
            // dataType: 'json',
            type: 'POST',
            success: function (output) {

                $('#mymodal').html(output);
                $('#mymodal').modal({backdrop: 'static', keyboard: false});

            }
        });
}
</script>
<!-- BEGIN MY MODAL -->

<div class="modal fade bs-example-modal-lg" id="mymodal" tabindex="-1" data-keyboard='false' role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;"></div>

<!-- END MY MODAL -->
