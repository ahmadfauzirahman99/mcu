<?php

namespace app\controllers;

use Yii;
use app\models\ItemSetting;
use app\models\ItemSettingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ItemSettingController implements the CRUD actions for ItemSetting model.
 */
class ItemSettingController extends Controller
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
     * Lists all ItemSetting models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ItemSettingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ItemSetting model.
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
     * Creates a new ItemSetting model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ItemSetting();

        if ($model->load(Yii::$app->request->post())) {

            $date = date('Y-m-d H:i:s');
            $id = \Yii::$app->user->getId();

            $model->status ='2';
            $model->created_id =$id;
            $model->created_date =$date;

            if($model->save()) {
                return $this->redirect(['view', 'id' => $model->id_item_setting]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ItemSetting model.
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
                return $this->redirect(['view', 'id' => $model->id_item_setting]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ItemSetting model.
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
     * Finds the ItemSetting model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ItemSetting the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ItemSetting::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
