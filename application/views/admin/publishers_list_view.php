<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> <?php echo $title; ?> </h3>
        </div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Publishers</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th> Name </th>
                            <th> Country </th>
                            <th> Account Balance </th>
                            <th> Last Seen Date </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($items as $item){
                        ?>
                        <tr class="">
                            <td><?=  $item['firstname']." ".$item['lastname'] ?></td>

                            <td> <?= ucfirst($item['country']) ?> </td>
                            <td>
                                <label class="badge badge-gradient-success">NGN <?= $item['account_bal'] ?></label>
                            </td>
                            <td> <? date( "F j, Y, g:i a",$item["lastlog"]) ?> </td>
                            <td>
                                <a href="<?= site_url('admin/email/publishers/'.$item['id']) ?>" class="btn btn-gradient-success btn-rounded btn-icon">
                                    <i class="mdi mdi-email-open"></i>
                                </a>

                                <?php
                                if($item['account_status'] =="active") {
                                    ?>
                                <a href="<?= site_url('admin/suspend/publishers/'.$item['id']) ?>" class="btn btn-gradient-danger btn-rounded btn-icon">
                                    <i class="mdi mdi-pause"></i>
                                </a>
                                    <?php
                                }else{
                                ?>
                                <a href="<?= site_url("admin/resume/publishers/".$item['id']) ?>" class="btn btn-gradient-primary btn-rounded btn-icon">
                                    <i class="mdi mdi-play"></i>
                                </a>
                                <?php } ?>
                                    <a href="<?= site_url('admin/login_to_user_account/publisher/'.$item['id']) ?>" class="btn btn-gradient-info btn-rounded btn-icon">
                                        <i class="mdi mdi-login"></i>
                                    </a>


                            </td>
                        </tr>
                        <?php }  ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



