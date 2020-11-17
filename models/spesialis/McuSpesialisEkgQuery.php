<?php

namespace app\models\spesialis;

/**
 * This is the ActiveQuery class for [[McuSpesialisEkg]].
 *
 * @see McuSpesialisEkg
 */
class McuSpesialisEkgQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return McuSpesialisEkg[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return McuSpesialisEkg|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
