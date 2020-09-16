<?php

namespace app\controllers;

use app\models\DataLayanan;
use Yii;
use app\models\spesialis\McuSpesialisMata;
use app\models\spesialis\McuSpesialisMataSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SpesialisMataController implements the CRUD actions for McuSpesialisMata model.
 */
class SpesialisMataController extends Controller
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
     * Lists all McuSpesialisMata models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new McuSpesialisMataSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single McuSpesialisMata model.
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
     * Creates a new McuSpesialisMata model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new McuSpesialisMata();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_spesialis_mata]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing McuSpesialisMata model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_spesialis_mata]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing McuSpesialisMata model.
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
     * Finds the McuSpesialisMata model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return McuSpesialisMata the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = McuSpesialisMata::findOne($id)) !== null) {
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
            $model = McuSpesialisMata::find()->where(['no_rekam_medik' => $no_rm])->one();
            if (!$model)
                $model = new McuSpesialisMata();
            $model->cari_pasien = $no_rm;
        } else {
            $pasien = null;
            $model = new McuSpesialisMata();
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
            $model->persepsi_warna_mata_kanan = 'Normal';
            $model->persepsi_warna_mata_kiri = 'Normal';
            $model->kelopak_mata_kanan = 'Normal';
            $model->kelopak_mata_kiri = 'Normal';
            $model->konjungtiva_mata_kanan = 'Normal';
            $model->konjungtiva_mata_kiri = 'Normal';
            $model->kesegarisan_gerak_bola_mata_kanan = 'Normal';
            $model->kesegarisan_gerak_bola_mata_kiri = 'Normal';
            $model->skiera_mata_kanan = 'Normal';
            $model->skiera_mata_kiri = 'Normal';
            $model->lensa_mata_kanan = 'Tidak Keruh';
            $model->lensa_mata_kiri = 'Tidak Keruh';
            $model->kornea_mata_kanan = 'Normal';
            $model->kornea_mata_kiri = 'Normal';
            $model->bulu_mata_kanan = 'Normal';
            $model->bulu_mata_kiri = 'Normal';
            $model->tekanan_bola_mata_kanan = 'Normal';
            $model->tekanan_bola_mata_kiri = 'Normal';
            $model->penglihatan_3_dimensi_mata_kanan = 'Normal';
            $model->penglihatan_3_dimensi_mata_kiri = 'Normal';
            $model->virus_mata_tanpa_koreksi_mata_kanan = 'VOD: 20/20';
            $model->virus_mata_tanpa_koreksi_mata_kiri = 'VOS: 20/20';
        }

        return $this->render('periksa', [
            'model' => $model,
            'no_rm' => $no_rm,
            'pasien' => $pasien,
        ]);
    }
}
