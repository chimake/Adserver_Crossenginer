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
if(!empty($campaigns))
{

foreach ($campaigns as $item) {
     ?>
            <div class="col-4 grid-margin">
                <div class="card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><?= $item['name']?></h4>
                            <ul>
                                <li><b>Status:</b> <?=ucfirst($item['status'])?></li>
                            </ul>
                            <a href="<?= site_url('admin/view_campaign_details/'.$item['ref_id']) ?>" class="btn btn-block btn-lg btn-gradient-info mt-4">More Info </a>
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
                    <h4 class="card-title">No campaign available yet </h4>
                </div>
            </div>
        </div>
    </div>
<?php  } ?>
            <?= $pagination ?>
        </div>









