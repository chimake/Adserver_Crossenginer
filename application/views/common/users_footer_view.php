<footer class="bg-white iq-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center">
                Copyright <?= date('Y');?> <a href="#">+Life</a> All Rights Reserved.
            </div>
        </div>
    </div>
</footer>
<!-- Footer END -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/popper.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/jquery.appear.js'); ?>"></script>
<script src="<?= base_url('assets/js/countdown.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/waypoints.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/jquery.counterup.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/wow.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/apexcharts.js'); ?>"></script>
<script src="<?= base_url('assets/js/slick.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/select2.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/owl.carousel.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/jquery.magnific-popup.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/smooth-scrollbar.js'); ?>"></script>
<script src="<?= base_url('assets/js/lottie.js'); ?>"></script>
<script src="<?= base_url('assets/js/chart-custom.js'); ?>"></script>
<script src="<?= base_url('assets/js/custom.js'); ?>"></script>

<script>
    $("#latest").click(function (e) {

        var formActionURL = <?= site_url('advertiser_dashboard/count_latest');?>
        console.log("postData = " + JSON.stringify(postData));
        console.log("formActionURL = " + formActionURL);
        $.ajax({
            url: formActionURL,
            type: "GET",
            data: postData,
        }).done(function (data) {
            $('#chatbox').html(data);
            alert("success");
        }).fail(function () {
            alert("error");
        }).always(function () {
            $("#submitmsg").val('submit');
        });
    });
</script>

