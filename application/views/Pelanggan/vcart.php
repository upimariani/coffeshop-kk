<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Cart</h2>
                    <div class="bt-option">
                        <a href="<?= base_url('Pelanggan/c_katalog') ?>">Home</a>
                        <span>Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Section Begin -->
<section class="contact-section spad">
    <div class="container">
        <?php
        if ($this->cart->total() == 0) {
        ?>
            <img style="display: block; margin-left: auto; margin-right: auto; width: 30%;" src="<?= base_url('asset/gambar/logo.png') ?>">

        <?php
        } else {
        ?>
            <div class="row">
                <div class="col-lg-3">
                    <div class="contact-text">
                        <h2 class="text-center">Cart Total</h2>
                        <table class="table">
                            <tr>
                                <td>Total Bayar</td>
                                <td><strong>Rp. <?= number_format($this->cart->total(), 0) ?></strong></td>
                            </tr>
                        </table>
                        <a href="<?= base_url('Pelanggan/c_katalog/checkout') ?>" class=" btn btn-outline-secondary col-md-12">Pesan</a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <?php echo form_open('Pelanggan/c_katalog/update'); ?>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr class="active">
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Produk</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Qty</th>
                                <th class="text-center">Subtotal</th>
                                <th class="text-center">Delete</th>
                                <th class="text-center">Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $no = 1;
                            foreach ($this->cart->contents() as $key => $value) {
                            ?>
                                <tr>
                                    <td scope="col"><?= $no++ ?></td>
                                    <td><img style="width: 50px; border-radius: 50%;" src="<?= base_url('asset/gambar/' . $value['picture']) ?>">
                                        <strong><?= $value['name']; ?></strong>
                                    </td>
                                    <td><span class="badge badge-warning">Rp. <?= number_format($value['price'], 0)  ?></span></td>
                                    <td class=" qty" data-title="Qty">
                                        <input id="jml" type="number" name="<?= $i . '[qty]' ?>" class="input-number" min="1" max="100" value="<?= $value['qty'] ?>">
                                    </td>
                                    <td>Rp. <?= number_format($value['qty'] * $value['price'],)  ?></td>
                                    <td class="action"><a class="btn" href="<?= base_url('Pelanggan/c_katalog/delete/' . $value['rowid']) ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>

                                    <td class="action"><button class="btn btn-outline-success" href="<?= base_url('c_belanja/update/' . $value['rowid']) ?>">Update</button></td>
                                </tr>
                            <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>

                    <?php form_close(); ?>
                </div>
            </div>



        <?php
        }
        ?>



    </div>
</section>
<!-- Contact Section End -->