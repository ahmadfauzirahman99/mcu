<div class="row">
    <div class="col-md-4">
        <label>Apakah pernah memiliki pekerjaan sebelumnya ?</label><br>
        <?php echo $form->field($model, 'is_sebelum')->radioList(['y' => 'Ada', 'n' => 'Tidak Ada'])->label(false); ?>
    </div>
    <div class="col-md-4">
        <label>Apakah sekarang sudah memiliki pekerjaan ?</label><br>
        <?php echo $form->field($model, 'is_sekarang')->radioList(['y' => 'Ada', 'n' => 'Tidak Ada'], ['disabled' => true])->label(false); ?>
    </div>
    <div class="col-md-4">
        <label>Apakah memiliki pekerjaan yang akan dituju/dilamar ?</label><br>
        <?php echo $form->field($model, 'is_dituju')->radioList(['y' => 'Ada', 'n' => 'Tidak Ada'])->label(false); ?>
    </div>
</div>
<div style="font-size:17px; font-weight:bolder; border-bottom:1px solid #000; margin-top:10px; margin-bottom:15px;">PEKERJAAN/PROFESI</div>
<div class="row sebelum-profesi">
    <div class="col-md-6"><?php echo $form->field($model, 'ukb_krj_sebelum')->textInput() ?></div>
    <div class="col-md-6"><?= $form->field($model, 'ukb_krj_sebelum_perusahaan')->textInput() ?></div>
</div>
<div class="row skrg-profesi">
    <div class="col-md-6"><?= $form->field($model, 'ukb_krj_skrg')->textInput() ?></div>
    <div class="col-md-6"><?= $form->field($model, 'ukb_krj_skrg_perusahaan')->textInput() ?></div>
</div>
<div class="row dituju-profesi">
    <div class="col-md-6"><?= $form->field($model, 'ukb_krj_dituju')->textInput() ?></div>
    <div class="col-md-6"><?= $form->field($model, 'ukb_krj_dituju_perusahaan')->textInput() ?></div>
</div>

<div class="wrap-sebelum-detail" style="<?php echo $model->isNewRecord ? "display:none;" : ($model->is_sebelum == 'n' ? "display:none;" : "") ?>">
    <div style="font-size:17px; font-weight:bolder; border-bottom:1px solid #000; margin-top:10px; margin-bottom:15px;">RIWAYAT PEKERJAAN SEBELUMNYA</div>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>Uraian</th>
                <th>Pekerjaan Utama</th>
                <th>Pekerjaan Tambahan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Uraian Tugas<br><i>Uraian fungsi dan tanggungjawab dalam suatu pekerjaan</i></td>
                <td><?php echo $form->field($model, 'ukb_sblm_utama_uraian')->textArea(['rows' => 1, 'class' => 'form-control text-area'])->label(false) ?></td>
                <td><?php echo $form->field($model, 'ukb_sblm_tambah_uraian')->textArea(['rows' => 1])->label(false) ?></td>
            </tr>
            <tr>
                <td>Target Kerja<br><i>Sasaran yang telah ditetapkan untuk dicapai dalam suatu pekerjaan</i></td>
                <td><?php echo $form->field($model, 'ukb_sblm_utama_target')->textArea(['rows' => 1, 'class' => 'form-control text-area'])->label(false) ?></td>
                <td><?php echo $form->field($model, 'ukb_sblm_tambah_target')->textArea(['rows' => 1])->label(false) ?></td>
            </tr>
            <tr>
                <td>Cara Kerja<br><i>Tahapan yang dilakukan sehingga tercapai tujuan pekerjaan</i></td>
                <td><?php echo $form->field($model, 'ukb_sblm_utama_cara')->textArea(['rows' => 1, 'class' => 'form-control text-area'])->label(false) ?></td>
                <td><?php echo $form->field($model, 'ukb_sblm_tambah_cara')->textArea(['rows' => 1])->label(false) ?></td>
            </tr>
            <tr>
                <td>Alat Kerja<br><i>Benda yang digunakan untuk mengerjakan sesuatu untuk mempermudah pekerjaan</i></td>
                <td><?php echo $form->field($model, 'ukb_sblm_utama_alat')->textArea(['rows' => 1, 'class' => 'form-control text-area'])->label(false) ?></td>
                <td><?php echo $form->field($model, 'ukb_sblm_tambah_alat')->textArea(['rows' => 1])->label(false) ?></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="wrap-skrg-detail">
    <div style="font-size:17px; font-weight:bolder; border-bottom:1px solid #000; margin-top:10px; margin-bottom:15px;">PEKERJAAN SEKARANG</div>
    <table class='table table-bordered table-sm'>
        <thead>
            <tr>
                <th style="text-align: center;">Uraian</th>
                <th style="text-align: center;">Pekerjaan Utama</th>
                <th style="text-align: center;">Pekerjaan Tambahan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Uraian Tugas<br><i>Uraian fungsi dan tanggungjawab dalam suatu pekerjaan</i></td>
                <td><?php echo $form->field($model, 'ukb_skrg_utama_uraian')->textArea(['rows' => 1, 'class' => 'form-control text-area'])->label(false) ?></td>
                <td><?php echo $form->field($model, 'ukb_skrg_tambah_uraian')->textArea(['rows' => 1])->label(false) ?></td>
            </tr>
            <tr>
                <td>Target Kerja<br><i>Sasaran yang telah ditetapkan untuk dicapai dalam suatu pekerjaan</i></td>
                <td><?php echo $form->field($model, 'ukb_skrg_utama_target')->textArea(['rows' => 1, 'class' => 'form-control text-area'])->label(false) ?></td>
                <td><?php echo $form->field($model, 'ukb_skrg_tambah_target')->textArea(['rows' => 1])->label(false) ?></td>
            </tr>
            <tr>
                <td>Cara Kerja<br><i>Tahapan yang dilakukan sehingga tercapai tujuan pekerjaan</i></td>
                <td><?php echo $form->field($model, 'ukb_skrg_utama_cara')->textArea(['rows' => 1, 'class' => 'form-control text-area'])->label(false) ?></td>
                <td><?php echo $form->field($model, 'ukb_skrg_tambah_cara')->textArea(['rows' => 1])->label(false) ?></td>
            </tr>
            <tr>
                <td>Alat Kerja<br><i>Benda yang digunakan untuk mengerjakan sesuatu untuk mempermudah pekerjaan</i></td>
                <td><?php echo $form->field($model, 'ukb_skrg_utama_alat')->textArea(['rows' => 1, 'class' => 'form-control text-area'])->label(false) ?></td>
                <td><?php echo $form->field($model, 'ukb_skrg_tambah_alat')->textArea(['rows' => 1])->label(false) ?></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="wrap-dituju-detail" style="<?php echo $model->isNewRecord ? "display:none;" : ($model->is_sekarang == 'n' ? "display:none;" : "") ?>">
    <div style="font-size:17px; font-weight:bolder; border-bottom:1px solid #000; margin-top:10px; margin-bottom:15px;">PEKERJAAN YANG DITUJU/DILAMAR</div>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>Uraian</th>
                <th>Pekerjaan Utama</th>
                <th>Pekerjaan Tambahan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Uraian Tugas<br><i>Uraian fungsi dan tanggungjawab dalam suatu pekerjaan</i></td>
                <td><?php echo $form->field($model, 'ukb_dituju_utama_uraian')->textArea(['rows' => 1, 'class' => 'form-control text-area','placeholder'=>'Uraian Tugas Utama'])->label(false) ?></td>
                <td><?php echo $form->field($model, 'ukb_dituju_tambah_uraian')->textArea(['rows' => 1,'placeholder'=>'Uraian Tugas Tambahan'])->label(false) ?></td>
            </tr>
            <tr>
                <td>Target Kerja<br><i>Sasaran yang telah ditetapkan untuk dicapai dalam suatu pekerjaan</i></td>
                <td><?php echo $form->field($model, 'ukb_dituju_utama_target')->textArea(['rows' => 1, 'class' => 'form-control text-area','placeholder'=>'Target Kerja Utama'])->label(false) ?></td>
                <td><?php echo $form->field($model, 'ukb_dituju_tambah_target')->textArea(['rows' => 1,'placeholder'=>'Target Kerja Tambahan'])->label(false) ?></td>
            </tr>
            <tr>
                <td>Cara Kerja<br><i>Tahapan yang dilakukan sehingga tercapai tujuan pekerjaan</i></td>
                <td><?php echo $form->field($model, 'ukb_dituju_utama_cara')->textArea(['rows' => 1, 'class' => 'form-control text-area'])->label(false) ?></td>
                <td><?php echo $form->field($model, 'ukb_dituju_tambah_cara')->textArea(['rows' => 1])->label(false) ?></td>
            </tr>
            <tr>
                <td>Alat Kerja<br><i>Benda yang digunakan untuk mengerjakan sesuatu untuk mempermudah pekerjaan</i></td>
                <td><?php echo $form->field($model, 'ukb_dituju_utama_alat')->textArea(['rows' => 1, 'class' => 'form-control text-area'])->label(false) ?></td>
                <td><?php echo $form->field($model, 'ukb_dituju_tambah_alat')->textArea(['rows' => 1])->label(false) ?></td>
            </tr>
        </tbody>
    </table>
</div>