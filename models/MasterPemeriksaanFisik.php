<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mcu.m_pemeriksaan_fisik".
 *
 * @property int $id_m_pemeriksaan_fisik
 * @property string|null $no_rekam_medik
 * @property string|null $tanda_vital
 * @property string|null $tanda_vital_nadi
 * @property string|null $tanda_vital_pernapasan
 * @property string|null $tanda_vital_tekanan_darah
 * @property string|null $tanda_vital_suhu_badan
 * @property string|null $status_gizi
 * @property int|null $status_gizi_tinggi_badan
 * @property int|null $status_gizi_berat_badan
 * @property int|null $status_gizi_lingkaran_perut
 * @property int|null $status_gizi_lingkaran_pinggang
 * @property string|null $status_gizi_bentuk_badan
 * @property float|null $status_gizi_imt
 * @property string|null $tingkat_kesadaran
 * @property string|null $tingkat_kesadaran_kesadaran
 * @property string|null $tingkat_kesadaran_kualitas_kontak
 * @property string|null $tingkat_kesadaran_tampak_kesakitan
 * @property string|null $tingkat_kesadaran_gangguan_saat_berjalan
 * @property string|null $kelenjar_getah_bening
 * @property string|null $kelenjar_getah_bening_leher
 * @property string|null $kelenjar_getah_bening_sub_mandibula
 * @property string|null $kelenjar_getah_bening_ketiak
 * @property string|null $kelenjar_getah_bening_inguinal
 * @property string|null $kepala
 * @property string|null $kepala_tulang
 * @property string|null $kepala_kulit_kepala
 * @property string|null $kepala_rambut
 * @property string|null $kepala_bentuk_wajah
 * @property string|null $mata
 * @property string|null $mata_persepsi_warna_kanan
 * @property string|null $mata_persepsi_warna_kiri
 * @property string|null $mata_kelopak_mata_kanan
 * @property string|null $mata_kelopak_mata_kiri
 * @property string|null $mata_konjungtiva_kanan
 * @property string|null $mata_konjungtiva_kiri
 * @property string|null $mata_gerak_bola_mata_kanan
 * @property string|null $mata_gerak_bola_mata_kiri
 * @property string|null $mata_sklera_kanan
 * @property string|null $mata_sklera_kiri
 * @property string|null $mata_lensa_mata_kanan
 * @property string|null $mata_lensa_mata_kiri
 * @property string|null $mata_kornea_kanan
 * @property string|null $mata_kornea_kiri
 * @property string|null $mata_bulu_mata_kanan
 * @property string|null $mata_bulu_mata_kiri
 * @property string|null $mata_tekanan_bola_mata_kanan
 * @property string|null $mata_tekanan_bola_mata_kiri
 * @property string|null $mata_penglihatan_3dimensi_kanan
 * @property string|null $mata_penglihatan_3dimensi_kiri
 * @property string|null $mata_visus_tanpa_koreksi
 * @property string|null $mata_visus_dengan_koreksi
 * @property string|null $telinga
 * @property string|null $telinga_daun_telinga_kanan
 * @property string|null $telinga_daun_telinga_kiri
 * @property string|null $telinga_liang_telinga_kanan
 * @property string|null $telinga_liang_telinga_kiri
 * @property string|null $telinga_serumen_kanan
 * @property string|null $telinga_serumen_kiri
 * @property string|null $telinga_test_berbisik_kanan
 * @property string|null $telinga_test_berbisik_kiri
 * @property string|null $telinga_tes_garpu_tala_kanan
 * @property string|null $telinga_tes_garpu_tala_kiri
 * @property string|null $telinga_weber_kanan
 * @property string|null $telinga_weber_kiri
 * @property string|null $telinga_swabach_kanan
 * @property string|null $telinga_swabach_kiri
 * @property string|null $telinga_bing_kanan
 * @property string|null $telinga_bing_kiri
 * @property string|null $telinga_lainnya
 * @property string|null $hidung
 * @property string|null $hidung_meatus_nasi
 * @property string|null $hidung_septum_nasi
 * @property string|null $hidung_konka_nasal
 * @property string|null $hidung_nyeri_ketok_sinus
 * @property string|null $hidung_penciuman
 * @property string|null $mulut
 * @property string|null $mulut_bibir
 * @property string|null $mulut_lidah
 * @property string|null $mulut_gusi
 * @property string|null $mulut_lainnya
 * @property string|null $gigi
 * @property string|null $gigi_missing
 * @property string|null $gigi_caries
 * @property string|null $gigi_tambahan
 * @property string|null $gigi_sisa_akar
 * @property string|null $tenggorokan
 * @property string|null $tenggorokan_pharynx
 * @property string|null $tenggorokan_tonsil_kanan
 * @property string|null $tenggorokan_tonsil_kiri
 * @property string|null $tenggorokan_tonsil_ukuran_kanan
 * @property string|null $tenggorokan_tonsil_ukuran_kiri
 * @property string|null $tenggorokan_palatum
 * @property string|null $tenggorokan_lainn
 * @property string|null $dada
 * @property string|null $dada_bentuk
 * @property string|null $dada_mamae
 * @property string|null $dada_tumor_ukuran
 * @property string|null $dada_tumor_letak
 * @property string|null $dada_tumor_konsisten
 * @property string|null $dada_lainnya
 * @property string|null $paru
 * @property string|null $paru_jantung_palpasi
 * @property string|null $paru_jantung_perkusi_kanan
 * @property string|null $paru_jantung_perkusi_kiri
 * @property string|null $paru_jantung_perkusi_iktus_kanan
 * @property string|null $paru_jantung_perkusi_iktus_kiri
 * @property string|null $paru_jantung_perkusi_iktus_kiri_sebut
 * @property string|null $paru_jantung_perkusi_batas_jantung_kanan
 * @property string|null $paru_jantung_perkusi_batas_jantung_kiri
 * @property string|null $paru_jantung_perkusi_batas_jantung_kiri_sebut
 * @property string|null $paru_jantung_auskultasi_bunyi_nafas_kanan
 * @property string|null $paru_jantung_auskultasi_bunyi_nafas_kiri
 * @property string|null $paru_jantung_auskultasi_bunyi_nafas_tambah_kanan
 * @property string|null $paru_jantung_auskultasi_bunyi_nafas_tambah_kiri
 * @property string|null $paru_jantung_bunyi_jantung
 * @property string|null $paru_jantung_bunyi_jantung_kiri
 * @property string|null $abdomen
 * @property string|null $abdomen_inspeksi
 * @property string|null $abdomen_perkusi
 * @property string|null $abdomen_auskultasi_bising_usus
 * @property string|null $abdomen_hati
 * @property string|null $abdomen_limpa
 * @property string|null $abdomen_ginjal_kanan
 * @property string|null $abdomen_ginjal_kiri
 * @property string|null $abdomen_ballotement_kanan
 * @property string|null $abdomen_ballotement_kiri
 * @property string|null $abdomen_nyeri_costo_vertebrae_kanan
 * @property string|null $abdomen_nyeri_costo_vertebrae_kiri
 * @property string|null $genitourinaria
 * @property string|null $genitourinaria_kandung_kemih
 * @property string|null $genitourinaria_anus
 * @property string|null $genitourinaria_genitalia_eksternal
 * @property string|null $genitourinaria_prostat
 * @property string|null $vertebra
 * @property string|null $vertebra_lainnya
 * @property string|null $tulang_atas
 * @property string|null $tulang_atas_simetris
 * @property string|null $tulang_atas_gerakan_abduksi_neer_kanan
 * @property string|null $tulang_atas_gerakan_abduksi_neer_kiri
 * @property string|null $tulang_atas_gerakan_abduksi_hawkin_kanan
 * @property string|null $tulang_atas_gerakan_abduksi_hawkin_kiri
 * @property string|null $tulang_atas_gerakan_drop_arm_kanan
 * @property string|null $tulang_atas_gerakan_drop_arm_kiri
 * @property string|null $tulang_atas_gerakan_yergason_kanan
 * @property string|null $tulang_atas_gerakan_yergason_kiri
 * @property string|null $tulang_atas_gerakan_speed_kanan
 * @property string|null $tulang_atas_gerakan_speed_kiri
 * @property string|null $tulang_atas_tulang_kanan
 * @property string|null $tulang_atas_tulang_kiri
 * @property string|null $tulang_atas_sensibilitas_kanan
 * @property string|null $tulang_atas_sensibilitas_kiri
 * @property string|null $tulang_atas_oedem_kanan
 * @property string|null $tulang_atas_oedem_kiri
 * @property string|null $tulang_atas_varises_kanan
 * @property string|null $tulang_atas_varises_kiri
 * @property string|null $tulang_atas_kekuatan_otot_pin_prick_kanan
 * @property string|null $tulang_atas_kekuatan_otot_pin_prick_kiri
 * @property string|null $tulang_atas_kekuatan_otot_phallent_kanan
 * @property string|null $tulang_atas_kekuatan_otot_phallent_kiri
 * @property string|null $tulang_atas_kekuatan_otot_tinnel_kanan
 * @property string|null $tulang_atas_kekuatan_otot_tinnel_kiri
 * @property string|null $tulang_atas_kekuatan_otot_finskelstein_kanan
 * @property string|null $tulang_atas_kekuatan_otot_finskelstein_kiri
 * @property string|null $tulang_atas_vaskularisasi_kanan
 * @property string|null $tulang_atas_vaskularisasi_kiri
 * @property string|null $tulang_atas_kelaianan_kukujari_kanan
 * @property string|null $tulang_atas_kelaianan_kukujari_kiri
 * @property string|null $tulang_bawah
 * @property string|null $tulang_bawah_simetris
 * @property string|null $tulang_bawah_laseque_kanan
 * @property string|null $tulang_bawah_laseque_kiri
 * @property string|null $tulang_bawah_kernique_kanan
 * @property string|null $tulang_bawah_kernique_kiri
 * @property string|null $tulang_bawah_patrick_kanan
 * @property string|null $tulang_bawah_patrick_kiri
 * @property string|null $tulang_bawah_contrapatrick_kanan
 * @property string|null $tulang_bawah_contrapatrick_kiri
 * @property string|null $tulang_bawah_nyeri_tekanan_kanan
 * @property string|null $tulang_bawah_nyeri_tekanan_kiri
 * @property string|null $tulang_bawah_kekuatan_otot_kanan
 * @property string|null $tulang_bawah_kekuatan_otot_kiri
 * @property string|null $tulang_bawah_sensibilitas_kanan
 * @property string|null $tulang_bawah_sensibilitas_kiri
 * @property string|null $tulang_bawah_oedema_kanan
 * @property string|null $tulang_bawah_oedema_kiri
 * @property string|null $tulang_bawah_varises_kanan
 * @property string|null $tulang_bawah_varises_kiri
 * @property string|null $tulang_bawah_vaskularisasi_kanan
 * @property string|null $tulang_bawah_vaskularisasi_kiri
 * @property string|null $tulang_bawah_kelainan_kuku_kanan
 * @property string|null $tulang_bawah_kelainan_kuku_kiri
 * @property string|null $otot_motorik
 * @property string|null $otot_motorik_trofi_kanan
 * @property string|null $otot_motorik_trofi_kiri
 * @property string|null $otot_motorik_tonus_kanan
 * @property string|null $otot_motorik_tonus_kiri
 * @property string|null $otot_motorik_gerakan_abnormal_kanan
 * @property string|null $otot_motorik_gerakan_abnormal_kiri
 * @property string|null $fungsi_sensorik
 * @property string|null $fungsi_sensorik_kanan
 * @property string|null $fungsi_sensorik_kiri
 * @property string|null $fungsi_autonom_kanan
 * @property string|null $fungsi_autonom_kiri
 * @property string|null $saraf
 * @property string|null $saraf_daya_ingat_segera
 * @property string|null $saraf_daya_ingat_jangka_menengah
 * @property string|null $saraf_daya_ingat_jangka_pendek
 * @property string|null $saraf_daya_ingat_jangka_panjang
 * @property string|null $saraf_orientasi_waktu
 * @property string|null $saraf_orientasi_orang
 * @property string|null $saraf_orientasi_tempat
 * @property string|null $saraf_kesan
 * @property string|null $saraf_kesan_n_i
 * @property string|null $saraf_kesan_n_ii
 * @property string|null $saraf_kesan_n_iii
 * @property string|null $saraf_kesan_n_iv
 * @property string|null $saraf_kesan_n_v
 * @property string|null $saraf_kesan_n_vi
 * @property string|null $saraf_kesan_n_vii
 * @property string|null $saraf_kesan_n_viii
 * @property string|null $saraf_kesan_n_ix
 * @property string|null $saraf_kesan_n_x
 * @property string|null $saraf_kesan_n_xi
 * @property string|null $saraf_kesan_n_xii
 * @property string|null $reflek
 * @property string|null $reflek_fisiologis_patella_kanan
 * @property string|null $reflek_fisiologis_patella_kiri
 * @property string|null $reflek_patologis_kanan
 * @property string|null $reflek_patologis_kiri
 * @property string|null $kulit
 * @property string|null $kulit_kulit
 * @property string|null $kulit_selaput_lendir
 * @property string|null $kulit_kuku
 * @property string|null $kulit_lain
 * @property string|null $kulit_lokasi
 * @property string|null $hasil_pemeriksaan_fisik_khusus
 * @property string|null $hasil_pemeriksaan_fisik_khusus_wawancara_psikiatri
 * @property string|null $hasil_pemeriksaan_fisik_khusus_narkoba_opiat
 * @property string|null $hasil_pemeriksaan_fisik_khusus_narkoba_stimulan
 * @property string|null $hasil_pemeriksaan_fisik_khusus_narkoba_barbiburat
 * @property string|null $resume_kelainan
 * @property string|null $hasil_body_map
 * @property string|null $hasil_brief_survey
 * @property string|null $diagnosis_kerja
 * @property string|null $diagnosis_diferensial
 * @property string|null $kategori_kesehatan
 * @property string|null $id_dokter_pemeriksaan_fisik
 * @property string|null $leher
 * @property string|null $leher_gerakan_leher
 * @property string|null $leher_otot_leher
 * @property string|null $leher_kelenjar_thyroid
 * @property string|null $leher_pulsasi_carotis
 * @property string|null $leher_tekanan_vena_jugularis
 * @property string|null $leher_trachea
 * @property string|null $leher_lainnya
 * @property string|null $is_verified
 * @property string|null $kulit_tato
 * @property string|null $telinga_audiometri_kanan
 * @property string|null $telinga_audiometri_kiri
 * @property string|null $telinga_timpani_kanan
 * @property string|null $telinga_timpani_kiri
 * @property string|null $icdt10
 */
class MasterPemeriksaanFisik extends \yii\db\ActiveRecord
{

    public $sistolik;
    public $diastolik;
	public $visus;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mcu.m_pemeriksaan_fisik';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['diastolik', 'sistolik', 'status_gizi_tinggi_badan', 'status_gizi_berat_badan', 'status_gizi_lingkaran_perut', 'status_gizi_lingkaran_pinggang'], 'default', 'value' => null],
            [['status_gizi_tinggi_badan', 'status_gizi_berat_badan', 'status_gizi_lingkaran_perut', 'status_gizi_lingkaran_pinggang'], 'integer'],
            [['status_gizi_imt'], 'number'],
            [['gigi', 'kulit_lain', 'resume_kelainan', 'hasil_body_map', 'hasil_brief_survey', 'diagnosis_kerja', 'diagnosis_diferensial', 'kategori_kesehatan'], 'string'],
            [['no_rekam_medik', 'tanda_vital', 'tanda_vital_nadi', 'tanda_vital_pernapasan', 'tanda_vital_tekanan_darah', 'tanda_vital_suhu_badan', 'status_gizi', 'status_gizi_bentuk_badan', 'tingkat_kesadaran', 'tingkat_kesadaran_kesadaran', 'tingkat_kesadaran_kualitas_kontak', 'tingkat_kesadaran_tampak_kesakitan', 'tingkat_kesadaran_gangguan_saat_berjalan', 'kelenjar_getah_bening', 'kelenjar_getah_bening_leher', 'kelenjar_getah_bening_sub_mandibula', 'kelenjar_getah_bening_ketiak', 'kelenjar_getah_bening_inguinal', 'kepala', 'kepala_tulang', 'kepala_kulit_kepala', 'kepala_rambut', 'kepala_bentuk_wajah', 'mata', 'mata_persepsi_warna_kanan', 'mata_persepsi_warna_kiri', 'mata_kelopak_mata_kanan', 'mata_kelopak_mata_kiri', 'mata_konjungtiva_kanan', 'mata_konjungtiva_kiri', 'mata_gerak_bola_mata_kanan', 'mata_gerak_bola_mata_kiri', 'mata_sklera_kanan', 'mata_sklera_kiri', 'mata_lensa_mata_kanan', 'mata_lensa_mata_kiri', 'mata_kornea_kanan', 'mata_kornea_kiri', 'mata_bulu_mata_kanan', 'mata_bulu_mata_kiri', 'mata_tekanan_bola_mata_kanan', 'mata_tekanan_bola_mata_kiri', 'mata_penglihatan_3dimensi_kanan', 'mata_penglihatan_3dimensi_kiri', 'mata_visus_tanpa_koreksi', 'mata_visus_dengan_koreksi', 'telinga', 'telinga_daun_telinga_kanan', 'telinga_daun_telinga_kiri', 'telinga_liang_telinga_kanan', 'telinga_liang_telinga_kiri', 'telinga_serumen_kanan', 'telinga_serumen_kiri', 'telinga_test_berbisik_kanan', 'telinga_test_berbisik_kiri', 'telinga_tes_garpu_tala_kanan', 'telinga_tes_garpu_tala_kiri', 'telinga_weber_kanan', 'telinga_weber_kiri', 'telinga_swabach_kanan', 'telinga_swabach_kiri', 'telinga_bing_kanan', 'telinga_bing_kiri', 'telinga_lainnya', 'hidung', 'hidung_meatus_nasi', 'hidung_septum_nasi', 'hidung_konka_nasal', 'hidung_nyeri_ketok_sinus', 'hidung_penciuman', 'mulut', 'mulut_bibir', 'mulut_lidah', 'mulut_gusi', 'mulut_lainnya', 'gigi_missing', 'gigi_caries', 'gigi_tambahan', 'gigi_sisa_akar', 'tenggorokan', 'tenggorokan_pharynx', 'tenggorokan_tonsil_kanan', 'tenggorokan_tonsil_kiri', 'tenggorokan_tonsil_ukuran_kanan', 'tenggorokan_tonsil_ukuran_kiri', 'tenggorokan_palatum', 'tenggorokan_lainn', 'dada', 'dada_bentuk', 'dada_mamae', 'dada_tumor_ukuran', 'dada_tumor_letak', 'dada_tumor_konsisten', 'dada_lainnya', 'paru', 'paru_jantung_palpasi', 'paru_jantung_perkusi_kanan', 'paru_jantung_perkusi_kiri', 'paru_jantung_perkusi_iktus_kanan', 'paru_jantung_perkusi_iktus_kiri', 'paru_jantung_perkusi_iktus_kiri_sebut', 'paru_jantung_perkusi_batas_jantung_kanan', 'paru_jantung_perkusi_batas_jantung_kiri', 'paru_jantung_perkusi_batas_jantung_kiri_sebut', 'paru_jantung_auskultasi_bunyi_nafas_kanan', 'paru_jantung_auskultasi_bunyi_nafas_kiri', 'paru_jantung_auskultasi_bunyi_nafas_tambah_kanan', 'paru_jantung_auskultasi_bunyi_nafas_tambah_kiri', 'paru_jantung_bunyi_jantung', 'paru_jantung_bunyi_jantung_kiri', 'abdomen', 'abdomen_inspeksi', 'abdomen_perkusi', 'abdomen_auskultasi_bising_usus', 'abdomen_hati', 'abdomen_limpa', 'abdomen_ginjal_kanan', 'abdomen_ginjal_kiri', 'abdomen_ballotement_kanan', 'abdomen_ballotement_kiri', 'abdomen_nyeri_costo_vertebrae_kanan', 'abdomen_nyeri_costo_vertebrae_kiri', 'genitourinaria', 'genitourinaria_kandung_kemih', 'genitourinaria_anus', 'genitourinaria_genitalia_eksternal', 'genitourinaria_prostat', 'vertebra', 'vertebra_lainnya', 'tulang_atas', 'tulang_atas_simetris', 'tulang_atas_gerakan_abduksi_neer_kanan', 'tulang_atas_gerakan_abduksi_neer_kiri', 'tulang_atas_gerakan_abduksi_hawkin_kanan', 'tulang_atas_gerakan_abduksi_hawkin_kiri', 'tulang_atas_gerakan_drop_arm_kanan', 'tulang_atas_gerakan_drop_arm_kiri', 'tulang_atas_gerakan_yergason_kanan', 'tulang_atas_gerakan_yergason_kiri', 'tulang_atas_gerakan_speed_kanan', 'tulang_atas_gerakan_speed_kiri', 'tulang_atas_tulang_kanan', 'tulang_atas_tulang_kiri', 'tulang_atas_sensibilitas_kanan', 'tulang_atas_sensibilitas_kiri', 'tulang_atas_oedem_kanan', 'tulang_atas_oedem_kiri', 'tulang_atas_varises_kanan', 'tulang_atas_varises_kiri', 'tulang_atas_kekuatan_otot_pin_prick_kanan', 'tulang_atas_kekuatan_otot_pin_prick_kiri', 'tulang_atas_kekuatan_otot_phallent_kanan', 'tulang_atas_kekuatan_otot_phallent_kiri', 'tulang_atas_kekuatan_otot_tinnel_kanan', 'tulang_atas_kekuatan_otot_tinnel_kiri', 'tulang_atas_kekuatan_otot_finskelstein_kanan', 'tulang_atas_kekuatan_otot_finskelstein_kiri', 'tulang_atas_vaskularisasi_kanan', 'tulang_atas_vaskularisasi_kiri', 'tulang_atas_kelaianan_kukujari_kanan', 'tulang_atas_kelaianan_kukujari_kiri', 'tulang_bawah', 'tulang_bawah_simetris', 'tulang_bawah_laseque_kanan', 'tulang_bawah_laseque_kiri', 'tulang_bawah_kernique_kanan', 'tulang_bawah_kernique_kiri', 'tulang_bawah_patrick_kanan', 'tulang_bawah_patrick_kiri', 'tulang_bawah_contrapatrick_kanan', 'tulang_bawah_contrapatrick_kiri', 'tulang_bawah_nyeri_tekanan_kanan', 'tulang_bawah_nyeri_tekanan_kiri', 'tulang_bawah_kekuatan_otot_kanan', 'tulang_bawah_kekuatan_otot_kiri', 'tulang_bawah_sensibilitas_kanan', 'tulang_bawah_sensibilitas_kiri', 'tulang_bawah_oedema_kanan', 'tulang_bawah_oedema_kiri', 'tulang_bawah_varises_kanan', 'tulang_bawah_varises_kiri', 'tulang_bawah_vaskularisasi_kanan', 'tulang_bawah_vaskularisasi_kiri', 'tulang_bawah_kelainan_kuku_kanan', 'tulang_bawah_kelainan_kuku_kiri', 'otot_motorik', 'otot_motorik_trofi_kanan', 'otot_motorik_trofi_kiri', 'otot_motorik_tonus_kanan', 'otot_motorik_tonus_kiri', 'otot_motorik_gerakan_abnormal_kanan', 'otot_motorik_gerakan_abnormal_kiri', 'fungsi_sensorik', 'fungsi_sensorik_kanan', 'fungsi_sensorik_kiri', 'fungsi_autonom_kanan', 'fungsi_autonom_kiri', 'saraf', 'saraf_daya_ingat_segera', 'saraf_daya_ingat_jangka_menengah', 'saraf_daya_ingat_jangka_pendek', 'saraf_daya_ingat_jangka_panjang', 'saraf_orientasi_waktu', 'saraf_orientasi_orang', 'saraf_orientasi_tempat', 'saraf_kesan', 'saraf_kesan_n_i', 'saraf_kesan_n_ii', 'saraf_kesan_n_iii', 'saraf_kesan_n_iv', 'saraf_kesan_n_v', 'saraf_kesan_n_vi', 'saraf_kesan_n_vii', 'saraf_kesan_n_viii', 'saraf_kesan_n_ix', 'saraf_kesan_n_x', 'saraf_kesan_n_xi', 'saraf_kesan_n_xii', 'reflek', 'reflek_fisiologis_patella_kanan', 'reflek_fisiologis_patella_kiri', 'reflek_patologis_kanan', 'reflek_patologis_kiri', 'kulit', 'kulit_kulit', 'kulit_selaput_lendir', 'kulit_kuku', 'kulit_lokasi', 'hasil_pemeriksaan_fisik_khusus', 'hasil_pemeriksaan_fisik_khusus_wawancara_psikiatri', 'hasil_pemeriksaan_fisik_khusus_narkoba_opiat', 'hasil_pemeriksaan_fisik_khusus_narkoba_stimulan', 'hasil_pemeriksaan_fisik_khusus_narkoba_barbiburat', 'id_dokter_pemeriksaan_fisik', 'leher', 'leher_gerakan_leher', 'leher_otot_leher', 'leher_kelenjar_thyroid', 'leher_pulsasi_carotis', 'leher_tekanan_vena_jugularis', 'leher_trachea', 'leher_lainnya', 'is_verified', 'kulit_tato', 'telinga_audiometri_kanan', 'telinga_audiometri_kiri', 'telinga_timpani_kanan', 'telinga_timpani_kiri', 'icdt10'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_m_pemeriksaan_fisik' => 'Id M Pemeriksaan Fisik',
            'diastolik' => 'Diastolik',
            'sistolik' => 'Sistolik',
            'no_rekam_medik' => 'No Rekam Medik',
            'tanda_vital' => 'Tanda Vital',
            'tanda_vital_nadi' => 'Nadi',
            'tanda_vital_pernapasan' => 'Pernapasan',
            'tanda_vital_tekanan_darah' => 'Tekanan Darah',
            'tanda_vital_suhu_badan' => 'Suhu Badan',
            'status_gizi' => 'Status Gizi',
            'status_gizi_tinggi_badan' => 'Tinggi Badan',
            'status_gizi_berat_badan' => 'Berat Badan',
            'status_gizi_lingkaran_perut' => 'Lingkaran Perut',
            'status_gizi_lingkaran_pinggang' => 'Lingkaran Lengan',
            'status_gizi_bentuk_badan' => 'Bentuk Badan',
            'status_gizi_imt' => 'Imt',
            'tingkat_kesadaran' => 'Tingkat Kesadaran',
            'tingkat_kesadaran_kesadaran' => 'Kesadaran',
            'tingkat_kesadaran_kualitas_kontak' => 'Kualitas Kontak',
            'tingkat_kesadaran_tampak_kesakitan' => 'Tampak Kesakitan',
            'tingkat_kesadaran_gangguan_saat_berjalan' => 'Gangguan Saat Berjalan',
            'kelenjar_getah_bening' => 'Kelenjar Getah Bening',
            'kelenjar_getah_bening_leher' => 'Leher',
            'kelenjar_getah_bening_sub_mandibula' => 'Sub Mandibula',
            'kelenjar_getah_bening_ketiak' => 'Ketiak',
            'kelenjar_getah_bening_inguinal' => 'Inguinal',
            'kepala' => 'Kepala',
            'kepala_tulang' => 'Tulang',
            'kepala_kulit_kepala' => 'Kulit Kepala',
            'kepala_rambut' => 'Rambut',
            'kepala_bentuk_wajah' => 'Bentuk Wajah',
            'mata' => 'Mata',
            'mata_persepsi_warna_kanan' => 'Persepsi Warna Kanan',
            'mata_persepsi_warna_kiri' => 'Persepsi Warna Kiri',
            'mata_kelopak_mata_kanan' => 'Kelopak Mata Kanan',
            'mata_kelopak_mata_kiri' => 'Kelopak Mata Kiri',
            'mata_konjungtiva_kanan' => 'Konjungtiva Kanan',
            'mata_konjungtiva_kiri' => 'Konjungtiva Kiri',
            'mata_gerak_bola_mata_kanan' => 'Gerak Bola Mata Kanan',
            'mata_gerak_bola_mata_kiri' => 'Gerak Bola Mata Kiri',
            'mata_sklera_kanan' => 'Sklera Kanan',
            'mata_sklera_kiri' => 'Sklera Kiri',
            'mata_lensa_mata_kanan' => 'Lensa Mata Kanan',
            'mata_lensa_mata_kiri' => 'Lensa Mata Kiri',
            'mata_kornea_kanan' => 'Kornea Kanan',
            'mata_kornea_kiri' => 'Kornea Kiri',
            'mata_bulu_mata_kanan' => 'Bulu Mata Kanan',
            'mata_bulu_mata_kiri' => 'Bulu Mata Kiri',
            'mata_tekanan_bola_mata_kanan' => 'Tekanan Bola Mata Kanan',
            'mata_tekanan_bola_mata_kiri' => 'Tekanan Bola Mata Kiri',
            'mata_penglihatan_3dimensi_kanan' => 'Penglihatan 3 Dimensi Kanan',
            'mata_penglihatan_3dimensi_kiri' => 'Penglihatan 3 Dimensi Kiri',
            'mata_visus_tanpa_koreksi' => 'Visus Tanpa Koreksi',
            'mata_visus_dengan_koreksi' => 'Visus Dengan Koreksi',
            'telinga' => 'Telinga',
            'telinga_daun_telinga_kanan' => 'Daun Telinga Kanan',
            'telinga_daun_telinga_kiri' => 'Daun Telinga Kiri',
            'telinga_liang_telinga_kanan' => 'Liang Telinga Kanan',
            'telinga_liang_telinga_kiri' => 'Liang Telinga Kiri',
            'telinga_serumen_kanan' => 'Serumen Kanan',
            'telinga_serumen_kiri' => 'Serumen Kiri',
            'telinga_test_berbisik_kanan' => 'Test Berbisik Kanan',
            'telinga_test_berbisik_kiri' => 'Test Berbisik Kiri',
            'telinga_tes_garpu_tala_kanan' => 'Tes Garpu Tala Kanan',
            'telinga_tes_garpu_tala_kiri' => 'Tes Garpu Tala Kiri',
            'telinga_weber_kanan' => 'Weber Kanan',
            'telinga_weber_kiri' => 'Weber Kiri',
            'telinga_swabach_kanan' => 'Swabach Kanan',
            'telinga_swabach_kiri' => 'Swabach Kiri',
            'telinga_bing_kanan' => 'Bing Kanan',
            'telinga_bing_kiri' => 'Bing Kiri',
            'telinga_lainnya' => 'Lainnya',
            'hidung' => 'Hidung',
            'hidung_meatus_nasi' => 'Meatus Nasi',
            'hidung_septum_nasi' => 'Septum Nasi',
            'hidung_konka_nasal' => 'Konka Nasal',
            'hidung_nyeri_ketok_sinus' => 'Nyeri Ketok Sinus',
            'hidung_penciuman' => 'Penciuman',
            'mulut' => 'Mulut',
            'mulut_bibir' => 'Bibir',
            'mulut_lidah' => 'Lidah',
            'mulut_gusi' => 'Gusi',
            'mulut_lainnya' => 'Lainnya',
            'gigi' => 'Gigi',
            'gigi_missing' => 'Missing',
            'gigi_caries' => 'Caries',
            'gigi_tambahan' => 'Tambahan',
            'gigi_sisa_akar' => 'Sisa Akar',
            'tenggorokan' => 'Tenggorokan',
            'tenggorokan_pharynx' => 'Pharynx',
            'tenggorokan_tonsil_kanan' => 'Tonsil Kanan',
            'tenggorokan_tonsil_kiri' => 'Tonsil Kiri',
            'tenggorokan_tonsil_ukuran_kanan' => 'Tonsil Ukuran Kanan',
            'tenggorokan_tonsil_ukuran_kiri' => 'Tonsil Ukuran Kiri',
            'tenggorokan_palatum' => 'Palatum',
            'tenggorokan_lainn' => 'Lainn',
            'dada' => 'Dada',
            'dada_bentuk' => 'Bentuk',
            'dada_mamae' => 'Mamae',
            'dada_tumor_ukuran' => 'Tumor Ukuran',
            'dada_tumor_letak' => 'Tumor Letak',
            'dada_tumor_konsisten' => 'Tumor Konsisten',
            'dada_lainnya' => 'Lainnya',
            'paru' => 'Paru',
            'paru_jantung_palpasi' => 'Palpasi',
            'paru_jantung_perkusi_kanan' => 'Perkusi Kanan',
            'paru_jantung_perkusi_kiri' => 'Perkusi Kiri',
            'paru_jantung_perkusi_iktus_kanan' => 'Perkusi Dada Kanan',
            'paru_jantung_perkusi_iktus_kiri' => 'Perkusi Dada Kiri',
            'paru_jantung_perkusi_iktus_kiri_sebut' => 'Perkusi Iktus Kiri Sebut',
            'paru_jantung_perkusi_batas_jantung_kanan' => 'Perkusi Batas Jantung Kanan',
            'paru_jantung_perkusi_batas_jantung_kiri' => 'Perkusi Batas Jantung Kiri',
            'paru_jantung_perkusi_batas_jantung_kiri_sebut' => 'Perkusi Batas Jantung Kiri Sebut',
            'paru_jantung_auskultasi_bunyi_nafas_kanan' => 'Auskultasi Bunyi Nafas Kanan',
            'paru_jantung_auskultasi_bunyi_nafas_kiri' => 'Auskultasi Bunyi Nafas Kiri',
            'paru_jantung_auskultasi_bunyi_nafas_tambah_kanan' => 'Auskultasi Bunyi Nafas Tambah Kanan',
            'paru_jantung_auskultasi_bunyi_nafas_tambah_kiri' => 'Auskultasi Bunyi Nafas Tambah Kiri',
            'paru_jantung_bunyi_jantung' => 'Bunyi Jantung',
            'paru_jantung_bunyi_jantung_kiri' => 'Bunyi Jantung Kiri',
            'abdomen' => 'Abdomen',
            'abdomen_inspeksi' => 'Inspeksi',
            'abdomen_perkusi' => 'Perkusi',
            'abdomen_auskultasi_bising_usus' => 'Auskultasi Bising Usus',
            'abdomen_hati' => 'Hati',
            'abdomen_limpa' => 'Limpa',
            'abdomen_ginjal_kanan' => 'Ginjal Kanan',
            'abdomen_ginjal_kiri' => 'Ginjal Kiri',
            'abdomen_ballotement_kanan' => 'Ballotement Kanan',
            'abdomen_ballotement_kiri' => 'Ballotement Kiri',
            'abdomen_nyeri_costo_vertebrae_kanan' => 'Nyeri Costo Vertebrae Kanan',
            'abdomen_nyeri_costo_vertebrae_kiri' => 'Nyeri Costo Vertebrae Kiri',
            'genitourinaria' => 'Genitourinaria',
            'genitourinaria_kandung_kemih' => 'Kandung Kemih',
            'genitourinaria_anus' => 'Anus',
            'genitourinaria_genitalia_eksternal' => 'Genitalia Eksternal',
            'genitourinaria_prostat' => 'Prostat',
            'vertebra' => 'Vertebra',
            'vertebra_lainnya' => 'Lainnya',
            'tulang_atas' => 'Tulang Atas',
            'tulang_atas_simetris' => 'Simetris',
            'tulang_atas_gerakan_abduksi_neer_kanan' => 'Gerakan Abduksi Neer Kanan',
            'tulang_atas_gerakan_abduksi_neer_kiri' => 'Gerakan Abduksi Neer Kiri',
            'tulang_atas_gerakan_abduksi_hawkin_kanan' => 'Gerakan Abduksi Hawkin Kanan',
            'tulang_atas_gerakan_abduksi_hawkin_kiri' => 'Gerakan Abduksi Hawkin Kiri',
            'tulang_atas_gerakan_drop_arm_kanan' => 'Gerakan Drop Arm Kanan',
            'tulang_atas_gerakan_drop_arm_kiri' => 'Gerakan Drop Arm Kiri',
            'tulang_atas_gerakan_yergason_kanan' => 'Gerakan Yergason Kanan',
            'tulang_atas_gerakan_yergason_kiri' => 'Gerakan Yergason Kiri',
            'tulang_atas_gerakan_speed_kanan' => 'Gerakan Speed Kanan',
            'tulang_atas_gerakan_speed_kiri' => 'Gerakan Speed Kiri',
            'tulang_atas_tulang_kanan' => 'Tulang Kanan',
            'tulang_atas_tulang_kiri' => 'Tulang Kiri',
            'tulang_atas_sensibilitas_kanan' => 'Sensibilitas Kanan',
            'tulang_atas_sensibilitas_kiri' => 'Sensibilitas Kiri',
            'tulang_atas_oedem_kanan' => 'Oedem Kanan',
            'tulang_atas_oedem_kiri' => 'Oedem Kiri',
            'tulang_atas_varises_kanan' => 'Varises Kanan',
            'tulang_atas_varises_kiri' => 'Varises Kiri',
            'tulang_atas_kekuatan_otot_pin_prick_kanan' => 'Kekuatan Otot Pin Prick Kanan',
            'tulang_atas_kekuatan_otot_pin_prick_kiri' => 'Kekuatan Otot Pin Prick Kiri',
            'tulang_atas_kekuatan_otot_phallent_kanan' => 'Kekuatan Otot Phallent Kanan',
            'tulang_atas_kekuatan_otot_phallent_kiri' => 'Kekuatan Otot Phallent Kiri',
            'tulang_atas_kekuatan_otot_tinnel_kanan' => 'Kekuatan Otot Tinnel Kanan',
            'tulang_atas_kekuatan_otot_tinnel_kiri' => 'Kekuatan Otot Tinnel Kiri',
            'tulang_atas_kekuatan_otot_finskelstein_kanan' => 'Kekuatan Otot Finskelstein Kanan',
            'tulang_atas_kekuatan_otot_finskelstein_kiri' => 'Kekuatan Otot Finskelstein Kiri',
            'tulang_atas_vaskularisasi_kanan' => 'Vaskularisasi Kanan',
            'tulang_atas_vaskularisasi_kiri' => 'Vaskularisasi Kiri',
            'tulang_atas_kelaianan_kukujari_kanan' => 'Kelaianan Kukujari Kanan',
            'tulang_atas_kelaianan_kukujari_kiri' => 'Kelaianan Kukujari Kiri',
            'tulang_bawah' => 'Tulang Bawah',
            'tulang_bawah_simetris' => 'Simetris',
            'tulang_bawah_laseque_kanan' => 'Laseque Kanan',
            'tulang_bawah_laseque_kiri' => 'Laseque Kiri',
            'tulang_bawah_kernique_kanan' => 'Kernique Kanan',
            'tulang_bawah_kernique_kiri' => 'Kernique Kiri',
            'tulang_bawah_patrick_kanan' => 'Patrick Kanan',
            'tulang_bawah_patrick_kiri' => 'Patrick Kiri',
            'tulang_bawah_contrapatrick_kanan' => 'Contrapatrick Kanan',
            'tulang_bawah_contrapatrick_kiri' => 'Contrapatrick Kiri',
            'tulang_bawah_nyeri_tekanan_kanan' => 'Nyeri Tekanan Kanan',
            'tulang_bawah_nyeri_tekanan_kiri' => 'Nyeri Tekanan Kiri',
            'tulang_bawah_kekuatan_otot_kanan' => 'Kekuatan Otot Kanan',
            'tulang_bawah_kekuatan_otot_kiri' => 'Kekuatan Otot Kiri',
            'tulang_bawah_sensibilitas_kanan' => 'Sensibilitas Kanan',
            'tulang_bawah_sensibilitas_kiri' => 'Sensibilitas Kiri',
            'tulang_bawah_oedema_kanan' => 'Oedema Kanan',
            'tulang_bawah_oedema_kiri' => 'Oedema Kiri',
            'tulang_bawah_varises_kanan' => 'Varises Kanan',
            'tulang_bawah_varises_kiri' => 'Varises Kiri',
            'tulang_bawah_vaskularisasi_kanan' => 'Vaskularisasi Kanan',
            'tulang_bawah_vaskularisasi_kiri' => 'Vaskularisasi Kiri',
            'tulang_bawah_kelainan_kuku_kanan' => 'Kelainan Kuku Kanan',
            'tulang_bawah_kelainan_kuku_kiri' => 'Kelainan Kuku Kiri',
            'otot_motorik' => 'Otot Motorik',
            'otot_motorik_trofi_kanan' => 'Trofi Kanan',
            'otot_motorik_trofi_kiri' => 'Trofi Kiri',
            'otot_motorik_tonus_kanan' => 'Tonus Kanan',
            'otot_motorik_tonus_kiri' => 'Tonus Kiri',
            'otot_motorik_gerakan_abnormal_kanan' => 'Gerakan Abnormal Kanan',
            'otot_motorik_gerakan_abnormal_kiri' => 'Gerakan Abnormal Kiri',
            'fungsi_sensorik' => 'Fungsi Sensorik',
            'fungsi_sensorik_kanan' => 'Fungsi Sensorik Kanan',
            'fungsi_sensorik_kiri' => 'Fungsi Sensorik Kiri',
            'fungsi_autonom_kanan' => 'Autonom Kanan',
            'fungsi_autonom_kiri' => 'Autonom Kiri',
            'saraf' => 'Saraf',
            'saraf_daya_ingat_segera' => 'Daya Ingat Segera',
            'saraf_daya_ingat_jangka_menengah' => 'Daya Ingat Jangka Menengah',
            'saraf_daya_ingat_jangka_pendek' => 'Daya Ingat Jangka Pendek',
            'saraf_daya_ingat_jangka_panjang' => 'Daya Ingat Jangka Panjang',
            'saraf_orientasi_waktu' => 'Orientasi Waktu',
            'saraf_orientasi_orang' => 'Orientasi Orang',
            'saraf_orientasi_tempat' => 'Orientasi Tempat',
            'saraf_kesan' => 'Kesan',
            'saraf_kesan_n_i' => 'Kesan N I',
            'saraf_kesan_n_ii' => 'Kesan N Ii',
            'saraf_kesan_n_iii' => 'Kesan N Iii',
            'saraf_kesan_n_iv' => 'Kesan N Iv',
            'saraf_kesan_n_v' => 'Kesan N V',
            'saraf_kesan_n_vi' => 'Kesan N Vi',
            'saraf_kesan_n_vii' => 'Kesan N Vii',
            'saraf_kesan_n_viii' => 'Kesan N Viii',
            'saraf_kesan_n_ix' => 'Kesan N Ix',
            'saraf_kesan_n_x' => 'Kesan N X',
            'saraf_kesan_n_xi' => 'Kesan N Xi',
            'saraf_kesan_n_xii' => 'Kesan N Xii',
            'reflek' => 'Reflek',
            'reflek_fisiologis_patella_kanan' => 'Fisiologis Patella Kanan',
            'reflek_fisiologis_patella_kiri' => 'Fisiologis Patella Kiri',
            'reflek_patologis_kanan' => 'Patologis Kanan',
            'reflek_patologis_kiri' => 'Patologis Kiri',
            'kulit' => 'Kulit',
            'kulit_kulit' => 'Kulit',
            'kulit_selaput_lendir' => 'Selaput Lendir',
            'kulit_kuku' => 'Kuku',
            'kulit_lain' => 'Lain',
            'kulit_lokasi' => 'Lokasi',
            'kulit_tato' => 'Tato',
            'hasil_pemeriksaan_fisik_khusus' => 'Hasil Pemeriksaan Fisik Khusus',
            'hasil_pemeriksaan_fisik_khusus_wawancara_psikiatri' => 'Hasil Pemeriksaan Fisik Khusus Wawancara Psikiatri',
            'hasil_pemeriksaan_fisik_khusus_narkoba_opiat' => 'Hasil Pemeriksaan Fisik Khusus Narkoba Opiat',
            'hasil_pemeriksaan_fisik_khusus_narkoba_stimulan' => 'Hasil Pemeriksaan Fisik Khusus Narkoba Stimulan',
            'hasil_pemeriksaan_fisik_khusus_narkoba_barbiburat' => 'Hasil Pemeriksaan Fisik Khusus Narkoba Barbiburat',
            'resume_kelainan' => 'Resume Kelainan',
            'hasil_body_map' => 'Hasil Body Map',
            'hasil_brief_survey' => 'Hasil Brief Survey',
            'diagnosis_kerja' => 'Diagnosis Kerja',
            'diagnosis_diferensial' => 'Diagnosis Diferensial',
            'kategori_kesehatan' => 'Kategori Kesehatan',
            'id_dokter_pemeriksaan_fisik' => 'Id Dokter Pemeriksaan Fisik',
            'leher' => 'Leher',
            'leher_gerakan_leher' => 'Leher Gerakan Leher',
            'leher_otot_leher' => 'Leher Otot Leher',
            'leher_kelenjar_thyroid' => 'Leher Kelenjar Thyroid',
            'leher_pulsasi_carotis' => 'Leher Pulsasi Carotis',
            'leher_tekanan_vena_jugularis' => 'Leher Tekanan Vena Jugularis',
            'leher_trachea' => 'Leher Trachea',
            'leher_lainnya' => 'Leher Lainnya',
            'is_verified' => 'Is Verified',
            'telinga_audiometri_kanan' => 'Telinga Audiometri Kanan',
            'telinga_audiometri_kiri' => 'Telinga Audiometri Kiri',
            'telinga_timpani_kanan' => 'Telinga Timpani Kanan',
            'telinga_timpani_kiri' => 'Telinga Timpani Kiri',
            'icdt10' => 'Icdt10',
        ];
    }
}
