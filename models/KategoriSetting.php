<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mcu.kategori_setting".
 *
 * @property int $id_kategori_setting
 * @property string $nama_kategori
 * @property string|null $ket
 * @property string $status
 * @property string|null $created_id
 * @property string|null $created_date
 * @property string|null $modified_id
 * @property string|null $modified_date
 * @property string|null $deleted_id
 * @property string|null $deleted_date
 */
class KategoriSetting extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.kategori_setting';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_kategori', 'status'], 'required'],
            [['created_date', 'modified_date', 'deleted_date'], 'safe'],
            [['nama_kategori', 'ket', 'created_id', 'modified_id', 'deleted_id'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kategori_setting' => 'Id Kategori Setting',
            'nama_kategori' => 'Nama Kategori',
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

    public static function getListKategori()
    {
        return self::find()
            ->select(['id_kategori_setting','nama_kategori'])
            ->where(['status'=>2])
            ->orderBy('id_kategori_setting')
            ->asArray()
            ->all();
    }
}
