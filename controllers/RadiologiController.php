<?php

namespace app\controllers;

use app\models\DataLayanan;
use app\models\PenunjangRadiologi;
use Yii;

class RadiologiController extends \yii\web\Controller
{
    public function actionIndex($NoPasien = Null)
    {
        $dataRad = Null;
        if (Yii::$app->request->isPost) {
            $p = Yii::$app->request->post();

            $no_rekam_medik = $p['DataLayanan']['nama'];
            $dataLayanan = DataLayanan::findOne(['no_rekam_medik' => $no_rekam_medik]);
            
            if($dataLayanan != Null) {
                $NoPasien = $dataLayanan['no_rekam_medik'];
                $NoRegistrasi = $dataLayanan['no_registrasi'];
                $dataRad = PenunjangRadiologi::findOne(['No_Pasien'=>$NoPasien, 'No_Daftar'=> $NoRegistrasi, 'Kd_InstTuju'=>'3101', 'Kd_SubInstTuju' =>'3101']);
            }

            return $this->render('index', [
                'dataLayanan' => $dataLayanan,
                'dataRad' => $dataRad
            ]);
        }

        $dataLayanan = new DataLayanan();
        return $this->render('index', [
            'dataLayanan' => $dataLayanan,
            'dataRad' => $dataRad
        ]);
    }

    public function actionGetDataPelayanan($q = null, $id =  null)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];

        if (!is_null($q)) {
            $dataPelayanan = DataLayanan::find()->select(["no_rekam_medik as id", "concat(nama,' ',no_rekam_medik) as text"])
                // ->where(['ilike', 'no_rekam_medik', $q . '%', false])
                ->Where(['ilike', 'nama', '%' .$q . '%', false])
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
