<?php

namespace app\controllers;

use app\components\Helper;
use app\models\AnamnesaBengkalis;
use app\models\Anamnesis;
use app\models\BahayaPotensial;
use app\models\BodyDiscomfort;
use app\models\DataLayanan;
use app\models\GraddingMcu;
use app\models\JenisPekerjaan;
use app\models\MasterPemeriksaanFisik;
use app\models\McuBrief;
use app\models\PemeriksaanDokterBengkalis;
use app\models\UserKusionerBiodata;
use app\models\UserRegister;
use app\models\PenyakitSimrs;
use app\models\resume\Resume;
use app\models\spesialis\McuPenatalaksanaanMcu;
use app\models\spesialis\McuSpesialisGigi;
use app\models\spesialis\McuSpesialisMata;
use Yii;

class UnitPemeriksaanController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }


    // pemeriksaan
    public function actionUnitPemeriksaan($id = null)
    {


        if ($id != null) {
            $modelDataLayanan = DataLayanan::findOne(['id_data_pelayanan' => $id]);
            if (!$modelDataLayanan) {
                return $this->redirect(['/site/ngga-nemu', 'id' => $id]);
            }
            $anamnesis = Anamnesis::findOne(['nomor_rekam_medik' => $modelDataLayanan->no_rekam_medik]);
            $jenis_pekerjaan = new JenisPekerjaan();
            $master_pemeriksaan_fisik = MasterPemeriksaanFisik::findOne(['no_rekam_medik' => $modelDataLayanan->no_rekam_medik]);
            // var_dump($master_pemeriksaan_fisik);
            // exit();
            $modelBahayaPotensial = new BahayaPotensial();
            $modelBrief = McuBrief::findOne(['no_rekam_medik' => $modelDataLayanan->no_rekam_medik]);

            $modelAnamnesaBengkalis = AnamnesaBengkalis::findOne(['no_rekam_medik' => $modelDataLayanan->no_rekam_medik]);
            $modelPemeriksaanBengkalis = PemeriksaanDokterBengkalis::findOne(['no_rekam_medik' => $modelDataLayanan->no_rekam_medik]);
            if (!$anamnesis) {
                $anamnesis = new Anamnesis();
            }

            if (!$master_pemeriksaan_fisik) {
                $master_pemeriksaan_fisik = new MasterPemeriksaanFisik();
            }

            if (!$modelBrief) {
                $modelBrief = new McuBrief();
            }

            if (!$modelAnamnesaBengkalis) {
                $modelAnamnesaBengkalis =  new AnamnesaBengkalis();
            }

            if (!$modelPemeriksaanBengkalis) {
                $modelPemeriksaanBengkalis = new PemeriksaanDokterBengkalis();
            }

            $penata = McuPenatalaksanaanMcu::findOne(['no_rekam_medik' => $modelDataLayanan->no_rekam_medik]);
            if (!$penata) {
                $penata = new McuPenatalaksanaanMcu();
            }


            $dataGradding = GraddingMcu::findOne(['no_rekam_medik' => $modelDataLayanan->no_rekam_medik]);

            if (!$dataGradding) {
                $dataGradding = new GraddingMcu();
                $hasil_mcu_mata = null;
                $hasil_mcu_gigi = null;
                $hasil_lab = null;
            } else {
                $hasil_mcu_mata = json_decode($dataGradding->hasil);
                $hasil_mcu_gigi = json_decode($dataGradding->hasil);
                $hasil_lab = json_decode($dataGradding->hasil);
            }

            $modelMata = McuSpesialisMata::findOne(['no_rekam_medik' => $modelDataLayanan->no_rekam_medik]);
            if (!$modelMata) {
                $modelMata = new McuSpesialisMata();
            }
            $modelGigi = McuSpesialisGigi::findOne(['no_rekam_medik' => $modelDataLayanan->no_rekam_medik]);
            if ($modelGigi) {
                $modelGigi = new McuSpesialisGigi();
            }
            // $anamnesis = new Anamnesis();

        } else {
            $modelMata = new McuSpesialisMata();
            $modelGigi = new McuSpesialisGigi();
            $dataGradding = new GraddingMcu();
            $anamnesis = new Anamnesis();
            $modelDataLayanan = new DataLayanan();
            $jenis_pekerjaan = new JenisPekerjaan();
            $master_pemeriksaan_fisik = new MasterPemeriksaanFisik();
            $modelBahayaPotensial = new BahayaPotensial();
            $modelBrief = new McuBrief();
            $modelAnamnesaBengkalis = new AnamnesaBengkalis();
            $modelPemeriksaanBengkalis = new PemeriksaanDokterBengkalis();
            $penata = new McuPenatalaksanaanMcu();
            $hasil_mcu_mata = null;
            $hasil_mcu_gigi = null;
            $hasil_lab = null;
        }


        if ($modelPemeriksaanBengkalis->isNewRecord) {
            $modelPemeriksaanBengkalis->kecerdasan = "Cukup";
            $modelPemeriksaanBengkalis->sehat = "SEHAT";
            $modelPemeriksaanBengkalis->keliatan_muda = "BIASA";
            $modelPemeriksaanBengkalis->tegap = "BIASA";
        }
        if ($master_pemeriksaan_fisik->isNewRecord) {
            $master_pemeriksaan_fisik->tingkat_kesadaran_kesadaran = "Compos Mentis";
            $master_pemeriksaan_fisik->tingkat_kesadaran_kualitas_kontak = "Baik";
            $master_pemeriksaan_fisik->tingkat_kesadaran_tampak_kesakitan = "Tidak Tampak Kesakitan";
            $master_pemeriksaan_fisik->tingkat_kesadaran_gangguan_saat_berjalan = "Tidak";
            $master_pemeriksaan_fisik->kelenjar_getah_bening_leher = "Normal";
            $master_pemeriksaan_fisik->kelenjar_getah_bening_sub_mandibula = "Normal";
            $master_pemeriksaan_fisik->kelenjar_getah_bening_ketiak = "Normal";
            $master_pemeriksaan_fisik->kelenjar_getah_bening_inguinal = "Normal";
            $master_pemeriksaan_fisik->kepala_tulang = "Baik";
            $master_pemeriksaan_fisik->kepala_kulit_kepala = "Baik";
            $master_pemeriksaan_fisik->kepala_rambut = "Baik";
            $master_pemeriksaan_fisik->kepala_bentuk_wajah = "Baik";
            $master_pemeriksaan_fisik->mata_persepsi_warna_kanan = "Normal";
            $master_pemeriksaan_fisik->mata_persepsi_warna_kiri = "Normal";
            $master_pemeriksaan_fisik->mata_kelopak_mata_kanan = "Normal";
            $master_pemeriksaan_fisik->mata_kelopak_mata_kiri = "Normal";
            $master_pemeriksaan_fisik->mata_konjungtiva_kanan = "Normal";
            $master_pemeriksaan_fisik->mata_konjungtiva_kiri = "Normal";
            $master_pemeriksaan_fisik->mata_gerak_bola_mata_kanan = "Normal";
            $master_pemeriksaan_fisik->mata_gerak_bola_mata_kiri = "Normal";
            $master_pemeriksaan_fisik->mata_sklera_kanan = "Normal";
            $master_pemeriksaan_fisik->mata_sklera_kiri = "Normal";
            $master_pemeriksaan_fisik->mata_lensa_mata_kanan = "Normal";
            $master_pemeriksaan_fisik->mata_lensa_mata_kiri = "Tidak Keruh";
            $master_pemeriksaan_fisik->mata_kornea_kanan = "Normal";
            $master_pemeriksaan_fisik->mata_kornea_kiri = "Normal";
            $master_pemeriksaan_fisik->mata_bulu_mata_kanan = "Normal";
            $master_pemeriksaan_fisik->mata_bulu_mata_kiri = "Normal";
            $master_pemeriksaan_fisik->mata_tekanan_bola_mata_kanan = "Normal";
            $master_pemeriksaan_fisik->mata_tekanan_bola_mata_kiri = "Normal";
            $master_pemeriksaan_fisik->mata_penglihatan_3dimensi_kanan = "Normal";
            $master_pemeriksaan_fisik->mata_penglihatan_3dimensi_kanan = "Normal";
            $master_pemeriksaan_fisik->mata_penglihatan_3dimensi_kiri = "Normal";
            $master_pemeriksaan_fisik->telinga_daun_telinga_kanan = "Normal";
            $master_pemeriksaan_fisik->telinga_daun_telinga_kiri = "Normal";
            $master_pemeriksaan_fisik->telinga_liang_telinga_kanan = "Normal";
            $master_pemeriksaan_fisik->telinga_liang_telinga_kiri = "Normal";
            $master_pemeriksaan_fisik->telinga_serumen_kanan = "Tidak Ada";
            $master_pemeriksaan_fisik->telinga_serumen_kiri = "Tidak Ada";
            $master_pemeriksaan_fisik->telinga_timpani_kanan = "Intak";
            $master_pemeriksaan_fisik->telinga_timpani_kiri = "Intak";
            $master_pemeriksaan_fisik->hidung_meatus_nasi = "Normal";
            $master_pemeriksaan_fisik->hidung_septum_nasi = "Normal";
            $master_pemeriksaan_fisik->hidung_konka_nasal = "Normal";
            $master_pemeriksaan_fisik->hidung_nyeri_ketok_sinus = "Normal";
            $master_pemeriksaan_fisik->hidung_penciuman = "Normal";
            $master_pemeriksaan_fisik->mulut_bibir = "Normal";
            $master_pemeriksaan_fisik->mulut_lidah = "Normal";
            $master_pemeriksaan_fisik->mulut_gusi = "Normal";
            $master_pemeriksaan_fisik->mulut_lainnya = "Normal";
            $master_pemeriksaan_fisik->tenggorokan = "Normal";
            $master_pemeriksaan_fisik->tenggorokan_pharynx = "Normal";
            $master_pemeriksaan_fisik->tenggorokan_tonsil_kanan = "TO";
            $master_pemeriksaan_fisik->tenggorokan_tonsil_kiri = "TO";
            $master_pemeriksaan_fisik->tenggorokan_tonsil_ukuran_kanan = "Normal";
            $master_pemeriksaan_fisik->tenggorokan_tonsil_ukuran_kiri = "Normal";
            $master_pemeriksaan_fisik->tenggorokan_palatum = "Normal";
            $master_pemeriksaan_fisik->leher_gerakan_leher = "Normal";
            $master_pemeriksaan_fisik->leher_otot_leher = "Normal";
            $master_pemeriksaan_fisik->leher_kelenjar_thyroid = "Normal";
            $master_pemeriksaan_fisik->leher_pulsasi_carotis = "Normal";
            $master_pemeriksaan_fisik->leher_tekanan_vena_jugularis = "Normal";
            $master_pemeriksaan_fisik->leher_trachea = "Normal";
            $master_pemeriksaan_fisik->dada_bentuk = "Simetris";
            $master_pemeriksaan_fisik->dada = "Normal";
            $master_pemeriksaan_fisik->dada_mamae = "Normal";
            $master_pemeriksaan_fisik->paru_jantung_palpasi = "Normal";
            $master_pemeriksaan_fisik->paru_jantung_perkusi_iktus_kanan = "Normal";
            $master_pemeriksaan_fisik->paru_jantung_perkusi_kiri = "Sonor";
            $master_pemeriksaan_fisik->paru_jantung_perkusi_kanan = "Sonor";
            $master_pemeriksaan_fisik->paru_jantung_perkusi_iktus_kanan = "Normal";
            $master_pemeriksaan_fisik->paru_jantung_perkusi_batas_jantung_kanan = "Normal";
            $master_pemeriksaan_fisik->paru_jantung_auskultasi_bunyi_nafas_kanan = "Vesikuler";
            $master_pemeriksaan_fisik->paru_jantung_auskultasi_bunyi_nafas_kiri = "Vesikuler";
            $master_pemeriksaan_fisik->paru_jantung_auskultasi_bunyi_nafas_tambah_kanan = "Tak Ada";
            $master_pemeriksaan_fisik->paru_jantung_auskultasi_bunyi_nafas_tambah_kiri = "Tak Ada";
            $master_pemeriksaan_fisik->paru_jantung_bunyi_jantung = "Normal";
            $master_pemeriksaan_fisik->abdomen = "Supel";
            $master_pemeriksaan_fisik->abdomen_perkusi = "Timpani";
            $master_pemeriksaan_fisik->abdomen_auskultasi_bising_usus = "Normal";
            $master_pemeriksaan_fisik->abdomen_hati = "Tidak Teraba";
            $master_pemeriksaan_fisik->abdomen_limpa = "Tidak Teraba Schuffner";
            $master_pemeriksaan_fisik->abdomen_ginjal_kanan = "Normal";
            $master_pemeriksaan_fisik->abdomen_ginjal_kiri = "Normal";
            $master_pemeriksaan_fisik->abdomen_ballotement_kanan = "Normal";
            $master_pemeriksaan_fisik->abdomen_ballotement_kiri = "Normal";
            $master_pemeriksaan_fisik->abdomen_nyeri_costo_vertebrae_kanan = "Normal";
            $master_pemeriksaan_fisik->abdomen_nyeri_costo_vertebrae_kiri = "Normal";
            $master_pemeriksaan_fisik->genitourinaria_kandung_kemih = "Normal";
            $master_pemeriksaan_fisik->genitourinaria_anus = "Normal";
            $master_pemeriksaan_fisik->genitourinaria_genitalia_eksternal = "Normal";
            $master_pemeriksaan_fisik->genitourinaria_prostat = "Teraba";
            $master_pemeriksaan_fisik->vertebra = "Normal";
            $master_pemeriksaan_fisik->tulang_atas_gerakan_abduksi_neer_kanan = "Normal";
            $master_pemeriksaan_fisik->tulang_atas_gerakan_abduksi_hawkin_kanan = "Normal";
            $master_pemeriksaan_fisik->tulang_atas_gerakan_drop_arm_kanan = "Normal";
            $master_pemeriksaan_fisik->tulang_atas_gerakan_yergason_kanan = "Normal";
            $master_pemeriksaan_fisik->tulang_atas_gerakan_speed_kanan = "Normal";
            $master_pemeriksaan_fisik->tulang_atas_tulang_kanan = "Normal";
            $master_pemeriksaan_fisik->tulang_atas_sensibilitas_kanan = "Normal";
            $master_pemeriksaan_fisik->tulang_atas_oedem_kanan = "Tidak Ada";
            $master_pemeriksaan_fisik->tulang_atas_varises_kanan = "Tidak Ada";
            $master_pemeriksaan_fisik->tulang_atas_kekuatan_otot_pin_prick_kanan = "Normal";
            $master_pemeriksaan_fisik->tulang_atas_kekuatan_otot_phallent_kanan = "Normal";
            $master_pemeriksaan_fisik->tulang_atas_kekuatan_otot_tinnel_kanan = "Normal";
            $master_pemeriksaan_fisik->tulang_atas_kekuatan_otot_finskelstein_kanan = "Normal";
            $master_pemeriksaan_fisik->tulang_atas_kelaianan_kukujari_kanan = "Tidak Ada";
            $master_pemeriksaan_fisik->tulang_atas_sensibilitas_kanan = "Baik";

            $master_pemeriksaan_fisik->tulang_atas_sensibilitas_kiri = "Baik";

            $master_pemeriksaan_fisik->tulang_atas_gerakan_abduksi_neer_kiri = "Normal";
            $master_pemeriksaan_fisik->tulang_atas_gerakan_abduksi_hawkin_kiri = "Normal";
            $master_pemeriksaan_fisik->tulang_atas_gerakan_drop_arm_kiri = "Normal";
            $master_pemeriksaan_fisik->tulang_atas_gerakan_yergason_kiri = "Normal";
            $master_pemeriksaan_fisik->tulang_atas_gerakan_speed_kiri = "Normal";
            $master_pemeriksaan_fisik->tulang_atas_tulang_kiri = "Normal";
            $master_pemeriksaan_fisik->tulang_atas_oedem_kiri = "Tidak Ada";
            $master_pemeriksaan_fisik->tulang_atas_varises_kiri = "Tidak Ada";
            $master_pemeriksaan_fisik->tulang_atas_kekuatan_otot_pin_prick_kiri = "Normal";
            $master_pemeriksaan_fisik->tulang_atas_kekuatan_otot_phallent_kiri = "Normal";
            $master_pemeriksaan_fisik->tulang_atas_kekuatan_otot_tinnel_kiri = "Normal";
            $master_pemeriksaan_fisik->tulang_atas_kekuatan_otot_finskelstein_kiri = "Normal";
            $master_pemeriksaan_fisik->tulang_atas_kelaianan_kukujari_kiri = "Tidak Ada";

            $master_pemeriksaan_fisik->tulang_bawah_laseque_kanan = "Normal";
            $master_pemeriksaan_fisik->tulang_bawah_kernique_kanan = "Normal";
            $master_pemeriksaan_fisik->tulang_bawah_patrick_kanan = "Normal";
            $master_pemeriksaan_fisik->tulang_bawah_contrapatrick_kanan = "Normal";
            $master_pemeriksaan_fisik->tulang_bawah_nyeri_tekanan_kanan = "Tidak Ada";
            $master_pemeriksaan_fisik->tulang_bawah_kekuatan_otot_kanan = "Normal";
            $master_pemeriksaan_fisik->tulang_bawah_sensibilitas_kanan = "Baik";
            $master_pemeriksaan_fisik->tulang_bawah_oedema_kanan = "Tidak Ada";
            $master_pemeriksaan_fisik->tulang_bawah_kelainan_kuku_kanan = "Tidak Ada";

            $master_pemeriksaan_fisik->tulang_bawah_laseque_kiri = "Normal";
            $master_pemeriksaan_fisik->tulang_bawah_kernique_kiri = "Normal";
            $master_pemeriksaan_fisik->tulang_bawah_patrick_kiri = "Normal";
            $master_pemeriksaan_fisik->tulang_bawah_contrapatrick_kiri = "Normal";
            $master_pemeriksaan_fisik->tulang_bawah_nyeri_tekanan_kiri = "Tidak Ada";
            $master_pemeriksaan_fisik->tulang_bawah_kekuatan_otot_kiri = "Normal";
            $master_pemeriksaan_fisik->tulang_bawah_sensibilitas_kiri = "Baik";
            $master_pemeriksaan_fisik->tulang_bawah_oedema_kiri = "Tidak Ada";
            $master_pemeriksaan_fisik->tulang_bawah_vaskularisasi_kiri = "Baik";
            $master_pemeriksaan_fisik->tulang_bawah_kelainan_kuku_kiri = "Tidak Ada";
            $master_pemeriksaan_fisik->mata_visus_tanpa_koreksi = "VOD: 20/20";
            $master_pemeriksaan_fisik->mata_visus_tanpa_koreksi_kiri = "VOS: 20/20";

            $master_pemeriksaan_fisik->otot_motorik_trofi_kanan = "Normal";
            $master_pemeriksaan_fisik->otot_motorik_tonus_kanan = "Normal";
            $master_pemeriksaan_fisik->otot_motorik_gerakan_abnormal_kanan = "Tidak Ada";
            $master_pemeriksaan_fisik->otot_motorik_trofi_kiri = "Normal";
            $master_pemeriksaan_fisik->otot_motorik_tonus_kiri = "Normal";
            $master_pemeriksaan_fisik->otot_motorik_gerakan_abnormal_kiri = "Tidak Ada";

            $master_pemeriksaan_fisik->fungsi_sensorik_kanan = "Normal";
            $master_pemeriksaan_fisik->fungsi_autonom_kanan = "Normal";
            $master_pemeriksaan_fisik->fungsi_sensorik_kiri = "Normal";
            $master_pemeriksaan_fisik->fungsi_autonom_kiri = "Normal";

            $master_pemeriksaan_fisik->saraf_daya_ingat_segera = "Baik";
            $master_pemeriksaan_fisik->saraf_daya_ingat_jangka_menengah = "Baik";
            $master_pemeriksaan_fisik->saraf_daya_ingat_jangka_pendek = "Baik";
            $master_pemeriksaan_fisik->saraf_daya_ingat_jangka_panjang = "Baik";
            $master_pemeriksaan_fisik->saraf_orientasi_waktu = "Baik";
            $master_pemeriksaan_fisik->saraf_orientasi_orang = "Baik";
            $master_pemeriksaan_fisik->saraf_orientasi_tempat = "Baik";
            $master_pemeriksaan_fisik->saraf_kesan = "Baik";
            $master_pemeriksaan_fisik->saraf_kesan_n_i = "Baik";
            $master_pemeriksaan_fisik->saraf_kesan_n_ii = "Baik";
            $master_pemeriksaan_fisik->saraf_kesan_n_iii = "Baik";
            $master_pemeriksaan_fisik->saraf_kesan_n_iv = "Baik";
            $master_pemeriksaan_fisik->saraf_kesan_n_v = "Baik";
            $master_pemeriksaan_fisik->saraf_kesan_n_vi = "Baik";
            $master_pemeriksaan_fisik->saraf_kesan_n_vii = "Baik";
            $master_pemeriksaan_fisik->saraf_kesan_n_viii = "Baik";
            $master_pemeriksaan_fisik->saraf_kesan_n_viii = "Baik";
            $master_pemeriksaan_fisik->saraf_kesan_n_ix = "Baik";
            $master_pemeriksaan_fisik->saraf_kesan_n_x = "Baik";
            $master_pemeriksaan_fisik->saraf_kesan_n_xi = "Baik";
            $master_pemeriksaan_fisik->saraf_kesan_n_xii = "Baik";
            $master_pemeriksaan_fisik->reflek_fisiologis_patella_kanan = "Normal";
            $master_pemeriksaan_fisik->reflek_patologis_kanan = "Negative";
            $master_pemeriksaan_fisik->reflek_fisiologis_patella_kiri = "Normal";
            $master_pemeriksaan_fisik->reflek_patologis_kiri = "Negative";
            $master_pemeriksaan_fisik->kulit_kulit = "Normal";
            $master_pemeriksaan_fisik->kulit_selaput_lendir = "Normal";
            $master_pemeriksaan_fisik->kulit_kuku = "Normal";
            $master_pemeriksaan_fisik->kulit_tato = "Tidak Ada";
            $master_pemeriksaan_fisik->kategori_kesehatan = "FIT";
            $master_pemeriksaan_fisik->abdomen_ballotement_kanan = "Tidak Ada";
            $master_pemeriksaan_fisik->abdomen_ballotement_kiri = "Tidak Ada";
            $master_pemeriksaan_fisik->abdomen_nyeri_costo_vertebrae_kanan = "Tidak Ada";
            $master_pemeriksaan_fisik->abdomen_nyeri_costo_vertebrae_kiri = "Tidak Ada";
            $master_pemeriksaan_fisik->tulang_atas_vaskularisasi_kanan = "Baik";
            $master_pemeriksaan_fisik->tulang_atas_vaskularisasi_kiri = "Baik";
            $master_pemeriksaan_fisik->mata_lensa_mata_kanan = "Tidak Keruh";
            $master_pemeriksaan_fisik->mata_lensa_mata_kiri = "Tidak Keruh";
            $master_pemeriksaan_fisik->paru_jantung_perkusi_iktus_kiri = "Normal";

            $master_pemeriksaan_fisik->tulang_atas_simetris = "Tidak Ada";
            $master_pemeriksaan_fisik->tulang_bawah_simetris = "Tidak Ada";
        }
        $master_pemeriksaan_fisik->tulang_atas_simetris = "Ya";
        $master_pemeriksaan_fisik->tulang_bawah_simetris = "Ya";


        return $this->render('unit-pemeriksaan', [
            'dataLayanan' => $modelDataLayanan,
            'anamnesis' => $anamnesis,
            'jenis_pekerjaan' => $jenis_pekerjaan,
            'hasil_mcu_mata' => $hasil_mcu_mata,
            'hasil_mcu_gigi' => $hasil_mcu_gigi,
            'modelMata' => $modelMata,
            'modelGigi' => $modelGigi,
            'hasil_lab' => $hasil_lab,
            'master_pemeriksaan_fisik' => $master_pemeriksaan_fisik,
            'modelBahayaPotensial' => $modelBahayaPotensial,
            'modelBrief' => $modelBrief,
            'modelAnamnesaBengkalis' => $modelAnamnesaBengkalis,
            'modelPemeriksaanBengkalis' => $modelPemeriksaanBengkalis,
            'penata' => $penata
        ]);
    }

    public function actionGetDataPelayanan($q = null, $id =  null)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];

        if (!is_null($q)) {
            $dataPelayanan = DataLayanan::find()->select(["no_rekam_medik as id", "concat(nama,' ',no_rekam_medik) as text"])
                // ->where(['ilike', 'no_rekam_medik', $q . '%', false])
                ->Where(['ilike', 'nama', $q . '%', false])
                ->orderBy('nama ASC')
                ->asArray()
                ->all();
            $out['results'] = array_values($dataPelayanan);
        } else if ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => DataLayanan::find($id)->no_rekam_medik];
        }
        return $out;
    }


    //save anamnesis 
    public function actionSaveAnamnesis()
    {
        $p = Yii::$app->request->post();
        $no_rekam_medik = $p['Anamnesis']['nomor_rekam_medik'];
        $anamnesis = Anamnesis::findOne(['nomor_rekam_medik' => $no_rekam_medik]);


        if ($anamnesis != null) {
            if ($anamnesis->load(Yii::$app->request->post())) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;


                if ($anamnesis->save(false)) {
                    return [
                        's' => true,
                        'e' => null
                    ];
                } else {
                    return [
                        's' => false,
                        'e' => $anamnesis->errors
                    ];
                }
            }
        }

        $model = new Anamnesis();
        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            if ($model->save()) {
                return [
                    's' => true,
                    'e' => null
                ];
            } else {
                return [
                    's' => false,
                    'e' => $model->errors
                ];
            }
        }
    }

    //save anamensis okupasis bagian pekerjaan
    public function actionSaveAnamnesisOkupasi()
    {
        $model = new JenisPekerjaan();
        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            if ($model->save()) {
                return [
                    's' => true,
                    'e' => null
                ];
            } else {
                return [
                    's' => false,
                    'e' => $model->errors
                ];
            }
        }
    }


    //save anamensis okupasis bagian pekerjaan
    public function actionSaveBahayaPotensial()
    {
        $p = Yii::$app->request->post();
        $model = new BahayaPotensial();
        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            if ($model->save()) {
                return [
                    's' => true,
                    'e' => null
                ];
            } else {
                return [
                    's' => false,
                    'e' => $model->errors
                ];
            }
        }
    }

    //save anamnesis brief survey
    public function actionSaveBrief()
    {
        $p = Yii::$app->request->post();
        $no_rekam_medik = $p['McuBrief']['no_rekam_medik'];
        $brief = McuBrief::findOne(['no_rekam_medik' => $no_rekam_medik]);


        if ($brief != null) {
            if ($brief->load(Yii::$app->request->post())) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                if ($brief->save()) {
                    return [
                        's' => true,
                        'e' => null
                    ];
                } else {
                    return [
                        's' => false,
                        'e' => $brief->errors
                    ];
                }
            }
        }

        $model = new McuBrief();
        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            if ($model->save()) {
                return [
                    's' => true,
                    'e' => null
                ];
            } else {
                return [
                    's' => false,
                    'e' => $model->errors
                ];
            }
        }
    }

    //save anamnesis brief survey
    public function actionSavePemeriksaanFisik()
    {

        $rm = Helper::getRumpun();
        $p = Yii::$app->request->post();
        $no_rekam_medik = $p['MasterPemeriksaanFisik']['no_rekam_medik'];
        $modelDataLayanan = DataLayanan::findOne(['no_rekam_medik' => $no_rekam_medik]);

        $master_pemeriksaan_fisik = MasterPemeriksaanFisik::findOne(['no_rekam_medik' => $no_rekam_medik]);

        if ($master_pemeriksaan_fisik != null) {
            if ($master_pemeriksaan_fisik->load(Yii::$app->request->post())) {


                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                if ($rm['kodejenis'] == 1) {
                    $master_pemeriksaan_fisik->id_dokter_pemeriksaan_fisik = (string)Yii::$app->user->identity->id;
                }
                if ($rm['kodejenis'] == 20) {
                    $master_pemeriksaan_fisik->id_dokter_fit_for_work = (string)Yii::$app->user->identity->id;
                    $IDCT10 = $p['MasterPemeriksaanFisik']['icdt10'];
                    if ($IDCT10 ==  null) {
                        $IDCT10 = $master_pemeriksaan_fisik->icdt10;
                    } else {
                        $IDCT10 = implode(", ", $IDCT10);
                    }
                    // var_dump($IDCT10);
                    // exit();
                    $d = $p['MasterPemeriksaanFisik']['diagnosis_kerja'];
                    $master_pemeriksaan_fisik->diagnosis_kerja = $d;
                    $master_pemeriksaan_fisik->icdt10 = $IDCT10;
                }

                $master_pemeriksaan_fisik->no_daftar = $modelDataLayanan->no_registrasi;

                if ($master_pemeriksaan_fisik->save()) {
                    $cekTidakNormal = Resume::cekNormal('FISIK', $master_pemeriksaan_fisik->attributes);
                    if ($cekTidakNormal['s']) {
                        return [
                            's' => true,
                            'e' => null
                        ];
                    } else {
                        return [
                            's' => false,
                            'e' => $cekTidakNormal['e']
                        ];
                    }
                } else {
                    return [
                        's' => false,
                        'e' => $master_pemeriksaan_fisik->errors
                    ];
                }
            }
        }

        // $model = new MasterPemeriksaanFisik();

        // if ($model->load(Yii::$app->request->post())) {
        //     Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        //     $model->id_dokter_pemeriksaan_fisik = (string)Yii::$app->user->identity->id;
        //     if ($rm['kodejenis'] == 1) {
        //         $model->id_dokter_pemeriksaan_fisik = (string)Yii::$app->user->identity->id;
        //     }
        //     if ($rm['kodejenis'] == 20) {
        //         $model->id_dokter_fit_for_work = (string)Yii::$app->user->identity->id;
        //         $IDCT10 = $p['MasterPemeriksaanFisik']['icdt10'];
        //         if ($IDCT10 ==  null) {
        //             $IDCT10 = $model->icdt10;
        //         } else {
        //             $IDCT10 = implode(", ", $IDCT10);
        //         }
        //         // var_dump($IDCT10);
        //         // exit();
        //         $d = $p['MasterPemeriksaanFisik']['diagnosis_kerja'];
        //         $model->diagnosis_kerja = $d;
        //         $model->icdt10 = $IDCT10;
        //     }

        //     $model->no_daftar = $modelDataLayanan->no_registrasi;
        //     $model->tingkat_kesadaran_kesadaran = "Compos Mentis";

        //     $model->tulang_atas_simetris = "Ya";
        //     $model->tulang_bawah_simetris = "Ya";
        //     $model->tingkat_kesadaran_kualitas_kontak = "Baik";
        //     $model->tingkat_kesadaran_tampak_kesakitan = "Tidak Tampak Kesakitan";
        //     $model->tingkat_kesadaran_gangguan_saat_berjalan = "Tidak";
        //     $model->kelenjar_getah_bening_leher = "Normal";
        //     $model->kelenjar_getah_bening_sub_mandibula = "Normal";
        //     $model->kelenjar_getah_bening_ketiak = "Normal";
        //     $model->kelenjar_getah_bening_inguinal = "Normal";
        //     $model->kepala_tulang = "Baik";
        //     $model->kepala_kulit_kepala = "Baik";
        //     $model->kepala_rambut = "Baik";
        //     $model->kepala_bentuk_wajah = "Baik";
        //     $model->mata_persepsi_warna_kanan = "Normal";
        //     $model->mata_persepsi_warna_kiri = "Normal";
        //     $model->mata_kelopak_mata_kanan = "Normal";
        //     $model->mata_kelopak_mata_kiri = "Normal";
        //     $model->mata_konjungtiva_kanan = "Normal";
        //     $model->mata_konjungtiva_kiri = "Normal";
        //     $model->mata_gerak_bola_mata_kanan = "Normal";
        //     $model->mata_gerak_bola_mata_kiri = "Normal";
        //     $model->mata_sklera_kanan = "Normal";
        //     $model->mata_sklera_kiri = "Normal";
        //     $model->mata_lensa_mata_kanan = "Tidak Keruh";
        //     $model->mata_lensa_mata_kiri = "Tidak Keruh";
        //     $model->mata_kornea_kanan = "Normal";
        //     $model->mata_kornea_kiri = "Normal";
        //     $model->mata_bulu_mata_kanan = "Normal";
        //     $model->mata_bulu_mata_kiri = "Normal";
        //     $model->mata_tekanan_bola_mata_kanan = "Normal";
        //     $model->mata_tekanan_bola_mata_kiri = "Normal";
        //     $model->mata_penglihatan_3dimensi_kanan = "Normal";
        //     $model->mata_penglihatan_3dimensi_kanan = "Normal";
        //     $model->mata_penglihatan_3dimensi_kiri = "Normal";
        //     $model->telinga_daun_telinga_kanan = "Normal";
        //     $model->telinga_daun_telinga_kiri = "Normal";
        //     $model->telinga_liang_telinga_kanan = "Normal";
        //     $model->telinga_liang_telinga_kiri = "Normal";
        //     $model->telinga_serumen_kanan = "Tidak Ada";
        //     $model->telinga_serumen_kiri = "Tidak Ada";
        //     $model->telinga_timpani_kanan = "Intak";
        //     $model->telinga_timpani_kiri = "Intak";
        //     $model->hidung_meatus_nasi = "Normal";
        //     $model->hidung_septum_nasi = "Normal";
        //     $model->hidung_konka_nasal = "Normal";
        //     $model->hidung_nyeri_ketok_sinus = "Normal";
        //     $model->hidung_penciuman = "Normal";
        //     $model->mulut_bibir = "Normal";
        //     $model->mulut_lidah = "Normal";
        //     $model->mulut_gusi = "Normal";
        //     $model->mulut_lainnya = "Normal";
        //     $model->tenggorokan = "Normal";
        //     $model->tenggorokan_pharynx = "Normal";
        //     $model->tenggorokan_tonsil_kanan = "TO";
        //     $model->tenggorokan_tonsil_kiri = "TO";
        //     $model->tenggorokan_tonsil_ukuran_kanan = "Normal";
        //     $model->tenggorokan_tonsil_ukuran_kiri = "Normal";
        //     $model->tenggorokan_palatum = "Normal";
        //     $model->leher_gerakan_leher = "Normal";
        //     $model->leher_otot_leher = "Normal";
        //     $model->leher_kelenjar_thyroid = "Normal";
        //     $model->leher_pulsasi_carotis = "Normal";
        //     $model->leher_tekanan_vena_jugularis = "Normal";
        //     $model->leher_trachea = "Normal";
        //     $model->dada_bentuk = "Simetris";
        //     $model->dada = "Normal";
        //     $model->dada_mamae = "Normal";
        //     $model->paru_jantung_palpasi = "Normal";
        //     $model->paru_jantung_perkusi_iktus_kanan = "Normal";
        //     $model->paru_jantung_perkusi_kiri = "Sonor";
        //     $model->paru_jantung_perkusi_iktus_kanan = "Normal";
        //     $model->paru_jantung_perkusi_batas_jantung_kanan = "Normal";
        //     $model->paru_jantung_auskultasi_bunyi_nafas_kanan = "Vesikuler";
        //     $model->paru_jantung_auskultasi_bunyi_nafas_kiri = "Vesikuler";
        //     $model->paru_jantung_auskultasi_bunyi_nafas_tambah_kanan = "Tak Ada";
        //     $model->paru_jantung_auskultasi_bunyi_nafas_tambah_kiri = "Tak Ada";
        //     $model->paru_jantung_bunyi_jantung = "Normal";
        //     $model->abdomen = "Supel";
        //     $model->abdomen_perkusi = "Timpani";
        //     $model->abdomen_auskultasi_bising_usus = "Normal";
        //     $model->abdomen_hati = "Tidak Teraba";
        //     $model->abdomen_limpa = "Tidak Teraba Schuffner";
        //     $model->abdomen_ginjal_kanan = "Normal";
        //     $model->abdomen_ginjal_kiri = "Normal";
        //     $model->abdomen_ballotement_kanan = "Normal";
        //     $model->abdomen_ballotement_kiri = "Normal";
        //     $model->abdomen_nyeri_costo_vertebrae_kanan = "Normal";
        //     $model->abdomen_nyeri_costo_vertebrae_kiri = "Normal";
        //     // $model->genitourinaria_kandung_kemih = "Normal";
        //     // $model->genitourinaria_anus = "Normal";
        //     // $model->genitourinaria_genitalia_eksternal = "Normal";
        //     // $model->genitourinaria_prostat = "Teraba";
        //     $model->vertebra = "Normal";
        //     $model->tulang_atas_gerakan_abduksi_neer_kanan = "Normal";
        //     $model->tulang_atas_gerakan_abduksi_hawkin_kanan = "Normal";
        //     $model->tulang_atas_gerakan_drop_arm_kanan = "Normal";
        //     $model->tulang_atas_gerakan_yergason_kanan = "Normal";
        //     $model->tulang_atas_gerakan_speed_kanan = "Normal";
        //     $model->tulang_atas_tulang_kanan = "Normal";
        //     $model->tulang_atas_sensibilitas_kanan = "Normal";
        //     $model->tulang_atas_oedem_kanan = "Tidak Ada";
        //     $model->tulang_atas_varises_kanan = "Tidak Ada";
        //     $model->tulang_atas_kekuatan_otot_pin_prick_kanan = "Normal";
        //     $model->tulang_atas_kekuatan_otot_phallent_kanan = "Normal";
        //     $model->tulang_atas_kekuatan_otot_tinnel_kanan = "Normal";
        //     $model->tulang_atas_kekuatan_otot_finskelstein_kanan = "Normal";
        //     $model->tulang_atas_kelaianan_kukujari_kanan = "Tidak Ada";
        //     $model->tulang_atas_sensibilitas_kanan = "Baik";

        //     $model->tulang_atas_sensibilitas_kiri = "Baik";

        //     $model->tulang_atas_gerakan_abduksi_neer_kiri = "Normal";
        //     $model->tulang_atas_gerakan_abduksi_hawkin_kiri = "Normal";
        //     $model->tulang_atas_gerakan_drop_arm_kiri = "Normal";
        //     $model->tulang_atas_gerakan_yergason_kiri = "Normal";
        //     $model->tulang_atas_gerakan_speed_kiri = "Normal";
        //     $model->tulang_atas_tulang_kiri = "Normal";
        //     $model->tulang_atas_oedem_kiri = "Tidak Ada";
        //     $model->tulang_atas_varises_kiri = "Tidak Ada";
        //     $model->tulang_atas_kekuatan_otot_pin_prick_kiri = "Normal";
        //     $model->tulang_atas_kekuatan_otot_phallent_kiri = "Normal";
        //     $model->tulang_atas_kekuatan_otot_tinnel_kiri = "Normal";
        //     $model->tulang_atas_kekuatan_otot_finskelstein_kiri = "Normal";
        //     $model->tulang_atas_kelaianan_kukujari_kiri = "Tidak Ada";

        //     $model->tulang_bawah_laseque_kanan = "Normal";
        //     $model->tulang_bawah_kernique_kanan = "Normal";
        //     $model->tulang_bawah_patrick_kanan = "Normal";
        //     $model->tulang_bawah_contrapatrick_kanan = "Normal";
        //     $model->tulang_bawah_nyeri_tekanan_kanan = "Tidak Ada";
        //     $model->tulang_bawah_kekuatan_otot_kanan = "Normal";
        //     $model->tulang_bawah_sensibilitas_kanan = "Baik";
        //     $model->tulang_bawah_oedema_kanan = "Tidak Ada";
        //     $model->tulang_bawah_kelainan_kuku_kanan = "Tidak Ada";

        //     $model->tulang_bawah_laseque_kiri = "Normal";
        //     $model->tulang_bawah_kernique_kiri = "Normal";
        //     $model->tulang_bawah_patrick_kiri = "Normal";
        //     $model->tulang_bawah_contrapatrick_kiri = "Normal";
        //     $model->tulang_bawah_nyeri_tekanan_kiri = "Tidak Ada";
        //     $model->tulang_bawah_kekuatan_otot_kiri = "Normal";
        //     $model->tulang_bawah_sensibilitas_kiri = "Baik";
        //     $model->tulang_bawah_oedema_kiri = "Tidak Ada";
        //     $model->tulang_bawah_vaskularisasi_kiri = "Baik";
        //     $model->tulang_bawah_kelainan_kuku_kiri = "Tidak Ada";

        //     $model->otot_motorik_trofi_kanan = "Normal";
        //     $model->otot_motorik_tonus_kanan = "Normal";
        //     $model->otot_motorik_gerakan_abnormal_kanan = "Tidak Ada";
        //     $model->otot_motorik_trofi_kiri = "Normal";
        //     $model->otot_motorik_tonus_kiri = "Normal";
        //     $model->otot_motorik_gerakan_abnormal_kiri = "Tidak Ada";

        //     $model->fungsi_sensorik_kanan = "Normal";
        //     $model->fungsi_autonom_kanan = "Normal";
        //     $model->fungsi_sensorik_kiri = "Normal";
        //     $model->fungsi_autonom_kiri = "Normal";

        //     $model->saraf_daya_ingat_segera = "Baik";
        //     $model->saraf_daya_ingat_jangka_menengah = "Baik";
        //     $model->saraf_daya_ingat_jangka_pendek = "Baik";
        //     $model->saraf_daya_ingat_jangka_panjang = "Baik";
        //     $model->saraf_orientasi_waktu = "Baik";
        //     $model->saraf_orientasi_orang = "Baik";
        //     $model->saraf_orientasi_tempat = "Baik";
        //     $model->saraf_kesan = "Baik";
        //     $model->saraf_kesan_n_i = "Baik";
        //     $model->saraf_kesan_n_ii = "Baik";
        //     $model->saraf_kesan_n_iii = "Baik";
        //     $model->saraf_kesan_n_iv = "Baik";
        //     $model->saraf_kesan_n_v = "Baik";
        //     $model->saraf_kesan_n_vi = "Baik";
        //     $model->saraf_kesan_n_vii = "Baik";
        //     $model->saraf_kesan_n_viii = "Baik";
        //     $model->saraf_kesan_n_viii = "Baik";
        //     $model->saraf_kesan_n_ix = "Baik";
        //     $model->saraf_kesan_n_x = "Baik";
        //     $model->saraf_kesan_n_xi = "Baik";
        //     $model->saraf_kesan_n_xii = "Baik";
        //     $model->reflek_fisiologis_patella_kanan = "Normal";
        //     $model->reflek_patologis_kanan = "Negative";
        //     $model->reflek_fisiologis_patella_kiri = "Normal";
        //     $model->reflek_patologis_kiri = "Negative";
        //     $model->kulit_kulit = "Normal";
        //     $model->kulit_selaput_lendir = "Normal";
        //     $model->kulit_kuku = "Normal";
        //     $model->kulit_tato = "Tidak Ada";
        //     $model->kategori_kesehatan = "FIT";
        //     $model->abdomen_ballotement_kanan = "Tidak Ada";
        //     $model->abdomen_ballotement_kiri = "Tidak Ada";
        //     $model->abdomen_nyeri_costo_vertebrae_kanan = "Tidak Ada";
        //     $model->abdomen_nyeri_costo_vertebrae_kiri = "Tidak Ada";
        //     $model->tulang_atas_vaskularisasi_kanan = "Baik";
        //     $model->tulang_bawah_vaskularisasi_kanan = "Baik";
        //     $model->tulang_atas_vaskularisasi_kiri = "Baik";
        //     $model->mata_lensa_mata_kanan = "Normal";
        //     $model->mata_lensa_mata_kiri = "Normal";
        //     $model->paru_jantung_perkusi_iktus_kiri = "Normal";
        //     if ($model->save()) {
        //         return [
        //             's' => true,
        //             'e' => null
        //         ];
        //     } else {
        //         return [
        //             's' => false,
        //             'e' => $model->errors
        //         ];
        //     }
        // }
    }

    //save-anamnesis-bengkalis
    public function actionSaveAnamnesisBengkalis()
    {
        $p = Yii::$app->request->post();
        $no_rekam_medik = $p['AnamnesaBengkalis']['no_rekam_medik'];
        $modelDataLayanan = DataLayanan::findOne(['no_rekam_medik' => $no_rekam_medik]);

        $anamnesisBengkalis = AnamnesaBengkalis::findOne(['no_rekam_medik' => $no_rekam_medik]);


        if ($anamnesisBengkalis != null) {
            if ($anamnesisBengkalis->load(Yii::$app->request->post())) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                $anamnesisBengkalis->tanggal_created = date('Y-m-d H:i:s');
                $anamnesisBengkalis->created_by = (string)Yii::$app->user->identity->id;
                $anamnesisBengkalis->no_registrasi = $modelDataLayanan->no_registrasi;
                if ($anamnesisBengkalis->save()) {
                    return [
                        's' => true,
                        'e' => null
                    ];
                } else {
                    return [
                        's' => false,
                        'e' => $anamnesisBengkalis->errors
                    ];
                }
            }
        }

        $anamnesisBengkalis = new AnamnesaBengkalis();
        if ($anamnesisBengkalis->load(Yii::$app->request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            $anamnesisBengkalis->tanggal_created = date('Y-m-d H:i:s');
            $anamnesisBengkalis->created_by = (string)Yii::$app->user->identity->id;
            $anamnesisBengkalis->no_registrasi = $modelDataLayanan->no_registrasi;
            if ($anamnesisBengkalis->save()) {
                return [
                    's' => true,
                    'e' => null
                ];
            } else {
                return [
                    's' => false,
                    'e' => $anamnesisBengkalis->errors
                ];
            }
        }
    }

    //save-pemeriksaan-khusus-bengkalis
    public function actionSavePemeriksaanKhususBengkalis()
    {
        $p = Yii::$app->request->post();
        $no_rekam_medik = $p['PemeriksaanDokterBengkalis']['no_rekam_medik'];
        $modelDataLayanan = DataLayanan::findOne(['no_rekam_medik' => $no_rekam_medik]);

        $formkhusus = PemeriksaanDokterBengkalis::findOne(['no_rekam_medik' => $no_rekam_medik]);


        if ($formkhusus != null) {
            if ($formkhusus->load(Yii::$app->request->post())) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                $formkhusus->tanggal_created = date('Y-m-d H:i:s');
                $formkhusus->created_by = (string)Yii::$app->user->identity->id;
                if ($formkhusus->save()) {
                    return [
                        's' => true,
                        'e' => null
                    ];
                } else {
                    return [
                        's' => false,
                        'e' => $formkhusus->errors
                    ];
                }
            }
        }

        $formkhusus = new PemeriksaanDokterBengkalis();
        if ($formkhusus->load(Yii::$app->request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            $formkhusus->tanggal_created = date('Y-m-d H:i:s');
            $formkhusus->created_by = (string)Yii::$app->user->identity->id;
            if ($formkhusus->save()) {
                return [
                    's' => true,
                    'e' => null
                ];
            } else {
                return [
                    's' => false,
                    'e' => $formkhusus->errors
                ];
            }
        }
    }

    //penata save
    public function actionSavePenata()
    {
        $formkhusus = new McuPenatalaksanaanMcu();
        if ($formkhusus->load(Yii::$app->request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            if ($formkhusus->save()) {
                return [
                    's' => true,
                    'e' => null
                ];
            } else {
                return [
                    's' => false,
                    'e' => $formkhusus->errors
                ];
            }
        }
    }

    public function actionListPenyakit($q = null, $id = null)
    {
        // print_r($data);
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $data = PenyakitSimrs::find()->select(['KD_PENYAKIT as id', "(KD_PENYAKIT + ' - ' + NAMAPENYAKIT) AS text"])
                ->where(['like', 'KD_PENYAKIT', $q . '%', false])
                // ->orWhere(['like', 'NAMAPENYAKIT', $q])
                ->asArray()
                ->all();
            $out['results'] = array_values($data);
        } elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => PenyakitSimrs::find($id)->KD_PENYAKIT];
        }
        return $out;
    }


    public function actionDeletePenata()
    {
        $id = $_POST['id'];
        $model = McuPenatalaksanaanMcu::findOne(['id_penata' => $id]);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if ($model->delete()) {
            return [
                's' => true,
                'e' => null
            ];
        } else {
            return [
                's' => false,
                'e' => $model->errors
            ];
        }
    }
}
