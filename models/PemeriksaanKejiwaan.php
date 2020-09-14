<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mcu.pemeriksaan_kejiwaan".
 *
 * @property int $id_pemeriksaan_kejiwaan
 * @property string $no_rekam_medik
 * @property string $rs_pendukung
 * @property string $status
 * @property string $tanggal_created
 */
class PemeriksaanKejiwaan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.pemeriksaan_kejiwaan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_rekam_medik', 'rs_pendukung', 'status', 'tanggal_created'], 'required'],
            [['tanggal_created'], 'safe'],
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
            'id_pemeriksaan_kejiwaan' => 'Id Pemeriksaan Kejiwaan',
            'no_rekam_medik' => 'No Rekam Medik',
            'rs_pendukung' => 'Rs Pendukung',
            'status' => 'Status',
            'tanggal_created' => 'Tanggal Created',
        ];
    }
}
