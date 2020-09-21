<?php

namespace app\controllers;

use Yii;
use app\models\KategoriSetting;
use app\models\KategoriSettingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KategoriSettingController implements the CRUD actions for KategoriSetting model.
 */
class KategoriSettingController extends Controller
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
     * Lists all KategoriSetting models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KategoriSettingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single KategoriSetting model.
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
     * Creates a new KategoriSetting model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new KategoriSetting();

        if ($model->load(Yii::$app->request->post())) {

            $date = date('Y-m-d H:i:s');
            $id = \Yii::$app->user->getId();

            $model->status ='2';
            $model->created_id =$id;
            $model->created_date =$date;

            if($model->save()) {
                return $this->redirect(['view', 'id' => $model->id_kategori_setting]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing KategoriSetting model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post())) {

            $date = date('Y-m-d H:i:s');
            $id = \Yii::$app->user->getId();

            $model->modified_id = $id;
            $model->modified_date = $date;

            if($model->save()) {
                return $this->redirect(['view', 'id' => $model->id_kategori_setting]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing KategoriSetting model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $date = date('Y-m-d H:i:s');
        $id = \Yii::$app->user->getId();

        $model->status = '0';
        $model->deleted_id = $id;
        $model->deleted_date = $date;

        if($model->save()) {
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the KategoriSetting model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KategoriSetting the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KategoriSetting::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
