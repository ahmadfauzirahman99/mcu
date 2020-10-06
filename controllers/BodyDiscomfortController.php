<?php
namespace app\controllers;
use Yii;
use app\widgets\App;
use app\models\User;
use app\models\Lampjaksa;
use app\models\UserBerkas;
use app\models\Formasi;
use app\models\FormasiSyarat;
use app\models\LoginForm;
use app\models\JenisPendidikan;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use PhpOffice\PhpSpreadsheet\IOFactory;
use app\models\DataPelayanan;
use app\models\PemeriksaanFisik;
use app\models\BodyDiscomfort;
use app\models\DataLayanan;
class BodyDiscomfortController extends Controller
{
   public $layout = 'main-body';
    public static $tidak_ada="Tidak Ada Keluhan";
    // public function behaviors()
    // {
    //     return [
    //         'access' => [
    //             'class' => AccessControl::className(),
    //             'rules' => [
    //                 [
    //                     'actions' => ['index','login','captcha','offline'],
    //                     'allow' => true,
    //                     'roles' => ['?','@'],
    //                 ],
    //                 [
    //                     'actions' => ['daftar'],
    //                     'allow' => true,
    //                     'matchCallback'=>function(){
    //                         if(!App::isRegClose()){
    //                             return true;
    //                         }
    //                         return false;
    //                     }
    //                 ],
    //                 [
    //                     'actions' => ['logout'],
    //                     'allow' => true,
    //                     'roles' => ['@'],
    //                 ],
    //                 [
    //                     'actions' => ['peserta','berkas','selesai','selesai-proses','file'],
    //                     'allow' => true,
    //                     'matchCallback'=>function(){
    //                         if(App::isPeserta()){
    //                             return true;    
    //                         }
    //                         return false;
    //                     }
    //                 ],
    //                 [
    //                     'actions' => ['peserta-save','get-formasi'],
    //                     'allow' => true,
    //                     'matchCallback'=>function(){
    //                         if(!App::isRegClose()){
    //                             if(App::isPeserta()){
    //                                 if(!App::isPesertaFinish()){
    //                                     return true;    
    //                                 }
    //                             }
    //                         }
    //                         return false;
    //                     }
    //                 ],
    //                 [
    //                     'actions' => ['berkas-upload'],
    //                     'allow' => true,
    //                     'matchCallback'=>function(){
    //                         if(App::isPeserta()){
    //                             if(!App::isRegClose()){
    //                                 if(!App::isPesertaFinish()){
    //                                     return true;    
    //                                 }
    //                             }else{
    //                                 if(App::isMakalahOpen()){
    //                                     if(Yii::$app->user->identity->u_lulus_reg=='1'){
    //                                         return true;
    //                                     }
    //                                 }
    //                             }
    //                         }
    //                         return false;
    //                     }
    //                 ],
    //             ],
    //             'denyCallback' => function ($rule, $action)
    //             {
    //                 $url=Yii::$app->urlManager->createUrl('/site');
    //                 return $this->redirect($url);
    //             }
    //         ],
    //         'verbs' => [
    //             'class' => VerbFilter::className(),
    //             'actions' => [
    //                 'index'=>['get'],
    //                 'daftar' => ['get','post'],
    //                 'login' => ['get','post'],
    //                 'peserta' => ['get'],
    //                 'peserta-save'=>['post'],
    //                 'berkas' => ['get','post'],
    //                 'berkas-upload'=>['post'],
    //                 'get-formasi' => ['post'],
    //                 'selesai'=>['get'],
    //                 'selesai-proses'=>['post'],
    //                 'file'=>['get'],
    //             ],
    //         ],
    //     ];
    // }
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
	public function beforeAction($action) 
	{ 
		$this->enableCsrfValidation = false; 
		return parent::beforeAction($action); 
	}
    public function actionIndex()
    {
        //return $this->render('index');
    }
    function actionSimpanbody()
    {
        // return json_encode(Yii::$app->request->post());exit;
        $this->enableCsrfValidation = false;
        if(Yii::$app->request->post()){

            //check variable satu-satu
            $no_0_depan=$_POST['no_0_depan']==""?self::$tidak_ada : $_POST['no_0_depan'];
            $no_1_depan=$_POST['no_1_depan']==""?self::$tidak_ada : $_POST['no_1_depan'];
            $no_2_depan=$_POST['no_2_depan']==""?self::$tidak_ada : $_POST['no_2_depan'];
            $no_3_depan=$_POST['no_3_depan']==""?self::$tidak_ada : $_POST['no_3_depan'];
            $no_4_depan=$_POST['no_4_depan']==""?self::$tidak_ada : $_POST['no_4_depan'];
            $no_5_depan=$_POST['no_5_depan']==""?self::$tidak_ada : $_POST['no_5_depan'];
            $no_6_depan=$_POST['no_6_depan']==""?self::$tidak_ada : $_POST['no_6_depan'];
            $no_7_depan=$_POST['no_7_depan']==""?self::$tidak_ada : $_POST['no_7_depan'];
            $no_8_depan=$_POST['no_8_depan']==""?self::$tidak_ada : $_POST['no_8_depan'];
            $no_9_depan=$_POST['no_9_depan']==""?self::$tidak_ada : $_POST['no_9_depan'];
            $no_10_depan=$_POST['no_10_depan']==""?self::$tidak_ada : $_POST['no_10_depan'];
            $no_11_depan=$_POST['no_11_depan']==""?self::$tidak_ada : $_POST['no_11_depan'];
            $no_12_depan=$_POST['no_12_depan']==""?self::$tidak_ada : $_POST['no_12_depan'];
            $no_13_depan=$_POST['no_13_depan']==""?self::$tidak_ada : $_POST['no_13_depan'];
            $no_14_depan=$_POST['no_14_depan']==""?self::$tidak_ada : $_POST['no_14_depan'];
            $no_15_depan=$_POST['no_15_depan']==""?self::$tidak_ada : $_POST['no_15_depan'];
            $no_16_depan=$_POST['no_16_depan']==""?self::$tidak_ada : $_POST['no_16_depan'];
            $no_17_depan=$_POST['no_17_depan']==""?self::$tidak_ada : $_POST['no_17_depan'];
            $no_0_belakang=$_POST['no_0_belakang']==""?self::$tidak_ada : $_POST['no_0_belakang'];
            $no_1_belakang=$_POST['no_1_belakang']==""?self::$tidak_ada : $_POST['no_1_belakang'];
            $no_2_belakang=$_POST['no_2_belakang']==""?self::$tidak_ada : $_POST['no_2_belakang'];
            $no_3_belakang=$_POST['no_3_belakang']==""?self::$tidak_ada : $_POST['no_3_belakang'];
            $no_4_belakang=$_POST['no_4_belakang']==""?self::$tidak_ada : $_POST['no_4_belakang'];
            $no_5_belakang=$_POST['no_5_belakang']==""?self::$tidak_ada : $_POST['no_5_belakang'];
            $no_6_belakang=$_POST['no_6_belakang']==""?self::$tidak_ada : $_POST['no_6_belakang'];
            $no_7_belakang=$_POST['no_7_belakang']==""?self::$tidak_ada : $_POST['no_7_belakang'];
            $no_8_belakang=$_POST['no_8_belakang']==""?self::$tidak_ada : $_POST['no_8_belakang'];
            $no_9_belakang=$_POST['no_9_belakang']==""?self::$tidak_ada : $_POST['no_9_belakang'];
            $no_10_belakang=$_POST['no_10_belakang']==""?self::$tidak_ada : $_POST['no_10_belakang'];
            $no_11_belakang=$_POST['no_11_belakang']==""?self::$tidak_ada : $_POST['no_11_belakang'];
            $no_12_belakang=$_POST['no_12_belakang']==""?self::$tidak_ada : $_POST['no_12_belakang'];
            $no_13_belakang=$_POST['no_13_belakang']==""?self::$tidak_ada : $_POST['no_13_belakang'];
            $no_14_belakang=$_POST['no_14_belakang']==""?self::$tidak_ada : $_POST['no_14_belakang'];
            $no_15_belakang=$_POST['no_15_belakang']==""?self::$tidak_ada : $_POST['no_15_belakang'];
            $no_16_belakang=$_POST['no_16_belakang']==""?self::$tidak_ada : $_POST['no_16_belakang'];
            $no_17_belakang=$_POST['no_17_belakang']==""?self::$tidak_ada : $_POST['no_17_belakang'];

            $cekada=BodyDiscomfort::find()->where(['no_rekam_medik'=>$_POST['no_rekam_medik']])->andWhere(['no_daftar'=>$_POST['no_daftar']]);
            $hitungada=$cekada->count();
            if($hitungada>0){
                // print_r( $cekada->one());exit;
                 $one=$cekada->one();
                 $one->no_rekam_medik=$_POST['no_rekam_medik'];
                 $one->no_daftar=$_POST['no_daftar'];
                 $one->no_0_depan=$no_0_depan;
                 $one->no_1_depan=$no_1_depan;
                 $one->no_2_depan=$no_2_depan;
                 $one->no_3_depan=$no_3_depan;
                 $one->no_4_depan=$no_4_depan;
                 $one->no_5_depan=$no_5_depan;
                 $one->no_6_depan=$no_6_depan;
                 $one->no_7_depan=$no_7_depan;
                 $one->no_8_depan=$no_8_depan;
                 $one->no_9_depan=$no_9_depan;
                 $one->no_10_depan=$no_10_depan;
                 $one->no_11_depan=$no_11_depan;
                 $one->no_12_depan=$no_12_depan;
                 $one->no_13_depan=$no_13_depan;
                 $one->no_14_depan=$no_14_depan;
                 $one->no_15_depan=$no_15_depan;
                 $one->no_16_depan=$no_16_depan;
                 $one->no_17_depan=$no_17_depan;
                 $one->no_0_belakang=$no_0_belakang;
                 $one->no_1_belakang=$no_1_belakang;
                 $one->no_2_belakang=$no_2_belakang;
                 $one->no_3_belakang=$no_3_belakang;
                 $one->no_4_belakang=$no_4_belakang;
                 $one->no_5_belakang=$no_5_belakang;
                 $one->no_6_belakang=$no_6_belakang;
                 $one->no_7_belakang=$no_7_belakang;
                 $one->no_8_belakang=$no_8_belakang;
                 $one->no_9_belakang=$no_9_belakang;
                 $one->no_10_belakang=$no_10_belakang;
                 $one->no_11_belakang=$no_11_belakang;
                 $one->no_12_belakang=$no_12_belakang;
                 $one->no_13_belakang=$no_13_belakang;
                 $one->no_14_belakang=$no_14_belakang;
                 $one->no_15_belakang=$no_15_belakang;
                 $one->no_16_belakang=$no_16_belakang;
                 $one->no_17_belakang=$no_17_belakang;
                 
                if ($one->save()) {
                     // echo "saved successfully.";
                     return $this->asJson([
                                'response' =>[
                                    "data" => null
                                ],
                                'metadata'=>[
                                    'message' => "Body Discomfort berhasil diedit",
                                    'code' => 200,
                                ]
                            ]);
                } else {
                     // echo "save failed.";
                      return $this->asJson([
                                'response' =>[
                                    "data" => null
                                ],
                                'metadata'=>[
                                    'message' => "Gagal disimpan",
                                    'code' => 404,
                                ]
                            ]);
                }
            }else{
                // print_r($_POST['no_0_depan']);exit;
                $modelnya = new BodyDiscomfort();
                $modelnya->no_rekam_medik=$_POST['no_rekam_medik'];
                $modelnya->no_daftar=$_POST['no_daftar'];
                $modelnya->no_0_depan=$no_0_depan;
                $modelnya->no_1_depan=$no_1_depan;
                $modelnya->no_2_depan=$no_2_depan;
                $modelnya->no_3_depan=$no_3_depan;
                $modelnya->no_4_depan=$no_4_depan;
                $modelnya->no_5_depan=$no_5_depan;
                $modelnya->no_6_depan=$no_6_depan;
                $modelnya->no_7_depan=$no_7_depan;
                $modelnya->no_8_depan=$no_8_depan;
                $modelnya->no_9_depan=$no_9_depan;
                $modelnya->no_10_depan=$no_10_depan;
                $modelnya->no_11_depan=$no_11_depan;
                $modelnya->no_12_depan=$no_12_depan;
                $modelnya->no_13_depan=$no_13_depan;
                $modelnya->no_14_depan=$no_14_depan;
                $modelnya->no_15_depan=$no_15_depan;
                $modelnya->no_16_depan=$no_16_depan;
                $modelnya->no_17_depan=$no_17_depan;
                $modelnya->no_0_belakang=$no_0_belakang;
                $modelnya->no_1_belakang=$no_1_belakang;
                $modelnya->no_2_belakang=$no_2_belakang;
                $modelnya->no_3_belakang=$no_3_belakang;
                $modelnya->no_4_belakang=$no_4_belakang;
                $modelnya->no_5_belakang=$no_5_belakang;
                $modelnya->no_6_belakang=$no_6_belakang;
                $modelnya->no_7_belakang=$no_7_belakang;
                $modelnya->no_8_belakang=$no_8_belakang;
                $modelnya->no_9_belakang=$no_9_belakang;
                $modelnya->no_10_belakang=$no_10_belakang;
                $modelnya->no_11_belakang=$no_11_belakang;
                $modelnya->no_12_belakang=$no_12_belakang;
                $modelnya->no_13_belakang=$no_13_belakang;
                $modelnya->no_14_belakang=$no_14_belakang;
                $modelnya->no_15_belakang=$no_15_belakang;
                $modelnya->no_16_belakang=$no_16_belakang;
                $modelnya->no_17_belakang=$no_17_belakang;

                if ($modelnya->save()) {
                     // echo "saved successfully.";
                     return $this->asJson([
                                'response' =>[
                                    "data" => null
                                ],
                                'metadata'=>[
                                    'message' => "Body Discomfort berhasil diinput",
                                    'code' => 200,
                                ]
                            ]);
                } else {
                     // echo "save failed.";
                      return $this->asJson([
                                'response' =>[
                                    "data" => null
                                ],
                                'metadata'=>[
                                    'message' => "Gagal disimpan",
                                    'code' => 404,
                                ]
                            ]);
                }
            }
            
        }
    }
    function actionForm()
    {
            //jika edit view nya
            $modelupdate=null;
            $detailJikaBaru=null;
            // if(isset($_GET["aksi"])){
                // if($_GET["aksi"]=="ubah"){
                if(isset($_GET["id"])){
                    $id=$_GET["id"];
                    // echo $id;exit;
                    $modelupdate = BodyDiscomfort::find()->where(['no_rekam_medik'=>$id])->one();
                    // echo "<pre>";var_dump($modelupdate);exit;

                    if($modelupdate==null){
                        $datalayanan = DataLayanan::find()->where(['no_rekam_medik'=>$id]);
                        $datalayananOne = $datalayanan->one();
                        $datalayananCount = $datalayanan->count();
                        if($datalayananCount>0){                            
                            $detailJikaBaru=["no_daftar"=>$datalayananOne->no_registrasi, "no_rekam_medik"=>$id];
                        }
                        // echo "<pre>";print_r($detailJikaBaru);exit;
                    }
                }
            // }

         $model = BodyDiscomfort::find()->all();
		 return $this->render('form',[
            'model'=>$model,
            'modelupdate'=>$modelupdate,
            'detailJikaBaru'=>$detailJikaBaru,
        ]);
    }
}
