<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>List Minuman</h2>
                    <div class="bt-option">
                        <a href="<?= base_url('pelanggan/c_katalog') ?>">Home</a>
                        <span>Minuman</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->
<!-- Rooms Section Begin -->
<section class="rooms-section spad">
    <div class="container">
        <div class="row">


            <?php
            foreach ($produk as $key => $value) {
            ?>
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="<?= base_url('asset/gambar/' . $value->gambar) ?>" alt="">
                        <div class="ri-text">
                            <h4><?= $value->nama_produk ?></h4>
                            <h3>Rp. <?= number_format($value->harga) ?><span></span></h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Kategori</td>
                                        <td><?= $value->nama_kategori ?></td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Deskripsi</td>
                                        <td><?= $value->deskripsi ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php
                            echo form_open('Pelanggan/c_katalog/add_cart');
                            echo form_hidden('redirect_page', str_replace('', '', current_url()));
                            ?>
                            <input type="hidden" name="id" value="<?= $value->id_produk ?>">
                            <input type="hidden" name="name" value="<?= $value->nama_produk ?>">
                            <input type="hidden" name="price" value="<?= $value->harga ?>">
                            <input type="hidden" name="qty" value="1">
                            <input type="hidden" name="picture" value="<?= $value->gambar ?>">
                            <button type="submit" class="btn primary-btn"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart</button>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- Rooms Section End -->