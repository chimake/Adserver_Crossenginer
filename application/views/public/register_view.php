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
                <div class="col-lg-6 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <div class="brand-logo text-center">
                            <img src="<?=base_url("assets/media/images/logo.png") ?>">
                        </div>
                        <div class="text-center">
                            <h4>Hello! let's get started</h4>
                            <h6 class="font-weight-light text-danger">*All fields are compulsory.</h6>
                        </div>

                        <div class="text-danger">
                            <?php echo validation_errors();
                            if(isset($_SESSION['err_msg']))
                            {

                                echo $_SESSION['err_msg'];

                            }
                            ?>
                        </div>



                        <form class="pt-3" method="post" action="<?php echo
                        site_url('page/first_next'); ?>">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name='firstname' value='<?= set_value('firstname') ?>' class="form-control form-control-lg" id="inputEmail1" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name='lastname' value='<?= set_value('lastname') ?>' class="form-control form-control-lg" id="inputEmail1" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="email"  name='email' value='<?= set_value('email') ?>'  placeholder='Email Address' class="form-control form-control-lg" >
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type='tel' name='phone' value='<?= set_value('phone') ?>' placeholder='Phone Number' class="form-control form-control-lg">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input id="password_box"  type='password' name='password' value='<?= set_value('password') ?>'   class="form-control form-control-lg"  placeholder="Password">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input  id="password_box"  name='cpassword' value='<?= set_value('cpassword') ?>' placeholder='Confirm Password'  type='password'   class="form-control form-control-lg" >
                                    </div>
                                </div>
                            </div>


                            <div class="mt-3">
                                <input class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type='submit' name='submit' value='Next'>
                            </div>


                            <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="<?=site_url('login') ?>" class="text-primary">Sign In</a>
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
<script type="text/javascript">

    $('document').ready(function(){
        var type = $('#password_box').attr('type');
        $('#show_p').change(function(){
                if (type == "password")
                {

                    $('#password_box').attr('type','text');

                }
                else
                {

                    $('#password_box').attr('type','password');

                }
//alert('reed');

            }
        );

    });

</script>

<!-- endinject -->
</body>
</html>


