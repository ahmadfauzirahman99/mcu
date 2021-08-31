<?php

use app\assets\ItemFisikAsset;
use app\components\Helper;
use app\models\GraddingMcu;
use app\models\spesialis\McuSpesialisGigi;
use app\models\spesialis\McuSpesialisMata;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\Url;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $master_pemeriksaan_fisik app\models\MasterPemeriksaanFisik */
/* @var $form yii\bootstrap4\ActiveForm */

ItemFisikAsset::register($this);

$helper = [
    'Normal' => 'Normal',
    'Kekurangan Berat Badan Tingkat Berat' => 'Kekurangan Berat Badan Tingkat Berat',
    'Kekurangan Berat Badan Tingkat Ringan' => 'Kekurangan Berat Badan Tingkat Ringan',
    'Kelebihan Berat Badan Tingkat Ringan' => 'Kelebihan Berat Badan Tingkat Ringan',
    'Kelebihan Berat Badan Tingkat Berat' => 'Kelebihan Berat Badan Tingkat Berat'
];
?>
<style>
    .stiky {
        position: fixed;
        bottom: 50%;
        right: 30px;
        height: 45px;
        width: 200px;
        background: #389466;
        z-index: 99
    }
</style>
<?php $identitas_dokter = Helper::getRumpun()  ?>

<style>
    iframe {
        overflow: hidden;
    }
</style>
<div>
    <?php $form = ActiveForm::begin(['id' =>  $master_pemeriksaan_fisik->formName(), 'action' => 'save-pemeriksaan-fisik']); ?>
    <h1 class="text-center" id="pemeriksaan-fisik-mulai"><b>III. PEMERIKSAAN FISIK</b></h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <div class="form-group">
                    <h4 class="header-title m-t-0 m-b-30">1. Tanda Vital</h4>
                    <hr>
                    <?= $form->field($master_pemeriksaan_fisik, 'no_rekam_medik')->hiddenInput(['maxlength' => true, 'value' => $dataLayanan->no_rekam_medik])->label(false) ?>

                    <div class="row">
                        <div class="col-lg-6">
                            <?= $form->field($master_pemeriksaan_fisik, 'tanda_vital_nadi')->textInput(['maxlength' => true, 'placeholder' => 'Vital Nadi']) ?>
                        </div>
                        <div class="col-lg-6">
                            <?= $form->field($master_pemeriksaan_fisik, 'tanda_vital_pernapasan')->textInput(['maxlength' => true, 'placeholder' => 'Pernapasan']) ?>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?= $form->field($master_pemeriksaan_fisik, 'sistolik')->textInput(['maxlength' => true, 'placeholder' => 'Sistolik']) ?>
                                </div>
                                <div class="col-lg-6">
                                    <?= $form->field($master_pemeriksaan_fisik, 'diastolik')->textInput(['maxlength' => true, 'placeholder' => 'Diastolik']) ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?= $form->field($master_pemeriksaan_fisik, 'tanda_vital_suhu_badan')->textInput(['maxlength' => true, 'placeholder' => 'Suhu Badan']) ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-12" id="<?= $master_pemeriksaan_fisik->formName() ?>">
            <div class="card-box">
                <div class="form-group">
                    <h4 class="header-title m-t-0 m-0 30">2. Status Gizi</h4>
                    <hr>
                    <div class="row">
                        <div class="col-lg-4">
                            <?= $form->field($master_pemeriksaan_fisik, 'status_gizi_tinggi_badan')->textInput(['placeholder' => 'Tinggi Badan']) ?>
                        </div>
                        <div class="col-lg-4">
                            <?= $form->field($master_pemeriksaan_fisik, 'status_gizi_berat_badan')->textInput(['placeholder' => 'Tinggi Badan']) ?>
                        </div>
                        <div class="col-lg-4">
                            <?= $form->field($master_pemeriksaan_fisik, 'status_gizi_lingkaran_perut')->textInput(['placeholder' => 'Lingkaran Perut']) ?>
                        </div>
                        <div class="col-lg-12">
                            <?= $form->field($master_pemeriksaan_fisik, 'status_gizi_lingkaran_pinggang')->textInput(['placeholder' => 'Lingkaran Lengan']) ?>
                        </div>
                        <div class="col-lg-12">
                            <?= $form->field($master_pemeriksaan_fisik, 'status_gizi_imt')->textInput(['readonly' => true]) ?>
                        </div>
                        <div class="col-lg-12">
                            <?= $form->field($master_pemeriksaan_fisik, 'status_gizi_bentuk_badan')->radioList($helper, []) ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <hr>
    </div>

    <div class="row" id="<?= $master_pemeriksaan_fisik->formName() ?>">
        <div class="col-lg-12">
            <div class="card-box">
                <div class="form-group">
                    <h4 class="header-title m-t-0 m-b-30">3. Tingkat Kesadaran dan Keadaan Umum</h4>
                    <table class='table table-bordered'>
                        <tr>
                            <th>Kesadaran</th>
                            <td>
                                <?= $form->field($master_pemeriksaan_fisik, 'tingkat_kesadaran_kesadaran')->radioList(['Compos Mentis' => 'Compos Mentis', 'Kesadaran Menurun' => 'Kesadaran Menurun'])->label(false) ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Kualitas Kontak</th>
                            <td><?= $form->field($master_pemeriksaan_fisik, 'tingkat_kesadaran_kualitas_kontak')->radioList(['Baik' => 'Baik', 'Tidak' => 'Tidak'])->label(false) ?></td>
                        </tr>
                        <tr>
                            <th>Tampat Kesakitan</th>
                            <td><?= $form->field($master_pemeriksaan_fisik, 'tingkat_kesadaran_tampak_kesakitan')->radioList(['Tidak Tampak Kesakitan' => 'Tidak Tampak Kesakitan', 'Ya, Tampak Kesakitan' => 'Ya, Tampak Kesakitan'])->label(false) ?></td>
                        </tr>
                        <tr>
                            <th>Gangguan Saat Berjalan</th>
                            <td>
                                <?= $form->field($master_pemeriksaan_fisik, 'tingkat_kesadaran_gangguan_saat_berjalan')->radioList(['Tidak' => 'Tidak', 'Ya' => 'Ya'])->label(false) ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <?php if (($identitas_dokter['kodejenis'] == 20) || $identitas_dokter['kodejenis'] == 1) { ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="form-group">
                        <h4 class="header-title m-t-0 m-b-30">4. Kalenjer Getah Bening</h4>
                        <table class='table table-bordered'>
                            <tr>
                                <th width="50%">Getah Bening Leher</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'kelenjar_getah_bening_leher')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'])->label(false) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Sub Mandibula</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'kelenjar_getah_bening_sub_mandibula')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'])->label(false) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Getah Bening Ketiak</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'kelenjar_getah_bening_ketiak')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'])->label(false) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Inguinal</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'kelenjar_getah_bening_inguinal')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'])->label(false) ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="form-group">
                        <h4 class="header-title m-t-0 m-b-30">5. Kepala</h4>
                        <table class='table table-bordered'>
                            <tr>
                                <th>Tulang</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'kepala_tulang')->radioList(['Baik' => 'Baik', 'Tidak baik' => 'Tidak Baik'])->label(false) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Kulit Kepala</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'kepala_kulit_kepala')->radioList(['Baik' => 'Baik', 'Tidak baik' => 'Tidak Baik'])->label(false) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Rambut</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'kepala_rambut')->radioList(['Baik' => 'Baik', 'Tidak baik' => 'Tidak Baik'])->label(false) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Bentuk Wajah</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'kepala_bentuk_wajah')->radioList(['Baik' => 'Baik', 'Tidak baik' => 'Tidak Baik'])->label(false) ?>
                                </td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="form-group">
                        <h4 class="header-title m-t-0 m-b-30">6. Mata</h4>
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'mata_persepsi_warna_kanan')->radioList(['Normal' => 'Normal', 'Buta Warna Parsial' => 'Buta Warna Parsial', 'Buta Warna Total' => 'Buta Warna Total']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'mata_kelopak_mata_kanan')->radioList(['Normal' => 'Normal', 'Tidak Normal(Oedema)' => 'Tidak Normal(Oedema)']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'mata_konjungtiva_kanan')->radioList(['Normal' => 'Normal', 'Hiperemesis' => 'Hiperemesis', 'Sekret (-)' => 'Sekret (-)', 'Pucat' => 'Pucat', 'Pterigium' => 'Pterigium']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'mata_gerak_bola_mata_kanan')->radioList(['Normal' => 'Normal', 'Strabismus' => "Strabismus"]) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'mata_sklera_kanan')->radioList(['Normal' => 'Normal', 'Ikterik' => 'Ikterik']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'mata_lensa_mata_kanan')->radioList(['Tidak Keruh' => 'Tidak Keruh', 'Keruh' => 'Keruh']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'mata_kornea_kanan')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'mata_bulu_mata_kanan')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>

                                    <?= $form->field($master_pemeriksaan_fisik, 'mata_tekanan_bola_mata_kanan')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                                    <div style="display: none;">
                                        <?= $form->field($master_pemeriksaan_fisik, 'mata_penglihatan_3dimensi_kanan')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                                    </div>

                                </td>

                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'mata_persepsi_warna_kiri')->radioList(['Normal' => 'Normal', 'Buta Warna Parsial' => 'Buta Warna Parsial', 'Buta Warna Total' => 'Buta Warna Total']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'mata_kelopak_mata_kiri')->radioList(['Normal' => 'Normal', 'Tidak Normal(Oedema)' => 'Tidak Normal(Oedema)']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'mata_konjungtiva_kiri')->radioList(['Normal' => 'Normal', 'Hiperemesis' => 'Hiperemesis', 'Sekret (-)' => 'Sekret (-)', 'Pucat' => 'Pucat', 'Pterigium' => 'Pterigium']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'mata_gerak_bola_mata_kiri')->radioList(['Normal' => 'Normal', 'Strabismus' => "Strabismus"]) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'mata_sklera_kiri')->radioList(['Normal' => 'Normal', 'Ikterik' => 'Ikterik']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'mata_lensa_mata_kiri')->radioList(['Tidak Keruh' => 'Tidak Keruh', 'Keruh' => 'Keruh']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'mata_kornea_kiri')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'mata_bulu_mata_kiri')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'mata_tekanan_bola_mata_kiri')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                                    <div style="display: none;">
                                        <?= $form->field($master_pemeriksaan_fisik, 'mata_penglihatan_3dimensi_kiri')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                                    </div>

                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'mata_visus_tanpa_koreksi')->textInput(['maxlength' => true]) ?>

                                    <?= $form->field($master_pemeriksaan_fisik, 'mata_visus_dengan_koreksi')->textInput(['maxlength' => true]) ?>
                                </td>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'mata_visus_tanpa_koreksi_kiri')->textInput(['maxlength' => true]) ?>

                                    <?= $form->field($master_pemeriksaan_fisik, 'mata_visus_dengan_koreksi_kiri')->textInput(['maxlength' => true]) ?>
                                </td>
                            </tr>


                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="form-group">
                        <h4 class="header-title m-t-0 m-b-30">7. Telinga</h4>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'telinga_daun_telinga_kanan')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>

                                    <?= $form->field($master_pemeriksaan_fisik, 'telinga_liang_telinga_kanan')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>


                                    <?= $form->field($master_pemeriksaan_fisik, 'telinga_serumen_kanan')->radioList(['Tidak Ada' => 'Tidak Ada', 'Ada Serumen' => 'Ada Serumen', 'Menyumbat (Prop)' => 'Menyumbat (Prop)']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'telinga_timpani_kanan')->radioList(['Intak' => 'Intak', 'Tidak Intak' => 'Tidak Intak', 'Lainya' => 'Lainya']) ?>



                                </td>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'telinga_daun_telinga_kiri')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>

                                    <?= $form->field($master_pemeriksaan_fisik, 'telinga_liang_telinga_kiri')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>


                                    <?= $form->field($master_pemeriksaan_fisik, 'telinga_serumen_kiri')->radioList(['Tidak Ada' => 'Tidak Ada', 'Ada Serumen' => 'Ada Serumen', 'Menyumbat (Prop)' => 'Menyumbat (Prop)']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'telinga_timpani_kiri')->radioList(['Intak' => 'Intak', 'Tidak Intak' => 'Tidak Intak', 'Lainya' => 'Lainya']) ?>

                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="form-group">
                        <h4 class="header-title m-t-0 m-b-30">8. Hidung</h4>
                        <table class="table table-bordered">
                            <tr>
                                <th>Meatus Nasi</th>
                                <td><?= $form->field($master_pemeriksaan_fisik, 'hidung_meatus_nasi')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'])->label(false) ?></td>
                            </tr>
                            <tr>
                                <th>Septum Nasi</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'hidung_septum_nasi')->radioList(['Normal' => 'Normal', 'Deviasi'])->label(false) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Konka Nasal</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'hidung_konka_nasal')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'])->label(false) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Ketok Sinus</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'hidung_nyeri_ketok_sinus')->radioList(['Normal' => 'Normal', 'Nyeri Tekan Di Posisi' => 'Nyeri Tekan Di Posisi'])->label(false) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Penciuman</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'hidung_penciuman')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'])->label(false) ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="form-group">
                        <h4 class="header-title m-t-0 m-b-30">9. Mulut dan Bibir</h4>
                        <table class="table table-bordered">
                            <tr>
                                <th>Bibir</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'mulut_bibir')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'])->label(false) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Lidah</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'mulut_lidah')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'])->label(false) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Gusi</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'mulut_gusi')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'])->label(false) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Lainnya</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'mulut_lainnya')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'])->label(false) ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="form-group">
                        <h4 class="header-title m-t-0 m-b-30">10. Tenggorokan</h4>
                        <table class="table table-bordered">
                            <tr>
                                <th>Tenggorokan</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tenggorokan')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'])->label(false) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Pharynx</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tenggorokan_pharynx')->radioList(['Normal' => 'Normal', 'hiperemesis' => 'hiperemesis', 'Granulasi' => 'Granulasi']) ?>
                                </td>
                            </tr>
                            <tr class="tr-label">
                                <td class="text-center"><b>Kanan</b></td>
                                <td class="text-center"><b>Kiri</b></td>
                            </tr>
                            <tr>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tenggorokan_tonsil_kanan')->radioList(['TO' => 'TO', 'T1' => 'T1', 'T2' => 'T2', 'T3' => 'T3']) ?>
                                </td>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tenggorokan_tonsil_kiri')->radioList(['TO' => 'TO', 'T1' => 'T1', 'T2' => 'T2', 'T3' => 'T3']) ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tenggorokan_tonsil_ukuran_kanan')->radioList(['Normal' => 'Normal', 'Hiperemis' => 'Hiperemis']) ?>
                                </td>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tenggorokan_tonsil_ukuran_kiri')->radioList(['Normal' => 'Normal', 'Hiperemis' => 'Hiperemis']) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Palatum</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tenggorokan_palatum')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'])->label(false) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Lainnya</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tenggorokan_lainn')->textInput(['placeholder' => 'Lainnya'])->label(false) ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="form-group">
                        <h4 class="header-title m-t-0 m-b-30">11. Leher</h4>
                        <table class='table table-bordered'>
                            <tr>
                                <th>Gerakan Leher</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'leher_gerakan_leher')->radioList(['Normal' => 'Normal', 'Terbatas' => 'Terbatas'])->label(false) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Otot Leher</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'leher_otot_leher')->radioList(['Normal' => 'Normal', 'Spasme / Kontraksi' => 'Spasme / Kontraksi'])->label(false) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Kelenjer Thyroid</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'leher_kelenjar_thyroid')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'])->label(false) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Pulsasi Carotis</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'leher_pulsasi_carotis')->radioList(['Normal' => 'Normal', 'Bruit' => 'Bruit'])->label(false) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Vena Jugularis</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'leher_tekanan_vena_jugularis')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'])->label(false) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Trachea</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'leher_trachea')->radioList(['Normal' => 'Normal', 'Deviasi' => 'Deviasi'])->label(false) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Lainnya</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'leher_lainnya')->textInput() ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="form-group">
                        <h4 class="header-title m-t-0 m-b-30">12. Dada</h4>

                        <table class="table table-bordered">
                            <tr>
                                <th>Dada</th>
                                <td> <?= $form->field($master_pemeriksaan_fisik, 'dada')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'])->label(false) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Bentuk</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'dada_bentuk')->radioList(['Simetris' => 'Simetris', 'Asimetris' => 'Asimetris'])->label(false) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Mamae</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'dada_mamae')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'])->label(false) ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 10%;">
                                    <label class="control-label has-star col-md-2">Tumor</label>
                                </td>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'dada_tumor_ukuran')->textInput() ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'dada_tumor_letak')->textInput() ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'dada_tumor_konsisten')->textInput() ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Lainnya</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'dada_lainnya')->textInput(['maxlength' => true,])->label(false) ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="form-group">
                        <h4 class="header-title m-t-0 m-b-30">13. Paru-Paru dan Jantung</h4>


                        <table class="table table-bordered">
                            <tr>
                                <th>A. Palpasi</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'paru_jantung_palpasi')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'])->label(false) ?>
                                </td>
                            </tr>
                            <tr class="tr-label">
                                <td>Kanan</td>
                                <td>Kiri</td>
                            </tr>
                            <tr>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'paru_jantung_perkusi_kanan')->radioList(['Sonor' => 'Sonor', 'Redup' => 'Redup', 'Hipersonor' => 'Hipersonor',]) ?>

                                </td>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'paru_jantung_perkusi_kiri')->radioList(['Sonor' => 'Sonor', 'Redup' => 'Redup', 'Hipersonor' => 'Hipersonor',]) ?>

                                </td>
                            </tr>
                            <tr class="tr-label">
                                <td colspan="2"><b>C. Auskultasi</b></td>
                            </tr>

                            <tr>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'paru_jantung_auskultasi_bunyi_nafas_tambah_kanan')->radioList(['Tak Ada' => 'Tak Ada', 'Ronkhi' => 'Ronkhi', 'Wheezing' => 'Wheezing',]) ?>
                                </td>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'paru_jantung_auskultasi_bunyi_nafas_tambah_kiri')->radioList(['Tak Ada' => 'Tak Ada', 'Ronkhi' => 'Ronkhi', 'Wheezing' => 'Wheezing',]) ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'paru_jantung_auskultasi_bunyi_nafas_kanan')->radioList(['Vesikuler' => 'Vesikuler', 'Brc. Vesikuler' => 'Brc. Vesikuler',]) ?>
                                </td>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'paru_jantung_auskultasi_bunyi_nafas_kiri')->radioList(['Vesikuler' => 'Vesikuler', 'Brc. Vesikuler' => 'Brc. Vesikuler',]) ?>
                                </td>
                            </tr>
                        </table>

                        <table class="table table-bordered">
                            <tr class="tr-label">
                                <td colspan="2"><b>D. Jantung</b></td>
                            </tr>

                            <tr>
                                <td colspan='2'>
                                    <label>Iktus Kordis</label>
                                    <?= $form->field($master_pemeriksaan_fisik, 'paru_jantung_perkusi_iktus_kiri')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal.........'])->label(false) ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='2'>
                                    <label>Batas Jantung</label>
                                    <?= $form->field($master_pemeriksaan_fisik, 'paru_jantung_bunyi_jantung')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal.........'])->label(false) ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="form-group">
                        <h4 class="header-title m-t-0 m-b-30">14. Abdomen</h4>
                        <table class="table table-bordered">
                            <tr>
                                <th>Palpasi</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'abdomen')->radioList(['Supel' => 'Supel', 'Rigit' => 'Rigit'])->label(false) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Perkusi</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'abdomen_perkusi')->radioList(['Timpani' => 'Timpani', 'Redup' => 'Redup'])->label(false) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Auskultai Bising Usus</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'abdomen_auskultasi_bising_usus')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'])->label(false) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Hati</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'abdomen_hati')->radioList(['Teraba' => 'Teraba', 'Tidak Teraba' => 'Tidak Teraba'])->label(false) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Limpa</th>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'abdomen_limpa')->radioList(['Tidak Teraba Schuffner' => 'Tidak Teraba Schuffner', 'Teraba Schuffner' => 'Teraba Schuffner'])->label(false) ?>
                                </td>
                            </tr>

                        </table>

                        <table class='table table-bordered table-striped'>
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Kanan</th>
                                    <th>Kiri</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Ginjal</td>
                                    <td><?= $form->field($master_pemeriksaan_fisik, 'abdomen_ginjal_kanan')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'])->label(false) ?>
                                    </td>
                                    <td><?= $form->field($master_pemeriksaan_fisik, 'abdomen_ginjal_kiri')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'])->label(false) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ballotement</td>
                                    <td> <?= $form->field($master_pemeriksaan_fisik, 'abdomen_ballotement_kanan')->radioList(['Ada' => 'Ada', 'Tidak Ada' => 'Tidak Ada'])->label(false) ?>
                                    </td>
                                    <td> <?= $form->field($master_pemeriksaan_fisik, 'abdomen_ballotement_kiri')->radioList(['Ada' => 'Ada', 'Tidak Ada' => 'Tidak Ada'])->label(false) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nyeri Costo Vertebrae</td>
                                    <td><?= $form->field($master_pemeriksaan_fisik, 'abdomen_nyeri_costo_vertebrae_kanan')->radioList(['Ada' => 'Ada', 'Tidak Ada' => 'Tidak Ada'])->label(false) ?>
                                    </td>
                                    <td> <?= $form->field($master_pemeriksaan_fisik, 'abdomen_nyeri_costo_vertebrae_kiri')->radioList(['Ada' => 'Ada', 'Tidak Ada' => 'Tidak Ada'])->label(false) ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card text-white bg-warning">
                    <div class="card-body">
                        <div class="form-group">
                            <h4 class="header-title m-t-0 m-b-30">15. Genitourinaria</h4>
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h6 class="m-0">
                                            <a href="#collapseOne" class="text-dark" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
                                                Tidak Dilakukan Pemeriksaan #1
                                            </a>
                                        </h6>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <table class='table table-bordered'>
                                            <tr>
                                                <th>kandung Kemih</th>
                                                <td><?= $form->field($master_pemeriksaan_fisik, 'genitourinaria_kandung_kemih')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'])->label(false) ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Anus/Rektum/Perianal</th>
                                                <td>
                                                    <?= $form->field($master_pemeriksaan_fisik, 'genitourinaria_anus')->dropDownList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'])->label(false) ?>
                                                </td>
                                                <td>
                                                    <?= $form->field($master_pemeriksaan_fisik, 'hemoroid')->radioList(['Hemoroid' => 'Hemoroid'])->label(false) ?>
                                                    <?= $form->field($master_pemeriksaan_fisik, 'hemoroid_lainnya')->textInput(['placeholder' => 'Lainnya'])->label(false) ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Genitalia Eksternal</th>
                                                <td>
                                                    <?= $form->field($master_pemeriksaan_fisik, 'genitourinaria_genitalia_eksternal')->dropDownList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'])->label(false) ?>
                                                </td>
                                                <td>
                                                    <?= $form->field($master_pemeriksaan_fisik, 'hydrocele')->textInput(['value' => 'Tidak Normal'])->label(true) ?>
                                                    <?= $form->field($master_pemeriksaan_fisik, 'varicocele')->textInput(['value' => 'Tidak Normal'])->label(true) ?>
                                                    <?= $form->field($master_pemeriksaan_fisik, 'ulceral')->textInput(['value' => 'Tidak Normal'])->label(true) ?>
                                                    <?= $form->field($master_pemeriksaan_fisik, 'gonorchoea')->textInput(['value' => 'Tidak Normal'])->label(true) ?>
                                                    <?= $form->field($master_pemeriksaan_fisik, 'genitalia_lainnya')->textInput(['value' => 'Tidak Normal'])->label(true) ?>
                                                </td>

                                            </tr>
                                            <?php if ($dataLayanan->jenis_kelamin == 'L') { ?>
                                                <tr>
                                                    <th>Prostat (Khusus Pria)</th>
                                                    <td>
                                                        <?= $form->field($master_pemeriksaan_fisik, 'genitourinaria_prostat')->radioList(['Tidak Teraba' => 'Tidak Teraba', 'Teraba' => 'Teraba'])->label(false) ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="form-group">
                        <h4 class="header-title m-t-0 m-b-30">16. Vertebra</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <?= $form->field($master_pemeriksaan_fisik, 'vertebra')->radioList(['Normal' => 'Normal', 'Lordosis' => 'Lordosis', 'Skoliosis' => 'Skoliosis', 'Kiposis' => 'Kiposis',]) ?>
                                <?= $form->field($master_pemeriksaan_fisik, 'vertebra_lainnya')->textInput(['maxlength' => true,]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="form-group">
                        <h4 class="header-title m-t-0 m-b-30">17. Tulang / Sendi (Ekstremitas Atas)</h4>
                        <div class="form-group">
                            <label>Tulang Atas Simetris</label>
                            <h4><?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_simetris')->radioList(['Ya' => "Ya", "Tidak Ada" => "Tidak Ada"])->label(false) ?></h4>
                        </div>
                        <table class="table table-bordered">
                            <tr>
                                <td>

                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_gerakan_abduksi_neer_kanan')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_gerakan_abduksi_hawkin_kanan')->radioList(["Tidak Normal" => "Tidak Normal", "Normal" => "Normal"]) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_gerakan_drop_arm_kanan')->radioList(["Tidak Normal" => "Tidak Normal", "Normal" => "Normal"]) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_gerakan_yergason_kanan')->radioList(["Tidak Normal" => "Tidak Normal", "Normal" => "Normal"]) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_gerakan_speed_kanan')->radioList(["Tidak Normal" => "Tidak Normal", "Normal" => "Normal"]) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_tulang_kanan')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_sensibilitas_kanan')->radioList(['Baik' => 'Baik', 'Tidak Baik']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_oedem_kanan')->radioList(['Tidak Ada' => 'Tidak Ada', 'Ada' => 'Ada']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_varises_kanan')->radioList(['Tidak Ada' => 'Tidak Ada', 'Ada' => 'Ada']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_kekuatan_otot_pin_prick_kanan')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_kekuatan_otot_phallent_kanan')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_kekuatan_otot_tinnel_kanan')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_kekuatan_otot_finskelstein_kanan')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_vaskularisasi_kanan')->radioList(['Baik' => 'Baik', 'Tidak Baik' => 'Tidak Baik']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_kelaianan_kukujari_kanan')->radioList(['Tidak Ada' => 'Tidak Ada', 'Ada' => 'Ada']) ?>
                                </td>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_gerakan_abduksi_neer_kiri')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_gerakan_abduksi_hawkin_kiri')->radioList(["Tidak Normal" => "Tidak Normal", "Normal" => "Normal"]) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_gerakan_drop_arm_kiri')->radioList(["Tidak Normal" => "Tidak Normal", "Normal" => "Normal"]) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_gerakan_yergason_kiri')->radioList(["Tidak Normal" => "Tidak Normal", "Normal" => "Normal"]) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_gerakan_speed_kiri')->radioList(["Tidak Normal" => "Tidak Normal", "Normal" => "Normal"]) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_tulang_kiri')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_sensibilitas_kiri')->radioList(['Baik' => 'Baik', 'Tidak Baik' => 'Tidak Baik']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_oedem_kiri')->radioList(['Tidak Ada' => 'Tidak Ada', 'Ada' => 'Ada']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_varises_kiri')->radioList(['Tidak Ada' => 'Tidak Ada', 'Ada' => 'Ada']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_kekuatan_otot_pin_prick_kiri')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_kekuatan_otot_phallent_kiri')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_kekuatan_otot_tinnel_kiri')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_kekuatan_otot_finskelstein_kiri')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_vaskularisasi_kiri')->radioList(['Baik' => 'Baik', 'Tidak Baik' => 'Tidak Baik']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_kelaianan_kukujari_kiri')->radioList(['Tidak Ada' => 'Tidak Ada', 'Ada' => 'Ada']) ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="form-group">
                        <h4 class="header-title m-t-0 m-b-30">18. Tulang / Sendi (Ektremitas Bawah</h4>
                        <div class="form-group">
                            <label>Tulang Bawah Simetris</label>
                            <h4><?= $form->field($master_pemeriksaan_fisik, 'tulang_bawah_simetris')->radioList(['Ya' => "Ya", "Tidak Ada" => "Tidak Ada"])->label(false) ?></h4>
                        </div>
                        <table class="table table-bordered">
                            <tr>
                                <td>

                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_bawah_laseque_kanan')->radioList(['Normal' => "Normal", "Tidak Normal" => "Tidak Normal"]) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_bawah_kernique_kanan')->radioList(['Normal' => "Normal", "Tidak Normal" => "Tidak Normal"]) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_bawah_patrick_kanan')->radioList(['Normal' => "Normal", "Tidak Normal" => "Tidak Normal"]) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_bawah_contrapatrick_kanan')->radioList(['Normal' => "Normal", "Tidak Normal" => "Tidak Normal"]) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_bawah_nyeri_tekanan_kanan')->radioList(['Tidak Ada' => 'Tidak Ada', 'Ada' => 'Ada']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_bawah_kekuatan_otot_kanan')->radioList(['Tidak Normal' => 'Tidak Normal', 'Normal' => 'Normal']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_bawah_sensibilitas_kanan')->radioList(['Baik' => 'Baik', 'Tidak Baik']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_bawah_oedema_kanan')->radioList(['Tidak Ada' => 'Tidak Ada', 'Ada' => 'Ada']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_bawah_vaskularisasi_kanan')->radioList(['Baik' => 'Baik', 'Tidak Baik' => 'Tidak Baik']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_bawah_kelainan_kuku_kanan')->radioList(['Tidak Ada' => 'Tidak Ada', 'Ada' => 'Ada']) ?>
                                </td>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_bawah_laseque_kiri')->radioList(['Normal' => "Normal", "Tidak Normal" => "Tidak Normal"]) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_bawah_kernique_kiri')->radioList(['Normal' => "Normal", "Tidak Normal" => "Tidak Normal"]) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_bawah_patrick_kiri')->radioList(['Normal' => "Normal", "Tidak Normal" => "Tidak Normal"]) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_bawah_contrapatrick_kiri')->radioList(['Normal' => "Normal", "Tidak Normal" => "Tidak Normal"]) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_bawah_nyeri_tekanan_kiri')->radioList(['Tidak Ada' => 'Tidak Ada', 'Ada' => 'Ada']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_bawah_kekuatan_otot_kiri')->radioList(['Tidak Normal' => 'Tidak Normal', 'Normal' => 'Normal']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_bawah_sensibilitas_kiri')->radioList(['Baik' => 'Baik', 'Tidak Baik']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_bawah_oedema_kiri')->radioList(['Tidak Ada' => 'Tidak Ada', 'Ada' => 'Ada']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_bawah_vaskularisasi_kiri')->radioList(['Baik' => 'Baik', 'Tidak Baik' => 'Tidak Baik']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'tulang_bawah_kelainan_kuku_kiri')->radioList(['Tidak Ada' => 'Tidak Ada', 'Ada' => 'Ada']) ?>
                                </td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="form-group">
                        <h4 class="header-title m-t-0 m-b-30">19. Otot Motorik</h4>
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'otot_motorik_trofi_kanan')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'otot_motorik_tonus_kanan')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'otot_motorik_gerakan_abnormal_kanan')->radioList(['Tidak Ada' => 'Tidak Ada', 'Ada' => 'Ada']) ?>
                                </td>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'otot_motorik_trofi_kiri')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'otot_motorik_tonus_kiri')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'otot_motorik_gerakan_abnormal_kiri')->radioList(['Tidak Ada' => 'Tidak Ada', 'Ada' => 'Ada']) ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                >
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="form-group">
                        <h4 class="header-title m-t-0 m-b-30">20. Fungsi Sensorik dan Autonom</h4>
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'fungsi_sensorik_kanan')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'fungsi_autonom_kanan')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                                </td>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'fungsi_sensorik_kiri')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'fungsi_autonom_kiri')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="form-group">
                        <h4 class="header-title m-t-0 m-b-30">21. Saraf dan Fungsi Luhur</h4>
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'saraf_daya_ingat_segera')->radioList(['Baik' => 'Baik', 'Tidak Baik' => 'Tidak Baik']) ?>

                                    <?= $form->field($master_pemeriksaan_fisik, 'saraf_daya_ingat_jangka_menengah')->radioList(['Baik' => 'Baik', 'Tidak Baik' => 'Tidak Baik']) ?>

                                    <?= $form->field($master_pemeriksaan_fisik, 'saraf_daya_ingat_jangka_pendek')->radioList(['Baik' => 'Baik', 'Tidak Baik' => 'Tidak Baik']) ?>

                                    <?= $form->field($master_pemeriksaan_fisik, 'saraf_daya_ingat_jangka_panjang')->radioList(['Baik' => 'Baik', 'Tidak Baik' => 'Tidak Baik']) ?>

                                    <?= $form->field($master_pemeriksaan_fisik, 'saraf_orientasi_waktu')->radioList(['Baik' => 'Baik', 'Tidak Baik' => 'Tidak Baik']) ?>

                                    <?= $form->field($master_pemeriksaan_fisik, 'saraf_orientasi_orang')->radioList(['Baik' => 'Baik', 'Tidak Baik' => 'Tidak Baik']) ?>

                                    <?= $form->field($master_pemeriksaan_fisik, 'saraf_orientasi_tempat')->radioList(['Baik' => 'Baik', 'Tidak Baik' => 'Tidak Baik']) ?>
                                </td>
                                <td>
                                    <?php $form->field($master_pemeriksaan_fisik, 'saraf_kesan')->textInput(['Baik' => 'Baik', 'Tidak Baik' => 'Tidak Baik']) ?>

                                    <?= $form->field($master_pemeriksaan_fisik, 'saraf_kesan_n_i')->radioList(['Baik' => 'Baik', 'Tidak Baik' => 'Tidak Baik']) ?>

                                    <?= $form->field($master_pemeriksaan_fisik, 'saraf_kesan_n_ii')->radioList(['Baik' => 'Baik', 'Tidak Baik' => 'Tidak Baik']) ?>

                                    <?= $form->field($master_pemeriksaan_fisik, 'saraf_kesan_n_iii')->radioList(['Baik' => 'Baik', 'Tidak Baik' => 'Tidak Baik']) ?>

                                    <?= $form->field($master_pemeriksaan_fisik, 'saraf_kesan_n_iv')->radioList(['Baik' => 'Baik', 'Tidak Baik' => 'Tidak Baik']) ?>

                                    <?= $form->field($master_pemeriksaan_fisik, 'saraf_kesan_n_v')->radioList(['Baik' => 'Baik', 'Tidak Baik' => 'Tidak Baik']) ?>

                                    <?= $form->field($master_pemeriksaan_fisik, 'saraf_kesan_n_vi')->radioList(['Baik' => 'Baik', 'Tidak Baik' => 'Tidak Baik']) ?>

                                    <?= $form->field($master_pemeriksaan_fisik, 'saraf_kesan_n_vii')->radioList(['Baik' => 'Baik', 'Tidak Baik' => 'Tidak Baik']) ?>

                                    <?= $form->field($master_pemeriksaan_fisik, 'saraf_kesan_n_viii')->radioList(['Baik' => 'Baik', 'Tidak Baik' => 'Tidak Baik']) ?>

                                    <?= $form->field($master_pemeriksaan_fisik, 'saraf_kesan_n_ix')->radioList(['Baik' => 'Baik', 'Tidak Baik' => 'Tidak Baik']) ?>

                                    <?= $form->field($master_pemeriksaan_fisik, 'saraf_kesan_n_x')->radioList(['Baik' => 'Baik', 'Tidak Baik' => 'Tidak Baik']) ?>

                                    <?= $form->field($master_pemeriksaan_fisik, 'saraf_kesan_n_xi')->radioList(['Baik' => 'Baik', 'Tidak Baik' => 'Tidak Baik']) ?>

                                    <?= $form->field($master_pemeriksaan_fisik, 'saraf_kesan_n_xii')->radioList(['Baik' => 'Baik', 'Tidak Baik' => 'Tidak Baik']) ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="form-group">
                        <h4 class="header-title m-t-0 m-b-30">23. Refleks</h4>
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Kanan</th>
                                <th>Kiri</th>
                            </tr>
                            <tr>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'reflek_fisiologis_patella_kanan')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                                    <?= $form->field($master_pemeriksaan_fisik, 'reflek_patologis_kanan')->radioList(['Negative' => 'Negative', 'Positif' => 'Positif']) ?>
                                </td>
                                <td>
                                    <?= $form->field($master_pemeriksaan_fisik, 'reflek_fisiologis_patella_kiri')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>

                                    <?= $form->field($master_pemeriksaan_fisik, 'reflek_patologis_kiri')->radioList(['Negative' => 'Negative', 'Positif' => 'Positif']) ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="form-group">
                        <h4 class="header-title m-t-0 m-b-30">24. Kulit</h4>
                        <div class="row">
                            <div class="col-lg-4">
                                <?= $form->field($master_pemeriksaan_fisik, 'kulit_kulit')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                            </div>
                            <div class="col-lg-4">
                                <?= $form->field($master_pemeriksaan_fisik, 'kulit_selaput_lendir')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                            </div>

                            <div class="col-lg-4">
                                <?= $form->field($master_pemeriksaan_fisik, 'kulit_kuku')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                            </div>
                            <div style='display:none' class="col-lg-4">
                                <?= $form->field($master_pemeriksaan_fisik, 'kulit_tato')->radioList(['Ada' => 'Ada', 'Tidak Ada' => 'Tidak Ada']) ?>
                            </div>
                            <hr>
                            <div class="col-lg-12">
                                <iframe src="http://mcu.simrs.aa/body-tato/form?id=<?= $dataLayanan->no_rekam_medik ?>" style="display: block;width: 1200px;height: 720px;border: none;"></iframe>
                            </div>
                            <hr>
                        </div>

                    </div>
                    <?php
                    if ($identitas_dokter['kodejenis'] == 20) {
                    ?>

                        <hr>
                        <h1><b>I. RESUME KELAINAN YANG DIDAPAT:</b></h1>
                        <hr>
                        <?php
                        // var_dump($resume_kelainan);
                        ?>
                        <hr>
                        <button class="btn btn-primary waves-effect waves-light" type="button" data-toggle="modal" data-target=".bs-example-modal-lg">Liat Hasil Resume</button>
                        <hr>
                        <?= $form->field($master_pemeriksaan_fisik, 'hasil_body_map')->textarea(['maxlength' => true, 'rows' => 9, 'placeholder' => 'Hasil Body Map']) ?>
                        <?= $form->field($master_pemeriksaan_fisik, 'hasil_brief_survey')->textarea(['maxlength' => true, 'placeholder' => 'Hasil Brief Survey']) ?>
                        <hr>
                        <?= $form->field($master_pemeriksaan_fisik, 'no_rekam_medik')->hiddenInput(['maxlength' => true, 'value' => $dataLayanan->no_rekam_medik, 'readonly' => true])->label(false) ?>


                        <?php
                        $url = \yii\helpers\Url::to(['list-penyakit']);
                        // $model->icdt10 = "";
                        echo $form->field($master_pemeriksaan_fisik, 'icdt10')->widget(Select2::classname(), [
                            'options' => ['multiple' => true, 'placeholder' => 'Mencari Diagnosis ...'],
                            'pluginOptions' => [
                                'allowClear' => true,
                                'minimumInputLength' => 3,
                                'language' => [
                                    'errorLoading' => new JsExpression("function () { return 'Menunggu hasil cari bro...'; }"),
                                ],
                                'ajax' => [
                                    'url' => $url,
                                    'dataType' => 'json',
                                    'data' => new JsExpression('function(params) { return {q:params.term}; }')
                                ],
                                'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                                'templateResult' => new JsExpression('function(data) { return data.text; }'),
                                'templateSelection' => new JsExpression('function (data) { return data.text; }'),
                            ],
                            'pluginEvents' => [
                                "select2:select" => "function(e) { 
                                        let data = e.params.data
                                        let diagnosis_kerja = $('#masterpemeriksaanfisik-diagnosis_kerja').val()
                                        if(diagnosis_kerja==null || diagnosis_kerja=='')
                                            diagnosis_kerja += data.id
                                        else
                                            diagnosis_kerja += ','+data.id
                                        $('#masterpemeriksaanfisik-diagnosis_kerja').val(diagnosis_kerja)
                                    }",
                            ]
                        ]);


                        ?>
                        <fieldset>
                            <legend><b>VI. DIAGNOSIS DIFERENSIAL:</b></legend>
                            <?= $form->field($master_pemeriksaan_fisik, 'diagnosis_kerja')->textarea(['rows' => 6]) ?>

                        </fieldset>
                        <fieldset>
                            <legend><b>VI. KATEGORI KESEHATAN:</b></legend>
                            <?= $form->field($master_pemeriksaan_fisik, 'kategori_kesehatan')->radioList(
                                [
                                    'FIT' => 'FIT',
                                    'FIT WITH NOTE' => 'FIT WITH NOTE',
                                    'TEMPORARY UNFIT' => 'TEMPORARY UNFIT',
                                    'UNFIT' => 'UNFIT'

                                ],
                                ['select' => 'FIT']
                            ) ?>

                        </fieldset>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="col-lg-12">
        <div class="form-group">
            <?php if ($identitas_dokter['kodejenis'] == 20) { ?>
                <?= Html::submitButton('Save Pemeriksaan Fisik', ['class' => 'btn btn-success btn-block stiky', 'id' => 'btn-pemeriksaan-fisik']) ?>
            <?php } ?>
            <?php if ($identitas_dokter['kodejenis'] == 1 || $identitas_dokter['kodejenis'] == 71) { ?>
                <?= Html::submitButton('Save Pemeriksaan Fisik', ['class' => 'btn btn-success btn-block stiky', 'id' => 'btn-pemeriksaan-fisik']) ?>
            <?php } ?>
            <?php if (($identitas_dokter['kodejenis'] == 36) or $identitas_dokter['kodejenis'] == 37) { ?>
                <?= Html::submitButton('Save Pemeriksaan Fisik', ['class' => 'btn btn-success btn-block stiky', 'id' => 'btn-pemeriksaan-fisik']) ?>
            <?php } ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>


<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Hasil Lab</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <?php if (!is_null($hasil_lab)) { ?>
                        <?php foreach ($hasil_lab->lab as $items) { ?>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $items->item ?>
									<span class="badge badge-primary badge-pill"><?= $items->value ?></span>
                            </li>
                        <?php } ?>
                    <?php } ?>

                    <?php if (!is_null($hasil_mcu_mata)) { ?>
                        <?php foreach ($hasil_mcu_mata->mata as $items) { ?>
														<?php if($items->value == 1) { ?>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $modelMata->getAttributeLabel($items->item) ?>
									<span class="badge badge-primary badge-pill"><?= $items->value ?></span>
							</li>
															<?php } ?>                            

                        <?php } ?>
                    <?php } ?>
                    <?php if (!is_null($hasil_mcu_gigi)) { ?>

                        <?php foreach ($hasil_mcu_gigi->gigi as $items) { ?>
								<?php if($items->value == 1) { ?>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $modelGigi->getAttributeLabel($items->item) ?>
                                <span class="badge badge-primary badge-pill"><?= $items->value ?></span>
                            </li>
															<?php } ?>

                        <?php } ?>
                    <?php } ?>


                </ul>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->