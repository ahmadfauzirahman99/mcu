<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\spesialis\McuSpesialisThtSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pemeriksaan Kesehatan THT Tenaga Kerja';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mcu-spesialis-tht-index">

    <p>
        <?= Html::a('Tambah Pemeriksaan', ['periksa'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_spesialis_tht',
            'nama_no_rm',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            //'tl_daun_telinga_kanan',
            //'tl_daun_telinga_kiri',
            //'tl_liang_telinga_kanan',
            //'tl_liang_telinga_kiri',
            //'tl_serumen_telinga_kanan',
            //'tl_serumen_telinga_kiri',
            //'tl_membrana_timpani_telinga_kanan',
            //'tl_membrana_timpani_telinga_kiri',
            //'tl_test_berbisik_telinga_kanan',
            //'tl_test_berbisik_telinga_kiri',
            //'tl_test_garpu_tata_rinne_telinga_kanan',
            //'tl_test_garpu_tata_rinne_telinga_kiri',
            //'tl_weber_telinga_kanan',
            //'tl_weber_telinga_kiri',
            //'tl_swabach_telinga_kanan',
            //'tl_swabach_telinga_kiri',
            //'tl_bing_telinga_kanan',
            //'tl_bing_telinga_kiri',
            //'tl_lain_lain',
            //'hd_meatus_nasi',
            //'hd_septum_nasi',
            //'hd_konka_nasal',
            //'hd_nyeri_ketok_sinus_maksilar',
            //'hd_penoluman',
            //'hd_lain_lain',
            //'tg_pharynx',
            //'tg_tonsil_kanan',
            //'tg_tonsil_kiri',
            //'tg_ukuran',
            //'tg_palatum',
            //'tg_lain_lain',
            //'audiometri:ntext',
            //'kesimpulan:ntext',
            //'riwayat:ntext',

            [
                'class' => 'app\components\ActionColumnSpesialis',
            ],
        ],
        'pager' => [
            'class' => 'app\components\GridPager',
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>