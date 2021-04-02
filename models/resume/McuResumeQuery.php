<?php

namespace app\models\resume;

/**
 * This is the ActiveQuery class for [[McuResume]].
 *
 * @see McuResume
 */
class McuResumeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return McuResume[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return McuResume|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
