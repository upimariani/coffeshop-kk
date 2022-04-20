<!-- Contact Section Begin -->
<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
            </div>
            <div class="col-lg-7 offset-lg-1">

                <div class="contact-text">
                    <h4>Detail Pesanan</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                    <table>
                        <tbody>
                            <?php
                            foreach ($detail as $key => $value) {
                            ?>
                                <tr>
                                    <td class="c-o"><?= $value->qty ?> x</td>
                                    <td>Rp. <?= number_format($value->harga, 0) ?> </td>

                                </tr>
                                <tr>
                                    <td></td>
                                    <td><?= $value->nama_produk ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Subtotal: <a href="#" class="badge badge-info">Rp. <?= number_format($value->qty * $value->harga, 0) ?></a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <a href="<?= base_url('Pelanggan/c_katalog/pesanan_saya') ?>" class="btn btn-outline-secondary" role="button" aria-pressed="true">Kembali</a>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->