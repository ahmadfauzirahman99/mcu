<?php

namespace app\controllers;

use app\models\Anamnesis;
use app\models\DataLayanan;
use app\models\DataLayananSearch;
use app\models\UserRegister;
use Yii;

class PeriksaController extends \yii\web\Controller
{
    public function actionIndex($no_rm = null, $id_pelayanan = null, $no_daftar = null)
    {
        //Data Pelayanan
        $modelDataLayanan = DataLayanan::findOne(['id_data_pelayanan' => $id_pelayanan]);
        if (!$modelDataLayanan) {
            return $this->redirect(['/site/ngga-nemu', 'id' => $id_pelayanan]);
        }

        // All Data Pelayanan Untuk Riwayat
        $AllDataPelayanan = DataLayanan::find()
            ->where(['no_rekam_medik' => $no_rm])
            ->andWhere(['<>', 'no_registrasi', null])
            ->all();

        //Pertanyaan Anamnesi dan Allow
        $anamnesis = Anamnesis::find()
            ->where(['nomor_rekam_medik' => $modelDataLayanan->no_rekam_medik])
            ->andWhere(['no_daftar' => $no_daftar])->one();

        // user register
        $userRegister = UserRegister::findOne(['u_rm' => $no_rm]);
        // echo '<pre>';
        // print_r($userRegister);
        // exit;
        return $this->render('index', [
            'modelDataLayanan' => $modelDataLayanan,
            'model' => $userRegister,
            'no_rm' => $no_rm,
            'id_pelayanan' => $id_pelayanan,
            'no_daftar' => $no_daftar
        ]);
    }

    public function actionListPendaftaran($no_rm = null, $id_pelayanan = null, $no_daftar = null)
    {

        $searchModel = new DataLayananSearch();
        $dataProvider = $searchModel->searchPasien(Yii::$app->request->queryParams, $no_rm);

        return $this->render('list-pendaftaran', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'no_rm' => $no_rm,
            'id_pelayanan' => $id_pelayanan,
            'no_daftar' => $no_daftar
        ]);
    }

    public function actionResume($no_rm = null, $id_pelayanan = null, $no_daftar = null)
    {

        $modelDataLayanan = DataLayanan::findOne(['id_data_pelayanan' => $id_pelayanan]);
        if (!$modelDataLayanan) {
            return $this->redirect(['/site/ngga-nemu', 'id' => $id_pelayanan]);
        }
        return $this->render('resume', [

            'no_rm' => $no_rm,
            'id_pelayanan' => $id_pelayanan,
            'no_daftar' => $no_daftar,
            'modelDataLayanan' => $modelDataLayanan,

        ]);
    }
}
