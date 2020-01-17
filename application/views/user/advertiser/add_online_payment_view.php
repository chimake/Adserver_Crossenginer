<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Online Account Deposit</h4>
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




                            <button type="submit" name="submit" class="btn btn-success mr-2">Next</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>



