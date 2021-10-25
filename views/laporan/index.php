<?php

use app\components\Helper;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\SpesialisKejiwaan */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Laporan';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="laporan-form">
    <div id="accordion">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h6 class="m-0">
                    <a href="#collapseOne" class="text-dark" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
                        Laporan #1
                    </a>
                </h6>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <div style="overflow: scroll; width: 100%;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><center>Nama Pemeriksaan</center></th>
                                    <th><center>Tampil</center></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if (!empty($dataSetting)) {
                                    $hasil_akhir = array();
                                    $index = array();

                                    foreach ($dataSetting AS $i => $d) {
                                        $hasil_akhir[$d['nama_kategori']][] = $d;
                                        $index[] = $d['nama_kategori'];
                                    }
                                    $index = array_unique($index);

                                    foreach ($index as $idx) {
                                        $no = 0;
                                    ?>
                                    <tr class="bg-success text-white">
                                        <td colspan="3"><b> Kategori : <?= $idx ?> </b></td>
                                    </tr>
                                    <?php
                                        foreach ($hasil_akhir[$idx] as $data) {

                                            $cek = Null;
                                            if($data['tampil'] == 1) {
                                                $cek = 'checked';
                                            }
                                    ?>
                                    <tr>
                                        <th scope="row"><?= ++$no ?></th>
                                        <td align="center"><?= $data['nama_item_setting'] ?></td>
                                        <td align="center">
                                            <div class="custom-control custom-checkbox">
                                            <input id="<?= $data['id_global'] ?>" onclick="UpdateCheck(this.id)" type="checkbox" <?= $cek ?>>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    }
                                } else {
                                ?>
                                <tr class="bg-warning text-white">
                                    <th scope="row" colspan="3">Tidak Ada Data Setting Global</th>
                                </tr>
                                <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>

                    <?= Html::a('<i class="fa fa-file-excel-o"></i> Cetak Excell', ['laporan/cetak-excell'], ['data' => ['method' => 'post', 'params' => ['type' => 'Laporan1'],], 'class' => 'btn btn-success', 'target' => '_blank']) ?>
                    <?= Html::a('<i class="fa fa-file-pdf-o"></i> Cetak Pdf', ['laporan/cetak-pdf'], ['data' => ['method' => 'post', 'params' => ['type' => 'Laporan1'],], 'class' => 'btn btn-warning', 'target' => '_blank']) ?>

                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h6 class="m-0">
                    <a href="#collapseTwo" class="collapsed text-dark" data-toggle="collapse" aria-expanded="false" aria-controls="collapseTwo">
                        Collapsible Group Item #2
                    </a>
                </h6>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,
                    non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                    tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil
                    anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan
                    excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                    you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h6 class="m-0">
                    <a href="#collapseThree" class="collapsed text-dark" data-toggle="collapse" aria-expanded="false" aria-controls="collapseThree">
                        Collapsible Group Item #3
                    </a>
                </h6>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,
                    non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                    tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil
                    anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan
                    excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                    you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
    </div>

    <form method="post" action="<?= Url::to(['laporan/cetak']) ?>" name="form-lapRekap" target="_blank" class="form">
        <fieldset>
            <legend>Silahkan pilih field yang akan ditampilkan? </legend>
            <?= Html::input('hidden', 'laporan[type]', 'lapRekap') ?>
            <div class="row col-sm-12">
                <div class="col-sm-3">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="no_test">
                        <label class="custom-control-label" for="no_test">Nomor Test</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="nama">
                        <label class="custom-control-label" for="nama">Nama</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="umur">
                        <label class="custom-control-label" for="umur">Umur</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="jenis_kelamin">
                        <label class="custom-control-label" for="jenis_kelamin">Jenis Kelamin</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="pekerjaan">
                        <label class="custom-control-label" for="pekerjaan">Pekerjaan</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="tensi">
                        <label class="custom-control-label" for="tensi">Tensi (Mm/Hg)</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="tinggi">
                        <label class="custom-control-label" for="tinggi">Tinggi (cm)</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="berat">
                        <label class="custom-control-label" for="berat">Berat (Kg)</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="gigi">
                        <label class="custom-control-label" for="gigi">Gigi</label>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="tanda_vital">
                        <label class="custom-control-label" for="tanda_vital">Tanda Vital</label>
                        <div id="vital" style="display:none">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="vital_check custom-control-input" id="nadi">
                                <label class="custom-control-label" for="nadi">Nadi</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="vital_check custom-control-input" id="pernapasan">
                                <label class="custom-control-label" for="pernapasan">Pernapasan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tekanan_darah">
                                <label class="custom-control-label" for="tekanan_darah">Tekanan Darah</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="suhu_badan">
                                <label class="custom-control-label" for="suhu_badan">Suhu Badan</label>
                            </div>
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="status_gizi">
                        <label class="custom-control-label" for="status_gizi">Status Gizi</label>
                        <div id="gizi" style="display:none">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="gizi custom-control-input" id="berat_badan">
                                <label class="custom-control-label" for="berat_badan">Berat Badan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="gizi custom-control-input" id="lingkaran_perut">
                                <label class="custom-control-label" for="lingkaran_perut">Lingkaran Perut</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="gizi custom-control-input" id="lingkaran_pinggang">
                                <label class="custom-control-label" for="lingkaran_pinggang">Lingkaran Pinggang</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="gizi custom-control-input" id="bentuk_badan">
                                <label class="custom-control-label" for="bentuk_badan">Bentuk Badan</label>
                            </div>
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="kesadaran_all">
                        <label class="custom-control-label" for="kesadaran_all">Tingkat Kesadaran dan Keadaan Umum</label>
                        <div id="tampil_kesadaran" style="display:none">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="kesadaran">
                                <label class="custom-control-label" for="kesadaran">Kesadaran</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="kualitas_kontak">
                                <label class="custom-control-label" for="kualitas_kontak">Kualitas Kontak</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tampak_kesakitan">
                                <label class="custom-control-label" for="tampak_kesakitan">Tampak Kesakitan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="gangguan_berjalan">
                                <label class="custom-control-label" for="gangguan_berjalan">Gangguan Saat Berjalan</label>
                            </div>
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="getah_bening_all">
                        <label class="custom-control-label" for="getah_bening_all">Kalenjer Getah Bening</label>
                        <div id="tampil_getah_bening" style="display:none">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="getah_bening">
                                <label class="custom-control-label" for="getah_bening">Kelenjar Getah Bening</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="gb_leher">
                                <label class="custom-control-label" for="gb_leher">Leher</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sub_mandibula">
                                <label class="custom-control-label" for="sub_mandibula">Sub Mandibula</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ketiak">
                                <label class="custom-control-label" for="ketiak">Ketiak</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="inguinal">
                                <label class="custom-control-label" for="inguinal">Inguinal</label>
                            </div>
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="kepala_all">
                        <label class="custom-control-label" for="kepala_all">Kepala</label>
                        <div id="tampil_kepala" style="display:none">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="kepala">
                                <label class="custom-control-label" for="kepala">Kepala</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tulang_kepala">
                                <label class="custom-control-label" for="tulang_kepala">Tulang Kepala</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="kulit_kepala">
                                <label class="custom-control-label" for="kulit_kepala">Kulit Kepala</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="rambut_kepala">
                                <label class="custom-control-label" for="rambut_kepala">Rambut Kepala</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="bentuk_wajah">
                                <label class="custom-control-label" for="bentuk_wajah">Bentuk Wajah</label>
                            </div>
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="mata_all">
                        <label class="custom-control-label" for="mata_all">Mata</label>
                        <div id="tampil_mata" style="display:none">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="persepsi_warna_kanak">
                                <label class="custom-control-label" for="persepsi_warna_kanak">Persepsi Warna Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="persepsi_warna_kiri">
                                <label class="custom-control-label" for="persepsi_warna_kiri">Persepsi Warna Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="kelopak_mata_kanan">
                                <label class="custom-control-label" for="kelopak_mata_kanan">Kelopak Mata Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="kelopak_mata_kiri">
                                <label class="custom-control-label" for="kelopak_mata_kiri">Kelopak Mata Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="konjungtiva_kanan">
                                <label class="custom-control-label" for="konjungtiva_kanan">Konjungtiva Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="konjungtiva_kiri">
                                <label class="custom-control-label" for="konjungtiva_kiri">Konjungtiva Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="gerak_mata_kanan">
                                <label class="custom-control-label" for="gerak_mata_kanan">Gerak Bola Mata Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="gerak_mata_kiri">
                                <label class="custom-control-label" for="gerak_mata_kiri">Gerak Bola Mata Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sklera_kanan">
                                <label class="custom-control-label" for="sklera_kanan">Sklera Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sklera_kiri">
                                <label class="custom-control-label" for="sklera_kiri">Sklera Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="lensa_mata_kanan">
                                <label class="custom-control-label" for="lensa_mata_kanan">Lensa Mata Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="lensa_mata_kiri">
                                <label class="custom-control-label" for="lensa_mata_kiri">Lensa Mata Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="kornea_kanan">
                                <label class="custom-control-label" for="kornea_kanan">Kornea Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="kornea_kiri">
                                <label class="custom-control-label" for="kornea_kiri">Kornea Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="bulu_mata_kanan">
                                <label class="custom-control-label" for="bulu_mata_kanan">Bulu Mata Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="bulu_mata_kiri">
                                <label class="custom-control-label" for="bulu_mata_kiri">Bulu Mata Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tekanan_mata_kanan">
                                <label class="custom-control-label" for="tekanan_mata_kanan">Tekanan Bola Mata Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tekanan_mata_kiri">
                                <label class="custom-control-label" for="tekanan_mata_kiri">Tekanan Bola Mata Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="3dimensi_kanan">
                                <label class="custom-control-label" for="3dimensi_kanan">Penglihatan 3dimensi Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="3dimensi_kiri">
                                <label class="custom-control-label" for="3dimensi_kiri">Penglihatan 3dimensi Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="virus_tanpa_koreksi_kanan">
                                <label class="custom-control-label" for="virus_tanpa_koreksi_kanan">Visus Tanpa Koreksi Kanan (VOD)</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="virus_tanpa_koreksi_kiri">
                                <label class="custom-control-label" for="virus_tanpa_koreksi_kiri">Visus Tanpa Koreksi Kiri (VOS)</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="virus_dengan_koreksi_kanan">
                                <label class="custom-control-label" for="virus_dengan_koreksi_kanan">Visus Dengan Koreksi Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="virus_dengan_koreksi_kiri">
                                <label class="custom-control-label" for="virus_dengan_koreksi_kiri">Visus Dengan Koreksi Kiri</label>
                            </div>
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="telinga_all">
                        <label class="custom-control-label" for="telinga_all">Telinga</label>
                        <div id="tampil_telinga" style="display:none">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="telinga_kanan">
                                <label class="custom-control-label" for="telinga_kanan">Telinga Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="telinga_kiri">
                                <label class="custom-control-label" for="telinga_kiri">Telinga Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="liang_telinga_kanan">
                                <label class="custom-control-label" for="liang_telinga_kanan">Liang Telinga Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="liang_telinga_kiri">
                                <label class="custom-control-label" for="liang_telinga_kiri">Liang Telinga Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="serumen_kanan">
                                <label class="custom-control-label" for="serumen_kanan">Serumen Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="serumen_kiri">
                                <label class="custom-control-label" for="serumen_kiri">Serumen Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="membran_timpani_kanan">
                                <label class="custom-control-label" for="membran_timpani_kanan">Membran Timpani Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="membran_timpani_kiri">
                                <label class="custom-control-label" for="membran_timpani_kiri">Membran Timpani Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="test_berbisik_kanan">
                                <label class="custom-control-label" for="test_berbisik_kanan">Test Berbisik Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="test_berbisik_kiri">
                                <label class="custom-control-label" for="test_berbisik_kiri">Test Berbisik Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="test_garpu_tala_kanan">
                                <label class="custom-control-label" for="test_garpu_tala_kanan">Tes Garpu Tala Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="test_garpu_tala_kiri">
                                <label class="custom-control-label" for="test_garpu_tala_kiri">Tes Garpu Tala Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="weber_kanan">
                                <label class="custom-control-label" for="weber_kanan">Weber Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="weber_kiri">
                                <label class="custom-control-label" for="weber_kiri">Weber Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="swabach_kanan">
                                <label class="custom-control-label" for="swabach_kanan">Swabach Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="swabach_kiri">
                                <label class="custom-control-label" for="swabach_kiri">Swabach Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="bing_kanan">
                                <label class="custom-control-label" for="bing_kanan">Bing Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="bing_kiri">
                                <label class="custom-control-label" for="bing_kiri">Bing Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="audiometri_kanan">
                                <label class="custom-control-label" for="audiometri_kanan">Telinga Audiometri Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="audiometri_kiri">
                                <label class="custom-control-label" for="audiometri_kiri">Telinga Audiometri Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="telinga_kanan_lainnya">
                                <label class="custom-control-label" for="telinga_kanan_lainnya">Telinga Kanan Lainnya</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="telinga_kiri_lainnya">
                                <label class="custom-control-label" for="telinga_kiri_lainnya">Telinga Kiri Lainnya</label>
                            </div>
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="hidung_all">
                        <label class="custom-control-label" for="hidung_all">Hidung</label>
                        <div id="tampil_hidung" style="display:none">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="hd_meatus_nasi">
                                <label class="custom-control-label" for="hd_meatus_nasi">Hidung Meatus Nasi</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="hd_septum_nasi">
                                <label class="custom-control-label" for="hd_septum_nasi">Hidung Septum Nasi</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="hd_konka_nasal">
                                <label class="custom-control-label" for="hd_konka_nasal">Hidung Konka Nasal</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="hd_nyeri_ketok_sinus">
                                <label class="custom-control-label" for="hd_nyeri_ketok_sinus">Hidung Nyeri Ketok Sinus</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="hd_penciuman">
                                <label class="custom-control-label" for="hd_penciuman">Hidung Penciuman</label>
                            </div>
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="mulut_bibir_all">
                        <label class="custom-control-label" for="mulut_bibir_all">Mulut dan Bibir</label>
                        <div id="tampil_mulut_bibir" style="display:none">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="mulut_bibir">
                                <label class="custom-control-label" for="mulut_bibir">Mulut Bibir</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="mulut_lidah">
                                <label class="custom-control-label" for="mulut_lidah">Mulut Lidah</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="mulut_gusi">
                                <label class="custom-control-label" for="mulut_gusi">Mulut Gusi</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="mulut_lainnya">
                                <label class="custom-control-label" for="mulut_lainnya">Mulut Lainnya</label>
                            </div>
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="tenggorokan_all">
                        <label class="custom-control-label" for="tenggorokan_all">Tenggorokan</label>
                        <div id="tampil_tenggorokan" style="display:none">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tenggorokan">
                                <label class="custom-control-label" for="tenggorokan">Tenggorokan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tg_pharynx">
                                <label class="custom-control-label" for="tg_pharynx">Tenggorokan Pharynx</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tg_tonsil_kanan">
                                <label class="custom-control-label" for="tg_tonsil_kanan">Tenggorokan Tonsil Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tg_tonsil_kiri">
                                <label class="custom-control-label" for="tg_tonsil_kiri">Tenggorokan Tonsil Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tg_tonsil_ukuran_kanan">
                                <label class="custom-control-label" for="tg_tonsil_ukuran_kanan">Tenggorokan Tonsil Ukuran Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tg_tonsil_ukuran_kiri">
                                <label class="custom-control-label" for="tg_tonsil_ukuran_kiri">Tenggorokan Tonsil Ukuran Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tg_palatum">
                                <label class="custom-control-label" for="tg_palatum">Tenggorokan Palatum</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tg_lain">
                                <label class="custom-control-label" for="tg_lain">Tenggorokan Lain</label>
                            </div>
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="leher_all">
                        <label class="custom-control-label" for="leher_all">Leher</label>
                        <div id="tampil_leher" style="display:none">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="Leher">
                                <label class="custom-control-label" for="Leher">Leher</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="gerakan_Leher">
                                <label class="custom-control-label" for="gerakan_Leher">Leher Gerakan Leher</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="otot_leher">
                                <label class="custom-control-label" for="otot_leher">Leher Otot Leher</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="kelenjar_thyroid">
                                <label class="custom-control-label" for="kelenjar_thyroid">Leher Kelenjar Thyroid</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="pulsasi_carotis">
                                <label class="custom-control-label" for="pulsasi_carotis">Leher Pulsasi Carotis</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tekanan_vena_jugularis">
                                <label class="custom-control-label" for="tekanan_vena_jugularis">Leher Tekanan Vena Jugularis</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="Leher_trakea">
                                <label class="custom-control-label" for="Leher_trakea">Leher Trachea</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="Leher_lainnya">
                                <label class="custom-control-label" for="Leher_lainnya">Leher Lainnya</label>
                            </div>
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="dada_all">
                        <label class="custom-control-label" for="dada_all">Dada</label>
                        <div id="tampil_dada" style="display:none">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="dada">
                                <label class="custom-control-label" for="dada">Dada</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="dada_bentuk">
                                <label class="custom-control-label" for="dada_bentuk">Dada Bentuk</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="dada_mamae">
                                <label class="custom-control-label" for="dada_mamae">Dada Mamae</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tumor_ukuran">
                                <label class="custom-control-label" for="tumor_ukuran">Dada Tumor Ukuran</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tumor_letak">
                                <label class="custom-control-label" for="tumor_letak">Dada Tumor Letak</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tumor_konsisten">
                                <label class="custom-control-label" for="tumor_konsisten">Dada Tumor Konsisten</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="dada_lainnya">
                                <label class="custom-control-label" for="dada_lainnya">Dada Lainnya</label>
                            </div>
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="paru_jantung_all">
                        <label class="custom-control-label" for="paru_jantung_all">Paru-Paru dan Jantung</label>
                        <div id="tampil_paru_jantung" style="display:none">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="paru">
                                <label class="custom-control-label" for="paru">Paru</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="palpasi">
                                <label class="custom-control-label" for="palpasi">Paru Jantung Palpasi</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="perkusi_iktus_kanan">
                                <label class="custom-control-label" for="perkusi_iktus_kanan">Paru Jantung Perkusi Iktus Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="perkusi_iktus_kiri">
                                <label class="custom-control-label" for="perkusi_iktus_kiri">Paru Jantung Perkusi Iktus Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="perkusi_kanan">
                                <label class="custom-control-label" for="perkusi_kanan">Paru Jantung Perkusi Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="perkusi_kiri">
                                <label class="custom-control-label" for="perkusi_kiri">Paru Jantung Perkusi Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="bunyi_nafas_kanan">
                                <label class="custom-control-label" for="bunyi_nafas_kanan">Paru Jantung Auskultasi Bunyi Nafas Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="bunyi_nafas_kiri">
                                <label class="custom-control-label" for="bunyi_nafas_kiri">Paru Jantung Auskultasi Bunyi Nafas Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="bunyi_nafas_tambah_kanan">
                                <label class="custom-control-label" for="bunyi_nafas_tambah_kanan">Paru Jantung Auskultasi Bunyi Nafas Tambah Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="bunyi_nafas_tambah_kiri">
                                <label class="custom-control-label" for="bunyi_nafas_tambah_kiri">Paru Jantung Auskultasi Bunyi Nafas Tambah Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="bunyi_jantung">
                                <label class="custom-control-label" for="bunyi_jantung">Paru Jantung Bunyi Jantung</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="abdomen_all">
                        <label class="custom-control-label" for="abdomen_all">Abdomen</label>
                        <div id="tampil_abdomen" style="display:none">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="abdomen">
                                <label class="custom-control-label" for="abdomen">Abdomen</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="abdomen_perkusi">
                                <label class="custom-control-label" for="abdomen_perkusi">Abdomen Perkusi</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="bising_usus">
                                <label class="custom-control-label" for="bising_usus">Abdomen Auskultasi Bising Usus</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="abdomen_hati">
                                <label class="custom-control-label" for="abdomen_hati">Abdomen Hati</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="abdomen_limpa">
                                <label class="custom-control-label" for="abdomen_limpa">Abdomen Limpa</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ginjal_kanan">
                                <label class="custom-control-label" for="ginjal_kanan">Abdomen Ginjal Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ginjal_kiri">
                                <label class="custom-control-label" for="ginjal_kiri">Abdomen Ginjal Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ballotement_kanan">
                                <label class="custom-control-label" for="ballotement_kanan">Abdomen Ballotement Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ballotement_kiri">
                                <label class="custom-control-label" for="ballotement_kiri">Abdomen Ballotement Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="vertebrae_kanan">
                                <label class="custom-control-label" for="vertebrae_kanan">Abdomen Nyeri Costo Vertebrae Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="vertebrae_kiri">
                                <label class="custom-control-label" for="vertebrae_kiri">Abdomen Nyeri Costo Vertebrae Kiri</label>
                            </div>
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="genitourinaria_all">
                        <label class="custom-control-label" for="genitourinaria_all">Genitourinaria</label>
                        <div id="tampil_genitourinaria" style="display:none">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="genitourinaria">
                                <label class="custom-control-label" for="genitourinaria">Genitourinaria</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="kandung_kemih">
                                <label class="custom-control-label" for="kandung_kemih">Genitourinaria Kandung Kemih</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="anus">
                                <label class="custom-control-label" for="anus">Genitourinaria Anus</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="genitalia_eksternal">
                                <label class="custom-control-label" for="genitalia_eksternal">Genitourinaria Genitalia Eksternal</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="prostat">
                                <label class="custom-control-label" for="prostat">Genitourinaria Prostat</label>
                            </div>
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="vertebra_all">
                        <label class="custom-control-label" for="vertebra_all">Vertebra</label>
                        <div id="tampil_vertebra" style="display:none">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="vertebra">
                                <label class="custom-control-label" for="vertebra">Vertebra</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="vertebra_lainnya">
                                <label class="custom-control-label" for="vertebra_lainnya">Vertebra Lainnya</label>
                            </div>
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="ta_sendi_all">
                        <label class="custom-control-label" for="ta_sendi_all">Tulang / Sendi (Ekstremitas Atas)</label>
                        <div id="tampil_ta_sendi" style="display:none">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ta_simetris">
                                <label class="custom-control-label" for="ta_simetris">Tulang Atas Simetris</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ta_neer_kanan">
                                <label class="custom-control-label" for="ta_neer_kanan">Tulang Atas Gerakan Abduksi Neer Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ta_neer_kiri">
                                <label class="custom-control-label" for="ta_neer_kiri">Tulang Atas Gerakan Abduksi Neer Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ta_hawkin_kanan">
                                <label class="custom-control-label" for="ta_hawkin_kanan">Tulang Atas Gerakan Abduksi Hawkin Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ta_hawkin_kiri">
                                <label class="custom-control-label" for="ta_hawkin_kiri">Tulang Atas Gerakan Abduksi Hawkin Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ta_arm_kanan">
                                <label class="custom-control-label" for="ta_arm_kanan">Tulang Atas Gerakan Drop Arm Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ta_arm_kiri">
                                <label class="custom-control-label" for="ta_arm_kiri">Tulang Atas Gerakan Drop Arm Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ta_yergason_kanan">
                                <label class="custom-control-label" for="ta_yergason_kanan">Tulang Atas Gerakan Yergason Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ta_yergason_kiri">
                                <label class="custom-control-label" for="ta_yergason_kiri">Tulang Atas Gerakan Yergason Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ta_speed_kanan">
                                <label class="custom-control-label" for="ta_speed_kanan">Tulang Atas Gerakan Speed Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ta_speed_kiri">
                                <label class="custom-control-label" for="ta_speed_kiri">Tulang Atas Gerakan Speed Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ta_tulang_kanan">
                                <label class="custom-control-label" for="ta_tulang_kanan">Tulang Atas Tulang Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ta_tulang_kiri">
                                <label class="custom-control-label" for="ta_tulang_kiri">Tulang Atas Tulang Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ta_sensibilitas_kanan">
                                <label class="custom-control-label" for="ta_sensibilitas_kanan">Tulang Atas Sensibilitas Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ta_sensibilitas_kiri">
                                <label class="custom-control-label" for="ta_sensibilitas_kiri">Tulang Atas Sensibilitas Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ta_oedem_kanan">
                                <label class="custom-control-label" for="ta_oedem_kanan">Tulang Atas Oedem Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ta_oedem_kiri">
                                <label class="custom-control-label" for="ta_oedem_kiri">Tulang Atas Oedem Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ta_varises_kanan">
                                <label class="custom-control-label" for="ta_varises_kanan">Tulang Atas Varises Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ta_varises_kiri">
                                <label class="custom-control-label" for="ta_varises_kiri">Tulang Atas Varises Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ta_otot_pin_prick_kanan">
                                <label class="custom-control-label" for="ta_otot_pin_prick_kanan">Tulang Atas Kekuatan Otot Pin Prick Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ta_otot_pin_prick_kiri">
                                <label class="custom-control-label" for="ta_otot_pin_prick_kiri">Tulang Atas Kekuatan Otot Pin Prick Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ta_otot_phallent_kanan">
                                <label class="custom-control-label" for="ta_otot_phallent_kanan">Tulang Atas Kekuatan Otot Phallent Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ta_otot_phallent_kiri">
                                <label class="custom-control-label" for="ta_otot_phallent_kiri">Tulang Atas Kekuatan Otot Phallent Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ta_otot_tinnel_kanan">
                                <label class="custom-control-label" for="ta_otot_tinnel_kanan">Tulang Atas Kekuatan Otot Tinnel Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ta_otot_tinnel_kiri">
                                <label class="custom-control-label" for="ta_otot_tinnel_kiri">Tulang Atas Kekuatan Otot Tinnel Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ta_otot_finskelstein_kanan">
                                <label class="custom-control-label" for="ta_otot_finskelstein_kanan">Tulang Atas Kekuatan Otot Finskelstein Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ta_otot_finskelstein_kiri">
                                <label class="custom-control-label" for="ta_otot_finskelstein_kiri">Tulang Atas Kekuatan Otot Finskelstein Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ta_vaskularisasi_kanan">
                                <label class="custom-control-label" for="ta_vaskularisasi_kanan">Tulang Atas Vaskularisasi Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ta_vaskularisasi_kiri">
                                <label class="custom-control-label" for="ta_vaskularisasi_kiri">Tulang Atas Vaskularisasi Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ta_kukujari_kanan">
                                <label class="custom-control-label" for="ta_kukujari_kanan">Tulang Atas Kelaianan Kukujari Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ta_kukujari_kiri">
                                <label class="custom-control-label" for="ta_kukujari_kiri">Tulang Atas Kelaianan Kukujari Kiri</label>
                            </div>
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="tb_sendi_all">
                        <label class="custom-control-label" for="tb_sendi_all">Tulang / Sendi (Ektremitas Bawah)</label>
                        <div id="tampil_tb_sendi" style="display:none">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tb_simetris">
                                <label class="custom-control-label" for="tb_simetris">Tulang Bawah Simetris</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tb_laseque_kanan">
                                <label class="custom-control-label" for="tb_laseque_kanan">Tulang Bawah Laseque Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tb_laseque_kiri">
                                <label class="custom-control-label" for="tb_laseque_kiri">Tulang Bawah Laseque Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tb_karnique_kanan">
                                <label class="custom-control-label" for="tb_karnique_kanan">Tulang Bawah Kernique Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tb_karnique_kiri">
                                <label class="custom-control-label" for="tb_karnique_kiri">Tulang Bawah Kernique Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tb_patrick_kanan">
                                <label class="custom-control-label" for="tb_patrick_kanan">Tulang Bawah Patrick Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tb_patrick_kiri">
                                <label class="custom-control-label" for="tb_patrick_kiri">Tulang Bawah Patrick Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tb_contrapatrick_kanan">
                                <label class="custom-control-label" for="tb_contrapatrick_kanan">Tulang Bawah Contrapatrick Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tb_contrapatrick_kiri">
                                <label class="custom-control-label" for="tb_contrapatrick_kiri">Tulang Bawah Contrapatrick Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tb_tekanan_kanan">
                                <label class="custom-control-label" for="tb_tekanan_kanan">Tulang Bawah Nyeri Tekanan Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tb_tekanan_kiri">
                                <label class="custom-control-label" for="tb_tekanan_kiri">Tulang Bawah Nyeri Tekanan Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tb_otot_kanan">
                                <label class="custom-control-label" for="tb_otot_kanan">Tulang Bawah Kekuatan Otot Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tb_otot_kiri">
                                <label class="custom-control-label" for="tb_otot_kiri">Tulang Bawah Kekuatan Otot Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tb_sensibilitas_kanan">
                                <label class="custom-control-label" for="tb_sensibilitas_kanan">Tulang Bawah Sensibilitas Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tb_sensibilitas_kiri">
                                <label class="custom-control-label" for="tb_sensibilitas_kiri">Tulang Bawah Sensibilitas Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tb_oedema_kanan">
                                <label class="custom-control-label" for="tb_oedema_kanan">Tulang Bawah Oedema Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tb_oedema_kiri">
                                <label class="custom-control-label" for="tb_oedema_kiri">Tulang Bawah Oedema Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tb_vaskularisasi_kanan">
                                <label class="custom-control-label" for="tb_vaskularisasi_kanan">Tulang Bawah Vaskularisasi Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tb_vaskularisasi_kiri">
                                <label class="custom-control-label" for="tb_vaskularisasi_kiri">Tulang Bawah Vaskularisasi Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tb_kuku_kanan">
                                <label class="custom-control-label" for="tb_kuku_kanan">Tulang Bawah Kelainan Kuku Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tb_kuku_kiri">
                                <label class="custom-control-label" for="tb_kuku_kiri">Tulang Bawah Kelainan Kuku Kiri</label>
                            </div>
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="otot_motorik_all">
                        <label class="custom-control-label" for="otot_motorik_all">Otot Motorik (Secara Keseluruhan)</label>
                        <div id="tampil_otot_motorik" style="display:none">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="om_trofi_kanan">
                                <label class="custom-control-label" for="om_trofi_kanan">Otot Motorik Trofi Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="om_trofi_kiri">
                                <label class="custom-control-label" for="om_trofi_kiri">Otot Motorik Trofi Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="om_tonus_kanan">
                                <label class="custom-control-label" for="om_tonus_kanan">Otot Motorik Tonus Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="om_tonus_kiri">
                                <label class="custom-control-label" for="om_tonus_kiri">Otot Motorik Tonus Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="om_abnormal_kanan">
                                <label class="custom-control-label" for="om_abnormal_kanan">Otot Motorik Gerakan Abnormal Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="om_abnormal_kiri">
                                <label class="custom-control-label" for="om_abnormal_kiri">Otot Motorik Gerakan Abnormal Kiri</label>
                            </div>
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="fs_fa_all">
                        <label class="custom-control-label" for="fs_fa_all">Fungsi Sensorik dan Autonom</label>
                        <div id="tampil_fs_fa" style="display:none">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="fs_kanan">
                                <label class="custom-control-label" for="fs_kanan">Fungsi Sensorik Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="fs_kiri">
                                <label class="custom-control-label" for="fs_kiri">Fungsi Sensorik Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="fa_kanan">
                                <label class="custom-control-label" for="fa_kanan">Fungsi Autonom Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="fa_kiri">
                                <label class="custom-control-label" for="fa_kiri">Fungsi Autonom Kiri</label>
                            </div>
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="saraf_all">
                        <label class="custom-control-label" for="saraf_all">Saraf dan Fungsi Luhur</label>
                        <div id="tampil_saraf" style="display:none">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sdi_segera">
                                <label class="custom-control-label" for="sdi_segera">Saraf Daya Ingat Segera</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sdi_menengah">
                                <label class="custom-control-label" for="sdi_menengah">Saraf Daya Ingat Jangka Menengah</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sdi_pendek">
                                <label class="custom-control-label" for="sdi_pendek">Saraf Daya Ingat Jangka Pendek</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sdi_panjang">
                                <label class="custom-control-label" for="sdi_panjang">Saraf Daya Ingat Jangka Panjang</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="so_waktu">
                                <label class="custom-control-label" for="so_waktu">Saraf Orientasi Waktu</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="so_orang">
                                <label class="custom-control-label" for="so_orang">Saraf Orientasi Orang</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="so_tempat">
                                <label class="custom-control-label" for="so_tempat">Saraf Orientasi Tempat</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sk_n_i">
                                <label class="custom-control-label" for="sk_n_i">Saraf Kesan N I</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sk_n_ii">
                                <label class="custom-control-label" for="sk_n_ii">Saraf Kesan N II</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sk_n_iii">
                                <label class="custom-control-label" for="sk_n_iii">Saraf Kesan N III</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sk_n_iv">
                                <label class="custom-control-label" for="sk_n_iv">Saraf Kesan N IV</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sk_n_v">
                                <label class="custom-control-label" for="sk_n_v">Saraf Kesan N V</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sk_n_vi">
                                <label class="custom-control-label" for="sk_n_vi">Saraf Kesan N VI</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sk_n_vii">
                                <label class="custom-control-label" for="sk_n_vii">Saraf Kesan N VII</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sk_n_viii">
                                <label class="custom-control-label" for="sk_n_viii">Saraf Kesan N VIII</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sk_n_ix">
                                <label class="custom-control-label" for="sk_n_ix">Saraf Kesan N IX</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sk_n_x">
                                <label class="custom-control-label" for="sk_n_x">Saraf Kesan N X</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sk_n_xi">
                                <label class="custom-control-label" for="sk_n_xi">Saraf Kesan N XI</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sk_n_xii">
                                <label class="custom-control-label" for="sk_n_xii">Saraf Kesan N XII</label>
                            </div>
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="refleks_all">
                        <label class="custom-control-label" for="refleks_all">Refleks</label>
                        <div id="tampil_refleks" style="display:none">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="rf_patella_kanan">
                                <label class="custom-control-label" for="rf_patella_kanan">Reflek Fisiologis Patella Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="rf_patella_kiri">
                                <label class="custom-control-label" for="rf_patella_kiri">Reflek Fisiologis Patella Kiri</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="rf_patologis_kanan">
                                <label class="custom-control-label" for="rf_patologis_kanan">Reflek Patologis Kanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="rf_patologis_kiri">
                                <label class="custom-control-label" for="rf_patologis_kiri">Reflek Patologis Kiri</label>
                            </div>
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="kulit_all">
                        <label class="custom-control-label" for="kulit_all">Kulit</label>
                        <div id="tampil_kulit" style="display:none">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="kulit">
                                <label class="custom-control-label" for="kulit">Kulit</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="selaput_lendir">
                                <label class="custom-control-label" for="selaput_lendir">Selaput Lendir</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="kuku">
                                <label class="custom-control-label" for="kuku">Kuku</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="tato">
                                <label class="custom-control-label" for="tato">Tato</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="lokasi_kulit">
                                <label class="custom-control-label" for="lokasi_kulit">Lokasi Kulit</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="lain">
                                <label class="custom-control-label" for="lain">Lain</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="urine_rutin">
                        <label class="custom-control-label" for="urine_rutin">Urine Rutin</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="darah_rutin">
                        <label class="custom-control-label" for="darah_rutin">Darah Rutin</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="kimia_klinik">
                        <label class="custom-control-label" for="kimia_klinik">Kimia Klinik</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="hbsag">
                        <label class="custom-control-label" for="hbsag">HBsAg</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="rontgen">
                        <label class="custom-control-label" for="rontgen">Rontgen</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="ekg">
                        <label class="custom-control-label" for="ekg">EKG</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="wawancara_psikiatri">
                        <label class="custom-control-label" for="wawancara_psikiatri">Wawancara Psikiatri</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="narkoba">
                        <label class="custom-control-label" for="narkoba">Narkoba</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="laik_kerja">
                        <label class="custom-control-label" for="laik_kerja">Laik Kerja</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="keterangan">
                        <label class="custom-control-label" for="keterangan">Keterangan</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="check custom-control-input" id="score">
                        <label class="custom-control-label" for="score">Score</label>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <div class="col-sm-3">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="check custom-control-input" id="urine_rutin">
            <label class="custom-control-label" for="urine_rutin">Urine Rutin</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="check custom-control-input" id="darah_rutin">
            <label class="custom-control-label" for="darah_rutin">Darah Rutin</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="check custom-control-input" id="kimia_klinik">
            <label class="custom-control-label" for="kimia_klinik">Kimia Klinik</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="check custom-control-input" id="hbsag">
            <label class="custom-control-label" for="hbsag">HBsAg</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="check custom-control-input" id="rontgen">
            <label class="custom-control-label" for="rontgen">Rontgen</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="check custom-control-input" id="ekg">
            <label class="custom-control-label" for="ekg">EKG</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="check custom-control-input" id="wawancara_psikiatri">
            <label class="custom-control-label" for="wawancara_psikiatri">Wawancara Psikiatri</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="check custom-control-input" id="narkoba">
            <label class="custom-control-label" for="narkoba">Narkoba</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="check custom-control-input" id="laik_kerja">
            <label class="custom-control-label" for="laik_kerja">Laik Kerja</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="check custom-control-input" id="keterangan">
            <label class="custom-control-label" for="keterangan">Keterangan</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="check custom-control-input" id="score">
            <label class="custom-control-label" for="score">Score</label>
        </div>
    </div> 
</div>  
    <br>
    </fieldset>  
    <?= Html::submitButton(Yii::t('app', '<i class="far fa-file-excel"></i> Export Excel'), ['id'=>'exportExcel','class' => 'btn btn-success','name'=>'submit','value'=>'excel']) ?> &nbsp; &nbsp; 
    <?= Html::submitButton('<i class="fa fa-print"></i> Cetak PDF',['class'=>'btn ink-reaction btn-warning', 'id'=>'PrintRekap',]) ?>
    <?= Html::hiddenInput(Yii::$app->request->csrfParam,Yii::$app->request->csrfToken) ?>
</form>

</div>
<script>
    function UpdateCheck(id) {
    alert(id);
    }
</script>

<?php
$script = <<< JS

// var datastring = $("#PilihFieldRekap").serialize();
// alert(datastring);

$(document).ready(function() {   
    // Iterate each checkbox
    $('.check').each(function() {
        this.checked = true;                        
    });
});


// function showHideSub(isChecked){
//     if(isChecked){
//         $("#gizi").show()
//     }else{
//         $("#gizi").hide()
//         //$("#gizi input[type=checkbox]").removeAttr("checked");
//     }
// }

$('#tanda_vital').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $("#vital").hide()
    } else {
        $("#vital").show()
    }
});

$('#gizi_all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $("#tampil_gizi").hide()
    } else {
        $("#tampil_gizi").show()
    }
});

$('#kesadaran_all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $("#tampil_kesadaran").hide()
    } else {
        $("#tampil_kesadaran").show()
    }
});

$('#getah_bening_all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $("#tampil_getah_bening").hide()
    } else {
        $("#tampil_getah_bening").show()
    }
});

$('#kepala_all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $("#tampil_kepala").hide()
    } else {
        $("#tampil_kepala").show()
    }
});

$('#mata_all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $("#tampil_mata").hide()
    } else {
        $("#tampil_mata").show()
    }
});

$('#telinga_all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $("#tampil_telinga").hide()
    } else {
        $("#tampil_telinga").show()
    }
});

$('#hidung_all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $("#tampil_hidung").hide()
    } else {
        $("#tampil_hidung").show()
    }
});

$('#mulut_bibir_all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $("#tampil_mulut_bibir").hide()
    } else {
        $("#tampil_mulut_bibir").show()
    }
});

$('#tenggorokan_all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $("#tampil_tenggorokan").hide()
    } else {
        $("#tampil_tenggorokan").show()
    }
});

$('#leher_all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $("#tampil_leher").hide()
    } else {
        $("#tampil_leher").show()
    }
});

$('#dada_all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $("#tampil_dada").hide()
    } else {
        $("#tampil_dada").show()
    }
});

$('#paru_jantung_all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $("#tampil_paru_jantung").hide()
    } else {
        $("#tampil_paru_jantung").show()
    }
});

$('#abdomen_all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $("#tampil_abdomen").hide()
    } else {
        $("#tampil_abdomen").show()
    }
});

$('#genitourinaria_all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $("#tampil_genitourinaria").hide()
    } else {
        $("#tampil_genitourinaria").show()
    }
});

$('#vertebra_all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $("#tampil_vertebra").hide()
    } else {
        $("#tampil_vertebra").show()
    }
});

$('#ta_sendi_all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $("#tampil_ta_sendi").hide()
    } else {
        $("#tampil_ta_sendi").show()
    }
});

$('#tb_sendi_all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $("#tampil_tb_sendi").hide()
    } else {
        $("#tampil_tb_sendi").show()
    }
});

$('#otot_motorik_all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $("#tampil_otot_motorik").hide()
    } else {
        $("#tampil_otot_motorik").show()
    }
});

$('#fs_fa_all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $("#tampil_fs_fa").hide()
    } else {
        $("#tampil_fs_fa").show()
    }
});

$('#saraf_all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $("#tampil_saraf").hide()
    } else {
        $("#tampil_saraf").show()
    }
});

$('#refleks_all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $("#tampil_refleks").hide()
    } else {
        $("#tampil_refleks").show()
    }
});

$('#kulit_all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $("#tampil_kulit").hide()
    } else {
        $("#tampil_kulit").show()
    }
});

//Aksinya
// $("#PrintRekap").on('click',function(){
//     var no_test= $("#no_test").val();
//     var nama= $("#nama").val();
//     var umur= $("#umur").val();
//     var jenis_kelamin= $("#jenis_kelamin").val();
//     alert(no_test);
// })

JS;
$this->registerJs($script);
?>