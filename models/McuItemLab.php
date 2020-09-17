<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mcu.item_lab".
 *
 * @property int $id_item_lab
 * @property string $nama_item_lab
 * @property string $kode_tes_lab
 * @property string|null $nilai_normal
 * @property string|null $ket
 * @property string $status
 * @property string|null $created_id
 * @property string|null $created_date
 * @property string|null $modified_id
 * @property string|null $modified_date
 * @property string|null $deleted_id
 * @property string|null $deleted_date
 */
class McuItemLab extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.item_lab';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_item_lab', 'kode_tes_lab', 'status'], 'required'],
            [['created_date', 'modified_date', 'deleted_date'], 'safe'],
            [['nama_item_lab', 'kode_tes_lab', 'nilai_normal', 'ket', 'created_id', 'modified_id', 'deleted_id'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_item_lab' => 'Id Item Lab',
            'nama_item_lab' => 'Nama Item Lab',
            'kode_tes_lab' => 'Kode Tes Lab',
            'nilai_normal' => 'Nilai Normal',
            'ket' => 'Ket',
            'status' => 'Status',
            'created_id' => 'Created ID',
            'created_date' => 'Created Date',
            'modified_id' => 'Modified ID',
            'modified_date' => 'Modified Date',
            'deleted_id' => 'Deleted ID',
            'deleted_date' => 'Deleted Date',
        ];
    }

    public static function getListItemLab()
    {
        return self::find()
            ->select(['id_item_lab','nama_item_lab'])
            ->where(['status'=>2])
            ->orderBy('id_item_lab')
            ->asArray()
            ->all();
    }
}
