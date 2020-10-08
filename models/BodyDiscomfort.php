<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mcu.dokter_bertugas".
 *
 * @property int $id_dokter_bertugas
 * @property string|null $no_0_depan
 * @property string|null $tanggal_bertugas
 */
class BodyDiscomfort extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.body_discomfort';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_0_depan'], 'string'],
            [['no_rekam_medik','no_daftar'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_body_discomfort' => 'Id body discomport',
            'no_0_depan' => 'Nomor 0 depan',
            'no_1_depan' => 'Nomor 1 Depan',
            'no_2_depan' => 'Nomor 2 Depan',
            'no_3_depan' => 'Nomor 3 Depan',
            'no_4_depan' => 'Nomor 4 Depan',
            'no_5_depan' => 'Nomor 5 Depan',
            'no_6_depan' => 'Nomor 6 Depan',
            'no_7_depan' => 'Nomor 7 Depan',
            'no_8_depan' => 'Nomor 8 Depan',
            'no_9_depan' => 'Nomor 9 Depan',
            'no_10_depan' => 'Nomor 10 Depan',
            'no_11_depan' => 'Nomor 11 Depan',
            'no_12_depan' => 'Nomor 12 Depan',
            'no_13_depan' => 'Nomor 13 Depan',
            'no_14_depan' => 'Nomor 14 Depan',
            'no_15_depan' => 'Nomor 15 Depan',
            'no_16_depan' => 'Nomor 16 Depan',
            'no_17_depan' => 'Nomor 17 Depan',

            'no_0_belakang' => 'Nomor 0 belakang',
            'no_1_belakang' => 'Nomor 1 belakang',
            'no_2_belakang' => 'Nomor 2 belakang',
            'no_3_belakang' => 'Nomor 3 belakang',
            'no_4_belakang' => 'Nomor 4 belakang',
            'no_5_belakang' => 'Nomor 5 belakang',
            'no_6_belakang' => 'Nomor 6 belakang',
            'no_7_belakang' => 'Nomor 7 belakang',
            'no_8_belakang' => 'Nomor 8 belakang',
            'no_9_belakang' => 'Nomor 9 belakang',
            'no_10_belakang' => 'Nomor 10 belakang',
            'no_11_belakang' => 'Nomor 11 belakang',
            'no_12_belakang' => 'Nomor 12 belakang',
            'no_13_belakang' => 'Nomor 13 belakang',
            'no_14_belakang' => 'Nomor 14 belakang',
            'no_15_belakang' => 'Nomor 15 belakang',
            'no_16_belakang' => 'Nomor 16 belakang',
            'no_17_belakang' => 'Nomor 17 belakang',
        ];
    }
}
