<?php
namespace app\controllers;
use Yii;
use app\widgets\App;
use app\models\User;
use app\models\Lampjaksa;
use app\models\Validasirekap;
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
class LampjaksaController extends Controller
{
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
    public function actionIndex()
    {
        return $this->render('index');
    }
    function actionForm()
    {
        $model = new Lampjaksa;
        $model->scenario="daftar";
        $req=Yii::$app->request;
		// echo"<pre>";print_r($req->post());exit;
        if(Yii::$app->request->post()){
            $model->load($req->post());
				// $model->u_password=Yii::$app->getSecurity()->generatePasswordHash($model->u_password);
				$jlhRecord = Lampjaksa::find()
				->where(['no_mr' => $model->no_mr])
				;
				// print_r($jlhRecord->one()->kode);exit;
				if ($jlhRecord->count()>0){
					// $updatemodel = Lampjaksa::findOne("22");
					$updatemodel = Lampjaksa::findOne($jlhRecord->one()->kode);
					$updatemodel->scenario="daftar";
					// $updatemodel->dokter_pemeriksa="nyamsz";
					$updatemodel->load(Yii::$app->request->post());
					// $updatemodel->validate();
					if($updatemodel->save(false)){						
						Yii::$app->session->setFlash('success','Data berhasil diedit');
					}
					// print_r("udah ada");exit;
				}else{
					$saveInsert=$model->save(false);
					if($saveInsert){
						Yii::$app->session->setFlash('success','Data berhasil diinput');
						//return $this->redirect(['login']);
					}
					// print_r($saveInsert);exit;
				}
        }
		// exit;
        return $this->render('form',[
            'model'=>$model,
        ]);
    }
	 
	public function actionCariPasien(){	
		date_default_timezone_set('Asia/Jakarta');
        $req=Yii::$app->request;	
		// return $this->asJson([$req->post());	
        if($req->isAjax){
            $nomr=$req->post()["mr"];
            // $nomr='2';
            if(empty($nomr)){
                return $this->asJson([
                    'response' =>[
                        "data" => null
                    ],
                    'metadata'=>[
                        'message' => "No. MR Harus Diisi",
                        'code' => 200,
                    ]
                ]);
            }
            $nomr=sprintf('%08d',$nomr);
			$tgl_mulai=date("Y-m-d")." 00:00:01";
			$tgl_sampai=date("Y-m-d")." 23:59:59";
			
   //          $simrs_pasien=\Yii::$app->db_sqlsrv->createCommand("
			// SELECT RP.NO_DAFTAR, 
			// 		PA.NOIDENTITAS,PA.NO_PASIEN,PA.NAMA,ALAMAT,PA.PROPINSI,PA.KABUPATEN,PA.KECAMATAN,PA.NO_HP,PA.NO_TELP,PA.TP_LAHIR,PA.TGL_LAHIR,PA.PEKERJAAN,PA.JENIS_KEL,
			// 		CASE 
			// 		WHEN PA.JENIS_KEL='L' THEN 'Laki-laki'
			// 		WHEN PA.JENIS_KEL='P' THEN 'Perempuan'
			// 		ELSE 'Tidak Diketahui'
			// 		END AS JENIS_KEL_TEXT,
			// 		PA.STATUSWN,
			// 		CASE WHEN PA.STATUSWN=1 THEN 'WNI'
			// 		WHEN PA.STATUSWN=2 THEN 'WNA'
			// 		ELSE 'Tidak Diketahui'
			// 		END AS STATUSWN_TEXT,
			// 		CAST(ROUND(DATEDIFF([DAY], PA.TGL_LAHIR, GETDATE()) / (12 * 30.4), 0, 1) AS INTEGER) AS UMURTH, 
			// 		CAST(ROUND((DATEDIFF([DAY], PA.TGL_LAHIR, GETDATE()) - ROUND(DATEDIFF([DAY], PA.TGL_LAHIR, GETDATE()) / (12 * 30.4), 0, 1) * 365) / 30.4, 0, 1) AS INTEGER) AS UMURBL, 
			// 		CAST(ROUND((DATEDIFF([DAY], PA.TGL_LAHIR, GETDATE()) - ROUND(DATEDIFF([DAY], PA.TGL_LAHIR, GETDATE()) / (12 * 30.4), 0, 1) * 365) - ROUND((DATEDIFF([DAY], PA.TGL_LAHIR, GETDATE()) - ROUND(DATEDIFF([DAY], PA.TGL_LAHIR, GETDATE()) / (12 * 30.4), 0, 1) * 365) / 30.4, 0, 1) * 30.4, 0) AS INTEGER) AS UMURHR,
			// 		PA.KODEPROP,PA.KODEKAB,PA.KODEKEC
			// 	FROM RAWATPOLI RP
			// 	INNER JOIN PASIEN PA ON PA.NO_PASIEN=RP.NO_PASIEN
			// 	WHERE
			// 	RP.NO_PASIEN=:NOMR AND
			// 	RP.KD_INST='3902' --UNIT MCU RSUD
			// 	AND RP.TANGGAL>=:start AND RP.TANGGAL<=:end
   //          ",[':NOMR'=>$nomr,':start'=>$tgl_mulai,':end'=>$tgl_sampai])
   //          // ->bindValue(':NOMR', $nomr)
   //          ->queryOne();

			// echo "<pre>";print_r($simrs_pasien["NO_DAFTAR"]);exit;
			
			$datapelayanan = DataPelayanan::findOne(['no_rekam_medik'=>$nomr]);
			// print_r($datapelayanan);exit;
			$pemeriksaanfisik = PemeriksaanFisik::findOne(['no_rekam_medik'=>$nomr]);
			// var_dump($pemeriksaanfisik);exit;
            //JIKA EDIT
            
            // if($datapelayanan){
                $jlhRecord = Lampjaksa::find()
                    // ->where(['no_daftar' => $simrs_pasien["NO_DAFTAR"]])
                    ->where(['no_mr' => $nomr])
                    ;
                // print_r($jlhRecord->one()->kode);exit;
				// print_r($jlhRecord->count());exit;
			// }
				
            $simrs_pasien=array();
            $simrs_pasien['pemeriksaanfisik']=null;           
			$simrs_pasien['update']=null;			
			$simrs_pasien['pasien']=null;
			if($simrs_pasien){
				if ($jlhRecord->count()>0){ //JIKA EDIT
					// $updatemodel = Lampjaksa::findOne("22");
					$updatemodel = Lampjaksa::findOne($jlhRecord->one()->kode)->toArray();
					// echo "<pre>";print_r($updatemodel);exit;
					// $updatemodel->dokter_pemeriksa
					$simrs_pasien['update']=$updatemodel;
				}
			}
		
            if($simrs_pasien){
                $simrs_pasien['pasien']=$datapelayanan;
            }
            if($simrs_pasien){
				$simrs_pasien['pemeriksaanfisik']=$pemeriksaanfisik;
            }
            		
            return $this->asJson([
                'response' =>[
                    "data" => [
                        'simrs'=>$simrs_pasien,
                    ]
                ],
                'metadata'=>[
                    'message' => "Data Sukses",
                    'code' => 200,
                ]
            ]);
        }
        return false;
    }
    function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['index']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()){
			// if(Yii::$app->user->identity->u_level=='2'){
			// 	Yii::$app->user->logout();
			// 	Yii::$app->session->setFlash('error','Maaf tidak bisa login untuk sementara');
			// 	return $this->redirect(['/']);
			// }
            $up = User::find()->where(['u_id'=>Yii::$app->user->identity->u_id])->limit(1)->one();
            $up->u_last_login=date('Y-m-d H:i:s');
            $up->save(false);
            return $this->redirect(['index']);
        }
        return $this->render('login',[
            'model'=>$model
        ]);
    }
    function actionPeserta()
    {
        $model = User::find()->where(['u_id'=>Yii::$app->user->identity->u_id])->limit(1)->one();
        $model->scenario="peserta";
        $jenis_pendidikan=JenisPendidikan::all();
        $formasi=[];
        if($model->u_formasi_pendidikan_id!=NULL){
            $formasi=Formasi::allByJenis($model->u_formasi_pendidikan_id);
        }
        $isRegClose=false;
        if($model->u_finish_reg=='1' || App::isRegClose()){   
            $isRegClose=true;
        }
        return $this->render('peserta',[
            'model'=>$model,
            'jenis_pendidikan'=>$jenis_pendidikan,
            'formasi'=>$formasi,
            'isRegClose'=>$isRegClose,
        ]);
    }
    function actionPesertaSave()
    {
        $req=Yii::$app->request;
        if($req->isAjax){
            $model = User::find()->where(['u_id'=>Yii::$app->user->identity->u_id])->limit(1)->one();
            $model->old_formasi=$model->u_formasi_id;
            $model->old_jalur_perawat=$model->u_jalur_perawat;
            $model->scenario="peserta";
            $model->load($req->post());
            if($model->savePeserta()){
                $result=['status'=>true,'msg'=>'Data berhasil disimpan'];
            }else{
                $result=['status'=>false,'msg'=>$model->error_msg];
            }
            return $this->asJson($result);
        }
    }
    function actionGetFormasi()
    {
        $req=Yii::$app->request;
        if($req->isAjax){
            $id=$req->post('id');
            $data=Formasi::allByJenis($id);
            return $this->asJson(['data'=>$data]);
        }
    }
    function actionBerkas()
    {
        $user_id=Yii::$app->user->identity->u_id;
        $user = User::find()->select('u_formasi_pendidikan_id,u_formasi_id,u_finish_reg,u_jalur_perawat,u_lulus_reg')->where(['u_id'=>$user_id])->asArray()->limit(1)->one();
        if($user['u_formasi_pendidikan_id']==NULL || $user['u_formasi_id']==NULL){
            Yii::$app->session->setFlash('error','Silahkan lengkapi data lamaran anda terlebih dahulu');
            return $this->redirect(['peserta']);
        }
        $syarat_berkas=FormasiSyarat::find()->select('fs_id,fs_formasi_id,fs_jenis_berkas_id,jb_nama,jb_ket')->joinWith(['jenisBerkas'],false)
        ->with([
            'userBerkas'=>function($q) use($user_id){
                $q->andWhere(['ub_user_id'=>$user_id]);
            }
        ])->where(['fs_formasi_id'=>$user['u_formasi_id']])->asArray()->all();
        $isRegClose=false;
        if($user['u_finish_reg']=='1' || App::isRegClose()){   
            $isRegClose=true;
        }
        return $this->render('berkas',[
            'user'=>$user,
            'syarat_berkas'=>$syarat_berkas,
            'isRegClose'=>$isRegClose,
        ]);
    }
    function actionBerkasUpload()
    {
        $req=Yii::$app->request;
        if($req->isAjax){
            $id=$req->post('id');
            $file=UploadedFile::getInstanceByName('berkas');
            $user_id=Yii::$app->user->identity->u_id;

            $model = UserBerkas::find()->where(['ub_user_id'=>$user_id,'ub_formasi_syarat_id'=>$id])->limit(1)->one();
            if($model==NULL){
                $model = new UserBerkas();
                $model->ub_user_id=$user_id;
                $model->ub_formasi_syarat_id=$id;
            }else{
                $model->tmp_old_file=$model->ub_berkas;
            }
            $model->tmp_file=$file;
            if($model->saveBerkas()){
                $result=['status'=>true,'msg'=>'Berkas berhasil diupload','id'=>$model->ub_formasi_syarat_id];
            }else{
                $result=['status'=>false,'msg'=>$model->msg];
            }
            return $this->asJson($result);
        }
    }
    function actionFile($data)
    {
        $user_id=Yii::$app->user->identity->u_id;
        $model = UserBerkas::find()->where(['ub_user_id'=>$user_id,'ub_formasi_syarat_id'=>$data])->asArray()->limit(1)->one();
        if($model!=NULL){
            return Yii::$app->response->sendFile(Yii::$app->params['storage'].$model['ub_berkas'], $model['ub_berkas'], ['inline'=>true]);
        }
        Yii::$app->session->setFlash('error','Berkas tidak ditemukan');
        return $this->redirect(['index']);
    }
    function actionSelesai()
    {
        return $this->render('selesai');
    }
    function actionSelesaiProses()
    {
        $req=Yii::$app->request;
        if($req->isAjax){
            $model = User::find()->where(['u_id'=>Yii::$app->user->identity->u_id])->limit(1)->one();
            $model->u_finish_reg='1';
            $model->u_finish_reg_at=date('Y-m-d H:i:s');
            $model->save(false);
            Yii::$app->session->setFlash('success','Pendaftaran sudah selesai');
            return $this->asJson(['status'=>true]);
        }
    }
    function actionLogout()
    {
        Yii::$app->user->logout();
        Yii::$app->session->setFlash('success','Anda berhasil logout');
        return $this->redirect(['login']);
    }
    function actionOffline()
    {
        return $this->render('offline');
    }
	
	public function actionSimpanValidasi(){
		date_default_timezone_set('Asia/Jakarta');
        $req=Yii::$app->request;	
		$id_m_pemeriksaan_fisik=$req->post()['id_m_pemeriksaan_fisik'];//["mr"];
		$no_rekam_medik=$req->post()['no_rekam_medik'];//["mr"];
		$scorenya=$req->post()['scorenya'];//["mr"];
		$ketnya=$req->post()['ketnya'];//["mr"];
        if($req->isAjax){
            // $nomr=$req->post()["mr"];
            $nomr=$req->post()['no_rekam_medik'];
            // $nomr='2';
            if($scorenya==""){
                return $this->asJson([
                    'response' =>[
                        "data" => null
                    ],
                    'metadata'=>[
                        'message' => "Inputan Score kosong",
                        'code' => 300,
                    ]
                ]);
            }
			// exit;
			//YAA
			$model = new Validasirekap;
			$model->scenario="daftar";
			// $req=Yii::$app->request;
			// echo"<pre>";print_r($req->post());exit;
			if(Yii::$app->request->post()){
				// $model->load($req->post());
					// $model->u_password=Yii::$app->getSecurity()->generatePasswordHash($model->u_password);
					$jlhRecord = Validasirekap::find()
					->where(['no_rekam_medik' => $no_rekam_medik])
					->andWhere(['id_m_pemeriksaan_fisik' => $id_m_pemeriksaan_fisik])
					;
					// print_r($jlhRecord->one()->kode);exit;
					if ($jlhRecord->count()>0){
						// $updatemodel = Lampjaksa::findOne("22");
						$updatemodel = Validasirekap::findOne($jlhRecord->one()->id_validasi);
						$updatemodel->scenario="daftar";
						// $updatemodel->dokter_pemeriksa="nyamsz";
						$updatemodel->no_rekam_medik=$no_rekam_medik;
						$updatemodel->id_m_pemeriksaan_fisik=$id_m_pemeriksaan_fisik;
						$updatemodel->score=$scorenya;
						$updatemodel->ket=$ketnya;
						// $updatemodel->validate();
						if($updatemodel->save(false)){						
							// Yii::$app->session->setFlash('success','Data berhasil diedit');
							 return $this->asJson([
								'response' =>[
									"data" => null
								],
								'metadata'=>[
									'message' => "Scoring berhasil diedit",
									'code' => 200,
								]
							]);
						}
						// print_r("udah ada");exit;
					}else{
						$model->no_rekam_medik=$no_rekam_medik;
						$model->id_m_pemeriksaan_fisik=$id_m_pemeriksaan_fisik;
						$model->score=$scorenya;
						$model->ket=$ketnya;
						$saveInsert=$model->save(false);
						if($saveInsert){							
							 return $this->asJson([
								'response' =>[
									"data" => null
								],
								'metadata'=>[
									'message' => "Scoring berhasil diinput",
									'code' => 200,
								]
							]);
							// Yii::$app->session->setFlash('success','Data berhasil diinput');
							//return $this->redirect(['login']);
						}
						// print_r($saveInsert);exit;
					}
			}
			exit;
			// return $this->render('form',[
				// 'model'=>$model,
			// ]);
								
								// $nomr=sprintf('%08d',$nomr);
								// $tgl_mulai=date("Y-m-d")." 00:00:01";
								// $tgl_sampai=date("Y-m-d")." 23:59:59";
						
								// $datapelayanan = DataPelayanan::findOne(['no_rekam_medik'=>$nomr]);
								// // print_r($datapelayanan);exit;
								// $pemeriksaanfisik = PemeriksaanFisik::findOne(['no_rekam_medik'=>$nomr]);
								// // var_dump($pemeriksaanfisik);exit;
								// //JIKA EDIT
								
								// // if($datapelayanan){
									// $jlhRecord = Lampjaksa::find()
										// // ->where(['no_daftar' => $simrs_pasien["NO_DAFTAR"]])
										// ->where(['no_mr' => $nomr])
										// ;
									// // print_r($jlhRecord->one()->kode);exit;
									// // print_r($jlhRecord->count());exit;
								// // }
									
								// $simrs_pasien=array();
								// $simrs_pasien['pemeriksaanfisik']=null;           
								// $simrs_pasien['update']=null;			
								// $simrs_pasien['pasien']=null;
								// if($simrs_pasien){
									// if ($jlhRecord->count()>0){ //JIKA EDIT
										// // $updatemodel = Lampjaksa::findOne("22");
										// $updatemodel = Lampjaksa::findOne($jlhRecord->one()->kode)->toArray();
										// // echo "<pre>";print_r($updatemodel);exit;
										// // $updatemodel->dokter_pemeriksa
										// $simrs_pasien['update']=$updatemodel;
									// }
								// }
							
								// if($simrs_pasien){
									// $simrs_pasien['pasien']=$datapelayanan;
								// }
								// if($simrs_pasien){
									// $simrs_pasien['pemeriksaanfisik']=$pemeriksaanfisik;
								// }
            		
            // return $this->asJson([
                // 'response' =>[
                    // "data" => [
                        // 'simrs'=>$simrs_pasien,
                    // ]
                // ],
                // 'metadata'=>[
                    // 'message' => "Data Sukses",
                    // 'code' => 200,
                // ]
            // ]);
        }
        return false;
    }
}
