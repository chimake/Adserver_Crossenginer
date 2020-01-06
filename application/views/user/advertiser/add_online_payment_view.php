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
                        <h4 class="card-title">Account Deposit</h4>

                        <form class="form_pay" method="post" action="<?= ('online_payment') ?>" >
                            <div class="form-group">
                                <label for="exampleInputName1">Please choose currency you want to be bill in</label>
                                <select name="currency" class="form-control">
                                    <option value="usd">US Dollar</option>
                                    <option value="zar">South African Rand</option>
                                    <option value="NGN">Nigerian Naira</option>
                                    <option value="ugx">Ughanda Shilling</option>
                                    <option value="kes">Kenya Shilling</option>
                                    <option value="ghs">Ghana Cedi</option>
                                    <option value="tzs">Tanzanian Shilling</option>


                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Amount</label>
                                <input type="number" name="amount" min="<?=$general_details['minimum_deposit'] ?>" class="form-control">
                            </div>




                            <button type="submit" name="submit" class="btn btn-gradient-primary mr-2">Next</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
