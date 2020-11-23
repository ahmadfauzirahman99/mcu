<?php

namespace app\controllers;

use app\models\DataLayanan;
use Yii;
use app\models\PemeriksaanEkg;
use app\models\PemeriksaanEkgSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PemeriksaanEkgController implements the CRUD actions for PemeriksaanEkg model.
 */
class PemeriksaanEkgController extends Controller
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
     * Lists all PemeriksaanEkg models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PemeriksaanEkgSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PemeriksaanEkg model.
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
     * Creates a new PemeriksaanEkg model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PemeriksaanEkg();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_ekg]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PemeriksaanEkg model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_ekg]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PemeriksaanEkg model.
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

            $model = PemeriksaanEkg::findOne(['no_rekam_medik' => $modelDataLayanan->no_rekam_medik]);
            if (!$model) {
                $model = new PemeriksaanEkg();
            }
        } else {
            $model = new PemeriksaanEkg();
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
     * Finds the PemeriksaanEkg model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PemeriksaanEkg the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PemeriksaanEkg::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
