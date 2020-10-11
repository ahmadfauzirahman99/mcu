<?php

use app\components\Helper;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $jenisPekerjaan app\models\JenisPekerjaan */
/* @var $form yii\widgets\ActiveForm */

$jenisPekerjaan->jenis_pekerjaan = null;
$jenisPekerjaan->bahan_material = null;
$jenisPekerjaan->tempat_kerja = null;
$jenisPekerjaan->masa_kerja = null;
?>
<?php $identitas_dokter = Helper::getRumpun()  ?>

<h2 class="text-center">ANAMNESIS OKUPASI (khusus untuk pasien yang bekerja) </h2>
<div class="form-group">
    <?php $form = ActiveForm::begin(['id' => 'id-' . $jenisPekerjaan->formName(), 'action' => 'save-anamnesis-okupasi']); ?>

    1. Tuliskan Jenis Pekerjaan yang dilakukan sejak pertama kali, serta lama kerja di tiap perkerjaan tersebut
    <hr>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($jenisPekerjaan, 'jenis_pekerjaan')->textarea(['rows' => 2]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($jenisPekerjaan, 'bahan_material')->textarea(['rows' => 2]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($jenisPekerjaan, 'tempat_kerja')->textarea(['maxlength' => true, 'rows' => 2]) ?>
        </div>
        <div class="col-lg-12">
            <?= $form->field($jenisPekerjaan, 'masa_kerja')->textarea(['maxlength' => true, 'rows' => 2]) ?>
        </div>
        <div class="col-lg-12">
            <?= $form->field($jenisPekerjaan, 'no_rekam_medik')->hiddenInput(['maxlength' => true, 'value' => $dataLayanan->no_rekam_medik, 'readonly' => true])->label(false) ?>
        </div>
    </div>
    <?php $form->field($jenisPekerjaan, 'tanggal_created')->textInput() ?>
    <?php if ($identitas_dokter['kodejenis'] == 20 || $identitas_dokter['kodejenis'] == 1) { ?>

        <div class="form-group">
            <?= Html::submitButton('Save Jenis Pekerjaan', ['class' => 'btn btn-success btn-block', 'id' => 'btn-save-jenis-pekerjaan']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>
    <?php \yii\widgets\Pjax::begin(['id' => 'id-pjax-jenis-pekerjaan', 'timeout' => false,]); ?>

    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Jenis Pekerjaan</th>
                        <th>Bahan Material</th>
                        <th>Tempat Kerja</th>
                        <th>Masa Kerja</th>
                    </tr>

                </thead>

                <tbody>
                    <?php $jenis_pekerjaan = \app\models\JenisPekerjaan::find()
                        ->where(['no_rekam_medik' => $dataLayanan->no_rekam_medik])
                        ->andWhere(['not', ['jenis_pekerjaan' => ""]])
                        ->orderBy('id_jenis_pekerjaan DESC')->all();
                    foreach ($jenis_pekerjaan as $jns) :
                    ?>
                        <tr>
                            <td><?= $jns->jenis_pekerjaan ?></td>
                            <td><?= $jns->bahan_material ?></td>
                            <td><?= $jns->tempat_kerja ?></td>
                            <td><?= $jns->masa_kerja ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>
    <?php \yii\widgets\Pjax::end(); ?>

    <hr>
</div>

<?php
$dataBiodataUser = Yii::$app->dbRegisterMcu->createCommand("SELECT count(1), u.u_id,u.u_jabatan , ukb.* FROM `user` u LEFT JOIN user_kusioner_biodata ukb  on u.u_id  = ukb.ukb_user_id WHERE u.u_rm = '$dataLayanan->no_rekam_medik'")->queryAll();
?>
<div class="form-group">
    <p><b>2. Uraian Tugas / Pekerjaan</b> (Yang sekarang atau yang
        dianggap dapat berhubungan dengan penyakit tersebut) Tuliskan cara melakukan perkerjaan,
        deskripsikan setiap Kegiatan yang dilakukan secara mendetail,
        sejak mulai bekerja, misalnya pada pagi hari hingga selesai bekera di sore hari,
        termasuk bahan-bahan yang digunakan. Buatlah bagan alur dari tiap kegiatan yang dilakukan pekerja)
        Buat bagan alur untuk tiap kegiatan tersebut.</p>
    <?php if (Yii::$app->request->isPost) : ?>
        <h4 class="m-t-0 header-title">Data Pekerjaan</h4>
        <p class="text-muted font-14 m-b-20">Job/Perusahaan</p>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>Pekerjaan/Perusahaan Sebelum</th>
                    <th>Pekejeraan/Perusahaa Sekarang</th>
                    <th>Pekerjaan/Perusahan Dituju</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataBiodataUser as $itemPekerjaan) : ?>
                    <tr>
                        <td><?= $itemPekerjaan['ukb_krj_sebelum'] . " / " . $itemPekerjaan['ukb_krj_sebelum_perusahaan'] ?></td>
                        <td><?= $itemPekerjaan['ukb_krj_skrg'] . " / " . $itemPekerjaan['ukb_krj_skrg_perusahaan'] ?></td>
                        <td><?= $itemPekerjaan['u_jabatan'] . " / " . $itemPekerjaan['ukb_krj_dituju_perusahaan'] ?></td>
                    </tr>
                <?php endforeach ?>
                <tr>
                    <td colspan="6">
                        <table class="table">
                            <tr>
                                <td>Uraian Tugas</td>
                                <td>:</td>
                                <td>Uraian fungsi dan tanggungjawab dalam kegiatan pekerjaan</td>
                            </tr>
                            <tr>
                                <td>Target Kerja</td>
                                <td>:</td>
                                <td>Sasaran yang telah ditetapkan untuk dicapai dalam suatu pekerjaan</td>
                            </tr>
                            <tr>
                                <td>Cara Kerja</td>
                                <td>:</td>
                                <td>Tahapan yang dilakukan sehingga tercapai tujuan pekerjaan</td>
                            </tr>
                            <tr>
                                <td>Alat Kerja</td>
                                <td>:</td>
                                <td>Benda yang digunakan untuk mengerjakan sesuatu untuk mempermudah pekerjaan</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered" width="100%">
            <thead class="thead-light">
                <tr>
                    <th style="text-align: center;">URAIAN</th>
                    <th style="text-align: center;">PEKERJAAN UTAMA</th>
                    <th style="text-align: center;">PEKERJAAN TAMBAHAN</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataBiodataUser as $u) : ?>
                    <tr>
                        <td colspan="3" align="center">RIWAYAT PEKERJAAN SEBELUMNYA</td>
                    </tr>
                    <tr>
                        <td align="left">Uraian Tugas</td>
                        <td><?php echo $u['ukb_sblm_utama_uraian'] ?></td>
                        <td><?php echo $u['ukb_sblm_tambah_uraian'] ?></td>
                    </tr>
                    <tr>
                        <td align="left">Target Kerja</td>
                        <td><?php echo $u['ukb_sblm_utama_target'] ?></td>
                        <td><?php echo $u['ukb_sblm_tambah_target'] ?></td>
                    </tr>
                    <tr>
                        <td align="left">Cara Kerja</td>
                        <td><?php echo $u['ukb_sblm_utama_cara'] ?></td>
                        <td><?php echo $u['ukb_sblm_tambah_cara'] ?></td>
                    </tr>
                    <tr>
                        <td align="left">Alat Kerja</td>
                        <td><?php echo $u['ukb_sblm_utama_alat'] ?></td>
                        <td><?php echo $u['ukb_sblm_tambah_alat'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center">PEKERJAAN SEKARANG</td>
                    </tr>
                    <tr>
                        <td align="left">Uraian Tugas</td>
                        <td><?php echo $u['ukb_skrg_utama_uraian'] ?></td>
                        <td><?php echo $u['ukb_skrg_tambah_uraian'] ?></td>
                    </tr>
                    <tr>
                        <td align="left">Target Kerja</td>
                        <td><?php echo $u['ukb_skrg_utama_target'] ?></td>
                        <td><?php echo $u['ukb_skrg_tambah_target'] ?></td>
                    </tr>
                    <tr>
                        <td align="left">Cara Kerja</td>
                        <td><?php echo $u['ukb_skrg_utama_cara'] ?></td>
                        <td><?php echo $u['ukb_skrg_tambah_cara'] ?></td>
                    </tr>
                    <tr>
                        <td align="left">Alat Kerja</td>
                        <td><?php echo $u['ukb_skrg_utama_alat'] ?></td>
                        <td><?php echo $u['ukb_skrg_tambah_alat'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center">PEKERJAAN YANG DITUJU/DILAMAR</td>
                    </tr>
                    <tr>
                        <td align="left">Uraian Tugas</td>
                        <td><?php echo $u['ukb_dituju_utama_uraian'] ?></td>
                        <td><?php echo $u['ukb_dituju_tambah_uraian'] ?></td>
                    </tr>
                    <tr>
                        <td align="left">Target Kerja</td>
                        <td><?php echo $u['ukb_dituju_utama_target'] ?></td>
                        <td><?php echo $u['ukb_dituju_tambah_target'] ?></td>
                    </tr>
                    <tr>
                        <td align="left">Cara Kerja</td>
                        <td><?php echo $u['ukb_dituju_utama_cara'] ?></td>
                        <td><?php echo $u['ukb_dituju_tambah_cara'] ?></td>
                    </tr>
                    <tr>
                        <td align="left">Alat Kerja</td>
                        <td><?php echo $u['ukb_dituju_utama_alat'] ?></td>
                        <td><?php echo $u['ukb_dituju_tambah_alat'] ?></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    <?php endif ?>
    <hr>
</div>

<div class="form-group">
    <p> <b>3. Bahaya Potensial (Potential Hazard)</b>
        dan risiko kecelakan kerja pada pekerja serta pada lingkungan kerja
        (tuliskan perkiraan bahaya faktor yang mungkin ada /
        dapat terjadi pada perkerja ini dalam melukan perkerjaan yang mungkin ada di lingkungan perkerjaannya.
        Nama-Nama Kegiatan pada kolom urutan kegiatan harus sama dengan pada bagan alur pada no 2)
        Tuliskan di halaman kosong bila table dibawah ini tidak cukup besar </p>
    <hr>
</div>
<div class="form-group">
    <p> <b>4. Hubungan Pekerjaan dengan penyakit yang dialami</b>
        (gejala / keluhan yang ada) (misalnya keluhan berkurang saat libur
        atau keluhan bertambah setelah bekerja beberapa saat) </p>
    <?= $form->field($anamnesis, 'jawaban7')->textarea(['rows' => 6]) ?>

    <hr>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>Pekerjaan/Perusahaan Sebelum</th>
                <th>Pekejeraan/Perusahaa Sekarang</th>
                <th>Pekerjaan/Perusahan Dituju</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataBiodataUser as $itemPekerjaan) : ?>
                <tr>
                    <td><?= $itemPekerjaan['ukb_krj_sebelum'] . " / " . $itemPekerjaan['ukb_krj_sebelum_perusahaan'] ?></td>
                    <td><?= $itemPekerjaan['ukb_krj_skrg'] . " / " . $itemPekerjaan['ukb_krj_skrg_perusahaan'] ?></td>
                    <td><?= $itemPekerjaan['u_jabatan'] . " / " . $itemPekerjaan['ukb_krj_dituju_perusahaan'] ?></td>
                </tr>
            <?php endforeach ?>
            <tr>
                <td colspan="6">
                    <table class="table">
                        <tr>
                            <td>Uraian Tugas</td>
                            <td>:</td>
                            <td>Uraian fungsi dan tanggungjawab dalam kegiatan pekerjaan</td>
                        </tr>
                        <tr>
                            <td>Target Kerja</td>
                            <td>:</td>
                            <td>Sasaran yang telah ditetapkan untuk dicapai dalam suatu pekerjaan</td>
                        </tr>
                        <tr>
                            <td>Cara Kerja</td>
                            <td>:</td>
                            <td>Tahapan yang dilakukan sehingga tercapai tujuan pekerjaan</td>
                        </tr>
                        <tr>
                            <td>Alat Kerja</td>
                            <td>:</td>
                            <td>Benda yang digunakan untuk mengerjakan sesuatu untuk mempermudah pekerjaan</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

    <table class="table table-bordered" width="100%">
        <thead class="thead-light">
            <tr>
                <th style="text-align: center;">URAIAN</th>
                <th style="text-align: center;">PEKERJAAN UTAMA</th>
                <th style="text-align: center;">PEKERJAAN TAMBAHAN</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataBiodataUser as $u) : ?>
                <tr>
                    <td colspan="3" align="center">RIWAYAT PEKERJAAN SEBELUMNYA</td>
                </tr>
                <tr>
                    <td align="left">Uraian Tugas</td>
                    <td><?php echo $u['ukb_sblm_utama_uraian'] ?></td>
                    <td><?php echo $u['ukb_sblm_tambah_uraian'] ?></td>
                </tr>
                <tr>
                    <td align="left">Target Kerja</td>
                    <td><?php echo $u['ukb_sblm_utama_target'] ?></td>
                    <td><?php echo $u['ukb_sblm_tambah_target'] ?></td>
                </tr>
                <tr>
                    <td align="left">Cara Kerja</td>
                    <td><?php echo $u['ukb_sblm_utama_cara'] ?></td>
                    <td><?php echo $u['ukb_sblm_tambah_cara'] ?></td>
                </tr>
                <tr>
                    <td align="left">Alat Kerja</td>
                    <td><?php echo $u['ukb_sblm_utama_alat'] ?></td>
                    <td><?php echo $u['ukb_sblm_tambah_alat'] ?></td>
                </tr>
                <tr>
                    <td colspan="3" align="center">PEKERJAAN SEKARANG</td>
                </tr>
                <tr>
                    <td align="left">Uraian Tugas</td>
                    <td><?php echo $u['ukb_skrg_utama_uraian'] ?></td>
                    <td><?php echo $u['ukb_skrg_tambah_uraian'] ?></td>
                </tr>
                <tr>
                    <td align="left">Target Kerja</td>
                    <td><?php echo $u['ukb_skrg_utama_target'] ?></td>
                    <td><?php echo $u['ukb_skrg_tambah_target'] ?></td>
                </tr>
                <tr>
                    <td align="left">Cara Kerja</td>
                    <td><?php echo $u['ukb_skrg_utama_cara'] ?></td>
                    <td><?php echo $u['ukb_skrg_tambah_cara'] ?></td>
                </tr>
                <tr>
                    <td align="left">Alat Kerja</td>
                    <td><?php echo $u['ukb_skrg_utama_alat'] ?></td>
                    <td><?php echo $u['ukb_skrg_tambah_alat'] ?></td>
                </tr>
                <tr>
                    <td colspan="3" align="center">PEKERJAAN YANG DITUJU/DILAMAR</td>
                </tr>
                <tr>
                    <td align="left">Uraian Tugas</td>
                    <td><?php echo $u['ukb_dituju_utama_uraian'] ?></td>
                    <td><?php echo $u['ukb_dituju_tambah_uraian'] ?></td>
                </tr>
                <tr>
                    <td align="left">Target Kerja</td>
                    <td><?php echo $u['ukb_dituju_utama_target'] ?></td>
                    <td><?php echo $u['ukb_dituju_tambah_target'] ?></td>
                </tr>
                <tr>
                    <td align="left">Cara Kerja</td>
                    <td><?php echo $u['ukb_dituju_utama_cara'] ?></td>
                    <td><?php echo $u['ukb_dituju_tambah_cara'] ?></td>
                </tr>
                <tr>
                    <td align="left">Alat Kerja</td>
                    <td><?php echo $u['ukb_dituju_utama_alat'] ?></td>
                    <td><?php echo $u['ukb_dituju_tambah_alat'] ?></td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>
<hr>

<div class="form-group">
    <p><b>3. Bahaya Potensial (Potential Hazard)</b>
        dan risiko kecelakan kerja pada pekerja serta pada lingkungan kerja
        (tuliskan perkiraan bahaya faktor yang mungkin ada /
        dapat terjadi pada perkerja ini dalam melukan perkerjaan yang mungkin ada di lingkungan perkerjaannya.
        Nama-Nama Kegiatan pada kolom urutan kegiatan harus sama dengan pada bagan alur pada no 2)
        Tuliskan di halaman kosong bila table dibawah ini tidak cukup besar </p>
    <hr>
    <?php $form = ActiveForm::begin(['action' => 'save-bahaya-potensial', 'id' => 'id-' . $modelBahayaPotensial->formName()]); ?>
    <?= $form->field($modelBahayaPotensial, 'no_rekam_medik')->hiddenInput(['maxlength' => true, 'value' => $dataLayanan->no_rekam_medik, 'readonly' => true])->label(false) ?>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($modelBahayaPotensial, 'urutan_kegiatan')->textInput(['maxlength' => true,]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($modelBahayaPotensial, 'fisik')->textInput(['maxlength' => true,]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($modelBahayaPotensial, 'kimia')->textInput(['maxlength' => true,]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($modelBahayaPotensial, 'biologi')->textInput(['maxlength' => true,]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($modelBahayaPotensial, 'ergonomi')->textInput(['maxlength' => true,]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($modelBahayaPotensial, 'psiko')->textInput(['maxlength' => true,]) ?>
        </div>
    </div>
    <?php if ($identitas_dokter['kodejenis'] == 20 || $identitas_dokter['kodejenis'] == 1) { ?>

        <div class="form-group">
            <?= Html::submitButton('Save Bahaya Potensial', ['class' => 'btn btn-success btn-block', 'id' => 'btn-save-jenis-pekerjaan']) ?>
        </div>
    <?php } ?>
    <?php ActiveForm::end(); ?>
    <?php \yii\widgets\Pjax::begin(['id' => 'id-pjax-bahaya-potensial', 'timeout' => false,]); ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Uraian Kegiatan</th>
                <th>Fisik</th>
                <th>Kimia</th>
                <th>Biologi</th>
                <th>Ergonomi</th>
                <th>Psiko</th>
            </tr>
        </thead>
        <tbody>
            <?php $bahaya = \app\models\BahayaPotensial::find()->where(['no_rekam_medik' => $dataLayanan->no_rekam_medik])->orderBy('id_bahaya_potensial DESC')->all() ?>
            <?php foreach ($bahaya as $sebelum) : ?>
                <tr>
                    <td><?= $sebelum->urutan_kegiatan ?></td>
                    <td><?= $sebelum->fisik ?></td>
                    <td><?= $sebelum->kimia ?></td>
                    <td><?= $sebelum->biologi ?></td>
                    <td><?= $sebelum->ergonomi ?></td>
                    <td><?= $sebelum->psiko ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php \yii\widgets\Pjax::end(); ?>

</div>
<div class="form-group">
    <?php $form = ActiveForm::begin(['action' => 'save-anamnesis', 'id' => 'id-hubungan-'.$anamnesis->formName()]); ?>
    <?= $form->field($anamnesis, 'nomor_rekam_medik')->hiddenInput(['maxlength' => true, 'value' => $dataLayanan->no_rekam_medik])->label(false) ?>

    <p> <b>4. Hubungan Pekerjaan dengan penyakit yang dialami</b>
        (gejala / keluhan yang ada) (misalnya keluhan berkurang saat libur
        atau keluhan bertambah setelah bekerja beberapa saat) </p>
    <?= $form->field($anamnesis, 'jawaban8')->textarea(['rows' => 6]) ?>
    <?php if ($identitas_dokter['kodejenis'] == 20 || $identitas_dokter['kodejenis'] == 1) { ?>
        <div class="form-group">
            <?= Html::submitButton('Save Hubungan Pekerjaan', ['class' => 'btn btn-success btn-block']) ?>
        </div>
    <?php } ?>
    <hr>
    <?php ActiveForm::end(); ?>

</div>


<div class="form-group">
    <p> <b>5. Body Discomfort Map</p>
    <iframe src="http://mcu.rsud-arifin.localhost/body-discomfort/form?id=<?= $dataLayanan->no_rekam_medik ?>" style="display: block;width: 1200px;height: 720px;border: none;"></iframe>
</div>
<hr>
<div class="form-group">
    <p><b>6. BRIEF SURVEY </b></p>
    <?php $form = ActiveForm::begin(['action' => 'save-brief', 'id' => 'id_form_brief']); ?>
    <?= $form->field($modelBrief, 'no_rekam_medik')->hiddenInput(['maxlength' => true, 'value' => $dataLayanan->no_rekam_medik, 'readonly' => true])->label(false) ?>
    <div class="card card-body">

        <div class="row">
            <div class="col-lg-4">
                <?= $form->field($modelBrief, 'tangan')->radioList(['Ada Kelainan' => 'Ada Kelainan', 'Tidak Ada Kelainan' => 'Tidak Ada Kelainan']) ?>
            </div>
            <div class="col-lg-4">
                <?= $form->field($modelBrief, 'sikut')->radioList(['Ada Kelainan' => 'Ada Kelainan', 'Tidak Ada Kelainan' => 'Tidak Ada Kelainan']) ?>
            </div>
            <div class="col-lg-4">
                <?= $form->field($modelBrief, 'leher')->radioList(['Ada Kelainan' => 'Ada Kelainan', 'Tidak Ada Kelainan' => 'Tidak Ada Kelainan']) ?>
            </div>
            <div class="col-lg-4">
                <?= $form->field($modelBrief, 'punggung')->radioList(['Ada Kelainan' => 'Ada Kelainan', 'Tidak Ada Kelainan' => 'Tidak Ada Kelainan']) ?>
            </div>
            <div class="col-lg-4">
                <?= $form->field($modelBrief, 'tungkai')->radioList(['Ada Kelainan' => 'Ada Kelainan', 'Tidak Ada Kelainan' => 'Tidak Ada Kelainan']) ?>
            </div>
            <div class="col-lg-4">
                <?= $form->field($modelBrief, 'bahu')->radioList(['Ada Kelainan' => 'Ada Kelainan', 'Tidak Ada Kelainan' => 'Tidak Ada Kelainan']) ?>

            </div>
            <div class="col-lg-12">
                <hr>
                <?= Html::submitButton('Save Briey Survey', ['class' => 'btn btn-success btn-block']) ?>

            </div>
        </div>
    </div>




    <?php ActiveForm::end(); ?>
</div>