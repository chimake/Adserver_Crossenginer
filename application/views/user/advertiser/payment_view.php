<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Payment List</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php

            if(!empty($payments))
            {
            foreach ($payments as $payment)
            {


            ?>
            <div class="col-sm-4 col-lg-4">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title"><?= ($payment['method'] == "online_gateway" ? "Online Gateway" : 'Coupon') ?></h4>
                        </div>
                    </div>
                    <div class="iq-card-body">




                                            <ul>
                                                <li><b>Status:</b> <?=ucfirst($payment['status'])?></li>
                                                <li><b>Amount:</b> <?=$payment['amount']?></li>
                                                <li><b>Payment Date:</b> <?=$payment['trans_date']?></li>
                                            </ul>
                    </div>
                </div>
            </div>


                        <?php }}else{ ?>
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




