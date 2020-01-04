<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> <?php echo $title; ?> </h3>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Campaign Performance</h4>

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
                        <div id="campaign_perform" style="height: 327px; width: 100%;"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Campaign Statistics</h4>
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
                        <div id="campaign_stat" style="height: 327px; width: 100%;"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Total Campaign Statistics</h4>
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
                        <div id="tot_campaign_stat" style="height: 327px; width: 100%;"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">

                    <div class="card-body">
                        <h4 class="card-title">Campaign Demo</h4>
                        <?php
                        if ($campaign_item['type'] =="text"){
                        ?>
                        <h4 class="card-title"><?= $campaign_item['text_title'] ?></h4>
                        <p class="card-description"> Display Link: <code><?= $campaign_item['disp_link'] ?></code></p>
                        <p> <?= $campaign_item['text_content'] ?></p>
                        <?php }elseif ($campaign_item['type'] =="banner") {?>
                        <img class='w3-card' style='max-width:100%;max-height:100%' src='<?=base_url('assets/campaigns/'.$campaign_item['img_link'])?>'/>
                        <?php }elseif($campaign_item['type'] =="recommendation"){?>
                        <h4 class="card-title"><?= $campaign_item['text_title'] ?></h4>
                        <img class='w3-card' style='max-width:100%;max-height:100%' src='<?=base_url('assets/campaigns/'.$campaign_item['img_link'])?>'/>
                        <?php }?>
                        <?php if($campaign_item['status'] == "active"){?>
                        <a href="<?= site_url('advertiser_dashboard/campaign_action/stop/'.$this->uri->segment(3)) ?>" class="btn btn-block btn-lg btn-gradient-danger mt-4">Stop</a>
                        <?php }elseif($campaign_item['status'] == "inactive"){?>
                        <a href="<?= site_url('advertiser_dashboard/campaign_action/start/'.$this->uri->segment(3)) ?>" class="btn btn-block btn-lg btn-gradient-success mt-4">Start</a>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">

                    <div class="card-body">
                        <h4 class="card-title">Cost Breakdown</h4>
                        <div class="table-responsive">
                            <table class="table">

                                <tr <?= ($campaign_item['per_click'] <= 0) ? "style='display:none;'" : "" ?>>
                                    <td>
                                        Cost Per Click
                                    </td>
                                    <td> <i> <?= $general_details['currency_code'].' '.$campaign_item['per_click'] ?></i></td>
                                </tr>
                                <tr <?= ($campaign_item['per_view'] <= 0) ? "style='display:none;'" : ""  ?>>
                                    <td>
                                        Cost Per View
                                    </td>
                                    <td> <i> <?= $general_details['currency_code'].' '.$campaign_item['per_view'] ?> </i></td>
                                </tr>
                                <tr <?= ($campaign_item['per_action'] <= 0) ? "style='display:none;'" : ""  ?>>
                                    <td>
                                        Cost Per Action
                                    </td>
                                    <td><i> <?= $general_details['currency_code'].' '.$campaign_item['per_action'] ?> </i> </td>
                                </tr>
<!--                                <tr --><?//= ($campaign_item['per_paid_action'] <= 0) ? "style='display:none;'" : ""  ?><!-->
<!--                                    <td>-->
<!--                                        Cost Per Paid Action </td>-->
<!--                                    <td>-->
<!--                                        <i> --><?//= $general_details['currency_code'].' '.$campaign_item['per_paid_action'] ?><!-- </i>-->
<!--                                    </td>-->
<!--                                </tr>-->
                                <tr>
                                    <td>Budget</td>
                                    <td><i> <?= $general_details['currency_code'].' '.$campaign_item['budget'] ?> </i></td>
                                </tr>

                                <tr>
                                    <td>Balance</td>
                                    <td><i> <?= $general_details['currency_code'].' '.$campaign_item['balance'] ?></i></td>
                                </tr>

                                <tr>
                                    <td>Total Spent</td>
                                    <td><i> <?= $general_details['currency_code'].' '.($campaign_item['budget']- $campaign_item['balance']) ?></i></td>
                                </tr>

                            </table>
                        </div>

                        <form class="forms-sample" method="post" action="<?= site_url('advertiser_dashboard/fund_campaign/'.$this->uri->segment(3)) ?>">
                            <p class="text-center">Add Fund From Main Balance</p>
                            <div class="form-group">
                                <label for="InputName1">Amount</label>
                                <input type="number"  class="form-control" id="InputName1" placeholder="0.00" name="amount" >
                            </div>

                            <button type="submit" class="btn btn-gradient-primary mr-2">Add Fund</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

