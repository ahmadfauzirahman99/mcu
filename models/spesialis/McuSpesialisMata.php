<?php

namespace app\models\spesialis;

use Yii;

/**
 * This is the model class for table "mcu.spesialis_mata".
 *
 * @property int $id_spesialis_mata
 * @property string $no_rekam_medik
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $persepsi_warna_mata_kanan
 * @property string|null $persepsi_warna_mata_kiri
 * @property string|null $kelopak_mata_kanan
 * @property string|null $kelopak_mata_kiri
 * @property string|null $konjungtiva_mata_kanan
 * @property string|null $konjungtiva_mata_kiri
 * @property string|null $kesegarisan_gerak_bola_mata_kanan
 * @property string|null $kesegarisan_gerak_bola_mata_kiri
 * @property string|null $skiera_mata_kanan
 * @property string|null $skiera_mata_kiri
 * @property string|null $lensa_mata_kanan
 * @property string|null $lensa_mata_kiri
 * @property string|null $kornea_mata_kanan
 * @property string|null $kornea_mata_kiri
 * @property string|null $bulu_mata_kanan
 * @property string|null $bulu_mata_kiri
 * @property string|null $tekanan_bola_mata_kanan
 * @property string|null $tekanan_bola_mata_kiri
 * @property string|null $penglihatan_3_dimensi_mata_kanan
 * @property string|null $penglihatan_3_dimensi_mata_kiri
 * @property string|null $virus_mata_tanpa_koreksi_mata_kanan
 * @property string|null $virus_mata_tanpa_koreksi_mata_kiri
 * @property string|null $virus_mata_dengan_koreksi_mata_kanan
 * @property string|null $virus_mata_dengan_koreksi_mata_kiri
 * @property string|null $lain_lain
 * @property string|null $kesimpulan
 * @property string|null $riwayat
 */
class McuSpesialisMata extends BaseAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.spesialis_mata';
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
            [['lain_lain', 'kesimpulan', 'riwayat'], 'string'],
            [['no_rekam_medik'], 'string', 'max' => 120],
            [['persepsi_warna_mata_kanan', 'persepsi_warna_mata_kiri', 'kelopak_mata_kanan', 'kelopak_mata_kiri', 'konjungtiva_mata_kanan', 'konjungtiva_mata_kiri', 'kesegarisan_gerak_bola_mata_kanan', 'kesegarisan_gerak_bola_mata_kiri', 'skiera_mata_kanan', 'skiera_mata_kiri', 'lensa_mata_kanan', 'lensa_mata_kiri', 'kornea_mata_kanan', 'kornea_mata_kiri', 'bulu_mata_kanan', 'bulu_mata_kiri', 'tekanan_bola_mata_kanan', 'tekanan_bola_mata_kiri', 'penglihatan_3_dimensi_mata_kanan', 'penglihatan_3_dimensi_mata_kiri', 'virus_mata_tanpa_koreksi_mata_kanan', 'virus_mata_tanpa_koreksi_mata_kiri', 'virus_mata_dengan_koreksi_mata_kanan', 'virus_mata_dengan_koreksi_mata_kiri'], 'string', 'max' => 70],
        
            ['no_rekam_medik', 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'id_spesialis_mata' => 'Id Spesialis Mata',
            'no_rekam_medik' => 'No Rekam Medik',
            'persepsi_warna_mata_kanan' => 'Persepsi Warna Mata Kanan',
            'persepsi_warna_mata_kiri' => 'Persepsi Warna Mata Kiri',
            'kelopak_mata_kanan' => 'Kelopak Mata Kanan',
            'kelopak_mata_kiri' => 'Kelopak Mata Kiri',
            'konjungtiva_mata_kanan' => 'Konjungtiva Mata Kanan',
            'konjungtiva_mata_kiri' => 'Konjungtiva Mata Kiri',
            'kesegarisan_gerak_bola_mata_kanan' => 'Kesegarisan Gerak Bola Mata Kanan',
            'kesegarisan_gerak_bola_mata_kiri' => 'Kesegarisan Gerak Bola Mata Kiri',
            'skiera_mata_kanan' => 'Skiera Mata Kanan',
            'skiera_mata_kiri' => 'Skiera Mata Kiri',
            'lensa_mata_kanan' => 'Lensa Mata Kanan',
            'lensa_mata_kiri' => 'Lensa Mata Kiri',
            'kornea_mata_kanan' => 'Kornea Mata Kanan',
            'kornea_mata_kiri' => 'Kornea Mata Kiri',
            'bulu_mata_kanan' => 'Bulu Mata Kanan',
            'bulu_mata_kiri' => 'Bulu Mata Kiri',
            'tekanan_bola_mata_kanan' => 'Tekanan Bola Mata Kanan',
            'tekanan_bola_mata_kiri' => 'Tekanan Bola Mata Kiri',
            'penglihatan_3_dimensi_mata_kanan' => 'Penglihatan 3 Dimensi Mata Kanan',
            'penglihatan_3_dimensi_mata_kiri' => 'Penglihatan 3 Dimensi Mata Kiri',
            'virus_mata_tanpa_koreksi_mata_kanan' => 'Virus Mata Tanpa Koreksi Mata Kanan',
            'virus_mata_tanpa_koreksi_mata_kiri' => 'Virus Mata Tanpa Koreksi Mata Kiri',
            'virus_mata_dengan_koreksi_mata_kanan' => 'Virus Mata Dengan Koreksi Mata Kanan',
            'virus_mata_dengan_koreksi_mata_kiri' => 'Virus Mata Dengan Koreksi Mata Kiri',
            'lain_lain' => 'Lain Lain',
            'kesimpulan' => 'Kesimpulan',
            'riwayat' => 'Riwayat',
        ]);
    }

    /**
     * {@inheritdoc}
     * @return McuSpesialisMataQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new McuSpesialisMataQuery(get_called_class());
    }
}
