<!-- Contact Section Begin -->
<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
            </div>
            <div class="col-lg-7 offset-lg-1">
                <h3>Login Pelanggan</h3><br>
                <?php
                if ($this->session->flashdata('pesan')) {
                    echo '<div class="alert alert-success" role="alert">';
                    echo $this->session->flashdata('pesan');
                    echo '</div>';
                }
                if ($this->session->flashdata('gagal')) {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo $this->session->flashdata('gagal');
                    echo '</div>';
                }
                ?>
                <br>
                <form action="<?= base_url('Pelanggan/c_login') ?>" method="POST" class="contact-form">
                    <div class="row">
                        <div class="col-lg-12">
                            <label>Email*</label>
                            <?php
                            if (form_error('email')) {
                            ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo form_error('email'); ?>
                                </div>
                            <?php
                            }
                            ?>
                            <input type="text" name="email" placeholder="Email">
                        </div>
                        <div class="col-lg-12">
                            <label>Password*</label>
                            <?php
                            if (form_error('password')) {
                            ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo form_error('password'); ?>
                                </div>
                            <?php
                            }
                            ?>
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        <div class="col-lg-12">
                            <p>Apakah Anda Sudah Memiliki Akun? <a href="<?= base_url('Pelanggan/c_login/register') ?>">Register!!!</a></p>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->