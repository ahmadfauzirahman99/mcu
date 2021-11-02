<?php

namespace app\models\spesialis;

/**
 * This is the ActiveQuery class for [[McuSpesialisThtBerbisik]].
 *
 * @see McuSpesialisThtBerbisik
 */
class McuSpesialisThtBerbisikQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return McuSpesialisThtBerbisik[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return McuSpesialisThtBerbisik|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
