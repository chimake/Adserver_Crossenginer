<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex">
                        <div class="iq-header-title">
                            <h4 class="card-title float-left">Campaign List</h4>
                            <a href="<?= site_url('advertiser_dashboard/add_campaign/') ?>" class="btn btn-success btn-sm mr-2">Add New</a>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th> Title </th>
                                    <th> Category </th>
                                    <th> Status </th>
                                    <th> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
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
                                        <a href="<?= site_url('advertiser_dashboard/view_details/'.$campaign_val['ref_id']) ?>" class="btn mb-3 btn-primary"><i class="ri-edit-line"></i>Edit Details</a>

                                        <a href="#" class="btn mb-3 btn-danger">
                                            <i class="ri-delete-bin-2-fill"></i> Delete
                                        </a>
                                    </td>

                                </tr>
                                <?php
                                }

                                ?>

                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th> Title </th>
                                    <th> Category </th>
                                    <th> Status </th>
                                    <th> Action </th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



