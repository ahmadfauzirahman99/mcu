<?php

namespace app\controllers;

use app\models\Anamnesis;
use app\models\BodyDiscomfort;
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
    public function actionUnitPemeriksaan($id = null)
    {


        if ($id != null) {
            $modelDataLayanan = DataLayanan::findOne(['id_data_pelayanan' => $id]);
            if (!$modelDataLayanan) {
                return $this->redirect(['/site/ngga-nemu', 'id' => $id]);
            }
            // $anamnesis = Anamnesis::findOne(['']);
            $anamnesis = new Anamnesis();
            $jenis_pekerjaan = new JenisPekerjaan();
            $master_pemeriksaan_fisik = new MasterPemeriksaanFisik();
        } else {
            $anamnesis = new Anamnesis();
            $modelDataLayanan = new DataLayanan();
            $jenis_pekerjaan = new JenisPekerjaan();
            $master_pemeriksaan_fisik = new MasterPemeriksaanFisik();
        }

        return $this->render('unit-pemeriksaan', [
            'dataLayanan' => $modelDataLayanan,
            'anamnesis' => $anamnesis,
            'jenis_pekerjaan' => $jenis_pekerjaan,
            'master_pemeriksaan_fisik' => $master_pemeriksaan_fisik
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
