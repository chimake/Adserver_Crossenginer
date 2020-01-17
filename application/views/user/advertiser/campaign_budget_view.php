<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Payment & Budget</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">


                        <form class="forms-sample" method="post" action="<?= site_url("advertiser_dashboard/campaign_budget/".$this->uri->segment(3)) ?>">
                            <?php
                            if(isset($_SESSION['action_status_report']))
                            {
                                echo $_SESSION['action_status_report'];
                            }
                            ?>
                            <div class="form-group">
                                <label for="budget">Budget( ex:Total Amount  you want to spend on this campaign in NGN)</label>
                                <input type="number" id="budget" min='<?=$general_details['minimum_budget'] ?>' placeholder="Budget" value="<?php echo set_value('budget'); ?>" name="budget" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="startdate">Starting Date</label>
                                <select class="form-control" id="startdate" name="sdate">
                                    <option value="now">Now</option>
                                    <option value="Next Sunday">Next Sunday (12.00 AM)</option>
                                    <option value="Next Monday">Next Monday (12.00 AM)</option>
                                    <option value="Next Tuesday">Next Tuesday (12.00 AM)</option>
                                    <option value="Next Wednesday">Next Wednesday (12.00 AM)</option>
                                    <option value="Next Thursday">Next Thursday (12.00 AM)</option>
                                    <option value="Next Friday">Next Friday (12.00 AM)</option>
                                    <option value="Next Saturday">Next Saturday (12.00 AM)</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="billingtype">Billing Type</label>
                                <select onchange="toggleInputDiv(this.value)" class="form-control" id="billingtype" name="billing">
                                    <?php
                                    if(!empty($cpa_form_data))
                                    {
                                        echo '<option value="cpa">Click Per Action </option>';
                                    }else{
                                        echo '<option value="ppc">Pay Per Click</option>
	                                         <option value="cpm">Pay Per View</option>
	                                         <option value="both">Click & View </option>';
                                    }

                                    ?>
                                </select>
                            </div>

                            <div class="form-group <?= (!empty($cpa_form_data)) ? 'hidden' : '' ?>" id="ppc_div">
                                <label for="budget">Cost Per Click-CPC( ex:Total Amount  you want to pay per click in NGN)</label>
                                <span class="text-danger">min: <?=$general_details['currency_code']." ".$general_details['minimum_cpc'] ?>  </span>
                                <input type="number" step="0.001" min="<?=$general_details['minimum_cpc'] ?>" placeholder="Cost Per Click" value="<?php echo set_value('cpc'); ?>" name="cpc" class="form-control">
                            </div>

                            <div class="form-group <?= (!empty($cpa_form_data)) ? 'hidden' : '' ?>" id="cpa_div">
                                <label for="budget">Cost Per Action-CPA( ex:Total Amount  you want to pay per Action in NGN)</label>
                                <span class="text-danger">min: <?=$general_details['currency_code']." ".($cpa_form_data['access_type'] == 'free') ? $general_details['minimum_cpa'] : $general_details['minimum_paid_cpa'] ?>  </span>
                                <input type="number" step="0.001" min="<?= ($cpa_form_data['access_type'] == 'free') ? $general_details['minimum_cpa'] : $general_details['minimum_paid_cpa'] ?> ?>" placeholder="Cost Per Action" value="<?php echo set_value('cpa'); ?>" name="cpa" class="form-control">
                            </div>

                            <div class="form-group hidden" id="cpm_div">
                                <label for="budget">Cost Per View( ex:Total Amount  you want to pay per View in NGN)</label>
                                <span class="text-danger">min: <?=$general_details['currency_code']." ".$general_details['minimum_cpm'] ?>  </span>
                                <input type="number" step="0.001" min="<?= $general_details['minimum_cpm'] ?>" placeholder="Cost Per View" value="<?php echo set_value('cpv'); ?>" name="cpv" class="form-control">
                            </div>

                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-success">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </div>

                    </div>

                    </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>






<script type="text/javascript">
	function toggleInputDiv(input_value) {
		var cpm_div = document.getElementById('cpm_div');
		var ppc_div = document.getElementById('ppc_div');

if (input_value == "ppc")
{//hide cpm 
 cpm_div.className = " hidden";
ppc_div.className = " show";
}else if(input_value == "cpm"){

ppc_div.className = " hidden";
cpm_div.className = " show";
	}else{
cpm_div.className = " show";
ppc_div.className = " show";
	}
}


</script>



