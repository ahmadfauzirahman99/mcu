<?php

namespace app\controllers;

use app\models\DataLayanan;
use Yii;
use app\models\SpesialisPsikologi;
use app\models\SpesialisPsikologiSearch;
use Mpdf\Mpdf;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SpesialisPsikologiController implements the CRUD actions for SpesialisPsikologi model.
 */
class SpesialisPsikologiController extends Controller
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
     * Lists all SpesialisPsikologi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SpesialisPsikologiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SpesialisPsikologi model.
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
     * Creates a new SpesialisPsikologi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    
    public function actionPeriksa($id = null)
    {
        $id_cari = $id;

        if ($id_cari != null) {
            $pasien = DataLayanan::find()->where(['id_data_pelayanan' => $id_cari])->one();
            if (!$pasien) {
                return $this->redirect(['/site/ngga-nemu', 'id' => $id_cari]);
            }
            
            $model = SpesialisPsikologi::find()
            ->where(['no_rekam_medik' => $pasien->no_rekam_medik])
            ->andWhere(['no_daftar' => $pasien->no_registrasi])
            ->one();
            if (!$model)
                $model = new SpesialisPsikologi();
            $model->cari_pasien = $id_cari;
            $no_rm = $pasien->no_rekam_medik;
            $no_daftar = $pasien->no_registrasi;
        } else {
            $pasien = null;
            $no_rm = null;
            $no_daftar = null;
            $model = new SpesialisPsikologi();
        }

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
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
            'no_daftar' => $no_daftar,
            'pasien' => $pasien,
        ]);
    }
    
     public function actionCreate($id = null)
    {

        $id_cari = $id;

        if ($id_cari != null) {
            $pasien = DataLayanan::find()->where(['id_data_pelayanan' => $id_cari])->one();
            if (!$pasien) {
                return $this->redirect(['/site/ngga-nemu', 'id' => $id_cari]);
            }
            
            $model = SpesialisPsikologi::find()
            ->where(['no_rekam_medik' => $pasien->no_rekam_medik])
            ->andWhere(['no_daftar' => $pasien->no_registrasi])
            ->one();
            if (!$model)
                $model = new SpesialisPsikologi();
            $model->cari_pasien = $id_cari;
            $no_rm = $pasien->no_rekam_medik;
            $no_daftar = $pasien->no_registrasi;
        } else {
            $pasien = null;
            $no_rm = null;
            $no_daftar = null;
            $model = new SpesialisPsikologi();
        }

        if ($model->load(Yii::$app->request->post())) {

            $date = date('Y-m-d H:i:s');
            //$id = \Yii::$app->user->getId();

            //$model->created_id =$id;
            $model->created_at =$date;

            if($model->save()) {
                return $this->redirect(['view', 'id' => $model->id_spesialis_psikologi]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'no_rm' => $no_rm,
            'no_daftar' => $no_daftar,
            'pasien' => $pasien,
        ]);
    }

    /**
     * Updates an existing SpesialisPsikologi model.
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
     * Deletes an existing SpesialisPsikologi model.
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
     * Finds the SpesialisPsikologi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SpesialisPsikologi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SpesialisPsikologi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    // public function actionCetakPsikologi()
    // { 
        
    //     // $pegawai = new Pegawai();
    //     // $model = $pegawai->getPegawai($idpeg);

    //     $mpdf = new Mpdf();
    //     //$mpdf->AddPage('L');
    //     $mpdf->WriteHTML($this->renderPartial('print-psikologi' , [
    //         // 'model'=>$model, 
    //     ]));
        
    //     return $mpdf->Output();
    //     exit;
    // }

    public function actionCetak($no_rm, $no_daftar)
    {
        $model = SpesialisPsikologi::findOne(['no_rekam_medik' => $no_rm, 'no_daftar' => $no_daftar]);

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
        $mpdf->Output('Spesialis Psikologi ' . $model['no_rekam_medik'] . '.pdf', 'I');
        exit;
    }
}
