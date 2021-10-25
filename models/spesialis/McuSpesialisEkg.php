<?php

namespace app\models\spesialis;

use Yii;

/**
 * This is the model class for table "mcu.spesialis_ekg".
 *
 * @property int $id_spesialis_ekg
 * @property string $no_rekam_medik
 * @property string|null $no_daftar
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $irama_jantung
 * @property string|null $frekuensi_denyut_jantung
 * @property string|null $gelombang_p
 * @property string|null $interval_pr
 * @property string|null $kompleks_qrs
 * @property string|null $segmen_st
 * @property string|null $gelombang_t
 * @property string|null $lain_lain
 * @property string|null $kesan_ekg_istirahat
 * @property string|null $anjuran
 * @property string|null $riwayat
 * @property string|null $kesan
 * @property string|null $status_pemeriksaan
 */
class McuSpesialisEkg extends \app\models\spesialis\BaseAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.spesialis_ekg';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_rekam_medik'], 'required'],
            [['no_daftar', 'irama_jantung', 'frekuensi_denyut_jantung', 'gelombang_p', 'interval_pr', 'kompleks_qrs', 'segmen_st', 'gelombang_t', 'lain_lain', 'kesan_ekg_istirahat', 'anjuran', 'riwayat', 'kesan', 'status_pemeriksaan'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'default', 'value' => null],
            [['created_by', 'updated_by'], 'integer'],
            [['no_rekam_medik'], 'string', 'max' => 120],

            [['lain_lain', 'kesan_ekg_istirahat', 'anjuran'], 'default', 'value' => '-'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'id_spesialis_ekg' => 'Id Spesialis Ekg',
            'no_rekam_medik' => 'No Rekam Medik',
            'no_daftar' => 'No Daftar',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'irama_jantung' => 'Irama Jantung',
            'frekuensi_denyut_jantung' => 'Frekuensi Denyut Jantung',
            'gelombang_p' => 'Gelombang P',
            'interval_pr' => 'Interval Pr',
            'kompleks_qrs' => 'Kompleks Qrs',
            'segmen_st' => 'Segmen St',
            'gelombang_t' => 'Gelombang T',
            'lain_lain' => 'Lain Lain',
            'kesan_ekg_istirahat' => 'Kesan Ekg Istirahat',
            'anjuran' => 'Anjuran',
            'riwayat' => 'Riwayat',
            'kesan' => 'Kesan',
            'status_pemeriksaan' => 'Status Pemeriksaan',
        ]);
    }

    /**
     * {@inheritdoc}
     * @return McuSpesialisEkgQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new McuSpesialisEkgQuery(get_called_class());
    }
}
