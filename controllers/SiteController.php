<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

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
                        'actions' => ['logout', 'index', 'dokter'],
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
        $query = "select
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
    public function actionNggaNemu($no_rm)
    {
        return $this->render('ngga-nemu', [
            'no_rm' => $no_rm
        ]);
    }
}
