<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> <?php echo $title; ?> </h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <?= ($payment_option == 'coupon') ? '<th>Coupon Code</th>' : '' ?>
                                <th> Currency </th>
                                <th> Amount </th>
                                <th> Payment Option </th>
                                <th> Action </th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?= ($payment_option == 'coupon') ? '<td>'.$coupon_code.'</td>' : '' ?>
                                <td> <?= strtoupper($currency_code) ?> </td>

                                <td>
                                    <?php
                                     if ($payment_option == 'coupon'){
                                         echo $amount['amount'];
                                     }else{
                                         echo $amount;
                                     }
                                    ?>
                                </td>
                                


                                <td><?= ($payment_option == 'paymt_gate') ? "Debit/Credit" : "Coupon" ?> </td>
                                <td><a href="<?= site_url('advertiser_dashboard/add_payment/') ?>" class="btn btn-gradient-danger btn-sm">Cancel</a> <a href="<?= ($payment_option == 'paymt_gate') ? site_url('advertiser_dashboard/advertiser_online_gateway_payment/') : site_url('advertiser_dashboard/advertiser_online_coupon_payment/') ?>" class="btn btn-gradient-success btn-sm">Pay</a> </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

