<?php

namespace app\controllers;

use app\models\DataLayanan;
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
    public function actionPeriksa($no_rm = null)
    {
        if ($no_rm != null) {
            $pasien = DataLayanan::find()->where(['no_rekam_medik' => $no_rm])->one();
            if (!$pasien) {
                return $this->redirect(['/site/ngga-nemu', 'no_rm' => $no_rm]);
            }
            $model = McuSpesialisGigi::find()->where(['no_rekam_medik' => $no_rm])->one();
            if (!$model)
                $model = new McuSpesialisGigi();
            $model->cari_pasien = $no_rm;
        } else {
            $pasien = null;
            $model = new McuSpesialisGigi();
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

        return $this->render('periksa', [
            'model' => $model,
            'no_rm' => $no_rm,
            'pasien' => $pasien,
        ]);
    }
}

// Backup
// $model->g18 = $model->g18 ? implode(',', $model->g18) : null ;
// $model->g18 =  explode(',', $model->g18);