<?php

namespace app\models;

use Yii;

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
    public function rules()
    {
        return [
            [['no_rekam_medik'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'default', 'value' => null],
            [['created_by', 'updated_by'], 'integer'],
            [['no_rekam_medik'], 'string', 'max' => 120],
            [['golongan_psikotropika', 'hasil_psikotropika', 'golongan_narkotika', 'hasil_narkotika'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_spesialis_narkoba' => 'Id Spesialis Narkoba',
            'no_rekam_medik' => 'No Rekam Medik',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'golongan_psikotropika' => 'Golongan Psikotropika',
            'hasil_psikotropika' => 'Hasil Psikotropika',
            'golongan_narkotika' => 'Golongan Narkotika',
            'hasil_narkotika' => 'Hasil Narkotika',
        ];
    }
}
