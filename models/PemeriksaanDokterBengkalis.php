<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mcu.pemeriksaan_dokter_bengkalis".
 *
 * @property int $id_dokter_bengkalis
 * @property string|null $no_rekam_medik
 * @property string|null $kecerdasan
 * @property string|null $sehat
 * @property string|null $tegap
 * @property string|null $created_by
 * @property string|null $tanggal_created
 * @property string|null $keliatan_muda
 */
class PemeriksaanDokterBengkalis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.pemeriksaan_dokter_bengkalis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_rekam_medik', 'kecerdasan', 'sehat', 'tegap', 'created_by','keliatan_muda'], 'string'],
            [['tanggal_created'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_dokter_bengkalis' => 'Id Dokter Bengkalis',
            'no_rekam_medik' => 'No Rekam Medik',
            'kecerdasan' => 'Kecerdasan',
            'sehat' => 'Sehat',
            'tegap' => 'Tegap',
            'created_by' => 'Created By',
            'tanggal_created' => 'Tanggal Created',
        ];
    }
}
