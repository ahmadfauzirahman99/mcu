<?php

namespace app\models\spesialis;

use yii\helpers\ArrayHelper;

/**
 * This is the ActiveQuery class for [[McuSpesialisGigiKondisi]].
 *
 * @see McuSpesialisGigiKondisi
 */
class McuSpesialisGigiKondisiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return McuSpesialisGigiKondisi[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return McuSpesialisGigiKondisi|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function select2()
    {
        $result = $this->all();
        return ArrayHelper::map($result, 'id_spesialis_gigi_kondisi', 'nama');
        // return ArrayHelper::map($result, 'nama', 'nama');
    }
}
