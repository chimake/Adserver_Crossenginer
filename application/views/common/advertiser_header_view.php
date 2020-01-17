<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?php echo base_url('assets/media/images/favicon.ico'); ?>" rel="shortcut icon">

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
    <link rel="stylesheet"  href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>"/>

    <link rel="stylesheet"  href="<?php echo base_url('assets/css/typography.css'); ?>"/>
    <link rel="stylesheet"  href="<?php echo base_url('assets/css/style.css'); ?>"/>
    <link rel="stylesheet"  href="<?php echo base_url('assets/css/responsive.css'); ?>"/>

    <style>
        .hidden{
            display: none !important;
        }
    </style>
    <!-- End layout styles -->
</head>

<body>
<div class="wrapper">
    <!-- Sidebar  -->
    <div class="iq-sidebar">
        <div class="iq-sidebar-logo d-flex justify-content-between">
            <a href="<?= site_url('/') ?>">
                <span>+Life</span>
            </a>
            <div class="iq-menu-bt align-self-center">
                <div class="wrapper-menu">
                    <div class="line-menu half start"></div>
                    <div class="line-menu"></div>
                    <div class="line-menu half end"></div>
                </div>
            </div>
        </div>
        <div id="sidebar-scrollbar">
            <nav class="iq-sidebar-menu">
                <ul class="iq-menu">
                    <li class="iq-menu-title"><i class="ri-separator"></i><small>Account Balance: <b>NGN <?= $account_bal ?></b></small></li>
                    <li class="iq-menu-title"><i class="ri-separator"></i><span>Navigation</span></li>
                    <li class="active">
                        <a href="<?= site_url('advertiser_dashboard');?>" class="iq-waves-effect"><i class="ri-home-4-line"></i><span>Dashboard</span></i></a>
                    </li>

                    <li><a href="<?= site_url("advertiser_dashboard/Campaign") ?>" class="iq-waves-effect"><i class="ri-calendar-2-line"></i><span>Campaigns</span></a></li>
<!--                    <li><a href="--><?//= site_url("advertiser_dashboard/cpa_forms_list") ?><!--" class="iq-waves-effect"><i class="ri-message-line"></i><span>Forms</span></a></li>-->
                    <li><a href="<?= site_url("advertiser_dashboard/payments") ?>" class="iq-waves-effect"><i class="ri-bank-card-fill"></i><span>Payments</span></a></li>
                    <li><a href="<?= site_url("advertiser_dashboard/add_payment") ?>" class="iq-waves-effect"><i class="ri-add-circle-line"></i><span>Fund Account</span></a></li>
                    <li><a href="<?= site_url("Logout") ?>" class="iq-waves-effect"><i class="ri-logout-circle-line"></i><span>Logout</span></a></li>

                </ul>
            </nav>
            <div class="p-3"></div>
        </div>
    </div>
    <!-- TOP Nav Bar -->
    <div class="iq-top-navbar">
        <div class="iq-navbar-custom">
            <div class="iq-sidebar-logo">
                <div class="top-logo">
                    <a href="<?= site_url('advertiser_dashboard');?>" class="logo">
                        <img src="<?= base_url('assets/media/images/logo.png'); ?>" class="img-fluid" alt="">
                        <span><?= $title; ?></span>
                    </a>
                </div>
            </div>
            <div class="navbar-breadcrumb">
                <h5 class="mb-0">Dashboard</h5>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('advertiser_dashboard');?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
                    </ul>
                </nav>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="ri-menu-3-line"></i>
                </button>
                <div class="iq-menu-bt align-self-center">
                    <div class="wrapper-menu">
                        <div class="line-menu half start"></div>
                        <div class="line-menu"></div>
                        <div class="line-menu half end"></div>
                    </div>
                </div>


            </nav>
        </div>
    </div>


