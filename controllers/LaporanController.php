<?php

namespace app\controllers;

use app\components\Helper;
use app\models\Anamnesis;
use app\models\BahayaPotensial;
use app\models\DataLayanan;
use app\models\JenisPekerjaan;
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
use yii\helpers\Url;
use app\models\AkunAknUser;
use app\models\PemeriksaanFisik;
use app\models\spesialis\McuPenatalaksanaanMcu;
use app\models\spesialis\McuSpesialisGigi;
use app\models\spesialis\McuSpesialisMata;
use app\models\spesialis\McuSpesialisThtBerbisik;

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

        $dataSetting = SettingGlobal::find()
            ->select(['setting_global.*', 'nama_kategori', 'nama_item_setting', 'kode_tes', 'nilai_normal'])
            ->joinWith(['item' => function ($q) {
                $q->joinWith(['kategori']);
            }])
            ->andWhere(['setting_global.status' => 2])
            ->asArray()
            ->all();

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

        // echo '<pre>';
        // print_r($laporan);
        // die();

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
                $filename = 'Data-'.Date('YmdGis').'-MCU.xls';
                header("Content-type: application/vnd-ms-excel");
                header("Content-Disposition: attachment; filename=".$filename);
                echo '<table width="100%" border="1">
                        <thead></thead>
                        <tr>
                            <th colspan="12"><h2 align="center">REKAPITULASI HASIL PEMERIKSAAN CPNS BENGKALIS</h2></th>
                        </tr>
                        <tr>
                            <th colspan="12"><h3 align="center">TAHUN '.date('Y').' </h3></th>
                        </tr>
                        <tr>
                            <th rowspan="2" align="center">NO</th>
                            <th align="center">Nama</th>
                            <th rowspan="2" align="center">Umur</th>
                            <th rowspan="2" align="center">Jenis <br /> Kelamin</th>
                            <th rowspan="2" align="center">Jabatan Pekerjaan</th>
                            <th rowspan="2" align="center">Tanda Vital</th>
                            <th rowspan="2" align="center">Status Gizi</th>
                            <th rowspan="2" width="15%" align="center">Gigi</th>
                            <th rowspan="2" align="center">Mata</th>
                            <th rowspan="2" align="center">THT Berbisik</th>
                            <th rowspan="2" align="center">Hasil Lab</th>
                            <th rowspan="2" align="center">POIN</th>
                        </tr>
                        <tr>
                            <th align="center">No Test</th>
                        </tr>
                        </thead>
                        <tbody>';
    
                        $modelMata = new McuSpesialisMata();
                        $modelGigi = new McuSpesialisGigi();
                        $modelThtBerbisik = new McuSpesialisThtBerbisik();
                        $modelPemeriksaanFisik = new PemeriksaanFisik();
            
                        $no = 1;
                        foreach ($datamcu as $data) {
                            $dtLayanan = Helper::getDataLayanan($data['id_data_pelayanan']);
                            //$dtPemeriksaanFisik = Helper::getDataPemeriksaanFisik($data['no_rekam_medik']);
                            $dtRegister = Helper::getDataRegistrasi($data['no_rekam_medik']);
                            //return $dtPemeriksaanFisik['status_gizi_tinggi_badan'] ?? '';
                            // var_dump($dtPemeriksaanFisik['status_gizi_tinggi_badan']);
                            // var_dump($dtPemeriksaanFisik['status_gizi_berat_badan']);
                            // exit;
            
                            $hasil =  json_decode($data['hasil']);
            
                            $gigi = '';
                            foreach ($hasil->gigi as $g) {
                                if ($g->tampil == 1 && $g->result == 1) {
                                    $gigi .= $modelGigi->getAttributeLabel($g->item) . ' = ' . $g->value . '<br/> ';
                                }
                            }
            
                            $mata = '';
                            foreach ($hasil->mata as $h) {
                                if ($h->tampil == 1 && $h->result == 1) {
                                    $mata .= $modelMata->getAttributeLabel($h->item) . ' = ' . $h->value . '<br/>';
                                }
                            }
                            
                            $tht_berbisik = '';
                            foreach ($hasil->tht_berbisik as $i) {
                                if ($i->tampil == 1 && $i->result == 1) {
                                    $tht_berbisik .= $modelThtBerbisik->getAttributeLabel($i->item) . ' = ' . $i->value . '<br/>';
                                }
                            }
                            
                            $tanda_vital = '';
                            foreach ($hasil->tanda_vital as $j) {
                                if ($j->tampil == 1 && $j->result == 1) {
                                    $tanda_vital .= $modelPemeriksaanFisik->getAttributeLabel($j->item) . ' = ' . $j->value . '<br/>';
                                }
                            }
                            
                            $status_gizi = '';
                            foreach ($hasil->status_gizi as $k) {
                                if ($k->tampil == 1 && $k->result == 1) {
                                    $status_gizi .= $modelPemeriksaanFisik->getAttributeLabel($k->item) . ' = ' . $k->value . '<br/>';
                                }
                            }
                            
                            $tingkat_kesadaran = '';
                            foreach ($hasil->tingkat_kesadaran as $l) {
                                if ($l->tampil == 1 && $l->result == 1) {
                                    $tingkat_kesadaran .= $modelPemeriksaanFisik->getAttributeLabel($l->item) . ' = ' . $l->value . '<br/>';
                                }
                            }
                            
                            $lab = '';
                            foreach ($hasil->lab as $m) {
                                if ($m->tampil == 1 && $m->result == 1) {
                                    $lab .= $m->item . ' = ' . $m->value . '<br/>';
                                }
                            }
                        echo '
                            <tr>
                            <td>'.$no.'</td>
                            <td align="left">'.$dtLayanan['nama'] . "<br/>'" . $dtLayanan['no_ujian'].'</td>
                            <td>'.Helper::hitung_umur($dtLayanan['tgl_lahir']).'</td>
                            <td>'.$dtLayanan['jenis_kelamin'].'</td>
                            <td>'.$dtRegister['u_jabatan'].'</td>
                            <td>'.$tanda_vital.'</td>
                            <td>'.$status_gizi.'</td>
                            <td>'.$gigi.'</td>
                            <td>'.$mata.'</td>
                            <td>'.$tht_berbisik.'</td>
                            <td>'.$lab.'</td>
                            <td>'.$data['poin'].'</td>
                        </tr>
                        ';
                        $no++;
                    }
                echo '</tbody>
                </table>';
                exit;
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

    public function actionCetakRekapMcu()
    {
    }


    public function actionListLaporan()
    {
        return $this->render('list-laporan');
    }

    public function actionCetakPktk($id)
    {


        // Data Pelayanan
        $data_pelayanan = DataLayanan::findOne(['no_rekam_medik' => $id]);

        //Anamnesis
        $pertanyaananam = Anamnesis::find()->where(['nomor_rekam_medik' => $id])->one();

        //Jenis Pekerjaan
        $jenis_pekerjaan = JenisPekerjaan::find()->where(['no_rekam_medik' => $id])->all();

        //Biodata User
        $dataBiodataUser = Yii::$app->dbRegisterMcu->createCommand("SELECT
        u.u_id,u.u_jabatan , ukb.* FROM `user` u LEFT JOIN 
        user_kusioner_biodata ukb  
        on u.u_id  = ukb.ukb_user_id WHERE u.u_rm = '$id'")->queryAll();

        //Bahaya Potensial
        $bahaya_potensial = BahayaPotensial::find()->where(['no_rekam_medik' => $id])->all();

        //Pemeriksaan Fisik
        $pemeriksaan_fisik = MasterPemeriksaanFisik::find()->where(['no_rekam_medik' => $id])->asArray()->one();


        //Penata
        $penata_pelaksana = McuPenatalaksanaanMcu::find()->where(['no_rekam_medik'=>$id])->asArray()->all();
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
            'penata_pelaksana' => $penata_pelaksana
            // 'body_dis' => $body_dis,
            // 'modelDetail'=>$modelDetail,
        ]));
        // $mpdf->Output('Surat Pengadaan  '.$model['no_po'].'.pdf','I');
        $mpdf->Output('Pemeriksaan Kesehatan Tenaga Kerja "yodhi".pdf', 'I');
        exit;
    }


    public function actionCetakSertifikat($id)
    {
        //DataPelayanan
        $data_pelayanan = DataLayanan::findOne(['no_rekam_medik' => $id]);

        //Pemeriksaan Fisik
        $pemeriksaan_fisik = MasterPemeriksaanFisik::find()->where(['no_rekam_medik' => $id])->one();

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
            'dataDokter' => $dataDokter
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
