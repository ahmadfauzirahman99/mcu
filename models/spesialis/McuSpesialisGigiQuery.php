<?php

namespace app\models\spesialis;

/**
 * This is the ActiveQuery class for [[McuSpesialisGigi]].
 *
 * @see McuSpesialisGigi
 */
class McuSpesialisGigiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return McuSpesialisGigi[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return McuSpesialisGigi|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
