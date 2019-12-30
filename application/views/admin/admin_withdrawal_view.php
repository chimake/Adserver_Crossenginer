<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> <?php echo $title; ?> </h3>
        </div>

        <div class="row">
            <?php
            if(!empty($items))
            {

                foreach ($items as $item) {
                    $user_details  = $this->users_model->get_user_by_its_id($item['user_id'],"publishers");


                    $wlink = site_url('admin/process_withdrawal/'.$item['id']).'/'.$user_details['id'];
                    ?>

                    <div class="col-4 grid-margin">
                        <div class="card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $user_details['firstname']." ".$user_details['lastname']."(".$user_details['username'].")" ?></h4>
                                    <ul>
                                        <li><b>Bank Name :</b>N <?=$user_details['bank']?></li>
                                        <li><b>Account Number :</b>N <?=$user_details['account_no']?></li>
                                        <li><b>Account Name :</b>N <?=$user_details['account_name']?></li>
                                        <li><b>FB Link :</b>N <?=$user_details['fb_link']?></li>
                                        <li><b>Amount :</b>N <?=$user_details['amount']?></li>

                                    </ul>
                                    <a href="<?= site_url('admin/process_withdrawal/'.$item['id']).'/'.$user_details['id'] ?>" class="btn btn-block btn-lg btn-gradient-success mt-4">Process </a>
                                    <a href="<?= site_url("admin/view_users_referred/".$user_details['username']) ?>" class="btn btn-block btn-lg btn-gradient-info mt-4">View User Referred </a>
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
                                <h4 class="card-title">No Withdrawal Requests </h4>
                            </div>
                        </div>
                    </div>
                </div>
            <?php  } ?>
            <?= $pagination ?>
        </div>





