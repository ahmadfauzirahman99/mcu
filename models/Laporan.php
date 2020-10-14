<?php

/**
 * Created by PhpStorm.
 * User: Salman
 * Date: 22/02/2018
 * Time: 11.28
 */

namespace app\models;

use app\models\GraddingMcu;
use yii\base\Model;
use yii\db\ActiveRecord;

set_time_limit(0);

class Laporan extends Model
{
    public function getDataLaporanPaket($KodeDebitur)
    {
        $data = GraddingMcu::find()
        ->andWhere(['kode_debitur'=>$KodeDebitur])
        ->asArray()
        ->all();

        return $data;
    }
}
