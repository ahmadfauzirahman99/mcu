<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mcu.anamnesa_bengkalis".
 *
 * @property int $id_anamensa_bengkalis
 * @property string|null $jawaban1
 * @property string|null $jawaban2
 * @property string|null $jawaban3
 * @property string|null $jawaban4
 * @property string|null $jawaban5
 * @property string|null $jawaban6
 * @property string|null $jawaban7
 * @property string|null $jawaban8
 * @property string|null $jawaban9
 * @property string|null $jawaban10
 * @property string|null $jawaban11
 * @property string|null $no_rekam_medik
 * @property string|null $tanggal_created
 * @property string|null $created_by
 * @property string|null $no_registrasi
 */
class AnamnesaBengkalis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.anamnesa_bengkalis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jawaban1', 'jawaban2', 'jawaban3', 'jawaban4', 'jawaban5', 'jawaban6', 'jawaban7', 'jawaban8', 'jawaban9', 'jawaban10', 'jawaban11'], 'string'],
            [['no_rekam_medik', 'tanggal_created', 'created_by', 'no_registrasi'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_anamensa_bengkalis' => 'Id Anamensa Bengkalis',
            'jawaban1' => 'Jawaban 1',
            'jawaban2' => 'Jawaban 2',
            'jawaban3' => 'Jawaban 3',
            'jawaban4' => 'Jawaban 4',
            'jawaban5' => 'Jawaban 5',
            'jawaban6' => 'Jawaban 6',
            'jawaban7' => 'Jawaban 7',
            'jawaban8' => 'Jawaban 8',
            'jawaban9' => 'Jawaban 9',
            'jawaban10' => 'Jawaban 10',
            'jawaban11' => 'Jawaban 11',
            'no_rekam_medik' => 'No Rekam Medik',
            'tanggal_created' => 'Tanggal Created',
            'created_by' => 'Created By',
            'no_registrasi' => 'No Registrasi',
        ];
    }
}
