<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Select Payment Option</h4>
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
                        <form class="form_pay" method="post" action="<?= ('add_payment') ?>" >


                            <div class="form-group">
                                <label for="exampleInputEmail3">Payment Method</label>
                                <select class="form-control" name="payment_opt">
                                    <option>Select Preferred Method</option>
                                    <option value="paymt_gate">Debit/Credit Card</option>
                                    <option value="coupon">Coupon</option>
                                </select>
                            </div>


                            <button type="submit" name="submit" class="btn btn-success mr-2">Next</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>







