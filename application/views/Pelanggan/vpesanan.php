<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Pesanan Saya</h2>
                    <div class="bt-option">
                        <a href="./home.html">Home</a>
                        <span>Pesanan Saya</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->
<!-- Room Details Section Begin -->
<section class="room-details-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php
                $tot = 0;
                foreach ($pesanan as $key => $value) {
                    $tot = $tot + $value->total_bayar;
                }
                ?>
                <div class="rd-reviews">
                    <?php
                    if ($tot == 0) {
                    ?>
                        <img style="display: block; margin-left: auto; margin-right: auto; width: 30%;" src="<?= base_url('asset/gambar/logo.png') ?>">
                    <?php
                    } else {
                    ?>

                        <h4>Status Pesanan Saya</h4>
                        <?php
                        foreach ($pesanan as $key => $value) {
                        ?>
                            <div class="review-item">
                                <div class="ri-pic">
                                    <i class="fa fa-thumb-tack" aria-hidden="true"></i>
                                </div>
                                <div class="ri-text">
                                    <span>Date/Time: <strong><?= $value->tgl_pesan ?> <?= $value->id_transaksi ?></strong></span>
                                    <div class="rating">
                                        <span class="badge badge-light">
                                            <?php
                                            if ($value->total_bayar == '0') {
                                                echo '<i class="fa fa-exclamation" aria-hidden="true"></i> Belum Bayar';
                                            }
                                            ?>
                                        </span>
                                    </div>
                                    <h5><?= $value->atas_nama ?> | <?= $value->no_telpn ?></h5>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p> Bayar:</p>
                                                </td>
                                                <td><a href="#" class="badge badge-info">Rp.<?= number_format($value->total_bayar, 0)  ?></a></td>
                                            </tr>
                                            <tr>
                                                <?php
                                                if ($value->no_kursi == '') {
                                                ?>
                                                    <td></td>
                                                    <td></td>
                                                <?php
                                                } else {
                                                ?>
                                                    <td>
                                                        <p>Boking Tempat</p>
                                                    </td>
                                                    <td>
                                                        <p><?= $value->no_kursi ?> | <?= $value->nama_kursi ?></p>
                                                    </td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <?php
                                            if ($value->bayar == '0') {
                                            ?>
                                                <tr>
                                                    <?php
                                                    echo form_open_multipart('pelanggan/c_katalog/bayar/' . $value->id_transaksi);
                                                    ?>
                                                    <td>Anda Memilih Metode Pembayaran Via Transfer, Silahkan untuk mengupload bukti pembayaran disini...</td>
                                                    <td><input type="file" name="bukti" class="form-control"></td>
                                                    <td><input class="form-control" type="submit" value="UPLOAD"></td>
                                                    <?php
                                                    echo form_close();
                                                    ?>
                                                </tr>
                                            <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                    <br>
                                    <?php
                                    if ($value->bayar == '0') {
                                    ?>
                                        <a href="<?= base_url('Pelanggan/c_katalog/batalkan_pesanan/' . $value->id_transaksi) ?>" class="btn btn-outline-warning" role="button" aria-pressed="true">Batalkan Pesanan</a>
                                    <?php
                                    }
                                    ?>
                                    <a href="<?= base_url('Pelanggan/c_katalog/detail_pesanan/' . $value->id_transaksi) ?>" class="btn btn-outline-dark" role="button" aria-pressed="true">View Detail Order</a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Room Details Section End -->