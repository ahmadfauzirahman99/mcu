<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mcu.pemeriksaan_ekg".
 *
 * @property int $id_ekg
 * @property string|null $hasil_ekg
 * @property string $kesimpulan
 * @property string|null $kesan
 * @property string|null $create_at
 * @property string|null $created_by
 * @property string|null $update_at
 * @property string|null $update_by
 * @property string|null $no_rekam_medik
 * @property string|null $no_daftar
 */
class PemeriksaanEkg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.pemeriksaan_ekg';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hasil_ekg', 'kesimpulan', 'created_by', 'update_by', 'no_rekam_medik', 'no_daftar'], 'string'],
            [['kesimpulan'], 'required'],
            [['create_at', 'update_at'], 'safe'],
            [['kesan'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_ekg' => 'Id Ekg',
            'hasil_ekg' => 'Hasil Ekg',
            'kesimpulan' => 'Kesimpulan',
            'kesan' => 'Kesan',
            'create_at' => 'Create At',
            'created_by' => 'Created By',
            'update_at' => 'Update At',
            'update_by' => 'Update By',
            'no_rekam_medik' => 'No Rekam Medik',
            'no_daftar' => 'No Daftar',
        ];
    }
}
