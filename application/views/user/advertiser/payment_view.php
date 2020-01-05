<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> <?php echo $title; ?> </h3>

            <span class="float-right page-title">
                <a href="<?= site_url('advertiser_dashboard/add_payment') ?>" class="btn btn-block btn-lg btn-gradient-success mt-4">Fund Account</a>
            </span>
        </div>

        <div class="row">
            <?php
            if(!empty($payments))
            {

                foreach ($payments as $item) {
                    ?>
                    <div class="col-4 grid-margin">
                        <div class="card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><?= ($item['method'] == "online_gateway" ? "Online Gateway" : 'Coupon') ?></h4>
                                    <ul>
                                        <li><b>Status:</b> <?=ucfirst($item['status'])?></li>
                                        <li><b>Amount:</b> <?=$item['amount']?></li>
                                        <li><b>Payment Date:</b> <?=$item['trans_date']?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php }else{ ?>
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">No payment available yet </h4>
                            </div>
                        </div>
                    </div>
                </div>
            <?php  } ?>
            <?= $pagination ?>
        </div>










