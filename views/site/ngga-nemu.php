<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-13 17:40:16 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2020-09-13 17:45:37
 */

use yii\helpers\Html;

?>

<div class="clearfix"></div>
<div class="wrapper-page">
    <div class="ex-page-content text-center">
        <div class="text-error">404</div>
        <h3 class="text-uppercase font-600">Tidak Ditemukan</h3>
        <p class="text-muted">
            Ketahuilah bahwa sabar, jika dipandang dalam permasalahan seseorang adalah ibarat kepala dari suatu tubuh. Jika kepalanya hilang maka keseluruhan tubuh itu akan membusuk. Sama halnya, jika kesabaran hilang, maka seluruh permasalahan akan rusak.
        </p>
        <br>

        <?= Html::a('Kembali ke Jalan yang Lurus', Yii::$app->homeUrl, [
            'class' => 'btn btn-success waves-effect waves-light',
        ])
        ?>
    </div>
</div>