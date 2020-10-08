<?php

namespace app\controllers;

use app\models\Laporan;
use app\models\MasterPemeriksaanFisik;
use app\models\SettingGlobal;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
        ->joinWith(['item' => function ($q){
            $q ->joinWith(['kategori']);
        }])
        ->andWhere(['setting_global.status'=>2])
        ->asArray()
        ->all();

        return $this->render('index', [
            'model' => $model,
            'dataSetting' => $dataSetting
        ]);
    }

    public function actionCetak()
    {
        $laporan = \Yii::$app->request->post('laporan',false);
        if(!$laporan){
            throw new NotFoundHttpException();
        }

        if(!isset($laporan['type'])){
            throw new NotFoundHttpException();
        }

        switch ($laporan['type']){
            case 'lapRekap' :
                $title = 'Laporan Rekap MCU';
                $this->RekapMCU($laporan);
                break;

            default :
                throw new NotFoundHttpException();
                break;
        }

    }

    private function RekapMCU($laporan)
    {   
        $lap = new Laporan();
        $pegawai = $lap->get();

        $mode = Yii::$app->request->post('submit');

        if ($mode == 'excel') {
            ini_set("memory_limit", "8056M");
            ini_set('max_execution_time', 0);
            error_reporting(E_ALL);
            ini_set('display_errors', TRUE);
            ini_set('display_startup_errors', TRUE);
                
            $objPHPExcel = new PhpSpreadsheet\Spreadsheet();
                $stylehead = array(
                    'alignment' => array(
                        // 'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    ),
                    'font'  => array(
                            'bold'  => true,
                            'size'  => 14,
                            'name'  => 'Times New Rowman'
                        )    
                    );

                    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'DAFTAR TENAGA KEPERAWATAN');
                    $objPHPExcel->getActiveSheet()->mergeCells('A1:H1');
                    $objPHPExcel->getActiveSheet()->getStyle("A1:H1")->getFont()->setBold(true);
                    $objPHPExcel->getActiveSheet()->getStyle("A1:H1")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                    $objPHPExcel->getActiveSheet()->setCellValue('A2', 'RUMAH SAKIT UMUM DAERAH ARIFIN AHMAD PROVINSI RIAU');
                    $objPHPExcel->getActiveSheet()->mergeCells('A2:H2');
                    $objPHPExcel->getActiveSheet()->getStyle("A2:H2")->getFont()->setBold(true);
                    $objPHPExcel->getActiveSheet()->getStyle("A2:H2")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                    $objPHPExcel->getActiveSheet()->setCellValue('A3','TAHUN '. date('Y'));
                    $objPHPExcel->getActiveSheet()->mergeCells('A3:H3');
                    $objPHPExcel->getActiveSheet()->getStyle("A3:H3")->getFont()->setBold(true);
                    $objPHPExcel->getActiveSheet()->getStyle("A3:H3")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                    
                    $objPHPExcel->getActiveSheet()->setCellValue('A5' ,"NO");
                    $objPHPExcel->getActiveSheet()->setCellValue('B5' ,"Nama Lengkap");
                    $objPHPExcel->getActiveSheet()->setCellValue('C5' ,"NIP/NIPTK");
                    $objPHPExcel->getActiveSheet()->setCellValue('D5' ,"Status Kepegawaian");
                    $objPHPExcel->getActiveSheet()->setCellValue('E5' ,"Pendidikan");
                    $objPHPExcel->getActiveSheet()->setCellValue('F5' ,"Tempat Tugas");
                    $objPHPExcel->getActiveSheet()->setCellValue('G5' ,"Pelatihan Yang Pernah Diikuti");
                    $objPHPExcel->getActiveSheet()->setCellValue('H5' ,"Status Tugas");
                
                
                $no= 1;
                $i = 0;
                $x = 6;

                for ($col = 'A'; $col != 'H'; $col++) {
                    $objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
                    $objPHPExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(-1);
                    $objPHPExcel->getActiveSheet()->getStyle($col)->getAlignment()->setWrapText(true);
                }

                $v = array(0 => "Tidak Aktif", "Aktif");
                foreach ($pegawai as $data) {

                    $rwytPelatihan = RiwayatKursus::find()->where(['nip' => $data['id_nip_nrp']])->asArray()->orderBy([
                        'tanggal_piagam_setifikat' => SORT_DESC      
                        ])->all();

                    $d = [];
                    foreach($rwytPelatihan as $krs){
                        $d[] =  $krs['nama_kursus'];
                        // array_push($d,$krs['nama_kursus']);
                    } 
        
                    if(!empty($data['gelar_sarjana_depan']) && !empty($data['gelar_sarjana_belakang'])){
                        $namanya=$data['gelar_sarjana_depan'].". ".$data['nama_lengkap'].", ".$data['gelar_sarjana_belakang'];
                    }else if(!empty($data['gelar_sarjana_depan']) && empty($data['gelar_sarjana_belakang'])){
                        $namanya=$data['gelar_sarjana_depan'].". ".$data['nama_lengkap'];
                    }else if(empty($data['gelar_sarjana_depan']) && !empty($data['gelar_sarjana_belakang'])){
                        $namanya=$data['nama_lengkap'].", ".$data['gelar_sarjana_belakang'];
                    }else if(empty($data['gelar_sarjana_depan']) && empty($data['gelar_sarjana_belakang'])){
                        $namanya=$data['nama_lengkap'];
                    }
        
                    if(!empty($data['status_aktif_pegawai'])){
                        $status = $v[$data['status_aktif_pegawai']];
                    }else{
                        $status = "";
                    }

                
                    $objPHPExcel->getActiveSheet()->setCellValue('A'. $x,$no);
                    $objPHPExcel->getActiveSheet()->setCellValue('B'. $x,$namanya);
                    $objPHPExcel->getActiveSheet()->setCellValue('C'. $x,$data['id_nip_nrp']);
                    $objPHPExcel->getActiveSheet()->setCellValue('D'. $x,Helper::getStspegawai($data['status_kepegawaian_id']));
                    $objPHPExcel->getActiveSheet()->setCellValue('E'. $x,$data['pendidikan']);
                    $objPHPExcel->getActiveSheet()->setCellValue('F'. $x,$data['penempatan']);
                    $objPHPExcel->getActiveSheet()->setCellValue('G'. $x,implode(PHP_EOL,$d));
                    $objPHPExcel->getActiveSheet()->setCellValue('H'. $x,$status);
                    
                    $x++;
                    $i++;
                    $no++;
                }
                
                
                $no++;
                // var_dump($model);
                // exit;
                
                $writer = new Xlsx($objPHPExcel);
            
                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename="Data Tenaga Keperawatan'.date('Ymdhis').'.xlsx"');
                header('Cache-Control: max-age=0');
                $writer->save('php://output');
                exit();
        }else{
            $size_orientation='LEGAL';
            $fontsize=6;
            $mpdf = new Mpdf([
                'mode' => 'utf-8',
                'default_font' => 'sanserif',
                'default_font_size' => $fontsize,
                //'format'=> (($size_orientation=='LEGAL-L')?[330,215]:[215,330]),
                'format'=> $size_orientation,
            ]);
            
            $mpdf->AddPage('L');
            $mpdf->WriteHTML($this->renderPartial('dtkbidang' , [
                'pegawai'=>$pegawai
            ]));
            
            return $mpdf->Output();
            exit;
        }
    }

}
