<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "PENYAKIT".
 *
 * @property string $KD_PENYAKIT
 * @property string $PARENT
 * @property string|null $NAMAPENYAKIT
 * @property string|null $INCLUDE
 * @property string|null $EXCLUDE
 * @property string|null $CATATAN
 * @property string|null $DESCRIPTION
 */
class PenyakitSimrs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'PENYAKIT';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_sqlsrv');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['KD_PENYAKIT', 'PARENT'], 'required'],
            [['KD_PENYAKIT', 'PARENT'], 'string', 'max' => 12],
            [['NAMAPENYAKIT'], 'string', 'max' => 255],
            [['INCLUDE', 'EXCLUDE', 'CATATAN', 'DESCRIPTION'], 'string', 'max' => 1024],
            [['KD_PENYAKIT'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'KD_PENYAKIT' => 'Kd Penyakit',
            'PARENT' => 'Parent',
            'NAMAPENYAKIT' => 'Namapenyakit',
            'INCLUDE' => 'Include',
            'EXCLUDE' => 'Exclude',
            'CATATAN' => 'Catatan',
            'DESCRIPTION' => 'Description',
        ];
    }
}
