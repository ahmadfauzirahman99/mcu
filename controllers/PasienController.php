<?php

namespace app\controllers;

use app\models\Anamnesis;
use Yii;
use app\models\DataLayanan;
use app\models\KategoriKuisioner;
use app\models\MasterPemeriksaanFisik;
use app\models\PasienSearch;
use app\models\UserKusionerBiodata;
use app\models\UserRegister;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PasienController implements the CRUD actions for DataLayanan model.
 */
class PasienController extends Controller
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
     * Lists all DataLayanan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PasienSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DataLayanan model.
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
     * Creates a new DataLayanan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DataLayanan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_data_pelayanan]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing DataLayanan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $userRegister = UserRegister::findOne(['u_rm' => $model->no_rekam_medik]);


        // kuisioner sosial
        $model_biodata_tmp = UserKusionerBiodata::find()->where(['ukb_user_id' => $userRegister->u_id])->orderBy(['ukb_created_at' => SORT_DESC])->limit(1)->one();
        $model_biodata_tmp->ukb_user_id = $userRegister->u_id;


        if ($model_biodata_tmp->isNewRecord) {
            $model_biodata_tmp->is_sebelum = 'n';
            if ($userRegister->u_pekerjaan == '011') {
                $model_biodata_tmp->is_sekarang = 'n';
            } else {
                $model_biodata_tmp->is_sekarang = 'y';
                $model_biodata_tmp->ukb_krj_skrg = $userRegister->u_pekerjaan_nama;
                $model_biodata_tmp->ukb_krj_skrg_perusahaan = $userRegister->u_alamat_pekerjaan;
            }
            $model_biodata_tmp->is_dituju = 'n';
            if ($userRegister->u_jenis_mcu_id == 1) { //jika pre employee, cpns=>pns, magang=>tetap, maka pekerjaan dituju y
                $model_biodata_tmp->is_dituju = 'y';
            }
        } else {
            $model_biodata_tmp->is_sebelum = 'n';
            $model_biodata_tmp->is_sekarang = 'n';
            $model_biodata_tmp->is_dituju = 'n';
            if ($model_biodata_tmp->ukb_krj_sebelum != NULL) {
                $model_biodata_tmp->is_sebelum = 'y';
            }
            if ($model_biodata_tmp->ukb_krj_skrg != NULL) {
                $model_biodata_tmp->is_sekarang = 'y';
            }
            if ($model_biodata_tmp->ukb_krj_dituju != NULL) {
                $model_biodata_tmp->is_dituju = 'y';
            }
        }

        // kuisioner penyakit
        $kuisionePenyakit = KategoriKuisioner::find()->where('kk_id != 4 and kk_id != 5');
        if ($userRegister->u_jkel == 'L') {
            $kuisionePenyakit->andWhere('kk_id != 3');
        }


        // kategori kuisioner cpns
        $kategori_kuisioner_cpns = KategoriKuisioner::find()->where('kk_id = 5')->asArray()->limit(1)->all();


        $kuisionePenyakit = $kuisionePenyakit->asArray()->all();


        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_data_pelayanan]);
        }

        return $this->render('update', [
            'model' => $model,
            'userRegister' => $userRegister,
            'model_biodata_tmp' => $model_biodata_tmp,
            'kuisionePenyakit' => $kuisionePenyakit,
            'kategori_kuisioner_cpns' => $kategori_kuisioner_cpns
        ]);
    }

    /**
     * Deletes an existing DataLayanan model.
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

    /**
     * Finds the DataLayanan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return DataLayanan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DataLayanan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionAnam($no_rm, $no_daftar)
    {

        $dataUser = DataLayanan::find()->where(['no_rekam_medik' => $no_rm, 'no_registrasi' => $no_daftar])->one();
        $master_pemeriksaan_fisik = MasterPemeriksaanFisik::findOne(['no_rekam_medik' => $no_rm, 'no_daftar' => $no_daftar]);

        if (is_null($master_pemeriksaan_fisik)) {
            $master_pemeriksaan_fisik = new MasterPemeriksaanFisik();
        }
        $anamnesis = Anamnesis::findOne(['nomor_rekam_medik' => $no_rm, 'no_daftar' => $no_daftar]);

        if (is_null($anamnesis)) {
            $anamnesis = new Anamnesis();
        }
        return $this->render(
            '_anam',
            [
                'model' => $master_pemeriksaan_fisik,
                'anamnesis' => $anamnesis,
                'no_rm' => $no_rm,
                'no_daftar' => $no_daftar,
                'dataUser' => $dataUser
            ]
        );
    }
}
