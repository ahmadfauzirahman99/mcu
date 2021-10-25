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
            'u_id' => 'ID',
            'u_nik' => 'Nik',
            'u_rm' => 'Rm',
            'u_no_mcu' => 'No Mcu',
            'u_nama_depan' => 'Nama Depan',
            'u_nama_belakang' => 'Nama Belakang',
            'u_email' => 'Email',
            'u_alamat' => 'Alamat',
            'u_kab' => 'Kab',
            'u_provinsi' => 'Provinsi',
            'u_jkel' => 'Jkel',
            'u_tgl_lahir' => 'Tgl Lahir',
            'u_tmpt_lahir' => 'Tmpt Lahir',
            'u_no_hp' => 'No Hp',
            'u_password' => 'Password',
            'u_status' => 'Status',
            'u_level' => 'Level',
            'u_auth_key' => 'Auth Key',
            'u_last_login' => 'Last Login',
            'u_updated_at' => 'Updated At',
            'u_created_at' => 'Created At',
            'u_agama' => 'Agama',
            'u_kedudukan_keluarga' => 'Kedudukan Keluarga',
            'u_status_nikah' => 'Status Nikah',
            'u_pekerjaan' => 'Pekerjaan',
            'u_pekerjaan_nama' => 'Pekerjaan Nama',
            'u_jabatan_pekerjaan' => 'Jabatan Pekerjaan',
            'u_pendidikan' => 'Pendidikan',
            'u_nama_ayah' => 'Nama Ayah',
            'u_nama_ibu' => 'Nama Ibu',
            'u_nama_pasangan' => 'Nama Pasangan',
            'u_anggota_darurat' => 'Anggota Darurat',
            'u_anggota_darurat_ket' => 'Anggota Darurat Ket',
            'u_tgl_terakhir_mcu' => 'Tgl Terakhir Mcu',
            'u_dokter' => 'Dokter',
            'u_alamat_dokter' => 'Alamat Dokter',
            'u_jabatan' => 'Jabatan',
            'u_formasi' => 'Formasi',
            'u_jadwal_id' => 'Jadwal ID',
            'u_biodata_finish_at' => 'Biodata Finish At',
            'u_berkas_finish_at' => 'Berkas Finish At',
            'u_kuisioner1_finish_at' => 'Kuisioner1 Finish At',
            'u_kuisioner2_finish_at' => 'Kuisioner2 Finish At',
            'u_finish_at' => 'Finish At',
            'u_jadwal_asli_id' => 'Jadwal Asli ID',
            'u_debitur_id' => 'Debitur ID',
            'u_disclaimer' => 'Disclaimer',
        ];
    }
}
