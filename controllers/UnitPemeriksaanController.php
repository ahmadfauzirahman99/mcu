<?php

namespace app\controllers;

use app\models\Anamnesis;
use app\models\DataLayanan;
use app\models\JenisPekerjaan;
use app\models\MasterPemeriksaanFisik;
use app\models\UserKusionerBiodata;
use app\models\UserRegister;
use Yii;

class UnitPemeriksaanController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }


    // pemeriksaan
    public function actionPemeriksaanFisik($nomor_rekem_medik = null)
    {

        if (Yii::$app->request->isPost) {
            $p = Yii::$app->request->post();
            $no_rekam_medik = $p['DataLayanan']['nama'];
            $dataLayanan = DataLayanan::findOne(['no_rekam_medik' => $no_rekam_medik]);
            $anamnesis = Anamnesis::findOne(['nomor_rekam_medik' => $no_rekam_medik]);
            $jenis_pekerjaann = JenisPekerjaan::findOne(['no_rekam_medik' => $no_rekam_medik]);
            $master_pemeriksaan_fisik = MasterPemeriksaanFisik::findOne(['no_rekam_medik' => $no_rekam_medik]);

            // ambil data biodata dari register mcu
            $dataUser = Yii::$app->dbRegisterMcu->createCommand(
                "SELECT u.u_id,u.u_jabatan , ukb.* FROM `user` u 
                LEFT JOIN user_kusioner_biodata ukb  on u.u_id  = ukb.ukb_user_id 
                WHERE u.u_rm = '$no_rekam_medik'"
            )->queryAll();

            return $this->render('pemeriksaan-fisik', [
                'dataLayanan' => $dataLayanan,
                'anamnesis' =>  $anamnesis,
                'jenis_pekerjaan' => $jenis_pekerjaann,
                'dataBiodataUser' => $dataUser,
                'master_pemeriksaan_fisik' => $master_pemeriksaan_fisik
            ]);
        }

        $dataLayanan = new DataLayanan();
        $anamnesis = new Anamnesis();
        $jenis_pekerjaann = new JenisPekerjaan();
        $master_pemeriksaan_fisik = new MasterPemeriksaanFisik();
        $dataUser = new  UserKusionerBiodata();
        return $this->render('pemeriksaan-fisik', [
            'dataLayanan' => $dataLayanan,
            'anamnesis' => $anamnesis,
            'jenis_pekerjaan' => $jenis_pekerjaann,
            'master_pemeriksaan_fisik' => $master_pemeriksaan_fisik,
            'dataBiodataUser' => $dataUser,


        ]);
    }

    public function actionGetDataPelayanan($q = null, $id =  null)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];

        if (!is_null($q)) {
            $dataPelayanan = DataLayanan::find()->select(["no_rekam_medik as id", "concat(nama,' ',no_rekam_medik) as text"])
                // ->where(['ilike', 'no_rekam_medik', $q . '%', false])
                ->Where(['ilike', 'nama', $q . '%', false])
                ->orderBy('nama ASC')
                ->asArray()
                ->all();
            $out['results'] = array_values($dataPelayanan);
        } else if ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => DataLayanan::find($id)->no_rekam_medik];
        }
        return $out;
    }
}
