<?php

namespace app\controllers;

use app\models\DataLayanan;
use app\models\MasterPemeriksaanFisik;
use app\models\spesialis\McuPenatalaksanaanMcu;
use app\models\spesialis\McuSpesialisAudiometri;
use Yii;
use app\models\spesialis\McuSpesialisTht;
use app\models\spesialis\McuSpesialisThtBerbisik;
use app\models\spesialis\McuSpesialisThtGarpuTala;
use app\models\spesialis\McuSpesialisThtSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SpesialisThtController implements the CRUD actions for McuSpesialisTht model.
 */
class SpesialisThtController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all McuSpesialisTht models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new McuSpesialisThtSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single McuSpesialisTht model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new McuSpesialisTht model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new McuSpesialisTht();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_spesialis_tht]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing McuSpesialisTht model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_spesialis_tht]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing McuSpesialisTht model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the McuSpesialisTht model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return McuSpesialisTht the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = McuSpesialisTht::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    //------------------------------------------------
    public function actionPeriksa($no_rm = null)
    {
        if ($no_rm != null) {
            $pasien = DataLayanan::find()->where(['no_rekam_medik' => $no_rm])->one();
            if (!$pasien) {
                return $this->redirect(['/site/ngga-nemu', 'no_rm' => $no_rm]);
            }
            $model = McuSpesialisTht::find()->where(['no_rekam_medik' => $no_rm])->one();
            if (!$model)
                $model = new McuSpesialisTht();
            $model->cari_pasien = $no_rm;
        } else {
            $pasien = null;
            $model = new McuSpesialisTht();
        }

        if ($model->load(Yii::$app->request->post())) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            if ($model->save()) {
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

        if ($model->isNewRecord) {
            $model->tl_daun_telinga_kanan = 'Normal';
            $model->tl_daun_telinga_kiri = 'Normal';
            $model->tl_liang_telinga_kanan = 'Normal';
            $model->tl_liang_telinga_kiri = 'Normal';
            $model->tl_serumen_telinga_kanan = 'Tidak Ada';
            $model->tl_serumen_telinga_kiri = 'Tidak Ada';
            $model->tl_membrana_timpani_telinga_kanan = 'Intak';
            $model->tl_membrana_timpani_telinga_kiri = 'Intak';
            $model->tl_test_berbisik_telinga_kanan = 'Normal';
            $model->tl_test_berbisik_telinga_kiri = 'Normal';
            $model->tl_test_berbisik_telinga_kanan_6 = 'Normal';
            $model->tl_test_berbisik_telinga_kiri_6 = 'Normal';
            $model->tl_test_berbisik_telinga_kanan_4 = 'Normal';
            $model->tl_test_berbisik_telinga_kiri_4 = 'Normal';
            $model->tl_test_berbisik_telinga_kanan_3 = 'Normal';
            $model->tl_test_berbisik_telinga_kiri_3 = 'Normal';
            $model->tl_test_berbisik_telinga_kanan_1 = 'Normal';
            $model->tl_test_berbisik_telinga_kiri_1 = 'Normal';
            $model->tl_test_garpu_tala_rinne_telinga_kanan = 'Normal';
            $model->tl_test_garpu_tala_rinne_telinga_kiri = 'Normal';
            // $model->tl_weber_telinga_kanan = 'Normal';
            // $model->tl_weber_telinga_kiri = 'Normal';
            $model->tl_weber_telinga_kanan = 'Tidak Ada Lateralisasi';
            $model->tl_weber_telinga_kiri = 'Tidak Ada Lateralisasi';
            $model->tl_swabach_telinga_kanan = 'Normal';
            $model->tl_swabach_telinga_kiri = 'Normal';
            // $model->tl_bing_telinga_kanan = 'Normal';
            // $model->tl_bing_telinga_kiri = 'Normal';
            $model->hd_meatus_nasi = 'Normal';
            $model->hd_septum_nasi = 'Normal';
            $model->hd_konka_nasal = 'Normal';
            $model->hd_nyeri_ketok_sinus_maksilar = 'Normal';
            $model->hd_penciuman = 'Normal';
            $model->tg_pharynx = 'Normal';
            $model->tg_tonsil_kanan = 'T0';
            $model->tg_tonsil_kiri = 'T0';
            $model->tg_ukuran_kanan = 'Normal';
            $model->tg_ukuran_kiri = 'Normal';
            $model->tg_palatum = 'Normal';

            // ambil data rinne dari perika audiometri
            $dataAudiometri = McuSpesialisAudiometri::findOne(['no_rekam_medik' => $no_rm]);
            if ($dataAudiometri) {
                if ($dataAudiometri->rata_kanan_ac < $dataAudiometri->rata_kanan_bc) {
                    $model->tl_test_garpu_tala_rinne_telinga_kanan = 'Negatif (AC < BC)';
                } else {
                    $model->tl_test_garpu_tala_rinne_telinga_kanan = 'Positif (AC > BC)';
                }
                if ($dataAudiometri->rata_kiri_ac < $dataAudiometri->rata_kiri_bc) {
                    $model->tl_test_garpu_tala_rinne_telinga_kiri = 'Negatif (AC < BC)';
                } else {
                    $model->tl_test_garpu_tala_rinne_telinga_kiri = 'Positif (AC > BC)';
                }
            }
        }

        return $this->render('periksa', [
            'model' => $model,
            'no_rm' => $no_rm,
            'pasien' => $pasien,
        ]);
    }

    public function actionCetak($no_rm, $no_daftar)
    {
        $pasien = DataLayanan::find()->where(['no_rekam_medik' => $no_rm])->andWhere(['no_registrasi' => $no_daftar])->one();

        $model = MasterPemeriksaanFisik::findOne(['no_rekam_medik' => $no_rm, 'no_daftar' => $no_daftar]);
        if (!$model) {
            $model = new MasterPemeriksaanFisik();
        }
        $modelAudiometri = McuSpesialisAudiometri::findOne(['no_rekam_medik' => $no_rm, 'no_daftar' => $no_daftar]);
        if (!$modelAudiometri) {
            $modelAudiometri = new McuSpesialisAudiometri();
        }
        $modelBerbisik = McuSpesialisThtBerbisik::findOne(['no_rekam_medik' => $no_rm, 'no_daftar' => $no_daftar]);
        if (!$modelBerbisik) {
            $modelBerbisik = new McuSpesialisThtBerbisik();
        }
        $modelGarpuTala = McuSpesialisThtGarpuTala::findOne(['no_rekam_medik' => $no_rm, 'no_daftar' => $no_daftar]);
        if (!$modelGarpuTala) {
            $modelGarpuTala = new McuSpesialisThtGarpuTala();
        }

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'legal',
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 10,
            'margin_bottom' => 5,
            'margin_header' => 10,
            'margin_footer' => 5
        ]);
        $mpdf->shrink_tables_to_fit = 1;
        $mpdf->use_kwt = true;
        $mpdf->SetTitle('Spesialis THT ' . $pasien['no_rekam_medik']);
        // return $this->renderPartial('cetak', [
        //     'model' => $model,
        //     'modelAudiometri' => $modelAudiometri,
        //     'modelBerbisik' => $modelBerbisik,
        //     'modelGarpuTala' => $modelGarpuTala,
        //     'no_rm' => $no_rm,
        //     'pasien' => DataLayanan::find()->where(['no_rekam_medik' => $no_rm])->one(),
        // ]);
        $mpdf->WriteHTML($this->renderPartial('cetak', [
            'model' => $model,
            'modelAudiometri' => $modelAudiometri,
            'modelBerbisik' => $modelBerbisik,
            'modelGarpuTala' => $modelGarpuTala,
            'no_rm' => $no_rm,
            'pasien' => $pasien,
        ]));
        $mpdf->Output('Spesialis THT ' . $pasien['no_rekam_medik'] . '.pdf', 'I');
        exit;
    }

    // public function actionPeriksaBerbisik($no_rm = null)
    // {
    //     if ($no_rm != null) {
    //         $pasien = DataLayanan::find()->where(['no_rekam_medik' => $no_rm])->one();
    //         if (!$pasien) {
    //             return $this->redirect(['/site/ngga-nemu', 'no_rm' => $no_rm]);
    //         }
    //         $model = McuSpesialisThtBerbisik::find()->where(['no_rekam_medik' => $no_rm])->one();
    //         if (!$model)
    //             $model = new McuSpesialisThtBerbisik();
    //         $model->cari_pasien = $no_rm;
    //     } else {
    //         $pasien = null;
    //         $model = new McuSpesialisThtBerbisik();
    //     }

    //     if ($model->load(Yii::$app->request->post())) {
    //         \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

    //         if ($model->save()) {
    //             return [
    //                 's' => true,
    //                 'e' => null
    //             ];
    //         } else {
    //             return [
    //                 's' => false,
    //                 'e' => $model->errors
    //             ];
    //         }
    //     }

    //     if ($model->isNewRecord) {
    //         $model->tl_test_berbisik_telinga_kanan_6 = 'Normal';
    //         $model->tl_test_berbisik_telinga_kiri_6 = 'Normal';
    //         $model->tl_test_berbisik_telinga_kanan_4 = 'Normal';
    //         $model->tl_test_berbisik_telinga_kiri_4 = 'Normal';
    //         $model->tl_test_berbisik_telinga_kanan_3 = 'Normal';
    //         $model->tl_test_berbisik_telinga_kiri_3 = 'Normal';
    //         $model->tl_test_berbisik_telinga_kanan_1 = 'Normal';
    //         $model->tl_test_berbisik_telinga_kiri_1 = 'Normal';
    //     }

    //     return $this->render('periksa-berbisik', [
    //         'model' => $model,
    //         'no_rm' => $no_rm,
    //         'pasien' => $pasien,
    //     ]);
    // }

    // public function actionPeriksaGarpuTala($no_rm = null)
    // {
    //     if ($no_rm != null) {
    //         $pasien = DataLayanan::find()->where(['no_rekam_medik' => $no_rm])->one();
    //         if (!$pasien) {
    //             return $this->redirect(['/site/ngga-nemu', 'no_rm' => $no_rm]);
    //         }
    //         $model = McuSpesialisThtGarpuTala::find()->where(['no_rekam_medik' => $no_rm])->one();
    //         if (!$model)
    //             $model = new McuSpesialisThtGarpuTala();
    //         $model->cari_pasien = $no_rm;
    //     } else {
    //         $pasien = null;
    //         $model = new McuSpesialisThtGarpuTala();
    //     }

    //     if ($model->load(Yii::$app->request->post())) {
    //         \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

    //         if ($model->save()) {
    //             return [
    //                 's' => true,
    //                 'e' => null
    //             ];
    //         } else {
    //             return [
    //                 's' => false,
    //                 'e' => $model->errors
    //             ];
    //         }
    //     }

    //     if ($model->isNewRecord) {
    //         // ambil data rinne dari perika audiometri
    //         $dataAudiometri = McuSpesialisAudiometri::findOne(['no_rekam_medik' => $no_rm]);
    //         if ($dataAudiometri) {
    //             if ($dataAudiometri->rata_kanan_ac < $dataAudiometri->rata_kanan_bc) {
    //                 $model->tl_test_garpu_tala_rinne_telinga_kanan = 'Negatif (AC < BC)';
    //             } else {
    //                 $model->tl_test_garpu_tala_rinne_telinga_kanan = 'Positif (AC > BC)';
    //             }
    //             if ($dataAudiometri->rata_kiri_ac < $dataAudiometri->rata_kiri_bc) {
    //                 $model->tl_test_garpu_tala_rinne_telinga_kiri = 'Negatif (AC < BC)';
    //             } else {
    //                 $model->tl_test_garpu_tala_rinne_telinga_kiri = 'Positif (AC > BC)';
    //             }
    //         }

    //         $model->tl_weber_telinga_kanan = 'Tidak Ada Lateralisasi';
    //         $model->tl_weber_telinga_kiri = 'Tidak Ada Lateralisasi';
    //         $model->tl_swabach_telinga_kanan = 'Normal';
    //         $model->tl_swabach_telinga_kiri = 'Normal';
    //         // $model->tl_bing_telinga_kanan = 'Normal';
    //         // $model->tl_bing_telinga_kiri = 'Normal';
    //     }

    //     return $this->render('periksa-garpu-tala', [
    //         'model' => $model,
    //         'no_rm' => $no_rm,
    //         'pasien' => $pasien,
    //     ]);
    // }

    public function actionPeriksaBerbisik($id = null)
    {

        $id_cari = $id;

        if ($id_cari != null) {
            $pasien = DataLayanan::find()->where(['id_data_pelayanan' => $id_cari])->one();
            if (!$pasien) {
                return $this->redirect(['/site/ngga-nemu', 'id' => $id_cari]);
            }

            $model = McuSpesialisThtBerbisik::find()
                ->where(['no_rekam_medik' => $pasien->no_rekam_medik])
                ->andWhere(['no_daftar' => $pasien->no_registrasi])
                ->one();
            if (!$model)
                $model = new McuSpesialisThtBerbisik();

            $model->cari_pasien = $id_cari;
            $no_rm = $pasien->no_rekam_medik;
            $no_daftar = $pasien->no_registrasi;
        } else {
            $pasien = null;
            $no_rm = null;
            $no_daftar = null;
            $model = new McuSpesialisThtBerbisik();
        }
        $modelPenataList = McuPenatalaksanaanMcu::find()
            ->where(['jenis' => 'spesialis_tht_berbisik'])
            ->andWhere(['id_fk' => $model->id_spesialis_tht_berbisik]);
        $modelPenata = new McuPenatalaksanaanMcu();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            if ($model->save()) {
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

        if ($model->isNewRecord) {
            // $model->tl_test_berbisik_telinga_kanan_6 = 'Normal';
            // $model->tl_test_berbisik_telinga_kiri_6 = 'Normal';
            // $model->tl_test_berbisik_telinga_kanan_4 = 'Normal';
            // $model->tl_test_berbisik_telinga_kiri_4 = 'Normal';
            // $model->tl_test_berbisik_telinga_kanan_3 = 'Normal';
            // $model->tl_test_berbisik_telinga_kiri_3 = 'Normal';
            // $model->tl_test_berbisik_telinga_kanan_1 = 'Normal';
            // $model->tl_test_berbisik_telinga_kiri_1 = 'Normal';
            $model->tl_test_berbisik_telinga_kanan_option = 'Jarak 6-5 Meter';
            $model->tl_test_berbisik_telinga_kiri_option = 'Jarak 6-5 Meter';
            $model->tl_test_berbisik_telinga_kanan = 'Dalam Batas Normal';
            $model->tl_test_berbisik_telinga_kiri = 'Dalam Batas Normal';
            $model->kesan = 'Normal';
        }

        return $this->render('periksa-berbisik', [
            'model' => $model,
            'modelPenata' => $modelPenata,
            'modelPenataList' => $modelPenataList,
            'no_rm' => $no_rm,
            'no_daftar' => $no_daftar,
            'pasien' => $pasien,
        ]);
    }

    public function actionCetakBerbisik($no_rm, $no_daftar)
    {
        $pasien = DataLayanan::find()->where(['no_rekam_medik' => $no_rm])->andWhere(['no_registrasi' => $no_daftar])->one();
        $modelBerbisik = McuSpesialisThtBerbisik::findOne(['no_rekam_medik' => $no_rm, 'no_daftar' => $no_daftar]);

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'legal',
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 10,
            'margin_bottom' => 5,
            'margin_header' => 10,
            'margin_footer' => 5
        ]);
        $mpdf->shrink_tables_to_fit = 1;
        $mpdf->use_kwt = true;
        $mpdf->SetTitle('Tes Berbisik ' . $pasien['no_rekam_medik']);
        // return $this->renderPartial('cetak', [
        //     'model' => $model,
        //     'modelAudiometri' => $modelAudiometri,
        //     'modelBerbisik' => $modelBerbisik,
        //     'modelGarpuTala' => $modelGarpuTala,
        //     'no_rm' => $no_rm,
        //     'pasien' => DataLayanan::find()->where(['no_rekam_medik' => $no_rm])->one(),
        // ]);
        $mpdf->WriteHTML($this->renderPartial('cetak-berbisik', [
            'modelBerbisik' => $modelBerbisik,
            'no_rm' => $no_rm,
            'pasien' => $pasien,
        ]));
        $mpdf->Output('Tes Berbisik ' . $pasien['no_rekam_medik'] . '.pdf', 'I');
        exit;
    }

    public function actionSimpanPenataBerbisik($id = null)
    {
        $model = new McuPenatalaksanaanMcu();

        if ($model->load(Yii::$app->request->post())) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            $model->jenis = 'spesialis_tht_berbisik';
            $model->id_fk = $id;

            if ($model->save()) {
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

    public function actionPeriksaGarpuTala($id = null)
    {

        $id_cari = $id;

        if ($id_cari != null) {
            $pasien = DataLayanan::find()->where(['id_data_pelayanan' => $id_cari])->one();
            if (!$pasien) {
                return $this->redirect(['/site/ngga-nemu', 'id' => $id_cari]);
            }

            $model = McuSpesialisThtGarpuTala::find()
                ->where(['no_rekam_medik' => $pasien->no_rekam_medik])
                ->andWhere(['no_daftar' => $pasien->no_registrasi])
                ->one();
            if (!$model)
                $model = new McuSpesialisThtGarpuTala();

            $model->cari_pasien = $id_cari;
            $no_rm = $pasien->no_rekam_medik;
            $no_daftar = $pasien->no_registrasi;
        } else {
            $pasien = null;
            $no_rm = null;
            $no_daftar = null;
            $model = new McuSpesialisThtGarpuTala();
        }
        $modelPenataList = McuPenatalaksanaanMcu::find()
            ->where(['jenis' => 'spesialis_tht_garpu_tala'])
            ->andWhere(['id_fk' => $model->id_spesialis_tht_garpu_tala]);
        $modelPenata = new McuPenatalaksanaanMcu();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            if ($model->save()) {
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

        if ($model->isNewRecord) {
            // ambil data rinne dari perika audiometri
            $dataAudiometri = McuSpesialisAudiometri::findOne(['no_rekam_medik' => $no_rm]);
            if ($dataAudiometri) {
                if ($dataAudiometri->rata_kanan_ac < $dataAudiometri->rata_kanan_bc) {
                    $model->tl_test_garpu_tala_rinne_telinga_kanan = 'Negatif (AC < BC)';
                } else {
                    $model->tl_test_garpu_tala_rinne_telinga_kanan = 'Positif (AC > BC)';
                }
                if ($dataAudiometri->rata_kiri_ac < $dataAudiometri->rata_kiri_bc) {
                    $model->tl_test_garpu_tala_rinne_telinga_kiri = 'Negatif (AC < BC)';
                } else {
                    $model->tl_test_garpu_tala_rinne_telinga_kiri = 'Positif (AC > BC)';
                }
            }

            $model->tl_weber_telinga_kanan = 'Tidak Ada Lateralisasi';
            $model->tl_weber_telinga_kiri = 'Tidak Ada Lateralisasi';
            $model->tl_swabach_telinga_kanan = 'Normal';
            $model->tl_swabach_telinga_kiri = 'Normal';
            // $model->tl_bing_telinga_kanan = 'Normal';
            // $model->tl_bing_telinga_kiri = 'Normal';
            $model->kesan = 'Normal';
        }

        return $this->render('periksa-garpu-tala', [
            'model' => $model,
            'modelPenata' => $modelPenata,
            'modelPenataList' => $modelPenataList,
            'no_rm' => $no_rm,
            'no_daftar' => $no_daftar,
            'pasien' => $pasien,
        ]);
    }

    public function actionCetakGarpuTala($no_rm, $no_daftar)
    {
        $pasien = DataLayanan::find()->where(['no_rekam_medik' => $no_rm])->andWhere(['no_registrasi' => $no_daftar])->one();
        $modelGarpuTala = McuSpesialisThtGarpuTala::findOne(['no_rekam_medik' => $no_rm, 'no_daftar' => $no_daftar]);

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'legal',
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 10,
            'margin_bottom' => 5,
            'margin_header' => 10,
            'margin_footer' => 5
        ]);
        $mpdf->shrink_tables_to_fit = 1;
        $mpdf->use_kwt = true;
        $mpdf->SetTitle('Tes GarpuTala ' . $pasien['no_rekam_medik']);
        // return $this->renderPartial('cetak', [
        //     'model' => $model,
        //     'modelAudiometri' => $modelAudiometri,
        //     'modelGarpuTala' => $modelGarpuTala,
        //     'modelGarpuTala' => $modelGarpuTala,
        //     'no_rm' => $no_rm,
        //     'pasien' => DataLayanan::find()->where(['no_rekam_medik' => $no_rm])->one(),
        // ]);
        $mpdf->WriteHTML($this->renderPartial('cetak-garpu-tala', [
            'modelGarpuTala' => $modelGarpuTala,
            'no_rm' => $no_rm,
            'pasien' => $pasien,
        ]));
        $mpdf->Output('Tes Berbisik ' . $pasien['no_rekam_medik'] . '.pdf', 'I');
        exit;
    }

    public function actionSimpanPenataGarpuTala($id = null)
    {
        $model = new McuPenatalaksanaanMcu();

        if ($model->load(Yii::$app->request->post())) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            $model->jenis = 'spesialis_tht_garpu_tala';
            $model->id_fk = $id;

            if ($model->save()) {
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
