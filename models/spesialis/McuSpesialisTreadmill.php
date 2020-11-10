<?php

namespace app\models\spesialis;

use Yii;

/**
 * This is the model class for table "mcu.spesialis_treadmill".
 *
 * @property int $id_spesialis_treadmill
 * @property string $no_rekam_medik
 * @property string|null $no_daftar
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $permintaan
 * @property string|null $metode
 * @property string|null $lama_latihan
 * @property string|null $test_dihentikan_karena
 * @property string|null $dj_maksimal
 * @property string|null $td_maksimal
 * @property string|null $ekg_istirahat
 * @property string|null $ekg_latihan
 * @property string|null $ekg_pemulihan
 * @property string|null $tingkat_kesegaran_jasmani
 * @property string|null $kelas_fungsional
 * @property string|null $kapasitas_aerobik
 * @property string|null $respon_hemodinamik
 * @property string|null $respon_iskemik
 * @property string|null $anjuran
 * @property string|null $riwayat
 * @property string|null $kesan
 * @property string|null $status_pemeriksaan
 */
class McuSpesialisTreadmill extends BaseAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.spesialis_treadmill';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_rekam_medik'], 'required'],
            [['no_daftar', 'permintaan', 'metode', 'lama_latihan', 'test_dihentikan_karena', 'dj_maksimal', 'td_maksimal', 'ekg_istirahat', 'ekg_latihan', 'ekg_pemulihan', 'tingkat_kesegaran_jasmani', 'kelas_fungsional', 'kapasitas_aerobik', 'respon_hemodinamik', 'respon_iskemik', 'anjuran', 'riwayat', 'kesan', 'status_pemeriksaan'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'default', 'value' => null],
            [['created_by', 'updated_by'], 'integer'],
            [['no_rekam_medik'], 'string', 'max' => 120],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_spesialis_treadmill' => 'Id Spesialis Treadmill',
            'no_rekam_medik' => 'No Rekam Medik',
            'no_daftar' => 'No Daftar',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'permintaan' => 'Permintaan',
            'metode' => 'Metode',
            'lama_latihan' => 'Lama Latihan',
            'test_dihentikan_karena' => 'Test Dihentikan Karena',
            'dj_maksimal' => 'Dj Maksimal',
            'td_maksimal' => 'Td Maksimal',
            'ekg_istirahat' => 'Ekg Istirahat',
            'ekg_latihan' => 'Ekg Latihan',
            'ekg_pemulihan' => 'Ekg Pemulihan',
            'tingkat_kesegaran_jasmani' => 'Tingkat Kesegaran Jasmani',
            'kelas_fungsional' => 'Kelas Fungsional',
            'kapasitas_aerobik' => 'Kapasitas Aerobik',
            'respon_hemodinamik' => 'Respon Hemodinamik',
            'respon_iskemik' => 'Respon Iskemik',
            'anjuran' => 'Anjuran',
            'riwayat' => 'Riwayat',
            'kesan' => 'Kesan',
            'status_pemeriksaan' => 'Status Pemeriksaan',
        ];
    }

    /**
     * {@inheritdoc}
     * @return McuSpesialisTreadmillQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new McuSpesialisTreadmillQuery(get_called_class());
    }
}
