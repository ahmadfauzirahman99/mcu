<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mcu.item_setting".
 *
 * @property int $id_item_setting
 * @property int $id_kategori_setting
 * @property string $nama_item_setting
 * @property string $kode_tes
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
class ItemSetting extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.item_setting';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kategori_setting', 'nama_item_setting', 'kode_tes', 'status'], 'required'],
            [['id_kategori_setting'], 'default', 'value' => null],
            [['id_kategori_setting'], 'integer'],
            [['created_date', 'modified_date', 'deleted_date'], 'safe'],
            [['nama_item_setting', 'kode_tes', 'nilai_normal', 'ket', 'created_id', 'modified_id', 'deleted_id'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_item_setting' => 'Id Item Setting',
            'id_kategori_setting' => 'Id Kategori Setting',
            'nama_item_setting' => 'Nama Item Setting',
            'kode_tes' => 'Kode Tes',
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

    public static function getListItem()
    {
        return self::find()
            ->select(['id_item_setting','nama_item_setting'])
            ->where(['status'=>2])
            ->orderBy('id_item_setting')
            ->asArray()
            ->all();
    }

}
