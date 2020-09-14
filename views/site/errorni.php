<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Web: dickyermawan.github.io 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2020-09-13 17:40:16 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2020-09-13 17:46:51
 */

use yii\helpers\Html;

?>

<div class="clearfix"></div>
<div class="wrapper-page">
    <div class="ex-page-content text-center">
        <div class="text-error">505</div>
        <h3 class="text-uppercase font-600">Anda Tersesat</h3>
        <p class="text-muted">
            Apa yang sudah terjadi, biarlah berlalu. Kamu tidak bisa mengendalikan semuanya, termasuk mengembalikan masa lalu dan mengeditnya. Tetapi kamu masih bisa melanjutkan ke masa berikutnya dan memperbaiki semuanya.
        </p>
        <br>

        <?= Html::a('Kembali ke Jalan yang Lurus', Yii::$app->homeUrl, [
            'class' => 'btn btn-success waves-effect waves-light',
        ])
        ?>
    </div>
</div>