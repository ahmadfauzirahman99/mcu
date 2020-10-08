<?php

namespace app\models\spesialis;

/**
 * This is the ActiveQuery class for [[McuSpesialisTht]].
 *
 * @see McuSpesialisTht
 */
class McuSpesialisThtQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return McuSpesialisTht[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return McuSpesialisTht|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
