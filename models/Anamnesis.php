<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mcu.pertanyaan_anmnesis".
 *
 * @property int $id_anamnesis
 * @property string|null $jawaban1
 * @property string|null $jawaban2
 * @property string|null $jawaban3
 * @property string|null $jawaban4
 * @property string|null $jawaban5
 * @property string|null $jawaban6
 * @property string|null $jawaban7
 * @property int|null $nomor_rekam_medik
 * @property int|null $g
 * @property int|null $p
 * @property int|null $a
 * @property int|null $h
 * @property string|null $jawaban8
 */
class Anamnesis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.pertanyaan_anmnesis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jawaban1', 'jawaban2', 'jawaban3', 'jawaban4', 'jawaban5', 'jawaban6', 'jawaban7', 'jawaban8'], 'string'],
            [['nomor_rekam_medik', 'g', 'p', 'a', 'h'], 'default', 'value' => null],
            [['nomor_rekam_medik', 'g', 'p', 'a', 'h'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_anamnesis' => 'Id Anamnesis',
            'jawaban1' => 'Jawaban ',
            'jawaban2' => 'Jawaban ',
            'jawaban3' => 'Jawaban ',
            'jawaban4' => 'Jawaban ',
            'jawaban5' => 'Jawaban ',
            'jawaban6' => 'Jawaban ',
            'jawaban7' => 'Jawaban Hubungan Pekerjaan',
            'nomor_rekam_medik' => 'Nomor Rekam Medik',
            'g' => 'G',
            'p' => 'P',
            'a' => 'A',
            'h' => 'H',
            'jawaban8' => 'Jawaban',
        ];
    }
}
