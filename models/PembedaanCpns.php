<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mcu.pembedaan".
 *
 * @property int $id_pembedaan
 * @property string|null $pilhan_terima_jabatan
 * @property string|null $status
 * @property string|null $no_rekam_medik
 * @property string|null $created_by
 * @property string|null $tanggal
 * @property string|null $noted
 * @property string|null $noted_sp
 */
class PembedaanCpns extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.pembedaan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_by'], 'string'],
            [['tanggal','noted','noted_sp'], 'safe'],
            [['pilhan_terima_jabatan'], 'string', 'max' => 200],
            [['status', 'no_rekam_medik'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pembedaan' => 'Id Pembedaan',
            'pilhan_terima_jabatan' => 'Pilhan Terima Jabatan',
            'status' => 'Status',
            'no_rekam_medik' => 'No Rekam Medik',
            'noted' => 'Catatan Khusus',
            'created_by' => 'Created By',
            'tanggal' => 'Tanggal',
            'noted_sp' => 'Catatan Istimewa'
        ];
    }
}
