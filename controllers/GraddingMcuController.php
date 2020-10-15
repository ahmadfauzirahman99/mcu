<?php

namespace app\controllers;

use Yii;
use app\models\GraddingMcu;
use app\models\SettingGlobal;
use app\models\GraddingMcuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\db\Exception;

/**
 * GraddingMcuController implements the CRUD actions for GraddingMcu model.
 */
class GraddingMcuController extends Controller
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
     * Lists all GraddingMcu models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GraddingMcuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

     /* Form Gradding */

     function actionFormGradding()
     {
         $req = Yii::$app->request;
         if ($req->isAjax) {
             $data = new SettingGlobal();
             $model = new GraddingMcu();
 
             $model->kode_debitur = '0129';
             $dataSetting = $data->getDataSettingGlobal();
 
             return $this->renderAjax('form-gradding', [
                 'model'=>$model,
                 'setting' => $dataSetting
             ]);
 
         } else {
             throw new Exception("Illegal access");
         }
     }
 
     function actionProcessGradding()
     {
         $req=Yii::$app->request;
         if($req->isAjax){

            ini_set("memory_limit", "8056M");
            ini_set('max_execution_time', 0);
 
             $Data = $_POST['GraddingMcu'];
 
             $model = new GraddingMcu();
             $DataGradding = $model->getDataGradding($Data['kode_debitur']);

             $success = false;
             if($DataGradding != Null) {
                 foreach($DataGradding as $d) {
                     $cek = $model->cekGradding($d['id_pelayanan'], $d['no_pasien'], $d['no_daftar']);

                     if($cek == 1) {
                         // Jika true lakukan update
                        if($this->updateGradding($d)) {
                            $success = true;
                        } else {
                            $result=['status'=>'false','msg'=>'Update Data Gradding Id Pelayanan : '.$d['id_pelayanan']];
                        }
                     } else if($cek == 0) {
                         // Jika false lakukan insert

                         if($this->insertGradding($d)) {
                            $success = true;
                         } else {
                            $result=['status'=>'false','msg'=>'Insert Data Gradding GAGAL Id Pelayanan : '.$d['id_pelayanan']];
                         }
                     }
                 }
             }

             if($success){
                $result=['status'=>'true','msg'=>'Proses Gradding BERHASIL'];
            }

            Yii::$app->response->format = Response::FORMAT_JSON;
            return $result;
         }
     }

     public function insertGradding($d)
     {
        
         $model = new GraddingMcu();

         $model->id_gradding = $model->getIdGradding();
         $model->id_data_pelayanan = $d['id_pelayanan'];
         $model->no_rekam_medik = $d['no_pasien'];
         $model->no_registrasi = $d['no_daftar'];
         $model->no_mcu = $d['no_mcu'];
         $model->kode_debitur = $d['kode_debitur'];
         $model->hasil = json_encode($d['hasil']);
         $model->status = '2'; // Status 2 : Aktif, Status 1 : Tidak Aktif, Status 0 : Dihapus
         $model->is_reset = '1'; // 1 : Dapat Diubah, 0 : Tidak Dapat Diubah
         $model->poin = $d['poin'];

         if($model->save()) {
             return true;
         } else {
            print_r($model->errors); 
         }
         return false;
     }

     public function updateGradding($d)
     {
         $model = GraddingMcu::find()
         ->andWhere(['id_data_pelayanan'=>$d['id_pelayanan'], 'no_rekam_medik'=> $d['no_pasien'], 'no_registrasi'=>$d['no_daftar']])
         ->one();

         $model->id_data_pelayanan = $d['id_pelayanan'];
         $model->no_rekam_medik = $d['no_pasien'];
         $model->no_registrasi = $d['no_daftar'];
         $model->no_mcu = $d['no_mcu'];
         $model->kode_debitur = $d['kode_debitur'];
         $model->hasil = json_encode($d['hasil']);
         $model->status = '2'; // Status 2 : Aktif, Status 1 : Tidak Aktif, Status 0 : Dihapus
         $model->is_reset = '1'; // 1 : Dapat Diubah, 0 : Tidak Dapat Diubah
         $model->poin = $d['poin'];

         if($model->save()) {
             return true;
         } else {
            print_r($model->errors); 
         }
         return false;

     }
 
     /* End  Form Gradding */

       /* Update Checked */
    public function actionUpdateCheck()
    {
        if (\Yii::$app->request->isAjax) {
            $Value = $_POST['checkedValue'];
            $Id = $_POST['id'];

            $model = $this->findModelGlobal($Id);

            if ($Value == 1) {
                $model->tampil = '0';
            } else if ($Value == 0) {
                $model->tampil = '1';
            }

            if ($model->save()) {

                $hasil = [
                    "code" => "200",
                    "value" => $model->tampil,
                    "msg" => "Data berhasil",
                ];
                echo json_encode($hasil);
                die();
            } else {

                $hasil = [
                    "code" => "400",
                    "msg" => "Data Gagal Disimpan",
                ];
                echo json_encode($hasil);
                die();
            }
        } else {
            throw new Exception("Illegal access");
        }
    }

    /**
     * Displays a single GraddingMcu model.
     * @param string $id
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
     * Creates a new GraddingMcu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GraddingMcu();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_gradding]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing GraddingMcu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_gradding]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing GraddingMcu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDeleteAll($id)
    {
        GraddingMcu::deleteAll(['kode_debitur' => $id]);

        return $this->redirect(['index']);
    }

    /**
     * Finds the GraddingMcu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return GraddingMcu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GraddingMcu::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function findModelGlobal($id)
    {
        if (($model = SettingGlobal::findOne(['id_global' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
