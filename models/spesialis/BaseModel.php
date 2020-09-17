<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-13 12:12:24 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2020-09-15 01:28:19
 */

namespace app\models\spesialis;

use app\models\DataLayanan;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class BaseModel extends Model
{

   public static function getListPasien()
   {
       return ArrayHelper::map(DataLayanan::find()->select(['no_rekam_medik', 'concat("no_rekam_medik",\' / \',"nama") as nama'])->all(), 'no_rekam_medik', 'nama');
   }
}
