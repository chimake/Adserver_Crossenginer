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
                <h4 class="card-title">Campaigns</h4>
                <a href="<?= site_url('advertiser_dashboard/add_campaign/') ?>" class="btn btn-outline-secondary btn-sm btn-gradient-success float-right">Add New</a>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th> Title </th>
                            <th> Category </th>
                            <th> Status </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        //var_dump($campaigns_list);
                        foreach ($campaigns_list as $campaign_val) {
                            ?>
                            <tr>
                                <td>
                                    <?= $campaign_val['text_title']; ?>
                                </td>
                                <td> <?= $campaign_val['type']; ?></td>
                                <td>
                                    <?php
                                    if ($campaign_val['status'] == 'complete'){
                                    ?>
                                    <label class="badge badge-gradient-success">Complete</label>
                                    <?php }else{ ?>
                                    <label class="badge badge-gradient-danger">Incomplete</label>
                                    <?php } ?>

                                </td>
                                <td>
                                    <a href="<?= site_url('advertiser_dashboard/view_details/'.$campaign_val['ref_id']) ?>" class="btn btn-outline-secondary btn-sm btn-gradient-info">
                                        <i class=" mdi mdi-table-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-outline-secondary btn-sm btn-gradient-danger">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </td>

                            </tr>
                            <?php
                        }

                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

