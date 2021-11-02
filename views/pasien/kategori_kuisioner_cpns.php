<?php

use app\models\Kuisioner;
use app\widgets\App;

?>

<div class="row">
    <div class="col-md-12">
        <?php
        foreach ($kategori_kuisioner_cpns as $kk) {
            $data = Kuisioner::find()->where(['kk_id' => $kk['kk_id']])->asArray()->all();
        ?>
            <strong><?php echo $kk['kk_ket_ind']; ?></strong><br>
            <small><i><?php echo strtolower($kk['kk_ket_eng']); ?></i></small>
            <table class="table table-bordered table-riwayat-anamnesa">
                <thead>
                    <tr>
                        <th>No</th>
                        <th></th>
                        <th width="8%">Pilihan</th>
                        <th width='40%'>Jelaskan (Jika iya)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo App::riwayatPenyakit($data, 5, false, $userRegister); ?>
                </tbody>
            </table>
        <?php
        }
        ?>
    </div>
</div>