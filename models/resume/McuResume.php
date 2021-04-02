<?php

namespace app\models\resume;

use Yii;

/**
 * This is the model class for table "mcu.resume".
 *
 * @property int $id_resume
 * @property string $no_rekam_medik
 * @property string|null $no_daftar
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string $jenis_pemeriksaan
 * @property string $tidak_normal
 * @property string|null $riwayat
 */
class McuResume extends \app\models\spesialis\BaseAR
{
    CONST JP_FISIK = 'FISIK';
    CONST JP_SPESIALIS_MATA = 'SPESIALIS-MATA';
    CONST JP_SPESIALIS_GIGI = 'SPESIALIS-GIGI';
    CONST JP_SPESIALIS_THT = 'SPESIALIS-THT';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.resume';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_rekam_medik', 'tidak_normal'], 'required'],
            [['no_daftar', 'tidak_normal', 'riwayat'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'default', 'value' => null],
            [['created_by', 'updated_by'], 'integer'],
            [['no_rekam_medik'], 'string', 'max' => 120],
            [['jenis_pemeriksaan'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_resume' => 'Id Resume',
            'no_rekam_medik' => 'No Rekam Medik',
            'no_daftar' => 'No Daftar',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'jenis_pemeriksaan' => 'Jenis Pemeriksaan',
            'tidak_normal' => 'Tidak Normal',
            'riwayat' => 'Riwayat',
        ];
    }

    /**
     * {@inheritdoc}
     * @return McuResumeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new McuResumeQuery(get_called_class());
    }
}
