<!-- Footer Section Begin -->
<footer class="footer-section">
    <div class="container">
        <div class="footer-text">
            <div class="row">

            </div>
        </div>
    </div>
    <div class="copyright-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">

                </div>
                <div class="col-lg-5">
                    <div class="co-text">
                        <p>
                            COFFE KOLAM KITA
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search model Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search model end -->

<!-- Js Plugins -->
<script src="<?= base_url('asset/sona-master/') ?>js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url('asset/sona-master/') ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('asset/sona-master/') ?>js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url('asset/sona-master/') ?>js/jquery.nice-select.min.js"></script>
<script src="<?= base_url('asset/sona-master/') ?>js/jquery-ui.min.js"></script>
<script src="<?= base_url('asset/sona-master/') ?>js/jquery.slicknav.js"></script>
<script src="<?= base_url('asset/sona-master/') ?>js/owl.carousel.min.js"></script>
<script src="<?= base_url('asset/sona-master/') ?>js/main.js"></script>

<!---*** Start: JQuery 3.3.1 version. ***--->
<script language="javascript" src="<?= base_url('asset/date/') ?>jquery.min.js"></script>
<!---*** End: JQuery 3.3.1 version. ***--->
<!---*** Start: Bootstrap 3.3.7 version files. ***--->
<!---*** End: Bootstrap 3.3.7 version files. ***--->

<script language="javascript" src="<?= base_url('asset/date/') ?>moment.js"></script>
<script language="javascript" src="<?= base_url('asset/date/') ?>bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="<?= base_url('asset/date/') ?>bootstrap-datetimepicker.min.css">

<script>
    $(document).ready(function() {
        $('.datepick').datetimepicker({
            format: 'YYYY-MM-DD',
            ignoreReadonly: true
        });
    });
</script>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000)
</script>
</body>

</html>