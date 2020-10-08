<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\components\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <script>
        const baseUrl = '<?= Yii::$app->homeUrl ?>';
    </script>
    <?php $this->head() ?>
</head>

<body class="fixed-left">
    <?php $this->beginBody() ?>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="<?= Url::to(['/site/index']) ?>" class="logo"><span>MCU<span> RSAA</span></span><i class="mdi mdi-layers"></i></a>
            </div>

            <!-- Button mobile view to collapse sidebar menu -->
            <div class="navbar navbar-default" role="navigation">
                <div class="container-fluid">

                    <!-- Page title -->
                    <ul class="nav navbar-nav list-inline navbar-left">
                        <li class="list-inline-item">
                            <button class="button-menu-mobile open-left">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>
                        <li class="list-inline-item">
                            <h6 class="page-title"><?= $this->title ?></h6>
                        </li>
                    </ul>

                    <nav class="navbar-custom">

                        <ul class="list-unstyled topbar-right-menu float-right mb-0">

                        </ul>
                    </nav>
                </div><!-- end container -->
            </div><!-- end navbar -->
        </div>
        <!-- Top Bar End -->


        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">

                <!-- User -->
                <div class="user-box">
                    <div class="user-img">
                        <img src="<?= Yii::$app->request->baseUrl ?>/img/user.png" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail img-responsive">
                        <div class="user-status offline"><i class="mdi mdi-adjust"></i></div>
                    </div>
                    <h5><a href="#">Dr. Mardian Syah</a> </h5>
                </div>
                <!-- End User -->

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <ul>
                        <li class="text-muted menu-title">Navigation</li>

                        <li>
                            <a href="<?= Url::to(['/site/index']) ?>" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
                        </li>

                        <li>
                            <a href="<?= Url::to(['/unit-pemeriksaan/pemeriksaan-fisik']) ?>" class="waves-effect"><i class="mdi mdi-google-street-view"></i> <span> Unit Pemeriksaan </span> </a>
                        </li>

                        <li>
                            <a href="<?= Url::to(['/unit-lab-pk/index']) ?>" class="waves-effect"><i class=" mdi mdi-microscope"></i> <span> Unit Lab. Patologi Klinik </span> </a>
                        </li>

                        <li>
                            <a href="<?= Url::to(['/radiologi/index']) ?>" class="waves-effect"><i class=" mdi mdi-clipboard-pulse"></i> <span> Unit Radiologi </span> </a>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-folder-search"></i> <span> Setting Labs. </span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="<?= Url::to(['/mcu-item-lab/index']) ?>"">Item Pemeriksaan</a></li>
                                <li><a href="#">Setting Global</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-folder-search"></i> <span> Setting </span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="<?= Url::to(['/kategori-setting/index']) ?>"">Kategori Setting</a></li>
                                <li><a href="<?= Url::to(['/item-setting/index']) ?>"">Item Setting</a></li>
                                <li><a href="<?= Url::to(['/setting-manual/index']) ?>"">Setting Manual</a></li>
                                <li><a href="<?= Url::to(['/setting-global/index']) ?>"">Setting Global</a></li>
                            </ul>
                        </li>


                        <li class="text-muted menu-title">Pemeriksaan Spesialis</li>
                        <li>
                            <a href="<?= Url::to(['/spesialis-audiometri/index']) ?>" class="waves-effect"><i class="fas fa-assistive-listening-systems"></i> <span> Audiometri </span> </a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/spesialis-gigi/index']) ?>" class="waves-effect"><i class="fas fa-tooth"></i> <span> Gigi </span> </a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/spesialis-mata/index']) ?>" class="waves-effect"><i class="fas fa-eye"></i> <span> Mata </span> </a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/spesialis-tht/index']) ?>" class="waves-effect"><i class="fas fa-head-side-virus"></i> <span> THT </span> </a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/spesialis-kejiwaan/index']) ?>" class="waves-effect"><i class="fas fa-heartbeat"></i> <span> Kejiwaan </span> </a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/spesialis-narkoba/index']) ?>" class="waves-effect"><i class="fas fa-eyedropper"></i> <span> Narkoba </span> </a>
                        </li>

                        <li class="text-muted menu-title">Data Pelayanan</li>

                        <li>
                            <a href="<?= Url::to(['/data-layanan/index']) ?>" class="waves-effect"><i class="mdi mdi-account-heart"></i> <span> Data Pelayanan </span> </a>
                        </li>
                        <li>
                            <!-- <a href="<?php Url::to(['/spesialis-gigi-kondisi/index']) ?>" class="waves-effect"><i class="mdi mdi-account-heart"></i> <span> Data Kondisi Gigi </span> </a> -->
                        </li>

                        <li class="text-muted menu-title">Laporan</li>

                        <li>
                            <a href="<?= Url::to(['/laporan/index']) ?>" class="waves-effect"><i class="fas fa-file"></i> <span> Laporan </span> </a>
                        </li>
                        
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -->
                <div class="clearfix"></div>

            </div>

        </div>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid" style="margin-bottom: 25px;">
                    <div class="card card-body">
                        <?= Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]) ?>
                        <?= Alert::widget() ?>
                        <?= $content ?>
                    </div>
                </div> <!-- container -->

            </div> <!-- content -->

            <footer class="footer text-right">
                <?= date('Y') ?> © RSUD ARIFIN ACHMAD
            </footer>

        </div>


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->




    </div>
    <!-- END wrapper -->

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>