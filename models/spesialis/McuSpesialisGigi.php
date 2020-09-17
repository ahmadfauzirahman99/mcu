<?php

namespace app\models\spesialis;

use Yii;

/**
 * This is the model class for table "mcu.spesialis_gigi".
 *
 * @property int $id_spesialis_gigi
 * @property string $no_rekam_medik
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $g18
 * @property string|null $g17
 * @property string|null $g16
 * @property string|null $g15
 * @property string|null $g14
 * @property string|null $g13
 * @property string|null $g12
 * @property string|null $g11
 * @property string|null $g21
 * @property string|null $g22
 * @property string|null $g23
 * @property string|null $g24
 * @property string|null $g25
 * @property string|null $g26
 * @property string|null $g27
 * @property string|null $g28
 * @property string|null $g38
 * @property string|null $g37
 * @property string|null $g36
 * @property string|null $g35
 * @property string|null $g34
 * @property string|null $g33
 * @property string|null $g32
 * @property string|null $g31
 * @property string|null $g41
 * @property string|null $g42
 * @property string|null $g43
 * @property string|null $g44
 * @property string|null $g45
 * @property string|null $g46
 * @property string|null $g47
 * @property string|null $g48
 * @property string|null $oklusi
 * @property string|null $torus_palatinus
 * @property string|null $torus_mandibularis
 * @property string|null $palatum
 * @property string|null $supernumerary_teeth
 * @property string|null $diastema
 * @property string|null $spacing
 * @property string|null $oral_hygiene
 * @property string|null $gingiva_periodontal
 * @property string|null $oral_mucosa
 * @property string|null $tongue
 * @property string|null $lain_lain
 * @property string|null $kesimpulan
 * @property string|null $saran
 * @property string|null $riwayat
 */
class McuSpesialisGigi extends BaseAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.spesialis_gigi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_rekam_medik'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'default', 'value' => null],
            [['created_by', 'updated_by'], 'integer'],
            [['lain_lain', 'kesimpulan', 'saran', 'riwayat'], 'string'],
            [['no_rekam_medik'], 'string', 'max' => 120],
            // [['g18', 'g17', 'g16', 'g15', 'g14', 'g13', 'g12', 'g11', 'g21', 'g22', 'g23', 'g24', 'g25', 'g26', 'g27', 'g28', 'g38', 'g37', 'g36', 'g35', 'g34', 'g33', 'g32', 'g31', 'g41', 'g42', 'g43', 'g44', 'g45', 'g46', 'g47', 'g48'], 'string', 'max' => 100],
            [['g18', 'g17', 'g16', 'g15', 'g14', 'g13', 'g12', 'g11', 'g21', 'g22', 'g23', 'g24', 'g25', 'g26', 'g27', 'g28', 'g38', 'g37', 'g36', 'g35', 'g34', 'g33', 'g32', 'g31', 'g41', 'g42', 'g43', 'g44', 'g45', 'g46', 'g47', 'g48'], 'safe',],
            [['oklusi', 'torus_palatinus', 'torus_mandibularis', 'palatum', 'supernumerary_teeth', 'diastema', 'spacing', 'oral_hygiene', 'gingiva_periodontal', 'oral_mucosa', 'tongue'], 'string', 'max' => 30],

            ['no_rekam_medik', 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'id_spesialis_gigi' => 'Id Spesialis Gigi',
            'no_rekam_medik' => 'No Rekam Medik',
            'g18' => 'G18',
            'g38' => 'G38',
            'g17' => 'G17',
            'g37' => 'G37',
            'g16' => 'G16',
            'g36' => 'G36',
            'g15' => 'G15',
            'g35' => 'G35',
            'g14' => 'G14',
            'g34' => 'G34',
            'g13' => 'G13',
            'g33' => 'G33',
            'g12' => 'G12',
            'g32' => 'G32',
            'g11' => 'G11',
            'g31' => 'G31',
            'g21' => 'G21',
            'g41' => 'G41',
            'g22' => 'G22',
            'g42' => 'G42',
            'g23' => 'G23',
            'g43' => 'G43',
            'g24' => 'G24',
            'g44' => 'G44',
            'g25' => 'G25',
            'g45' => 'G45',
            'g26' => 'G26',
            'g46' => 'G46',
            'g27' => 'G27',
            'g47' => 'G47',
            'g28' => 'G28',
            'g48' => 'G48',
            'oklusi' => 'Oklusi',
            'torus_palatinus' => 'Torus Palatinus',
            'torus_mandibularis' => 'Torus Mandibularis',
            'palatum' => 'Palatum',
            'supernumerary_teeth' => 'Supernumerary Teeth',
            'diastema' => 'Diastema',
            'spacing' => 'Spacing',
            'oral_hygiene' => 'Oral Hygiene',
            'gingiva_periodontal' => 'Gingiva Periodontal',
            'oral_mucosa' => 'Oral Mucosa',
            'tongue' => 'Tongue',
            'lain_lain' => 'Lain Lain',
            'kesimpulan' => 'Kesimpulan',
            'saran' => 'Saran',
            'riwayat' => 'Riwayat',
        ]);
    }

    /**
     * {@inheritdoc}
     * @return McuSpesialisGigiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new McuSpesialisGigiQuery(get_called_class());
    }
}
