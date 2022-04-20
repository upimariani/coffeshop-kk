<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header  align-items-center">
                <a class="navbar-brand" href="javascript:void(0)">
                    <img src="<?= base_url('asset/template1/') ?>/assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
                </a>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link 
                            <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'c_dashboard') {
                                echo 'active';
                            } ?>" href="<?= base_url('Admin/c_dashboard') ?>">
                                <i class="ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  
                            <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'c_produk' && $this->uri->segment(3) == 'kategori') {
                                echo 'active';
                            } ?>" href="<?= base_url('Admin/c_produk/kategori') ?>">
                                <i class="ni ni-tag text-orange"></i>
                                <span class="nav-link-text">Kategori</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link
                            <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'c_produk' && $this->uri->segment(3) == 'produk') {
                                echo 'active';
                            } ?>
                            " href="<?= base_url('Admin/c_produk/produk') ?>">
                                <i class="ni ni-collection text-success"></i>
                                <span class="nav-link-text">Produk</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link
                            <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'c_tempat') {
                                echo 'active';
                            } ?>
                            " href="<?= base_url('Admin/c_tempat') ?>">
                                <i class="ni ni-pin-3 text-danger"></i>
                                <span class="nav-link-text">Tempat</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link
                            <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'c_admin') {
                                echo 'active';
                            } ?>
                            " href="<?= base_url('Admin/c_admin') ?>">
                                <i class="ni ni-single-02 text-dark"></i>
                                <span class="nav-link-text">Admin</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'c_transaksi') {
                                                    echo 'active';
                                                } ?>" href="<?= base_url('Admin/c_transaksi') ?>">
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text">Transaksi</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Divider -->
                    <hr class="my-3">
                    <!-- Heading -->
                </div>
            </div>
        </div>
    </nav>