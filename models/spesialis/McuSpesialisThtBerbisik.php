<?php

namespace app\models\spesialis;

use Yii;

/**
 * This is the model class for table "mcu.spesialis_tht_berbisik".
 *
 * @property int $id_spesialis_tht_berbisik
 * @property string $no_rekam_medik
 * @property string $no_daftar
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $tl_test_berbisik_telinga_kanan_6
 * @property string|null $tl_test_berbisik_telinga_kiri_6
 * @property string|null $tl_test_berbisik_telinga_kanan_4
 * @property string|null $tl_test_berbisik_telinga_kiri_4
 * @property string|null $tl_test_berbisik_telinga_kanan_3
 * @property string|null $tl_test_berbisik_telinga_kiri_3
 * @property string|null $tl_test_berbisik_telinga_kanan_1
 * @property string|null $tl_test_berbisik_telinga_kiri_1
 * @property string|null $kesimpulan
 * @property string|null $riwayat
 */
class McuSpesialisThtBerbisik extends BaseAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.spesialis_tht_berbisik';
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
            [['kesimpulan', 'riwayat'], 'string'],
            [['no_rekam_medik'], 'string', 'max' => 120],
            [['tl_test_berbisik_telinga_kanan_6', 'tl_test_berbisik_telinga_kiri_6', 'tl_test_berbisik_telinga_kanan_4', 'tl_test_berbisik_telinga_kiri_4', 'tl_test_berbisik_telinga_kanan_3', 'tl_test_berbisik_telinga_kiri_3', 'tl_test_berbisik_telinga_kanan_1', 'tl_test_berbisik_telinga_kiri_1'], 'string', 'max' => 70],
        
            ['no_daftar', 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_spesialis_tht_berbisik' => 'Id Spesialis Tht Berbisik',
            'no_rekam_medik' => 'No Rekam Medik',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'tl_test_berbisik_telinga_kanan_6' => 'Tl Test Berbisik Telinga Kanan 6',
            'tl_test_berbisik_telinga_kiri_6' => 'Tl Test Berbisik Telinga Kiri 6',
            'tl_test_berbisik_telinga_kanan_4' => 'Tl Test Berbisik Telinga Kanan 4',
            'tl_test_berbisik_telinga_kiri_4' => 'Tl Test Berbisik Telinga Kiri 4',
            'tl_test_berbisik_telinga_kanan_3' => 'Tl Test Berbisik Telinga Kanan 3',
            'tl_test_berbisik_telinga_kiri_3' => 'Tl Test Berbisik Telinga Kiri 3',
            'tl_test_berbisik_telinga_kanan_1' => 'Tl Test Berbisik Telinga Kanan 1',
            'tl_test_berbisik_telinga_kiri_1' => 'Tl Test Berbisik Telinga Kiri 1',
            'kesimpulan' => 'Kesimpulan',
            'riwayat' => 'Riwayat',
        ];
    }

    /**
     * {@inheritdoc}
     * @return McuSpesialisThtBerbisikQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new McuSpesialisThtBerbisikQuery(get_called_class());
    }
}
