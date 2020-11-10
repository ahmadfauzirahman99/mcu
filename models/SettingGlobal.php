<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mcu.setting_global".
 *
 * @property int $id_global
 * @property int $id_item_setting
 * @property string $tampil
 * @property string $status
 */
class SettingGlobal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.setting_global';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_item_setting', 'tampil', 'status'], 'required'],
            [['id_item_setting'], 'default', 'value' => null],
            [['id_item_setting'], 'integer'],
            [['tampil', 'status'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_global' => 'Id Global',
            'id_item_setting' => 'Id Item Setting',
            'tampil' => 'Tampil',
            'status' => 'Status',
        ];
    }

    public function getDataSettingGlobal()
    {
        $dataSetting = SettingGlobal::find()
        ->select(['setting_global.*', 'item.id_kategori_setting', 'nama_kategori', 'nama_item_setting', 'kode_tes', 'nilai_normal'])
        ->joinWith(['item' => function ($q) {
            $q->joinWith(['kategori']);
        }])
        ->andWhere(['setting_global.status' => 2])
        ->orderBy(['setting_global.id_global' => SORT_ASC])
        ->asArray()
        ->all();

        return $dataSetting;
    }

    public function getSettingGlobalByKategori($IdKategori)
    {
        $dataSetting = SettingGlobal::find()
        ->select(['setting_global.*', 'nama_kategori', 'nama_item_setting', 'kode_tes', 'nilai_normal'])
        ->joinWith(['item' => function ($q) {
            $q->joinWith(['kategori']);
        }])
        ->andWhere(['setting_global.status' => 2, 'kategori.id_kategori_setting'=>$IdKategori])
        ->orderBy(['setting_global.id_global' => SORT_ASC])
        ->asArray()
        ->all();

        return $dataSetting;
    }

    public function getItem()
    {
        return $this->hasOne(ItemSetting::className(),['id_item_setting'=>'id_item_setting'])->alias('item');
    }
}
