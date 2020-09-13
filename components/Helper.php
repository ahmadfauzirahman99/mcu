<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-13 20:08:44 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2020-09-13 20:17:25
 */

namespace app\components;

class Helper
{
    public static function radioList($index, $label, $name, $checked, $value, $model)
    {
        $id = str_replace(['[', ']'], '-', $name) . $index;
        return \yii\helpers\Html::radio(
            $name,
            $checked,
            [
                'value' => $value,
                'label' => $label,
                'id' => $id
            ]
        );
    }
}
