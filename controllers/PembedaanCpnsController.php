<?php

namespace app\controllers;

use Yii;
use app\models\PembedaanCpns;
use app\models\PembedaanCpnsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\DataLayanan;

/**
 * PembedaanCpnsController implements the CRUD actions for PembedaanCpns model.
 */
class PembedaanCpnsController extends Controller
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
     * Lists all PembedaanCpns models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PembedaanCpnsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PembedaanCpns model.
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
     * Creates a new PembedaanCpns model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PembedaanCpns();

        if ($model->load(Yii::$app->request->post())) {
            $dataLayanan = DataLayanan::findOne(['id_data_pelayanan'=>$_POST['PembedaanCpns']['no_rekam_medik']]);
            $model->no_rekam_medik = $dataLayanan->no_rekam_medik;
            $model->created_by = Yii::$app->user->identity->id;
            $model->tanggal=  date('Y-m-d');
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id_pembedaan]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PembedaanCpns model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->created_by = Yii::$app->user->identity->id;
            $model->tanggal=  date('Y-m-d');
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id_pembedaan]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PembedaanCpns model.
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
     * Finds the PembedaanCpns model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PembedaanCpns the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PembedaanCpns::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
