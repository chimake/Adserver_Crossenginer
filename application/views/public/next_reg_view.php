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
                        site_url('next_reg'); ?>">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text"name='website' value='<?= set_value('website') ?>' placeholder='Your Website URL' class="form-control form-control-lg">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <select type="text" class="form-control form-control-lg" name="country" id="african-countries">
                                            <option selected>Account Country</option> <option value="algeria">Algeria</option> <option value="angola">Angola</option> <option value="benin">Benin</option> <option value="botswana">Botswana</option> <option value="burkina Faso">Burkina Faso</option> <option value="burundi">Burundi</option> <option value="cameroon">Cameroon</option> <option value="cape-verde">Cape Verde</option> <option value="central-african-republic">Central African Republic</option> <option value="chad">Chad</option> <option value="comoros">Comoros</option> <option value="congo-brazzaville">Congo - Brazzaville</option> <option value="congo-kinshasa">Congo - Kinshasa</option> <option value="ivory-coast">Côte d’Ivoire</option> <option value="djibouti">Djibouti</option> <option value="egypt">Egypt</option> <option value="equatorial-guinea">Equatorial Guinea</option> <option value="eritrea">Eritrea</option> <option value="ethiopia">Ethiopia</option> <option value="gabon">Gabon</option> <option value="gambia">Gambia</option><option value="ghana">Ghana</option><option value="guinea">Guinea</option> <option value="guinea-bissau">Guinea-Bissau</option> <option value="kenya">Kenya</option> <option value="lesotho">Lesotho</option> <option value="liberia">Liberia</option> <option value="libya">Libya</option> <option value="madagascar">Madagascar</option> <option value="malawi">Malawi</option> <option value="mali">Mali</option> <option value="mauritania">Mauritania</option> <option value="mauritius">Mauritius</option> <option value="mayotte">Mayotte</option> <option value="morocco">Morocco</option> <option value="mozambique">Mozambique</option> <option value="namibia">Namibia</option> <option value="niger">Niger</option> <option value="nigeria">Nigeria</option><option value="rwanda">Rwanda</option>  <option value="reunion">Réunion</option> <option value="saint-helena">Saint Helena</option> <option value="senegal">Senegal</option> <option value="seychelles">Seychelles</option> <option value="sierra-leone">Sierra Leone</option> <option value="somalia">Somalia</option> <option value="south-africa">South Africa</option> <option value="sudan">Sudan</option> <option value="south-sudan">Sudan</option> <option value="swaziland">Swaziland</option> <option value="Sao-tome-príncipe">São Tomé and Príncipe</option> <option value="tanzania">Tanzania</option> <option value="togo">Togo</option> <option value="tunisia">Tunisia</option>--> <option value="uganda">Uganda</option><option value="western-sahara">Western Sahara</option> <option value="zambia">Zambia</option> <option value="zimbabwe">Zimbabwe</option> </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                       <textarea cols="30" rows="10" class="form-control form-control-lg">By Clicking the Register button you  agree to our terms and Condition as stated below.

                                           <?=$terms ?>
                                        </textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="mt-3">
                                <input class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn"   type='submit' name='submit' value='Register'>
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


<!-- endinject -->
</body>
</html>





 