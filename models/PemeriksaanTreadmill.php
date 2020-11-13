<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mcu.treadmill".
 *
 * @property int $id_tread
 * @property string|null $no_daftar
 * @property string|null $no_rekam_medik
 * @property string|null $hasil_treadmill
 * @property string|null $kesan
 * @property string|null $kesimpulan
 * @property string|null $created_at
 * @property string|null $created_by
 * @property string|null $update_at
 * @property string|null $update_by
 */
class PemeriksaanTreadmill extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.treadmill';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'update_at'], 'safe'],
            [['no_daftar', 'no_rekam_medik', 'hasil_treadmill', 'kesan', 'kesimpulan', 'created_by', 'update_by'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tread' => 'Id Tread',
            'no_daftar' => 'No Daftar',
            'no_rekam_medik' => 'No Rekam Medik',
            'hasil_treadmill' => 'Hasil Treadmill',
            'kesan' => 'Kesan',
            'kesimpulan' => 'Kesimpulan',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'update_at' => 'Update At',
            'update_by' => 'Update By',
        ];
    }
}
