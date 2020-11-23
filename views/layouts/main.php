<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\components\Breadcrumbs;
use app\assets\AppAsset;
use app\components\Helper;
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
                    <h5><a href="#"><?= Yii::$app->user->identity->nama ?></a> </h5>
                    <h5><a class="text-capitalize" href="#"><b><i><?= Yii::$app->user->identity->roles ?></i></b></a> </h5>
                    <ul class="list-inline">


                        <li class="list-inline-item">
                            <a title="Logout" href="<?= Url::to(['keluar/index']) ?>" class="text-custom">
                                <i class="mdi mdi-power"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End User -->
                <?php $identitas_dokter = Helper::getRumpun();
                // var_dump($identitas_dokter);
                ?>

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <ul>
                        <li class="text-muted menu-title">Navigation</li>
                        <li>
                            <a href="<?= Url::to(['/site/index']) ?>" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
                        </li>
                        <?php if ($identitas_dokter) { ?>
                            <li>
                                <a href="<?= Url::to(['/unit-pemeriksaan/unit-pemeriksaan']) ?>" class="waves-effect"><i class="mdi mdi-google-street-view"></i> <span> Unit Pemeriksaan </span> </a>
                            </li>
                        <?php } ?>

                        <?php if ($identitas_dokter) { ?>
                            <?php
                            if ($identitas_dokter['kodejenis'] == 12) :
                            ?>
                                <?= $this->render('nav-tht') ?>
                            <?php
                            elseif ($identitas_dokter['kodejenis'] == 1) :
                            ?>
                                <?= $this->render('nav-umum') ?>

                            <?php
                            elseif ($identitas_dokter['kodejenis'] == 20) :
                            ?>
                                <?= $this->render('nav-okupasi') ?>
                            <?php
                            elseif ($identitas_dokter['kodejenis'] == 16) :
                            ?>
                                <?= $this->render('nav-mata') ?>
                            <?php
                            elseif ($identitas_dokter['kodejenis'] == 36) :
                            ?>
                                <?= $this->render('nav-perawat') ?>
                            <?php
                            elseif ($identitas_dokter['kodejenis'] == 37) :
                            ?>
                                <?= $this->render('nav-perawat') ?>
                            <?php
                            elseif ($identitas_dokter['kodejenis'] == 2) :
                            ?>
                                <?= $this->render('nav-gigi') ?>
                            <?php
                            elseif ($identitas_dokter['kodejenis'] == 35) :
                            ?>
                                <?= $this->render('nav-psikologi') ?>
                            <?php
                            elseif ($identitas_dokter['kodejenis'] == 35) :
                            ?>
                                <?= $this->render('nav-psikologi') ?>
                            <?php
                            elseif ($identitas_dokter['kodejenis'] == 13) :
                            ?>
                                <?= $this->render('nav-jantung') ?>

                            <?php else : ?>
                                <?= $this->render('nav-root') ?>
                            <?php endif ?>
                        <?php } else { ?>
                            <?= $this->render('nav-belum-ada') ?>

                        <?php } ?>
                </div>
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