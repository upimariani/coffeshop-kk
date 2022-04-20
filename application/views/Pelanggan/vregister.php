<!-- Contact Section Begin -->
<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">

            </div>
            <div class="col-lg-7 offset-lg-1">
                <form action="<?= base_url('Pelanggan/c_login/register') ?>" method="POST" class="contact-form">
                    <h3>Register Pelanggan</h3><br>
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Nama</label>
                            <input type="text" name="nama" id="email" placeholder="Masukkan Nama Anda" value="<?= set_value('nama') ?>">
                            <?php
                            if (form_error('nama')) {
                            ?>
                                <p class="text-danger"><?php echo form_error('nama'); ?></p>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-lg-6">
                            <label>No Telepon</label>
                            <input type="number" name="no_telp" placeholder="Masukkan No Telepon Anda" value="<?= set_value('no_telp') ?>">
                            <?php
                            if (form_error('no_telp')) {
                            ?>
                                <p class="text-danger"><?php echo form_error('no_telp'); ?></p>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-lg-12">
                            <label>Alamat</label>
                            <textarea name="alamat" placeholder="Masukkan Alamat Anda" value="<?= set_value('alamat') ?>"></textarea>
                            <?php
                            if (form_error('alamat')) {
                            ?>
                                <p class="text-danger"><?php echo form_error('alamat'); ?></p>
                            <?php
                            }
                            ?>
                        </div>
                        <div class=" col-lg-6">
                            <label>E-mail</label>
                            <input type="email" name="email" id="email" placeholder="Masukkan Email Anda" value="<?= set_value('email') ?>">
                            <?php
                            if (form_error('email')) {
                            ?>
                                <p class="text-danger"><?php echo form_error('email'); ?></p>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-lg-6">
                            <label>Password</label>
                            <input type="text" name="password" id="email" placeholder="Masukkan Password" value="<?= set_value('password') ?>">
                            <?php
                            if (form_error('password')) {
                            ?>
                                <p class="text-danger pl-3"><?php echo form_error('password'); ?></p>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-lg-6">
                            <p>Apakah Anda Sudah Memiliki Akun? <a href="<?= base_url('Pelanggan/c_login') ?>">Login!!!</a></p>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->