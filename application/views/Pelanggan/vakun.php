<!-- Contact Section Begin -->
<section class="contact-section spad">
    <div class="container">
        <?php
        foreach ($akun as $key => $value) {
        ?>
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-text">
                        <h2>Akun Pelanggan</h2>
                        <p>Berikut adalah data akun anda:</p>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="c-o">Nama</td>
                                    <td>: <?= $value->nama ?></td>
                                </tr>
                                <tr>
                                    <td class="c-o">No Tlp</td>
                                    <td>: <?= $value->no_telp ?></td>
                                </tr>
                                <tr>
                                    <td class="c-o">Email</td>
                                    <td>: <?= $value->email ?></td>
                                </tr>
                                <tr>
                                    <td class="c-o">Password</td>
                                    <td>: <span class="badge badge-warning"><?= $value->password ?></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="col-lg-7 offset-lg-1">
                    <form action="<?= base_url('Pelanggan/c_katalog/edit_akun/' . $value->id_pelanggan) ?>" method="POST" class="contact-form">
                        <h3>Perbaharui Akun Anda!!!</h3><br>
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" name="nama" value="<?= $value->nama ?>" placeholder="New Nama">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="no_telp" value="<?= $value->no_telp ?>" placeholder="New No Telepon">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="email" value="<?= $value->email ?>" placeholder="New Email">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="password" value="<?= $value->password ?>" placeholder="New Password">
                            </div>
                            <div class="col-lg-12">
                                <button type="submit">UPDATE AKUN</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</section>
<!-- Contact Section End -->