<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $ud_id
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
class UserdaftarRegister extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_daftar';
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
            [['ud_nik', 'ud_nama_depan'], 'required'],
            [['ud_no_mcu', 'ud_agama', 'ud_jadwal_id', 'ud_jadwal_asli_id'], 'integer'],
            [['ud_alamat', 'ud_jkel', 'ud_status', 'ud_level', 'ud_anggota_darurat', 'ud_alamat_dokter'], 'string'],
            [['ud_tgl_lahir', 'ud_last_login', 'ud_updated_at', 'ud_created_at', 'ud_tgl_terakhir_mcu', 'ud_biodata_finish_at', 'ud_berkas_finish_at', 'ud_kuisioner1_finish_at', 'ud_kuisioner2_finish_at', 'ud_finish_at'], 'safe'],
            [['ud_disclaimer'], 'boolean'],
            [['ud_nik', 'ud_rm'], 'string', 'max' => 50],
            [['ud_nama_depan', 'ud_nama_belakang', 'ud_email', 'ud_kab', 'ud_provinsi', 'ud_tmpt_lahir', 'ud_password', 'ud_auth_key', 'ud_kedudukan_keluarga', 'ud_pekerjaan', 'ud_pekerjaan_nama', 'ud_jabatan_pekerjaan', 'ud_pendidikan', 'ud_nama_ayah', 'ud_nama_ibu', 'ud_nama_pasangan', 'ud_anggota_darurat_ket', 'ud_dokter', 'ud_jabatan', 'ud_formasi'], 'string', 'max' => 255],
            [['ud_no_hp'], 'string', 'max' => 20],
            [['ud_status_nikah'], 'string', 'max' => 1],
            [['ud_debitur_id'], 'string', 'max' => 4],
            [['ud_nik'], 'unique'],
            [['ud_email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ud_id' => 'U ID',
            'ud_nik' => 'U Nik',
            'ud_rm' => 'U Rm',
            'ud_no_mcu' => 'U No Mcu',
            'ud_nama_depan' => 'U Nama Depan',
            'ud_nama_belakang' => 'U Nama Belakang',
            'ud_email' => 'U Email',
            'ud_alamat' => 'U Alamat',
            'ud_kab' => 'U Kab',
            'ud_provinsi' => 'U Provinsi',
            'ud_jkel' => 'U Jkel',
            'ud_tgl_lahir' => 'U Tgl Lahir',
            'ud_tmpt_lahir' => 'U Tmpt Lahir',
            'ud_no_hp' => 'U No Hp',
            'ud_password' => 'U Password',
            'ud_status' => 'U Status',
            'ud_level' => 'U Level',
            'ud_auth_key' => 'U Auth Key',
            'ud_last_login' => 'U Last Login',
            'ud_updated_at' => 'U Updated At',
            'ud_created_at' => 'U Created At',
            'ud_agama' => 'U Agama',
            'ud_kedudukan_keluarga' => 'U Kedudukan Keluarga',
            'ud_status_nikah' => 'U Status Nikah',
            'ud_pekerjaan' => 'U Pekerjaan',
            'ud_pekerjaan_nama' => 'U Pekerjaan Nama',
            'ud_jabatan_pekerjaan' => 'U Jabatan Pekerjaan',
            'ud_pendidikan' => 'U Pendidikan',
            'ud_nama_ayah' => 'U Nama Ayah',
            'ud_nama_ibu' => 'U Nama Ibu',
            'ud_nama_pasangan' => 'U Nama Pasangan',
            'ud_anggota_darurat' => 'U Anggota Darurat',
            'ud_anggota_darurat_ket' => 'U Anggota Darurat Ket',
            'ud_tgl_terakhir_mcu' => 'U Tgl Terakhir Mcu',
            'ud_dokter' => 'U Dokter',
            'ud_alamat_dokter' => 'U Alamat Dokter',
            'ud_jabatan' => 'U Jabatan',
            'ud_formasi' => 'U Formasi',
            'ud_jadwal_id' => 'U Jadwal ID',
            'ud_biodata_finish_at' => 'U Biodata Finish At',
            'ud_berkas_finish_at' => 'U Berkas Finish At',
            'ud_kuisioner1_finish_at' => 'U Kuisioner1 Finish At',
            'ud_kuisioner2_finish_at' => 'U Kuisioner2 Finish At',
            'ud_finish_at' => 'U Finish At',
            'ud_jadwal_asli_id' => 'U Jadwal Asli ID',
            'ud_debitur_id' => 'U Debitur ID',
            'ud_disclaimer' => 'U Disclaimer',
        ];
    }
}
