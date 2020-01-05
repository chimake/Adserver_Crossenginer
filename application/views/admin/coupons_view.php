<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> <?php echo $title; ?>
            </h3>

            <span class="float-right page-title">
                <a href="<?= site_url('admin/add_coupon') ?>" class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a Coupon</a>
            </span>

        </div>
        <div class="row">
            <div class="col-12">
                <?= (isset($_SESSION['action_status_report'])) ? $_SESSION['action_status_report'] : '' ?>
            </div>

        </div>
        <div class="row">

            <?php
            if(!empty($coupons))
            {
                $active_label = "<span class='label-success'>Active</span>";
                $inactive_label = "<span class='label-danger'>Inactive</span>";

                foreach ($coupons as $item) {
                    ?>
                    <div class="col-4 grid-margin">
                        <div class="card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $item['coupon_title'] ?></h4>
                                    <ul>
                                        <li><b>Status:</b> <?=($item['status'] == true )  ? $active_label : $inactive_label ?></li>
                                        <li><b>Amount:</b> NGN <?=$item['amount'] ?></li>
                                    </ul>
                                    <div class="row">
                                        <a href="<?= site_url('admin/edit_coupon/'.$item['coupon_id']) ?>" class="btn btn-block btn-lg btn-gradient-info mt-6">Edit Details </a>
                                        <a href="<?= site_url('admin/delete_coupon/'.$item['coupon_id']) ?>" class="btn btn-block btn-lg btn-gradient-danger mt-6">Delete </a>
                                    </div>

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
                                <h4 class="card-title">No coupons available yet </h4>
                            </div>
                        </div>
                    </div>
                </div>
            <?php  } ?>
            <?= $pagination ?>
        </div>










