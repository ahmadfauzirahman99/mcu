<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-13 18:14:13 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2020-10-13 12:52:15
 */

use app\components\Helper;
use app\models\DataLayanan;
use app\models\spesialis\BaseModel;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use app\models\spesialis\McuPenatalaksanaanMcu;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisMata */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Pemeriksaan Kesehatan Mata Tenaga Kerja';
?>


    <?php $form = ActiveForm::begin(['action'=>'save-penata','id'=>$penata->formName()]); ?>
	<div class="row">
		<div class="col-lg-3">
			  <?= $form->field($penata, 'jenis_permasalahan')->textarea(['rows' => 3]) ?>
		</div>
		<div class="col-lg-3">
			   <?= $form->field($penata, 'rencana')->textarea(['rows' => 3]) ?>
		</div>
		<div class="col-lg-3">
			    <?= $form->field($penata, 'target_waktu')->textarea(['rows' => 3]) ?>
		</div>
		<div class="col-lg-3">
			    <?= $form->field($penata, 'hasil_yang_diharapkan')->textarea(['rows' => 3]) ?>
		</div>
		<div class="col-lg-3">
			    <?= $form->field($penata, 'keterangan')->textarea(['rows' => 3]) ?>
		</div>
	</div>





    <?= $form->field($penata, 'no_rekam_medik')->hiddenInput(['rows' => 6,'value'=>$dataLayanan->no_rekam_medik])->label(false) ?>

    <?= $form->field($penata, 'jenis')->hiddenInput(['rows' => 6,'value'=>'Spesialis Okupasi'])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save Penatalaksanaan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <hr>
    <table class="table table-bordered">
    	<thead>
    		<tr>
    			<th>Jenis Permasalahan</th>
    			<th>Rencana</th>
    			<th>Target Waktu</th>
    			<th>Hasil Yang Diharapkan</th>
    			<th>Keterangan</th>
    			<th>Aksi</th>
    		</tr>
    	</thead>
    	<?php 
    		$penatas = McuPenatalaksanaanMcu::find()->where(['no_rekam_medik'=>$dataLayanan->no_rekam_medik])->all();
    	 ?>
    	 <tbody>
    	 	<?php foreach($penatas as $items_penata){ ?>
    	 		<tr>
    	 			<td><?= $items_penata->jenis_permasalahan ?></td>
    	 			<td><?= $items_penata->rencana ?></td>
    	 			<td><?= $items_penata->target_waktu ?></td>
    	 			<td><?= $items_penata->hasil_yang_diharapkan ?></td>
    	 			<td><?= $items_penata->keterangan ?></td>
    	 			<td><a href="#" onclick="hapus(this)" data-value="<?= $items_penata->id_penata ?>">Hapus</a></td>
    	 		</tr>
    	 	<?php } ?>
    	 </tbody>
    </table>