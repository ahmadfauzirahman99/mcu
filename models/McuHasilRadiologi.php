<?php

namespace app\models;

use app\models\pegawai\Pegawai;
use Yii;

/**
 * This is the model class for table "mcu.hasil_radiologi".
 *
 * @property string $id_hasil_radiologi
 * @property string $id_data_pelayanan
 * @property string $no_rekam_medik
 * @property string $no_registrasi
 * @property string|null $no_mcu
 * @property string|null $kode_debitur
 * @property string|null $kode_pemeriksa
 * @property string $result_pemeriksaan
 * @property string|null $hasil
 * @property string $status
 */
class McuHasilRadiologi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.hasil_radiologi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_hasil_radiologi', 'id_data_pelayanan', 'no_rekam_medik', 'no_registrasi', 'result_pemeriksaan', 'status'], 'required'],
            [['hasil'], 'string'],
            [['id_hasil_radiologi', 'id_data_pelayanan', 'no_rekam_medik', 'no_mcu'], 'string', 'max' => 100],
            [['no_registrasi'], 'string', 'max' => 225],
            [['kode_debitur'], 'string', 'max' => 255],
            [['result_pemeriksaan', 'status'], 'string', 'max' => 2],
            [['id_hasil_radiologi'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_hasil_radiologi' => 'Id Hasil Radiologi',
            'id_data_pelayanan' => 'Id Data Pelayanan',
            'no_rekam_medik' => 'No Rekam Medik',
            'no_registrasi' => 'No Registrasi',
            'no_mcu' => 'No Mcu',
            'kode_debitur' => 'Kode Debitur',
            'kode_pemeriksa' => 'Kode Pemeriksa',
            'result_pemeriksaan' => 'Result Pemeriksaan',
            'hasil' => 'Hasil',
            'status' => 'Status',
        ];
    }

    public static function getIdHasil()
    {
        $kode = date('ymdHis');

        $cek = McuHasilRadiologi::find()
            ->select(['coalesce(Max(substring(id_hasil_radiologi,13,4)), Cast(0 as Varchar(1))) as id'])
            ->andWhere(['coalesce(substring(id_hasil_radiologi,1,12), Cast(1 as Varchar(1)))' => $kode])
            ->asArray()
            ->one();

        if ($cek != Null) {
            if (count($cek) > 0) {
                $id = $kode . sprintf("%'.04d", ($cek['id'] + 1));
            } else {
                $id = $kode . '0001';
            }
        }

        return $id;
    }

    public function cekData($IdLayanan, $NoPasien, $NoDaftar)
    {
        $Data = McuHasilRadiologi::find()
            ->andWhere(['id_data_pelayanan' => $IdLayanan, 'no_rekam_medik' => $NoPasien, 'no_registrasi' => $NoDaftar, 'status' => 2])
            ->asArray()
            ->one();

        if ($Data != Null) {
            // Jika ada datanya lakukan update
            return 1;
        } else {
            // Jika tidak ada datanya lakukan insert
            return 0;
        }
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

    public function getDataHasilRadiologi($NoPasien, $NoDaftar)
    {
        $dataRad = PenunjangRadiologi::findOne(['No_Pasien'=>$NoPasien, 'No_Daftar'=>$NoDaftar, 'Kd_InstTuju'=>'3101', 'Kd_SubInstTuju' =>'3101']);

        return $dataRad;
    }

    public function getUserIdDokter($KodeDokter)
    {
        $id = '-';
        $Pegawai = Pegawai::find()
        ->andWhere(['kode_dokter_maping_simrs' => $KodeDokter])
        ->one();

        if($Pegawai != Null) {
            $UserId = AkunAknUser::find()
            ->andWhere(['id_pegawai' => $Pegawai->pegawai_id])
            ->asArray()
            ->one();

            if($UserId != Null) {
                $id = $UserId['userid'];
            }
        }
        return $id;
    }

    public function cekResultRadiologi($hasil)
    {
        $result = '-';
        if($hasil != Null) {
            $result = '1';
            if (strpos($hasil, 'dalam batas normal') !== false) {
                $result = '0';
            }
        }

        return $result;
    }

    public function getLayanan()
    {
        return $this->hasOne(DataLayanan::className(),['id_data_pelayanan'=>'id_data_pelayanan'])->alias('layanan');
    }
    public function getPemeriksa()
    {
        return $this->hasOne(AkunAknUser::className(),['userid'=>'kode_pemeriksa'])->alias('pemeriksa');
    }

}
