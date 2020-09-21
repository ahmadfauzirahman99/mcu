<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "mcu.spesialis_narkoba".
 *
 * @property int $id_spesialis_narkoba
 * @property string $no_rekam_medik
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $golongan_psikotropika
 * @property string|null $hasil_psikotropika
 * @property string|null $golongan_narkotika
 * @property string|null $hasil_narkotika
 */
class SpesialisNarkoba extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.spesialis_narkoba';
    }

    /**
     * {@inheritdoc}
     */

    public $cari_pasien;

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'value' => date('Y-m-d H:i:s'),
            ],
            // BlameableBehavior::className(),
        ];
    }

    public function rules()
    {
        return [
            [['no_rekam_medik'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'default', 'value' => null],
            [['created_by', 'updated_by'], 'integer'],
            [['no_rekam_medik'], 'string', 'max' => 120],
            [['benzodiazepin_hasil', 'benzodiazepin_keterangan', 'thc_hasil', 'thc_keterangan', 'opiat_hasil', 'opiat_keterangan', 'amphetammin_hasil', 'amphetammin_keterangan', 'kokain_hasil', 'kokain_keterangan', 'methamphetamin_hasil', 'methamphetamin_keterangan', 'carisoprodol_hasil', 'carisoprodol_keterangan'], 'string', 'max' => 30],
            [['cari_pasien'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_spesialis_narkoba' => 'Id Spesialis Narkoba',
            'nama_no_rm' => 'Nama / No RM',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'benzodiazepin_hasil' => 'Benzodiazepin Hasil',
            'benzodiazepin_keterangan' => 'Benzodiazepin Keterangan',
            'thc_hasil' => 'THC Hasil',
            'thc_keterangan' => 'THC Keterangan',
            'opiat_hasil' => 'Opiat Hasil',
            'opiat_keterangan' => 'Opiat Keterangan',
            'amphetammin_hasil' => 'Amphetammin Hasil',
            'amphetammin_keterangan' => 'Amphetammin Keterangan',
            'kokain_hasil' => 'Kokain Hasil',
            'kokain_keterangan' => 'Kokain Keterangan',
            'methamphetamin_hasil' => 'Kokain Keterangan',
            'methamphetamin_keterangan' => 'Methamphetamin Keterangan',
            'carisoprodol_hasil' => 'Carisoprodol Hasil',
            'carisoprodol_keterangan' => 'Crisoprodol Keterangan'
        ];
    }

    public function getPasien()
    {
        return $this->hasOne(DataLayanan::className(), ['no_rekam_medik' => 'no_rekam_medik']);
    }

    public function getNama_no_rm()
    {
        return $this->pasien->nama . ' (' . $this->no_rekam_medik . ')';
    }
}
