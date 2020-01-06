<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> <?php echo $title; ?> </h3>
        </div>
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
        <div class="row">

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Coupon Account Deposit</h4>

                        <form class="form_pay" method="post" action="<?= ('coupon_payment') ?>" >

                            <div class="form-group">
                                <label for="exampleInputEmail3">Coupon Code</label>
                                <input type="text" name="coupon_code" class="form-control">
                            </div>

                            <button type="submit" name="submit" class="btn btn-gradient-primary mr-2">Next</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
