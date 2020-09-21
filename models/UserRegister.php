<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $u_id
 * @property string $u_nik
 * @property string|null $u_rm
 * @property int|null $u_no_mcu
 * @property string $u_nama_depan
 * @property string|null $u_nama_belakang
 * @property string|null $u_email
 * @property string|null $u_alamat
 * @property string|null $u_kab
 * @property string|null $u_provinsi
 * @property string|null $u_jkel p=perempuan,l=laki-laki
 * @property string|null $u_tgl_lahir
 * @property string|null $u_tmpt_lahir
 * @property string|null $u_no_hp
 * @property string|null $u_password
 * @property string|null $u_status 0=tidak aktif,1=aktif
 * @property string $u_level 1=admin,2=peserta
 * @property string|null $u_auth_key
 * @property string|null $u_last_login
 * @property string|null $u_updated_at
 * @property string|null $u_created_at
 * @property int|null $u_agama 1=islam,2=kristen,3=protestan,4=hindu,5=budha
 * @property string|null $u_kedudukan_keluarga kedudukan dalam keluarga
 * @property string|null $u_status_nikah 1=nikah,2=belum nikah,3=janda,4=duda
 * @property string|null $u_pekerjaan
 * @property string|null $u_pekerjaan_nama
 * @property string|null $u_jabatan_pekerjaan
 * @property string|null $u_pendidikan pendidikan terakhir
 * @property string|null $u_nama_ayah
 * @property string|null $u_nama_ibu
 * @property string|null $u_nama_pasangan
 * @property string $u_anggota_darurat 0=tidak, 1= iya
 * @property string|null $u_anggota_darurat_ket
 * @property string|null $u_tgl_terakhir_mcu
 * @property string|null $u_dokter
 * @property string|null $u_alamat_dokter
 * @property string|null $u_jabatan
 * @property string|null $u_formasi
 * @property int|null $u_jadwal_id
 * @property string|null $u_biodata_finish_at
 * @property string|null $u_berkas_finish_at
 * @property string|null $u_kuisioner1_finish_at
 * @property string|null $u_kuisioner2_finish_at
 * @property string|null $u_finish_at
 * @property int|null $u_jadwal_asli_id
 * @property string|null $u_debitur_id
 * @property bool|null $u_disclaimer
 */
class UserRegister extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('dbRegisterMcu');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['u_nik', 'u_nama_depan'], 'required'],
            [['u_no_mcu', 'u_agama', 'u_jadwal_id', 'u_jadwal_asli_id'], 'integer'],
            [['u_alamat', 'u_jkel', 'u_status', 'u_level', 'u_anggota_darurat', 'u_alamat_dokter'], 'string'],
            [['u_tgl_lahir', 'u_last_login', 'u_updated_at', 'u_created_at', 'u_tgl_terakhir_mcu', 'u_biodata_finish_at', 'u_berkas_finish_at', 'u_kuisioner1_finish_at', 'u_kuisioner2_finish_at', 'u_finish_at'], 'safe'],
            [['u_disclaimer'], 'boolean'],
            [['u_nik', 'u_rm'], 'string', 'max' => 50],
            [['u_nama_depan', 'u_nama_belakang', 'u_email', 'u_kab', 'u_provinsi', 'u_tmpt_lahir', 'u_password', 'u_auth_key', 'u_kedudukan_keluarga', 'u_pekerjaan', 'u_pekerjaan_nama', 'u_jabatan_pekerjaan', 'u_pendidikan', 'u_nama_ayah', 'u_nama_ibu', 'u_nama_pasangan', 'u_anggota_darurat_ket', 'u_dokter', 'u_jabatan', 'u_formasi'], 'string', 'max' => 255],
            [['u_no_hp'], 'string', 'max' => 20],
            [['u_status_nikah'], 'string', 'max' => 1],
            [['u_debitur_id'], 'string', 'max' => 4],
            [['u_nik'], 'unique'],
            [['u_email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'u_id' => 'U ID',
            'u_nik' => 'U Nik',
            'u_rm' => 'U Rm',
            'u_no_mcu' => 'U No Mcu',
            'u_nama_depan' => 'U Nama Depan',
            'u_nama_belakang' => 'U Nama Belakang',
            'u_email' => 'U Email',
            'u_alamat' => 'U Alamat',
            'u_kab' => 'U Kab',
            'u_provinsi' => 'U Provinsi',
            'u_jkel' => 'U Jkel',
            'u_tgl_lahir' => 'U Tgl Lahir',
            'u_tmpt_lahir' => 'U Tmpt Lahir',
            'u_no_hp' => 'U No Hp',
            'u_password' => 'U Password',
            'u_status' => 'U Status',
            'u_level' => 'U Level',
            'u_auth_key' => 'U Auth Key',
            'u_last_login' => 'U Last Login',
            'u_updated_at' => 'U Updated At',
            'u_created_at' => 'U Created At',
            'u_agama' => 'U Agama',
            'u_kedudukan_keluarga' => 'U Kedudukan Keluarga',
            'u_status_nikah' => 'U Status Nikah',
            'u_pekerjaan' => 'U Pekerjaan',
            'u_pekerjaan_nama' => 'U Pekerjaan Nama',
            'u_jabatan_pekerjaan' => 'U Jabatan Pekerjaan',
            'u_pendidikan' => 'U Pendidikan',
            'u_nama_ayah' => 'U Nama Ayah',
            'u_nama_ibu' => 'U Nama Ibu',
            'u_nama_pasangan' => 'U Nama Pasangan',
            'u_anggota_darurat' => 'U Anggota Darurat',
            'u_anggota_darurat_ket' => 'U Anggota Darurat Ket',
            'u_tgl_terakhir_mcu' => 'U Tgl Terakhir Mcu',
            'u_dokter' => 'U Dokter',
            'u_alamat_dokter' => 'U Alamat Dokter',
            'u_jabatan' => 'U Jabatan',
            'u_formasi' => 'U Formasi',
            'u_jadwal_id' => 'U Jadwal ID',
            'u_biodata_finish_at' => 'U Biodata Finish At',
            'u_berkas_finish_at' => 'U Berkas Finish At',
            'u_kuisioner1_finish_at' => 'U Kuisioner1 Finish At',
            'u_kuisioner2_finish_at' => 'U Kuisioner2 Finish At',
            'u_finish_at' => 'U Finish At',
            'u_jadwal_asli_id' => 'U Jadwal Asli ID',
            'u_debitur_id' => 'U Debitur ID',
            'u_disclaimer' => 'U Disclaimer',
        ];
    }
}
