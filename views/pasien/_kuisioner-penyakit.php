<div class="row">
    <div class="col-md-12">
        <?php

use app\models\Kuisioner;
use app\widgets\App;

foreach ($kategori_kuisioner as $kk) {
            $data = Kuisioner::find()->where(['kk_id' => $kk['kk_id']])->asArray()->all();
        ?>
            <div style="font-size:17px; font-weight:bolder; border-bottom:1px solid #000; margin-top:10px; margin-bottom:15px;"><?php echo $kk['kk_nama_indo']; ?></div>
            <strong><?php echo $kk['kk_ket_ind']; ?></strong><br>
            <small><i><?php echo strtolower($kk['kk_ket_eng']); ?></i></small>
            <table class="table table-bordered table-riwayat-penyakit">
                <thead>
                    <tr>
                        <th>No</th>
                        <th></th>
                        <th width="8%">Pilihan</th>
                        <th width='40%'>Jelaskan (Jika iya)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo App::riwayatPenyakit($data,5,false,$userRegister); ?>
                </tbody>
            </table>
        <?php
        }
        ?>
    </div>
</div>