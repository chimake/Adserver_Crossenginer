<footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Built <?= date('Y');?> </span>
    </div>
</footer>

</div>
</div>

<script src="<?php echo base_url('assets/js/vendor.bundle.base.js'); ?>"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="<?php echo base_url('assets/chart.js/Chart.min.js'); ?>"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="<?php echo base_url('assets/js/off-canvas.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/hoverable-collapse.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/misc.js'); ?>"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="assets/js/dashboard.js"></script>
<script src="assets/js/todolist.js"></script>
</body>
<footer class="w3-container w3-blue w3-center w3-padding-xxlarge w3-margin-top">
 © Custch <?php
if (date('y') == 19)
{
echo "20".date('y');
}else{
echo "2018 - 20".date('y');
}
?>

</footer>

