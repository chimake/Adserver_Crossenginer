<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Add Campaign</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">

                        <form class="forms-sample" enctype="multipart/form-data" method="post" action="<?= site_url("advertiser_dashboard/add_campaign/".$this->uri->segment(3)) ?>">
                            <input type="hidden" name="cpa_name" value="<?= (isset($campaign_name)) ? $campaign_name : "" ?>">
                            <div class="form-group">
                                <label for="exampleInputName1">Campaign Name</label>
                                <?php if(!empty($this->uri->segment(3))){?>
                                    <span class="text-white"><?= $campaign_name."--" ?></span>
                                <?php } ?>
                                <input type="text" class="form-control"  value="<?= set_value('campaign_name') ?>" name="campaign_name" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleSelectGender">Campaign Category</label>
                                <select class="form-control" name="category" id="category">
                                    <option value=null selected>Choose...</option>
                                    <option value="agriculture">Agriculture</option>
                                    <option value="advertising">Advertising</option>
                                    <option value="banking">Banking & Finance</option>
                                    <option value="computers">Computers & Internet</option>
                                    <option value="e-commerce">E-commerce & Trading</option>
                                    <option value="education">Education & Learning</option>
                                    <option value="entertainment">Entertainment & Social</option>
                                    <option value="food">Food & Nutrition </option>
                                    <option value="gambling">Gambling & Betting</option>
                                    <option value="motoring">Motoring</option>
                                    <option value="marketing">Marketing & Affilate</option>
                                    <option value="manufacturing">Manufacturing & Industry </option>
                                    <option value="news">News & Media</option>
                                    <option value="sport">Sport</option>
                                    <option value="science">Science & Technology </option>
                                    <option value="product">Products & Services</option>
                                    <option value="politics">Politics</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail3">Destination Link</label>
                                <input type="text" name="destination_link" class="form-control" value="<?= (!empty($this->uri->segment(3))) ? $campaign_dest : set_value('destination_link') ?>" placeholder="www.example.com/landing_page" required <?= (!empty($this->uri->segment(3))) ? 'readonly' : '' ?>>
                            </div>

                            <div class="form-group">
                                <label for="campaign_type">Campaign Type</label>
                                <select class="form-control" id="campaign_type" name="campaign_type" onchange="typeContainer(this.value)">
                                    <option value="">Choose...</option>
                                    <option value="text">Create Text Only Campaign</option>
                                    <option value="banner">Create Banner Only Campaign</option>
                                    <option value="banner_text">Create Banner & Text Campaign</option>
                                </select>
                            </div>
                            <div class="text_only" id="text_only">
                                <div class="form-group">
                                    <label for="display_link">Display Link</label>
                                    <input type="text" class="form-control" name="display_link" id="display_link" value="<?= set_value("display_link") ?>" placeholder="www.example.com">
                                </div>

                                <div class="form-group">
                                    <label for="campaign_title_text">Campaign Title</label>
                                    <input type="text" class="form-control" maxlength="100" id="campaign_title_text" name="campaign_title_text" value="<?= set_value("campaign_title_text") ?>" placeholder="Ex: Advertise with custch Advertising">
                                </div>
                                <div class="form-group">
                                    <label for="exampleTextarea1">Campaign Text(Not > 160 characters)</label>
                                    <textarea class="form-control"  maxlength="140" cols="15" rows="5" name="campaign_title" id="campaign_title">
                                    <?php
                                    if(!empty(set_value('campaign_title')))
                                    {
                                        echo set_value('campaign_title');

                                    }else{
                                        echo "E.g Advertise your business online today with www.custch.com";
                                    }

                                    ?>
                                </textarea>


                                </div>
                            </div>

                            <div id="both_img" class="hidden">
                                <div id="banner_only">
                                    <div class="form-group">
                                        <label for="campaign_size">Campaign Size/Type</label>
                                        <select class="form-control" id="campaign_size" name="campaign_size">
                                            <option value="300X250">300 X 250 (Banner Only)</option>
                                            <option value="720X90"">468 X 60 (Recommended For Mobile Campaign)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="banner_text" id="banner_text">
                                    <div class="form-group">
                                        <label for="exampleTextarea1">Campaign Text(Not > 140 characters)</label>
                                        <textarea class="form-control" maxlength="140" cols="15" rows="5" name="campaign_title" id="campaign_title">
                                            <?php
                                            if(!empty(set_value('campaign_title')))
                                            {
                                                echo set_value('campaign_title');

                                            }else{
                                                echo "E.g Advertise your business online today with www.custch.com";
                                            }

                                            ?>
                                </textarea>

                                    </div>
                                </div>

                                <style type="text/css">
                                    div.use {
                                        padding:5px 10px;
                                    //background:#00ad2d;
                                        border:1px solid #00ad2d;
                                        position:relative;
                                        color:#fff;
                                        border-radius:2px;
                                        text-align:center;
                                    //float:right;
                                        cursor:pointer
                                    }
                                    .hide_file {
                                        position: absolute;
                                        z-index: 1000;
                                        opacity: 0;
                                        cursor: pointer;
                                        right: 0;
                                        top: 0;
                                        height: 100%;
                                        font-size: 24px;
                                        width: 100%;

                                    }
                                </style>

                                <div class="form-group">
                                    <label>Upload Banner</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="banner">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>

                            </div>

                            <script>

                                function typeContainer(id) {
                                    //alert(id);
                                    var textDiv = document.getElementById("text_only");
                                    var bannerDiv = document.getElementById("banner_only");
                                    var bannerTextDiv = document.getElementById("banner_text");
                                    var bothImg = document.getElementById("both_img");
                                    if(id == "text")
                                    {
                                        //alert("text");
                                        textDiv.className = textDiv.className.replace("hidden", "");
                                        bannerDiv.className = "hidden";
                                        bannerTextDiv.className = "hidden";
                                        bothImg.className = "hidden";

                                    }else if(id == "banner"){
                                        bannerDiv.className = bannerDiv.className.replace("hidden", "");
                                        textDiv.className = " hidden";
                                        bannerTextDiv.className = " hidden";
                                        bothImg.className = bothImg.className.replace("hidden", "");


                                    }else if(id == "banner_text"){
                                        bannerTextDiv.className = bannerTextDiv.className.replace("hidden", "");
                                        textDiv.className = " hidden";
                                        bannerDiv.className = " hidden";
                                        bothImg.className = bothImg.className.replace("hidden", "");
                                    }



                                }

                            </script>

                            <button type="submit" name="submit" class="btn btn-success">Next</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

