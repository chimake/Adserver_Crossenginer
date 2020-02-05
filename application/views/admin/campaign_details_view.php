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
            if(isset($_SESSION['action_status_report'])) {
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $_SESSION['action_status_report'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            }
            ?>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Campaign Overview</h4>
                        <div class="btn-group float-right">
                            <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Actions</button>
                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 44px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a href="<?=site_url('admin/advertiser_profile_details/'.$campaign['user_id']) ?>" class="dropdown-item">View Advertiser Details</a>
                                <a href="http://<?=$campaign['dest_link'] ?>" class="dropdown-item">Go to Landing Page</a>
                                <?php
                                    if($campaign['approval'] == "true")
                                    {
                                        if($campaign['status'] == "active")
                                        {?>
                                <a href="<?= site_url("admin/campaign_action/pause/".$campaign['ref_id']) ?>" class="dropdown-item">Pause</a>
                                <?php }else{?>
                                <a href="<?= site_url("admin/campaign_action/start/".$campaign['ref_id']) ?>" class="dropdown-item">Play</a>
                                <?php }} ?>

                                <?php
                                if(strtolower($campaign['approval']) == "pending" || strtolower($campaign['approval']) == "false")
                                {?>
                                        <a href="<?= site_url("admin/campaign_action/approve/".$campaign['ref_id']) ?>" class="dropdown-item">Approve</a>
                                    <?php }?>
                                <a href="<?= site_url("admin/campaign_action/disapprove/".$campaign['ref_id'])?>" class="dropdown-item">Disapprove</a>
                            </div>
                        </div>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th> Title </th>
                                <th> Type </th>
                                <th> Category </th>
                                <th> Budget </th>
                                <th> Balance </th>
                                <th> Clicks </th>
                                <th> Status </th>
                                <th> Start Time </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?php
                                    $startTime = $campaign['start_time'];
                                    $startTimeConvert = date('Y-m-d H:i:s', $startTime);
                                ?>
                                <td>
                                    <?= $campaign['name'] ?>
                                </td>
                                <td>
                                    <?= ucfirst($campaign['type']) ?>
                                </td>
                                <td>
                                    <?= ucfirst($campaign['category']) ?>
                                </td>
                                <td>
                                    NGN <?= $campaign['budget'] ?>
                                </td>
                                <td>
                                    NGN <?= $campaign['balance'] ?>
                                </td>
                                <td>
                                    <?= $campaign['clicks'] ?>
                                </td>
                                <td>
                                    <?= $campaign['status'] ?>
                                </td>
                                <td>
                                    <?= $startTimeConvert ?>
                                </td>

                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Campaign Preview</h4>
                        <?php if($campaign['type'] =="text"){ ?>
                            <div class="d-flex mt-5 align-items-top">
                                <div class="mb-0 flex-grow">
                                    <h5 class="mr-2 mb-2"><?= $campaign['text_title'] ?></h5>
                                    <p class="mb-0 font-weight-light"> <?= $campaign['text_content'] ?></p>
                                </div>
                            </div>
                        <code><?= $campaign['disp_link'] ?></code>
                        <?php
                        }elseif ($campaign['type'] =="banner") {
                            if ($campaign['img_link']){
                            ?>
                        <div class="row mt-3">
                            <div class="col-12 pr-1">
                                <img src="<?= base_url('assets/campaigns/'.$campaign['img_link']) ?>" class="mw-100 w-100 rounded" alt="image">
                            </div>
                        </div>
                        <?php }else{ ?>
                                <div class="d-flex mt-5 align-items-top">
                                    <div class="mb-0 flex-grow">
                                        <h5 class="mr-2 mb-2">No Image Found</h5>
                                    </div>
                                </div>

                        <?php }}elseif ($campaign['type'] =="banner_text") { ?>
                        <div class="row mt-3">
                            <div class="col-12 pr-1">
                                <img src="<?= base_url('assets/campaigns/'.$campaign['img_link']) ?>" class="mw-100 w-100 rounded" alt="image">
                            </div>
                        </div>
                        <div class="d-flex mt-5 align-items-top">
                            <div class="mb-0 flex-grow">
                                <h5 class="mr-2 mb-2"><?= $campaign['text_title'] ?></h5>
                            </div>
                        </div>
                        <?php }elseif ($campaign['type'] =="recommendation") { ?>
                        <div class="row mt-3">
                            <div class="col-12 pr-1">
                                <img src="<?= base_url('assets/campaigns/'.$campaign['img_link']) ?>" class="mw-100 w-100 rounded" alt="image">
                            </div>
                        </div>
                        <div class="d-flex mt-5 align-items-top">
                            <div class="mb-0 flex-grow">
                                <h5 class="mr-2 mb-2"><?= $campaign['text_title'] ?></h5>
                                <p class="mb-0 font-weight-light"> <?= $campaign['text_content'] ?></p>
                            </div>
                        </div>
                        <?php  } ?>
                    </div>
                </div>
            </div>
        </div>
