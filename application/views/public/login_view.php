<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $title; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?php echo base_url('assets/media/images/favicon.png'); ?>" rel="shortcut icon">

    <meta name="description" content="<?php echo $description; ?>">
    <meta name="keywords" content="<?php
    echo $keywords;
    ?>">
    <meta property="og:image" content="<?php

    echo base_url('assets/media/images/faviconsocial.png');
    ?>
" />
    <meta property="og:description" content="<?php echo $description; ?>" />
    <meta property="og:url"content="<?php echo current_url(); ?>" />
    <meta property="og:title" content="<?php echo $title; ?>" />
    <meta name="author" content="<?php echo $author;?>">
    <link rel="stylesheet"  href="<?php echo base_url('assets/mdi/css/materialdesignicons.min.css'); ?>"/>

    <link rel="stylesheet"  href="<?php echo base_url('assets/cj/css/vendor.bundle.base.css'); ?>"/>

    <link href="<?php echo base_url('assets/cj/css/style.css'); ?>" rel="stylesheet">
    <!-- End layout styles -->
</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row flex-grow">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <div class="brand-logo">
                            <img src="<?=base_url("assets/media/images/logo.png") ?>">
                        </div>
                        <h4>Hello! let's get started</h4>
                        <h6 class="font-weight-light">Sign in to continue.</h6>
                        <div class="text-danger">
                            <?php echo validation_errors();
                                 if(isset($_SESSION['err_msg']))
                                 {

                                  echo $_SESSION['err_msg'];

                                 }
                                 ?>
                        </div>
                        <div>
                            <?php if(isset($_SESSION['action_status_report']))
                            {

                                echo $_SESSION['action_status_report'];

                            }
                            ?>
                        </div>
                        <form class="pt-3" method="post" action="<?php echo site_url('login'); ?>">
                            <div class="form-group">
                                <input type="email" class="form-control form-control-lg" id="inputEmail1" name="email" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" id="inputPassword" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">

                                <select name="accounttype" class="form-control form-control-lg">
                                    <option value="Advertiser">Advertiser</option>
                                    <option value="Publisher">Publisher</option>
                                </select>
                            </div>
                            <div class="mt-3">
                                <input class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type='submit' name='submit' value="Sign In">
                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">

                                <a href="<?=site_url('forget_password') ?>" class="auth-link text-black">Forgot password?</a>
                            </div>

                            <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="<?=site_url('register') ?>" class="text-primary">Create</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="<?php echo base_url('assets/js/vendor.bundle.base.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/off-canvas.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/hoverable-collapse.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/misc.js'); ?>"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->

<!-- endinject -->
</body>
</html>


