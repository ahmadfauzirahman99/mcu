<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-13 12:12:24 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2020-09-14 23:17:57
 */

namespace app\models\spesialis;

use app\models\DataLayanan;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Json;

class BaseAR extends \yii\db\ActiveRecord
{

    public $cari_pasien;

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'value' => date('Y-m-d H:i:s'),
            ],
            // BlameableBehavior::className(),
        ];
    }

    public function attributeLabels()
    {
        return [
            'nama_no_rm' => 'Nama / No. RM',
            'created_at' => 'Dibuat Pada',
            'updated_at' => 'Diubah Pada',
            'created_by' => 'Dibuat Oleh',
            'updated_by' => 'Diubah Oleh',
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if ($insert) {
            $newRow = $this->attributes;
            unset($newRow['riwayat']);
            $oldRiwayat = [];
            array_push($oldRiwayat, $newRow);
            $this->riwayat = Json::encode($oldRiwayat, JSON_PRETTY_PRINT);
            $this->updateAttributes(['riwayat']);
        } else {
            $newRow = $this->attributes;
            unset($newRow['riwayat']);
            $oldRiwayat = Json::decode($this->riwayat);
            array_push($oldRiwayat, $newRow);
            $this->riwayat = Json::encode($oldRiwayat, JSON_PRETTY_PRINT);
            $this->updateAttributes(['riwayat']);
        }
    }


    public function getPasien()
    {
        return $this->hasOne(DataLayanan::className(), ['no_rekam_medik' => 'no_rekam_medik']);
    }
}
