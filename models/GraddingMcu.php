<?php

namespace app\models;

use Yii;
use app\models\spesialis\McuSpesialisGigi;
use app\models\spesialis\McuSpesialisMata;
use app\models\SettingGlobal;
use app\models\spesialis\McuSpesialisThtBerbisik;

/**
 * This is the model class for table "mcu.gradding_mcu".
 *
 * @property string $id_gradding
 * @property string $id_data_pelayanan
 * @property string $no_rekam_medik
 * @property string $no_registrasi
 * @property string|null $no_mcu
 * @property string|null $kode_debitur
 * @property string|null $hasil
 * @property string $status
 * @property string $is_reset
 * @property float|null $poin
 */
class GraddingMcu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.gradding_mcu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_gradding', 'id_data_pelayanan', 'no_rekam_medik', 'no_registrasi', 'status', 'is_reset'], 'required'],
            [['hasil'], 'string'],
            [['poin'], 'number'],
            [['id_gradding', 'id_data_pelayanan', 'no_rekam_medik', 'no_mcu'], 'string', 'max' => 100],
            [['no_registrasi'], 'string', 'max' => 225],
            [['kode_debitur'], 'string', 'max' => 255],
            [['status', 'is_reset'], 'string', 'max' => 2],
            [['id_gradding'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_gradding' => 'Id Gradding',
            'id_data_pelayanan' => 'Id Data Pelayanan',
            'no_rekam_medik' => 'No Rekam Medik',
            'no_registrasi' => 'No Registrasi',
            'no_mcu' => 'No Mcu',
            'kode_debitur' => 'Kode Debitur',
            'hasil' => 'Hasil',
            'status' => 'Status',
            'is_reset' => 'Is Reset',
            'poin' => 'Poin',
        ];
    }

    public static function getIdGradding()
    {
        $kode=date('ymdHis');

        $cek = GraddingMcu::find()
        ->select(['coalesce(Max(substring(id_gradding,13,4)), Cast(0 as Varchar(1))) as id'])
        ->andWhere(['coalesce(substring(id_gradding,1,12), Cast(1 as Varchar(1)))'=>$kode])
        ->asArray()
        ->one();

        if($cek != Null) {
            if(count($cek) > 0) {
                $id = $kode.sprintf("%'.04d", ($cek['id'] + 1));

            } else {
                $id = $kode.'0001';
            }
        }

        return $id;

    }

    public function getDataMcu($KodeDebitur)
    {
        $data = DataLayanan::find()
            ->select(['id_data_pelayanan', 'no_rekam_medik', 'no_registrasi', 'no_mcu', 'kode_debitur', 'nama', 'jenis_kelamin'])
            ->andWhere(['kode_debitur' => $KodeDebitur])
            ->andWhere(['not', ['no_registrasi' => null]])
            ->asArray()
            ->all();

        return $data;
    }

    public function getHasilPasien($NoPasien, $NoDaftar)
    {
        $global = new SettingGlobal();

        $dataGigi = McuSpesialisGigi::find()->andWhere(['no_rekam_medik' => $NoPasien, 'no_daftar' => $NoDaftar])->asArray()->one();
        // Id Kategori Setting untuk gigi = 5
        $Gigi = $global->getSettingGlobalByKategori(5);
        $resultGigi = $this->resultArray($Gigi, $dataGigi);

        $dataMata = McuSpesialisMata::find()->andWhere(['no_rekam_medik' => $NoPasien, 'no_daftar' => $NoDaftar])->asArray()->one();
        // Id Kategori Setting untuk mata = 2
        $Mata = $global->getSettingGlobalByKategori(2);
        $resultMata = $this->resultArray($Mata, $dataMata);

        $dataThtBerbisik = McuSpesialisThtBerbisik::find()->andWhere(['no_rekam_medik' => $NoPasien, 'no_daftar' => $NoDaftar])->asArray()->one();
        // Id Kategori Setting untuk tht_berbisi = 34
        $Tht_Berbisik = $global->getSettingGlobalByKategori(34);
        $resultThtBerbisik = $this->resultArray($Tht_Berbisik, $dataThtBerbisik);

        $result = [
            'gigi' => $resultGigi,
            'mata' => $resultMata,
            'tht_berbisik' => $resultThtBerbisik
        ];

        return $result;
    }

    public function resultArray($ArraySetting, $ArrrayHasil)
    {
        $result = [];
        if ($ArrrayHasil != Null) {
            if ($ArraySetting != Null) {
                foreach ($ArraySetting as $data) {

                    $value = $ArrrayHasil[$data['nama_item_setting']];
                    $hasil = $this->hasilValue($data['nama_item_setting'], $value);

                    $d = [
                        'tampil' => $data['tampil'],
                        'item' => $data['nama_item_setting'],
                        'value' => $value,
                        'result' => $hasil
                    ];

                    array_push($result, $d);
                }
            }
        }

        return $result;
    }

    public function resultLab($NoPasien, $NoDaftar)
    {
        $result = [];

        return $result;
    }

    public function hasilValue($item, $value)
    {
        $data = [
             // Keadaan Normal Gigi
            'g18' => 'Normal', 'g17' => 'Normal', 'g16' => 'Normal', 'g15' => 'Normal', 'g14' => 'Normal',
            'g13' => 'Normal', 'g12' => 'Normal', 'g11' => 'Normal', 'g21' => 'Normal', 'g22' => 'Normal',
            'g23' => 'Normal', 'g24' => 'Normal', 'g25' => 'Normal', 'g26' => 'Normal', 'g27' => 'Normal',
            'g28' => 'Normal', 'g38' => 'Normal', 'g37' => 'Normal', 'g36' => 'Normal', 'g35' => 'Normal',
            'g34' => 'Normal', 'g33' => 'Normal', 'g32' => 'Normal', 'g31' => 'Normal', 'g41' => 'Normal',
            'g42' => 'Normal', 'g43' => 'Normal', 'g44' => 'Normal', 'g45' => 'Normal', 'g46' => 'Normal',
            'g47' => 'Normal', 'g48' => 'Normal', 'oklusi' => 'Normal Bite', 'torus_palatinus' => 'Tidak Ada',
            'torus_mandibularis' => 'Tidak Ada', 'palatum' => 'Tinggi', 'supernumerary_teeth' => 'Tidak Ada',
            'diastema' => 'Tidak Ada', 'spacing' => 'Tidak Ada', 'oral_hygiene' => 'Baik', 'gingiva_periodontal' => 'Normal',
            'oral_mucosa' => 'Normal', 'tongue' => 'Normal', 'lain_lain' => '', 'kesan' => 'Normal',

             // Keadaan Normal Mata
             'persepsi_warna_mata_kanan' => 'Normal', 'persepsi_warna_mata_kiri' => 'Normal',
             'kelopak_mata_kanan' => 'Normal', 'kelopak_mata_kiri' => 'Normal',
             'konjungtiva_mata_kanan' => 'Normal','konjungtiva_mata_kiri' => 'Normal',
             'kesegarisan_gerak_bola_mata_kanan' => 'Normal', 'kesegarisan_gerak_bola_mata_kiri' => 'Normal',
             'skiera_mata_kanan' => 'Normal', 'skiera_mata_kiri' => 'Normal', 'lensa_mata_kanan' => 'Normal',
             'lensa_mata_kiri' => 'Normal', 'kornea_mata_kanan' => 'Normal', 'kornea_mata_kiri' => 'Normal',
             'bulu_mata_kanan' => 'Normal', 'bulu_mata_kiri' => 'Normal', 'tekanan_bola_mata_kanan' => 'Normal',
             'tekanan_bola_mata_kiri' => 'Normal', 'penglihatan_3_dimensi_mata_kanan' => 'Normal', 'penglihatan_3_dimensi_mata_kiri' => 'Normal',
             'virus_mata_tanpa_koreksi_mata_kanan' => 'VOD: 20/20', 'virus_mata_tanpa_koreksi_mata_kiri' => 'VOD: 20/20',
             'virus_mata_dengan_koreksi_mata_kanan' => '-', 'virus_mata_dengan_koreksi_mata_kiri' => '-',
             'lain_lain' => '', 'kesan' => 'Normal',

             // Keadaan Normal THT berbisik 
             'tl_test_berbisik_telinga_kanan_option' => 'Jarak 6-5 Meter', 'tl_test_berbisik_telinga_kiri_option' => 'Jarak 6-5 Meter',
             'tl_test_berbisik_telinga_kanan' => 'Dalam Batas Normal', 'tl_test_berbisik_telinga_kiri' => 'Dalam Batas Normal', 
             'kesan' =>'Normal',
          
        ];

        $d = [
            $item => $value
        ];

        if (!array_diff($d, $data)) { 
            $result = 0;
        } else { 
            $result = 1;
        } 

        return $result;
    }

    public function getPoinPasien($NoPasien, $NoDaftar)
    {
        $poin = 0;

        return $poin;
    }

    
    public function cekGradding($IdLayanan, $NoPasien, $NoDaftar)
    {
        $Data = GraddingMcu::find()
        ->andWhere(['id_data_pelayanan'=>$IdLayanan, 'no_rekam_medik'=> $NoPasien, 'no_registrasi'=>$NoDaftar, 'status'=>2])
        ->asArray()
        ->one();

        if($Data != Null) {
            // Jika ada datanya lakukan update
            return 1;
        } else {
            // Jika tidak ada datanya lakukan insert
            return 0;
        }
    }

    public function getDataGradding($KodeDebitur)
    {
        $data = $this->getDataMcu($KodeDebitur);
        $result = [];
        if ($data != Null) {
            foreach ($data as $dt) {
                $hasil = $this->getHasilPasien($dt['no_rekam_medik'], $dt['no_registrasi']);
                $poin = $this->getPoinPasien($dt['no_rekam_medik'], $dt['no_registrasi']);
                $d = [
                    'id_pelayanan' => $dt['id_data_pelayanan'],
                    'no_pasien' => $dt['no_rekam_medik'],
                    'no_daftar' => $dt['no_registrasi'],
                    'no_mcu' => $dt['no_mcu'],
                    'kode_debitur' => $dt['kode_debitur'],
                    'nama' => $dt['nama'],
                    'jk' => $dt['jenis_kelamin'],
                    'poin' => $poin,
                    'hasil' => $hasil
                ];
                array_push($result, $d);
            }
        }
        // $data2 = $this->getHasilPasien('01051206', '2010004196');
        return $result;
    }
}
