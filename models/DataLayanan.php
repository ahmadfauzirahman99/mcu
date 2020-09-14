<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mcu.data_pelayanan".
 *
 * @property string $id_data_pelayanan
 * @property string $no_rekam_medik
 * @property string|null $no_mcu
 * @property string $nama
 * @property string|null $tempat
 * @property string|null $tgl_lahir
 * @property string|null $agama
 * @property string|null $kedudukan_dalam_keluarga
 * @property string|null $status_perkawinan
 * @property string|null $pendidikan
 * @property string|null $pekerjaan
 * @property string|null $alamat
 * @property string|null $wni
 * @property string|null $tanggal_pemeriksaan
 * @property string|null $pas_foto_offline
 * @property int|null $pas_foto_online_valid
 * @property string|null $kode_debitur
 * @property int|null $kode_paket
 * @property string|null $no_registrasi
 * @property string|null $jenis_kelamin
 * @property string|null $no_ujian NIK 
 */
class DataLayanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.data_pelayanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_data_pelayanan', 'no_rekam_medik', 'nama'], 'required'],
            [['tgl_lahir', 'tanggal_pemeriksaan'], 'safe'],
            [['alamat', 'pas_foto_offline'], 'string'],
            [['pas_foto_online_valid', 'kode_paket'], 'default', 'value' => null],
            [['pas_foto_online_valid', 'kode_paket'], 'integer'],
            [['id_data_pelayanan', 'no_rekam_medik', 'no_mcu', 'kedudukan_dalam_keluarga', 'jenis_kelamin'], 'string', 'max' => 100],
            [['nama'], 'string', 'max' => 60],
            [['tempat'], 'string', 'max' => 30],
            [['agama'], 'string', 'max' => 10],
            [['status_perkawinan', 'wni'], 'string', 'max' => 20],
            [['pendidikan', 'pekerjaan'], 'string', 'max' => 40],
            [['kode_debitur', 'no_ujian'], 'string', 'max' => 255],
            [['no_registrasi'], 'string', 'max' => 225],
            [['id_data_pelayanan'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_data_pelayanan' => 'Id Data Pelayanan',
            'no_rekam_medik' => 'No Rekam Medik',
            'no_mcu' => 'No Mcu',
            'nama' => 'Nama',
            'tempat' => 'Tempat Lahir',
            'tgl_lahir' => 'Tgl Lahir',
            'agama' => 'Agama',
            'kedudukan_dalam_keluarga' => 'Kedudukan Dalam Keluarga',
            'status_perkawinan' => 'Status Perkawinan',
            'pendidikan' => 'Pendidikan',
            'pekerjaan' => 'Pekerjaan',
            'alamat' => 'Alamat',
            'wni' => 'Warga Negara',
            'tanggal_pemeriksaan' => 'Tanggal Pemeriksaan',
            'pas_foto_offline' => 'Pas Foto Offline',
            'pas_foto_online_valid' => 'Pas Foto Online Valid',
            'kode_debitur' => 'Kode Debitur',
            'kode_paket' => 'Kode Paket',
            'no_registrasi' => 'No Registrasi',
            'jenis_kelamin' => 'Jenis Kelamin',
            'no_ujian' => 'No Ujian',
        ];
    }
}
