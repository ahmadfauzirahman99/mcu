<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "mcu.spesialis_psikologi".
 *
 * @property int $id_spesialis_psikologi
 * @property string $no_rekam_medik
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string $rs_pendukung
 * @property string $dokter
 * @property string|null $rp_diagnosa_dokter
 * @property string|null $rp_keluhan_fisik
 * @property string|null $rp_keluhan_psikologis
 * @property string|null $asesmen_observasi_du_penampilan_umum
 * @property string|null $asesmen_observasi_du_sikap_terhadap_pemeriksa
 * @property string|null $asesmen_observasi_du_afek
 * @property string|null $asesmen_observasi_du_roman_muka
 * @property string|null $asesmen_observasi_du_proses_pikir
 * @property string|null $asesmen_observasi_du_gangguan_persepsi
 * @property string|null $asesmen_observasi_fp_kognitif_memori
 * @property string|null $asesmen_observasi_fp_kognitif_konsentrasi
 * @property string|null $asesmen_observasi_fp_kognitif_orientasi
 * @property string|null $asesmen_observasi_fp_kognitif_kemampuan_verbal
 * @property string|null $asesmen_observasi_fp_kognitif_emosi
 * @property string|null $asesmen_observasi_fp_kognitif_perilaku
 * @property int|null $simptom_sakit_kepala
 * @property int|null $simptom_kurang_nafsu_makan
 * @property int|null $simptom_sulit_tidur
 * @property int|null $simptom_mudah_takut
 * @property int|null $simptom_tegang
 * @property int|null $simptom_cemas
 * @property int|null $simptom_gemetar
 * @property int|null $simptom_gangguan_perut
 * @property int|null $simptom_sulit_konsentrasi
 * @property int|null $simptom_sedih
 * @property int|null $simptom_sulit_mengambil_keputusan
 * @property int|null $simptom_kehilangan_minat
 * @property int|null $simptom_merasa_tidak_berguna
 * @property int|null $simptom_mudah_lupa
 * @property int|null $simptom_merasa_bersalah
 * @property int|null $simptom_mudah_lelah
 * @property int|null $simptom_putus_asa
 * @property int|null $simptom_mudah_marah
 * @property int|null $simptom_mudah_tersinggung
 * @property int|null $simptom_mimpi_buruk
 * @property int|null $simptom_tidak_percaya_diri
 * @property string|null $psikotes_pendukung_1
 * @property string|null $psikotes_pendukung_2
 * @property string|null $psikotes_pendukung_3
 * @property string|null $psikotes_pendukung_4
 * @property string|null $psikotes_pendukung_5
 * @property string|null $hasil_tes
 * @property string|null $dinamika_psikologi
 * @property string|null $kesimpulan
 */
class SpesialisPsikologi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.spesialis_psikologi';
    }

    /**
     * {@inheritdoc}
     */

    public $cari_pasien;

    // public function behaviors()
    // {
    //     return [
    //         [
    //             'class' => TimestampBehavior::className(),
    //             'value' => date('Y-m-d H:i:s'),
    //         ],
    //         // BlameableBehavior::className(),
    //     ];
    // }

    public function rules()
    {
        return [
            [['no_rekam_medik', 'no_daftar', 'rs_pendukung', 'dokter'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by', 'simptom_sakit_kepala', 'simptom_kurang_nafsu_makan', 'simptom_sulit_tidur', 'simptom_mudah_takut', 'simptom_tegang', 'simptom_cemas', 'simptom_gemetar', 'simptom_gangguan_perut', 'simptom_sulit_konsentrasi', 'simptom_sedih', 'simptom_sulit_mengambil_keputusan', 'simptom_kehilangan_minat', 'simptom_merasa_tidak_berguna', 'simptom_mudah_lupa', 'simptom_merasa_bersalah', 'simptom_mudah_lelah', 'simptom_putus_asa', 'simptom_mudah_marah', 'simptom_mudah_tersinggung', 'simptom_mimpi_buruk', 'simptom_tidak_percaya_diri'], 'default', 'value' => null],
            [['created_by', 'updated_by', 'simptom_sakit_kepala', 'simptom_kurang_nafsu_makan', 'simptom_sulit_tidur', 'simptom_mudah_takut', 'simptom_tegang', 'simptom_cemas', 'simptom_gemetar', 'simptom_gangguan_perut', 'simptom_sulit_konsentrasi', 'simptom_sedih', 'simptom_sulit_mengambil_keputusan', 'simptom_kehilangan_minat', 'simptom_merasa_tidak_berguna', 'simptom_mudah_lupa', 'simptom_merasa_bersalah', 'simptom_mudah_lelah', 'simptom_putus_asa', 'simptom_mudah_marah', 'simptom_mudah_tersinggung', 'simptom_mimpi_buruk', 'simptom_tidak_percaya_diri'], 'integer'],
            [['no_rekam_medik', 'no_daftar'], 'string', 'max' => 120],
            [['rs_pendukung'], 'string', 'max' => 50],
            [['dokter'], 'string', 'max' => 35],
            [['rp_diagnosa_dokter', 'rp_keluhan_fisik', 'rp_keluhan_psikologis', 'asesmen_observasi_du_penampilan_umum', 'asesmen_observasi_du_sikap_terhadap_pemeriksa', 'asesmen_observasi_du_afek', 'asesmen_observasi_du_roman_muka', 'asesmen_observasi_du_proses_pikir', 'asesmen_observasi_du_gangguan_persepsi', 'asesmen_observasi_fp_kognitif_memori', 'asesmen_observasi_fp_kognitif_konsentrasi', 'asesmen_observasi_fp_kognitif_orientasi', 'asesmen_observasi_fp_kognitif_kemampuan_verbal', 'asesmen_observasi_fp_kognitif_emosi', 'asesmen_observasi_fp_kognitif_perilaku', 'psikotes_pendukung_1', 'psikotes_pendukung_2', 'psikotes_pendukung_3', 'psikotes_pendukung_4', 'psikotes_pendukung_5'], 'string', 'max' => 15],
            [['hasil_tes'], 'string', 'max' => 200],
            [['dinamika_psikologi', 'kesimpulan'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_spesialis_psikologi' => 'Id Spesialis Psikologi',
            'no_rekam_medik' => 'No Rekam Medik',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'rs_pendukung' => 'Rumah Sakit Pendukung',
            'dokter' => 'Psikolog',
            'rp_diagnosa_dokter' => 'Diagnosa Dokter',
            'rp_keluhan_fisik' => 'Keluhan Fisik',
            'rp_keluhan_psikologis' => 'Keluhan Psikologis',
            'asesmen_observasi_du_penampilan_umum' => 'Penampilan Umum',
            'asesmen_observasi_du_sikap_terhadap_pemeriksa' => 'Sikap Terhadap Pemeriksa',
            'asesmen_observasi_du_afek' => 'Afek',
            'asesmen_observasi_du_roman_muka' => 'Roman Muka',
            'asesmen_observasi_du_proses_pikir' => 'Proses Pikir',
            'asesmen_observasi_du_gangguan_persepsi' => 'Gangguan Persepsi',
            'asesmen_observasi_fp_kognitif_memori' => 'Asesmen Observasi Fp Kognitif Memori',
            'asesmen_observasi_fp_kognitif_konsentrasi' => 'Asesmen Observasi Fp Kognitif Konsentrasi',
            'asesmen_observasi_fp_kognitif_orientasi' => 'Asesmen Observasi Fp Kognitif Orientasi',
            'asesmen_observasi_fp_kognitif_kemampuan_verbal' => 'Asesmen Observasi Fp Kognitif Kemampuan Verbal',
            'asesmen_observasi_fp_kognitif_emosi' => 'Asesmen Observasi Fp Kognitif Emosi',
            'asesmen_observasi_fp_kognitif_perilaku' => 'Asesmen Observasi Fp Kognitif Perilaku',
            'simptom_sakit_kepala' => 'Simptom Sakit Kepala',
            'simptom_kurang_nafsu_makan' => 'Simptom Kurang Nafsu Makan',
            'simptom_sulit_tidur' => 'Simptom Sulit Tidur',
            'simptom_mudah_takut' => 'Simptom Mudah Takut',
            'simptom_tegang' => 'Simptom Tegang',
            'simptom_cemas' => 'Simptom Cemas',
            'simptom_gemetar' => 'Simptom Gemetar',
            'simptom_gangguan_perut' => 'Simptom Gangguan Perut',
            'simptom_sulit_konsentrasi' => 'Simptom Sulit Konsentrasi',
            'simptom_sedih' => 'Simptom Sedih',
            'simptom_sulit_mengambil_keputusan' => 'Simptom Sulit Mengambil Keputusan',
            'simptom_kehilangan_minat' => 'Simptom Kehilangan Minat',
            'simptom_merasa_tidak_berguna' => 'Simptom Merasa Tidak Berguna',
            'simptom_mudah_lupa' => 'Simptom Mudah Lupa',
            'simptom_merasa_bersalah' => 'Simptom Merasa Bersalah',
            'simptom_mudah_lelah' => 'Simptom Mudah Lelah',
            'simptom_putus_asa' => 'Simptom Putus Asa',
            'simptom_mudah_marah' => 'Simptom Mudah Marah',
            'simptom_mudah_tersinggung' => 'Simptom Mudah Tersinggung',
            'simptom_mimpi_buruk' => 'Simptom Mimpi Buruk',
            'simptom_tidak_percaya_diri' => 'Simptom Tidak Percaya Diri',
            'psikotes_pendukung_1' => 'Psikotes Pendukung 1',
            'psikotes_pendukung_2' => 'Psikotes Pendukung 2',
            'psikotes_pendukung_3' => 'Psikotes Pendukung 3',
            'psikotes_pendukung_4' => 'Psikotes Pendukung 4',
            'psikotes_pendukung_5' => 'Psikotes Pendukung 5',
            'hasil_tes' => 'Hasil Tes',
            'dinamika_psikologi' => 'Dinamika Psikologi',
            'kesimpulan' => 'Kesimpulan',
        ];
    }

    public function getPasien()
    {
        return $this->hasOne(DataLayanan::className(), ['no_rekam_medik' => 'no_rekam_medik']);
    }

    public function getNama_no_rm()
    {
        return $this->pasien->nama . ' (' . $this->no_rekam_medik . ')';
    }
}
