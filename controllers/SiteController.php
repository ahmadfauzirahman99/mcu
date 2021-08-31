<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\DataLayanan;
use app\models\MasterPemeriksaanFisik;
use app\models\spesialis\McuSpesialisAudiometri;
use app\models\spesialis\McuSpesialisGigi;
use app\models\spesialis\McuSpesialisMata;
use app\models\spesialis\McuSpesialisThtBerbisik;
use app\models\spesialis\McuSpesialisThtGarpuTala;
use app\models\PembedaanCpns;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'dokter', 'test', 'item-mcu', 'ubah-semua-pemeriksaan','perawat','test-dump'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {



        // if ($data['kodejenis'] == 1) {
        //     //dokter umum
        //     $this->layout = 'd-umum';
        // }

        // if ($data['kodejenis'] == 2) {
        //     //dokter gigi
        //     $this->layout = 'd-gigi';
        // }

        // if ($data['kodejenis'] == 12) {
        //     //DOKTER SPESIALIS Ilmu Kesehatan THT Kl  (Sp.THT-KL)
        //     $this->layout = 'd-tht';
        // }

        return $this->render('index');
    }



    // data dokter 
    public function actionDokter()
    {
        $query =
         "select
        tp.id_nip_nrp,
        tp.nama_lengkap,
        sr.kode as koderumpun,
        sr.nama as rumpun,
        ssr.kode as kodesubrumpun,
        ssr.nama as subrumpun,
        sj.kode as kodejenis,
        sj.nama as jenis
    from
        pegawai.tb_pegawai tp
        --pegawai.tb_pegawai tp
    inner join pegawai.tb_riwayat_penempatan trp on
        trp.id_nip_nrp = tp.id_nip_nrp
    inner join pegawai.dm_sdm_rumpun sr on
        sr.kode = trp.sdm_rumpun
    inner join pegawai.dm_sdm_sub_rumpun ssr on
        ssr.kode = trp.sdm_sub_rumpun
    inner join pegawai.dm_sdm_jenis sj on
        sj.kode = trp.sdm_jenis
    where
        sr.kode = '1'";

        $ex = Yii::$app->db->createCommand($query)->queryAll();
        return $this->render('dokter', ['data' => $ex]);
    }

    public function actionPerawat()
    {
 $query =
         "select
        tp.id_nip_nrp,
        tp.nama_lengkap,
        sr.kode as koderumpun,
        sr.nama as rumpun,
        ssr.kode as kodesubrumpun,
        ssr.nama as subrumpun,
        sj.kode as kodejenis,
        sj.nama as jenis
    from
        pegawai.tb_pegawai tp
        --pegawai.tb_pegawai tp
    inner join pegawai.tb_riwayat_penempatan trp on
        trp.id_nip_nrp = tp.id_nip_nrp
    inner join pegawai.dm_sdm_rumpun sr on
        sr.kode = trp.sdm_rumpun
    inner join pegawai.dm_sdm_sub_rumpun ssr on
        ssr.kode = trp.sdm_sub_rumpun
    inner join pegawai.dm_sdm_jenis sj on
        sj.kode = trp.sdm_jenis
    where
        sr.kode = '3'";

        $ex = Yii::$app->db->createCommand($query)->queryAll();
        return $this->render('perawat', ['data' => $ex]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    //------------------------------------------------
    public function actionErrorni()
    {
        return $this->render('errorni');
    }
    public function actionNggaNemu($id)
    {
        return $this->render('ngga-nemu', [
            'id' => $id
        ]);
    }

    public function actionTest()
    {
        $dataPemeriksaan = MasterPemeriksaanFisik::find()->where('no_rekam_medik is not null')->all();

        echo '<pre>';
        foreach ($dataPemeriksaan as $item) {
            $dataPelayanan = DataLayanan::find()->where(['no_rekam_medik' => $item->no_rekam_medik])
                ->andWhere(['not', ['no_rekam_medik' => null]])
                ->andWhere(['not', ['no_registrasi' => null]])
                ->one();

            // var_dump($dataPelayanan['no_rekam_medik']);
            $id_regis = $dataPelayanan['no_registrasi'];
            $id_da = $dataPelayanan['no_rekam_medik'];

            Yii::$app->db->createCommand("UPDATE mcu.m_pemeriksaan_fisik SET no_rekam_medik='$item->no_rekam_medik' 
            WHERE no_daftar='{$id_regis}'")->execute();
            // var_dump($id_da == $item->no_rekam_medik);
        }

        echo "berhasil";
        exit();
    }

    public function actionItemMcu($id = null)
    {
        if ($id != null) {
            $model = DataLayanan::findOne(['id_data_pelayanan' => $id]);
            if (!$model) {
                return $this->redirect(['/site/ngga-nemu', 'id' => $id]);
            }
        } else {
            $model = new DataLayanan();
        }
        return $this->render('item-mcu', ['model' => $model]);
    }

    public function actionUbahSemuaPemeriksaan()
    {
        $p = Yii::$app->request->post();
        $type = $p['ty'];
        $rm = $p['dt'];
        $t = "Tidak Melanjutkan Pemeriksaan";
        if ($type == 'fisik') {
            $model = MasterPemeriksaanFisik::find()->where(['no_rekam_medik' => $rm])->one();
            $model->status_pemeriksaan_fisik = $t;
        }

        if ($type == 'mata') {
            $model = McuSpesialisMata::find()->where(['no_rekam_medik' => $rm])->one();
            $model->status_pemeriksaan = $t;
        }


        if ($type == 'thtberbisik') {
            $model = McuSpesialisThtBerbisik::find()->where(['no_rekam_medik' => $rm])->one();
            $model->status_pemeriksaan = $t;
        }

        if($type == 'thtaudio'){
            $model = McuSpesialisAudiometri::find()->where(['no_rekam_medik' => $rm])->one();
            $model->status_pemeriksaan = $t;
        }

        if($type == 'thtgarputala'){
            $model = McuSpesialisThtGarpuTala::find()->where(['no_rekam_medik' => $rm])->one();
            $model->status_pemeriksaan = $t;
        }

        if($type == 'gigi'){
            $model = McuSpesialisGigi::find()->where(['no_rekam_medik' => $rm])->one();
            $model->status_pemeriksaan = $t;
        }

        



        if ($model->save()) {
            return $this->writeResponse(true, "Berhasil Merubah Data <i>{$model->no_rekam_medik}</i>");
        } else {
            return $this->writeResponse(false, "Tidak Berhasil Merubah Data");
        }
    }

    function writeResponse($condition, $msg = null, $data = null)
    {
        $_res = new \stdClass();
        $_res->con = $condition == true ? true : false;
        $_res->msg = $msg;
        $_res->results = $data;
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        // $response = new \Phalcon\Http\Response();
        // return $response->setContent(json_encode($_res));
        return $_res;
    }

    public function actionTestDump()
    {
        $data = DataLayanan::find()->where(['kode_debitur' =>'0129'])->andWhere(['not in','no_rekam_medik',['01051168','01051149','01051132','01051132']])->all();
        foreach($data as $item){
                    $model = new PembedaanCpns();

            $model->no_rekam_medik = $item->no_rekam_medik;
            $model->pilhan_terima_jabatan = "A";
            $model->status = "tidak dengan kelonggaran";
            $model->save();
        }
        // exit();
    }
}
