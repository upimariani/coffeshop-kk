<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col-lg-7 col-md-10">
                <h1 class="display-2 text-white">Detail Pemesanan</h1>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Detail Pemesanan</h3>
                            <br>
                            <a href="<?= base_url('Admin/c_transaksi') ?>" class="btn btn-outline-primary btn-sm" role="button" aria-pressed="true"><i class="ni ni-bold-left text-primary"></i> Kembali</a>
                        </div>
                        <div class="col-4 text-right">
                            <?php
                            foreach ($detail_transaksi as $key => $value) {
                                if ($value->bayar == '0') {
                                    if ($value->pembayaran == '1') {
                            ?>
                                        <button class="btn btn-icon btn-primary" type="button" data-toggle="modal" data-target="#exampleModal">
                                            <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                                            <span class="btn-inner--text">Bayar</span>
                                        </button>
                                    <?php
                                    } else {
                                    ?>
                                        <span class="badge badge-danger">Bayar Via Transfer</span>
                            <?php
                                    }
                                }
                            }
                            ?>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <table class="table">
                                <?php
                                foreach ($detail_transaksi as $key => $value) {
                                ?>
                                    <tr>
                                        <td><i class="ni ni-key-25 text-danger"></i> No Transaksi</td>
                                        <td>: <strong><?= $value->id_transaksi ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td><i class="ni ni-single-02 text-primary"></i> Atas Nama</td>
                                        <td>: <?= $value->atas_nama ?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="ni ni-tag text-success"></i> Total Pembayaran</td>
                                        <td>: <span class="badge badge-primary badge-lg">Rp. <?= number_format($value->total_bayar, 0)  ?></span></td>
                                    </tr>
                            </table>
                        </div>
                        <div class="col-3">
                        </div>
                        <div class="col">
                            <table class="table">
                                <tr>
                                    <td>Bukti Bayar</td>
                                    <td>
                                        <?php
                                        if ($value->pembayaran == '1') {
                                            if ($value->bayar != '0') {
                                        ?>
                                                <img style="width: 150px;" src="<?= base_url('asset/bukti/' . $value->bayar) ?>">
                                            <?php
                                            }
                                            ?>

                                        <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="ni ni-watch-time text-primary"></i> Date/Time</td>
                                    <td><?= $value->tgl_pesan ?></td>
                                </tr>

                                <tr>
                                    <td><?php if ($value->bayar == '0') {
                                            echo '<span class="badge badge-danger badge-lg">belum bayar</span>';
                                        } else {
                                            echo '<span class="badge badge-success badge-lg">pembayaran valid</span>';
                                        } ?></td>
                                    <td></td>
                                </tr>
                            </table>
                        <?php
                                }
                        ?>
                        </div>
                    </div>
                    <br>
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($detail_pemesanan as $key => $value) {
                                $id = $value->id_transaksi;
                                $tot = $value->total_bayar;

                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value->nama_produk ?></td>
                                    <td>Rp. <?= number_format($value->harga, 0) ?></td>
                                    <td><?= $value->qty ?></td>
                                    <td><span class="badge badge-success">Rp. <?= number_format($value->qty * $value->harga, 0) ?></span></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <form action="<?= base_url('Admin/c_transaksi/bayar') ?>" method="POST">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pembayaran Pesanan</h5>
                        <input type="hidden" name="id_transaksi" value="<?= $id ?>">
                        <input type="hidden" name="total" value="<?= $tot ?>">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-control-label" for="input-city">Bayar*</label>
                            <input type="text" id="input-city" name="bayar" class="form-control" placeholder="Masukkan Nominal Bayar" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Bayar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>