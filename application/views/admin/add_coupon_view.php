<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> <?php echo $title; ?> </h3>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Coupon Details</h4>
                        <form class="forms-sample" method="post" action="<?= site_url("admin/add_coupon") ?>">
                            
                            <div class="form-group">
                                <label for="InputTag1">Coupon Title</label>
                                <input type="text" class="form-control" id="InputTag1" name="title">
                            </div>
                            <div class="form-group">
                                <label for="InputTag2">Coupon Voucher Value</label>
                                <input type="text" class="form-control" id="InputTag2" name="voucher_value">
                            </div>
                            <div class="form-group">
                                <label for="InputTag3">Amount</label>
                                <input type="text" class="form-control" id="InputTag3" name="amount">
                            </div>

                            <button type="submit" name="submit" class="btn btn-gradient-primary mr-2">Add Coupon</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


