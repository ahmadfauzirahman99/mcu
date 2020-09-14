<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mcu.rs_pendukung".
 *
 * @property int $id_rs
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string $nama_rs
 * @property string $status
 */
class RsPendukung extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.rs_pendukung';
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
            [['nama_rs', 'status'], 'required'],
            [['nama_rs', 'status'], 'string', 'max' => 12],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_rs' => 'Id Rs',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'nama_rs' => 'Nama Rs',
            'status' => 'Status',
        ];
    }
}
