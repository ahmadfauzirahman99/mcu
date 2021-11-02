<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-13 12:12:24 
 * @Last Modified by:   Dicky Ermawan S., S.T., MTA 
 * @Last Modified time: 2020-09-13 12:12:24 
 */

namespace app\models\spesialis;

/**
 * This is the ActiveQuery class for [[McuSpesialisAudiometri]].
 *
 * @see McuSpesialisAudiometri
 */
class McuSpesialisAudiometriQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return McuSpesialisAudiometri[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return McuSpesialisAudiometri|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
