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
                    <div style="overflow: scroll; width: 100%; height: 500px">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>
                                        <center>Nama Pemeriksaan</center>
                                    </th>
                                    <th>
                                        <center>Tampil</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($dataSetting)) {
                                    $hasil_akhir = array();
                                    $index = array();

                                    foreach ($dataSetting as $i => $d) {
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
                                            if ($data['tampil'] == 1) {
                                                $cek = 'checked';
                                            }
                                        ?>
                                            <tr>
                                                <th scope="row"><?= ++$no ?></th>
                                                <td align="center"><?= $data['nama_item_setting'] ?></td>
                                                <td align="center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input id="<?= $data['id_global'] ?>" onclick="UpdateCheck(this.id)" value="<?= $data['tampil'] ?>" type="checkbox" <?= $cek ?>>
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

                    <?= Html::a('<i class="fa fa-file-excel-o"></i> Cetak Excell', ['laporan/cetak-excell'], ['data' => ['method' => 'post', 'params' => ['type' => 'LaporanPaket', 'KodeDebitur'=> '0129'],], 'class' => 'btn btn-success', 'target' => '_blank']) ?>
                    <?= Html::a('<i class="fa fa-file-pdf-o"></i> Cetak Pdf', ['laporan/cetak-pdf'], ['data' => ['method' => 'post', 'params' => ['type' => 'lapRekapPaketPdf', 'KodeDebitur'=> '0129'],], 'class' => 'btn btn-warning', 'target' => '_blank']) ?>

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
        <?= Html::input('hidden', 'laporan[type]', 'lapRekap') ?>
            
        <?= Html::submitButton(Yii::t('app', '<i class="far fa-file-excel"></i> Export Excel'), ['id' => 'exportExcel', 'class' => 'btn btn-success', 'name' => 'submit', 'value' => 'excel']) ?> &nbsp; &nbsp;
        <?= Html::submitButton('<i class="fa fa-print"></i> Cetak PDF', ['class' => 'btn ink-reaction btn-warning']) ?>
        <?= Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->csrfToken) ?>
    </form>

</div>
<script>
    function UpdateCheck(id) {
        var checkedValue = $('#' + id).val();
        var id = id;

        $.ajax({
            url: '<?= Yii::$app->urlManager->createUrl('laporan/update-check') ?>',
            data: {
                checkedValue: checkedValue,
                id: id
            },
            dataType: 'json',
            type: 'POST',
            success: function(output) {

                if (output.code == "200") {

                    toastr.success(output.msg);

                } else {
                    toastr.warning(output.msg);
                }

            }
        });
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

// $('#tanda_vital').click(function(event) {   
//     if(this.checked) {
//         // Iterate each checkbox
//         $("#vital").hide()
//     } else {
//         $("#vital").show()
//     }
// });

// $('#gizi_all').click(function(event) {   
//     if(this.checked) {
//         // Iterate each checkbox
//         $("#tampil_gizi").hide()
//     } else {
//         $("#tampil_gizi").show()
//     }
// });

// $('#kesadaran_all').click(function(event) {   
//     if(this.checked) {
//         // Iterate each checkbox
//         $("#tampil_kesadaran").hide()
//     } else {
//         $("#tampil_kesadaran").show()
//     }
// });

// $('#getah_bening_all').click(function(event) {   
//     if(this.checked) {
//         // Iterate each checkbox
//         $("#tampil_getah_bening").hide()
//     } else {
//         $("#tampil_getah_bening").show()
//     }
// });

// $('#kepala_all').click(function(event) {   
//     if(this.checked) {
//         // Iterate each checkbox
//         $("#tampil_kepala").hide()
//     } else {
//         $("#tampil_kepala").show()
//     }
// });

// $('#mata_all').click(function(event) {   
//     if(this.checked) {
//         // Iterate each checkbox
//         $("#tampil_mata").hide()
//     } else {
//         $("#tampil_mata").show()
//     }
// });

// $('#telinga_all').click(function(event) {   
//     if(this.checked) {
//         // Iterate each checkbox
//         $("#tampil_telinga").hide()
//     } else {
//         $("#tampil_telinga").show()
//     }
// });

// $('#hidung_all').click(function(event) {   
//     if(this.checked) {
//         // Iterate each checkbox
//         $("#tampil_hidung").hide()
//     } else {
//         $("#tampil_hidung").show()
//     }
// });

// $('#mulut_bibir_all').click(function(event) {   
//     if(this.checked) {
//         // Iterate each checkbox
//         $("#tampil_mulut_bibir").hide()
//     } else {
//         $("#tampil_mulut_bibir").show()
//     }
// });

// $('#tenggorokan_all').click(function(event) {   
//     if(this.checked) {
//         // Iterate each checkbox
//         $("#tampil_tenggorokan").hide()
//     } else {
//         $("#tampil_tenggorokan").show()
//     }
// });

// $('#leher_all').click(function(event) {   
//     if(this.checked) {
//         // Iterate each checkbox
//         $("#tampil_leher").hide()
//     } else {
//         $("#tampil_leher").show()
//     }
// });

// $('#dada_all').click(function(event) {   
//     if(this.checked) {
//         // Iterate each checkbox
//         $("#tampil_dada").hide()
//     } else {
//         $("#tampil_dada").show()
//     }
// });

// $('#paru_jantung_all').click(function(event) {   
//     if(this.checked) {
//         // Iterate each checkbox
//         $("#tampil_paru_jantung").hide()
//     } else {
//         $("#tampil_paru_jantung").show()
//     }
// });

// $('#abdomen_all').click(function(event) {   
//     if(this.checked) {
//         // Iterate each checkbox
//         $("#tampil_abdomen").hide()
//     } else {
//         $("#tampil_abdomen").show()
//     }
// });

// $('#genitourinaria_all').click(function(event) {   
//     if(this.checked) {
//         // Iterate each checkbox
//         $("#tampil_genitourinaria").hide()
//     } else {
//         $("#tampil_genitourinaria").show()
//     }
// });

// $('#vertebra_all').click(function(event) {   
//     if(this.checked) {
//         // Iterate each checkbox
//         $("#tampil_vertebra").hide()
//     } else {
//         $("#tampil_vertebra").show()
//     }
// });

// $('#ta_sendi_all').click(function(event) {   
//     if(this.checked) {
//         // Iterate each checkbox
//         $("#tampil_ta_sendi").hide()
//     } else {
//         $("#tampil_ta_sendi").show()
//     }
// });

// $('#tb_sendi_all').click(function(event) {   
//     if(this.checked) {
//         // Iterate each checkbox
//         $("#tampil_tb_sendi").hide()
//     } else {
//         $("#tampil_tb_sendi").show()
//     }
// });

// $('#otot_motorik_all').click(function(event) {   
//     if(this.checked) {
//         // Iterate each checkbox
//         $("#tampil_otot_motorik").hide()
//     } else {
//         $("#tampil_otot_motorik").show()
//     }
// });

// $('#fs_fa_all').click(function(event) {   
//     if(this.checked) {
//         // Iterate each checkbox
//         $("#tampil_fs_fa").hide()
//     } else {
//         $("#tampil_fs_fa").show()
//     }
// });

// $('#saraf_all').click(function(event) {   
//     if(this.checked) {
//         // Iterate each checkbox
//         $("#tampil_saraf").hide()
//     } else {
//         $("#tampil_saraf").show()
//     }
// });

// $('#refleks_all').click(function(event) {   
//     if(this.checked) {
//         // Iterate each checkbox
//         $("#tampil_refleks").hide()
//     } else {
//         $("#tampil_refleks").show()
//     }
// });

// $('#kulit_all').click(function(event) {   
//     if(this.checked) {
//         // Iterate each checkbox
//         $("#tampil_kulit").hide()
//     } else {
//         $("#tampil_kulit").show()
//     }
// });

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