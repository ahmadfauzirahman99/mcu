<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MasterPemeriksaanFisikSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="master-pemeriksaan-fisik-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_m_pemeriksaan_fisik') ?>

    <?= $form->field($model, 'no_rekam_medik') ?>

    <?= $form->field($model, 'tanda_vital') ?>

    <?= $form->field($model, 'tanda_vital_nadi') ?>

    <?= $form->field($model, 'tanda_vital_pernapasan') ?>

    <?php // echo $form->field($model, 'tanda_vital_tekanan_darah') ?>

    <?php // echo $form->field($model, 'tanda_vital_suhu_badan') ?>

    <?php // echo $form->field($model, 'status_gizi') ?>

    <?php // echo $form->field($model, 'status_gizi_tinggi_badan') ?>

    <?php // echo $form->field($model, 'status_gizi_berat_badan') ?>

    <?php // echo $form->field($model, 'status_gizi_lingkaran_perut') ?>

    <?php // echo $form->field($model, 'status_gizi_lingkaran_pinggang') ?>

    <?php // echo $form->field($model, 'status_gizi_bentuk_badan') ?>

    <?php // echo $form->field($model, 'status_gizi_imt') ?>

    <?php // echo $form->field($model, 'tingkat_kesadaran') ?>

    <?php // echo $form->field($model, 'tingkat_kesadaran_kesadaran') ?>

    <?php // echo $form->field($model, 'tingkat_kesadaran_kualitas_kontak') ?>

    <?php // echo $form->field($model, 'tingkat_kesadaran_tampak_kesakitan') ?>

    <?php // echo $form->field($model, 'tingkat_kesadaran_gangguan_saat_berjalan') ?>

    <?php // echo $form->field($model, 'kelenjar_getah_bening') ?>

    <?php // echo $form->field($model, 'kelenjar_getah_bening_leher') ?>

    <?php // echo $form->field($model, 'kelenjar_getah_bening_sub_mandibula') ?>

    <?php // echo $form->field($model, 'kelenjar_getah_bening_ketiak') ?>

    <?php // echo $form->field($model, 'kelenjar_getah_bening_inguinal') ?>

    <?php // echo $form->field($model, 'kepala') ?>

    <?php // echo $form->field($model, 'kepala_tulang') ?>

    <?php // echo $form->field($model, 'kepala_kulit_kepala') ?>

    <?php // echo $form->field($model, 'kepala_rambut') ?>

    <?php // echo $form->field($model, 'kepala_bentuk_wajah') ?>

    <?php // echo $form->field($model, 'mata') ?>

    <?php // echo $form->field($model, 'mata_persepsi_warna_kanan') ?>

    <?php // echo $form->field($model, 'mata_persepsi_warna_kiri') ?>

    <?php // echo $form->field($model, 'mata_kelopak_mata_kanan') ?>

    <?php // echo $form->field($model, 'mata_kelopak_mata_kiri') ?>

    <?php // echo $form->field($model, 'mata_konjungtiva_kanan') ?>

    <?php // echo $form->field($model, 'mata_konjungtiva_kiri') ?>

    <?php // echo $form->field($model, 'mata_gerak_bola_mata_kanan') ?>

    <?php // echo $form->field($model, 'mata_gerak_bola_mata_kiri') ?>

    <?php // echo $form->field($model, 'mata_sklera_kanan') ?>

    <?php // echo $form->field($model, 'mata_sklera_kiri') ?>

    <?php // echo $form->field($model, 'mata_lensa_mata_kanan') ?>

    <?php // echo $form->field($model, 'mata_lensa_mata_kiri') ?>

    <?php // echo $form->field($model, 'mata_kornea_kanan') ?>

    <?php // echo $form->field($model, 'mata_kornea_kiri') ?>

    <?php // echo $form->field($model, 'mata_bulu_mata_kanan') ?>

    <?php // echo $form->field($model, 'mata_bulu_mata_kiri') ?>

    <?php // echo $form->field($model, 'mata_tekanan_bola_mata_kanan') ?>

    <?php // echo $form->field($model, 'mata_tekanan_bola_mata_kiri') ?>

    <?php // echo $form->field($model, 'mata_penglihatan_3dimensi_kanan') ?>

    <?php // echo $form->field($model, 'mata_penglihatan_3dimensi_kiri') ?>

    <?php // echo $form->field($model, 'mata_visus_tanpa_koreksi') ?>

    <?php // echo $form->field($model, 'mata_visus_dengan_koreksi') ?>

    <?php // echo $form->field($model, 'telinga') ?>

    <?php // echo $form->field($model, 'telinga_daun_telinga_kanan') ?>

    <?php // echo $form->field($model, 'telinga_daun_telinga_kiri') ?>

    <?php // echo $form->field($model, 'telinga_liang_telinga_kanan') ?>

    <?php // echo $form->field($model, 'telinga_liang_telinga_kiri') ?>

    <?php // echo $form->field($model, 'telinga_serumen_kanan') ?>

    <?php // echo $form->field($model, 'telinga_serumen_kiri') ?>

    <?php // echo $form->field($model, 'telinga_test_berbisik_kanan') ?>

    <?php // echo $form->field($model, 'telinga_test_berbisik_kiri') ?>

    <?php // echo $form->field($model, 'telinga_tes_garpu_tala_kanan') ?>

    <?php // echo $form->field($model, 'telinga_tes_garpu_tala_kiri') ?>

    <?php // echo $form->field($model, 'telinga_weber_kanan') ?>

    <?php // echo $form->field($model, 'telinga_weber_kiri') ?>

    <?php // echo $form->field($model, 'telinga_swabach_kanan') ?>

    <?php // echo $form->field($model, 'telinga_swabach_kiri') ?>

    <?php // echo $form->field($model, 'telinga_bing_kanan') ?>

    <?php // echo $form->field($model, 'telinga_bing_kiri') ?>

    <?php // echo $form->field($model, 'telinga_lainnya') ?>

    <?php // echo $form->field($model, 'hidung') ?>

    <?php // echo $form->field($model, 'hidung_meatus_nasi') ?>

    <?php // echo $form->field($model, 'hidung_septum_nasi') ?>

    <?php // echo $form->field($model, 'hidung_konka_nasal') ?>

    <?php // echo $form->field($model, 'hidung_nyeri_ketok_sinus') ?>

    <?php // echo $form->field($model, 'hidung_penciuman') ?>

    <?php // echo $form->field($model, 'mulut') ?>

    <?php // echo $form->field($model, 'mulut_bibir') ?>

    <?php // echo $form->field($model, 'mulut_lidah') ?>

    <?php // echo $form->field($model, 'mulut_gusi') ?>

    <?php // echo $form->field($model, 'mulut_lainnya') ?>

    <?php // echo $form->field($model, 'gigi') ?>

    <?php // echo $form->field($model, 'gigi_missing') ?>

    <?php // echo $form->field($model, 'gigi_caries') ?>

    <?php // echo $form->field($model, 'gigi_tambahan') ?>

    <?php // echo $form->field($model, 'gigi_sisa_akar') ?>

    <?php // echo $form->field($model, 'tenggorokan') ?>

    <?php // echo $form->field($model, 'tenggorokan_pharynx') ?>

    <?php // echo $form->field($model, 'tenggorokan_tonsil_kanan') ?>

    <?php // echo $form->field($model, 'tenggorokan_tonsil_kiri') ?>

    <?php // echo $form->field($model, 'tenggorokan_tonsil_ukuran_kanan') ?>

    <?php // echo $form->field($model, 'tenggorokan_tonsil_ukuran_kiri') ?>

    <?php // echo $form->field($model, 'tenggorokan_palatum') ?>

    <?php // echo $form->field($model, 'tenggorokan_lainn') ?>

    <?php // echo $form->field($model, 'dada') ?>

    <?php // echo $form->field($model, 'dada_bentuk') ?>

    <?php // echo $form->field($model, 'dada_mamae') ?>

    <?php // echo $form->field($model, 'dada_tumor_ukuran') ?>

    <?php // echo $form->field($model, 'dada_tumor_letak') ?>

    <?php // echo $form->field($model, 'dada_tumor_konsisten') ?>

    <?php // echo $form->field($model, 'dada_lainnya') ?>

    <?php // echo $form->field($model, 'paru') ?>

    <?php // echo $form->field($model, 'paru_jantung_palpasi') ?>

    <?php // echo $form->field($model, 'paru_jantung_perkusi_kanan') ?>

    <?php // echo $form->field($model, 'paru_jantung_perkusi_kiri') ?>

    <?php // echo $form->field($model, 'paru_jantung_perkusi_iktus_kanan') ?>

    <?php // echo $form->field($model, 'paru_jantung_perkusi_iktus_kiri') ?>

    <?php // echo $form->field($model, 'paru_jantung_perkusi_iktus_kiri_sebut') ?>

    <?php // echo $form->field($model, 'paru_jantung_perkusi_batas_jantung_kanan') ?>

    <?php // echo $form->field($model, 'paru_jantung_perkusi_batas_jantung_kiri') ?>

    <?php // echo $form->field($model, 'paru_jantung_perkusi_batas_jantung_kiri_sebut') ?>

    <?php // echo $form->field($model, 'paru_jantung_auskultasi_bunyi_nafas_kanan') ?>

    <?php // echo $form->field($model, 'paru_jantung_auskultasi_bunyi_nafas_kiri') ?>

    <?php // echo $form->field($model, 'paru_jantung_auskultasi_bunyi_nafas_tambah_kanan') ?>

    <?php // echo $form->field($model, 'paru_jantung_auskultasi_bunyi_nafas_tambah_kiri') ?>

    <?php // echo $form->field($model, 'paru_jantung_bunyi_jantung') ?>

    <?php // echo $form->field($model, 'paru_jantung_bunyi_jantung_kiri') ?>

    <?php // echo $form->field($model, 'abdomen') ?>

    <?php // echo $form->field($model, 'abdomen_inspeksi') ?>

    <?php // echo $form->field($model, 'abdomen_perkusi') ?>

    <?php // echo $form->field($model, 'abdomen_auskultasi_bising_usus') ?>

    <?php // echo $form->field($model, 'abdomen_hati') ?>

    <?php // echo $form->field($model, 'abdomen_limpa') ?>

    <?php // echo $form->field($model, 'abdomen_ginjal_kanan') ?>

    <?php // echo $form->field($model, 'abdomen_ginjal_kiri') ?>

    <?php // echo $form->field($model, 'abdomen_ballotement_kanan') ?>

    <?php // echo $form->field($model, 'abdomen_ballotement_kiri') ?>

    <?php // echo $form->field($model, 'abdomen_nyeri_costo_vertebrae_kanan') ?>

    <?php // echo $form->field($model, 'abdomen_nyeri_costo_vertebrae_kiri') ?>

    <?php // echo $form->field($model, 'genitourinaria') ?>

    <?php // echo $form->field($model, 'genitourinaria_kandung_kemih') ?>

    <?php // echo $form->field($model, 'genitourinaria_anus') ?>

    <?php // echo $form->field($model, 'genitourinaria_genitalia_eksternal') ?>

    <?php // echo $form->field($model, 'genitourinaria_prostat') ?>

    <?php // echo $form->field($model, 'vertebra') ?>

    <?php // echo $form->field($model, 'vertebra_lainnya') ?>

    <?php // echo $form->field($model, 'tulang_atas') ?>

    <?php // echo $form->field($model, 'tulang_atas_simetris') ?>

    <?php // echo $form->field($model, 'tulang_atas_gerakan_abduksi_neer_kanan') ?>

    <?php // echo $form->field($model, 'tulang_atas_gerakan_abduksi_neer_kiri') ?>

    <?php // echo $form->field($model, 'tulang_atas_gerakan_abduksi_hawkin_kanan') ?>

    <?php // echo $form->field($model, 'tulang_atas_gerakan_abduksi_hawkin_kiri') ?>

    <?php // echo $form->field($model, 'tulang_atas_gerakan_drop_arm_kanan') ?>

    <?php // echo $form->field($model, 'tulang_atas_gerakan_drop_arm_kiri') ?>

    <?php // echo $form->field($model, 'tulang_atas_gerakan_yergason_kanan') ?>

    <?php // echo $form->field($model, 'tulang_atas_gerakan_yergason_kiri') ?>

    <?php // echo $form->field($model, 'tulang_atas_gerakan_speed_kanan') ?>

    <?php // echo $form->field($model, 'tulang_atas_gerakan_speed_kiri') ?>

    <?php // echo $form->field($model, 'tulang_atas_tulang_kanan') ?>

    <?php // echo $form->field($model, 'tulang_atas_tulang_kiri') ?>

    <?php // echo $form->field($model, 'tulang_atas_sensibilitas_kanan') ?>

    <?php // echo $form->field($model, 'tulang_atas_sensibilitas_kiri') ?>

    <?php // echo $form->field($model, 'tulang_atas_oedem_kanan') ?>

    <?php // echo $form->field($model, 'tulang_atas_oedem_kiri') ?>

    <?php // echo $form->field($model, 'tulang_atas_varises_kanan') ?>

    <?php // echo $form->field($model, 'tulang_atas_varises_kiri') ?>

    <?php // echo $form->field($model, 'tulang_atas_kekuatan_otot_pin_prick_kanan') ?>

    <?php // echo $form->field($model, 'tulang_atas_kekuatan_otot_pin_prick_kiri') ?>

    <?php // echo $form->field($model, 'tulang_atas_kekuatan_otot_phallent_kanan') ?>

    <?php // echo $form->field($model, 'tulang_atas_kekuatan_otot_phallent_kiri') ?>

    <?php // echo $form->field($model, 'tulang_atas_kekuatan_otot_tinnel_kanan') ?>

    <?php // echo $form->field($model, 'tulang_atas_kekuatan_otot_tinnel_kiri') ?>

    <?php // echo $form->field($model, 'tulang_atas_kekuatan_otot_finskelstein_kanan') ?>

    <?php // echo $form->field($model, 'tulang_atas_kekuatan_otot_finskelstein_kiri') ?>

    <?php // echo $form->field($model, 'tulang_atas_vaskularisasi_kanan') ?>

    <?php // echo $form->field($model, 'tulang_atas_vaskularisasi_kiri') ?>

    <?php // echo $form->field($model, 'tulang_atas_kelaianan_kukujari_kanan') ?>

    <?php // echo $form->field($model, 'tulang_atas_kelaianan_kukujari_kiri') ?>

    <?php // echo $form->field($model, 'tulang_bawah') ?>

    <?php // echo $form->field($model, 'tulang_bawah_simetris') ?>

    <?php // echo $form->field($model, 'tulang_bawah_laseque_kanan') ?>

    <?php // echo $form->field($model, 'tulang_bawah_laseque_kiri') ?>

    <?php // echo $form->field($model, 'tulang_bawah_kernique_kanan') ?>

    <?php // echo $form->field($model, 'tulang_bawah_kernique_kiri') ?>

    <?php // echo $form->field($model, 'tulang_bawah_patrick_kanan') ?>

    <?php // echo $form->field($model, 'tulang_bawah_patrick_kiri') ?>

    <?php // echo $form->field($model, 'tulang_bawah_contrapatrick_kanan') ?>

    <?php // echo $form->field($model, 'tulang_bawah_contrapatrick_kiri') ?>

    <?php // echo $form->field($model, 'tulang_bawah_nyeri_tekanan_kanan') ?>

    <?php // echo $form->field($model, 'tulang_bawah_nyeri_tekanan_kiri') ?>

    <?php // echo $form->field($model, 'tulang_bawah_kekuatan_otot_kanan') ?>

    <?php // echo $form->field($model, 'tulang_bawah_kekuatan_otot_kiri') ?>

    <?php // echo $form->field($model, 'tulang_bawah_sensibilitas_kanan') ?>

    <?php // echo $form->field($model, 'tulang_bawah_sensibilitas_kiri') ?>

    <?php // echo $form->field($model, 'tulang_bawah_oedema_kanan') ?>

    <?php // echo $form->field($model, 'tulang_bawah_oedema_kiri') ?>

    <?php // echo $form->field($model, 'tulang_bawah_varises_kanan') ?>

    <?php // echo $form->field($model, 'tulang_bawah_varises_kiri') ?>

    <?php // echo $form->field($model, 'tulang_bawah_vaskularisasi_kanan') ?>

    <?php // echo $form->field($model, 'tulang_bawah_vaskularisasi_kiri') ?>

    <?php // echo $form->field($model, 'tulang_bawah_kelainan_kuku_kanan') ?>

    <?php // echo $form->field($model, 'tulang_bawah_kelainan_kuku_kiri') ?>

    <?php // echo $form->field($model, 'otot_motorik') ?>

    <?php // echo $form->field($model, 'otot_motorik_trofi_kanan') ?>

    <?php // echo $form->field($model, 'otot_motorik_trofi_kiri') ?>

    <?php // echo $form->field($model, 'otot_motorik_tonus_kanan') ?>

    <?php // echo $form->field($model, 'otot_motorik_tonus_kiri') ?>

    <?php // echo $form->field($model, 'otot_motorik_gerakan_abnormal_kanan') ?>

    <?php // echo $form->field($model, 'otot_motorik_gerakan_abnormal_kiri') ?>

    <?php // echo $form->field($model, 'fungsi_sensorik') ?>

    <?php // echo $form->field($model, 'fungsi_sensorik_kanan') ?>

    <?php // echo $form->field($model, 'fungsi_sensorik_kiri') ?>

    <?php // echo $form->field($model, 'fungsi_autonom_kanan') ?>

    <?php // echo $form->field($model, 'fungsi_autonom_kiri') ?>

    <?php // echo $form->field($model, 'saraf') ?>

    <?php // echo $form->field($model, 'saraf_daya_ingat_segera') ?>

    <?php // echo $form->field($model, 'saraf_daya_ingat_jangka_menengah') ?>

    <?php // echo $form->field($model, 'saraf_daya_ingat_jangka_pendek') ?>

    <?php // echo $form->field($model, 'saraf_daya_ingat_jangka_panjang') ?>

    <?php // echo $form->field($model, 'saraf_orientasi_waktu') ?>

    <?php // echo $form->field($model, 'saraf_orientasi_orang') ?>

    <?php // echo $form->field($model, 'saraf_orientasi_tempat') ?>

    <?php // echo $form->field($model, 'saraf_kesan') ?>

    <?php // echo $form->field($model, 'saraf_kesan_n_i') ?>

    <?php // echo $form->field($model, 'saraf_kesan_n_ii') ?>

    <?php // echo $form->field($model, 'saraf_kesan_n_iii') ?>

    <?php // echo $form->field($model, 'saraf_kesan_n_iv') ?>

    <?php // echo $form->field($model, 'saraf_kesan_n_v') ?>

    <?php // echo $form->field($model, 'saraf_kesan_n_vi') ?>

    <?php // echo $form->field($model, 'saraf_kesan_n_vii') ?>

    <?php // echo $form->field($model, 'saraf_kesan_n_viii') ?>

    <?php // echo $form->field($model, 'saraf_kesan_n_ix') ?>

    <?php // echo $form->field($model, 'saraf_kesan_n_x') ?>

    <?php // echo $form->field($model, 'saraf_kesan_n_xi') ?>

    <?php // echo $form->field($model, 'saraf_kesan_n_xii') ?>

    <?php // echo $form->field($model, 'reflek') ?>

    <?php // echo $form->field($model, 'reflek_fisiologis_patella_kanan') ?>

    <?php // echo $form->field($model, 'reflek_fisiologis_patella_kiri') ?>

    <?php // echo $form->field($model, 'reflek_patologis_kanan') ?>

    <?php // echo $form->field($model, 'reflek_patologis_kiri') ?>

    <?php // echo $form->field($model, 'kulit') ?>

    <?php // echo $form->field($model, 'kulit_kulit') ?>

    <?php // echo $form->field($model, 'kulit_selaput_lendir') ?>

    <?php // echo $form->field($model, 'kulit_kuku') ?>

    <?php // echo $form->field($model, 'kulit_lain') ?>

    <?php // echo $form->field($model, 'kulit_lokasi') ?>

    <?php // echo $form->field($model, 'hasil_pemeriksaan_fisik_khusus') ?>

    <?php // echo $form->field($model, 'hasil_pemeriksaan_fisik_khusus_wawancara_psikiatri') ?>

    <?php // echo $form->field($model, 'hasil_pemeriksaan_fisik_khusus_narkoba_opiat') ?>

    <?php // echo $form->field($model, 'hasil_pemeriksaan_fisik_khusus_narkoba_stimulan') ?>

    <?php // echo $form->field($model, 'hasil_pemeriksaan_fisik_khusus_narkoba_barbiburat') ?>

    <?php // echo $form->field($model, 'resume_kelainan') ?>

    <?php // echo $form->field($model, 'hasil_body_map') ?>

    <?php // echo $form->field($model, 'hasil_brief_survey') ?>

    <?php // echo $form->field($model, 'diagnosis_kerja') ?>

    <?php // echo $form->field($model, 'diagnosis_diferensial') ?>

    <?php // echo $form->field($model, 'kategori_kesehatan') ?>

    <?php // echo $form->field($model, 'id_dokter_pemeriksaan_fisik') ?>

    <?php // echo $form->field($model, 'leher') ?>

    <?php // echo $form->field($model, 'leher_gerakan_leher') ?>

    <?php // echo $form->field($model, 'leher_otot_leher') ?>

    <?php // echo $form->field($model, 'leher_kelenjar_thyroid') ?>

    <?php // echo $form->field($model, 'leher_pulsasi_carotis') ?>

    <?php // echo $form->field($model, 'leher_tekanan_vena_jugularis') ?>

    <?php // echo $form->field($model, 'leher_trachea') ?>

    <?php // echo $form->field($model, 'leher_lainnya') ?>

    <?php // echo $form->field($model, 'is_verified') ?>

    <?php // echo $form->field($model, 'kulit_tato') ?>

    <?php // echo $form->field($model, 'telinga_audiometri_kanan') ?>

    <?php // echo $form->field($model, 'telinga_audiometri_kiri') ?>

    <?php // echo $form->field($model, 'telinga_timpani_kanan') ?>

    <?php // echo $form->field($model, 'telinga_timpani_kiri') ?>

    <?php // echo $form->field($model, 'icdt10') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
