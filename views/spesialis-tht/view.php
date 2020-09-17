<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\spesialis\McuSpesialisTht */

$this->title = $model->id_spesialis_tht;
$this->params['breadcrumbs'][] = ['label' => 'Mcu Spesialis Thts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mcu-spesialis-tht-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_spesialis_tht], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_spesialis_tht], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_spesialis_tht',
            'no_rekam_medik',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'tl_daun_telinga_kanan',
            'tl_daun_telinga_kiri',
            'tl_liang_telinga_kanan',
            'tl_liang_telinga_kiri',
            'tl_serumen_telinga_kanan',
            'tl_serumen_telinga_kiri',
            'tl_membrana_timpani_telinga_kanan',
            'tl_membrana_timpani_telinga_kiri',
            'tl_test_berbisik_telinga_kanan',
            'tl_test_berbisik_telinga_kiri',
            'tl_test_garpu_tata_rinne_telinga_kanan',
            'tl_test_garpu_tata_rinne_telinga_kiri',
            'tl_weber_telinga_kanan',
            'tl_weber_telinga_kiri',
            'tl_swabach_telinga_kanan',
            'tl_swabach_telinga_kiri',
            'tl_bing_telinga_kanan',
            'tl_bing_telinga_kiri',
            'tl_lain_lain',
            'hd_meatus_nasi',
            'hd_septum_nasi',
            'hd_konka_nasal',
            'hd_nyeri_ketok_sinus_maksilar',
            'hd_penoluman',
            'hd_lain_lain',
            'tg_pharynx',
            'tg_tonsil_kanan',
            'tg_tonsil_kiri',
            'tg_ukuran',
            'tg_palatum',
            'tg_lain_lain',
            'audiometri:ntext',
            'kesimpulan:ntext',
            'riwayat:ntext',
        ],
    ]) ?>

</div>
