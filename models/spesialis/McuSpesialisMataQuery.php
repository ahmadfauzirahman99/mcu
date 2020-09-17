<?php

namespace app\models\spesialis;

/**
 * This is the ActiveQuery class for [[McuSpesialisMata]].
 *
 * @see McuSpesialisMata
 */
class McuSpesialisMataQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return McuSpesialisMata[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return McuSpesialisMata|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
