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
                        <h6 class="font-weight-light">Please choose your Account Type</h6>
                        <div class="text-danger">
                            <?php echo validation_errors();
                            if(isset($_SESSION['err_msg']))
                            {

                                echo $_SESSION['err_msg'];

                            }
                            ?>
                        </div>

                        </div>
                        <form class="pt-3" method="post" action="<?php echo
                        site_url('Register'); ?>">
                          <button class="btn btn-block btn-gradient-danger btn-lg font-weight-medium auth-form-btn" name="accounttype" value="Advertiser"> Register as An Advertiser </button>
                          <button class="btn btn-block btn-gradient-success btn-lg font-weight-medium auth-form-btn" name="accounttype" value="Publisher"> Register as A Publisher </button>

                            <div class="text-center mt-4 font-weight-light"> Already have Account? <a href="<?=site_url('login') ?>" class="text-primary">Create</a>
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




