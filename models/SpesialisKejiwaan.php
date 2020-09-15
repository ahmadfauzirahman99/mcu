<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mcu.spesialis_kejiwaan".
 *
 * @property int $id_spesialis_kejiwaan
 * @property string $no_rekam_medik
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string $rs_pendukung
 * @property string|null $status
 */
class SpesialisKejiwaan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.spesialis_kejiwaan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_rekam_medik', 'rs_pendukung'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'default', 'value' => null],
            [['created_by', 'updated_by'], 'integer'],
            [['no_rekam_medik'], 'string', 'max' => 120],
            [['rs_pendukung', 'status'], 'string', 'max' => 12],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_spesialis_kejiwaan' => 'Id Spesialis Kejiwaan',
            'no_rekam_medik' => 'No Rekam Medik',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'rs_pendukung' => 'Rumah Sakit Pendukung',
            'status' => 'Status Gangguan Jiwa',
        ];
    }
}
