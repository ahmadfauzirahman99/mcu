<?php

namespace app\controllers;

use Yii;
use app\models\McuSettingManualLab;
use app\models\SettingManualLabSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * SettingManualLabController implements the CRUD actions for McuSettingManualLab model.
 */
class SettingManualLabController extends Controller
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
     * Lists all McuSettingManualLab models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SettingManualLabSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single McuSettingManualLab model.
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
     * Creates a new McuSettingManualLab model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new McuSettingManualLab();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_manual]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing McuSettingManualLab model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_manual]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing McuSettingManualLab model.
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

    /* Refresh Manual */
    public function actionRefreshManual()
    {
        if(\Yii::$app->request->isAjax) {
            $NoPasien = $_POST['NoPasien'];
            $NoRegistrasi = $_POST['NoRegistrasi'];

            $data = McuSettingManualLab::find()
                ->andWhere(['setting_manual_lab.no_pasien'=>$NoPasien])
                ->andWhere(['setting_manual_lab.no_registrasi'=>$NoRegistrasi])
                ->andWhere(['setting_manual_lab.status'=>'2'])
                ->joinWith(['item'])
                ->orderBy('setting_manual_lab.id_manual')
                ->asArray()
                ->all();

            $datamanual ='';
            if($data != Null) {
                foreach ($data as $d){

                    if($d['status']==2) {
                        $Status = '<span class="badge badge-success">Aktif</span>';
                    } else  if($d['status']==1) {
                        $Status = '<span class="badge badge-warning">Tidak Aktif</span>';
                    } else {
                        $Status = '<span class="badge badge-error"> </span>';
                    }

                    $datamanual .=   '
                    <tr>
                        <td>'.$d['item']['nama_item_lab'].'</td>
                        <td>'.$d['kondisi'].'</td>
                        <td>'.$d['nilai_manual'].'</td>
                        <td>'.$Status.'</td>
                        <td><center><button type="button" id="'.$d['id_manual'].'" class="btn ink-reaction btn-info"  data-toggle="tooltip"  data-placement="bottom" data-original-title="Ubah Data" style="cursor: pointer" onclick="alert(id)"><i class="fa fa-trash"></i></button></center></td>
                    </tr>
                    ';
                }
            } else {
                $datamanual .=   '
                <tr>
                    <td colspan="5"><center><span class="badge badge-info"> Tidak Ada Data Manual, Data Setting Hasil Merujuk ke Setting Global </span></center></td>
                </tr>
                ';
            }

            $hasil=[
                "code"=>"200",
                "msg"=>"Data berhasil",
                "datamanual"=>$datamanual,
            ];
            echo json_encode($hasil);
            die();

        } else {
            throw new Exception("Illegal access");
        }

    }
    /* End Refresh Manual */

    /* Form Input */

    function actionFormInput()
    {
        $req = Yii::$app->request;
        if ($req->isAjax) {
            $NoPasien = $req->post('NoPasien');
            $NoRegistrasi = $req->post('NoRegistrasi');
            $NamaPasien = $req->post('NamaPasien');

            $model = new McuSettingManualLab();

            $model->no_pasien = $NoPasien;
            $model->no_registrasi = $NoRegistrasi;

            return $this->renderAjax('form-input', [
                'model'=>$model,
                'namapasien'=>$NamaPasien
            ]);

        } else {
            throw new Exception("Illegal access");
        }
    }

    function actionSaveInput()
    {
        $req=Yii::$app->request;
        if($req->isAjax){

            $Data = $_POST['McuSettingManualLab'];

            $IdUser = \Yii::$app->user->getId();

            $model = new McuSettingManualLab();
            $Date = date("Y-m-d");
            $IdManual = $model->getIdManual($Date);

            $model->id_manual =  $IdManual;
            $model->no_pasien =  $Data['no_pasien'];
            $model->no_registrasi =  $Data['no_registrasi'];
            $model->id_item_lab =  $Data['id_item_lab'];
            $model->kondisi =  $Data['kondisi'];
            $model->nilai_manual =  $Data['nilai_manual'];
            $model->status = '2';

            if($model->validate()){
                if($model->save(false)){
                    $result=['status'=>'true','msg'=>'Input Manual BERHASIL disimpan'];
                }else{
                    $result=['status'=>'false','msg'=>'Input Manual GAGAL disimpan'];
                }
            }else{
                $result=['status'=>'false','msg'=>$model->errors];
            }
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $result;
        }
    }

    /* End  Form Input */

    /**
     * Finds the McuSettingManualLab model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return McuSettingManualLab the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = McuSettingManualLab::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
