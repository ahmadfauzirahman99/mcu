<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penunjang.validasi_lab".
 *
 * @property string $id_validasi
 * @property string $id_lisorder
 * @property string $pid
 * @property string $apid
 * @property string $ono
 * @property string $lno
 * @property string $ptype
 * @property string $data_api
 * @property string $status
 * @property string|null $serah_hasil_id
 * @property string|null $serah_hasil_date
 * @property string|null $validasi_id
 * @property string|null $validasi_date
 * @property string|null $created_id
 * @property string|null $created_date
 * @property string|null $modified_id
 * @property string|null $modified_date
 * @property string|null $deleted_id
 * @property string|null $deleted_date
 * @property string|null $ket
 */
class PenunjangValidasiLab extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penunjang.validasi_lab';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_validasi', 'id_lisorder', 'pid', 'apid', 'ono', 'lno', 'ptype', 'data_api', 'status'], 'required'],
            [['data_api', 'ket'], 'string'],
            [['serah_hasil_date', 'validasi_date', 'created_date', 'modified_date', 'deleted_date'], 'safe'],
            [['id_validasi', 'id_lisorder'], 'string', 'max' => 15],
            [['pid'], 'string', 'max' => 13],
            [['apid'], 'string', 'max' => 16],
            [['ono', 'lno'], 'string', 'max' => 20],
            [['ptype', 'status'], 'string', 'max' => 2],
            [['serah_hasil_id', 'validasi_id', 'created_id', 'modified_id', 'deleted_id'], 'string', 'max' => 255],
            [['id_validasi'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_validasi' => 'Id Validasi',
            'id_lisorder' => 'Id Lisorder',
            'pid' => 'Pid',
            'apid' => 'Apid',
            'ono' => 'Ono',
            'lno' => 'Lno',
            'ptype' => 'Ptype',
            'data_api' => 'Data Api',
            'status' => 'Status',
            'serah_hasil_id' => 'Serah Hasil ID',
            'serah_hasil_date' => 'Serah Hasil Date',
            'validasi_id' => 'Validasi ID',
            'validasi_date' => 'Validasi Date',
            'created_id' => 'Created ID',
            'created_date' => 'Created Date',
            'modified_id' => 'Modified ID',
            'modified_date' => 'Modified Date',
            'deleted_id' => 'Deleted ID',
            'deleted_date' => 'Deleted Date',
            'ket' => 'Ket',
        ];
    }
}
