<?php

namespace app\controllers;

use app\models\DataLayanan;
use Yii;
use app\models\PemeriksaanTreadmill;
use app\models\PemeriksaanTreadmillSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PemeriksaanTreadmillController implements the CRUD actions for PemeriksaanTreadmill model.
 */
class PemeriksaanTreadmillController extends Controller
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
     * Lists all PemeriksaanTreadmill models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PemeriksaanTreadmillSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PemeriksaanTreadmill model.
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
     * Creates a new PemeriksaanTreadmill model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PemeriksaanTreadmill();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_tread]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PemeriksaanTreadmill model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_tread]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PemeriksaanTreadmill model.
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


    public function actionPeriksa($id = null)
    {
        if ($id != null) {
            $modelDataLayanan = DataLayanan::findOne(['id_data_pelayanan' => $id]);
            if (!$modelDataLayanan) {
                return $this->redirect(['/site/ngga-nemu', 'id' => $id]);
            }

            $model = PemeriksaanTreadmill::findOne(['no_rekam_medik' => $modelDataLayanan->no_rekam_medik]);
            if (!$model) {
                $model = new PemeriksaanTreadmill();
            }
        } else {
            $model = new PemeriksaanTreadmill();
            $modelDataLayanan = new DataLayanan();
        }
        return $this->render(
            'periksa',
            [
                'model' => $model,
                'dataLayanan' => $modelDataLayanan
            ]
        );
    }

    /**
     * Finds the PemeriksaanTreadmill model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PemeriksaanTreadmill the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PemeriksaanTreadmill::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
