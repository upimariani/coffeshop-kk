<!-- Footer -->
<footer class="footer pt-0">
    <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
                &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
        </div>

    </div>
</footer>
</div>
</div>

<!-- Argon Scripts -->
<!-- Core -->
<script src="<?= base_url('asset/template1/') ?>assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url('asset/template1/') ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('asset/template1/') ?>assets/vendor/js-cookie/js.cookie.js"></script>
<script src="<?= base_url('asset/template1/') ?>assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="<?= base_url('asset/template1/') ?>assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Optional JS -->
<script src="<?= base_url('asset/template1/') ?>assets/vendor/chart.js/dist/Chart.min.js"></script>
<script src="<?= base_url('asset/template1/') ?>assets/vendor/chart.js/dist/Chart.extension.js"></script>
<!-- Argon JS -->
<script src="<?= base_url('asset/template1/') ?>assets/js/argon.js?v=1.2.0"></script>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000)
</script>
</body>

</html>