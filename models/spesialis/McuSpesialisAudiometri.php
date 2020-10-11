<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-13 12:12:24 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2020-10-10 17:07:48
 */


namespace app\models\spesialis;

use Yii;

/**
 * This is the model class for table "mcu.spesialis_audiometri".
 *
 * @property int $id_spesialis_audiometri
 * @property string $no_rekam_medik
 * @property string $no_daftar
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $ac_125_kanan
 * @property string|null $ac_250_kanan
 * @property string|null $ac_500_kanan
 * @property string|null $ac_1000_kanan
 * @property string|null $ac_2000_kanan
 * @property string|null $ac_3000_kanan
 * @property string|null $ac_4000_kanan
 * @property string|null $ac_5000_kanan
 * @property string|null $ac_6000_kanan
 * @property string|null $ac_7000_kanan
 * @property string|null $ac_8000_kanan
 * @property string|null $bc_125_kanan
 * @property string|null $bc_250_kanan
 * @property string|null $bc_500_kanan
 * @property string|null $bc_1000_kanan
 * @property string|null $bc_2000_kanan
 * @property string|null $bc_3000_kanan
 * @property string|null $bc_4000_kanan
 * @property string|null $bc_5000_kanan
 * @property string|null $bc_6000_kanan
 * @property string|null $bc_7000_kanan
 * @property string|null $bc_8000_kanan
 * @property string|null $ac_125_kiri
 * @property string|null $ac_250_kiri
 * @property string|null $ac_500_kiri
 * @property string|null $ac_1000_kiri
 * @property string|null $ac_2000_kiri
 * @property string|null $ac_3000_kiri
 * @property string|null $ac_4000_kiri
 * @property string|null $ac_5000_kiri
 * @property string|null $ac_6000_kiri
 * @property string|null $ac_7000_kiri
 * @property string|null $ac_8000_kiri
 * @property string|null $bc_125_kiri
 * @property string|null $bc_250_kiri
 * @property string|null $bc_500_kiri
 * @property string|null $bc_1000_kiri
 * @property string|null $bc_2000_kiri
 * @property string|null $bc_3000_kiri
 * @property string|null $bc_4000_kiri
 * @property string|null $bc_5000_kiri
 * @property string|null $bc_6000_kiri
 * @property string|null $bc_7000_kiri
 * @property string|null $bc_8000_kiri
 * @property string|null $kesimpulan_kanan
 * @property string|null $kesimpulan_kiri
 * @property string|null $kesimpulan
 * @property string|null $rata_kanan_ac
 * @property string|null $rata_kanan_bc
 * @property string|null $rata_kiri_ac
 * @property string|null $rata_kiri_bc
 * @property string|null $gambar
 * @property string|null $kesan
 * @property string|null $status_pemeriksaan
 */
class McuSpesialisAudiometri extends BaseAR
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.spesialis_audiometri';
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
            [['kesimpulan', 'gambar'], 'string'],
            [['no_rekam_medik'], 'string', 'max' => 120],
            [['ac_125_kanan', 'ac_250_kanan', 'ac_500_kanan', 'ac_1000_kanan', 'ac_2000_kanan', 'ac_3000_kanan', 'ac_4000_kanan', 'ac_5000_kanan', 'ac_6000_kanan', 'ac_7000_kanan', 'ac_8000_kanan', 'bc_125_kanan', 'bc_250_kanan', 'bc_500_kanan', 'bc_1000_kanan', 'bc_2000_kanan', 'bc_3000_kanan', 'bc_4000_kanan', 'bc_5000_kanan', 'bc_6000_kanan', 'bc_7000_kanan', 'bc_8000_kanan', 'ac_125_kiri', 'ac_250_kiri', 'ac_500_kiri', 'ac_1000_kiri', 'ac_2000_kiri', 'ac_3000_kiri', 'ac_4000_kiri', 'ac_5000_kiri', 'ac_6000_kiri', 'ac_7000_kiri', 'ac_8000_kiri', 'bc_125_kiri', 'bc_250_kiri', 'bc_500_kiri', 'bc_1000_kiri', 'bc_2000_kiri', 'bc_3000_kiri', 'bc_4000_kiri', 'bc_5000_kiri', 'bc_6000_kiri', 'bc_7000_kiri', 'bc_8000_kiri'], 'number',],
            [['kesimpulan_kanan', 'kesimpulan_kiri',], 'string', 'max' => 30],
            [['rata_kanan_ac', 'rata_kanan_bc', 'rata_kiri_ac', 'rata_kiri_bc'], 'number'],
            ['riwayat', 'safe'],
            
            ['kesan', 'required'],
            ['no_daftar', 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'id_spesialis_audiometri' => 'Id Spesialis Audiometri',
            'no_rekam_medik' => 'No Rekam Medik',
            'ac_125_kanan' => 'Ac 125 Kanan',
            'ac_250_kanan' => 'Ac 250 Kanan',
            'ac_500_kanan' => 'Ac 500 Kanan',
            'ac_1000_kanan' => 'Ac 1000 Kanan',
            'ac_2000_kanan' => 'Ac 2000 Kanan',
            'ac_3000_kanan' => 'Ac 3000 Kanan',
            'ac_4000_kanan' => 'Ac 4000 Kanan',
            'ac_5000_kanan' => 'Ac 5000 Kanan',
            'ac_6000_kanan' => 'Ac 6000 Kanan',
            'ac_7000_kanan' => 'Ac 7000 Kanan',
            'ac_8000_kanan' => 'Ac 8000 Kanan',
            'bc_125_kanan' => 'Bc 125 Kanan',
            'bc_250_kanan' => 'Bc 250 Kanan',
            'bc_500_kanan' => 'Bc 500 Kanan',
            'bc_1000_kanan' => 'Bc 1000 Kanan',
            'bc_2000_kanan' => 'Bc 2000 Kanan',
            'bc_3000_kanan' => 'Bc 3000 Kanan',
            'bc_4000_kanan' => 'Bc 4000 Kanan',
            'bc_5000_kanan' => 'Bc 5000 Kanan',
            'bc_6000_kanan' => 'Bc 6000 Kanan',
            'bc_7000_kanan' => 'Bc 7000 Kanan',
            'bc_8000_kanan' => 'Bc 8000 Kanan',
            'ac_125_kiri' => 'Ac 125 Kiri',
            'ac_250_kiri' => 'Ac 250 Kiri',
            'ac_500_kiri' => 'Ac 500 Kiri',
            'ac_1000_kiri' => 'Ac 1000 Kiri',
            'ac_2000_kiri' => 'Ac 2000 Kiri',
            'ac_3000_kiri' => 'Ac 3000 Kiri',
            'ac_4000_kiri' => 'Ac 4000 Kiri',
            'ac_5000_kiri' => 'Ac 5000 Kiri',
            'ac_6000_kiri' => 'Ac 6000 Kiri',
            'ac_7000_kiri' => 'Ac 7000 Kiri',
            'ac_8000_kiri' => 'Ac 8000 Kiri',
            'bc_125_kiri' => 'Bc 125 Kiri',
            'bc_250_kiri' => 'Bc 250 Kiri',
            'bc_500_kiri' => 'Bc 500 Kiri',
            'bc_1000_kiri' => 'Bc 1000 Kiri',
            'bc_2000_kiri' => 'Bc 2000 Kiri',
            'bc_3000_kiri' => 'Bc 3000 Kiri',
            'bc_4000_kiri' => 'Bc 4000 Kiri',
            'bc_5000_kiri' => 'Bc 5000 Kiri',
            'bc_6000_kiri' => 'Bc 6000 Kiri',
            'bc_7000_kiri' => 'Bc 7000 Kiri',
            'bc_8000_kiri' => 'Bc 8000 Kiri',
            'kesimpulan_kanan' => 'Kesimpulan Kanan',
            'kesimpulan_kiri' => 'Kesimpulan Kiri',
            'kesimpulan' => 'Kesimpulan',
            'rata_kanan_ac' => 'Rata Kanan Ac',
            'rata_kanan_bc' => 'Rata Kanan Bc',
            'rata_kiri_ac' => 'Rata Kiri Ac',
            'rata_kiri_bc' => 'Rata Kiri Bc',
            'gambar' => 'Gambar',
            'riwayat' => 'Riwayat',
            'kesan' => 'Kesan',
        ]);
    }

    /**
     * {@inheritdoc}
     * @return McuSpesialisAudiometriQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new McuSpesialisAudiometriQuery(get_called_class());
    }
}
