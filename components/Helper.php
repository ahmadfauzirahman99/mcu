<?php

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
