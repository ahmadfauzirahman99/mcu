<?php

namespace app\controllers;

use app\models\DataLayanan;
use app\models\spesialis\BaseAR;
use app\models\spesialis\McuPenatalaksanaanMcu;
use Yii;
use app\models\spesialis\McuSpesialisPsikologi;
use app\models\spesialis\McuSpesialisPsikologiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SpesialisPsikologiRsudController implements the CRUD actions for McuSpesialisPsikologi model.
 */
class SpesialisPsikologiRsudController extends Controller
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
     * Lists all McuSpesialisPsikologi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new McuSpesialisPsikologiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single McuSpesialisPsikologi model.
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
     * Creates a new McuSpesialisPsikologi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new McuSpesialisPsikologi();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_spesialis_psikologi]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing McuSpesialisPsikologi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_spesialis_psikologi]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing McuSpesialisPsikologi model.
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
     * Finds the McuSpesialisPsikologi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return McuSpesialisPsikologi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = McuSpesialisPsikologi::findOne($id)) !== null) {
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

            $model = McuSpesialisPsikologi::find()
                ->where(['no_rekam_medik' => $pasien->no_rekam_medik])
                ->andWhere(['no_daftar' => $pasien->no_registrasi])
                ->one();
            if (!$model)
                $model = new McuSpesialisPsikologi();

            $modelPenata->no_rekam_medik = $pasien->no_rekam_medik;
            $model->cari_pasien = $id_cari;
            $no_rm = $pasien->no_rekam_medik;
            $no_daftar = $pasien->no_registrasi;

            $model->pendidikan = $pasien->pendidikan;
            $model->alamat = $pasien->alamat;
            $model->jenis_kelamin = BaseAR::getJk($pasien->jenis_kelamin);
            $model->agama = $pasien->agama;
            $model->pekerjaan = $pasien->pekerjaan;

        } else {
            $pasien = null;
            $no_rm = null;
            $no_daftar = null;
            $model = new McuSpesialisPsikologi();
        }
        $modelPenataList = McuPenatalaksanaanMcu::find()
            ->where(['jenis' => 'spesialis_psikologi'])
            ->andWhere(['id_fk' => $model->id_spesialis_psikologi]);

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            $model->simptom1 = $model->simptom1 == '' ? [] : $model->simptom1;
            $model->simptom2 = $model->simptom2 == '' ? [] : $model->simptom2;
            $model->simptom3 = $model->simptom3 == '' ? [] : $model->simptom3;
            // echo "<pre>";
            // var_dump($model->simptom2);
            // print_r($model);
            // echo "</pre>";
            // die;
            $model->simptom = array_merge(array_merge($model->simptom1, $model->simptom2), $model->simptom3);

            
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
            $model->tgl_pemeriksaan = date('d-m-Y');

            $model->penampilan_umum = 'Terawat';
            $model->sikap_terhadap_pemeriksa = 'Kooperatif';
            $model->afek = 'Normal';
            $model->roman_muka = 'Wajar';
            $model->proses_pikir = 'Realistik';
            $model->gangguan_persepsi = 'Tidak Ada';
            $model->kognitif_memori = '+';
            $model->kognitif_konsentrasi = '+';
            $model->kognitif_orientasi = '+';
            $model->kognitif_kemampuan_verbal = '+';
            $model->emosi = 'Stabil';
            $model->perilaku = 'Normal';
            $model->kesan = 'Normal';
        }else{
            $model->tgl_pemeriksaan = Yii::$app->formatter->asDate($model->tgl_pemeriksaan, 'php:d-m-Y');

            $model->simptom1 = $model->simptom;
            $model->simptom2 = $model->simptom;
            $model->simptom3 = $model->simptom;
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

            $model->jenis = 'spesialis_psikologi';
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
        $model = McuSpesialisPsikologi::findOne(['no_rekam_medik' => $no_rm, 'no_daftar' => $no_daftar]);

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
        $mpdf->SetTitle('Spesialis Psikologi ' . $model['no_rekam_medik']);
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