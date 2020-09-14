<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mcu.rs_pendukung".
 *
 * @property int $id_rs
 * @property string $nama_rs
 * @property string $status
 * @property string $tanggal_created
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
            [['nama_rs', 'status', 'tanggal_created'], 'required'],
            [['tanggal_created'], 'safe'],
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
            'nama_rs' => 'Nama Rs',
            'status' => 'Status',
            'tanggal_created' => 'Tanggal Created',
        ];
    }
}
