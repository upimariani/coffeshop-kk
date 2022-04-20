<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="hero-text">
                    <h1>Kolam Kita</h1>
                    <p>Here are the best hotel booking sites, including recommendations for international
                        travel and for finding low-priced hotel rooms.</p>
                    <a href="#" class="primary-btn">Discover Now</a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                <div class="booking-form">
                    <h3>Cek Booking Tempat & Tanggal</h3>
                    <?php
                    echo form_open('Pelanggan/c_katalog')
                    ?>
                    <?php echo form_close() ?>
                    <hr>
                    <?php
                    if ($this->session->flashdata('gagal')) {
                        echo '<div class="alert alert-danger" role="alert">';
                        echo $this->session->flashdata('gagal');
                        echo '</div>';
                    }
                    if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-success" role="alert">';
                        echo $this->session->flashdata('pesan');
                        echo '</div>';
                    }
                    ?>
                    <form action="<?= base_url('Pelanggan/c_katalog') ?>" method="POST">
                        <div class="form-group required">
                            <label for="guest">Tanggal Dine In</label><br>

                            <?= form_error('datein') ?>
                            <div class="input-group">
                                <input type="text" class="form-control datepick" name="datein" id="frmSaveOffice_startdt" required readonly>

                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                            </div>
                        </div>
                        <div class="select-option">
                            <label for="guest">Tempat/Kursi</label>
                            <select id="guest" name="kursi">
                                <option>---Pilih Kursi---</option>
                                <?php
                                foreach ($tempat as $key => $value) {
                                ?>
                                    <option value="<?= $value->id_tempat ?>"><?= $value->no_kursi ?> | <?= $value->nama_kursi ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit">CEK</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-slider owl-carousel">
        <div class="hs-item set-bg" data-setbg="<?= base_url('asset/template2/images/bijicoffe.jpg') ?>"></div>
        <div class="hs-item set-bg" data-setbg="<?= base_url('asset/template2/images/all_caffe.jpg') ?>"></div>
        <div class=" hs-item set-bg" data-setbg="<?= base_url('asset/template2/images/coffe.jpg') ?>"></div>
    </div>
</section>
<!-- Hero Section End -->


<!-- Services Section End -->
<section class="services-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Informasi Boking Tempat</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="testimonial-slider owl-carousel">
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Tanggal Boking</th>
                            <th>Nama Kursi</th>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($boking as $key => $value) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value->tgl_boking ?></td>
                                    <td><?= $value->nama_kursi ?></td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Coffe OUtdoor</span>
                    <h2>Menu Kolam Kita</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <div class="service-item">
                    <a href="<?= base_url('Pelanggan/c_katalog/katalog_makanan') ?>">
                        <i class="flaticon-036-parking"></i>
                        <h4>Makanan</h4>
                        <p>"Makanan adalah segalanya bagi kita. Ini merupakan perpanjangan dari perasaan nasionalis, perasaan etnis, sejarah pribadimu, provinsimu, daerahmu, sukumu, nenekmu. Itu tidak dapat dipisahkan sejak awal." - Anthony Bourdain</p>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="service-item">
                    <a href="<?= base_url('Pelanggan/c_katalog/katalog_minuman') ?>">
                        <i class="flaticon-033-dinner"></i>
                        <h4>Minuman</h4>
                        <p> “Cuma segelas kopi yang bercerita kepadaku bahwa yang hitam tak selalu kotor dan yang pahit tak selalu menyedihkan.”</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Home Room Section Begin -->
<section class="hp-room-section">
    <div class="container-fluid">
        <div class="hp-room-items">
            <div class="row">
                <?php
                foreach ($produk as $key => $value) {
                ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="<?= base_url('asset/gambar/' . $value->gambar) ?>">
                            <div class="hr-text">
                                <h3><?= $value->nama_produk ?></h3>
                                <h2>Rp. <?= number_format($value->harga, 0)  ?><span>/porsi</span></h2>
                                <p><?= $value->deskripsi ?></p>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- Home Room Section End -->
<!-- Testimonial Section Begin -->
<section class="testimonial-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>KRITIK DAN SARAN</span>
                    <h2>What Customers Say?</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="testimonial-slider owl-carousel">
                    <?php
                    foreach ($kritik as $key => $value) {
                    ?>
                        <div class="ts-item">
                            <p><?= $value->isi_kritik ?></p>
                            <div class="ti-author">
                                <div class="rating">
                                    <?= $value->time ?>
                                </div>
                                <h5> - <?= $value->nama ?></h5>
                            </div>
                            <img src="<?= base_url('asset/sona-master/') ?>img/testimonial-logo.png" alt="">
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section Begin -->
<?php
if ($this->session->userdata('id_pelanggan') != '') {
?>

    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-text">
                        <h2>Kritik dan Saran</h2>
                        <p>Silahkan anda mengirimkan kritik dan saran kepada kami.</p>
                        <table>
                            <tbody>
                                <?php
                                foreach ($akun as $key => $value) {
                                ?>
                                    <tr>
                                        <td class="c-o">Name:</td>
                                        <td><?= $value->nama ?></td>
                                    </tr>
                                    <tr>
                                        <td class="c-o">Phone:</td>
                                        <td><?= $value->no_telp ?></td>
                                    </tr>
                                    <tr>
                                        <td class="c-o">Email:</td>
                                        <td><?= $value->email ?></td>
                                    </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    <form action="<?= base_url('pelanggan/c_katalog/kritik') ?>" method="POST" class="contact-form">
                        <input type="hidden" name="id_pelanggan" value="<?= $value->id_pelanggan ?>">
                        <div class="row">
                            <div class="col-lg-12">
                                <textarea name="kritik" placeholder="Your Message..."></textarea>
                                <button type="submit">KRITIK DAN SARAN</button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php
                                }
            ?>
            </div>
        </div>
    </section>
<?php
}
?>
<!-- Contact Section End -->