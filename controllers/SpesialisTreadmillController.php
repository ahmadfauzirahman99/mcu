<?php

namespace app\controllers;

use app\models\DataLayanan;
use app\models\spesialis\McuPenatalaksanaanMcu;
use Yii;
use app\models\spesialis\McuSpesialisTreadmill;
use app\models\spesialis\McuSpesialisTreadmillSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SpesialisTreadmillController implements the CRUD actions for McuSpesialisTreadmill model.
 */
class SpesialisTreadmillController extends Controller
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
     * Lists all McuSpesialisTreadmill models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new McuSpesialisTreadmillSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single McuSpesialisTreadmill model.
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
     * Creates a new McuSpesialisTreadmill model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id = null)
    {
        if ($id != null) {
            $modelDataLayanan = DataLayanan::findOne(['id_data_pelayanan' => $id]);
            if (!$modelDataLayanan) {
                return $this->redirect(['/site/ngga-nemu', 'id' => $id]);
            }
            
            $model = McuSpesialisTreadmill::findOne(['no_rekam_medik' => $modelDataLayanan->no_rekam_medik]);
            if(!$model){
                return $this->redirect(['/site/ngga-nemu', 'id' => $id]);

            }
        } else {
            $model = new McuSpesialisTreadmill();
            $modelDataLayanan = new DataLayanan();
        }

        return $this->render('_form', [
            'model' => $model,
            'dataLayanan' => $modelDataLayanan
        ]);
    }

    /**
     * Updates an existing McuSpesialisTreadmill model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_spesialis_treadmill]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing McuSpesialisTreadmill model.
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
     * Finds the McuSpesialisTreadmill model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return McuSpesialisTreadmill the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = McuSpesialisTreadmill::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPeriksa($id = null)
    {

        $id_cari = $id;

        $modelPenata = new McuPenatalaksanaanMcu();
        if ($id_cari != null) {
            $pasien = DataLayanan::find()->where(['id_data_pelayanan' => $id_cari])->one();
            if (!$pasien) {
                return $this->redirect(['/site/ngga-nemu', 'id' => $id_cari]);
            }

            $model = McuSpesialisTreadmill::find()
                ->where(['no_rekam_medik' => $pasien->no_rekam_medik])
                ->andWhere(['no_daftar' => $pasien->no_registrasi])
                ->one();
            if (!$model)
                $model = new McuSpesialisTreadmill();

            $modelPenata->no_rekam_medik = $pasien->no_rekam_medik;
            $model->cari_pasien = $id_cari;
            $no_rm = $pasien->no_rekam_medik;
            $no_daftar = $pasien->no_registrasi;
        } else {
            $pasien = null;
            $no_rm = null;
            $no_daftar = null;
            $model = new McuSpesialisTreadmill();
        }
        $modelPenataList = McuPenatalaksanaanMcu::find()
            ->where(['jenis' => 'spesialis_treadmill'])
            ->andWhere(['id_fk' => $model->id_spesialis_treadmill]);

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;


            if ($model->save()) {
                // echo "<pre>";
                // print_r($model);
                // echo "</pre>";
                // die;
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
            $model->tingkat_kesegaran_jasmani = 'Good';
            $model->respon_hemodinamik = 'Normal';
            $model->respon_iskemik = 'Negatif / tidak menunjukkan tanda-tanda iskemia miokard reversibel';
            $model->kesan = 'Normal';
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

            $model->jenis = 'spesialis_treadmill';
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
        $model = McuSpesialisTreadmill::findOne(['no_rekam_medik' => $no_rm, 'no_daftar' => $no_daftar]);

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
        $mpdf->SetTitle('Spesialis Treadmill ' . $model['no_rekam_medik']);
        if ($model->kesan == 'Normal') {
            $model->kesan = 'Normal';
        }
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
        $mpdf->Output('Spesialis Gigi ' . $model['no_rekam_medik'] . '.pdf', 'I');
        exit;
    }
}
