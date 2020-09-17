<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

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
 * @property string|null $dokter
 * @property string|null $skala_l
 * @property string|null $skala_p
 * @property string|null $skala_k
 * @property string|null $skala_1_hs
 * @property string|null $skala_2_d
 * @property string|null $skala_3_hy
 * @property string|null $skala_4_pd
 * @property string|null $skala_5_mf
 * @property string|null $skala_6_pa
 * @property string|null $skala_7_pt
 * @property string|null $skala_8_sc
 * @property string|null $skala_9_ma
 * @property string|null $skala_0_si
 * @property string|null $validitas
 * @property string|null $interpretasi_subtantif
 * @property string|null $saran
 * @property string|null $kesimpulan
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
            [['no_rekam_medik', 'rs_pendukung'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'default', 'value' => null],
            [['created_by', 'updated_by', 'status'], 'integer'],
            [['no_rekam_medik'], 'string', 'max' => 120],
            [['rs_pendukung'], 'string', 'max' => 50],
            [['dokter'], 'string', 'max' => 35],
            [['skala_l', 'skala_p', 'skala_k', 'skala_1_hs', 'skala_2_d', 'skala_3_hy', 'skala_4_pd', 'skala_5_mf', 'skala_6_pa', 'skala_7_pt', 'skala_8_sc', 'skala_9_ma', 'skala_0_si'], 'string', 'max' => 15],
            [['validitas', 'saran'], 'string', 'max' => 200],
            [['interpretasi_subtantif'], 'string', 'max' => 500],
            [['kesimpulan'], 'string', 'max' => 200],
            [['cari_pasien'], 'safe'],
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
            'rs_pendukung' => 'Rs Pendukung',
            'dokter' => 'Dokter',
            'skala_l' => 'Skala L',
            'skala_p' => 'Skala P',
            'skala_k' => 'Skala K',
            'skala_1_hs' => 'Skala 1 Hs',
            'skala_2_d' => 'Skala 2 D',
            'skala_3_hy' => 'Skala 3 Hy',
            'skala_4_pd' => 'Skala 4 Pd',
            'skala_5_mf' => 'Skala 5 Mf',
            'skala_6_pa' => 'Skala 6 Pa',
            'skala_7_pt' => 'Skala 7 Pt',
            'skala_8_sc' => 'Skala 8 Sc',
            'skala_9_ma' => 'Skala 9 Ma',
            'skala_0_si' => 'Skala 0 Si',
            'validitas' => 'Validitas',
            'interpretasi_subtantif' => 'Interpretasi Subtantif',
            'saran' => 'Saran',
            'kesimpulan' => 'Kesimpulan',
            'status' => 'Status',
        ];
    }
}
