<?php

namespace app\controllers;

use app\models\Anamnesis;
use app\models\BahayaPotensial;
use app\models\DataLayanan;
use app\models\JenisPekerjaan;
use app\models\Laporan;
use app\models\MasterPemeriksaanFisik;
use app\models\SettingGlobal;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Mpdf\Mpdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use yii\helpers\Url;
use app\models\AkunAknUser;
use app\models\spesialis\McuPenatalaksanaanMcu;
use app\models\spesialis\McuSpesialisGigi;
use app\models\spesialis\McuSpesialisMata;
use app\models\spesialis\McuSpesialisTht;

/**
 * SpesialisKejiwaanController implements the CRUD actions for SpesialisKejiwaan model.
 */
class LaporanController extends Controller
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
     * Lists all SpesialisKejiwaan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = MasterPemeriksaanFisik::find();

        $dataSetting = SettingGlobal::find()
            ->select(['setting_global.*', 'nama_kategori', 'nama_item_setting', 'kode_tes', 'nilai_normal'])
            ->joinWith(['item' => function ($q) {
                $q->joinWith(['kategori']);
            }])
            ->andWhere(['setting_global.status' => 2])
            ->asArray()
            ->all();

        return $this->render('index', [
            'model' => $model,
            'dataSetting' => $dataSetting
        ]);
    }

    public function actionCetak()
    {
        $laporan = \Yii::$app->request->post('laporan');

        if (!$laporan) {
            throw new NotFoundHttpException();
        }

        if (!isset($laporan['type'])) {
            throw new NotFoundHttpException();
        }

        switch ($laporan['type']) {
            case 'lapRekap':
                $title = 'Laporan Rekap MCU';
                $this->RekapMCU($laporan);
                break;

            default:
                throw new NotFoundHttpException();
                break;
        }
    }

    private function RekapMCU($laporan)
    {
        $lap = new Laporan();
        $datamcu = $lap->getdataMCU($laporan);

        $mode = Yii::$app->request->post('submit');

        if ($mode == 'excel') {
            #masih Kosong
        } else {
            $size_orientation = 'LEGAL';
            $fontsize = 6;
            $mpdf = new Mpdf([
                'mode' => 'utf-8',
                'default_font' => 'sanserif',
                'default_font_size' => $fontsize,
                //'format'=> (($size_orientation=='LEGAL-L')?[330,215]:[215,330]),
                'format' => $size_orientation,
            ]);

            $mpdf->AddPage('L');
            $mpdf->WriteHTML($this->renderPartial('mcurekap', [
                'datamcu' => $datamcu,
                'laporan' => $laporan,
            ]));

            return $mpdf->Output();
            exit;
        }
    }

    public function actionCetakRekapMcu()
    {
    }


    public function actionListLaporan()
    {
        return $this->render('list-laporan');
    }

    public function actionCetakPktk($id,$no_daftar = null)
    {
        // exit();

        // spesialis mata
        $spesialis_mata = McuSpesialisMata::findOne(['no_rekam_medik' => $id,'no_daftar'=>$no_daftar]);
        $spesialis_tht = McuSpesialisTht::findOne(['no_rekam_medik' => $id,'no_daftar'=>$no_daftar]);

        $spesialis_gigi = McuSpesialisGigi::findOne(['no_rekam_medik' => $id,'no_daftar'=>$no_daftar]);


        // Data Pelayanan
        $data_pelayanan = DataLayanan::findOne(['no_rekam_medik' => $id,'no_registrasi'=>$no_daftar]);

        //Anamnesis
        $pertanyaananam = Anamnesis::find()->where(['nomor_rekam_medik' => $id])->one();

        //Jenis Pekerjaan
        $jenis_pekerjaan = JenisPekerjaan::find()->where(['no_rekam_medik' => $id])->all();

        //Biodata User
        $dataBiodataUser = Yii::$app->dbRegisterMcu->createCommand("SELECT
        u.* , ukb.* FROM `user` u LEFT JOIN 
        user_kusioner_biodata ukb  
        on u.u_id  = ukb.ukb_user_id WHERE u.u_rm = '$id' AND ukb.ukb_id is not null")->queryAll();

        $pendidikanUser = Yii::$app->dbRegisterMcu->createCommand("SELECT * FROM user_daftar WHERE ud_rm = '$id'")->queryOne();
        // var_dump($pendidikanUser['ud_pendidikan']);
        // exit();
// var_dump($dataBiodataUser);
// exit();
        //Bahaya Potensial
        $bahaya_potensial = BahayaPotensial::find()->where(['no_rekam_medik' => $id])->all();

        //Pemeriksaan Fisik
        $pemeriksaan_fisik = MasterPemeriksaanFisik::find()->where(['no_rekam_medik' => $id,'no_daftar'=>$no_daftar])->asArray()->one();


        //Penata
        $penata_pelaksana = McuPenatalaksanaanMcu::find()->where(['no_rekam_medik' => $id])->asArray()->all();
        // var_dump($penata_pelaksana);
        // exit();

        $NoFoot = 1;
        $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
        $size_orientation = 'A4-L';
        // $fontsize=12;
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
        ([
            'mode' => 'utf-8',
        ]);
        $mpdf->SetTitle('Pemeriksaan Kesehatan Tenaga Kerja');
        $mpdf->autoPageBreak = true;
        $mpdf->AddPageByArray([
            'margin-left' => 5,
            'margin-top' => 10,
            'margin-right' => 6,
            'margin-bottom' => 15,
            'margin-footer' => 3,
        ]);
        $mpdf->SetWatermarkImage(Url::to('@web/img/logo_rsud-removebg-preview.png'));
        $mpdf->showWatermarkImage = true;
        $mpdf->shrink_tables_to_fit = 1;
        if ($NoFoot == 1) {
            $footer = array(
                'odd' => array(
                    'C' => array(
                        // 'content' => 'Hal {PAGENO} dari {nb}',
                        'content' => '{PAGENO}',
                        'font-size' => 10,
                        'font-family' => 'times',
                        'color' => '#000000'
                    ),
                    'line' => 1,
                ),
            );
            $mpdf->SetFooter($footer);
        }


        
        // $mpdf->WriteHTML($this->renderPartial('cetak','id'=>$model->id_kwitansi,['model'=>$model]));
        // $mpdf->WriteHTML($bootstrapCss, 1);
        $mpdf->WriteHTML($this->renderPartial('cetak_mcu_pktk', [
            'mpdf' => $mpdf,
            'data_pelayanan' => $data_pelayanan,
            'pertanyaananam' => $pertanyaananam,
            'jenis_pekerjaan' => $jenis_pekerjaan,
            'dataBiodataUser' => $dataBiodataUser,
            // 'pertanyaan_jawaban' => $pertanyaan_jawaban,
            'bahaya_potensial' => $bahaya_potensial,
            'pemeriksaan_fisik' => $pemeriksaan_fisik,
            'penata_pelaksana' => $penata_pelaksana,
            'pendidikanUser' => $pendidikanUser,
            // 'body_dis' => $body_dis,
            // 'modelDetail'=>$modelDetail,

            'spesialis_gigi' => $spesialis_gigi,
            'spesialis_mata' => $spesialis_mata,
            'spesialis_tht' => $spesialis_tht,

        ]));
        // $mpdf->Output('Surat Pengadaan  '.$model['no_po'].'.pdf','I');
        $mpdf->Output('Pemeriksaan Kesehatan Tenaga Kerja "yodhi".pdf', 'I');
        exit;
    }


    public function actionCetakSertifikat($id,$no_daftar = null)
    {
        //DataPelayanan
        $data_pelayanan = DataLayanan::find()->where(['no_rekam_medik' => $id])->andWhere(['no_registrasi'=>$no_daftar])->one();

        //Pemeriksaan Fisik
        $pemeriksaan_fisik = MasterPemeriksaanFisik::find()->where(['no_rekam_medik' => $id,'no_daftar'=>$no_daftar])->asArray()->one();

        //Data User
        $dataUser = Yii::$app->dbRegisterMcu->createCommand("SELECT u.u_id , u.u_jabatan,u.u_tempat_tugas, ukb.* FROM `user` u LEFT JOIN user_kusioner_biodata ukb  on u.u_id  = ukb.ukb_user_id  WHERE u.u_rm = '$id'")->queryAll();

        $NoFoot = 1;
        $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
        $size_orientation = 'A4-L';
        // $fontsize=12;
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
        ([
            'mode' => 'utf-8',

            // 'default_font_size' => $fontsize,
            // 'format'=> (($size_orientation=='LEGAL-L')?[330,215]:[215,330]),
            //                'format'=> $size_orientation,
        ]);
        $mpdf->SetTitle('Sertifikat');
        $mpdf->autoPageBreak = true;
        $mpdf->AddPageByArray([
            'margin-left' => 5,
            'margin-top' => 10,
            'margin-right' => 6,
            'margin-bottom' => 15,
            'margin-footer' => 3,
        ]);
        $mpdf->SetWatermarkImage(Url::to('@web/img/logo_rsud-removebg-preview.png'));
        $mpdf->showWatermarkImage = true;
        $mpdf->shrink_tables_to_fit = 1;

        // $mpdf->WriteHTML($this->renderPartial('cetak','id'=>$model->id_kwitansi,['model'=>$model]));
        // $mpdf->WriteHTML($bootstrapCss, 1);
        $mpdf->WriteHTML($this->renderPartial('cetak_sertifikat', [
            'mpdf' => $mpdf,
            'data_pelayanan' => $data_pelayanan,
            'pemeriksaan_fisik' => $pemeriksaan_fisik,
            'dataUser' => $dataUser
            // 'model' => $model,
            // 'modelDetail'=>$modelDetail,
        ]));
        // $mpdf->Output('Surat Pengadaan  '.$model['no_po'].'.pdf','I');
        $mpdf->Output('Sertifikat.pdf', 'I');
        exit;
    }

    public function actionCetakDokterUmum($id)
    {
        // Data Pelayanan
        $data_pelayanan = DataLayanan::findOne(['no_rekam_medik' => $id]);
         $spesialis_gigi = McuSpesialisGigi::findOne(['no_rekam_medik' => $id]);

        // mata
        $spesialis_mata = McuSpesialisMata::findOne(['no_rekam_medik' => $id]);

        //Pemeriksaan Fisik
        $pemeriksaan_fisik = MasterPemeriksaanFisik::find()->where(['no_rekam_medik' => $id])->asArray()->one();

        $dataDokter = AkunAknUser::findOne(['userid' => $pemeriksaan_fisik['id_dokter_pemeriksaan_fisik']]);
        // var_dump($dataDokter);
        // exit();
        $NoFoot = 1;
        $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
        $size_orientation = 'A4-L';
        // $fontsize=12;
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
        ([
            'mode' => 'utf-8',
        ]);
        $mpdf->SetTitle('Pemeriksaan Kesehatan Tenaga Kerja');
        $mpdf->autoPageBreak = true;
        $mpdf->AddPageByArray([
            'margin-left' => 5,
            'margin-top' => 10,
            'margin-right' => 6,
            'margin-bottom' => 15,
            'margin-footer' => 3,
        ]);
        $mpdf->SetWatermarkImage(Url::to('@web/img/logo_rsud-removebg-preview.png'));
        $mpdf->showWatermarkImage = true;
        $mpdf->shrink_tables_to_fit = 1;
        if ($NoFoot == 1) {
            $footer = array(
                'odd' => array(
                    'C' => array(
                        // 'content' => 'Hal {PAGENO} dari {nb}',
                        'content' => '{PAGENO}',
                        'font-size' => 10,
                        'font-family' => 'times',
                        'color' => '#000000'
                    ),
                    'line' => 1,
                ),
            );
            $mpdf->SetFooter($footer);
        }
        // $mpdf->WriteHTML($this->renderPartial('cetak','id'=>$model->id_kwitansi,['model'=>$model]));
        // $mpdf->WriteHTML($bootstrapCss, 1);
        $mpdf->WriteHTML($this->renderPartial('cetak-dokter-umum', [
            'mpdf' => $mpdf,
            'data_pelayanan' => $data_pelayanan,
            'pemeriksaan_fisik' => $pemeriksaan_fisik,
            'dataDokter' => $dataDokter,
            'spesialis_mata' => $spesialis_mata,
                        'spesialis_gigi' => $spesialis_gigi,


            // 'body_dis' => $body_dis,
            // 'modelDetail'=>$modelDetail,
        ]));
        // $mpdf->Output('Surat Pengadaan  '.$model['no_po'].'.pdf','I');
        $mpdf->Output('Pemeriksaan Fisik.pdf', 'I');
        exit;
    }

    public function actionCetakPerawat($id)
    {
        // Data Pelayanan
        $data_pelayanan = DataLayanan::findOne(['no_rekam_medik' => $id]);

        //Jenis Pekerjaan
        $jenis_pekerjaan = JenisPekerjaan::find()->where(['no_rekam_medik' => $id])->all();

        //Pemeriksaan Fisik
        $pemeriksaan_fisik = MasterPemeriksaanFisik::find()->where(['no_rekam_medik' => $id])->asArray()->one();

        $dataDokter = AkunAknUser::findOne(['userid' => $pemeriksaan_fisik['id_dokter_pemeriksaan_fisik']]);

        //Biodata User
        $dataBiodataUser = Yii::$app->dbRegisterMcu->createCommand("SELECT
        u.u_id,u.u_jabatan , ukb.* FROM `user` u LEFT JOIN 
        user_kusioner_biodata ukb  
        on u.u_id  = ukb.ukb_user_id WHERE u.u_rm = '$id'")->queryAll();

        //Bahaya Potensial
        $bahaya_potensial = BahayaPotensial::find()->where(['no_rekam_medik' => $id])->all();

        //Anamnesis
        $pertanyaananam = Anamnesis::find()->where(['nomor_rekam_medik' => $id])->one();

        $NoFoot = 1;
        $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
        $size_orientation = 'A4-L';
        // $fontsize=12;
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
        ([
            'mode' => 'utf-8',
        ]);
        $mpdf->SetTitle('Pemeriksaan Kesehatan Tenaga Kerja');
        $mpdf->autoPageBreak = true;
        $mpdf->AddPageByArray([
            'margin-left' => 5,
            'margin-top' => 10,
            'margin-right' => 6,
            'margin-bottom' => 15,
            'margin-footer' => 3,
        ]);
        $mpdf->SetWatermarkImage(Url::to('@web/img/logo_rsud-removebg-preview.png'));
        $mpdf->showWatermarkImage = true;
        $mpdf->shrink_tables_to_fit = 1;
        if ($NoFoot == 1) {
            $footer = array(
                'odd' => array(
                    'C' => array(
                        // 'content' => 'Hal {PAGENO} dari {nb}',
                        'content' => '{PAGENO}',
                        'font-size' => 10,
                        'font-family' => 'times',
                        'color' => '#000000'
                    ),
                    'line' => 1,
                ),
            );
            $mpdf->SetFooter($footer);
        }
        // $mpdf->WriteHTML($this->renderPartial('cetak','id'=>$model->id_kwitansi,['model'=>$model]));
        // $mpdf->WriteHTML($bootstrapCss, 1);
        $mpdf->WriteHTML($this->renderPartial('cetak-perawat', [
            'mpdf' => $mpdf,
            'data_pelayanan' => $data_pelayanan,
            'pemeriksaan_fisik' => $pemeriksaan_fisik,
            'dataDokter' => $dataDokter,
            'pertanyaananam' => $pertanyaananam,
            'jenis_pekerjaan' => $jenis_pekerjaan,
            'dataBiodataUser' => $dataBiodataUser,
            // 'pertanyaan_jawaban' => $pertanyaan_jawaban,
            'bahaya_potensial' => $bahaya_potensial,
            // 'body_dis' => $body_dis,
            // 'modelDetail'=>$modelDetail,
        ]));
        // $mpdf->Output('Surat Pengadaan  '.$model['no_po'].'.pdf','I');
        $mpdf->Output('Data Pelayanan,Anamnesis,Anamnesis Okupasi.pdf', 'I');
        exit;
    }
}
