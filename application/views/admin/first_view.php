<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> <?php echo $title; ?> </h3>
        </div>

        <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                        <img src="<?= base_url('assets/media/images/dashboard/circle.svg'); ?>" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Publishers <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5"><?=$no_publishers ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <img src="<?= base_url('assets/media/images/dashboard/circle.svg'); ?>" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Advertisers <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5"><?=$no_advertisers ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                        <img src="<?= base_url('assets/media/images/dashboard/circle.svg'); ?>" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Campaigns <i class="mdi mdi-diamond mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5"><?= $no_spaces ?></h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                        <img src="<?= base_url('assets/media/images/dashboard/circle.svg'); ?>" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Views <i class="mdi mdi-diamond mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5"><?= $num_total_views ?></h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                        <img src="<?= base_url('assets/media/images/dashboard/circle.svg'); ?>" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Clicks <i class="mdi mdi-diamond mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5"><?= $num_total_clicks ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if(!empty($pending_campaigns))
        {
        ?>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Recent Tickets</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th> Title </th>
                                    <th> Ad Type </th>
                                    <th> Ad Category </th>
                                    <th> Status </th>
                                    <th> View More </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($pending_campaigns as $item) {?>
                                <tr>
                                    <td>
                                        <?= $item['text_title'] ?>
                                    </td>
                                    <td> <?= $item['type'] ?> </td>
                                    <td>
                                        <?= $item['category'] ?>
                                    </td>
                                    <td> <label class="badge badge-gradient-success">DONE</label> </td>
                                    <td><a href="<?= site_url('admin/view_campaign_details/'.$item['ref_id']) ?>" class="btn btn-gradient-success">View More</a> </td>
                                </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>


