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
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

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
        $laporan = \Yii::$app->request->post('laporan');

        if(!$laporan){
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
        $datamcu = $lap->getdataMCU($laporan);

        $mode = Yii::$app->request->post('submit');

        if ($mode == 'excel') {
            #masih Kosong
        }else{
            $size_orientation='LEGAL';
            $fontsize=6;
            $mpdf = new Mpdf([
                'mode' => 'utf-8',
                'default_font' => 'sanserif',
                'default_font_size' => $fontsize,
                //'format'=> (($size_orientation=='LEGAL-L')?[330,215]:[215,330]),
                'format' => $size_orientation,
            ]);

            $mpdf->AddPage('L');
            $mpdf->WriteHTML($this->renderPartial('mcurekap' , [
                'datamcu'=>$datamcu,
                'laporan'=>$laporan,
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
