<?php

use app\assets\ItemFisikAsset;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataLayanan app\models\DataLayanan */
/* @var $form yii\bootstrap4\ActiveForm */

ItemFisikAsset::register($this);

?>
<?php 

    $p = Yii::$app->request->post();
    $no_rekam_medik = $p['DataLayanan']['nama'];
// var_dump($id);
// exit();
 ?>
<iframe src="http://mcu.rsud-arifin.localhost/body-discomfort/form?id=<?= $no_rekam_medik ?>"
        style="display: block;width: 100%;height: 650px;border: none;"></iframe>