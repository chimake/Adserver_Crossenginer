<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="iq-card overflow-hidden" style="position: relative;">
                    <div class="iq-card-body pb-0">
                        <span class="text-center line-height-6">Total Campaigns</span>
                        <div class="clearfix"></div>
                        <div class="text-center">
                            <h4 class="mb-0"><span class="counter"><?= $count_campaigns ?></span></h4>
                            <p class="mb-0 text-secondary line-height"><i
                                        class="<?= ($campaign_percentage_change > 0) ? 'ri-arrow-up-line text-success mr-1' : 'ri-arrow-down-line text-danger mr-1'?>"></i><span
                                        class="<?= ($campaign_percentage_change > 0) ? 'text-success' : 'text-danger'?>"><?= $campaign_percentage_change?> %</span> <?= ($campaign_percentage_change > 0) ? 'Increase' : 'Decrease'?></p>
                        </div>
                    </div>
                    <span style="min-height: 80px;"></span>

                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="iq-card overflow-hidden" style="position: relative;">
                    <div class="iq-card-body pb-0">
                        <span class="text-center line-height-6">Active Campaigns</span>
                        <div class="clearfix"></div>
                        <div class="text-center">
                            <h4 class="mb-0"><span class="counter"><?= $active_campaigns ?></span></h4>
                            <p class="mb-0 text-secondary line-height"><i
                                        class="<?= ($active_campaign_percentage_change > 0) ? 'ri-arrow-up-line text-success mr-1' : 'ri-arrow-down-line text-danger mr-1'?>"></i><span
                                        class="<?= ($active_campaign_percentage_change > 0) ? 'text-success' : 'text-danger'?>"><?= $active_campaign_percentage_change ?>%</span> <?= ($active_campaign_percentage_change > 0) ? 'Increase' : 'Decrease'?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="iq-card overflow-hidden" style="position: relative;">
                    <div class="iq-card-body pb-0">
                        <span class="text-center line-height-6">Inactive Campaigns</span>
                        <div class="clearfix"></div>
                        <div class="text-center">
                            <h4 class="mb-0"><span class="counter"><?= $inactive_campaigns ?></span></h4>
                            <p class="mb-0 text-secondary line-height" style="margin-bottom:20px;"><i
                                        class="<?= ($inactive_campaign_percentage_change > 0) ? 'ri-arrow-up-line text-success mr-1' : 'ri-arrow-down-line text-danger mr-1'?>"></i><span
                                        class="<?= ($inactive_campaign_percentage_change > 0) ? 'text-success' : 'text-danger'?>"><?= $inactive_campaign_percentage_change ?>%</span> <?= ($inactive_campaign_percentage_change > 0) ? 'Increase' : 'Decrease'?></p>
                        </div>
                    </div>
                </div>
            </div>

<!--            <div class="col-lg-12">-->
<!--                <div class="iq-card overflow-hidden" style="position: relative;">-->
<!--                    <div class="iq-card-header d-flex justify-content-between">-->
<!--                        <div class="iq-header-title">-->
<!--                            <h4 class="card-title" id="title">Click Trend </h4>-->
<!--                        </div>-->
<!--                        -->
<!--                    </div>-->
<!--                    <div class="iq-card-body">-->
<!--                        <div class="d-flex justify-content-around">-->
<!--                            <div class="price-week-box mr-5">-->
<!--                                <span>Current Week</span>-->
<!--                                <h2><span class="counter">180</span> <i-->
<!--                                            class="ri-funds-line text-success font-size-18"></i></h2>-->
<!--                            </div>-->
<!--                            <div class="price-week-box">-->
<!--                                <span>Previous Week</span>-->
<!--                                <h2><span class="counter">52</span><i-->
<!--                                            class="ri-funds-line text-danger font-size-18"></i></h2>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div id="chart-5" style="min-height: 200px;">-->
<!---->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--            </div>-->

        </div>

    </div>
</div>



