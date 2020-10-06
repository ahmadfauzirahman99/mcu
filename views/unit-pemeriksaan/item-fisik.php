<?php

use app\assets\ItemFisikAsset;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

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
<?php $form = ActiveForm::begin(); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <div class="form-group">
                <h4 class="header-title m-t-0 m-b-30">1. Tanda Vital</h4>
                <hr>
                <?= $form->field($master_pemeriksaan_fisik, 'no_rekam_medik')->hiddenInput(['maxlength' => true])->label(false) ?>

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

    <div class="col-lg-12">
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
    <div class="col-lg-12">
        <div class="form-group">
            <?= Html::submitButton('Save Tanda Vital & Status Gizi', ['class' => 'btn btn-success btn-block']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <hr>
</div>

<div class="row">
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
                        <td><?= $form->field($master_pemeriksaan_fisik, 'tingkat_kesadaran_tampak_kesakitan')->radioList(['Tidak Tampak Kesakitan' => 'Tidak Tampak Kesakitan', 'Ya, Tampak Kesakitan' => 'Ya, Tampak Kesakitan']) ?></td>
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
                        <th>Kulit Kepal</th>
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
                            <?= $form->field($master_pemeriksaan_fisik, 'mata_penglihatan_3dimensi_kanan')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
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
                            <?= $form->field($master_pemeriksaan_fisik, 'mata_penglihatan_3dimensi_kiri')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                        </td>

                    </tr>
                    <tr>
                        <td colspan="2">
                            <?= $form->field($master_pemeriksaan_fisik, 'mata_visus_tanpa_koreksi')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($master_pemeriksaan_fisik, 'mata_visus_dengan_koreksi')->textInput(['maxlength' => true]) ?>
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
                        <th>Trachea/th>
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
                        <th>Palpasi</th>
                        <td>
                            <?= $form->field($master_pemeriksaan_fisik, 'paru_jantung_palpasi')->radioList(['Supel' => 'Supel', 'Rigit' => 'Rigit'])->label(false) ?>
                        </td>
                    </tr>
                    <tr class="tr-label">
                        <td colspan="2" class='text-center'><b>Perkusi</b></td>
                    </tr>
                    <tr class="tr-label">
                        <td>Kanan</td>
                        <td>Kiri</td>
                    </tr>
                    <tr>
                        <td>
                            <?= $form->field($master_pemeriksaan_fisik, 'paru_jantung_perkusi_iktus_kiri')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal........']) ?>

                            <?= $form->field($master_pemeriksaan_fisik, 'paru_jantung_perkusi_kiri')->radioList(['Sonor' => 'Sonor', 'Redup' => 'Redup', 'Hipersonor' => 'Hipersonor',]) ?>
                        </td>
                        <td colspan="2">
                            <?= $form->field($master_pemeriksaan_fisik, 'paru_jantung_perkusi_iktus_kanan')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal........']) ?>
                            <?= $form->field($master_pemeriksaan_fisik, 'paru_jantung_perkusi_batas_jantung_kanan')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal........']) ?>
                        </td>
                    </tr>

                </table>

                <table class="table table-bordered">
                    <tr class="tr-label">
                        <td colspan="2" class='text-center'><b>Auskultasi</b></td>
                    </tr>
                    <tr class="tr-label">
                        <td>Kanan</td>
                        <td>Kiri</td>
                    </tr>
                    <tr>
                        <td>
                            <?= $form->field($master_pemeriksaan_fisik, 'paru_jantung_auskultasi_bunyi_nafas_kanan')->radioList(['Vesikuler' => 'Vesikuler', 'Brc. Vesikuler' => 'Brc. Vesikuler',]) ?>
                        </td>
                        <td>
                            <?= $form->field($master_pemeriksaan_fisik, 'paru_jantung_auskultasi_bunyi_nafas_kiri')->radioList(['Vesikuler' => 'Vesikuler', 'Brc. Vesikuler' => 'Brc. Vesikuler',]) ?>
                        </td>
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
                        <td colspan='2'> <?= $form->field($master_pemeriksaan_fisik, 'paru_jantung_bunyi_jantung')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal.........']) ?>
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
                        <th>Abdomen</th>
                        <td>
                            <?= $form->field($master_pemeriksaan_fisik, 'abdomen')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'])->label(false) ?>
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
                    <tr>
                        <th></th>
                        <td> <?= $form->field($master_pemeriksaan_fisik, 'abdomen_ballotement_kanan')->textInput(['maxlength' => true])->label(false) ?>
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
        <div class="card-box">
            <div class="form-group">
                <h4 class="header-title m-t-0 m-b-30">15. Genitourinaria</h4>
                <table class='table table-bordered table-striped'>
                    <tr>
                        <th>Ikandung Kemih</th>
                        <td><?= $form->field($master_pemeriksaan_fisik, 'genitourinaria_kandung_kemih')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'])->label(false) ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Anus/Rektum/Perianal</th>
                        <td>
                            <?= $form->field($master_pemeriksaan_fisik, 'genitourinaria_anus')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'])->label(false) ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Genitalia Eksternal</th>
                        <td>
                            <?= $form->field($master_pemeriksaan_fisik, 'genitourinaria_genitalia_eksternal')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'])->label(false) ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Prostat (Khusus Pria)</th>
                        <td>
                            <?= $form->field($master_pemeriksaan_fisik, 'genitourinaria_prostat')->radioList(['Tidak Teraba' => 'Tidak Teraba', 'Teraba' => 'Teraba'])->label(false) ?>
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
                            <?= $form->field($master_pemeriksaan_fisik, 'tulang_atas_sensibilitas_kiri')->radioList(['Baik' => 'Baik', 'Tidak Baik']) ?>
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
                <h4 class="header-title m-t-0 m-b-30">22. Saraf dan Fungsi Luhur</h4>
                <table class="table table-bordered table-striped">
                    <tr>
                        <td>
                            <?= $form->field($master_pemeriksaan_fisik, 'reflek_fisiologis_patella_kanan')->radioList(['Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal']) ?>
                            <?= $form->field($master_pemeriksaan_fisik, 'reflek_patologis_kanan')->radioList(['Negative' => 'Negative', 'Positif' => 'Positif']) ?>
                        </td>
                    </tr>
                    <tr>
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
                <h4 class="header-title m-t-0 m-b-30">23. Kulit</h4>
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
                    <div class="col-lg-4">
                        <?= $form->field($master_pemeriksaan_fisik, 'kulit_tato')->radioList(['Ada' => 'Ada', 'Tidak Ada' => 'Tidak Ada']) ?>
                    </div>
                    <hr>
                    <div class="col-lg-12">
                    <iframe src="http://mcu.rsud-arifin.localhost/body-tato/form?id=<?= $master_pemeriksaan_fisik->no_rekam_medik ?>"style="display: block;width: 1200px;height: 650px;border: none;"></iframe>
                    </div>
                    <hr>
                    <div class="col-lg-12">
                        <?= $form->field($master_pemeriksaan_fisik, 'kulit_lain')->textarea(['rows' => 2]) ?>
                    </div>
                    <div class="col-lg-12">
                        <?= $form->field($master_pemeriksaan_fisik, 'kulit_lokasi')->textarea(['rows' => 2]) ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>