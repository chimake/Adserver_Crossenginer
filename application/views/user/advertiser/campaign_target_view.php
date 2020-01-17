<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Targeting options</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">

                        <p class="text-small">By skipping your Campaign will be mark as GENERAL CAMPAIGN(Visible in all category). <a href="<?=site_url("advertiser_dashboard/skip_targeting/".$this->uri->segment(3)) ?>" class="card-description">Skip This</a></p>
                        <form method="post" action="<?=site_url("advertiser_dashboard/campaign_target_action/".$this->uri->segment(3))  ?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="card-title text-center">Browser Targeting</h4>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" value="opera" name="browser[]"> Opera mini <i class="fa-opera"></i>
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" value="chrome" name="browser[]"> Google Chrome <i class="fa-chrome"></i>
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" value="firefox" name="browser[]"> Mozilla Firefox <i class="fa-firefox"></i>
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" value="sefari" name="browser[]"> Safari Browser <i class="fa-safari"></i>
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" value="uc" name="browser[]"> UC Browser <i class="fa-internet-explorer"></i>
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" value="ie" name="browser[]"> Internet Explorer <i class="fa-internet-explorer"></i>
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <h4 class="card-title text-center">Platform Targeting</h4>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" value="desktop" name="platform[]"> Desktop <i class="fa-desktop"></i>
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" value="mobile" name="platform[]"> Feature Phone  <i class="fa-phone"></i>
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" value="android" name="platform[]"> Android Mobile <i class="fa-android"></i>
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" value="ios" name="platform[]"> IOS(iphone,ipad) <i class="fa-apple"></i>
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" value="windows" name="platform[]"> Windows Mobile <i class="fa-phone-square"></i>
                                            </label>
                                        </div>


                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <h4 class="card-title text-center">Country Targeting</h4>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input  type="checkbox" name="tcountry[]" value="ghana">Ghana
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input  type="checkbox" name="tcountry[]" value="nigeria">Nigeria
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input  type="checkbox" name="tcountry[]" value="kenya">Kenya
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input  type="checkbox" name="tcountry[]" value="south-africa">South Africa
                                            </label>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-success mr-2">Next</button>

                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>





