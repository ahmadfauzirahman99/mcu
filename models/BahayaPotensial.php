<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mcu.bahaya_potensial".
 *
 * @property int $id_bahaya_potensial
 * @property string|null $urutan_kegiatan
 * @property string|null $fisik
 * @property string|null $kimia
 * @property string|null $biologi
 * @property string|null $ergonomi
 * @property string|null $tanggal_created
 * @property string|null $no_rekam_medik
 * @property string|null $psiko
 * @property string|null $no_daftar
 */
class BahayaPotensial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.bahaya_potensial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fisik', 'kimia', 'biologi', 'ergonomi','no_daftar','psiko'], 'string'],
            [['tanggal_created'], 'safe'],
            [['urutan_kegiatan', 'no_rekam_medik'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_bahaya_potensial' => 'Id Bahaya Potensial',
            'urutan_kegiatan' => 'Urutan Kegiatan',
            'fisik' => 'Fisik',
            'kimia' => 'Kimia',
            'biologi' => 'Biologi',
            'ergonomi' => 'Ergonomi',
            'tanggal_created' => 'Tanggal Created',
            'no_rekam_medik' => 'No Rekam Medik',
        ];
    }
}
