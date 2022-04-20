<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>

    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="top-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="tn-left">
                            <li><i class="fa fa-whatsapp" aria-hidden="true"></i>Chat me!!! Klik-> <a class="text-warning" href="https://api.whatsapp.com/send?phone=6282217417235&text=Halo%20Coffe%20Kolam%20Kita%20!!!"> (+628) 221 741 7235</a></li>
                            <li><i class="fa fa-envelope"></i> kolam_kita@gmail.com</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="tn-right">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="./index.html">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li><a href="<?= base_url('Pelanggan/c_katalog') ?>">Home</a></li>
                                    <li><a href="<?= base_url('Pelanggan/c_katalog/akun_pelanggan') ?>">Akun</a></li>
                                    <li><a href="<?= base_url('Pelanggan/c_katalog/pesanan_saya') ?>">Pesanan Saya</a></li>
                                    </li>
                                    <?php
                                    if ($this->session->userdata('email') == '') {
                                    ?>
                                        <li><a href="<?= base_url('Pelanggan/c_login') ?>">Login</a></li>
                                    <?php
                                    } else {
                                    ?>
                                        <li><a href="<?= base_url('Pelanggan/c_login/logout_pelanggan') ?>">LogOut</a></li>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    $keranjang = $this->cart->contents();
                                    $jml_item = 0;
                                    foreach ($keranjang as $value) {
                                        $jml_item = $jml_item + $value['qty'];
                                    }
                                    ?>
                                    <?php
                                    if ($this->session->userdata('email') == '') {
                                    ?>
                                        <li><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Cart</li>
                                    <?php
                                    } else {
                                    ?>
                                        <li><a href="<?= base_url('Pelanggan/c_katalog/cart') ?>"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Cart <?php if ($jml_item == 0) { ?>
                                                    <span class="badge badge-warning"></span>
                                                <?php } else { ?><span class="badge badge-warning"><?= $jml_item ?></span>
                                                <?php } ?></a></li>
                                    <?php
                                    }
                                    ?>

                                </ul>
                            </nav>
                            <div class="nav-right search-switch">
                                <i class="icon_search"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->