<?php

namespace app\controllers;

use app\models\DataLayanan;
use Yii;

class UnitPemeriksaanController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }


    // pemeriksaan
    public function actionPemeriksaanFisik()
    {
        $dataLayanan = new DataLayanan();
        return $this->render('pemeriksaan-fisik', [
            'dataLayanan' => $dataLayanan
        ]);
    }

    public function actionGetDataPelayanan($q = null, $id =  null)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];

        if (!is_null($q)) {
            $dataPelayanan = DataLayanan::find()->select(["no_rekam_medik as id", "concat(nama,' ',no_rekam_medik) as text"])
                ->where(['Ilike', 'no_rekam_medik', $q . '%', false])
                ->orWhere(['Ilike', 'nama', $q . '%', false])
                ->orderBy('nama ASC')
                ->all();
            $out['results'] = array_values($dataPelayanan);
        } else if ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => DataLayanan::find($id)->no_rekam_medik];
        }
        return $out;
    }
}
