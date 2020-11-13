<?php

namespace app\models\spesialis;

/**
 * This is the ActiveQuery class for [[McuSpesialisTreadmill]].
 *
 * @see McuSpesialisTreadmill
 */
class McuSpesialisTreadmillQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return McuSpesialisTreadmill[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return McuSpesialisTreadmill|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
