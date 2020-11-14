<?php

namespace app\models\spesialis;

use Yii;

/**
 * This is the model class for table "mcu.spesialis_psikologi".
 *
 * @property int $id_spesialis_psikologi
 * @property string $no_rekam_medik
 * @property string|null $no_daftar
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $pendidikan
 * @property string|null $alamat
 * @property string|null $jenis_kelamin
 * @property string|null $urutan_kelahiran
 * @property string|null $agama
 * @property string|null $status
 * @property string|null $pekerjaan
 * @property string|null $tgl_pemeriksaan
 * @property string|null $diagnosa_dokter
 * @property string|null $keluhan_fisik
 * @property string|null $keluhan_psikologis
 * @property string|null $penampilan_umum
 * @property string|null $sikap_terhadap_pemeriksa
 * @property string|null $afek
 * @property string|null $roman_muka
 * @property string|null $proses_pikir
 * @property string|null $gangguan_persepsi
 * @property string|null $kognitif_memori
 * @property string|null $kognitif_konsentrasi
 * @property string|null $kognitif_orientasi
 * @property string|null $kognitif_kemampuan_verbal
 * @property string|null $emosi
 * @property string|null $perilaku
 * @property string|null $simptom
 * @property string|null $pendukung_1
 * @property string|null $pendukung_2
 * @property string|null $pendukung_3
 * @property string|null $pendukung_4
 * @property string|null $pendukung_5
 * @property string|null $pendukung_hasil_tes
 * @property string|null $dinamika_psikologi
 * @property string|null $kesimpulan
 * @property string|null $riwayat
 * @property string|null $kesan
 * @property string|null $status_pemeriksaan
 */
class McuSpesialisPsikologi extends \app\models\spesialis\BaseAR
{
    public $simptom1;
    public $simptom2;
    public $simptom3;
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
    public function rules()
    {
        return [
            [['no_rekam_medik'], 'required'],
            [['no_daftar', 'pendidikan', 'alamat', 'jenis_kelamin', 'urutan_kelahiran', 'agama', 'status', 'pekerjaan', 'diagnosa_dokter', 'keluhan_fisik', 'keluhan_psikologis', 'penampilan_umum', 'sikap_terhadap_pemeriksa', 'afek', 'roman_muka', 'proses_pikir', 'gangguan_persepsi', 'kognitif_memori', 'kognitif_konsentrasi', 'kognitif_orientasi', 'kognitif_kemampuan_verbal', 'emosi', 'perilaku', 'pendukung_1', 'pendukung_2', 'pendukung_3', 'pendukung_4', 'pendukung_5', 'pendukung_hasil_tes', 'dinamika_psikologi', 'kesimpulan', 'riwayat', 'kesan', 'status_pemeriksaan'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'default', 'value' => null],
            [['created_by', 'updated_by'], 'integer'],
            [['no_rekam_medik'], 'string', 'max' => 120],

            ['tgl_pemeriksaan', 'safe'],
            ['simptom', 'safe'],
            [['simptom1', 'simptom2', 'simptom3'], 'safe'],
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
            'no_daftar' => 'No Daftar',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'pendidikan' => 'Pendidikan',
            'alamat' => 'Alamat',
            'jenis_kelamin' => 'Jenis Kelamin',
            'urutan_kelahiran' => 'Urutan Kelahiran',
            'agama' => 'Agama',
            'status' => 'Status',
            'pekerjaan' => 'Pekerjaan',
            'tgl_pemeriksaan' => 'Tgl Pemeriksaan',
            'diagnosa_dokter' => 'Diagnosa Dokter',
            'keluhan_fisik' => 'Keluhan Fisik',
            'keluhan_psikologis' => 'Keluhan Psikologis',
            'penampilan_umum' => 'Penampilan Umum',
            'sikap_terhadap_pemeriksa' => 'Sikap Terhadap Pemeriksa',
            'afek' => 'Afek',
            'roman_muka' => 'Roman Muka',
            'proses_pikir' => 'Proses Pikir',
            'gangguan_persepsi' => 'Gangguan Persepsi',
            'kognitif_memori' => 'Kognitif Memori',
            'kognitif_konsentrasi' => 'Kognitif Konsentrasi',
            'kognitif_orientasi' => 'Kognitif Orientasi',
            'kognitif_kemampuan_verbal' => 'Kognitif Kemampuan Verbal',
            'emosi' => 'Emosi',
            'perilaku' => 'Perilaku',
            'simptom' => 'Simptom',
            'pendukung_1' => 'Pendukung 1',
            'pendukung_2' => 'Pendukung 2',
            'pendukung_3' => 'Pendukung 3',
            'pendukung_4' => 'Pendukung 4',
            'pendukung_5' => 'Pendukung 5',
            'pendukung_hasil_tes' => 'Pendukung Hasil Tes',
            'dinamika_psikologi' => 'Dinamika Psikologi',
            'kesimpulan' => 'Kesimpulan',
            'riwayat' => 'Riwayat',
            'kesan' => 'Kesan',
            'status_pemeriksaan' => 'Status Pemeriksaan',
        ];
    }

    /**
     * {@inheritdoc}
     * @return McuSpesialisPsikologiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new McuSpesialisPsikologiQuery(get_called_class());
    }
}
