<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $title; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?php echo base_url('assets/media/images/favicon.png'); ?>" rel="shortcut icon">

    <meta name="description" content="<?php echo $description; ?>">
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <meta property="og:image" content="<?php echo base_url('assets/media/images/faviconsocial.png'); ?>" />
    <meta property="og:description" content="<?php echo $description; ?>" />
    <meta property="og:url"content="<?php echo current_url(); ?>" />
    <meta property="og:title" content="<?php echo $title; ?>" />
    <meta name="author" content="<?php echo $author;?>">
    <link rel="stylesheet"  href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>"/>

    <link rel="stylesheet"  href="<?php echo base_url('assets/css/typography.css'); ?>"/>
    <link rel="stylesheet"  href="<?php echo base_url('assets/css/style.css'); ?>"/>
    <link rel="stylesheet"  href="<?php echo base_url('assets/css/responsive.css'); ?>"/>

</head>

<body>
<!-- loader Start -->
<div id="loading">
    <div id="loading-center">
        <div class="loader">
            <div class="cube">
                <div class="sides">
                    <div class="top"></div>
                    <div class="right"></div>
                    <div class="bottom"></div>
                    <div class="left"></div>
                    <div class="front"></div>
                    <div class="back"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- loader END -->
<!-- Sign in Start -->
<section class="sign-in-page bg-white">
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-sm-6 align-self-center">
                <div class="sign-in-from">
                    <h1 class="mb-0">Sign in</h1>
                    <p>Enter your email address and password to access admin panel.</p>
                    <div class="text-danger">
                        <?php
                        echo validation_errors().'<br>';
                        if(isset($_SESSION['err_msg']))
                        {

                            echo $_SESSION['err_msg'];

                        }
                        ?>
                    </div>
                    <div class="text-danger">
                        <?php if(isset($_SESSION['action_status_report']))
                        {

                            echo $_SESSION['action_status_report'];

                        }
                        ?>
                    </div>
                    <form class="mt-4" method="post" action="<?php echo site_url('login'); ?>">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control mb-0" id="inputEmail1" name="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <a href="<?=site_url('forget_password') ?>" class="float-right">Forgot password?</a>
                            <input type="password" class="form-control mb-0" id="inputPassword" name="password" placeholder="Password">
                        </div>
                        <div class="d-inline-block w-100">
                            <button type="submit" class="btn btn-primary float-right" name='submit'>Sign in</button>
                        </div>
                        <div class="sign-info">
                            <span class="dark-color d-inline-block line-height-2">Don't have an account? <a href="<?=site_url('register') ?>">Sign up</a></span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-6 text-center">
                <div class="sign-in-detail text-white" style="background: url(<?=base_url("assets/media/images/login/2.jpg") ?>) no-repeat 0 0; background-size: cover;">
                    <a class="sign-in-logo mb-5" href="#"><img src="images/logo-white.png" class="img-fluid" alt="logo"></a>
                    <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                        <div class="item">
                            <img src="<?=base_url("assets/media/images/login/1.png") ?>" class="img-fluid mb-4" alt="logo">
                            <h4 class="mb-1 text-white">Manage your orders</h4>
                            <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                        </div>
                        <div class="item">
                            <img src="<?=base_url("assets/media/images/login/1.png") ?>" class="img-fluid mb-4" alt="logo">
                            <h4 class="mb-1 text-white">Manage your orders</h4>
                            <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                        </div>
                        <div class="item">
                            <img src="<?=base_url("assets/media/images/login/1.png") ?>" class="img-fluid mb-4" alt="logo">
                            <h4 class="mb-1 text-white">Manage your orders</h4>
                            <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Sign in END -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.appear.js') ?>"></script>
<script src="<?= base_url('assets/js/countdown.min.js') ?>"></script>
<script src="<?= base_url('assets/js/waypoints.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.counterup.min.js') ?>"></script>
<script src="<?= base_url('assets/js/wow.min.js') ?>"></script>
<script src="<?= base_url('assets/js/apexcharts.js') ?>"></script>
<script src="<?= base_url('assets/js/slick.min.js') ?>"></script>
<script src="<?= base_url('assets/js/select2.min.js') ?>"></script>
<script src="<?= base_url('assets/js/owl.carousel.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.magnific-popup.min.js') ?>"></script>
<script src="<?= base_url('assets/js/smooth-scrollbar.js') ?>"></script>
<script src="<?= base_url('assets/js/chart-custom.js') ?>"></script>
<script src="<?= base_url('assets/js/custom.js') ?>"></script>

</body>



</html>


