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
                        <h4 class="font-weight-normal mb-3">Total Campaigns <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5"><?= $count_campaigns ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <img src="<?= base_url('assets/media/images/dashboard/circle.svg'); ?>" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Active Campaigns <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5"><?= $active_campaigns ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                        <img src="<?= base_url('assets/media/images/dashboard/circle.svg'); ?>" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Inactive Campaigns <i class="mdi mdi-diamond mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5"><?= $inactive_campaigns ?></h2>
                    </div>
                </div>
            </div>
        </div>


