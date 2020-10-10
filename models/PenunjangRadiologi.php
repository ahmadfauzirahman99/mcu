<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "MasRawatMinta".
 *
 * @property string $No_Tran
 * @property string $Tanggal
 * @property string|null $No_Pasien
 * @property string|null $No_Daftar
 * @property string|null $Kd_InstAsal
 * @property string|null $Kd_SubInstAsal
 * @property string $Kd_InstTuju
 * @property string $Kd_SubInstTuju
 * @property string|null $Kd_DokterAsal
 * @property string|null $PhotoLama
 * @property string|null $KeteranganKlinik
 * @property string|null $JenisPemeriksaan
 * @property string|null $No_Film
 * @property string|null $HasilPemeriksaan
 * @property string|null $Kd_DokterPem
 * @property string|null $No_TranTind
 * @property string|null $TanggalPem
 * @property string|null $TanggalSample
 * @property string|null $TanggalAmbilHasil
 * @property string|null $Lokasi
 * @property string|null $KodeSifat
 */
class PenunjangRadiologi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'MasRawatMinta';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_sqlsrv');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['No_Tran', 'Tanggal', 'Kd_InstTuju', 'Kd_SubInstTuju'], 'required'],
            [['Tanggal', 'TanggalPem', 'TanggalSample', 'TanggalAmbilHasil'], 'safe'],
            [['JenisPemeriksaan', 'HasilPemeriksaan'], 'string'],
            [['No_Tran', 'No_Daftar', 'No_TranTind'], 'string', 'max' => 10],
            [['No_Pasien'], 'string', 'max' => 8],
            [['Kd_InstAsal', 'Kd_SubInstAsal', 'Kd_InstTuju', 'Kd_SubInstTuju', 'Kd_DokterAsal', 'Kd_DokterPem'], 'string', 'max' => 4],
            [['PhotoLama', 'KeteranganKlinik', 'Lokasi'], 'string', 'max' => 50],
            [['No_Film'], 'string', 'max' => 30],
            [['KodeSifat'], 'string', 'max' => 2],
            [['No_Tran', 'Tanggal'], 'unique', 'targetAttribute' => ['No_Tran', 'Tanggal']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'No_Tran' => 'No Tran',
            'Tanggal' => 'Tanggal',
            'No_Pasien' => 'No Pasien',
            'No_Daftar' => 'No Daftar',
            'Kd_InstAsal' => 'Kd Inst Asal',
            'Kd_SubInstAsal' => 'Kd Sub Inst Asal',
            'Kd_InstTuju' => 'Kd Inst Tuju',
            'Kd_SubInstTuju' => 'Kd Sub Inst Tuju',
            'Kd_DokterAsal' => 'Kd Dokter Asal',
            'PhotoLama' => 'Photo Lama',
            'KeteranganKlinik' => 'Keterangan Klinik',
            'JenisPemeriksaan' => 'Jenis Pemeriksaan',
            'No_Film' => 'No Film',
            'HasilPemeriksaan' => 'Hasil Pemeriksaan',
            'Kd_DokterPem' => 'Kd Dokter Pem',
            'No_TranTind' => 'No Tran Tind',
            'TanggalPem' => 'Tanggal Pem',
            'TanggalSample' => 'Tanggal Sample',
            'TanggalAmbilHasil' => 'Tanggal Ambil Hasil',
            'Lokasi' => 'Lokasi',
            'KodeSifat' => 'Kode Sifat',
        ];
    }
}
