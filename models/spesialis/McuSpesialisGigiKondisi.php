<?php

namespace app\models\spesialis;

use Yii;

/**
 * This is the model class for table "mcu.spesialis_gigi_kondisi".
 *
 * @property int $id_spesialis_gigi_kondisi
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string $nama
 * @property string|null $riwayat
 */
class McuSpesialisGigiKondisi extends BaseAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.spesialis_gigi_kondisi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'default', 'value' => null],
            [['created_by', 'updated_by'], 'integer'],
            [['nama'], 'required'],
            [['riwayat'], 'string'],
            [['nama'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'id_spesialis_gigi_kondisi' => 'Id Spesialis Gigi Kondisi',
            'nama' => 'Nama Kondisi',
            'riwayat' => 'Riwayat',
        ]);
    }

    /**
     * {@inheritdoc}
     * @return McuSpesialisGigiKondisiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new McuSpesialisGigiKondisiQuery(get_called_class());
    }
}
