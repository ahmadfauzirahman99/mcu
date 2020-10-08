<?php

namespace app\controllers;

use app\models\Anamnesis;
use app\models\BahayaPotensial;
use app\models\BodyDiscomfort;
use app\models\DataLayanan;
use app\models\JenisPekerjaan;
use app\models\MasterPemeriksaanFisik;
use app\models\McuBrief;
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
            $anamnesis = Anamnesis::findOne(['nomor_rekam_medik' => $modelDataLayanan->no_rekam_medik]);
            // $anamnesis = new Anamnesis();
            $jenis_pekerjaan = new JenisPekerjaan();
            $master_pemeriksaan_fisik = MasterPemeriksaanFisik::findOne(['no_rekam_medik'=>$modelDataLayanan->no_rekam_medik]);
            // var_dump($master_pemeriksaan_fisik);
            // exit();
            $modelBahayaPotensial = new BahayaPotensial();
            $modelBrief = McuBrief::findOne(['no_rekam_medik' => $modelDataLayanan->no_rekam_medik]);
        } else {
            $anamnesis = new Anamnesis();
            $modelDataLayanan = new DataLayanan();
            $jenis_pekerjaan = new JenisPekerjaan();
            $master_pemeriksaan_fisik = new MasterPemeriksaanFisik();
            $modelBahayaPotensial = new BahayaPotensial();
            $modelBrief = new McuBrief();
        }

        return $this->render('unit-pemeriksaan', [
            'dataLayanan' => $modelDataLayanan,
            'anamnesis' => $anamnesis,
            'jenis_pekerjaan' => $jenis_pekerjaan,
            'master_pemeriksaan_fisik' => $master_pemeriksaan_fisik,
            'modelBahayaPotensial' => $modelBahayaPotensial,
            'modelBrief' => $modelBrief
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


    //save anamnesis 
    public function actionSaveAnamnesis()
    {
        $p = Yii::$app->request->post();
        $no_rekam_medik = $p['Anamnesis']['nomor_rekam_medik'];
        $anamnesis = Anamnesis::findOne(['nomor_rekam_medik' => $no_rekam_medik]);


        if ($anamnesis != null) {
            if ($anamnesis->load(Yii::$app->request->post())) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                if ($anamnesis->validate()) {
                    $anamnesis->save(false);
                    return [
                        's' => true,
                        'e' => null
                    ];
                } else {
                    return [
                        's' => false,
                        'e' => $anamnesis->errors
                    ];
                }
            }
        }

        $model = new Anamnesis();
        if ($model->load(Yii::$app->request->post())) {
            if ($anamnesis->validate()) {
                $anamnesis->save(false);
                return [
                    's' => true,
                    'e' => null
                ];
            } else {
                return [
                    's' => false,
                    'e' => $anamnesis->errors
                ];
            }
        }
    }

    //save anamensis okupasis bagian pekerjaan
    public function actionSaveAnamnesisOkupasi()
    {
        $model = new JenisPekerjaan();
        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            if ($model->validate()) {
                $model->save(false);
                return [
                    's' => true,
                    'e' => null
                ];
            } else {
                return [
                    's' => false,
                    'e' => $model->errors
                ];
            }
        }
    }


    //save anamensis okupasis bagian pekerjaan
    public function actionSaveBahayaPotensial()
    {
        $p = Yii::$app->request->post();
        $model = new BahayaPotensial();
        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            if ($model->validate()) {
                $model->save(false);
                return [
                    's' => true,
                    'e' => null
                ];
            } else {
                return [
                    's' => false,
                    'e' => $model->errors
                ];
            }
        }
    }

    //save anamnesis brief survey
    public function actionSaveBrief()
    {
        $p = Yii::$app->request->post();
        $no_rekam_medik = $p['McuBrief']['no_rekam_medik'];
        $brief = McuBrief::findOne(['no_rekam_medik' => $no_rekam_medik]);


        if ($brief != null) {
            if ($brief->load(Yii::$app->request->post())) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                if ($brief->validate()) {
                    $brief->save(false);
                    return [
                        's' => true,
                        'e' => null
                    ];
                } else {
                    return [
                        's' => false,
                        'e' => $brief->errors
                    ];
                }
            }
        }

        $model = new McuBrief();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $model->save(false);
                return [
                    's' => true,
                    'e' => null
                ];
            } else {
                return [
                    's' => false,
                    'e' => $model->errors
                ];
            }
        }
    }

    //save anamnesis brief survey
    public function actionSavePemeriksaanFisik()
    {
        $p = Yii::$app->request->post();
        $no_rekam_medik = $p['MasterPemeriksaanFisik']['no_rekam_medik'];
        $fisik = MasterPemeriksaanFisik::findOne(['no_rekam_medik' => $no_rekam_medik]);

        if ($fisik != null) {
            if ($fisik->load(Yii::$app->request->post())) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                if ($fisik->validate()) {
                    $fisik->save(false);
                    return [
                        's' => true,
                        'e' => null
                    ];
                } else {
                    return [
                        's' => false,
                        'e' => $fisik->errors
                    ];
                }
            }
        }

        $model = new MasterPemeriksaanFisik();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $model->save(false);
                return [
                    's' => true,
                    'e' => null
                ];
            } else {
                return [
                    's' => false,
                    'e' => $model->errors
                ];
            }
        }
    }
}
