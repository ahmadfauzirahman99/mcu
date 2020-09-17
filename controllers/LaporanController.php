<?php

namespace app\controllers;

use app\models\Laporan;
use app\models\MasterPemeriksaanFisik;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Mpdf\Mpdf;
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
        $model = MasterPemeriksaanFisik::find();
        return $this->render('index', [
            'model' => $model,
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
        $datamcu = $lap->getdataMCU();

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
                'format'=> $size_orientation,
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

}
