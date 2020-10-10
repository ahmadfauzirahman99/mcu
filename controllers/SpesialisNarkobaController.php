<?php

namespace app\controllers;

use app\models\DataLayanan;
use app\models\spesialis\McuPenatalaksanaanMcu;
use Yii;
use app\models\SpesialisNarkoba;
use app\models\SpesialisNarkobaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SpesialisNarkobaController implements the CRUD actions for SpesialisNarkoba model.
 */
class SpesialisNarkobaController extends Controller
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
     * Lists all SpesialisNarkoba models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SpesialisNarkobaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SpesialisNarkoba model.
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
     * Creates a new SpesialisNarkoba model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    
    public function actionCreate($no_rm = null)
    {
        $model = new SpesialisNarkoba();

        if ($no_rm != null) {
            $pasien = DataLayanan::find()->where(['no_rekam_medik' => $no_rm])->one();
            if (!$pasien) {
                return $this->redirect(['/site/ngga-nemu', 'no_rm' => $no_rm]);
            }
            $model = SpesialisNarkoba::find()->where(['no_rekam_medik' => $no_rm])->one();
            if (!$model)
                $model = new SpesialisNarkoba();
            $model->cari_pasien = $no_rm;
        } else {
            $pasien = null;
            $model = new SpesialisNarkoba();
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_spesialis_narkoba]);
        }

        return $this->render('create', [
            'model' => $model,
            'no_rm' => $no_rm,
            'pasien' => $pasien,
        ]);
    }

    /**
     * Updates an existing SpesialisNarkoba model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_spesialis_narkoba]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SpesialisNarkoba model.
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
     * Finds the SpesialisNarkoba model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SpesialisNarkoba the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SpesialisNarkoba::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    // public function actionPeriksa($id = null)
    // {
    //     $id_cari = $id;

    //     if ($id_cari != null) {
    //         $pasien = DataLayanan::find()->where(['id_data_pelayanan' => $id_cari])->one();
    //         if (!$pasien) {
    //             return $this->redirect(['/site/ngga-nemu', 'id' => $id_cari]);
    //         }
            
    //         $model = SpesialisNarkoba::find()
    //         ->where(['no_rekam_medik' => $pasien->no_rekam_medik])
    //         ->andWhere(['no_daftar' => $pasien->no_registrasi])
    //         ->one();
    //         if (!$model)
    //             $model = new SpesialisNarkoba();
    //         $model->cari_pasien = $id_cari;
    //         $no_rm = $pasien->no_rekam_medik;
    //         $no_daftar = $pasien->no_registrasi;
    //     } else {
    //         $pasien = null;
    //         $no_rm = null;
    //         $no_daftar = null;
    //         $model = new SpesialisNarkoba();
    //     }

    //     $modelPenataList = McuPenatalaksanaanMcu::find()
    //         ->where(['jenis' => 'spesialis_narkoba'])
    //         ->andWhere(['id_fk' => $model->id_spesialis_narkoba]);
    //     $modelPenata = new McuPenatalaksanaanMcu();

    //     if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
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

    //     return $this->render('periksa', [
    //         'model' => $model,
    //         'modelPenata' => $modelPenata,
    //         'modelPenataList' => $modelPenataList,
    //         'no_rm' => $no_rm,
    //         'no_daftar' => $no_daftar,
    //         'pasien' => $pasien,
    //     ]);
    // }

    public function actionPeriksa($id = null)
    {

        $id_cari = $id;

        if ($id_cari != null) {
            $pasien = DataLayanan::find()->where(['id_data_pelayanan' => $id_cari])->one();
            if (!$pasien) {
                return $this->redirect(['/site/ngga-nemu', 'id' => $id_cari]);
            }

            $model = SpesialisNarkoba::find()
                ->where(['no_rekam_medik' => $pasien->no_rekam_medik])
                ->andWhere(['no_daftar' => $pasien->no_registrasi])
                ->one();
            if (!$model)
                $model = new SpesialisNarkoba();

            $model->cari_pasien = $id_cari;
            $no_rm = $pasien->no_rekam_medik;
            $no_daftar = $pasien->no_registrasi;
        } else {
            $pasien = null;
            $no_rm = null;
            $no_daftar = null;
            $model = new SpesialisNarkoba();
        }
        $modelPenataList = McuPenatalaksanaanMcu::find()
            ->where(['jenis' => 'spesialis_narkoba'])
            ->andWhere(['id_fk' => $model->id_spesialis_narkoba]);
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
            $model->benzodiazepin_hasil = 'Negatif';
            $model->thc_hasil = 'Negatif';
            $model->opiat_hasil = 'Negatif';
            $model->amphetammin_hasil = 'Negatif';
            $model->kokain_hasil = 'Negatif';
            $model->methamphetamin_hasil = 'Negatif';
            $model->carisoprodol_hasil = 'Negatif';
        }

        return $this->render('periksa', [
            'model' => $model,
            'modelPenata' => $modelPenata,
            'modelPenataList' => $modelPenataList,
            'no_rm' => $no_rm,
            'no_daftar' => $no_daftar,
            'pasien' => $pasien,
        ]);
    }
    
    public function actionSimpanPenata($id = null)
    {
        $model = new McuPenatalaksanaanMcu();

        if ($model->load(Yii::$app->request->post())) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            $model->jenis = 'spesialis_narkoba';
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

    public function actionCetak($no_rm, $no_daftar)
    {
        $model = SpesialisNarkoba::findOne(['no_rekam_medik' => $no_rm, 'no_daftar' => $no_daftar]);

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'legal',
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 10,
            'margin_bottom' => 10,
            'margin_header' => 10,
            'margin_footer' => 10
        ]);
        $mpdf->SetTitle('Spesialis Narkoba ' . $model['no_rekam_medik']);
        // return $this->renderPartial('cetak', [
        //     'model' => $model,
        //     'no_rm' => $no_rm,
        //     'pasien' => DataLayanan::find()->where(['no_rekam_medik' => $no_rm])->one(),
        // ]);
        $mpdf->WriteHTML($this->renderPartial('cetak', [
            'model' => $model,
            'no_rm' => $no_rm,
            'pasien' => DataLayanan::find()->where(['no_rekam_medik' => $no_rm])->one(),
        ]));
        $mpdf->Output('Spesialis Narkoba ' . $model['no_rekam_medik'] . '.pdf', 'I');
        exit;
    }
}
