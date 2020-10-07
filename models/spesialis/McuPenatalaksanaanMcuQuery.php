<?php

namespace app\models\spesialis;

/**
 * This is the ActiveQuery class for [[McuPenatalaksanaanMcu]].
 *
 * @see McuPenatalaksanaanMcu
 */
class McuPenatalaksanaanMcuQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return McuPenatalaksanaanMcu[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return McuPenatalaksanaanMcu|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
