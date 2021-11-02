<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_kusioner_biodata".
 *
 * @property int $ukb_id
 * @property int $ukb_user_id
 * @property string|null $ukb_krj_sebelum
 * @property string|null $ukb_krj_sebelum_perusahaan
 * @property string|null $ukb_krj_skrg
 * @property string|null $ukb_krj_skrg_perusahaan
 * @property string|null $ukb_krj_dituju
 * @property string|null $ukb_krj_dituju_perusahaan
 * @property string|null $ukb_sblm_utama_uraian
 * @property string|null $ukb_sblm_utama_target
 * @property string|null $ukb_sblm_utama_cara
 * @property string|null $ukb_sblm_utama_alat
 * @property string|null $ukb_sblm_tambah_uraian
 * @property string|null $ukb_sblm_tambah_target
 * @property string|null $ukb_sblm_tambah_cara
 * @property string|null $ukb_sblm_tambah_alat
 * @property string|null $ukb_skrg_utama_uraian
 * @property string|null $ukb_skrg_utama_target
 * @property string|null $ukb_skrg_utama_cara
 * @property string|null $ukb_skrg_utama_alat
 * @property string|null $ukb_skrg_tambah_uraian
 * @property string|null $ukb_skrg_tambah_target
 * @property string|null $ukb_skrg_tambah_cara
 * @property string|null $ukb_skrg_tambah_alat
 * @property string|null $ukb_dituju_utama_uraian
 * @property string|null $ukb_dituju_utama_target
 * @property string|null $ukb_dituju_utama_cara
 * @property string|null $ukb_dituju_utama_alat
 * @property string|null $ukb_dituju_tambah_uraian
 * @property string|null $ukb_dituju_tambah_target
 * @property string|null $ukb_dituju_tambah_cara
 * @property string|null $ukb_dituju_tambah_alat
 * @property string|null $ukb_updated_at
 * @property string|null $ukb_created_at
 */
class UserKusionerBiodata extends \yii\db\ActiveRecord
{

    public $is_sebelum,$is_sekarang,$is_dituju;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_kusioner_biodata';
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
            [['ukb_user_id'], 'required'],
            [['ukb_user_id'], 'integer'],
            [['is_sebelum','is_sekarang','is_dituju'],'string','max'=>1],

            [['ukb_sblm_utama_uraian', 'ukb_sblm_utama_target', 'ukb_sblm_utama_cara', 'ukb_sblm_utama_alat', 'ukb_sblm_tambah_uraian', 'ukb_sblm_tambah_target', 'ukb_sblm_tambah_cara', 'ukb_sblm_tambah_alat', 'ukb_skrg_utama_uraian', 'ukb_skrg_utama_target', 'ukb_skrg_utama_cara', 'ukb_skrg_utama_alat', 'ukb_skrg_tambah_uraian', 'ukb_skrg_tambah_target', 'ukb_skrg_tambah_cara', 'ukb_skrg_tambah_alat', 'ukb_dituju_utama_uraian', 'ukb_dituju_utama_target', 'ukb_dituju_utama_cara', 'ukb_dituju_utama_alat', 'ukb_dituju_tambah_uraian', 'ukb_dituju_tambah_target', 'ukb_dituju_tambah_cara', 'ukb_dituju_tambah_alat'], 'string'],
            [['ukb_updated_at', 'ukb_created_at'], 'safe'],
            [['ukb_krj_sebelum', 'ukb_krj_sebelum_perusahaan', 'ukb_krj_skrg', 'ukb_krj_skrg_perusahaan', 'ukb_krj_dituju', 'ukb_krj_dituju_perusahaan'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ukb_id' => 'Ukb ID',
            'ukb_user_id' => 'Ukb User ID',
            'ukb_krj_sebelum' => 'Pekerjaan Sebelumnya',
            'ukb_krj_sebelum_perusahaan'=>'Perusahaan Sebelumnya',
            'ukb_krj_skrg' => 'Pekerjaan Sekarang',
            'ukb_krj_skrg_perusahaan'=>'Perusahaan Sekarang',
            'ukb_krj_dituju' => 'Pekerjaan Dituju',
            'ukb_krj_dituju_perusahaan'=>'Perusahaan Dituju',
            'ukb_sblm_utama_uraian' => 'Ukb Sblm Utama Uraian',
            'ukb_sblm_utama_target' => 'Ukb Sblm Utama Target',
            'ukb_sblm_utama_cara' => 'Ukb Sblm Utama Cara',
            'ukb_sblm_utama_alat' => 'Ukb Sblm Utama Alat',
            'ukb_sblm_tambah_uraian' => 'Ukb Sblm Tambah Uraian',
            'ukb_sblm_tambah_target' => 'Ukb Sblm Tambah Target',
            'ukb_sblm_tambah_cara' => 'Ukb Sblm Tambah Cara',
            'ukb_sblm_tambah_alat' => 'Ukb Sblm Tambah Alat',
            'ukb_skrg_utama_uraian' => 'Ukb Skrg Utama Uraian',
            'ukb_skrg_utama_target' => 'Ukb Skrg Utama Target',
            'ukb_skrg_utama_cara' => 'Ukb Skrg Utama Cara',
            'ukb_skrg_utama_alat' => 'Ukb Skrg Utama Alat',
            'ukb_skrg_tambah_uraian' => 'Ukb Skrg Tambah Uraian',
            'ukb_skrg_tambah_target' => 'Ukb Skrg Tambah Target',
            'ukb_skrg_tambah_cara' => 'Ukb Skrg Tambah Cara',
            'ukb_skrg_tambah_alat' => 'Ukb Skrg Tambah Alat',
            'ukb_dituju_utama_uraian' => 'Ukb Dituju Utama Uraian',
            'ukb_dituju_utama_target' => 'Ukb Dituju Utama Target',
            'ukb_dituju_utama_cara' => 'Ukb Dituju Utama Cara',
            'ukb_dituju_utama_alat' => 'Ukb Dituju Utama Alat',
            'ukb_dituju_tambah_uraian' => 'Ukb Dituju Tambah Uraian',
            'ukb_dituju_tambah_target' => 'Ukb Dituju Tambah Target',
            'ukb_dituju_tambah_cara' => 'Ukb Dituju Tambah Cara',
            'ukb_dituju_tambah_alat' => 'Ukb Dituju Tambah Alat',
            'ukb_updated_at' => 'Ukb Updated At',
            'ukb_created_at' => 'Ukb Created At',
        ];
    }
}
