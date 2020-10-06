<?php

namespace app\models\spesialis;

/**
 * This is the ActiveQuery class for [[McuSpesialisThtGarpuTala]].
 *
 * @see McuSpesialisThtGarpuTala
 */
class McuSpesialisThtGarpuTalaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return McuSpesialisThtGarpuTala[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return McuSpesialisThtGarpuTala|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
