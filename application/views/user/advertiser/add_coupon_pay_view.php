<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Coupon Account Deposit</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <?php
                        if(isset($_SESSION['action_status_report']))
                        {
                            ?>
                            <div class="row" id="proBanner">
                                <div class="col-12">
                                 <span class="d-flex align-items-center purchase-popup">
                                     <?=$_SESSION['action_status_report']."<br>"?>
                                     <i class="mdi mdi-close float-right" id="bannerClose"></i>
                                 </span>
                                </div>
                            </div>
                        <?php } ?>
                        <form class="form_pay" method="post" action="<?= ('coupon_payment') ?>" >

                            <div class="form-group">
                                <label for="exampleInputEmail3">Coupon Code</label>
                                <input type="text" name="coupon_code" class="form-control">
                            </div>

                            <button type="submit" name="submit" class="btn btn-success mr-2">Next</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>













