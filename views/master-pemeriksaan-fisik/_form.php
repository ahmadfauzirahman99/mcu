<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MasterPemeriksaanFisik */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="master-pemeriksaan-fisik-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'no_rekam_medik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanda_vital')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanda_vital_nadi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanda_vital_pernapasan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanda_vital_tekanan_darah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanda_vital_suhu_badan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_gizi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_gizi_tinggi_badan')->textInput() ?>

    <?= $form->field($model, 'status_gizi_berat_badan')->textInput() ?>

    <?= $form->field($model, 'status_gizi_lingkaran_perut')->textInput() ?>

    <?= $form->field($model, 'status_gizi_lingkaran_pinggang')->textInput() ?>

    <?= $form->field($model, 'status_gizi_bentuk_badan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_gizi_imt')->textInput() ?>

    <?= $form->field($model, 'tingkat_kesadaran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tingkat_kesadaran_kesadaran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tingkat_kesadaran_kualitas_kontak')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tingkat_kesadaran_tampak_kesakitan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tingkat_kesadaran_gangguan_saat_berjalan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kelenjar_getah_bening')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kelenjar_getah_bening_leher')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kelenjar_getah_bening_sub_mandibula')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kelenjar_getah_bening_ketiak')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kelenjar_getah_bening_inguinal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kepala')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kepala_tulang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kepala_kulit_kepala')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kepala_rambut')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kepala_bentuk_wajah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mata')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mata_persepsi_warna_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mata_persepsi_warna_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mata_kelopak_mata_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mata_kelopak_mata_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mata_konjungtiva_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mata_konjungtiva_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mata_gerak_bola_mata_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mata_gerak_bola_mata_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mata_sklera_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mata_sklera_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mata_lensa_mata_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mata_lensa_mata_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mata_kornea_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mata_kornea_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mata_bulu_mata_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mata_bulu_mata_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mata_tekanan_bola_mata_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mata_tekanan_bola_mata_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mata_penglihatan_3dimensi_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mata_penglihatan_3dimensi_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mata_visus_tanpa_koreksi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mata_visus_dengan_koreksi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telinga')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telinga_daun_telinga_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telinga_daun_telinga_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telinga_liang_telinga_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telinga_liang_telinga_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telinga_serumen_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telinga_serumen_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telinga_test_berbisik_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telinga_test_berbisik_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telinga_tes_garpu_tala_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telinga_tes_garpu_tala_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telinga_weber_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telinga_weber_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telinga_swabach_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telinga_swabach_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telinga_bing_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telinga_bing_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telinga_lainnya')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hidung')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hidung_meatus_nasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hidung_septum_nasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hidung_konka_nasal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hidung_nyeri_ketok_sinus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hidung_penciuman')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mulut')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mulut_bibir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mulut_lidah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mulut_gusi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mulut_lainnya')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gigi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'gigi_missing')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gigi_caries')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gigi_tambahan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gigi_sisa_akar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tenggorokan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tenggorokan_pharynx')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tenggorokan_tonsil_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tenggorokan_tonsil_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tenggorokan_tonsil_ukuran_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tenggorokan_tonsil_ukuran_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tenggorokan_palatum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tenggorokan_lainn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dada')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dada_bentuk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dada_mamae')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dada_tumor_ukuran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dada_tumor_letak')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dada_tumor_konsisten')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dada_lainnya')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paru_jantung_palpasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paru_jantung_perkusi_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paru_jantung_perkusi_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paru_jantung_perkusi_iktus_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paru_jantung_perkusi_iktus_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paru_jantung_perkusi_iktus_kiri_sebut')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paru_jantung_perkusi_batas_jantung_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paru_jantung_perkusi_batas_jantung_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paru_jantung_perkusi_batas_jantung_kiri_sebut')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paru_jantung_auskultasi_bunyi_nafas_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paru_jantung_auskultasi_bunyi_nafas_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paru_jantung_auskultasi_bunyi_nafas_tambah_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paru_jantung_auskultasi_bunyi_nafas_tambah_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paru_jantung_bunyi_jantung')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paru_jantung_bunyi_jantung_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abdomen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abdomen_inspeksi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abdomen_perkusi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abdomen_auskultasi_bising_usus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abdomen_hati')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abdomen_limpa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abdomen_ginjal_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abdomen_ginjal_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abdomen_ballotement_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abdomen_ballotement_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abdomen_nyeri_costo_vertebrae_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abdomen_nyeri_costo_vertebrae_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'genitourinaria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'genitourinaria_kandung_kemih')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'genitourinaria_anus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'genitourinaria_genitalia_eksternal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'genitourinaria_prostat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vertebra')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vertebra_lainnya')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas_simetris')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas_gerakan_abduksi_neer_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas_gerakan_abduksi_neer_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas_gerakan_abduksi_hawkin_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas_gerakan_abduksi_hawkin_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas_gerakan_drop_arm_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas_gerakan_drop_arm_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas_gerakan_yergason_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas_gerakan_yergason_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas_gerakan_speed_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas_gerakan_speed_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas_tulang_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas_tulang_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas_sensibilitas_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas_sensibilitas_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas_oedem_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas_oedem_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas_varises_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas_varises_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas_kekuatan_otot_pin_prick_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas_kekuatan_otot_pin_prick_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas_kekuatan_otot_phallent_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas_kekuatan_otot_phallent_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas_kekuatan_otot_tinnel_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas_kekuatan_otot_tinnel_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas_kekuatan_otot_finskelstein_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas_kekuatan_otot_finskelstein_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas_vaskularisasi_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas_vaskularisasi_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas_kelaianan_kukujari_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_atas_kelaianan_kukujari_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_bawah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_bawah_simetris')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_bawah_laseque_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_bawah_laseque_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_bawah_kernique_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_bawah_kernique_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_bawah_patrick_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_bawah_patrick_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_bawah_contrapatrick_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_bawah_contrapatrick_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_bawah_nyeri_tekanan_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_bawah_nyeri_tekanan_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_bawah_kekuatan_otot_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_bawah_kekuatan_otot_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_bawah_sensibilitas_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_bawah_sensibilitas_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_bawah_oedema_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_bawah_oedema_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_bawah_varises_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_bawah_varises_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_bawah_vaskularisasi_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_bawah_vaskularisasi_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_bawah_kelainan_kuku_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tulang_bawah_kelainan_kuku_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'otot_motorik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'otot_motorik_trofi_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'otot_motorik_trofi_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'otot_motorik_tonus_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'otot_motorik_tonus_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'otot_motorik_gerakan_abnormal_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'otot_motorik_gerakan_abnormal_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fungsi_sensorik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fungsi_sensorik_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fungsi_sensorik_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fungsi_autonom_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fungsi_autonom_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'saraf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'saraf_daya_ingat_segera')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'saraf_daya_ingat_jangka_menengah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'saraf_daya_ingat_jangka_pendek')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'saraf_daya_ingat_jangka_panjang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'saraf_orientasi_waktu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'saraf_orientasi_orang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'saraf_orientasi_tempat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'saraf_kesan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'saraf_kesan_n_i')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'saraf_kesan_n_ii')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'saraf_kesan_n_iii')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'saraf_kesan_n_iv')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'saraf_kesan_n_v')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'saraf_kesan_n_vi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'saraf_kesan_n_vii')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'saraf_kesan_n_viii')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'saraf_kesan_n_ix')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'saraf_kesan_n_x')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'saraf_kesan_n_xi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'saraf_kesan_n_xii')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reflek')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reflek_fisiologis_patella_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reflek_fisiologis_patella_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reflek_patologis_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reflek_patologis_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kulit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kulit_kulit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kulit_selaput_lendir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kulit_kuku')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kulit_lain')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kulit_lokasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hasil_pemeriksaan_fisik_khusus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hasil_pemeriksaan_fisik_khusus_wawancara_psikiatri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hasil_pemeriksaan_fisik_khusus_narkoba_opiat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hasil_pemeriksaan_fisik_khusus_narkoba_stimulan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hasil_pemeriksaan_fisik_khusus_narkoba_barbiburat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'resume_kelainan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'hasil_body_map')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'hasil_brief_survey')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'diagnosis_kerja')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'diagnosis_diferensial')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kategori_kesehatan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_dokter_pemeriksaan_fisik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'leher')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'leher_gerakan_leher')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'leher_otot_leher')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'leher_kelenjar_thyroid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'leher_pulsasi_carotis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'leher_tekanan_vena_jugularis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'leher_trachea')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'leher_lainnya')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_verified')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kulit_tato')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telinga_audiometri_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telinga_audiometri_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telinga_timpani_kanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telinga_timpani_kiri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'icdt10')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
