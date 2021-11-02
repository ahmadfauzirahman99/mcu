<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mcu.jenis_pekerjaan".
 *
 * @property int $id_jenis_pekerjaan
 * @property string|null $jenis_pekerjaan
 * @property string|null $bahan_material
 * @property string|null $tempat_kerja
 * @property string|null $masa_kerja
 * @property string|null $no_rekam_medik
 * @property string|null $tanggal_created
 */
class JenisPekerjaan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.jenis_pekerjaan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jenis_pekerjaan', 'bahan_material'], 'string'],
            [['tanggal_created'], 'safe'],
            [['tempat_kerja', 'masa_kerja', 'no_rekam_medik'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_jenis_pekerjaan' => 'Id Jenis Pekerjaan',
            'jenis_pekerjaan' => 'Jenis Pekerjaan',
            'bahan_material' => 'Bahan Material',
            'tempat_kerja' => 'Tempat Kerja',
            'masa_kerja' => 'Masa Kerja',
            'no_rekam_medik' => 'No Rekam Medik',
            'tanggal_created' => 'Tanggal Created',
        ];
    }
}
