<?php

namespace app\models;

use Yii;
use app\models\spesialis\McuSpesialisGigi;
use app\models\spesialis\McuSpesialisMata;
use app\models\SettingGlobal;
use app\models\spesialis\McuSpesialisThtBerbisik;

/**
 * This is the model class for table "mcu.gradding_mcu".
 *
 * @property string $id_gradding
 * @property string $id_data_pelayanan
 * @property string $no_rekam_medik
 * @property string $no_registrasi
 * @property string|null $no_mcu
 * @property string|null $kode_debitur
 * @property string|null $hasil
 * @property string $status
 * @property string $is_reset
 * @property float|null $poin
 */
class GraddingMcu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.gradding_mcu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_gradding', 'id_data_pelayanan', 'no_rekam_medik', 'no_registrasi', 'status', 'is_reset'], 'required'],
            [['hasil'], 'string'],
            [['poin'], 'number'],
            [['id_gradding', 'id_data_pelayanan', 'no_rekam_medik', 'no_mcu'], 'string', 'max' => 100],
            [['no_registrasi'], 'string', 'max' => 225],
            [['kode_debitur'], 'string', 'max' => 255],
            [['status', 'is_reset'], 'string', 'max' => 2],
            [['id_gradding'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_gradding' => 'Id Gradding',
            'id_data_pelayanan' => 'Id Data Pelayanan',
            'no_rekam_medik' => 'No Rekam Medik',
            'no_registrasi' => 'No Registrasi',
            'no_mcu' => 'No Mcu',
            'kode_debitur' => 'Kode Debitur',
            'hasil' => 'Hasil',
            'status' => 'Status',
            'is_reset' => 'Is Reset',
            'poin' => 'Poin',
        ];
    }

    public static function getIdGradding()
    {
        $kode = date('ymdHis');

        $cek = GraddingMcu::find()
            ->select(['coalesce(Max(substring(id_gradding,13,4)), Cast(0 as Varchar(1))) as id'])
            ->andWhere(['coalesce(substring(id_gradding,1,12), Cast(1 as Varchar(1)))' => $kode])
            ->asArray()
            ->one();

        if ($cek != Null) {
            if (count($cek) > 0) {
                $id = $kode . sprintf("%'.04d", ($cek['id'] + 1));
            } else {
                $id = $kode . '0001';
            }
        }

        return $id;
    }

    public function getDataMcu($KodeDebitur)
    {
        $data = DataLayanan::find()
            ->select(['id_data_pelayanan', 'no_rekam_medik', 'no_registrasi', 'no_mcu', 'kode_debitur', 'nama', 'jenis_kelamin'])
            ->andWhere(['kode_debitur' => $KodeDebitur])
            ->andWhere(['not', ['no_registrasi' => null]])
            ->asArray()
            ->all();

        return $data;
    }

    public function getHasilPasien($NoPasien, $NoDaftar)
    {
        $global = new SettingGlobal();

        $dataGigi = McuSpesialisGigi::find()->andWhere(['no_rekam_medik' => $NoPasien, 'no_daftar' => $NoDaftar])->asArray()->one();
        // Id Kategori Setting untuk gigi = 5
        $Gigi = $global->getSettingGlobalByKategori(5);
        $resultGigi = $this->resultArray($Gigi, $dataGigi);

        $dataMata = McuSpesialisMata::find()->andWhere(['no_rekam_medik' => $NoPasien, 'no_daftar' => $NoDaftar])->asArray()->one();
        // Id Kategori Setting untuk mata = 2
        $Mata = $global->getSettingGlobalByKategori(2);
        $resultMata = $this->resultArray($Mata, $dataMata);

        $dataThtBerbisik = McuSpesialisThtBerbisik::find()->andWhere(['no_rekam_medik' => $NoPasien, 'no_daftar' => $NoDaftar])->asArray()->one();
        // Id Kategori Setting untuk tht_berbisi = 34
        $Tht_Berbisik = $global->getSettingGlobalByKategori(34);
        $resultThtBerbisik = $this->resultArray($Tht_Berbisik, $dataThtBerbisik);

        $dataPemeriksaanFisik = MasterPemeriksaanFisik::find()->andWhere(['no_rekam_medik' => $NoPasien, 'no_daftar' => $NoDaftar])->asArray()->one();
        // Id Kategori Setting untuk Tanda Vital = 7
        $Tanda_Vital = $global->getSettingGlobalByKategori(7);
        $resultTandaVital = $this->resultArray($Tanda_Vital, $dataPemeriksaanFisik);

        // Id Kategori Setting untuk Status Gizi = 8
        $Status_Gizi = $global->getSettingGlobalByKategori(8);
        $resultStatusGizi = $this->resultArray($Status_Gizi, $dataPemeriksaanFisik);

        // Id Kategori Setting untuk Tingkat Kesadaran = 9
        $Tingkat_Kesadaran = $global->getSettingGlobalByKategori(9);
        $resultTingkatKesadaran = $this->resultArray($Tingkat_Kesadaran, $dataPemeriksaanFisik);

        // Id Kategori Setting untuk Getah Bening = 10
        $Getah_Bening = $global->getSettingGlobalByKategori(10);
        $resultGetahBening = $this->resultArray($Getah_Bening, $dataPemeriksaanFisik);

         // Id Kategori Setting untuk Kepala = 11
         $Kepala = $global->getSettingGlobalByKategori(11);
         $resultKepala = $this->resultArray($Kepala, $dataPemeriksaanFisik);

         // Id Kategori Setting untuk Telinga = 6
         $Telinga = $global->getSettingGlobalByKategori(6);
         $resultTelinga = $this->resultArray($Telinga, $dataPemeriksaanFisik);

         // Id Kategori Setting untuk Hidung = 12
         $Hidung = $global->getSettingGlobalByKategori(12);
         $resultHidung = $this->resultArray($Hidung, $dataPemeriksaanFisik);

         // Id Kategori Setting untuk Mulut = 13
         $Mulut = $global->getSettingGlobalByKategori(13);
         $resultMulut = $this->resultArray($Mulut, $dataPemeriksaanFisik);

         // Id Kategori Setting untuk Tenggorokan = 15
         $Tenggorokan = $global->getSettingGlobalByKategori(15);
         $resultTenggorokan = $this->resultArray($Tenggorokan, $dataPemeriksaanFisik);

         // Id Kategori Setting untuk Dada = 16
         $Dada = $global->getSettingGlobalByKategori(16);
         $resultDada = $this->resultArray($Dada, $dataPemeriksaanFisik);

         // Id Kategori Setting untuk Paru Jantung = 17
         $Paru_Jantung = $global->getSettingGlobalByKategori(17);
         $resultParuJantung = $this->resultArray($Paru_Jantung, $dataPemeriksaanFisik);

         // Id Kategori Setting untuk Abdomen = 18
         $Abdomen = $global->getSettingGlobalByKategori(18);
         $resultAbdomen = $this->resultArray($Abdomen, $dataPemeriksaanFisik);

         // Id Kategori Setting untuk Genitourinaria = 19
         $Genitourinaria = $global->getSettingGlobalByKategori(19);
         $resultGenitourinaria = $this->resultArray($Genitourinaria, $dataPemeriksaanFisik);

         // Id Kategori Setting untuk Vertebra = 20
         $Vertebra = $global->getSettingGlobalByKategori(20);
         $resultVertebra = $this->resultArray($Vertebra, $dataPemeriksaanFisik);

         // Id Kategori Setting untuk Tulang Atas = 21
         $Tulang_Atas = $global->getSettingGlobalByKategori(21);
         $resultTulangAtas = $this->resultArray($Tulang_Atas, $dataPemeriksaanFisik);

          // Id Kategori Setting untuk Tulang Bawah = 22
          $Tulang_Bawah = $global->getSettingGlobalByKategori(22);
          $resultTulangBawah = $this->resultArray($Tulang_Bawah, $dataPemeriksaanFisik);

          // Id Kategori Setting untuk Otot Motorik = 23
          $Otot_Motorik = $global->getSettingGlobalByKategori(23);
          $resultOtotMotorik = $this->resultArray($Otot_Motorik, $dataPemeriksaanFisik);

          // Id Kategori Setting untuk Fungsi Sensorik = 24
          $Fungsi_Sensorik = $global->getSettingGlobalByKategori(24);
          $resultFungsiSensorik = $this->resultArray($Fungsi_Sensorik, $dataPemeriksaanFisik);

          // Id Kategori Setting untuk Saraf = 25
          $Saraf = $global->getSettingGlobalByKategori(25);
          $resultSaraf = $this->resultArray($Saraf, $dataPemeriksaanFisik);

          // Id Kategori Setting untuk Reflek = 26
          $Reflek = $global->getSettingGlobalByKategori(26);
          $resultReflek = $this->resultArray($Reflek, $dataPemeriksaanFisik);

           // Id Kategori Setting untuk Kulit = 27
           $Kulit = $global->getSettingGlobalByKategori(27);
           $resultKulit = $this->resultArray($Kulit, $dataPemeriksaanFisik);

           // Id Kategori Setting untuk Fisik Khusus = 28
           $Fisik_Khusus = $global->getSettingGlobalByKategori(28);
           $resultFisikKhusus = $this->resultArray($Fisik_Khusus, $dataPemeriksaanFisik);

           // Id Kategori Setting untuk Resume Kelainan = 29
           $Resume_Kelainan = $global->getSettingGlobalByKategori(29);
           $resultResumeKelainan = $this->resultArray($Resume_Kelainan, $dataPemeriksaanFisik);

           // Id Kategori Setting untuk Leher = 31
           $Leher = $global->getSettingGlobalByKategori(31);
           $resultLeher = $this->resultArray($Leher, $dataPemeriksaanFisik);

           // Id Kategori Setting untuk Diagnosis Kerja = 30
           $Diagnosis_Kerja = $global->getSettingGlobalByKategori(30);
           $resultDiagnosisKerja = $this->resultArray($Diagnosis_Kerja, $dataPemeriksaanFisik);

           // Id Kategori Setting untuk Diagnosis Diferensial = 32
           $Diagnosis_Diferensial = $global->getSettingGlobalByKategori(32);
           $resultDiagnosisDiferensial = $this->resultArray($Diagnosis_Diferensial, $dataPemeriksaanFisik);
           
           // Id Kategori Setting untuk Kategori Kesehatan = 33
           $Kategori_Kesehatan = $global->getSettingGlobalByKategori(33);
           $resultKategoriKesehatan = $this->resultArray($Kategori_Kesehatan, $dataPemeriksaanFisik);

           $resultLab = $this->resultLab($NoPasien, $NoDaftar);

         
        $result = [
            'gigi' => $resultGigi,
            'mata' => $resultMata,
            'tht_berbisik' => $resultThtBerbisik,
            'tanda_vital' => $resultTandaVital,
            'status_gizi' => $resultStatusGizi,
            'tingkat_kesadaran' => $resultTingkatKesadaran,
            'getah_bening' => $resultGetahBening,
            'kepala' => $resultKepala,
            'telinga' => $resultTelinga,
            'hidung' => $resultHidung,
            'mulut' => $resultMulut,
            'tenggorokan' => $resultTenggorokan,
            'dada' => $resultDada,
            'paru_jantung' => $resultParuJantung,
            'abdomen' => $resultAbdomen,
            'genitourinaria' => $resultGenitourinaria,
            'vertebra' => $resultVertebra,
            'tulang_atas' => $resultTulangAtas,
            'tulang_bawah' => $resultTulangBawah,
            'otot_motorik' => $resultOtotMotorik,
            'fungsi_sensorik' => $resultFungsiSensorik,
            'saraf' => $resultSaraf,
            'reflek' => $resultReflek,
            'kulit' => $resultKulit,
            'fisik_khusus' => $resultFisikKhusus,
            'resume_kelainan' => $resultResumeKelainan,
            'leher' => $resultLeher,
            'diagnosis_kerja' => $resultDiagnosisKerja,
            'diagnosis_diferensial' => $resultDiagnosisDiferensial,
            'kategori_kesehatan' => $resultKategoriKesehatan,
            'lab' => $resultLab,
        ];

        return $result;
    }

    public function resultArray($ArraySetting, $ArrrayHasil)
    {
        $result = [];
        if ($ArrrayHasil != Null) {
            if ($ArraySetting != Null) {
                foreach ($ArraySetting as $data) {

                    $value = $ArrrayHasil[$data['nama_item_setting']];
                    $hasil = $this->hasilValue($data['nama_item_setting'], $value);

                    $d = [
                        'tampil' => $data['tampil'],
                        'item' => $data['nama_item_setting'],
                        'value' => $value,
                        'result' => $hasil
                    ];

                    array_push($result, $d);
                }
            }
        }

        return $result;
    }

    public function resultLab($NoPasien, $NoDaftar)
    {
        $result = [];
        $global = new SettingGlobal(); // Id Kategori Setting untuk Lab. PK = 1
        $LabPK = $global->getSettingGlobalByKategori(1);

        $data = PenunjangValidasiLab::find()->where(['pid' => $NoPasien, 'apid' =>$NoDaftar, 'status' => '2'])->one();

        if($data != Null) {
            $dataApi = Null;
            if($data->data_api != Null) {
                $dataApi=json_decode($data->data_api, true);
            }

            foreach ($LabPK as $dt) {

                $value = $this->getDataLab($dt['kode_tes'], $dataApi);
                $hasil = $this->labCompare($dt['kode_tes'], $dataApi);

                $d = [
                    'tampil' => $dt['tampil'],
                    'item' => $dt['nama_item_setting'],
                    'value' => $value,
                    'result' => $hasil
                ];
                array_push($result, $d);
            }

        }

        return $result;
    }

    public function getDataLab($uji, $dataApi){
		if($dataApi != Null) {
                foreach ($dataApi['detail'] as $key => $lab){
                    if($lab['test_cd']==$uji){
                        // return $lab['test_nm']." : ".$lab['result_value']." ".$lab['unit'];
                        return $lab['result_value']." ".$lab['unit'];
                    }
            }
        }	
        return Null;
    }
    
    public static function labCompare($uji, $dataApi)
    {
        if($dataApi != Null) {
            foreach ($dataApi['detail'] as $key => $lab) {
                if ($lab['test_cd'] == $uji) {
                    // return $lab['result_value']." ".$lab['unit']." Range :".$lab['ref_range']; 
                    //$range=explode(" ", $lab['ref_range']);
                    $range = str_replace(" ", "", $lab['ref_range']);
                    $result = str_replace(" ", "", $lab['result_value']);
                    // if($lab['result_value']==$lab['ref_range']){
                    if (strtoupper($result) == strtoupper($range)) {
                        return 0;
                    } else {
                        return  1;
                            // ." ====> Range :".$lab['ref_range'].";;"
                        ;
                    }
                    // return "$uji : ".$lab['result_value']." ".$lab['unit']; 
                }
            }
        }
        return Null;
    }

    public function hasilValue($item, $value)
    {
        $data = [
            'kesan' => 'Normal',
            // Keadaan Normal Gigi
            'g18' => 'Normal', 'g17' => 'Normal', 'g16' => 'Normal', 'g15' => 'Normal', 'g14' => 'Normal',
            'g13' => 'Normal', 'g12' => 'Normal', 'g11' => 'Normal', 'g21' => 'Normal', 'g22' => 'Normal',
            'g23' => 'Normal', 'g24' => 'Normal', 'g25' => 'Normal', 'g26' => 'Normal', 'g27' => 'Normal',
            'g28' => 'Normal', 'g38' => 'Normal', 'g37' => 'Normal', 'g36' => 'Normal', 'g35' => 'Normal',
            'g34' => 'Normal', 'g33' => 'Normal', 'g32' => 'Normal', 'g31' => 'Normal', 'g41' => 'Normal',
            'g42' => 'Normal', 'g43' => 'Normal', 'g44' => 'Normal', 'g45' => 'Normal', 'g46' => 'Normal',
            'g47' => 'Normal', 'g48' => 'Normal', 'oklusi' => 'Normal Bite', 'torus_palatinus' => 'Tidak Ada',
            'torus_mandibularis' => 'Tidak Ada', 'palatum' => 'Tinggi', 'supernumerary_teeth' => 'Tidak Ada',
            'diastema' => 'Tidak Ada', 'spacing' => 'Tidak Ada', 'oral_hygiene' => 'Baik', 'gingiva_periodontal' => 'Normal',
            'oral_mucosa' => 'Normal', 'tongue' => 'Normal', 'lain_lain' => '', 

            // Keadaan Normal Mata
            'persepsi_warna_mata_kanan' => 'Normal', 'persepsi_warna_mata_kiri' => 'Normal',
            'kelopak_mata_kanan' => 'Normal', 'kelopak_mata_kiri' => 'Normal',
            'konjungtiva_mata_kanan' => 'Normal', 'konjungtiva_mata_kiri' => 'Normal',
            'kesegarisan_gerak_bola_mata_kanan' => 'Normal', 'kesegarisan_gerak_bola_mata_kiri' => 'Normal',
            'skiera_mata_kanan' => 'Normal', 'skiera_mata_kiri' => 'Normal', 'lensa_mata_kanan' => 'Tidak Keruh',
            'lensa_mata_kiri' => 'Tidak Keruh', 'kornea_mata_kanan' => 'Normal', 'kornea_mata_kiri' => 'Normal',
            'bulu_mata_kanan' => 'Normal', 'bulu_mata_kiri' => 'Normal', 'tekanan_bola_mata_kanan' => 'Normal',
            'tekanan_bola_mata_kiri' => 'Normal', 'penglihatan_3_dimensi_mata_kanan' => 'Normal', 'penglihatan_3_dimensi_mata_kiri' => 'Normal',
            'virus_mata_dengan_koreksi_mata_kanan' => '-', 'virus_mata_dengan_koreksi_mata_kiri' => '-',
            'virus_mata_dengan_koreksi_mata_kanan' => '', 'virus_mata_dengan_koreksi_mata_kiri' => '',
            'lain_lain' => '', 

            // Keadaan Normal THT berbisik 
            'tl_test_berbisik_telinga_kanan_option' => 'Jarak 6-5 Meter', 'tl_test_berbisik_telinga_kiri_option' => 'Jarak 6-5 Meter',
            'tl_test_berbisik_telinga_kanan' => 'Dalam Batas Normal', 'tl_test_berbisik_telinga_kiri' => 'Dalam Batas Normal',
            

            // Keadaaan Normal Pemeriksaan Fisik
            'tingkat_kesadaran_kesadaran' => 'Compos Mentis', 'tingkat_kesadaran_kualitas_kontak' => 'Baik',
            'tingkat_kesadaran_tampak_kesakitan' => 'Tidak Tampak Kesakitan', 'tingkat_kesadaran_gangguan_saat_berjalan' => 'Tidak',
            'kelenjar_getah_bening_leher' => 'Normal',
            'kelenjar_getah_bening_sub_mandibula' => 'Normal',
            'kelenjar_getah_bening_ketiak' => 'Normal',
            'kelenjar_getah_bening_inguinal' => 'Normal',
            'kepala_tulang' => 'Baik',
            'kepala_kulit_kepala' => 'Baik',
            'kepala_rambut' => 'Baik',
            'kepala_bentuk_wajah' => 'Baik',
            'mata_persepsi_warna_kanan' => 'Normal',
            'mata_persepsi_warna_kiri' => 'Normal',
            'mata_kelopak_mata_kanan' => 'Normal',
            'mata_kelopak_mata_kiri' => 'Normal',
            'mata_konjungtiva_kanan' => 'Normal',
            'mata_konjungtiva_kiri' => 'Normal',
            'mata_gerak_bola_mata_kanan' => 'Normal',
            'mata_gerak_bola_mata_kiri' => 'Normal',
            'mata_sklera_kanan' => 'Normal',
            'mata_sklera_kiri' => 'Normal',
            'mata_lensa_mata_kanan' => 'Normal',
            'mata_lensa_mata_kiri' => 'Normal',
            'mata_kornea_kanan' => 'Normal',
            'mata_kornea_kiri' => 'Normal',
            'mata_bulu_mata_kanan' => 'Normal',
            'mata_bulu_mata_kiri' => 'Normal',
            'mata_tekanan_bola_mata_kanan' => 'Normal',
            'mata_tekanan_bola_mata_kiri' => 'Normal',
            'mata_penglihatan_3dimensi_kanan' => 'Normal',
            'mata_penglihatan_3dimensi_kiri' => 'Normal',
            'telinga_daun_telinga_kanan' => 'Normal',
            'telinga_daun_telinga_kiri' => 'Normal',
            'telinga_liang_telinga_kanan' => 'Normal',
            'telinga_liang_telinga_kiri' => 'Normal',
            'telinga_serumen_kanan' => 'Normal',
            'telinga_serumen_kiri' => 'Normal',
            'telinga_timpani_kanan' => 'Normal',
            'telinga_timpani_kiri' => 'Normal',
            'hidung_meatus_nasi' => 'Normal',
            'hidung_septum_nasi' => 'Normal',
            'hidung_konka_nasal' => 'Normal',
            'hidung_nyeri_ketok_sinus' => 'Normal',
            'hidung_penciuman' => 'Normal',
            'mulut_bibir' => 'Normal',
            'mulut_lidah' => 'Normal',
            'mulut_gusi' => 'Normal',
            'mulut_lainnya' => 'Normal',
            'tenggorokan' => 'Normal',
            'tenggorokan_pharynx' => 'Normal',
            'tenggorokan_tonsil_kanan' => 'TO',
            'tenggorokan_tonsil_kiri' => 'TO',
            'tenggorokan_tonsil_ukuran_kanan' => 'Normal',
            'tenggorokan_tonsil_ukuran_kiri' => 'Normal',
            'tenggorokan_palatum' => 'Normal',
            'leher_gerakan_leher' => 'Normal',
            'leher_otot_leher' => 'Normal',
            'leher_kelenjar_thyroid' => 'Normal',
            'leher_pulsasi_carotis' => 'Normal',
            'leher_tekanan_vena_jugularis' => 'Normal',
            'leher_trachea' => 'Normal',
            'dada_bentuk' => 'Simetris',
            'dada' => 'Normal',
            'dada_mamae' => 'Normal',
            'paru_jantung_palpasi' => 'Normal',
            'paru_jantung_perkusi_iktus_kanan' => 'Normal',
            'paru_jantung_perkusi_kiri' => 'Sonor',
            'paru_jantung_perkusi_iktus_kanan' => 'Normal',
            'paru_jantung_perkusi_batas_jantung_kanan' => 'Normal',
            'paru_jantung_auskultasi_bunyi_nafas_kanan' => 'Vesikuler',
            'paru_jantung_auskultasi_bunyi_nafas_kiri' => 'Vesikuler',
            'paru_jantung_auskultasi_bunyi_nafas_tambah_kanan' => 'Tak Ada',
            'paru_jantung_auskultasi_bunyi_nafas_tambah_kiri' => 'Tak Ada',
            'paru_jantung_bunyi_jantung' => 'Normal',
            'abdomen' => 'Supel',
            'abdomen_perkusi' => 'Timpani',
            'abdomen_auskultasi_bising_usus' => 'Normal',
            'abdomen_hati' => 'Tidak Teraba',
            'abdomen_limpa' => 'Tidak Teraba Schuffner',
            'abdomen_ginjal_kanan' => 'Normal',
            'abdomen_ginjal_kiri' => 'Normal',
            'abdomen_ballotement_kanan' => 'Normal',
            'abdomen_ballotement_kiri' => 'Normal',
            'abdomen_nyeri_costo_vertebrae_kanan' => 'Normal',
            'abdomen_nyeri_costo_vertebrae_kiri' => 'Normal',
            'genitourinaria_kandung_kemih' => 'Normal',
            'genitourinaria_anus' => 'Normal',
            'genitourinaria_genitalia_eksternal' => 'Normal',
            'genitourinaria_prostat' => 'Teraba',
            'vertebra' => 'Normal',
            'tulang_atas_gerakan_abduksi_neer_kanan' => 'Normal',
            'tulang_atas_gerakan_abduksi_hawkin_kanan' => 'Normal',
            'tulang_atas_gerakan_drop_arm_kanan' => 'Normal',
            'tulang_atas_gerakan_yergason_kanan' => 'Normal',
            'tulang_atas_gerakan_speed_kanan' => 'Normal',
            'tulang_atas_tulang_kanan' => 'Normal',
            'tulang_atas_sensibilitas_kanan' => 'Normal',
            'tulang_atas_oedem_kanan' => 'Tidak Ada',
            'tulang_atas_varises_kanan' => 'Tidak Ada',
            'tulang_atas_kekuatan_otot_pin_prick_kanan' => 'Normal',
            'tulang_atas_kekuatan_otot_phallent_kanan' => 'Normal',
            'tulang_atas_kekuatan_otot_tinnel_kanan' => 'Normal',
            'tulang_atas_kekuatan_otot_finskelstein_kanan' => 'Normal',
            'tulang_atas_kelaianan_kukujari_kanan' => 'Tidak Ada',
            'tulang_atas_sensibilitas_kanan' => 'Baik',
            'tulang_atas_sensibilitas_kiri' => 'Baik',
            'tulang_atas_gerakan_abduksi_neer_kiri' => 'Normal',
            'tulang_atas_gerakan_abduksi_hawkin_kiri' => 'Normal',
            'tulang_atas_gerakan_drop_arm_kiri' => 'Normal',
            'tulang_atas_gerakan_yergason_kiri' => 'Normal',
            'tulang_atas_gerakan_speed_kiri' => 'Normal',
            'tulang_atas_tulang_kiri' => 'Normal',
            'tulang_atas_oedem_kiri' => 'Tidak Ada',
            'tulang_atas_varises_kiri' => 'Tidak Ada',
            'tulang_atas_kekuatan_otot_pin_prick_kiri' => 'Normal',
            'tulang_atas_kekuatan_otot_phallent_kiri' => 'Normal',
            'tulang_atas_kekuatan_otot_tinnel_kiri' => 'Normal',
            'tulang_atas_kekuatan_otot_finskelstein_kiri' => 'Normal',
            'tulang_atas_kelaianan_kukujari_kiri' => 'Tidak Ada',

            'tulang_bawah_laseque_kanan' => 'Normal',
            'tulang_bawah_kernique_kanan' => 'Normal',
            'tulang_bawah_patrick_kanan' => 'Normal',
            'tulang_bawah_contrapatrick_kanan' => 'Normal',
            'tulang_bawah_nyeri_tekanan_kanan' => 'Tidak Ada',
            'tulang_bawah_kekuatan_otot_kanan' => 'Normal',
            'tulang_bawah_sensibilitas_kanan' => 'Baik',
            'tulang_bawah_oedema_kanan' => 'Tidak Ada',
            'tulang_bawah_kelainan_kuku_kanan' => 'Tidak Ada',

            'tulang_bawah_laseque_kiri' => 'Normal',
            'tulang_bawah_kernique_kiri' => 'Normal',
            'tulang_bawah_patrick_kiri' => 'Normal',
            'tulang_bawah_contrapatrick_kiri' => 'Normal',
            'tulang_bawah_nyeri_tekanan_kiri' => 'Tidak Ada',

            'tulang_bawah_kekuatan_otot_kiri' => 'Normal',
            'tulang_bawah_sensibilitas_kiri' => 'Baik',
            'tulang_bawah_oedema_kiri' => 'Tidak Ada',
            'tulang_bawah_vaskularisasi_kiri' => 'Baik',
            'tulang_bawah_kelainan_kuku_kiri' => 'Tidak Ada',

            'otot_motorik_trofi_kanan' => 'Normal',
            'otot_motorik_tonus_kanan' => 'Normal',
            'otot_motorik_gerakan_abnormal_kanan' => 'Tidak Ada',
            'otot_motorik_trofi_kiri' => 'Normal',
            'otot_motorik_tonus_kiri' => 'Normal',
            'otot_motorik_gerakan_abnormal_kiri' => 'Tidak Ada',

            'fungsi_sensorik_kanan' => 'Normal',
            'fungsi_autonom_kanan' => 'Normal',
            'fungsi_sensorik_kiri' => 'Normal',
            'fungsi_autonom_kiri' => 'Normal',

            'saraf_daya_ingat_segera' => 'Baik',
            'saraf_daya_ingat_jangka_menengah' => 'Baik',
            'saraf_daya_ingat_jangka_pendek' => 'Baik',
            'saraf_daya_ingat_jangka_panjang' => 'Baik',
            'saraf_orientasi_waktu' => 'Baik',
            'saraf_orientasi_orang' => 'Baik',
            'saraf_orientasi_tempat' => 'Baik',
            'saraf_kesan' => 'Baik',
            'saraf_kesan_n_i' => 'Baik',
            'saraf_kesan_n_ii' => 'Baik',
            'saraf_kesan_n_iii' => 'Baik',
            'saraf_kesan_n_iv' => 'Baik',
            'saraf_kesan_n_v' => 'Baik',
            'saraf_kesan_n_vi' => 'Baik',
            'saraf_kesan_n_vii' => 'Baik',
            'saraf_kesan_n_viii' => 'Baik',
            'saraf_kesan_n_ix' => 'Baik',
            'saraf_kesan_n_x' => 'Baik',
            'saraf_kesan_n_xi' => 'Baik',
            'saraf_kesan_n_xii' => 'Baik',
            'reflek_fisiologis_patella_kanan' => 'Normal',
            'reflek_patologis_kanan' => 'Negative',
            'reflek_fisiologis_patella_kiri' => 'Normal',
            'reflek_patologis_kiri' => 'Negative',
            'kulit_kulit' => 'Normal',
            'kulit_selaput_lendir' => 'Normal',
            'kulit_kuku' => 'Normal',
            'kulit_tato' => 'Tidak Ada',
            'kategori_kesehatan' => 'FIT',
            'abdomen_ballotement_kanan' => 'Tidak Ada',
            'abdomen_ballotement_kiri' => 'Tidak Ada',
            'abdomen_nyeri_costo_vertebrae_kanan' => 'Tidak Ada',
            'abdomen_nyeri_costo_vertebrae_kiri' => 'Tidak Ada',
            'tulang_atas_vaskularisasi_kanan' => 'Baik',
            'tulang_atas_vaskularisasi_kiri' => 'Baik',
            'mata_lensa_mata_kanan' => 'Tidak Keruh',
            'mata_lensa_mata_kiri' => 'Tidak Keruh',
            'paru_jantung_perkusi_iktus_kiri' => 'Normal',
            'tulang_atas_simetris' => 'Tidak Ada',
            'tulang_bawah_simetris' => 'Tidak Ada'

        ];

        $d = [
            $item => $value
        ];

        if (!array_diff($d, $data)) {
            $result = 0;
        } else {
            $result = 1;
            if ($value == '-' or $value == 'Normal') {
                $result = 0;
            }
        }

        return $result;
    }

    public function getPoinPasien($hasil)
    {
        $poin = Null;
        if($hasil != Null) {
            $poin = 0;
            foreach($hasil as $d) { 
                foreach ($d as $k=>$data) {         
                    if($data['tampil'] == 1) {
                        if($data['result'] == 1) {
                            $poin = $poin + 1;
                        }
                    }
                }            
            } 
           
            
        }

        return $poin;
    }


    public function cekGradding($IdLayanan, $NoPasien, $NoDaftar)
    {
        $Data = GraddingMcu::find()
            ->andWhere(['id_data_pelayanan' => $IdLayanan, 'no_rekam_medik' => $NoPasien, 'no_registrasi' => $NoDaftar, 'status' => 2])
            ->asArray()
            ->one();

        if ($Data != Null) {
            // Jika ada datanya lakukan update
            return 1;
        } else {
            // Jika tidak ada datanya lakukan insert
            return 0;
        }
    }

    public function getDataGradding($KodeDebitur)
    {
        $data = $this->getDataMcu($KodeDebitur);
        $result = [];
        if ($data != Null) {
            foreach ($data as $dt) {
                $hasil = $this->getHasilPasien($dt['no_rekam_medik'], $dt['no_registrasi']);
                $poin = $this->getPoinPasien($hasil);
                $d = [
                    'id_pelayanan' => $dt['id_data_pelayanan'],
                    'no_pasien' => $dt['no_rekam_medik'],
                    'no_daftar' => $dt['no_registrasi'],
                    'no_mcu' => $dt['no_mcu'],
                    'kode_debitur' => $dt['kode_debitur'],
                    'nama' => $dt['nama'],
                    'jk' => $dt['jenis_kelamin'],
                    'poin' => $poin,
                    'hasil' => $hasil
                ];
                array_push($result, $d);
            }
        }
        // $data2 = $this->getHasilPasien('01051206', '2010004196');
        return $result;
    }
}
