<?php

namespace app\controllers;

use app\models\Laporan;
use app\models\MasterPemeriksaanFisik;
use app\models\SettingGlobal;
use Yii;
use Mpdf\Mpdf;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\base\Exception;
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
        $data = new SettingGlobal;

        $dataSetting = $data->getDataSettingGlobal();

        return $this->render('index', [
            'dataSetting' => $dataSetting
        ]);
    }

    /* Update Checked */
    public function actionUpdateCheck()
    {
        if (\Yii::$app->request->isAjax) {
            $Value = $_POST['checkedValue'];
            $Id = $_POST['id'];

            $model = $this->findModel($Id);

            if ($Value == 1) {
                $model->tampil = '0';
            } else if ($Value == 0) {
                $model->tampil = '1';
            }

            if ($model->save()) {

                $hasil = [
                    "code" => "200",
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

    public function actionCetakExcell()
    {
        $laporan = \Yii::$app->request->post();

        echo '<pre>';
        print_r($laporan);
        die();

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

    public function actionCetakPdf()
    {
        $laporan = \Yii::$app->request->post();

        if (!$laporan) {
            throw new NotFoundHttpException();
        }

        if (!isset($laporan['type'])) {
            throw new NotFoundHttpException();
        }

        $size_orientation = 'LEGAL';
        $orientation = 'L';
        $fontsize = 10;

        switch ($laporan['type']) {
            case 'lapRekapPaketPdf':
                $title = 'Laporan Rekap Paket MCU';
                $html = $this->lapRekapPaketPdf($laporan);
                break;

            default:
                throw new NotFoundHttpException();
                break;
        }

        $footer = '
        <table width="100%">
            <tr>
            <td>EMR MCU - ' . date('d/m/Y H:i:s') . '</td>
            <td align="right">Hal {PAGENO} dari {nb}</td>
            </tr>
        </table>
        ';

        // $fontUrl = \Yii::getAlias('@app') . DIRECTORY_SEPARATOR . "font";
        $pdf = new Mpdf([
            'mode' => 'utf-8',
            // 'fontDir' => [
            //     $fontUrl
            // ],
            // 'fontdata' => [
            //     'sanserif' => [
            //         'R' => 'sanserif.ttf',
            //     ]
            // ],
            // 'default_font' => 'sanserif',
            'default_font_size' => $fontsize,
            'format' => $size_orientation,
            'orientation' => $orientation,
        ]);
        $pdf->SetTitle($title);
        $pdf->SetCreator(\Yii::$app->params['app.organization']);
        $pdf->autoPageBreak = true;
        $pdf->AddPageByArray([
            'margin-left' => 5,
            'margin-top' => 5,
            'margin-right' => 5,
            'margin-bottom' => 15,
        ]);

        $pdf->shrink_tables_to_fit = 1;
        $pdf->SetFooter('
        <table width="100%">
            <tr>
            <td>SIMRS MCU - ' . date('d/m/Y H:i:s') . '</td>
            <td align="right">{PAGENO} of {nb}</td>
            </tr>
        </table>
        ');
        // echo $html;die();
        $pdf->WriteHTML($html);
        $pdf->Output("{$title}.pdf", 'I');
    }

    public function actionCetak()
    {
        $laporan = \Yii::$app->request->post('laporan', false);
        if (!$laporan) {
            throw new NotFoundHttpException();
        }

        if (!isset($laporan['type'])) {
            throw new NotFoundHttpException();
        }

        $size_orientation = 'LEGAL';
        $fontsize = 10;

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

    private function lapRekapPaketPdf($laporan)
    {
        if(!isset($laporan['KodeDebitur'])){
            throw new NotFoundHttpException();
        }

        $rep = new Laporan();

        $data = $rep->getDataLaporanPaket($laporan['KodeDebitur']);

        return $this->renderPartial('lapRekapPaketPdf',[
            'data'=>$data
        ]);
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
            $objPHPExcel->getActiveSheet()->setCellValue('A3', 'TAHUN ' . date('Y'));
            $objPHPExcel->getActiveSheet()->mergeCells('A3:H3');
            $objPHPExcel->getActiveSheet()->getStyle("A3:H3")->getFont()->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle("A3:H3")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

            $objPHPExcel->getActiveSheet()->setCellValue('A5', "NO");
            $objPHPExcel->getActiveSheet()->setCellValue('B5', "Nama Lengkap");
            $objPHPExcel->getActiveSheet()->setCellValue('C5', "NIP/NIPTK");
            $objPHPExcel->getActiveSheet()->setCellValue('D5', "Status Kepegawaian");
            $objPHPExcel->getActiveSheet()->setCellValue('E5', "Pendidikan");
            $objPHPExcel->getActiveSheet()->setCellValue('F5', "Tempat Tugas");
            $objPHPExcel->getActiveSheet()->setCellValue('G5', "Pelatihan Yang Pernah Diikuti");
            $objPHPExcel->getActiveSheet()->setCellValue('H5', "Status Tugas");


            $no = 1;
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
                foreach ($rwytPelatihan as $krs) {
                    $d[] =  $krs['nama_kursus'];
                    // array_push($d,$krs['nama_kursus']);
                }

                if (!empty($data['gelar_sarjana_depan']) && !empty($data['gelar_sarjana_belakang'])) {
                    $namanya = $data['gelar_sarjana_depan'] . ". " . $data['nama_lengkap'] . ", " . $data['gelar_sarjana_belakang'];
                } else if (!empty($data['gelar_sarjana_depan']) && empty($data['gelar_sarjana_belakang'])) {
                    $namanya = $data['gelar_sarjana_depan'] . ". " . $data['nama_lengkap'];
                } else if (empty($data['gelar_sarjana_depan']) && !empty($data['gelar_sarjana_belakang'])) {
                    $namanya = $data['nama_lengkap'] . ", " . $data['gelar_sarjana_belakang'];
                } else if (empty($data['gelar_sarjana_depan']) && empty($data['gelar_sarjana_belakang'])) {
                    $namanya = $data['nama_lengkap'];
                }

                if (!empty($data['status_aktif_pegawai'])) {
                    $status = $v[$data['status_aktif_pegawai']];
                } else {
                    $status = "";
                }


                $objPHPExcel->getActiveSheet()->setCellValue('A' . $x, $no);
                $objPHPExcel->getActiveSheet()->setCellValue('B' . $x, $namanya);
                $objPHPExcel->getActiveSheet()->setCellValue('C' . $x, $data['id_nip_nrp']);
                $objPHPExcel->getActiveSheet()->setCellValue('D' . $x, Helper::getStspegawai($data['status_kepegawaian_id']));
                $objPHPExcel->getActiveSheet()->setCellValue('E' . $x, $data['pendidikan']);
                $objPHPExcel->getActiveSheet()->setCellValue('F' . $x, $data['penempatan']);
                $objPHPExcel->getActiveSheet()->setCellValue('G' . $x, implode(PHP_EOL, $d));
                $objPHPExcel->getActiveSheet()->setCellValue('H' . $x, $status);

                $x++;
                $i++;
                $no++;
            }


            $no++;
            // var_dump($model);
            // exit;

            $writer = new Xlsx($objPHPExcel);

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Data Tenaga Keperawatan' . date('Ymdhis') . '.xlsx"');
            header('Cache-Control: max-age=0');
            $writer->save('php://output');
            exit();
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
            $mpdf->WriteHTML($this->renderPartial('dtkbidang', [
                'pegawai' => $pegawai
            ]));

            return $mpdf->Output();
            exit;
        }
    }

    public function findModel($id)
    {
        if (($model = SettingGlobal::findOne(['id_global' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
