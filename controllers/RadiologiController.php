<?php

namespace app\controllers;

use app\models\DataLayanan;
use app\models\McuHasilRadiologi;
use app\models\PenunjangRadiologi;
use yii\web\Response;
use yii\db\Exception;
use Yii;

class RadiologiController extends \yii\web\Controller
{
    public function actionIndex($NoPasien = Null)
    {
      
        if (Yii::$app->request->isPost) {
            $p = Yii::$app->request->post();

            $no_rekam_medik = $p['DataLayanan']['nama'];
            $dataLayanan = DataLayanan::findOne(['no_rekam_medik' => $no_rekam_medik]);


            return $this->render('index', [
                'dataLayanan' => $dataLayanan,
            ]);
        }

        $dataLayanan = new DataLayanan();
        return $this->render('index', [
            'dataLayanan' => $dataLayanan,
        ]);
    }

    public function actionGetDataPelayanan($q = null, $id =  null)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];

        if (!is_null($q)) {
            $dataPelayanan = DataLayanan::find()->select(["no_rekam_medik as id", "concat(nama,' ',no_rekam_medik) as text"])
                // ->where(['ilike', 'no_rekam_medik', $q . '%', false])
                ->Where(['ilike', 'nama', $q . '%', false])
                ->orderBy('nama ASC')
                ->asArray()
                ->all();
            $out['results'] = array_values($dataPelayanan);
        } else if ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => DataLayanan::find($id)->no_rekam_medik];
        }
        return $out;
    }

    /* Form Input */

    function actionFormInputAll()
    {
        $req = Yii::$app->request;
        if ($req->isAjax) {
            $model = new McuHasilRadiologi();

            $model->kode_debitur = '0129';

            return $this->renderAjax('form-input-all', [
                'model' => $model,
            ]);
        } else {
            throw new Exception("Illegal access");
        }
    }

    function actionProcessInputAll()
    {
        $req = Yii::$app->request;
        if ($req->isAjax) {

            ini_set("memory_limit", "8056M");
            ini_set('max_execution_time', 0);

            $Data = $_POST['McuHasilRadiologi'];

            $model = new McuHasilRadiologi();
            $DataInput = $model->getDataMcu($Data['kode_debitur']);

            $success = false;
            if ($DataInput != Null) {
                foreach ($DataInput as $d) {
                    $cek = $model->cekData($d['id_data_pelayanan'], $d['no_rekam_medik'], $d['no_registrasi']);

                    if ($cek == 1) {
                        // Jika true lakukan update
                        if ($this->updateData($d)) {
                            $success = true;
                        } else {
                            $result = ['status' => 'false', 'msg' => 'Update Data Radiologi GAGAL Id Pelayanan : ' . $d['id_data_pelayanan']];
                        }
                    } else if ($cek == 0) {
                        // Jika false lakukan insert

                        if ($this->insertData($d)) {
                            $success = true;
                        } else {
                            $result = ['status' => 'false', 'msg' => 'Insert Data Radiologi GAGAL Id Pelayanan : ' . $d['id_data_pelayanan']];
                        }
                    }
                }
            }

            if ($success) {
                $result = ['status' => 'true', 'msg' => 'Proses Insert Data Radiologi BERHASIL'];
            }

            Yii::$app->response->format = Response::FORMAT_JSON;
            return $result;
        }
    }

    public function insertData($d)
    {

        $model = new McuHasilRadiologi();

        $dataRad = $model->getDataHasilRadiologi($d['no_rekam_medik'], $d['no_registrasi']);

        $kode_pemeriksa = '-';
        $hasil = null;
        if ($dataRad != Null) {
            $kode_pemeriksa = $model->getUserIdDokter($dataRad->Kd_DokterPem);
            $hasil = $dataRad->HasilPemeriksaan;
        }

        $result =  $model->cekResultRadiologi($hasil);

        $model->id_hasil_radiologi = $model->getIdHasil();
        $model->id_data_pelayanan = $d['id_data_pelayanan'];
        $model->no_rekam_medik = $d['no_rekam_medik'];
        $model->no_registrasi = $d['no_registrasi'];
        $model->no_mcu = $d['no_mcu'];
        $model->kode_debitur = $d['kode_debitur'];
        $model->kode_pemeriksa = $kode_pemeriksa;
        $model->result_pemeriksaan = $result;
        $model->hasil = $hasil;
        $model->status = '2'; // Status 2 : Aktif, Status 1 : Tidak Aktif, Status 0 : Dihapus

        if ($model->save()) {
            return true;
        } else {
            print_r($model->errors);
        }
        return false;
    }

    public function updateData($d)
    {
        $model = McuHasilRadiologi::find()
            ->andWhere(['id_data_pelayanan' => $d['id_data_pelayanan'], 'no_rekam_medik' => $d['no_rekam_medik'], 'no_registrasi' => $d['no_registrasi']])
            ->one();

        echo '<pre>';
        print_r($model);
        die();

        $dataRad = $model->getDataHasilRadiologi($d['no_rekam_medik'], $d['no_daftar']);

        if ($dataRad != Null) {
            echo '<pre>';
            print_r($dataRad);
            die();
        }
        echo '<pre>';
        print_r($d);
        die();

        $model->id_data_pelayanan = $d['id_pelayanan'];
        $model->no_rekam_medik = $d['no_rekam_medik'];
        $model->no_registrasi = $d['no_daftar'];
        $model->no_mcu = $d['no_mcu'];
        $model->kode_debitur = $d['kode_debitur'];
        $model->hasil = json_encode($d['hasil']);
        $model->status = '2'; // Status 2 : Aktif, Status 1 : Tidak Aktif, Status 0 : Dihapus
        $model->is_reset = '1'; // 1 : Dapat Diubah, 0 : Tidak Dapat Diubah
        $model->poin = $d['poin'];

        if ($model->save()) {
            return true;
        } else {
            print_r($model->errors);
        }
        return false;
    }

    /* Form Input */

    function actionFormInput()
    {
        $req = Yii::$app->request;
        if ($req->isAjax) {
            $NoPasien = $req->post('NoPasien');
            $NoRegistrasi = $req->post('NoRegistrasi');
            $IdLayanan = $req->post('IdLayanan');
            $NamaPasien = $req->post('NamaPasien');

            $model = new McuHasilRadiologi();

            $cek = $model->cekData($IdLayanan, $NoPasien, $NoRegistrasi);

            if ($cek == 1) {
                // Jika true lakukan update
                $model = McuHasilRadiologi::find()
                    ->andWhere(['id_data_pelayanan' => $IdLayanan, 'no_rekam_medik' => $NoPasien, 'no_registrasi' => $NoRegistrasi])
                    ->one();

                $model->result_pemeriksaan = $model->result_pemeriksaan;

            } else if ($cek == 0) {
                // Jika false lakukan insert data baru

                $dataRad = $model->getDataHasilRadiologi($NoPasien, $NoRegistrasi);

                $kode_pemeriksa = '-';
                $hasil = null;
                if ($dataRad != Null) {
                    $kode_pemeriksa = $model->getUserIdDokter($dataRad->Kd_DokterPem);
                    $hasil = $dataRad->HasilPemeriksaan;
                }

                $model->no_rekam_medik = $NoPasien;
                $model->no_registrasi = $NoRegistrasi;
                $model->kode_pemeriksa = $kode_pemeriksa;
                $model->id_data_pelayanan = $IdLayanan;
                $model->hasil = $hasil;
            }

            return $this->renderAjax('form-input', [
                'model' => $model,
                'namapasien' => $NamaPasien
            ]);
        } else {
            throw new Exception("Illegal access");
        }
    }

    function actionSaveInput()
    {
        $req = Yii::$app->request;
        if ($req->isAjax) {

            $Data = $_POST['McuHasilRadiologi'];

            $model = new McuHasilRadiologi();

            $success = false;
            if($Data['id_hasil_radiologi'] != Null) {
                $model = McuHasilRadiologi::findOne($Data['id_hasil_radiologi']);
                
                $model->id_data_pelayanan = $Data['id_data_pelayanan'];
                $model->no_rekam_medik = $Data['no_rekam_medik'];
                $model->no_registrasi =  $Data['no_registrasi'];
                $model->no_mcu =  $Data['no_mcu'];
                $model->kode_debitur = $Data['kode_debitur'];
                $model->kode_pemeriksa = $Data['kode_pemeriksa'];
                $model->result_pemeriksaan = $Data['result_pemeriksaan'];
                $model->hasil = $Data['hasil'];
                $model->status = '2';
       
                if($model->save()) {
                    $success = true;
                } else {
                    $result = ['status' => 'false', 'msg' => 'Update Data Radiologi GAGAL Id Hasil Radiologi : ' . $Data['id_hasil_radiologi']];
                }

            } else {

                $dataRad = $model->getDataHasilRadiologi($Data['no_rekam_medik'], $Data['no_registrasi']);

                $kode_pemeriksa = '-';
                $hasil = null;
                if ($dataRad != Null) {
                    $kode_pemeriksa = $model->getUserIdDokter($dataRad->Kd_DokterPem);
                    $hasil = $dataRad->HasilPemeriksaan;
                }
        
                $result =  $model->cekResultRadiologi($hasil);
        
                $model->id_hasil_radiologi = $model->getIdHasil();
                $model->id_data_pelayanan = $Data['id_data_pelayanan'];
                $model->no_rekam_medik = $Data['no_rekam_medik'];
                $model->no_registrasi = $Data['no_registrasi'];
                $model->no_mcu = $Data['no_mcu'];
                $model->kode_debitur = $Data['kode_debitur'];
                $model->kode_pemeriksa = $kode_pemeriksa;
                $model->result_pemeriksaan = $Data['result_pemeriksaan'];
                $model->hasil = $Data['hasil'];
                $model->status = '2'; // Status 2 : Aktif, Status 1 : Tidak Aktif, Status 0 : Dihapus
        
                if ($model->save()) {
                    return true;
                } else {
                    print_r($model->errors);
                }
            }


            if($success){
                $result=['status'=>'true','msg'=>'Proses Input Hasil BERHASIL'];
            }

            Yii::$app->response->format = Response::FORMAT_JSON;
            return $result;
        }
    }

    /* End  Form Input */

    /* Refresh Manual */
    public function actionRefreshData()
    {
        if (\Yii::$app->request->isAjax) {
            $NoPasien = $_POST['NoPasien'];
            $NoRegistrasi = $_POST['NoRegistrasi'];
            $IdLayanan = $_POST['IdLayanan'];

            $data = McuHasilRadiologi::find()
                ->andWhere(['hasil_radiologi.no_rekam_medik' => $NoPasien])
                ->andWhere(['hasil_radiologi.no_registrasi' => $NoRegistrasi])
                ->andWhere(['hasil_radiologi.id_data_pelayanan' => $IdLayanan])
                ->andWhere(['hasil_radiologi.status' => '2'])
                ->joinWith(['layanan'])
                ->with(['pemeriksa'])
                ->orderBy('hasil_radiologi.id_hasil_radiologi')
                ->asArray()
                ->one();

            $datahasil = '';
            if ($data != Null) {
                $result = '<span class="badge badge-info">Belum Ada Hasil</span>';

                if ($data['result_pemeriksaan'] == 1) {
                    $result = '<span class="badge badge-warning">Tidak Normal</span>';
                } else  if ($data['result_pemeriksaan'] == 0) {
                    $result = '<span class="badge badge-success">Normal</span>';
                }

                $datahasil .=   '
                <tr>
                    <td>Nama Pasien</td>
                    <td>' . $data['layanan']['nama'] . '</td>
                </tr>
                <tr>
                    <td>Result</td>
                    <td>' . $result . '</td>
                </tr>
                <tr>
                    <td>Hasil</td>
                    <td><pre>' . $data['hasil'] . '</pre></td>
                </tr>
            ';
            } else {
                $datahasil .=   '
               <tr>
                   <td colspan="2"><center><span class="badge badge-info">Belum ada data hasil, silahkan input terlebih dahulu</span></center></td>
               </tr>
               ';
            }

            $hasil = [
                "code" => "200",
                "msg" => "Data berhasil",
                "datahasil" => $datahasil,
            ];
            echo json_encode($hasil);
            die();
        } else {
            throw new Exception("Illegal access");
        }
    }

    /* End  Form Input */
}
