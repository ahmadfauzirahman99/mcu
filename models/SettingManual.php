<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mcu.setting_manual".
 *
 * @property string $id_manual
 * @property string $no_pasien
 * @property string $no_registrasi
 * @property int $id_item_setting
 * @property string|null $kondisi
 * @property string|null $nilai_manual
 * @property string $status
 */
class SettingManual extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.setting_manual';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_manual', 'no_pasien', 'no_registrasi', 'id_item_setting', 'status'], 'required'],
            [['id_item_setting'], 'default', 'value' => null],
            [['id_item_setting'], 'integer'],
            [['id_manual'], 'string', 'max' => 12],
            [['no_pasien', 'no_registrasi', 'kondisi', 'nilai_manual'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 2],
            [['id_manual'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_manual' => 'Id Manual',
            'no_pasien' => 'No Pasien',
            'no_registrasi' => 'No Registrasi',
            'id_item_setting' => 'Id Item Setting',
            'kondisi' => 'Kondisi',
            'nilai_manual' => 'Nilai Manual',
            'status' => 'Status',
        ];
    }

    public function getItem()
    {
        return $this->hasOne(ItemSetting::className(),['id_item_setting'=>'id_item_setting'])->alias('item');
    }

    public static function getIdManual($date)
    {
        $kode=date('Ymd', strtotime($date));

        $cek = SettingManual::find()
            ->select(['coalesce(Max(substring(id_manual,9,4)), Cast(0 as Varchar(1))) as id'])
            ->andWhere(['coalesce(substring(id_manual,1,8), Cast(1 as Varchar(1)))'=>$kode])
            ->asArray()
            ->one();

        if($cek != Null) {
            if(count($cek) > 0) {
                $id = $kode.sprintf("%'.04d", ($cek['id'] + 1));
            } else {
                $id = $kode.'0001';
            }
        }

        return $id;

    }
}
