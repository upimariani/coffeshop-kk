<!-- Contact Section Begin -->
<section class="contact-section spad">
    <div class="container">
        <div class="row">

            <div class="col-lg-4">
                <div class="contact-text">
                    <h2>Total Pemesanan</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <?php
                        foreach ($this->cart->contents() as $key => $value) {
                        ?>
                            <tbody>
                                <tr>
                                    <td><?= $value['name'] ?></td>
                                    <td>x <?= $value['qty'] ?></td>
                                    <td>Rp. <?= number_format($value['price'] * $value['qty'], 0) ?></td>
                                </tr>
                            </tbody>
                        <?php
                        }
                        ?>
                        <tr>
                            <th>Total Bayar</th>
                            <td></td>
                            <td><strong>Rp. <?= number_format($this->cart->total(), 0) ?></strong></td>
                        </tr>
                    </table>

                </div>
            </div>
            <div class="col-lg-7 offset-lg-1">
                <h3>Data Pemesanan</h3><br>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-light" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    BOKING TEMPAT
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <form action="<?= base_url() ?>Pelanggan/c_katalog/checkout" method="POST" class="contact-form">
                                    <?php
                                    $id_transaksi = date('Ymd') . strtoupper(random_string('alnum', 8));
                                    ?>
                                    <input type="hidden" name="tot_bayar" value="<?= $this->cart->total() ?>">
                                    <input type="hidden" name="id_transaksi" value="<?= $id_transaksi ?>">
                                    <?php
                                    $i = 1;
                                    foreach ($this->cart->contents() as $items) {
                                        echo form_hidden('qty' . $i++, $items['qty']);
                                    }
                                    ?>
                                    <h3>Data Boking Tempat</h3>
                                    <?php
                                    if ($this->session->flashdata('gagal')) {
                                        echo '<div class="alert alert-danger" role="alert">';
                                        echo $this->session->flashdata('gagal');
                                        echo '</div>';
                                    }
                                    ?>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input type="text" name="nama" placeholder="Atas Nama">
                                            <?php echo form_error('nama'); ?>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" name="no_tlp" placeholder="No Telepon">
                                            <?php echo form_error('no_tlp'); ?>
                                        </div>
                                        <div class="col-lg-12">
                                            <textarea name="catatan" id="message" cols="30" rows="10" placeholder="Catatan Pesanan"></textarea>
                                            <?php echo form_error('catatan'); ?>
                                        </div>
                                        <div class="col-lg-12">
                                            <h5>Tanggal Dine-In</h5>
                                            <hr>
                                            <div class="form-group required">
                                                <div class="input-group ">
                                                    <input type="text" class="form-control datepick" name="datein" id="frmSaveOffice_startdt" required readonly>
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <h5>Kursi</h5>
                                            <hr>
                                            <select name="kursi" id="" class="select form-control">
                                                <option value="">---Pilih Tempat Duduk/Kursi---</option>
                                                <?php
                                                foreach ($tempat as $key => $value) {
                                                ?>
                                                    <option value="<?= $value->id_tempat ?>"><?= $value->no_kursi ?> | <?= $value->nama_kursi ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-12">
                                            <br>
                                            <h5>Metode Pembayaran</h5>
                                            <hr>
                                            <select name="pembayaran" class="form-control">
                                                <option value=" ">---Pilih Metode Pembayaran---</option>
                                                <option value="1">Transfer Bank BRI</option>
                                                <option value="2">Bayar Ditempat</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-12">
                                            <br>
                                            <button type="submit">Boking Tempat</button>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-light collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        PESAN
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    <h3>Data Pemesanan</h3>
                                    <br>
                                    <form action="<?= base_url('Pelanggan/c_katalog/pesan') ?>" method="POST" class="contact-form">
                                        <?php
                                        $id_transaksi = date('Ymd') . strtoupper(random_string('alnum', 8));
                                        ?>
                                        <input type="hidden" name="tot_bayar" value="<?= $this->cart->total() ?>">
                                        <input type="hidden" name="id_transaksi" value="<?= $id_transaksi ?>">
                                        <?php
                                        $i = 1;
                                        foreach ($this->cart->contents() as $items) {
                                            echo form_hidden('qty' . $i++, $items['qty']);
                                        }
                                        ?>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <input type="text" name="nama" placeholder="Atas Nama">
                                                <?php echo form_error('nama'); ?>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" name="no_tlp" placeholder="No Telepon">
                                                <?php echo form_error('no_tlp'); ?>
                                            </div>
                                            <div class="col-lg-12">
                                                <textarea name="catatan" id="message" cols="30" rows="10" placeholder="Catatan Pesanan"></textarea>
                                                <?php echo form_error('catatan'); ?>
                                            </div>
                                            <div class="col-lg-12">
                                                <br>
                                                <h5>Metode Pembayaran</h5>
                                                <hr>
                                                <select name="pembayaran" class="form-control">
                                                    <option value=" ">---Pilih Metode Pembayaran---</option>
                                                    <option value="1">Transfer Bank BRI</option>
                                                    <option value="2">Bayar Ditempat</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-12">
                                                <br>
                                                <button type="submit">PESAN</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>
<!-- Contact Section End -->