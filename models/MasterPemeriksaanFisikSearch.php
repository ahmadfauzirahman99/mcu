<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MasterPemeriksaanFisik;

/**
 * MasterPemeriksaanFisikSearch represents the model behind the search form of `app\models\MasterPemeriksaanFisik`.
 */
class MasterPemeriksaanFisikSearch extends MasterPemeriksaanFisik
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_m_pemeriksaan_fisik', 'status_gizi_tinggi_badan', 'status_gizi_berat_badan', 'status_gizi_lingkaran_perut', 'status_gizi_lingkaran_pinggang'], 'integer'],
            [['no_rekam_medik', 'tanda_vital', 'tanda_vital_nadi', 'tanda_vital_pernapasan', 'tanda_vital_tekanan_darah', 'tanda_vital_suhu_badan', 'status_gizi', 'status_gizi_bentuk_badan', 'tingkat_kesadaran', 'tingkat_kesadaran_kesadaran', 'tingkat_kesadaran_kualitas_kontak', 'tingkat_kesadaran_tampak_kesakitan', 'tingkat_kesadaran_gangguan_saat_berjalan', 'kelenjar_getah_bening', 'kelenjar_getah_bening_leher', 'kelenjar_getah_bening_sub_mandibula', 'kelenjar_getah_bening_ketiak', 'kelenjar_getah_bening_inguinal', 'kepala', 'kepala_tulang', 'kepala_kulit_kepala', 'kepala_rambut', 'kepala_bentuk_wajah', 'mata', 'mata_persepsi_warna_kanan', 'mata_persepsi_warna_kiri', 'mata_kelopak_mata_kanan', 'mata_kelopak_mata_kiri', 'mata_konjungtiva_kanan', 'mata_konjungtiva_kiri', 'mata_gerak_bola_mata_kanan', 'mata_gerak_bola_mata_kiri', 'mata_sklera_kanan', 'mata_sklera_kiri', 'mata_lensa_mata_kanan', 'mata_lensa_mata_kiri', 'mata_kornea_kanan', 'mata_kornea_kiri', 'mata_bulu_mata_kanan', 'mata_bulu_mata_kiri', 'mata_tekanan_bola_mata_kanan', 'mata_tekanan_bola_mata_kiri', 'mata_penglihatan_3dimensi_kanan', 'mata_penglihatan_3dimensi_kiri', 'mata_visus_tanpa_koreksi', 'mata_visus_dengan_koreksi', 'telinga', 'telinga_daun_telinga_kanan', 'telinga_daun_telinga_kiri', 'telinga_liang_telinga_kanan', 'telinga_liang_telinga_kiri', 'telinga_serumen_kanan', 'telinga_serumen_kiri', 'telinga_test_berbisik_kanan', 'telinga_test_berbisik_kiri', 'telinga_tes_garpu_tala_kanan', 'telinga_tes_garpu_tala_kiri', 'telinga_weber_kanan', 'telinga_weber_kiri', 'telinga_swabach_kanan', 'telinga_swabach_kiri', 'telinga_bing_kanan', 'telinga_bing_kiri', 'telinga_lainnya', 'hidung', 'hidung_meatus_nasi', 'hidung_septum_nasi', 'hidung_konka_nasal', 'hidung_nyeri_ketok_sinus', 'hidung_penciuman', 'mulut', 'mulut_bibir', 'mulut_lidah', 'mulut_gusi', 'mulut_lainnya', 'gigi', 'gigi_missing', 'gigi_caries', 'gigi_tambahan', 'gigi_sisa_akar', 'tenggorokan', 'tenggorokan_pharynx', 'tenggorokan_tonsil_kanan', 'tenggorokan_tonsil_kiri', 'tenggorokan_tonsil_ukuran_kanan', 'tenggorokan_tonsil_ukuran_kiri', 'tenggorokan_palatum', 'tenggorokan_lainn', 'dada', 'dada_bentuk', 'dada_mamae', 'dada_tumor_ukuran', 'dada_tumor_letak', 'dada_tumor_konsisten', 'dada_lainnya', 'paru', 'paru_jantung_palpasi', 'paru_jantung_perkusi_kanan', 'paru_jantung_perkusi_kiri', 'paru_jantung_perkusi_iktus_kanan', 'paru_jantung_perkusi_iktus_kiri', 'paru_jantung_perkusi_iktus_kiri_sebut', 'paru_jantung_perkusi_batas_jantung_kanan', 'paru_jantung_perkusi_batas_jantung_kiri', 'paru_jantung_perkusi_batas_jantung_kiri_sebut', 'paru_jantung_auskultasi_bunyi_nafas_kanan', 'paru_jantung_auskultasi_bunyi_nafas_kiri', 'paru_jantung_auskultasi_bunyi_nafas_tambah_kanan', 'paru_jantung_auskultasi_bunyi_nafas_tambah_kiri', 'paru_jantung_bunyi_jantung', 'paru_jantung_bunyi_jantung_kiri', 'abdomen', 'abdomen_inspeksi', 'abdomen_perkusi', 'abdomen_auskultasi_bising_usus', 'abdomen_hati', 'abdomen_limpa', 'abdomen_ginjal_kanan', 'abdomen_ginjal_kiri', 'abdomen_ballotement_kanan', 'abdomen_ballotement_kiri', 'abdomen_nyeri_costo_vertebrae_kanan', 'abdomen_nyeri_costo_vertebrae_kiri', 'genitourinaria', 'genitourinaria_kandung_kemih', 'genitourinaria_anus', 'genitourinaria_genitalia_eksternal', 'genitourinaria_prostat', 'vertebra', 'vertebra_lainnya', 'tulang_atas', 'tulang_atas_simetris', 'tulang_atas_gerakan_abduksi_neer_kanan', 'tulang_atas_gerakan_abduksi_neer_kiri', 'tulang_atas_gerakan_abduksi_hawkin_kanan', 'tulang_atas_gerakan_abduksi_hawkin_kiri', 'tulang_atas_gerakan_drop_arm_kanan', 'tulang_atas_gerakan_drop_arm_kiri', 'tulang_atas_gerakan_yergason_kanan', 'tulang_atas_gerakan_yergason_kiri', 'tulang_atas_gerakan_speed_kanan', 'tulang_atas_gerakan_speed_kiri', 'tulang_atas_tulang_kanan', 'tulang_atas_tulang_kiri', 'tulang_atas_sensibilitas_kanan', 'tulang_atas_sensibilitas_kiri', 'tulang_atas_oedem_kanan', 'tulang_atas_oedem_kiri', 'tulang_atas_varises_kanan', 'tulang_atas_varises_kiri', 'tulang_atas_kekuatan_otot_pin_prick_kanan', 'tulang_atas_kekuatan_otot_pin_prick_kiri', 'tulang_atas_kekuatan_otot_phallent_kanan', 'tulang_atas_kekuatan_otot_phallent_kiri', 'tulang_atas_kekuatan_otot_tinnel_kanan', 'tulang_atas_kekuatan_otot_tinnel_kiri', 'tulang_atas_kekuatan_otot_finskelstein_kanan', 'tulang_atas_kekuatan_otot_finskelstein_kiri', 'tulang_atas_vaskularisasi_kanan', 'tulang_atas_vaskularisasi_kiri', 'tulang_atas_kelaianan_kukujari_kanan', 'tulang_atas_kelaianan_kukujari_kiri', 'tulang_bawah', 'tulang_bawah_simetris', 'tulang_bawah_laseque_kanan', 'tulang_bawah_laseque_kiri', 'tulang_bawah_kernique_kanan', 'tulang_bawah_kernique_kiri', 'tulang_bawah_patrick_kanan', 'tulang_bawah_patrick_kiri', 'tulang_bawah_contrapatrick_kanan', 'tulang_bawah_contrapatrick_kiri', 'tulang_bawah_nyeri_tekanan_kanan', 'tulang_bawah_nyeri_tekanan_kiri', 'tulang_bawah_kekuatan_otot_kanan', 'tulang_bawah_kekuatan_otot_kiri', 'tulang_bawah_sensibilitas_kanan', 'tulang_bawah_sensibilitas_kiri', 'tulang_bawah_oedema_kanan', 'tulang_bawah_oedema_kiri', 'tulang_bawah_varises_kanan', 'tulang_bawah_varises_kiri', 'tulang_bawah_vaskularisasi_kanan', 'tulang_bawah_vaskularisasi_kiri', 'tulang_bawah_kelainan_kuku_kanan', 'tulang_bawah_kelainan_kuku_kiri', 'otot_motorik', 'otot_motorik_trofi_kanan', 'otot_motorik_trofi_kiri', 'otot_motorik_tonus_kanan', 'otot_motorik_tonus_kiri', 'otot_motorik_gerakan_abnormal_kanan', 'otot_motorik_gerakan_abnormal_kiri', 'fungsi_sensorik', 'fungsi_sensorik_kanan', 'fungsi_sensorik_kiri', 'fungsi_autonom_kanan', 'fungsi_autonom_kiri', 'saraf', 'saraf_daya_ingat_segera', 'saraf_daya_ingat_jangka_menengah', 'saraf_daya_ingat_jangka_pendek', 'saraf_daya_ingat_jangka_panjang', 'saraf_orientasi_waktu', 'saraf_orientasi_orang', 'saraf_orientasi_tempat', 'saraf_kesan', 'saraf_kesan_n_i', 'saraf_kesan_n_ii', 'saraf_kesan_n_iii', 'saraf_kesan_n_iv', 'saraf_kesan_n_v', 'saraf_kesan_n_vi', 'saraf_kesan_n_vii', 'saraf_kesan_n_viii', 'saraf_kesan_n_ix', 'saraf_kesan_n_x', 'saraf_kesan_n_xi', 'saraf_kesan_n_xii', 'reflek', 'reflek_fisiologis_patella_kanan', 'reflek_fisiologis_patella_kiri', 'reflek_patologis_kanan', 'reflek_patologis_kiri', 'kulit', 'kulit_kulit', 'kulit_selaput_lendir', 'kulit_kuku', 'kulit_lain', 'kulit_lokasi', 'hasil_pemeriksaan_fisik_khusus', 'hasil_pemeriksaan_fisik_khusus_wawancara_psikiatri', 'hasil_pemeriksaan_fisik_khusus_narkoba_opiat', 'hasil_pemeriksaan_fisik_khusus_narkoba_stimulan', 'hasil_pemeriksaan_fisik_khusus_narkoba_barbiburat', 'resume_kelainan', 'hasil_body_map', 'hasil_brief_survey', 'diagnosis_kerja', 'diagnosis_diferensial', 'kategori_kesehatan', 'id_dokter_pemeriksaan_fisik', 'leher', 'leher_gerakan_leher', 'leher_otot_leher', 'leher_kelenjar_thyroid', 'leher_pulsasi_carotis', 'leher_tekanan_vena_jugularis', 'leher_trachea', 'leher_lainnya', 'is_verified', 'kulit_tato', 'telinga_audiometri_kanan', 'telinga_audiometri_kiri', 'telinga_timpani_kanan', 'telinga_timpani_kiri', 'icdt10'], 'safe'],
            [['status_gizi_imt'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = MasterPemeriksaanFisik::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_m_pemeriksaan_fisik' => $this->id_m_pemeriksaan_fisik,
            'status_gizi_tinggi_badan' => $this->status_gizi_tinggi_badan,
            'status_gizi_berat_badan' => $this->status_gizi_berat_badan,
            'status_gizi_lingkaran_perut' => $this->status_gizi_lingkaran_perut,
            'status_gizi_lingkaran_pinggang' => $this->status_gizi_lingkaran_pinggang,
            'status_gizi_imt' => $this->status_gizi_imt,
        ]);

        $query->andFilterWhere(['ilike', 'no_rekam_medik', $this->no_rekam_medik])
            ->andFilterWhere(['ilike', 'tanda_vital', $this->tanda_vital])
            ->andFilterWhere(['ilike', 'tanda_vital_nadi', $this->tanda_vital_nadi])
            ->andFilterWhere(['ilike', 'tanda_vital_pernapasan', $this->tanda_vital_pernapasan])
            ->andFilterWhere(['ilike', 'tanda_vital_tekanan_darah', $this->tanda_vital_tekanan_darah])
            ->andFilterWhere(['ilike', 'tanda_vital_suhu_badan', $this->tanda_vital_suhu_badan])
            ->andFilterWhere(['ilike', 'status_gizi', $this->status_gizi])
            ->andFilterWhere(['ilike', 'status_gizi_bentuk_badan', $this->status_gizi_bentuk_badan])
            ->andFilterWhere(['ilike', 'tingkat_kesadaran', $this->tingkat_kesadaran])
            ->andFilterWhere(['ilike', 'tingkat_kesadaran_kesadaran', $this->tingkat_kesadaran_kesadaran])
            ->andFilterWhere(['ilike', 'tingkat_kesadaran_kualitas_kontak', $this->tingkat_kesadaran_kualitas_kontak])
            ->andFilterWhere(['ilike', 'tingkat_kesadaran_tampak_kesakitan', $this->tingkat_kesadaran_tampak_kesakitan])
            ->andFilterWhere(['ilike', 'tingkat_kesadaran_gangguan_saat_berjalan', $this->tingkat_kesadaran_gangguan_saat_berjalan])
            ->andFilterWhere(['ilike', 'kelenjar_getah_bening', $this->kelenjar_getah_bening])
            ->andFilterWhere(['ilike', 'kelenjar_getah_bening_leher', $this->kelenjar_getah_bening_leher])
            ->andFilterWhere(['ilike', 'kelenjar_getah_bening_sub_mandibula', $this->kelenjar_getah_bening_sub_mandibula])
            ->andFilterWhere(['ilike', 'kelenjar_getah_bening_ketiak', $this->kelenjar_getah_bening_ketiak])
            ->andFilterWhere(['ilike', 'kelenjar_getah_bening_inguinal', $this->kelenjar_getah_bening_inguinal])
            ->andFilterWhere(['ilike', 'kepala', $this->kepala])
            ->andFilterWhere(['ilike', 'kepala_tulang', $this->kepala_tulang])
            ->andFilterWhere(['ilike', 'kepala_kulit_kepala', $this->kepala_kulit_kepala])
            ->andFilterWhere(['ilike', 'kepala_rambut', $this->kepala_rambut])
            ->andFilterWhere(['ilike', 'kepala_bentuk_wajah', $this->kepala_bentuk_wajah])
            ->andFilterWhere(['ilike', 'mata', $this->mata])
            ->andFilterWhere(['ilike', 'mata_persepsi_warna_kanan', $this->mata_persepsi_warna_kanan])
            ->andFilterWhere(['ilike', 'mata_persepsi_warna_kiri', $this->mata_persepsi_warna_kiri])
            ->andFilterWhere(['ilike', 'mata_kelopak_mata_kanan', $this->mata_kelopak_mata_kanan])
            ->andFilterWhere(['ilike', 'mata_kelopak_mata_kiri', $this->mata_kelopak_mata_kiri])
            ->andFilterWhere(['ilike', 'mata_konjungtiva_kanan', $this->mata_konjungtiva_kanan])
            ->andFilterWhere(['ilike', 'mata_konjungtiva_kiri', $this->mata_konjungtiva_kiri])
            ->andFilterWhere(['ilike', 'mata_gerak_bola_mata_kanan', $this->mata_gerak_bola_mata_kanan])
            ->andFilterWhere(['ilike', 'mata_gerak_bola_mata_kiri', $this->mata_gerak_bola_mata_kiri])
            ->andFilterWhere(['ilike', 'mata_sklera_kanan', $this->mata_sklera_kanan])
            ->andFilterWhere(['ilike', 'mata_sklera_kiri', $this->mata_sklera_kiri])
            ->andFilterWhere(['ilike', 'mata_lensa_mata_kanan', $this->mata_lensa_mata_kanan])
            ->andFilterWhere(['ilike', 'mata_lensa_mata_kiri', $this->mata_lensa_mata_kiri])
            ->andFilterWhere(['ilike', 'mata_kornea_kanan', $this->mata_kornea_kanan])
            ->andFilterWhere(['ilike', 'mata_kornea_kiri', $this->mata_kornea_kiri])
            ->andFilterWhere(['ilike', 'mata_bulu_mata_kanan', $this->mata_bulu_mata_kanan])
            ->andFilterWhere(['ilike', 'mata_bulu_mata_kiri', $this->mata_bulu_mata_kiri])
            ->andFilterWhere(['ilike', 'mata_tekanan_bola_mata_kanan', $this->mata_tekanan_bola_mata_kanan])
            ->andFilterWhere(['ilike', 'mata_tekanan_bola_mata_kiri', $this->mata_tekanan_bola_mata_kiri])
            ->andFilterWhere(['ilike', 'mata_penglihatan_3dimensi_kanan', $this->mata_penglihatan_3dimensi_kanan])
            ->andFilterWhere(['ilike', 'mata_penglihatan_3dimensi_kiri', $this->mata_penglihatan_3dimensi_kiri])
            ->andFilterWhere(['ilike', 'mata_visus_tanpa_koreksi', $this->mata_visus_tanpa_koreksi])
            ->andFilterWhere(['ilike', 'mata_visus_dengan_koreksi', $this->mata_visus_dengan_koreksi])
            ->andFilterWhere(['ilike', 'telinga', $this->telinga])
            ->andFilterWhere(['ilike', 'telinga_daun_telinga_kanan', $this->telinga_daun_telinga_kanan])
            ->andFilterWhere(['ilike', 'telinga_daun_telinga_kiri', $this->telinga_daun_telinga_kiri])
            ->andFilterWhere(['ilike', 'telinga_liang_telinga_kanan', $this->telinga_liang_telinga_kanan])
            ->andFilterWhere(['ilike', 'telinga_liang_telinga_kiri', $this->telinga_liang_telinga_kiri])
            ->andFilterWhere(['ilike', 'telinga_serumen_kanan', $this->telinga_serumen_kanan])
            ->andFilterWhere(['ilike', 'telinga_serumen_kiri', $this->telinga_serumen_kiri])
            ->andFilterWhere(['ilike', 'telinga_test_berbisik_kanan', $this->telinga_test_berbisik_kanan])
            ->andFilterWhere(['ilike', 'telinga_test_berbisik_kiri', $this->telinga_test_berbisik_kiri])
            ->andFilterWhere(['ilike', 'telinga_tes_garpu_tala_kanan', $this->telinga_tes_garpu_tala_kanan])
            ->andFilterWhere(['ilike', 'telinga_tes_garpu_tala_kiri', $this->telinga_tes_garpu_tala_kiri])
            ->andFilterWhere(['ilike', 'telinga_weber_kanan', $this->telinga_weber_kanan])
            ->andFilterWhere(['ilike', 'telinga_weber_kiri', $this->telinga_weber_kiri])
            ->andFilterWhere(['ilike', 'telinga_swabach_kanan', $this->telinga_swabach_kanan])
            ->andFilterWhere(['ilike', 'telinga_swabach_kiri', $this->telinga_swabach_kiri])
            ->andFilterWhere(['ilike', 'telinga_bing_kanan', $this->telinga_bing_kanan])
            ->andFilterWhere(['ilike', 'telinga_bing_kiri', $this->telinga_bing_kiri])
            ->andFilterWhere(['ilike', 'telinga_lainnya', $this->telinga_lainnya])
            ->andFilterWhere(['ilike', 'hidung', $this->hidung])
            ->andFilterWhere(['ilike', 'hidung_meatus_nasi', $this->hidung_meatus_nasi])
            ->andFilterWhere(['ilike', 'hidung_septum_nasi', $this->hidung_septum_nasi])
            ->andFilterWhere(['ilike', 'hidung_konka_nasal', $this->hidung_konka_nasal])
            ->andFilterWhere(['ilike', 'hidung_nyeri_ketok_sinus', $this->hidung_nyeri_ketok_sinus])
            ->andFilterWhere(['ilike', 'hidung_penciuman', $this->hidung_penciuman])
            ->andFilterWhere(['ilike', 'mulut', $this->mulut])
            ->andFilterWhere(['ilike', 'mulut_bibir', $this->mulut_bibir])
            ->andFilterWhere(['ilike', 'mulut_lidah', $this->mulut_lidah])
            ->andFilterWhere(['ilike', 'mulut_gusi', $this->mulut_gusi])
            ->andFilterWhere(['ilike', 'mulut_lainnya', $this->mulut_lainnya])
            ->andFilterWhere(['ilike', 'gigi', $this->gigi])
            ->andFilterWhere(['ilike', 'gigi_missing', $this->gigi_missing])
            ->andFilterWhere(['ilike', 'gigi_caries', $this->gigi_caries])
            ->andFilterWhere(['ilike', 'gigi_tambahan', $this->gigi_tambahan])
            ->andFilterWhere(['ilike', 'gigi_sisa_akar', $this->gigi_sisa_akar])
            ->andFilterWhere(['ilike', 'tenggorokan', $this->tenggorokan])
            ->andFilterWhere(['ilike', 'tenggorokan_pharynx', $this->tenggorokan_pharynx])
            ->andFilterWhere(['ilike', 'tenggorokan_tonsil_kanan', $this->tenggorokan_tonsil_kanan])
            ->andFilterWhere(['ilike', 'tenggorokan_tonsil_kiri', $this->tenggorokan_tonsil_kiri])
            ->andFilterWhere(['ilike', 'tenggorokan_tonsil_ukuran_kanan', $this->tenggorokan_tonsil_ukuran_kanan])
            ->andFilterWhere(['ilike', 'tenggorokan_tonsil_ukuran_kiri', $this->tenggorokan_tonsil_ukuran_kiri])
            ->andFilterWhere(['ilike', 'tenggorokan_palatum', $this->tenggorokan_palatum])
            ->andFilterWhere(['ilike', 'tenggorokan_lainn', $this->tenggorokan_lainn])
            ->andFilterWhere(['ilike', 'dada', $this->dada])
            ->andFilterWhere(['ilike', 'dada_bentuk', $this->dada_bentuk])
            ->andFilterWhere(['ilike', 'dada_mamae', $this->dada_mamae])
            ->andFilterWhere(['ilike', 'dada_tumor_ukuran', $this->dada_tumor_ukuran])
            ->andFilterWhere(['ilike', 'dada_tumor_letak', $this->dada_tumor_letak])
            ->andFilterWhere(['ilike', 'dada_tumor_konsisten', $this->dada_tumor_konsisten])
            ->andFilterWhere(['ilike', 'dada_lainnya', $this->dada_lainnya])
            ->andFilterWhere(['ilike', 'paru', $this->paru])
            ->andFilterWhere(['ilike', 'paru_jantung_palpasi', $this->paru_jantung_palpasi])
            ->andFilterWhere(['ilike', 'paru_jantung_perkusi_kanan', $this->paru_jantung_perkusi_kanan])
            ->andFilterWhere(['ilike', 'paru_jantung_perkusi_kiri', $this->paru_jantung_perkusi_kiri])
            ->andFilterWhere(['ilike', 'paru_jantung_perkusi_iktus_kanan', $this->paru_jantung_perkusi_iktus_kanan])
            ->andFilterWhere(['ilike', 'paru_jantung_perkusi_iktus_kiri', $this->paru_jantung_perkusi_iktus_kiri])
            ->andFilterWhere(['ilike', 'paru_jantung_perkusi_iktus_kiri_sebut', $this->paru_jantung_perkusi_iktus_kiri_sebut])
            ->andFilterWhere(['ilike', 'paru_jantung_perkusi_batas_jantung_kanan', $this->paru_jantung_perkusi_batas_jantung_kanan])
            ->andFilterWhere(['ilike', 'paru_jantung_perkusi_batas_jantung_kiri', $this->paru_jantung_perkusi_batas_jantung_kiri])
            ->andFilterWhere(['ilike', 'paru_jantung_perkusi_batas_jantung_kiri_sebut', $this->paru_jantung_perkusi_batas_jantung_kiri_sebut])
            ->andFilterWhere(['ilike', 'paru_jantung_auskultasi_bunyi_nafas_kanan', $this->paru_jantung_auskultasi_bunyi_nafas_kanan])
            ->andFilterWhere(['ilike', 'paru_jantung_auskultasi_bunyi_nafas_kiri', $this->paru_jantung_auskultasi_bunyi_nafas_kiri])
            ->andFilterWhere(['ilike', 'paru_jantung_auskultasi_bunyi_nafas_tambah_kanan', $this->paru_jantung_auskultasi_bunyi_nafas_tambah_kanan])
            ->andFilterWhere(['ilike', 'paru_jantung_auskultasi_bunyi_nafas_tambah_kiri', $this->paru_jantung_auskultasi_bunyi_nafas_tambah_kiri])
            ->andFilterWhere(['ilike', 'paru_jantung_bunyi_jantung', $this->paru_jantung_bunyi_jantung])
            ->andFilterWhere(['ilike', 'paru_jantung_bunyi_jantung_kiri', $this->paru_jantung_bunyi_jantung_kiri])
            ->andFilterWhere(['ilike', 'abdomen', $this->abdomen])
            ->andFilterWhere(['ilike', 'abdomen_inspeksi', $this->abdomen_inspeksi])
            ->andFilterWhere(['ilike', 'abdomen_perkusi', $this->abdomen_perkusi])
            ->andFilterWhere(['ilike', 'abdomen_auskultasi_bising_usus', $this->abdomen_auskultasi_bising_usus])
            ->andFilterWhere(['ilike', 'abdomen_hati', $this->abdomen_hati])
            ->andFilterWhere(['ilike', 'abdomen_limpa', $this->abdomen_limpa])
            ->andFilterWhere(['ilike', 'abdomen_ginjal_kanan', $this->abdomen_ginjal_kanan])
            ->andFilterWhere(['ilike', 'abdomen_ginjal_kiri', $this->abdomen_ginjal_kiri])
            ->andFilterWhere(['ilike', 'abdomen_ballotement_kanan', $this->abdomen_ballotement_kanan])
            ->andFilterWhere(['ilike', 'abdomen_ballotement_kiri', $this->abdomen_ballotement_kiri])
            ->andFilterWhere(['ilike', 'abdomen_nyeri_costo_vertebrae_kanan', $this->abdomen_nyeri_costo_vertebrae_kanan])
            ->andFilterWhere(['ilike', 'abdomen_nyeri_costo_vertebrae_kiri', $this->abdomen_nyeri_costo_vertebrae_kiri])
            ->andFilterWhere(['ilike', 'genitourinaria', $this->genitourinaria])
            ->andFilterWhere(['ilike', 'genitourinaria_kandung_kemih', $this->genitourinaria_kandung_kemih])
            ->andFilterWhere(['ilike', 'genitourinaria_anus', $this->genitourinaria_anus])
            ->andFilterWhere(['ilike', 'genitourinaria_genitalia_eksternal', $this->genitourinaria_genitalia_eksternal])
            ->andFilterWhere(['ilike', 'genitourinaria_prostat', $this->genitourinaria_prostat])
            ->andFilterWhere(['ilike', 'vertebra', $this->vertebra])
            ->andFilterWhere(['ilike', 'vertebra_lainnya', $this->vertebra_lainnya])
            ->andFilterWhere(['ilike', 'tulang_atas', $this->tulang_atas])
            ->andFilterWhere(['ilike', 'tulang_atas_simetris', $this->tulang_atas_simetris])
            ->andFilterWhere(['ilike', 'tulang_atas_gerakan_abduksi_neer_kanan', $this->tulang_atas_gerakan_abduksi_neer_kanan])
            ->andFilterWhere(['ilike', 'tulang_atas_gerakan_abduksi_neer_kiri', $this->tulang_atas_gerakan_abduksi_neer_kiri])
            ->andFilterWhere(['ilike', 'tulang_atas_gerakan_abduksi_hawkin_kanan', $this->tulang_atas_gerakan_abduksi_hawkin_kanan])
            ->andFilterWhere(['ilike', 'tulang_atas_gerakan_abduksi_hawkin_kiri', $this->tulang_atas_gerakan_abduksi_hawkin_kiri])
            ->andFilterWhere(['ilike', 'tulang_atas_gerakan_drop_arm_kanan', $this->tulang_atas_gerakan_drop_arm_kanan])
            ->andFilterWhere(['ilike', 'tulang_atas_gerakan_drop_arm_kiri', $this->tulang_atas_gerakan_drop_arm_kiri])
            ->andFilterWhere(['ilike', 'tulang_atas_gerakan_yergason_kanan', $this->tulang_atas_gerakan_yergason_kanan])
            ->andFilterWhere(['ilike', 'tulang_atas_gerakan_yergason_kiri', $this->tulang_atas_gerakan_yergason_kiri])
            ->andFilterWhere(['ilike', 'tulang_atas_gerakan_speed_kanan', $this->tulang_atas_gerakan_speed_kanan])
            ->andFilterWhere(['ilike', 'tulang_atas_gerakan_speed_kiri', $this->tulang_atas_gerakan_speed_kiri])
            ->andFilterWhere(['ilike', 'tulang_atas_tulang_kanan', $this->tulang_atas_tulang_kanan])
            ->andFilterWhere(['ilike', 'tulang_atas_tulang_kiri', $this->tulang_atas_tulang_kiri])
            ->andFilterWhere(['ilike', 'tulang_atas_sensibilitas_kanan', $this->tulang_atas_sensibilitas_kanan])
            ->andFilterWhere(['ilike', 'tulang_atas_sensibilitas_kiri', $this->tulang_atas_sensibilitas_kiri])
            ->andFilterWhere(['ilike', 'tulang_atas_oedem_kanan', $this->tulang_atas_oedem_kanan])
            ->andFilterWhere(['ilike', 'tulang_atas_oedem_kiri', $this->tulang_atas_oedem_kiri])
            ->andFilterWhere(['ilike', 'tulang_atas_varises_kanan', $this->tulang_atas_varises_kanan])
            ->andFilterWhere(['ilike', 'tulang_atas_varises_kiri', $this->tulang_atas_varises_kiri])
            ->andFilterWhere(['ilike', 'tulang_atas_kekuatan_otot_pin_prick_kanan', $this->tulang_atas_kekuatan_otot_pin_prick_kanan])
            ->andFilterWhere(['ilike', 'tulang_atas_kekuatan_otot_pin_prick_kiri', $this->tulang_atas_kekuatan_otot_pin_prick_kiri])
            ->andFilterWhere(['ilike', 'tulang_atas_kekuatan_otot_phallent_kanan', $this->tulang_atas_kekuatan_otot_phallent_kanan])
            ->andFilterWhere(['ilike', 'tulang_atas_kekuatan_otot_phallent_kiri', $this->tulang_atas_kekuatan_otot_phallent_kiri])
            ->andFilterWhere(['ilike', 'tulang_atas_kekuatan_otot_tinnel_kanan', $this->tulang_atas_kekuatan_otot_tinnel_kanan])
            ->andFilterWhere(['ilike', 'tulang_atas_kekuatan_otot_tinnel_kiri', $this->tulang_atas_kekuatan_otot_tinnel_kiri])
            ->andFilterWhere(['ilike', 'tulang_atas_kekuatan_otot_finskelstein_kanan', $this->tulang_atas_kekuatan_otot_finskelstein_kanan])
            ->andFilterWhere(['ilike', 'tulang_atas_kekuatan_otot_finskelstein_kiri', $this->tulang_atas_kekuatan_otot_finskelstein_kiri])
            ->andFilterWhere(['ilike', 'tulang_atas_vaskularisasi_kanan', $this->tulang_atas_vaskularisasi_kanan])
            ->andFilterWhere(['ilike', 'tulang_atas_vaskularisasi_kiri', $this->tulang_atas_vaskularisasi_kiri])
            ->andFilterWhere(['ilike', 'tulang_atas_kelaianan_kukujari_kanan', $this->tulang_atas_kelaianan_kukujari_kanan])
            ->andFilterWhere(['ilike', 'tulang_atas_kelaianan_kukujari_kiri', $this->tulang_atas_kelaianan_kukujari_kiri])
            ->andFilterWhere(['ilike', 'tulang_bawah', $this->tulang_bawah])
            ->andFilterWhere(['ilike', 'tulang_bawah_simetris', $this->tulang_bawah_simetris])
            ->andFilterWhere(['ilike', 'tulang_bawah_laseque_kanan', $this->tulang_bawah_laseque_kanan])
            ->andFilterWhere(['ilike', 'tulang_bawah_laseque_kiri', $this->tulang_bawah_laseque_kiri])
            ->andFilterWhere(['ilike', 'tulang_bawah_kernique_kanan', $this->tulang_bawah_kernique_kanan])
            ->andFilterWhere(['ilike', 'tulang_bawah_kernique_kiri', $this->tulang_bawah_kernique_kiri])
            ->andFilterWhere(['ilike', 'tulang_bawah_patrick_kanan', $this->tulang_bawah_patrick_kanan])
            ->andFilterWhere(['ilike', 'tulang_bawah_patrick_kiri', $this->tulang_bawah_patrick_kiri])
            ->andFilterWhere(['ilike', 'tulang_bawah_contrapatrick_kanan', $this->tulang_bawah_contrapatrick_kanan])
            ->andFilterWhere(['ilike', 'tulang_bawah_contrapatrick_kiri', $this->tulang_bawah_contrapatrick_kiri])
            ->andFilterWhere(['ilike', 'tulang_bawah_nyeri_tekanan_kanan', $this->tulang_bawah_nyeri_tekanan_kanan])
            ->andFilterWhere(['ilike', 'tulang_bawah_nyeri_tekanan_kiri', $this->tulang_bawah_nyeri_tekanan_kiri])
            ->andFilterWhere(['ilike', 'tulang_bawah_kekuatan_otot_kanan', $this->tulang_bawah_kekuatan_otot_kanan])
            ->andFilterWhere(['ilike', 'tulang_bawah_kekuatan_otot_kiri', $this->tulang_bawah_kekuatan_otot_kiri])
            ->andFilterWhere(['ilike', 'tulang_bawah_sensibilitas_kanan', $this->tulang_bawah_sensibilitas_kanan])
            ->andFilterWhere(['ilike', 'tulang_bawah_sensibilitas_kiri', $this->tulang_bawah_sensibilitas_kiri])
            ->andFilterWhere(['ilike', 'tulang_bawah_oedema_kanan', $this->tulang_bawah_oedema_kanan])
            ->andFilterWhere(['ilike', 'tulang_bawah_oedema_kiri', $this->tulang_bawah_oedema_kiri])
            ->andFilterWhere(['ilike', 'tulang_bawah_varises_kanan', $this->tulang_bawah_varises_kanan])
            ->andFilterWhere(['ilike', 'tulang_bawah_varises_kiri', $this->tulang_bawah_varises_kiri])
            ->andFilterWhere(['ilike', 'tulang_bawah_vaskularisasi_kanan', $this->tulang_bawah_vaskularisasi_kanan])
            ->andFilterWhere(['ilike', 'tulang_bawah_vaskularisasi_kiri', $this->tulang_bawah_vaskularisasi_kiri])
            ->andFilterWhere(['ilike', 'tulang_bawah_kelainan_kuku_kanan', $this->tulang_bawah_kelainan_kuku_kanan])
            ->andFilterWhere(['ilike', 'tulang_bawah_kelainan_kuku_kiri', $this->tulang_bawah_kelainan_kuku_kiri])
            ->andFilterWhere(['ilike', 'otot_motorik', $this->otot_motorik])
            ->andFilterWhere(['ilike', 'otot_motorik_trofi_kanan', $this->otot_motorik_trofi_kanan])
            ->andFilterWhere(['ilike', 'otot_motorik_trofi_kiri', $this->otot_motorik_trofi_kiri])
            ->andFilterWhere(['ilike', 'otot_motorik_tonus_kanan', $this->otot_motorik_tonus_kanan])
            ->andFilterWhere(['ilike', 'otot_motorik_tonus_kiri', $this->otot_motorik_tonus_kiri])
            ->andFilterWhere(['ilike', 'otot_motorik_gerakan_abnormal_kanan', $this->otot_motorik_gerakan_abnormal_kanan])
            ->andFilterWhere(['ilike', 'otot_motorik_gerakan_abnormal_kiri', $this->otot_motorik_gerakan_abnormal_kiri])
            ->andFilterWhere(['ilike', 'fungsi_sensorik', $this->fungsi_sensorik])
            ->andFilterWhere(['ilike', 'fungsi_sensorik_kanan', $this->fungsi_sensorik_kanan])
            ->andFilterWhere(['ilike', 'fungsi_sensorik_kiri', $this->fungsi_sensorik_kiri])
            ->andFilterWhere(['ilike', 'fungsi_autonom_kanan', $this->fungsi_autonom_kanan])
            ->andFilterWhere(['ilike', 'fungsi_autonom_kiri', $this->fungsi_autonom_kiri])
            ->andFilterWhere(['ilike', 'saraf', $this->saraf])
            ->andFilterWhere(['ilike', 'saraf_daya_ingat_segera', $this->saraf_daya_ingat_segera])
            ->andFilterWhere(['ilike', 'saraf_daya_ingat_jangka_menengah', $this->saraf_daya_ingat_jangka_menengah])
            ->andFilterWhere(['ilike', 'saraf_daya_ingat_jangka_pendek', $this->saraf_daya_ingat_jangka_pendek])
            ->andFilterWhere(['ilike', 'saraf_daya_ingat_jangka_panjang', $this->saraf_daya_ingat_jangka_panjang])
            ->andFilterWhere(['ilike', 'saraf_orientasi_waktu', $this->saraf_orientasi_waktu])
            ->andFilterWhere(['ilike', 'saraf_orientasi_orang', $this->saraf_orientasi_orang])
            ->andFilterWhere(['ilike', 'saraf_orientasi_tempat', $this->saraf_orientasi_tempat])
            ->andFilterWhere(['ilike', 'saraf_kesan', $this->saraf_kesan])
            ->andFilterWhere(['ilike', 'saraf_kesan_n_i', $this->saraf_kesan_n_i])
            ->andFilterWhere(['ilike', 'saraf_kesan_n_ii', $this->saraf_kesan_n_ii])
            ->andFilterWhere(['ilike', 'saraf_kesan_n_iii', $this->saraf_kesan_n_iii])
            ->andFilterWhere(['ilike', 'saraf_kesan_n_iv', $this->saraf_kesan_n_iv])
            ->andFilterWhere(['ilike', 'saraf_kesan_n_v', $this->saraf_kesan_n_v])
            ->andFilterWhere(['ilike', 'saraf_kesan_n_vi', $this->saraf_kesan_n_vi])
            ->andFilterWhere(['ilike', 'saraf_kesan_n_vii', $this->saraf_kesan_n_vii])
            ->andFilterWhere(['ilike', 'saraf_kesan_n_viii', $this->saraf_kesan_n_viii])
            ->andFilterWhere(['ilike', 'saraf_kesan_n_ix', $this->saraf_kesan_n_ix])
            ->andFilterWhere(['ilike', 'saraf_kesan_n_x', $this->saraf_kesan_n_x])
            ->andFilterWhere(['ilike', 'saraf_kesan_n_xi', $this->saraf_kesan_n_xi])
            ->andFilterWhere(['ilike', 'saraf_kesan_n_xii', $this->saraf_kesan_n_xii])
            ->andFilterWhere(['ilike', 'reflek', $this->reflek])
            ->andFilterWhere(['ilike', 'reflek_fisiologis_patella_kanan', $this->reflek_fisiologis_patella_kanan])
            ->andFilterWhere(['ilike', 'reflek_fisiologis_patella_kiri', $this->reflek_fisiologis_patella_kiri])
            ->andFilterWhere(['ilike', 'reflek_patologis_kanan', $this->reflek_patologis_kanan])
            ->andFilterWhere(['ilike', 'reflek_patologis_kiri', $this->reflek_patologis_kiri])
            ->andFilterWhere(['ilike', 'kulit', $this->kulit])
            ->andFilterWhere(['ilike', 'kulit_kulit', $this->kulit_kulit])
            ->andFilterWhere(['ilike', 'kulit_selaput_lendir', $this->kulit_selaput_lendir])
            ->andFilterWhere(['ilike', 'kulit_kuku', $this->kulit_kuku])
            ->andFilterWhere(['ilike', 'kulit_lain', $this->kulit_lain])
            ->andFilterWhere(['ilike', 'kulit_lokasi', $this->kulit_lokasi])
            ->andFilterWhere(['ilike', 'hasil_pemeriksaan_fisik_khusus', $this->hasil_pemeriksaan_fisik_khusus])
            ->andFilterWhere(['ilike', 'hasil_pemeriksaan_fisik_khusus_wawancara_psikiatri', $this->hasil_pemeriksaan_fisik_khusus_wawancara_psikiatri])
            ->andFilterWhere(['ilike', 'hasil_pemeriksaan_fisik_khusus_narkoba_opiat', $this->hasil_pemeriksaan_fisik_khusus_narkoba_opiat])
            ->andFilterWhere(['ilike', 'hasil_pemeriksaan_fisik_khusus_narkoba_stimulan', $this->hasil_pemeriksaan_fisik_khusus_narkoba_stimulan])
            ->andFilterWhere(['ilike', 'hasil_pemeriksaan_fisik_khusus_narkoba_barbiburat', $this->hasil_pemeriksaan_fisik_khusus_narkoba_barbiburat])
            ->andFilterWhere(['ilike', 'resume_kelainan', $this->resume_kelainan])
            ->andFilterWhere(['ilike', 'hasil_body_map', $this->hasil_body_map])
            ->andFilterWhere(['ilike', 'hasil_brief_survey', $this->hasil_brief_survey])
            ->andFilterWhere(['ilike', 'diagnosis_kerja', $this->diagnosis_kerja])
            ->andFilterWhere(['ilike', 'diagnosis_diferensial', $this->diagnosis_diferensial])
            ->andFilterWhere(['ilike', 'kategori_kesehatan', $this->kategori_kesehatan])
            ->andFilterWhere(['ilike', 'id_dokter_pemeriksaan_fisik', $this->id_dokter_pemeriksaan_fisik])
            ->andFilterWhere(['ilike', 'leher', $this->leher])
            ->andFilterWhere(['ilike', 'leher_gerakan_leher', $this->leher_gerakan_leher])
            ->andFilterWhere(['ilike', 'leher_otot_leher', $this->leher_otot_leher])
            ->andFilterWhere(['ilike', 'leher_kelenjar_thyroid', $this->leher_kelenjar_thyroid])
            ->andFilterWhere(['ilike', 'leher_pulsasi_carotis', $this->leher_pulsasi_carotis])
            ->andFilterWhere(['ilike', 'leher_tekanan_vena_jugularis', $this->leher_tekanan_vena_jugularis])
            ->andFilterWhere(['ilike', 'leher_trachea', $this->leher_trachea])
            ->andFilterWhere(['ilike', 'leher_lainnya', $this->leher_lainnya])
            ->andFilterWhere(['ilike', 'is_verified', $this->is_verified])
            ->andFilterWhere(['ilike', 'kulit_tato', $this->kulit_tato])
            ->andFilterWhere(['ilike', 'telinga_audiometri_kanan', $this->telinga_audiometri_kanan])
            ->andFilterWhere(['ilike', 'telinga_audiometri_kiri', $this->telinga_audiometri_kiri])
            ->andFilterWhere(['ilike', 'telinga_timpani_kanan', $this->telinga_timpani_kanan])
            ->andFilterWhere(['ilike', 'telinga_timpani_kiri', $this->telinga_timpani_kiri])
            ->andFilterWhere(['ilike', 'icdt10', $this->icdt10]);

        return $dataProvider;
    }
}
