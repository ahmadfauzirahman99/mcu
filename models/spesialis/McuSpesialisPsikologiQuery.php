<?php

namespace app\models\spesialis;

/**
 * This is the ActiveQuery class for [[McuSpesialisPsikologi]].
 *
 * @see McuSpesialisPsikologi
 */
class McuSpesialisPsikologiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return McuSpesialisPsikologi[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return McuSpesialisPsikologi|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
