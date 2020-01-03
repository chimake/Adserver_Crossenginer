<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> <?php echo $title; ?> </h3>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">SITE & SEO Settings</h4>
                        <form class="forms-sample" method="post" action="<?= site_url("admin/site_settings") ?>">
                            <span class="text-danger"><?= $_SESSION['action_status_report'] ?></span>
                            <div class="form-group">
                                <label for="InputTag1">Site Name</label>
                                <input type="text" class="form-control" id="InputTag1" name="site_name" value="<?=$site_name ?>">
                            </div>
                            <div class="form-group">
                                <label for="InputTag2">Site Tag Line</label>
                                <input type="text" class="form-control" id="InputTag2" name="site_tagline" value="<?=$site_tagline ?>">
                            </div>
                            <div class="form-group">
                                <label for="InputTag3">Site Author</label>
                                <input type="text" class="form-control" id="InputTag3" name="site_author" value="<?=$site_author ?>">
                            </div>

                            <div class="form-group">
                                <label for="InputTag4">Site Keywords</label>
                                <input type="text" class="form-control" id="InputTag4" name="site_keywords" value="<?=$site_keywords ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Site Descriptions</label>
                                <textarea class="form-control" id="InputTag5" rows="10" cols="20" name="site_descriptions"><?= $site_descriptions?></textarea>
                            </div>
                            <button type="submit" name="submit" class="btn btn-gradient-primary mr-2">Change Site Details</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


