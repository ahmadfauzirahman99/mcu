<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mcu.brief".
 *
 * @property int $id_brief
 * @property string|null $tangan
 * @property string|null $sikut
 * @property string|null $bahu
 * @property string|null $leher
 * @property string|null $punggung
 * @property string|null $tungkai
 * @property string|null $no_rekam_medik
 * @property string|null $tanggal_creadted
 */
class McuBrief extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.brief';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tangan', 'sikut', 'bahu', 'leher', 'punggung', 'tungkai', 'no_rekam_medik'], 'string'],
            [['tanggal_creadted'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_brief' => 'Id Brief',
            'tangan' => 'Tangan',
            'sikut' => 'Sikut',
            'bahu' => 'Bahu',
            'leher' => 'Leher',
            'punggung' => 'Punggung',
            'tungkai' => 'Tungkai',
            'no_rekam_medik' => 'No Rekam Medik',
            'tanggal_creadted' => 'Tanggal Creadted',
        ];
    }
}
