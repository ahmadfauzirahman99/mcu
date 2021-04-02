<?php

/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2021-04-02 16:18:25 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2021-04-02 21:54:17
 */

namespace app\models\resume;


use yii\base\Model;
use yii\helpers\Json;

class Resume extends Model
{

    public static function fisikNormal()
    {
        $fisikNormal = [
            'tingkat_kesadaran_kesadaran' => 'Compos Mentis',
            'tingkat_kesadaran_kualitas_kontak' => 'Baik',
            'tingkat_kesadaran_tampak_kesakitan' => 'Tidak Tampak Kesakitan',
            'tingkat_kesadaran_gangguan_saat_berjalan' => 'Tidak',
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
            'mata_lensa_mata_kanan' => 'Tidak Keruh',
            'mata_lensa_mata_kiri' => 'Tidak Keruh',
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
            'telinga_serumen_kanan' => 'Tidak Ada',
            'telinga_serumen_kiri' => 'Tidak Ada',
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
            'dada' => 'Normal',
            'dada_bentuk' => 'Simetris',
            'dada_mamae' => 'Normal',
            'paru_jantung_palpasi' => 'Normal',
            'paru_jantung_perkusi_kanan' => 'Sonor',
            'paru_jantung_perkusi_kiri' => 'Sonor',
            'paru_jantung_perkusi_iktus_kanan' => 'Normal',
            'paru_jantung_perkusi_iktus_kiri' => 'Normal',
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
            'abdomen_ballotement_kanan' => 'Tidak Ada',
            'abdomen_ballotement_kiri' => 'Tidak Ada',
            'abdomen_nyeri_costo_vertebrae_kanan' => 'Tidak Ada',
            'abdomen_nyeri_costo_vertebrae_kiri' => 'Tidak Ada',
            'genitourinaria' => 'Tidak Dilanjutkan Pemeriksaan',
            'genitourinaria_kandung_kemih' => 'Normal',
            'genitourinaria_anus' => 'Normal',
            'genitourinaria_genitalia_eksternal' => 'Normal',
            'genitourinaria_prostat' => 'Tidak Teraba',
            'vertebra' => 'Normal',
            'tulang_atas_simetris' => 'Ya',
            'tulang_atas_gerakan_abduksi_neer_kanan' => 'Normal',
            'tulang_atas_gerakan_abduksi_neer_kiri' => 'Normal',
            'tulang_atas_gerakan_abduksi_hawkin_kanan' => 'Normal',
            'tulang_atas_gerakan_abduksi_hawkin_kiri' => 'Normal',
            'tulang_atas_gerakan_drop_arm_kanan' => 'Normal',
            'tulang_atas_gerakan_drop_arm_kiri' => 'Normal',
            'tulang_atas_gerakan_yergason_kanan' => 'Normal',
            'tulang_atas_gerakan_yergason_kiri' => 'Normal',
            'tulang_atas_gerakan_speed_kanan' => 'Normal',
            'tulang_atas_gerakan_speed_kiri' => 'Normal',
            'tulang_atas_tulang_kanan' => 'Normal',
            'tulang_atas_tulang_kiri' => 'Normal',
            'tulang_atas_sensibilitas_kanan' => 'Baik',
            'tulang_atas_sensibilitas_kiri' => 'Baik',
            'tulang_atas_oedem_kanan' => 'Tidak Ada',
            'tulang_atas_oedem_kiri' => 'Tidak Ada',
            'tulang_atas_varises_kanan' => 'Tidak Ada',
            'tulang_atas_varises_kiri' => 'Tidak Ada',
            'tulang_atas_kekuatan_otot_pin_prick_kanan' => 'Normal',
            'tulang_atas_kekuatan_otot_pin_prick_kiri' => 'Normal',
            'tulang_atas_kekuatan_otot_phallent_kanan' => 'Normal',
            'tulang_atas_kekuatan_otot_phallent_kiri' => 'Normal',
            'tulang_atas_kekuatan_otot_tinnel_kanan' => 'Normal',
            'tulang_atas_kekuatan_otot_tinnel_kiri' => 'Normal',
            'tulang_atas_kekuatan_otot_finskelstein_kanan' => 'Normal',
            'tulang_atas_kekuatan_otot_finskelstein_kiri' => 'Normal',
            'tulang_atas_vaskularisasi_kanan' => 'Baik',
            'tulang_atas_vaskularisasi_kiri' => 'Baik',
            'tulang_atas_kelaianan_kukujari_kanan' => 'Tidak Ada',
            'tulang_atas_kelaianan_kukujari_kiri' => 'Tidak Ada',
            'tulang_bawah_simetris' => 'Ya',
            'tulang_bawah_laseque_kanan' => 'Normal',
            'tulang_bawah_laseque_kiri' => 'Normal',
            'tulang_bawah_kernique_kanan' => 'Normal',
            'tulang_bawah_kernique_kiri' => 'Normal',
            'tulang_bawah_patrick_kanan' => 'Normal',
            'tulang_bawah_patrick_kiri' => 'Normal',
            'tulang_bawah_contrapatrick_kanan' => 'Normal',
            'tulang_bawah_contrapatrick_kiri' => 'Normal',
            'tulang_bawah_nyeri_tekanan_kanan' => 'Tidak Ada',
            'tulang_bawah_nyeri_tekanan_kiri' => 'Tidak Ada',
            'tulang_bawah_kekuatan_otot_kanan' => 'Normal',
            'tulang_bawah_kekuatan_otot_kiri' => 'Normal',
            'tulang_bawah_sensibilitas_kanan' => 'Baik',
            'tulang_bawah_sensibilitas_kiri' => 'Baik',
            'tulang_bawah_oedema_kanan' => 'Tidak Ada',
            'tulang_bawah_oedema_kiri' => 'Tidak Ada',
            'tulang_bawah_varises_kanan' => 'Tidak Ada',
            'tulang_bawah_varises_kiri' => 'Tidak Ada',
            'tulang_bawah_vaskularisasi_kiri' => 'Baik',
            'tulang_bawah_kelainan_kuku_kanan' => 'Tidak Ada',
            'tulang_bawah_kelainan_kuku_kiri' => 'Tidak Ada',
            'otot_motorik_trofi_kanan' => 'Normal',
            'otot_motorik_trofi_kiri' => 'Normal',
            'otot_motorik_tonus_kanan' => 'Normal',
            'otot_motorik_tonus_kiri' => 'Normal',
            'otot_motorik_gerakan_abnormal_kanan' => 'Tidak Ada',
            'otot_motorik_gerakan_abnormal_kiri' => 'Tidak Ada',
            'fungsi_sensorik_kanan' => 'Normal',
            'fungsi_sensorik_kiri' => 'Normal',
            'fungsi_autonom_kanan' => 'Normal',
            'fungsi_autonom_kiri' => 'Normal',
            'saraf_daya_ingat_segera' => 'Baik',
            'saraf_daya_ingat_jangka_menengah' => 'Baik',
            'saraf_daya_ingat_jangka_pendek' => 'Baik',
            'saraf_daya_ingat_jangka_panjang' => 'Baik',
            'saraf_orientasi_waktu' => 'Baik',
            'saraf_orientasi_orang' => 'Baik',
            'saraf_orientasi_tempat' => 'Baik',
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
            'reflek_fisiologis_patella_kiri' => 'Normal',
            'reflek_patologis_kanan' => 'Negative',
            'reflek_patologis_kiri' => 'Negative',
            'kulit_kulit' => 'Normal',
            'kulit_selaput_lendir' => 'Normal',
            'kulit_kuku' => 'Normal',
            'hasil_pemeriksaan_fisik_khusus_wawancara_psikiatri' => 'Tidak Ditemukan Gangguan Jiwa',
            'hasil_pemeriksaan_fisik_khusus_narkoba_opiat' => 'Negatif',
            'hasil_pemeriksaan_fisik_khusus_narkoba_stimulan' => 'Negatif',
            'hasil_pemeriksaan_fisik_khusus_narkoba_barbiburat' => 'Negatif',
            // 'resume_kelainan' => 'z02.1',
            'leher_gerakan_leher' => 'Normal',
            'leher_otot_leher' => 'Normal',
            'leher_kelenjar_thyroid' => 'Normal',
            'leher_pulsasi_carotis' => 'Normal',
            'leher_tekanan_vena_jugularis' => 'Normal',
            'leher_trachea' => 'Normal',
            'kulit_tato' => 'Tidak Ada',
            'telinga_timpani_kanan' => 'Intak',
            'telinga_timpani_kiri' => 'Intak',
            'hemoroid' => 'Tidak Ada',
            'hydrocele' => 'Tidak Normal',
            'varicocele' => 'Tidak Normal',
            'ulceral' => 'Tidak Ada',
            'gonorchoea' => 'Tidak Normal',
            'genitalia_lainnya' => 'Tidak Normal',
        ];

        return $fisikNormal;
    }

    public static function gigiNormal()
    {
        $gigiNormal = [
            'g18' => 'Normal',
            'g17' => 'Normal',
            'g16' => 'Normal',
            'g15' => 'Normal',
            'g14' => 'Normal',
            'g13' => 'Normal',
            'g12' => 'Normal',
            'g11' => 'Normal',
            'g21' => 'Normal',
            'g22' => 'Normal',
            'g23' => 'Normal',
            'g24' => 'Normal',
            'g25' => 'Normal',
            'g26' => 'Normal',
            'g27' => 'Normal',
            'g28' => 'Normal',
            'g38' => 'Normal',
            'g37' => 'Normal',
            'g36' => 'Normal',
            'g35' => 'Normal',
            'g34' => 'Normal',
            'g33' => 'Normal',
            'g32' => 'Normal',
            'g31' => 'Normal',
            'g41' => 'Normal',
            'g42' => 'Normal',
            'g43' => 'Normal',
            'g44' => 'Normal',
            'g45' => 'Normal',
            'g46' => 'Normal',
            'g47' => 'Normal',
            'g48' => 'Normal',
            'oklusi' => 'Normal Bite',
            'torus_palatinus' => 'Tidak Ada',
            'torus_mandibularis' => 'Tidak Ada',
            'palatum' => 'Tinggi',
            'supernumerary_teeth' => 'Tidak Ada',
            'diastema' => 'Tidak Ada',
            'spacing' => 'Tidak Ada',
            'oral_hygiene' => 'Baik',
            'gingiva_periodontal' => 'Normal',
            'oral_mucosa' => 'Normal',
            'tongue' => 'Normal',
        ];

        return $gigiNormal;
    }

    public static function mataNormal()
    {
        $mataNormal = [
            'persepsi_warna_mata_kanan' => 'Normal',
            'persepsi_warna_mata_kiri' => 'Normal',
            'kelopak_mata_kanan' => 'Normal',
            'kelopak_mata_kiri' => 'Normal',
            'konjungtiva_mata_kanan' => 'Normal',
            'konjungtiva_mata_kiri' => 'Normal',
            'kesegarisan_gerak_bola_mata_kanan' => 'Normal',
            'kesegarisan_gerak_bola_mata_kiri' => 'Normal',
            'skiera_mata_kanan' => 'Normal',
            'skiera_mata_kiri' => 'Normal',
            'lensa_mata_kanan' => 'Tidak Keruh',
            'lensa_mata_kiri' => 'Tidak Keruh',
            'kornea_mata_kanan' => 'Normal',
            'kornea_mata_kiri' => 'Normal',
            'bulu_mata_kanan' => 'Normal',
            'bulu_mata_kiri' => 'Normal',
            'tekanan_bola_mata_kanan' => 'Normal',
            'tekanan_bola_mata_kiri' => 'Normal',
            'penglihatan_3_dimensi_mata_kanan' => 'Normal',
            'penglihatan_3_dimensi_mata_kiri' => 'Normal',
            'virus_mata_tanpa_koreksi_mata_kanan' => 'VOD: 20/20',
            'virus_mata_tanpa_koreksi_mata_kiri' => 'VOS: 20/20',
            'virus_mata_dengan_koreksi_mata_kanan' =>  '-',
            'virus_mata_dengan_koreksi_mata_kiri' =>  '-',
        ];

        return $mataNormal;
    }


    public static function thtNormal()
    {
        $thtNormal = [
            'tl_daun_telinga_kanan' => 'Normal',
            'tl_daun_telinga_kiri' => 'Normal',
            'tl_liang_telinga_kanan' => 'Normal',
            'tl_liang_telinga_kiri' => 'Normal',
            'tl_serumen_telinga_kanan' => 'Tidak Ada',
            'tl_serumen_telinga_kiri' => 'Tidak Ada',
            'tl_membrana_timpani_telinga_kanan' => 'Intak',
            'tl_membrana_timpani_telinga_kiri' => 'Intak',
            'tl_test_garpu_tala_rinne_telinga_kanan' => 'Negatif (AC < BC)',
            'tl_test_garpu_tala_rinne_telinga_kiri' => 'Negatif (AC < BC)',
            'tl_weber_telinga_kanan' => 'Tidak Ada Lateralisasi',
            'tl_weber_telinga_kiri' => 'Tidak Ada Lateralisasi',
            'tl_swabach_telinga_kanan' => 'Normal',
            'tl_swabach_telinga_kiri' => 'Normal',
            'tl_bing_telinga_kanan' => 'Bertambah Keras',
            'tl_bing_telinga_kiri' => 'Bertambah Keras',
            'tl_test_berbisik_periksa' => 'Ya',
            'tl_test_berbisik_telinga_kanan_option' => 'Jarak 6-5 Meter',
            'tl_test_berbisik_telinga_kanan' => 'Dalam Batas Normal',
            'tl_test_berbisik_telinga_kiri_option' => 'Jarak 6-5 Meter',
            'tl_test_berbisik_telinga_kiri' => 'Dalam Batas Normal',
            'tl_audiometri_periksa' => 'Tidak',
            'hd_meatus_nasi' => 'Normal',
            'hd_septum_nasi' => 'Normal',
            'hd_konka_nasal' => 'Normal',
            'hd_nyeri_ketok_sinus_maksilar' => 'Normal',
            'hd_penciuman' => 'Normal',
            'tg_pharynx' => 'Normal',
            'tg_tonsil_kanan' => 'T0',
            'tg_tonsil_kiri' => 'T0',
            'tg_ukuran_kanan' => 'Normal',
            'tg_ukuran_kiri' => 'Normal',
            'tg_palatum' => 'Normal',
        ];

        return $thtNormal;
    }

    public static function cekNormal($jenis, $modelFisik)
    {
        switch ($jenis) {
            case 'FISIK':
                $hasilNormal = self::fisikNormal();
                $jenis_JP = McuResume::JP_FISIK;
                break;
            case 'GIGI':
                $hasilNormal = self::gigiNormal();
                $jenis_JP = McuResume::JP_SPESIALIS_GIGI;
                break;
            case 'MATA':
                $hasilNormal = self::mataNormal();
                $jenis_JP = McuResume::JP_SPESIALIS_MATA;
                break;
            case 'THT':
                $hasilNormal = self::thtNormal();
                $jenis_JP = McuResume::JP_SPESIALIS_THT;
                break;

            default:
                # code...
                break;
        }

        $fisikTidakNormal = [];
        foreach ($hasilNormal as $key => $value) {
            if ($value != $modelFisik[$key])
                $fisikTidakNormal[$key] = $modelFisik[$key];
        }

        $modelResume = McuResume::find()
            ->where([
                'and',
                ['no_rekam_medik' => $modelFisik['no_rekam_medik']],
                ['no_daftar' => $modelFisik['no_daftar']],
                ['jenis_pemeriksaan' => $jenis_JP],
            ])
            ->one();
        if (!$modelResume)
            $modelResume = new McuResume();

        $modelResume->no_rekam_medik = $modelFisik['no_rekam_medik'];
        $modelResume->no_daftar = $modelFisik['no_daftar'];
        $modelResume->jenis_pemeriksaan = $jenis_JP;
        $modelResume->tidak_normal = Json::encode($fisikTidakNormal);

        if ($modelResume->save()) {
            return [
                's' => true,
                'e' => null,
            ];
        } else {
            return [
                's' => false,
                'e' => $modelResume->errors,
            ];
        }
    }
}
