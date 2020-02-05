<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title"><?php echo $title; ?> </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Time', 'Clicks', 'Views'],
                    ['4Days Ago',   <?= $four_days_ago_clicks ?>,       <?= $four_days_ago_views ?>],
                    ['3Days Ago',   <?= $three_days_ago_clicks ?>,       <?= $three_days_ago_views ?>],
                    ['2Days Ago',   <?= $two_days_ago_clicks ?>,       <?= $two_days_ago_views ?>],
                    ['Yesterday',   <?= $yesterday_clicks ?>,        <?= $yesterday_views ?>],
                    ['Today',   <?= $today_clicks ?>,      <?= $today_views ?>]
                ]);


                var options = {
                    title: '',
                    hAxis: {title: 'Time',  titleTextStyle: {color: '#333'}},
                    vAxis: {minValue: 0}
                };

                var chart = new google.visualization.AreaChart(document.getElementById('campaign_perform'));
                chart.draw(data, options);
            }
        </script>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Campaign Performance</h4>
                        </div>
                    </div>
                    <div class="iq-card-body" id="campaign_perform"></div>
                </div>
            </div>

            <script type="text/javascript">
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {

                    var data = google.visualization.arrayToDataTable([
                        ['Stat', 'Value'],
                        ['Views Today',     <?= $today_views ?>],
                        ['Clicks Today',      <?= $today_clicks ?>]
                    ]);


                    var chart = new google.visualization.PieChart(document.getElementById('campaign_stat'));

                    chart.draw(data);
                }


            </script>

            <div class="col-sm-6 col-lg-6">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Campaign Statistics</h4>
                        </div>
                    </div>
                    <div class="iq-card-body" id="campaign_stat"></div>
                </div>
            </div>

            <script type="text/javascript">
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {

                    var data = google.visualization.arrayToDataTable([
                        ['Stat', 'Value'],
                        ['Total Views',     <?= $campaign_item['views'] ?>],
                        ['Total Clicks',      <?= $campaign_item['clicks'] ?>]
                    ]);


                    var chart = new google.visualization.PieChart(document.getElementById('tot_campaign_stat'));

                    chart.draw(data);
                }


            </script>

            <div class="col-sm-6 col-lg-6">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Total Campaign Statistics</h4>
                        </div>
                    </div>
                    <div class="iq-card-body" id="tot_campaign_stat"></div>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-sm-6 col-lg-6">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Campaign Demo</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <?php
                    if ($campaign_item['type'] =="text"){
                    ?>
                    <h4 class="card-title"><?= $campaign_item['text_title'] ?></h4>
                    <p class="card-description"> Display Link: <code><?= $campaign_item['disp_link'] ?></code></p>
                    <p> <?= $campaign_item['text_content'] ?></p>
                    <?php }elseif ($campaign_item['type'] =="banner") {?>
                    <img src="<?=base_url('assets/campaigns/'.$campaign_item['img_link'])?>" class="img-fluid" alt="Responsive image">
                    <?php }elseif($campaign_item['type'] =="recommendation"){?>
                    <h4 class="card-title"><?= $campaign_item['text_title'] ?></h4>
                    <img src="<?=base_url('assets/campaigns/'.$campaign_item['img_link'])?>" class="img-fluid" alt="Responsive image">
                    <?php }?>
                    <?php if($campaign_item['status'] == "active"){?>
                    <a href="<?= site_url('advertiser_dashboard/campaign_action/stop/'.$this->uri->segment(3)) ?>" class="btn btn-outline-danger mb-3"><i class="ri-alert-line"></i>Stop</a>
                    <?php }elseif($campaign_item['status'] == "inactive"){?>
                    <a href="<?= site_url('advertiser_dashboard/campaign_action/stop/'.$this->uri->segment(3)) ?>" class="btn btn-outline-success mb-3"><i class="ri-heart-line"></i>Start</a>
                    <?php } ?>
                </div>
            </div>

        </div>
        <div class="col-sm-6 col-lg-6">
            <div class="iq-card wow fadeInUp" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInUp;">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Cost Breakdown</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">


                            <tbody>
                            <tr <?= ($campaign_item['per_click'] <= 0) ? "style='display:none;'" : "" ?>>
                                <td>
                                    Cost Per Click
                                </td>
                                <td> <i> <?= $general_details['currency_code'].' '.$campaign_item['per_click'] ?></i></td>
                            </tr>

                            <tr <?= ($campaign_item['per_view'] <= 0) ? "style='display:none;'" : "" ?>>
                                <td>
                                    Cost Per View
                                </td>
                                <td> <i> <?= $general_details['currency_code'].' '.$campaign_item['per_view'] ?> </i></td>
                            </tr>

                            <tr <?= ($campaign_item['per_action'] <= 0) ? "style='display:none;'" : "" ?>>
                                <td>
                                    Cost Per Action
                                </td>
                                <td><i> <?= $general_details['currency_code'].' '.$campaign_item['per_action'] ?> </i> </td>
                            </tr>

                            <tr>
                                <td>
                                    Budget
                                </td>
                                <td><i> <?= $general_details['currency_code'].' '.$campaign_item['budget'] ?> </i> </td>
                            </tr>

                            <tr>
                                <td>
                                    Total Spent
                                </td>
                                <td><i> <?= $general_details['currency_code'].' '.($campaign_item['budget']- $campaign_item['balance']) ?> </i> </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>






