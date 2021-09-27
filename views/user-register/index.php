<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserRegisterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Registers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-register-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User Register', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'u_id',
            'u_nik',
            'u_rm',
            'u_no_mcu',
            'u_no_peserta',
            //'u_nama_depan',
            //'u_nama_belakang',
            //'u_nama_petugas',
            //'u_email:email',
            //'u_alamat:ntext',
            //'u_kab',
            //'u_provinsi',
            //'u_jkel',
            //'u_tgl_lahir',
            //'u_tmpt_lahir',
            //'u_no_hp',
            //'u_status',
            //'u_level',
            //'u_auth_key',
            //'u_last_login',
            //'u_updated_at',
            //'u_created_at',
            //'u_agama',
            //'u_kedudukan_keluarga',
            //'u_status_nikah',
            //'u_pekerjaan',
            //'u_pekerjaan_nama',
            //'u_jabatan_pekerjaan',
            //'u_pendidikan',
            //'u_nama_ayah',
            //'u_nama_ibu',
            //'u_nama_pasangan',
            //'u_anggota_darurat',
            //'u_anggota_darurat_ket',
            //'u_tgl_terakhir_mcu',
            //'u_dokter',
            //'u_alamat_dokter:ntext',
            //'u_jabatan',
            //'u_formasi',
            //'u_tempat_tugas',
            //'u_jadwal_id',
            //'u_biodata_finish_at',
            //'u_berkas_finish_at',
            //'u_kuisioner1_finish_at',
            //'u_kuisioner2_finish_at',
            //'u_finish_at',
            //'u_jadwal_asli_id',
            //'u_debitur_id',
            //'u_disclaimer_at',
            //'u_read_doc_at',
            //'u_istri_ke',
            //'u_password',
            //'u_upj_id',
            //'u_finish_mcu_at',
            //'u_no_registrasi',
            //'u_data_pelayanan_id',
            //'u_kuisioner3_finish_at',
            //'u_jenis_mcu_id',
            //'u_tgl_periksa',
            //'u_alamat_pekerjaan',
            //'u_instansi_id',
            //'u_paket_id',
            //'u_approve_ket:ntext',
            //'u_approve_by',
            //'u_approve_at',
            //'u_is_pasien_baru',
            //'u_ktp:ntext',
            //'u_approve_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
