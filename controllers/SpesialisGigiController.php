<?php

namespace app\controllers;

use app\models\DataLayanan;
use app\models\spesialis\McuPenatalaksanaanMcu;
use Yii;
use app\models\spesialis\McuSpesialisGigi;
use app\models\spesialis\McuSpesialisGigiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SpesialisGigiController implements the CRUD actions for McuSpesialisGigi model.
 */
class SpesialisGigiController extends Controller
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
     * Lists all McuSpesialisGigi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new McuSpesialisGigiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single McuSpesialisGigi model.
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
     * Creates a new McuSpesialisGigi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new McuSpesialisGigi();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_spesialis_gigi]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing McuSpesialisGigi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_spesialis_gigi]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing McuSpesialisGigi model.
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
     * Finds the McuSpesialisGigi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return McuSpesialisGigi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = McuSpesialisGigi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    //------------------------------------------------
    // public function actionPeriksa($no_rm = null, $no_daftar = null)
    public function actionPeriksa($id = null)
    {

        $id_cari = $id;

        $modelPenata = new McuPenatalaksanaanMcu();
        if ($id_cari != null) {
            $pasien = DataLayanan::find()->where(['id_data_pelayanan' => $id_cari])->one();
            if (!$pasien) {
                return $this->redirect(['/site/ngga-nemu', 'id' => $id_cari]);
            }

            $model = McuSpesialisGigi::find()
                ->where(['no_rekam_medik' => $pasien->no_rekam_medik])
                ->andWhere(['no_daftar' => $pasien->no_registrasi])
                ->one();
            if (!$model)
                $model = new McuSpesialisGigi();

            $modelPenata->no_rekam_medik = $pasien->no_rekam_medik;
            $model->cari_pasien = $id_cari;
            $no_rm = $pasien->no_rekam_medik;
            $no_daftar = $pasien->no_registrasi;
        } else {
            $pasien = null;
            $no_rm = null;
            $no_daftar = null;
            $model = new McuSpesialisGigi();
        }
        $modelPenataList = McuPenatalaksanaanMcu::find()
            ->where(['jenis' => 'spesialis_gigi'])
            ->andWhere(['id_fk' => $model->id_spesialis_gigi]);

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            // echo "<pre>";
            // print_r($model);
            // echo "</pre>";
            // die;

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
            $model->g18 = 'Normal';
            $model->g38 = 'Normal';
            $model->g17 = 'Normal';
            $model->g37 = 'Normal';
            $model->g16 = 'Normal';
            $model->g36 = 'Normal';
            $model->g15 = 'Normal';
            $model->g35 = 'Normal';
            $model->g14 = 'Normal';
            $model->g34 = 'Normal';
            $model->g13 = 'Normal';
            $model->g33 = 'Normal';
            $model->g12 = 'Normal';
            $model->g32 = 'Normal';
            $model->g11 = 'Normal';
            $model->g31 = 'Normal';
            $model->g21 = 'Normal';
            $model->g41 = 'Normal';
            $model->g22 = 'Normal';
            $model->g42 = 'Normal';
            $model->g23 = 'Normal';
            $model->g43 = 'Normal';
            $model->g24 = 'Normal';
            $model->g44 = 'Normal';
            $model->g25 = 'Normal';
            $model->g45 = 'Normal';
            $model->g26 = 'Normal';
            $model->g46 = 'Normal';
            $model->g27 = 'Normal';
            $model->g47 = 'Normal';
            $model->g28 = 'Normal';
            $model->g48 = 'Normal';
            $model->oklusi = 'Normal Bite';
            $model->torus_palatinus = 'Tidak Ada';
            $model->torus_mandibularis = 'Tidak Ada';
            $model->palatum = 'Tinggi';
            $model->supernumerary_teeth = 'Tidak Ada';
            $model->diastema = 'Tidak Ada';
            $model->spacing = 'Tidak Ada';
            $model->oral_hygiene = 'Baik';
            $model->gingiva_periodontal = 'Normal';
            $model->oral_mucosa = 'Normal';
            $model->tongue = 'Normal';
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

            $model->jenis = 'spesialis_gigi';
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
        $model = McuSpesialisGigi::findOne(['no_rekam_medik' => $no_rm, 'no_daftar' => $no_daftar]);

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
        $mpdf->SetTitle('Spesialis Gigi ' . $model['no_rekam_medik']);
        if ($model->kesan == 'Normal') {
            $model->kesimpulan = 'Normal';
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

// Backup
// $model->g18 = $model->g18 ? implode(',', $model->g18) : null ;
// $model->g18 =  explode(',', $model->g18);